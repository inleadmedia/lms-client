<?php


namespace LMS\Request;


class PatronInfo implements PatronInfoRequestInterface {

  protected $user;
  protected $pincode;
  protected $data = [];

  public function __construct($user, $pincode) {
    $this->user = $user;
    $this->pincode = $pincode;
  }

  /**
   * @inheritDoc
   */
  public function getUri() {
    return 'patron/info';
  }

  /**
   * @inheritDoc
   */
  public function getParameters() {
    return [
      'user' => $this->user,
      'pin' => $this->pincode
    ];
  }

  public function getData() {
    return $this->data;
  }

  public function setData($data) {
    $this->data = $data;
  }

  /**
   * @inheritDoc
   */
  public function parseResult(array $rawData) {
    // TODO: Implement parseResult() method.
  }

}
