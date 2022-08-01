<?php

namespace LMS\Request;

use LMS\Object\HoldingObject;
use LMS\Result\Holdings as HoldingsResult;

/**
 * Class Holdings.
 */
class Holdings implements HoldingsRequestInterface
{

    /**
     * Material item id.
     *
     * @var string
     */
    protected $id;

    /**
     * Holdings class constructor.
     *
     * @param string $id
     *   Item identifier.
     */
    public function __construct($id)
    {
        $this->id = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function getUri(): string
    {
        return 'holdings';
    }

    /**
     * {@inheritdoc}
     */
    public function parseResult(array $rawData)
    {
        return $rawData;
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters()
    {
        return [
            'id' => $this->id,
        ];
    }

    /**
     * Stringify the request object.
     *
     * @return string
     *   String representation of the request.
     */
    public function __toString()
    {
        return implode('-', $this->getParameters());
    }
}
