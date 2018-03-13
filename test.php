<section class="news-content-area-new">
  <div class="container-fluid">
    <h2><?php echo $setting["newstitle"]; ?></h2>
    <div id="owl-demo-2" class="owl-carousel all-carousel owl-theme">

      <?php
      // SHOW - News
      foreach ($ENVO_NEWS_IN_CONTENT as $n) {
        ?>

        <article class="thumbnail item">
          <div class="full-intro-head">
            <h3><a href="<?php echo $n["parseurl"]; ?>"><?php echo envo_cut_text($n["title"], 30, "..."); ?></a>
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
        </article>

        <?php
      }
      ?>

    </div>
  </div>
</section>