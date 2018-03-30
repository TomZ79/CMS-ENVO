<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=news&sp=setting';

if (isset($ENVO_HOOK_NEWS) && is_array($ENVO_HOOK_NEWS)) foreach ($ENVO_HOOK_NEWS as $n) {
  include_once APP_PATH . $n['phpcode'];
}
?>

  <!-- =========================
    START NEWS SECTION
  ============================== -->
  <section class="news-content-area">
    <div class="container-fluid">
      <div class="row">

        <?php if (isset($ENVO_NEWS_ALL) && is_array($ENVO_NEWS_ALL)) foreach ($ENVO_NEWS_ALL as $v) { ?>

          <div class="<?php echo($ENVO_HOOK_SIDE_GRID ? "col-md-6" : "col-md-3"); ?> col-sm-4">
            <article class="news-preview mb-xlg">
              <div class="preview-img">
                <div class="preview-img-container">
                  <div class="preview-img-item">
                    <a href="<?= $v["parseurl"] ?>">

                      <?php
                      // Image is available so display it or go standard image
                      if ($v["previmg"]) {
                        echo '<img src="' . $v["previmg"] . '" alt="' . $v["title"] . ' | ' . $setting["title"] . '" class="img-responsive">';
                      } else { ?>

                        <div class="thumb-news text-center">
                          <img src="<?= '/template/' . ENVO_TEMPLATE . '/img/news/news-feature.jpg' ?>" alt="<?= $v["title"] . ' | ' . $setting["title"] ?>" class="img-responsive">
                          <div class="caption text-center">
                            <span class="color1"><?= $tlporto["news_text"]["newst"] ?></span>
                            <span class="color2"><?= $tlporto["news_text"]["newst1"] ?></span>
                          </div>
                        </div>

                      <?php } ?>

                    </a>
                  </div>
                </div>
              </div>
              <div class="preview-head">
                <p class="text-sm">

                  <?php
                  echo '<span class="text-uppercase"><strong>' . $tl["news"]["news3"] . ' : </strong></span><span>' . $v["created"] . '</span>';
                  ?>

                </p>
              </div>
              <div class="preview-title">
                <h5>
                  <a href="<?= $v["parseurl"] ?>"><?= envo_cut_text($v["title"], 60, "...") ?></a>
                </h5>
              </div>
              <div class="preview-content">
                <div class="preview-box-content">
                  <p><?= $v["contentshort"] ?></p>

                  <?php
                  // SYSTEM ICONS - Edit and Quick Edit
                  if (ENVO_ASACCESS) { ?>
                    <div class="system-icons clearfix">
                      <div class="pull-right hidden-xs">
                        <a class="btn btn-filled btn-primary btn-xs" href="<?= BASE_URL ?>admin/index.php?p=news&amp;sp=edit&amp;id=<?= $v["id"] ?>" title="<?= $tl["button"]["btn1"] ?>">
                          <?= $tl["button"]["btn1"] ?>
                        </a>
                        <a class="btn btn-filled btn-primary btn-xs quickedit" href="<?= BASE_URL ?>admin/index.php?p=news&amp;sp=quickedit&amp;id=<?= $v["id"] ?>" title="<?= $tl["button"]["btn2"] ?>">
                          <?= $tl["button"]["btn2"] ?>
                        </a>
                      </div>
                    </div>
                  <?php } ?>

                  <a href="<?= $v["parseurl"] ?>" class="btn btn-borders btn-default btn-block"><?= $tl["global_text"]["gtxt10"] ?></a>
                </div>
              </div>
            </article>
          </div>

        <?php } ?>

      </div>
    </div>
  </section>
  <!-- =========================
    END NEWS SECTION
  ============================== -->

  <section class="pb-small">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <?php if ($ENVO_PAGINATE) echo $ENVO_PAGINATE; ?>

        </div>
      </div>
    </div>
  </section>


<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>