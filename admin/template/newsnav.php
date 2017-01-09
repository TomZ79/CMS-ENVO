<!-- START NEWS SECTION -->
<li class="">
  <a href="javascript:;">
    <span class="title"><?php echo $tl["menu"]["mm4"]; ?></span>
    <span class="arrow"></span>
  </a>
  <span class="icon-thumbnail <?php if ($page == 'news') echo 'bg-success'; ?>"><i class="fa fa-newspaper-o"></i></span>

  <ul class="sub-menu">
    <li class="">
      <a href="index.php?p=news">
        <?php echo $tl["submenu"]["sm160"]; ?>
      </a>
      <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm160"]); ?></span>
    </li>
    <li class="">
      <a href="index.php?p=news&amp;sp=new">
        <?php echo $tl["submenu"]["sm161"]; ?>
      </a>
      <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm161"]); ?></span>
    </li>
    <?php if ($page == 'news' && $page1 == 'edit') { ?>
      <li class="">
        <a href="index.php?p=news&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
          <?php echo $tl["submenu"]["sm162"]; ?>
        </a>
        <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm162"]); ?></span>
      </li>
    <?php } ?>
    <li class="">
      <a href="index.php?p=news&amp;sp=setting">
        <?php echo $tl["submenu"]["sm163"]; ?>
      </a>
      <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm163"]); ?></span>
    </li>
  </ul>

</li>
<!-- END NEWS SECTION -->