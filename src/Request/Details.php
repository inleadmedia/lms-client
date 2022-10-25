<?php

namespace LMS\Request;

use LMS\Object\SearchObject;
use LMS\Result\Details as DetailsResult;
use LMS\Result\ResultInterface;

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
    public function __construct(string $id)
    {
        $this->id = $id;
    }

    /**
     * {@inheritdoc}
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function parseResult(array $rawData): ResultInterface
    {
        return new DetailsResult($this, new SearchObject($rawData));
    }

    /**
     * {@inheritdoc}
     */
    public function getUri(): string
    {
        return 'detail';
    }

    /**
     * {@inheritdoc}
     */
    public function getData()
    {
        return [];
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

    /**
     * {@inheritdoc}
     */
    public function getParameters(): array
    {
        return [
            'id' => $this->id,
        ];
    }
}
