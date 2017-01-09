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

<?php if ($page2 == "s1") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo $tl["notification"]["n3"]; ?>',
      }, {
        // settings
        type: 'info',
        delay: 5000,
        timer: 3000,
      });
    }, 2000);
  </script>
<?php } ?>

<?php if (isset($JAK_SEARCHLOG_ALL) && is_array($JAK_SEARCHLOG_ALL)) { ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box">
      <div class="box-body no-padding">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th><input type="checkbox" id="jak_delete_all"/></th>
              <th><?php echo $tl["slogs_box_table"]["slogstb"]; ?></th>
              <th><?php echo $tl["slogs_box_table"]["slogstb1"]; ?></th>
              <th><?php echo $tl["slogs_box_table"]["slogstb2"]; ?></th>
              <th>
                <a href="index.php?p=searchlog&amp;sp=truncate&amp;ssp=go" id="button_truncate" class="btn btn-warning btn-xs" data-confirm-trunc="<?php echo $tl["notification"]["n4"]; ?>">
                  <i class="fa fa-exclamation-triangle"></i>
                </a>
              </th>
              <th>
                <button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tl["notification"]["n5"]; ?>" disabled="disabled">
                  <i class="fa fa-trash-o"></i>
                </button>
              </th>
            </tr>
            </thead>
            <?php foreach ($JAK_SEARCHLOG_ALL as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td>
                  <input type="checkbox" name="jak_delete_search[]" class="highlight" value="<?php echo $v["id"]; ?>"/></td>
                <td><?php echo $v["tag"]; ?></td>
                <td><?php echo $v["time"]; ?></td>
                <td><?php echo $v["count"]; ?></td>
                <td></td>
                <td>
                  <a href="index.php?p=searchlog&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-confirm="<?php echo $tl["notification"]["n6"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
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
    <i title="<?php echo $tl["icons"]["i15"]; ?>" class="fa fa-exclamation-triangle"></i>
    <i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
  </div>

<?php if ($JAK_PAGINATE) {
  echo $JAK_PAGINATE;
} ?>

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