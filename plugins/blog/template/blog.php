<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=setting'; ?>

  <div class="col-md-12" style="margin: 10px 0 50px 0;">
    <?php if (isset($ENVO_BLOG_ALL) && is_array($ENVO_BLOG_ALL)) foreach ($ENVO_BLOG_ALL as $v) { ?>

      <!-- Post - Blog -->
      <article>
        <!-- Post Image, Title & Summary -->
        <div class="row">
          <?php
          // Image is available so set 'class' for 'div'
          $img = $v['previmg'];

          if ($img) {
            $imageClass   = 'col-md-2';
            $contentClass = 'col-md-10';
          } else {
            $imageClass   = '';
            $contentClass = 'col-md-12';
          }
          ?>
          <div class="<?= $imageClass; ?> hidden-xs">
            <div class="post-image">
              <?php
              // Image is available so display it or go standard
              if ($img) {
                echo '<a href="' . $v["parseurl"] . '"><img src="' . $v["previmg"] . '" alt="' . $v['previmgdesc'] . ' | ' . $setting["title"] . '" class="post-image img-responsive"></a>';
              } else {

              }
              ?>
            </div>
          </div>
          <div class="<?= $contentClass; ?>">
            <div class="post-content">
						<span class="font-size-sm">
							<?php if ($v["showdate"]) { ?>
                <i class="fa fa-calendar"></i> <?=$v["created"]?>
              <?php } ?>
						</span>
              <!-- Post Content -->
              <h3><a href="<?=$v["parseurl"]?>"><?=envo_cut_text($v["title"], 100, "")?></a></h3>
              <p><?=envo_cut_text($v['content'], $setting["blogshortmsg"], '....')?></p>
              <p class="pull-right"><a href="<?=$v["parseurl"]?>"><?=$tlblog["blog_frontend"]["blog5"]?></a></p>
            </div>
          </div>
        </div>
        <!-- End Post Image, Title & Summary -->
        <!-- Post Info -->
        <div class="row">
          <div class="col-md-12">
            <!-- Post Edit - Admin -->
            <?php if (ENVO_ASACCESS) { ?>

            <span class="pull-right hidden-xs">
              <a href="<?=BASE_URL?>admin/index.php?p=blog&amp;sp=edit&amp;id=<?=$v["id"]?>" title="<?=$tl["button"]["btn1"]?>" class="btn btn-info btn-sm">
                <span class="visible-xs"><i class="fa fa-edit"></i></span>
                <span class="hidden-xs"><?=$tl["button"]["btn1"]?></span>
              </a>

              <a href="<?=BASE_URL?>admin/index.php?p=blog&amp;sp=quickedit&amp;id=<?=$v["id"]?>" title="<?=$tl["button"]["btn2"]?>" class="btn btn-info btn-sm quickedit">
                <span class="visible-xs"><i class="fa fa-pencil"></i></span>
                <span class="hidden-xs"><?=$tl["button"]["btn2"]?></span>
              </a>
            </span>

            <?php } ?><!-- End Post Edit - Admin -->
          </div>
        </div><!-- Post Info -->
        <hr>
      </article><!-- End Post -->

    <?php } ?>
  </div>

<?php if ($ENVO_PAGINATE) echo $ENVO_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>