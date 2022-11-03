<?php
namespace MRBS\Session;

use MRBS\User;
use function MRBS\auth;
use function MRBS\get_form_var;
use function MRBS\is_ajax;

// Uses PHP's built-in session handling

class SessionPhp extends SessionWithLogin
{

  public function __construct()
  {
    global $auth, $server;

    parent::__construct();

    // Check to see if we've been inactive for longer than allowed and if so logout
    // the user
    if (!empty($auth['session_php']['inactivity_expire_time'])) {
      if (isset($_SESSION['LastActivity']) &&
        ((time() - $_SESSION['LastActivity']) > $auth['session_php']['inactivity_expire_time'])) {
        $this->logoffUser();
      }
      // Ajax requests don't count as activity, unless it's the special Ajax request used
      // to record client side activity.
      $activity = get_form_var('activity', 'int');
      if ($activity || !is_ajax() || !isset($_SESSION['LastActivity'])) {
        $_SESSION['LastActivity'] = time();
      }
    }

    // Move the current page to the last page, so it can be used as a referrer, and store the new current page -
    // but only if (a) we are at the top level of the MRBS web directory (eg index.php) so as to eliminate all
    // the ./js, ./ajax and ./css pages and (b) this is not otherwise an Ajax request, eg one of the prefetch
    // calls to index.php.
    if (isset($server['SCRIPT_FILENAME']) && (MRBS_ROOT === dirname($server['SCRIPT_FILENAME'])) &&
        !(isset($server['HTTP_X_REQUESTED_WITH']) && ($server['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest')))
    {
      $this->updatePage($server['REQUEST_URI'] ?? $server['PHP_SELF'] ?? null);
    }
  }


  // If the server has a Referrer-Policy of strict-origin then HTTP_REFERER will be unreliable
  // and it is better to use the last page that we have stored in the $_SESSION variable.
  public function getReferrer(): ?string
  {
    $result = parent::getReferrer();

    if (isset($result) && isset($_SESSION['last_page']))
    {
      $result = $_SESSION['last_page'];
    }

    return $result;
  }


  public function updatePage(?string $url): void
  {
    $_SESSION['last_page'] = $_SESSION['this_page'] ?? null;
    $_SESSION['this_page'] = $url;
  }


  public function getCurrentUser() : ?User
  {
    return $_SESSION['user'] ?? null;
  }


  protected function logonUser(string $username) : void
  {
    $user = auth()->getUser($username);

    // As a defence against session fixation, regenerate
    // the session id and delete the old session.
    session_regenerate_id(true);
    $_SESSION['user'] = $user;

    // Problems have been reported on Windows IIS with session data not being
    // written out without a call to session_write_close()
    session_write_close();
  }


  public function logoffUser() : void
  {
    // Unset the session variables
    session_unset();
    session_destroy();

    // Problems have been reported on Windows IIS with session data not being
    // written out without a call to session_write_close(). [Is this necessary
    // after session_destroy() ??]
    session_write_close();
  }
}
