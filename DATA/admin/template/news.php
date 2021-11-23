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
  <div class="actionbtn-block d-none d-sm-block">

    <?php
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=news&amp;sp=newnews', $tl["button"]["btn32"], '', 'btn btn-info button');
    ?>

  </div>

<?php if (isset($ENVO_NEWS) && is_array($ENVO_NEWS)) { ?>

  <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    <div class="box box-success">
      <div class="box-body no-padding">
        <div class="table-responsive">
          <table id="news_table" class="table table-striped table-hover">
            <thead>
            <tr>
              <th class="no-sort" style="width:5%">#</th>
              <th class="no-sort" style="width:4%">
                <div class="checkbox-singel check-success" style="margin: 0 auto;">

                  <?php
                  // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addCheckbox('', '', FALSE, 'envo_delete_all');
                  echo $Html->addLabel('envo_delete_all', '');
                  ?>

                </div>
              </th>
              <th style="width:48%"><?= $tl["news_box_table"]["newstb"] ?></th>
              <th style="width:8%"><?= $tl["news_box_table"]["newstb1"] ?></th>
              <th style="width:12%"><?= $tl["news_box_table"]["newstb2"] ?></th>
              <th style="width:12%"><?= $tl["news_box_table"]["newstb3"] ?></th>
              <th class="text-center no-sort" style="width:4%">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('lock', '<i class="fa fa-lock"></i>', 'button_lock', 'btn btn-default btn-xs');
                ?>

              </th>
              <th class="text-center no-sort" style="width:4%"></th>
              <th class="text-center no-sort" style="width:4%">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tl["news_notification"]["delall"], 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'left', 'title' => $tl["icons"]["i30"]));
                ?>

              </th>
            </tr>
            </thead>
            <tbody>

            <?php foreach ($ENVO_NEWS as $v) { ?>
              <tr>
                <td><?= $v["id"] ?></td>
                <td>
                  <div class="checkbox-singel check-success" style="margin: 0 auto;">

                    <?php
                    // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addCheckbox('envo_delete_news[]', $v["id"], FALSE, 'envo_delete_news' . $v["id"], 'highlight');
                    echo $Html->addLabel('envo_delete_news' . $v["id"], '');
                    ?>

                  </div>
                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=news&amp;sp=editnews&amp;id=' . $v["id"], $v["title"], '', '', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $v["title"]));
                  ?>

                </td>
                <td><?= date("d.m.Y", strtotime($v["time"])) ?></td>
                <td><?= $v["hits"] ?></td>
                <td>

                  <?php
                  // Time Control - variable
                  $today       = date("Y-m-d H:i:s"); // Today time
                  $expire      = date("Y-m-d H:i:s", $v["enddate"]); //End time of article or content from DB
                  $today_time  = strtotime($today);
                  $expire_time = strtotime($expire);

                  // Control Active of article or content ...
                  if ($v["active"] == 1) {
                    if (empty($v["enddate"])) {
                      echo $tl["news_box_content"]["newsbc7"];
                    } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                      echo $tl["news_box_content"]["newsbc7"];
                    } else {
                      echo $tl["news_box_content"]["newsbc8"] . '<span class="small">  - ' . $tl["news_box_content"]["newsbc10"] . '</span>';
                    }
                  } else {
                    if (empty($v["enddate"])) {
                      echo $tl["news_box_content"]["newsbc8"] . '<span class="small">  - ' . $tl["news_box_content"]["newsbc9"] . '</span>';
                    } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                      echo $tl["news_box_content"]["newsbc8"] . '<span class="small">  - ' . $tl["news_box_content"]["newsbc9"] . '</span>';
                    } else {
                      echo $tl["news_box_content"]["newsbc8"] . '<span class="small"> - ' . $tl["news_box_content"]["newsbc9"] . ', ' . $tl["news_box_content"]["newsbc10"] . '</span>';
                    }
                  }
                  ?>

                </td>
                <td class="text-center">

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=news&amp;sp=lock&amp;id=' . $v["id"], '<i class="fa fa-' . (($v["active"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => ($v["active"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));
                  ?>

                </td>
                <td class="text-center">

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=news&amp;sp=editnews&amp;id=' . $v["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
                  ?>

                </td>
                <td class="text-center">

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=news&amp;sp=delete&amp;id=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => $tl["news_notification"]["del"], 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
                  ?>

                </td>
              </tr>

            <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </form>

  <div class="col-sm-12 m-b-30">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-check', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i6"]));
      echo $Html->addTag('i', '', 'fa fa-lock', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i5"]));
      echo $Html->addTag('i', '', 'fa fa-edit', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

  <?php if ($ENVO_PAGINATE) {
    echo $ENVO_PAGINATE;
  }
} else { ?>

  <div class="col-sm-12">

    <?php
    // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
    echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
    ?>

  </div>

<?php } ?>

<?php include "footer.php"; ?>