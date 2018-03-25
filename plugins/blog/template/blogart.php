<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=edit&amp;id=' . $PAGE_ID;
$qapedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=quickedit&amp;id=' . $PAGE_ID;
if ($setting["printme"]) $printme = 1; ?>

  <div id="printdiv" class="blog-p">

    <div class="blog-p-body">
      <h2 class="first-child text-color hidden-xs"><?=$PAGE_TITLE?></h2>
      <div class="row">
        <div class="col-sm-6">
          <p class="text-muted"><i class="fa fa-hand-o-right"></i> <?=$BLOG_CATLIST?>
            <br><?php if ($SHOWDATE) { ?><i class="fa fa-clock-o"></i> <?=$PAGE_TIME?><br><?php } ?>
            <i class="fa fa-eye"></i> <?=$BLOG_HITS?></p>
        </div>
        <div class="col-sm-6">
          <!-- Show date, social buttons and tag list -->
          <?php if ($SHOWSOCIALBUTTON) include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/socialbutton.php'; ?>
          <?php if ($ENVO_TAGLIST) { ?>
            <i class="fa fa-tags"></i> <?=$ENVO_TAGLIST?>
          <?php } ?>
        </div>
      </div>
      <hr>
      <?=$PAGE_CONTENT?>
      <!-- <img src="<?=BASE_URL . $SHOWIMG?>" alt="envo-preview" class="post-image img-responsive"> -->
    </div>

  </div>
  <!-- End Print Post -->

  <div class="col-md-12">
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

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>