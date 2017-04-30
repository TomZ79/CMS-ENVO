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
 * $JAK_DOWNLOAD_ALL = pole s daty
 * foreach ($JAK_DOWNLOAD_ALL as $v) = získání jednotlivých dat z pole
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
 * $v["totalcom"]
 * $v["previmg"]
 * $v["parseurl"]       text      - Adresa URL
 *
 */
?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=download&amp;sp=setting'; ?>

  <div class="col-md-12" style="margin: 10px 0 50px 0;">
    <?php if (isset($JAK_DOWNLOAD_ALL) && is_array($JAK_DOWNLOAD_ALL)) foreach ($JAK_DOWNLOAD_ALL as $v) { ?>
      <!-- Post -->
      <div class="col-sm-6" style="margin-bottom: 30px ">
        <div>
          <!-- Post Title & Summary -->
          <div>
            <h3>
							<span>
								<a href="<?php echo $v["parseurl"]; ?>"><?php echo jak_cut_text($v["title"], 30, ""); ?></a>
							</span>
            </h3>
          </div>
          <div style="margin-bottom: 10px">

            <?php
            if ($v["showdate"]) {
              echo '<strong>' . $tld["downl_frontend"]["downl30"] . '</strong> : ' . $v["created"];
            }
            ?>

            <span class="pull-right">
							<?php echo '<strong>' . $tld["downl_frontend"]["downl31"] . '</strong> : ' . $v["countdl"]; ?>
						</span>
          </div>
          <div>
            <p><?php echo $v["contentshort"]; ?></p>
          </div>
          <hr>

          <!-- Button -->
          <div class="pull-right">
            <a href="<?php echo $v["parseurl"]; ?>" class="btn btn-default btn-sm">
              <?php echo $tld["downl_frontend"]["downl2"]; ?>
            </a>

            <?php if (JAK_ASACCESS) { ?>

              <a href="<?php echo BASE_URL; ?>admin/index.php?p=download&amp;sp=edit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn1"]; ?>" class="btn btn-info btn-sm jaktip">
                <span class="visible-xs"><i class="fa fa-edit"></i></span>
                <span class="hidden-xs"><?php echo $tl["button"]["btn1"]; ?></span>
              </a>

              <a class="btn btn-info btn-sm jaktip quickedit" href="<?php echo BASE_URL; ?>admin/index.php?p=download&amp;sp=quickedit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn2"]; ?>">
                <span class="visible-xs"><i class="fa fa-pencil"></i></span>
                <span class="hidden-xs"><?php echo $tl["button"]["btn2"]; ?></span>
              </a>

            <?php } ?>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

<?php if ($JAK_PAGINATE) echo $JAK_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>