<li class="treeview<?php if ($page == 'tags') echo " active"; ?>">
  <a href="javascript:void(0)">
    <i class="fa fa-tags"></i>
    <span><?php echo $tl["menu"]["mm5"]; ?></span>
    <i class="fa fa-angle-left pull-right"></i>
  </a>

  <ul class="treeview-menu">
    <li<?php if ($page == 'tags') echo ' class="active"'; ?>>
      <a href="index.php?p=tags">
        <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm170"]; ?>
      </a>
    </li>
    <li<?php if ($page == 'tags' && $page1 == 'cloud') echo ' class="active"'; ?>>
      <a href="index.php?p=tags&amp;sp=cloud">
        <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm171"]; ?>
      </a>
    </li>
    <li<?php if ($page == 'tags' && $page1 == 'setting') echo ' class="active"'; ?>>
      <a href="index.php?p=tags&amp;sp=setting">
        <i class="fa fa-circle-o"></i> <?php echo $tl["submenu"]["sm172"]; ?>
      </a>
    </li>
  </ul>

</li>