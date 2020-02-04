<?php

namespace LMS\Request;

/**
 * Interface DetailsRequestInterface.
 */
interface DetailsRequestInterface extends RequestInterface
{
    /**
     * Gets object id.
     *
     * @return string
     */
    public function getId();
}
