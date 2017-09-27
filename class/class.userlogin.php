<?php

class ENVO_userlogin
{

  var $username;
  protected $name = '', $email = '', $pass = '', $time = '';     //Username given on sign-up

  public function __construct()
  {
    $this->username = '';
  }

  public static function envoCheckUserData($username, $pass)
  {

    // The new password encrypt with hash_hmac
    $passcrypt = hash_hmac('sha256', $pass, DB_PASS_HASH);

    if (!filter_var($username, FILTER_VALIDATE_EMAIL)) {

      if (!preg_match('/^([a-zA-Z0-9\-_])+$/', $username)) {
        return FALSE;
      }

    }

    global $envodb;
    $result = $envodb->query('SELECT username FROM ' . DB_PREFIX . 'user WHERE (LOWER(username) = "' . strtolower($username) . '" OR email = "' . strtolower($username) . '") AND password = "' . $passcrypt . '" AND access = 1');
    if ($envodb->affected_rows > 0) {
      $row = $result->fetch_assoc();

      return $row['username'];
    } else {
      return FALSE;
    }

  }

  public static function envoLogin($name, $pass, $remember)
  {

    // The new password encrypt with hash_hmac
    $passcrypt = hash_hmac('sha256', $pass, DB_PASS_HASH);

    global $envodb;

    $result = $envodb->query('SELECT idhash, logins FROM ' . DB_PREFIX . 'user WHERE username = "' . smartsql($name) . '" AND password = "' . smartsql($passcrypt) . '"');
    $row    = $result->fetch_assoc();

    if ($row['logins'] % 10 == 0) {

      // Generate new idhash
      $nidhash = ENVO_userlogin::generateRandID();

    } else {

      if (!empty($row['idhash'])) {

        // Take old idhash
        $nidhash = $row['idhash'];

      } else {

        // Generate new idhash
        $nidhash = ENVO_userlogin::generateRandID();

      }

    }

    // Set session in database
    $result = $envodb->query('UPDATE ' . DB_PREFIX . 'user SET session = "' . smartsql(session_id()) . '", idhash = "' . smartsql($nidhash) . '", logins = logins + 1, lastactivity = NOW(), forgot = IF (forgot != 0, 0, 0) WHERE username = "' . smartsql($name) . '" AND password = "' . smartsql($passcrypt) . '"');

    $_SESSION['username'] = $name;
    $_SESSION['idhash']   = $nidhash;

    // Check if cookies are set previous (wrongly) and delete
    if (isset($_COOKIE['cmsName']) || isset($_COOKIE['cmsId'])) {
      setcookie("cmsName", "", time() - JAK_COOKIE_TIME, JAK_COOKIE_PATH);
      setcookie("cmsId", "", time() - JAK_COOKIE_TIME, JAK_COOKIE_PATH);
    }

    // Now check if remember is selected and set cookies new...
    if ($remember) {
      setcookie("cmsName", $name, time() + JAK_COOKIE_TIME, JAK_COOKIE_PATH, "", FALSE, TRUE);
      setcookie("cmsId", $nidhash, time() + JAK_COOKIE_TIME, JAK_COOKIE_PATH, "", FALSE, TRUE);
    }

  }

  public static function generateRandID()
  {
    return md5(ENVO_userlogin::generateRandStr(16));
  }

  public static function generateRandStr($length)
  {
    $randstr = "";
    for ($i = 0; $i < $length; $i++) {
      $randnum = mt_rand(0, 61);
      if ($randnum < 10) {
        $randstr .= chr($randnum + 48);
      } else if ($randnum < 36) {
        $randstr .= chr($randnum + 55);
      } else {
        $randstr .= chr($randnum + 61);
      }
    }

    return $randstr;
  }

  public static function envoUpdateLastActivity($userid)
  {

    global $envodb;
    $envodb->query('UPDATE ' . DB_PREFIX . 'user SET lastactivity = NOW() WHERE id = "' . smartsql($userid) . '"');

  }

  public static function envoForgotPassword($email, $time)
  {

    global $envodb;
    $row = $envodb->queryRow('SELECT id, username FROM ' . DB_PREFIX . 'user WHERE email = "' . smartsql($email) . '" AND access = 1 LIMIT 1');

    if ($envodb->affected_rows > 0) {

      if ($time != 0) {
        $envodb->query('UPDATE ' . DB_PREFIX . 'user SET forgot = "' . smartsql($time) . '" WHERE id = "' . smartsql($row["id"]) . '"');
      }

      return $row["username"];
    } else {
      return FALSE;
    }

  }

