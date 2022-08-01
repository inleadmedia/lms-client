<?php

namespace LMS\Request;

interface AvailabilityRequestInterface extends RequestInterface
{

    /**
     * @return string
     */
    public function getId(): string;
}
