<?php

namespace LMS\Result;

use LMS\Request\RequestInterface;

class Reservations implements ReservationsResultInterface
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
     * Gets the request object.
     *
     * @return \LMS\Request\RequestInterface
     *   Request object.
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * @return array
     */
    public function getObjects()
    {
        return $this->objects;
    }
}
