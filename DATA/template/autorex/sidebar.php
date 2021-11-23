	<?php

	if (isset($ENVO_HOOK_SIDE_GRID) && is_array($ENVO_HOOK_SIDE_GRID)) foreach ($ENVO_HOOK_SIDE_GRID as $sg) {
		if (isset($ENVO_HOOK_SIDEBAR) && is_array($ENVO_HOOK_SIDEBAR)) foreach ($ENVO_HOOK_SIDEBAR as $hs) {
			if ($hs["id"] == $sg["hookid"]) {
				// include_once $hs["phpcode"];
				eval($hs["phpcode"]);
			}
		}
	}

	?>

	<div class="<?= $ENVO_HOOK_SIDE_GRID && $setting["sidebar_location_tpl"] == "left" ? 'sidebar-overlay sidebar-overlay-left' : 'sidebar-overlay sidebar-overlay-right'?>"></div>