  public static function envoForgotActive($forgotid)
  {

    global $envodb;
    $envodb->query('SELECT id FROM ' . DB_PREFIX . 'user WHERE forgot = "' . smartsql($forgotid) . '" AND access = 1 LIMIT 1');
    if ($envodb->affected_rows > 0) {
      return TRUE;
    } else
      return FALSE;

  }

  public static function envoWriteLoginLog($username, $url, $ip, $agent, $success)
  {

    global $envodb;
    if ($success == 1) {

      $envodb->query('UPDATE ' . DB_PREFIX . 'loginlog SET access = 1 WHERE ip = "' . smartsql($ip) . '" AND time = NOW()');
    } else {

      $envodb->query('INSERT INTO ' . DB_PREFIX . 'loginlog SET name = "' . smartsql($username) . '", fromwhere = "' . smartsql($url) . '", ip = "' . smartsql($ip) . '", usragent = "' . smartsql($agent) . '", time = NOW(), access = 0');
    }

  }

  public static function envoLogout($userid)
  {

    global $envodb;

    // Delete cookies from this page
    if (isset($_COOKIE['cmsName']) || isset($_COOKIE['cmsId'])) {
      setcookie('cmsName', "", time() - JAK_COOKIE_TIME, JAK_COOKIE_PATH);
      setcookie('cmsId', "", time() - JAK_COOKIE_TIME, JAK_COOKIE_PATH);
    }

    // Update Database to session NULL
    $envodb->query('UPDATE ' . DB_PREFIX . 'user SET session = NULL, idhash = NULL WHERE id = "' . $userid . '"');

    // Unset the main sessions
    unset($_SESSION['username']);
    unset($_SESSION['idhash']);

    // Destroy session and generate new one for that user
    session_destroy();
    session_start();
    session_regenerate_id();

  }

  function envoCheckLogged()
  {

    /* Check if user has been remembered */
    if (isset($_COOKIE['cmsName']) && isset($_COOKIE['cmsId'])) {
      $_SESSION['username'] = $_COOKIE['cmsName'];
      $_SESSION['idhash']   = $_COOKIE['cmsId'];
    }

    /* Username and idhash have been set */
    if (isset($_SESSION['username']) && isset($_SESSION['idhash']) && $_SESSION['username'] != $this->username) {
      /* Confirm that username and userid are valid */
      if (!ENVO_userlogin::envoConfirmidHash($_SESSION['username'], $_SESSION['idhash'])) {
        /* Variables are incorrect, user not logged in */
        unset($_SESSION['username']);
        unset($_SESSION['idhash']);

        return FALSE;
      }

      // Return the user data
      return ENVO_userlogin::envoUserInfo($_SESSION['username']);
    } /* User not logged in */
    else {
      return FALSE;
    }
  }

  public static function envoConfirmidHash($username, $idhash)
  {

    global $envodb;

    if (isset($username)) {

      $result = $envodb->queryRow('SELECT backtogroup, backtime, idhash FROM ' . DB_PREFIX . 'user WHERE LOWER(username) = "' . smartsql(strtolower($username)) . '" AND access = 1');

      if ($envodb->affected_rows < 1) {

        return FALSE;

      } else {

        $result['idhash'] = stripslashes($result['idhash']);
        $idhash           = stripslashes($idhash);

        /* Validate that userid is correct */
        if (!is_null($result['idhash']) && $idhash == $result['idhash']) {

          // Now let's check if we need to move this user to a different usergroup
          if ($result['backtime'] != "0000-00-00" && is_numeric($result['backtogroup']) && (time() >= strtotime($result['backtime']))) {
            $envodb->query('UPDATE ' . DB_PREFIX . 'user SET usergroupid = "' . $result['backtogroup'] . '", backtime = "0000-00-00", backtogroup = 0 WHERE LOWER(username) = "' . smartsql(strtolower($username)) . '" AND usergroupid != 3 AND access = 1');
          }

          return TRUE; //Success! Username and idhash confirmed

        } else {
          return FALSE; //Indicates idhash invalid
        }

      }
    } else {
      return FALSE;
    }

  }

  public static function envoUserInfo($username)
  {

    global $envodb;
    $result = $envodb->queryRow('SELECT * FROM ' . DB_PREFIX . 'user WHERE LOWER(username) = "' . smartsql(strtolower($username)) . '" AND access = 1');
    if (!$result || $envodb->affected_rows < 1) {
      return NULL;
    } else {
      return $result;
    }

  }
}

?>