<?php

namespace LMS;

/**
 * @file
 *
 * File holds class to convert not valid search phrases to valid cql.
 * Private membet cql_string holds an internal representation of the original
 *   search string. All parts of the string is examined to check for healthy
 *   cql.
 *
 * Enquoted parts of the string stays the same. Parentheses are enquoted if
 *   content is not healthy. Blanks are replaced by 'and'. Multiple whitespaces
 *   are removed. Reserved characters are enquoted.
 *
 * Examples not valid:
 * portland (film) => portland and (film)
 * henning mortensen (f. 1939) => henning and mortensen and "(f. 1939)"
 * harry and (White night) = harry and "(White night)"
 *
 *
 * Valid cql stays the same eg.
 * dkcclterm.sf=v and dkcclterm.uu=nt and (term.type=bog) not
 *   term.literaryForm=fiktion
 */

/**
 * Class TingSearchCqlDoctor.
 *
 * An attempt to convert non cql search phrases to valid cql.
 */
class LMSSearchCqlDoctor
{

    /**
     * @var int replace_key.
     *   Used to prepend key
     *
     * @see $this->get_replace_key().
     */
    private static $replaceKey = 10;

    /**
     * @var string cql_string.
     *   Internal representation of the search phrase.
     */
    private $cqlString;

    /**
     * @var array pattern.
     *   The pattern to replace in search string.
     */
    private $pattern = [];

    /**
     * @var array replace.
     *   The string to replace with.
     */
    private $replace = [];

    /**
     * Constructor, Escape reserved characters, remove multiple whitespaces
     * and sets private member $cql_string with trimmed string.
     *
     * @param string $string
     *   The search phrase to cure.
     */
    public function __construct($string)
    {
        $this->cqlString = trim($string);
        // Remove multiple whitespaces.
        $this->cqlString = preg_replace('/\s+/', ' ', $this->cqlString);
    }

    /**
     * Method to convert a string to strict cql.
     *
     * Basically this method adds quotes when needed.
     *
     * @return string
     *   Cql compatible string.
     */
    public function stringToCql()
    {
        // Handle quotes.
        $this->fixQuotes();
        // Handle parenthesis.
        $this->fixParenthesis();
        // Handle reserved characters.
        $this->escapeReservedCharacters();
        // Format the string.
        return $this->formatCqlString();
    }

    /**
     * Handle qoutes.
     *
     * Look for quoted content. Quoted content is replaced in search string.
     */
    private function fixQuotes()
    {
        // Grab quoted content.
        preg_match_all('$"([^"]*)"$', $this->cqlString, $phrases);
        if (!empty($phrases[0])) {
            foreach ($phrases[0] as $phrase) {
                $this->setReplacePattern($phrase);
            }
        }
    }

    /**
     * Helper function to set a single replacement key and phrase.
     *
     * Adds given phrase to private member $replace. Retrieve a key for the
     * replacement and replace given phrase in internal representation of search
     * string with the key.
     *
     * @param string $phrase .
     *   The phrase to add to private member $replace.
     * @param bool $qoute_me .
     *   If TRUE phrase is enquoted.
     *
     * @return string
     *   Alters private member cql_string
     */
    private function setReplacePattern($phrase, $qoute_me = false)
    {
        if ($qoute_me) {
            $this->replace[] = '"' . $phrase . '"';
        } else {
            $this->replace[] = $phrase;
        }
        $replace_key = $this->getReplaceKey();
        $this->pattern[] = '/' . $replace_key . '/';

        $this->cqlString = str_replace($phrase, $replace_key, $this->cqlString);
    }

    /**
     * Get a key for replacement in string.
     *
     * @return string
     */
    private function getReplaceKey()
    {
        $key_prefix = 'zxcv';
        return $key_prefix . self::$replaceKey++;
    }

