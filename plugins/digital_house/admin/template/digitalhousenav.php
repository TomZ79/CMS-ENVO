<!-- START BLOG SECTION -->
<?php
if ($page == 'digitalhouse') {
  $classdhsection = 'open active';
  $classdhiconbg  = 'bg-success';
}
?>
<li class="<?php echo $classdhsection; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('javascript:;', '<span class="title">' . $tldh["dh_menu"]["dhm"] . '</span><span class="arrow ' . $classdhsection . '"></span>');
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', 'DH', 'icon-thumbnail ' . $classdhiconbg);
  ?>

  <ul class="sub-menu">

    <li class="<?php echo ($page == 'digitalhouse' && $page1 == 'setting') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=digital-house&amp;sp=setting', $tldh["dh_menu"]["dhm9"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tldh["dh_menu"]["dhm9"]), 'icon-thumbnail');
      ?>

    </li>
  </ul>
</li>
<!-- END BLOG SECTION -->
