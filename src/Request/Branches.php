<?php


namespace LMS\Request;


class Branches implements RequestInterface {

  /**
   * @inheritDoc
   */
  public function getUri() {
    return 'branches';
  }

  /**
   * @inheritDoc
   */
  public function getParameters() {
    return [];
  }

  /**
   * @inheritDoc
   */
  public function getData() {
    return [];
  }

  /**
   * @inheritDoc
   */
  public function parseResult(array $rawData) {
    // TODO: Implement parseResult() method.
  }

}
