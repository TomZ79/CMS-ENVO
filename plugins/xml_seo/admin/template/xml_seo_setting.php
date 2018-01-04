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
        type: 'danger',
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
        type: 'danger',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

  <div class="row">
    <div class="col-sm-12">

      <form id="wizard_example" class="m-b-30" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <fieldset>
          <legend>

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlxml["xml_box_content"]["xmlbc"]);
            ?>

          </legend>
          <div class="row">
            <div class="col-lg-12">
              <table class="table no-border">
                <tr>
                  <td class="form-inline">
                    <label for="folder"><?php echo BASE_URL_ORIG; ?></label>
                    <input type="text" name="envo_xmlseopath" id="folder" value="<?php echo $XMLSEOPATH; ?>" class="form-control"/>
                    sitemap.xml
                  </td>
                </tr>
              </table>
            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlxml["xml_box_content"]["xmlbc1"]);
            ?>

          </legend>
          <div class="row">
            <div class="col-lg-12">

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

              <div class="form-group">
                <label><?php echo $tlxml["xml_box_content"]["xmlbc5"]; ?></label>
                <textarea id="envo_filetxt" name="envo_filetxt" rows="8" placeholder="<?php echo $tlxml["xml_box_content"]["xmlbc6"]; ?>" class="form-control"><?php echo htmlspecialchars($content); ?></textarea>
              </div>
              <div>
                <p><?php echo $tlxml["xml_box_content"]["xmlbc7"]; ?></p>
                <pre id="sitemapcode" class="code"></pre>
              </div>
              <p>
                <a href="http://www.sitemaps.org/protocol.html#informing" target="_blank"><?php echo $tlxml["xml_box_content"]["xmlbc8"]; ?></a>
              </p>

            </div>
          </div>
        </fieldset>
        <fieldset>
          <legend>

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlxml["xml_box_content"]["xmlbc2"]);
            ?>

          </legend>
          <div class="row">
            <div class="col-lg-12">
              <table class="table table-striped">
                <tbody>
                <tr>
                  <td style="vertical-align: middle;"><?php echo $tlxml["xml_box_content"]["xmlbc9"]; ?></td>
                  <td>
                    <select name="envo_frepages" class="form-control selectpicker">

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
                    <select name="envo_freblog" class="form-control selectpicker">

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
                    <select name="envo_fredownload" class="form-control selectpicker">

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
            </div>
          </div>
        </fieldset>
      </form>

    </div>
  </div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
