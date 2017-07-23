<?php
/*
 * PLUGIN DOWNLOAD - POPIS SOUBORU cssheader.php
 * ----------------------------------------------
 *
 * Soubor slouží pro vložení css stylu souboru 'plugins/download/css/style.css'  do záhlaví webu - frontend
 *
 */
?>

<?php if (($page == JAK_PLUGIN_VAR_DOWNLOAD)) { ?>
  <link rel="stylesheet" href="<?php echo BASE_URL; ?>plugins/download/css/style.css" type="text/css"/>
<?php } ?>