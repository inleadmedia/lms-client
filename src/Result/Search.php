<?php

namespace LMS\Result;

use LMS\Request\RequestInterface;

/**
 * Class LmsClientSearchResult.
 */
class Search implements SearchResultInterface, \JsonSerializable
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
     * Search constructor.
     *
     * @param \LMS\Request\RequestInterface $request
     *   Request object.
     * @param \LMS\Object\SearchObject[] $objects
     *   A set of result objects.
     * @param int $hits
     *   Number of hits.
     */
    public function __construct(RequestInterface $request, array $objects = [], $hits = 0)
    {
        $this->request = $request;
        $this->objects = $objects;
        $this->hits = $hits;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * {@inheritdoc}
     */
    public function getObjects(): array
    {
        return $this->objects;
    }

    /**
     * {@inheritdoc}
     */
    public function getCount(): int
    {
        return count($this->objects);
    }

    /**
     * {@inheritdoc}
     */
    public function getHits(): int
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
