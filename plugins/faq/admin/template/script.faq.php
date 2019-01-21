<?php
/*
 * PLUGIN Faq - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'plugins/faq/admin/js/script.faq.js
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'plugins/faq/admin/js/script.faq.js'
 *
 */

if ($page == 'faq') {

	echo PHP_EOL . '<!-- Start JS Faq -->';

	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	// Setting variable for Jquery external script
	if (isset($ENVO_FORM_DATA["catimg"])) {
		$str = $ENVO_FORM_DATA["catimg"];

		if (strpos($str, 'glyphicons ') !== FALSE) {
			$categoryimg = str_replace('glyphicons ', '', $ENVO_FORM_DATA["catimg"]);
		} else {
			$categoryimg = str_replace('fa ', '', $ENVO_FORM_DATA["catimg"]);
		}
	} else {
		$categoryimg = 'fa-font';
	}
	?>

	<script>
		// Add to Global settings javascript object
		iconPicker['icon'] = <?=json_encode($categoryimg)?>;
		globalSettings['pageID2'] = <?=(!empty($page2) && is_numeric($page2) ? $page2 : '""')?>;
	</script>

	<?php
	// Plugin ACE Editor
	echo $Html -> addScript('assets/plugins/ace/ace.js');
	// Plugin Slug
	echo $Html -> addScript('assets/js/global_js/slug.min.js');
	// Categories plugin and script
	echo $Html -> addScript('assets/plugins/jquery-nestedsortable/jquery.mjs.nestedSortable.min.js');
	echo $Html -> addScript('assets/js/global_js/catorder.min.js');
	// Plugin DataTable
	echo $Html -> addScript('https://cdn.datatables.net/v/bs/dt-1.10.16/datatables.min.js');
	// Plugin Javascript
	echo $Html -> addScript('/plugins/faq/admin/js/script.faq.min.js');

	echo PHP_EOL . '<!-- End JS Faq -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>