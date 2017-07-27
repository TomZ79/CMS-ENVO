<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=edit&amp;id=' . $PAGE_ID;
$qapedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=quickedit&amp;id=' . $PAGE_ID;
if ($jkv["printme"]) $printme = 1; ?>

  <div id="printdiv">

    <!-- =========================
    START BLOG SECTION
    ============================== -->
    <div class="blog-article row">
      <div class="full-intro-head">
        <div class="col-md-12">
          <h2><?php echo $PAGE_TITLE; ?></h2>
        </div>
        <div class="col-md-12">
          <p class="post-data text-muted mb-none">
            <!-- Show Date, Categories, Hits -->
            <?php
            if ($SHOWDATE) {
              echo $tlblog["blog_frontend"]["blog3"] . ' : <span class="mr-sm">' . $PAGE_TIME . '</span>';
            }
            echo $tlblog["blog_frontend"]["blog4"] . ' : <span>' . $BLOG_CATLIST . '</span>';
            echo $tlblog["blog_frontend"]["blog6"] . ' : <span class="mr-sm">' . $BLOG_HITS . '</span>';
            ?>
          </p>
        </div>

        <!-- Show Tag list -->
        <?php if ($JAK_TAGLIST) { ?>
          <div class="col-md-12">
            <?php echo $JAK_TAGLIST; ?>
          </div>
        <?php } ?>

      </div>
      <div class="col-md-12">
        <hr class="dashed tall mt-lg mb-lg">
      </div>
      <div class="full-intro-content">
        <div class="col-md-12">
          <!-- Show Content -->
          <?php echo $PAGE_CONTENT; ?>
        </div>
      </div>
    </div>
    <!-- =========================
    END BLOG SECTION
    ============================== -->

    <!-- Show Social button -->
    <?php if ($SHOWSOCIALBUTTON) { ?>
      <div class="row">
        <div class="col-md-12">
          <hr class="dashed tall mt-lg mb-lg">
          <div class="pull-right">
            <div style="display: table;">
              <div style="display: table-cell;vertical-align: middle;/*! margin-right: 20px; */padding-right: 20px;">
                <strong><?php echo $tl["share"]["share"] . ' '; ?></strong>
              </div>
              <div id="sollist-sharing"></div>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>

    <!-- Show Contact form -->
    <?php if ($JAK_SHOW_C_FORM) {?>
      <div class="row">
        <div class="col-md-12">
          <hr class="dashed tall mt-lg mb-lg">
          <div class="alert bg-danger text-dark mb-none">The contact form is not available in this template</div>
        </div>
      </div>
    <?php } ?>

  </div>
  <!-- End Print Post -->

  <div class="row">
    <div class="col-md-12">
      <hr class="dashed tall mt-lg mb-lg">
      <ul class="pager">
        <?php if ($JAK_NAV_PREV) { ?>
          <li class="previous">
            <a href="<?php echo $JAK_NAV_PREV; ?>">
              <i class="fa fa-caret-left"></i>
              <span class="nav_text_left"><?php echo envo_cut_text($JAK_NAV_PREV_TITLE, 30, '...'); ?></span>
            </a>
          </li>
        <?php }
        if ($JAK_NAV_NEXT) { ?>
          <li class="next">
            <a href="<?php echo $JAK_NAV_NEXT; ?>">
              <span class="nav_text_right"><?php echo envo_cut_text($JAK_NAV_NEXT_TITLE, 30, '...'); ?></span>
              <i class="fa fa-caret-right"></i>
            </a>
          </li>
        <?php } ?>
      </ul>
    </div>
  </div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>