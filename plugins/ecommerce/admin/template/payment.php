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
if ($page2 == "e" || $page2 == "ene") { ?>
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

  <div class="box box-default">
    <div class="box-header with-border">
      <i class="fa fa-money"></i>
      <h3 class="box-title"><?php echo $tlec["shop"]["m23"]; ?></h3>
    </div><!-- /.box-header -->
    <div class="box-body">
      <ul class="jak_cat_move">
        <?php if (isset($JAK_PAYMENT_ALL) && is_array($JAK_PAYMENT_ALL)) foreach ($JAK_PAYMENT_ALL as $v) { ?>

          <li id="cat-<?php echo $v["id"]; ?>" class="jakcat">
            <div class="text">#<?php echo $v["id"]; ?> <a
                href="index.php?p=shop&amp;sp=ecpayment&amp;ssp=edit&amp;sssp=<?php echo $v["id"]; ?>"><?php echo $v["title"]; ?></a>
              <input type="hidden" name="corder[]" class="corder" value="<?php echo $v["msporder"]; ?>"/><input
                type="hidden" name="real_mp_id[]" value="<?php echo $v["id"]; ?>"/></div>
            <div class="show"><?php echo $tl["page"]["p"]; ?>: <?php echo $v["field"]; ?></div>
            <div class="actions">

              <a href="index.php?p=shop&amp;sp=ecpayment&amp;ssp=edit&amp;sssp=<?php echo $v["id"]; ?>"
                 class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
              <a href="index.php?p=shop&amp;sp=ecpayment&amp;ssp=lock&amp;sssp=<?php echo $v["id"]; ?>"
                 class="btn btn-default btn-xs"><i
                  class="fa fa-<?php if ($v["status"] == 0) { ?>lock<?php } else { ?>check<?php } ?>"></i></a>

            </div>
          </li>

        <?php } ?>
      </ul>
    </div>
  </div>

  <div class="icon_legend">
    <h3><?php echo $tl["icons"]["i"]; ?></h3>
    <i title="<?php echo $tl["icons"]["i16"]; ?>" class="fa fa-check"></i>
    <i title="<?php echo $tl["icons"]["i17"]; ?>" class="fa fa-lock"></i>
    <i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
  </div>

  <script src="../plugins/ecommerce/js/payorder.js" type="text/javascript"></script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>