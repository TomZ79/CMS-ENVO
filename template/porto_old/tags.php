<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (isset($ENVO_GET_TAG_CLOUD)) {
  echo '<div class="well well-sm">' . $ENVO_GET_TAG_CLOUD . '</div>'; ?>

  <?php if (isset($ENVO_NO_TAG_DATA)) { ?>

    <div class="alert bg-info">
      <?= $ENVO_NO_TAG_DATA ?>
    </div>

  <?php }
} ?>

  <div class="row">

    <?php $count = 0;
    if (isset($ENVO_TAG_PAGE_DATA) && is_array($ENVO_TAG_PAGE_DATA)) foreach ($ENVO_TAG_PAGE_DATA as $p) {
      $count++; ?>

      <div class="col-md-3 col-sm-6">
        <div class="service-wrapper">
          <i class="fa fa-file-text-o fa-4x"></i>
          <h3><a href="<?= $p["parseurl"] ?>"><?= $p["title"] ?></a></h3>
          <p><?= $p["content"] ?></p>
          <a href="<?= $p["parseurl"] ?>" class="btn btn-color"><?= $tl["global_text"]["gtxt8"] ?></a>
        </div>
      </div>

    <?php }
    if (isset($ENVO_TAG_NEWS_DATA) && is_array($ENVO_TAG_NEWS_DATA)) foreach ($ENVO_TAG_NEWS_DATA as $n) {
      $count++; ?>

      <div class="col-md-3 col-sm-6">
        <div class="service-wrapper">
          <i class="fa fa-newspaper-o fa-4x"></i>
          <h3><a href="<?= $n["parseurl"] ?>"><?= $n["title"] ?></a></h3>
          <p><?= $n["content"] ?></p>
          <a href="<?= $n["parseurl"] ?>" class="btn btn-color"><?= $tl["global_text"]["gtxt8"] ?></a>
        </div>
      </div>

    <?php }
    if (isset($ENVO_HOOK_TAGS) && is_array($ENVO_HOOK_TAGS)) foreach ($ENVO_HOOK_TAGS as $ht) {
      include_once APP_PATH . $ht['phpcode'];
    } ?>

  </div>

<?php if (isset($count)) { ?>

  <div class="alert bg-info">
    <?= str_replace("%s", $count, $tl["searching"]["stxt13"]) ?>
  </div>

<?php } else { ?>

  <div class="alert bg-danger">
    <?= $tl["searching"]["stxt12"] ?>
  </div>

<?php } ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>