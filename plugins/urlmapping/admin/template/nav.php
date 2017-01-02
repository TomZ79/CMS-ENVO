<!-- START URLMAPPING SECTION -->
<li class="list-divider"></li>
<li<?php if ($page == 'urlmapping') { ?> class="active"<?php } ?>>
  <a href="index.php?p=urlmapping">
    <i class="fa fa-circle-o"></i> <?php echo $tlum["urlmap_menu"]["urlmm"]; ?>
  </a>
</li>
<li<?php if ($page == 'urlmapping' && $page1 == "new") { ?> class="active"<?php } ?>>
  <a href="index.php?p=urlmapping&amp;sp=new">
    <i class="fa fa-circle-o"></i> <?php echo $tlum["urlmap_menu"]["urlmm1"]; ?>
  </a>
</li>
<?php if ($page == 'urlmapping' && $page1 == 'edit') { ?>
<li class="active">
  <a href="index.php?p=urlmapping&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
    <i class="fa fa-circle-o"></i> <?php echo $tlum["urlmap_menu"]["urlmm2"]; ?>
  </a>
</li>
<?php } ?>
<!-- END URLMAPPING SECTION -->
