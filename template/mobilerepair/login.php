<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (!ENVO_USERID) { ?>


  <style>
    /* Form Module */
    .form-module {
      position: relative;
    }

    .form-module .toggleform {
      position: absolute;
    }

    .form-module .form {
      display: block;
    }

    .form-module .form:nth-child(2) {
      display: none;
    }
  </style>

  <?php if ($setting["rf_active"] && !ENVO_USERID) { ?>
    <div class="col-md-6">
      <div class="featured-boxes register">
        <div class="col-xs-12 col-sm-12">
          <div class="featured-box featured-box-primary align-left mt-xlg">
            <div class="box-content">
              <?php if ($errorsC || $errorsA) { ?>

                <div class="alert alert-secondary">

                  <?php if (isset($errorsC["e3"])) echo $errorsC["e3"];
                  if (isset($errorsC["e4"])) echo $errorsC["e4"];
                  if (isset($errorsC["e5"])) echo $errorsC["e5"];
                  if (isset($errorsC["e1"])) echo $errorsC["e1"];
                  if (isset($errorsC["e2"])) echo $errorsC["e2"];
                  if (isset($errorsA) && is_array($errorsA)) foreach ($errorsA as $i) {
                    echo $i;
                  }
                  ?>

                </div>

              <?php } else if (isset($_SESSION["rf_msg_sent"]) && $_SESSION["rf_msg_sent"] == 1) { ?>

                <div class="alert alert-tertiary">
                  <?php echo $setting["rf_welcome"]; ?>
                </div>

              <?php }
              if (!isset($_SESSION["rf_msg_sent"]) || isset($_SESSION["rf_msg_sent"]) && $_SESSION["rf_msg_sent"] != 1) { ?>

                <h4 class="heading-primary text-uppercase mb-md">
                  <?php echo $tl["lform_text"]["lformt9"]; ?>
                </h4>
                <form method="post" class="cFrom" id="registerForm" action="<?php echo $_SERVER['REQUEST_URI']; ?>" enctype="multipart/form-data">
                  <?php if ($setting["rf_simple"]) { ?>
                    <div class="row">
                      <div class="form-group <?php if (isset($errorsC["e3"])) echo " has-error"; ?>">
                        <div class="col-md-12">
                          <label><?php echo $tl["lform_text"]["lformt1"]; ?>
                            <span class="text-color-secondary ml-sm">*</span>
                          </label>
                          <input type="text" class="form-control input-lg" value="<?php if (isset($_REQUEST["username"])) echo $_REQUEST["username"]; ?>" name="username" id="username" placeholder="<?php echo $tl["placeholder"]["plc3"]; ?>" data-msg-required="Zadejte uživatelské jméno"
                            required>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="form-group <?php if ($errorsC["e4"]) echo " has-error"; ?>">
                        <div class="col-md-12">
                          <label><?php echo $tl["lform_text"]["lformt7"]; ?>
                            <span class="text-color-secondary ml-sm">*</span>
                          </label>
                          <input type="email" class="form-control input-lg" value="<?php if (isset($_REQUEST["email"])) echo $_REQUEST["email"]; ?>" name="email" id="email" placeholder="<?php echo $tl["placeholder"]["plc5"]; ?>" data-msg-required="Zadejte Vaši emailovou adresu" data-msg-email="Zadejte validní emailovou adresu" required>
                        </div>
                      </div>
                    </div>
                    <?php

                    if (!ENVO_USERID && $setting["hvm"] && isset($_SESSION['envo_captcha'])) {
                      if (!isset($_SESSION["rf_msg_sent"]) || isset($_SESSION["rf_msg_sent"]) && $_SESSION["rf_msg_sent"] != 1) {

                        // Create Captcha verification code
                        // If we need captcha, write code:
                        // echo '<img src="/assets/plugins/captcha/simple-php-captcha/simple-php-captcha.php/' . $_SESSION['captcha_RF']['image_src'] . '" alt="">';
                        $_SESSION['captcha'] = simple_php_captcha(array(
                          'min_length'    => 4,
                          'max_length'    => 4,
                          'characters'    => '123456789',
                          'min_font_size' => 28,
                          'max_font_size' => 28,
                          'angle_max'     => 3
                        ));

                        $_SESSION['captchaCode'] = $_SESSION['captcha']['code'];
                      }

                      ?>
                      <div class="row">
                        <div class="form-group <?php if ($errorsA) echo " has-error"; ?>">
                          <div class="col-md-12">
                            <label><?php echo $tl["lform_text"]["lformt11"]; ?>
                              <span class="text-color-secondary ml-sm">*</span>
                            </label>
                          </div>
                          <div class="col-md-4">
                            <div class="captcha form-control">
                              <div class="captcha-image">
                                <?php
                                echo '<img id="captcha-image" class="img-responsive" src="/assets/plugins/captcha/simple-php-captcha/simple-php-captcha.php/' . $_SESSION['captcha']['image_src'] . '" alt="CAPTCHA Code">';
                                ?>
                              </div>
                              <div class="captcha-refresh">
                                <a href="#" id="refreshCaptcha" title="Refresh Code"><i class="fa fa-refresh"></i></a>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-8">
                            <input type="text" class="form-control input-lg captcha-input" value="" maxlength="6" name="captcha" id="captcha" placeholder="<?php echo $tl["placeholder"]["plc6"]; ?>" data-msg-captcha="Špatný kontrolní kód." data-msg-required="Zadejte kontrolní kód" required>
                          </div>
                        </div>
                      </div>
                      <di></di>
                    <?php }
                  } ?>

                  <div class="row mt-medium-xs mt-lg mb-lg">
                    <div class="col-md-9">
                      <div class="well well-sm">
                        <?php
                        echo sprintf($tl["lform_text"]["lformt10"], '<span class="text-color-secondary">*</span>')
                        ?>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <input type="submit" value="<?php echo $tl["button"]["btn11"]; ?>" class="btn btn-primary pull-right mb-xl" data-loading-text="Odesílání..." name="registerF" id="registerFormSubmit">
                    </div>
                  </div>
                </form>

              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  <?php } ?>

  <div class="<?php echo (!$setting["rf_active"]) ? 'col-md-6 col-md-offset-3' : 'col-md-6'; ?>">
    <div class="form-module">
      <div id="loginformblock" class="border-1px p-40 form">
        <h3 class="text-theme-colored text-uppercase m-0"><?php echo $tl["lform_text"]["lformt"]; ?></h3>
        <div class="line-bottom mb-30"></div>

        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="loginForm" name="loginForm" method="post">
          <div class="row">
            <div class="form-group col-md-12 <?php if ($errorlo) echo " has-error"; ?>">
              <label><?php echo $tl["lform_text"]["lformt1"]; ?></label>
              <input type="text" class="form-control" value="<?php if (isset($_REQUEST["envoU"])) echo $_REQUEST["envoU"]; ?>" name="loginusername" id="loginusername" placeholder="<?php echo $tl["placeholder"]["plc3"]; ?>" data-msg-required="Zadejte uživatelské jméno" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col-md-12 <?php if ($errorlo) echo " has-error"; ?>">
              <label><?php echo $tl["lform_text"]["lformt2"]; ?></label>
              <input type="password" class="form-control" value="" name="loginpassword" id="loginpassword" placeholder="<?php echo $tl["placeholder"]["plc4"]; ?>" data-msg-required="Zadejte heslo" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <div class="checkbox">
                <label for="lcookies">
                  <input type="checkbox" id="lcookies" name="lcookies" style="vertical-align: middle;position: relative;bottom: 4px;margin-right: 5px;">
                  <?php echo $tl["lform_text"]["lformt3"]; ?>
                </label>
              </div>
            </div>
            <div class="col-md-6">
              <a class="pull-right mt-10 mb-10 showlogin" href="#">(<?php echo $tl["lform_text"]["lformt5"]; ?>?)</a>
            </div>
          </div>
          <div class="row mt-10">
            <div class="col-md-12">
              <div class="form-group pull-right">
                <button type="submit" id="login" name="login" class="btn btn-theme-colored btn-flat btn-lg" data-loading-text="Odesílání..."><?php echo $tl["button"]["btn8"]; ?></button>

              </div>
            </div>
          </div>
        </form>

      </div>


      <div id="forgotformblock" class="border-1px p-40 form">
        <h3 class="text-theme-colored text-uppercase m-0"><?php echo $tl["lform_text"]["lformt6"]; ?></h3>
        <div class="line-bottom mb-30"></div>


        <div class="alert alert-warning text-center">
          <a class="showlogin" href="#"><?php echo $tl["lform_text"]["lformt8"]; ?></a>
        </div>

        <?php if ($errorfp) { ?>
          <div class="alert alert-danger warningtext"><?php echo $errorfp["e"]; ?></div>
        <?php } ?>

        <form action="<?php echo $_SERVER['REQUEST_URI']; ?>" id="loginFormPassword" method="post">
          <div class="row">
            <div class="form-group <?php if ($errorfp) echo " has-error"; ?>">
              <div class="col-md-12">
                <label><?php echo $tl["lform_text"]["lformt7"]; ?></label>
                <input type="text" class="form-control input-lg" value="" name="envoE" id="email" placeholder="<?php echo $tl["placeholder"]["plc5"]; ?>">
              </div>
            </div>
          </div>
          <div class="row mt-10">
            <div class="col-md-12">
              <div class="form-group pull-right">
                <button type="submit" id="login" name="forgotP" class="btn btn-theme-colored btn-flat btn-lg" data-loading-text="Odesílání..."><?php echo $tl["button"]["btn10"]; ?></button>
              </div>
            </div>
          </div>
        </form>
      </div>

    </div>
  </div>

<?php } else { ?>

  <div class="col-xs-12 col-sm-6 col-sm-offset-3">
    <h3 class="text-center"><?php echo str_replace("%s", $ENVO_USERNAME, $tl["lpage_text"]["lpaget"]); ?></h3>
    <p class="text-center"><?php echo $tl["lpage_text"]["lpaget1"] ?></p>
    <div class="col-md-6 col-centered">
      <ul class="list list-icons list-icons-style-3 list-quaternary mb-xlg">
        <li><i class="fa fa-check"></i> <?php echo $tlporto["lpage_text"]["lpaget1"] ?></li>
        <li><i class="fa fa-check"></i> <?php echo $tlporto["lpage_text"]["lpaget2"] ?></li>
      </ul>
      <p>
        <a href="<?php echo $P_USR_LOGOUT; ?>" class="btn btn-danger btn-block" data-loading-text="Odesílání...">
          <?php echo $tl["button"]["btn9"]; ?>
        </a>
      </p>
    </div>
  </div>

<?php } ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>
