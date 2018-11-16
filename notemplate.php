<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?= $tl["notetemplate"]["ntpl"] ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- BEGIN Vendor CSS-->
  <?php
  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Bootstrap
  echo $Html -> addStylesheet('../assets/plugins/bootstrap/bootstrapv4/4.0.0/css/bootstrap.min.css');
  // Font Awesomemin
  echo $Html -> addStylesheet('../assets/plugins/font-awesome/4.7.0/css/font-awesome.css');
  ?>

  <!-- BEGIN Pages CSS-->
  <?php
  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  echo $Html -> addStylesheet('/admin/pages/css/pages.min.css?=v3.0.2', '', array ( 'class' => 'main-stylesheet' ));
  ?>

  <!-- BEGIN General Stylesheet with custom modifications -->
  <?php
  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  echo $Html -> addStylesheet('/admin/assets/css/style.min.css');
  ?>

  <!-- JQUERY SCRIPT and PLUGINS ================================================================================ -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body>

<!-- Main content -->
<section class="content">
  <div class="col-sm-8 text-center vertical-center error-page">
    <div class="col-sm-12">
      <h3 class="headline text-warning-800 bold"><?= $tl["notetemplate"]["ntpl1"] ?></h3>
      <div class="error-content">
        <h3>
          <i class="fa fa-warning text-warning-800"></i> <?= $tl["notetemplate"]["ntpl2"] ?>
        </h3>
        <p><?= $tl["notetemplate"]["ntpl3"] ?></p>
      </div>
    </div>
  </div>
</section>

</body>
</html>
