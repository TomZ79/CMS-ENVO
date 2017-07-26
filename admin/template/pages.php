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
  <div class="savebutton-medium hidden-xs">

    <?php
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=page&sp=newpage', $tl["button"]["btn33"], '', 'btn btn-info button');
    ?>

  </div>

  <div class="row">
    <div class="col-md-6">
      <form role="form" method="post" action="/admin/index.php?p=page&amp;sp=search&amp;ssp=go">
        <div class="input-group">
          <span class="input-group-btn">
            <button class="btn btn-info" name="search" type="submit"><?php echo $tl["button"]["btn21"]; ?></button>
          </span>
          <input type="text" name="jakSH" class="form-control" placeholder="<?php echo $tl["placeholder"]["p1"]; ?>">
        </div><!-- /input-group -->
      </form>
    </div>
  </div>

  <hr>

<?php if (isset($JAK_PAGE_ALL) && is_array($JAK_PAGE_ALL)) { ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-success">
      <div class="box-body no-padding">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>
                <div class="checkbox-singel check-success">

                  <?php
                  // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addCheckbox('', '', false, 'jak_delete_all');
                  echo $Html->addLabel('jak_delete_all', '');
                  ?>

                </div>
              </th>
              <th>

                <?php
                echo $tl["page_box_table"]["pagetb"];
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=page&amp;sp=sort&amp;ssp=title&amp;sssp=DESC', '<i class="fa fa-arrow-up"></i>', '', 'btn btn-warning btn-xs sort');
                echo $Html->addAnchor('index.php?p=page&amp;sp=sort&amp;ssp=title&amp;sssp=ASC', '<i class="fa fa-arrow-down"></i>', '', 'btn btn-success btn-xs sort');
                ?>

              </th>
              <th><?php echo $tl["page_box_table"]["pagetb5"]; ?></th>
              <th><?php echo $tl["page_box_table"]["pagetb1"]; ?></th>
              <th><?php echo $tl["page_box_table"]["pagetb2"]; ?></th>
              <th>

                <?php
                echo $tl["page_box_table"]["pagetb3"];
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=page&amp;sp=sort&amp;ssp=hits&amp;sssp=DESC', '<i class="fa fa-arrow-up"></i>', '', 'btn btn-warning btn-xs sort');
                echo $Html->addAnchor('index.php?p=page&amp;sp=sort&amp;ssp=hits&amp;sssp=ASC', '<i class="fa fa-arrow-down"></i>', '', 'btn btn-success btn-xs sort');
                ?>

              </th>
              <th><?php echo $tl["page_box_table"]["pagetb4"]; ?></th>
              <th>

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('lock', '<i class="fa fa-lock"></i>', 'button_lock', 'btn btn-default btn-xs');
                ?>

              </th>
              <th></th>
              <th>

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tl["cf_notification"]["delall"]));
                ?>

              </th>
            </tr>
            </thead>
            <?php foreach ($JAK_PAGE_ALL as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td>
                  <div class="checkbox-singel check-success">

                    <?php
                    // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addCheckbox('jak_delete_page[]', $v["id"], false, 'jak_delete_page' . $v["id"], 'highlight');
                    echo $Html->addLabel('jak_delete_page' . $v["id"], '');
                    ?>

                  </div>
                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=page&amp;sp=edit&amp;ssp=' . $v["id"], $v["title"]);
                  ?>

                </td>
                <td>

                  <?php
                  if ($v["password"]) {
                    echo '<i class="fa fa-key"></i>';
                  }
                  ?>

                </td>
                <td>

                  <?php
                  if ($v["catid"] != '0') {
                    if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach ($JAK_CAT as $z) {
                      if ($v["catid"] == $z["id"]) {
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('index.php?p=categories&amp;sp=edit&amp;ssp=' . $z["id"], $z["name"]);
                      }
                    }
                  } else {
                    echo $tl["page_box_content"]["pagebc"];
                  }
                  ?>

                </td>
                <td><?php echo date("d.m.Y - H:i:s", strtotime($v["time"])); ?></td>
                <td><?php echo $v["hits"]; ?></td>
                <td>
                  <?php
                  if ($v["active"] == 1 && $v["catid"] != 0) {
                    echo $tl["page_box_content"]["pagebc1"];
                  } elseif ($v["active"] == 1 && $v["catid"] == 0) {
                    echo $tl["page_box_content"]["pagebc2"] . '<span class="small">  - Archiv</span>';
                  } elseif ($v["active"] == 0 && $v["catid"] == 0) {
                    echo $tl["page_box_content"]["pagebc2"] . '<span class="small">  - Archiv, Uzamčeno</span>';
                  } else {
                    echo $tl["page_box_content"]["pagebc2"] . '<span class="small">  - Uzamčeno</span>';
                  }
                  ?>
                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=page&amp;sp=lock&amp;ssp=' . $v["id"], '<i class="fa fa-' . (($v["active"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'title' => ($v["active"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));
                  ?>

                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=page&amp;sp=edit&amp;ssp=' . $v["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
                  ?>

                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=page&amp;sp=delete&amp;ssp=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf($tl["page_notification"]["del"], $v["title"]), 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
                  ?>

                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </form>

  <div class="col-md-12 m-b-30">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-check', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i6"]));
      echo $Html->addTag('i', '', 'fa fa-lock', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i5"]));
      echo $Html->addTag('i', '', 'fa fa-edit', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

  <?php if ($JAK_PAGINATE) {
    echo $JAK_PAGINATE;
  }
} else { ?>

  <div class="col-md-12">

    <?php
    // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
    echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
    ?>

  </div>

<?php } ?>

<?php include "footer.php"; ?>