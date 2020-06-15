<?php

namespace LMS\Request;

use LMS\Exception\LmsException;
use LMS\Object\SearchObject;
use LMS\Result\Search as SearchResult;

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

    const SORT_RANKING = 'rank_general';

    const SORT_TITLE_ASCENDING = 'title_ascending';

    const SORT_TITLE_DESCENDING = 'title_descending';

    const SORT_DATE_ASCENDING = 'date_ascending';

    const SORT_DATE_DESCENDING = 'date_descending';

    const SORT_CREATOR_ASCENDING = 'creator_ascending';

    const SORT_CREATOR_DESCENDING = 'creator_descending';

    const SORT_OPTIONS = [
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
     * @param bool $withFacets
     *   Include facets.
     */
    public function __construct($query, $page = 1, $amount = 10, $withMeta = false, $withFacets = TRUE)
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
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * {@inheritdoc}
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
    }

    /**
     * {@inheritdoc}
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * {@inheritdoc}
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getQuery()
    {
        return $this->query;
    }

    /**
     * {@inheritdoc}
     */
    public function setQuery($query)
    {
        $this->query = $query;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getUri()
    {
        return 'search';
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters()
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

        $parameters['availableFacets'] = '';

        return $parameters;
    }

    /**
     * {@inheritdoc}
     */
    public function parseResult(array $rawData)
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
          $facets = $rawData['facets'];
        }

        return new SearchResult($this, $objects, $hits, $facets);
    }

    /**
     * {@inheritdoc}
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * {@inheritdoc}
     */
    public function setSorting($sorting)
    {
        if (!in_array($sorting, self::SORT_OPTIONS)) {
            throw new LmsException("Sorting option '{$sorting}' is not supported.");
        }

        $this->sorting = $sorting;
    }

    /**
     * {@inheritdoc}
     */
    public function getWithMeta()
    {
        return $this->withMeta;
    }

    /**
     * {@inheritdoc}
     */
    public function setWithMeta($withMeta)
    {
        $this->withMeta = (bool) $withMeta;
    }

    public function setWithFacets($withFacets) {
      $this->withFacets = $withFacets;
    }

    public function getWithFacets() {
      return $this->withFacets;
    }

    /**
     * @return array
     */
    public function getData() {
        return [];
        // TODO: Implement getData() method.
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
