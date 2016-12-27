<?php include_once APP_PATH . 'admin/template/header.php'; ?>

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
if ($page2 == "e") { ?>
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

<?php if (isset($JAK_USER_ALL) && is_array($JAK_USER_ALL)) { ?>

  <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="input-group">
      <select name="jak_group" class="form-control selectpicker">
        <?php if (isset($JAK_USERGROUP_ALL) && is_array($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $z) { ?>
          <option value="<?php echo $z["id"]; ?>"><?php echo $z["name"]; ?></option><?php } ?>
      </select>
      <span class="input-group-btn">
        <button type="submit" name="move" class="btn btn-warning"><?php echo $tl["general"]["g35"]; ?></button>
      </span>
    </div>
    <hr>

    <div class="box">
      <div class="box-body no-padding">
        <div class="table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th><input type="checkbox" id="jak_delete_all"/></th>
              <th><?php echo $tl["user"]["u"]; ?></th>
              <th><?php echo $tl["user"]["u1"]; ?></th>
              <th><?php echo $tl["menu"]["m9"]; ?></th>
              <th></th>
              <th>
                <button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" data-confirm-del="<?php echo $tl["user"]["al"]; ?>" disabled="disabled">
                  <i class="fa fa-trash-o"></i>
                </button>
              </th>
            </tr>
            </thead>
            <?php foreach ($JAK_USER_ALL as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td><input type="checkbox" name="jak_delete_user[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
                </td>
                <td>
                  <a href="index.php?p=newsletter&amp;sp=user&amp;ssp=edit&amp;sssp=<?php echo $v["id"]; ?>"><?php echo $v["name"]; ?></a>
                </td>
                <td><?php echo $v["email"]; ?></td>
                <td>
                  <?php if (isset($JAK_USERGROUP_ALL) && is_array($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $z) {
                    if ($v["usergroupid"] == $z["id"]) { ?>
                      <a href="index.php?p=newsletter&amp;sp=user&amp;ssp=group&amp;sssp=<?php echo $z["id"]; ?>"><?php echo $z["name"]; ?></a><?php }
                  } ?>
                </td>
                <td>
                  <a href="index.php?p=newsletter&amp;sp=user&amp;ssp=edit&amp;sssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs">
                    <i class="fa fa-edit"></i>
                  </a>
                </td>
                <td>
                  <a href="index.php?p=newsletter&amp;sp=user&amp;ssp=delete&amp;sssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-confirm="<?php echo $tl["user"]["al"]; ?>">
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
    <i title="<?php echo $tl["icons"]["i2"]; ?>" class="fa fa-edit"></i>
    <i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
  </div>

<?php if ($JAK_PAGINATE) {
  echo $JAK_PAGINATE;
} ?>

  <script type="text/javascript">
    $(document).ready(function () {

      /* Check all checkbox */
      $("#jak_delete_all").click(function () {
        var checked_status = this.checked;
        $(".highlight").each(function () {
          this.checked = checked_status;
        });
      });

      /* Disable submit button if checkbox is not checked */
      var the_terms = $('.highlight');
      the_terms.click(function() {
        if ($(this).is(":checked")) {
          $("#button_delete").removeAttr("disabled");
        } else {
          $("#button_delete").attr("disabled", "disabled");
        }
      });

    });
  </script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>