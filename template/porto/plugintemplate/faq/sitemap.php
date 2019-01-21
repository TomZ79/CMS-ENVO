<?php

/*
 * PLUGIN FAQ - POPIS SOUBORU sitemap.php
 * ------------------------------------------------------
 *
 * Soubor slouží pro generovaní (zobrazení) mapy webu pluginu Download
 *
 * Použitelné hodnoty s daty pro FRONTEND - sitemap.php
 * -------------------------------------------------------------
 *
 * $ENVO_FAQ_ALL = pole s daty
 * foreach ($ENVO_FAQ_ALL as $fla) = získání jednotlivých dat z pole
 *
 * $dla["title"]					text		|	- Titulek souboru
 * $dla["parseurl"]       text      - Adresa URL
 *
 */

if (ENVO_PLUGIN_ACCESS_FAQ && $ENVO_FAQ_ALL) {

	echo '<div class="col">';

	echo '<h4 class="font-weight-bold text-3 mb-1 mt-2">' . ENVO_PLUGIN_NAME_FAQ . '</h4>';

	if (isset($ENVO_FAQ_ALL) && is_array($ENVO_FAQ_ALL)) {

		echo '<ul class="list list-icons list-icons-sm">';

		foreach ($ENVO_FAQ_ALL as $fla) {
			echo '<li><a href="' . $fla["parseurl"] . '"><i class="far fa-file"></i>' . envo_cut_text($fla["title"], 35, "...") . '</a></li>';
		}

		echo '</ul>';

	}

	echo '</div>';
}

?>


