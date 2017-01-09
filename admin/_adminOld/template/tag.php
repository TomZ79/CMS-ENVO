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
        message: '<?php echo($page2 == "e" ? $tl["errorpage"]["sql"] : $tl["errorpage"]["not"]);?>',
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

<?php if (isset($JAK_TAG_ALL) && is_array($JAK_TAG_ALL)) { ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box">
      <div class="box-body no-padding">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th><input type="checkbox" id="jak_delete_all"/></th>
              <th>
                <?php echo $tl["tag_box_table"]["tagtb"]; ?>
                <a class="btn btn-warning btn-xs" href="index.php?p=tags&amp;sp=sort&amp;ssp=tag&amp;sssp=DESC">
                  <i class="fa fa-arrow-up"></i>
                </a>
                <a class="btn btn-success btn-xs" href="index.php?p=tags&amp;sp=sort&amp;ssp=tag&amp;sssp=ASC">
                  <i class="fa fa-arrow-down"></i>
                </a>
              </th>
              <th><?php echo $tl["tag_box_table"]["tagtb1"]; ?></th>
              <th>
                <a href="javascript:void(0);" class="btn btn-default btn-xs"><i class="fa fa-lock"></i></a>
              </th>
              <th>
                <button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tl["tag_notification"]["delall"]; ?>" disabled="disabled">
                  <i class="fa fa-trash-o"></i>
                </button>
              </th>
            </tr>
            </thead>
            <?php foreach ($JAK_TAG_ALL as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td><input type="checkbox" name="jak_delete_tag[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
                </td>
                <td><?php echo $v["tag"]; ?></td>
                <td>
                  <a href="index.php?p=tags&amp;sp=sort&amp;ssp=pluginid&amp;sssp=<?php echo $v["pluginid"]; ?>"><?php echo $v["plugin"]; ?></a>
                </td>
                <td>
                  <a class="btn btn-default btn-xs" href="index.php?p=tags&amp;sp=lock&amp;ssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["active"] == '0') { echo $tl["icons"]["i5"]; } else { echo $tl["icons"]["i6"]; } ?>">
                    <i class="fa fa-<?php if ($v["active"] == 0) { ?>lock<?php } else { ?>check<?php } ?>"></i>
                  </a>
                </td>
                <td>
                  <a class="btn btn-default btn-xs" href="index.php?p=tags&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo $tl["tag_notification"]["del"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
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

  <div class="icon_legend">
    <h3><?php echo $tl["icons"]["i"]; ?></h3>
    <i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
    <i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
    <i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
  </div>

  <?php if ($JAK_PAGINATE) {
    echo $JAK_PAGINATE;
  }
} else { ?>

  <div class="alert bg-info">
    <?php echo $tl["errorpage"]["data"]; ?>
  </div>

<?php } ?>

  <script type="text/javascript">
    $(document).ready(function () {

      /* Check all checkbox */
      $("#jak_delete_all").click(function () {
        var checkedStatus = this.checked;
        $(".highlight").each(function () {
          $(this).prop('checked', checkedStatus);
        });
        $('#button_delete').prop('disabled', function(i, v) { return !v; });
      });

      /* Disable submit button if checkbox is not checked */
      $(".highlight").change(function() {
        if(this.checked) {
          $("#button_delete").removeAttr("disabled");
        } else {
          $("#button_delete").attr("disabled", "disabled");
        }
      });

    });
  </script>

<?php include "footer.php"; ?>