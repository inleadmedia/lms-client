<?php

namespace LMS\Result;

interface AvailabilityResultInterface extends ResultInterface
{

    /**
     * Get availability result.
     *
     * @return array
     */
    public function getAvailability(): array;
}
