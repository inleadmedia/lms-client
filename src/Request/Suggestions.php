<?php

namespace LMS\Request;

/**
 * Class Suggestions
 *
 * @package LMS\Request
 */
class Suggestions implements SuggestionsRequestInterface
{

    /**
     * Step value for request.
     */
    const LMS_SUGGESTIONS_STEP = 10;

    /**
     * @var string
     */
    protected $query;

    /**
     * Suggestions constructor.
     *
     * @param $query
     */
    public function __construct($query)
    {
        $this->query = $query;
    }

    /**
     * Gets uri path component for current action.
     *
     * @return string
     *   Uri path component where actual action can be accessed.
     */
    public function getUri()
    {
        return 'search/suggestions';
    }

    /**
     * Gets the request parameters for current action.
     *
     * @return array
     *   A set of parameters to be sent with the request.
     */
    public function getParameters()
    {
        return [
            'query' => $this->query,
            'step' => self::LMS_SUGGESTIONS_STEP,
        ];
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [];
    }

    /**
     * Parses the raw result into an usable object.
     *
     * @param array $rawData
     *   Raw result from service.
     *
     * @return array Raw result.
     *   Raw result.
     */
    public function parseResult(array $rawData)
    {
        $matches = [];
        $hits = $rawData['hits'];

        foreach ($hits as $hit) {
            $title = false;
            if (isset($hit['title'])) {
              $title = $hit['title'];
            }
            elseif (isset($hit['subject'])) {
              $title = $hit['subject'];
            }
            $val = truncate_utf8($title, 60, true, true, 1);
            $key = truncate_utf8($title, 256, true, false, 1);
            // Trim whitespace and question mark.
            $key = trim($key, " \t\n\r\0\x0B?");
            $key = str_replace('"', '', $key);
            $key = trim($key, " \t\n\r\0\x0B?");
            $matches[$key] = $val;
        }
        return $matches;
    }
}
