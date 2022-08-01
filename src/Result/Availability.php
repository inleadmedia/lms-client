<?php

namespace LMS\Result;

use JsonSerializable;
use LMS\Request\RequestInterface;

class Availability implements AvailabilityResultInterface, JsonSerializable
{

    /**
     * Request object.
     *
     * @var \LMS\Request\RequestInterface
     */
    protected $request;

    /**
     * Material items availability data.
     *
     * @var array
     */
    protected $availability;

    /**
     * Availability result class contructor.
     *
     * @param \LMS\Request\RequestInterface $request
     *   Request object.
     * @param array $availability
     *   Material items availability data.
     */
    public function __construct(RequestInterface $request, $availability)
    {
        $this->request = $request;
        $this->availability = $availability;
    }

    /**
     * @inheritDoc
     */
    public function getAvailability(): array
    {
        return $this->availability;
    }

    /**
     * @inheritDoc
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
        return (array) $this->availability;
    }
}
