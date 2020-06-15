<?php


namespace LMS\Request;


interface AvailabilityRequestInterface extends RequestInterface {
  /**
   * Gets object id.
   *
   * @return string
   */
  public function getId();
}
