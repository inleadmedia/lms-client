<?php

namespace LMS\Result;

use LMS\Request\RequestInterface;

/**
 * Class Holdings
 *
 * @package LMS\Result
 */
class Holdings implements HoldingsResultInterface {

  /**
   * @var \LMS\Request\RequestInterface
   */
  protected $request;

  /**
   * Holdings constructor.
   *
   * @param \LMS\Request\RequestInterface $request
   */
  public function __construct(RequestInterface $request) {
    $this->request = $request;
  }

  /**
   * @inheritDoc
   */
  public function getRequest() {
    return $this->request;
  }

}
