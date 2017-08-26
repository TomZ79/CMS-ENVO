<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page3 == "s") { ?>
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
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
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
                      echo $Html->addInput('text', 'jak_title', $ENVO_FORM_DATA["title"], '', 'form-control');
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
                      echo $Html->addRadio('jak_showdate', '1', ($ENVO_FORM_DATA["showdate"] == '1') ? TRUE : FALSE, 'jak_showdate1');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('jak_showdate1', $tl["checkbox"]["chk"]);

                      // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                      echo $Html->addRadio('jak_showdate', '0', ($ENVO_FORM_DATA["showdate"] == '0') ? TRUE : FALSE, 'jak_showdate2');
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('jak_showdate2', $tl["checkbox"]["chk1"]);
                      ?>

                    </div>
                  </div>
                </div>
                <div class="row-form">
                  <div class="col-md-5">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('strong', $tlnl["newsletter_box_content"]["nlbc23"]);
                    ?>

                  </div>
                  <div class="col-md-7">

                    <?php
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor((JAK_USE_APACHE ? substr(BASE_URL_ORIG, 0, -1) : BASE_URL_ORIG) . html_entity_decode(JAK_rewrite::jakParseurl($rowc['varname'], 'fv', $ENVO_FORM_DATA['id'], $ENVO_FORM_DATA['fullview'], '')), $tlnl["newsletter_box_content"]["nlbc24"]);
                    ?>

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
                  echo $Html->addTextarea('jak_content', $ENVO_FORM_DATA["content"], '40', '', array('id' => 'nlpost', 'class' => 'form-control jakEditorF'));
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