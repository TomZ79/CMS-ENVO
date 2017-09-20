<?php
/*
 * AKP Help - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.cmshelp.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.cmshelp.js'
 *
 */

if ($page == 'cmshelp') {

  echo PHP_EOL . '<!-- Start JS AKP Help -->';

  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Code-prettify CSS
  echo $Html->addStylesheet('assets/plugins/code-prettify-master/themes/atelier_sulphurpool_light/atelier-sulphurpool-light.min.css');

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Code-prettify JS
  echo $Html->addScript('assets/plugins/code-prettify-master/src/prettify.js');
  // Plugin Javascript
  echo $Html->addScript('assets/js/script.cmshelp.js');

  ?>

  <script>
    // Init Code-Prettify
    window.onload = (function () {
      prettyPrint();
    });
  </script>

  <?php

  echo PHP_EOL . '<!-- End JS AKP Help -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>

<style>
  /*  */
  .secondary-sidebar {
    height: calc(100% - 60px) !important;
    overflow-y: auto;
    width: 330px !important;
  }

  .secondary-sidebar .main-menu > li a {
    padding: 0;
    font-size: 13px;
  }

  .secondary-sidebar .main-menu > li a:hover {
    color: #48B0F7;
    background-color: transparent;
  }

  .secondary-sidebar .main-menu > li a:focus {
    background-color: transparent;
  }

  .secondary-sidebar .main-menu > li.active > a > .title::after {
    top: 4.5px;
  }

  /* hide inactive submenu */
  .nav ul.sub-menu,
  .nav ul.sub-menu ul.sub-menu-child{
    display: none;
  }

  /* show active submenu */
  .nav > .active > ul.sub-menu,
  .nav > .active > ul.sub-menu > .active > ul.sub-menu-child {
    display: block;
  }

  /*  */
  .secondary-sidebar .sub-menu-child {
    margin-left: 23px;
  }

  .secondary-sidebar .sub-menu li.active  .sub-menu-child li a {
    color: rgba(120, 129, 149, 0.5) !important;
  }

  .secondary-sidebar .sub-menu li.active  .sub-menu-child li.active a {
    color: #FFF !important;
  }

  .secondary-sidebar .sub-menu li.active  .sub-menu-child li a:hover {
    color: #48B0F7 !important;
    background-color: transparent;
  }

  /*  */
  .inner-content {
    margin-left: 330px;
  }

  /*  */
  .scrollspyoffset {
    padding-top: 56px;
    margin-top: -56px;
    margin-bottom: 80px;
  }

  /* TABLE */
  table {
    background-color: #FFF;
  }

  .table tbody tr td.text-success {
    color: #10cfbd !important;
  }

  .table tbody tr td.text-danger {
    color: #f55753 !important;
  }

  .table tbody tr td.text-muted {
    color: #777;
  }

  .parameters {
    width: 100%;
    background: transparent;
    margin-bottom: 20px;
    clear: both;
  }

  .parameters th,
  .parameters td {
    padding: 5px;
  }

  /* CODE EXAMPLE */
  .example {
    margin: 0;
    padding: 10px;
    border: 1px solid;
    border-color: #E0E0E0;
    border-bottom: 0;
    background-color: #FFF;
  }

  pre[class*="language-"] {
    border-radius: 0;
  }

  /* SHOW ICONS LIST */
  ul.show-icon {
    list-style: none;
    position: relative;
  }

  ul.show-icon li {
    width: 150px;
    height: 60px;
    border: 1px solid #ccc;
    text-align: center;
    vertical-align: middle;
    display: inline-block;
    padding: 5px 0 0 0;
    position: relative;
    margin: 5px;
  }

  ul.show-icon i {
    font-size: 2em;
  }

  ul.show-icon span {
    font-size: 12px;
    display: block;
    position: absolute;
    bottom: 0;
    right: 0;
    width: 150px;
    line-height: 20px;
    background: rgba(0, 0, 0, 0.1);
  }

  /* LIVE SEARCH */
  .live-search {
    padding: 10px;
    background: #DFDFDF;
  }

  .live-search input.text-input {
    background: none;
    border: 1px solid #999;
    background: #FFF;
    padding: 5px;
    width: 246px;
    font-size: 16px;
    line-height: 1em;
    margin: 0 20px;
  }

  .live-search p {
    float: left;
    margin: 0;
    line-height: 2em;
  }

  /*  */
  .bs-ref {
    border-radius: 0;
  }

  .bs-ref span {
    opacity: 0.7;
    font-size: 13px;
    margin-top: 8px;
  }

</style>
