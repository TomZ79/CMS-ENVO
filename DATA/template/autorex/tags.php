<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

  <div class="maincontent">
    <section class="services-section style-three">
      <div class="auto-container">
        <div class="sec-title style-two">
          <h2>Vyhledání podle Tagu (Štítku)</h2>
        </div>
        <div class="row">
          <div class="col">

            <?php
            if (isset($ENVO_GET_TAG_CLOUD)) {

              echo '<div class="clearfix"><ul class="tags-list mb-0 float-left">' . $ENVO_GET_TAG_CLOUD . '</ul></div>';

              if (isset($ENVO_NO_TAG_DATA)) {
                echo '<div class="alert bg-warning" style="margin-top: 3em">' . $ENVO_NO_TAG_DATA . '</div>';
              }

            }
            ?>

          </div>
        </div>
        <hr>
        <div class="row">

          <?php $count = 0;
          if (isset($ENVO_TAG_PAGE_DATA) && is_array($ENVO_TAG_PAGE_DATA)) foreach ($ENVO_TAG_PAGE_DATA as $p) {
            $count++; ?>

            <div class="col-lg-3 service-block-one">
              <div class="inner-box hvr-float-shadow">
                <h2><?= $p["title"] ?></h2>
                <p><?= $p["content"] ?></p>
                <a href="<?= $p["parseurl"] ?>" class="read-more"><?= $tl["global_text"]["gtxt8"] ?> +</a>
              </div>
            </div>

          <?php }
          if (isset($ENVO_TAG_NEWS_DATA) && is_array($ENVO_TAG_NEWS_DATA)) foreach ($ENVO_TAG_NEWS_DATA as $n) {
            $count++; ?>

            <div class="col-lg-3 service-block-one">
              <div class="inner-box hvr-float-shadow">
                <h2><?= $n["title"] ?></h2>
                <p><?= $n["content"] ?></p>
                <a href="<?= $n["parseurl"] ?>" class="read-more"><?= $tl["global_text"]["gtxt8"] ?> +</a>
              </div>
            </div>

            <?php

          }

          // Include php code for plugin
          if (isset($ENVO_HOOK_TAGS) && is_array($ENVO_HOOK_TAGS)) foreach ($ENVO_HOOK_TAGS as $ht) {
            eval($ht['phpcode']);
          }


          ?>

        </div>
        <div class="row mt-5">
          <div class="col">

            <?php if (isset($count)) { ?>

              <div class="alert" style="background-color: #ee0d09; color: #FFF;">
                <?= str_replace("%s", $count, $tl["searching"]["stxt13"]) ?>
              </div>

            <?php } else { ?>

              <div class="alert bg-danger">
                <?= $tl["searching"]["stxt12"] ?>
              </div>

            <?php } ?>

          </div>
        </div>
      </div>
    </section>
  </div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>