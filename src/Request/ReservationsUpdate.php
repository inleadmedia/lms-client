<?php


namespace LMS\Request;


class ReservationsUpdate implements ReservationsRequestInterface {

  private $username;
  private $password;
  private $reservationOptions = [];

  public function __construct($username, $password, $reservationOptions) {
    $this->username = $username;
    $this->password = $password;
    $this->reservationOptions = $reservationOptions;
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
      'reservationId' => $this->reservationOptions['reservationId'],
      'branchId' => $this->reservationOptions['branchId'],
      'to' => $this->reservationOptions['to'],
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
