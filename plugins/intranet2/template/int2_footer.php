
</div>
<!-- /content area -->


<!-- Footer -->
<div class="navbar navbar-expand-lg navbar-light">
	<div class="text-center d-lg-none w-100">
		<button type="button" class="navbar-toggler dropdown-toggle" data-toggle="collapse" data-target="#navbar-footer">
			<i class="icon-unfold mr-2"></i>
			Footer
		</button>
	</div>

	<div class="navbar-collapse collapse" id="navbar-footer">
					<span class="navbar-text">
						&copy; 2018 - 2019. <strong>Bluesat Web App Kit</strong> -> <span>Intranet verze <?= get_pluginversion('Intranet') ?></span>
					</span>

	</div>
</div>
<!-- /footer -->

</div>
<!-- /main content -->

</div>
<!-- /page content -->

<!-- JS and PLUGIN
  ================================================== -->
<!-- BEGIN JS DEPENDECENCIES-->
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html -> addScript('/assets/plugins/jquery/jquery-2.2.4.min.js?=v2.2.4');
echo $Html -> addScript('/admin/assets/plugins/modernizr.custom.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/bootstrap.bundle.min.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/loaders/blockui.min.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/ui/ripple.min.js');
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
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/app.js');
?>

<!-- END CORE TEMPLATE JS -->

</body>
</html>