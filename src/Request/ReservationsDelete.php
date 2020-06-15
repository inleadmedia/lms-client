<?php


namespace LMS\Request;


class ReservationsDelete implements ReservationsRequestInterface {
  private $username;
  private $password;
  private $reservationId;

  public function __construct($username, $password, $reservationId) {
    $this->username = $username;
    $this->password = $password;
    $this->reservationId = $reservationId;
  }

  /**
   * Gets uri path component for current action.
   *
   * @return string
   *   Uri path component where actual action can be accessed.
   */
  public function getUri() {
    return 'patron/reservations';
  }

  /**
   * Gets the request parameters for current action.
   *
   * @return array
   *   A set of parameters to be sent with the request.
   */
  public function getParameters() {
    return [
      'user' => $this->username,
      'pin' => $this->password,
      'reservationId' => $this->reservationId,
    ];
  }

  public function getData() {
    return [];
  }

  /**
   * Parses the raw result into an usable object.
   *
   * @param array $rawData
   *   Raw result from service.
   *
   * @return \LMS\Result\ResultInterface
   *   Raw result.
   */
  public function parseResult(array $rawData) {
    // TODO: Implement parseResult() method.
  }
}
