<?php

namespace LMS\Request;

use LMS\Object\SearchObject;
use LMS\Result\Details as DetailsResult;

/**
 * Class Details.
 */
class Details implements DetailsRequestInterface
{

    protected $id;

    /**
     * Details constructor.
     *
     * @param string $id
     *   Item details identifier.
     */
    public function __construct($id)
    {
        $this->id = $id;
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
    public function parseResult(array $rawData)
    {
        return new DetailsResult($this, new SearchObject($rawData));
    }

    /**
     * {@inheritdoc}
     */
    public function getUri()
    {
        return 'detail';
    }

    /**
     * {@inheritdoc}
     */
    public function getParameters()
    {
        return [
            'id' => $this->id
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
