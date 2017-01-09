<!-- START URLMAPPING SECTION -->
<li class="list-divider"></li>
<li class="">
  <a href="index.php?p=urlmapping">
    <?php echo $tlum["urlmap_menu"]["urlmm"]; ?>
  </a>
  <span class="icon-thumbnail"><?php echo text_clipping_lower($tlum["urlmap_menu"]["urlmm"]); ?></span>
</li>
<li class="">
  <a href="index.php?p=urlmapping&amp;sp=new">
    <?php echo $tlum["urlmap_menu"]["urlmm1"]; ?>
  </a>
  <span class="icon-thumbnail"><?php echo text_clipping_lower($tlum["urlmap_menu"]["urlmm1"]); ?></span>
</li>
<?php if ($page == 'urlmapping' && $page1 == 'edit') { ?>
<li class="">
  <a href="index.php?p=urlmapping&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
    <?php echo $tlum["urlmap_menu"]["urlmm2"]; ?>
  </a>
  <span class="icon-thumbnail"><?php echo text_clipping_lower($tlum["urlmap_menu"]["urlmm2"]); ?></span>
</li>
<?php } ?>
<!-- END URLMAPPING SECTION -->
