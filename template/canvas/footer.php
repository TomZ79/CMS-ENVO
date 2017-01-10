<?php if (!isset($page) || empty($page)) { // Code for homepage, offline ?>
	<?php if ($JAK_SHOW_NAVBAR) { ?>
		</div>

		</section><!-- #content end -->

	<?php } ?>
<?php } elseif (isset($page)) { // Code for all other pages ?>
	<?php if ($JAK_SHOW_NAVBAR) { ?>
		</div><!-- .postcontent end -->

		</div>

		</div>

		</section><!-- #content end -->

	<?php } ?>
<?php } ?>

<!-- Import templates below header
============================================= -->
<?php if ($JAK_SHOW_FOOTER) {
	if (isset($JAK_HOOK_BELOW_CONTENT) && is_array ($JAK_HOOK_BELOW_CONTENT)) foreach ($JAK_HOOK_BELOW_CONTENT as $bcontent) {
		include_once APP_PATH . $bcontent['phpcode'];
	}
} ?>

<!-- Footer
============================================= -->
<?php if ($JAK_SHOW_FOOTER && JAK_ASACCESS) { ?>
	<!-- Footer for admin -->
	<footer id="footer" class="dark" style="background: url('/template/canvas/img/footer-bg-1.jpg') repeat fixed; background-size: 100% 100%;">

		<div class="container">

			<!-- Footer Widgets
			============================================= -->
			<div class="footer-widgets-wrap clearfix">

				<div class="col_two_third">

					<div class="widget clearfix">

						<img src="/template/canvas/img/footer-widget-logo.png" alt="" class="alignleft" style="margin-top: 8px; padding-right: 18px; border-right: 1px solid #4A4A4A;">

						<p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp;
							<strong>Flexible</strong> Design Standards with a Retina &amp; Responsive Approach. Browse the amazing Features this template offers.
						</p>

						<div class="line" style="margin: 30px 0;"></div>

						<div class="col_half">
							<div class="widget clearfix">

								<div class="hidden-xs hidden-sm">
									<div class="clear" style="padding-top: 10px;"></div>
								</div>

								<div class="col-md-6 bottommargin-sm center">
									<div class="counter counter-small" style="color: #35BBAA;">
										<span data-from="50" data-to="15065425" data-refresh-interval="80" data-speed="3000" data-comma="true"></span>
									</div>
									<h5 class="nobottommargin">Total Downloads</h5>
								</div>

								<div class="col-md-6 bottommargin-sm center col_last">
									<div class="counter counter-small" style="color: #2CAACA;">
										<span data-from="100" data-to="2465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span>
									</div>
									<h5 class="nobottommargin">Clients Registred</h5>
								</div>

							</div>
						</div>

						<div class="col_half col_last">
							<div class="widget subscribe-widget clearfix">
								<h5>
									<strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:
								</h5>
								<div class="widget-subscribe-form-result"></div>
								<form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
									<div class="input-group divcenter">
										<span class="input-group-addon"><i class="icon-email2"></i></span>
										<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="submit">Subscribe</button>
                      </span>
									</div>
								</form>
							</div>
						</div>

					</div>

				</div>

				<div class="col_one_third col_last">

					<div class="widget clearfix">
						<h4>Instagram Foto Galerie</h4>
						<div class="instagram-photos masonry-thumbs col-6">
							<div id="instafeed"></div>
						</div>
					</div>

					<div class="widget clearfix">
						<div class="col-md-12 bottommargin-sm center">
							<?php if ($apedit) { ?>
								<a class="button button-mini button-rounded" title="<?php echo $tl["general"]["g"]; ?>" href="<?php echo $apedit; ?>"><i class="fa fa-pencil"></i></a>
								<?php if ($qapedit) { ?>
									<a class="button button-mini button-rounded quickedit" title="<?php echo $tl["general"]["g176"]; ?>" href="<?php echo $qapedit; ?>"><i class="fa fa-edit"></i></a>
								<?php }
							}
							if ($jkv["printme"] && $printme) { ?>
								<a class="button button-mini button-rounded" id="jakprint" href="#"><i class="fa fa-print"></i></a>
							<?php }
							if ($JAK_RSS_DISPLAY) { ?>
								<a class="button button-mini button-rounded" href="<?php echo $P_RSS_LINK; ?>"><i class="fa fa-rss"></i></a>
							<?php }
							if ($jkv["heatmap"] && JAK_ASACCESS) { ?>
								<a class="button button-mini button-rounded" href="javascript:void(0)" id="dispheatmap"><i class="fa fa-bar-chart"></i></a>
							<?php } ?>
						</div>
					</div>

				</div>

			</div><!-- .footer-widgets-wrap end -->

		</div>

		<!-- Copyrights
		============================================= -->
		<div id="copyrights">

			<div class="container clearfix">

				<div class="col_half">
					<div class="copyrights-menu copyright-links clearfix">
						<?php echo jak_build_menu (0, $mfooter, $page, 'list-inline no-margin list-footer', '', '', '', JAK_ASACCESS); ?>
					</div>
					<?php echo $jkv["copyright"]; ?>
				</div>

				<div class="col_half col_last tright">
					<div class="fright clearfix">
						<a href="#" class="social-icon si-small si-borderless nobottommargin si-facebook">
							<i class="icon-facebook"></i>
							<i class="icon-facebook"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless nobottommargin si-twitter">
							<i class="icon-twitter"></i>
							<i class="icon-twitter"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless nobottommargin si-gplus">
							<i class="icon-gplus"></i>
							<i class="icon-gplus"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless nobottommargin si-pinterest">
							<i class="icon-pinterest"></i>
							<i class="icon-pinterest"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless nobottommargin si-vimeo">
							<i class="icon-vimeo"></i>
							<i class="icon-vimeo"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless nobottommargin si-github">
							<i class="icon-github"></i>
							<i class="icon-github"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless nobottommargin si-yahoo">
							<i class="icon-yahoo"></i>
							<i class="icon-yahoo"></i>
						</a>

						<a href="#" class="social-icon si-small si-borderless nobottommargin si-linkedin">
							<i class="icon-linkedin"></i>
							<i class="icon-linkedin"></i>
						</a>
					</div>
				</div>

			</div>

		</div><!-- #copyrights end -->

	</footer><!-- #footer end -->
<?php } else {
	if ($JAK_SHOW_FOOTER) { ?>
		<!-- Footer for all -->
		<footer id="footer" class="dark" style="background: url('/template/canvas/img/footer-bg-1.jpg') repeat fixed; background-size: 100% 100%;">

			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_two_third">

						<div class="widget clearfix">

							<img src="/template/canvas/img/footer-widget-logo.png" alt="" class="alignleft" style="margin-top: 8px; padding-right: 18px; border-right: 1px solid #4A4A4A;">

							<p>We believe in <strong>Simple</strong>, <strong>Creative</strong> &amp;
								<strong>Flexible</strong> Design Standards with a Retina &amp; Responsive Approach. Browse the amazing Features this template offers.
							</p>

							<div class="line" style="margin: 30px 0;"></div>

							<div class="col_half">
								<div class="widget clearfix">

									<div class="hidden-xs hidden-sm">
										<div class="clear" style="padding-top: 10px;"></div>
									</div>

									<div class="col-md-6 bottommargin-sm center">
										<div class="counter counter-small" style="color: #35BBAA;">
											<span data-from="50" data-to="15065425" data-refresh-interval="80" data-speed="3000" data-comma="true"></span>
										</div>
										<h5 class="nobottommargin">Total Downloads</h5>
									</div>

									<div class="col-md-6 bottommargin-sm center col_last">
										<div class="counter counter-small" style="color: #2CAACA;">
											<span data-from="100" data-to="2465" data-refresh-interval="50" data-speed="2000" data-comma="true"></span>
										</div>
										<h5 class="nobottommargin">Clients Registred</h5>
									</div>

								</div>
							</div>

							<div class="col_half col_last">
								<div class="widget subscribe-widget clearfix">
									<h5>
										<strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:
									</h5>
									<div class="widget-subscribe-form-result"></div>
									<form id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
										<div class="input-group divcenter">
											<span class="input-group-addon"><i class="icon-email2"></i></span>
											<input type="email" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email">
                      <span class="input-group-btn">
                          <button class="btn btn-success" type="submit">Subscribe</button>
                      </span>
										</div>
									</form>
								</div>
							</div>

						</div>

					</div>

					<div class="col_one_third col_last">

						<div class="widget clearfix">
							<h4>Instagram Foto Galerie</h4>
							<div class="instagram-photos masonry-thumbs col-6">
								<div id="instafeed"></div>
							</div>
						</div>

						<div class="widget clearfix">
							<div class="col-md-12 bottommargin-sm center">
								<?php if ($jkv["printme"] && $printme) { ?>
									<a class="button button-mini button-rounded" id="jakprint" href="#"><i class="fa fa-print"></i></a>
								<?php }
								if ($JAK_RSS_DISPLAY) { ?>
									<a class="button button-mini button-rounded" href="<?php echo $P_RSS_LINK; ?>"><i class="fa fa-rss"></i></a>
								<?php }
								if ($jkv["heatmap"] && JAK_ASACCESS) { ?>
									<a class="button button-mini button-rounded" href="javascript:void(0)" id="dispheatmap"><i class="fa fa-bar-chart"></i></a>
								<?php } ?>
							</div>
						</div>

					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_half">
						<div class="copyrights-menu copyright-links clearfix">
							<?php echo jak_build_menu (0, $mfooter, $page, 'list-inline no-margin list-footer', '', '', '', JAK_ASACCESS); ?>
						</div>
						<?php echo $jkv["copyright"]; ?>
					</div>

					<div class="col_half col_last tright">
						<div class="fright clearfix">
							<a href="#" class="social-icon si-small si-borderless nobottommargin si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless nobottommargin si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless nobottommargin si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless nobottommargin si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless nobottommargin si-vimeo">
								<i class="icon-vimeo"></i>
								<i class="icon-vimeo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless nobottommargin si-github">
								<i class="icon-github"></i>
								<i class="icon-github"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless nobottommargin si-yahoo">
								<i class="icon-yahoo"></i>
								<i class="icon-yahoo"></i>
							</a>

							<a href="#" class="social-icon si-small si-borderless nobottommargin si-linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>
						</div>
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->
	<?php }
}
if (!$JAK_SHOW_FOOTER && JAK_ASACCESS) { ?>
	<div class="hidden-footer-manage">
		<?php if ($apedit) { ?>
			<a class="button button-mini button-rounded" title="<?php echo $tl["general"]["g"]; ?>" href="<?php echo $apedit; ?>"><i class="fa fa-pencil"></i></a>
			<?php if ($qapedit) { ?>
				<a class="button button-mini button-rounded quickedit" title="<?php echo $tl["general"]["g176"]; ?>" href="<?php echo $qapedit; ?>"><i class="fa fa-edit"></i></a>
			<?php }
		} ?>
	</div>
<?php } ?>

