<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Get all the php Hook by name of Hook
// CZ: Načtení všech php dat z Hook podle jména Hook
$JAK_HOOK_SEARCH = $jakhooks->jakGethook("tpl_search");

// Reset vars
$JAK_SEARCH_WORD_RESULT = $JAK_SEARCH_CLOUD = $SearchInput = FALSE;

// Include the class
include_once 'class/class.search.php';

// Now do the dirty work with the post vars
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jakSH']) || !empty($page1)) {

  // EN: Default Variable
  // CZ: Hlavní proměnné
  $defaults = $_POST;

  if (isset($_POST['jakSH'])) {

    if (empty($page1) && $defaults['jakSH'] == '') {
      $errors['e1'] = $tl['searching']['stxt3'] . '<br>';
    }

    if (empty($page1) && strlen($defaults['jakSH']) < '3') {
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
      $SearchInput = filter_var($defaults['jakSH'], FILTER_SANITIZE_STRING);
    }
    $SearchInput = strtolower(smartsql($SearchInput));

    // EN: Get all the php Hook by name of Hook for search
    // CZ: Načtení všech php dat z Hook podle jména Hook pro vyhledávání
    $hooktags = $jakhooks->jakGethook("php_search");
    if ($hooktags) foreach ($hooktags as $th) {
      eval($th["phpcode"]);
    }

    // Standard search for all pages
    $pages = new JAK_search($SearchInput);
    $pages->jakSettable(array('1' => 'pages', '2' => 'categories'), "t1.catid = t2.id"); // array for pages and cat
    $pages->jakAndor("OR"); // We do an OR so it will search thru title and content and display one of them
    $pages->jakFieldactive("active"); // Only if the page is active
    $pages->jakFieldcut("content"); // The content will be cuted to fit nicely
    $pages->jakFieldstosearch(array('t1.title', 't1.content')); // This fields will be searched
    $pages->jakFieldstoselect("t2.varname, t1.title" . ", t1.content" . ", t2.catorder, t2.catparent"); // This will be the output for the template, packed in a array

    // Load the page array into template
    $JAK_SEARCH_RESULT = $pages->set_result('', '', ''); // Now result the search and pack it into the array

    if (JAK_NEWS_ACTIVE) {
      // Standard search for all news
      $news = new JAK_search($SearchInput);
      $news->jakSettable("news", ''); // array for pages and cat
      $news->jakAndor("OR"); // We do an OR so it will search thru title and content and display one of them
      $news->jakFieldactive("active"); // Only if the page is active
      $news->jakFieldtitle("title");
      $news->jakFieldcut("content"); // The content will be cuted to fit nicely
      $news->jakFieldstosearch(array('title', 'content')); // This fields will be searched
      $news->jakFieldstoselect("id, title" . ", content"); // This will be the output for the template, packed in a array

      $JAK_SEARCH_RESULT_NEWS = $news->set_result(JAK_PLUGIN_VAR_NEWS, 'a', 1);
    }

    // Fire the search for the template
    $JAK_SEARCH_USED = TRUE;

    if ((is_array($JAK_SEARCH_RESULT) || is_array($JAK_SEARCH_RESULT_NEWS)) && !$page1) {
      JAK_search::search_cloud($SearchInput);
    }

  }
}

// Always tell the searchword
$JAK_SEARCH_WORD_RESULT = $SearchInput;
$JAK_SEARCH_CLOUD       = JAK_tags::jakGettagcloud('search', 'searchlog', $jkv["taglimit"], $jkv["tagmaxfont"], $jkv["tagminfont"], $tl["title_element"]["tel"]);

// EN: Set data for the frontend page - Title, Description, Keywords and other ...
// CZ: Nastavení dat pro frontend stránku - Titulek, Popis, Klíčová slova a další ...
$PAGE_TITLE   = $jkv["searchtitle"];
$PAGE_CONTENT = $jkv["searchdesc"];
$PAGE_SHOWTITLE = 1;

// Get the sort orders for the grid
$JAK_HOOK_SIDE_GRID = FALSE;
$grid               = $envodb->query('SELECT id, hookid, pluginid, whatid, orderid FROM ' . DB_PREFIX . 'pagesgrid WHERE plugin = 999999 ORDER BY orderid ASC');
while ($grow = $grid->fetch_assoc()) {
  // EN: Insert each record into array
  // CZ: Vložení získaných dat do pole
  $JAK_HOOK_SIDE_GRID[] = $grow;
}

// Now get the new meta keywords and description maker
$PAGE_KEYWORDS    = str_replace(" ", " ", JAK_Base::jakCleanurl($tl["placeholder"]["plc"]) . ($JAK_SEARCH_CLOUD ? "," . strip_tags($JAK_SEARCH_CLOUD) : "") . ($jkv["metakey"] ? "," . $jkv["metakey"] : ""));
$PAGE_DESCRIPTION = $jkv["metadesc"];

// EN: Load the php template
// CZ: Načtení php template (šablony)
$template = 'search.php';

?>