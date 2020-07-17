<?php

namespace LMS\Result;

use LMS\Request\RequestInterface;

/**
 * Class Loans
 *
 * @package LMS\Result
 */
class Loans implements LoansResultInterface
{

    /**
     * @var \LMS\Request\RequestInterface
     */
    protected $request;

    /**
     * @var array
     */
    protected $objects;

    /**
     * Reservations constructor.
     *
     * @param \LMS\Request\RequestInterface $request
     * @param array $objects
     */
    public function __construct(RequestInterface $request, $objects = [])
    {
        $this->request = $request;
        $this->objects = $objects;
    }

    /**
     * @inheritDoc
     */
    public function getRequest()
    {
        return $this->request;
    }

    /**
     * Return objects.
     */
    public function getObjects()
    {
        return $this->objects;
    }
}
