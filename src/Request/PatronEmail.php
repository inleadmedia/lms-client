<?php

namespace LMS\Request;

use LMS\Result\ResultInterface;

/**
 * Class PatronEmail.
 */
class PatronEmail implements PatronEmailRequestInterface, RequestInterface {

    /**
     * @var string
     */
    private $user;

    public function __construct($user) {
        $this->user = $user;
    }

    /**
     * @inheritdoc
     */
    public function getUri(): string {
        return 'patron/email';
    }

    /**
     * @inheritdoc
     */
    public function getParameters(): array {
        return [
            'user' => $this->user,
        ];
    }

    /**
     * @inheritdoc
     */
    public function parseResult(array $rawData): ResultInterface {
        return (new \LMS\Result\PatronEmail($this))->setEmail($rawData['email'] ?? '');
    }

}
