<?php
/**
 * ALL VALUE for FRONTEND - faqart.php
 *
 * $PAGE_ID              číslo    |  - id článku
 * $PAGE_TITLE           text        - Titulek článku
 * $PAGE_CONTENT         text        - Celý popis článku
 * $SHOWTITLE            ano/ne      - Zobrazení nadpisu
 * $SHOWDATE             ano/ne      - Zobrazení datumu
 * $SHOWSOCIALBUTTON     ano/ne      - Zobrazení sociálních tlačítek
 * $FAQ_HITS             číslo       - Počet Zobrazení
 * $PAGE_TIME            date        - Datum vytvoření článku
 * $PAGE_TIME_HTML5
 * $ENVO_TAGLIST          text        - Seznam tagů
 * $FAQ_CATLIST          text        - Seznam kategorií
 *
 */

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if (ENVO_ACCESS) $apedit = BASE_URL . 'admin/index.php?p=faq&amp;sp=edit&amp;id=' . $PAGE_ID;
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

              if ($SHOWTITLE) echo '<h3>' . $PAGE_TITLE . '</h3>';

              ?>

            </div>
            <div class="article-head">

              <?php

              if ($SHOWDATE || $SHOWHITS) {
                // SHOW - Date
                if ($SHOWDATE) {
                  echo '<span class="art-date"><strong>' . $tlf["faq_frontend"]["faq4"] . '</strong>' . ' : <time datetime="' . $PAGE_TIME . '">' . $PAGE_TIME . '</time></span>';
                }

                // SHOW - Category
                if ($SHOWCATS) {
                  echo '<span class="art-cats"><strong>' . $tlf["faq_frontend"]["faq5"] . '</strong>' . ' : ' . $FAQ_CATLIST . '</span>';
                }

                // SHOW - Hits
                if ($SHOWHITS) {
                  echo '<span class="art-hits"><strong>' . $tlf["faq_frontend"]["faq6"] . '</strong>' . ' : ' . $FAQ_HITS . '</span>';
                }
              }
              ?>

            </div>
            <div class="article-content">

              <?php

              // SHOW - Tag List
              if ($ENVO_TAGLIST) {
                echo $ENVO_TAGLIST;
              }

              // SHOW - Page content
              echo $PAGE_CONTENT;

              // SHOW - Social Button
              if ($SHOWSOCIALBUTTON) { ?>

                <div class="col-md-12">
                  <hr>
                  <div class="pull-right" style="display: table;">
                    <div style="display: table-cell;vertical-align: middle;/*! margin-right: 20px; */padding-right: 20px;">
                      <strong><?=$tl["share"]["share1"] . ' '?></strong>
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

  <section class="pt-small pb-small">
    <div class="container-fluid">
      <div class="row">
        <ul class="pager">
          <?php if ($ENVO_NAV_PREV) { ?>
            <li class="previous">
              <a href="<?=$ENVO_NAV_PREV?>">
                <i class="fa fa-caret-left"></i>
                <span class="nav_text_left"><?=$ENVO_NAV_PREV_TITLE?></span>
              </a>
            </li>
          <?php }
          if ($ENVO_NAV_NEXT) { ?>
            <li class="next">
              <a href="<?=$ENVO_NAV_NEXT?>">
                <span class="nav_text_right"><?=$ENVO_NAV_NEXT_TITLE?></span>
                <i class="fa fa-caret-right"></i>
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </section>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>