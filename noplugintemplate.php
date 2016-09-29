<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>CMS - BLUESAT | Chyba Template</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <!-- CSS STYLE ================================================================================================ -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="css/stylsheet.css">
  <link rel="stylesheet" href="admin/css/admin.css">

  <!-- JQUERY SCRIPT and PLUGINS ================================================================================ -->
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

</head>
<body class="hold-transition skin-teal">

<!-- Main content -->
<section class="content">
  <div class="error-page">
    <h3 class="headline text-red">Template (Šablona) pro Plugin <?php echo $JAK_TPL_PLUG_T; ?> není nainstalována</h3>
    <div class="error-content">
      <h3><i class="fa fa-warning text-red"></i><?php echo $tl["notetemplate"]["n1"]; ?></h3>
      <p>Prosím nainstalujte šablonu <?php echo "<strong>" . $jkv["sitestyle"] . "</strong>"; ?> pro plugin <?php echo "<strong>" . $JAK_TPL_PLUG_T . "</strong>"; ?> v administraci (ACP) webové sítě</p>
    </div>
  </div><!-- /.error-page -->
</section><!-- /.content -->

</body>
</html>
