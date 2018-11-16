<?php if (ENVO_PLUGIN_ACCESS_WIKI && $ENVO_WIKI_ALL) { ?>
  <h3><?= ENVO_PLUGIN_NAME_WIKI ?></h3>
  <?php if (isset($ENVO_WIKI_ALL) && is_array($ENVO_WIKI_ALL)) { ?>
    <ul>
      <?php foreach ($ENVO_WIKI_ALL as $wa) { ?>
        <li><a href="<?= $wa["parseurl"] ?>"><?= $wa["title"] ?></a></li>
      <?php } ?>
    </ul>
  <?php }
} ?>