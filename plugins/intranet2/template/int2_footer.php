</div>
<!-- /CONTENT AREA -->

<!-- FOOTER -->
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
<!-- /FOOTER -->

</div>
<!-- /MAIN CONTENT -->

</div>
<!-- /PAGE CONTENT -->

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
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-numberAnimate/jquery.animateNumbers.min.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/uniform/uniform.min.js');
echo $Html -> addScript('/assets/plugins/bootstrap-select2/4.0.3/js/select2.full.min.js?=v4.0.3');
echo $Html -> addScript('/assets/plugins/bootstrap-select2/4.0.3/js/i18n/cs.js?=v4.0.3');
if ($page1 == 'house' && $page2 == 'houselist') {
	// Plugin DialogFX
	echo $Html -> addScript('/admin/assets/plugins/classie/classie.js');
	echo $Html -> addScript('/admin/assets/plugins/codrops-dialogFx/dialogFx.js');
	// DataTables (Script only for pages which contains 'table'(
	echo $Html -> addScript('https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js');
	echo $Html -> addScript('https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js');
	echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/datatables.min.js');
}
if ($page1 == 'house' && $page2 == 'h' && !empty($page3)) {
	// Plugin Fancybox
	echo $Html -> addScript('/assets/plugins/fancybox/3.4.1/js/jquery.fancybox.min.js');
	// Plugin Fileuploader
	echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/fileuploader/2.0/dist/jquery.fileuploader.min.js');
}
?>

<!-- END CORE JS DEPENDECENCIES-->
<!-- BEGIN CORE TEMPLATE JS -->
<script>
  // Global options
  var envoWebIntranet2 = {
    envo_lang: '<?=$site_language?>'
  };
</script>
<?php
// Add Html Element -> addScript (Arguments: src, optional assoc. array)
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/app.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/custom.js');
?>

<!-- END CORE TEMPLATE JS -->

<?php
if ($page1 == '404') {

	echo PHP_EOL;

	$str = <<<EOT
<script>
$(document).ready(function() {
  
$('div.content-wrapper .content.pt-0').addClass('d-flex justify-content-center align-items-center');

});
</script>
EOT;

	echo $str;

	echo PHP_EOL;

} ?>

</body>
</html>