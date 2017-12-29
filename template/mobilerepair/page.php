<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (!$PAGE_ACTIVE) { ?>
  <div class="alert alert-danger">
    <?php echo $tl["general_error"]["generror2"]; ?>
  </div>
<?php } else {
  // Set link value for page editing
  if (ENVO_ASACCESS) {
    if ($setting["printme"]) $printme = 1;
    $apedit  = BASE_URL . 'admin/index.php?p=page&amp;sp=edit&amp;id=' . $PAGE_ID;
    $qapedit = BASE_URL . 'admin/index.php?p=page&amp;sp=quickedit&amp;id=' . $PAGE_ID;
  }
  if ($setting["printme"]) { ?>

    <div id="printdiv">

  <?php } ?>

  <?php if ($PAGE_PASSWORD && !ENVO_ASACCESS && $PAGE_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID]) { ?>

    <!-- Protected page -->
    <section class="protected-page-area">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="text-center">
              <h1><?php echo $tl["global_text"]["gtxt1"]; ?></h1>
              <p><?php echo $tl["global_text"]["gtxt2"]; ?></p>
              <!-- Show password form -->
              <form class="form-inline mt-30" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

                <div class="input-group">
                  <input type="password" name="pagepass" class="form-control" value="" placeholder="<?php echo $tl["placeholder"]["plc2"]; ?>"/>
                  <span class="input-group-btn">
										<button class="btn btn-dark btn-theme-colored btn-flat btn-lg" name="pageprotect" type="submit"><?php echo $tl["button"]["btn4"]; ?></button>
									</span>
                </div>
                <input type="hidden" name="pagesec" value="<?php echo $PAGE_ID; ?>"/>

              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

  <?php } else {

    // Heading / Title
    if ($PAGE_SHOWTITLE) {
      echo '<h2 class="text-uppercase">' . $PAGE_TITLE . '</h2>';
    }

    // Show date and tag list
    if ($SHOWDATE || ($ENVO_TAGLIST && $SHOWTAGS)) { ?>
      <div class="row">
        <div class="col-md-12">

          <?php if ($SHOWDATE) { ?>
            <div class="col-md-2 text-gray-darkgray font-13">
              <i class="fa fa-calendar-o mr-10"></i>
              <time datetime="<?php echo $PAGE_TIME_HTML5; ?>"><?php echo $PAGE_TIME; ?></time>
            </div>
          <?php }
          if ($ENVO_TAGLIST && $SHOWTAGS) { ?>
            <div class="col-md-10 text-gray-darkgray font-13">
              <i class="fa fa-tags mr-10"></i> <?php echo $ENVO_TAGLIST; ?>
            </div>
          <?php } ?>

          <div class="clearfix"></div>
          <div class="separator mb-10 mt-10"></div>
        </div>
      </div>
    <?php }

    if (isset($ENVO_HOOK_PAGE) && is_array($ENVO_HOOK_PAGE)) foreach ($ENVO_HOOK_PAGE as $hpage) {
      include_once APP_PATH . $hpage["phpcode"];
    }

    // Load Grid
    if (isset($ENVO_PAGE_GRID) && is_array($ENVO_PAGE_GRID)) foreach ($ENVO_PAGE_GRID as $pg) {

      // Show Content
      if ($pg["pluginid"] == '9999') {
        echo $PAGE_CONTENT;
      }

      // Show Contact form
      if ($pg["pluginid"] == '9997' && $ENVO_SHOW_C_FORM) {
        include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/contact.php';
      }

      // Load News
      if ($pg["pluginid"] == '9998' && $ENVO_NEWS_IN_CONTENT) {
        if (isset($ENVO_NEWS_IN_CONTENT) && is_array($ENVO_NEWS_IN_CONTENT)) { ?>

          <!-- =========================
            START NEWS SECTION
          ============================== -->
          <section class="news-content-area-new">
            <div class="container-fluid">
              <div class="row">
                <div class="col-sm-12">
                  <h2><?php echo $setting["newstitle"]; ?></h2>
                  <div class="owl-carousel all-carousel owl-theme">

                    <!-- Show news -->
                    <?php foreach ($ENVO_NEWS_IN_CONTENT as $n) { ?>

                      <div class="item">
                        <div class="full-intro-head">
                          <h3>
                            <a href="<?php echo $n["parseurl"]; ?>"><?php echo envo_cut_text($n["title"], 30, "..."); ?></a>
                          </h3>
                          <p>
                            <?php echo $tl["news"]["news3"] . ' : <span>' . $n["created"] . '</span>'; ?>
                          </p>
                        </div>
                        <div class="full-intro-content">
                          <hr>
                          <p>
                            <?php echo $n["contentshort"]; ?>
                          </p>
                          <p>
                            <a href="<?php echo $v["parseurl"]; ?>" class="pull-right"><?php echo $tl["news"]["news1"]; ?>
                              <i class="fa fa-arrow-right"></i>
                            </a>
                          </p>

                          <div class="clearfix"></div>

                          <?php if (ENVO_ASACCESS) { ?>

                            <div class="system-icons">
                              <hr class="mt-small mb-small">
                              <div class="pull-right">
                                <a class="btn btn-filled btn-primary btn-xs" href="<?php echo BASE_URL; ?>admin/index.php?p=news&amp;sp=edit&amp;id=<?php echo $n["id"]; ?>" title="<?php echo $tl["button"]["btn1"]; ?>">
                                  <i class="fa fa-pencil"></i>
                                </a>
                                <a class="btn btn-filled btn-primary btn-xs quickedit" href="<?php echo BASE_URL; ?>admin/index.php?p=news&amp;sp=quickedit&amp;id=<?php echo $n["id"]; ?>" title="<?php echo $tl["button"]["btn2"]; ?>">
                                  <i class="fa fa-edit"></i>
                                </a>
                              </div>
                            </div>

                          <?php } ?>
                        </div>
                      </div>
                    <?php } ?>

                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- =========================
            END NEWS SECTION
          ============================== -->

        <?php }
      }
      if (isset($ENVO_HOOK_PAGE_GRID) && is_array($ENVO_HOOK_PAGE_GRID)) foreach ($ENVO_HOOK_PAGE_GRID as $hpagegrid) {
        eval($hpagegrid["phpcode"]);
      }
    } ?>

    <!-- Show login form -->
    <?php if ($PAGE_LOGIN_FORM) {
      include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/loginpage.php';
    } ?>

    <!-- Show social buttons -->
    <?php if ($SHOWSOCIALBUTTON) { ?>
      <section>
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <?php if ($SHOWSOCIALBUTTON) { ?>
                <div class="pull-right">
                  <div style="display: table;">
                    <div style="display: table-cell;vertical-align: middle; padding-right: 20px;">
                      <strong><?php echo $tl["share"]["share"] . ' '; ?></strong>
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
  if ($setting["printme"]) { ?>

    </div>

  <?php }
}

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>