</div><!-- #wrapper end -->

<!-- Go To Top
============================================= -->
<div id="gotoTop" class="icon-angle-up"></div>

<!-- Style Manager
============================================= -->
<?php if (JAK_ASACCESS && $jkv["styleswitcher_tpl"]) include_once APP_PATH . 'template/canvas/styleswitcher.php'; ?>

<!-- External JavaScripts
============================================= -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>template/canvas/js/canvas/functions.js?=<?php echo $jkv["updatetime"]; ?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>template/canvas/js/canvas/plugins.js?=<?php echo $jkv["updatetime"]; ?>"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>template/canvas/js/canvas.js?=<?php echo $jkv["updatetime"]; ?>"></script>

<script type="text/javascript" src="https://raw.githubusercontent.com/stevenschobert/instafeed.js/master/instafeed.min.js"></script>
<!-- Footer Scripts
============================================= -->
<script type="text/javascript">

	var userFeed = new Instafeed({
		get: 'user',
		limit: '10',
		userId: '4026597334',
		accessToken: '4026597334.1677ed0.50fafdec6f92488c903d0d1878762659',
		template: '<a href="{{link}}" target="_blank"><img src="{{image}}" /></a>'
	});
	userFeed.run();
</script>

<?php if ($jkv["printme"]) { ?>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>js/jakprint.js?=<?php echo $jkv["updatetime"]; ?>"></script>

	<script type="text/javascript">
		$(document).ready(function () {

			$("#jakprint").click(function (e) {
				e.preventDefault();
				$('div#printdiv').printElement();
			});

		});
	</script>
<?php } ?>

