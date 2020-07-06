<?php

namespace LMS\Request;

/**
 * Interface LmsSearchRequestInterface.
 */
interface SearchRequestInterface extends RequestInterface
{
    /**
     * Gets amount of results per page.
     *
     * @return int
     *   The amount of results per page.
     */
    public function getAmount();

    /**
     * Sets per page amount of results.
     *
     * @param int $amount
     *   The amount of results per page.
     *
     * @return \LMS\Request\SearchRequestInterface
     *   This instance.
     */
    public function setAmount($amount);

    /**
     * Gets page number.
     *
     * @return int
     *   Current page number.
     */
    public function getPage();

    /**
     * Sets page number.
     *
     * @param int $page
     *   Current page number.
     *
     * @return \LMS\Request\SearchRequestInterface
     *   This instance.
     */
    public function setPage($page);

    /**
     * Gets search query.
     *
     * @return string
     *   Searched string.
     */
    public function getQuery();

    /**
     * Sets search query.
     *
     * @param string $query
     *   Searched string.
     *
     * @return \LMS\Request\SearchRequestInterface
     *   This instance.
     */
    public function setQuery($query);

    /**
     * Gets result sorting.
     *
     * @return string
     *   Current sorting approach.
     */
    public function getSorting();

    /**
     * Sets expected result sorting.
     *
     * @param string $sorting
     *   Current sorting approach.
     *
     * @return \LMS\Request\SearchRequestInterface
     *   This instance.
     */
    public function setSorting($sorting);

    /**
     * Get meta-data setting value.
     *
     * @return bool
     *   Whether additional meta-data is included.
     */
    public function getWithMeta();

    /**
     * Whether to include additional meta-data in result.
     *
     * @param bool $withMeta
     *   Include additional meta-data in each item.
     *
     * @return \LMS\Request\SearchRequestInterface
     *   This instance.
     */
    public function setWithMeta($withMeta);
}
