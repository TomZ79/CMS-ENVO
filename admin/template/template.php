<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
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
if ($page1 == "s1") { ?>
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

    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?=$tl["notification"]["n1"]?>'
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
<?php } ?>

<?php if (is_dir_empty('../template/')) { ?>
  <div class="row">
    <div class="col-sm-6 col-sm-offset-3 error-page">

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

  <form method="post" action="<?=$_SERVER['REQUEST_URI']?>">
    <div class="row row-eq-height">
      <?php if (isset($site_style_files) && is_array($site_style_files)) foreach ($site_style_files as $l) {

        // EN:
        // CZ:
        if (isset($setting["cms_tpl"])) {
          $template_addon = TRUE;
        } else {
          $template_addon = FALSE;
        }

        // EN: Load the language file for description of template
        // CZ: Načtení jazykového souboru pro popis šablony
        if (file_exists(APP_PATH . '/template/' . $l . '/lang/' . $site_language . '.ini')) {
          $tltpl = parse_ini_file(APP_PATH . '/template/' . $l . '/lang/' . $site_language . '.ini', TRUE);
        } else {
          $tltpl = parse_ini_file(APP_PATH . '/template/' . $l . '/lang//en.ini', TRUE);
        }

        ?>

        <div class="col-12 col-sm-6 m-b-30">
          <div class="text-center" style="background: rgb(217, 217, 217); padding: 24px;">
            <img class="img-fluid" src="/template/<?=$l?>/preview.jpg" alt="<?=$l?>"/>
          </div>
          <div class="p-3 bg-white">
            <div>
              <h3>

                <?php
                // Show name of template
                echo $tltpl["tplinfo"]["tplname"];
                // Active/Inactive template
                if (ENVO_TEMPLATE == $l) echo ' <i class="fa fa-check text-success-800"></i>';
                ?>

              </h3>
              <p>
                <strong>Version: </strong> <?=$tltpl["tplinfo"]["tplversion"]?>
                <strong class="m-l-30">Author: </strong> <?=$tltpl["tplinfo"]["tplauthor"]?>
                <strong class="m-l-30">Technology: </strong> <?=$tltpl["tplinfo"]["tpltech"]?>
              </p>
              <hr>
            </div>
            <div>

              <?php
              // Show Description of template
              echo '<p>' . $tltpl["tpldesc"]["tpldesc"] . '</p>';
              ?>

              <hr>
            </div>
            <div class="row">

              <?php
              if (ENVO_TEMPLATE != $l && !$template_addon) {

                // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                echo $Html->addButton('submit', $l, $tl["button"]["btn5"], 'btnSave', '', 'btn btn-primary btn-sm mr-1', array('data-loading-text' => $tl["button"]["btn41"]));

                if (file_exists('../template/' . $l . '/help/cmshelp_' . $site_language . '.php')) {

                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('../template/' . $l . '/help/cmshelp_' . $site_language . '.php', $tl["button"]["btn6"], '', 'btn btn-info btn-sm mr-1 tempHelp');

                }
              } elseif (ENVO_TEMPLATE == $l && file_exists('../template/' . $l . '/install.php') && !$template_addon) {

                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('../template/' . $l . '/install.php', $tl["button"]["btn7"], '', 'btn btn-success btn-sm mr-1 tempInst');

                if (file_exists('../template/' . $l . '/help/cmshelp_' . $site_language . '.php')) {

                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('../template/' . $l . '/help/cmshelp_' . $site_language . '.php', $tl["button"]["btn6"], '', 'btn btn-info btn-sm mr-1 tempHelp');

                }
              } elseif (ENVO_TEMPLATE == $l && file_exists('../template/' . $l . '/uninstall.php') && $template_addon) {

                if (file_exists('../template/' . $l . '/styleswitcher.php')) {

                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('index.php?p=template&amp;sp=active&amp;ssp=' . $l, '<i class="fa fa-css3"></i>' . $tl["button"]["btn8"], '', 'btn btn-' . (($setting["styleswitcher_tpl"]) ? 'success' : 'default') . ' btn-sm mr-1');

                }

                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('../template/' . $l . '/uninstall.php', $tl["button"]["btn9"], '', 'btn btn-danger btn-sm mr-1 tempInst');

                echo $Html->addAnchor('index.php?p=template&amp;sp=settings', $tl["button"]["btn10"], '', 'btn btn-primary btn-sm mr-1 ' . ((!file_exists('../template/' . $l . '/templatesettings.php')) ? 'disabled' : ''));

                if (file_exists('../template/' . $l . '/help/cmshelp_' . $site_language . '.php')) {

                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('../template/' . $l . '/help/cmshelp_' . $site_language . '.php', $tl["button"]["btn6"], '', 'btn btn-info btn-sm tempHelp');

                }
              } else {
                ?>

                <div class="col-9">
                  <div class="alert alert-danger text-center" style="width: 100%; padding: 7px 10px; margin: 0;">
                    <?=str_replace("%s", ENVO_TEMPLATE, $tl["tpl_box_content"]["tplbc1"])?>
                  </div>
                </div>
                <?php if (file_exists('../template/' . $l . '/help/cmshelp_' . $site_language . '.php')) { ?>
                  <div class="col-3">

                    <?php
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('../template/' . $l . '/help/cmshelp_' . $site_language . '.php', $tl["button"]["btn6"], '', 'btn btn-info btn-sm tempHelp');
                    ?>

                  </div>
                <?php } ?>

              <?php } ?>

            </div>
          </div>
        </div>

      <?php } ?>
    </div>
  </form>

<?php } ?>

<?php include "footer.php"; ?>