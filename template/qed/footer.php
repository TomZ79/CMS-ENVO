		<?php

		/* GRID SYSTEM FOR DIFFERENT PAGE - show main section without sidebar - END TAG */

		if ((empty($JAK_HOOK_SIDE_GRID) && (!empty($page)) && (!$PAGE_PASSWORD)) &&
       ($page != 'offline') &&
       ($page != '404') &&
       ($jkv["searchform"]) ||
       (empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && $PAGE_PASSWORD == $_SESSION[ 'pagesecurehash' . $PAGE_ID ]) ||
       (empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && JAK_ASACCESS)) {
		?>
						</div>
					</div>
				</section>
		<?php } ?>

		<?php

		/* GRID SYSTEM FOR DIFFERENT PAGE - show main section with sidebar - END TAG */

		if ((!empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && ($PAGE_PASSWORD == $_SESSION[ 'pagesecurehash' . $PAGE_ID ])) ||
       (!empty($JAK_HOOK_SIDE_GRID) && !$PAGE_PASSWORD) ||
       (!empty($JAK_HOOK_SIDE_GRID) && $PAGE_PASSWORD && JAK_ASACCESS) ||
       (!empty($JAK_HOOK_SIDE_GRID) && (!empty($page)) && (!$PAGE_PASSWORD))) {
    ?>
							</div>

			<!-- Sidebar if right -->
			<?php if (!empty($JAK_HOOK_SIDE_GRID) && $jkv["sidebar_location_tpl"] == "right") {
				include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/sidebar.php';
			} ?>

						</div>
					</div>
				</section>
		<?php } ?>

	</main>
	<!-- / content -->

	<?php if ($JAK_SHOW_FOOTER) {
		// Import templates below header
		if (isset($JAK_HOOK_BELOW_CONTENT) && is_array ($JAK_HOOK_BELOW_CONTENT)) foreach ($JAK_HOOK_BELOW_CONTENT as $bcontent) {
			include_once APP_PATH . $bcontent['phpcode'];
		}
	} ?>

	<?php if ($JAK_SHOW_FOOTER && JAK_ASACCESS) { ?>
		<!-- footer -->
		<footer id="main-footer">
			<div class="container">
				<div class="row">

					<div class="col-sm-<?php echo ($jkv["onefooterblock_qed_tpl"] == 1 ?  '6' : '3');  ?>">
						<div class="footer-widget">
							<?php echo ($jkv["onefooterblock_qed_tpl"] == 1 ?  $jkv["onefooterblocktext_qed_tpl"] : $jkv["footer1text_qed_tpl"]);  ?>
						</div>
					</div>

					<div class="<?php echo ($jkv["onefooterblock_qed_tpl"] == 1 ?  'hidden' : 'col-sm-3'); ?>">
						<div class="footer-widget">
							<?php echo ($jkv["onefooterblock_qed_tpl"] == 1 ?  '' : $jkv["footer2text_qed_tpl"]);  ?>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="col-md-offset-2 footer-widget">

							<h3><?php echo $jkv["companyName_qed_tpl"]; ?></h3>
							<address>
								<p>
									<i class="icon-phone"></i><?php echo $jkv["companyPhone_qed_tpl"]; ?><br>
									<i class="icon-globe"></i><a href="<?php echo $jkv["companySite_qed_tpl"]; ?>" target="_blank"><?php echo $jkv["companySite_qed_tpl"]; ?></a><br>
									<i class="icon-mail-alt"></i>&nbsp;<a href="mailto:<?php echo $jkv["companyEmail_qed_tpl"]; ?>"><?php echo $jkv["companyEmail_qed_tpl"]; ?></a>
								</p>
							</address>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="footer-widget mb-small">
							<h3><?php echo $jkv["socialfooterText_qed_tpl"]; ?></h3>

							<ul class="social-icons dark-main-color <?php echo $jkv["fsocialstyle_qed_tpl"] . ' ' . $jkv["fsocialsize_qed_tpl"];?>">
								<?php if ($jkv["facebookfooterShow_qed_tpl"] == 1) { ?>
									<li>
										<a href="<?php echo $jkv["facebookfooterLinks_qed_tpl"]; ?>" class="facebook" target="_blank"><i class="icon-facebook"></i></a>
									</li>
								<?php }
								if ($jkv["twitterfooterShow_qed_tpl"] == 1) { ?>
									<li>
										<a href="<?php echo $jkv["twitterfooterLinks_qed_tpl"]; ?>" class="twitter" target="_blank"><i class="icon-twitter"></i></a>
									</li>
								<?php }
								if ($jkv["googlefooterShow_qed_tpl"] == 1) { ?>
									<li>
										<a href="<?php echo $jkv["googlefooterLinks_qed_tpl"]; ?>" class="gplus" target="_blank"><i class="icon-gplus"></i></a>
									</li>
								<?php }
								if ($jkv["instagramfooterShow_qed_tpl"] == 1) { ?>
									<li>
										<a href="<?php echo $jkv["instagramfooterLinks_qed_tpl"]; ?>" class="facebook" target="_blank"><i class="icon-instagramm"></i></a>
									</li>
								<?php }
								if ($JAK_RSS_DISPLAY) { ?>
									<li>
										<a href="<?php echo $P_RSS_LINK; ?>" class="rss" target="_blank"><i class="icon-rss"></i></a>
									</li>
								<?php } ?>
							</ul>
						</div>
						<div class="footer-widget mb-small system-icons">
							<?php if ($apedit) { ?>
								<a class="btn btn-info btn-xs" title="<?php echo $tl["general"]["g"]; ?>" href="<?php echo $apedit; ?>">
									<i class="icon-pencil"></i>
								</a>
								<?php if ($qapedit) { ?>
									<a class="btn btn-info btn-xs quickedit" title="<?php echo $tl["general"]["g176"]; ?>" href="<?php echo $qapedit; ?>">
										<i class="icon-edit"></i>
									</a>
								<?php }
							}
							if ($jkv["printme"] && $printme) { ?>
								<a class="btn btn-info btn-xs" id="jakprint" href="#">
									<i class="icon-print"></i>
								</a>
							<?php }
							if ($JAK_RSS_DISPLAY) { ?>
								<a class="btn btn-info btn-xs" href="<?php echo $P_RSS_LINK; ?>">
									<i class="icon-rss"></i>
								</a>
							<?php }
							if ($jkv["heatmap"] && JAK_ASACCESS) { ?>
								<a class="btn btn-info btn-xs" href="javascript:void(0)" id="dispheatmap">
									<i class="icon-chart-bar"></i>
								</a>
							<?php } ?>
						</div>
					</div>

				</div>
			</div>

			<div id="footer-rights">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<?php echo jak_build_menu_qed (0, $mfooter, $page, 'footer-list-style', '', '', '', '', JAK_ASACCESS); ?>
						</div>
						<div class="col-md-6">
							<p><?php echo $jkv["copyright"]; ?></p>
						</div>

					</div>
				</div>
			</div>
		</footer>
		<!-- / footer -->
	<?php } else { if ($JAK_SHOW_FOOTER) { ?>
		<!-- footer -->
		<footer id="main-footer">
			<div class="container">
				<div class="row">

					<div class="col-sm-6">
						<div class="footer-widget">
							<img src="images/neko-logo.png" alt="latest Little Neko news" id="footerLogo" class="mb-small">
							<p><a href="http://www.little-neko.com" title="Little Neko, website template creation">Little Neko</a> is a web design and development studio. We build responsive HTML5 and CSS3 templates, integrating best web design practises and up-to-date web technologies to create great user experiences. We love what we do and we hope you too ! </p>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="footer-widget">

							<h3>Little NEKO</h3>
							<address>
								<p>
									<i class="icon-location"></i>1600 Pennsylvania Avenue NW<br>
									Washington, DC 20500 <br>
									<i class="icon-phone"></i>256.478.3252 <br>
									<i class="icon-mail-alt"></i>&nbsp;<a href="mailto:contact@template.com">contact@template.com</a>
								</p>
							</address>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="footer-widget">
							<h3>Follow us, we are social</h3>

							<ul class="social-icons dark-main-color circle medium">
								<li>
									<a href="#" class="rss " title="rss"><i class="icon-rss"></i></a>
								</li>
								<li>
									<a href="#" class="facebook" title="facebook"><i class="icon-facebook"></i></a>
								</li>
								<li>
									<a href="#" class="twitter" title="twitter"><i class="icon-twitter"></i></a>
								</li>
								<li>
									<a href="#" class="gplus" title="gplus"><i class="icon-gplus"></i></a>
								</li>
							</ul>
						</div>
					</div>

				</div>
			</div>

			<div id="footer-rights">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<p>Copyright © 2012 <a href="http://www.little-neko.com" target="blank">Little NEKO</a> / All rights reserved.</p>
						</div>

					</div>
				</div>
			</div>
		</footer>
		<!-- / footer -->
	<?php } } if (!$JAK_SHOW_FOOTER) { ?>

	<?php } ?>

