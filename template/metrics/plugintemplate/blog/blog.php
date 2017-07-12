<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=setting'; ?>

  <!-- =========================
    START BLOG SECTION
  ============================== -->
  <section class="blog-content-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <?php if (isset($JAK_BLOG_ALL) && is_array($JAK_BLOG_ALL)) foreach ($JAK_BLOG_ALL as $v) { ?>

            <!-- Post - Blog -->
            <article class="blog-article-preview mb-xs">
              <!-- Post Image, Title & Summary -->
              <?php
              // Image is available so set 'class' for 'div'
              $img = $v['previmg'];

              if ($img) {
                $imageClass   = 'col-md-4';
                $contentClass = 'col-md-8';
              } else {
                $imageClass   = '';
                $contentClass = 'col-md-12';
              }
              ?>
              <div class="full-intro-head <?= $imageClass; ?> hidden-xs">
                <div class="post-image">
                  <?php
                  // Image is available so display it or go standard
                  if ($img) {
                    echo '<a href="' . $v["parseurl"] . '"><img src="' . $v["previmg"] . '" alt="' . $v['title'] . '" class="post-image img-responsive"></a>';
                  } else {

                  }
                  ?>
                </div>
              </div>
              <div class="full-intro-content <?= $contentClass; ?>">
                <p>

                  <?php if ($v["showdate"]) {
                    echo $tlblog["blog_frontend"]["blog3"] . ' : <span>' . $v["created"] . '</span>';
                  } ?>

                </p>

                <div class="post-content">
                  <!-- Post Content -->
                  <h3><a href="<?php echo $v["parseurl"]; ?>"><?php echo envo_cut_text($v["title"], 100, ""); ?></a></h3>
                  <p class="text"><?php echo envo_cut_text($v['content'], $jkv["blogshortmsg"], '....') ?></p>
                  <p class="pull-right">
                    <a href="<?php echo $v["parseurl"]; ?>"><?php echo $tlblog["blog_frontend"]["blog5"]; ?></a>
                  </p>
                </div>
              </div>
              <!-- Post Info -->
              <div class="row">
                <div class="col-md-12">
                  <!-- Post Edit - Admin -->
                  <?php if (JAK_ASACCESS) { ?>

                  <div class="pull-right hidden-xs">
                    <a class="btn btn-filled btn-primary btn-xs" href="<?php echo BASE_URL; ?>admin/index.php?p=blog&amp;sp=edit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn1"]; ?>">
                      <span class="visible-xs"><i class="fa fa-edit"></i></span>
                      <span class="hidden-xs"><?php echo $tl["button"]["btn1"]; ?></span>
                    </a>

                    <a class="btn btn-filled btn-primary btn-xs quickedit" href="<?php echo BASE_URL; ?>admin/index.php?p=blog&amp;sp=quickedit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn2"]; ?>">
                      <span class="visible-xs"><i class="fa fa-pencil"></i></span>
                      <span class="hidden-xs"><?php echo $tl["button"]["btn2"]; ?></span>
                    </a>
                  </div>

                  <?php } ?><!-- End Post Edit - Admin -->
                </div>
              </div><!-- Post Info -->
              <hr>
            </article><!-- End Post -->

          <?php } ?>

        </div>
      </div>
    </div>
  </section>
  <!-- =========================
    END BLOG SECTION
  ============================== -->

<?php if ($JAK_PAGINATE) echo $JAK_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>