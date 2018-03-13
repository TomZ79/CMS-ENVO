<?php if (ENVO_PLUGIN_ACCESS_BLOG) {

// Get URL
  $url_array = explode('/', $_SERVER['REQUEST_URI']);
  $url       = end($url_array);
  // Get Download Categories
  $ENVO_BLOG_CAT = ENVO_base::envoGetcatmix(ENVO_PLUGIN_VAR_BLOG, '', DB_PREFIX . 'blogcategories', ENVO_USERGROUPID, $setting["blogurl"]);

  if ($ENVO_BLOG_CAT) { ?>
    <aside class="nav-side-menu">

      <h4 class="brand"><?php echo ENVO_PLUGIN_NAME_BLOG . ' - ' . $tlblog["blog_frontend"]["blog2"]; ?></h4>
      <span class="toggle-btn c-icons" data-toggle="collapse" data-target="#blogsidebar"></span>

      <div class="menu-list">
        <ul class="menu-content collapse" id="blogsidebar">
          <?php if (isset($ENVO_BLOG_CAT) && is_array($ENVO_BLOG_CAT)) foreach ($ENVO_BLOG_CAT as $c) { ?>
            <?php if ($c["catparent"] == 0) { ?>

              <li <?php
              // Class for all Blog article in category
              if ($c["varname"] == $url) echo 'class="active"';
              // Class for Blog article - active class for all blog categories
              if (isset($BLOG_CAT) && in_array($c["varname"], $BLOG_CAT)) {
                echo 'class="active"';
              }

              ?> >
                <a href="<?php echo $c["parseurl"]; ?>" title="<?php echo strip_tags($c["content"]); ?>">
                  <?php if ($c["catimg"]) { ?>
                    <i class="fa <?php echo $c["catimg"]; ?> fa-fw"></i>
                  <?php }
                  echo $c["name"]; ?>
                  <span <?php echo ($c["count"] <= 9) ? 'class="count count-small"' : 'class="count"'; ?>>
										<?php echo $c["count"]; ?>
									</span>
                </a>


                <?php

                if (isset($ENVO_BLOG_CAT) && is_array($ENVO_BLOG_CAT)) {
                  echo "<ul>";

                  foreach ($ENVO_BLOG_CAT as $c1) {
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