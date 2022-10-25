<?php

namespace LMS\Result;

interface HoldingsResultInterface extends ResultInterface
{

    /**
     * Get holdings data for given material.
     *
     * @return array
     */
    public function getHoldings(): array;
}
