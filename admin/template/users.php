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

<?php if ($page1 == "e" || $page1 == "edp" || $page1 == "ene") { ?>
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
          echo $tl["general_error"]["generror31"];
        } ?>'
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
    echo $Html->addAnchor('index.php?p=users&amp;sp=newuser', $tl["button"]["btn34"], '', 'btn btn-info button');
    ?>

  </div>

  <div class="row">
    <div class="col-sm-6">
      <form role="form" method="post" action="/admin/index.php?p=users&amp;sp=search&amp;ssp=go">
        <div class="input-group">
          <span class="input-group-btn">
            <button class="btn btn-info" name="search" type="submit"><?php echo $tl["button"]["btn21"]; ?></button>
          </span>
          <input type="text" name="envoSH" class="form-control" placeholder="<?php echo $tl["placeholder"]["p2"]; ?>">
        </div><!-- /input-group -->
      </form>
    </div>
    <div class="col-sm-6">
    <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
      <div class="input-group">
        <select name="envo_group" class="form-control selectpicker">

          <?php
          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
          if (isset($ENVO_USERGROUP_ALL) && is_array($ENVO_USERGROUP_ALL)) foreach ($ENVO_USERGROUP_ALL as $z) {
            if ($z["id"] != "1") {
              echo $Html->addOption($z["id"], $z["name"]);
            }
          }
          ?>

        </select>
        <span class="input-group-btn">

          <?php
          // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
          echo $Html->addButtonSubmit('move', $tl["button"]["btn20"], '', 'btn btn-warning');
          ?>

        </span>
      </div>
    </div>
  </div>

  <hr>

<?php if (isset($ENVO_USER_ALL_APPROVE) && is_array($ENVO_USER_ALL_APPROVE)) { ?>

  <h3><?php echo $tl["user_box_table"]["usertb5"]; ?></h3>

  <div class="box box-success">
    <div class="box-body no-padding">
      <div class="table-responsive">
        <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th>#</th>
            <th>
              <div class="checkbox-singel check-success" style="margin: 0 auto;">

                <?php
                // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                echo $Html->addCheckbox('', '', false, 'envo_delete_all_approve');
                echo $Html->addLabel('envo_delete_all_approve', '');
                ?>

              </div>
            </th>
            <th><?php echo $tl["user_box_table"]["usertb"]; ?></th>
            <th><?php echo $tl["user_box_table"]["usertb1"]; ?></th>
            <th><?php echo $tl["user_box_table"]["usertb2"]; ?></th>
            <th></th>
            <th class="text-center">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('password', '<i class="fa fa-key"></i>', 'button_key_approve', 'btn btn-default btn-xs', array('data-confirm-del' => $tl["user_notification"]["pass1"]));
              ?>

            </th>
            <th></th>
            <th class="text-center">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete_approve', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tl["user_notification"]["delall"]));
              ?>

            </th>
          </tr>
          </thead>
          <?php foreach ($ENVO_USER_ALL_APPROVE as $va) { ?>
            <tr>
              <td><?php echo $va["id"]; ?></td>
              <td>
                <div class="checkbox-singel check-success" style="margin: 0 auto;">

                  <?php
                  // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addCheckbox('envo_delete_user[]', $va["id"], false, 'envo_delete_user' . $va["id"], 'highlight_approve');
                  echo $Html->addLabel('envo_delete_user' . $va["id"], '');
                  ?>

                </div>
              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=users&amp;sp=edituser&amp;id=' . $va["id"], $va["username"]);
                ?>

              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=users&amp;sp=edituser&amp;id=' . $va["id"], $va["email"]);
                ?>

              </td>
              <td>

                <?php
                if (isset($ENVO_USERGROUP_ALL) && is_array($ENVO_USERGROUP_ALL)) foreach ($ENVO_USERGROUP_ALL as $z) {
                  if ($va["usergroupid"] == $z["id"]) {

                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('index.php?p=usergroup&amp;sp=user&amp;id=' . $z["id"], $z["name"]);

                  }
                }
                ?>

              </td>
              <td class="text-center content-go">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=users&amp;sp=verify&amp;id=' . $va["id"], '<i class="fa fa-' . (($va["access"] == 3 || $va["access"] == 2) ? 'envelope-o' : 'lock') . '"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => (($va["access"] == 3 || $va["access"] == 2) ? $tl["icons"]["i19"] : $tl["icons"]["i5"])));
                ?>

              </td>
              <td class="text-center">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=users&amp;sp=password&amp;id=' . $va["id"], '<i class="fa fa-key"></i>', '', 'btn btn-default btn-xs', array('data-confirm' => $tl["user_notification"]["pass"], 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i14"]));
                ?>

              </td>
              <td class="text-center">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=users&amp;sp=edituser&amp;id=' . $va["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
                ?>

              </td>
              <td class="text-center">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=users&amp;sp=delete&amp;id=' . $va["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf($tl["user_notification"]["del"], $va["username"]), 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'left', 'title' => $tl["icons"]["i1"]));
                ?>

              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </div>

