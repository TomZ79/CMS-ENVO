<?php

if (ENVO_PLUGIN_ACCESS_DOWNLOAD) {

  // Functions we need for this plugin
  include_once APP_PATH . 'plugins/download/functions.php';

  $ENVO_DOWNLOAD_FW = envo_get_download('LIMIT 3', $setting["downloadorder"], '', '', $setting["downloadurl"], $tl['global_text']['gtxt4']);

  if (isset($ENVO_DOWNLOAD_FW) && is_array($ENVO_DOWNLOAD_FW)) { ?>

    <h3><?=ENVO_PLUGIN_NAME_DOWNLOAD?></h3>
    <ul class="nav nav-pills nav-stacked">
      <?php foreach ($ENVO_DOWNLOAD_FW as $dfw) { ?>
        <li><a href="<?=$dfw["parseurl"]?>"><?=$dfw["title"]?></a></li>
      <?php } ?>
    </ul>

  <?php }
} ?>