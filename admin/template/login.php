<?php include "header.php"; ?>

  <div class="login-wrapper ">
    <!-- START Login Background Pic Wrapper-->
    <div class="bg-pic">
      <!-- START Background Pic-->
      <img src="assets/img/demo/broadband_in_space.jpg" data-src="assets/img/demo/broadband_in_space.jpg" data-src-retina="assets/img/demo/broadband_in_space.jpg" alt="" class="lazy">
      <!-- END Background Pic-->
      <!-- START Background Caption-->
      <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">

        <?php
        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
        echo $Html->addTag('h2', $tl["log_in"]["login9"], 'semi-bold text-white');
        echo $Html->addTag('p', $tl["log_in"]["login10"], 'small');
        ?>

      </div>
      <!-- END Background Caption-->
    </div>
    <!-- END Login Background Pic Wrapper-->
    <!-- START Login Right Container-->
    <div class="login-container bg-white">
      <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
        <img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">

        <div class="loginF p-t-35">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('h4', $tl["log_in"]["login"], '');
          ?>

          <form id="form-login" class="p-t-15" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
            <div class="row justify-content-center">
              <div class="col-sm-12 col-12 no-padding">
                <div class="form-group form-group-default">

                  <?php
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addLabel('', $tl["log_in"]["login1"]);
                  ?>

                  <div class="controls">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'username', '', 'username', 'form-control', array('placeholder' => $tl["placeholder"]["p10"], 'required' => 'required'));
                    ?>

                  </div>
                </div>
                <div class="form-group form-group-default">

                  <?php
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addLabel('', $tl["log_in"]["login2"]);
                  ?>

                  <div class="controls">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('password', 'password', '', 'password', 'form-control', array('placeholder' => $tl["placeholder"]["p11"], 'required' => 'required'));
                    ?>

                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-6 no-padding">
                <div class="checkbox check-success" style="margin-left: -15px;">

                  <?php
                  // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addCheckbox('lcookies', '', false, 'remember');
                  echo $Html->addLabel('remember', $tl["log_in"]["login3"]);
                  ?>

                </div>
              </div>
              <div class="col-sm-6 col-6 no-padding text-right">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('#', $tl["log_in"]["login4"], '', 'lost-pwd');
                ?>

              </div>
            </div>

            <?php
            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
            echo $Html->addInput('hidden', 'action', 'login');
            // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
            echo $Html->addButtonSubmit('logID', $tl["button"]["btn28"], '', 'btn btn-primary btn-cons m-t-10');
            ?>

          </form>
        </div>

        <div class="forgotP p-t-35 hide">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('h4', $tl["log_in"]["login6"], '');
          ?>

          <form id="form-email" class="p-t-15" method="post" action="<?=$_SERVER['REQUEST_URI']?>">
            <div class="row justify-content-center">
              <div class="col-sm-12 col-12 no-padding">
                <div class="form-group form-group-default">

                  <?php
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addLabel('', $tl["log_in"]["login7"]);
                  ?>

                  <div class="controls">

                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('email', 'email', '', 'email', 'form-control', array('placeholder' => $tl["placeholder"]["p12"], 'required' => 'required'));
                    ?>

                  </div>
                </div>
              </div>
            </div>

            <?php
            // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
            echo $Html->addButtonSubmit('forgotP', $tl["button"]["btn26"], '', 'btn btn-info btn-block m-t-20');
            ?>

          </form>
          <hr>
          <button class="btn btn-block btn-warning lost-pwd" type="button">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('span', '<i class="fa fa-lightbulb-o"></i>', 'pull-left');
            echo $Html->addTag('span', $tl["button"]["btn27"], 'bold');
            ?>

          </button>
        </div>

        <!--END Login Form-->
        <div class="pull-bottom sm-pull-bottom">
          <div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
            <div class="col-sm-12 no-padding m-t-10">

              <?php
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor(BASE_URL_ORIG, '<i class="fa  fa-chevron-left m-r-10"></i>' . $tl["log_in"]["login8"], '', 'back-to-home');
              ?>

            </div>
          </div>
        </div>

      </div>
    </div>
    <!-- END Login Right Container-->
  </div>

<?php include "footer.php"; ?>