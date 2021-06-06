<footer class="footer-area">
	<div class="footer-black-big">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 align-self-center">
					<div class="footer-menu xs-center">
						<ul>
							<li>
								<a href="#">DC Comics</a>
							</li>
							<li>
								<a href="#">Marvel</a>
							</li>
							<li>
								<a href="#">XXXX</a>
							</li>
						</ul>

					</div>
				</div>
				<div class="col-lg-4">
					<div class="footer-logo text-center">
						<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_ONLINE_TV) ?>">
							<img src="/plugins/onlinetv/template/img/logo-light.png" alt="">
						</a>
					</div>
				</div>
				<div class="col-lg-4 align-self-center">
					<div class="footer-menu text-right xs-center">
						<ul>
							<li>
								<a href="#">Akční</a>
							</li>
							<li>
								<a href="#">Sci-fi</a>
							</li>
							<li>
								<a href="#">Western</a>
							</li>

						</ul>

					</div>
				</div>
			</div>
		</div>
	</div>
	<div id="back-to-top" class="back-to-top" style="">
		<button class="btn btn-primary" title="Back to Top">
			<i class="fa fa-angle-up"></i>
		</button>
	</div>
</footer>

</div>

<!-- JS and PLUGIN
  ================================================== -->
<!-- BEGIN JS DEPENDECENCIES-->
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html -> addScript('/assets/plugins/jquery/jquery-1.12.4.min.js');
// Bootstrap
echo $Html -> addScript('/assets/plugins/bootstrap/bootstrapv4/4.1.3/js/bootstrap.min.js');
// Ńavigation
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/navigation.js');
// OWL Carousel
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/owl.carousel/owl.carousel.min.js?=v2.3.4');
// Plugin Fancybox
echo $Html -> addScript('/assets/plugins/fancybox/3.5.7/js/jquery.fancybox.min.js');
// Slick
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/slick.js');
// Plyr
echo $Html -> addScript('https://cdn.plyr.io/3.5.3/plyr.polyfilled.js');

?>

<script>
  const player1 = new Plyr('#player1', {
    hideControls: true,
    ratio: '16:9',
    // Localisation
    i18n: {
      restart: 'Restart',
      rewind: 'Rewind {seektime}s',
      play: 'Play',
      pause: 'Pause',
      fastForward: 'Forward {seektime}s',
      seek: 'Seek',
      seekLabel: '{currentTime} of {duration}',
      played: 'Played',
      buffered: 'Buffered',
      currentTime: 'Current time',
      duration: 'Duration',
      volume: 'Volume',
      mute: 'Mute',
      unmute: 'Unmute',
      enableCaptions: 'Enable captions',
      disableCaptions: 'Disable captions',
      download: 'Download',
      enterFullscreen: 'Enter fullscreen',
      exitFullscreen: 'Exit fullscreen',
      frameTitle: 'Player for {title}',
      captions: 'Titulky',
      settings: 'Settings',
      menuBack: 'Go back to previous menu',
      speed: 'Rychlost',
      normal: 'Normal',
      quality: 'Kvalita',
      loop: 'Loop',
      start: 'Start',
      end: 'End',
      all: 'All',
      reset: 'Reset',
      disabled: 'Vypnuto',
      enabled: 'Zapnuto',
      advertisement: 'Ad',
      qualityBadge: {
        2160: '4K',
        1440: 'HD',
        1080: 'HD',
        720: 'HD',
        576: 'SD',
        480: 'SD',
        360: 'SD'
      }
    }
  });

  const player2 = new Plyr('#player2', {
    hideControls: true,
    ratio: '16:9',
    // Localisation
    i18n: {
      restart: 'Restart',
      rewind: 'Rewind {seektime}s',
      play: 'Play',
      pause: 'Pause',
      fastForward: 'Forward {seektime}s',
      seek: 'Seek',
      seekLabel: '{currentTime} of {duration}',
      played: 'Played',
      buffered: 'Buffered',
      currentTime: 'Current time',
      duration: 'Duration',
      volume: 'Volume',
      mute: 'Mute',
      unmute: 'Unmute',
      enableCaptions: 'Enable captions',
      disableCaptions: 'Disable captions',
      download: 'Download',
      enterFullscreen: 'Enter fullscreen',
      exitFullscreen: 'Exit fullscreen',
      frameTitle: 'Player for {title}',
      captions: 'Titulky',
      settings: 'Settings',
      menuBack: 'Go back to previous menu',
      speed: 'Rychlost',
      normal: 'Normal',
      quality: 'Kvalita',
      loop: 'Loop',
      start: 'Start',
      end: 'End',
      all: 'All',
      reset: 'Reset',
      disabled: 'Vypnuto',
      enabled: 'Zapnuto',
      advertisement: 'Ad',
      qualityBadge: {
        2160: '4K',
        1440: 'HD',
        1080: 'HD',
        720: 'HD',
        576: 'SD',
        480: 'SD',
        360: 'SD'
      }
    }
  });
</script>

<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/script.js');
if ( $page1 == 'documentation') {
	echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/documentation.js');
}
?>

<link href="/admin/assets/plugins/code-prettify-master/themes/atelier_sulphurpool_light/atelier-sulphurpool-light.min.css" rel="stylesheet" type="text/css"/>
<script src="/admin/assets/plugins/code-prettify-master/src/prettify.js"></script>
<script>
  // Init Code-Prettify
  window.onload = (function () {
    prettyPrint();
  });
</script>
<!-- END CORE TEMPLATE JS -->
</body>
<!-- END BODY -->
</html>