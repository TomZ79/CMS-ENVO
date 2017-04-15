<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php echo $PAGE_CONTENT; ?>

	<!-- site map -->
	<section class="pt-medium pb-medium">
		<div class="container">

			<div class="row">

				<div class="sitemap">
					<?php if (isset($JAK_CAT_SITE) && is_array ($JAK_CAT_SITE)) { ?>
						<ul class="list-unstyled list-icon arrow border">
							<?php foreach ($JAK_CAT_SITE as $v) {
					if ($v["catparent"] == '0') { ?>

						<li><a href="<?php echo $v["varname"]; ?>"><?php echo $v["name"]; ?></a>

						<?php if (isset($v["catexist"])) { ?>

							<ul>

								<?php if (isset($JAK_CAT_SITE) && is_array ($JAK_CAT_SITE)) foreach ($JAK_CAT_SITE as $z) {

									if ($z["catparent"] != '0' && $z["catparent2"] == '0' && $z["catparent"] == $v["id"]) { ?>

										<li><a href="<?php echo $z["varname"]; ?>"><?php echo $z["name"]; ?></a>

											<?php if (isset($z["catexist2"])) { ?>

												<ul>

													<?php if (isset($JAK_CAT_SITE) && is_array ($JAK_CAT_SITE)) foreach ($JAK_CAT_SITE as $o) {

														if ($o["catparent"] != '0' && $o["catparent2"] != '0' && $o["catparent"] == $v["id"] && $o["catparent2"] == $z["id"]) { ?>

															<li><a href="<?php echo $o["varname"]; ?>"><?php echo $o["name"]; ?></a></li>

														<?php }
													} ?>
												</ul>
											<?php } ?>
										</li>
									<?php }
								} ?>
							</ul>
							</li>
						<?php } else { ?>
							</li>
						<?php }
					}
				} ?>
						</ul>
					<?php } ?>

					<?php if (isset($JAK_HOOK_SITEMAP) && is_array ($JAK_HOOK_SITEMAP)) foreach ($JAK_HOOK_SITEMAP as $hs) {
						// include_once APP_PATH . $hs['phpcode'];
						eval($hs["phpcode"]);
					} ?>
				</div>

				<div class="col-md-3">
					<div class="box mb">
						<h2 class="no-mt">About us</h2>
						<ul class="list-unstyled list-icon arrow border">
							<li><a href="template-about.html">About us 1</a></li>
							<li><a href="template-about-2.html">About us 2</a></li>
							<li><a href="template-about-3.html">About us 3</a></li>
							<li><a href="template-about-4.html">About us 4</a></li>
						</ul>
					</div>
					<div class="box mb">
						<h2>Team</h2>
						<ul class="list-unstyled list-icon arrow border">
							<li><a href="template-team.html">Team 1</a></li>
							<li><a href="template-team-2.html">Team 2</a></li>
							<li><a href="template-team-3.html">Team 3</a></li>
							<li><a href="template-team-4.html">Team 4</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3">
					<div class="box mb">
						<h2 class="no-mt">Sidebars</h2>
						<ul class="list-unstyled list-icon arrow border">
							<li><a href="template-menu-left.html">Menu left</a></li>
							<li><a href="template-sidebar-right.html">Sidebar right</a></li>
							<li><a href="template-2-sidebars.html">2 sidebars</a></li>
						</ul>
					</div>
					<div class="box mb">
						<h2>FAQ</h2>
						<ul class="list-unstyled list-icon arrow border">
							<li><a href="template-faq.html">FAQ 1</a></li>
							<li><a href="template-faq-2.html">FAQ 2</a></li>
						</ul>
					</div>
					<div class="box mb">
						<h2>Contact</h2>
						<ul class="list-unstyled list-icon arrow border">
							<li><a href="template-contact.html">Contact 1</a></li>
							<li><a href="template-contact-2.html">Contact 2</a></li>
							<li><a href="template-contact-3.html">Contact 3</a></li>
							<li><a href="template-contact-4.html">Contact 4</a></li>
						</ul>
					</div>

				</div>

				<div class="col-md-3">
					<div class="box mb">
						<h2 class="no-mt">Miscellanious</h2>
						<ul class="list-unstyled list-icon arrow border">
							<li><a href="template-full-width.html">Full width</a></li>
							<li><a href="template-big-header.html">Big page header</a></li>
							<li><a href="template-plans.html">Our plans</a></li>
							<li><a href="template-parallax-header.html">Parallax header</a></li>
							<li><a href="template-services.html">Services</a></li>
							<li><a href="template-clients.html">Clients</a></li>
							<li><a href="template-404.html">404 error</a></li>
							<li><a href="template-site-map.html">Site map</a></li>
						</ul>
					</div>

				</div>

			</div>
		</div>
	</section>
	<!-- / site map -->



<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>