<?php


namespace LMS\Request;


use LMS\Result\Holdings as HoldingsResult;

class Holdings implements HoldingsRequestInterface {

  protected $id;

  public function __construct($id) {
    $this->id = $id;
  }

  public function getId() {
    return $this->id;
  }

  /**
   * @inheritDoc
   */
  public function getUri() {
    return 'holdings';
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
    return new HoldingsResult($this);
  }

}
