<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=setting'; ?>

  <div class="col-md-12" style="margin: 10px 0 50px 0;">
    <?php if (isset($JAK_BLOG_ALL) && is_array($JAK_BLOG_ALL)) foreach ($JAK_BLOG_ALL as $v) { ?>

      <!-- Post -->
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
                echo '<a href="' . $v["parseurl"] . '"><img src="' . $v["previmg"] . '" alt="' . $v['imgtitle'] . '" class="post-image img-responsive"></a>';
              } else {

              }
              ?>
            </div>
          </div>
          <div class="<?= $contentClass; ?>">
            <div class="post-content">
						<span class="font-size-sm">
							<?php if ($v["showdate"]) { ?>
                <i class="fa fa-calendar"></i> <?php echo $v["created"]; ?>
              <?php } ?>
						</span>
              <!-- Post Content -->
              <h3><a href="<?php echo $v["parseurl"]; ?>"><?php echo jak_cut_text($v["title"], 100, ""); ?></a></h3>
              <p><?php echo jak_cut_text($v['content'], 200, '....') ?></p>
            </div>
          </div>
        </div>
        <!-- End Post Image, Title & Summary -->
        <!-- Post Info -->
        <div class="row">
          <div class="col-md-12">
            <!-- Post Edit - Admin -->
            <?php if (JAK_ASACCESS) { ?>

            <span class="pull-right hidden-xs">
              <a href="<?php echo BASE_URL; ?>admin/index.php?p=blog&amp;sp=edit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn1"]; ?>" class="btn btn-info btn-sm jaktip">
                <span class="visible-xs"><i class="fa fa-edit"></i></span>
                <span class="hidden-xs"><?php echo $tl["button"]["btn1"]; ?></span>
              </a>

              <a href="<?php echo BASE_URL; ?>admin/index.php?p=blog&amp;sp=quickedit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn2"]; ?>" class="btn btn-info btn-sm jaktip quickedit">
                <span class="visible-xs"><i class="fa fa-pencil"></i></span>
                <span class="hidden-xs"><?php echo $tl["button"]["btn2"]; ?></span>
              </a>
            </span>

            <?php } ?><!-- End Post Edit - Admin -->
          </div>
        </div><!-- Post Info -->
        <hr>
      </article><!-- End Post -->

    <?php } ?>
  </div>

<?php if ($JAK_PAGINATE) echo $JAK_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>