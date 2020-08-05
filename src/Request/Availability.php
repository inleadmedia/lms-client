<?php

namespace LMS\Request;

use LMS\Result\Availability as AvailabilityResult;

/**
 * Class Availability
 *
 * @package LMS\Request
 */
class Availability implements AvailabilityRequestInterface
{
    /**
     * @var int
     */
    protected $id;

    /**
     * Availability constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritDoc
     */
    public function getUri()
    {
        return 'availability';
    }

    /**
     * @inheritDoc
     */
    public function getParameters()
    {
        return [
          'id' => $this->id
        ];
    }

    /**
     * @return array
     */
    public function getData()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function parseResult(array $rawData)
    {
        return new AvailabilityResult($this);
    }
}
