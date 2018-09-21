<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page2 == "s") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["notification"]["n7"]?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page2 == "e") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["general_error"]["generror1"]?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton-small hidden-xs">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
      ?>

    </div>

    <!-- Form Content -->
    <ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
      <li class="nav-item">
        <a href="#cmsPage1" class="active" data-toggle="tab">
          <span class="text"><?= $tltt["tt_section_tab"]["tttab"] ?></span>
        </a>
      </li>
      <li class="nav-item next">
        <a href="#cmsPage2" class="" data-toggle="tab">
          <span class="text"><?= $tltt["tt_section_tab"]["tttab1"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage3" class="" data-toggle="tab">
          <span class="text"><?= $tltt["tt_section_tab"]["tttab2"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage4" class="" data-toggle="tab">
          <span class="text"><?= $tltt["tt_section_tab"]["tttab3"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage5" class="" data-toggle="tab">
          <span class="text"><?= $tltt["tt_section_tab"]["tttab4"] ?></span>
        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage6" class="" data-toggle="tab">
          <span class="text"><?= $tltt["tt_section_tab"]["tttab5"] ?></span>
        </a>
      </li>
      <li class='nav-item dropdown collapsed-menu hidden'>
        <a class="dropdown-toggle" data-toggle='dropdown' href='#' role='button' aria-haspopup="true" aria-expanded="false">
          ... <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right collapsed-tabs" aria-labelledby="dropdownMenuButton">
        </div>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
        <div class="row">

        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage2" role="tabpanel">
        <div class="row">
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tltt["tt_box_title"]["ttbt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tltt["tt_box_content"]["ttbc"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_title', $ENVO_SETTING_VAL["tvtowertitle"], '', 'form-control');
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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage3" role="tabpanel">
        <div class="row">
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tltt["tt_box_title"]["ttbt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tltt["tt_box_content"]["ttbc"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_title_wizard', $ENVO_SETTING_VAL["tvtowerwizardtitle"], '', 'form-control');
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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage4" role="tabpanel">
        <div class="row">
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tltt["tt_box_title"]["ttbt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tltt["tt_box_content"]["ttbc"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_title_list', $ENVO_SETTING_VAL["tvtowerlisttitle"], '', 'form-control');
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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage5" role="tabpanel">
        <div class="row">
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tltt["tt_box_title"]["ttbt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tltt["tt_box_content"]["ttbc"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_title_export', $ENVO_SETTING_VAL["tvtowerexporttitle"], '', 'form-control');
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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage6" role="tabpanel">
        <div class="row">
          <div class="col-sm-12">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tltt["tt_box_title"]["ttbt1"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form <?php if (!$ENVO_FILECONTENT) {
                      echo "hidden";
                    } ?>">
                      <div class="col-sm-12">

                        <?php
                        // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                        echo $Html->startTag('h4');
                        echo $tltt["tt_box_content"]["ttbc1"];
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('small', $Html->addTag('strong', $ENVO_FILEURL));
                        // Add Html Element -> endTag (Arguments: tag)
                        echo $Html->endTag('h4');
                        ?>

                      </div>
                    </div>
                    <?php if ($ENVO_FILECONTENT) { ?>
                      <div class="row-form">
                        <div class="col-sm-12">

                          <?php
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_filecontent', $tltt["tt_box_content"]["ttbc2"]);
                          // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                          echo $Html->addDiv('', 'htmleditor');
                          // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                          echo $Html->addTextarea('envo_filecontent', $ENVO_FILECONTENT, '', '', array('id' => 'envo_filecontent', 'class' => 'form-control hidden'));
                          ?>

                        </div>
                      </div>
                    <?php } ?>
                  </div>
                </div>
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
                ?>

              </div>
            </div>

            <?php
            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
            echo $Html->addInput('hidden', 'envo_file', $ENVO_FILEURL);
            ?>

          </div>
        </div>
      </div>
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>