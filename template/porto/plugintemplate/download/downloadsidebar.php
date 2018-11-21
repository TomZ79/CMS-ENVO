<?php if (ENVO_PLUGIN_ACCESS_DOWNLOAD) {
  // Get URL
  $url_array = explode('/', $_SERVER['REQUEST_URI']);
  $url       = end($url_array);
  // Get DOWNLOAD Categories
  $ENVO_DOWNLOAD_CAT = ENVO_base ::envoGetcatmix(ENVO_PLUGIN_VAR_DOWNLOAD, '', DB_PREFIX . 'downloadcategories', ENVO_USERGROUPID, $setting["downloadurl"]);

  if ($ENVO_DOWNLOAD_CAT) { ?>
    <aside class="nav-side-menu">

      <h4 class="brand"><?= ENVO_PLUGIN_NAME_DOWNLOAD . ' - ' . $tld["downl_frontend"]["downl8"] ?></h4>
      <span class="toggle-btn c-icons" data-toggle="collapse" data-target="#wikisidebar"></span>

      <div class="menu-list">
        <ul class="menu-content collapse" id="wikisidebar">
          <?php if (isset($ENVO_DOWNLOAD_CAT) && is_array($ENVO_DOWNLOAD_CAT)) foreach ($ENVO_DOWNLOAD_CAT as $c) { ?>

            <?php if ($c["catparent"] == 0) { ?>

              <li <?php
              // Class for all Blog article in category
              if ($c["varname"] == $url) echo 'class="active"';
              // Class for Blog article - active class for all blog categories
              if (isset($DOWNLOAD_CAT) && in_array($c["varname"], $DOWNLOAD_CAT)) {
                echo 'class="active"';
              }

              ?> >
                <a href="<?= $c["parseurl"] ?>" title="<?= strip_tags($c["content"]) ?>">
                  <?php if ($c["catimg"]) { ?>
                    <i class="fa <?= $c["catimg"] ?> fa-fw"></i>
                  <?php }
                  echo $c["name"]; ?>
                  <span <?= ($c["count"] <= 9) ? 'class="count count-small"' : 'class="count"' ?>>
										<?= $c["count"] ?>
									</span>
                </a>


                <?php

                if (isset($ENVO_DOWNLOAD_CAT) && is_array($ENVO_DOWNLOAD_CAT)) {
                  echo "<ul>";

                  foreach ($ENVO_DOWNLOAD_CAT as $c1) {
                    if ($c1["catparent"] != '0' && $c1["catparent"] == $c["id"]) {
                      echo "<li>";
                      echo '<a href="' . $c1['parseurl'] . '" title="' . strip_tags($c1['content']) . '">';
                      if ($c1["catimg"]) {
                        echo '<i class="fa ' . $c1['catimg'] . 'fa-fw"></i>';
                      }
                      echo $c1["name"];
                      echo '<span ' . ($c["count"] <= 9 ? 'class="count count-small"' : 'class="count"') . '" title="' . strip_tags($c1['content']) . '">' . $c1['count'] . '</span>';
                      echo "</a>";
                      echo "</li>";
                    }
                  }
                  echo '</ul>';
                }

                ?>

              </li>
            <?php }
          } ?>
        </ul>
      </div>

      <hr>
    </aside>

  <?php }
} ?>