</div>
<!-- Global wrapper -->

<!-- End Document  ================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script src="/assets/plugins/jquery/jquery-2.2.4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="/template/<?php echo $jkv["sitestyle"];?>/js-plugins/jquery-ui/jquery-ui-1.8.23.custom.min.js"></script>
<!-- External framework plugins -->
<?php if ($jkv["activeroyalslider_qed_tpl"] == 1) { ?>
<script type="text/javascript" src="/template/<?php echo $jkv["sitestyle"];?>/js-plugins/royalslider/jquery.royalslider.min.js"></script>
<?php } ?>
<script type="application/javascript" src="/template/<?php echo $jkv["sitestyle"];?>/js-plugins/external-plugins.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstap-notify/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="/assets/plugins/owl.carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="/assets/plugins/full-screen-navigation/js/FSNav.js"></script>

<!-- Neko framework script -->
<script type="text/javascript" src="/template/<?php echo $jkv["sitestyle"];?>/js/neko-framework.js"></script>

<!-- Definition Function and Notification -->
<script type="text/javascript">
	jakWeb.jak_lang = "<?php echo $site_language;?>";
	jakWeb.jak_url = "<?php echo BASE_URL;?>";
	jakWeb.jak_url_orig = "<?php echo BASE_URL;?>";
	jakWeb.jak_search_link = "<?php echo $JAK_SEARCH_LINK;?>";
	jakWeb.jakrequest_uri = "<?php echo JAK_PARSE_REQUEST;?>";
	jakWeb.jak_quickedit = "<?php echo $tl["general"]["g176"];?>"
