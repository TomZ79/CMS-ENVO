<!-- START TAGS SECTION -->
<?php
if ($page == 'tags') {
  $classtagsection = 'open active';
  $classtagiconbg  = 'bg-success';
}
?>
<li class="<?= $classtagsection ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('javascript:;', '<span class="title">' . $tl["menu"]["mm5"] . '</span><span class="arrow ' . $classtagsection . '"></span>');
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', '<i class="fa fa-tags"></i>', 'icon-thumbnail ' . $classtagiconbg);
  ?>

  <ul class="sub-menu">
    <li class="nav-item-header">
      <div class="text-uppercase text-master fs-14 bold" style="line-height: 40px;"><?= $tl["submenu"]["sm170"] ?></div>
    </li>
    <li class="<?= ($page == 'tags' && $page1 == '') ? 'submenu-active' : '' ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=tags', $tl["submenu"]["sm170"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm170"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="<?= ($page == 'tags' && $page1 == 'cloud') ? 'submenu-active' : '' ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=tags&amp;sp=cloud', $tl["submenu"]["sm171"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm171"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="nav-item-header">
      <div class="text-uppercase text-master fs-14 bold" style="line-height: 40px;"><?= $tl["submenu"]["sm172"] ?></div>
    </li>
    <li class="<?= ($page == 'tags' && $page1 == 'setting') ? 'submenu-active' : '' ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=tags&amp;sp=setting', $tl["submenu"]["sm172"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm172"]), 'icon-thumbnail');
      ?>

    </li>
  </ul>
</li>
<!-- END TAGS SECTION -->
