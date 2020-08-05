<?php

namespace LMS\Result;

use JsonSerializable;
use LMS\Request\RequestInterface;
use LmsBridge\Result\TingSearchFacet;
use LmsBridge\Result\TingSearchFacetTerm;

/**
 * Class LmsClientSearchResult.
 */
class Search implements SearchResultInterface, JsonSerializable
{

    /**
     * Set of result objects.
     *
     * @var array|\LMS\Object\SearchObject[]
     */
    protected $objects;

    /**
     * Request object.
     *
     * @var \LMS\Request\RequestInterface
     */
    protected $request;

    /**
     * Number of hits.
     *
     * @var int
     */
    protected $hits;

    /**
     * Search result facets.
     *
     * @var bool|object
     */
    protected $facets;

    /**
     * Search constructor.
     *
     * @param \LMS\Request\RequestInterface $request
     *   Request object.
     * @param \LMS\Object\SearchObject[] $objects
     *   A set of result objects.
     * @param int $hits
     *   Number of hits.
     * @param object|bool $facets
     *  Search result facets.
     */
    public function __construct(
        RequestInterface $request,
        array $objects = [],
        $hits = 0,
        $facets = false
    ) {
        $this->request = $request;
        $this->objects = $objects;
        $this->hits = $hits;
        $this->facets = $facets;
    }

    /**
     * @return mixed
     */
    public function getFacets()
    {

        $facets = [];

        // Bail out if we don't have any facets.
        if (empty($this->facets)) {
            return $facets;
        }

        /** @var \TingClientFacetResult $open_search_facet */
        foreach ($this->facets as $lms_search_facet) {
            // For each facet, extract data on the facet itself and its terms.
            $facet = new TingSearchFacet($lms_search_facet['id']);
            $terms = [];
            foreach ($lms_search_facet['values'] as $term) {
                if (count($term) == 3) {
                    $terms[] = new TingSearchFacetTerm($term['name'], $term['frequence'], $term['value']);
                } else {
                    $terms[] = new TingSearchFacetTerm($term['value'], $term['frequence']);
                }
            }
            $facet->setTerms($terms);
            // Finish off by adding the facet to the list, keyed by its name as
            // required by the interface.
            $facets[$lms_search_facet['id']] = $facet;
        }

        return $facets;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * {@inheritdoc}
     */
    public function getObjects()
    {
        return $this->objects;
    }

    /**
     * {@inheritdoc}
     */
    public function getCount()
    {
        return count($this->objects);
    }

    /**
     * {@inheritdoc}
     */
    public function getHits()
    {
        return $this->hits;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return [
            'objects' => $this->objects,
            'hitCount' => $this->hits,
        ];
    }
}
