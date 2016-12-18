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
        message: '<?php if ($page1 == "e") {
          $tl["errorpage"]["sql"];
        } elseif ($page1 == "ene") {
          echo $tl["errorpage"]["not"];
        } else {
          echo $tl["errorpage"]["ug"];
        } ?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box">
      <div class="box-body no-padding">
        <div class="table-responsive">
          <table class="table table-striped table-hover">
            <thead>
            <tr>
              <th>#</th>
              <th><input type="checkbox" id="jak_delete_all"/></th>
              <th><?php echo $tl["user"]["u"]; ?></th>
              <th><?php echo $tl["user"]["u6"]; ?></th>
              <th></th>
              <th></th>
              <th>
                <button type="submit" name="delete" id="button_delete" class="btn btn-danger btn-xs" onclick="if(!confirm('<?php echo $tl["user"]["al"]; ?>'))return false;">
                  <i class="fa fa-trash-o"></i>
                </button>
              </th>
            </tr>
            </thead>
            <?php if (isset($JAK_USERGROUP_ALL) && is_array($JAK_USERGROUP_ALL)) foreach ($JAK_USERGROUP_ALL as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td>
                  <input type="checkbox" name="jak_delete_usergroup[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
                </td>
                <td>
                  <a href="index.php?p=usergroup&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["name"]; ?></a>
                </td>
                <td><?php echo $v["description"]; ?></td>
                <td>
                  <a class="btn btn-default btn-xs" href="index.php?p=usergroup&amp;sp=user&amp;ssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["cmenu"]["c10"]; ?>">
                    <i class="fa fa-user"></i>
                  </a>
                </td>
                <td>
                  <a class="btn btn-default btn-xs" href="index.php?p=usergroup&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
                    <i class="fa fa-edit"></i>
                  </a>
                </td>
                <td>
                  <?php if ($v["id"] > 4) { ?>
                    <a class="btn btn-default btn-xs" href="index.php?p=usergroup&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo $tl["user"]["alg"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
                      <i class="fa fa-trash-o"></i>
                    </a>
                  <?php } ?>
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
    <i title="<?php echo $tl["cmenu"]["c10"]; ?>" class="fa fa-user"></i>
    <i title="<?php echo $tl["icons"]["i2"]; ?>" class="fa fa-edit"></i>
    <i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
  </div>

  <!-- JavaScript for select all -->

  <script type="text/javascript">
    $(document).ready(function () {
      // Delete all
      $("#jak_delete_all").click(function () {
        var checked_status = this.checked;
        $(".highlight").each(function () {
          this.checked = checked_status;
        });
      });
    });
  </script>


<?php include "footer.php"; ?>