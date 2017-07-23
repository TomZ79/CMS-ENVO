<?php

// EN: Get name of current page
// CZ: Získání názvu aktuální stránky
$current_pages = trim($_SERVER['REQUEST_URI'], '/');

// Get the database stuff from the url mapping
$umrow = $jakdb->queryRow('SELECT urlnew, redirect FROM ' . DB_PREFIX . 'urlmapping WHERE urlold = "' . smartsql($current_pages) . '" AND active = 1 LIMIT 1');
if ($jakdb->affected_rows === 1) {
  envo_redirect(BASE_URL . $umrow["urlnew"], $umrow["redirect"]);
}
?>