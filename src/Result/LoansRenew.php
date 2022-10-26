<?php

namespace LMS\Result;

use LMS\Request\RequestInterface;

class LoansRenew implements ResultInterface
{

    /**
     * @var \LMS\Request\RequestInterface
     */
    protected $request;

    /**
     * @var array
     */
    protected $items;

    /**
     * Loans renew constructor.
     *
     * @param \LMS\Request\RequestInterface $request
     * @param array $items
     */
    public function __construct($request, $items = [])
    {
        $this->request = $request;
        $this->items = $items;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    /**
     * Get items.
     */
    public function getItems()
    {
        return $this->items;
    }
}
