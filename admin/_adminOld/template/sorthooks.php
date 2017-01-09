<?php include "header.php"; ?>

<?php if ($page2 == "s") { ?>
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
if ($page2 == "e" || $page2 == "edn") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo($page2 == "e" ? $tl["errorpage"]["sql"] : $tl["errorpage"]["plugin"]);?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <div class="btn-toolbar margin-bottom">
    <div class="btn-group">

      <button class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#" style="width: 100px;"><?php echo $tl["button"]["btn4"]; ?>
        <span class="caret"></span>
      </button>
      <div class="dropdown-menu livefilter">
        <div class="search-box">
          <input type="text" placeholder="<?php echo $tl["placeholder"]["p3"]; ?>" id="input-bts-ex-1" class="form-control live-search" aria-describedby="search-icon1" />
        </div>
        <div class="list-to-filter">
          <ul class="list-unstyled overflow">
            <?php if (isset($JAK_HOOK_LOCATIONS) && is_array($JAK_HOOK_LOCATIONS)) foreach ($JAK_HOOK_LOCATIONS as $h) { ?>
              <li class="filter-item" data-filter="<?php echo $h; ?>"><a href="index.php?p=plugins&sp=sorthooks&ssp=<?php echo $h; ?>"><?php echo $h; ?></a></li>
            <?php } ?>
          </ul>
          <div class="no-search-results">
            <div class="no-results" role="alert"><?php echo $tl["selection"]["sel6"]; ?></div>
          </div>
        </div>
      </div>

    </div>
  </div>

<?php if (isset($JAK_HOOKS) && is_array($JAK_HOOKS)) { ?>

  <div class="box">
    <div class="box-body">
      <ul class="jak_hooks_move">
        <?php foreach ($JAK_HOOKS as $v) { ?>

          <li id="hook-<?php echo $v["id"]; ?>" class="jakhooks">
            <div class="text">#<?php echo $v["id"]; ?> <a
                href="index.php?p=plugins&amp;sp=hooks&amp;ssp=edit&amp;sssp=<?php echo $v["id"]; ?>"><?php echo $v["name"]; ?></a>
            </div>
            <div class="show"><?php echo $tl["hook_box_content"]["hookbc1"]; ?>: <a
                href="index.php?p=plugins&amp;sp=sorthooks&amp;ssp=<?php echo $v["hook_name"]; ?>"><?php echo $v["hook_name"]; ?></a>
              | <?php echo $tl["hook_box_content"]["hookbc4"] . ':';
              if ($v["pluginid"] != '0') { ?> <a
                href="index.php?p=plugins&amp;sp=sorthooks&amp;ssp=<?php echo $v["pluginid"]; ?>"><?php echo $v["pluginname"]; ?></a><?php } else {
                echo ' -';
              } ?></div>
            <div class="actions">

              <a class="btn btn-default btn-xs" href="index.php?p=plugins&amp;sp=hooks&amp;ssp=lock&amp;sssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["active"] == '0') { echo $tl["icons"]["i5"]; } else { echo $tl["icons"]["i6"]; } ?>">
                <i class="fa fa-<?php if ($v["active"] == 0) { ?>lock<?php } else { ?>check<?php } ?>"></i>
              </a>
              <a class="btn btn-default btn-xs" href="index.php?p=plugins&amp;sp=hooks&amp;ssp=edit&amp;sssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
                <i class="fa fa-edit"></i>
              </a>
              <?php if ($v["id"] > 5) { ?>
              <a class="btn btn-default btn-xs" href="index.php?p=plugins&amp;sp=hooks&amp;ssp=delete&amp;sssp=<?php echo $v["id"]; ?>"  data-confirm="<?php echo sprintf($tl["hook_notification"]["del"], $v["name"]); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
                  <i class="fa fa-trash-o"></i>
                </a>
              <?php } ?>

            </div>
          </li>

        <?php } ?>
      </ul>
    </div>
  </div>

<?php } else { ?>

  <div class="alert bg-info">
    <?php echo $tl["errorpage"]["data"]; ?>
  </div>

<?php } ?>

  <div class="icon_legend">
    <h3><?php echo $tl["icons"]["i"]; ?></h3>
    <i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
    <i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
    <i title="<?php echo $tl["icons"]["i2"]; ?>" class="fa fa-edit"></i>
    <i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
  </div>

  <script src="js/hookorder.js" type="text/javascript"></script>

<?php include "footer.php"; ?>