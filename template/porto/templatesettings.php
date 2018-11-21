<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
  <!-- Fixed Button for save form -->
  <div class="savebutton-small d-none d-sm-block">

    <?php
    // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
    echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '', 'btn btn-success button', array('data-loading-text' => $tl["button"]["btn41"]));
    ?>

  </div>

  <!-- Form Content -->
  <ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
    <li class="nav-item">
      <a href="#cmsPage1" class="active" data-toggle="tab">
        <span class="text"><?= $tlporto["tplset_section_tab"]["tplsettab"] ?></span>
      </a>
    </li>
    <li class="nav-item next">
      <a href="#cmsPage2" class="" data-toggle="tab">
        <span class="text"><?= $tlporto["tplset_section_tab"]["tplsettab1"] ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage3" class="" data-toggle="tab">
        <span class="text"><?= $tlporto["tplset_section_tab"]["tplsettab2"] ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage4" class="" data-toggle="tab">
        <span class="text"><?= $tlporto["tplset_section_tab"]["tplsettab3"] ?></span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage5" class="" data-toggle="tab">
        <span class="text"><?= $tlporto["tplset_section_tab"]["tplsettab4"] ?></span>
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

        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tlporto["sb_box_title"]["sbbt"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-md-5"><strong><?= $tlporto["sb_box_content"]["sbbc"] ?></strong></div>
                    <div class="col-md-7">
                      <select name="skinporto" class="form-control selectpicker">

                        <?php
                        // Option list
                        $skinlist = array(
                          'skin-app-landing'         => 'App Landing',
                          'skin-bluesat'             => 'Bluesat Company',
                          'skin-business-consulting' => 'Business Consulting',
                          'skin-church'              => 'Church',
                          'skin-construction'        => 'Construction',
                          'skin-corporate-3'         => 'Corporate 3',
                          'skin-corporate-4'         => 'Corporate 4',
                          'skin-corporate-5'         => 'Corporate 5',
                          'skin-corporate-6'         => 'Corporate 6',
                          'skin-corporate-7'         => 'Corporate 7',
                          'skin-corporate-8'         => 'Corporate 8',
                          'skin-corporate-hosting'   => 'Corporate Hosting',
                          'skin-digital-agency'      => 'Digital Agency',
                          'skin-event'               => 'Event',
                          'skin-finance'             => 'Finanace',
                          'skin-gym'                 => 'Gym',
                          'skin-hotel'               => 'Hotel',
                          'skin-law-firm'            => 'Law Firm',
                          'skin-medical'             => 'Medical',
                          'skin-photography'         => 'Photography',
                          'skin-real-estate'         => 'Real Estate',
                          'skin-restaurant'          => 'Restaurant',
                          'skin-resume'              => 'Resume',
                          'skin-wedding'             => 'Wedding'
                        );

                        asort($skinlist);
                        reset($skinlist);
                        echo $jktpl["skin_porto_tpl"] == 'default' ? '<option value="default" selected="selected">Default</option>' : '<option value="default">Default</option>';;
                        foreach ($skinlist as $v => $k):
                          echo $jktpl["skin_porto_tpl"] == $v ? '<option value="' . $v . '" selected="selected">' . $k . '</option>' : '<option value="' . $v . '">' . $k . '</option>';;
                        endforeach;
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
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
              ?>

            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tlporto["sb_box_title"]["sbbt1"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-md-5"><strong><?= $tlporto["sb_box_content"]["sbbc1"] ?></strong></div>
                    <div class="col-md-7">
                      <select name="headerporto" class="form-control selectpicker">
                        <option value="header-area navbar-fixed-top"<?php if ($jktpl["header_porto_tpl"] == 'header-area navbar-fixed-top') { ?> selected="selected"<?php } ?>>Header 1</option>
                        <option value="header-area navbar-fixed-top header-type-bg"<?php if ($jktpl["header_porto_tpl"] == 'header-area navbar-fixed-top header-type-bg') { ?> selected="selected"<?php } ?>>Header 2</option>
                        <option value="header-area header-11 navbar-fixed-top"<?php if ($jktpl["header_porto_tpl"] == 'header-area header-11 navbar-fixed-top') { ?> selected="selected"<?php } ?>>Header 11</option>
                        <option value="header-area header-11 header-12 navbar-fixed-top"<?php if ($jktpl["header_porto_tpl"] == 'header-area header-11 header-12 navbar-fixed-top') { ?> selected="selected"<?php } ?>>Header 12</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
              ?>

            </div>
          </div>
        </div>

      </div>
      <div class="row">

        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tlporto["sb_box_title"]["sbbt2"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-md-5"><strong><?= $tlporto["sb_box_content"]["sbbc2"] ?></strong></div>
                    <div class="col-md-7">
                      <select name="naviporto" class="form-control selectpicker">

                        <?php
                        // Option list
                        $navilist = array(
                          'header-mobile-nav-only header-flex, header-nav-stripe, header-nav-main-square header-nav-main-effect-1 '                     => 'Stripe',
                          'header-mobile-nav-only header-flex, header-nav-top-line, header-nav-nonav header-nav-main-effect-1'                          => 'Top Line',
                          'header-mobile-nav-only header-flex, header-nav-top-line header-nav-dark-dropdown, header-nav-nonav header-nav-main-effect-3' => 'Top Line + Dark Dropdown'
                        );

                        asort($navilist);
                        reset($navilist);
                        echo $jktpl["navi_porto_tpl"] == '' ? '<option value="" selected="selected">Default</option>' : '<option value="">Default</option>';;
                        foreach ($navilist as $v => $k):
                          echo $jktpl["navi_porto_tpl"] == $v ? '<option value="' . $v . '" selected="selected">' . $k . '</option>' : '<option value="' . $v . '">' . $k . '</option>';;
                        endforeach;
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
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
              ?>

            </div>
          </div>
        </div>
        <div class="col-md-6">

        </div>

      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage2" role="tabpanel">
      <div class="row">
        <div class="col-md-7">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tlporto["sh_box_title"]["shbt"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-md-3">

                      <?php
                      // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
                      echo $Html->startTag('strong');
                      echo $tlporto["sh_box_content"]["shbc"];
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help', array('data-content' => $tlporto["sh_help"]["shh1"], 'data-original-title' => $tlporto["sh_help"]["shh"]));
                      // Add Html Element -> endTag (Arguments: tag)
                      echo $Html->endTag('strong');
                      ?>

                    </div>
                    <div class="col-md-4">
                      <div class="radio radio-success">

                        <input type="radio" id="sitemapShow1" name="sitemapShow" value="1" <?php if ($jktpl["sitemapShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="sitemapShow1"><?= $tlporto["checkbox"]["chk2"] ?></label>

                        <input type="radio" id="sitemapShow2" name="sitemapShow" value="0" <?php if ($jktpl["sitemapShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="sitemapShow2"><?= $tlporto["checkbox"]["chk3"] ?></label>

                      </div>
                    </div>
                    <div class="col-md-1"><?= $tlporto["sh_box_content"]["shbc9"] ?></div>
                    <div class="col-md-4">
                      <input type="text" name="sitemapLinks" class="form-control" value="<?= $jktpl["sitemapLinks_porto_tpl"] ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-3"><strong><?= $tlporto["sh_box_content"]["shbc1"] ?></strong></div>
                    <div class="col-md-9">
                      <div class="radio radio-success">

                        <input type="radio" id="loginShow1" name="loginShow" value="1" <?php if ($jktpl["loginShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="loginShow1"><?= $tlporto["checkbox"]["chk2"] ?></label>

                        <input type="radio" id="loginShow2" name="loginShow" value="0" <?php if ($jktpl["loginShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="loginShow2"><?= $tlporto["checkbox"]["chk3"] ?></label>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
              ?>

            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tlporto["sh_box_title"]["shbt1"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-md-5"><strong><?= $tlporto["sh_box_content"]["shbc2"] ?></strong></div>
                    <div class="col-md-7">
                      <div class="input-group">
                        <input type="text" name="standardlogo1" id="sclogo1" class="form-control" value="<?= $jktpl["logo1_porto_tpl"] ?>"/>
                        <span class="input-group-btn">

													<?php
                          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                          echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&lang=' . $managerlang . '&fldr=&field_id=sclogo1', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array('type' => 'button', 'data-placement' => 'bottom', 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i22"]));
                          ?>

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
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
              ?>

            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tlporto["sh_box_title"]["shbt2"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-md-2"><strong><?= $tlporto["sh_box_content"]["shbc3"] ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="facebookheaderShow1" name="facebookheaderShow1" value="1" <?php if ($jktpl["facebookheaderShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="facebookheaderShow1"><?= $tlporto["checkbox"]["chk2"] ?></label>

                        <input type="radio" id="facebookheaderShow2" name="facebookheaderShow1" value="0" <?php if ($jktpl["facebookheaderShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="facebookheaderShow2"><?= $tlporto["checkbox"]["chk3"] ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?= $tlporto["sh_box_content"]["shbc9"] ?></div>
                    <div class="col-md-5">
                      <input type="text" name="facebookheaderLinks1" class="form-control" value="<?= $jktpl["facebookheaderLinks_porto_tpl"] ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?= $tlporto["sh_box_content"]["shbc4"] ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="twitterheaderShow1" name="twitterheaderShow1" value="1" <?php if ($jktpl["twitterheaderShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="twitterheaderShow1"><?= $tlporto["checkbox"]["chk2"] ?></label>

                        <input type="radio" id="twitterheaderShow2" name="twitterheaderShow1" value="0" <?php if ($jktpl["twitterheaderShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="twitterheaderShow2"><?= $tlporto["checkbox"]["chk3"] ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?= $tlporto["sh_box_content"]["shbc9"] ?></div>
                    <div class="col-md-5">
                      <input type="text" name="twitterheaderLinks1" class="form-control" value="<?= $jktpl["twitterheaderLinks_porto_tpl"] ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?= $tlporto["sh_box_content"]["shbc5"] ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="googleheaderShow1" name="googleheaderShow1" value="1" <?php if ($jktpl["googleheaderShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="googleheaderShow1"><?= $tlporto["checkbox"]["chk2"] ?></label>

                        <input type="radio" id="googleheaderShow2" name="googleheaderShow1" value="0" <?php if ($jktpl["googleheaderShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="googleheaderShow2"><?= $tlporto["checkbox"]["chk3"] ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?= $tlporto["sh_box_content"]["shbc9"] ?></div>
                    <div class="col-md-5">
                      <input type="text" name="googleheaderLinks1" class="form-control" value="<?= $jktpl["googleheaderLinks_porto_tpl"] ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?= $tlporto["sh_box_content"]["shbc6"] ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="instagramheaderShow1" name="instagramheaderShow1" value="1" <?php if ($jktpl["instagramheaderShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="instagramheaderShow1"><?= $tlporto["checkbox"]["chk2"] ?></label>

                        <input type="radio" id="instagramheaderShow2" name="instagramheaderShow1" value="0" <?php if ($jktpl["instagramheaderShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="instagramheaderShow2"><?= $tlporto["checkbox"]["chk3"] ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?= $tlporto["sh_box_content"]["shbc9"] ?></div>
                    <div class="col-md-5">
                      <input type="text" name="instagramheaderLinks1" class="form-control" value="<?= $jktpl["instagramheaderLinks_porto_tpl"] ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?= $tlporto["sh_box_content"]["shbc7"] ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="phoneheaderShow1" name="phoneheaderShow1" value="1" <?php if ($jktpl["phoneheaderShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="phoneheaderShow1"><?= $tlporto["checkbox"]["chk2"] ?></label>

                        <input type="radio" id="phoneheaderShow2" name="phoneheaderShow1" value="0" <?php if ($jktpl["phoneheaderShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="phoneheaderShow2"><?= $tlporto["checkbox"]["chk3"] ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?= $tlporto["sh_box_content"]["shbc10"] ?></div>
                    <div class="col-md-5">
                      <input type="text" name="phoneheaderLinks1" class="form-control" value="<?= $jktpl["phoneheaderLinks_porto_tpl"] ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?= $tlporto["sh_box_content"]["shbc8"] ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="emailheaderShow1" name="emailheaderShow1" value="1" <?php if ($jktpl["emailheaderShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="emailheaderShow1"><?= $tlporto["checkbox"]["chk2"] ?></label>

                        <input type="radio" id="emailheaderShow2" name="emailheaderShow1" value="0" <?php if ($jktpl["emailheaderShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="emailheaderShow2"><?= $tlporto["checkbox"]["chk3"] ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?= $tlporto["sh_box_content"]["shbc11"] ?></div>
                    <div class="col-md-5">
                      <input type="text" name="emailheaderLinks1" class="form-control" value="<?= $jktpl["emailheaderLinks_porto_tpl"] ?>"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage3" role="tabpanel">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tlporto["sl_box_title"]["slbt"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form <?php if (!$ENVO_FILECONTENT1) {
                    echo "hidden";
                  } ?>">
                    <div class="col-md-12">
                      <h4>
                        <?= $tlporto["sl_box_title"]["slbt1"] ?>
                        <small><strong><?= $ENVO_FILEURL1 ?></strong></small>
                      </h4>
                      <hr>
                      <p><?= $tlporto["sl_box_title"]["slbt3"] ?></p>
                    </div>
                  </div>
                  <?php if ($ENVO_FILECONTENT1) { ?>
                    <div class="row-form">
                      <div class="col-md-12">
                        <label for="envo_filecontent2"><?= $tlporto["sl_box_title"]["slbt2"] ?></label>
                        <div id="htmleditor2"></div>
                        <textarea name="envo_filecontent2" id="envo_filecontent2" class="form-control hidden"><?= $ENVO_FILECONTENT1 ?></textarea>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
              ?>

            </div>
          </div>

          <input type="hidden" name="envo_file2" value="<?= $ENVO_FILEURL1 ?>"/>

        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage4" role="tabpanel">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tlporto["sf_box_title"]["sfbt"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="row-form">
                <div class="col-md-12">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', $tlporto["sf_box_content"]["sfbc"]);
                  // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                  echo $Html->addDiv('', 'htmleditor3', array('class' => 'm-t-10'));
                  // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                  echo $Html->addTextarea('footerblocktext1', $jktpl["footerblocktext1_porto_tpl"], '8', '', array('id' => 'footerblocktext1', 'class' => 'form-control hidden'));
                  ?>

                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
              ?>

            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tlporto["sf_box_title"]["sfbt1"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-md-5"><strong><?= $tlporto["sf_box_content"]["sfbc8"] ?></strong></div>
                    <div class="col-md-7">
                      <div class="input-group">
                        <input type="text" name="standardlogo2" id="sclogo2" class="form-control" value="<?= $jktpl["logo2_porto_tpl"] ?>"/>
                        <span class="input-group-btn">

													<?php
                          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                          echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=1&lang=' . $managerlang . '&fldr=&field_id=sclogo2', '<i class="pg-image"></i>', '', 'btn btn-info ifManager', array('type' => 'button', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i22"]));
                          ?>

                        </span>
                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?= $tlporto["sf_box_content"]["sfbc2"] ?></strong></div>
                    <div class="col-md-10">
                      <input type="text" name="socialfooterText" class="form-control" value="<?= $jktpl["socialfooterText_porto_tpl"] ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?= $tlporto["sf_box_content"]["sfbc3"] ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="facebookfooterShow1" name="facebookfooterShow" value="1" <?php if ($jktpl["facebookfooterShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="facebookfooterShow1"><?= $tlporto["checkbox"]["chk2"] ?></label>

                        <input type="radio" id="facebookfooterShow2" name="facebookfooterShow" value="0" <?php if ($jktpl["facebookfooterShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="facebookfooterShow2"><?= $tlporto["checkbox"]["chk3"] ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?= $tlporto["sf_box_content"]["sfbc7"] ?></div>
                    <div class="col-md-5">
                      <input type="text" name="facebookfooterLinks" class="form-control" value="<?= $jktpl["facebookfooterLinks_porto_tpl"] ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?= $tlporto["sf_box_content"]["sfbc4"] ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="twitterfooterShow1" name="twitterfooterShow" value="1" <?php if ($jktpl["twitterfooterShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="twitterfooterShow1"><?= $tlporto["checkbox"]["chk2"] ?></label>

                        <input type="radio" id="twitterfooterShow2" name="twitterfooterShow" value="0" <?php if ($jktpl["twitterfooterShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="twitterfooterShow2"><?= $tlporto["checkbox"]["chk3"] ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?= $tlporto["sf_box_content"]["sfbc7"] ?></div>
                    <div class="col-md-5">
                      <input type="text" name="twitterfooterLinks" class="form-control" value="<?= $jktpl["twitterfooterLinks_porto_tpl"] ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?= $tlporto["sf_box_content"]["sfbc5"] ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="googlefooterShow1" name="googlefooterShow" value="1" <?php if ($jktpl["googlefooterShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="googlefooterShow1"><?= $tlporto["checkbox"]["chk2"] ?></label>

                        <input type="radio" id="googlefooterShow2" name="googlefooterShow" value="0" <?php if ($jktpl["googlefooterShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="googlefooterShow2"><?= $tlporto["checkbox"]["chk3"] ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?= $tlporto["sf_box_content"]["sfbc7"] ?></div>
                    <div class="col-md-5">
                      <input type="text" name="googlefooterLinks" class="form-control" value="<?= $jktpl["googlefooterLinks_porto_tpl"] ?>"/>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-2"><strong><?= $tlporto["sf_box_content"]["sfbc6"] ?></strong></div>
                    <div class="col-md-3">
                      <div class="radio radio-success">

                        <input type="radio" id="instagramfooterShow1" name="instagramfooterShow" value="1" <?php if ($jktpl["instagramfooterShow_porto_tpl"] == 1) { ?> checked="checked"<?php } ?> />
                        <label for="instagramfooterShow1"><?= $tlporto["checkbox"]["chk2"] ?></label>

                        <input type="radio" id="instagramfooterShow2" name="instagramfooterShow" value="0" <?php if ($jktpl["instagramfooterShow_porto_tpl"] == 0) { ?> checked="checked"<?php } ?> />
                        <label for="instagramfooterShow2"><?= $tlporto["checkbox"]["chk3"] ?></label>

                      </div>
                    </div>
                    <div class="col-md-2"><?= $tlporto["sf_box_content"]["sfbc7"] ?></div>
                    <div class="col-md-5">
                      <input type="text" name="instagramfooterLinks" class="form-control" value="<?= $jktpl["instagramfooterLinks_porto_tpl"] ?>"/>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage5" role="tabpanel">
      <div class="row">
        <div class="col-md-12">

          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', $tlporto["sl_box_title"]["slbt"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form <?php if (!$ENVO_FILECONTENT) {
                    echo "hidden";
                  } ?>">
                    <div class="col-md-12">
                      <h4>
                        <?= $tlporto["sl_box_title"]["slbt1"] ?>
                        <small><strong><?= $ENVO_FILEURL ?></strong></small>
                      </h4>
                    </div>
                  </div>
                  <?php if ($ENVO_FILECONTENT) { ?>
                    <div class="row-form">
                      <div class="col-md-12">
                        <label for="envo_filecontent"><?= $tlporto["sl_box_title"]["slbt2"] ?></label>
                        <div id="htmleditor"></div>
                        <textarea name="envo_filecontent" id="envo_filecontent" class="form-control hidden"><?= $ENVO_FILECONTENT ?></textarea>
                      </div>
                    </div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <div class="box-footer">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
              ?>

            </div>
          </div>

          <input type="hidden" name="envo_file" value="<?= $ENVO_FILEURL ?>"/>

        </div>
      </div>
    </div>
  </div>
</form>
