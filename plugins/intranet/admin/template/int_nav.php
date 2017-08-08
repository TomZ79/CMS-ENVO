<!-- START BLOG SECTION -->
<?php
if ($page == 'intranet') {
  $classintsection = 'open active';
  $classinticonbg  = 'bg-success';
}
?>
<li class="<?php echo $classintsection; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('javascript:;', '<span class="title">' . $tlint["int_menu"]["intm"] . '</span><span class="arrow ' . $classintsection . '"></span>');
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', 'INT', 'icon-thumbnail ' . $classinticonbg);
  ?>

  <ul class="sub-menu">

    <li class="list-divider"></li>

    <li class="<?php echo ($page == 'intranet' && $page1 == 'setting') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=intranet&amp;sp=setting', $tlint["int_menu"]["intm1"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlint["int_menu"]["intm1"]), 'icon-thumbnail');
      ?>

    </li>
  </ul>
</li>
<!-- END BLOG SECTION -->