</script>

<?php include_once APP_PATH . '/template/' . $jkv["sitestyle"] . '/js/neko-royalSlider.php' ?>

<!-- Comments Script -->
<?php if ($JAK_COMMENT_FORM) { ?>
<script type="text/javascript">
	<?php if ($jkv["hvm"]) { ?>
	jQuery(document).ready(function () {
		jQuery(".cFrom").append('<input type="hidden" name="<?php echo $random_name;?>" value="<?php echo $random_value;?>" />');
	});
	<?php } ?>
	jakWeb.jak_submit = "<?php echo $tl['general']['g10'];?>";
	jakWeb.jak_submitwait = "<?php echo $tl['general']['g99'];?>";
</script>

<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/post.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/plugins/tinymce/tinymce.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/usreditor.js"></script>
<?php } ?>

<?php
if (isset($JAK_HOOK_FOOTER_END) && is_array ($JAK_HOOK_FOOTER_END)) foreach ($JAK_HOOK_FOOTER_END as $hfootere) {
	include_once APP_PATH . $hfootere['phpcode'];
}
// Javascript for page - FOOTER
if (isset($JAK_FOOTER_JAVASCRIPT)) echo $JAK_FOOTER_JAVASCRIPT;
?>

<!-- Social Buttons Script -->
<?php if ($SHOWSOCIALBUTTON) {
	include APP_PATH . 'template/' . $jkv["sitestyle"] . '/socialbutton.php';
} ?>

<?php if (isset($JAK_NEWS_IN_CONTENT) && is_array ($JAK_NEWS_IN_CONTENT)) { ?>
	<!-- News in OWL Carousel -->
	<script type="text/javascript">
		$('.owl-carousel').owlCarousel({
			loop: false,
			margin: 50,
			nav: true,
			dots: false,
			navText: [],
			responsive: {
				0: {
					items: 1
				},
				479: {
					items: 1
				},
				768: {
					items: 2
				},
				979: {
					items: 3
				},
				1199: {
					items: 3
				}
			},
		});
	</script>
<?php } ?>

