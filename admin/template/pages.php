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
if ($page1 == "e" || $page1 == "ene") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo($page1 == "e" ? $tl["errorpage"]["sql"] : $tl["errorpage"]["not"]);?>',
      }, {
        // settings
        type: 'danger',
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

  <div class="row">
    <div class="col-md-6">
      <form role="form" method="post" action="/admin/index.php?p=page&amp;sp=search&amp;ssp=go">
        <div class="input-group">
          <span class="input-group-btn">
            <button class="btn btn-info" name="search" type="submit"><?php echo $tl["button"]["btn21"]; ?></button>
          </span>
          <input type="text" name="jakSH" class="form-control" placeholder="<?php echo $tl["placeholder"]["p1"]; ?>">
        </div><!-- /input-group -->
      </form>
    </div>
  </div>

  <hr>

<?php if (isset($JAK_PAGE_ALL) && is_array($JAK_PAGE_ALL))  { ?>

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
              <th>
                <?php echo $tl["page_box_table"]["pagetb"]; ?>
                <a class="btn btn-warning btn-xs" href="index.php?p=page&amp;sp=sort&amp;ssp=title&amp;sssp=DESC">
                  <i class="fa fa-arrow-up"></i>
                </a>
                <a class="btn btn-success btn-xs" href="index.php?p=page&amp;sp=sort&amp;ssp=title&amp;sssp=ASC">
                  <i class="fa fa-arrow-down"></i>
                </a>
              </th>
              <th><?php echo $tl["page_box_table"]["pagetb1"]; ?></th>
              <th><?php echo $tl["page_box_table"]["pagetb2"]; ?></th>
              <th>
                <?php echo $tl["page_box_table"]["pagetb3"]; ?>
                <a class="btn btn-warning btn-xs" href="index.php?p=page&amp;sp=sort&amp;ssp=hits&amp;sssp=DESC">
                  <i class="fa fa-arrow-up"></i>
                </a>
                <a class="btn btn-success btn-xs" href="index.php?p=page&amp;sp=sort&amp;ssp=hits&amp;sssp=ASC">
                  <i class="fa fa-arrow-down"></i>
                </a>
              </th>
              <th><?php echo $tl["page_box_table"]["pagetb4"]; ?></th>
              <th>
                <button type="submit" name="lock" id="button_lock" class="btn btn-default btn-xs">
                  <i class="fa fa-lock"></i>
                </button>
              </th>
              <th></th>
              <th>
                <button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tl["page_notification"]["delall"]; ?>" disabled="disabled">
                  <i class="fa fa-trash-o"></i>
                </button>
              </th>
            </tr>
            </thead>
            <?php foreach ($JAK_PAGE_ALL as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td>
                  <div class="checkbox-singel check-success">
                    <input type="checkbox" id="jak_delete_page<?php echo $v["id"]; ?>" name="jak_delete_page[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
                    <label for="jak_delete_page<?php echo $v["id"]; ?>"></label>
                  </div>
                </td>
                <td>
                  <a href="index.php?p=page&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["title"]; ?></a>
                  <?php if ($v["password"]) { ?>
                    <i class="fa fa-key"></i>
                  <?php } ?>
                </td>
                <td><?php if ($v["catid"] != '0') {
                    if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach ($JAK_CAT as $z) {
                      if ($v["catid"] == $z["id"]) { ?>
                        <a href="index.php?p=categories&amp;sp=edit&amp;ssp=<?php echo $z["id"]; ?>"><?php echo $z["name"]; ?></a><?php }
                    }
                  } else { ?><?php echo $tl["page_box_content"]["pagebc"]; ?><?php } ?></td>
                <td><?php echo $v["time"]; ?></td>
                <td><?php echo $v["hits"]; ?></td>
                <td>
                  <?php
                    if ($v["active"] == 1 && $v["catid"] != 0) {
                      echo $tl["page_box_content"]["pagebc1"];
                    } elseif ($v["active"] == 1 && $v["catid"] == 0) {
                      echo $tl["page_box_content"]["pagebc2"] . '<span class="small">  - Archiv</span>';
                    } elseif ($v["active"] == 0 && $v["catid"] == 0) {
                      echo $tl["page_box_content"]["pagebc2"] . '<span class="small">  - Archiv, Uzamčeno</span>';
                    } else {
                      echo $tl["page_box_content"]["pagebc2"] . '<span class="small">  - Uzamčeno</span>';
                    }
                  ?>
                </td>
                <td>
                  <a class="btn btn-default btn-xs" href="index.php?p=page&amp;sp=lock&amp;ssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["active"] == '0') { echo $tl["icons"]["i5"]; } else { echo $tl["icons"]["i6"]; } ?>">
                    <i class="fa fa-<?php if ($v["active"] == 0) { ?>lock<?php } else { ?>check<?php } ?>"></i>
                  </a>
                </td>
                <td>
                  <a class="btn btn-default btn-xs" href="index.php?p=page&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
                    <i class="fa fa-edit"></i>
                  </a>
                </td>
                <td>
                  <a class="btn btn-default btn-xs" href="index.php?p=page&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo sprintf($tl["page_notification"]["del"], $v["title"]);?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
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

<?php include "footer.php"; ?>