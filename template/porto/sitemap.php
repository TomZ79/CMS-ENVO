<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?= $PAGE_CONTENT ?>

  <section class="my-3">
    <div class="container">
      <div class="row">
        <div class="col">

          <?php

          if (isset($ENVO_CAT_SITE) && is_array($ENVO_CAT_SITE)) {

            echo '<ul class="list list-icons list-icons-sm">';

            foreach ($ENVO_CAT_SITE as $v) {
              if ($v["catparent"] == '0') {

                echo '<li><a href="' . $v["varname"] . '"><i class="far fa-file"></i>' . $v["name"] . '</a>';

                if (isset($v["catexist"])) {

                  echo '<ul class="list list-icons list-icons-sm">';

                  if (isset($ENVO_CAT_SITE) && is_array($ENVO_CAT_SITE)) foreach ($ENVO_CAT_SITE as $z) {
                    if ($z["catparent"] != '0' && $z["catparent2"] == '0' && $z["catparent"] == $v["id"]) {
                      echo '<li><a href="' . $z["varname"] . '">' . $z["name"] . '</a>';
                      if (isset($z["catexist2"])) {
                        echo '<ul class="list list-icons list-icons-sm">';
                        if (isset($ENVO_CAT_SITE) && is_array($ENVO_CAT_SITE)) foreach ($ENVO_CAT_SITE as $o) {
                          if ($o["catparent"] != '0' && $o["catparent2"] != '0' && $o["catparent"] == $v["id"] && $o["catparent2"] == $z["id"]) {
                            echo '<li><a href="' . $o["varname"] . '">' . envo_cut_text($o["name"], 35) . '</a></li>';
                          }
                        }
                        echo '</ul>';
                      }
                      echo '</li>';
                    }
                  }

                  echo '</ul>';
                } else {

                }

              }

            }

            echo '</ul>';

          }

          ?>

        </div>

        <?php

        if (isset($ENVO_HOOK_SITEMAP) && is_array($ENVO_HOOK_SITEMAP)) foreach ($ENVO_HOOK_SITEMAP as $hs) {
          // include_once APP_PATH . $hs['phpcode'];
          eval($hs["phpcode"]);
        }

        ?>

      </div>
    </div>
  </section>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>