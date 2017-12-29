<!DOCTYPE html>
<html dir="ltr" lang="<?php echo $site_language; ?>">
<head>

  <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

  <!-- Document Title
  ============================================= -->
  <title><?php echo $setting["title"];
    if ($setting["title"]) { ?> &raquo; <?php }
    echo $PAGE_TITLE; ?></title>

  <meta name="keywords" content="<?php echo trim($PAGE_KEYWORDS); ?>">
  <meta name="description" content="<?php echo trim($PAGE_DESCRIPTION); ?>">
  <meta name="author" content="<?php echo $setting["metaauthor"]; ?>">

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta name="viewport" content="width=device-width,initial-scale=1.0"/>

  <!-- CSS styles and FONTS
  ================================================== -->
  <!-- Bootstrap -->
  <link rel="stylesheet" href="/assets/plugins/bootstrapv3/css/bootstrap.min.css?=v3.3.7">
  <!-- CSS | css plugin collection for this theme -->
  <link rel="stylesheet" href="/template/<?php echo ENVO_TEMPLATE; ?>/css/css-plugin-collections.css">
  <!-- CSS | Main style file -->
  <link href="/template/<?php echo ENVO_TEMPLATE; ?>/css/style-main.css" rel="stylesheet" type="text/css">
  <!-- CSS | Custom Margin Padding Collection -->
  <link href="/template/<?php echo ENVO_TEMPLATE; ?>/css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
  <!-- CSS | Responsive media queries -->
  <link href="/template/<?php echo ENVO_TEMPLATE; ?>/css/responsive.css" rel="stylesheet" type="text/css">
  <!-- CSS | Theme Color -->
  <link href="template/<?php echo ENVO_TEMPLATE; ?>/css/colors/theme-skin-color-set1.css" rel="stylesheet" type="text/css">

  <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
  <link href="/template/<?php echo ENVO_TEMPLATE; ?>/css/style.css" rel="stylesheet" type="text/css">

  <!-- JS Library
  ================================================== -->
  <script src="/assets/plugins/jquery/jquery-2.2.4.min.js"></script>
  <script src="/assets/plugins/bootstrapv3/js/bootstrap.min.js?=v3.3.7"></script>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="">
<!-- START WRAPPER -->
<div id="wrapper" class="clearfix">

  <!-- START MAIN CONTENT -->
  <div class="main-content">

    <?php if ($USR_IP_BLOCKED) { ?>

      <!-- SECTION: IP User Blocked -->
      <section id="userblocked" class="fullscreen bg-lightest">
        <div class="display-table text-center">
          <div class="display-table-cell">
            <div class="container pt-0 pb-0"><div class="row">
                <div class="col-md-10 col-md-offset-1">
                  <h1 class="text-theme-colored font-weight-100 font-64"><?php echo $tlmr["offline_page"]["offline6"]; ?></h1>
                </div>
                <div class="col-md-8 col-md-offset-2  mt-40">
                  <p class="font-14"><?php echo $tlmr["offline_page"]["offline7"]; ?></p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

    <?php } else { ?>

    <!-- SECTION: Offline Page -->
    <section id="offline" class="fullscreen bg-lightest">
      <div class="display-table text-center">
        <div class="display-table-cell">
          <div class="container pt-0 pb-0"><div class="row">
              <div class="col-md-10 col-md-offset-1">
                <h1 class="text-theme-colored font-weight-100 font-64"><?php echo $tlmr["offline_page"]["offline"]; ?></h1>

                <div class="row">
                  <div class="col-md-8 col-md-offset-2">
                    <div id="countdown17" class="ClassyCountdownDemo"></div>

                    <!-- jQuery Classy Countdown Scripts and CSS -->
                    <link href="/template/<?php echo ENVO_TEMPLATE; ?>/js/classycountdown/css/jquery.classycountdown.min.css" rel="stylesheet" type="text/css">
                    <script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/classycountdown/js/jquery.knob.js"></script>
                    <script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/classycountdown/js/jquery.throttle.js"></script>
                    <script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/classycountdown/js/jquery.classycountdown.min.js"></script>

                    <!-- Classy Countdown Script -->
                    <script type="text/javascript">
                      $(document).ready(function() {
                        $('#countdown17').ClassyCountdown({
                          theme: "flat-colors-very-wide",
                          end: $.now() + 8500,
                          labelsOptions: {
                            lang: {
                              days: '<?php echo $tlmr["offline_page"]["offline2"]; ?>',
                              hours: '<?php echo $tlmr["offline_page"]["offline3"]; ?>',
                              minutes: '<?php echo $tlmr["offline_page"]["offline4"]; ?>',
                              seconds: '<?php echo $tlmr["offline_page"]["offline5"]; ?>'
                            },
                            style: 'font-size: 0.5em;'
                          }
                        });
                      });
                    </script>
                  </div>
                </div>
              </div>

              <div class="col-md-8 col-md-offset-2  mt-40">
                <p class="font-14"><?php echo $tlmr["offline_page"]["offline1"]; ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <?php } ?>

  </div>
  <!-- END MAIN CONTENT -->

</div>
<!-- END WRAPPER -->

<!-- End Document  ================================================== -->
<!-- JS | Custom script for all pages -->
<script src="/template/<?php echo ENVO_TEMPLATE; ?>/js/custom.js"></script>

<!-- EU Cookies -->
<?php if ($setting["eucookie_enabled"] == 1) {
  include APP_PATH . '/assets/js/eu-cookies.php';
} ?>

</body>
</html>