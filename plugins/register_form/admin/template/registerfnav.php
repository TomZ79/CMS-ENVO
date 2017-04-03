<!-- START REGISTER FORM -->
<li class="list-divider"></li>
<li class="<?php echo ($page == 'register-form') ? 'submenu-active' : ''; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('index.php?p=register-form', $tlrf["reg_menu"]["regm"]);
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', text_clipping_lower($tlrf["reg_menu"]["regm"]), 'icon-thumbnail');
  ?>

</li>
<li class="<?php echo ($page == 'register-form' && $page1 == 'settings') ? 'submenu-active' : ''; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('index.php?p=register-form&amp;sp=settings', $tlrf["reg_menu"]["regm1"]);
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', text_clipping_lower($tlrf["reg_menu"]["regm1"]), 'icon-thumbnail');
  ?>

</li>
<!-- END REGISTER FORM -->
