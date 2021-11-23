<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if (!$PAGE_ACTIVE) {
  echo '<div class="alert alert-danger">' . $tl["general_error"]["generror2"] . '</div>';
} else {

  // Set link value for page editing
  if (ENVO_ACCESS) {
    if ($setting["printme"]) $printme = 1;
    $apedit  = BASE_URL . 'admin/index.php?p=page&amp;sp=edit&amp;id=' . $PAGE_ID;
    $qapedit = BASE_URL . 'admin/index.php?p=page&amp;sp=quickedit&amp;id=' . $PAGE_ID;
  }

  if ($setting["printme"]) {
    echo '<div id="printdiv">';
  }

  if ($PAGE_PASSWORD && !ENVO_ACCESS && $PAGE_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID]) {

    // PROTECTED PAGE

    ?>

    <section class="protected-page-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-center">
              <h1><?= $tl["global_text"]["gtxt1"] ?></h1>
              <p><?= $tl["global_text"]["gtxt2"] ?></p>
              <form class="form-inline pt-small" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">

                <div class="input-group">
                  <input type="password" name="pagepass" class="form-control" value="" placeholder="<?= $tl["placeholder"]["plc2"] ?>"/>
                  <span class="input-group-btn">
										<button class="btn btn-primary btn-lg" name="pageprotect" type="submit"><?= $tl["button"]["btn4"] ?></button>
									</span>
                </div>
                <input type="hidden" name="pagesec" value="<?= $PAGE_ID ?>"/>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php } else {

    // NOT PROTECTED PAGE

    if ($PAGE_SHOWTITLE) {
      echo '<h2>' . $PAGE_TITLE . '</h2>';
    }

    if (isset($ENVO_HOOK_PAGE) && is_array($ENVO_HOOK_PAGE)) foreach ($ENVO_HOOK_PAGE as $hpage) {
      include_once APP_PATH . $hpage["phpcode"];
    }

    // LOAD - Grid Page
    if (isset($ENVO_PAGE_GRID) && is_array($ENVO_PAGE_GRID)) foreach ($ENVO_PAGE_GRID as $pg) {

      // SHOW - Page Content
      if ($pg["pluginid"] == '9999') {
        echo $PAGE_CONTENT;
      }

      // SHOW - News Grid for page
      if (($pg["pluginid"] == '9998') && isset($ENVO_NEWS_IN_CONTENT) && is_array($ENVO_NEWS_IN_CONTENT)) {

        ?>

        <section class="news-content-area-new">
          <div class="container">
            <h2><?= $setting["newstitle"] ?></h2>
            <div id="owl-carousel" class="owl-carousel all-carousel owl-theme">

              <?php
              // SHOW - News
              foreach ($ENVO_NEWS_IN_CONTENT as $n) {
                ?>

                <div class="news-preview item">
                  <div class="preview-img">
                    <div class="preview-img-container">
                      <div class="preview-img-item">
                        <a href="<?= $n["parseurl"] ?>">

                          <?php
                          // Image is available so display it or go standard image
                          if ($n["previmg"]) {
                            echo '<img src="' . $n["previmg"] . '" alt="' . $n["title"] . ' | ' . $setting["title"] . '" class="img-responsive">';
                          } else { ?>

                            <div class="thumb-news text-center">
                              <img src="<?= '/template/' . ENVO_TEMPLATE . '/img/news/news-feature.jpg' ?>" alt="<?= $n["title"] . ' | ' . $setting["title"] ?>" class="img-responsive">
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
                      echo '<span class="text-uppercase"><strong>' . $tl["news"]["news3"] . ' : </strong></span><span>' . $n["created"] . '</span>';
                      ?>

                    </p>
                  </div>
                  <div class="preview-title">
                    <h5>
                      <a href="<?= $n["parseurl"] ?>"><?= envo_cut_text($n["title"], 60, "...") ?></a>
                    </h5>
                  </div>
                  <div class="preview-content">
                    <div class="preview-box-content">
                      <p><?= $n["contentshort"] ?></p>

                      <?php
                      // SYSTEM ICONS - Edit and Quick Edit
                      if (ENVO_ACCESS) { ?>
                        <div class="system-icons clearfix">
                          <div class="pull-right hidden-xs">
                            <a class="btn btn-filled btn-primary btn-xs" href="<?= BASE_URL ?>admin/index.php?p=news&amp;sp=edit&amp;id=<?= $n["id"] ?>" title="<?= $tl["button"]["btn1"] ?>">
                              <?= $tl["button"]["btn1"] ?>
                            </a>
                            <a class="btn btn-filled btn-primary btn-xs quickedit" href="<?= BASE_URL ?>admin/index.php?p=news&amp;sp=quickedit&amp;id=<?= $n["id"] ?>" title="<?= $tl["button"]["btn2"] ?>">
                              <?= $tl["button"]["btn2"] ?>
                            </a>
                          </div>
                        </div>
                      <?php } ?>

                      <a href="<?= $n["parseurl"] ?>" class="btn btn-borders btn-default btn-block"><?= $tl["global_text"]["gtxt10"] ?></a>
                    </div>
                  </div>
                </div>

                <?php
              }
              ?>

            </div>
          </div>
        </section>

        <?php
      }

      // LOAD - Hook PHP Code for page
      if (isset($ENVO_HOOK_PAGE_GRID) && is_array($ENVO_HOOK_PAGE_GRID)) foreach ($ENVO_HOOK_PAGE_GRID as $hpagegrid) {
        eval($hpagegrid["phpcode"]);
      }

    }

    // SHOW - Date, social buttons and tag list
    if ($SHOWDATE || $SHOWSOCIALBUTTON || ($ENVO_TAGLIST && $SHOWTAGS)) { ?>
      <section class="pt-small pb-small">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <?php if ($SHOWDATE) { ?>
                <div class="col-md-3">
                  <i class="icon-clock-1"></i>
                  <time datetime="<?= $PAGE_TIME_HTML5 ?>"><?= $PAGE_TIME ?></time>
                </div>
              <?php }
              if ($ENVO_TAGLIST && $SHOWTAGS) { ?>
                <div class="col-md-5">
                  <i class="icon-tags"></i> <?= $ENVO_TAGLIST ?>
                </div>
              <?php }
              if ($SHOWSOCIALBUTTON) { ?>
                <div class="pull-right">
                  <div style="display: table;">
                    <div style="display: table-cell;vertical-align: middle;padding-right: 20px;">
                      <strong><?= $tl["share"]["share"] . ' ' ?></strong>
                    </div>
                    <div id="sollist-sharing"></div>
                  </div>
                </div>
              <?php } ?>

            </div>
          </div>
        </div>
      </section>
    <?php }

  }

  if ($setting["printme"]) {
    echo '</div>';
  }

}

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php';

?>