<!-- START NEWS SECTION -->
<?php
if ($page == 'news') {
  $classnewssection = 'open active';
  $classnewsiconbg = 'bg-success';
}
?>
<li class="<?php echo $classnewssection; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('javascript:;', '<span class="title">' . $tl["menu"]["mm4"] . '</span><span class="arrow ' . $classnewssection . '"></span>');
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', '<i class="fa fa-newspaper-o"></i>', 'icon-thumbnail ' . $classnewsiconbg);
  ?>

  <ul class="sub-menu">
    <li class="<?php echo (($page == 'news' && $page1 == '') || ($page == 'news' && $page1 == 'newnews') || ($page == 'news' && $page1 == 'edit')) ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=news', $tl["submenu"]["sm160"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm160"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="<?php echo ($page == 'news' && $page1 == 'newnews') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=news&amp;sp=newnews', $tl["submenu"]["sm161"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm161"]), 'icon-thumbnail');
      ?>

    </li>
    <?php if ($page == 'news' && $page1 == 'editnews') { ?>
      <li class="<?php echo ($page == 'news' && $page1 == 'editnews') ? 'submenu-active' : ''; ?>">

        <?php
        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
        echo $Html->addAnchor('index.php?p=news&amp;sp=editnews&amp;id=' . $page2, $tl["submenu"]["sm162"]);
        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
        echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm162"]), 'icon-thumbnail');
        ?>

      </li>
    <?php } ?>
    <li class="<?php echo ($page == 'news' && $page1 == 'setting') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=news&amp;sp=setting', $tl["submenu"]["sm163"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tl["submenu"]["sm163"]), 'icon-thumbnail');
      ?>

    </li>
  </ul>

</li>
<!-- END NEWS SECTION -->
