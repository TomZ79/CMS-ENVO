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


<?php if ($page1 == "e") { ?>
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

<?php if ($page2 == "s1" || $page2 == "s2") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo($page2 == "s1" ? $tl["notification"]["n2"] : $tl["notification"]["n3"]);?>'
      }, {
        // settings
        type: 'info',
        delay: 5000,
        timer: 3000
      });
    }, 2000);
  </script>
<?php } ?>

<?php if (isset($ENVO_SEARCHLOG_ALL) && is_array($ENVO_SEARCHLOG_ALL)) { ?>

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
                  echo $Html->addCheckbox('', '', false, 'envo_delete_all');
                  echo $Html->addLabel('envo_delete_all', '');
                  ?>

                </div>
              </th>
              <th><?php echo $tl["slogs_box_table"]["slogstb"]; ?></th>
              <th><?php echo $tl["slogs_box_table"]["slogstb1"]; ?></th>
              <th><?php echo $tl["slogs_box_table"]["slogstb2"]; ?></th>
              <th>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=searchlog&amp;sp=truncate&amp;ssp=go', '<i class="fa fa-exclamation-triangle"></i>', 'button_truncate', 'btn btn-warning btn-xs', array('data-confirm-trunc' => $tl["notification"]["n4"]));
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
            <?php foreach ($ENVO_SEARCHLOG_ALL as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td>
                  <div class="checkbox-singel check-success">

                    <?php
                    // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addCheckbox('envo_delete_search[]', $v["id"], false, 'envo_delete_search' . $v["id"], 'highlight');
                    echo $Html->addLabel('envo_delete_search' . $v["id"], '');
                    ?>

                  </div>
                </td>
                <td><?php echo $v["tag"]; ?></td>
                <td><?php echo date("d.m.Y - H:i:s", strtotime($v["time"])); ?></td>
                <td><?php echo $v["count"]; ?></td>
                <td></td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=searchlog&amp;sp=delete&amp;ssp=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => $tl["notification"]["n6"], 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
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
      echo $Html->addTag('i', '', 'fa fa-exclamation-triangle', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i15"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

  <?php
  if ($ENVO_PAGINATE) {
    echo $ENVO_PAGINATE;
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