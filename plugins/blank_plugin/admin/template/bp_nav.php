<!-- START BLOG SECTION -->
<?php
if ($page == 'blank-plugin') {
  $classbpsection = 'open active';
  $classbpiconbg  = 'bg-success';
}
?>
<li class="<?php echo $classbpsection; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('javascript:;', '<span class="title">' . $tlbp["bp_menu"]["bpm"] . '</span><span class="arrow ' . $classbpsection . '"></span>');
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', 'BP', 'icon-thumbnail ' . $classbpiconbg);
  ?>

  <ul class="sub-menu">

    <li class="<?php echo ($page == 'blank-plugin' && $page1 == 'setting') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=blank-plugin&amp;sp=setting', $tlbp["bp_menu"]["bpm1"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlbp["bp_menu"]["bpm1"]), 'icon-thumbnail');
      ?>

    </li>
  </ul>
</li>
<!-- END BLOG SECTION -->
