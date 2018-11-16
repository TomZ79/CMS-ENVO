<?php

/**
 * EN: Getting the data about the Houses without limit by usergroupid
 * CZ: Získání dat o bytových domech bez limitu podle 'id' uživatelské skupiny
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $table
 * @param $ext_seo
 * @param $usergroupid
 * @return array
 */
function envo_get_house_info($table, $ext_seo, $usergroupid, $filter1 = NULL)
{
  global $envodb;
  $envodata = array ();

  $sql = '';
  if ($filter1) $sql = ' WHERE ' . $filter1;

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . $sql . ' ORDER BY id ASC');

  while ($row = $result -> fetch_assoc()) {

    // Array of strings with permission of each house
    $usergrouparray = explode(',', $row['permission']);

    // Check if 'usergroupid' is in permission array or if is 'usergroupid' = 3 (administrator group) or permission is 0
    if (in_array($usergroupid, $usergrouparray) || $usergroupid == 3 || $row['permission'] == 0) {

      // There should be always a varname in categories and check if seo is valid
      $seo = '';
      if ($ext_seo) $seo = ENVO_base ::envoCleanurl($row['varname']);
      $parseurl = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET . '/house', 'h', $row['id'], $seo);

      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $envodata[] = array (
        'id'       => $row['id'],
        'name'     => $row['name'],
        'street'   => $row['street'],
        'city'     => $row['city'],
        'parseurl' => $parseurl,
      );
    }

  }

  // EN: Returning values from function
  // CZ: Vrácení hodnot z funkce
  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the Houses without limit by usergroupid
 * CZ: Získání dat o bytových domech bez limitu podle 'id' uživatelské skupiny
 *
 * @author  BluesatKV
 * @version 1.0.1
 * @date    10/2018
 *
 * @param $table
 * @param $ext_seo
 * @param $usergroupid
 * @return array
 */
function envo_get_houseanalytics_info($table, $ext_seo, $usergroupid, $filter1 = NULL)
{
  global $envodb;
  $envodata = array ();

  $sql = '';
  if ($filter1) $sql = ' WHERE ' . $filter1;

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . $sql . ' ORDER BY id ASC');

  while ($row = $result -> fetch_assoc()) {

    // Array of strings with permission of each house
    $usergrouparray = explode(',', $row['permission']);

    // Check if 'usergroupid' is in permission array or if is 'usergroupid' = 3 (administrator group) or permission is 0
    if (in_array($usergroupid, $usergrouparray) || $usergroupid == 3 || $row['permission'] == 0) {

      // There should be always a varname in categories and check if seo is valid
      $seo = '';
      if ($ext_seo) $seo = ENVO_base ::envoCleanurl($row['varname']);
      $parseurl = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET . '/houseanalytics', 'h', $row['id'], $seo);

      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $envodata[] = array (
        'id'       => $row['id'],
        'name'     => $row['name'],
        'street'   => $row['street'],
        'city'     => $row['city'],
        'parseurl' => $parseurl,
      );
    }

  }

  // EN: Returning values from function
  // CZ: Vrácení hodnot z funkce
  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about active Tasks without limit by usergroupid
 * CZ: Získání dat o aktivních Úkolech bez limitu podle 'id' uživatelské skupiny
 *
 * @author  BluesatKV
 * @version 1.0.8
 * @date    10/2017
 *
 * @param $usergroupid    integer   | Usergroup ID
 * @param $ext_seo        boolean   | TRUE or FALSE - if TRUE, show seo friendly URL
 * @param $tabs           string    | Boostrap Tabs name
 * @param $dateformat
 * @return array
 */
