<?php


namespace LMS\Request;


class Reservations implements ReservationsRequestInterface {

  private $username;
  private $password;
  private $data = [];

  public function __construct($username, $password) {
    $this->username = $username;
    $this->password = $password;
  }

  /**
   * @inheritDoc
   */
  public function getUri() {
    return 'patron/reservations';
  }

  /**
   * @inheritDoc
   */
  public function getParameters() {
    return [
      'user' => $this->username,
      'pin' => $this->password
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
