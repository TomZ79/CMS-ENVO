<!-- START GROWL -->
<li class="list-divider"></li>
<li class="">
  <a href="index.php?p=growl">
    <?php echo $tlgwl["gwl_menu"]["gwlm"]; ?>
  </a>
  <span class="icon-thumbnail"><?php echo text_clipping_lower($tlgwl["gwl_menu"]["gwlm"]); ?></span>
</li>
<li class="">
  <a href="index.php?p=growl&amp;sp=new">
    <?php echo $tlgwl["gwl_menu"]["gwlm1"]; ?>
  </a>
  <span class="icon-thumbnail"><?php echo text_clipping_lower($tlgwl["gwl_menu"]["gwlm1"]); ?></span>
</li>
<?php if ($page == 'growl' && $page1 == 'edit') { ?>
  <li class="">
    <a href="index.php?p=growl&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
      <?php echo $tlgwl["gwl_menu"]["gwlm2"]; ?>
    </a>
    <span class="icon-thumbnail"><?php echo text_clipping_lower($tlgwl["gwl_menu"]["gwlm2"]); ?></span>
  </li>
<?php } ?>
<!-- END GROWL -->
