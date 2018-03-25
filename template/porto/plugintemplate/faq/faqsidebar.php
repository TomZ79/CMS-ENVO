<?php if (ENVO_PLUGIN_ACCESS_FAQ) {
  // Get URL
  $url_array = explode('/', $_SERVER['REQUEST_URI']);
  $url = end($url_array);
  // Get FAQ Categories
  $ENVO_FAQ_CAT = ENVO_base::envoGetcatmix(ENVO_PLUGIN_VAR_FAQ, '', DB_PREFIX . 'faqcategories', ENVO_USERGROUPID, $setting["faqurl"]);

  if ($ENVO_FAQ_CAT) { ?>
    <aside class="nav-side-menu">

      <h4 class="brand"><?=ENVO_PLUGIN_NAME_FAQ . ' - ' . $tlf["faq_frontend"]["faq3"]?></h4>
      <span class="toggle-btn c-icons" data-toggle="collapse" data-target="#faqsidebar"></span>

      <div class="menu-list">
        <ul class="menu-content collapse" id="faqsidebar">
          <?php if (isset($ENVO_FAQ_CAT) && is_array($ENVO_FAQ_CAT)) foreach ($ENVO_FAQ_CAT as $c) { ?>

            <?php if ($c["catparent"] == 0) { ?>

              <li <?php
              // Class for all Blog article in category
              if ($c["varname"] == $url) echo 'class="active"';
              // Class for Blog article - active class for all blog categories
              if (isset($FAQ_CAT) && in_array($c["varname"], $FAQ_CAT)) {
                echo 'class="active"';
              }

              ?> >
                <a href="<?=$c["parseurl"]?>" title="<?=strip_tags($c["content"])?>">
                  <?php if ($c["catimg"]) { ?>
                    <i class="fa <?=$c["catimg"]?> fa-fw"></i>
                  <?php }
                  echo $c["name"]; ?>
                  <span <?=($c["count"] <= 9) ? 'class="count count-small"' : 'class="count"'?>>
										<?=$c["count"]?>
									</span>
                </a>


                <?php

                if (isset($ENVO_FAQ_CAT) && is_array($ENVO_FAQ_CAT)) {
                  echo "<ul>";

                  foreach ($ENVO_FAQ_CAT as $c1) {
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