<?php

class ENVO_user
{
  private $data;
  private $envovar = 0;
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

  function envoAdminAccess($envovar)
  {
    // check if user is in group 3
    if ($envovar == 3) {
      return TRUE;
    } else {
      return FALSE;
    }

  }

  function envoSuperAdminAccess($envovar)
  {
    $useridarray = explode(',', ENVO_SUPERADMIN);
    // check if userid exist in db.php
    if (in_array($envovar, $useridarray)) {
      return TRUE;
    } else {
      return FALSE;
    }

  }

  function envoLangAccess($adminid)
  {
    $useridarray = explode(',', ENVO_ADMIN);
    // check if userid exist in db.php
    if (ENVO_MULTILANG) {
      return TRUE;

    } elseif (!ENVO_MULTILANG && in_array($adminid, $useridarray)) {

      return TRUE;
    } else {
      return FALSE;
    }

  }

  function envoModuleAccess($userid, $accessids)
  {
    $useridarray = explode(',', $accessids);
    // check if user is superadmin
    if (ENVO_SUPERADMINACCESS) {
      return TRUE;
    } else if (in_array($userid, $useridarray)) {
      return TRUE;
    } else {
      return FALSE;
    }

  }

  function getVar($envovar)
  {

    // Setting up an alias, so we don't have to write $this->data every time:
    $d = $this->data;

    if (isset($d[$envovar])) return $d[$envovar];

  }
}

?>