<!-- START GROWL -->
<li class="list-divider"></li>
<li class="<?php echo ($page == 'growl') ? 'submenu-active' : ''; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('index.php?p=growl', $tlgwl["gwl_menu"]["gwlm"]);
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', text_clipping_lower($tlgwl["gwl_menu"]["gwlm"]), 'icon-thumbnail');
  ?>

</li>
<li class="<?php echo ($page == 'growl' && $page1 == 'new') ? 'submenu-active' : ''; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('index.php?p=growl&amp;sp=new', $tlgwl["gwl_menu"]["gwlm1"]);
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', text_clipping_lower($tlgwl["gwl_menu"]["gwlm1"]), 'icon-thumbnail');
  ?>

</li>
<?php if ($page == 'growl' && $page1 == 'edit') { ?>
  <li class="<?php echo ($page == 'growl' && $page1 == 'edit') ? 'submenu-active' : ''; ?>">

    <?php
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=growl&amp;sp=edit&amp;id=' . $page2, $tlgwl["gwl_menu"]["gwlm2"]);
    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
    echo $Html->addTag('span', text_clipping_lower($tlgwl["gwl_menu"]["gwlm2"]), 'icon-thumbnail');
    ?>

  </li>
<?php } ?>
<!-- END GROWL -->
