<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ACCESS) $apedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=setting'; ?>

  <!-- =========================
    START BLOG SECTION
  ============================== -->
  <section class="blog-content-area">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <?php if (isset($ENVO_BLOG_ALL) && is_array($ENVO_BLOG_ALL)) foreach ($ENVO_BLOG_ALL as $v) {

            // Get the categories into a list
            unset($catids);
            $resultc = $envodb->query('SELECT id, name, varname FROM ' . DB_PREFIX . 'blogcategories WHERE id IN(' . $v['catid'] . ') ORDER BY id ASC');
            while ($rowc = $resultc->fetch_assoc()) {

              if ($setting["blogurl"]) {
                $seoc = ENVO_base::envoCleanurl($rowc['varname']);
              }

              // EN: Create array with all categories
              // CZ: Vytvoření pole se všemi kategoriemi
              $catids[] = '<span class="blog-cat-list"><a href="' . ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_BLOG, 'category', $rowc['id'], $seoc, '', '') . '" title="' . $tlblog["blog_frontend"]["blog1"] . '">' . $rowc['name'] . '</a></span>';
            }


            if (!empty($catids)) {
              // EN: Returns a string from the elements of an array
              // CZ: Získání elementů z pole
              $blog_catids = join(" ", $catids);
            }

            ?>

            <!-- Post - Blog -->
            <article class="blog-article-preview mb-xs">
              <!-- Post Image, Title & Summary -->
              <?php
              // Image is available so set 'class' for 'div'
              $img = $v['previmg'];

              if ($img) {
                $imageClass   = 'col-md-3';
                $contentClass = 'col-md-9';
              } else {
                $imageClass   = '';
                $contentClass = 'col-md-12';
              }
              ?>

              <?php
              // Image is available so display it or go standard
              if ($img) { ?>
              <div class="full-intro-head <?= $imageClass; ?> hidden-xs">
                <div class="post-image">
                  <div class="row">
                    <a href="<?=$v["parseurl"]?>">
                      <span class="thumb-info">
                        <span class="thumb-info-wrapper">
                          <?php
                          echo '<img src="' . $v["previmg"] . '" alt="' . $v['previmgdesc'] . ' | ' . $setting["title"] . '" class= img-responsive">';
                          ?>
                          <span class="thumb-info-action">
                            <span class="thumb-info-action-icon"><i class="fa fa-link"></i></span>
                          </span>
                        </span>
                      </span>
                    </a>
                  </div>
                </div>
              </div>
              <?php } ?>
              <div class="full-intro-content <?= $contentClass; ?>">
                <div class="post-content">
                  <!-- Post Content -->
                  <?php
                  if ($v["showtitle"]) {
                    echo '<h4><a href="' . $v["parseurl"] . '">' . envo_cut_text($v["title"], 100, "") . '</a></h4>';
                  }
                  ?>
                  <p class="post-data text-muted mb-sm">
                    <?php
                    if ($v["showdate"]) {
                      echo $tlblog["blog_frontend"]["blog3"] . ' : <span class="mr-sm">' . $v["created"] . '</span>';
                    }
                    echo $tlblog["blog_frontend"]["blog4"] . ' : <span>' . $blog_catids . '</span>';
                    ?>
                  </p>
                  <p class="no-mb">
                    <?=envo_cut_text($v['content'], $setting["blogshortmsg"], '....')?>
                  </p>
                  <p class="no-mb pull-right">
                    <a href="<?=$v["parseurl"]?>">
                      <?=$tlblog["blog_frontend"]["blog5"]?>
                    </a>
                  </p>
                </div>
              </div>
              <!-- Post Info -->

              <!-- Post System Button - Admin -->
              <?php if (ENVO_ACCESS) { ?>

              <div class="col-md-12 mt-sm">
                <div class="pull-right">
                  <a class="btn btn-primary btn-xs" href="<?=BASE_URL?>admin/index.php?p=blog&amp;sp=edit&amp;id=<?=$v["id"]?>" title="<?=$tl["button"]["btn1"]?>">
                    <span class="visible-xs"><i class="fa fa-edit"></i></span>
                    <span class="hidden-xs"><?=$tl["button"]["btn1"]?></span>
                  </a>

                  <a class="btn btn-primary btn-xs quickedit" href="<?=BASE_URL?>admin/index.php?p=blog&amp;sp=quickedit&amp;id=<?=$v["id"]?>" title="<?=$tl["button"]["btn2"]?>">
                    <span class="visible-xs"><i class="fa fa-pencil"></i></span>
                    <span class="hidden-xs"><?=$tl["button"]["btn2"]?></span>
                  </a>
                </div>
              </div>

              <?php } ?><!-- End Post Edit - Admin -->

              <div class="clearfix"></div>
              <hr class="dashed tall mt-lg mb-lg">
            </article><!-- End Post -->

          <?php } ?>

        </div>
      </div>
    </div>
  </section>
  <!-- =========================
    END BLOG SECTION
  ============================== -->

<?php if ($ENVO_PAGINATE) echo $ENVO_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>