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
        message: '<?php if ($page1 == "e") {
          $tl["general_error"]["generror1"];
        } elseif ($page1 == "ene") {
          echo $tl["general_error"]["generror2"];
        } else {
          echo $tl["userg_error"]["usergerror"];
        } ?>',
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

  <!-- Fixed Button for save form -->
  <div class="savebutton-medium hidden-xs">

    <?php
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=usergroup&sp=newgroup', $tl["button"]["btn35"], '', 'btn btn-info button');
    ?>

  </div>

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
              <th><?php echo $tl["userg_box_table"]["usergtb"]; ?></th>
              <th><?php echo $tl["userg_box_table"]["usergtb1"]; ?></th>
              <th></th>
              <th></th>
              <th>

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tl["userg_notification"]["delall"]));
                ?>

              </th>
            </tr>
            </thead>
            <?php if (isset($JAK_USERGROUP_ALL) && is_array($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td>
                  <div class="checkbox-singel check-success">

                    <?php
                    // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addCheckbox('jak_delete_usergroup[]', $v["id"], false, 'jak_delete_usergroup' . $v["id"], 'highlight');
                    echo $Html->addLabel('jak_delete_usergroup' . $v["id"], '');
                    ?>

                  </div>
                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=usergroup&amp;sp=edit&amp;ssp=' . $v["id"], $v["name"]);
                  ?>

                </td>
                <td><?php echo $v["description"]; ?></td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=usergroup&amp;sp=user&amp;ssp=' . $v["id"], '<i class="fa fa-user"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i20"]));
                  ?>

                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=usergroup&amp;sp=edit&amp;ssp=' . $v["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
                  ?>

                </td>
                <td>

                  <?php
                  if ($v["id"] > 4) {

                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('index.php?p=usergroup&amp;sp=delete&amp;ssp=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => $tl["userg_notification"]["del"], 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
                  }
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
      echo $Html->addTag('i', '', 'fa fa-user', array('title' => $tl["icons"]["i20"]));
      echo $Html->addTag('i', '', 'fa fa-edit', array('title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php include "footer.php"; ?>