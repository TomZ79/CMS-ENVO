<?php
/*
 * PLUGIN DOWNLOAD - POPIS SOUBORU download.php
 * ----------------------------------------------
 *
 * Soubor slouží pro generovaní (zobrazení) celkového seznamu článků
 *
 * Použitelné hodnoty s daty pro FRONTEND - download.php
 * ------------------------------------------------------
 *
 * $ENVO_DOWNLOAD_ALL = pole s daty
 * foreach ($ENVO_DOWNLOAD_ALL as $v) = získání jednotlivých dat z pole
 *
 * $v["id"]             číslo		|	- id souboru
 * $v["title"]					text			- Titulek souboru
 * $v["content"]				text			- Celý popis souboru
 * $v["contentshort"]		text			- Zkrácený popis souboru
 * $v["showtitle"]			ano/ne		- Zobrazení nadpisu
 * $v["showcontact"]		ano/ne
 * $v["showdate"]				ano/ne
 * $v["created"]				datum			- Datum vytvoření
 * $v["comments"]
 * $v["hits"]						číslo			- Počet zobrazení
 * $v["countdl"]				číslo			- Počet stažení
 * $v["previmg"]
 * $v["parseurl"]       text      - Adresa URL
 * $v["file"]           text      - Url cesta k souboru
 * $v["extfile"]        text      - Url cesta k souboru
 *
 */
?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=download&amp;sp=setting'; ?>

  <div class="col-md-12" style="margin: 10px 0 50px 0;">
    <table id="table">
      <thead>
      <tr>
        <th data-field="name" data-sortable="false">Jméno</th>
        <th data-field="date" data-sortable="true">Datum vložení</th>
        <th data-field="text" data-sortable="false">Popis</th>
      </tr>
      </thead>
      <tbody>

      <?php if (isset($ENVO_DOWNLOAD_ALL) && is_array($ENVO_DOWNLOAD_ALL)) foreach ($ENVO_DOWNLOAD_ALL as $v) { ?>
        <tr>
          <td><a href="<?php echo $v["parseurl"]; ?>"><?php echo envo_cut_text($v["title"], 40, ""); ?></a></td>
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
              echo '<span><i class="fa fa-warning mr-sm"></i>' . $tld["downl_frontend"]["downl16"] . '</span>';
            }

            ?>
          </td>
        </tr>
      <?php } ?>

      </tbody>
    </table>
  </div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>