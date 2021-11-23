<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/todo.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Important all Class and functions
// CZ: Import všech tříd a funkcí
require "../../class/class.todo.php";

// EN: Detecting AJAX Requests
// CZ: Detekce AJAX Požadavku
if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || !$envouser->envoAdminAccess($envouser->getVar("usergroupid"))) die("Nothing to see here");

if (isset($_GET['id'])) $id = (int)$_GET['id'];

try {

  switch ($_GET['action']) {
    case 'delete':
      ENVO_todo::delete($id);
      break;

    case 'rearrange':
      ENVO_todo::rearrange($_GET['positions']);
      break;

    case 'edit':
      ENVO_todo::edit($id, $_GET['text']);
      break;

    case 'done':
      ENVO_todo::done($id);
      break;

    case 'admin':
      ENVO_todo::done($id);
      break;

    case 'new':
      ENVO_todo::createNew($_GET['text']);
      break;
  }

} catch (Exception $e) {
//	echo $e->getMessage();
  die("0");
}

die("1");
?>