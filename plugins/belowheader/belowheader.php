<?php

// EN: Getting data from the database
// CZ: Získání dat z databáze
$resultbh = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'belowheader WHERE active = 1');

while ($rowbh = $resultbh -> fetch_assoc()) {

	$content_before = base64_encode($rowbh["content_before"]);
	$content_after  = base64_encode($rowbh["content_after"]);

	if ($rowbh["allpage"] != 0 && is_numeric($rowbh['allpage'])) {

		// EN:
		// CZ: Zobrazení Belowheader ve všech stránkách a pluginech

		$ENVO_ALLPAGE_BELOW_HEADER[] = array ('allpage' => 1, 'content_before' => $content_before, 'content_after' => $content_after, 'permission' => $rowbh['permission']);

	} else {

		// EN:
		// CZ: Zobrazení Belowheader pouze ve vybraných stránkách nebo pluginech

		// EN:
		// CZ: Vytvoření pole dat pro jednotlivé Stránky
		if ($rowbh['pageid'] != 0 && !is_numeric($rowbh['pageid'])) {

			$pagearray = explode(',', $rowbh['pageid']);

			for ($i = 0; $i < count($pagearray); $i++) {

				$ENVO_PAGE_BELOW_HEADER[] = array ('pageid' => $pagearray[$i], 'content_before' => $content_before, 'content_after' => $content_after, 'permission' => $rowbh['permission']);

			}

		}

		if (is_numeric($rowbh['pageid'])) {

			$ENVO_PAGE_BELOW_HEADER[] = array ('pageid' => $rowbh['pageid'], 'content_before' => $content_before, 'content_after' => $content_after, 'permission' => $rowbh['permission']);
		}


		// EN:
		// CZ: Vytvoření pole dat pro jednotlivé Zprávy
		if ($rowbh['newsid'] != 0 && !is_numeric($rowbh['newsid'])) {

			$newsarray = explode(',', $rowbh['newsid']);

			for ($i = 0; $i < count($newsarray); $i++) {

				$ENVO_NEWS_BELOW_HEADER[$newsarray[$i]] = array ('newsid' => $newsarray[$i], 'content_before' => $content_before, 'content_after' => $content_after, 'permission' => $rowbh['permission']);

			}

		}

		if ($rowbh['newsid'] != 0 && is_numeric($rowbh['newsid'])) {

			$ENVO_NEWS_BELOW_HEADER[$rowbh['newsid']] = array ('newsid' => $rowbh['newsid'], 'content_before' => $content_before, 'content_after' => $content_after, 'permission' => $rowbh['permission']);
		}

		// EN:
		// CZ: Vytvoření pole dat na hlavní stránce Zpráv
		if ($rowbh['newsmain'] != 0 && is_numeric($rowbh['newsmain'])) {

			$ENVO_NEWSMAIN_BELOW_HEADER[] = array ('newsmain' => 1, 'content_before' => $content_before, 'content_after' => $content_after, 'permission' => $rowbh['permission']);
		}

		// EN:
		// CZ: Vytvoření pole dat na stránce Štítků (Tagů)
		if ($rowbh['tags'] != 0 && is_numeric($rowbh['tags'])) {

			$ENVO_TAGS_BELOW_HEADER[] = array ('tags' => 1, 'content_before' => $content_before, 'content_after' => $content_after, 'permission' => $rowbh['permission']);
		}

		// EN:
		// CZ: Vytvoření pole dat na stránce Vyhledávání
		if ($rowbh['search'] != 0 && is_numeric($rowbh['search'])) {

			$ENVO_SEARCH_BELOW_HEADER[] = array ('search' => 1, 'content_before' => $content_before, 'content_after' => $content_after, 'permission' => $rowbh['permission']);
		}

		// EN:
		// CZ: Vytvoření pole dat na stránce Mapa sítě
		if ($rowbh['sitemap'] != 0 && is_numeric($rowbh['sitemap'])) {

			$ENVO_SITEMAP_BELOW_HEADER[] = array ('sitemap' => 1, 'content_before' => $content_before, 'content_after' => $content_after, 'permission' => $rowbh['permission']);
		}

	}

}

?>