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
function envo_get_house_info($table, $ext_seo, $usergroupid)
{
  global $envodb;
  $envodata = array();
  $result   = $envodb->query('SELECT * FROM ' . $table . ' ORDER BY id ASC');

  while ($row = $result->fetch_assoc()) {

    // Array of strings with permission of each house
    $usergrouparray = explode(',', $row['permission']);

    // Check if 'usergroupid' is in permission array or if is 'usergroupid' = 3 (administrator group) or permission is 0
    if (in_array($usergroupid, $usergrouparray) || $usergroupid == 3 || $row['permission'] == 0) {

      // There should be always a varname in categories and check if seo is valid
      $seo = '';
      if ($ext_seo) $seo = ENVO_base::envoCleanurl($row['varname']);
      $parseurl = ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET . '/house', 'h', $row['id'], $seo);

      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $envodata[] = array(
        'id'       => $row['id'],
        'name'     => $row['name'],
        'street'   => $row['street'],
        'city'     => $row['city'],
        'parseurl' => $parseurl,
      );
    }

  }

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
  $envodata = array();

  $result = $envodb->query('
            SELECT 
            
            ' . DB_PREFIX . 'intranethousenotifications.*
            
            FROM 
            ' . DB_PREFIX . 'intranethousenotifications
            
            INNER JOIN
            ' . DB_PREFIX . 'intranethousenotificationug
            
            ON
            ' . DB_PREFIX . 'intranethousenotificationug.notification_id = ' . DB_PREFIX . 'intranethousenotifications.id
            
            WHERE
            ' . DB_PREFIX . 'intranethousenotificationug.usergroup_id = ' . $usergroupid . '
            
            AND
            ' . DB_PREFIX . 'intranethousenotificationug.unread = 0
            
            ORDER BY id DESC
            
            ');

  // Determine number of rows result set
  $row_cnt = $result->num_rows;

  // Add count to array
  $envodata[] = array(
    'count'     => $row_cnt,
    'count_msg' => ''
  );

  if ($row_cnt > 0) {
    while ($row = $result->fetch_assoc()) {
      // There should be always a varname in notification and check if seo is valid
      $seo = '';
      if ($ext_seo) $seo = ENVO_base::envoCleanurl($row['varname']);
      $parseurl = ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET . '/notification', 'n', $row['id'], $seo);

      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $envodata[] = array(
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
  $envodata = array();

  $result = $envodb->query('
            SELECT 
            
            ' . DB_PREFIX . 'intranethousenotifications.*
            
            FROM 
            ' . DB_PREFIX . 'intranethousenotifications
            
            INNER JOIN
            ' . DB_PREFIX . 'intranethousenotificationug
            
            ON
            ' . DB_PREFIX . 'intranethousenotificationug.notification_id = ' . DB_PREFIX . 'intranethousenotifications.id
            
            WHERE
            ' . DB_PREFIX . 'intranethousenotificationug.usergroup_id = ' . $usergroupid . '
            
            ORDER BY id DESC
            
            ');

  // Determine number of rows result set
  $row_cnt = $result->num_rows;

  if ($row_cnt > 0) {
    while ($row = $result->fetch_assoc()) {
      // There should be always a varname in notification and check if seo is valid
      $seo = '';
      if ($ext_seo) $seo = ENVO_base::envoCleanurl($row['varname']);
      $parseurl = ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_INTRANET . '/notification', 'n', $row['id'], $seo);

      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $envodata[] = array(
        'name'     => $row['name'],
        'type'     => $row['type'],
        'content'  => $row['content'],
        'created'  => date($dateformat . $timeformat, strtotime($row['created'])),
        'parseurl' => $parseurl,
      );
    }
  } else {

  }

  if (isset($envodata)) return $envodata;
}

/**
 * EN: Get FontAwesome icon by file extensions
 * CZ: Získání FontAwesome ikon podle typu souboru
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $filename       string    | name of file
 * @return bool|string
 */
function envo_extension_icon($filename)
{
  $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

  switch ($extension) {
    case ('doc'):
      return '<i class="fa fa-file-word-o fa-2x m-l-30" style="color:#2B5796;"></i>';
      break;
    case ('docx'):
      return '<i class="fa fa-file-word-o fa-2x m-l-30" style="color:#2B5796;"></i>';
      break;
    case ('docm'):
      return '<i class="fa fa-file-word-o fa-2x m-l-30" style="color:#2B5796;"></i>';
      break;
    case ('xls'):
      return '<i class="fa fa-file-excel-o fa-2x m-l-30" style="color:#1E7145;"></i>';
      break;
    case ('xlsx'):
      return '<i class="fa fa-file-excel-o fa-2x m-l-30" style="color:#1E7145;"></i>';
      break;
    case ('xlsm'):
      return '<i class="fa fa-file-excel-o fa-2x m-l-30" style="color:#1E7145;"></i>';
      break;
    case 'pdf':
      return '<i class="fa fa-file-pdf-o fa-2x m-l-30" style="color:#EE3226;"></i>';
      break;
    case ('jpg'):
      return '<i class="fa fa-file-image-o fa-2x m-l-30" style="color:#000;"></i>';
      break;
    default:
      return FALSE;
  }
}

?>