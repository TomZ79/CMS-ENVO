<!-- START int SECTION -->
<?php
if ($page == 'intranet') {
  $classintsection = 'open active';
  $classinticonbg  = 'bg-success';
}
if ($page1 == 'house') {
  $classintsubsection1 = 'open active';
  $styleint1           = 'style="display: block;"';
}
if ($page1 == 'houseanalytics') {
  $classintsubsection2 = 'open active';
  $styleint2           = 'style="display: block;"';
}
?>
<li class="<?= $classintsection ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html -> addAnchor('javascript:;', '<span class="title">' . $tlint["int_menu"]["intm"] . '</span><span class="arrow ' . $classintsection . '"></span>');
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html -> addTag('span', 'INT', 'icon-thumbnail ' . $classinticonbg);
  ?>

  <ul class="sub-menu">
    <li class="<?= $classintsubsection1 ?>">
      <a href="javascript:;"><?= $tlint["int_menu"]["intm11"] ?>
        <span class="arrow <?= $classintsubsection1 ?>"></span></a>
      <span class="icon-thumbnail"><?= text_clipping_lower($tlint["int_menu"]["intm11"]) ?></span>
      <ul class="sub-menu" <?= $styleint1 ?>>

        <li class="<?= (($page == 'intranet' && $page1 == 'house') || ($page == 'intranet' && $page1 == 'newhouse')) ? 'submenu-active' : '' ?>">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html -> addAnchor('index.php?p=intranet&amp;sp=house', $tlint["int_menu"]["intm1"]);
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html -> addTag('span', text_clipping_lower($tlint["int_menu"]["intm1"]), 'icon-thumbnail');
          ?>

        </li>
        <li class="<?= ($page == 'intranet' && $page1 == 'house' && $page2 == 'newhouse') ? 'submenu-active' : '' ?>">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html -> addAnchor('index.php?p=intranet&amp;sp=house&amp;ssp=newhouse', $tlint["int_menu"]["intm2"]);
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html -> addTag('span', text_clipping_lower($tlint["int_menu"]["intm2"]), 'icon-thumbnail');
          ?>

        </li>
        <?php if ($page == 'intranet' && $page1 == 'house' && $page2 == 'edithouse') { ?>
          <li class="<?= ($page == 'intranet' && $page1 == 'house' && $page2 == 'edithouse') ? 'submenu-active' : '' ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html -> addAnchor('index.php?p=intranet&amp;sp=house&amp;ssp=edithouse&amp;id=' . $page2, $tlint["int_menu"]["intm3"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html -> addTag('span', text_clipping_lower($tlint["int_menu"]["intm3"]), 'icon-thumbnail');
            ?>

          </li>
        <?php } ?>

      </ul>
    </li>

    <li class="list-divider"></li>

    <li class="<?= $classintsubsection2 ?>">
      <a href="javascript:;"><?= $tlint["int_menu"]["intm12"] ?>
        <span class="arrow <?= $classintsubsection2 ?>"></span></a>
      <span class="icon-thumbnail"><?= text_clipping_lower($tlint["int_menu"]["intm12"]) ?></span>
      <ul class="sub-menu" <?= $styleint2 ?>>

        <li class="<?= (($page == 'intranet' && $page1 == 'houseanalytics') || ($page == 'intranet' && $page1 == 'newhouse')) ? 'submenu-active' : '' ?>">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html -> addAnchor('index.php?p=intranet&amp;sp=houseanalytics', $tlint["int_menu"]["intm1"]);
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html -> addTag('span', text_clipping_lower($tlint["int_menu"]["intm1"]), 'icon-thumbnail');
          ?>

        </li>
        <li class="<?= ($page == 'intranet' && $page1 == 'houseanalytics' && $page2 == 'newhouse') ? 'submenu-active' : '' ?>">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html -> addAnchor('index.php?p=intranet&amp;sp=houseanalytics&amp;ssp=newhouse', $tlint["int_menu"]["intm2"]);
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html -> addTag('span', text_clipping_lower($tlint["int_menu"]["intm2"]), 'icon-thumbnail');
          ?>

        </li>
        <?php if ($page == 'intranet' && $page1 == 'houseanalytics' && $page2 == 'edithouse') { ?>
          <li class="<?= ($page == 'intranet' && $page1 == 'houseanalytics' && $page2 == 'edithouse') ? 'submenu-active' : '' ?>">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html -> addAnchor('index.php?p=intranet&amp;sp=houseanalytics&amp;ssp=edithouse&amp;id=' . $page2, $tlint["int_menu"]["intm3"]);
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html -> addTag('span', text_clipping_lower($tlint["int_menu"]["intm3"]), 'icon-thumbnail');
            ?>

          </li>
        <?php } ?>
        <li class="list-divider"></li>
        <li class="<?= ($page == 'intranet' && $page1 == 'houseanalytics' && $page2 == 'maps') ? 'submenu-active' : '' ?>">

          <?php
          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
          echo $Html -> addAnchor('index.php?p=intranet&amp;sp=houseanalytics&amp;ssp=maps', $tlint["int_menu"]["intm13"]);
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html -> addTag('span', text_clipping_lower($tlint["int_menu"]["intm13"]), 'icon-thumbnail');
          ?>

        </li>

      </ul>
    </li>

    <li class="list-divider"></li>

    <li class="<?= (($page == 'intranet' && $page1 == 'notification') || ($page == 'intranet' && $page1 == 'newnotification')) ? 'submenu-active' : '' ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html -> addAnchor('index.php?p=intranet&amp;sp=notification', $tlint["int_menu"]["intm4"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html -> addTag('span', text_clipping_lower($tlint["int_menu"]["intm4"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="<?= ($page == 'intranet' && $page1 == 'notification' && $page2 == 'newnotification') ? 'submenu-active' : '' ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html -> addAnchor('index.php?p=intranet&amp;sp=notification&amp;ssp=newnotification', $tlint["int_menu"]["intm5"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html -> addTag('span', text_clipping_lower($tlint["int_menu"]["intm5"]), 'icon-thumbnail');
      ?>

    </li>
    <?php if ($page == 'intranet' && $page1 == 'notification' && $page2 == 'editnotification') { ?>
      <li class="<?= ($page == 'intranet' && $page1 == 'notification' && $page2 == 'editnotification') ? 'submenu-active' : '' ?>">

        <?php
        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
        echo $Html -> addAnchor('index.php?p=intranet&amp;sp=notification&amp;ssp=editnotification&amp;id=' . $page2, $tlint["int_menu"]["intm6"]);
        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
        echo $Html -> addTag('span', text_clipping_lower($tlint["int_menu"]["intm6"]), 'icon-thumbnail');
        ?>

      </li>
    <?php } ?>
    <li class="list-divider"></li>

    <li class="<?= ($page == 'intranet' && $page1 == 'setting') ? 'submenu-active' : '' ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html -> addAnchor('index.php?p=intranet&amp;sp=setting', $tlint["int_menu"]["intm10"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html -> addTag('span', text_clipping_lower($tlint["int_menu"]["intm10"]), 'icon-thumbnail');
      ?>

    </li>
  </ul>
</li>
<!-- END int SECTION -->
