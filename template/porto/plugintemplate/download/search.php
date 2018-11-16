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
 * $ENVO_SEARCH_RESULT_DOWNLOAD = pole s daty
 * foreach ($ENVO_SEARCH_RESULT_DOWNLOAD as $dl) = získání jednotlivých dat z pole
 * $count++ = počet hledaných záznamů
 *
 * $dl["title"]					text		|	- Titulek souboru
 * $dl["content"]				text			- Zkrácený popis souboru
 * $dl["parseurl"]      text      - Adresa URL
 *
 */
?>

<?php if (isset($ENVO_SEARCH_RESULT_DOWNLOAD) && is_array($ENVO_SEARCH_RESULT_DOWNLOAD)) foreach ($ENVO_SEARCH_RESULT_DOWNLOAD as $dl) {
  $count++; ?>

  <div class="col-md-3 col-sm-6" style="margin-bottom: 20px">
    <div class="text-center">
      <i class="fa fa-floppy-o fa-4x"></i>
      <h3><a href="<?= $dl["parseurl"] ?>"><?= $dl["title"] ?></a></h3>
      <p><?= $dl["content"] ?></p>
      <a href="<?= $dl["parseurl"] ?>" class="btn btn-primary"><?= $tl["general"]["g3"] ?></a>
    </div>
  </div>

<?php } ?>