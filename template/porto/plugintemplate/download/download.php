<?php
/*
 * PLUGIN DOWNLOAD - ALL VALUE for FRONTEND - download.php
 * ------------------------------------------------------------------
 *
 * Soubor slouží pro generovaní (zobrazení) celkového seznamu článků
 *
 * Použitelné hodnoty s daty pro FRONTEND - download.php
 * ------------------------------------------------------------------
 *
 * $ENVO_DOWNLOAD_ALL = pole s daty
 * foreach ($ENVO_DOWNLOAD_ALL as $v) = získání jednotlivých dat z pole
 *
 * $v["id"]               number		|	- ID souboru
 * $v["catid"] 		  			number		|	- ID categorie(í)
 * $v["title"]						string		|	- Titulek souboru
 * $v["content"]					string		|	- Celý popis souboru
 * $v["contentshort"]		  string		|	- Zkrácený popis souboru
 * $v["file"]		          string		|	- Url cesta k souboru
 * $v["extfile"]	    	  string		|	- Url cesta k souboru
 * $v["countdl"]	    	  number		|	- Počet stažení
 * $v["showtitle"]				number		| - Zobrazení nadpisu ( hodnota 1 = ANO / 0 = NE )
 * $v["showdate"]				  number		| - Zobrazení nadpisu ( hodnota 1 = ANO / 0 = NE )
 * $v["created"]					date			| - Datum vytvoření
 * $v["hits"]						  number		|	- Počet zobrazení
 * $v["previmg"]          string		| - Náhledový obrázek
 * $v["parseurl"]         string		| - Parsovaná url adresa
 *
 */

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=download&amp;sp=setting';

?>

<?php if (isset($ENVO_DOWNLOAD_ALL) && is_array($ENVO_DOWNLOAD_ALL)) { ?>
  <div class="col-sm-12">
    <table class="table table-sm">
      <thead>
      <tr>
        <th class="col-sm-3">Název</th>
        <th class="col-sm-3">Datum vložení</th>
        <th class="col-sm-6">Popis</th>
      </tr>
      </thead>
      <tbody>

      <?php foreach ($ENVO_DOWNLOAD_ALL as $v) { ?>
        <tr>
          <td><a href="<?= $v["parseurl"] ?>"><?= envo_cut_text($v["title"], 30, "") ?></a></td>
          <td>
            <?php if ($v["showdate"]) echo $v["created"]; ?>
          </td>
          <td>
            <?php
            if (!empty($v["file"]) || !empty($v["extfile"])) {
              // EN: If exist some file
              // CZ: Pokud existuje soubor
              echo envo_cut_text($v["contentshort"], 40, "...");
            } else {
              // EN: If not exist some file
              // CZ: Pokud neexistuje soubor
              echo '<span><i class="fas fa-exclamation-circle mr-2"></i>' . $tld["downl_frontend"]["downl16"] . '</span>';
            }

            ?>
          </td>
        </tr>
      <?php } ?>

      </tbody>
    </table>
  </div>

<?php } ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>