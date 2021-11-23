<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["notification"]["n7"]?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

<?php if ($page2 == "s1") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?=$tl["notification"]["n2"]?>'
      }, {
        // settings
        type: 'info',
        delay: 5000,
        timer: 3000
      });
    }, 2000);
  </script>
<?php } ?>

<?php if ($page1 == "e" || $page1 == "ene") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=($page1 == "e" ? $tl["general_error"]["generror1"] : $tl["general_error"]["generror2"]);?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <!-- Action button block -->
  <div class="actionbutton hidden-xs">
    <button type="submit" name="button" class="btn btn-toggle" data-toggle="tooltip" data-placement="bottom" title="Toggle grid and list view">
      <i class="fa fa-th-list"></i>
    </button>
  </div>

<?php if (isset($ENVO_GALLERY_ALL) && is_array($ENVO_GALLERY_ALL) && !empty($ENVO_GALLERY_ALL)) { ?>

  <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    <!-- Form Content - Grid view -->
    <div id="gridview" class="row toggle visible">
      <div class="col-sm-12">
        <?php foreach ($ENVO_GALLERY_ALL as $v) { ?>
          <div class="col-sm-3">
            <div class="hovereffect gridview">
              <div class="center-cropped">
                <img src="<?= $v["paththumb"] . 'thumb_' . $v["title"] ?>"/>
              </div>
              <div class="caption">
                <h4><?= envo_cut_text(pathinfo($v["title"], PATHINFO_FILENAME), 18, ' ...') ?></h4>
                <div class="col-sm-12 col-3">
                  <p><strong>Format: </strong><?= pathinfo($v["title"], PATHINFO_EXTENSION) ?></p>
                </div>
                <div class="col-sm-12 col-4">
                  <p><strong>Size: </strong><?= formatSizeUnits($v["size"]) ?></p>
                </div>
                <div class="col-sm-12 col-5">
                  <p><strong>Resolution: </strong><?= $v["width"] . ' x ' . $v["height"] ?></p>
                </div>
                <div class="col-sm-12">
                  <div class="float-right">
                    <a href="index.php?p=facebookgallery&amp;sp=edit&amp;id=<?= $v["id"] ?>" class="btn btn-primary btn-xs">Info</a>
                    <a href="index.php?p=facebookgallery&amp;sp=delete&amp;id=<?= $v["id"] ?>" class="btn btn-default btn-xs" data-confirm="<?= sprintf($tl["fb_notification"]["del"], $v["title"]) ?>">Delete</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <!-- Form Content - List view -->
    <div id="listview" class="row toggle d-none">
      <div class="col-sm-12">
        <div class="box box-success">
          <div class="box-body no-padding">
            <div class="table-responsive">
              <table class="table image-list">
                <thead>
                <tr>
                  <th><span><?= $tl["fb_box_table"]["fbtb"] ?></span></th>
                  <th><span><?= $tl["fb_box_table"]["fbtb1"] ?></span></th>
                  <th><span><?= $tl["fb_box_table"]["fbtb2"] ?></span></th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ENVO_GALLERY_ALL as $v) { ?>
                  <tr>
                    <td>
                      <img src="<?= $v["paththumb"] . 'thumb_' . $v["title"] ?>" alt="">
                      <a href="index.php?p=facebookgallery&amp;sp=edit&amp;id=<?= $v["id"] ?>" class="image-link"><?= $v["title"] ?></a>
                      <span class="text-subhead">ID: <?= $v["id"] ?></span>
                    </td>
                    <td><?= date("d.m.Y - H:i", strtotime($v["time"])) ?></td>
                    <td>
                      <?= formatSizeUnits($v["size"]) ?>
                    </td>
                    <td style="width: 10%;">
                      <a href="index.php?p=facebookgallery&amp;sp=edit&amp;id=<?= $v["id"] ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?= $tl["icons"]["i2"] ?>">
                        <i class="fa fa-edit"></i>
                      </a>
                    </td>
                    <td style="width: 10%;">
                      <a href="index.php?p=facebookgallery&amp;sp=delete&amp;id=<?= $v["id"] ?>" class="btn btn-default btn-xs" data-confirm="<?= sprintf($tl["facebook"]["del"], $v["title"]) ?>" data-toggle="tooltip" data-placement="bottom" title="<?= $tl["icons"]["i1"] ?>">
                        <i class="fa fa-trash-o"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>

  <div class="col-sm-12 m-b-30">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-edit', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php } else { ?>

  <div class="col-sm-12">

    <?php
    // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
    echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
    ?>

  </div>

<?php } ?>

<?php include "footer.php"; ?>