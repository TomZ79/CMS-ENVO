<?php

switch ($section) {
	case 'A':

		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</section>';

		break;
	case 'B':

		echo '</div>';

		// Sidebar if right
		if (!empty($ENVO_HOOK_SIDE_GRID) && $setting["sidebar_location_tpl"] == "right") {
			include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/sidebar.php';
		}

		echo '</div>';
		echo '</div>';
		echo '</section>';

		break;
	default:

}

?>

<?php if ($ENVO_SHOW_FOOTER) {
	// Import templates below header
	if (isset($ENVO_HOOK_BELOW_FOOTER) && is_array($ENVO_HOOK_BELOW_FOOTER)) foreach ($ENVO_HOOK_BELOW_FOOTER as $bfooter) {
		include_once APP_PATH . $bfooter['phpcode'];
	}
} ?>

</div>
<!-- END MAIN CONTENT -->

<?php if ($ENVO_SHOW_FOOTER && ENVO_ASACCESS) { ?>
	<!-- START FOOTER SECTION -->
	<footer class="main-footer">
		<!--Upper Box-->
		<div class="upper-box">
			<div class="auto-container">
				<div class="row no-gutters">

					<!--Footer Info Box-->
					<div class="footer-info-box col-md-4 col-sm-6 col-xs-12">
						<div class="info-inner">
							<div class="content">
								<div class="icon">
									<span class="flaticon-pin"></span>
								</div>
								<div class="text">54B, Tailstoi Town 5238 MT, <br> La city, IA 522364</div>
							</div>
						</div>
					</div>

					<!--Footer Info Box-->
					<div class="footer-info-box col-md-4 col-sm-6 col-xs-12">
						<div class="info-inner">
							<div class="content">
								<div class="icon">
									<span class="flaticon-email"></span>
								</div>
								<div class="text">Email us : <br>
									<a href="mailto:contact.contact@autorex.com">contact@autorex.com</a></div>
							</div>
						</div>
					</div>

					<!--Footer Info Box-->
					<div class="footer-info-box col-md-4 col-sm-6 col-xs-12">
						<div class="info-inner">
							<div class="content">
								<div class="icon">
									<span class="flaticon-phone"></span>
								</div>
								<div class="text">Call us on : <br><strong>+ 1800 456 7890</strong></div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

		<!--Widgets Section-->
		<div class="widgets-section">
			<div class="auto-container">
				<div class="widgets-inner-container">
					<div class="row clearfix">

						<!--Footer Column-->
						<div class="footer-column col-lg-4">
							<div class="widget widget_about">
								<div class="logo">
									<a href="index.html"><img src="assets/images/logo-two.png" alt=""/></a>
								</div>
								<div class="text">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide additional clickthroughs.</div>
							</div>
						</div>

						<!--Footer Column-->
						<div class="footer-column col-lg-4">
							<div class="row">
								<div class="col-md-6">
									<div class="widget widget_links">
										<h4 class="widget_title">Usefull Links</h4>
										<div class="widget-content">
											<ul class="list">
												<li><a href="index.html">Home</a></li>
												<li><a href="about.html">About Us</a></li>
												<li><a href="#">Appointment</a></li>
												<li><a href="testimonial.html">Testimonials</a></li>
												<li><a href="contact.html">Contact Us</a></li>
											</ul>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="widget widget_links">
										<h4 class="widget_title">Our Services</h4>
										<div class="widget-content">
											<ul class="list">
												<li><a href="#">Performance Upgrade</a></li>
												<li><a href="#">Transmission Service</a></li>
												<li><a href="#">Break Repair & Service</a></li>
												<li><a href="#">Engine Service & Repair</a></li>
												<li><a href="#">Trye & Wheels</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>

						<!--Footer Column-->
						<div class="footer-column col-lg-4">
							<div class="widget widget_newsletter">
								<h4 class="widget_title">Newsletter</h4>
								<div class="text">Get latest updates and offers.</div>
								<div class="newsletter-form">
									<form class="ajax-sub-form" method="post">
										<div class="form-group">
											<input type="email" placeholder="Enter your email" id="subscription-email">
											<button class="theme-btn" type="submit"><span class="fas fa-paper-plane"></span></button>
											<label class="subscription-label" for="subscription-email"></label>
										</div>
									</form>
								</div>
								<ul class="social-links">
									<li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
									<li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
									<li><a href="#"><span class="fab fa-twitter"></span></a></li>
									<li><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
								</ul>
							</div>
						</div>

					</div>
				</div>
			</div>
		</div>

		<!--Footer Bottom-->
		<div class="auto-container">
			<div class="footer-bottom">
				<div class="copyright-text">© Copyright <a href="#">Autorex</a> 2020 . All right reserved.</div>
				<div class="text">Created by <a href="#">ThemeArc</a></div>
			</div>
		</div>
	</footer>
	<!-- END FOOTER SECTION -->

<?php } else {
	if ($ENVO_SHOW_FOOTER) { ?>
		<!-- START FOOTER SECTION -->
		<footer class="main-footer">
			<!--Upper Box-->
			<div class="upper-box">
				<div class="auto-container">
					<div class="row no-gutters">

						<!--Footer Info Box-->
						<div class="footer-info-box col-md-4 col-sm-6 col-xs-12">
							<div class="info-inner">
								<div class="content">
									<div class="icon">
										<span class="flaticon-pin"></span>
									</div>
									<div class="text">54B, Tailstoi Town 5238 MT, <br> La city, IA 522364</div>
								</div>
							</div>
						</div>

						<!--Footer Info Box-->
						<div class="footer-info-box col-md-4 col-sm-6 col-xs-12">
							<div class="info-inner">
								<div class="content">
									<div class="icon">
										<span class="flaticon-email"></span>
									</div>
									<div class="text">Email us : <br> <a href="mailto:contact.contact@autorex.com">contact@autorex.com</a></div>
								</div>
							</div>
						</div>

						<!--Footer Info Box-->
						<div class="footer-info-box col-md-4 col-sm-6 col-xs-12">
							<div class="info-inner">
								<div class="content">
									<div class="icon">
										<span class="flaticon-phone"></span>
									</div>
									<div class="text">Call us on : <br><strong>+ 1800 456 7890</strong></div>
								</div>
							</div>
						</div>

					</div>
				</div>
			</div>

			<!--Widgets Section-->
			<div class="widgets-section">
				<div class="auto-container">
					<div class="widgets-inner-container">
						<div class="row clearfix">

							<!--Footer Column-->
							<div class="footer-column col-lg-4">
								<div class="widget widget_about">
									<div class="logo">
										<a href="index.html"><img src="assets/images/logo-two.png" alt=""/></a>
									</div>
									<div class="text">Capitalize on low hanging fruit to identify a ballpark value added activity to beta test. Override the digital divide additional clickthroughs.</div>
								</div>
							</div>

							<!--Footer Column-->
							<div class="footer-column col-lg-4">
								<div class="row">
									<div class="col-md-6">
										<div class="widget widget_links">
											<h4 class="widget_title">Usefull Links</h4>
											<div class="widget-content">
												<ul class="list">
													<li><a href="index.html">Home</a></li>
													<li><a href="about.html">About Us</a></li>
													<li><a href="#">Appointment</a></li>
													<li><a href="testimonial.html">Testimonials</a></li>
													<li><a href="contact.html">Contact Us</a></li>
												</ul>
											</div>
										</div>
									</div>
									<div class="col-md-6">
										<div class="widget widget_links">
											<h4 class="widget_title">Our Services</h4>
											<div class="widget-content">
												<ul class="list">
													<li><a href="#">Performance Upgrade</a></li>
													<li><a href="#">Transmission Service</a></li>
													<li><a href="#">Break Repair & Service</a></li>
													<li><a href="#">Engine Service & Repair</a></li>
													<li><a href="#">Trye & Wheels</a></li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>

							<!--Footer Column-->
							<div class="footer-column col-lg-4">
								<div class="widget widget_newsletter">
									<h4 class="widget_title">Newsletter</h4>
									<div class="text">Get latest updates and offers.</div>
									<div class="newsletter-form">
										<form class="ajax-sub-form" method="post">
											<div class="form-group">
												<input type="email" placeholder="Enter your email" id="subscription-email">
												<button class="theme-btn" type="submit"><span class="fas fa-paper-plane"></span></button>
												<label class="subscription-label" for="subscription-email"></label>
											</div>
										</form>
									</div>
									<ul class="social-links">
										<li><a href="#"><span class="fab fa-facebook-f"></span></a></li>
										<li><a href="#"><span class="fab fa-linkedin-in"></span></a></li>
										<li><a href="#"><span class="fab fa-twitter"></span></a></li>
										<li><a href="#"><span class="fab fa-google-plus-g"></span></a></li>
									</ul>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>

			<!--Footer Bottom-->
			<div class="auto-container">
				<div class="footer-bottom">
					<div class="copyright-text">© Copyright <a href="#">Autorex</a> 2020 . All right reserved.</div>
					<div class="text">Created by <a href="#">ThemeArc</a></div>
				</div>
			</div>
		</footer>
		<!-- END FOOTER SECTION -->

	<?php }
}
if (!$ENVO_SHOW_FOOTER) { ?>

<?php } ?>

