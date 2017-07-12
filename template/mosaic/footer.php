<?php if ($JAK_SHOW_NAVBAR) { ?>
	</div><!--/col-->

	<!-- Sidebar if right -->
	<?php if (!empty($JAK_HOOK_SIDE_GRID) && $jkv["sidebar_location_tpl"] == "right") {
		include_once APP_PATH . 'template/mosaic/sidebar.php';
	} ?>

	</div><!--/row-->
	</div><!--/.container-->

	<!-- Import templates below header -->
<?php }
if ($JAK_SHOW_FOOTER) {
	if (isset($JAK_HOOK_BELOW_CONTENT) && is_array ($JAK_HOOK_BELOW_CONTENT)) foreach ($JAK_HOOK_BELOW_CONTENT as $bcontent) {
		include_once APP_PATH . $bcontent['phpcode'];
	} ?>

	<!-- Call to Action Bar -->
	<div class="section section-white<?php if (!$jkv["sectionshow_mosaic_tpl"]) echo ' hidden'; ?>" id="footer-section">
		<div class="container">
			<div class="row">
				<div class="col-md-4" id="section-content">
					<?php if (is_numeric ($jkv["bcontent1_mosaic_tpl"])) {
						if (isset($JAK_HOOK_FOOTER_WIDGET) && is_array ($JAK_HOOK_FOOTER_WIDGET)) foreach ($JAK_HOOK_FOOTER_WIDGET as $hfw) {
							if ($hfw["id"] == $jkv["bcontent1_mosaic_tpl"]) {
								include_once $hfw["phpcode"];
							}
						}
					} else {
						echo $jkv["bcontent1_mosaic_tpl"];
					} ?>
				</div>
				<div class="col-md-4" id="section-content2">
					<?php if (is_numeric ($jkv["bcontent2_mosaic_tpl"])) {
						if (isset($JAK_HOOK_FOOTER_WIDGET) && is_array ($JAK_HOOK_FOOTER_WIDGET)) foreach ($JAK_HOOK_FOOTER_WIDGET as $hfw1) {
							if ($hfw1["id"] == $jkv["bcontent2_mosaic_tpl"]) {
								include_once $hfw1["phpcode"];
							}
						}
					} else {
						echo $jkv["bcontent2_mosaic_tpl"];
					} ?>
				</div>
				<div class="col-md-4" id="section-content3">
					<?php if (is_numeric ($jkv["bcontent3_mosaic_tpl"])) {
						if (isset($JAK_HOOK_FOOTER_WIDGET) && is_array ($JAK_HOOK_FOOTER_WIDGET)) foreach ($JAK_HOOK_FOOTER_WIDGET as $hfw2) {
							if ($hfw2["id"] == $jkv["bcontent3_mosaic_tpl"]) {
								include_once $hfw2["phpcode"];
							}
						}
					} else {
						echo $jkv["bcontent3_mosaic_tpl"];
					} ?>
				</div>
			</div>
		</div>
	</div>
	<!-- End Call to Action Bar -->
<?php }
if ($JAK_SHOW_FOOTER && JAK_ASACCESS && $jkv["styleswitcher_tpl"]) { ?>
	<!-- Footer -->
	<div class="footer footer-<?php echo $jkv["footer_mosaic_tpl"]; ?>">
		<div class="container">
			<div class="row">
				<div class="col-footer col-sm-4">
					<span id="footer-content3"><?php echo $jkv["fcont3_mosaic_tpl"]; ?></span>
					<div class="footer-nav-column">
						<?php echo envo_build_menu (0, $mfooter, $page, 'footer-list-style footer-navigate-section', '', '', '', JAK_ASACCESS); ?>
					</div>
				</div>

				<div class="col-footer col-sm-4">
					<span id="footer-content"><?php echo $jkv["fcont_mosaic_tpl"]; ?></span>
				</div>
				<div class="col-footer col-sm-4">
					<span class="footer-content2"><?php echo $jkv["fcont2_mosaic_tpl"]; ?></span>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-12">
					<hr>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-10">
					<p><?php echo $jkv["copyright"]; ?></p>
				</div>
				<div class="col-sm-2">
					<div class="pull-right">
						<?php if ($apedit) { ?>
							<a class="btn btn-default btn-xs" title="<?php echo $tl["general"]["g"]; ?>"
								href="<?php echo $apedit; ?>"><i class="fa fa-pencil"></i></a>
							<?php if ($qapedit) { ?><a class="btn btn-default btn-xs quickedit"
								title="<?php echo $tl["general"]["g176"]; ?>" href="<?php echo $qapedit; ?>"><i
										class="fa fa-edit"></i></a>
							<?php }
						}
						if ($jkv["printme"] && $printme) { ?>
							<a class="btn btn-default btn-xs" id="jakprint" href="#"><i class="fa fa-print"></i></a>
						<?php }
						if ($JAK_RSS_DISPLAY) { ?>
							<a class="btn btn-default btn-xs" href="<?php echo $P_RSS_LINK; ?>"><i class="fa fa-rss"></i></a>
						<?php } ?>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>
		</div>
	</div>
<?php } else {
	if ($JAK_SHOW_FOOTER) { ?>
		<!-- Footer -->
		<div class="footer footer-<?php echo $jkv["footer_mosaic_tpl"]; ?>">
			<div class="container">
				<div class="row">
					<div class="col-footer col-sm-4">
						<?php echo $jkv["fcont3_mosaic_tpl"]; ?>
						<div class="footer-nav-column">
							<?php echo envo_build_menu (0, $mfooter, $page, 'no-list-style footer-navigate-section', '', '', '', JAK_ASACCESS); ?>
						</div>
					</div>

					<div class="col-footer col-sm-4">
						<?php echo $jkv["fcont_mosaic_tpl"]; ?>
					</div>
					<div class="col-footer col-sm-4">
						<?php echo $jkv["fcont2_mosaic_tpl"]; ?>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<hr>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-10">
						<p><?php echo $jkv["copyright"]; ?></p>
					</div>
					<div class="col-sm-2">
						<div class="pull-right">
							<?php if ($apedit) { ?>
								<a class="btn btn-default btn-xs" title="<?php echo $tl["general"]["g"]; ?>"
									href="<?php echo $apedit; ?>"><i class="fa fa-pencil"></i></a>
								<?php if ($qapedit) { ?><a class="btn btn-default btn-xs quickedit"
									title="<?php echo $tl["general"]["g176"]; ?>" href="<?php echo $qapedit; ?>">
										<i class="fa fa-edit"></i></a>
								<?php }
							}
							if ($jkv["printme"] && isset($printme)) { ?>
								<a class="btn btn-default btn-xs" id="jakprint" href="#"><i class="fa fa-print"></i></a>
							<?php }
							if (isset($JAK_RSS_DISPLAY)) { ?>
								<a class="btn btn-default btn-xs" href="<?php echo $P_RSS_LINK; ?>"><i class="fa fa-rss"></i></a>
							<?php } ?>
						</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
	<?php }
}
if (!$JAK_SHOW_FOOTER) { ?>
	<div class="hidden-footer-manage">
		<?php if ($apedit) { ?>
			<a class="btn btn-default btn-xs" title="<?php echo $tl["general"]["g"]; ?>" href="<?php echo $apedit; ?>"><i
					class="fa fa-pencil"></i></a>
			<?php if ($qapedit) { ?><a class="btn btn-default btn-xs quickedit" title="<?php echo $tl["general"]["g176"]; ?>"
				href="<?php echo $qapedit; ?>"><i class="fa fa-edit"></i></a>
			<?php }
		} ?>
	</div>
<?php }
if ($JAK_SHOW_NAVBAR) { ?>

	</div><!-- sb-site -->

	<div class="sb-slidebar sb-left">
		<?php include_once APP_PATH . 'template/mosaic/navbar_mobile.php'; ?>
	</div>

	<!-- Style Manager -->
<?php }
if (JAK_ASACCESS && $jkv["styleswitcher_tpl"]) include_once APP_PATH . 'template/mosaic/styleswitcher.php'; ?>

