<?php

namespace LMS\Request;

interface AuthenticateRequestInterface
{

    /**
     * @return string
     */
    public function getName(): string;

    /**
     * @return string
     */
    public function getPin(): string;
}
