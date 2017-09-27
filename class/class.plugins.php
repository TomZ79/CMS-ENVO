<?php

class ENVO_plugins
{
  private $data = array();
  private $case = array();
  private $sqlwhere = '';
  private $sqlwhere1 = '';

  public function __construct($active)
  {
    /*
    /	The constructor
    */

    if ($active == 1) {
      $sqlwhere = ' WHERE active = 1';
      $sqlfrom  = 'id, name, active, phpcode, sidenavhtml, usergroup';
    }
    if ($active == 2) {
      $sqlwhere = ' WHERE FIND_IN_SET(' . ENVO_USERID . ', access)';
      $sqlfrom  = 'id, name, description, active, access, pluginorder, pluginpath, phpcode, phpcodeadmin, sidenavhtml, managenavhtml, usergroup, uninstallfile, pluginversion, time';
    }

    $envoplugins = array();
    global $envodb;
    $result = $envodb->query('SELECT ' . $sqlfrom . ' FROM ' . DB_PREFIX . 'plugins' . $sqlwhere . ' ORDER BY pluginorder ASC');
    while ($row = $result->fetch_assoc()) {

      // Check if user has access to one of them
      $envoplugins[] = $row;
    }

    $this->data = $envoplugins;
  }

  public function EnvoGetarray()
  {
    // Setting up an alias, so we don't have to write $this->data every time:
    $d = $this->data;

    return $d;

  }

  public function envoAdminTopNav()
  {
    // Setting up an alias, so we don't have to write $this->data every time:
    $d = $this->data;

    foreach ($d as $c) {
      if ($c['active'] == 1 && !empty($c['sidenavhtml']))
        $case[] = $c['sidenavhtml'];
    }

    return $case;

  }

  public function envoAdminManageNav()
  {
    // Setting up an alias, so we don't have to write $this->data every time:
    $d = $this->data;

    foreach ($d as $c) {
      if ($c['active'] == 1 && !empty($c['managenavhtml']))
        $case[] = $c['managenavhtml'];
    }

    if (!empty($case)) return $case;

  }

  public function envoAdminIndex()
  {
    // Setting up an alias, so we don't have to write $this->data every time:
    $d = $this->data;

    foreach ($d as $c) {
      if ($c['active'] == 1 && !empty($c['phpcodeadmin'])) {
        $case[] = array('id' => $c['id'], 'name' => $c['name'], 'access' => $c['access'], 'phpcode' => $c['phpcodeadmin']);
      }
    }

    return $case;
  }

  public function envoSiteIndex()
  {
    // Setting up an alias, so we don't have to write $this->data every time:
    $d = $this->data;

    foreach ($d as $c) {
      if (!empty($c['phpcode']))
        $case[] = $c['phpcode'];
    }

    return $case;
  }

  public function envoAdminTag()
  {
    // Setting up an alias, so we don't have to write $this->data every time:
    $d = $this->data;

    foreach ($d as $c) {
      if ($c['active'] == 1) {
        $case[] = array('id' => $c['id'], 'name' => $c['name']);
      }
    }

    return $case;
  }

  public function getPHPcodeid($id, $field)
  {
    // Setting up an alias, so we don't have to write $this->data every time:
    $d = $this->data;

    foreach ($d as $c) {
      if ($c['id'] == $id) {
        $case = $c[$field];
      }
    }

    if (!empty($case)) return $case;

  }

  public function getIDfromName($name)
  {
    // Setting up an alias, so we don't have to write $this->data every time:
    $d = $this->data;

    foreach ($d as $c) {
      if ($c['name'] == $name) {
        $case = $c['id'];
      }
    }

    return $case;

  }

}

?>