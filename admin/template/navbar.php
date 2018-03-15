<ul class="menu-items">
  <?php if ($ENVO_MODULES) { ?>
    <!-- START DASHBOARD SECTION-->
    <li class="m-t-30">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor(BASE_URL_ADMIN, '<span class="title">' . $tl["menu"]["mm"] . '</span>');
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', '<i class="pg-laptop"></i>', 'icon-thumbnail ' . (($page == '') ? 'bg-success' : ''));
      ?>

    </li>
    <!-- END DASHBOARD SECTION -->

    <!-- START LOGS SECTION -->
    <?php
    if ($page == 'logs' || $page == 'searchlog') {
      $classlogssection = 'open active';
      $classiconbg = 'bg-success';
    }
    ?>
    <li class="<?php echo $classlogssection; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('javascript:;', '<span class="title">' . $tl["menu"]["mm7"] . '</span><span class="arrow ' . $classlogssection . '"></span>');
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', '<i class="pg-grid"></i>', 'icon-thumbnail ' . $classiconbg);
      ?>

      <ul class="sub-menu">
        <li class="<?php echo ($page == 'logs') ? 'submenu-active' : ''; ?>">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html->addAnchor('index.php?p=logs', $tl["submenu"]["sm2"]);
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm2"]), 'icon-thumbnail');
          ?>

        </li>
        <li class="<?php echo ($page == 'searchlog') ? 'submenu-active' : ''; ?>">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html->addAnchor('index.php?p=searchlog', $tl["submenu"]["sm3"]);
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm3"]), 'icon-thumbnail');
          ?>

        </li>
      </ul>
    </li>
    <!-- END LOGS SECTION -->

    <!-- START BASIC CONFIG SECTION -->
    <?php
    if ($page == 'site' || $page == 'setting') {
      $classbasicsection = 'open active';
      $classbasiciconbg = 'bg-success';
    }
    ?>
    <li class="<?php echo $classbasicsection; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('javascript:;', '<span class="title">' . $tl["menu"]["mm6"] . '</span><span class="arrow ' . $classbasicsection . '"></span>');
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', '<i class="pg-settings_small"></i>', 'icon-thumbnail ' . $classbasiciconbg);
      ?>

      <ul class="sub-menu">
        <li class="<?php echo ($page == 'site') ? 'submenu-active' : ''; ?>">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html->addAnchor('index.php?p=site', $tl["submenu"]["sm1"]);
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm1"]), 'icon-thumbnail');
          ?>

        </li>
        <li class="<?php echo ($page == 'setting') ? 'submenu-active' : ''; ?>">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html->addAnchor('index.php?p=setting', $tl["submenu"]["sm10"]);
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm10"]), 'icon-thumbnail');
          ?>

        </li>
      </ul>
    </li>
    <!-- END BASIC CONFIG SECTION -->

    <!-- START GENERAL CONFIG SECTION -->
    <?php
    if ($page == 'plugins' || $page == 'template' || $page == 'maintenance') {
      $classgeneralsection = 'open active';
      $classgeneraliconbg = 'bg-success';
    }
    ?>
    <li class="<?php echo $classgeneralsection; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('javascript:;', '<span class="title">' . $tl["menu"]["mm1"] . '</span><span class="arrow ' . $classgeneralsection . '"></span>');
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', '<i class="fa fa-wrench"></i>', 'icon-thumbnail ' . $classgeneraliconbg);
      ?>

      <ul class="sub-menu">

        <?php if (ENVO_SUPERADMINACCESS) { ?>
          <li class="<?php echo ($page == 'plugins') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=plugins', $tl["submenu"]["sm11"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm11"]), 'icon-thumbnail');
            ?>

          </li>
          <li class="<?php echo ($page == 'plugins' && $page1 == 'hooks' && $page2 == '') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks', $tl["submenu"]["sm12"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm12"]), 'icon-thumbnail');
            ?>

          </li>
          <?php if ($page1 == 'hooks' && $page2 == 'sorthooks') { ?>
            <li class="<?php echo ($page == 'plugins' && $page1 == 'hooks' && $page2 == 'sorthooks') ? 'submenu-active' : ''; ?>">

              <?php
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=sorthooks&amp;id=' . $page2, $tl["submenu"]["sm15"]);
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm15"]), 'icon-thumbnail');
              ?>

            </li>
          <?php }
          if ($page1 == 'hooks' && $page2 == 'edit') { ?>
            <li class="<?php echo ($page == 'plugins' && $page1 == 'hooks' && $page2 == 'edithook') ? 'submenu-active' : ''; ?>">

              <?php
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=edithook&amp;id=' . $page3, $tl["submenu"]["sm13"]);
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm13"]), 'icon-thumbnail');
              ?>

            </li>
          <?php } ?>
          <li class="<?php echo ($page == 'plugins' && $page1 == 'hooks' && $page2 == 'newhook') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;sp=newhook', $tl["submenu"]["sm14"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm14"]), 'icon-thumbnail');
            ?>

          </li>
          <li class="list-divider"></li>

          <li class="<?php echo ($page == 'template') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=template', $tl["submenu"]["sm20"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm20"]), 'icon-thumbnail');
            ?>

          </li>
          <li class="<?php echo ($page == 'template' && $page1 == 'settings') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=template&amp;sp=settings', $tl["submenu"]["sm21"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm21"]), 'icon-thumbnail');
            ?>

          </li>
          <li class="<?php echo ($page == 'template' && $page1 == 'edit-files') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=template&amp;sp=edit-files', $tl["submenu"]["sm22"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm22"]), 'icon-thumbnail');
            ?>

          </li>
          <li class="<?php echo ($page == 'template' && $page1 == 'cssedit') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=template&amp;sp=cssedit', $tl["submenu"]["sm23"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm23"]), 'icon-thumbnail');
            ?>

          </li>
          <li class="<?php echo ($page == 'template' && $page1 == 'langedit') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=template&amp;sp=langedit', $tl["submenu"]["sm24"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm24"]), 'icon-thumbnail');
            ?>

          </li>
          <li class="list-divider"></li>

          <li class="<?php echo ($page == 'maintenance') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=maintenance', $tl["submenu"]["sm30"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm30"]), 'icon-thumbnail');
            ?>

          </li>

        <?php } else { ?>

          <li style="padding-left: 32px">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', $tl["menu"]["mm8"]);
            ?>

          </li>

        <?php } ?>
      </ul>
    </li>
    <!-- END GENERAL CONFIG SECTION -->

    <!-- START SOCIAL MEDIA SECTION -->
    <?php
    if ($page == 'settingfacebook' || $page == 'facebookgallery' || $page == 'mediasharing') {
      $classsocialsection = 'open active';
      $classsocialiconbg  = 'bg-success';
    }
    ?>
    <li class="<?php echo $classsocialsection; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('javascript:;', '<span class="title">' . $tl["menu"]["mm2"] . '</span><span class="arrow ' . $classsocialsection . '"></span>');
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', '<i class="pg-social"></i>', 'icon-thumbnail ' . $classsocialiconbg);
      ?>

      <ul class="sub-menu">
        <li class="">
          <a href="javascript:;"><?php echo $tl["submenu"]["sm40"]; ?><span class="arrow"></span></a>
          <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm40"]); ?></span>
          <ul class="sub-menu">
            <li>
              <a href="index.php?p=facebookgallery"><?php echo $tl["submenu"]["sm41"]; ?></a>
              <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm41"]); ?></span>
            </li>
            <li>
              <a href="index.php?p=facebookgallery&amp;sp=newfacebook"><?php echo $tl["submenu"]["sm42"]; ?></a>
              <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm42"]); ?></span>
            </li>
            <?php if ($page == 'facebookgallery' && $page1 == 'edit') { ?>
              <li class="active">
                <a href="index.php?p=facebookgallery&amp;sp=edit&amp;id=<?php echo $page2; ?>"><?php echo $tl["submenu"]["sm43"]; ?></a>
                <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm43"]); ?></span>
              </li>
            <?php } ?>
            <li>
              <a href="index.php?p=settingfacebook"><?php echo $tl["submenu"]["sm44"]; ?></a>
              <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm44"]); ?></span>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="javascript:;"><?php echo $tl["submenu"]["sm50"]; ?><span class="arrow"></span></a>
          <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm50"]); ?></span>
          <ul class="sub-menu">
            <li>
              <a href="javascript:;">SubMenu</a>
              <span class="icon-thumbnail">Sm</span>
            </li>
            <li>
              <a href="javascript:;">SubMenu</a>
              <span class="icon-thumbnail">Sm</span>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="javascript:;"><?php echo $tl["submenu"]["sm60"]; ?><span class="arrow"></span></a>
          <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm60"]); ?></span>
          <ul class="sub-menu">
            <li>
              <a href="javascript:;">SubMenu</a>
              <span class="icon-thumbnail">Sm</span>
            </li>
            <li>
              <a href="javascript:;">SubMenu</a>
              <span class="icon-thumbnail">Sm</span>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="javascript:;"><?php echo $tl["submenu"]["sm70"]; ?><span class="arrow"></span></a>
          <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm70"]); ?></span>
          <ul class="sub-menu">
            <li>
              <a href="javascript:;">SubMenu</a>
              <span class="icon-thumbnail">Sm</span>
            </li>
            <li>
              <a href="javascript:;">SubMenu</a>
              <span class="icon-thumbnail">Sm</span>
            </li>
          </ul>
        </li>
        <li class="">
          <a href="index.php?p=mediasharing"><?php echo $tl["submenu"]["sm80"]; ?></a>
          <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm80"]); ?></span>
        </li>
      </ul>
    </li>
    <!-- END SOCIAL MEDIA SECTION -->

    <!-- START MANAGE SECTION -->
    <?php
    if ($page == 'users' || $page == 'usergroup' || $page == 'categories' || $page == 'page' || $page == 'contactform' || $page == 'poll' || $page == 'contactform' || $page == 'sitemap' || $page == 'searchsetting' || $page == 'growl' || $page == 'xml_seo' || $page == 'slider' || $page == 'site-editor' || $page == 'belowheader' || $page == 'register-form' || $page == 'urlmapping') {

      $classsection = 'open active';
      $classiconbg = 'bg-success';
    }
    ?>
    <li class="<?php echo $classsection; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('javascript:;', '<span class="title">' . $tl["menu"]["mm3"] . '</span><span class="arrow ' . $classsection . '"></span>');
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', '<i class="pg-form"></i>', 'icon-thumbnail ' . $classiconbg);
      ?>

      <ul class="sub-menu">
        <!-- USER -->
        <li class="<?php echo ($page == 'users') ? 'submenu-active' : ''; ?>">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html->addAnchor('index.php?p=users', $tl["submenu"]["sm90"]);
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm90"]), 'icon-thumbnail');
          ?>

        </li>
        <li class="<?php echo ($page == 'users' && $page1 == 'newuser') ? 'submenu-active' : ''; ?>">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html->addAnchor('index.php?p=users&amp;sp=newuser', $tl["submenu"]["sm91"]);
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm91"]), 'icon-thumbnail');
          ?>

        </li>
        <?php if ($page == 'users' && $page1 == 'edituser') { ?>
          <li class="<?php echo ($page == 'user' && $page1 == 'edituser') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=users&amp;sp=edituser&amp;id=' . $page2, $tl["submenu"]["sm92"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm92"]), 'icon-thumbnail');
            ?>

          </li>
        <?php } ?>
        <li class="list-divider"></li>
        <!-- USERGROUP -->
        <li class="<?php echo ($page == 'usergroup') ? 'submenu-active' : ''; ?>">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html->addAnchor('index.php?p=usergroup', $tl["submenu"]["sm100"]);
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm100"]), 'icon-thumbnail');
          ?>

        </li>
        <li class="<?php echo ($page == 'usergroup' && $page1 == 'newgroup') ? 'submenu-active' : ''; ?>">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html->addAnchor('index.php?p=usergroup&amp;sp=newgroup', $tl["submenu"]["sm101"]);
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm101"]), 'icon-thumbnail');
          ?>

        </li>
        <?php if ($page == 'usergroup' && $page1 == 'edit') { ?>
          <li class="<?php echo ($page == 'usergroup' && $page1 == 'edit') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=usergroup&amp;sp=edit&amp;id=' . $page2, $tl["submenu"]["sm102"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm102"]), 'icon-thumbnail');
            ?>

          </li>
        <?php } ?>
        <li class="list-divider"></li>
        <!-- CATEGORIES -->
        <?php if ($ENVO_MODULEM) { ?>
          <li class="<?php echo ($page == 'categories') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=categories', $tl["submenu"]["sm110"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm110"]), 'icon-thumbnail');
            ?>

          </li>
          <li class="<?php echo ($page == 'categories' && $page1 == 'newcat') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=categories&amp;sp=newcat', $tl["submenu"]["sm111"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm111"]), 'icon-thumbnail');
            ?>

          </li>
          <?php if ($page == 'categories' && $page1 == 'editcat') { ?>
            <li class="<?php echo ($page == 'categories' && $page1 == 'editcat') ? 'submenu-active' : ''; ?>">

              <?php
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('index.php?p=categories&amp;sp=editcat&amp;id=' . $page2, $tl["submenu"]["sm112"]);
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm112"]), 'icon-thumbnail');
              ?>

            </li>
          <?php } ?>
          <li class="list-divider"></li>
          <!-- PAGES -->
          <li class="<?php echo ($page == 'page') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=page', $tl["submenu"]["sm120"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm120"]), 'icon-thumbnail');
            ?>

          </li>
          <li class="<?php echo ($page == 'page' && $page1 == 'newpage') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=page&amp;sp=newpage', $tl["submenu"]["sm121"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm121"]), 'icon-thumbnail');
            ?>

          </li>
          <?php if ($page == 'page' && $page1 == 'edit') { ?>
            <li class="<?php echo ($page == 'page' && $page1 == 'edit') ? 'submenu-active' : ''; ?>">

              <?php
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('index.php?p=page&amp;sp=edit&amp;id=' . $page2, $tl["submenu"]["sm122"]);
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm122"]), 'icon-thumbnail');
              ?>

            </li>
          <?php } ?>
          <li class="list-divider"></li>
          <!-- CONTACTFORM -->
          <li class="<?php echo ($page == 'contactform') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=contactform', $tl["submenu"]["sm130"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm130"]), 'icon-thumbnail');
            ?>

          </li>
          <li class="<?php echo ($page == 'contactform' && $page1 == 'newcontact') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=contactform&amp;sp=newcontact', $tl["submenu"]["sm131"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm131"]), 'icon-thumbnail');
            ?>

          </li>
          <?php if ($page == 'contactform' && $page1 == 'editcontact') { ?>
            <li class="<?php echo ($page == 'contactform' && $page1 == 'editcontact') ? 'submenu-active' : ''; ?>">

              <?php
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('index.php?p=contactform&amp;sp=editcontact&amp;id=' . $page2, $tl["submenu"]["sm132"]);
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm132"]), 'icon-thumbnail');
              ?>

            </li>
          <?php } ?>
          <li class="list-divider"></li>
          <!-- SITEMAP -->
          <li class="<?php echo ($page == 'sitemap') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=sitemap', $tl["submenu"]["sm140"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm140"]), 'icon-thumbnail');
            ?>

          </li>
          <!-- SEARCHSETTING -->
          <li class="<?php echo ($page == 'searchsetting') ? 'submenu-active' : ''; ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=searchsetting', $tl["submenu"]["sm150"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm150"]), 'icon-thumbnail');
            ?>

          </li>
        <?php }
        if (isset($ENVO_PLUGINS_MANAGENAV) && is_array($ENVO_PLUGINS_MANAGENAV)) foreach ($ENVO_PLUGINS_MANAGENAV as $pmn) {
          include_once $pmn;
        } ?>

      </ul>

    </li>
    <!-- END MANAGE SECTION -->

    <?php if (isset($ENVO_PLUGINS_TOPNAV) && is_array($ENVO_PLUGINS_TOPNAV)) foreach ($ENVO_PLUGINS_TOPNAV as $ptn) {
      include_once $ptn;
    } ?>

  <?php } ?>
</ul>
