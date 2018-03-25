<?php

if (ENVO_PLUGIN_ACCESS_FAQ) {

  // Functions we need for this plugin
  include_once APP_PATH . 'plugins/faq/functions.php';

  $ENVO_FAQ_FW = envo_get_faq('LIMIT 3', $setting["faqorder"], '', '', $setting["faqurl"], $tl['global_text']['gtxt4']);

  if (isset($ENVO_FAQ_FW) && is_array($ENVO_FAQ_FW)) { ?>

    <h3><?=ENVO_PLUGIN_NAME_FAQ?></h3>
    <ul class="nav nav-pills nav-stacked">
      <?php foreach ($ENVO_FAQ_FW as $dfw) { ?>
        <li><a href="<?=$dfw["parseurl"]?>"><?=$dfw["title"]?></a></li>
      <?php } ?>
    </ul>

  <?php }
} ?>