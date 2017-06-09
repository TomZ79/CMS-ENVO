<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if ($errors_rf || $errorsA) { ?>

  <div class="alert alert-secondary">

    <?php
    if (isset($errors_rf["e"])) echo $errors_rf["e"];
    if (isset($errors_rf["e1"])) echo $errors_rf["e1"];
    if (isset($errors_rf["e2"])) echo $errors_rf["e2"];
    if (isset($errors_rf["e3"])) echo $errors_rf["e3"];
    if (isset($errors_rf["e4"])) echo $errors_rf["e4"];
    if (isset($errors_rf["e5"])) echo $errors_rf["e5"];
    if (isset($errorsA) && is_array($errorsA)) foreach ($errorsA as $i) {
      echo $i;
    } ?>

  </div>

<?php } ?>

  <div class="col-md-12">
    <div class="tabs tabs-bottom tabs-center tabs-simple">
      <ul class="nav nav-tabs nav-tabs-responsive">
        <li class="active">
          <a href="#tabsNavigationSimple1" data-toggle="tab"><span class="text"><?php echo $tlrf["rf_frontend"]["rf11"]; ?></span></a>
        </li>
        <li class="next">
          <a href="#tabsNavigationSimple2" data-toggle="tab"><span class="text"><?php echo $tlrf["rf_frontend"]["rf12"]; ?></span></a>
        </li>
        <li>
          <a href="#tabsNavigationSimple3" data-toggle="tab"><span class="text"><?php echo $tlrf["rf_frontend"]["rf13"]; ?></span></a>
        </li>
      </ul>
      <div class="tab-content">
        <div class="tab-pane active" id="tabsNavigationSimple1">
          <div class="featured-boxes col-md-8 col-centered">
            <div class="featured-box featured-box-primary align-left mt-xlg">
              <div class="box-content">
                <h4 class="heading-primary text-uppercase mb-md">
                  <?php echo $tlrf["rf_frontend"]["rf1"]; ?>
                </h4>
                <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label><?php echo $tlrf["rf_frontend"]["rf2"]; ?></label>
                        <input type="text" class="form-control input-lg" value="<?php echo $jakuser->getVar("name"); ?>" name="name" id="name" placeholder="<?php echo $tlrf["rf_frontend_plc"]["rfplc"]; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group <?php if (isset($errors_rfs["e1"])) echo " has-error"; ?>">
                      <div class="col-md-12">
                        <label>
                          <?php echo $tlrf["rf_frontend"]["rf4"]; ?>
                          <span class="text-color-secondary ml-sm">*</span>
                        </label>
                        <input type="email" class="form-control input-lg" value="<?php echo $jakuser->getVar("email"); ?>" name="email" id="email" placeholder="<?php echo $tlrf["rf_frontend_plc"]["rfplc2"]; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group">
                      <div class="col-md-12">
                        <label>
                          <?php echo $tlrf["rf_frontend"]["rf15"]; ?>
                        </label>
                        <input type="text" class="form-control input-lg" value="<?php echo $jakuser->getVar("phone"); ?>" name="phone" id="phone" placeholder="<?php echo $tlrf["rf_frontend_plc"]["rfplc6"]; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">

                      <?php
                      echo $regform;
                      echo sprintf($tlrf["rf_frontend"]["rf10"], '<span class="text-color-secondary">*</span>');
                      ?>

                    </div>
                    <div class="col-md-4">
                      <input type="submit" value="<?php echo $tlrf["rf_frontend_button"]["btn"]; ?>" class="btn btn-primary pull-right mb-xl" data-loading-text="Odesílání..." id="stuffR" name="stuffR">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="tabsNavigationSimple2">
          <div class="featured-boxes col-md-8 col-centered" id="pwd-container">
            <div class="featured-box featured-box-primary align-left mt-xlg">
              <div class="box-content">
                <h4 class="heading-primary text-uppercase mb-md">
                  <?php echo $tlrf["rf_frontend"]["rf5"]; ?>
                </h4>
                <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
                  <div class="row">
                    <div class="form-group<?php if (isset($errors_rfp["e5"])) echo " has-error"; ?>">
                      <div class="col-md-12">
                        <label><?php echo $tlrf["rf_frontend"]["rf6"]; ?></label>
                        <input type="password" class="form-control input-lg" value="" name="passold" id="passold" placeholder="<?php echo $tlrf["rf_frontend_plc"]["rfplc3"]; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group <?php if (isset($errors_rfp["e1"])) echo " has-error"; ?>">
                      <div class="col-md-12">
                        <label><?php echo $tlrf["rf_frontend"]["rf7"]; ?></label>
                        <input type="password" class="form-control input-lg" value="" name="passnew" id="check_password" placeholder="<?php echo $tlrf["rf_frontend_plc"]["rfplc4"]; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group <?php if (isset($errors_rfp["e1"])) echo " has-error"; ?>">
                      <div class="col-md-12">
                        <label><?php echo $tlrf["rf_frontend"]["rf8"]; ?></label>
                        <input type="password" class="form-control input-lg" value="" name="passnewc" id="passnewc" placeholder="<?php echo $tlrf["rf_frontend_plc"]["rfplc5"]; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-8">

                      <div class="progress progress-no-border-radius mt-sm mb-sm">
                        <div class="pwstrength_viewport_progress"></div>
                      </div>

                    </div>
                    <div class="col-md-4">
                      <input type="submit" value="<?php echo $tlrf["rf_frontend_button"]["btn"]; ?>" class="btn btn-primary pull-right mb-xl" data-loading-text="Odesílání..." id="email_passR" name="email_passR">
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane" id="tabsNavigationSimple3">
          <div class="featured-boxes col-md-8 col-centered">
            <div class="featured-box featured-box-primary align-left mt-xlg">
              <div class="box-content">
                <h4 class="heading-primary text-uppercase mb-md">
                  <?php echo $tlrf["rf_frontend"]["rf9"]; ?>
                </h4>
                <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
                  <div class="row">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                        <img src="<?php echo BASE_URL . JAK_FILES_DIRECTORY . '/userfiles' . $jakuser->getVar("picture"); ?>"
                          alt="avatar">
                      </div>
                      <div>
            <span class="btn btn-default btn-file"><span class="fileinput-new"><?php echo $tl["login"]["l12"]; ?></span><span
                class="fileinput-exists"><?php echo $tl["general"]["g180"]; ?></span><input type="file" name="uploadpp"
                accept="image/*"></span>
                        <a href="#" class="btn btn-default fileinput-exists"
                          data-dismiss="fileinput"><?php echo $tl["general"]["g179"]; ?></a>
                      </div>
                    </div>

                    <input type="submit" value="<?php echo $tlrf["rf_frontend_button"]["btn"]; ?>" class="btn btn-primary pull-right mb-xl" data-loading-text="Odesílání..." id="avatarR" name="avatarR">
                  </div>
                  <div class="row">
                    <h4 class="heading-primary text-uppercase mb-md">
                      <?php echo $tlrf["rf_frontend"]["rf14"]; ?>
                    </h4>
                    <div class="row text-center">
                      <div class="col-xs-2">
                        <img src="../<?php echo JAK_FILES_DIRECTORY; ?>/userfiles/standard.png" class="img-responsive" alt="standard avatar"/>
                        <div class="radio">
                          <label>
                            <input type="radio" name="avatar" value="/standard.png"<?php if ($jakuser->getVar("picture") == "/standard.png") { ?> checked="checked"<?php } ?> />
                          </label>
                        </div>
                      </div>
                      <div class="col-xs-2">
                        <img src="../<?php echo JAK_FILES_DIRECTORY; ?>/userfiles/avatar.png" class="img-responsive" alt="avatar"/>
                        <div class="radio">
                          <label>
                            <input type="radio" name="avatar" value="/avatar.png"<?php if ($jakuser->getVar("picture") == "/avatar.png") { ?> checked="checked"<?php } ?> />
                          </label>
                        </div>
                      </div>
                      <div class="col-xs-2">
                        <img src="../<?php echo JAK_FILES_DIRECTORY; ?>/userfiles/avatar2.png" class="img-responsive" alt="avatar2"/>
                        <div class="radio">
                          <label>
                            <input type="radio" name="avatar" value="/avatar2.png"<?php if ($jakuser->getVar("picture") == "/avatar2.png") { ?> checked="checked"<?php } ?> />
                          </label>
                        </div>
                      </div>
                      <div class="col-xs-2">
                        <img src="../<?php echo JAK_FILES_DIRECTORY; ?>/userfiles/avatar3.png" class="img-responsive" alt="avatar3"/>
                        <div class="radio">
                          <label>
                            <input type="radio" name="avatar" value="/avatar3.png"<?php if ($jakuser->getVar("picture") == "/avatar3.png") { ?> checked="checked"<?php } ?> />
                          </label>
                        </div>
                      </div>
                      <div class="col-xs-2">
                        <img src="../<?php echo JAK_FILES_DIRECTORY; ?>/userfiles/avatar4.png" class="img-responsive" alt="avatar4"/>
                        <div class="radio">
                          <label>
                            <input type="radio" name="avatar" value="/avatar4.png"<?php if ($jakuser->getVar("picture") == "/avatar4.png") { ?> checked="checked"<?php } ?> />
                          </label>
                        </div>
                      </div>
                    </div>

                    <input type="submit" value="<?php echo $tlrf["rf_frontend_button"]["btn"]; ?>" class="btn btn-primary pull-right mb-xl" data-loading-text="Odesílání..." id="avatarS" name="avatarS">
                  </div>
                </form>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>