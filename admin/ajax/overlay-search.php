<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/admin/config.php')) die('[' . __DIR__ . '/overlay-search.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/admin/config.php';

// EN: Include some functions for the ADMIN Area
// CZ: Vložení funkcí pro ADMINistrační rozhraní
include_once $root . '/admin/include/admin.function.php';

// EN: Import the language file
// CZ: Import jazykových souborů
if ($setting["lang"] != $site_language && file_exists(ROOT_ADMIN . 'lang/' . $site_language . '.ini')) {
	$tl = parse_ini_file(ROOT_ADMIN . 'lang/' . $site_language . '.ini', TRUE);
} else {
	$tl            = parse_ini_file(APP_PATH . 'admin/lang/' . $setting["lang"] . '.ini', TRUE);
	$site_language = $setting["lang"];
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

		// PAGES SEARCH
		// -----------------------------------------------------------------------------------------------------------------
		// EN: Check if pages table exists -> Build search query to the database
		$checktbl = $envodb -> query("SHOW TABLES LIKE '" . DB_PREFIX . "pages'");
		// EN: Determine the number of rows in the result from DB
		// CZ: Určení počtu řádků ve výsledku z DB
		$row_cnt = $checktbl -> num_rows;

		if ($row_cnt > 0) {
			// EN: Pages table exists!
			// CZ: Pages tabulka existuje!

			// Build search query to the database
			$sqlpg = 'SELECT id,title FROM ' . DB_PREFIX . 'pages WHERE title LIKE "%' . $search . '%"';
			// Get results
			$resultpg = $envodb -> query($sqlpg);

			echo '<div class="col-md-4">';
			echo '<div class="">
          <div class="thumbnail-wrapper d48 circular bg-success-dark text-white inline m-t-10">
            <div>' . text_clipping_upper($tl["search_overlay"]["so4"]) . '</div>
          </div>
          <div class="p-l-10 inline p-t-5">
            <h4 class="m-b-5">
              <span class="semi-bold result-name">' . $tl["search_overlay"]["so4"] . '</span>
            </h4>
          </div>
        </div>';

			echo '<div class="m-t-20">';
			// Output data of each row
			while ($rowpg = $resultpg -> fetch_assoc()) {
				echo '<a href="index.php?p=page&sp=edit&id=' . $rowpg["id"] . '" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 90%;display: inline-block;float: left;">' . $rowpg["title"] . '</a><br>';
			}
			echo '</div>';
			echo '</div>';

		} else {
			// EN: Pages table NOT exists!
			// CZ: Pages tabulka NEexistuje!

		}

		// BLOG SEARCH
		// -----------------------------------------------------------------------------------------------------------------
		// EN: Check if blog table exists -> Build search query to the database
		$checktbl = $envodb -> query("SHOW TABLES LIKE '" . DB_PREFIX . "blog'");
		// EN: Determine the number of rows in the result from DB
		// CZ: Určení počtu řádků ve výsledku z DB
		$row_cnt = $checktbl -> num_rows;

		if ($row_cnt > 0) {
			// EN: Blog table exists!
			// CZ: Blog tabulka existuje!

			// Build search query to the database
			$sqlbl = 'SELECT id,title FROM ' . DB_PREFIX . 'blog WHERE title LIKE "%' . $search . '%"';
			// Get results
			$resultbl = $envodb -> query($sqlbl);

			echo '<div class="col-md-4">';
			echo '<div class="">
              <div class="thumbnail-wrapper d48 circular bg-info-dark text-white inline m-t-10">
                <div>' . text_clipping_upper($tl["search_overlay"]["so5"]) . '</div>
              </div>
              <div class="p-l-10 inline p-t-5">
                <h4 class="m-b-5">
                  <span class="semi-bold result-name">' . $tl["search_overlay"]["so5"] . '</span>
                </h4>
              </div>
            </div>';

			echo '<div class="m-t-20">';
			// Output data of each row
			while ($rowbl = $resultbl -> fetch_assoc()) {
				echo '<a href="index.php?p=blog&sp=edit&id=' . $rowbl["id"] . '" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 90%;display: inline-block;float: left;">' . $rowbl["title"] . '</a><br>';
			}
			echo '</div>';
			echo '</div>';

		} else {
			// EN: Blog table NOT exists!
			// CZ: Blog tabulka NEexistuje!

		}

		// NEWS SEARCH
		// -----------------------------------------------------------------------------------------------------------------
		// EN: Check if news table exists -> Build search query to the database
		$checktbl = $envodb -> query("SHOW TABLES LIKE '" . DB_PREFIX . "news'");
		// EN: Determine the number of rows in the result from DB
		// CZ: Určení počtu řádků ve výsledku z DB
		$row_cnt = $checktbl -> num_rows;

		if ($row_cnt > 0) {
			// EN: News table exists!
			// CZ: News tabulka existuje!

			// Build search query to the database
			$sqlns = 'SELECT id,title FROM ' . DB_PREFIX . 'news WHERE title LIKE "%' . $search . '%"';
			// Get results
			$resultns = $envodb -> query($sqlns);

			echo '<div class="col-md-4">';
			echo '<div class="">
          <div class="thumbnail-wrapper d48 circular bg-warning-dark text-white inline m-t-10">
            <div>' . text_clipping_upper($tl["search_overlay"]["so6"]) . '</div>
          </div>
          <div class="p-l-10 inline p-t-5">
            <h4 class="m-b-5">
              <span class="semi-bold result-name">' . $tl["search_overlay"]["so6"] . '</span>
            </h4>
          </div>
        </div>';

			echo '<div class="m-t-20">';
			// Output data of each row
			while ($rowns = $resultns -> fetch_assoc()) {
				echo '<a href="index.php?p=news&sp=edit&id=' . $rowns["id"] . '" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 90%;display: inline-block;float: left;">' . $rowns["title"] . '</a><br>';
			}
			echo '</div>';
			echo '</div>';

		} else {
			// EN: News table NOT exists!
			// CZ: News tabulka NEexistuje!

		}

		// END MAIN DIV
		echo '</div>';
		echo '</div>';


		// SECOND ROW
		// ==========================================

		// START MAIN DIV
		echo '<div class="row">';
		echo '<div class="col-md-12 m-b-50">';

		// DOWNLOAD SEARCH
		// -----------------------------------------------------------------------------------------------------------------
		// EN: Check if download table exists -> Build search query to the database
		$checktbl = $envodb -> query("SHOW TABLES LIKE '" . DB_PREFIX . "download'");
		// EN: Determine the number of rows in the result from DB
		// CZ: Určení počtu řádků ve výsledku z DB
		$row_cnt = $checktbl -> num_rows;

		if ($row_cnt > 0) {
			// EN: Download table exists!
			// CZ: Download tabulka existuje!

			// Build search query to the database
			$sqldl = 'SELECT id,title FROM ' . DB_PREFIX . 'download WHERE title LIKE "%' . $search . '%"';
			// Get results
			$resultdl = $envodb -> query($sqldl);

			echo '<div class="col-md-4">';
			echo '<div class="">
          <div class="thumbnail-wrapper d48 circular bg-danger-dark text-white inline m-t-10">
            <div>' . text_clipping_upper($tl["search_overlay"]["so7"]) . '</div>
          </div>
          <div class="p-l-10 inline p-t-5">
            <h4 class="m-b-5">
              <span class="semi-bold result-name">' . $tl["search_overlay"]["so7"] . '</span>
            </h4>
          </div>
        </div>';

			echo '<div class="m-t-20">';
			// Output data of each row
			while ($rowdl = $resultdl -> fetch_assoc()) {
				echo '<a href="index.php?p=download&sp=edit&id=' . $rowdl["id"] . '" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 90%;display: inline-block;float: left;">' . $rowdl["title"] . '</a><br>';
			}
			echo '</div>';
			echo '</div>';

		} else {
			// EN: Download table NOT exists!
			// CZ: Download tabulka NEexistuje!

		}

		// FAQ SEARCH
		// -----------------------------------------------------------------------------------------------------------------
		// EN: Check if faq table exists -> Build search query to the database
		$checktbl = $envodb -> query("SHOW TABLES LIKE '" . DB_PREFIX . "faq'");
		// EN: Determine the number of rows in the result from DB
		// CZ: Určení počtu řádků ve výsledku z DB
		$row_cnt = $checktbl -> num_rows;

		if ($row_cnt > 0) {
			// EN: Faq table exists!
			// CZ: Faq tabulka existuje!

			// Build search query to the database
			$sqlfq = 'SELECT id,title FROM ' . DB_PREFIX . 'faq WHERE title LIKE "%' . $search . '%"';
			// Get results
			$resultfq = $envodb -> query($sqlfq);

			echo '<div class="col-md-4">';
			echo '<div class="">
          <div class="thumbnail-wrapper d48 circular bg-success-dark text-white inline m-t-10">
            <div>' . text_clipping_upper($tl["search_overlay"]["so8"]) . '</div>
          </div>
          <div class="p-l-10 inline p-t-5">
            <h4 class="m-b-5">
              <span class="semi-bold result-name">' . $tl["search_overlay"]["so8"] . '</span>
            </h4>
          </div>
        </div>';

			echo '<div class="m-t-20">';
			// Output data of each row
			while ($rowfq = $resultfq -> fetch_assoc()) {
				echo '<a href="index.php?p=faq&sp=edit&id=' . $rowfq["id"] . '" style="text-overflow: ellipsis;white-space: nowrap;overflow: hidden;width: 90%;display: inline-block;float: left;">' . $rowfq["title"] . '</a><br>';
			}
			echo '</div>';
			echo '</div>';

		} else {
			// EN: Faq table NOT exists!
			// CZ: Faq tabulka NEexistuje!

		}

		// END MAIN DIV
		echo '</div>';
		echo '</div>';

	} else {
		echo '<div class="">
            <h4 class="semi-bold text-danger">' . $tl["search_overlay"]["so9"] . '</h4>
          </div>';
	}

}

?>