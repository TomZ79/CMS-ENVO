<?php

/**
 * EN: Getting the data about the city in region - House list
 * CZ: Získání dat o městech v regionu - Seznam domů
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2018
 *
 * @param $limit
 * @param $colname
 * @param $table
 * @return array
 *
 */
function envo_get_region($limit, $colname = NULL, $table, $distinct = NULL)
{

  global $envodb;
  $envodata = array ();
  $colname = (empty($colname) ? '*' : $colname);

  // EN: SQL Query
  // CZ: SQL Dotaz
  if ($distinct == '1') {
    // if $distinct = 1 , then select values by group from DB
    $result = $envodb -> query('SELECT DISTINCT ' . $colname . ' FROM ' . $table . ' ORDER BY id ASC ' . $limit);
    while ($row = $result -> fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $envodata[] = $row;
    }
  } else {
    // select all values with duplicated values
    $result = $envodb -> query('SELECT ' . $colname . ' FROM ' . $table . ' ORDER BY id ASC ' . $limit);
    while ($row = $result -> fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $envodata[] = $row;
    }
  }


  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting all the data about the TV Tower with limit
 * CZ: Získání všech dat o televizním vysílači s limitem
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $limit
 * @param $table
 * @return array
 *
 */
function envo_get_tvtower($limit, $table)
{

  global $envodb;
  $envodata = array ();

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . ' ORDER BY id ASC ' . $limit);
  while ($row = $result -> fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting all the data about the TV Channel with limit
 * CZ: Získání všech dat o televizním kanálu s limitem
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $limit
 * @param $table
 * @return array
 *
 */
function envo_get_tvchannel($limit, $table)
{

  global $envodb;
  $envodata = array ();

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . ' ORDER BY id ASC ' . $limit);
  while ($row = $result -> fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the Houses without limit
 * CZ: Získání dat o bytových domech bez limitu
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $table
 * @return array
 *
 */
function envo_get_house_info($table, $filter1 = NULL)
{
  global $envodb;
  $envodata = array ();

  $sql = '';
  if ($filter1) $sql = ' WHERE ' . $filter1;

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . $sql . ' ORDER BY id ASC');
  while ($row = $result -> fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the contacts of Houses without limit
 * CZ: Získání dat o hlavních kontaktech bytových domů bez limitu
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $id
 * @param $table
 * @return array
 *
 */
function envo_get_house_contact($id, $table)
{

  global $envodb;
  $envodata = array ();

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id ASC');
  while ($row = $result -> fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the task of Houses without limit
 * CZ: Získání dat o úkolech bytových domů bez limitu
 *
 * @author  BluesatKV
 * @version 1.0.4
 * @date    10/2017
 *
 * @param $id
 * @param $table
 * @param $dateformat
 * @return array
 */
function envo_get_house_task($id, $table, $dateformat)
{

  global $envodb;
  $envodata = array ();

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id DESC');

  while ($row = $result -> fetch_assoc()) {
    // EN: Change number to string
    // CZ: Změna čísla na text
    switch ($row['priority']) {
      case '0':
        $priority = 'Nedůležitá';
        break;
      case '1':
        $priority = 'Nízká priorita';
        break;
      case '2':
        $priority = 'Střední priorita';
        break;
      case '3':
        $priority = 'Vysoká priorita';
        break;
      case '4':
        $priority = 'Nejvyšší priorita';
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
      'id'          => $row['id'],
      'houseid'     => $row['houseid'],
      'priority'    => $priority,
      'status'      => $status,
      'title'       => $row['title'],
      'description' => $row['description'],
      'reminder'    => date($dateformat, strtotime($row['reminder'])),
      'time'        => date($dateformat, strtotime($row['time'])),
    );
  }

  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the entrance of Houses without limit
 * CZ: Získání dat o vchodech bytových domů bez limitu
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $id
 * @param $table
 * @return array
 *
 */
function envo_get_house_entrance($id, $table)
{

  global $envodb;
  $envodata = array ();

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id ASC');
  while ($row = $result -> fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the apartment of Houses without limit
 * CZ: Získání dat o bytech bytových domů bez limitu
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $id
 * @param $table
 * @return array
 *
 */
function envo_get_house_apartment($id, $table)
{

  global $envodb;
  $envodata = array ();

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id ASC');
  while ($row = $result -> fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the services of Houses without limit
 * CZ: Získání dat o servisech bytových domů bez limitu
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $id
 * @param $table
 * @return array
 *
 */
function envo_get_house_services($id, $table)
{

  global $envodb;
  $envodata = array ();

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id DESC');
  while ($row = $result -> fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the documents of Houses without limit
 * CZ: Získání dat o dokumentech bytových domů bez limitu
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $id
 * @param $table
 * @return array
 *
 */
function envo_get_house_documents($id, $table)
{

  global $envodb;
  $envodata = array ();

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id ASC');
  while ($row = $result -> fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the documents of Houses without limit
 * CZ: Získání dat o dokumentech bytových domů bez limitu
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $id
 * @param $table
 * @return array
 *
 */
function envo_get_house_image($id, $table)
{

  global $envodb;
  $envodata = array ();

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id DESC');
  while ($row = $result -> fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the data about the documents of Houses without limit
 * CZ: Získání dat o dokumentech bytových domů bez limitu
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    12/2017
 *
 * @param $id
 * @param $table
 * @return array
 *
 */
function envo_get_house_video($id, $table)
{

  global $envodb;
  $envodata = array ();

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . ' WHERE houseid = "' . smartsql($id) . '" ORDER BY id DESC');
  while ($row = $result -> fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (isset($envodata)) return $envodata;
}

/**
 * EN: Check if house exist
 * CZ: Kontrola jestli dům existuje
 *
 * @author  BluesatKV
 * @version 1.0.2
 * @date    12/2017
 *
 * @param $ic
 * @param $table
 * @return bool
 *
 */
function envo_house_exist($ic, $table)
{
  global $envodb;

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT id FROM ' . $table . ' WHERE housefic = "' . smartsql($ic) . '" LIMIT 1');
  if ($result -> affected_rows === 1) {
    return TRUE;
  } else {
    return FALSE;
  }
}

/**
 * EN: Getting the data about the Notification without limit
 * CZ: Získání dat o Notifikacích bez limitu
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $table
 * @return array
 *
 */
function envo_get_notification_info($table)
{
  global $envodb;
  $envodata = array ();

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('SELECT * FROM ' . $table . ' ORDER BY id ASC');
  while ($row = $result -> fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = array ( 'id' => $row['id'], 'name' => $row['name'], 'type' => $row['type'], 'shortdescription' => $row['shortdescription'], 'content' => $row['content'], 'permission' => $row['permission'], 'created' => date("d.m.Y", strtotime($row["created"])) );
  }

  if (isset($envodata)) return $envodata;
}

/**
 * EN: Getting the Usergroup by plugin column names without limit
 * CZ: Získání Uživatelských skupin podle sloupců pro plugin
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $table          string
 * @param $column1        string
 * @param null $column2 string
 * @return array
 *
 */
function envo_plugin_usergroup_all($table, $column1, $column2 = NULL)
{
  global $envodb;
  $envodata = array ();

  if (!empty($column1)) $sqlwhere = ' WHERE ' . $column1 . ' = 1';
  if (!empty($column1) && !empty($column2)) $sqlwhere = ' WHERE ' . $column1 . ' = 1 AND ' . $column2 . ' = 1';

  // EN: SQL Query
  // CZ: SQL Dotaz
  $result = $envodb -> query('
            SELECT id, name, description 
            FROM ' . DB_PREFIX . $table . '
            ' . $sqlwhere . '
            ORDER BY id ASC
            ');

  while ($row = $result -> fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  return $envodata;
}

/**
 * EN: Get FontAwesome icon by file extensions
 * CZ: Získání FontAwesome ikon podle typu souboru
 *
 * @author  BluesatKV
 * @version 1.0.2
 * @date    09/2018
 *
 * @param $filename       string    | name of file
 * @return bool|string
 */
function envo_extension_icon($filename)
{
  $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

  switch ($extension) {
    case ('doc'):
      return '<i class="fa fa-file-word-o fa-2x" style="color:#2B5796;"></i>';
      break;
    case ('docx'):
      return '<i class="fa fa-file-word-o fa-2x" style="color:#2B5796;"></i>';
      break;
    case ('docm'):
      return '<i class="fa fa-file-word-o fa-2x" style="color:#2B5796;"></i>';
      break;
    case ('xls'):
      return '<i class="fa fa-file-excel-o fa-2x" style="color:#1E7145;"></i>';
      break;
    case ('xlsx'):
      return '<i class="fa fa-file-excel-o fa-2x" style="color:#1E7145;"></i>';
      break;
    case ('xlsm'):
      return '<i class="fa fa-file-excel-o fa-2x" style="color:#1E7145;"></i>';
      break;
    case 'pdf':
      return '<i class="fa fa-file-pdf-o fa-2x" style="color:#EE3226;"></i>';
      break;
    case ('jpg'):
      return '<i class="fa fa-file-image-o fa-2x" style="color:#000;"></i>';
      break;
    case ('ai'):
      return '<i class="techicon-adobe-ai fa-2x"></i>';
      break;
    default:
      return FALSE;
  }
}

/**
 * EN: Delete function that deals with directories recursively
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    9/2018
 *
 * @param $target       string    | name of file
 *
 * @example delete_files('/path/for/the/directory/');
 */
function delete_files($target)
{
  if (is_dir($target)) {
    $files = glob($target . '*', GLOB_MARK); //GLOB_MARK adds a slash to directories returned

    foreach ($files as $file) {
      delete_files($file);
    }

    rmdir($target);
  } elseif (is_file($target)) {
    unlink($target);
  }
}

?>