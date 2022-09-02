<?php

namespace LMS\Request;

class Availability implements AvailabilityRequestInterface
{

    /**
     * Material item id.
     *
     * @var string
     */
    protected $id;

    /**
     * Availability class constructor.
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
        return 'availability';
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
    public function getParameters(): array
    {
        return [
            'id' => $this->id,
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function parseResult(array $rawData)
    {
        return $rawData;
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
