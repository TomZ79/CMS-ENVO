<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["notification"]["n7"];?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

<?php if ($page2 == "s1") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo $tl["notification"]["n2"]; ?>'
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
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo($page1 == "e" ? $tl["general_error"]["generror1"] : $tl["general_error"]["generror2"]);?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <!-- Fixed Button for save form -->
  <div class="actionbutton hidden-xs">
    <button type="submit" name="button" class="btn btn-toggle" data-toggle="tooltip" data-placement="bottom" title="Toggle grid and list view">
      <i class="fa fa-th-list"></i>
    </button>
  </div>

<?php if (isset($JAK_GALLERY_ALL) && is_array($JAK_GALLERY_ALL) && !empty($JAK_GALLERY_ALL)) { ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Form Content - Grid view -->
    <div id="gridview" class="row toggle visible">
      <div class="col-md-12">
        <?php foreach ($JAK_GALLERY_ALL as $v) { ?>
          <div class="col-md-3">
            <div class="hovereffect gridview">
              <div class="center-cropped">
                <img src="<?php echo $v["paththumb"] . 'thumb_' . $v["title"]; ?>"/>
              </div>
              <div class="caption">
                <h4><?php echo envo_cut_text(pathinfo($v["title"], PATHINFO_FILENAME), 18, ' ...'); ?></h4>
                <div class="col-md-12 col-xs-3">
                  <p><strong>Format: </strong><?php echo pathinfo($v["title"], PATHINFO_EXTENSION); ?></p>
                </div>
                <div class="col-md-12 col-xs-4">
                  <p><strong>Size: </strong><?php echo formatSizeUnits($v["size"]); ?></p>
                </div>
                <div class="col-md-12 col-xs-5">
                  <p><strong>Resolution: </strong><?php echo $v["width"] . ' x ' . $v["height"]; ?></p>
                </div>
                <div class="col-md-12">
                  <div class="pull-right">
                    <a href="index.php?p=facebookgallery&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-primary btn-xs">Info</a>
                    <a href="index.php?p=facebookgallery&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-confirm="<?php echo sprintf($tl["fb_notification"]["del"], $v["title"]); ?>">Delete</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <!-- Form Content - List view -->
    <div id="listview" class="row toggle hidden">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-body no-padding">
            <div class="table-responsive">
              <table class="table image-list">
                <thead>
                <tr>
                  <th><span><?php echo $tl["fb_box_table"]["fbtb"]; ?></span></th>
                  <th><span><?php echo $tl["fb_box_table"]["fbtb1"]; ?></span></th>
                  <th><span><?php echo $tl["fb_box_table"]["fbtb2"]; ?></span></th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($JAK_GALLERY_ALL as $v) { ?>
                  <tr>
                    <td>
                      <img src="<?php echo $v["paththumb"] . 'thumb_' . $v["title"]; ?>" alt="">
                      <a href="index.php?p=facebookgallery&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" class="image-link"><?php echo $v["title"]; ?></a>
                      <span class="text-subhead">ID: <?php echo $v["id"]; ?></span>
                    </td>
                    <td><?php echo date("d.m.Y - H:i", strtotime($v["time"])); ?></td>
                    <td>
                      <?php echo formatSizeUnits($v["size"]); ?>
                    </td>
                    <td style="width: 10%;">
                      <a href="index.php?p=facebookgallery&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
                        <i class="fa fa-edit"></i>
                      </a>
                    </td>
                    <td style="width: 10%;">
                      <a href="index.php?p=facebookgallery&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-confirm="<?php echo sprintf($tl["facebook"]["del"], $v["title"]); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
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

  <div class="col-md-12 m-b-30">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-edit', array('title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php } else { ?>

  <div class="col-md-12">

    <?php
    // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
    echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
    ?>

  </div>

<?php } ?>

<?php include "footer.php"; ?>