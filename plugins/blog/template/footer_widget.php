<?php

if (ENVO_PLUGIN_ACCESS_BLOG) {

  // Functions we need for this plugin
  include_once APP_PATH . 'plugins/blog/functions.php';

  $ENVO_BLOG_FW = envo_get_blog('LIMIT 3', $jkv["blogorder"], '', '', $jkv["blogurl"], $tl['global_text']['gtxt4']);

  if (isset($ENVO_BLOG_FW) && is_array($ENVO_BLOG_FW)) { ?>

    <h3><?php echo ENVO_PLUGIN_NAME_BLOG; ?></h3>
    <ul class="nav nav-pills nav-stacked">
      <?php foreach ($ENVO_BLOG_FW as $bfw) { ?>
        <li><a href="<?php echo $bfw["parseurl"]; ?>"><?php echo $bfw["title"]; ?></a></li>
      <?php } ?>
    </ul>

  <?php }
} ?>