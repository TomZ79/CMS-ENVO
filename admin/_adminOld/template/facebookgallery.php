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


  <!-- Fixed Button -->
  <div class="actionbutton">
    <button type="submit" name="save" class="btn btn-default button-icon" data-toggle="tooltip" data-placement="bottom" title="Toggle grid and list view">
      <i class="fa fa-th-list"></i>
    </button>
  </div>


<?php if (isset($JAK_GALLERY_ALL) && is_array($JAK_GALLERY_ALL) && !empty($JAK_GALLERY_ALL)) { ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Form Content - Grid view -->
    <div id="gridview" class="row toggle visible">
      <div class="col-md-12">
        <?php foreach ($JAK_GALLERY_ALL as $v) { ?>
          <div class="col-md-3">
            <div class="hovereffect gridview">
              <div class="center-cropped">
                <img src="<?php echo $v["paththumb"] . 'thumb_' . $v["title"]; ?>" />
              </div>
              <div class="caption">
                <h4><?php echo jak_cut_text(pathinfo($v["title"], PATHINFO_FILENAME), 18, ' ...'); ?></h4>
                <div class="col-md-12 col-xs-3">
                  <p><strong>Format: </strong><?php echo pathinfo($v["title"], PATHINFO_EXTENSION); ?></p>
                </div>
                <div class="col-md-12 col-xs-4">
                  <p><strong>Size: </strong><?php echo formatSizeUnits($v["size"]); ?></p>
                </div>
                <div class="col-md-12 col-xs-5">
                  <p><strong>Resolution: </strong><?php echo $v["width"] . ' x ' . $v["height"]; ?></p>
                </div>
                <div class="col-md-12">
                  <div class="pull-right">
                    <a href="index.php?p=facebookgallery&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-primary btn-xs">Info</a>
                    <a href="index.php?p=facebookgallery&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-confirm="<?php echo sprintf($tl["fb_notification"]["del"], $v["title"]);?>">Delete</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

    <!-- Form Content - List view -->
    <div id="listview" class="row toggle hidden">
      <div class="col-md-12">
        <div class="box">
          <div class="box-body no-padding">
            <div class="table-responsive">
              <table class="table image-list">
                <thead>
                <tr>
                  <th><span><?php echo $tl["fb_box_table"]["fbtb"]; ?></span></th>
                  <th><span><?php echo $tl["fb_box_table"]["fbtb1"]; ?></span></th>
                  <th><span><?php echo $tl["fb_box_table"]["fbtb2"]; ?></span></th>
                  <th>&nbsp;</th>
                  <th>&nbsp;</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($JAK_GALLERY_ALL as $v) { ?>
                  <tr>
                    <td>
                      <img src="<?php echo $v["paththumb"] . 'thumb_' . $v["title"]; ?>" alt="">
                      <a href="index.php?p=facebookgallery&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" class="image-link"><?php echo $v["title"]; ?></a>
                      <span class="text-subhead">ID: <?php echo $v["id"]; ?></span>
                    </td>
                    <td><?php echo date("d.m.Y - H:i", strtotime($v["time"])); ?></td>
                    <td>
                      <?php echo formatSizeUnits($v["size"]); ?>
                    </td>
                    <td style="width: 10%;">
                      <a href="index.php?p=facebookgallery&amp;sp=edit&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i2"]; ?>">
                        <i class="fa fa-edit"></i>
                      </a>
                    </td>
                    <td style="width: 10%;">
                      <a href="index.php?p=facebookgallery&amp;sp=delete&amp;ssp=<?php echo $v["id"]; ?>" class="btn btn-default btn-xs" data-confirm="<?php echo sprintf($tl["facebook"]["del"], $v["title"]);?>" data-toggle="tooltip" data-placement="bottom" title="<?php echo $tl["icons"]["i1"]; ?>">
                        <i class="fa fa-trash-o"></i>
                      </a>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
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

  <style type="text/css">
    .gridview {
      display: block;
      padding: 4px;
      margin-bottom: 20px;
      line-height: 1.42857143;
      background-color: #fff;
      border: 1px solid #ddd;
      border-radius: 4px;
    }
    .gridview .caption {
      padding: 9px;
      color: #333;
    }

    .center-cropped {
      width: 100%;
      height: 150px;
      overflow: hidden;
    }
    .center-cropped img {
      width: 100%;
      top: 50%;
      position: relative;
    }

    .hovereffect.gridview {
      float:left;
      overflow:hidden;
      position:relative;
      cursor:default;
      text-align: left;
    }

    .hovereffect.gridview img {
      display:block;
      -webkit-transition:all .4s linear;
      transition:all .4s linear;
    }

    .hovereffect.gridview:hover img {
      top: 0;
      left: 0;
      -ms-transform:scale(1.2);
      -webkit-transform:scale(1.2);
      transform:scale(1.2);
    }



    .actionbutton {
      position: fixed;
      right: 0px;
      top: 54px;
      z-index: 1000;
      background: #f7f7f7;
      width: 114px;
      height: 50px;
    }
    .actionbutton button {
      margin: 10px 17px;
    }
    .button-icon {
      color: #94a7b1;
      border: 2px solid #D0D8DC;
      font-size: 14px !important;
      padding: 3px 6px 2px 6px !important;
      line-height: 20px !important;
    }
    .button-icon:hover {
      color: #26A69A;
    }






     /* USER LIST TABLE */
    .image-list tbody td > img {
      position: relative;
      max-width: 65px;
      float: left;
      margin-right: 15px;
    }

    .image-list tbody td .image-link {
      display: block;
      font-size: 1.25em;
      padding-top: 3px;
      margin-left: 60px;
    }

    .image-list tbody td .text-subhead {
      font-size: 0.875em;
      font-style: italic;
    }

    /* TABLES */
    .table {
      border-collapse: separate;
    }

    .table tbody > tr > td {
      background: #f5f5f5;
      border-top: 10px solid #fff;
      vertical-align: middle;
      padding: 12px 8px;
    }

     .table tbody > tr > td:first-child,
     .table thead > tr > th:first-child{
      padding-left: 30px;
    }

     .table > tbody > tr:hover > td {
       background-color: #eee;
     }

    .table > tbody > tr > td {
      -webkit-transition: background-color 0.15s ease-in-out 0s;
      transition: background-color 0.15s ease-in-out 0s;
    }

  </style>
  <script>
    /* Toggle list and grid view */
    $('.button-icon').click(function(){
      $('.toggle').toggleClass('hidden visible');
      $('.button-icon i').toggleClass("fa-th-list fa-th");
    });
  </script>

<?php include "footer.php"; ?>