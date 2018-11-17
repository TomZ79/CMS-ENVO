<?php
/*
 * ALL VALUE for FRONTEND - wiki.php
 *
 * $id 							number		|	- ID článku
 * $catid 					number		|	- ID categorie(í)
 * $title						string		|	- Titulek článku
 * $content					string		|	- Celý popis článku
 * $contentshort		string		|	- Zkrácený popis článku
 * $showtitle				number		| - Zobrazení nadpisu ( hodnota 1 = ANO / 0 = NE )
 * $showdate				number		| - Zobrazení datumu ( hodnota 1 = ANO / 0 = NE )
 * $created					date			| - Datum vytvoření
 * $hits						number		|	- Počet zobrazení
 * $previmg         string		|
 * $parseurl        string		|
 * $date-time       date			|
 *
 */
?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=wiki&amp;sp=setting'; ?>

  <!-- =========================
      START BLOG SECTION
  ============================== -->

  <div class="row">
    <div class="col-sm-12">
      <div class="accordion">
        <div class="panel-group" id="accordionwiki">

          <?php if (isset($ENVO_WIKI_ALL) && is_array($ENVO_WIKI_ALL)) foreach ($ENVO_WIKI_ALL as $v) { ?>

            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">
                  <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordionWiki" href="#collapse<?= $v["id"] ?>">
                    <?= $v["title"] ?>
                  </a>
                </h3>
              </div>
              <div id="collapse<?= $v["id"] ?>" class="panel-collapse collapse">
                <div class="panel-body">
                  <h4><?= $tlw["wiki_frontend"]["wiki"] ?></h4>
                  <div>
                    <p>
                      <?= $v["contentshort"] ?>
                    </p>
                  </div>

                  <div class="clearfix"></div>
                  <div class="pull-right">

                    <a href="<?= $v["parseurl"] ?>" class="btn btn-default btn-sm"><?= $tlw["wiki_frontend"]["wiki1"] ?></a>

                    <?php if (ENVO_ASACCESS) { ?>

                      <a href="<?= BASE_URL ?>admin/index.php?p=wiki&amp;sp=edit&amp;id=<?= $v["id"] ?>" title="<?= $tl["button"]["btn1"] ?>" class="btn btn-info btn-sm">
                        <span class="visible-xs"><i class="fa fa-edit"></i></span>
                        <span class="hidden-xs"><?= $tl["button"]["btn1"] ?></span>
                      </a>
                      <a class="btn btn-info btn-sm quickedit" href="<?= BASE_URL ?>admin/index.php?p=wiki&amp;sp=quickedit&amp;id=<?= $v["id"] ?>" title="<?= $tl["button"]["btn2"] ?>">
                        <span class="visible-xs"><i class="fa fa-pencil"></i></span>
                        <span class="hidden-xs"><?= $tl["button"]["btn2"] ?></span>
                      </a>

                    <?php } ?>

                  </div>

                </div>
              </div>
            </div>

          <?php } ?>

        </div>
      </div>
    </div>
  </div>
  <!-- =========================
      END BLOG SECTION
  ============================== -->

<?php if ($ENVO_PAGINATE) echo $ENVO_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>