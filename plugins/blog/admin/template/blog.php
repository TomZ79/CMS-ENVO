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
    <div class="box box-success">
      <div class="box-body no-padding">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th>
                <div class="checkbox-singel check-success">
                  <input type="checkbox" id="jak_delete_all"/>
                  <label for="jak_delete_all"></label>
                </div>
              </th>
              <th><?php echo $tlblog["blog_box_table"]["blogtb"]; ?>
                <a class="btn btn-warning btn-xs" href="index.php?p=blog&amp;sp=sort&amp;ssp=title&amp;sssp=DESC">
                  <i class="fa fa-arrow-up"></i>
                </a>
                <a class="btn btn-success btn-xs" href="index.php?p=blog&amp;sp=sort&amp;ssp=title&amp;sssp=ASC">
                  <i class="fa fa-arrow-down"></i>
                </a>
              </th>
              <th><?php echo $tlblog["blog_box_table"]["blogtb1"]; ?></th>
              <th><?php echo $tlblog["blog_box_table"]["blogtb2"]; ?></th>
              <th><?php echo $tlblog["blog_box_table"]["blogtb3"]; ?>
                <a class="btn btn-warning btn-xs" href="index.php?p=blog&amp;sp=sort&amp;ssp=hits&amp;sssp=DESC">
                  <i class="fa fa-arrow-up"></i>
                </a>
                <a class="btn btn-success btn-xs" href="index.php?p=blog&amp;sp=sort&amp;ssp=hits&amp;sssp=ASC">
                  <i class="fa fa-arrow-down"></i>
                </a>
              </th>
              <th><?php echo $tlblog["blog_box_table"]["blogtb4"]; ?></th>
              <th>
                <button type="submit" name="lock" id="button_lock" class="btn btn-default btn-xs"><i class="fa fa-lock"></i></button>
              </th>
              <th></th>
              <th>
                <button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tlblog["blog_notification"]["delall"]; ?>" disabled="disabled">
                  <i class="fa fa-trash-o"></i>
                </button>
              </th>
            </tr>
            </thead>
            <?php foreach ($JAK_BLOG_ALL as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td>
                  <div class="checkbox-singel check-success">
                    <input type="checkbox" id="jak_delete_blog<?php echo $v["id"]; ?>" name="jak_delete_blog[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
                    <label for="jak_delete_blog<?php echo $v["id"]; ?>"></label>
                  </div>
                </td>
                <td><a href="index.php?p=blog&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["title"]; ?></a>
                </td>
                <td><?php if ($v["catid"] != '0') {
                    if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach ($JAK_CAT as $z) {
                      if (in_array($z["id"], explode(',', $v["catid"]))) { ?>
                        <a href="index.php?p=blog&amp;sp=showcat&amp;ssp=<?php echo $z["id"]; ?>"><?php echo $z["name"]; ?></a> <?php }
                    }
                  } else { ?><?php echo $tlblog["blog_box_content"]["blogbc13"]; ?><?php } ?></td>
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
                      echo $tlblog["blog_box_content"]["blogbc14"]; // Aktivní
                    } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                      echo $tlblog["blog_box_content"]["blogbc14"]; // Aktivní
                    } else {
                      echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc17"] . '</span>'; //Neaktivní - Time
                    }
                  } elseif ($v["active"] == 1 && $v["catid"] == 0) { // Odemčeno a je Archiv
                    if (empty($v["enddate"])) {
                      echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc16"] . '</span>'; // Neaktivní - Archiv
                    } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                      echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc16"] . '</span>'; // Neaktivní - Archiv
                    } else {
                      echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc17"] . ', ' .$tl["blog_box_content"]["blogbc16"] . '</span>'; // Neaktivní - Time, Archiv
                    }
                  } elseif ($v["active"] == 0 && $v["catid"] != 0) { //Uzamčeno a není Archiv
                    if (empty($v["enddate"])) {
                      echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc18"] . '</span>'; // Neaktivní -  Uzamčeno
                    } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                      echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc18"] . '</span>'; // Neaktivní -  Uzamčeno
                    } else {
                      echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small"> - ' . $tlblog["blog_box_content"]["blogbc18"] . ', ' . $tl["blog_box_content"]["blogbc17"] . '</span>'; // Neaktivní - Time,Uzamčeno
                    }
                  } else {
                    if (empty($v["enddate"])) { //Uzamčeno a je Archiv
                      echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc18"] . ', ' . $tl["blog_box_content"]["blogbc16"] . '</span>'; // Neaktivní -  Uzamčeno, Archiv
                    } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                      echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc18"] . ', ' . $tl["blog_box_content"]["blogbc16"] . '</span>'; // Neaktivní -  Uzamčeno, Archiv
                    } else {
                      echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small"> - ' . $tlblog["blog_box_content"]["blogbc18"] . ', ' . $tl["blog_box_content"]["blogbc17"] . ', ' . $tlblog["blog_box_content"]["blogbc16"] . '</span>'; // Neaktivní - Time, Uzamčeno, Archiv
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
                  <a href="index.php?p=blog&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-confirm="<?php echo sprintf($tlblog["blog_notification"]["del"], $v["title"]); ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
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

  <div class="col-md-12">
    <div class="alert bg-info text-white">
      <?php echo $tl["errorpage"]["data"]; ?>
    </div>
  </div>

<?php } ?>

  <div class="col-md-12">
    <div class="icon_legend">
      <h3><?php echo $tl["icons"]["i"]; ?></h3>
      <i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
      <i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
      <i title="<?php echo $tl["icons"]["i2"]; ?>" class="fa fa-edit"></i>
      <i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
    </div>
  </div>

<?php if ($JAK_PAGINATE) {
  echo $JAK_PAGINATE;
} ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
