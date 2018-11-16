<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php

if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=edit&amp;id=' . $PAGE_ID;
$qapedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=quickedit&amp;id=' . $PAGE_ID;
if ($setting["printme"]) $printme = 1;

?>

  <div id="printdiv">

    <!-- =========================
    START BLOG SECTION
    ============================== -->
    <section>
      <div class="container">
        <div class="row">
          <div class="blog-article">
            <div class="article-title">

              <?php

              if ($SHOWTITLE) echo '<h3 class="text-color-dark font-weight-normal text-6">' . $PAGE_TITLE . '</h3>';

              ?>

            </div>
            <div class="article-head mb-2">

              <?php

              if ($SHOWDATE || $BLOG_HITS || $BLOG_CATLIST) {
                // SHOW - Date
                if ($SHOWDATE) {
                  echo '<span class="date mr-3"><strong class="text-2">' . $tlblog["blog_frontend"]["blog3"] . '</strong>' . ' : <time datetime="' . $PAGE_TIME . '">' . $PAGE_TIME . '</time></span>';
                }

                // SHOW - Hits
                if ($BLOG_HITS) {
                  echo '<span class="hits mr-3"><strong class="text-2">' . $tlblog["blog_frontend"]["blog6"] . '</strong>' . ' : ' . $BLOG_HITS . '</span>';
                }

                // SHOW - Category
                if ($BLOG_CATLIST) {
                  echo '<span class="category mr-3"><strong class="text-2">' . $tlblog["blog_frontend"]["blog4"] . '</strong>' . ' : ' . $BLOG_CATLIST . '</span>';
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

          </div>
        </div>
      </div>
    </section>
    <!-- =========================
    END BLOG SECTION
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