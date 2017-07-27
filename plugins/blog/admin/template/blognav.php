<!-- START BLOG SECTION -->
<?php
if ($page == 'blog') {
  $classblogsection = 'open active';
  $classblogiconbg  = 'bg-success';
}
?>
<li class="<?php echo $classblogsection; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('javascript:;', '<span class="title">' . $tlblog["blog_menu"]["blogm"] . '</span><span class="arrow ' . $classblogsection . '"></span>');
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', 'BL', 'icon-thumbnail ' . $classblogiconbg);
  ?>

  <ul class="sub-menu">
    <li class="<?php echo (($page == 'blog' && $page1 == '') || ($page == 'blog' && $page1 == 'new') || ($page == 'blog' && $page1 == 'edit')) ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=blog', $tlblog["blog_menu"]["blogm1"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlblog["blog_menu"]["blogm1"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="<?php echo ($page == 'blog' && $page1 == 'new') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=blog&amp;sp=new', $tlblog["blog_menu"]["blogm2"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlblog["blog_menu"]["blogm2"]), 'icon-thumbnail');
      ?>

    </li>
    <?php if ($page == 'blog' && $page1 == 'edit') { ?>
      <li class="<?php echo ($page == 'blog' && $page1 == 'edit') ? 'submenu-active' : ''; ?>">

        <?php
        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
        echo $Html->addAnchor('index.php?p=blog&amp;sp=edit&amp;ssp=' . $page2, $tlblog["blog_menu"]["blogm3"]);
        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
        echo $Html->addTag('span', text_clipping_lower($tlblog["blog_menu"]["blogm3"]), 'icon-thumbnail');
        ?>

      </li>
    <?php } ?>
    <li class="list-divider"></li>

    <li class="<?php echo (($page == 'blog' && $page1 == 'categories') || ($page == 'blog' && $page1 == 'newcategory')) ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=blog&amp;sp=categories', $tlblog["blog_menu"]["blogm4"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlblog["blog_menu"]["blogm4"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="<?php echo ($page == 'blog' && $page1 == 'newcategory') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=blog&amp;sp=newcategory', $tlblog["blog_menu"]["blogm5"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlblog["blog_menu"]["blogm5"]), 'icon-thumbnail');
      ?>

    </li>
    <?php if ($page == 'blog' && $page1 == 'categories' && $page2 == 'edit') { ?>
      <li class="<?php echo ($page == 'blog' && $page1 == 'categories' && $page2 == 'edit') ? 'submenu-active' : ''; ?>">

        <?php
        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
        echo $Html->addAnchor('index.php?p=blog&amp;sp=categories&amp;ssp=edit&amp;sssp=' . $page3, $tlblog["blog_menu"]["blogm6"]);
        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
        echo $Html->addTag('span', text_clipping_lower($tlblog["blog_menu"]["blogm6"]), 'icon-thumbnail');
        ?>

      </li>
    <?php } ?>
    <li class="list-divider"></li>

    <li class="<?php echo ($page == 'blog' && $page1 == 'setting') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=blog&amp;sp=setting', $tlblog["blog_menu"]["blogm9"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tlblog["blog_menu"]["blogm9"]), 'icon-thumbnail');
      ?>

    </li>
  </ul>
</li>
<!-- END BLOG SECTION -->
