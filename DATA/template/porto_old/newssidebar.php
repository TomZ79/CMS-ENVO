<?php if (defined("ENVO_PLUGIN_NAME_NEWS") && $ENVO_GET_NEWS_SORTED) { ?>

  <aside class="nav-side-menu nav-sidebar hidden-xs">

    <div class="right-sidebar">

      <div class="sidebar-inner">
        <h3 class="brand"><?= ENVO_PLUGIN_NAME_NEWS ?></h3>

        <?php if (isset($ENVO_GET_NEWS_SORTED) && is_array($ENVO_GET_NEWS_SORTED)) foreach ($ENVO_GET_NEWS_SORTED as $n) { ?>
          <div>
            <p class="mb-none"><span><?= $n["created"] ?></span></p>
            <p>
              <a href="<?= $n["parseurl"] ?>" title="<?= $n["contentshort"] ?>">
                <?= $n["title"] ?>
              </a>
            </p>
          </div>
        <?php } ?>

      </div>

    </div>

    <hr>
  </aside>

<?php } ?>

