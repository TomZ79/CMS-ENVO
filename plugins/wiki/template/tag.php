<?php if (ENVO_PLUGIN_ACCESS_TAGS && isset($ENVO_TAG_WIKI_DATA) && is_array($ENVO_TAG_WIKI_DATA)) foreach ($ENVO_TAG_WIKI_DATA as $w) {
  $count++; ?>

  <div class="col-md-3 col-sm-6">
    <div class="service-wrapper">
      <i class="fa fa-question-circle fa-4x"></i>
      <h3><a href="<?= $w["parseurl"] ?>"><?= $w["title"] ?></a></h3>
      <p><?= $w["content"] ?></p>
      <a href="<?= $w["parseurl"] ?>" class="btn btn-primary"><?= $tl["general"]["g3"] ?></a>
    </div>
  </div>

<?php } ?>