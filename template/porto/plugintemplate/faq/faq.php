<?php
/*
 * PLUGIN DOWNLOAD - ALL VALUE for FRONTEND - faq.php
 * ------------------------------------------------------------------
 *
 * Soubor slouží pro generovaní (zobrazení) celkového seznamu článků
 *
 * Použitelné hodnoty s daty pro FRONTEND - faq.php
 * ------------------------------------------------------------------
 *
 * $ENVO_FAQ_ALL = pole s daty
 * foreach ($ENVO_FAQ_ALL as $v) = získání jednotlivých dat z pole
 *
 * $v["id"]               number		|	- ID souboru
 * $v["catid"] 		  			number		|	- ID categorie(í)
 * $v["title"]						string		|	- Titulek souboru
 * $v["content"]					string		|	- Celý popis souboru
 * $v["contentshort"]		  string		|	- Zkrácený popis souboru
 * $v["showtitle"]				number		| - Zobrazení nadpisu ( hodnota 1 = ANO / 0 = NE )
 * $v["showdate"]				  number		| - Zobrazení nadpisu ( hodnota 1 = ANO / 0 = NE )
 * $v["created"]					date			| - Datum vytvoření
 * $v["hits"]						  number		|	- Počet zobrazení
 * $v["previmg"]          string		| - Náhledový obrázek
 * $v["parseurl"]         string		| - Parsovaná url adresa
 *
 */

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=faq&amp;sp=setting';

?>

  <!-- =========================
    START FAQ SECTION
  ============================== -->
  <section>
    <div class="container-fluid">

      <?php if ($setting["faqlivesearch"]) { ?>
        <div class="row mb-4">
          <div class="col">
            <div class="searchbox-title">
              <h4 class="text-right mb-0">Live Search</h4>
              <h6 class="text-right text-muted">(rychlé vyhledávání)</h6>
            </div>
            <div class="searchbox" style="position: relative;">
              <div class="input-group">
                <input type="text" class="form-control" id="ajaxlivesearch" autocomplete="off" placeholder="Zadejte hledaný název ..." data-articleid="">
                <div class="input-group-append">
                  <button type="button" id="ajaxliveshow" class="btn btn-light text-1 text-uppercase">Zobrazit</button>
                </div>
              </div>
              <div id="searchresult" style="display: none;border: 1px solid rgba(0, 0, 0, 0.09);z-index: 1000;position: absolute;background: white;width: 100%;"></div>
            </div>
          </div>
        </div>
      <?php } ?>


      <div class="row">
        <div class="col">
          <div class="faq-preview">
            <div class="toggle toggle-minimal toggle-primary" data-plugin-toggle>

              <?php if (isset($ENVO_FAQ_ALL) && is_array($ENVO_FAQ_ALL)) foreach ($ENVO_FAQ_ALL as $v) { ?>

                <section class="toggle">
                  <label><?= $v["title"] ?></label>
                  <div class="toggle-content">
                    <div class="row mb-3">
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
                      echo '<div class="system-icons d-none d-sm-block">';
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