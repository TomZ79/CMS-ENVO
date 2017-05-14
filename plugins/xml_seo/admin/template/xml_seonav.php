<!-- START XMLSEO SECTION -->
<?php
if ($page == 'xml_seo') {
  $classxmlsection = 'open active';
  $classxmlconbg   = 'bg-success';
  $stylexml        = 'style="display: block;"';
}
?>

<li class="list-divider"></li>
<li class="<?php echo $classxmlsection; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('javascript:;', '<span class="title">' . $tlxml["xml_menu"]["xmlm"] . '</span><span class="arrow ' . $classxmlsection . '"></span>');
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', 'SM', 'icon-thumbnail ' . $classxmlconbg);
  ?>

  <ul class="sub-menu" <?php echo $stylexml; ?>>
    <li class="<?php echo (($page == 'xml_seo' && $page1 == 'create')) ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=xml_seo&amp;sp=create', $tlxml["xml_menu"]["xmlm1"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlxml["xml_menu"]["xmlm1"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="<?php echo ($page == 'xml_seo' && $page1 == 'view') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=xml_seo&amp;sp=view', $tlxml["xml_menu"]["xmlm2"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlxml["xml_menu"]["xmlm2"]), 'icon-thumbnail');
      ?>

    </li>

    <li class="<?php echo ($page == 'xml_seo' && $page1 == 'setting') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=xml_seo&amp;sp=setting', $tlxml["xml_menu"]["xmlm3"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlxml["xml_menu"]["xmlm3"]), 'icon-thumbnail');
      ?>

    </li>
  </ul>
</li>
<!-- END XMLSEO SECTION -->