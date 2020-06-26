<?php

namespace LMS\Request;

use LMS\Result\Holdings as HoldingsResult;

/**
 * Class Holdings
 *
 * @package LMS\Request
 */
class Holdings implements HoldingsRequestInterface
{

    /**
     * @var int
     */
    protected $id;

    /**
     * Holdings constructor.
     *
     * @param $id
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * @return mixed
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
        return 'holdings';
    }

    /**
     * @inheritDoc
     */
    public function getParameters()
    {
        return [
            'id' => $this->id,
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
        return new HoldingsResult($this);
    }
}
