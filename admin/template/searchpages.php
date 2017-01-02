<?php include "header.php"; ?>

<?php if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <div class="row">
    <div class="col-md-6">
      <form role="form" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
        <div class="input-group">
          <span class="input-group-btn">
              <button class="btn btn-info" name="search" type="submit"><?php echo $tl["title"]["t30"]; ?></button>
          </span>
          <input type="text" name="jakSH" class="form-control" placeholder="<?php echo $tl["placeholder"]["p1"]; ?>">
        </div><!-- /input-group -->
      </form>
    </div>
  </div>

  <hr>

<?php if ($JAK_SEARCH) { ?>

  <div class="box">
    <div class="box-body no-padding">
      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>#</th>
            <th><input type="checkbox" id="jak_delete_all"/></th>
            <th><?php echo $tl["page"]["p"]; ?></th>
            <th><?php echo $tl["page"]["p1"]; ?></th>
            <th><?php echo $tl["page"]["p2"]; ?></th>
            <th><?php echo $tl["general"]["g56"]; ?></th>
            <th></th>
            <th></th>
            <th></th>
          </tr>
          </thead>
          <?php if ($JAK_SEARCH) { ?>
            <?php if (isset($JAK_SEARCH) && is_array($JAK_SEARCH)) foreach ($JAK_SEARCH as $v) { ?>
              <tr>
                <td><?php echo $v["id"]; ?></td>
                <td><input type="checkbox" name="jak_delete_page[]" class="highlight" value="<?php echo $v["id"]; ?>"/>
                </td>
                <td><a
                    href="index.php?p=page&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>"><?php echo $v["title"]; ?></a><?php if ($v["password"]) { ?>
                    <i class="fa fa-key"></i><?php } ?></td>
                <td><?php if ($v["catid"] != '0') {
                    if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach ($JAK_CAT as $z) {
                      if ($v["catid"] == $z["id"]) { ?>
                        <a href="index.php?p=categories&amp;sp=edit&amp;ssp=<?php echo $z["id"]; ?>"><?php echo $z["name"]; ?></a><?php }
                    }
                  } else { ?><?php echo $tl["general"]["g24"]; ?><?php } ?></td>
                <td><?php echo $v["time"]; ?></td>
                <td><?php echo $v["hits"]; ?></td>
                <td>
                  <a class="btn btn-default btn-xs" href="index.php?p=page&amp;sp=lock&amp;ssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php if ($v["active"] == '0') { echo $tl["icons"]["i5"]; } else { echo $tl["icons"]["i6"]; } ?>"
                  ><i class="fa fa-<?php if ($v["active"] == 0) { ?>lock<?php } else { ?>check<?php } ?>"></i>
                  </a>
                </td>
                <td>
                  <a class="btn btn-default btn-xs" href="index.php?p=page&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
                    <i class="fa fa-edit"></i>
                  </a>
                </td>
                <td>
                  <a class="btn btn-default btn-xs" href="index.php?p=page&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" data-confirm="<?php echo $tl["page"]["al"]; ?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
                    <i class="fa fa-trash-o"></i>
                  </a>
                </td>
              </tr>
            <?php }
          } ?>
        </table>
      </div>
    </div>
  </div>
  </form>

<?php } else if ($SEARCH_WORD) { ?>
  <hr>
  <div class="alert bg-danger">
    <?php echo $tl["search"]["s6"]; ?> <strong><?php echo $SEARCH_WORD; ?></strong>
  </div>
<?php } ?>


  <div class="icon_legend">
    <h3><?php echo $tl["icons"]["i"]; ?></h3>
    <i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
    <i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
    <i title="<?php echo $tl["icons"]["i2"]; ?>" class="fa fa-edit"></i>
    <i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
  </div>

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

<?php include "footer.php"; ?>