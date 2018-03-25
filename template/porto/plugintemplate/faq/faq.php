<?php
/*
 * ALL VALUE for FRONTEND - faq.php
 *
 * $id 							číslo		|	- id souboru
 * $title						text			- Titulek souboru
 * $content					text			- Celý popis souboru
 * $contentshort		text			- Zkrácený popis souboru
 * $showtitle				ano/ne		- Zobrazení nadpisu
 * $showdate				ano/ne
 * $created					datum			- Datum vytvoření
 * $comments
 * $hits						číslo			- Počet zobrazení
 * $previmg
 * $parseurl
 *
 */
?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=faq&amp;sp=setting'; ?>

  <!-- =========================
    START FAQ SECTION
  ============================== -->
  <section class="faq-content-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="faq-preview">
            <div class="panel-group" id="accordion">
              <?php if (isset($ENVO_FAQ_ALL) && is_array($ENVO_FAQ_ALL)) foreach ($ENVO_FAQ_ALL as $v) { ?>

                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h4 class="panel-title"><a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?php echo $v["id"]; ?>" aria-expanded="false"> <?php echo $v["title"]; ?> <i class="fa fa-plus collape-plus"></i></a></h4>
                  </div>
                  <div id="collapse-<?php echo $v["id"]; ?>" class="panel-collapse collapse">
                    <div class="panel-body">
                      <?php echo $v["contentshort"]; ?>

                      <div class="pull-right">

                        <a href="<?php echo $v["parseurl"]; ?>" class="btn btn-borders btn-default btn-footer">
                          <?php echo $tlf["faq_frontend"]["faq1"]; ?>
                        </a>

                        <!-- Post System Button - Admin -->
                        <?php if (ENVO_ASACCESS) { ?>

                          <a href="<?php echo BASE_URL; ?>admin/index.php?p=faq&amp;sp=edit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn1"]; ?>" class="btn btn-primary btn-sm">
                            <span class="visible-xs"><i class="fa fa-edit"></i></span>
                            <span class="hidden-xs"><?php echo $tl["button"]["btn1"]; ?></span>
                          </a>
                          <a class="btn btn-primary btn-sm quickedit" href="<?php echo BASE_URL; ?>admin/index.php?p=faq&amp;sp=quickedit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn2"]; ?>">
                            <span class="visible-xs"><i class="fa fa-pencil"></i></span>
                            <span class="hidden-xs"><?php echo $tl["button"]["btn2"]; ?></span>
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
    </div>
  </section>
  <!-- =========================
    END FAQ SECTION
  ============================== -->

<?php if ($ENVO_PAGINATE) echo $ENVO_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>