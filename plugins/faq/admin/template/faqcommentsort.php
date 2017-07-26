<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: Checking of some page was successful
// CZ: Kontrola některé stránky byla úspěšná
if ($page5 == "s") { ?>
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
    <div class="box">
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
            <th><?php echo $tlf["faq_box_table"]["faqtb5"]; ?></th>
            <th><?php echo $tlf["faq_box_table"]["faqtb6"]; ?></th>
            <th><?php echo $tlf["faq_box_table"]["faqtb7"]; ?></th>
            <th>

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('approve', '<i class="fa fa-lock"></i>', 'button_lock', 'btn btn-default btn-xs');
              ?>

            </th>
            <th>

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tlf["faq_notification"]["codelall"]));
              ?>

            </th>
          </tr>
          </thead>
          <?php if (isset($JAK_FAQCOM_SORT) && is_array($JAK_FAQCOM_SORT)) foreach ($JAK_FAQCOM_SORT as $v) { ?>
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
              <td><?php echo envo_clean_comment($v["message"]); ?></td>
              <td>

                <?php if (isset($JAK_FAQ_ALL) && is_array($JAK_FAQ_ALL)) foreach ($JAK_FAQ_ALL as $z) {
                  if ($v["fileid"] == $z["id"]) {
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('index.php?p=faq&amp;sp=comment&amp;ssp=sort&amp;sssp=faq&amp;ssssp=' . $z["id"], $z["title"]);
                  }
                } ?>

              </td>
              <td>

                <?php if ($v["userid"] == '0') {
                  echo $tlf["faq_box_content"]["faqbc36"];
                } else {

                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=faq&amp;sp=comment&amp;ssp=sort&amp;sssp=user&amp;ssssp=' . $v["userid"], $v["username"]);
                } ?>

              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=faq&amp;sp=comment&amp;ssp=approve&amp;sssp=' . $v["id"], '<i class="fa fa-' . (($v["approve"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'title' => ($v["approve"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));
                ?>

              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=faq&amp;sp=comment&amp;ssp=delete&amp;sssp=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-default btn-xs', array('data-confirm' => $tlf["faq_notification"]["codel"], 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
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
      echo $Html->addTag('i', '', 'fa fa-check', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i6"]));
      echo $Html->addTag('i', '', 'fa fa-lock', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i5"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php if ($JAK_PAGINATE_SORT) echo $JAK_PAGINATE_SORT; ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>