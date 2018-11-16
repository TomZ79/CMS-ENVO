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
  <section>
    <div class="container-fluid">
      <div class="row mb-4">
        <div class="col">
          <div class="searchbox-title">
            <h4 class="text-right mb-0">Live Search</h4>
            <h6 class="text-right text-muted">(rychlé vyhledávání)</h6>
          </div>
          <div class="searchbox" style="position: relative;">
            <input type="text" class="form-control" id="ajaxlivesearch" autocomplete="off" placeholder="Zadejte hledaný název ..." />
            <div id="searchresult" style="display: none;border: 1px solid rgba(0, 0, 0, 0.09);z-index: 1040;position: absolute;background: white;width: 100%;"></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="faq-preview">
            <div class="toggle toggle-minimal toggle-primary" data-plugin-toggle>

              <?php if (isset($ENVO_FAQ_ALL) && is_array($ENVO_FAQ_ALL)) foreach ($ENVO_FAQ_ALL as $v) { ?>

                <section class="toggle">
                  <label><?= $v["title"] ?></label>
                  <div class="toggle-content">
                    <div  class="row mb-3">
                      <div class="col-sm-12">
                        <?= $v["contentshort"] ?>

                        <div class="float-right">

                          <?php

                          echo '<a href="' . $v["parseurl"] . '" class="read-more text-color-dark font-weight-bold text-2">' . $tlf["faq_frontend"]["faq1"] . '<i class="fas fa-chevron-right text-1 ml-1"></i></a>';

                          ?>

                        </div>
                      </div>
                    </div>

                    <?php

                    // SYSTEM ICONS - Edit and Quick Edit
                    if (ENVO_ASACCESS) {
                      echo '<div class="system-icons hidden-xs">';
                      echo '<div class="row">';
                      echo '<div class="col-sm-2">';
                      echo '<a class="btn btn-warning btn-xs rounded-0 mb-2 d-block" href="' . BASE_URL . 'admin/index.php?p=faq&amp;sp=edit&amp;id=' . $v["id"] . '" title="' . $tl["button"]["btn1"] . '">' . $tl["button"]["btn1"] . '</a>';
                      echo '</div>';
                      echo '<div class="col-sm-2">';
                      echo '<a class="btn btn-warning btn-xs rounded-0 mb-2 d-block quickedit" href="' . BASE_URL . 'admin/index.php?p=faq&amp;sp=quickedit&amp;id=' . $v["id"] . '" title="' . $tl["button"]["btn2"] . '">' . $tl["button"]["btn2"] . '</a>';
                      echo '</div>';
                      echo '<div class="col-sm-8"></div>';
                      echo '</div>';
                      echo '</div>';
                    }

                    ?>

                  </div>
                </section>

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