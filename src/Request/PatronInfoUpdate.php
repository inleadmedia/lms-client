<?php


namespace LMS\Request;


class PatronInfoUpdate implements PatronInfoUpdateRequestInterface {

  protected $user;
  protected $pincode;
  protected $data;

  public function __construct($user, $pincode, $data) {
    $this->user = $user;
    $this->pincode = $pincode;
    $this->data = $data;
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
      'pin' => $this->pincode,
    ];
  }

  /**
   * @return mixed
   */
  public function getData() {
    return $this->data;
  }

  /**
   * @inheritDoc
   */
  public function parseResult(array $rawData) {
    // TODO: Implement parseResult() method.
  }

}
