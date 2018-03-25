<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if ($errors_rf || $errorsA) { ?>

  <div class="alert alert-danger">

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

  <div class="row" style="margin-bottom: 50px">
    <div class="col-md-8 col-md-offset-2">
      <div class="tabs tabs-bottom tabs-center tabs-simple">
        <ul class="nav nav-tabs">
          <li class="active">
            <a href="#tabsNavigationSimple1" data-toggle="tab"><?=$tlrf["rf_frontend"]["rf11"]?></a>
          </li>
          <li>
            <a href="#tabsNavigationSimple2" data-toggle="tab"><?=$tlrf["rf_frontend"]["rf12"]?></a>
          </li>
          <li>
            <a href="#tabsNavigationSimple3" data-toggle="tab"><?=$tlrf["rf_frontend"]["rf13"]?></a>
          </li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="tabsNavigationSimple1">
            <h4 class="text-uppercase">
              <?=$tlrf["rf_frontend"]["rf1"]?>
            </h4>
            <form method="post" action="<?=$_SERVER['REQUEST_URI']?>" enctype="multipart/form-data">
              <div class="row">
                <div class="form-group">
                  <div class="col-md-12">
                    <label><?=$tlrf["rf_frontend"]["rf2"]?></label>
                    <input type="text" class="form-control input-lg" value="<?=$envouser->getVar("name")?>" name="name" id="name" placeholder="<?=$tlrf["rf_frontend_plc"]["rfplc"]?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group <?php if (isset($errors_rfs["e1"])) echo " has-error"; ?>">
                  <div class="col-md-12">
                    <label>
                      <?=$tlrf["rf_frontend"]["rf4"]?>
                      <i class="fa fa-star"></i>
                    </label>
                    <input type="email" class="form-control input-lg" value="<?=$envouser->getVar("email")?>" name="email" id="email" placeholder="<?=$tlrf["rf_frontend_plc"]["rfplc2"]?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="form-group">
                  <div class="col-md-12">
                    <label>
                      <?=$tlrf["rf_frontend"]["rf15"]?>
                    </label>
                    <input type="text" class="form-control input-lg" value="<?=$envouser->getVar("phone")?>" name="phone" id="phone" placeholder="<?=$tlrf["rf_frontend_plc"]["rfplc6"]?>">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-8">

                  <?php
                  echo $regform;
                  echo sprintf($tlrf["rf_frontend"]["rf10"], '<i class="fa fa-star"></i>');
                  ?>

                </div>
                <div class="col-md-4">
                  <input type="submit" value="<?=$tlrf["rf_frontend_button"]["btn"]?>" class="btn btn-primary pull-right" id="stuffR" name="stuffR">
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane" id="tabsNavigationSimple2">
            <h4 class="heading-primary text-uppercase mb-md">
              <?=$tlrf["rf_frontend"]["rf5"]?>
            </h4>
            <div id="pwd-container">
              <form method="post" action="<?=$_SERVER['REQUEST_URI']?>" enctype="multipart/form-data">
                <div class="row">
                  <div class="form-group<?php if (isset($errors_rfp["e5"])) echo " has-error"; ?>">
                    <div class="col-md-12">
                      <label><?=$tlrf["rf_frontend"]["rf6"]?></label>
                      <input type="password" class="form-control input-lg" value="" name="passold" id="passold" placeholder="<?=$tlrf["rf_frontend_plc"]["rfplc3"]?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group <?php if (isset($errors_rfp["e1"])) echo " has-error"; ?>">
                    <div class="col-md-12">
                      <label><?=$tlrf["rf_frontend"]["rf7"]?></label>
                      <input type="password" class="form-control input-lg" value="" name="passnew" id="check_password" placeholder="<?=$tlrf["rf_frontend_plc"]["rfplc4"]?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group <?php if (isset($errors_rfp["e1"])) echo " has-error"; ?>">
                    <div class="col-md-12">
                      <label><?=$tlrf["rf_frontend"]["rf8"]?></label>
                      <input type="password" class="form-control input-lg" value="" name="passnewc" id="passnewc" placeholder="<?=$tlrf["rf_frontend_plc"]["rfplc5"]?>">
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
                    <input type="submit" value="<?=$tlrf["rf_frontend_button"]["btn"]?>" class="btn btn-primary pull-right" id="email_passR" name="email_passR">
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="tab-pane" id="tabsNavigationSimple3">
            <h4 class="heading-primary text-uppercase mb-md">
              <?=$tlrf["rf_frontend"]["rf9"]?>
            </h4>
            <form method="post" action="<?=$_SERVER['REQUEST_URI']?>" enctype="multipart/form-data">
              <div class="row">
                <div class="fileinput fileinput-new" data-provides="fileinput">
                  <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                    <img src="<?=BASE_URL . ENVO_FILES_DIRECTORY . '/userfiles' . $envouser->getVar("picture")?>"
                      alt="avatar">
                  </div>
                  <div>
            <span class="btn btn-default btn-file"><span class="fileinput-new"><?=$tl["login"]["l12"]?></span><span
                class="fileinput-exists"><?=$tl["general"]["g180"]?></span><input type="file" name="uploadpp"
                accept="image/*"></span>
                    <a href="#" class="btn btn-default fileinput-exists"
                      data-dismiss="fileinput"><?=$tl["general"]["g179"]?></a>
                  </div>
                </div>

                <input type="submit" value="<?=$tlrf["rf_frontend_button"]["btn"]?>" class="btn btn-primary pull-right" id="avatarR" name="avatarR">
              </div>
              <div class="row">
                <h4 class="heading-primary text-uppercase mb-md">
                  <?=$tlrf["rf_frontend"]["rf14"]?>
                </h4>
                <div class="row text-center">
                  <div class="col-xs-2">
                    <img src="../<?=ENVO_FILES_DIRECTORY?>/userfiles/standard.png" class="img-responsive" alt="standard avatar"/>
                    <div class="radio">
                      <label>
                        <input type="radio" name="avatar" value="/standard.png"<?php if ($envouser->getVar("picture") == "/standard.png") { ?> checked="checked"<?php } ?> />
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-2">
                    <img src="../<?=ENVO_FILES_DIRECTORY?>/userfiles/avatar.png" class="img-responsive" alt="avatar"/>
                    <div class="radio">
                      <label>
                        <input type="radio" name="avatar" value="/avatar.png"<?php if ($envouser->getVar("picture") == "/avatar.png") { ?> checked="checked"<?php } ?> />
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-2">
                    <img src="../<?=ENVO_FILES_DIRECTORY?>/userfiles/avatar2.png" class="img-responsive" alt="avatar2"/>
                    <div class="radio">
                      <label>
                        <input type="radio" name="avatar" value="/avatar2.png"<?php if ($envouser->getVar("picture") == "/avatar2.png") { ?> checked="checked"<?php } ?> />
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-2">
                    <img src="../<?=ENVO_FILES_DIRECTORY?>/userfiles/avatar3.png" class="img-responsive" alt="avatar3"/>
                    <div class="radio">
                      <label>
                        <input type="radio" name="avatar" value="/avatar3.png"<?php if ($envouser->getVar("picture") == "/avatar3.png") { ?> checked="checked"<?php } ?> />
                      </label>
                    </div>
                  </div>
                  <div class="col-xs-2">
                    <img src="../<?=ENVO_FILES_DIRECTORY?>/userfiles/avatar4.png" class="img-responsive" alt="avatar4"/>
                    <div class="radio">
                      <label>
                        <input type="radio" name="avatar" value="/avatar4.png"<?php if ($envouser->getVar("picture") == "/avatar4.png") { ?> checked="checked"<?php } ?> />
                      </label>
                    </div>
                  </div>
                </div>

                <input type="submit" value="<?=$tlrf["rf_frontend_button"]["btn"]?>" class="btn btn-primary pull-right" id="avatarS" name="avatarS">
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>