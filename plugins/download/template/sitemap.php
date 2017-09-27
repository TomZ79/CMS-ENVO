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
?>

<?php if (ENVO_PLUGIN_ACCESS_DOWNLOAD && $ENVO_DOWNLOAD_ALL) { ?>
  <h3><?php echo ENVO_PLUGIN_NAME_DOWNLOAD; ?></h3>
  <?php if (isset($ENVO_DOWNLOAD_ALL) && is_array($ENVO_DOWNLOAD_ALL)) { ?>
    <ul>
      <?php foreach ($ENVO_DOWNLOAD_ALL as $dla) { ?>
        <li><a href="<?php echo $dla["parseurl"]; ?>"><?php echo $dla["title"]; ?></a></li>
      <?php } ?>
    </ul>
  <?php }
} ?>