<!-- START REGISTER FORM -->
<li class="list-divider"></li>
<li<?php if ($page == 'register-form') echo ' class="active"'; ?>>
  <a href="index.php?p=register-form">
    <i class="fa fa-circle-o"></i> <?php echo $tlrf["reg_menu"]["regm"]; ?>
  </a>
</li>
<li<?php if ($page == 'register-form' && $page1 == 'settings') echo ' class="active"'; ?>>
  <a href="index.php?p=register-form&amp;sp=settings">
    <i class="fa fa-circle-o"></i> <?php echo $tlrf["reg_menu"]["regm1"]; ?>
  </a>
</li>
<!-- END REGISTER FORM -->