<?php } ?>

  <h3><?php echo $tl["user_box_table"]["usertb4"]; ?></h3>

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
            <th>
              <?php echo $tl["user_box_table"]["usertb"]; ?>
              <a class="btn btn-warning btn-xs" href="index.php?p=users&amp;sp=sort&amp;ssp=username&amp;sssp=DESC">
                <i class="fa fa-arrow-up"></i>
              </a>
              <a class="btn btn-success btn-xs" href="index.php?p=users&amp;sp=sort&amp;ssp=username&amp;sssp=ASC">
                <i class="fa fa-arrow-down"></i>
              </a>
            </th>
            <th>
              <?php echo $tl["user_box_table"]["usertb1"]; ?>
              <a class="btn btn-warning btn-xs" href="index.php?p=users&amp;sp=sort&amp;ssp=email&amp;sssp=DESC">
                <i class="fa fa-arrow-up"></i>
              </a>
              <a class="btn btn-success btn-xs" href="index.php?p=users&amp;sp=sort&amp;ssp=email&amp;sssp=ASC">
                <i class="fa fa-arrow-down"></i>
              </a>
            </th>
            <th><?php echo $tl["user_box_table"]["usertb2"]; ?></th>
            <th><?php echo $tl["user_box_table"]["usertb6"]; ?></th>
            <th><?php echo $tl["user_box_table"]["usertb3"]; ?></th>
            <th>

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('lock', '<i class="fa fa-lock"></i>', 'button_lock', 'btn btn-default btn-xs');
              ?>

            </th>
            <th>

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('password', '<i class="fa fa-key"></i>', 'button_key', 'btn btn-default btn-xs', array('data-confirm-del' => $tl["user_notification"]["pass1"]));
              ?>

            </th>
            <th></th>
            <th>
              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tl["user_notification"]["delall"], 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'left', 'title' => $tl["icons"]["i30"]));
              ?>
            </th>
          </tr>
          </thead>
          <?php if (isset($ENVO_USER_ALL) && is_array($ENVO_USER_ALL)) foreach ($ENVO_USER_ALL as $v) { ?>
            <tr>
              <td><?php echo $v["id"]; ?></td>
              <td>

                <?php
                // Check if users is superadmin
                $superadminidarray = explode(',', ENVO_SUPERADMIN);

                if (!in_array($v["id"], $superadminidarray)) {
                  echo '<div class="checkbox-singel check-success" style="margin: 0 auto;">';
                  // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addCheckbox('envo_delete_user[]', $v["id"], false, 'envo_delete_user' . $v["id"], 'highlight');
                  echo $Html->addLabel('envo_delete_user' . $v["id"], '');
                  echo '</div>';
                }
                ?>

              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=users&amp;sp=edituser&amp;id=' . $v["id"], $v["username"]);
                ?>

              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=users&amp;sp=edituser&amp;id=' . $v["id"], $v["email"]);
                ?>

              </td>
              <td>

                <?php

                if (isset($ENVO_USERGROUP_ALL) && is_array($ENVO_USERGROUP_ALL)) foreach ($ENVO_USERGROUP_ALL as $z) {

                  $superadminidarray = explode(',', ENVO_SUPERADMIN);

                  if ($v["usergroupid"] == $z["id"]) {

                    if (in_array($v["id"], $superadminidarray)) {
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('index.php?p=usergroup&amp;sp=user&amp;id=' . $z["id"], $z["name"] . ' - SuperAdmin');
                    } else {
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('index.php?p=usergroup&amp;sp=user&amp;id=' . $z["id"], $z["name"]);
                    }

                  }
                }

                ?>

              </td>
              <td><?php echo date("d.m.Y", strtotime($v["time"])); ?></td>
              <td>

                <?php
                if ($v["access"] == 1) {
                  echo $tl["user_box_content"]["userbc"];
                } else {
                  echo $tl["user_box_content"]["userbc1"] . '<span class="small">  - ' . $tl["user_box_content"]["userbc2"] . '</span>';
                }
                ?>

              </td>
              <td class="text-center">

                <?php
                // Check if users is superadmin
                $superadminidarray = explode(',', ENVO_SUPERADMIN);

                if (!in_array($v["id"], $superadminidarray)) {
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=users&amp;sp=lock&amp;id=' . $v["id"], '<i class="fa fa-' . (($v["access"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'title' => ($v["access"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));
                }
                ?>

              </td>
              <td class="text-center">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=users&amp;sp=password&amp;id=' . $v["id"], '<i class="fa fa-key"></i>', '', 'btn btn-default btn-xs', array('data-confirm' => $tl["user_notification"]["pass"], 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i14"]));
                ?>

              </td>
              <td class="text-center">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=users&amp;sp=edituser&amp;id=' . $v["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
                ?>

              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=users&amp;sp=delete&amp;ssp=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf($tl["user_notification"]["del"], $v["username"]), 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
                ?>

              </td>
            </tr>
          <?php } ?>
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
      echo $Html->addTag('i', '', 'fa fa-envelope-o', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i19"]));
      echo $Html->addTag('i', '', 'fa fa-check', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i6"]));
      echo $Html->addTag('i', '', 'fa fa-lock', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i5"]));
      echo $Html->addTag('i', '', 'fa fa-key', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i14"]));
      echo $Html->addTag('i', '', 'fa fa-edit', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php if ($ENVO_PAGINATE) {
  echo $ENVO_PAGINATE;
} ?>

<?php include "footer.php"; ?>