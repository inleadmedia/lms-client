<?php


namespace LMS\Request;


use LMS\Result\Availability as AvailabilityResult;

class Availability implements AvailabilityRequestInterface {

  protected $id;

  public function __construct($id) {
    $this->id = $id;
  }

  /**
   * @inheritDoc
   */
  public function getId() {
    return $this->id;
  }

  /**
   * @inheritDoc
   */
  public function getUri() {
    return 'availability';
  }

  /**
   * @inheritDoc
   */
  public function getParameters() {
    return [
      'id' => $this->id
    ];
  }

  public function getData() {
    // TODO: Implement getData() method.
    return [];
  }

  /**
   * @inheritDoc
   */
  public function parseResult(array $rawData) {
    return new AvailabilityResult($this);
  }

}
