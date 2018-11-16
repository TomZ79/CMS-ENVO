<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/int_table_addnew_apt.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// PHP CODE and DB
//-------------------------

$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'int_houseanalytics ORDER BY id ASC');

// Reset
$envodata = '';

// Create HTML Output
$envodata .= '<table id="int_table" class="table table-striped table-hover">
            <thead>
            <tr>
              <th class="no-sort">Název domu</th>
              <th class="no-sort">Město</th>
              <th class="no-sort">Ulice</th>
              <th class="no-sort">IČ</th>
            </tr>
            </thead>
            <tbody>';

while ($row = $result -> fetch_assoc()) {

  $envodata .= '<tr>  
                   <td>' . $Html -> addAnchor('', $row["name"], '', 'xxxx', array ( 'data-value' => $row["id"] )) . '</td>  
                   <td>' . $row["city"] . '</td>  
                   <td>' . $row["street"] . '</td>  
                   <td>' . $Html -> addAnchor('', $row["ic"], '', 'xxxx', array ( 'data-value' => $row["id"] )) . '</td>  
                </tr>  
               ';

}

$envodata .= '</tbody></table>';

// RETURN HTML OUTPUT
//-------------------------
echo $envodata;

?>