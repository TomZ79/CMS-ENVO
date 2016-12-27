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


<?php if (isset($JAK_GALLERY_ALL) && is_array($JAK_GALLERY_ALL) && !empty($JAK_GALLERY_ALL)) { ?>
  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

    <div class="box">
      <div class="box-body no-padding">
        <div class="table-responsive">
          <table class="table image-list">
            <thead>
            <tr>
              <th><span><?php echo $tl["facebook"]["f7"]; ?></span></th>
              <th><span><?php echo $tl["facebook"]["f8"]; ?></span></th>
              <th><span><?php echo $tl["facebook"]["f9"]; ?></span></th>
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

<?php include "footer.php"; ?>