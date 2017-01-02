<ul class="sidebar-menu">
  <?php if ($JAK_MODULES) { ?>
<!-- START HOME SECTION -->
    <li class="treeview<?php if ($page == '' || $page == 'site' || $page == 'logs' || $page == 'searchlog' || $page == 'changelog') echo ' active'; ?>">
      <a href="javascript:void(0)">
        <i class="fa fa-laptop"></i>
        <span><?php echo $tl["menu"]["mm"]; ?></span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>

      <ul class="treeview-menu">
        <li<?php if ($page == '') echo ' class="active"'; ?>>
          <a href="<?php echo BASE_URL_ADMIN; ?>">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm"]; ?>
          </a>
        </li>
        <li<?php if ($page == 'site') echo ' class="active"'; ?>>
          <a href="index.php?p=site">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm1"]; ?>
          </a>
        </li>
        <li<?php if ($page == 'logs') echo ' class="active"'; ?>>
          <a href="index.php?p=logs">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm2"]; ?>
          </a>
        </li>
        <li<?php if ($page == 'searchlog') echo ' class="active"'; ?>>
          <a href="index.php?p=searchlog">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm3"]; ?>
          </a>
        </li>
        <li<?php if ($page == 'changelog') echo ' class="active"'; ?>>
          <a href="index.php?p=changelog">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm4"]; ?>
          </a>
        </li>
      </ul>
    </li>
<!-- END HOME SECTION -->

<!-- START GENERAL SETTINGS SECTION -->
    <li class="treeview<?php if ($page == 'setting' || $page == 'plugins' || $page == 'template' || $page == 'maintenance' || $page == 'version-control') echo " active"; ?>">
      <a href="javascript:void(0)">
        <i class="fa fa-cogs"></i>
        <span><?php echo $tl["menu"]["mm1"]; ?></span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>

      <ul class="treeview-menu">

        <li<?php if ($page == 'setting') echo ' class="active"'; ?>>
          <a href="index.php?p=setting">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm10"]; ?>
          </a>
        </li>
        <li class="list-divider"></li>

        <?php if (JAK_SUPERADMINACCESS) { ?>

          <li<?php if ($page == 'plugins') echo ' class="active"'; ?>>
            <a href="index.php?p=plugins">
              <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm11"]; ?>
            </a>
          </li>
          <li<?php if ($page1 == 'hooks') echo ' class="active"'; ?>>
            <a href="index.php?p=plugins&amp;sp=hooks">
              <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm12"]; ?>
            </a>
          </li>
          <?php if ($page1 == 'sorthooks') { ?>
          <li class="active">
            <a href="index.php?p=plugins&amp;sp=sorthooks&amp;ssp=<?php echo $page2; ?>">
              <i class="fa fa-circle-o"></i> <?php echo $tl["cmenu"]["c52"]; ?>
            </a>
          </li>
          <?php }
          if ($page1 == 'hooks' && $page2 == 'edit') { ?>
          <li class="active">
            <a href="index.php?p=plugins&sp=hooks&ssp=edit&sssp=<?php echo $page3; ?>">
              <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm13"]; ?>
            </a>
          </li>
          <?php } ?>
          <li<?php if ($page1 == 'newhook') echo ' class="active"'; ?>>
            <a href="index.php?p=plugins&amp;sp=newhook">
              <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm14"]; ?>
            </a>
          </li>
          <li class="list-divider"></li>

          <li<?php if ($page == 'template') echo ' class="active"'; ?>>
            <a href="index.php?p=template">
              <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm20"]; ?>
            </a>
          </li>
          <li<?php if ($page1 == 'settings') echo ' class="active"'; ?>>
            <a href="index.php?p=template&amp;sp=settings">
              <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm21"]; ?>
            </a>
          </li>
          <li<?php if ($page1 == 'edit-files') echo ' class="active"'; ?>>
            <a href="index.php?p=template&amp;sp=edit-files">
              <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm22"]; ?>
            </a>
          </li>
          <li<?php if ($page1 == 'cssedit') echo ' class="active"'; ?>>
            <a href="index.php?p=template&amp;sp=cssedit">
              <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm23"]; ?>
            </a>
          </li>
          <li<?php if ($page1 == 'langedit') echo ' class="active"'; ?>>
            <a href="index.php?p=template&amp;sp=langedit">
              <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm24"]; ?>
            </a>
          </li>
          <li class="list-divider"></li>

          <li<?php if ($page == 'maintenance') echo ' class="active"'; ?>>
            <a href="index.php?p=maintenance">
              <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm30"]; ?>
            </a>
          </li>
        <?php } ?>
      </ul>

    </li>
<!-- END GENERAL SETTINGS SECTION -->
  <?php } ?>

