		<?php if (empty($JAK_HOOK_SIDE_GRID) && (!empty($page))) { ?>
						</div>
					</div>
				</section>
				<?php } ?>

		<?php if (empty($JAK_HOOK_SIDE_GRID) && (empty($page))) { ?>

		<?php } ?>

		<?php if (!empty($JAK_HOOK_SIDE_GRID)) { ?>
					</div>

					<!-- Sidebar if right -->
					<?php if (!empty($JAK_HOOK_SIDE_GRID) && $jkv["sidebar_location_tpl"] == "right") {
						include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/sidebar.php';
					} ?>

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
						<div class="footer-widget mb-small">
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
							<?php echo jak_build_menu_qed (0, $mfooter, $page, 'footer-list-style', '', '', '', JAK_ASACCESS); ?>
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
	<?php } ?>

</div>
<!-- global wrapper -->

<!-- End Document  ================================================== -->

<!-- Placed at the end of the document so the pages load faster -->
<script type="text/javascript" src="/template/<?php echo $jkv["sitestyle"];?>/js-plugins/jquery/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/template/<?php echo $jkv["sitestyle"];?>/js-plugins/jquery-ui/jquery-ui-1.8.23.custom.min.js"></script>

<!-- External framework plugins -->
<?php if ($jkv["activeroyalslider_qed_tpl"] == 1) { ?>
<script type="text/javascript" src="/template/<?php echo $jkv["sitestyle"];?>/js-plugins/royalslider/jquery.royalslider.min.js"></script>
<?php } ?>
<script type="application/javascript" src="/template/<?php echo $jkv["sitestyle"];?>/js-plugins/external-plugins.min.js"></script>
<script type="text/javascript" src="/assets/plugins/bootstap-notify/bootstrap-notify.min.js"></script>
<script type="text/javascript" src="/assets/plugins/owl.carousel/owl.carousel.min.js"></script>

<!-- Neko framework script -->
<script type="text/javascript" src="/template/<?php echo $jkv["sitestyle"];?>/js/neko-framework.js"></script>

<?php include_once APP_PATH . '/template/' . $jkv["sitestyle"] . '/js/neko-royalSlider.php' ?>

<?php
if (isset($JAK_HOOK_FOOTER_END) && is_array ($JAK_HOOK_FOOTER_END)) foreach ($JAK_HOOK_FOOTER_END as $hfootere) {
	include_once APP_PATH . $hfootere['phpcode'];
}
// Javascript for page - FOOTER
if (isset($JAK_FOOTER_JAVASCRIPT)) echo $JAK_FOOTER_JAVASCRIPT;
?>


<!-- Social Buttons Script -->
<?php if ($SHOWSOCIALBUTTON) {
	include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/socialbutton.php';
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
<?php if ($jkv["offline"] == 1 && JAK_ASACCESS) { ?>
	<!-- Offline Website -->
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
<div class="modal centermodal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModal" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">&nbsp;</h4>
			</div>
			<div class="modal-body">
				<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post">
					<div class="container-fluid">
						<div class="row">
							<div class="col-sm-8 col-sm-offset-2">
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
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal"><?php echo $tl["general"]["g177"]; ?></button>
			</div>
		</div>
	</div>
</div>
<?php } } ?>

</body>
</html>