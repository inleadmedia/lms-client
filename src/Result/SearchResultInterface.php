<?php

namespace LMS\Result;

/**
 * Interface SearchResultInterface.
 */
interface SearchResultInterface extends ResultInterface
{

    /**
     * Gets the current objects count.
     *
     * @return int
     *   Count of objects in current result.
     */
    public function getCount(): int;

    /**
     * Gets the set of objects from current result.
     *
     * @return \LMS\Object\SearchObject[]
     *   Set of objects.
     */
    public function getObjects(): array;

    /**
     * Get the number of hits this search yielded.
     *
     * @return int
     *   Number of hits.
     */
    public function getHits(): int;

    /**
     * Get the list of facets.
     *
     * @return array
     */
    public function getFacets(): array;
}
