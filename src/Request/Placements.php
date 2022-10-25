<?php

namespace LMS\Request;

use LMS\Result\ResultInterface;

/**
 * Class Placements
 *
 * @package LMS\Request
 */
class Placements implements RequestInterface
{

    /**
     * @inheritDoc
     */
    public function getUri(): string
    {
        return 'placements';
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array
    {
        return [];
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
    public function parseResult(array $rawData): ResultInterface
    {
        // TODO: Implement parseResult() method.
    }
}
