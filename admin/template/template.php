<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["notification"]["n7"]; ?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php }
if ($page1 == "s1") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["notification"]["n7"]; ?>'
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
        message: '<?php echo $tl["notification"]["n1"]; ?>'
      }, {
        // settings
        type: 'info',
        delay: 5000,
        timer: 3000
      });
    }, 2000);
  </script>
<?php }
if ($page1 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["general_error"]["generror1"]; ?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

<?php if (is_dir_empty('../template/')) { ?>
  <div class="row">
    <div class="col-md-6 col-md-offset-3 error-page">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h1', $tl["notetemplate"]["ntpl"], 'headline text-warning');

      // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
      echo $Html->startTag('div', array('class' => 'error-content'));

      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $Html->addTag('i', '', 'fa fa-warning text-warning') . $tl["notetemplate"]["ntpl2"]);
      echo $Html->addTag('p', $tl["notetemplate"]["ntpl5"]);

      // Add Html Element -> endTag (Arguments: tag)
      echo $Html->endTag('div');
      ?>

    </div>
  </div>
<?php } else { ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="row">
      <?php if (isset($site_style_files) && is_array($site_style_files)) foreach ($site_style_files as $l) {

        if (isset($jkv["cms_tpl"])) {
          $template_addon = true;
        } else {
          $template_addon = false;
        }

        ?>

        <div class="col-sm-6 col-md-12 m-b-20 row-table no-padding">
          <div class="col-md-3 col-table">
            <div class="thumbnail" style="background: rgb(217, 217, 217) none repeat scroll 0% 0%; border: medium none; border-radius: 0px; margin: 0px; padding: 24px;">
              <div class="thumbnail-container">
                <img class="img-responsive" src="../template/<?php echo $l; ?>/preview.jpg" alt="<?php echo $l; ?>"/>
              </div>
            </div>
          </div>
          <div class="col-md-9 col-table" style="background: white none repeat scroll 0% 0%;">
            <div class="caption">
              <h3>

                <?php
                echo $l;
                if (ENVO_TEMPLATE == $l) echo ' <i class="fa fa-check text-success-800"></i>';
                ?>

              </h3>
              <p>
                <?php
                // Content of file
                $file = APP_PATH . '/template/' . $l . "/description.txt";
                if (file_exists($file)) {
                  // File exist, get content
                  $content = file_get_contents($file);
                  echo htmlspecialchars($content);
                } else {
                  // File not exist
                  echo $tl["tpl_box_content"]["tplbc"];
                }
                ?>
              </p>
              <div class="col-md-12">

                <?php
                if (ENVO_TEMPLATE != $l && !$template_addon) {

                  // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                  echo $Html->addButton('submit', $l, $tl["button"]["btn5"], 'btnSave', '', 'btn btn-primary btn-sm m-r-5');

                  if (file_exists('../template/' . $l . '/help.php')) {

                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('../template/' . $l . '/help.php', $tl["button"]["btn6"], '', 'btn btn-info btn-sm m-r-5 tempHelp');

                  }
                } elseif (ENVO_TEMPLATE == $l && file_exists('../template/' . $l . '/install.php') && !$template_addon) {

                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('../template/' . $l . '/install.php', $tl["button"]["btn7"], '', 'btn btn-success btn-sm m-r-5 tempInst');

                  if (file_exists('../template/' . $l . '/help.php')) {

                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('../template/' . $l . '/help.php', $tl["button"]["btn6"], '', 'btn btn-info btn-sm m-r-5 tempHelp');

                  }
                } elseif (ENVO_TEMPLATE == $l && file_exists('../template/' . $l . '/uninstall.php') && $template_addon) {

                  if (file_exists('../template/' . $l . '/styleswitcher.php')) {

                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('index.php?p=template&amp;sp=active&amp;ssp=' . $l, '<i class="fa fa-css3"></i>' . $tl["button"]["btn8"], '', 'btn btn-' . (($jkv["styleswitcher_tpl"]) ? 'success' : 'default') . ' btn-sm m-r-5');

                  }

                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('../template/' . $l . '/uninstall.php', '<i class="fa fa-remove"></i>' . $tl["button"]["btn9"], '', 'btn btn-danger btn-sm m-r-5 tempInst');

                  echo $Html->addAnchor('index.php?p=template&amp;sp=settings', $tl["button"]["btn10"], '', 'btn btn-primary btn-sm m-r-5 ' . ((!file_exists('../template/' . $l . '/templatesettings.php')) ? 'disabled' : ''));

                  if (file_exists('../template/' . $l . '/help.php')) {

                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('../template/' . $l . '/help.php', $tl["button"]["btn6"], '', 'btn btn-info btn-sm tempHelp');

                  }
                } else {
                  ?>

                  <div class="col-md-5">
                    <div class="row">
                      <div class="alert alert-danger" style="width: 100%; padding: 6px 10px; text-align: center;">
                        <?php echo str_replace("%s", ENVO_TEMPLATE, $tl["tpl_box_content"]["tplbc1"]); ?>
                      </div>
                    </div>
                  </div>
                  <?php if (file_exists('../template/' . $l . '/help.php')) { ?>
                    <div class="col-md-2">

                      <?php
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('../template/' . $l . '/help.php', $tl["button"]["btn6"], '', 'btn btn-info btn-sm tempHelp');
                      ?>

                    </div>
                  <?php } ?>

                <?php } ?>

              </div>
            </div>
          </div>
        </div>

      <?php } ?>
    </div>
  </form>

<?php } ?>

<?php include "footer.php"; ?>