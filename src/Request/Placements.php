<?php

namespace LMS\Request;

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
    public function getUri()
    {
        return 'placements';
    }

    /**
     * @inheritDoc
     */
    public function getParameters()
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
    public function parseResult(array $rawData)
    {
        // TODO: Implement parseResult() method.
    }
}
