<?php

if (ENVO_PLUGIN_ACCESS_WIKI) {

  // Functions we need for this plugin
  include_once APP_PATH . 'plugins/wiki/functions.php';

  $ENVO_WIKI_FW = envo_get_wiki('LIMIT 3', $setting["wikiorder"], '', '', $setting["wikiurl"], $tl['global_text']['gtxt4']);

  if (isset($ENVO_WIKI_FW) && is_array($ENVO_WIKI_FW)) { ?>

    <h3><?= ENVO_PLUGIN_NAME_WIKI ?></h3>
    <ul class="nav nav-pills nav-stacked">
      <?php foreach ($ENVO_WIKI_FW as $wfw) { ?>
        <li><a href="<?= $wfw["parseurl"] ?>"><?= $wfw["title"] ?></a></li>
      <?php } ?>
    </ul>

  <?php }
} ?>