<?php

include_once APP_PATH . 'plugins/wiki/functions.php';

$showwikiarray = explode(":", $row['showwiki']);

if (is_array($showwikiarray) && in_array("ASC", $showwikiarray) || in_array("DESC", $showwikiarray)) {

  $ENVO_WIKI = envo_get_wiki('LIMIT ' . $showwikiarray[1], 't1.id ' . $showwikiarray[0], '', 't1.id', $setting["wikiurl"], $tl['global_text']['gtxt4']);

} else {

  $ENVO_WIKI = envo_get_wiki('', 't1.id ASC', $row['showwiki'], 't1.id', $setting["wikiurl"], $tl['global_text']['gtxt4']);
}

?>

<hr>
<h3 class="text-color"><?= ENVO_PLUGIN_NAME_WIKI ?></h3>

<div class="row">
  <div class="col-md-12 wiki-wrapper">
    <div class="panel-group" id="accordion2">
      <?php if (isset($ENVO_WIKI) && is_array($ENVO_WIKI)) foreach ($ENVO_WIKI as $f) { ?>
        <div class="panel panel-default">
          <div class="panel-heading">
            <a href="<?= $f["parseurl"] ?>"><i class="fa fa-eye"></i></a> <a class="accordion-toggle"
              data-toggle="collapse"
              data-parent="#accordion1"
              href="#collapse<?= $f["id"] ?>">
              <?= $f["title"] ?>
            </a>
          </div>
          <div id="collapse<?= $f["id"] ?>" class="accordion-body collapse">
            <div class="accordion-inner">
              <div class="answer"><?= $tlw["wiki"]["d3"] ?></div>
              <p><?= $f["contentshort"] ?></p>
              <div class="pull-right">
                <?php if (ENVO_ASACCESS) { ?>

                  <a href="<?= BASE_URL ?>admin/index.php?p=wiki&amp;sp=edit&amp;id=<?= $f["id"] ?>" title="<?= $tl["button"]["btn1"] ?>" class="btn btn-default btn-xs"><i class="fa fa-pencil"></i></a>

                  <a class="btn btn-default btn-xs quickedit" href="<?= BASE_URL ?>admin/index.php?p=wiki&amp;sp=quickedit&amp;id=<?= $f["id"] ?>" title="<?= $tl["button"]["btn2"] ?>"><i class="fa fa-edit"></i></a>

                <?php } ?>

                <a href="<?= $f["parseurl"] ?>" class="btn btn-color btn-xs"><?= $tl["general"]["g3"] ?></a>
              </div>
              <div class="clearfix"></div>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </div>
</div>