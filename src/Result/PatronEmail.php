<?php

namespace LMS\Result;

use LMS\Request\RequestInterface;

/**
 * Class PatronEmail.
 */
class PatronEmail implements PatronEmailResultInterface, ResultInterface {

    /**
     * @var RequestInterface $request
     */
    protected $request;

    /**
     * @var string
     */
    protected $email;

    /**
     * @param \LMS\Request\RequestInterface $request
     */
    public function __construct(RequestInterface $request) {
        $this->request = $request;
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest(): RequestInterface {
        return $this->request;
    }

    /**
     * @return mixed
     */
    public function getEmail(): string {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email): self {
        $this->email = $email;

        return $this;
    }

}
