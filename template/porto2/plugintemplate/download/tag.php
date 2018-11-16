<?php
/*
 * PLUGIN DOWNLOAD - POPIS SOUBORU search.php
 * ------------------------------------------------------
 *
 * Soubor slouží pro vyhledání zadaného výrazu v pluginu Download
 *
 * Použitelné hodnoty s daty pro FRONTEND - search.php
 * -------------------------------------------------------------
 *
 * $ENVO_TAG_DOWNLOAD_DATA = pole s daty
 * foreach ($ENVO_TAG_DOWNLOAD_DATA as $dl) = získání jednotlivých dat z pole
 * $count++ = počet hledaných záznamů
 *
 * $dl["title"]					text		|	- Titulek souboru
 * $dl["content"]				text			- Zkrácený popis souboru
 * $dl["parseurl"]      text      - Adresa URL
 *
 */
?>

<?php if (ENVO_PLUGIN_ACCESS_TAGS && isset($ENVO_TAG_DOWNLOAD_DATA) && is_array($ENVO_TAG_DOWNLOAD_DATA)) foreach ($ENVO_TAG_DOWNLOAD_DATA as $dl) { $count++; ?>

  <div class="col-md-3 col-sm-6">
    <div class="service-wrapper">
      <i class="fa fa-floppy-o fa-4x"></i>
      <h3><a href="<?=$dl["parseurl"]?>"><?=$dl["title"]?></a></h3>
      <p><?=$dl["content"]?></p>
      <a href="<?=$dl["parseurl"]?>" class="btn btn-primary"><?=$tl["general"]["g3"]?></a>
    </div>
  </div>

<?php } ?>