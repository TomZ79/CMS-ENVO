<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page1 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
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
<?php } if ($page1 == "e" || $page1 == "ene") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
      $.notify({
        // options
        message: '<?php echo ($page1 == "e" ? $tl["errorpage"]["sql"] : $tl["errorpage"]["not"]);?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

<?php if ($page2 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo $tl["notification"]["n2"]; ?>',
      }, {
        // settings
        type: 'info',
        delay: 5000,
        timer: 3000,
      });
    }, 2000);
  </script>
<?php } ?>

<?php if (isset($JAK_BLOG_ALL) && is_array($JAK_BLOG_ALL)) { ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box">
      <div class="box-body no-padding">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th><input type="checkbox" id="jak_delete_all"/></th>
              <th><?php echo $tlblog["blog"]["d8"]; ?>
                <a class="btn btn-warning btn-xs" href="index.php?p=blog&amp;sp=sort&amp;ssp=title&amp;sssp=DESC">
                  <i class="fa fa-arrow-up"></i>
                </a>
                <a class="btn btn-success btn-xs" href="index.php?p=blog&amp;sp=sort&amp;ssp=title&amp;sssp=ASC">
                  <i class="fa fa-arrow-down"></i>
                </a>
              </th>
              <th><?php echo $tl["page"]["p1"]; ?></th>
              <th><?php echo $tl["page"]["p2"]; ?></th>
              <th><?php echo $tl["general"]["g56"]; ?>
                <a class="btn btn-warning btn-xs" href="index.php?p=blog&amp;sp=sort&amp;ssp=hits&amp;sssp=DESC">
                  <i class="fa fa-arrow-up"></i>
                </a>
                <a class="btn btn-success btn-xs" href="index.php?p=blog&amp;sp=sort&amp;ssp=hits&amp;sssp=ASC">
                  <i class="fa fa-arrow-down"></i>
                </a>
              </th>
              <th><?php echo $tl["general_cmd"]["g9"]; ?></th>
              <th>
                <button type="submit" name="lock" id="button_lock" class="btn btn-default btn-xs"><i class="fa fa-lock"></i></button>
              </th>
              <th></th>
              <th>
                <button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tlblog["blog"]["al"]; ?>">
                  <i class="fa fa-trash-o"></i>
                </button>
              </th>
            </tr>
            </thead>
            <?php foreach ($JAK_BLOG_ALL as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td><input type="checkbox" name="jak_delete_blog[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
                </td>
                <td><a href="index.php?p=blog&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["title"]; ?></a>
                </td>
                <td><?php if ($v["catid"] != '0') {
                    if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach ($JAK_CAT as $z) {
                      if (in_array($z["id"], explode(',', $v["catid"]))) { ?>
                        <a href="index.php?p=blog&amp;sp=showcat&amp;ssp=<?php echo $z["id"]; ?>"><?php echo $z["name"]; ?></a> <?php }
                    }
                  } else { ?><?php echo $tl["general"]["g24"]; ?><?php } ?></td>
                <td><?php echo $v["time"]; ?></td>
                <td><?php echo $v["hits"]; ?></td>
                <td>
                  <?php
                  // Time Control - variable
                  $today = date("Y-m-d H:i:s"); // Today time
                  $expire = date("Y-m-d H:i:s", $v["enddate"]); //End time of article or content from DB
                  $today_time = strtotime($today);
                  $expire_time = strtotime($expire);

                  // Control Active of article or content ...
                  if ($v["active"] == 1 && $v["catid"] != 0) { // Odemčeno a není Archiv
                    if (empty($v["enddate"])) {
                      echo $tl["general_cmd"]["g10"]; // Aktivní
                    } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                      echo $tl["general_cmd"]["g10"]; // Aktivní
                    } else {
                      echo $tl["general_cmd"]["g11"] . '<span class="small">  - ' . $tl["general_cmd"]["g13"] . '</span>'; //Neaktivní - Time
                    }
                  } elseif ($v["active"] == 1 && $v["catid"] == 0) { // Odemčeno a je Archiv
                    if (empty($v["enddate"])) {
                      echo $tl["general_cmd"]["g11"] . '<span class="small">  - ' . $tl["general_cmd"]["g15"] . '</span>'; // Neaktivní - Archiv
                    } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                      echo $tl["general_cmd"]["g11"] . '<span class="small">  - ' . $tl["general_cmd"]["g15"] . '</span>'; // Neaktivní - Archiv
                    } else {
                      echo $tl["general_cmd"]["g11"] . '<span class="small">  - ' . $tl["general_cmd"]["g13"] . ', ' .$tl["general_cmd"]["g15"] . '</span>'; // Neaktivní - Time, Archiv
                    }
                  } elseif ($v["active"] == 0 && $v["catid"] != 0) { //Uzamčeno a není Archiv
                    if (empty($v["enddate"])) {
                      echo $tl["general_cmd"]["g11"] . '<span class="small">  - ' . $tl["general_cmd"]["g12"] . '</span>'; // Neaktivní -  Uzamčeno
                    } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                      echo $tl["general_cmd"]["g11"] . '<span class="small">  - ' . $tl["general_cmd"]["g12"] . '</span>'; // Neaktivní -  Uzamčeno
                    } else {
                      echo $tl["general_cmd"]["g11"] . '<span class="small"> - ' . $tl["general_cmd"]["g12"] . ', ' . $tl["general_cmd"]["g13"] . '</span>'; // Neaktivní - Time,Uzamčeno
                    }
                  } else {
                    if (empty($v["enddate"])) { //Uzamčeno a je Archiv
                      echo $tl["general_cmd"]["g11"] . '<span class="small">  - ' . $tl["general_cmd"]["g12"] . ', ' . $tl["general_cmd"]["g15"] . '</span>'; // Neaktivní -  Uzamčeno, Archiv
                    } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                      echo $tl["general_cmd"]["g11"] . '<span class="small">  - ' . $tl["general_cmd"]["g12"] . ', ' . $tl["general_cmd"]["g15"] . '</span>'; // Neaktivní -  Uzamčeno, Archiv
                    } else {
                      echo $tl["general_cmd"]["g11"] . '<span class="small"> - ' . $tl["general_cmd"]["g12"] . ', ' . $tl["general_cmd"]["g13"] . ', ' . $tl["general_cmd"]["g15"] . '</span>'; // Neaktivní - Time, Uzamčeno, Archiv
                    }
                  }
                  ?>
                </td>
                <td>
                  <a href="index.php?p=blog&amp;sp=lock&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["active"] == '0') { echo $tl["icons"]["i5"]; } else { echo $tl["icons"]["i6"]; } ?>">
                    <i class="fa fa-<?php if ($v["active"] == 0) { ?>lock<?php } else { ?>check<?php } ?>"></i>
                  </a>
                </td>
                <td>
                  <a href="index.php?p=blog&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
                    <i class="fa fa-edit"></i>
                  </a>
                </td>
                <td>
                  <a href="index.php?p=blog&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-confirm="<?php echo sprintf($tlblog["blog"]["del"], $v["title"]); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
                    <i class="fa fa-trash-o"></i>
                  </a>
                </td>
              </tr>
            <?php } ?>
          </table>
        </div>
      </div>
    </div>
  </form>

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

<?php if ($JAK_PAGINATE) {
  echo $JAK_PAGINATE;
} ?>

  <!-- JavaScript for select all -->
  <script type="text/javascript">
    $(document).ready(function () {
      $("#jak_delete_all").click(function () {
        var checked_status = this.checked;
        $(".highlight").each(function () {
          this.checked = checked_status;
        });
      });
    });
  </script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>