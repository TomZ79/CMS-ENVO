<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page5 == "s") { ?>
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
if ($page5 == "e") { ?>
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

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-success">
      <div class="box-body no-padding">
        <table class="table table-striped table-hover">
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
            <th><?php echo $tld["downl_box_table"]["downltb7"]; ?></th>
            <th><?php echo $tld["downl_box_table"]["downltb8"]; ?></th>
            <th><?php echo $tld["downl_box_table"]["downltb9"]; ?></th>
            <th>

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('approve', '<i class="fa fa-lock"></i>', 'button_lock', 'btn btn-default btn-xs');
              ?>

            </th>
            <th>

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tld["downl_notification"]["codelall"]));
              ?>

            </th>
          </tr>
          </thead>
          <?php if (isset($JAK_DOWNLOADCOM_SORT) && is_array($JAK_DOWNLOADCOM_SORT)) foreach ($JAK_DOWNLOADCOM_SORT as $v) { ?>
            <tr>
              <td><?php echo $v["id"]; ?></td>
              <td>
                <div class="checkbox-singel check-success">

                  <?php
                  // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addCheckbox('jak_delete_comment[]', $v["id"], FALSE, 'jak_delete_comment' . $v["id"], 'highlight');
                  echo $Html->addLabel('jak_delete_comment' . $v["id"], '');
                  ?>

                </div>
              </td>
              <td><?php echo jak_clean_comment($v["message"]); ?></td>
              <td>

                <?php if (isset($JAK_DOWNLOAD_ALL) && is_array($JAK_DOWNLOAD_ALL)) foreach ($JAK_DOWNLOAD_ALL as $z) {
                  if ($v["fileid"] == $z["id"]) {
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('index.php?p=download&amp;sp=comment&amp;ssp=sort&amp;sssp=download&amp;ssssp=' . $z["id"], $z["title"]);
                  }
                } ?>

              </td>
              <td>

                <?php if ($v["userid"] == '0') {
                  echo $tld["downl_box_content"]["downlbc47"];
                } else {

                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=download&amp;sp=comment&amp;ssp=sort&amp;sssp=user&amp;ssssp=' . $v["userid"], $v["username"]);
                } ?>

              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=download&amp;sp=comment&amp;ssp=approve&amp;sssp=' . $v["id"], '<i class="fa fa-' . (($v["approve"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => ($v["approve"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));
                ?>

              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=download&amp;sp=comment&amp;ssp=delete&amp;sssp=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-default btn-xs', array('data-confirm' => $tld["downl_notification"]["codel"], 'data-toggle' => 'tooltip', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"]));
                ?>

              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </form>

  <div class="col-md-12">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-check', array('title' => $tl["icons"]["i6"]));
      echo $Html->addTag('i', '', 'fa fa-lock', array('title' => $tl["icons"]["i5"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php if ($JAK_PAGINATE_SORT) echo $JAK_PAGINATE_SORT; ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>