</div><!-- END BODY -->

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="flaticon-right-arrow"></span></div>

<!-- End Document  ================================================== --><!-- Placed at the end of the document so the pages load faster -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/popper.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/bootstrap.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/bootstrap-select.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.fancybox.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/isotope.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/owl.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/appear.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/wow.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/lazyload.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/scrollbar.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/TweenMax.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/swiper.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.ajaxchimp.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/parallax-scroll.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/script.js"></script>

<!-- Theme Function -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/theme.custom.js"></script>
<script src="/assets/js/generated_js.php"></script>
<script>
  envoWeb.envo_forgotlogin = '<?= $FORGOT_LOGIN?>';
</script>

<?php
// Hook footer code
if (isset($ENVO_HOOK_FOOTER_END) && is_array($ENVO_HOOK_FOOTER_END)) foreach ($ENVO_HOOK_FOOTER_END as $hfootere) {
	include_once APP_PATH . $hfootere['phpcode'];
}

// Javascript for page - FOOTER
if (isset($ENVO_FOOTER_JAVASCRIPT)) echo $ENVO_FOOTER_JAVASCRIPT;

// Social Buttons Script
if ($SHOWSOCIALBUTTON) {
	include APP_PATH . 'template/' . ENVO_TEMPLATE . '/socialbutton.php';
}
?>

