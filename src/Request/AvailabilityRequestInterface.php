<?php

namespace LMS\Request;

/**
 * Interface AvailabilityRequestInterface
 *
 * @package LMS\Request
 */
interface AvailabilityRequestInterface extends RequestInterface
{
    /**
     * Gets object id.
     *
     * @return string
     */
    public function getId();
}
