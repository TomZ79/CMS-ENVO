<!-- START URLMAPPING SECTION -->
<li class="list-divider"></li>
<li class="<?php echo ($page == 'urlmapping') ? 'submenu-active' : ''; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('index.php?p=urlmapping', $tlum["urlmap_menu"]["urlmm"]);
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', text_clipping_lower($tlum["urlmap_menu"]["urlmm"]), 'icon-thumbnail');
  ?>

</li>
<li class="<?php echo ($page == 'urlmapping' && $page1 == 'new') ? 'submenu-active' : ''; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('index.php?p=urlmapping&amp;sp=new', $tlum["urlmap_menu"]["urlmm1"]);
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', text_clipping_lower($tlum["urlmap_menu"]["urlmm1"]), 'icon-thumbnail');
  ?>

</li>
<?php if ($page == 'urlmapping' && $page1 == 'edit') { ?>
  <li class="<?php echo ($page == 'urlmapping' && $page1 == 'edit') ? 'submenu-active' : ''; ?>">

    <?php
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=urlmapping&amp;sp=edit&amp;ssp=' . $page2, $tlum["urlmap_menu"]["urlmm2"]);
    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
    echo $Html->addTag('span', text_clipping_lower($tlum["urlmap_menu"]["urlmm2"]), 'icon-thumbnail');
    ?>

  </li>
<?php } ?>
<!-- END URLMAPPING SECTION -->
