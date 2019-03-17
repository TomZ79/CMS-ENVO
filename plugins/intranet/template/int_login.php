<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="content-type" content="text/html;charset=UTF-8"/>
  <meta charset="utf-8"/>
  <!-- Document Title
  ============================================= -->
  <title>
    <?php
    echo $setting["title"];
    if ($setting["title"]) {
      echo " &raquo; ";
    }
    echo $PAGE_TITLE;
    ?>
  </title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>

  <!-- CSS and FONTS
  ================================================== -->
  <!-- BEGIN PLUGIN CSS -->

  <?php
  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Bootstrap
  echo $Html -> addStylesheet('/assets/plugins/bootstrap/bootstrapv3/css/bootstrap.min.css?=v3.3.7');
  // Google Fonts
  echo $Html -> addStylesheet('https://fonts.googleapis.com/icon?family=Material+Icons');
  // Animate
  echo $Html -> addStylesheet('/assets/plugins/animate/3.7.0/animate.min.css');
  ?>

  <!-- END PLUGIN CSS -->
  <!-- BEGIN CORE CSS FRAMEWORK -->

  <?php
  // Add Html Element -> addStylesheet (Arguments: href, media, optional assoc. array)
  // Main StyleSheet
  echo $Html -> addStylesheet($SHORT_PLUGIN_URL_TEMPLATE . 'css/webarch.min.css');
  ?>

  <!-- END CORE CSS FRAMEWORK -->
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="error-body no-top loginbody">
<div class="container">
  <div class="row login-container animated fadeInUp">
    <div class="col-md-7 col-md-offset-2 tiles white no-padding">
      <div class="p-t-30 p-l-40 p-b-20 xs-p-t-10 xs-p-l-10 xs-p-b-10">
        <h2 class="normal">Přihlášení Bluesat - Intranet</h2>
        <p class="p-b-20">
          Přihlášení do Intranetového rozhraní Bluesat.
        </p>

        <?php
        if ($_SESSION["infomsg"]) echo '<p><strong class="text-info">' . $_SESSION["infomsg"] . '</strong></p>';
        if ($_SESSION["warningmsg"]) echo '<p><strong class="text-warning">' . $_SESSION["warningmsg"] . '</strong></p>';
        ?>

      </div>
      <div class="tiles grey p-t-20 p-b-20 no-margin text-black tab-content">
        <form class="animated fadeIn validate" id="" name="" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>" enctype="multipart/form-data">
          <div class="row form-row m-l-20 m-r-20 xs-m-l-10 xs-m-r-10">
            <div class="col-md-6 col-sm-6">
              <input class="form-control" id="loginusername" name="loginusername" placeholder="Uživatelské jméno" type="name" required>
            </div>
            <div class="col-md-6 col-sm-6">
              <input class="form-control" id="loginpassword" name="loginpassword" placeholder="Heslo" type="password" required>
            </div>
          </div>
          <div class="row p-t-10 m-l-20 m-r-20 xs-m-l-10 xs-m-r-10 pull-right">
            <button type="submit" class="btn btn-primary btn-cons">Přihlásit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END CONTAINER -->

<!-- JS and PLUGIN
  ================================================== -->
<!-- BEGIN JS DEPENDECENCIES-->

<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html -> addScript('/assets/plugins/jquery/jquery-2.2.4.min.js?=v2.2.4');
echo $Html -> addScript('/admin/assets/plugins/modernizr.custom.js');
echo $Html -> addScript('/assets/plugins/bootstrap/bootstrapv3/js/bootstrap.min.js?=v3.3.7');
?>

<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<script>
  // Global options
  var envoWebIntranet = {
    envo_lang: '<?=$site_language?>'
  };
</script>
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/webarch.min.js');
?>

<!-- END CORE TEMPLATE JS -->
</body>
</html>