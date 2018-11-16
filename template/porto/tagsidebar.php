<?php if (ENVO_TAGS && ENVO_USER_TAGS && $ENVO_GET_TAG_CLOUD) { ?>

  <aside class="sidebarwidget sidebarwidget-border hidden-xs">

    <h3 class="sidebarwidget-title"><?= ENVO_PLUGIN_NAME_TAGS ?></h3>

    <ul class="tag-cloud">
      <?= $ENVO_GET_TAG_CLOUD ?>
    </ul>

  </aside>

<?php } ?>