<?php

/*
 * PLUGIN BLOG - POPIS SOUBORU sitemap.php
 * ------------------------------------------------------
 *
 * Soubor slouží pro generovaní (zobrazení) mapy webu pluginu Download
 *
 * Použitelné hodnoty s daty pro FRONTEND - sitemap.php
 * -------------------------------------------------------------
 *
 * $ENVO_BLOG_ALL = pole s daty
 * foreach ($ENVO_BLOG_ALL as $dla) = získání jednotlivých dat z pole
 *
 * $bl["title"]					text		|	- Titulek souboru
 * $bl["parseurl"]       text      - Adresa URL
 *
 */

if (ENVO_PLUGIN_ACCESS_BLOG && $ENVO_BLOG_ALL) {

	echo '<div class="col">';

	echo '<h4 class="font-weight-bold text-3 mb-1 mt-2">' . ENVO_PLUGIN_NAME_BLOG . '</h4>';

	if (isset($ENVO_BLOG_ALL) && is_array($ENVO_BLOG_ALL)) {

		echo '<ul class="list list-icons list-icons-sm">';

		foreach ($ENVO_BLOG_ALL as $bl) {
			echo '<li><a href="' . $bl["parseurl"] . '"><i class="far fa-file"></i>' . envo_cut_text($bl["title"], 35, "...") . '</a></li>';
		}

		echo '</ul>';

	}

	echo '</div>';
}

?>



