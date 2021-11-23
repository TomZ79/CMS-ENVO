<?php include "header.php"; ?>

<?php if ($page2 == "e") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["general_error"]["generror1"]?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php }
if ($errors) { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php
          if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          ?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <div class="row">
    <div class="col-sm-12 m-b-20">
      <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">


        <div class="form-group">
          <label for="groupbase" class="m-b-10"><?= $tl["userg_box_content"]["usergbc"] ?></label>
          <div class="input-group">
            <div class="w-50">
              <select name="envo_groupbase" id="groupbase" class="form-control selectpicker">

                <?php
                // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                if (isset($ENVO_USERGROUP_ALL) && is_array($ENVO_USERGROUP_ALL)) foreach ($ENVO_USERGROUP_ALL as $z) {
                  if ($z["id"] != "1") {
                    echo $Html->addOption($z["id"], $z["name"], ($z["id"] == $_REQUEST["envo_groupbase"]) ? TRUE : FALSE);
                  }
                }
                ?>

              </select>
            </div>
            <div class="input-group-append">
              <button class="btn btn-info" name="create" type="submit"><?= $tl["button"]["btn1"] ?></button>
            </div>
          </div>

        </div>
      </form>
    </div>
  </div>

  <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    <!-- Action button block -->
    <div class="actionbtn-block d-none d-sm-block">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=usergroup', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
      <li class="nav-item">
        <a href="#cmsPage1" class="active" data-toggle="tab">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', $tl["userg_section_tab"]["usergtab"], 'text');
          ?>

        </a>
      </li>

      <?php if (isset($ENVO_HOOK_ADMIN_USERGROUP_EDIT)) { ?>
        <li class="nav-item next">
          <a href="#cmsPage2" class="" data-toggle="tab">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', $tl["userg_section_tab"]["usergtab1"], 'text');
            ?>

          </a>
        </li>
      <?php } ?>

      <li class='nav-item dropdown collapsed-menu hidden'>
        <a class="dropdown-toggle" data-toggle='dropdown' href='#' role='button' aria-haspopup="true" aria-expanded="false">
          ...

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', '', 'glyphicon glyphicon-chevron-right');
          ?>

        </a>
        <div class="dropdown-menu dropdown-menu-right collapsed-tabs" aria-labelledby="dropdownMenuButton"></div>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
        <div class="row">
          <div class="col-sm-8">
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
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["userg_box_content"]["usergbc1"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e1"]) || isset($errors["e2"])) echo " has-error"; ?>">

                          <?php
                          if (!isset($ENVO_FORM_DATA["name"]) && isset($_REQUEST["envo_name"])) {
                            $value = $_REQUEST["envo_name"];
                          } elseif (isset($ENVO_FORM_DATA["name"])) {
                            $value = $ENVO_FORM_DATA["name"];
                          }
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_name', $value, '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["userg_box_content"]["usergbc2"]);
                        ?>

                      </div>
                      <div class="col-sm-7">

                        <?php
                        // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                        echo $Html->addTextarea('envo_lcontent', envo_edit_safe_userpost($_REQUEST["envo_lcontent"]), '4', '', array('class' => 'form-control'));
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["userg_box_content"]["usergbc3"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          if (isset($ENVO_FORM_DATA["advsearch"]) && ($ENVO_FORM_DATA["advsearch"] == '1')) {
                            $checked = TRUE;
                          } elseif (isset($_REQUEST["envo_advs"]) && ($_REQUEST["envo_advs"] == '1')) {
                            $checked = TRUE;
                          } else {
                            $checked = FALSE;
                          }
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_advs', '1', $checked, 'envo_advs1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_advs1', $tl["checkbox"]["chk"]);


                          if (isset($ENVO_FORM_DATA["advsearch"]) && ($ENVO_FORM_DATA["advsearch"] == '0')) {
                            $checked = TRUE;
                          } elseif (isset($_REQUEST["envo_advs"]) && ($_REQUEST["envo_advs"] == '0')) {
                            $checked = TRUE;
                          } elseif (($ENVO_FORM_DATA["advsearch"] == '1') || ($_REQUEST["envo_advs"] == '1')) {
                            $checked = FALSE;
                          } else {
                            $checked = TRUE;
                          }
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_advs', '0', $checked, 'envo_advs2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_advs2', $tl["checkbox"]["chk1"]);
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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
                ?>

              </div>
            </div>
          </div>
          <div class="col-sm-4">

            <?php if (ENVO_TAGS) { ?>
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
                        <div class="col-sm-12">
                          <div class="radio radio-success">

                            <?php
                            if (isset($ENVO_FORM_DATA["tags"]) && ($ENVO_FORM_DATA["tags"] == '1')) {
                              $checked = TRUE;
                            } elseif (isset($_REQUEST["envo_tags"]) && ($_REQUEST["envo_tags"] == '1')) {
                              $checked = TRUE;
                            } else {
                              $checked = FALSE;
                            }
                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('envo_tags', '1', $checked, 'envo_tags1');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('envo_tags1', $tl["checkbox"]["chk"]);

                            if (isset($ENVO_FORM_DATA["tags"]) && ($ENVO_FORM_DATA["tags"] == '0')) {
                              $checked = TRUE;
                            } elseif (isset($_REQUEST["envo_tags"]) && ($_REQUEST["envo_tags"] == '0')) {
                              $checked = TRUE;
                            } elseif (($ENVO_FORM_DATA["tags"] == '1') || ($_REQUEST["envo_tags"] == '1')) {
                              $checked = FALSE;
                            } else {
                              $checked = TRUE;
                            }
                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            echo $Html->addRadio('envo_tags', '0', $checked, 'envo_tags2');
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('envo_tags2', $tl["checkbox"]["chk1"]);
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
                  echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
                  ?>

                </div>
              </div>
            <?php } ?>

          </div>
        </div>
      </div>

      <?php if (isset($ENVO_HOOK_ADMIN_USERGROUP)) { ?>
        <div class="tab-pane fade" id="cmsPage2" role="tabpanel">
          <div class="row">
            <div class="col-sm-12">

              <?php if (isset($ENVO_HOOK_ADMIN_USERGROUP) && is_array($ENVO_HOOK_ADMIN_USERGROUP)) foreach ($ENVO_HOOK_ADMIN_USERGROUP as $hs) {
                include_once APP_PATH . $hs['phpcode'];
              } ?>

            </div>
          </div>
        </div>
      <?php } ?>

    </div>
  </form>

<?php include "footer.php"; ?>