<!-- Custom JS igrid -->
<script type="text/javascript"
	src="<?php echo BASE_URL; ?>template/mosaic/js/mosaic.js?=<?php echo $jkv["updatetime"]; ?>"></script>

<?php if ($jkv["printme"]) { ?>
	<script type="text/javascript"
		src="<?php echo BASE_URL; ?>assets/js/jakprint.js?=<?php echo $jkv["updatetime"]; ?>"></script>

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
	envoWeb.envo_lang = "<?php echo $site_language;?>";
	envoWeb.envo_url = "<?php echo BASE_URL;?>";
	envoWeb.envo_url_orig = "<?php echo BASE_URL;?>";
	envoWeb.envo_search_link = "<?php echo $JAK_SEARCH_LINK;?>";
	envoWeb.request_uri = "<?php echo JAK_PARSE_REQUEST;?>";
	envoWeb.envo_quickedit = "<?php echo $tl["general"]["g176"];?>";

	<?php if (isset($_SESSION["infomsg"])) { ?>
	$.notify({icon: 'fa fa-info-circle', message: '<?php echo $_SESSION["infomsg"];?>'}, {type: 'info'});
	<?php } if (isset($_SESSION["successmsg"])) { ?>
	$.notify({icon: 'fa fa-check-square-o', message: '<?php echo $_SESSION["successmsg"];?>'}, {type: 'success'});
	<?php } if (isset($_SESSION["errormsg"])) { ?>
	$.notify({icon: 'fa fa-exclamation-triangle', message: '<?php echo $_SESSION["errormsg"];?>'}, {type: 'danger'});
	<?php } ?>

</script>

<?php
if (isset($JAK_HOOK_FOOTER_END) && is_array ($JAK_HOOK_FOOTER_END)) foreach ($JAK_HOOK_FOOTER_END as $hfootere) {
	include_once APP_PATH . $hfootere['phpcode'];
}
echo $jkv["analytics"];
if (isset($JAK_FOOTER_JAVASCRIPT)) echo $JAK_FOOTER_JAVASCRIPT; ?>

<?php if (JAK_ASACCESS && $jkv["styleswitcher_tpl"]) { ?>
	<script type="text/javascript"
		src="<?php echo BASE_URL; ?>template/mosaic/js/stylechanger.js?=<?php echo $jkv["updatetime"]; ?>"></script>
<?php } ?>

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