<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: Checking of some page was unsuccessful
// CZ: Kontrola některé stránky byla neúspěšná
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

<?php
// EN: Errors
// CZ: Výpis chyb při zpracování
if ($errors) { ?>
  <script type="text/javascript">
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
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=download&sp=categories', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <div class="row tab-content-singel">
      <div class="col-md-8">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tld["downl_box_title"]["downlbt5"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc42"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-md-7">
                    <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'jak_name', (isset($_REQUEST["jak_name"])) ? $_REQUEST["jak_name"] : '', 'jak_name', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc43"]);
                    echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tld["downl_help"]["downlh2"], 'data-original-title' => $tld["downl_help"]["downlh"]));
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-md-7">
                    <div class="form-group no-margin<?php if (isset($errors["e2"]) || isset($errors["e3"]) || isset($errors["e4"])) echo " has-error"; ?>">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'jak_varname', (isset($_REQUEST["jak_varname"])) ? $_REQUEST["jak_varname"] : '', 'jak_varname', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc44"]);
                    ?>

                  </div>
                  <div class="col-md-7">

                    <?php
                    // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                    echo $Html->addTextarea('jak_lcontent', (isset($_REQUEST["jak_lcontent"])) ? envo_edit_safe_userpost($_REQUEST["jak_lcontent"]) : '', '4', '', array('id' => 'content', 'class' => 'form-control'));
                    ?>

                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc45"]);
                    ?>

                  </div>
                  <div class="col-md-7">
                    <div class="radio radio-success">

                      <?php
                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addRadio('jak_active', '1', ((isset($_REQUEST["jak_active"]) && $_REQUEST["jak_active"] == '1') || !isset($_REQUEST["jak_active"])) ? TRUE : FALSE, 'jak_active1');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('jak_active1', $tl["checkbox"]["chk"]);

                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addRadio('jak_active', '0', ((isset($_REQUEST["jak_active"]) && $_REQUEST["jak_active"] == '0')) ? TRUE : FALSE, 'jak_active2');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('jak_active2', $tl["checkbox"]["chk1"]);
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tld["downl_box_content"]["downlbc46"]);
                    ?>

                  </div>
                  <div class="col-md-7">
                    <div class="input-group">
                      <span class="input-group-btn">
                        <button class="btn btn-default iconpicker" data-placement="top"></button>
                      </span>

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'jak_img', $_REQUEST["jak_img"], 'jak_img', 'form-control text-center');
                      ?>

                      <span class="input-group-btn">
                        <button class="btn btn-default iconpicker1" data-placement="top"></button>
                      </span>
                    </div>
                  </div>
                </div>

              </div>
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
      <div class="col-md-4">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
            echo $Html->startTag('h3', array('class' => 'box-title'));
            echo $tld["downl_box_title"]["downlbt8"];
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tld["downl_help"]["downlh1"], 'data-original-title' => $tld["downl_help"]["downlh"]));
            // Add Html Element -> endTag (Arguments: tag)
            echo $Html->endTag('h3');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-12">
                    <select name="jak_permission[]" multiple="multiple" class="form-control">

                      <?php
                      // Add Html Element -> addInput (Arguments: value, text, selected, id, class, optional assoc. array)
                      $selected = ((isset($_REQUEST["jak_permission"]) && ($_REQUEST["jak_permission"] == '0' || (in_array('0', $_REQUEST["jak_permission"]))) || !isset($_REQUEST["jak_permission"]))) ? TRUE : FALSE;

                      echo $Html->addOption('0', $tlblog["blog_box_content"]["blogbc24"], $selected);
                      if (isset($JAK_USERGROUP) && is_array($JAK_USERGROUP)) foreach ($JAK_USERGROUP as $v) {

                        if (isset($_REQUEST["jak_permission"]) && (in_array($v["id"], $_REQUEST["jak_permission"]))) {
                          if (isset($_REQUEST["jak_permission"]) && (in_array('0', $_REQUEST["jak_permission"]))) {
                            $selected = FALSE;
                          } else {
                            $selected = TRUE;
                          }
                        } else {
                          $selected = FALSE;
                        }

                        echo $Html->addOption($v["id"], $v["name"], $selected);

                      }
                      ?>

                    </select>
                  </div>
                </div>
              </div>
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