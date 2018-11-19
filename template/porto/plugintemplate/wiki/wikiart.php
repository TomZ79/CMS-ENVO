<?php
/**
 * ALL VALUE for FRONTEND - wikiart.php
 *
 * $PAGE_ID                 number    | - ID článku
 * $PAGE_TITLE              string    | - Titulek článku
 * $PAGE_CONTENT            string    | - Celý popis článku
 * $SHOWTITLE               number    | - Zobrazení nadpisu ( hodnota 1 = ANO / 0 = NE )
 * $SHOWDATE                number    | - Zobrazení datumu ( hodnota 1 = ANO / 0 = NE )
 * $SHOWUPDATE              number    | - Zobrazení datumu - poslední změna ( hodnota 1 = ANO / 0 = NE )
 * $SHOWSOCIALBUTTON        number    | - Zobrazení sociálních tlačítek ( hodnota 1 = ANO / 0 = NE )
 * $WIKI_HITS               number    | - Počet Zobrazení
 * $PAGE_TIME_CREATE        date      | - Datum vytvoření článku
 * $PAGE_TIME_CREATE_HTML5  date      | - Datum vytvoření článku HTML 5 formát
 * $PAGE_TIME_UPDATE        date      | - Datum aktualizace článku
 * $PAGE_TIME_UPDATE_HTML5  date      | - Datum aktualizace článku HTML 5 formát
 * $ENVO_TAGLIST            string    | - Seznam tagů
 * $WIKI_CATLIST            string    | - Seznam kategorií
 *
 */

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=wiki&amp;sp=edit&amp;id=' . $PAGE_ID;
$qapedit = BASE_URL . 'admin/index.php?p=wiki&amp;sp=quickedit&amp;id=' . $PAGE_ID;
if ($setting["printme"]) $printme = 1;

?>

  <div id="printdiv">

    <!-- =========================
    START WIKI SECTION
    ============================== -->
    <section>
      <div class="container-fluid">
        <div class="row">
          <article class="wiki-article">
            <div class="article-title">

              <?php

              if ($SHOWTITLE) echo '<h3 class="text-color-dark font-weight-normal text-6">' . $PAGE_TITLE . '</h3>';

              ?>

            </div>
            <div class="article-head mb-2">

              <?php

              if ($SHOWDATE || $SHOWUPDATE || $SHOWHITS || $SHOWCATS) {
                // SHOW - Date
                if ($SHOWDATE) {
                  echo '<span class="date mr-3"><strong class="text-2">' . $tlw["wiki_frontend"]["wiki4"] . '</strong>' . ' : <time datetime="' . $PAGE_TIME_CREATE . '">' . $PAGE_TIME_CREATE . '</time></span>';
                }

                // SHOW - Update
                if ($SHOWUPDATE) {
                  echo '<span class="date mr-3"><strong class="text-2">' . $tlw["wiki_frontend"]["wiki7"] . '</strong>' . ' : <time datetime="' . $PAGE_TIME_UPDATE . '">' . $PAGE_TIME_UPDATE . '</time></span>';
                }

                // SHOW - Hits
                if ($SHOWHITS) {
                  echo '<span class="hits mr-3"><strong class="text-2">' . $tlw["wiki_frontend"]["wiki5"] . '</strong>' . ' : ' . $WIKI_HITS . '</span>';
                }

                // SHOW - Category
                if ($SHOWCATS) {
                  echo '<span class="category mr-3"><strong class="text-2">' . $tlw["wiki_frontend"]["wiki6"] . '</strong>' . ' : ' . $WIKI_CATLIST . '</span>';
                }

              }

              // SHOW - Tag list
              if ($ENVO_TAGLIST) {
                echo '<ul class="tags-list">' . $ENVO_TAGLIST . '</ul>';
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
                  <div class="pull-right" style="display: table;">
                    <div style="display: table-cell;vertical-align: middle;/*! margin-right: 20px; */padding-right: 20px;">
                      <strong><?= $tl["share"]["share1"] . ' ' ?></strong>
                    </div>
                    <div id="sollist-sharing"></div>
                  </div>
                </div>

              <?php } ?>

            </div>

            <?php
            // SHOW - Page literature
            if (!empty($ENVO_LITERATURE) && is_array($ENVO_LITERATURE)) {
              echo '<hr>';
              echo '<h4>Literatura</h4>';
              echo '<ul class="list list-icons list-icons-xs">';

              foreach ($ENVO_LITERATURE as $l) {
                echo '<li style="font-size: .9em; height: 24px;"><i class="fas fa-circle"></i>' . $l["text"] . '</li>';
              }

              echo '<ul>';
            }
            ?>

          </article>
        </div>
      </div>
    </section>

    <!-- =========================
    END WIKI SECTION
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