<!-- START SOCIAL MEDIA SECTION -->
    <li class="treeview<?php if ($page == 'settingfacebook' || $page == 'facebookgallery' || $page == 'mediasharing') echo " active"; ?>">
    <a href="#">
      <i class="fa fa-comments"></i>
      <span><?php echo $tl["menu"]["mm2"]; ?></span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>

    <ul class="treeview-menu">

      <li class="treeview<?php if ($page == 'settingfacebook' || $page == 'facebookgallery') echo " active"; ?>">
        <a href="#">
          <i class="fa fa-share"></i> <span><?php echo $tl["submenu"]["sm40"]; ?></span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li<?php if ($page == 'settingfacebook') echo ' class="active"'; ?>>
            <a href="index.php?p=settingfacebook">
              <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm44"]; ?>
            </a>
          </li>
          <li<?php if ($page == 'facebookgallery') echo ' class="active"'; ?>>
            <a href="index.php?p=facebookgallery">
              <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm41"]; ?>
            </a>
          </li>
          <li<?php if ($page1 == 'newfacebook') echo ' class="active"'; ?>>
            <a href="index.php?p=facebookgallery&amp;sp=newfacebook">
              <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm42"]; ?>
            </a>
          </li>
          <?php if ($page == 'facebookgallery' && $page1 == 'edit') { ?>
            <li class="active">
              <a href="index.php?p=facebookgallery&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
                <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm43"]; ?>
              </a>
            </li>
          <?php } ?>
        </ul>
      </li>
      <li class="list-divider"></li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span><?php echo $tl["submenu"]["sm50"]; ?></span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
      </li>
      <li class="list-divider"></li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span><?php echo $tl["submenu"]["sm60"]; ?></span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
      </li>
      <li class="list-divider"></li>

      <li class="treeview">
        <a href="#">
          <i class="fa fa-share"></i> <span><?php echo $tl["submenu"]["sm70"]; ?></span>
          <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
          <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
        </ul>
      </li>
      <li class="list-divider"></li>

      <li<?php if ($page == 'mediasharing') echo ' class="active"'; ?>>
        <a href="index.php?p=mediasharing">
          <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm80"]; ?>
        </a>
      </li>

    </ul>

  </li>
<!-- END SOCIAL MEDIA SECTION -->

