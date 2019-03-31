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
						&copy; 2018 - 2019. <strong>Bluesat Web App Kit</strong> -> <span>Intranet verze <?= get_pluginversion('Intranet2') ?></span>
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
echo $Html -> addScript('/assets/plugins/jquery/jquery-3.2.1.min.js');
echo $Html -> addScript('/admin/assets/plugins/modernizr.custom.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/bootstrap.bundle.min.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/loaders/blockui.min.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/ui/ripple.min.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/jquery-numberAnimate/jquery.animateNumbers.min.js');
echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'plugins/uniform/uniform.js');
echo $Html -> addScript('/assets/plugins/bootstrap-select2/4.0.5/js/select2.full.min.js');
echo $Html -> addScript('/assets/plugins/bootstrap-select2/4.0.5/js/i18n/cs.js');
if ($page1 == 'house' && $page2 == 'houselist') {
	// DataTables (Script only for pages which contains 'table')
	echo $Html -> addScript('https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js');
	echo $Html -> addScript('https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js');
	// Buttons
	echo $Html -> addScript('https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js');
	echo $Html -> addScript('https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js');
	// Buttons - Excel Export
	echo $Html -> addScript('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js');
	// Buttons - PDF Export
	echo $Html -> addScript('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js');
	echo $Html -> addScript('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js');
	// Buttons - Print Export
	echo $Html -> addScript('https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js');
	// Init DataTable
	echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/datatables.min.js');
}
if ($page1 == 'house' && $page2 == 'h' && !empty($page3)) {
	// Plugin DialogFX
	echo $Html -> addScript('/admin/assets/plugins/classie/classie.js');
	echo $Html -> addScript('/admin/assets/plugins/codrops-dialogFx/dialogFx.js');
	// Plugin Fancybox
	echo $Html -> addScript('/assets/plugins/fancybox/3.2.5/js/jquery.fancybox.min.js');
	// Isotope
	echo $Html -> addScript('https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js');
	// Photo gallery
	echo $Html -> addScript($SHORT_PLUGIN_URL_TEMPLATE . 'js/gallery.js');
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