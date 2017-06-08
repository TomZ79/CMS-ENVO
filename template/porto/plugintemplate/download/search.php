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
 * $JAK_SEARCH_RESULT_DOWNLOAD = pole s daty
 * foreach ($JAK_SEARCH_RESULT_DOWNLOAD as $dl) = získání jednotlivých dat z pole
 * $count++ = počet hledaných záznamů
 *
 * $dl["title"]					text		|	- Titulek souboru
 * $dl["content"]				text			- Zkrácený popis souboru
 * $dl["parseurl"]      text      - Adresa URL
 *
 */
?>

<?php if (isset($JAK_SEARCH_RESULT_DOWNLOAD) && is_array($JAK_SEARCH_RESULT_DOWNLOAD)) foreach ($JAK_SEARCH_RESULT_DOWNLOAD as $dl) {
  $count++; ?>

  <div class="col-md-3 col-sm-6" style="margin-bottom: 20px">
    <div class="text-center">
      <i class="fa fa-floppy-o fa-4x"></i>
      <h3><a href="<?php echo $dl["parseurl"]; ?>"><?php echo $dl["title"]; ?></a></h3>
      <p><?php echo $dl["content"]; ?></p>
      <a href="<?php echo $dl["parseurl"]; ?>" class="btn btn-primary"><?php echo $tl["general"]["g3"]; ?></a>
    </div>
  </div>

<?php } ?>