<!-- START MANAGE SECTION -->
  <li class="treeview<?php if ($page == 'user' || $page == 'usergroup' || $page == 'categories' || $page == 'page' || $page == 'contactform' || $page == 'poll' || $page == 'contactform' || $page == 'sitemap' || $page == 'searchsetting' || $page == 'growl' || $page == 'xml_seo' || $page == 'slider' || $page == 'site_editor' || $page == 'belowheader' || $page == 'register-form' || $page == 'urlmapping' || $page == 'owl') echo " active"; ?>">

    <a href="javascript:void(0)">
      <i class="fa fa-files-o"></i>
      <span><?php echo $tl["menu"]["mm3"]; ?></span>
      <i class="fa fa-angle-left pull-right"></i>
    </a>

    <ul class="treeview-menu mega-menu" data-columns="3">

      <li<?php if ($page == 'user') echo ' class="active"'; ?>>
        <a href="index.php?p=user" style="position: relative;">
          <i class="fa fa-circle-o"></i>
            <span>
              <?php echo $tl["submenu"]["sm90"]; ?>
              <span class="label bg-blue-300" style="padding: 0 5px;border-radius: 2px;position: absolute;right: 10px;top: 3px;">
                <?php echo $JAK_COUNTS_NAVBAR["COUNT_USER"]; ?>
              </span>
            </span>
        </a>
      </li>
      <li<?php if ($page1 == 'newuser') echo ' class="active"'; ?>>
        <a href="index.php?p=user&amp;sp=newuser">
          <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm91"]; ?>
        </a>
      </li>
      <?php if ($page == 'user' && $page1 == 'edit') { ?>
      <li class="active">
        <a href="index.php?p=user&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
          <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm92"]; ?>
        </a>
      </li>
      <?php } ?>
      <li class="list-divider"></li>

      <li<?php if ($page == 'usergroup') echo ' class="active"'; ?>>
        <a href="index.php?p=usergroup" style="position: relative;">
          <i class="fa fa-circle-o"></i>
            <span>
              <?php echo $tl["submenu"]["sm100"]; ?>
              <span class="label bg-blue-300" style="padding: 0 5px;border-radius: 2px;position: absolute;right: 10px;top: 3px;">
                <?php echo $JAK_COUNTS_NAVBAR["COUNT_USERGROUP"]; ?>
              </span>
            </span>
        </a>
      </li>

      <li<?php if ($page1 == 'newgroup') echo ' class="active"'; ?>>
        <a href="index.php?p=usergroup&amp;sp=newgroup">
          <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm101"]; ?>
        </a>
      </li>
      <?php if ($page == 'usergroup' && $page1 == 'edit') { ?>
      <li class="active">
        <a href="index.php?p=usergroup&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
          <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm102"]; ?>
        </a>
      </li>
      <?php } ?>
      <li class="list-divider"></li>

      <?php if ($JAK_MODULEM) { ?>
        <li<?php if ($page == 'categories') echo ' class="active"'; ?>>
          <a href="index.php?p=categories">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm110"]; ?>
          </a>
        </li>
        <li<?php if ($page1 == 'newcat') echo ' class="active"'; ?>>
          <a href="index.php?p=categories&amp;sp=newcat">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm111"]; ?>
          </a>
        </li>
        <?php if ($page == 'categories' && $page1 == 'edit') { ?>
        <li class="active">
          <a href="index.php?p=categories&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm112"]; ?>
          </a>
        </li>
        <?php } ?>
        <li class="list-divider"></li>

        <li<?php if ($page == 'page') echo ' class="active"'; ?>>
          <a href="index.php?p=page" style="position: relative;">
            <i class="fa fa-circle-o"></i>
            <span>
              <?php echo $tl["submenu"]["sm120"]; ?>
              <span class="label bg-blue-300" style="padding: 0 5px;border-radius: 2px;position: absolute;right: 10px;top: 3px;">
                <?php echo $JAK_COUNTS_NAVBAR["COUNT_PAGES"]; ?>
              </span>
            </span>
          </a>
        </li>
        <li<?php if ($page1 == 'newpage') echo ' class="active"'; ?>>
          <a href="index.php?p=page&amp;sp=newpage">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm121"]; ?>
          </a>
        </li>
        <?php if ($page == 'page' && $page1 == 'edit') { ?>
        <li class="active">
          <a href="index.php?p=page&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm122"]; ?>
          </a>
        </li>
        <?php } ?>
        <li class="list-divider"></li>

        <li<?php if ($page == 'contactform') echo ' class="active"'; ?>>
          <a href="index.php?p=contactform">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm130"]; ?>
          </a>
        </li>

        <li<?php if ($page1 == 'newcontact') echo ' class="active"'; ?>>
          <a href="index.php?p=contactform&amp;sp=newcontact">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm131"]; ?>
          </a>
        </li>
        <?php if ($page == 'contactform' && $page1 == 'edit') { ?>
        <li class="active">
          <a href="index.php?p=contactform&amp;sp=<?php echo $page1; ?>&amp;ssp=<?php echo $page2; ?>">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm132"]; ?>
          </a>
        </li>
        <?php } ?>
        <li class="list-divider"></li>

        <li<?php if ($page == 'sitemap') echo ' class="active"'; ?>>
          <a href="index.php?p=sitemap">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm140"]; ?>
          </a>
        </li>
        <li<?php if ($page == 'searchsetting') echo ' class="active"'; ?>>
          <a href="index.php?p=searchsetting">
            <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm150"]; ?>
          </a>
        </li>
      <?php }
      if (isset($JAK_PLUGINS_MANAGENAV) && is_array($JAK_PLUGINS_MANAGENAV)) foreach ($JAK_PLUGINS_MANAGENAV as $pmn) {
        include_once $pmn;
      } ?>

    </ul>

  </li>
<!-- END MANAGE SECTION -->

  <?php if (isset($JAK_PLUGINS_TOPNAV) && is_array($JAK_PLUGINS_TOPNAV)) foreach ($JAK_PLUGINS_TOPNAV as $ptn) {
    include_once $ptn;
  } ?>

</ul>