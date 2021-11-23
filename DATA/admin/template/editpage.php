<?php include "header.php"; ?>

<?php if ($page3 == "s") { ?>
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
<?php }
if ($page3 == "e") { ?>
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

  <form class="inline-form" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
    <!-- Action button block -->
    <div class="actionbtn-block d-none d-sm-block">

      <?php
      // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
      echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button');
      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
      echo $Html->addAnchor('index.php?p=page', $tl["button"]["btn19"], '', 'btn btn-info button');
      ?>

    </div>

    <!-- Form Content -->
    <ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
      <li class="nav-item">
        <a href="#cmsPage1" class="active" data-toggle="tab">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', $tl["page_section_tab"]["pagetab"], 'text');
          ?>

        </a>
      </li>
      <li class="nav-item next">
        <a href="#cmsPage2" class="" data-toggle="tab">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', $tl["page_section_tab"]["pagetab1"], 'text');
          ?>

        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage3" class="" data-toggle="tab">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', $tl["page_section_tab"]["pagetab2"], 'text');
          ?>

        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage4" class="" data-toggle="tab">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', $tl["page_section_tab"]["pagetab3"], 'text');
          ?>

        </a>
      </li>
      <li class="nav-item">
        <a href="#cmsPage5" class="" data-toggle="tab">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', $tl["page_section_tab"]["pagetab4"], 'text');
          ?>

        </a>
      </li>
      <li class='nav-item dropdown collapsed-menu hidden'>
        <a class="dropdown-toggle" data-toggle='dropdown' href='#' role='button' aria-haspopup="true"
            aria-expanded="false">
          ...

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('span', '', 'glyphicon glyphicon-chevron-right');
          ?>

        </a>
        <div class="dropdown-menu dropdown-menu-right collapsed-tabs" aria-labelledby="dropdownMenuButton">
        </div>
      </li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
        <div class="row">
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["page_box_title"]["pagebt"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc3"]);
                        echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_title', $ENVO_FORM_DATA["title"], '', 'form-control');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc4"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showtitle', '1', ($ENVO_FORM_DATA["showtitle"] == '1') ? TRUE : FALSE, 'envo_showtitle1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showtitle1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showtitle', '0', ($ENVO_FORM_DATA["showtitle"] == '0') ? TRUE : FALSE, 'envo_showtitle2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showtitle2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc5"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_shownav', '1', ($ENVO_FORM_DATA["shownav"] == '1') ? TRUE : FALSE, 'envo_shownav1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_shownav1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_shownav', '0', ($ENVO_FORM_DATA["shownav"] == '0') ? TRUE : FALSE, 'envo_shownav2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_shownav2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc6"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showfooter', '1', ($ENVO_FORM_DATA["showfooter"] == '1') ? TRUE : FALSE, 'envo_showfooter1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showfooter1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showfooter', '0', ($ENVO_FORM_DATA["showfooter"] == '0') ? TRUE : FALSE, 'envo_showfooter2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showfooter2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc7"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showdate', '1', ($ENVO_FORM_DATA["showdate"] == '1') ? TRUE : FALSE, 'envo_showdate1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showdate1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showdate', '0', ($ENVO_FORM_DATA["showdate"] == '0') ? TRUE : FALSE, 'envo_showdate2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showdate2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["news_box_content"]["newsbc14"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showhits', '1', ($ENVO_FORM_DATA["showhits"] == '1') ? TRUE : FALSE, 'envo_showhits1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showhits1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showhits', '0', ($ENVO_FORM_DATA["showhits"] == '0') ? TRUE : FALSE, 'envo_showhits2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showhits2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc11"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_social', '1', ($ENVO_FORM_DATA["socialbutton"] == '1') ? TRUE : FALSE, 'envo_social1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_social1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_social', '0', ($ENVO_FORM_DATA["socialbutton"] == '0') ? TRUE : FALSE, 'envo_social2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_social2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form" style="position: relative;">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc13"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showtags', '1', ($ENVO_FORM_DATA["showtags"] == '1') ? TRUE : FALSE, 'envo_showtags1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showtags1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_showtags', '0', ($ENVO_FORM_DATA["showtags"] == '0') ? TRUE : FALSE, 'envo_showtags2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_showtags2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>

                      <?php if (!ENVO_TAGS) { ?>
                        <div id="showtag" class="unrow active">
                          <div>
                            <strong>Aktivujte plugin TAGs</strong>
                          </div>
                        </div>
                      <?php } ?>

                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', 'Zobrazit sloupce');
                        echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => 'Zobrazí hlavní obsah stránky ve sloupcích <strong>col</strong>.<br>Pro zobrazení postranního panelu je nutné mít tuto položku zapnutou.<br> Nefunguje na <strong>Úvodní stránce</strong> a v <strong>Pluginech</strong>.', 'data-original-title' => $tl["page_help"]["pageh"]));
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_sidebar_show', '1', ($ENVO_FORM_DATA["sidebarshow"] == '1') ? TRUE : FALSE, 'envo_sidebar_show1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_sidebar_show1', $tl["checkbox"]["chk"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_sidebar_show', '0', ($ENVO_FORM_DATA["sidebarshow"] == '0') ? TRUE : FALSE, 'envo_sidebar_show2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_sidebar_show2', $tl["checkbox"]["chk1"]);
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form" style="position: relative;">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc8"]);
                        echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => 'Přepínaní pozice sloupců <strong>col</strong>.<br>Funguje pouze v případě zapnutého &quot;Zobrazení sloupce&quot;', 'data-original-title' => $tl["page_help"]["pageh"]));
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="radio radio-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_sidebar', '1', ($ENVO_FORM_DATA["sidebar"] == '1') ? TRUE : FALSE, 'envo_sidebar1');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_sidebar1', $tl["checkbox"]["chk2"]);

                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          echo $Html->addRadio('envo_sidebar', '0', ($ENVO_FORM_DATA["sidebar"] == '0') ? TRUE : FALSE, 'envo_sidebar2');
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addLabel('envo_sidebar2', $tl["checkbox"]["chk3"]);
                          ?>

                        </div>
                      </div>
                      <div id="colposition" class="unrow <?= ($ENVO_FORM_DATA["sidebarshow"] == '0') ? 'active' : 'notactive' ?>">
                        <div>
                          <strong>Aktivujte Zobrazeni Sloupců</strong>
                        </div>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc15"]);
                        echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tl["page_help"]["pageh1"], 'data-original-title' => $tl["page_help"]["pageh"]));
                        ?>

                      </div>
                      <div class="col-sm-7">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_password', '', '', 'form-control', array('placeholder' => ($ENVO_FORM_DATA["password"] ? 'Stránka obsahuje heslo' : '')));
                        ?>

                      </div>
                    </div>

                    <?php if ($ENVO_FORM_DATA["password"]) { ?>
                      <div class="row-form p-t-10 p-b-10">
                        <div class="col-sm-5">

                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', $tl["page_box_content"]["pagebc16"]);
                          ?>

                        </div>
                        <div class="col-sm-7">
                          <div class="checkbox-singel check-success">

                            <?php
                            // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addCheckbox('envo_delete_password', '', FALSE, 'envo_delete_password');
                            echo $Html->addLabel('envo_delete_password', '');
                            ?>

                          </div>
                        </div>
                      </div>
                    <?php } ?>

                    <div class="row-form p-t-10 p-b-10">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc18"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="checkbox-singel check-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addCheckbox('envo_delete_hits', '', FALSE, 'envo_delete_hits');
                          echo $Html->addLabel('envo_delete_hits', '');
                          ?>

                        </div>
                      </div>
                    </div>
                    <div class="row-form p-t-10 p-b-10">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["page_box_content"]["pagebc19"]);
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <div class="checkbox-singel check-success">

                          <?php
                          // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                          // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                          echo $Html->addCheckbox('envo_update_time', '', FALSE, 'envo_update_time');
                          echo $Html->addLabel('envo_update_time', '');
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
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["page_box_title"]["pagebt1"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-12">
                        <select name="envo_catid" class="form-control selectpicker">

                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('0', $tl["page_box_content"]["pagebc"], ($ENVO_FORM_DATA["catid"] == '0') ? TRUE : FALSE);

                          if (isset($ENVO_CAT_NOTUSED) && is_array($ENVO_CAT_NOTUSED)) foreach ($ENVO_CAT_NOTUSED as $v) {
                            echo $Html->addOption($v["id"], $v["name"], ($v["id"] == $ENVO_FORM_DATA["catid"]) ? TRUE : FALSE);
                          }

                          if (isset($ENVO_CAT) && is_array($ENVO_CAT)) foreach ($ENVO_CAT as $z) {
                            if ($z["id"] == $ENVO_FORM_DATA["catid"]) {
                              echo $Html->addOption($z["id"], $z["name"], TRUE);
                            }
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
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
                ?>

              </div>
            </div>

            <div class="box box-success" style="position: relative;">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["page_box_title"]["pagebt2"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', 'Choose tags from predefined list');
                        ?>

                      </div>
                      <div class="col-sm-7">
                        <select name="" id="selecttags1" class="form-control selectpicker">
                          <optgroup label="Poskytovatelé TV">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('skylink', 'Skylink');
                            echo $Html->addOption('freesat', 'freeSAT');
                            echo $Html->addOption('digi-tv', 'Digi TV');
                            ?>

                          </optgroup>
                          <optgroup label="Vysílací technologie">

                            <?php
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption('dvb-t/t2', 'DVB-T/T2');
                            echo $Html->addOption('dvb-s/s2', 'DVB-S/S2');
                            echo $Html->addOption('dvb-c', 'DVB-C');
                            echo $Html->addOption('dvb-h', 'DVB-H');
                            ?>

                          </optgroup>
                        </select>
                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-5">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', 'Choose tags from list');
                        ?>

                      </div>
                      <div class="col-sm-7">

                        <?php
                        $ENVO_TAG_ALL = envo_tag_name_admin();
                        if ($ENVO_TAG_ALL) {

                          echo '<select name="" id="selecttags2" class="form-control selectpicker">';
                          foreach ($ENVO_TAG_ALL as $v) {

                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption($v["tag"], $v["tag"]);

                          }
                          echo '</select>';

                        } else {
                          echo '<div>Tags cloud is empty!</div>';
                        }
                        ?>

                      </div>
                    </div>
                    <div class="row-form">
                      <div class="col-sm-12">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_tags', '', '', 'form-control tags', array('data-role' => 'tagsinput'));
                        ?>

                      </div>
                    </div>

                    <?php if ($ENVO_TAGLIST) { ?>
                      <div class="row-form">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <label><?= $tl["page_box_content"]["pagebc20"] ?></label>
                            <span>Zaškrté tagy budou při uložení smazány</span>
                            <div class="controls">
                              <?= $ENVO_TAGLIST ?>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>

                  </div>
                </div>
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
                ?>

              </div>

              <?php if (!ENVO_TAGS) { ?>
                <div id="tagbox" class="unrow active">
                  <div>
                    <strong>Aktivujte plugin TAGs</strong>
                    <p>Plugin není instalovaný nebo je uzamčený</p>
                  </div>
                </div>
              <?php } ?>

            </div>

          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage2" role="tabpanel">
        <div class="row">
          <div class="col-sm-12">

            <?php include_once "editor_edit.php"; ?>

          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage3" role="tabpanel">
        <div class="row">
          <div class="col-sm-12">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["page_box_title"]["pagebt3"], 'box-title');
                ?>

              </div>
              <div class="box-body">

                <?php
                echo '<div class="m-b-10">';
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=2&lang=' . $managerlangTiny . '&fldr=&field_id=csseditor', $tl["global_text"]["globaltxt8"], '', 'ifManager m-r-20');
                echo $Html->addAnchor('javascript:;', $tl["global_text"]["globaltxt6"], 'addCssBlock');
                echo '</div>';
                // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                echo $Html->addDiv('', 'csseditor');
                // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                echo $Html->addTextarea('envo_css', $ENVO_FORM_DATA["page_css"], '', '', array('id' => 'envo_css', 'class' => 'hidden'));
                ?>

              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="cmsPage4" role="tabpanel">
        <div class="row">
          <div class="col-sm-12">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["page_box_title"]["pagebt4"], 'box-title');
                ?>

              </div>
              <div class="box-body">

                <?php
                echo '<div class="m-b-10">';
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=2&lang=' . $managerlangTiny . '&fldr=&field_id=javaeditor', $tl["global_text"]["globaltxt8"], '', 'ifManager m-r-20');
                echo $Html->addAnchor('javascript:;', $tl["global_text"]["globaltxt7"], 'addJavascriptBlock');
                echo '</div>';
                // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                echo $Html->addDiv('', 'javaeditor');
                // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                echo $Html->addTextarea('envo_javascript', $ENVO_FORM_DATA["page_javascript"], '', '', array('id' => 'envo_javascript', 'class' => 'hidden'));
                ?>

              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
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
                echo $Html->addTag('h3', $tl["page_box_title"]["pagebt5"], 'box-title');
                ?>

              </div>
              <div class="box-body">

                <!-- Moving stuff -->
                <ul class="envo_content_move">

                  <?php
                  if (isset($ENVO_PAGE_GRID) && is_array($ENVO_PAGE_GRID)) {
                    foreach ($ENVO_PAGE_GRID as $pg) {
                      if ($pg["pluginid"] != 0) {

                        if ($pg["pluginid"] == '9999') {

                          echo '<li class="envocontent">';
                          echo '<div class="text">' . $tl["page_box_content"]["pagebc21"] . '</div>';
                          echo '<div class="actions">';

                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('hidden', 'corder[]', $pg["orderid"], '', 'corder');
                          echo $Html->addInput('hidden', 'real_id[]', $pg["id"]);

                          echo '</div>';
                          echo '</li>';
                        }

                        if ($pg["pluginid"] == '9998') { ?>

                          <li class="envocontent">
                            <div class="envocontent_header"><?= $tl["global_text"]["globaltxt19"] ?></div>
                            <div class="form-group">
                              <label><?= $tl["global_text"]["globaltxt9"] ?></label>
                              <div class="row">
                                <div class="col-sm-4">
                                  <select name="envo_shownewsorder" class="form-control selectpicker">

                                    <?php
                                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                    echo $Html->addOption('ASC', $tl["selection"]["sel13"], (isset($ENVO_FORM_DATA["shownewsorder"]) && $ENVO_FORM_DATA["shownewsorder"] == "ASC") ? TRUE : FALSE);
                                    echo $Html->addOption('DESC', $tl["selection"]["sel14"], (isset($ENVO_FORM_DATA["shownewsorder"]) && $ENVO_FORM_DATA["shownewsorder"] == "DESC") ? TRUE : FALSE);
                                    ?>

                                  </select>
                                </div>
                                <div class="col-sm-4">
                                  <select name="envo_shownewsordern" class="form-control selectpicker">

                                    <?php
                                    // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                    echo $Html->addOption('id', $tl["selection"]["sel9"], ($ENVO_FORM_DATA['shownewswhat'] == "id") ? TRUE : FALSE);
                                    echo $Html->addOption('title', $tl["selection"]["sel10"], ($ENVO_FORM_DATA['shownewswhat'] == "title") ? TRUE : FALSE);
                                    echo $Html->addOption('time', $tl["selection"]["sel11"], ($ENVO_FORM_DATA['shownewswhat'] == "time") ? TRUE : FALSE);
                                    echo $Html->addOption('hits', $tl["selection"]["sel12"], ($ENVO_FORM_DATA['shownewswhat'] == "hits") ? TRUE : FALSE);
                                    ?>

                                  </select>
                                </div>
                                <div class="col-sm-4">
                                  <select name="envo_shownewsmany" class="form-control selectpicker">

                                    <?php for ($i = 0; $i <= 10; $i++) {

                                      // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                      echo $Html->addOption($i, $i, (isset($ENVO_FORM_DATA["shownewsmany"]) && $ENVO_FORM_DATA["shownewsmany"] == $i) ? TRUE : FALSE);

                                    } ?>

                                  </select>
                                </div>
                              </div>
                            </div>

                            <div class="form-group">
                              <label><?= $tl["global_text"]["globaltxt12"] ?></label>
                              <select name="envo_shownews[]" multiple="multiple" class="form-control">

                                <?php
                                // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                $selected = (isset($ENVO_FORM_DATA["shownews"]) && $ENVO_FORM_DATA["shownews"] == 0) ? TRUE : FALSE;

                                echo $Html->addOption('0', $tl["global_text"]["globaltxt13"], $selected);
                                if (isset($ENVO_GET_NEWS) && is_array($ENVO_GET_NEWS)) foreach ($ENVO_GET_NEWS as $gn) {

                                  echo $Html->addOption($gn["id"], $gn["title"], (isset($ENVO_FORM_DATA["shownews"]) && (in_array($gn["id"], explode(',', $ENVO_FORM_DATA["shownews"])))) ? TRUE : FALSE);

                                }
                                ?>

                              </select>
                            </div>

                            <div class="actions">

                              <?php
                              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                              echo $Html->addInput('hidden', 'corder[]', $pg["orderid"], '', 'corder');
                              echo $Html->addInput('hidden', 'real_id[]', $pg["id"]);
                              ?>

                            </div>
                          </li>

                        <?php }

                        if (isset($ENVO_HOOK_ADMIN_PAGE) && is_array($ENVO_HOOK_ADMIN_PAGE)) foreach ($ENVO_HOOK_ADMIN_PAGE as $hsp) {

                          eval($hsp["phpcode"]);

                        }

                      }
                    }
                  }

                  if (isset($ENVO_HOOK_ADMIN_PAGE_NEW) && is_array($ENVO_HOOK_ADMIN_PAGE_NEW)) foreach ($ENVO_HOOK_ADMIN_PAGE_NEW as $hspn) {
                    include_once APP_PATH . $hspn["phpcode"];
                  }

                  ?>

                </ul>

                <!-- END Moving Stuff -->

              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
                ?>

              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="box box-success">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('h3', $tl["page_box_title"]["pagebt6"], 'box-title');
                ?>

              </div>
              <div class="box-body">
                <?php include "sidebar_widget.php"; ?>
              </div>
              <div class="box-footer">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right');
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
    echo $Html->addInput('hidden', 'envo_oldcatid', $ENVO_FORM_DATA["catid"]);
    ?>

  </form>

<?php include "footer.php"; ?>