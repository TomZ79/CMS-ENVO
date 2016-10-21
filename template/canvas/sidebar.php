<?php
	if (isset($JAK_HOOK_SIDE_GRID) && is_array($JAK_HOOK_SIDE_GRID)) foreach($JAK_HOOK_SIDE_GRID as $sg) {
	if (isset($JAK_HOOK_SIDEBAR) && is_array($JAK_HOOK_SIDEBAR)) foreach($JAK_HOOK_SIDEBAR as $hs) {
	if ($hs["id"] == $sg["hookid"]) {
		// vlastní řešení pro přidání pluginsidebar z plugin template adresáře
		// dotaz viz ticket https://www.jakweb.ch/support/t/439/cms-sidebar-in-plugins-template
		$text = str_replace("' . site_style . '",$jkv["sitestyle"],$hs["phpcode"]);
		if (file_exists($text)) {
			include_once $text;
		} else {
			$text = str_replace("' . site_style . '",'',$hs["phpcode"]);
			include_once $text;
		}

} } } ?>