<script type="text/javascript">
	jakWeb.jak_sitestyle = "<?php echo $jkv["sitestyle"];?>";
	jakWeb.jak_lang = "<?php echo $site_language;?>";
	jakWeb.jak_url = "<?php echo BASE_URL;?>";
	jakWeb.jak_url_orig = "<?php echo BASE_URL;?>";
	jakWeb.jak_search_link = "<?php echo $JAK_SEARCH_LINK;?>";
	jakWeb.jakrequest_uri = "<?php echo JAK_PARSE_REQUEST;?>";
	jakWeb.jak_quickedit = "<?php echo $tl["general"]["g176"];?>";

	<?php if (isset($_SESSION["infomsg"])) { ?>
	$.notify({icon: 'fa fa-info-circle', message: '<?php echo $_SESSION["infomsg"];?>'}, {type: 'info'});
	<?php } if (isset($_SESSION["successmsg"])) { ?>
	$.notify({icon: 'fa fa-check-square-o', message: '<?php echo $_SESSION["successmsg"];?>'}, {type: 'success'});
	<?php } if (isset($_SESSION["errormsg"])) { ?>
	$.notify({icon: 'fa fa-exclamation-triangle', message: '<?php echo $_SESSION["errormsg"];?>'}, {type: 'danger'});
	<?php } ?>

	<?php if (isset($SHOWVOTE) && isset($PLUGIN_LIKE_ID)) { ?>
	$(document).ready(function () {
		getLikeCounter(<?php echo $PAGE_ID;?>, <?php echo $PLUGIN_LIKE_ID;?>);
	});
	<?php } ?>

