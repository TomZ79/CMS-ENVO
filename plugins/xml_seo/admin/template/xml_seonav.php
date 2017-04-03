<li class="list-divider"></li>
<li class="<?php echo ($page == 'xml_seo') ? 'submenu-active' : ''; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('index.php?p=xml_seo', $tlxml["xml_menu"]["xmlm"]);
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', text_clipping_lower($tlxml["xml_menu"]["xmlm"]), 'icon-thumbnail');
  ?>

</li>