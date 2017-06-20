<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page2 == "s") { ?>
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
if ($page2 == "e") { ?>
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

  <!-- Fixed Button for save form -->
  <div class="savebutton-medium hidden-xs">

    <?php
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=newsletter&sp=user&ssp=newuser', $tl["button"]["btn34"], '', 'btn btn-info button');
    ?>

  </div>

<?php if (isset($JAK_USER_ALL) && is_array($JAK_USER_ALL)) { ?>

  <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="input-group">
      <select name="jak_group" class="form-control selectpicker">

        <?php
        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
        if (isset($JAK_USERGROUP_ALL) && is_array($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $z) {
          if ($z["id"] != "1") {
            echo $Html->addOption($z["id"], $z["name"]);
          }
        }
        ?>

      </select>
      <span class="input-group-btn">
				<button type="submit" name="move" class="btn btn-warning"><?php echo $tl["button"]["btn20"]; ?></button>
			</span>
    </div>
    <hr>

    <div class="box box-success">
      <div class="box-body no-padding">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>
                <div class="checkbox-singel check-success">

                  <?php
                  // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addCheckbox('', '', FALSE, 'jak_delete_all');
                  echo $Html->addLabel('jak_delete_all', '');
                  ?>

                </div>
              </th>
              <th><?php echo $tlnl["newsletter_box_content"]["nlbc13"]; ?></th>
              <th><?php echo $tlnl["newsletter_box_content"]["nlbc15"]; ?></th>
              <th><?php echo $tlnl["newsletter_box_content"]["nlbc16"]; ?></th>
              <th></th>
              <th>

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tlnl["newsletter_notification"]["delallu"]));
                ?>

              </th>
            </tr>
            </thead>
            <?php foreach ($JAK_USER_ALL as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td>
                  <div class="checkbox-singel check-success">

                    <?php
                    // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addCheckbox('jak_delete_user[]', $v["id"], FALSE, 'jak_delete_user' . $v["id"], 'highlight');
                    echo $Html->addLabel('jak_delete_user' . $v["id"], '');
                    ?>

                  </div>
                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=newsletter&amp;sp=user&amp;ssp=edit&amp;sssp=' . $v["id"], $v["name"]);
                  ?>

                </td>
                <td><?php echo $v["email"]; ?></td>
                <td>

                  <?php if (isset($JAK_USERGROUP_ALL) && is_array($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $z) {
                    if ($v["usergroupid"] == $z["id"]) {
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('index.php?p=newsletter&amp;sp=user&amp;ssp=group&amp;sssp=' . $z["id"], $z["name"]);

                    }
                  } ?>

                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=newsletter&amp;sp=user&amp;ssp=edit&amp;sssp=' . $v["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
                  ?>

                </td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=newsletter&amp;sp=user&amp;ssp=delete&amp;sssp=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-default btn-xs', array('data-confirm' => sprintf($tlnl["newsletter_notification"]["delu"], $v["name"]), 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
                  ?>

                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </form>

  <div class="col-md-12">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-edit', array('title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

  <?php

  if ($JAK_PAGINATE) echo $JAK_PAGINATE;

} else { ?>

  <div class="col-md-12">

    <?php
    // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
    echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
    ?>

  </div>

<?php } ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>