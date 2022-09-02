<?php

namespace LMS\Request;

use LMS\Exception\LmsException;
use LMS\Object\SearchObject;
use LMS\Result\ResultInterface;
use LMS\Result\Search as SearchResult;
use LmsBridge\Result\TingSearchFacet;
use LMS\Result\SearchResultInterface;

/**
 * Class Search.
 */
class Search implements SearchRequestInterface
{
    /**
     * Search query phrase.
     *
     * @var string
     */
    protected $query;

    /**
     * Sort behavior.
     *
     * @var string
     */
    protected $sorting;

    /**
     * Current page number.
     *
     * @var int
     */
    protected $page;

    /**
     * Amount of results per page.
     *
     * @var int
     */
    protected $amount;

    /**
     * Include additional meta-data in result.
     *
     * @var bool
     */
    protected $withMeta;

    /**
     * Include facets in request.
     *
     * @var bool
     */
    protected $withFacets;

    public const SORT_RANKING = 'rank_general';

    public const SORT_TITLE_ASCENDING = 'title_ascending';

    public const SORT_TITLE_DESCENDING = 'title_descending';

    public const SORT_DATE_ASCENDING = 'date_ascending';

    public const SORT_DATE_DESCENDING = 'date_descending';

    public const SORT_CREATOR_ASCENDING = 'creator_ascending';

    public const SORT_CREATOR_DESCENDING = 'creator_descending';

    public const SORT_OPTIONS = [
        self::SORT_RANKING,
        self::SORT_DATE_ASCENDING,
        self::SORT_DATE_DESCENDING,
        self::SORT_TITLE_ASCENDING,
        self::SORT_TITLE_DESCENDING,
        self::SORT_CREATOR_ASCENDING,
        self::SORT_CREATOR_DESCENDING,
    ];

    /**
     * Search constructor.
     *
     * @param string $query
     *   Search query.
     * @param int $page
     *   Paginate the search result.
     * @param int $amount
     *   Number of results per page.
     * @param bool $withMeta
     *   Include additional meta-data.
     */
    public function __construct(string $query, int $page = 1, int $amount = 10, bool $withMeta = false, bool $withFacets = false)
    {
        $this->query = $query;
        $this->page = $page;
        $this->amount = $amount;
        $this->withMeta = $withMeta;
        $this->withFacets = $withFacets;
        $this->sorting = self::SORT_RANKING;
    }

    /**
     * {@inheritdoc}
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * {@inheritdoc}
     */
    public function setAmount($amount): SearchRequestInterface
    {
        $this->amount = $amount;
    }

    /**
     * {@inheritdoc}
     */
    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * {@inheritdoc}
     */
    public function setPage(int $page): SearchRequestInterface
    {
        $this->page = $page;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery(): string
    {
        return $this->query;
    }

    /**
     * {@inheritdoc}
     */
    public function setQuery(string $query): SearchRequestInterface
    {
        $this->query = $query;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUri(): string
    {
        return 'search';
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters(): array
    {
        $offset = ($this->page - 1) * $this->amount;

        $parameters = [
            'query' => $this->query,
            'step' => $this->amount,
            'offset' => $offset,
            'sort' => $this->sorting,
        ];

        if (true === $this->withMeta) {
            $parameters['withMeta'] = '';
        }

        if (true === $this->withFacets) {
            $parameters['availableFacets'] = '';
        }

        return $parameters;
    }

    /**
     * {@inheritdoc}
     */
    public function parseResult(array $rawData): ResultInterface
    {
        if (!array_key_exists('hitCount', $rawData)) {
            throw new LmsException("Search result expects a 'hitCount' key in response body.");
        }
        $hits = $rawData['hitCount'];

        if (!array_key_exists('objects', $rawData)) {
            throw new LmsException("Search result expects an 'objects' key in response body.");
        }
        $rawObjects = $rawData['objects'];

        $objects = [];
        foreach ($rawObjects as $rawObject) {
            $objects[] = new SearchObject($rawObject);
        }

        $facets = [];
        if (isset($rawData['facets'])) {
            if (!array_key_exists('facets', $rawData)) {
                throw new LmsException("Search result expects an 'facets' key in response body.");
            }
            $rawFacets = $rawData['facets'];

            foreach ($rawFacets as $rawFacet) {
                $facets[] = new TingSearchFacet($rawFacet['id'], $rawFacet['values']);
            }
        }

        return new SearchResult($this, $objects, $hits, $facets);
    }

    /**
     * {@inheritdoc}
     */
    public function getSorting(): string
    {
        return $this->sorting;
    }

    /**
     * {@inheritdoc}
     */
    public function setSorting(string $sorting): SearchRequestInterface
    {
        if (!in_array($sorting, self::SORT_OPTIONS)) {
            throw new LmsException("Sorting option '{$sorting}' is not supported.");
        }

        $this->sorting = $sorting;
    }

    /**
     * {@inheritdoc}
     */
    public function getWithMeta(): bool
    {
        return $this->withMeta;
    }

    /**
     * {@inheritdoc}
     */
    public function setWithMeta(bool $withMeta): SearchRequestInterface
    {
        $this->withMeta = (bool) $withMeta;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getWithFacets()
    {
        return $this->withFacets;
    }

    /**
     * {@inheritdoc}
     */
    public function setWithFacets($withFacets)
    {
        $this->withFacets = (bool) $withFacets;
    }

    /**
     * Stringify the request object.
     *
     * @return string
     *   String representation of the request.
     */
    public function __toString()
    {
        // TODO: This might behave unexpectedly, when 'withMeta' param is NULL.
        return implode('-', array_filter($this->getParameters()));
    }
}
