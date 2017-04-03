<?php
/**
 * ALL VALUE for FRONTEND - download.php
 *
 * @id               číslo    |  - id souboru
 * @title            text      - Titulek souboru
 * @content          text      - Celý popis souboru
 * @contentshort     text      - Zkrácený popis souboru
 * @showtitle        ano/ne    - Zobrazení nadpisu
 * @showcontact      ano/ne
 * @showdate         ano/ne    - Zobrazení datumu
 * @created          datum      - Datum vytvoření
 * @comments
 * @hits             číslo      - Počet zobrazení
 * @countdl          číslo      - Počet stažení
 * @totalcom
 * @previmg
 * @parseurl
 *
 */
?>

<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=download&amp;sp=setting'; ?>

  <div class="col-md-12" style="margin: 10px 0 50px 0;">
    <?php if (isset($JAK_DOWNLOAD_ALL) && is_array($JAK_DOWNLOAD_ALL)) foreach ($JAK_DOWNLOAD_ALL as $v) { ?>
      <!-- Post -->
      <div class="col-sm-6">
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
            <a href="<?php echo $v["parseurl"]; ?>" class="btn btn-info btn-sm">
              <?php echo $tld["downl_frontend"]["downl2"]; ?>
            </a>

            <?php if (JAK_ASACCESS) { ?>

              <a href="<?php echo BASE_URL; ?>admin/index.php?p=download&amp;sp=edit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tld["downl_frontend_button"]["downlb1"]; ?>" class="btn btn-default btn-sm jaktip">
                <?php echo $tld["downl_frontend_button"]["downlb1"]; ?>
              </a>

              <a class="btn btn-default btn-sm jaktip quickedit" href="<?php echo BASE_URL; ?>admin/index.php?p=download&amp;sp=quickedit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tld["downl_frontend_button"]["downlb2"]; ?>">
                <?php echo $tld["downl_frontend_button"]["downlb2"]; ?>
              </a>

            <?php } ?>
          </div>

        </div>
      </div>
    <?php } ?>
  </div>

<?php if ($JAK_PAGINATE) echo $JAK_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/footer.php'; ?>