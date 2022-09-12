<?php

namespace LMS\Request;

use LMS\Result\ResultInterface;

/**
 * Class Branches.
 */
class Branches implements BranchesRequestInterface {

    /**
     * @inheritDoc
     */
    public function getUri(): string {
        return 'branches';
    }

    /**
     * @inheritDoc
     */
    public function getParameters(): array {
        return [];
        // TODO: Implement getParameters() method.
    }

    /**
     * @inheritDoc
     */
    public function parseResult(array $rawData): ResultInterface {
        // TODO: Implement parseResult() method.
    }

}
