<?php

/*
 * PLUGIN DOWNLOAD - POPIS SOUBORU sitemap.php
 * ------------------------------------------------------
 *
 * Soubor slouží pro generovaní (zobrazení) mapy webu pluginu Download
 *
 * Použitelné hodnoty s daty pro FRONTEND - sitemap.php
 * -------------------------------------------------------------
 *
 * $ENVO_DOWNLOAD_ALL = pole s daty
 * foreach ($ENVO_DOWNLOAD_ALL as $dla) = získání jednotlivých dat z pole
 *
 * $dla["title"]					text		|	- Titulek souboru
 * $dla["parseurl"]       text      - Adresa URL
 *
 */

if (ENVO_PLUGIN_ACCESS_DOWNLOAD && $ENVO_DOWNLOAD_ALL) {

  echo '<div class="col">';

  echo '<h4 class="font-weight-bold text-3 mb-1 mt-2">' . ENVO_PLUGIN_NAME_DOWNLOAD . '</h4>';

  if (isset($ENVO_DOWNLOAD_ALL) && is_array($ENVO_DOWNLOAD_ALL)) {

    echo '<ul class="list list-icons list-icons-sm">';

    foreach ($ENVO_DOWNLOAD_ALL as $dla) {
      echo '<li><a href="' . $dla["parseurl"] . '"><i class="far fa-file"></i>' . envo_cut_text($dla["title"], 35, "...") . '</a></li>';
    }

    echo '</ul>';

  }

  echo '</div>';
}

?>



