<!-- START FAQ SECTION -->
<li class="">
  <a href="javascript:;">
    <span class="title"><?php echo $tlf["faq"]["m"]; ?></span>
    <span class="arrow"></span>
  </a>
  <span class="icon-thumbnail <?php if ($page == 'faq') echo 'bg-success'; ?>"><i class="fa fa-question"></i></span>

  <ul class="sub-menu">
    <li class="">
      <a href="index.php?p=faq">
        <?php echo $tlf["faq"]["m1"]; ?>
      </a>
      <span class="icon-thumbnail"><?php echo text_clipping_lower($tlf["faq"]["m1"]); ?></span>
    </li>
    <li class="">
      <a href="index.php?p=faq&amp;sp=new">
        <?php echo $tlf["faq"]["m2"]; ?>
      </a>
      <span class="icon-thumbnail"><?php echo text_clipping_lower($tlf["faq"]["m2"]); ?></span>
    </li>
    <?php if ($page == 'faq' && $page1 == 'edit') { ?>
      <li class="">
        <a href="index.php?p=faq&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
          <?php echo $tlf["faq"]["m3"]; ?>
        </a>
        <span class="icon-thumbnail"><?php echo text_clipping_lower($tlf["faq"]["m3"]); ?></span>
      </li>
    <?php } ?>
    <li class="list-divider"></li>

    <li class="">
      <a href="index.php?p=faq&amp;sp=categories">
        <?php echo $tl["submenu"]["sm110"]; ?>
      </a>
      <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm110"]); ?></span>
    </li>
    <li class="">
      <a href="index.php?p=faq&amp;sp=newcategory">
        <?php echo $tl["submenu"]["sm111"]; ?>
      </a>
      <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm111"]); ?></span>
    </li>
    <?php if ($page == 'faq' && $page1 == 'categories' && $page2 == 'edit') { ?>
      <li class="">
        <a href="index.php?p=faq&amp;sp=categories&amp;ssp=edit&amp;sssp=<?php echo $page3; ?>">
          <?php echo $tl["submenu"]["sm112"]; ?>
        </a>
        <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm112"]); ?></span>
      </li>
    <?php } ?>
    <li class="list-divider"></li>

    <li class="">
      <a href="index.php?p=faq&amp;sp=comment">
        <?php echo $tlf["faq"]["d19"]; ?>
      </a>
      <span class="icon-thumbnail"><?php echo text_clipping_lower($tlf["faq"]["d19"]); ?></span>
    </li>
    <li class="">
      <a href="index.php?p=faq&amp;sp=trash">
        <?php echo $tlf["faq"]["d18"]; ?>
      </a>
      <span class="icon-thumbnail"><?php echo text_clipping_lower($tlf["faq"]["d18"]); ?></span>
    </li>
    <li class="list-divider"></li>

    <li class="">
      <a href="index.php?p=faq&amp;sp=setting">
        <?php echo $tl["submenu"]["sm10"]; ?>
      </a>
      <span class="icon-thumbnail"><?php echo text_clipping_lower($tl["submenu"]["sm10"]); ?></span>
    </li>
  </ul>
</li>
<!-- END FAQ SECTION -->
