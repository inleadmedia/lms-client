<?php

namespace LMS\Result;

use LMS\Request\RequestInterface;

class Debts implements ResultInterface
{

    /**
     * @var \LMS\Request\RequestInterface
     */
    protected RequestInterface $request;

    /**
     * LMS Debts results constructor.
     * @param \LMS\Request\RequestInterface $request
     */
    public function __construct(RequestInterface $request)
    {
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }
}
