<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page5 == "s") { ?>
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
<?php } if ($page5 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
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
    <div class="box">
      <div class="box-body no-padding">
        <table class="table table-striped table-hover">
          <thead>
          <tr>
            <th>#</th>
            <th><input type="checkbox" id="jak_delete_all"/></th>
            <th><?php echo $tl["page"]["p4"]; ?></th>
            <th class="admin-wrap"><?php echo $tld["dload"]["d8"]; ?></th>
            <td><?php echo $tl["user"]["u2"]; ?></td>
            <th>
              <button type="submit" name="lock" id="button_lock" class="btn btn-default btn-xs"><i
                  class="fa fa-lock"></i></button>
            </th>
            <th>
              <button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" onclick="if(!confirm('<?php echo $tld["dload"]["co"]; ?>'))return false;">
                <i class="fa fa-trash-o"></i>
              </button>
            </th>
          </tr>
          </thead>
          <?php if (isset($JAK_DOWNLOADCOM_SORT) && is_array($JAK_DOWNLOADCOM_SORT)) foreach ($JAK_DOWNLOADCOM_SORT as $v) { ?>
            <tr>
              <td><?php echo $v["id"]; ?></td>
              <td><input type="checkbox" name="jak_delete_comment[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
              </td>
              <td><?php echo jak_clean_comment($v["message"]); ?></td>
              <td>
                <?php if (isset($JAK_DOWNLOAD_ALL) && is_array($JAK_DOWNLOAD_ALL)) foreach ($JAK_DOWNLOAD_ALL as $z) {
                  if ($v["fileid"] == $z["id"]) { ?>
                    <a href="index.php?p=download&amp;sp=comment&amp;ssp=sort&amp;sssp=download&amp;ssssp=<?php echo $z["id"]; ?>"><?php echo $z["title"]; ?></a>
                <?php } } ?>
              </td>
              <td>
                <?php if ($v["userid"] == '0') { ?><?php echo $tl["general"]["g28"]; ?><?php } else { ?>
                  <a href="index.php?p=download&amp;sp=comment&amp;ssp=sort&amp;sssp=user&amp;ssssp=<?php echo $v["userid"]; ?>"><?php echo $v["username"]; ?></a><?php } ?>
              </td>
              <td>
                <a href="index.php?p=download&amp;sp=comment&amp;ssp=approve&amp;sssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["approve"] == '0') { echo $tl["icons"]["i5"]; } else { echo $tl["icons"]["i6"]; } ?>">
                  <i class="fa fa-<?php if ($v["approve"] == 0) { ?>lock<?php } else { ?>check<?php } ?>"></i>
                </a>
              </td>
              <td>
                <a href="index.php?p=download&amp;sp=comment&amp;ssp=delete&amp;sssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-confirm="<?php echo $tld["dload"]["co"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
                  <i class="fa fa-trash-o"></i>
                </a>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </form>

  <div class="icon_legend">
    <h3><?php echo $tl["icons"]["i"]; ?></h3>
    <i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
    <i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
    <i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
  </div>

<?php if ($JAK_PAGINATE_SORT) echo $JAK_PAGINATE_SORT; ?>

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