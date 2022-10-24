<?php

namespace LMS\Result;

interface PatronEmailResultInterface {

    /**
     * Get patron's email.
     *
     * @return string
     */
    public function getEmail() : string;
}
