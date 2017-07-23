<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: Checking of some page was successful
// CZ: Kontrola některé stránky byla úspěšná
if ($page4 == "s") { ?>
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

<?php
// EN: Checking of some page was unsuccessful
// CZ: Kontrola některé stránky byla neúspěšná
if ($page4 == "e") { ?>
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

<?php if (isset($JAK_TRASH_ALL) && is_array($JAK_TRASH_ALL)) { ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-success">
      <div class="box-body no-padding">
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
            <th><?php echo $tlblog["blog_box_table"]["blogtb6"]; ?></th>
            <th><?php echo $tlblog["blog_box_table"]["blogtb7"]; ?></th>
            <th>

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('untrash', '<i class="fa fa-thumbs-up"></i>', 'button_lock', 'btn btn-default btn-xs', array('onclick' => 'if(!confirm(\'' . $tlblog["blog_notification"]["untrash"] . '\'))return false;'));
              ?>

            </th>
            <th>

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tlblog["blog_notification"]["codelall"]));
              ?>

            </th>
          </tr>
          </thead>
          <?php foreach ($JAK_TRASH_ALL as $v) { ?>
            <tr>
              <td><?php echo $v["id"]; ?></td>
              <td>
                <div class="checkbox-singel check-success">

                  <?php
                  // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addCheckbox('jak_delete_trash[]', $v["id"], FALSE, 'jak_delete_trash' . $v["id"], 'highlight');
                  echo $Html->addLabel('jak_delete_trash' . $v["id"], '');
                  ?>

                </div>
              </td>
              <td><?php echo envo_clean_comment($v["message"]); ?></td>
              <td>

                <?php if ($v["userid"] == '0') {
                  echo $tlblog["blog_box_content"]["blogbc40"];
                } else {
                  if ($page1 != 'user') {

                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('index.php?p=user&amp;sp=edit&amp;ssp=' . $v["userid"], $v["username"]);

                  } else {
                    echo $v["username"];
                  }
                } ?>
              </td>
              <td></td>
              <td></td>
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

  <?php if ($JAK_PAGINATE) {
    echo $JAK_PAGINATE;
  } ?>

<?php } else { ?>

  <div class="col-md-12">

    <?php
    // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
    echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
    ?>

  </div>

<?php } ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>