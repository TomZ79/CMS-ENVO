<?php include "header.php"; ?>

<?php if ($page2 == "s") { ?>
  <script type="text/javascript">
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
if ($page2 == "e" || $page2 == "edn") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo($page2 == "e" ? $tl["general_error"]["generror1"] : $tl["hook_error"]["hookerror4"]);?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <div class="btn-toolbar m-b-20">
    <div class="btn-group">

      <button class="btn btn-info dropdown-toggle" data-toggle="dropdown" href="#" style="width: 130px;"><?php echo $tl["button"]["btn4"]; ?>
        <span class="caret"></span>
      </button>
      <div class="dropdown-menu livefilter">
        <div class="search-box">

          <?php
          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
          echo $Html->addInput('text', '', $ENVO_FORM_DATA["catimg"], 'input-bts-ex-1', 'form-control live-search', array('placeholder' => $tl["placeholder"]["p3"], 'aria-describedby' => 'search-icon1'));
          ?>

        </div>
        <div class="list-to-filter">
          <ul class="list-unstyled overflow">
            <?php if (isset($JAK_HOOK_LOCATIONS) && is_array($JAK_HOOK_LOCATIONS)) foreach ($JAK_HOOK_LOCATIONS as $h) { ?>
              <li class="filter-item" data-filter="<?php echo $h; ?>">
                <a href="index.php?p=plugins&sp=sorthooks&ssp=<?php echo $h; ?>"><?php echo $h; ?></a>
              </li>
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

  <div class="box box-success">
    <div class="box-body">
      <ul class="jak_hooks_move">
        <?php foreach ($JAK_HOOKS as $v) { ?>

          <li id="hook-<?php echo $v["id"]; ?>" class="jakhooks">

            <div>
							<span class="text">
								<span class="textid"># <?php echo $v["id"]; ?></span>
								<a href="index.php?p=plugins&amp;sp=hooks&amp;ssp=edit&amp;sssp=<?php echo $v["id"]; ?>"><?php echo $v["name"]; ?></a>
							</span>
            </div>

            <div class="show">
              <?php echo $tl["hook_box_content"]["hookbc1"]; ?>:
              <a href="index.php?p=plugins&amp;sp=sorthooks&amp;ssp=<?php echo $v["hook_name"]; ?>"><?php echo $v["hook_name"]; ?></a>
              | <?php echo $tl["hook_box_content"]["hookbc4"] . ':';
              if ($v["pluginid"] != '0') { ?>
                <a href="index.php?p=plugins&amp;sp=sorthooks&amp;ssp=<?php echo $v["pluginid"]; ?>"><?php echo $v["pluginname"]; ?></a><?php } else {
                echo ' -';
              } ?>
            </div>
            <div class="actions">

              <?php
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=lock&amp;sssp=' . $v["id"], '<i class="fa fa-' . (($v["active"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs m-r-5', array('data-toggle' => 'tooltipEnvo', 'title' => ($v["active"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));

              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=edit&amp;sssp=' . $v["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs m-r-5', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));

              if ($v["id"] > 5) {

                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=plugins&amp;sp=hooks&amp;ssp=delete&amp;sssp=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf($tl["hook_notification"]["del"], $v["name"]), 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));

              }
              ?>

            </div>

          </li>

        <?php } ?>
      </ul>
    </div>
  </div>

<?php } else { ?>

  <div class="col-md-12">

    <?php
    // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
    echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
    ?>

  </div>

<?php } ?>

  <div class="col-md-12 m-b-30">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-check', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i6"]));
      echo $Html->addTag('i', '', 'fa fa-lock', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i5"]));
      echo $Html->addTag('i', '', 'fa fa-edit', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-pencil', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i10"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php include "footer.php"; ?>