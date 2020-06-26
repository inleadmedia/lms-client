<?php

namespace LMS\Result;

/**
 * Interface DetailsInterface.
 */
interface DetailsResultInterface extends ResultInterface
{

    /**
     * Gets the actual object instance.
     *
     * @return \LMS\Object\SearchObject
     */
    public function getObject();
}
