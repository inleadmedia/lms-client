<?php

namespace LMS\Result;

use LMS\Request\RequestInterface;

/**
 * Class Availability
 *
 * @package LMS\Result
 */
class Availability implements AvailabilityResultInterface {

  /**
   * @var \LMS\Request\RequestInterface
   */
  protected $request;

  /**
   * Availability constructor.
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
