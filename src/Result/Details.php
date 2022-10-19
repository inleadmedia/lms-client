<?php

namespace LMS\Result;

use JsonSerializable;
use LMS\Object\SearchObject;
use LMS\Request\RequestInterface;

/**
 * Class Details.
 */
class Details implements DetailsResultInterface, JsonSerializable
{

    /**
     * Request object.
     *
     * @var RequestInterface
     */
    protected $request;

    /**
     * Result object.
     *
     * @var SearchObject
     */
    protected $object;

    /**
     * LmsO`Details constructor.
     *
     * @param RequestInterface $request
     *   LMS request object.
     * @param SearchObject $object
     *   Item details object.
     */
    public function __construct(RequestInterface $request, SearchObject $object)
    {
        $this->request = $request;
        $this->object = $object;
    }

    /**
     * {@inheritdoc}
     */
    public function getObject(): SearchObject
    {
        return $this->object;
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
    public function jsonSerialize()
    {
        return (array) $this->object;
    }
}