<?php if (isset($ENVO_NEWS_IN_CONTENT) && is_array($ENVO_NEWS_IN_CONTENT)) { ?>
	<!-- News in OWL Carousel -->
	<script>
    // Be more specific with your selector if .items is used elsewhere on the page.
    var items = $('.owl-carousel .item').length;
    if (items > 1) {
      $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 30,
        nav: true,
        dots: false,
        navText: [],
        responsive: {
          0: {
            items: 1
          },
          768: {
            items: 3
          },
          960: {
            items: 3
          },
          1200: {
            items: 3
          },
          1920: {
            items: 3
          }
        }
      });
    } else {
      // same as above but with loop: false;
      $('.owl-carousel').owlCarousel({
        loop: false,
        margin: 50,
        nav: true,
        dots: false
      });
    }
	</script>
<?php } ?>

<!-- Notification -->
<?php if (isset($_SESSION)) { ?>

	<script>
    // Load script after page loading
    $(window).on("load", function () {
			<?php if (isset($_SESSION["infomsg"])) { ?>
      $.notify({icon: 'icon-info', message: '<?=$_SESSION["infomsg"]?>'}, {type: 'info'});
			<?php }
			if (isset($_SESSION["successmsg"])) { ?>
      $.notify({icon: 'icon-check', message: '<?=$_SESSION["successmsg"]?>'}, {type: 'success'});
			<?php }
			if (isset($_SESSION["errormsg"])) { ?>
      $.notify({icon: 'icon-attention', message: '<?=$_SESSION["errormsg"]?>'}, {type: 'danger'});
			<?php }
			if (isset($_SESSION["warningmsg"])) { ?>
      $.notify({icon: '', message: '<?=$_SESSION["warningmsg"]?>'}, {type: 'warning'});
			<?php }
			if ($errorpp) { ?>
      $.notify({icon: 'icon-attention', message: '<?=$errorpp["e"]?>'}, {type: 'danger'});
			<?php }
			if ($PAGE_PASSWORD && ENVO_ASACCESS) { ?>
      $.notify({icon: 'icon-info', message: '<?=$tl["notification"]["n5"]?>'}, {type: 'info', delay: 0});
			<?php }
			if ($setting["offline"] == 1 && ENVO_ASACCESS) { ?>
      $.notify({
        // Options
        icon: 'icon-flash',
        message: '<?=$tl["notification"]["n1"]?>'
      }, {
        // Settings
        type: 'offline',
        timer: 0,
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
          '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
          '<span data-notify="icon"></span> ' +
          '<span data-notify="title" style="display: block;font-weight: bold;">{1}</span> ' +
          '<span data-notify="message">{2}</span>' +
          '</div>' +
          '</div>'
      });

			<?php } ?>
    });
	</script>

<?php } ?>

