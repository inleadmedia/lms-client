<?php

namespace LMS\Result;

use JsonSerializable;
use LMS\Request\RequestInterface;

class Holdings implements HoldingsResultInterface, JsonSerializable
{

    /**
     * Request object.
     *
     * @var \LMS\Request\RequestInterface
     */
    protected $request;


    /**
     * Material items holdings data.
     *
     * @var array
     */
    protected $holdings;

    /**
     * Holldigs result class constructor.
     *
     * @param \LMS\Request\RequestInterface $request
     *   Request object.
     * @param array $holdings
     *   Material items holdings data.
     */
    public function __construct(RequestInterface $request, $holdings)
    {
        $this->request = $request;
        $this->holdings = $holdings;
    }

    /**
     * {@inheritdoc}
     */
    public function getHoldings() : array
    {
        return $this->holdings;
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
    public function jsonSerialize()
    {
        return (array) $this->holdings;
    }
}
