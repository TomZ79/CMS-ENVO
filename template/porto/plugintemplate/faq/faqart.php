<?php
/**
 * PLUGIN DOWNLOAD - ALL VALUE for FRONTEND - faqart.php
 * ------------------------------------------------------------------
 *
 * Soubor slouží pro generovaní (zobrazení) celkového seznamu článků
 *
 * Použitelné hodnoty s daty pro FRONTEND - faqart.php
 * ------------------------------------------------------------------
 *
 * $PAGE_ID                 number    | - ID článku
 * $PAGE_TITLE              string    | - Titulek článku
 * $PAGE_CONTENT            string    | - Celý popis článku
 * $SHOWTITLE               number    | - Zobrazení nadpisu ( hodnota 1 = ANO / 0 = NE )
 * $THUMBIMG                string    | - Relativní url adresa náhledového obrázku
 * $SHOWDATE                number    | - Zobrazení datumu ( hodnota 1 = ANO / 0 = NE )
 * $SHOWCATS                number    | - Zobrazení kategorií ( hodnota 1 = ANO / 0 = NE )
 * $SHOWHITS                number    | - Zobrazení počtu zobrazení ( hodnota 1 = ANO / 0 = NE )
 * $SHOWSOCIALBUTTON        number    | - Zobrazení sociálních tlačítek ( hodnota 1 = ANO / 0 = NE )
 * $FAQ_HITS                number    | - Počet Zobrazení
 * $PAGE_TIME               date      | - Datum vytvoření článku
 * $PAGE_TIME_HTML5         date      | - Datum vytvoření článku HTML 5 formát
 * $ENVO_TAGLIST            array     | - Seznam tagů
 * $FAQ_CAT                 array     | - Seznam kategorií (Varname)
 * $FAQ_CATLIST             array     | - Seznam kategorií (html)
 *
 */

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=faq&amp;sp=edit&amp;id=' . $PAGE_ID;
$qapedit = BASE_URL . 'admin/index.php?p=faq&amp;sp=quickedit&amp;id=' . $PAGE_ID;
if ($setting["printme"]) $printme = 1;

?>

  <div id="printdiv">

    <!-- =========================
    START FAQ SECTION
    ============================== -->
    <section>
      <div class="container-fluid">
        <div class="row">
          <article class="faq-article">
            <div class="article-title">

              <?php

              if ($SHOWTITLE) echo '<h3 class="text-color-dark font-weight-normal text-6">' . $PAGE_TITLE . '</h3>';

              ?>

            </div>
            <div class="article-head mb-2">

              <?php

              if ($SHOWDATE || $SHOWHITS) {
                echo '<div>';

                // SHOW - Date
                if ($SHOWDATE) {
                  echo '<span class="date mr-3"><strong class="text-2">' . $tlf["faq_frontend"]["faq4"] . '</strong>' . ' : <time datetime="' . $PAGE_TIME . '">' . $PAGE_TIME . '</time></span>';
                }

                // SHOW - Hits
                if ($SHOWHITS) {
                  echo '<span class="hits mr-3"><strong class="text-2">' . $tlf["faq_frontend"]["faq5"] . '</strong>' . ' : ' . $FAQ_HITS . '</span>';
                }

                echo '</div>';
              }

              if ($SHOWCATS || $ENVO_TAGLIST) {
                echo '<div>';

                // SHOW - Category
                if ($SHOWCATS) {
                  echo '<span class="category mr-3"><strong class="text-2">' . $tlf["faq_frontend"]["faq6"] . '</strong>' . ' : ' . $FAQ_CATLIST . '</span>';
                }

                // SHOW - Tag list
                if ($ENVO_TAGLIST) {
                  echo '<ul class="tags-list">' . $ENVO_TAGLIST . '</ul>';
                }

                echo '</div>';
              }

              ?>

            </div>
            <hr>
            <div class="article-content">

              <?php

              // SHOW - Page content
              echo $PAGE_CONTENT;

              // SHOW - Social Button
              if ($SHOWSOCIALBUTTON) { ?>

                <div class="col-md-12">
                  <hr>
                  <div class="float-right" style="display: table;">
                    <div style="display: table-cell;vertical-align: middle;/*! margin-right: 20px; */padding-right: 20px;">
                      <strong><?= $tl["share"]["share1"] . ' ' ?></strong>
                    </div>
                    <div id="sollist-sharing"></div>
                  </div>
                </div>

              <?php } ?>

            </div>

          </article>
        </div>
      </div>
    </section>

    <!-- =========================
    END FAQ SECTION
    ============================== -->

  </div>
  <!-- End Print Post -->

  <div class="row align-items-center mt-5">

    <?php if ($ENVO_NAV_PREV) { ?>
      <div class="col">
        <a href="<?= $ENVO_NAV_PREV ?>" class="portfolio-prev text-decoration-none d-block">
          <div class="d-flex align-items-center line-height-1">
            <i class="fas fa-arrow-left text-dark text-4 mr-3"></i>
            <div class="d-none d-sm-block line-height-1">
              <span class="text-dark opacity-4 text-1">PREVIOUS PROJECT</span>
              <h4 class="font-weight-bold text-3 mb-0"><?= envo_cut_text($ENVO_NAV_PREV_TITLE, 30, '...') ?></h4>
            </div>
          </div>
        </a>
      </div>
    <?php } ?>
    <?php if ($ENVO_NAV_NEXT) { ?>
      <div class="col">
        <a href="<?= $ENVO_NAV_NEXT ?>" class="portfolio-next text-decoration-none d-block float-right ">
          <div class="d-flex align-items-center text-right line-height-1">
            <div class="d-none d-sm-block line-height-1">
              <span class="text-dark opacity-4 text-1">NEXT PROJECT</span>
              <h4 class="font-weight-bold text-3 mb-0"><?= envo_cut_text($ENVO_NAV_NEXT_TITLE, 30, '...') ?></h4>
            </div>
            <i class="fas fa-arrow-right text-dark text-4 ml-3"></i>
          </div>
        </a>
      </div>
    <?php } ?>

  </div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>