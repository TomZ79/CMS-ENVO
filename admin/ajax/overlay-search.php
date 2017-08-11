<?php
/**
 * SEARCHING IN ARTICLE of PAGES, BLOG, NEWS, DOWNLOAD and FAQ
 */

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/overlay-search.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Include some functions for the ADMIN Area
// CZ: Vložení funkcí pro ADMINistrační rozhraní
include_once $root . '/admin/include/admin.function.php';

// EN: Import the language file
// CZ: Import jazykových souborů
if ($jkv["lang"] != $site_language && file_exists(APP_PATH . 'admin/lang/' . $site_language . '.ini')) {
  $tl = parse_ini_file(APP_PATH . 'admin/lang/' . $site_language . '.ini', TRUE);
} else {
  $tl            = parse_ini_file(APP_PATH . 'admin/lang/' . $jkv["lang"] . '.ini', TRUE);
  $site_language = $jkv["lang"];
}

// EN: Searching
// CZ: Searching
if (is_ajax()) {
  $search    = $_REQUEST["search"];
  $searchlen = strlen($search);

  if ($searchlen >= 3) {

    // FIRST ROW
    // ==========================================
    // START MAIN DIV
    echo '<div class="row">';
    echo '<div class="col-md-12 m-b-50">';

    // PAGES
    // build your search query to the database
    $sqlpg = 'SELECT id,title FROM ' . DB_PREFIX . 'pages WHERE title LIKE "%' . $search . '%"';
    // get results
    $resultpg = $jakdb->query($sqlpg);

    echo '<div class="col-md-4">';
    echo '<div class="">
          <div class="thumbnail-wrapper d48 circular bg-success-dark text-white inline m-t-10">
            <div>' . text_clipping_upper($tl["search_overlay"]["so4"]) . '</div>
          </div>
          <div class="p-l-10 inline p-t-5">
            <h4 class="m-b-5">
            <span class="semi-bold result-name">'
            . $tl["search_overlay"]["so4"] .
            '</span>
            </h4>
          </div>
        </div>';

    echo '<div class="m-t-20">';
    // output data of each row
    while ($rowpg = $resultpg->fetch_assoc()) {
      echo '<a href="index.php?p=page&sp=edit&ssp=' . $rowpg["id"] . '" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 90%;display: inline-block;float: left;">' . $rowpg["title"] . '</a><br>';
    }
    echo '</div>';
    echo '</div>';

    // BLOG
    // build your search query to the database
    $sqlbl = 'SELECT id,title FROM ' . DB_PREFIX . 'blog WHERE title LIKE "%' . $search . '%"';
    // get results
    $resultbl = $jakdb->query($sqlbl);

    echo '<div class="col-md-4">';
    echo '<div class="">
          <div class="thumbnail-wrapper d48 circular bg-info-dark text-white inline m-t-10">
            <div>' . text_clipping_upper($tl["search_overlay"]["so5"]) . '</div>
          </div>
          <div class="p-l-10 inline p-t-5">
            <h4 class="m-b-5">
            <span class="semi-bold result-name">'
            . $tl["search_overlay"]["so5"] .
            '</span>
            </h4>
          </div>
        </div>';

    echo '<div class="m-t-20">';
    // output data of each row
    while ($rowbl = $resultbl->fetch_assoc()) {
      echo '<a href="index.php?p=blog&sp=edit&ssp=' . $rowbl["id"] . '" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 90%;display: inline-block;float: left;">' . $rowbl["title"] . '</a><br>';
    }
    echo '</div>';
    echo '</div>';

    // NEWS
    // build your search query to the database
    $sqlns = 'SELECT id,title FROM ' . DB_PREFIX . 'news WHERE title LIKE "%' . $search . '%"';
    // get results
    $resultns = $jakdb->query($sqlns);

    echo '<div class="col-md-4">';
    echo '<div class="">
          <div class="thumbnail-wrapper d48 circular bg-warning-dark text-white inline m-t-10">
            <div>' . text_clipping_upper($tl["search_overlay"]["so6"]) . '</div>
          </div>
          <div class="p-l-10 inline p-t-5">
            <h4 class="m-b-5">
            <span class="semi-bold result-name">'
            . $tl["search_overlay"]["so6"] .
            '</span>
            </h4>
          </div>
        </div>';

    echo '<div class="m-t-20">';
    // output data of each row
    while ($rowns = $resultns->fetch_assoc()) {
      echo '<a href="index.php?p=news&sp=edit&ssp=' . $rowns["id"] . '" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 90%;display: inline-block;float: left;">' . $rowns["title"] . '</a><br>';
    }
    echo '</div>';
    echo '</div>';

    // END MAIN DIV
    echo '</div>';
    echo '</div>';


    // SECOND ROW
    // ==========================================

    // START MAIN DIV
    echo '<div class="row">';
    echo '<div class="col-md-12 m-b-50">';

    // DOWNLOAD
    // build your search query to the database
    $sqldl = 'SELECT id,title FROM ' . DB_PREFIX . 'download WHERE title LIKE "%' . $search . '%"';
    // get results
    $resultdl = $jakdb->query($sqldl);

    echo '<div class="col-md-4">';
    echo '<div class="">
          <div class="thumbnail-wrapper d48 circular bg-danger-dark text-white inline m-t-10">
            <div>' . text_clipping_upper($tl["search_overlay"]["so7"]) . '</div>
          </div>
          <div class="p-l-10 inline p-t-5">
            <h4 class="m-b-5">
            <span class="semi-bold result-name">'
            . $tl["search_overlay"]["so7"] .
            '</span>
            </h4>
          </div>
        </div>';

    echo '<div class="m-t-20">';
    // output data of each row
    while ($rowdl = $resultdl->fetch_assoc()) {
      echo '<a href="index.php?p=download&sp=edit&ssp=' . $rowdl["id"] . '" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 90%;display: inline-block;float: left;">' . $rowdl["title"] . '</a><br>';
    }
    echo '</div>';
    echo '</div>';

    // FAQ
    // build your search query to the database
    $sqlfq = 'SELECT id,title FROM ' . DB_PREFIX . 'faq WHERE title LIKE "%' . $search . '%"';
    // get results
    $resultfq = $jakdb->query($sqlfq);

    echo '<div class="col-md-4">';
    echo '<div class="">
          <div class="thumbnail-wrapper d48 circular bg-success-dark text-white inline m-t-10">
            <div>' . text_clipping_upper($tl["search_overlay"]["so8"]) . '</div>
          </div>
          <div class="p-l-10 inline p-t-5">
            <h4 class="m-b-5">
            <span class="semi-bold result-name">'
            . $tl["search_overlay"]["so8"] .
            '</span>
            </h4>
          </div>
        </div>';

    echo '<div class="m-t-20">';
    // output data of each row
    while ($rowfq = $resultfq->fetch_assoc()) {
      echo '<a href="index.php?p=faq&sp=edit&ssp=' . $rowfq["id"] . '" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 90%;display: inline-block;float: left;">' . $rowfq["title"] . '</a><br>';
    }
    echo '</div>';
    echo '</div>';

    // END MAIN DIV
    echo '</div>';
    echo '</div>';

  } else {
    echo '<div class="">
            <h4 class="semi-bold text-danger">'
            . $tl["search_overlay"]["so9"] .
            '</h4>
          </div>';
  }

}

?>