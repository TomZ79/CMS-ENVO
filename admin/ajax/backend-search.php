<?php
// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
$root = $_SERVER['DOCUMENT_ROOT'];
if (!file_exists($root . '/config.php')) die('[index.php] config.php not found');
require_once $root . '/config.php';

if (is_ajax()) {
  $search = $_REQUEST["search"];
  $searchlen = strlen($search);

  if ($searchlen >= 3) {

    // PAGES
    // build your search query to the database
    $sqlpg = 'SELECT id,title FROM ' . DB_PREFIX . 'pages WHERE title LIKE "%' . $search . '%"';
    // get results
    $resultpg = $jakdb->query($sqlpg);

    echo '<div class="col-md-4">';
    echo '<div class="">
          <div class="thumbnail-wrapper d48 circular bg-success text-white inline m-t-10">
            <div>P</div>
          </div>
          <div class="p-l-10 inline p-t-5">
            <h4 class="m-b-5"><span class="semi-bold result-name">Pages</span></h4>
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
          <div class="thumbnail-wrapper d48 circular bg-info text-white inline m-t-10">
            <div>B</div>
          </div>
          <div class="p-l-10 inline p-t-5">
            <h4 class="m-b-5"><span class="semi-bold result-name">Blog</span></h4>
          </div>
        </div>';

    echo '<div class="m-t-20">';
    // output data of each row
    while ($rowbl = $resultbl->fetch_assoc()) {
      echo '<a href="index.php?p=blog&sp=edit&ssp=' . $rowbl["id"] . '" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 90%;display: inline-block;float: left;">' . $rowbl["title"] . '</a><br>';
    }
    echo '</div>';
    echo '</div>';


    // DOWNLOAD
    // build your search query to the database
    $sqldl = 'SELECT id,title FROM ' . DB_PREFIX . 'download WHERE title LIKE "%' . $search . '%"';
    // get results
    $resultdl = $jakdb->query($sqldl);

    echo '<div class="col-md-4">';
    echo '<div class="">
          <div class="thumbnail-wrapper d48 circular bg-warning text-white inline m-t-10">
            <div>D</div>
          </div>
          <div class="p-l-10 inline p-t-5">
            <h4 class="m-b-5"><span class="semi-bold result-name">Download</span></h4>
          </div>
        </div>';

    echo '<div class="m-t-20">';
    // output data of each row
    while ($rowdl = $resultdl->fetch_assoc()) {
      echo '<a href="index.php?p=download&sp=edit&ssp=' . $rowdl["id"] . '" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 90%;display: inline-block;float: left;">' . $rowdl["title"] . '</a><br>';
    }
    echo '</div>';
    echo '</div>';

  } else {
    echo '<div class="">
            <h4 class="semi-bold text-danger">
            3 character is minimum
            </h4>
          </div>';
  }

}

?>