<!-- Notification -->
<?php if (isset($_SESSION["infomsg"])) { ?>
<script type="text/javascript">
	$.notify({icon: 'icon-info', message: '<?php echo $_SESSION["infomsg"];?>'}, {type: 'info'});
</script>
<?php } if (isset($_SESSION["successmsg"])) { ?>
<script type="text/javascript">
	$.notify({icon: 'icon-check', message: '<?php echo $_SESSION["successmsg"];?>'}, {type: 'success'});
</script>
<?php } if (isset($_SESSION["errormsg"])) { ?>
<script type="text/javascript">
	$.notify({icon: 'icon-attention', message: '<?php echo $_SESSION["errormsg"];?>'}, {type: 'danger'});
</script>
<?php } if ($errorpp) { ?>
	<script type="text/javascript">
		$.notify({icon: 'icon-attention', message: '<?php echo $errorpp["e"];?>'}, {type: 'danger'});
	</script>
<?php } if ($PAGE_PASSWORD && JAK_ASACCESS) { ?>
	<script type="text/javascript">
		$.notify({icon: 'icon-info', message: '<?php echo $tl["notification"]["n5"];?>'}, {type: 'info',delay: 0});
	</script>
<?php } if ($jkv["offline"] == 1 && JAK_ASACCESS) { ?>
<script type="text/javascript">
	$.notify({
		// Options
		icon: 'icon-flash',
		message: '<?php echo $tl["notification"]["n1"];?>',
	}, {
		// Settings
		type: 'offline',
		timer: 0,
		template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
		'<button type="button" aria-hidden="true" class="close" data-notify="dismiss" style="color: #fff;opacity: 0.8;">×</button>' +
		'<span data-notify="icon"></span> ' +
		'<span data-notify="title" style="display: block;font-weight: bold;">{1}</span> ' +
		'<span data-notify="message">{2}</span>' +
		'</div>' +
		'</div>'
	});
</script>
<?php } ?>

<!-- Neko Custom script -->
<script type="text/javascript" src="/template/<?php echo $jkv["sitestyle"];?>/js/neko-custom.js"></script>

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
		</div>
	</div>
</div>

<?php if ($jkv["loginShow_qed_tpl"] == 1) { if (!JAK_USERID) { ?>
<!-- Modal - Login -->
<div id="LoginModal" class="full-screen-nav">
	<span class="full-screen-nav-close"></span>
	<div class="full-screen-nav-content">
		<div class="full-screen-nav-general">
			<h1>Login to web</h1>
			<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
				<div class="container">
					<div class="row">
						<div class="col-sm-4 col-sm-offset-4">
							<div class="input-group mb-small" id="top-login-username">
								<span class="input-group-addon"><i class="icon-user-md"></i></span>
								<input type="text" class="form-control" name="jakU" id="username" value="<?php if (isset($_REQUEST["jakU"])) echo $_REQUEST["jakU"]; ?>" placeholder="<?php echo $tl["login"]["l1"]; ?>"/>
							</div>
							<div class="input-group mb-small" id="top-login-password">
								<span class="input-group-addon"><i class="icon-key"></i></span>
								<span class="show-pass"><i class="icon-eye"></i></span>
								<input type="password" class="form-control" name="jakP" id="password" placeholder="<?php echo $tl["login"]["l2"]; ?>"/>
							</div>
							<div class="form-group">
								<label class="checkbox-inline">
									<input type="checkbox" name="lcookies" value="1"> <?php echo $tl["notification"]["n2"]; ?>
								</label>
							</div>
							<button type="submit" name="login" class="btn btn-default btn-sm btn-block"><?php echo $tl["general"]["g146"]; ?></button>
							<input type="hidden" name="home" value="0"/>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<?php } } ?>

<!-- Search box -->
<div id="full-screen-search" class="full-screen-nav">
	<span class="full-screen-nav-close"></span>
	<div class="full-screen-nav-content">
		<div class="full-screen-nav-general">
			<div class="full-screen-nav-wrapper">
				<p>Zadejte hledaný výraz a stikněte Enter</p>
				<form class="form-search" action="/search" method="post">
					<input type="text" name="jakSH" id="Jajaxs2" class="search" placeholder="Vyhledat ...">
					<button type="submit"><i class="icon-search"></i></button>
				</form>
			</div>
		</div>
	</div>
</div>

<!-- Search script -->
<?php if ($jkv["ajaxsearch"] && $AJAX_SEARCH_PLUGIN_URL) { ?>
<script type="text/javascript">
	$(document).ready(function () {

		$('#ajaxsearchForm').ajaxSearch({
			apiURL: '<?php echo BASE_URL . $AJAX_SEARCH_PLUGIN_URL;?>',
			msg: '<?php echo $tl["general"]["g158"];?>',
			seo: <?php echo $AJAX_SEARCH_PLUGIN_SEO;?>});

		$('#Jajaxs').alphanumeric({nocaps: false, allow: ' +*'});
		$('.hideAdvSearchResult').fadeIn();

	});
</script>
<?php } ?>

<!-- EU Cookies -->
<?php if ($jkv["eucookie_enabled"] == 1) {
	include APP_PATH . '/assets/js/eu-cookies.php';
} ?>

</body>
</html>