<!-- Modal -->
<div class="modal fullscreen fade" id="ENVOModal" tabindex="-1" role="dialog" aria-labelledby="ENVOModal" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="ENVOModalLabel"></h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;
				</button>
			</div>
			<div class="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-light" data-dismiss="modal"><?= $tl["global_text"]["gtxt5"] ?></button>
			</div>
		</div>
	</div>
</div>

<!-- Search box -->
<?php if (ENVO_SEARCH && ENVO_USER_SEARCH) { ?>
	<!-- START SEARCH POPUP -->
	<div id="search-popup" class="search-popup">
		<div class="close-search theme-btn"><span class="flaticon-remove"></span></div>
		<div class="popup-inner">
			<div class="overlay-layer"></div>
			<div class="search-form">
				<form method="post" action="index.html">
					<div class="form-group">
						<fieldset>
							<input type="search" class="form-control" name="search-input" value="" placeholder="Search Here" required>
							<input type="submit" value="Search Now!" class="theme-btn">
						</fieldset>
					</div>
				</form>
				<br>
				<h3>Recent Search Keywords</h3>
				<ul class="recent-searches">
					<li><a href="#">Finance</a></li>
					<li><a href="#">Idea</a></li>
					<li><a href="#">Service</a></li>
					<li><a href="#">Growth</a></li>
					<li><a href="#">Plan</a></li>
				</ul>
			</div>
		</div>
	</div>
	<!-- END SEARCH POPUP -->
<?php } ?>

<!-- Search script -->
<?php if ($setting["ajaxsearch"] && $AJAX_SEARCH_PLUGIN_URL) { ?>
	<script>
    $(document).ready(function () {
      $('#ajaxsearchForm').ajaxSearch({
        apiURL: '<?=BASE_URL . $AJAX_SEARCH_PLUGIN_URL?>',
        msg: '<?=$tl["searching"]["stxt12"]?>',
        seo: <?=$AJAX_SEARCH_PLUGIN_SEO?>
      });

      $('#Jajaxs').alphanumeric({nocaps: false, allow: ' +*'});
      $('.hideAdvSearchResult').fadeIn();
    });
	</script>
<?php } ?>

<!-- EU Cookies -->
<?php if ($setting["eucookie_enabled"] == 1) {
	include APP_PATH . '/assets/js/eu-cookies.php';
} ?>

<!-- Facebook SDK connection -->
<?php if (isset($ENVO_FACEBOOK_SDK_CONNECTION)) echo $ENVO_FACEBOOK_SDK_CONNECTION; ?>

<!-- RegisterForm plugins -->
<?php if (defined('ENVO_PLUGIN_REGISTER_FORM') && $page == $PLUGIN_RF_CAT["varname"]) {
	$pluginsite_template = 'template/' . ENVO_TEMPLATE . '/plugintemplate/register_form/js/script.registerform.php';

	if (file_exists($pluginsite_template)) {
		include APP_PATH . 'template/' . ENVO_TEMPLATE . '/plugintemplate/register_form/js/script.registerform.php';
	} else {
		include APP_PATH . 'plugins/register_form/js/script.registerform.php';
	}
} ?>

</body></html>