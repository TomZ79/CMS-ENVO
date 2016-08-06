<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["general"]["g7"];?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php }
if ($page1 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["errorpage"]["sql"];?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-default">
      <div class="box-header with-border">
        <i class="fa fa-plug"></i>
        <h3 class="box-title"><?php echo $tl["menu"]["m14"]; ?></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <ul class="jak_plugins_move">
          <?php if (isset($JAK_PLUGINS) && is_array($JAK_PLUGINS)) foreach ($JAK_PLUGINS as $v) { ?>

            <li id="plugin-<?php echo $v["id"]; ?>" class="jakplugins">
              <div class="row">
                <div class="col-md-1 text">
                  <span># </span>
                  <a href="index.php?p=plugins&amp;sp=sorthooks&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["id"]; ?></a>
                </div>
                <div class="col-md-2 text plugins-name">
                  <span title="<?php echo $v["description"]; ?>">
                    <?php
                    $name = $v["name"];
                    echo "<strong>" . str_replace('_', ' ', $name) . "</strong>";
                    ?>
                  </span>
                </div>
                <div class="col-md-2 text">
                  <?php if ($v['pluginversion']) {
                    echo '(' . sprintf($tl["general"]["gv"], $v["pluginversion"]) . ')';
                  } ?>
                  <input type="hidden" name="real_id[]" value="<?php echo $v["id"]; ?>"/>
                </div>
                <div class="col-md-1 text text-center">
                  <?php
                  $filename = '../plugins/' . strtolower($v["name"]) . '/help.php';

                  if (file_exists($filename)) {
                    echo "<a class=\"plugHelp\" href=\"" . $filename . "\">" . $tl["title"]["t21"] . "</a>";
                  } else {
                    echo "-";
                  }
                  ?>
                </div>
                <div class="col-md-4 show">
                  <div class="form-group form-inline">
                    <label><?php echo $tl["plugin"]["p2"]; ?></label>
                    <input type="text" class="form-control" name="access[]" value="<?php echo $v["access"]; ?>"/>
                  </div>
                </div>
                <div class="col-md-2 actions">

                  <?php if (isset($site_plugins) && is_array($site_plugins)) foreach ($site_plugins as $p) {
                    if (strtolower($v["pluginpath"]) == strtolower($p)) {

                      $filename = '../plugins/' . $p . '/update.php';

                      if (file_exists($filename) && (strtotime($v["time"]) < filemtime($filename))) {
                        echo '<a class="plugInst btn btn-success btn-xs" href="../plugins/' . $p . '/update.php"><i class="fa fa-clock-o"></i></a>';
                      }

                    }
                  } ?>

                  <a class="btn btn-default btn-xs"
                     href="index.php?p=plugins&amp;sp=sorthooks&amp;ssp=<?php echo $v["id"]; ?>"><i
                      class="fa fa-flag"></i></a>
                  <a class="btn btn-default btn-xs"
                     href="index.php?p=plugins&amp;sp=lock&amp;ssp=<?php echo $v["id"]; ?>"><i
                      class="fa fa-<?php if ($v["active"] == '0') { ?>lock<?php } else { ?>check<?php } ?>"></i></a>
                  <?php if ($v["uninstallfile"]) { ?><a class="plugInst btn btn-danger btn-xs"
                                                        href="../plugins/<?php echo $v["pluginpath"] . '/' . $v["uninstallfile"]; ?>">
                      <i class="fa fa-trash-o"></i></a><?php } ?>

                </div>
              </div>
            </li>

            <?php
// Get the installed plugin in a array
            $installedp[] = strtolower($v["pluginpath"]);
          }
          echo "</ul></div></div>";
          if (isset($site_plugins) && is_array($site_plugins) && isset($installedp) && is_array($installedp)) foreach ($site_plugins as $p) {
            if (!in_array(strtolower($p), $installedp)) { ?>

              <div class="box box-solid">
                <div class="box-header with-border">
                  <i class="fa fa-plug"></i>
                  <h3 class="box-title">
                    <?php echo str_replace('_', ' ', ucfirst($p)); ?>
                  </h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <div class="col-md-8">
                    <table width="100%">
                      <tr>
                        <td class="col-md-5"><?php echo $tl["general"]["g70"]; ?>:
                          <a class="plugInst" href="../plugins/<?php echo $p; ?>/install.php"><?php echo str_replace('_', ' ', ucfirst($p)); ?></a>
                        </td>
                        <td class="col-md-7"><?php echo $tl["title"]["t21"]; ?>:
                          <?php
                          $filename = '../plugins/' . $p . '/help.php';

                          if (file_exists($filename)) {
                            echo "<a class=\"plugHelp\" href=\"" . $filename . "\">" . str_replace('_', ' ', ucfirst($p)) . "</a>";
                          } else {
                            echo "The file with HELP does not exist";
                          }
                          ?>
                        </td>
                      </tr>
                    </table>
                  </div>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            <?php }
          } ?>
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title"><?php echo $tl["title"]["t28"]; ?></h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <table class="table table-striped">
                <tr>
                  <td><?php echo $tl["plugin"]["p"]; ?></td>
                  <td><input type="text" name="jak_generala" class="form-control"
                             value="<?php echo $jkv["accessgeneral"]; ?>"/></td>
                </tr>
                <tr>
                  <td><?php echo $tl["plugin"]["p1"]; ?></td>
                  <td><input type="text" name="jak_managea" class="form-control"
                             value="<?php echo $jkv["accessmanage"]; ?>"/></td>
                </tr>
              </table>
            </div>
            <div class="box-footer">
              <button type="submit" name="save"
                      class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
            </div>
          </div>
  </form>

  <div class="icon_legend">
    <h3><?php echo $tl["icons"]["i"]; ?></h3>
    <i title="<?php echo $tl["icons"]["i12"]; ?>" class="fa fa-clock-o"></i>
    <i title="<?php echo $tl["icons"]["i13"]; ?>" class="fa fa-flag"></i>
    <i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
    <i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
    <i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
  </div>

  <script src="js/pluginorder.js" type="text/javascript"></script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('.plugInst').on('click', function (e) {
        e.preventDefault();
        frameSrc = $(this).attr("href");
        $('#JAKModalLabel').html("<?php echo ucwords($page);?>");
        $('#JAKModal').on('show.bs.modal', function () {
          $('<iframe src="' + frameSrc + '" width="100%" height="210" frameborder="0">').appendTo('.modal-body');
        });
        $('#JAKModal').on('hidden.bs.modal', function () {
          $(this).removeData();
          window.location.reload();
        });
        $('#JAKModal').modal({show: true});
      });

      $('.plugHelp').on('click', function (e) {
        e.preventDefault();
        frameSrc = $(this).attr("href");
        $('#JAKModalLabel').html("<?php echo ucwords($page);?>");
        $('#JAKModal').on('show.bs.modal', function () {
          $('<iframe src="' + frameSrc + '" width="100%" height="400" frameborder="0">').appendTo('.modal-body');
        });
        $('#JAKModal').on('hidden.bs.modal', function () {
          $(this).removeData();
          window.location.reload();
        });
        $('#JAKModal').modal({show: true});
      });
    });
  </script>

<?php include "footer.php"; ?>