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
    public function getAmount(): int;

    /**
     * Sets per page amount of results.
     *
     * @param int $amount
     *   The amount of results per page.
     *
     * @return \LMS\Request\SearchRequestInterface
     *   This instance.
     */
    public function setAmount(int $amount): SearchRequestInterface;

    /**
     * Gets page number.
     *
     * @return int
     *   Current page number.
     */
    public function getPage(): int;

    /**
     * Sets page number.
     *
     * @param int $page
     *   Current page number.
     *
     * @return \LMS\Request\SearchRequestInterface
     *   This instance.
     */
    public function setPage(int $page): SearchRequestInterface;

    /**
     * Gets search query.
     *
     * @return string
     *   Searched string.
     */
    public function getQuery(): string;

    /**
     * Sets search query.
     *
     * @param string $query
     *   Searched string.
     *
     * @return \LMS\Request\SearchRequestInterface
     *   This instance.
     */
    public function setQuery(string $query): SearchRequestInterface;

    /**
     * Gets result sorting.
     *
     * @return string
     *   Current sorting approach.
     */
    public function getSorting(): string;

    /**
     * Sets expected result sorting.
     *
     * @param string $sorting
     *   Current sorting approach.
     *
     * @return \LMS\Request\SearchRequestInterface
     *   This instance.
     */
    public function setSorting(string $sorting): SearchRequestInterface;

    /**
     * Get meta-data setting value.
     *
     * @return bool
     *   Whether additional meta-data is included.
     */
    public function getWithMeta(): bool;

    /**
     * Whether to include additional meta-data in result.
     *
     * @param bool $withMeta
     *   Include additional meta-data in each item.
     *
     * @return \LMS\Request\SearchRequestInterface
     *   This instance.
     */
    public function setWithMeta(bool $withMeta): SearchRequestInterface;

    /**
     * Get facets setting value.
     *
     * @return bool
     *   Whether facets option is included.
     */
    public function getWithFacets();

    /**
     * Whether to include facets in result.
     *
     * @param bool $withFacets
     *   Include facets in search result.
     *
     * @return mixed
     */
    public function setWithFacets($withFacets);
}
