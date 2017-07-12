<!-- START BLOG SECTION -->
<?php
if ($page == 'digital-house') {
  $classdhsection = 'open active';
  $classdhiconbg  = 'bg-success';
}
?>
<li class="<?php echo $classdhsection; ?>">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('javascript:;', '<span class="title">' . $tldh["dh_menu"]["dhm"] . '</span><span class="arrow ' . $classdhsection . '"></span>');
  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
  echo $Html->addTag('span', 'DH', 'icon-thumbnail ' . $classdhiconbg);
  ?>

  <ul class="sub-menu">

    <li class="<?php echo (($page == 'digital-house' && $page1 == 'cities') || ($page == 'digital-house' && $page1 == 'newcity')) ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=digital-house&amp;sp=cities', $tldh["dh_menu"]["dhm4"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tldh["dh_menu"]["dhm4"]), 'icon-thumbnail');
      ?>

    </li>
    <li class="<?php echo ($page == 'digital-house' && $page1 == 'cities' && $page2 == 'newcity') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=digital-house&amp;sp=cities&amp;ssp=newcity', $tldh["dh_menu"]["dhm5"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tldh["dh_menu"]["dhm5"]), 'icon-thumbnail');
      ?>

    </li>
    <?php if ($page == 'digital-house' && $page1 == 'cities' && $page2 == 'editcity') { ?>
      <li class="<?php echo ($page == 'digital-house' && $page1 == 'cities' && $page2 == 'editcity') ? 'submenu-active' : ''; ?>">

        <?php
        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
        echo $Html->addAnchor('index.php?p=digital-house&amp;sp=cities&amp;ssp=editcity&amp;id=' . $page3, $tldh["dh_menu"]["dhm6"]);
        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
        echo $Html->addTag('span', text_clipping_lower($tldh["dh_menu"]["dhm6"]), 'icon-thumbnail');
        ?>

      </li>
    <?php } ?>
    <li class="list-divider"></li>

    <li class="<?php echo ($page == 'digital-house' && $page1 == 'setting') ? 'submenu-active' : ''; ?>">

      <?php
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=digital-house&amp;sp=setting', $tldh["dh_menu"]["dhm9"]);
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('span', text_clipping_lower($tldh["dh_menu"]["dhm9"]), 'icon-thumbnail');
      ?>

    </li>
  </ul>
</li>
<!-- END BLOG SECTION -->
