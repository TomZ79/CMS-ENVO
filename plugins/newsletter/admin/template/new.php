<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
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
// EN: Checking the saved elements in the page was not successful
// CZ: Kontrola ukládaných prvků ve stránce nebyla úšpěšná
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
      echo $Html->addAnchor('index.php?p=newsletter', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <ul class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
      <li role="presentation" class="active">
        <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
          <span class="text"><?php echo $tlnl["newsletter_section_tab"]["nltab"]; ?></span>
        </a>
      </li>
      <li role="presentation" class="next">
        <a href="#cmsPage2" role="tab" id="cmsPage2-tab" data-toggle="tab" aria-controls="cmsPage2">
          <span class="text"><?php echo $tlnl["newsletter_section_tab"]["nltab1"]; ?></span>
        </a>
      </li>
    </ul>

    <div class="tab-content">
      <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlnl["newsletter_box_title"]["nlbt4"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc21"]);
                    echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                    ?>

                  </div>
                  <div class="col-md-7">
                    <div class="form-group<?php if (isset($errors["e1"])) echo " has-error"; ?> no-margin">

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'envo_title', $_REQUEST["envo_title"], '', 'form-control');
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc22"]);
                    ?>

                  </div>
                  <div class="col-md-7">
                    <div class="radio radio-success">

                      <?php
                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addRadio('envo_showdate', '1', ((isset($_REQUEST["envo_showdate"]) && $_REQUEST["envo_showdate"] == '1') || !isset($_REQUEST["envo_showdate"])) ? TRUE : FALSE, 'envo_showdate1');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('envo_showdate1', $tl["checkbox"]["chk"]);

                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addRadio('envo_showdate', '0', ((isset($_REQUEST["envo_showdate"]) && $_REQUEST["envo_showdate"] == '0')) ? TRUE : FALSE, 'envo_showdate2');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('envo_showdate2', $tl["checkbox"]["chk1"]);
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
        <div class="box box-success">
          <div class="box-header with-border">

            <h3 class="box-title"><?php echo $tlnl["newsletter_box_title"]["nlbt6"]; ?>

              <div id="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
                <div class="bounce4"></div>
                <div class="bounce5"></div>
              </div>

            </h3>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-md-12">
                    <div class="row">
                      <?php if (isset($theme_files) && is_array($theme_files)) foreach ($theme_files as $l) { ?>
                        <div class="col-sm-4 col-md-2">
                          <div class="thumbnail" style="text-align: center;">
                            <a class="nlprev" href="../plugins/newsletter/skins/<?php echo $l; ?>/full_width.html"><img
                                src="../plugins/newsletter/skins/<?php echo $l; ?>/preview.jpg" alt="<?php echo $l; ?>"
                                width="100" height="100"/></a>
                            <div class="caption">
                              <img class="nlTheme" id="skins/<?php echo $l; ?>/left_sidebar.html"
                                src="../plugins/newsletter/admin/img/preview_theme_left.png" alt="left" width="29"
                                height="31" style="border: none;margin-right: 2px;cursor: pointer;"/>
                              <img class="nlTheme" id="skins/<?php echo $l; ?>/full_width.html"
                                src="../plugins/newsletter/admin/img/preview_theme_center.png" alt="center" width="29"
                                height="31" style="border: none;margin-right: 2px;cursor: pointer;"/>
                              <img class="nlTheme" id="skins/<?php echo $l; ?>/right_sidebar.html"
                                src="../plugins/newsletter/admin/img/preview_theme_right.png" alt="right" width="29"
                                height="31" style="border: none;cursor: pointer;"/>
                            </div>
                          </div>
                        </div>
                      <?php } ?>
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
      <div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlnl["newsletter_box_title"]["nlbt5"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <table class="table table-striped">
              <tr>
                <td>
                  <div id="cover">
                    <div class="m-b-10">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc27"]);
                      ?>

                    </div>
                    <div class="cover-header">

                      <?php
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('javascript:;', '<span class="label label-warning">{myweburl}</span>', '', 'short-sc m-r-5', array('data-short-scf' => 'details', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'top', 'title' => $tlnl["newsletter_eltitle"]["nlelt"]));
                      echo $Html->addAnchor('javascript:;', '<span class="label label-warning">{mywebname}</span>', '', 'short-sc m-r-5', array('data-short-scf' => 'details', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'top', 'title' => $tlnl["newsletter_eltitle"]["nlelt1"]));
                      echo $Html->addAnchor('javascript:;', '<span class="label label-info">{username}</span>', '', 'short-sc m-r-5', array('data-short-scf' => 'details', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'top', 'title' => $tlnl["newsletter_eltitle"]["nlelt4"]));
                      echo $Html->addAnchor('javascript:;', '<span class="label label-info">{fullname}</span>', '', 'short-sc m-r-5', array('data-short-scf' => 'details', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'top', 'title' => $tlnl["newsletter_eltitle"]["nlelt5"]));
                      echo $Html->addAnchor('javascript:;', '<span class="label label-info">{useremail}</span>', '', 'short-sc m-r-5', array('data-short-scf' => 'details', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'top', 'title' => $tlnl["newsletter_eltitle"]["nlelt6"]));
                      echo $Html->addAnchor('javascript:;', '<span class="label label-primary">{browserversion}</span>', '', 'short-sc m-r-5', array('data-short-scf' => 'details', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'top', 'title' => $tlnl["newsletter_eltitle"]["nlelt2"]));
                      echo $Html->addAnchor('javascript:;', '<span class="label label-primary">{unsubscribe}</span>', '', 'short-sc m-r-5', array('data-short-scf' => 'details', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'top', 'title' => $tlnl["newsletter_eltitle"]["nlelt3"]));
                      ?>

                    </div>
                  </div>

                  <?php
                  // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                  echo $Html->addTextarea('envo_content', $_REQUEST["envo_content"], '40', '', array('id' => 'nlpost', 'class' => 'form-control envoEditorF'));
                  ?>

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
    </div>
  </form>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>