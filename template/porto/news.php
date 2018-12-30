<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=news&sp=setting';

if (isset($ENVO_HOOK_NEWS) && is_array($ENVO_HOOK_NEWS)) foreach ($ENVO_HOOK_NEWS as $n) {
  include_once APP_PATH . $n['phpcode'];
}

// Set local language
setlocale(LC_TIME, $setting["locale"] . '.utf8');
?>

  <!-- =========================
    START NEWS SECTION
  ============================== -->
  <style>
    .row-flex {
      display: flex;
      flex-wrap: wrap;
    }
  </style>

  <section>
    <div class="container-fluid">
      <div class="row row-flex">

        <?php if (isset($ENVO_NEWS_ALL) && is_array($ENVO_NEWS_ALL)) foreach ($ENVO_NEWS_ALL as $v) { ?>

          <div class="<?php echo($ENVO_HOOK_SIDE_GRID ? "col-sm-6" : "col-sm-4"); ?>">
            <article class="post post-large pb-5">
              <div class="post-image">
                <a href="<?= $v["parseurl"] ?>">

                  <?php
                  // Image is available so display it or go standard image
                  if ($v["previmg"]) {

                    echo '<span class="thumb-info thumb-info-lighten border-radius-0" style="height: 150px;">';
                    echo '<span class="thumb-info-wrapper border-radius-0">';
                    echo '<img src="' . $v["previmg"] . '" alt="' . $v["title"] . ' | ' . $setting["title"] . '" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0" style="width: 100%;height: 150px;object-fit: cover;object-position: center;">';
                    echo '<span class="thumb-info-action"><span class="thumb-info-action-icon bg-dark opacity-8"><i class="fas fa-plus"></i></span></span>';
                    echo '</span>';
                    echo '</span>';

                  } else { ?>

                    <div class="thumb-news text-center">
                      <img src="<?= '/template/' . ENVO_TEMPLATE . '/img/news/news-feature.jpg' ?>" alt="<?= $v["title"] . ' | ' . $setting["title"] ?>" class="img-fluid img-thumbnail img-thumbnail-no-borders rounded-0">
                      <div class="caption text-center">
                        <span class="color1"><?= $tlporto["news_text"]["newst"] ?></span>
                        <span class="color2"><?= $tlporto["news_text"]["newst1"] ?></span>
                      </div>
                    </div>

                  <?php } ?>
                </a>
              </div>

              <div class="post-date">
                <span class="day"><?= strftime("%d", strtotime($v["created"])) ?></span>
                <span class="month"><?= strftime("%b", strtotime($v["created"])) ?></span>
              </div>

              <div class="post-content">

                <?php

                echo '<h4><a href="' . $v["parseurl"] . '" class="text-decoration-none">' . envo_cut_text($v["title"], 70, "...") . '</a></h4>';

                ?>

                <p class="mb-1"><?= $v["contentshort"] ?></p>

                <?php

                echo '<a href="' . $v["parseurl"] . '" class="read-more text-color-dark font-weight-bold text-2">' . $tl["global_text"]["gtxt10"] . '<i class="fas fa-chevron-right text-1 ml-1"></i></a>';

                ?>

              </div>

              <?php

              // SYSTEM ICONS - Edit and Quick Edit
              if (ENVO_ASACCESS) {
                echo '<div class="system-icons d-none d-sm-block">';
                echo '<div class="row"><div class="col"><hr class="dashed tall my-3"></div></div>';
                echo '<div class="row">';
                echo '<div class="col-sm-6">';
                echo '<a class="btn btn-warning btn-xs rounded-0 mb-2 d-block" href="' . BASE_URL . 'admin/index.php?p=news&amp;sp=editnews&amp;id=' . $v["id"] . '" title="' . $tl["button"]["btn1"] . '">' . $tl["button"]["btn1"] . '</a>';
                echo '</div>';
                echo '<div class="col-sm-6">';
                echo '<a class="btn btn-warning btn-xs rounded-0 mb-2 d-block quickedit" href="' . BASE_URL . 'admin/index.php?p=news&amp;sp=quickedit&amp;id=' . $v["id"] . '" title="' . $tl["button"]["btn2"] . '">' . $tl["button"]["btn2"] . '</a>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
              }

              ?>

            </article>

          </div>

        <?php } ?>

      </div>
    </div>
  </section>
  <!-- =========================
    END NEWS SECTION
  ============================== -->

<?php if ($ENVO_PAGINATE) echo $ENVO_PAGINATE; ?>


<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>