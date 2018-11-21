<?php if (defined("ENVO_PLUGIN_NAME_NEWS") && $ENVO_GET_NEWS_SORTED) { ?>

  <aside class="sidebarwidget sidebarwidget-border d-none d-sm-block">

    <h3 class="sidebarwidget-title"><?= ENVO_PLUGIN_NAME_NEWS ?></h3>

    <?php
    $i = 1;
    if (isset($ENVO_GET_NEWS_SORTED) && is_array($ENVO_GET_NEWS_SORTED)) foreach ($ENVO_GET_NEWS_SORTED as $ns) {

      if ($i == 1) {

        // First Item

        ?>

        <div class="post_small">
          <div class="post_small-text-meta">
            <ul>
              <li><i class="fas fa-calendar-alt"></i> <span><?= $ns["created"] ?></span></li>
            </ul>
          </div>
          <h4 class="title-10">
            <a href="<?= $ns["parseurl"] ?>" title="<?= $ns["contentshort"] ?>">
              <?= $ns["title"] ?>
            </a>
          </h4>
        </div>

        <?php

      } else {

        // Other Items

        ?>

        <div class="post_small">
          <div class="post_small-text-meta">
            <ul>
              <li><i class="fas fa-calendar-alt"></i> <span><?= $ns["created"] ?></span></li>
            </ul>
          </div>
          <h4 class="title-10">
            <a href="<?= $ns["parseurl"] ?>" title="<?= $ns["contentshort"] ?>">
              <?= $ns["title"] ?>
            </a>
          </h4>
        </div>

        <?php

      }

      $i++;

    }
    ?>

  </aside>

<?php } ?>

