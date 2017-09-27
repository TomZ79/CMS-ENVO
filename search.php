<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Get all the php Hook by name of Hook
// CZ: Načtení všech php dat z Hook podle jména Hook
$ENVO_HOOK_SEARCH = $envohooks->EnvoGethook("tpl_search");

// Reset vars
$ENVO_SEARCH_WORD_RESULT = $ENVO_SEARCH_CLOUD = $SearchInput = FALSE;

// Include the class
include_once 'class/class.search.php';

// Now do the dirty work with the post vars
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envoSH']) || !empty($page1)) {

  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

  if (isset($_POST['envoSH'])) {

    if (empty($page1) && $defaults['envoSH'] == '') {
      $errors['e1'] = $tl['searching']['stxt3'] . '<br>';
    }

    if (empty($page1) && strlen($defaults['envoSH']) < '3') {
      $errors['e2'] = $tl['searching']['stxt4'] . '<br>';
    }

  }

  if (count($errors) > 0) {
    $errors['e'] = $tl['searching']['stxt5'] . '<br>';
    $errors      = $errors;
  } else {

    if (!empty($page1)) {
      $SearchInput = filter_var($page1, FILTER_SANITIZE_STRING);
    } else {
      $SearchInput = filter_var($defaults['envoSH'], FILTER_SANITIZE_STRING);
    }
    $SearchInput = strtolower(smartsql($SearchInput));

    // EN: Get all the php Hook by name of Hook for search
    // CZ: Načtení všech php dat z Hook podle jména Hook pro vyhledávání
    $hooktags = $envohooks->EnvoGethook("php_search");
    if ($hooktags) foreach ($hooktags as $th) {
      eval($th["phpcode"]);
    }

    // Standard search for all pages
    $pages = new ENVO_search($SearchInput);
    $pages->envoSetTable(array('1' => 'pages', '2' => 'categories'), "t1.catid = t2.id"); // array for pages and cat
    $pages->envoAndor("OR"); // We do an OR so it will search thru title and content and display one of them
    $pages->envoFieldActive("active"); // Only if the page is active
    $pages->envoFieldCut("content"); // The content will be cuted to fit nicely
    $pages->envoFieldstoSearch(array('t1.title', 't1.content')); // This fields will be searched
    $pages->envoFieldstoSelect("t2.varname, t1.title" . ", t1.content" . ", t2.catorder, t2.catparent"); // This will be the output for the template, packed in a array

    // Load the page array into template
    $ENVO_SEARCH_RESULT = $pages->set_result('', '', ''); // Now result the search and pack it into the array

    if (ENVO_NEWS_ACTIVE) {
      // Standard search for all news
      $news = new ENVO_search($SearchInput);
      $news->envoSetTable("news", ''); // array for pages and cat
      $news->envoAndor("OR"); // We do an OR so it will search thru title and content and display one of them
      $news->envoFieldActive("active"); // Only if the page is active
      $news->envoFieldTitle("title");
      $news->envoFieldCut("content"); // The content will be cuted to fit nicely
      $news->envoFieldstoSearch(array('title', 'content')); // This fields will be searched
      $news->envoFieldstoSelect("id, title" . ", content"); // This will be the output for the template, packed in a array

      $ENVO_SEARCH_RESULT_NEWS = $news->set_result(ENVO_PLUGIN_VAR_NEWS, 'a', 1);
    }

    // Fire the search for the template
    $ENVO_SEARCH_USED = TRUE;

    if ((is_array($ENVO_SEARCH_RESULT) || is_array($ENVO_SEARCH_RESULT_NEWS)) && !$page1) {
      ENVO_search::search_cloud($SearchInput);
    }

  }
}

// Always tell the searchword
$ENVO_SEARCH_WORD_RESULT = $SearchInput;
$ENVO_SEARCH_CLOUD       = ENVO_tags::envoGettagcloud('search', 'searchlog', $jkv["taglimit"], $jkv["tagmaxfont"], $jkv["tagminfont"], $tl["title_element"]["tel"]);

// EN: Set data for the frontend page - Title, Description, Keywords and other ...
// CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
$PAGE_TITLE   = $jkv["searchtitle"];
$PAGE_CONTENT = $jkv["searchdesc"];
$PAGE_SHOWTITLE = 1;

// Get the sort orders for the grid
$ENVO_HOOK_SIDE_GRID = FALSE;
$grid               = $envodb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = 999999 ORDER BY orderid ASC');
while ($grow = $grid->fetch_assoc()) {
  // EN: Insert each record into array
  // CZ: Vložení získaných dat do pole
  $ENVO_HOOK_SIDE_GRID[] = $grow;
}

// Now get the new meta keywords and description maker
$PAGE_KEYWORDS    = str_replace(" ", " ", ENVO_base::envoCleanurl($tl["placeholder"]["plc"]) . ($ENVO_SEARCH_CLOUD ? "," . strip_tags($ENVO_SEARCH_CLOUD) : "") . ($jkv["metakey"] ? "," . $jkv["metakey"] : ""));
$PAGE_DESCRIPTION = $jkv["metadesc"];

// EN: Load the php template
// CZ: Načtení php template (šablony)
$template = 'search.php';

?>