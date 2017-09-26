<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = 'pages';
$envotable1 = 'categories';

// reset urlsep
$urlsep     = FALSE;
$specialurl = array();

// Now do the dirty work!
if (empty($page1)) {

  $sql = 'SELECT t1.*, t2.varname FROM ' . DB_PREFIX . $envotable . ' AS t1 LEFT JOIN ' . DB_PREFIX . $envotable1 . ' AS t2 ON (t1.catid = t2.id) WHERE t1.active = 1 AND t1.catid != 0 AND t2.pluginid = 0 ORDER BY t1.time DESC LIMIT ' . $jkv["rssitem"];

  $what    = 0;
  $seowhat = 0;

  $JAK_RSS_DESCRIPTION = $jkv["metadesc"];
}

// EN: Get all the php Hook by name of Hook
// CZ: Načtení všech php dat z Hook podle jména Hook
$hookrss = $jakhooks->jakGethook("php_rss");
if ($hookrss) {
  foreach ($hookrss as $hrss) {
    eval($hrss["phpcode"]);
  }
}

if (!empty($sql)) {

  $result = $envodb->query($sql);
  while ($row = $result->fetch_assoc()) {

    $PAGE_TITLE   = $row['title'];
    $PAGE_CONTENT = $row['content'];

    $Name = htmlspecialchars($PAGE_TITLE);

    if ($what == 1) {
      $whatweask = $row['id'];
    } elseif (!empty($what)) {
      $whatweask = $what;
    } else {
      if ($row['varname']) $whatweask = $row['varname'];
    }

    if ($row['content']) {
      $getStriped = envo_cut_text($PAGE_CONTENT, $jkv["shortmsg"], '...');
    } else {
      $getStriped = envo_cut_text($PAGE_TITLE, $jkv["shortmsg"], '...');
    }

    $getStripedT = str_replace('&nbsp;', "", $getStriped);

    // get the new seo title in here, where it works!
    if ($seowhat) {
      $seo = JAK_base::jakCleanurl($PAGE_TITLE);
    }

    if (isset($sURL) && !empty($sURL) && !is_array($urlsep)) {
      $parseurl = JAK_rewrite::jakParseurl($sURL, $sURL1, $whatweask, $seo, '');
    } elseif (is_array($urlsep)) {
      $slurl      = FALSE;
      $specialurl = FALSE;
      foreach ($urlsep as $r) {
        if (is_numeric($r)) {
          $specialurl[] = $row[$r];
        } else {
          $specialurl[] = JAK_base::jakCleanurl($row[$r]);
        }
      }

      if ($specialurl) $slurl = join("-", $specialurl);

      $parseurl = JAK_rewrite::jakParseurl($sURL, $slurl, '', '', '');
    } else {
      $parseurl = JAK_rewrite::jakParseurl($whatweask, '', '', '', '');
    }

    $parseurl = str_replace("//", "/", BASE_URL . $parseurl);

    $JAK_GET_RSS_ITEM[] = array('link' => $parseurl, 'title' => $Name, 'description' => trim($getStripedT), 'created' => date("r", strtotime($row['time'])));
  }

  $JAK_RSS_TITLE = $jkv["title"] . ' - RSS';
  $JAK_RSS_DATE  = date(DATE_RFC2822);

  // EN: Load the php template
  // CZ: Načtení php template (šablony)
  $template = 'rss.php';

} else {
  // EN: Redirect page
  // CZ: Přesměrování stránky
  envo_redirect(BASE_URL);
}

?>