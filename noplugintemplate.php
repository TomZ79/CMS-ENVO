<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?=$tl["notetemplate"]["ntpl"]?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- CSS STYLE ================================================================================================ -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="/assets/plugins/bootstrapv3/css/bootstrap.min.css">
  <!-- Theme style -->
  <link href="/assets/plugins/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css"/>
  <link class="main-stylesheet" href="/admin/pages/css/pages.css" rel="stylesheet" type="text/css"/>
  <link href="/admin/assets/css/style.css" rel="stylesheet" type="text/css">

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
  <div class="col-sm-6 text-center vertical-center error-page">
    <div class="col-sm-12">
      <h3 class="headline text-warning-800 bold"><?=str_replace("%s", $ENVO_TPL_PLUG_T, $tl["notetemplate"]["ntpl4"])?></h3>
      <div class="error-content">
        <h3>
          <i class="fa fa-warning text-warning-800"></i> <?=$tl["notetemplate"]["ntpl2"]?>
        </h3>
        <p>
          <?=str_replace("%s", ENVO_TEMPLATE, $tl["notetemplate"]["ntpl5"])?>
          <?=str_replace("%s", $ENVO_TPL_PLUG_T, $tl["notetemplate"]["ntpl6"])?>
        </p>
      </div>
    </div>
  </div>
</section>

</body>
</html>
