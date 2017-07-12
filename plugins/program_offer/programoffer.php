<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// Functions we need for this plugin
include_once 'functions.php';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'programoffertvchannel';
$envotable1 = DB_PREFIX . 'programoffertvtower';
$envotable2 = DB_PREFIX . 'programoffertvprogram';

$CHECK_USR_SESSION = session_id();


// -------- DATA FOR FRONTEND PAGE --------

// EN: Getting the data about the TV Tower
// CZ: Získání dat o televizním vysílači
$result      = $jakdb->query('SELECT * FROM ' . $envotable1  . ' ORDER BY id ASC');
while ($row = $result->fetch_assoc()) {
  // EN: Insert each record into array
  // CZ: Vložení získaných dat do pole
  $JAK_TVTOWER[] = array('id' => $row['id'], 'active' => $row['active'], 'name' => $row['name'], 'varname' => $row['varname'], 'station' => $row['station']);
}

// EN: Getting the data about the channel of TV Tower
// CZ: Získání dat o kanálu televizního vysílače
$JAK_TVCHANNEL_ALL = envo_get_tvchannel_info($envotable);

// EN: Getting the data about the programs of channel
// CZ: Získání dat o programech z kanálu
$JAK_TVPROGRAM_ALL = envo_get_tvprogram_info($envotable2);

// EN: Getting count of active programs ( if not save in archiv )
// CZ: Získání počtu aktivních programů ( pokud není program uložen v archivu )
$result = $jakdb->query('SELECT COUNT(*) as totalAll FROM ' . $envotable2 . ' WHERE towerid > 0 AND channelid > 0');
$row    = $result->fetch_assoc();

$COUNT_TVPROGRAM_ALL = $row['totalAll'];

// Check if we have a language and display the right stuff
$PAGE_TITLE              = $jkv["programoffertitle"];
$MAIN_PLUGIN_DESCRIPTION = $ca['metadesc'];
$MAIN_SITE_DESCRIPTION   = $jkv['metadesc'];

$PAGE_KEYWORDS = str_replace(" ", " ", JAK_Base::jakCleanurl($PAGE_TITLE) . ($keylist ? "," . $keylist : "") . ($ca["metakey"] ? "," . $ca["metakey"] : ""));

// SEO from the category content if available
if (!empty($MAIN_PLUGIN_DESCRIPTION)) {
  $PAGE_DESCRIPTION = envo_cut_text($MAIN_PLUGIN_DESCRIPTION, 155, '');
} else {
  $PAGE_DESCRIPTION = envo_cut_text($MAIN_SITE_DESCRIPTION, 155, '');
}

// EN: Load the template
// CZ: Načti template (šablonu)
$pluginbasic_template = 'plugins/program_offer/template/programoffer.php';
$pluginsite_template  = 'template/' . ENVO_TEMPLATE . '/plugintemplate/program_offer/programoffer.php';

if (file_exists($pluginsite_template)) {
  $plugin_template = $pluginsite_template;
} else {
  $plugin_template = $pluginbasic_template;
}

?>