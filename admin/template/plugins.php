<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["notification"]["n7"];?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php }
if ($page1 == "e") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["general_error"]["generror1"];?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="row tab-content-singel">
      <div class="col-sm-12">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tl["plug_box_title"]["plugbt1"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="block">
              <div class="block-content">
                <div class="row-form">
                  <div class="col-sm-5">
                    <div class="row">
                      <div class="col-sm-4">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["plug_box_content"]["plugbc4"]);
                        ?>

                      </div>
                      <div class="col">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_generala', $setting["accessgeneral"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="col-sm-2"></div>
                  <div class="col-sm-5">
                    <div class="row">
                      <div class="col-sm-4">

                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', $tl["plug_box_content"]["plugbc5"]);
                        ?>

                      </div>
                      <div class="col">

                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_managea', $setting["accessmanage"], '', 'form-control');
                        ?>

                      </div>
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
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('i', '', 'fa fa-plug');
            echo $Html->addTag('h3', $tl["plug_box_title"]["plugbt"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <ul class="envo_plugins_move">
              <?php if (isset($ENVO_PLUGINS) && is_array($ENVO_PLUGINS)) foreach ($ENVO_PLUGINS as $v) { ?>

                <li id="plugin-<?php echo $v["id"]; ?>" class="envoplugins">
                  <div class="row sm-m-0">
                    <div class="col-sm-1 col-3 text">
                      <span># </span>
                      <a href="index.php?p=plugins&amp;sp=hooks&amp;ssp=sorthooks&amp;id=<?php echo $v["id"]; ?>"><?php echo $v["id"]; ?></a>
                    </div>
                    <div class="col-sm-2 col-5 text plugins-name">
											<span title="<?php echo $v["description"]; ?>">

												<?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('strong', str_replace('_', ' ', $v["name"]));
                        ?>

											</span>
                    </div>
                    <div class="col-sm-2 col-4 text">
                      <?php if ($v['pluginversion']) {
                        echo '(' . sprintf($tl["plug_box_content"]["plugbc6"], $v["pluginversion"]) . ')';
                      }
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('hidden', 'real_id[]', $v["id"], '', '');
                      ?>

                    </div>
                    <div class="col-sm-1 hidden-xs text text-center">
                      <?php
                      $filename = '../plugins/' . strtolower($v["name"]) . '/help/help_' . $site_language . '.php';

                      if (file_exists($filename)) {
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor($filename, $tl["plug_box_content"]["plugbc2"], '', 'plugHelp');
                      } else {
                        echo "-";
                      }
                      ?>
                    </div>
                    <div class="col-sm-4 hidden-xs show">
                      <div class="form-group form-inline">

                        <?php
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('', $tl["plug_box_content"]["plugbc"]);
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'access[]', $v["access"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                    <div class="col-sm-2 hidden-xs actions">

                      <?php

                      if (isset($site_plugins) && is_array($site_plugins)) foreach ($site_plugins as $p) {
                        if (strtolower($v["pluginpath"]) == strtolower($p)) {

                          $filename = '../plugins/' . $p . '/update.php';
                          
                          if (file_exists($filename)) {

                            echo '<a class="plugInst btn btn-success btn-xs" href="../plugins/' . $p . '/update.php" data-toggle="tooltip" data-placement="bottom" title="' . $tl["icons"]["i12"] . '"><i class="fa fa-clock-o"></i></a>';

                            clearstatcache();
                          }

                        }
                      }

                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=sorthooks&amp;id=' . $v["id"], '<i class="fa fa-flag"></i>', '', 'btn btn-default btn-xs m-l-5', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i13"]));

                      echo $Html->addAnchor('index.php?p=plugins&amp;sp=lock&amp;id=' . $v["id"], '<i class="fa fa-' . (($v["active"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs m-l-5', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => ($v["active"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));

                      if ($v["uninstallfile"]) {
                        echo $Html->addAnchor('../plugins/' . $v["pluginpath"] . '/' . $v["uninstallfile"], '<i class="fa fa-remove"></i>', '', 'plugInst btn btn-danger btn-xs m-l-5', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i33"]));

                      }

                      clearstatcache();
                      ?>

                    </div>
                  </div>
                </li>

                <?php
                // Get the installed plugin in a array
                $installedp[] = strtolower($v["pluginpath"]);
              } ?>
            </ul>
          </div>
        </div>
        <?php if (isset($site_plugins) && is_array($site_plugins) && isset($installedp) && is_array($installedp)) foreach ($site_plugins as $p) {
          if (!in_array(strtolower($p), $installedp)) { ?>

            <div class="box box-default box-solid">
              <div class="box-header with-border">

                <?php
                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                echo $Html->addTag('i', '', 'fa fa-plug');
                echo $Html->addTag('h3', str_replace('_', ' ', ucfirst($p)), 'box-title');
                ?>

              </div>
              <div class="box-body">
                <div class="block">
                  <div class="block-content">
                    <div class="row-form">
                      <div class="col-sm-3 col-sm-6">

                        <?php
                        echo $tl["plug_box_content"]["plugbc1"] . ' : ';
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('../plugins/' . $p . '/install.php', str_replace('_', ' ', ucfirst($p)), '', 'plugInst');
                        ?>

                      </div>
                      <div class="col-sm-9 col-sm-6">

                        <?php
                        echo $tl["plug_box_content"]["plugbc2"] . ' : ';

                        $filename = '../plugins/' . $p . '/help/help_' . $site_language . '.php';

                        if (file_exists($filename)) {
                          echo "<a class=\"plugHelp\" href=\"" . $filename . "\">" . str_replace('_', ' ', ucfirst($p)) . "</a>";
                        } else {
                          echo $tl["plug_box_content"]["plugbc3"];
                        }
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php }
        } ?>

      </div>
    </div>
  </form>

  <div class="col-sm-12 m-b-30">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-clock-o', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i12"]));
      echo $Html->addTag('i', '', 'fa fa-flag', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i13"]));
      echo $Html->addTag('i', '', 'fa fa-check', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i6"]));
      echo $Html->addTag('i', '', 'fa fa-lock', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i5"]));
      echo $Html->addTag('i', '', 'fa fa-remove', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i33"]));
      ?>

    </div>
  </div>

<?php include "footer.php"; ?>