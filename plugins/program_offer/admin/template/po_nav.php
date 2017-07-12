<!-- START BLOG SECTION -->
<?php
if ($page == 'program-offer') {
  $classposection = 'open active';
  $classpoiconbg  = 'bg-success';
}
?>
<li class="<?php echo $classposection; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('javascript:;', '<span class="title">' . $tlpo["po_menu"]["pom"] . '</span><span class="arrow ' . $classposection . '"></span>');
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', 'PO', 'icon-thumbnail ' . $classpoiconbg);
  ?>

  <ul class="sub-menu">

    <li class="<?php echo (($page == 'program-offer' && $page1 == 'tvprogram') || ($page == 'program-offer' && $page1 == 'newprogram')) ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=program-offer&amp;sp=tvprogram', $tlpo["po_menu"]["pom1"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlpo["po_menu"]["pom1"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="<?php echo ($page == 'program-offer' && $page1 == 'tvprogram' && $page2 == 'newprogram') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=program-offer&amp;sp=tvprogram&amp;ssp=newprogram', $tlpo["po_menu"]["pom2"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlpo["po_menu"]["pom2"]), 'icon-thumbnail');
      ?>

    </li>
    <?php if ($page == 'program-offer' && $page1 == 'tvprogram' && $page2 == 'editprogram') { ?>
      <li class="<?php echo ($page == 'program-offer' && $page1 == 'tvprogram' && $page2 == 'editprogram') ? 'submenu-active' : ''; ?>">

        <?php
        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
        echo $Html->addAnchor('index.php?p=program-offer&amp;sp=tvprogram&amp;ssp=editprogram&amp;id=' . $page3, $tlpo["po_menu"]["pom3"]);
        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
        echo $Html->addTag('span', text_clipping_lower($tlpo["po_menu"]["pom3"]), 'icon-thumbnail');
        ?>

      </li>
    <?php } ?>
    <li class="list-divider"></li>

    <li class="<?php echo (($page == 'program-offer' && $page1 == 'tvchannel') || ($page == 'program-offer' && $page1 == 'newchannel')) ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=program-offer&amp;sp=tvchannel', $tlpo["po_menu"]["pom4"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlpo["po_menu"]["pom4"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="<?php echo ($page == 'program-offer' && $page1 == 'tvchannel' && $page2 == 'newchannel') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=program-offer&amp;sp=tvchannel&amp;ssp=newchannel', $tlpo["po_menu"]["pom5"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlpo["po_menu"]["pom5"]), 'icon-thumbnail');
      ?>

    </li>
    <?php if ($page == 'program-offer' && $page1 == 'tvchannel' && $page2 == 'editchannel') { ?>
      <li class="<?php echo ($page == 'program-offer' && $page1 == 'tvchannel' && $page2 == 'editchannel') ? 'submenu-active' : ''; ?>">

        <?php
        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
        echo $Html->addAnchor('index.php?p=program-offer&amp;sp=tvchannel&amp;ssp=editchannel&amp;id=' . $page3, $tlpo["po_menu"]["pom6"]);
        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
        echo $Html->addTag('span', text_clipping_lower($tlpo["po_menu"]["pom6"]), 'icon-thumbnail');
        ?>

      </li>
    <?php } ?>
    <li class="list-divider"></li>

    <li class="<?php echo (($page == 'program-offer' && $page1 == 'tvtower') || ($page == 'program-offer' && $page1 == 'newtvtower')) ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=program-offer&amp;sp=tvtower', $tlpo["po_menu"]["pom7"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlpo["po_menu"]["pom7"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="<?php echo ($page == 'program-offer' && $page1 == 'tvtower' && $page2 == 'newtvtower') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=program-offer&amp;sp=tvtower&amp;ssp=newtvtower', $tlpo["po_menu"]["pom8"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlpo["po_menu"]["pom8"]), 'icon-thumbnail');
      ?>

    </li>
    <?php if ($page == 'program-offer' && $page1 == 'tvtower' && $page2 == 'edittvtower') { ?>
      <li class="<?php echo ($page == 'program-offer' && $page1 == 'tvtower' && $page2 == 'edittvtower') ? 'submenu-active' : ''; ?>">

        <?php
        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
        echo $Html->addAnchor('index.php?p=program-offer&amp;sp=tvtower&amp;ssp=edittvtower&amp;id=' . $page3, $tlpo["po_menu"]["pom9"]);
        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
        echo $Html->addTag('span', text_clipping_lower($tlpo["po_menu"]["pom9"]), 'icon-thumbnail');
        ?>

      </li>
    <?php } ?>
    <li class="list-divider"></li>

    <li class="<?php echo ($page == 'program-offer' && $page1 == 'setting') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=program-offer&amp;sp=setting', $tlpo["po_menu"]["pom10"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlpo["po_menu"]["pom10"]), 'icon-thumbnail');
      ?>

    </li>
  </ul>
</li>
<!-- END BLOG SECTION -->
