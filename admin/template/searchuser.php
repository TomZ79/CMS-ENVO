<?php include "header.php"; ?>

<?php if ($errors) { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <div class="row">
    <div class="col-sm-6">
      <form role="form" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
        <div class="input-group">
          <span class="input-group-btn">
              <button class="btn btn-info" name="search" type="submit"><?=$tl["button"]["btn21"]?></button>
          </span>
          <input type="text" name="envoSH" class="form-control" placeholder="<?=$tl["placeholder"]["p2"]?>">
        </div>
      </form>
    </div>

    <form method="post" action="<?=$_SERVER['REQUEST_URI']?>">
      <div class="col-sm-6">
        <div class="input-group">
          <select name="envo_group" class="form-control selectpicker">

            <?php
            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
            if (isset($ENVO_USERGROUP_ALL) && is_array($ENVO_USERGROUP_ALL)) foreach ($ENVO_USERGROUP_ALL as $z) {
              if ($z["id"] != "1") {
                echo $Html->addOption($z["id"], $z["name"], ($z["id"] == $_REQUEST["envo_group"]) ? TRUE : FALSE);
              }
            }
            ?>

          </select>
          <span class="input-group-btn">
          <button type="submit" name="move" class="btn btn-warning"><?=$tl["button"]["btn20"]?></button>
        </span>
        </div>
      </div>
  </div>

  <hr>

<?php if ($ENVO_SEARCH || $ENVO_LIST_USER) { ?>

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
                echo $Html->addCheckbox('', '', false, 'envo_delete_all');
                echo $Html->addLabel('envo_delete_all', '');
                ?>

              </div>
            </th>
            <th><?=$tl["user_box_table"]["usertb"]?></th>
            <th><?=$tl["user_box_table"]["usertb1"]?></th>
            <th><?=$tl["user_box_table"]["usertb2"]?></th>
            <th><?=$tl["user_box_table"]["usertb3"]?></th>
            <th>
              <button type="submit" name="lock" id="button_lock" class="btn btn-default btn-xs">
                <i class="fa fa-lock"></i>
              </button>
            </th>
            <th>
              <button type="submit" name="password" id="button_key" class="btn btn-default btn-xs" data-confirm="<?=$tl["user_notification"]["pass1"]?>">
                <i class="fa fa-key"></i>
              </button>
            </th>
            <th></th>
            <th>
              <button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?=$tl["user_notification"]["delall"]?>" disabled="disabled">
                <i class="fa fa-trash-o"></i>
              </button>
            </th>
          </tr>
          </thead>
          <?php if ($ENVO_SEARCH) { ?><?php if (isset($ENVO_SEARCH) && is_array($ENVO_SEARCH)) foreach ($ENVO_SEARCH as $v) { ?>
            <tr>
              <td><?=$v["id"]?></td>
              <td>
                <div class="checkbox-singel check-success">
                  <input type="checkbox" id="envo_delete_user<?=$v["id"]?>" name="envo_delete_user[]" class="highlight" value="<?=$v["id"]?>"/>
                  <label for="envo_delete_user<?=$v["id"]?>"></label>
                </div>
              </td>
              <td><a href="index.php?p=users&amp;sp=edituser&amp;id=<?=$v["id"]?>"><?=$v["name"]?></a>
              </td>
              <td><?=$v["email"]?></td>
              <td><?=$v["username"]?></td>
              <td>
                <?php if (isset($ENVO_USERGROUP_ALL) && is_array($ENVO_USERGROUP_ALL)) foreach ($ENVO_USERGROUP_ALL as $y) {
                  if ($v["usergroupid"] == $y["id"]) { ?>
                    <a href="index.php?p=usergroup&amp;sp=user&amp;id=<?=$y["id"]?>"><?=$y["name"]?></a>
                  <?php }
                } ?>
              </td>
              <td>
                <a class="btn btn-default btn-xs" href="index.php?p=users&amp;sp=lock&amp;id=<?=$v["id"]?>" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["access"] == '1') {
                  echo $tl["icons"]["i6"];
                } else {
                  echo $tl["icons"]["i5"];
                } ?>">
                  <i class="fa fa-<?php if ($v["access"] == '1') { ?>check<?php } else { ?>lock<?php } ?>"></i>
                </a>
              </td>
              <td>
                <a class="btn btn-default btn-xs" href="index.php?p=users&amp;sp=password&amp;id=<?=$v["id"]?>" data-confirm="<?=$tl["user_notification"]["pass"]?>" data-toggle="tooltip" data-placement="bottom" title="<?=$tl["icons"]["i14"]?>">
                  <i class="fa fa-key"></i>
                </a>
              </td>
              <td>
                <a class="btn btn-default btn-xs" href="index.php?p=users&amp;sp=edit&amp;id=<?=$v["id"]?>" data-toggle="tooltip" data-placement="bottom" title="<?=$tl["icons"]["i2"]?>">
                  <i class="fa fa-edit"></i>
                </a>
              </td>
              <td>
                <a class="btn btn-default btn-xs" href="index.php?p=users&amp;sp=delete&amp;id=<?=$v["id"]?>" data-confirm="<?=sprintf($tl["user_notification"]["del"], $v["name"])?>" data-toggle="tooltip" data-placement="bottom" title="<?=$tl["icons"]["i1"]?>">
                  <i class="fa fa-trash-o"></i>
                </a>
              </td>
            </tr>
          <?php }
          } ?>
          <?php if ($ENVO_LIST_USER) { ?><?php if (isset($ENVO_LIST_USER) && is_array($ENVO_LIST_USER)) foreach ($ENVO_LIST_USER as $v) { ?>
            <tr>
              <td><?=$v["id"]?></td>
              <td>
                <div class="checkbox-singel check-success">
                  <input type="checkbox" id="envo_delete_user<?=$v["id"]?>" name="envo_delete_user[]" class="highlight" value="<?=$v["id"]?>"/>
                  <label for="envo_delete_user<?=$v["id"]?>"></label>
                </div>
              </td>
              <td><a href="index.php?p=users&amp;sp=edituser&amp;id=<?=$v["id"]?>"><?=$v["name"]?></a>
              </td>
              <td><?=$v["email"]?></td>
              <td><?=$v["username"]?></td>
              <td><?php if (isset($ENVO_USERGROUP_ALL) && is_array($ENVO_USERGROUP_ALL)) foreach ($ENVO_USERGROUP_ALL as $y) {
                  if ($v["usergroupid"] == $y["id"]) { ?>
                    <a href="index.php?p=usergroup&amp;sp=user&amp;id=<?=$y["id"]?>"><?=$y["name"]?></a><?php }
                } ?></td>
              <td>
                <a class="btn btn-default btn-xs" href="index.php?p=users&amp;sp=lock&amp;id=<?=$v["id"]?>">
                  <i class="fa fa-<?php if ($v["access"] == '1') { ?>check<?php } else { ?>lock<?php } ?>"></i>
                </a>
              </td>
              <td>
                <a class="btn btn-default btn-xs" href="index.php?p=users&amp;sp=password&amp;id=<?=$v["id"]?>" data-confirm="<?=$tl["user_notification"]["pass"]?>" data-toggle="tooltip" data-placement="bottom" title="<?=$tl["icons"]["i14"]?>">
                  <i class="fa fa-key"></i>
                </a>
              </td>
              <td>
                <a class="btn btn-default btn-xs" href="index.php?p=users&amp;sp=edit&amp;id=<?=$v["id"]?>">
                  <i class="fa fa-edit"></i>
                </a>
              </td>
              <td>
                <a class="btn btn-default btn-xs" href="index.php?p=users&amp;sp=delete&amp;id=<?=$v["id"]?>" data-confirm="<?=sprintf($tl["user_notification"]["del"], $v["username"])?>" data-toggle="tooltip" data-placement="bottom" title="<?=$tl["icons"]["i1"]?>">
                  <i class="fa fa-trash-o"></i>
                </a>
              </td>
            </tr>
          <?php }
          } ?>
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
      echo $Html->addTag('i', '', 'fa fa-key', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i14"]));
      echo $Html->addTag('i', '', 'fa fa-edit', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php } else if ($SEARCH_WORD) { ?>

  <?php
  // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
  echo $Html->addDiv($tl["search"]["s6"] . $Html->addTag('strong', $SEARCH_WORD), '', array('class' => 'alert bg-danger text-white'));
  ?>

<?php } ?>

<?php include "footer.php"; ?>