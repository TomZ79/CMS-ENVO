<?php if (JAK_PLUGIN_ACCESS_FAQ) {

  $JAK_FAQ_CAT = JAK_Base::jakGetcatmix(JAK_PLUGIN_VAR_FAQ, '', DB_PREFIX . 'faqcategories', JAK_USERGROUPID, $jkv["faqurl"]);

  if ($JAK_FAQ_CAT) { ?>
    <aside class="nav-side-menu">

      <h4 class="brand"><?php echo JAK_PLUGIN_NAME_FAQ . ' ' . $tlf["faq_frontend"]["faq8"]; ?></h4>
      <span class="toggle-btn c-icons" data-toggle="collapse" data-target="#accordion"></span>

      <div class="menu-list">
        <ul class="menu-content collapse" id="accordion">
          <?php if (isset($JAK_FAQ_CAT) && is_array($JAK_FAQ_CAT)) foreach ($JAK_FAQ_CAT as $c) { ?>
            <?php if ($c["catparent"] == 0) { ?>

              <li <?php
              // Class for all Blog article in category
              if ($c["varname"] == $url) echo 'class="active"';
              // Class for Blog article
              if ($c["varname"] == $FAQ_CAT) echo 'class="active"';

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

                <ul>
                  <?php if (isset($JAK_FAQ_CAT) && is_array($JAK_FAQ_CAT)) foreach ($JAK_FAQ_CAT as $c1) { ?>
                    <?php if ($c1["catparent"] != '0' && $c1["catparent"] == $c["id"]) { ?>
                      <li>
                        <a href="<?php echo $c1["parseurl"]; ?>" title="<?php echo strip_tags($c1["content"]); ?>">
                          <?php if ($c1["catimg"]) { ?>
                            <i class="fa <?php echo $c1["catimg"]; ?> fa-fw"></i>
                          <?php }
                          echo $c1["name"]; ?>
                          <span <?php echo ($c["count"] <= 9) ? 'class="count count-small"' : 'class="count"'; ?>>
										      <?php echo $c1["count"]; ?>
									      </span>
                        </a>
                      </li>
                    <?php }
                  } ?>
                </ul>
              </li>
            <?php }
          } ?>
        </ul>
      </div>

      <hr>
    </aside>

  <?php }
} ?>