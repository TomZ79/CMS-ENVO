<?php include_once APP_PATH . 'template/canvas/header.php'; ?>

<?php if (!$PAGE_ACTIVE) { ?>
  <div class="alert bg-danger">
    <?php echo $tl["errorpage"]["ep"]; ?>
  </div>
<?php }
if (JAK_ASACCESS) {
  $apedit = BASE_URL . 'admin/index.php?p=news&amp;sp=edit&amp;id=' . $PAGE_ID;
  $qapedit = BASE_URL . 'admin/index.php?p=news&amp;sp=quickedit&amp;id=' . $PAGE_ID;
} ?>

  <!-- Post Content
            ============================================= -->
  <div class="nobottommargin clearfix">

    <div class="single-post nobottommargin">

      <!-- Single Post
      ============================================= -->
      <div class="entry clearfix">

        <!-- Entry Title
        ============================================= -->
        <div class="entry-title">
          <?php if ($SHOWTITLE) { ?>
            <h2><?php echo $PAGE_TITLE; ?></h2>
          <?php } ?>
        </div><!-- .entry-title end -->

        <!-- Entry Meta - Date, Hits
        ============================================= -->
        <?php if ($SHOWDATE || $SHOWHITS) { ?>
        <ul class="entry-meta clearfix">
          <!-- Show Date -->
          <?php if ($SHOWDATE) { ?>
            <li><i class="icon-calendar3"></i> <time datetime="<?php echo $PAGE_TIME_HTML5; ?>"><?php echo $PAGE_TIME; ?></time></li>
          <?php } ?>
          <!-- Show Hits -->
          <?php if ($SHOWHITS) { ?>
          <li><i class="fa fa-eye"></i> <?php echo $tl["general"]["g13"] . $PAGE_HITS; ?></li>
          <?php } ?>
        </ul><!-- .entry-meta end -->
        <?php } ?>

        <!-- Entry Content
        ============================================= -->
        <div class="entry-content notopmargin">

          <!-- Entry Image
          ============================================= -->
          <div class="entry-image alignleft">
            <a href="#"><img src="<?php echo $PAGE_IMAGE; ?>" alt="Preview - <?php echo $PAGE_TITLE; ?>"></a>
          </div><!-- .entry-image end -->

          <?php echo $PAGE_CONTENT; ?>
          <!-- Post Single - Content End -->

          <!-- Tag Cloud
					============================================= -->
          <?php if ($JAK_TAGLIST) { ?>
            <!-- Show Tags -->
            <div class="tagcloud clearfix bottommargin">
              <?php echo $JAK_TAGLIST; ?>
            </div><!-- .tagcloud end -->
          <?php } ?>

          <div class="clear"></div>

          <!-- Post Single - Share
          ============================================= -->
          <?php if ($SHOWSOCIALBUTTON) { ?>
            <div class="si-share noborder clearfix">
              <?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/socialbutton.php'; ?>
            </div><!-- Post Single - Share End -->
          <?php } ?>

        </div>
      </div><!-- .entry end -->

      <!-- Post Navigation
      ============================================= -->
      <div class="post-navigation clearfix">

        <div class="col_half nobottommargin">
        <?php if ($JAK_NAV_PREV) { ?>
            <a href="<?php echo $JAK_NAV_PREV; ?>">&lArr; <?php echo $JAK_NAV_PREV_TITLE; ?></a>
        <?php } else { echo '&nbsp'; } ?>
        </div>

        <div class="col_half col_last tright nobottommargin">
        <?php if ($JAK_NAV_NEXT) { ?>
            <a href="<?php echo $JAK_NAV_NEXT; ?>"><?php echo $JAK_NAV_NEXT_TITLE; ?> &rArr;</a>
        <?php } else { echo '&nbsp'; } ?>
        </div>

      </div><!-- .post-navigation end -->

      <!-- Show other settings
      ============================================= -->
      <?php if ($SHOWVOTE && $USR_CAN_RATE) { ?>
        <div class="style-msg errormsg">
          <div class="sb-msg"><i class="icon-remove"></i><strong>Oooh!</strong> Like button is not available in Canvas template for News Plugin.</div>
        </div>
      <?php } ?>

      <?php if (isset($JAK_HOOK_PAGE) && is_array($JAK_HOOK_PAGE)) { ?>
        <div class="style-msg errormsg">
          <div class="sb-msg"><i class="icon-remove"></i><strong>Oooh!</strong> Hooks is not available in Canvas template for News Plugin.</div>
        </div>
      <?php } ?>

      <!-- $JAK_PAGE_GRID is removed -->

    </div>

  </div><!-- .postcontent end -->

<?php include_once APP_PATH . 'template/canvas/footer.php'; ?>