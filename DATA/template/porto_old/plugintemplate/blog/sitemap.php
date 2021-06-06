<?php if (ENVO_PLUGIN_ACCESS_BLOG && $ENVO_BLOG_ALL) { ?>
  <h3><?=ENVO_PLUGIN_NAME_BLOG?></h3>
  <?php if (isset($ENVO_BLOG_ALL) && is_array($ENVO_BLOG_ALL)) { ?>
    <ul>
      <?php foreach ($ENVO_BLOG_ALL as $bl) { ?>
        <li><a href="<?=$bl["parseurl"]?>"><?=$bl["title"]?></a></li>
      <?php } ?>
    </ul>
  <?php }
} ?>