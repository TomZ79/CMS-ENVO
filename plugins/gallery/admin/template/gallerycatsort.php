<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php if ($page3 == "s") { ?>
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
<?php } if ($page3 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function() {
      $.notify({
        // options
        message: '<?php echo $tl["errorpage"]["sql"];?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <form class="jak_form_cat" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-default">
      <div class="box-header with-border">
        <i class="fa fa-picture-o"></i>
        <h3 class="box-title"><?php echo $tlgal["gallery"]["m1"]; ?></h3>
      </div><!-- /.box-header -->
      <div class="box-body">
        <ul class="jak_cat_move">
          <?php if (isset($JAK_GALLERY_SORT) && is_array($JAK_GALLERY_SORT)) foreach ($JAK_GALLERY_SORT as $v) { ?>

            <li id="photo-<?php echo $v["id"]; ?>" class="jakcat">
              <div class="row">
                <div class="row-table">
                  <div class="col-xs-2 col-table">
                    <div class="hovereffect">
                      <div class="center-cropped">
                        <img src="<?php echo BASE_URL_ORIG . $JAK_UPLOAD_PATH_BASE . $v["pathbig"]; ?>" alt="<?php echo $v["title"]; ?>"/>
                      </div>
                      <div class="overlay">
                        <a href="index.php?p=gallery&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" class="info">Edit Photo</a>
                      </div>
                    </div>
                    <input type="hidden" name="phorder[]" class="corder" value="<?php echo $v["picorder"]; ?>"/>
                    <input type="hidden" name="real_photo_id[]" value="<?php echo $v["id"]; ?>"/>
                  </div>
                  <div class="col-xs-10 col-table v-text-center">
                    <div class="row">
                      <div class="col-xs-5">
                        <div class="form-group form-inline no-margin">
                          <label><?php echo $tl["page"]["p"]; ?>:</label>
                          <input type="text" name="phname[]" value="<?php echo $v["title"]; ?>" class="form-control" maxlength="100"/>
                        </div>
                      </div>
                      <div class="col-xs-5"><?php echo $tl["page"]["p1"]; ?>: <?php if ($v["catid"] != '0') {
                          if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach ($JAK_CAT as $z) {
                            if (in_array($z["id"], explode(',', $v["catid"]))) { ?>
                              <a href="index.php?p=gallery&amp;sp=showcat&amp;ssp=<?php echo $z["id"]; ?>"><?php echo $z["name"]; ?></a> <?php }
                          }
                        } else { ?><?php echo $tl["general"]["g24"]; ?><?php } ?>
                      </div>
                      <div class="col-xs-2">
                        <a href="index.php?p=gallery&amp;sp=lock&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs">
                          <i class="fa fa-<?php if ($v["active"] == 0) { ?>lock<?php } else { ?>check<?php } ?>"></i>
                        </a>
                        <a href="index.php?p=gallery&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs">
                          <i class="fa fa-edit"></i>
                        </a>
                        <a href="index.php?p=gallery&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" onclick="if(!confirm('<?php echo $tl["page"]["al"]; ?>'))return false;">
                          <i class="fa fa-trash-o"></i>
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>

          <?php } ?>
        </ul>
      </div>
    </div>

    <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
    <div class="clearfix"></div>

  </form>

  <div class="icon_legend">
    <h3><?php echo $tl["icons"]["i"]; ?></h3>
    <i title="<?php echo $tl["icons"]["i6"]; ?>" class="fa fa-check"></i>
    <i title="<?php echo $tl["icons"]["i5"]; ?>" class="fa fa-lock"></i>
    <i title="<?php echo $tl["icons"]["i2"]; ?>" class="fa fa-edit"></i>
    <i title="<?php echo $tl["icons"]["i1"]; ?>" class="fa fa-trash-o"></i>
  </div>

  <!-- JavaScript for select all -->
  <script src="../plugins/gallery/js/photoorder.js" type="text/javascript"></script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>