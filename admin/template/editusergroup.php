<?php include "header.php"; ?>

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
<?php }
if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];?>'
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
      echo $Html->addAnchor('index.php?p=usergroup', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <ul class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text"><?php echo $tl["userg_section_tab"]["usergtab"]; ?></span>
        </a>
      </li>
      <?php if (isset($JAK_HOOK_ADMIN_USERGROUP_EDIT)) { ?>
        <li role="presentation" class="next">
          <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
            <span class="text"><?php echo $tl["userg_section_tab"]["usergtab1"]; ?></span>
          </a>
        </li>
      <?php } ?>
    </ul>

    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="row">
          <div class="col-md-8">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["userg_box_title"]["usergbt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["userg_box_content"]["usergbc1"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'jak_name', $ENVO_FORM_DATA["name"], 'jak_name', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["userg_box_content"]["usergbc2"]);
                        ?>

                      </div>
                      <div class="col-md-7">

                        <?php
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('jak_lcontent', envo_edit_safe_userpost($ENVO_FORM_DATA["content"]), '4', '', array('class' => 'form-control'));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-md-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["userg_box_content"]["usergbc3"]);
                        ?>

                      </div>
                      <div class="col-md-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_advs', '1', ($ENVO_FORM_DATA["advsearch"] == '1') ? TRUE : FALSE, 'jak_advs1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_advs1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('jak_advs', '0', ($ENVO_FORM_DATA["advsearch"] == '0') ? TRUE : FALSE, 'jak_advs2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('jak_advs2', $tl["checkbox"]["chk1"]);
                          ?>

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
            <?php if (JAK_TAGS) { ?>
              <div class="box box-success">
                <div class="box-header with-border">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('h3', $tl["userg_box_title"]["usergbt1"], 'box-title');
                  ?>

                </div>
                <div class="box-body">
                  <div class="block">
                    <div class="block-content">
                      <div class="row-form">
                        <div class="col-md-12">
                          <div class="radio radio-success">

                            <?php
                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('jak_tags', '1', ($ENVO_FORM_DATA["tags"] == '1') ? TRUE : FALSE, 'jak_tags1');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('jak_tags1', $tl["checkbox"]["chk"]);

                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('jak_tags', '0', ($ENVO_FORM_DATA["tags"] == '0') ? TRUE : FALSE, 'jak_tags2');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('jak_tags2', $tl["checkbox"]["chk1"]);
                            ?>

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
            <?php } ?>
          </div>
        </div>
      </div>
      <?php if (isset($JAK_HOOK_ADMIN_USERGROUP_EDIT)) { ?>
        <div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
          <div class="row">
            <div class="col-md-12">
              <?php if (isset($JAK_HOOK_ADMIN_USERGROUP_EDIT) && is_array($JAK_HOOK_ADMIN_USERGROUP_EDIT)) foreach ($JAK_HOOK_ADMIN_USERGROUP_EDIT as $hs) {
                include_once APP_PATH . $hs['phpcode'];
              } ?>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
  </form>

<?php include "footer.php"; ?>