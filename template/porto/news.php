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
                    <a href="<?php echo $v["parseurl"]; ?>">

                      <?php
                      // Image is available so display it or go standard image
                      if ($v["previmg"]) {
                        echo '<img src="' . $v["previmg"] . '" alt="' . $v["title"] . ' | ' . $setting["title"] . '" class="img-responsive">';
                      } else { ?>

                        <div class="thumb-news text-center">
                          <img src="<?php echo '/template/' . ENVO_TEMPLATE . '/img/news/news-feature.jpg'; ?>" alt="<?php echo $v["title"] . ' | ' . $setting["title"]; ?>" class="img-responsive">
                          <div class="caption text-center">
                            <span class="color1"><?php echo $tlporto["news_text"]["newst"]; ?></span>
                            <span class="color2"><?php echo $tlporto["news_text"]["newst1"]; ?></span>
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
                  <a href="<?php echo $v["parseurl"]; ?>"><?php echo envo_cut_text($v["title"], 100, "..."); ?></a>
                </h5>
              </div>
              <div class="preview-content">
                <div class="preview-box-content">
                  <p><?php echo $v["contentshort"]; ?></p>

                  <?php
                  // SYSTEM ICONS - Edit and Quick Edit
                  if (ENVO_ASACCESS) { ?>
                    <div class="system-icons clearfix">
                      <div class="pull-right hidden-xs">
                        <a class="btn btn-filled btn-primary btn-xs" href="<?php echo BASE_URL; ?>admin/index.php?p=news&amp;sp=edit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn1"]; ?>">
                          <?php echo $tl["button"]["btn1"]; ?>
                        </a>
                        <a class="btn btn-filled btn-primary btn-xs quickedit" href="<?php echo BASE_URL; ?>admin/index.php?p=news&amp;sp=quickedit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn2"]; ?>">
                          <?php echo $tl["button"]["btn2"]; ?>
                        </a>
                      </div>
                    </div>
                  <?php } ?>

                  <a href="<?php echo $v["parseurl"]; ?>" class="btn btn-borders btn-default btn-block"><?php echo $tl["global_text"]["gtxt10"]; ?></a>
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