</script>

<?php if ($jkv["heatmap"] && JAK_ASACCESS) { ?>

	<script src="<?php echo BASE_URL; ?>js/heatmap.js" type="text/javascript"></script>

	<script type="text/javascript">

		jakWeb.jak_heatmap = "<?php echo $JAK_HEATMAPLOC;?>";

		$(document).saveClicks();

		$('#dispheatmap').click(function () {
			$.displayClicks();
			$('#heatmap-overlay').click(function () {
				$.removeClicks();
				$(document).saveClicks();
			});
			$(document).stopSaveClicks();
			return false;
		});

	</script>

<?php }
if (isset($JAK_HOOK_FOOTER_END) && is_array ($JAK_HOOK_FOOTER_END)) foreach ($JAK_HOOK_FOOTER_END as $hfootere) {
	include_once APP_PATH . $hfootere['phpcode'];
}
echo $jkv["analytics"];
if (isset($JAK_FOOTER_JAVASCRIPT)) echo $JAK_FOOTER_JAVASCRIPT; ?>

<?php if (JAK_ASACCESS && $jkv["styleswitcher_tpl"]) { ?>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>template/jakweb/js/stylechanger.js?=<?php echo $jkv["updatetime"]; ?>"></script>
<?php } ?>

<?php if (isset($JAK_FACEBOOK_SDK_CONNECTION)) echo $JAK_FACEBOOK_SDK_CONNECTION; ?>

<!-- Modal -->
<div class="modal fullscreen fade" id="JAKModal" tabindex="-1" role="dialog" aria-labelledby="JAKModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="JAKModalLabel">&nbsp;</h4>
			</div>
			<div class="modal-body">
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo $tl["general"]["g177"]; ?></button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</body>
</html>