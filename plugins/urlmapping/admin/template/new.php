<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page3 == "s") { ?>
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
if ($page3 == "e") { ?>
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

<?php if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          if (isset($errors["e3"])) echo $errors["e3"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=urlmapping', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <div class="row">
      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlum["url_box_title"]["urlbt"], 'box-title');
            ?>

          </div>
          <div class="box-body boxbody-height110">
            <div class="form-group no-margin<?php if (isset($errors["e1"]) || isset($errors["e2"])) echo " has-error"; ?>">

              <?php
              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
              echo $Html->addInput('text', 'jak_oldurl', $_REQUEST["jak_oldurl"], '', 'form-control');
              ?>

            </div>
          </div>
          <div class="box-footer">

            <?php
            // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
            echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
            ?>

          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlum["url_box_title"]["urlbt1"], 'box-title');
            ?>

          </div>
          <div class="box-body boxbody-height110">
            <div class="form-group no-margin<?php if (isset($errors["e1"]) || isset($errors["e3"])) echo " has-error"; ?>">

              <?php
              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
              echo $Html->addInput('text', 'jak_newurl', $_REQUEST["jak_newurl"], '', 'form-control');
              ?>

            </div>
            <table class="table">
              <tr>
                <td style="vertical-align: middle">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', $tlum["url_box_content"]["urlbc"]);
                  ?>

                </td>
                <td>
                  <div class="radio radio-success">

                    <?php
                    // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                    echo $Html->addRadio('jak_baseurl', '1', ((isset($_REQUEST["jak_baseurl"]) && $_REQUEST["jak_baseurl"] == '1')) ? TRUE : FALSE, 'jak_baseurl1');
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addLabel('jak_baseurl1', $tl["checkbox"]["chk"]);

                    // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                    echo $Html->addRadio('jak_baseurl', '0', ((isset($_REQUEST["jak_baseurl"]) && $_REQUEST["jak_baseurl"] == '0') || !isset($_REQUEST["jak_baseurl"])) ? TRUE : FALSE, 'jak_baseurl2');
                    // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                    echo $Html->addLabel('jak_baseurl2', $tl["checkbox"]["chk1"]);
                    ?>

                  </div>
                </td>
              </tr>
            </table>
          </div>
          <div class="box-footer">

            <?php
            // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
            echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
            ?>

          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlum["url_box_title"]["urlbt2"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="form-group no-margin">
              <select name="jak_redirect" class="form-control selectpicker">

                <?php
                // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                echo $Html->addOption('301', $tlum["url_box_content"]["urlbc1"], (isset($_REQUEST["jak_redirect"]) && $_REQUEST["jak_redirect"] == '301') ? TRUE : FALSE);
                echo $Html->addOption('302', $tlum["url_box_content"]["urlbc2"], (isset($_REQUEST["jak_redirect"]) && $_REQUEST["jak_redirect"] == '302') ? TRUE : FALSE);
                ?>

              </select>
            </div>
          </div>
          <div class="box-footer">

            <?php
            // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
            echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
            ?>

          </div>
        </div>
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>