function envo_get_task_info($usergroupid, $ext_seo, $tabs, $dateformat)
{
  global $envodb;
  $envodata = array ();

  // EN: SQL settings for all user groups without 'Administrator'
  // CZ: Nastavení SQL pro všechny uživatelské skupiny bez skupiny 'Administrator'
  if ($usergroupid != 3) {
    $sql = 'WHERE 
            FIND_IN_SET(0, ' . DB_PREFIX . 'int_house.permission) <> 0
            OR
            FIND_IN_SET(' . $usergroupid . ', ' . DB_PREFIX . 'int_house.permission) <> 0';
  }

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('
            SELECT 
            
            ' . DB_PREFIX . 'int_housetasks.*, ' . DB_PREFIX . 'int_house.name, ' . DB_PREFIX . 'int_house.varname
            
            FROM 
            ' . DB_PREFIX . 'int_housetasks
            
            INNER JOIN
            ' . DB_PREFIX . 'int_house
            
            ON
            ' . DB_PREFIX . 'int_housetasks.houseid = ' . DB_PREFIX . 'int_house.id
            
            ' . $sql . '
            
            AND 
            ' . DB_PREFIX . 'int_housetasks.reminder < NOW()
            
            AND 
            ' . DB_PREFIX . 'int_housetasks.time > NOW()
            
            AND
            ' . DB_PREFIX . 'int_housetasks.status < 3
            
            ORDER BY priority DESC, id DESC 
            
            ');

  // EN: Determine the number of rows in the result from DB
  // CZ: Určení počtu řádků ve výsledku z DB
  $row_cnt = $result -> num_rows;
  $envodata['count_of_task'] = $row_cnt;

  while ($row = $result -> fetch_assoc()) {

    // EN: URL parsing
    // CZ: Parsování URL adresy
    $seo = '';
    if ($ext_seo) $seo = ENVO_base ::envoCleanurl($row['varname']);
    $parseurl = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET . '/house', 'h', $row['houseid'], $seo, '', '', $tabs);

    // EN: Change number to string
    // CZ: Změna čísla na text
    switch ($row['priority']) {
      case '0':
        $priority = '<span class="label">Nedůležitá</span>';
        break;
      case '1':
        $priority = '<span class="label">Nízká priorita</span>';
        break;
      case '2':
        $priority = '<span class="label label-warning">Střední priorita</span>';
        break;
      case '3':
        $priority = '<span class="label label-important">Vysoká priorita</span>';
        break;
      case '4':
        $priority = '<span class="label label-important">Nejvyšší priorita</span>';
        break;
    }

    switch ($row['status']) {
      case '0':
        $status = 'Žádný status';
        break;
      case '1':
        $status = 'Zápis';
        break;
      case '2':
        $status = 'V řešení';
        break;
      case '3':
        $status = 'Vyřešeno - Uzavřeno';
        break;
      case '4':
        $status = 'Stornováno';
        break;
    }

    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = array (
      'id'            => $row['id'],
      'houseid'       => $row['houseid'],
      'housename'     => $row['name'],
      'houseparseurl' => $parseurl,
      'priority'      => $priority,
      'status'        => $status,
      'title'         => $row['title'],
      'description'   => $row['description'],
      'reminder'      => date($dateformat, strtotime($row['reminder'])),
      'time'          => date($dateformat, strtotime($row['time'])),
      'created'       => $row['created'],
      'updated'       => $row['updated'],
    );

  }

  // EN: Returning values from function
  // CZ: Vrácení hodnot z funkce
  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the delayed Tasks without limit by usergroupid
 * CZ: Získání dat o zpožděných Úkolech bez limitu podle 'id' uživatelské skupiny
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    10/2017
 *
 * @param $usergroupid    integer   | Usergroup ID
 * @param $ext_seo        boolean   | TRUE or FALSE - if TRUE, show seo friendly URL
 * @param $tabs           string    | Boostrap Tabs name
 * @param $dateformat
 * @return array
 */
function envo_get_task_delayed_info($usergroupid, $ext_seo, $tabs, $dateformat)
{
  global $envodb;
  $envodata = array ();

  // EN: SQL settings for all user groups without 'Administrator'
  // CZ: Nastavení SQL pro všechny uživatelské skupiny bez skupiny 'Administrator'
  if ($usergroupid != 3) {
    $sql = 'WHERE 
            FIND_IN_SET(0, ' . DB_PREFIX . 'int_house.permission) <> 0
            OR
            FIND_IN_SET(' . $usergroupid . ', ' . DB_PREFIX . 'int_house.permission) <> 0';
  }

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('
            SELECT 
            
            ' . DB_PREFIX . 'int_housetasks.*, ' . DB_PREFIX . 'int_house.name, ' . DB_PREFIX . 'int_house.varname
            
            FROM 
            ' . DB_PREFIX . 'int_housetasks
            
            INNER JOIN
            ' . DB_PREFIX . 'int_house
            
            ON
            ' . DB_PREFIX . 'int_housetasks.houseid = ' . DB_PREFIX . 'int_house.id
            
            ' . $sql . '
            
            AND 
            ' . DB_PREFIX . 'int_housetasks.time < NOW()
            
            AND
            ' . DB_PREFIX . 'int_housetasks.status < 3
            
            ORDER BY priority DESC, id DESC 
            
            ');

  // EN: Determine the number of rows in the result from DB
  // CZ: Určení počtu řádků ve výsledku z DB
  $row_cnt = $result -> num_rows;
  $envodata['count_of_task'] = $row_cnt;

  while ($row = $result -> fetch_assoc()) {

    // EN: URL parsing
    // CZ: Parsování URL adresy
    $seo = '';
    if ($ext_seo) $seo = ENVO_base ::envoCleanurl($row['varname']);
    $parseurl = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET . '/house', 'h', $row['houseid'], $seo, '', '', $tabs);

    // EN: Change number to string
    // CZ: Změna čísla na text
    switch ($row['priority']) {
      case '0':
        $priority = '<span class="label">Nedůležitá</span>';
        break;
      case '1':
        $priority = '<span class="label">Nízká priorita</span>';
        break;
      case '2':
        $priority = '<span class="label label-warning">Střední priorita</span>';
        break;
      case '3':
        $priority = '<span class="label label-important">Vysoká priorita</span>';
        break;
      case '4':
        $priority = '<span class="label label-important">Nejvyšší priorita</span>';
        break;
    }

    switch ($row['status']) {
      case '0':
        $status = 'Žádný status';
        break;
      case '1':
        $status = 'Zápis';
        break;
      case '2':
        $status = 'V řešení';
        break;
      case '3':
        $status = 'Vyřešeno - Uzavřeno';
        break;
      case '4':
        $status = 'Stornováno';
        break;
    }

    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = array (
      'id'            => $row['id'],
      'houseid'       => $row['houseid'],
      'housename'     => $row['name'],
      'houseparseurl' => $parseurl,
      'priority'      => $priority,
      'status'        => $status,
      'title'         => $row['title'],
      'description'   => $row['description'],
      'reminder'      => date($dateformat, strtotime($row['reminder'])),
      'time'          => date($dateformat, strtotime($row['time'])),
      'created'       => $row['created'],
      'updated'       => $row['updated'],
    );

  }

  // EN: Returning values from function
  // CZ: Vrácení hodnot z funkce
  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the Notifications without limit by usergroupid
 * CZ: Získání dat o Notifikacích bez limitu podle 'id' uživatelské skupiny
 *
 * @author  BluesatKV
 * @version 1.0.3
 * @date    09/2017
 *
 * @param $usergroupid  integer   - Usergorup ID
 * @param $ext_seo      boolean   - TRUE or FALSE (TRUE => parseurl with add 'varname' to url)
 * @param $dateformat
 * @param $timeformat
 * @return array
 *
 * Example of returned array
 *
 *  array (
 *   0 =>
 *    array (
 *      'count' => 3,
 *      'count_msg' => 'Message for count',
 *    ),
 *    1 =>
 *    array (
 *      'id' => '1',
 *      'name' => 'Notifikace 1',
 *      'varname' => 'notifikace-1',
 *      'type' => 'info',
 *      'shortdescription' => 'Short description',
 *      'created' => 'Date by format',
 *      'parseurl' => '/intranet/house/h/1',
 *    ),
 *  )
 *
 */
function envo_get_notification_unread($usergroupid, $ext_seo, $dateformat, $timeformat)
{
  global $envodb;
  $envodata = array ();

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('
            SELECT 
            
            ' . DB_PREFIX . 'int_housenotifications.*
            
            FROM 
            ' . DB_PREFIX . 'int_housenotifications
            
            INNER JOIN
            ' . DB_PREFIX . 'int_housenotificationug
            
            ON
            ' . DB_PREFIX . 'int_housenotificationug.notification_id = ' . DB_PREFIX . 'int_housenotifications.id
            
            WHERE
            ' . DB_PREFIX . 'int_housenotificationug.usergroup_id = ' . $usergroupid . '
            
            AND
            ' . DB_PREFIX . 'int_housenotificationug.unread = 0
            
            ORDER BY id DESC
            
            ');

  // EN: Determine the number of rows in the result from DB
  // CZ: Určení počtu řádků ve výsledku z DB
  $row_cnt = $result -> num_rows;

  // Add count to array
  $envodata[] = array (
    'count'     => $row_cnt,
    'count_msg' => ''
  );

  if ($row_cnt > 0) {
    while ($row = $result -> fetch_assoc()) {
      // There should be always a varname in notification and check if seo is valid
      $seo = '';
      if ($ext_seo) $seo = ENVO_base ::envoCleanurl($row['varname']);
      $parseurl = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET . '/notification', 'n', $row['id'], $seo);

      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $envodata[] = array (
        'id'               => $row['id'],
        'name'             => $row['name'],
        'varname'          => $row['varname'],
        'type'             => $row['type'],
        'shortdescription' => $row['shortdescription'],
        'created'          => date($dateformat . $timeformat, strtotime($row['created'])),
        'parseurl'         => $parseurl,
      );
    }
  } else {

  }

  // EN: Returning values from function
  // CZ: Vrácení hodnot z funkce
  if (isset($envodata)) return $envodata;
}

/**
 * EN:
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $usergroupid
 * @param $ext_seo
 * @param $dateformat
 * @param $timeformat
 * @return array
 *
 */
function envo_get_notification_all($usergroupid, $ext_seo, $dateformat, $timeformat)
{
  global $envodb;
  $envodata = array ();

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('
            SELECT 
            
            ' . DB_PREFIX . 'int_housenotifications.*
            
            FROM 
            ' . DB_PREFIX . 'int_housenotifications
            
            INNER JOIN
            ' . DB_PREFIX . 'int_housenotificationug
            
            ON
            ' . DB_PREFIX . 'int_housenotificationug.notification_id = ' . DB_PREFIX . 'int_housenotifications.id
            
            WHERE
            ' . DB_PREFIX . 'int_housenotificationug.usergroup_id = ' . $usergroupid . '
            
            ORDER BY id DESC
            
            ');

  // EN: Determine the number of rows in the result from DB
  // CZ: Určení počtu řádků ve výsledku z DB
  $row_cnt = $result -> num_rows;

  if ($row_cnt > 0) {
    while ($row = $result -> fetch_assoc()) {
      // There should be always a varname in notification and check if seo is valid
      $seo = '';
      if ($ext_seo) $seo = ENVO_base ::envoCleanurl($row['varname']);
      $parseurl = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET . '/notification', 'n', $row['id'], $seo);

      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $envodata[] = array (
        'name'     => $row['name'],
        'type'     => $row['type'],
        'content'  => $row['content'],
        'created'  => date($dateformat . $timeformat, strtotime($row['created'])),
        'parseurl' => $parseurl,
      );
    }
  } else {

  }

  // EN: Returning values from function
  // CZ: Vrácení hodnot z funkce
  if (isset($envodata)) return $envodata;
}

/**
 * EN: Get FontAwesome icon by file extensions
 * CZ: Získání FontAwesome ikon podle typu souboru
 *
 * @author  BluesatKV
 * @version 1.0.1
 * @date    12/2017
 *
 * @param $filename       string    | name of file
 * @return bool|string
 */
function envo_extension_icon($filename)
{
  $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

  switch ($extension) {
    case ('doc'):
      return '<i class="fa fa-file-word fa-2x" style="color:#2B5796;"></i>';
      break;
    case ('docx'):
      return '<i class="fa fa-file-word fa-2x" style="color:#2B5796;"></i>';
      break;
    case ('docm'):
      return '<i class="fa fa-file-word fa-2x" style="color:#2B5796;"></i>';
      break;
    case ('xls'):
      return '<i class="fa fa-file-excel fa-2x" style="color:#1E7145;"></i>';
      break;
    case ('xlsx'):
      return '<i class="fa fa-file-excel fa-2x" style="color:#1E7145;"></i>';
      break;
    case ('xlsm'):
      return '<i class="fa fa-file-excel fa-2x" style="color:#1E7145;"></i>';
      break;
    case 'pdf':
      return '<i class="fa fa-file-pdf fa-2x" style="color:#EE3226;"></i>';
      break;
    case ('jpg'):
      return '<i class="fa fa-file-image fa-2x" style="color:#000;"></i>';
      break;
    case ('ai'):
      return '<i class="techicon-adobe-ai fa-2x"></i>';
      break;
    default:
      return FALSE;
  }
}

?>