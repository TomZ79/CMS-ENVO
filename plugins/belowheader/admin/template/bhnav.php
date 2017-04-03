<!-- START BELOWHEADER SECTION -->
<li class="list-divider"></li>

<li class="<?php echo ($page == 'belowheader') ? 'submenu-active' : ''; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('index.php?p=belowheader', $tlbh["bh_menu"]["bhm"]);
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', text_clipping_lower($tlbh["bh_menu"]["bhm"]), 'icon-thumbnail');
  ?>

</li>
<li class="<?php echo ($page == 'belowheader' && $page1 == 'newbh') ? 'submenu-active' : ''; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('index.php?p=belowheader&amp;sp=newbh', $tlbh["bh_menu"]["bhm1"]);
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', text_clipping_lower($tlbh["bh_menu"]["bhm1"]), 'icon-thumbnail');
  ?>

</li>
<?php if ($page == 'belowheader' && $page1 == 'edit') { ?>
  <li class="<?php echo ($page == 'belowheader' && $page1 == 'edit') ? 'submenu-active' : ''; ?>">

    <?php
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=belowheader&amp;sp=edit&amp;ssp=' . $page2, $tlbh["bh_menu"]["bhm2"]);
    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
    echo $Html->addTag('span', text_clipping_lower($tlbh["bh_menu"]["bhm2"]), 'icon-thumbnail');
    ?>

  </li>
<?php } ?>
<!-- END BELOWHEADER SECTION -->
