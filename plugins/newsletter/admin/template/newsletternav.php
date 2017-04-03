<!-- START NEWSLETTER SECTION -->
<?php
if ($page == 'newsletter') {
  $classnlsection = 'open active';
  $classnliconbg  = 'bg-success';
}
?>
<li class="<?php echo $classnlsection; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('javascript:;', '<span class="title">' . $tlnl["newsletter_menu"]["nlm"] . '</span><span class="arrow ' . $classnlsection . '"></span>');
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', '<i class="pg-mail"></i>', 'icon-thumbnail ' . $classnliconbg);
  ?>

  <ul class="sub-menu">
    <li class="<?php echo (($page == 'newsletter' && $page1 == '') || ($page == 'newsletter' && $page1 == 'new') || ($page == 'newsletter' && $page1 == 'edit')) ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=newsletter', $tlnl["newsletter_menu"]["nlm1"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlnl["newsletter_menu"]["nlm1"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="<?php echo ($page == 'newsletter' && $page1 == 'new') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=newsletter&amp;sp=new', $tlnl["newsletter_menu"]["nlm2"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlnl["newsletter_menu"]["nlm2"]), 'icon-thumbnail');
      ?>

    </li>
    <?php if ($page == 'newsletter' && $page1 == 'edit') { ?>
      <li class="<?php echo ($page == 'newsletter' && $page1 == 'edit') ? 'submenu-active' : ''; ?>">

        <?php
        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
        echo $Html->addAnchor('index.php?p=newsletter&amp;sp=edit&amp;ssp=' . $page2, $tlnl["newsletter_menu"]["nlm3"]);
        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
        echo $Html->addTag('span', text_clipping_lower($tlnl["newsletter_menu"]["nlm3"]), 'icon-thumbnail');
        ?>

      </li>
    <?php } ?>
    <li class="list-divider"></li>

    <li class="<?php echo (($page == 'newsletter' && $page1 == 'user') || ($page == 'newsletter' && $page1 == 'user' && $page2 == 'newuser') || ($page == 'newsletter' && $page1 == 'user' && $page2 == 'edit')) ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=newsletter&amp;sp=user', $tlnl["newsletter_menu"]["nlm4"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlnl["newsletter_menu"]["nlm4"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="<?php echo ($page == 'newsletter' && $page1 == 'user' && $page2 == 'newuser') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=newsletter&amp;sp=user&amp;ssp=newuser', $tlnl["newsletter_menu"]["nlm5"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlnl["newsletter_menu"]["nlm5"]), 'icon-thumbnail');
      ?>

    </li>
    <?php if ($page == 'newsletter' && $page1 == 'user' && $page2 == 'edit') { ?>
      <li class="<?php echo ($page == 'newsletter' && $page1 == 'user' && $page2 == 'edit') ? 'submenu-active' : ''; ?>">

        <?php
        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
        echo $Html->addAnchor('index.php?p=newsletter&sp=user&ssp=edit&sssp=' . $page3, $tlnl["newsletter_menu"]["nlm6"]);
        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
        echo $Html->addTag('span', text_clipping_lower($tlnl["newsletter_menu"]["nlm6"]), 'icon-thumbnail');
        ?>

      </li>
    <?php } ?>
    <li class="list-divider"></li>

    <li class="<?php echo ($page == 'newsletter' && $page1 == 'usergroup') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=newsletter&amp;sp=usergroup', $tlnl["newsletter_menu"]["nlm7"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlnl["newsletter_menu"]["nlm7"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="<?php echo ($page == 'newsletter' && $page1 == 'usergroup' && $page2 == 'new') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=newsletter&amp;sp=usergroup&amp;ssp=new', $tlnl["newsletter_menu"]["nlm8"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlnl["newsletter_menu"]["nlm8"]), 'icon-thumbnail');
      ?>

    </li>
    <?php if ($page == 'newsletter' && $page1 == 'usergroup' && $page2 == 'edit') { ?>
      <li class="<?php echo ($page == 'newsletter' && $page1 == 'usergroup' && $page2 == 'edit') ? 'submenu-active' : ''; ?>">

        <?php
        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
        echo $Html->addAnchor('index.php?p=newsletter&sp=usergroup&ssp=edit&sssp=' . $page3, $tlnl["newsletter_menu"]["nlm9"]);
        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
        echo $Html->addTag('span', text_clipping_lower($tlnl["newsletter_menu"]["nlm9"]), 'icon-thumbnail');
        ?>

      </li>
    <?php } ?>
    <li class="list-divider"></li>

    <li class="<?php echo ($page == 'newsletter' && $page1 == 'setting') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=newsletter&amp;sp=settings', $tlnl["newsletter_menu"]["nlm10"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlnl["newsletter_menu"]["nlm10"]), 'icon-thumbnail');
      ?>

    </li>
  </ul>
</li>
<!-- END NEWSLETTER SECTION -->
