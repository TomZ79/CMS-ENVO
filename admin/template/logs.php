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
<?php }
if ($page1 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["general_error"]["generror1"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

<?php if ($page2 == "s") { ?>
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

<?php if ($page2 == "s1") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo $tl["notification"]["n3"]; ?>'
      }, {
        // settings
        type: 'info',
        delay: 5000,
        timer: 3000
      });
    }, 2000);
  </script>
<?php } ?>

<?php if (isset($JAK_LOGINLOG_ALL) && is_array($JAK_LOGINLOG_ALL)) { ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-success">
      <div class="box-body no-padding">
        <div class="table-responsive">
          <table class="table table-hover table-expandable">
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
              <th><?php echo $tl["logs_box_table"]["logstb"]; ?></th>
              <th><?php echo $tl["logs_box_table"]["logstb1"]; ?></th>
              <th><?php echo $tl["logs_box_table"]["logstb2"]; ?></th>
              <th><?php echo $tl["logs_box_table"]["logstb3"]; ?></th>
              <th><?php echo $tl["logs_box_table"]["logstb4"]; ?></th>
              <th class="text-center"><?php echo $tl["logs_box_table"]["logstb5"]; ?></th>
              <th>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=logs&amp;sp=truncate&amp;ssp=go', '<i class="fa fa-exclamation-triangle"></i>', 'button_truncate', 'btn btn-warning btn-xs', array('data-confirm-trunc' => $tl["notification"]["n4"]));
                ?>

              </th>
              <th>

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tl["notification"]["n5"]));
                ?>

              </th>
            </tr>
            </thead>
            <?php foreach ($JAK_LOGINLOG_ALL as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td>
                  <div class="checkbox-singel check-success">

                    <?php
                    // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addCheckbox('jak_delete_log[]', $v["id"], FALSE, 'jak_delete_log' . $v["id"], 'highlight');
                    echo $Html->addLabel('jak_delete_log' . $v["id"], '');
                    ?>

                  </div>
                </td>
                <td><?php echo jak_cut_text($v["name"], 8, '...'); ?></td>
                <td><?php echo $v["fromwhere"]; ?></td>
                <td><?php echo $v["ip"]; ?></td>
                <td><?php echo jak_cut_text($v["usragent"], 20, '...'); ?></td>
                <td><?php echo date("d.m.Y - H:i:s", strtotime($v["time"])); ?></td>
                <td class="text-center">

                  <?php
                  if ($v["access"] == '1') {
                    echo '<i class="fa fa-check"></i>';
                  } else {
                    echo '<i class="fa fa-exclamation"></i>';
                  }
                  ?>

                </td>
                <td></td>
                <td class="call-button">

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=logs&amp;sp=delete&amp;ssp=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => $tl["notification"]["n6"], 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
                  ?>

                </td>
              </tr>
              <!-- Detail of login user -->
              <tr>
                <td colspan="11" style="background: #edf7ee; border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc;">
                  <table style="width: 100%;">
                    <tbody>
                    <tr>
                      <td style="padding: 5px; border: none;">
                        <table style="width: 70%;">
                          <tr>
                            <!-- Name of user -->
                            <td style="border: none;">
                              <strong><?php echo $tl["logs_box_table"]["logstb"]; ?> : </strong>
                              <?php echo $v["name"]; ?>
                            </td>
                            <!-- Login page -->
                            <td style="border: none;">
                              <strong><?php echo $tl["logs_box_table"]["logstb1"]; ?> : </strong>
                              <?php echo rtrim(BASE_URL_ORIG, "/") . $v["fromwhere"]; ?>
                            </td>
                          </tr>
                        </table>
                      </td>
                    </tr>
                    <!-- User Agent -->
                    <tr>
                      <td style="padding: 5px;">
                        <strong><?php echo $tl["logs_box_table"]["logstb3"]; ?> : </strong>
                        <?php echo $v["usragent"]; ?>
                      </td>
                    </tr>
                    </tbody>
                  </table>
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
      echo $Html->addTag('i', '', 'fa fa-check', array('title' => $tl["icons"]["i16"]));
      echo $Html->addTag('i', '', 'fa fa-exclamation', array('title' => $tl["icons"]["i17"]));
      echo $Html->addTag('i', '', 'fa fa-exclamation-triangle', array('title' => $tl["icons"]["i15"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('title' => $tl["icons"]["i1"]));
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