    /**
     * Handle parantheses.
     *
     * Look lace parentheses in string. If any found and content is not
     * strict cql; enqoute the lot.
     *
     * @return string
     *   Alters private member cql_string.
     *
     */
    private function fixParenthesis()
    {
        // Grab content in parenthesis.
        preg_match_all('$\(([^\(\)]*)\)$', $this->cqlString, $phrases);

        if (empty($phrases[1])) {
            // No matching parenthesis.
            return;
        }

        foreach ($phrases[1] as $key => $phrase) {
            if (!$this->stringIsCql($phrase)) {
                $this->setReplacePattern($phrases[0][$key], true);
            } else {
                $this->setReplacePattern($phrase);
            }
        }
    }

    /**
     * Tests if a string is cql.
     *
     * If string contains a cql operator it is assumed that an attempt to write
     * cql is done.
     *
     * @param string $string
     *   The search query
     *
     * @return bool|int
     *   Whether the string is valid cql(TRUE) or not(FALSE)
     */
    private function stringIsCql($string)
    {
        // Single word is valid (no whitespaces).
        if (strpos(trim($string), ' ') === false) {
            return true;
        }
        return preg_match($this->getCqlOperatorsRegexp(), $string);
    }

    /**
     * Get reqular expression to ideniify cql operators.
     *
     * @return string.
     *   Reqular expression to identify cql operators.
     */
    private function getCqlOperatorsRegexp()
    {
        return '@ and | any | all | adj | or | not |=|\(|\)@i';
    }

    /**
     * Enqoute forward slashes and '-'.
     *
     * @return
     *   Alters private member cql_string.
     */
    private function escapeReservedCharacters()
    {
        $this->cqlString = str_replace('/', ' "/" ', $this->cqlString);
    }

    /**
     * Format cql string.
     *
     * Use private members $pattern and $replace to replace not valid cql
     * phrases with valid.
     *
     * @return string
     *   string in valid cql (hopefully)
     *
     */
    private function formatCqlString()
    {
        // Last check. All parts of cql string must be valid.
        $valid = true;
        $parts = preg_split($this->getCqlOperatorsRegexp(), $this->cqlString);
        foreach ($parts as $part) {
            if (!$this->stringIsCql($part)) {
                $valid = false;
                break;
            }
        }
        // Explode string by whitespace.
        $expressions = explode(' ', $this->cqlString);

        // Replace keys with phrases,
        if (!empty($this->pattern)) {
            $expressions = preg_replace($this->pattern, $this->replace, $expressions);
        }

        $done = false;
        do {
            $expressions = $this->replaceInline($expressions, $done);
        } while (!$done);

        // Remove empty elements.
        $empty_slots = array_keys($expressions, '');
        foreach ($empty_slots as $slot) {
            unset($expressions[$slot]);
        }

        if ($valid) {
            // Implode by blank.
            return implode(' ', $expressions);
        }

        // String is not valid; implode by and.
        return implode(' and ', $expressions);
    }

    /**
     * Some replacements are nested in parenthesis and/or qoutes
     * eg. (hund and "("hest")") which is perfectly legal.
     * Cql doctor first handles the qoutes and then the
     * parenthesis ; thus (hund and "("hest")")  becomes encoded multiple times.
     * This method runs through all parts to fix it
     *
     * @param array $expressions ;
     *  The parts of the searchquery to be cured.
     * @param $done ;
     *  Flag indicating whether all parts has been handled.
     *
     * @return array;
     *  Decoded expressions.
     */
    private function replaceInline($expressions, &$done)
    {
        foreach ($expressions as $key_exp => $expression) {
            foreach ($this->pattern as $key_pat => $regexp) {
                if (preg_match($regexp, $expression)) {
                    $expressions[$key_exp] = preg_replace(
                        $regexp,
                        $this->replace[$key_pat],
                        $expression
                    );
                    return $expressions;
                }
            }
        }
        $done = true;
        return $expressions;
    }
}
