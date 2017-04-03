<?php include "header.php"; ?>

<?php if ($errors) { ?>
  <script type="text/javascript">
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
    <div class="col-md-6">
      <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
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

<?php if ($JAK_SEARCH) { ?>

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
                echo $Html->addCheckbox('', '', false, 'jak_delete_all');
                echo $Html->addLabel('jak_delete_all', '');
                ?>

              </div>
            </th>
            <th><?php echo $tl["page_box_table"]["pagetb"]; ?></th>
            <th><?php echo $tl["page_box_table"]["pagetb5"]; ?></th>
            <th><?php echo $tl["page_box_table"]["pagetb1"]; ?></th>
            <th><?php echo $tl["page_box_table"]["pagetb2"]; ?></th>
            <th><?php echo $tl["page_box_table"]["pagetb3"]; ?></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <?php if ($JAK_SEARCH) { ?><?php if (isset($JAK_SEARCH) && is_array($JAK_SEARCH)) foreach ($JAK_SEARCH as $v) { ?>
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
                <a href="index.php?p=page&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["title"]; ?></a>
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
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=page&amp;sp=lock&amp;ssp=' . $v["id"], '<i class="fa fa-' . (($v["active"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => ($v["active"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));
                ?>

              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=page&amp;sp=edit&amp;ssp=' . $v["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"]));
                ?>

              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=page&amp;sp=delete&amp;ssp=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-default btn-xs', array('data-confirm' => sprintf($tl["page_notification"]["del"], $v["title"]), 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
                ?>

              </td>
            </tr>
          <?php }
          } ?>
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
      echo $Html->addTag('i', '', 'fa fa-check', array('title' => $tl["icons"]["i6"]));
      echo $Html->addTag('i', '', 'fa fa-lock', array('title' => $tl["icons"]["i5"]));
      echo $Html->addTag('i', '', 'fa fa-edit', array('title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('title' => $tl["icons"]["i1"]));
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