<?php
namespace MRBS\Auth;


class AuthNone extends Auth
{
  /*
   * Checks if the specified username/password pair are valid.
   *
   * For this authentication scheme always validates.
   *
   * @param   string  $user   The user name
   * @param   string  $pass   The password
   * @return  string  $user   Always valid
   */
  public function validateUser(
    #[\SensitiveParameter]
    ?string $user,
    #[\SensitiveParameter]
    ?string $pass)
  {
    return $user;
  }
}
