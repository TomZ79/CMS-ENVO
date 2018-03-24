<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: Checking of some page was successful
// CZ: Kontrola některé stránky byla úspěšná
if ($page3 == "s") { ?>
  <script>
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
// EN: Errors
// CZ: Výpis chyb při zpracování
if ($errors) { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"];
          if (isset($errors["e4"])) echo $errors["e4"];?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
    <!-- Fixed Button for save form -->
    <div class="savebutton hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', $tl["button"]["btn26"] . ' !! ', '', 'btn btn-primary button', array('data-loading-text' => $tl["button"]["btn41"]));
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=newsletter', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <div class="row tab-content-singel">
      <div class="row">
        <div class="col-sm-6">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
              echo $Html->startTag('h3', array('class' => 'box-title'));
              echo $tlnl["newsletter_box_title"]["nlbt7"];
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tlnl["newsletter_help"]["nlh1"], 'data-original-title' => $tlnl["newsletter_help"]["nlh"]));
              // Add Html Element -> endTag (Arguments: tag)
              echo $Html->endTag('h3');
              ?>

            </div>
            <div class="box-body">
              <table class="table table-striped">
                <tr>
                  <td>
                    <select name="envo_nlgroup[]" multiple="multiple" class="form-control">

                      <?php
                      // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
                      $selected = ((isset($_REQUEST["envo_nlgroup"]) && ($_REQUEST["envo_nlgroup"] == '0' || (in_array('0', $_REQUEST["envo_nlgroup"]))) || !isset($_REQUEST["envo_nlgroup"]))) ? TRUE : FALSE;

                      echo $Html->addOption('0', $tlnl["newsletter_box_content"]["nlbc25"], $selected);
                      if (isset($ENVO_USERGROUP_ALL) && is_array($ENVO_USERGROUP_ALL)) foreach ($ENVO_USERGROUP_ALL as $v) {

                        if (isset($_REQUEST["envo_nlgroup"]) && (in_array($v["id"], $_REQUEST["envo_nlgroup"]))) {
                          if (isset($_REQUEST["envo_nlgroup"]) && (in_array('0', $_REQUEST["envo_nlgroup"]))) {
                            $selected = FALSE;
                          } else {
                            $selected = TRUE;
                          }
                        } else {
                          $selected = FALSE;
                        }

                        // Get count of user in usegroups newsletter
                        $ENVO_COUNTUSER_ALL = envo_get_count_user_in_group('newsletteruser', $v["id"]);

                        echo $Html->addOption($v["id"], $v["name"] . ' ( ' . $ENVO_COUNTUSER_ALL . ' ) ', $selected);

                      }
                      ?>

                    </select>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
              echo $Html->startTag('h3', array('class' => 'box-title'));
              echo $tlnl["newsletter_box_title"]["nlbt8"];
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tlnl["newsletter_help"]["nlh1"], 'data-original-title' => $tlnl["newsletter_help"]["nlh"]));
              // Add Html Element -> endTag (Arguments: tag)
              echo $Html->endTag('h3');
              ?>

            </div>
            <div class="box-body">
              <table class="table table-striped">
                <tr>
                  <td>
                    <select name="envo_cmsgroup[]" multiple="multiple" class="form-control">

                      <?php
                      // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
                      $selected = ((isset($_REQUEST["envo_cmsgroup"]) && ($_REQUEST["envo_cmsgroup"] == '0' || (in_array('0', $_REQUEST["envo_cmsgroup"]))) || !isset($_REQUEST["envo_cmsgroup"]))) ? TRUE : FALSE;

                      echo $Html->addOption('0', $tlnl["newsletter_box_content"]["nlbc25"], $selected);
                      if (isset($ENVO_USERGROUP_CMS) && is_array($ENVO_USERGROUP_CMS)) foreach ($ENVO_USERGROUP_CMS as $c) {

                        if (isset($_REQUEST["envo_cmsgroup"]) && (in_array($c["id"], $_REQUEST["envo_cmsgroup"]))) {
                          if (isset($_REQUEST["envo_cmsgroup"]) && (in_array('0', $_REQUEST["envo_cmsgroup"]))) {
                            $selected = FALSE;
                          } else {
                            $selected = TRUE;
                          }
                        } else {
                          $selected = FALSE;
                        }

                        // Get count of user in usegroups main cms
                        $ENVO_COUNTUSER_CMS = envo_get_count_user_in_group('user', $c["id"]);

                        echo $Html->addOption($c["id"], $c["name"] . ' ( ' . $ENVO_COUNTUSER_CMS . ' ) ' . $ENVO_COUNTUSER_CMS1, $selected);

                      }
                      ?>

                    </select>
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tlnl["newsletter_box_title"]["nlbt9"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <table class="table table-striped">
                <tr>
                  <td><?php echo $tlnl["newsletter_box_content"]["nlbc26"]; ?></td>
                  <td>
                    <div class="checkbox-singel check-success">

                      <?php
                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addCheckbox('envo_send', '1', FALSE, 'envo_send');
                      echo $Html->addLabel('envo_send', '');
                      ?>

                    </div>
                  </td>
                </tr>
              </table>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSendMail', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn26"], 'btnSenMail', 'btn btn-primary pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>

  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>