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
  echo $Html -> addStylesheet('assets/plugins/code-prettify-master/themes/atelier_sulphurpool_light/atelier-sulphurpool-light.min.css');

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Code-prettify JS
  echo $Html -> addScript('assets/plugins/code-prettify-master/src/prettify.js');
  // Plugin Javascript
  echo $Html -> addScript('assets/js/script.cmshelp.min.js');

  ?>

  <script>
    // Init Code-Prettify
    window.onload = (function () {
      prettyPrint();
    });

    $(document).ready(function () {

      // Add smooth scrolling on all links inside the navbar
      $("#navigation a").on('click', function(event) {
        // Make sure this.hash has a value before overriding default behavior
        if (this.hash !== "") {
          // Prevent default anchor click behavior
          event.preventDefault();

          // Store hash
          var hash = this.hash;

          // Using jQuery's animate() method to add smooth page scroll
          // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
          $('.inner-content').animate({
            scrollTop: $(hash).offset().top
          }, 800, function(){

            // Add hash (#) to URL when done scrolling (default click behavior)
            window.location.hash = hash;
          });
        }  // End if
      });

      // Add class for content (important for scrollbar)
      $('.content.full-height').css({
        'display': 'flex',
        'justify-content': 'space-between'
      });

      // Scrollbar initialization
      $('.secondary-sidebar').scrollbar({
        ignoreOverlay: false
      });

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
  .inner-content {
    width: 75%;
    margin-left: 0;
  }

  /*  */
  .secondary-sidebar {
    float: inherit;
    width: 300px !important;
  }

  .secondary-sidebar .main-menu > li a {
    font-size: 13px;
    padding: 5px 0;
    line-height: 16px;
  }

  .secondary-sidebar .main-menu > li a:hover {
    color: #48B0F7;
    background-color: transparent;
  }

  .secondary-sidebar .main-menu > li a:focus {
    background-color: transparent;
  }

  .secondary-sidebar ul li a.active {
    color: #48B0F7;
  }

  /* hide inactive submenu */
  .nav ul.sub-menu,
  .nav ul.sub-menu ul.sub-menu-child {
    display: block;
  }

  /* show active submenu */
  .nav > .active > ul.sub-menu,
  .nav > .active > ul.sub-menu > .active > ul.sub-menu-child {
    display: block;
  }

  /*  */
  .secondary-sidebar .sub-menu-child {
    margin-left: 20px;
  }

  .secondary-sidebar .sub-menu li.active .sub-menu-child li a {
    color: rgba(120, 129, 149, 0.5) !important;
  }

  .secondary-sidebar .sub-menu li.active .sub-menu-child li.active a {
    color: #FFF !important;
  }

  .secondary-sidebar .sub-menu li.active .sub-menu-child li a:hover {
    color: #48B0F7 !important;
    background-color: transparent;
  }

  /* SCROLLBAR */
  .scroll-wrapper > .scroll-element.scroll-y {
    width: 7px;
  }

  .scroll-wrapper > .scroll-element.scroll-y .scroll-bar {
    width: 7px;
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
