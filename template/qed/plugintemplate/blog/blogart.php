<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php
if (JAK_ASACCESS)
  $apedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=edit&amp;id=' . $PAGE_ID;
$qapedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=quickedit&amp;id=' . $PAGE_ID;
if ($jkv["printme"])
  $printme = 1;
?>

  <div id="printdiv" class="blog-p">

    <article class="post box mb">
      <div class="postPic">
        <img src="<?php echo $SHOWIMG; ?>" alt="" class="responsive mb"/>
      </div>
      <div class="feature-box media-left">
        <?php if ($SHOWDATE) { ?>
          <div class="post-date">
            <?php
            //set locale,
            setlocale(LC_ALL, $site_locale);
            //convert date to month name
            $month_name = ucfirst(strftime("%B", strtotime($PAGE_TIME_HTML5)));
            ?>
            <span class="date-day"><?php echo date("d", strtotime($PAGE_TIME_HTML5)); ?></span>
            <span class="date-month"><?php echo $month_name; ?></span>
          </div>
        <?php } ?>
        <div class="feature-box-content">
          <?php if ($SHOWTITLE) { ?>
            <h3><?php echo $PAGE_TITLE; ?></h3>
          <?php } ?>
          <ul class="entry-meta">
            <?php if ($SHOWDATE) { ?>
              <li class="entry-date">
                <i class="icon-clock-1"></i><?php echo $PAGE_TIME; ?>
              </li>
            <?php } ?>
            <li class="entry-category">
              <i class="icon-list-alt"></i><?php echo $BLOG_CATLIST; ?>
            </li>
            <li class="entry-hits">
              <i class="icon-eye"></i><?php echo $BLOG_HITS; ?>
            </li>
          </ul>
          <hr class="small">
          <?php if ($JAK_TAGLIST) { ?>
            <i class="icon-tags"></i>
            <ul class="entry-meta">
              <?php echo $JAK_TAGLIST; ?>
            </ul>
            <hr class="small">
          <?php } ?>
          <?php echo $PAGE_CONTENT; ?>
        </div>
      </div>

      <?php if ($SHOWSOCIALBUTTON) { ?>
        <hr>
        <div class="pull-right" style="display: table;">
          <div style="display: table-cell;vertical-align: middle;/*! margin-right: 20px; */padding-right: 20px;">
            <strong><?php echo $tl["share"]["share1"] . ' '; ?></strong>
          </div>
          <div id="sollist-sharing"></div>
        </div>
      <?php } ?>

    </article>

    <?php if ($JAK_SHOW_C_FORM) {
      include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/contact.php';
    } ?>

    <hr>
    <?php if (JAK_BLOGPOST && $JAK_COMMENT_FORM) { ?>
      <!-- Comments -->
      <h4><?php echo $tlblog["blog"]["d10"]; ?> (<span id="cComT"><?php echo $JAK_COMMENTS_TOTAL; ?></span>)</h4>
      <div class="post-coments">
        <?php if (isset($JAK_COMMENTS)) {
          echo envo_build_comments(0, $JAK_COMMENTS, 'post-comments', JAK_BLOGMODERATE, $CHECK_USR_SESSION, $tl["general"]["g103"], $tlblog["blog"]["g9"], JAK_BLOGPOST, $envotable2, false, true);
        } else { ?>
          <div class="alert bg-info" id="comments-blank"><?php echo $tlblog["blog"]["g10"]; ?></div>
        <?php } ?>

        <!-- Show Comment Editor if set so -->
        <?php if (JAK_BLOGPOST) { ?>
          <ul class="post-comments">
            <li id="insertPost"></li>
          </ul>
          <?php include APP_PATH . 'template/' . ENVO_TEMPLATE . '/userform.php';
        } ?>

      </div>
      <!-- End Comments -->
    <?php } ?>
  </div>
  <!-- End Print Post -->

  <div class="col-md-12">
    <ul class="pager">
      <?php if ($JAK_NAV_PREV) { ?>
        <li class="previous">
          <a href="<?php echo $JAK_NAV_PREV; ?>">
            <i class="fa fa-caret-left"></i>
            <span class="nav_text_left"><?php echo $JAK_NAV_PREV_TITLE; ?></span>
          </a>
        </li>
      <?php }
      if ($JAK_NAV_NEXT) { ?>
        <li class="next">
          <a href="<?php echo $JAK_NAV_NEXT; ?>">
            <span class="nav_text_right"><?php echo $JAK_NAV_NEXT_TITLE; ?></span>
            <i class="fa fa-caret-right"></i>
          </a>
        </li>
      <?php } ?>
    </ul>
  </div>

  <script src="<?php echo BASE_URL; ?>assets/js/comments.js?=<?php echo $jkv["updatetime"]; ?>"
    type="text/javascript"></script>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>