<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if (isset($succes1)) { ?>
  <script type="text/javascript">
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $succes1; ?>'
      }, {
        // settings
        type: 'success',
        delay: 7000
      });
    }, 1000);
  </script>
<?php }
if (isset($error1)) { ?>
  <script type="text/javascript">
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $error1; ?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php }
if (isset($error2)) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $error2; ?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

<?php if (isset($xml_result)) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo $tlxml["xml_notification"]["xmlnot"]; ?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);

    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo $tlxml["xml_notification"]["xmlnot1"] . BASE_URL_ORIG . $XMLSEOPATH; ?>sitemap.xml'
      }, {
        // settings
        type: 'warning',
        delay: 5000,
        timer: 3000
      });
    }, 2000);
  </script>

  <div>
    <p><strong><?php echo $tlxml["xml_box_content"]["xmlbc23"]; ?></strong></p>
    <pre style="overflow: auto; max-height: 30em; white-space: pre;"><code class="language-xml"><?php echo htmlentities($xml_result); ?></code></pre>
  </div>
<?php } else { ?>


  <script>
    var sfw;
    $(document).ready(function () {
      sfw = $("#wizard_example").stepFormWizard({});
    })
    $(window).load(function () {
      /* only if you want use mcustom scrollbar */
      $(".sf-wizard fieldset").mCustomScrollbar({
        theme: "dark-3",
        scrollButtons: {
          enable: true
        }
      });
      /* ***************************************/

      /* this function call can help with broken layout after loaded images or fonts */
      sfw.refresh();
    });
  </script>

  <style>
    pre {
      margin: 45px 0 60px;
    }

    h2 {
      margin: 60px 0 30px 0;
    }

    p {
      margin-bottom: 10px;
    }
  </style>
  </head>
  <body>


  <div class="row">
    <div class="col-md-12">


      <form id="wizard_example" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <fieldset style="height: 300px;">
          <legend>Basic information</legend>
          <h4><?php echo $tlxml["xml_box_content"]["xmlbc3"]; ?></h4>
          <table class="table no-border">
            <tr>
              <td class="form-inline">
                <label for="folder"><?php echo BASE_URL_ORIG; ?></label>
                <input type="text" name="jak_xmlseopath" id="folder" value="<?php echo $XMLSEOPATH; ?>" class="form-control"/>
                sitemap.xml
              </td>
            </tr>
          </table>

        </fieldset>
        <fieldset>
          <legend>Condition</legend>
          <?php
          // Content of file
          $file = APP_PATH . "robots.txt";
          if (file_exists($file)) {
            // File exist, get content
            $content = file_get_contents($file);
          } else {
            // File not exist, create new file
            file_put_contents($file, '');
          }
          ?>
          <h4><?php echo $tlxml["xml_box_content"]["xmlbc4"]; ?></h4>
          <div class="form-group">
            <label><?php echo $tlxml["xml_box_content"]["xmlbc5"]; ?></label>
            <textarea name="jak_filetxt" rows="8" placeholder="<?php echo $tlxml["xml_box_content"]["xmlbc6"]; ?>" class="form-control"><?php echo htmlspecialchars($content); ?></textarea>
          </div>
          <div>
            <p><?php echo $tlxml["xml_box_content"]["xmlbc7"]; ?></p>
            <pre class="code"></pre>
          </div>
          <p>
            <a href="http://www.sitemaps.org/protocol.html#informing" target="_blank"><?php echo $tlxml["xml_box_content"]["xmlbc8"]; ?></a>
          </p>
        </fieldset>
        <fieldset>
          <legend>Final step</legend>
          <h4><?php echo $tlxml["xml_box_content"]["xmlbc24"]; ?></h4>
          <table class="table table-striped">
            <tbody>
            <tr>
              <td style="vertical-align: middle;"><?php echo $tlxml["xml_box_content"]["xmlbc9"]; ?></td>
              <td>
                <select name="jak_frepages" class="form-control" data-size="3">

                  <?php
                  // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                  echo $Html->addOption('always', $tlxml["xml_box_content"]["xmlbc12"], ($FREQUENCYPAGES == "always") ? TRUE : FALSE);
                  echo $Html->addOption('hourly', $tlxml["xml_box_content"]["xmlbc13"], ($FREQUENCYPAGES == "hourly") ? TRUE : FALSE);
                  echo $Html->addOption('daily', $tlxml["xml_box_content"]["xmlbc14"], ($FREQUENCYPAGES == "daily") ? TRUE : FALSE);
                  echo $Html->addOption('weekly', $tlxml["xml_box_content"]["xmlbc15"], ($FREQUENCYPAGES == "weekly") ? TRUE : FALSE);
                  echo $Html->addOption('monthly', $tlxml["xml_box_content"]["xmlbc16"], ($FREQUENCYPAGES == "monthly") ? TRUE : FALSE);
                  echo $Html->addOption('yearly', $tlxml["xml_box_content"]["xmlbc17"], ($FREQUENCYPAGES == "yearly") ? TRUE : FALSE);
                  echo $Html->addOption('never', $tlxml["xml_box_content"]["xmlbc18"], ($FREQUENCYPAGES == "never") ? TRUE : FALSE);
                  ?>

                </select>
              </td>
            </tr>
            <tr>
              <td style="vertical-align: middle;"><?php echo $tlxml["xml_box_content"]["xmlbc10"]; ?></td>
              <td>
                <select name="jak_freblog" class="form-control" data-size="3">

                  <?php
                  // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                  echo $Html->addOption('always', $tlxml["xml_box_content"]["xmlbc12"], ($FREQUENCYBLOG == "always") ? TRUE : FALSE);
                  echo $Html->addOption('hourly', $tlxml["xml_box_content"]["xmlbc13"], ($FREQUENCYBLOG == "hourly") ? TRUE : FALSE);
                  echo $Html->addOption('daily', $tlxml["xml_box_content"]["xmlbc14"], ($FREQUENCYBLOG == "daily") ? TRUE : FALSE);
                  echo $Html->addOption('weekly', $tlxml["xml_box_content"]["xmlbc15"], ($FREQUENCYBLOG == "weekly") ? TRUE : FALSE);
                  echo $Html->addOption('monthly', $tlxml["xml_box_content"]["xmlbc16"], ($FREQUENCYBLOG == "monthly") ? TRUE : FALSE);
                  echo $Html->addOption('yearly', $tlxml["xml_box_content"]["xmlbc17"], ($FREQUENCYBLOG == "yearly") ? TRUE : FALSE);
                  echo $Html->addOption('never', $tlxml["xml_box_content"]["xmlbc18"], ($FREQUENCYBLOG == "never") ? TRUE : FALSE);
                  ?>

                </select>
              </td>
            </tr>
            <tr>
              <td style="vertical-align: middle;"><?php echo $tlxml["xml_box_content"]["xmlbc11"]; ?></td>
              <td>
                <select name="jak_fredownload" class="form-control selectpicker" data-size="3">

                  <?php
                  // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                  echo $Html->addOption('always', $tlxml["xml_box_content"]["xmlbc12"], ($FREQUENCYDOWNLOAD == "always") ? TRUE : FALSE);
                  echo $Html->addOption('hourly', $tlxml["xml_box_content"]["xmlbc13"], ($FREQUENCYDOWNLOAD == "hourly") ? TRUE : FALSE);
                  echo $Html->addOption('daily', $tlxml["xml_box_content"]["xmlbc14"], ($FREQUENCYDOWNLOAD == "daily") ? TRUE : FALSE);
                  echo $Html->addOption('weekly', $tlxml["xml_box_content"]["xmlbc15"], ($FREQUENCYDOWNLOAD == "weekly") ? TRUE : FALSE);
                  echo $Html->addOption('monthly', $tlxml["xml_box_content"]["xmlbc16"], ($FREQUENCYDOWNLOAD == "monthly") ? TRUE : FALSE);
                  echo $Html->addOption('yearly', $tlxml["xml_box_content"]["xmlbc17"], ($FREQUENCYDOWNLOAD == "yearly") ? TRUE : FALSE);
                  echo $Html->addOption('never', $tlxml["xml_box_content"]["xmlbc18"], ($FREQUENCYDOWNLOAD == "never") ? TRUE : FALSE);
                  ?>

                </select>
              </td>
            </tr>
            </tbody>
          </table>
        </fieldset>
      </form>
    </div>
  </div>


  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('h3', $tlxml["xml_box_title"]["xmlbt"], 'box-title');
          ?>

        </div>
        <div class="box-body">
          <form id="xmlseo-wizard" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

            <?php
            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
            echo $Html->addInput('hidden', 'action', 'form1');
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlxml["xml_box_content"]["xmlbc"]);
            ?>

            <section>
              <h4><?php echo $tlxml["xml_box_content"]["xmlbc3"]; ?></h4>
              <table class="table no-border">
                <tr>
                  <td class="form-inline">
                    <label for="folder"><?php echo BASE_URL_ORIG; ?></label>
                    <input type="text" name="jak_xmlseopath" id="folder" value="<?php echo $XMLSEOPATH; ?>" class="form-control"/>
                    sitemap.xml
                  </td>
                </tr>
              </table>
            </section>

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlxml["xml_box_content"]["xmlbc1"]);
            ?>

            <section>

              <?php
              // Content of file
              $file = APP_PATH . "robots.txt";
              if (file_exists($file)) {
                // File exist, get content
                $content = file_get_contents($file);
              } else {
                // File not exist, create new file
                file_put_contents($file, '');
              }
              ?>
              <h4><?php echo $tlxml["xml_box_content"]["xmlbc4"]; ?></h4>
              <div class="form-group">
                <label><?php echo $tlxml["xml_box_content"]["xmlbc5"]; ?></label>
                <textarea name="jak_filetxt" rows="8" placeholder="<?php echo $tlxml["xml_box_content"]["xmlbc6"]; ?>" class="form-control"><?php echo htmlspecialchars($content); ?></textarea>
              </div>
              <div>
                <p><?php echo $tlxml["xml_box_content"]["xmlbc7"]; ?></p>
                <pre class="code"></pre>
              </div>
              <p>
                <a href="http://www.sitemaps.org/protocol.html#informing" target="_blank"><?php echo $tlxml["xml_box_content"]["xmlbc8"]; ?></a>
              </p>
            </section>

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlxml["xml_box_content"]["xmlbc2"]);
            ?>

            <section>
              <h4><?php echo $tlxml["xml_box_content"]["xmlbc24"]; ?></h4>
              <table class="table table-striped">
                <tbody>
                <tr>
                  <td style="vertical-align: middle;"><?php echo $tlxml["xml_box_content"]["xmlbc9"]; ?></td>
                  <td>
                    <select name="jak_frepages" class="form-control" data-size="3">

                      <?php
                      // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                      echo $Html->addOption('always', $tlxml["xml_box_content"]["xmlbc12"], ($FREQUENCYPAGES == "always") ? TRUE : FALSE);
                      echo $Html->addOption('hourly', $tlxml["xml_box_content"]["xmlbc13"], ($FREQUENCYPAGES == "hourly") ? TRUE : FALSE);
                      echo $Html->addOption('daily', $tlxml["xml_box_content"]["xmlbc14"], ($FREQUENCYPAGES == "daily") ? TRUE : FALSE);
                      echo $Html->addOption('weekly', $tlxml["xml_box_content"]["xmlbc15"], ($FREQUENCYPAGES == "weekly") ? TRUE : FALSE);
                      echo $Html->addOption('monthly', $tlxml["xml_box_content"]["xmlbc16"], ($FREQUENCYPAGES == "monthly") ? TRUE : FALSE);
                      echo $Html->addOption('yearly', $tlxml["xml_box_content"]["xmlbc17"], ($FREQUENCYPAGES == "yearly") ? TRUE : FALSE);
                      echo $Html->addOption('never', $tlxml["xml_box_content"]["xmlbc18"], ($FREQUENCYPAGES == "never") ? TRUE : FALSE);
                      ?>

                    </select>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: middle;"><?php echo $tlxml["xml_box_content"]["xmlbc10"]; ?></td>
                  <td>
                    <select name="jak_freblog" class="form-control" data-size="3">

                      <?php
                      // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                      echo $Html->addOption('always', $tlxml["xml_box_content"]["xmlbc12"], ($FREQUENCYBLOG == "always") ? TRUE : FALSE);
                      echo $Html->addOption('hourly', $tlxml["xml_box_content"]["xmlbc13"], ($FREQUENCYBLOG == "hourly") ? TRUE : FALSE);
                      echo $Html->addOption('daily', $tlxml["xml_box_content"]["xmlbc14"], ($FREQUENCYBLOG == "daily") ? TRUE : FALSE);
                      echo $Html->addOption('weekly', $tlxml["xml_box_content"]["xmlbc15"], ($FREQUENCYBLOG == "weekly") ? TRUE : FALSE);
                      echo $Html->addOption('monthly', $tlxml["xml_box_content"]["xmlbc16"], ($FREQUENCYBLOG == "monthly") ? TRUE : FALSE);
                      echo $Html->addOption('yearly', $tlxml["xml_box_content"]["xmlbc17"], ($FREQUENCYBLOG == "yearly") ? TRUE : FALSE);
                      echo $Html->addOption('never', $tlxml["xml_box_content"]["xmlbc18"], ($FREQUENCYBLOG == "never") ? TRUE : FALSE);
                      ?>

                    </select>
                  </td>
                </tr>
                <tr>
                  <td style="vertical-align: middle;"><?php echo $tlxml["xml_box_content"]["xmlbc11"]; ?></td>
                  <td>
                    <select name="jak_fredownload" class="form-control selectpicker" data-size="3">

                      <?php
                      // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                      echo $Html->addOption('always', $tlxml["xml_box_content"]["xmlbc12"], ($FREQUENCYDOWNLOAD == "always") ? TRUE : FALSE);
                      echo $Html->addOption('hourly', $tlxml["xml_box_content"]["xmlbc13"], ($FREQUENCYDOWNLOAD == "hourly") ? TRUE : FALSE);
                      echo $Html->addOption('daily', $tlxml["xml_box_content"]["xmlbc14"], ($FREQUENCYDOWNLOAD == "daily") ? TRUE : FALSE);
                      echo $Html->addOption('weekly', $tlxml["xml_box_content"]["xmlbc15"], ($FREQUENCYDOWNLOAD == "weekly") ? TRUE : FALSE);
                      echo $Html->addOption('monthly', $tlxml["xml_box_content"]["xmlbc16"], ($FREQUENCYDOWNLOAD == "monthly") ? TRUE : FALSE);
                      echo $Html->addOption('yearly', $tlxml["xml_box_content"]["xmlbc17"], ($FREQUENCYDOWNLOAD == "yearly") ? TRUE : FALSE);
                      echo $Html->addOption('never', $tlxml["xml_box_content"]["xmlbc18"], ($FREQUENCYDOWNLOAD == "never") ? TRUE : FALSE);
                      ?>

                    </select>
                  </td>
                </tr>
                </tbody>
              </table>
            </section>
          </form>
        </div>
        <div class="box-footer">

        </div>
      </div>
    </div>
  </div>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="row">
      <div class="col-md-12">

        <?php
        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
        echo $Html->addInput('hidden', 'action', 'form2');
        ?>

        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlxml["xml_box_title"]["xmlbt1"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <table class="table table-striped first-column">
              <tr>
                <td><?php echo $tlxml["xml_box_content"]["xmlbc19"]; ?></td>
                <td><?php echo $XMLSEODATE; ?></td>
              </tr>
            </table>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-block btn-primary"><?php echo $tlxml["xml_box_content"]["xmlbc20"]; ?></button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="row">
      <div class="col-md-12">

        <?php
        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
        echo $Html->addInput('hidden', 'action', 'form3');
        ?>

        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tlxml["xml_box_title"]["xmlbt2"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <?php if (!isset($contentxml)) { ?>
              <div class="margin-bottom-10">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('submit_one', $tlxml["xml_box_content"]["xmlbc21"], '', 'btn btn-block btn-primary');
                ?>

              </div>
            <?php } else { ?>
              <div class="margin-bottom-10">

                <?php
                // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
                echo $Html->addButtonSubmit('submit_two', $tlxml["xml_box_content"]["xmlbc22"], '', 'btn btn-block btn-primary');
                ?>

              </div>
              <div>

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('p', $Html->addTag('strong', $tlxml["xml_box_content"]["xmlbc23"]));
                ?>

                <pre style="overflow: auto; max-height: 30em; white-space: pre;"><code class="language-xml"><?php echo htmlentities($contentxml); ?></code></pre>
              </div>
            <?php } ?>
          </div>
          <div class="box-footer">

          </div>
        </div>
      </div>
    </div>
  </form>
  <?php } ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>