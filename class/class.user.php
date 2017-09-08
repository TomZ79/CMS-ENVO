<?php

class JAK_user
{
  private $data;
  private $jakvar = 0;
  private $useridarray;
  private $username = '';
  private $userid = '';

  public function __construct($row)
  {
    /*
    /	The constructor
    */

    $this->data = $row;
  }

  function jakAdminaccess($jakvar)
  {
    // check if user is in group 3
    if ($jakvar == 3) {
      return TRUE;
    } else {
      return FALSE;
    }

  }

  function jakSuperadminaccess($jakvar)
  {
    $useridarray = explode(',', JAK_SUPERADMIN);
    // check if userid exist in db.php
    if (in_array($jakvar, $useridarray)) {
      return TRUE;
    } else {
      return FALSE;
    }

  }

  function jakLangaccess($adminid)
  {
    $useridarray = explode(',', JAK_ADMIN);
    // check if userid exist in db.php
    if (JAK_MULTILANG) {
      return TRUE;

    } elseif (!JAK_MULTILANG && in_array($adminid, $useridarray)) {

      return TRUE;
    } else {
      return FALSE;
    }

  }

  function jakModuleaccess($userid, $accessids)
  {
    $useridarray = explode(',', $accessids);
    // check if user is superadmin
    if (JAK_SUPERADMINACCESS) {
      return TRUE;
    } else if (in_array($userid, $useridarray)) {
      return TRUE;
    } else {
      return FALSE;
    }

  }

  function getVar($jakvar)
  {

    // Setting up an alias, so we don't have to write $this->data every time:
    $d = $this->data;

    if (isset($d[$jakvar])) return $d[$jakvar];

  }
}

?>