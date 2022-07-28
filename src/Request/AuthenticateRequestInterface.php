<?php

namespace LMS\Request;

interface AuthenticateRequestInterface
{
    public function getName();

    public function getPin();
}
