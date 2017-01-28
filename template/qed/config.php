<?php

/* ### CONFIG FILE ### */

// Add Custom Stylesheet to tinyMCE Editor
if (isset($jkv["color_mosaic_tpl"]) && $jkv["color_mosaic_tpl"] == "dark") {
	$tpl_customcss = "template/canvas/css/dark.css";
} else {
	$tpl_customcss = "template/canvas/css/screen.css";
}


/* ### FUNCTION FILE ### */

// Menu builder function, parentId 0 is the root - custom modification
function jak_build_menu_canvas ($parent, $menu, $active, $mainclass, $dropdown, $dropclass, $subclass, $admin)
{
	$html = '';
	if (isset($menu['parents'][ $parent ])) {
		$html .= '<ul class="' . $mainclass . '">';
		foreach ($menu['parents'][ $parent ] as $itemId) {
			// IF MENU DONT HAVE SUBMENU
			if (!isset($menu['parents'][ $itemId ])) {
				$html .= '<li' . ($active == $menu["items"][ $itemId ]["pagename"] ? ' class="current"' : '') . '><a href="' . $menu["items"][ $itemId ]["varname"] . '">' . ($menu["items"][ $itemId ]["catimg"] ? '<i class="fa ' . $menu["items"][ $itemId ]["catimg"] . '"></i> ' : '') . $menu["items"][ $itemId ]["name"] . '</a></li>';
			}

			// IF MENU HAS SUBMENU
			// Není řešen případ kdy $menu['parents'][$itemId] je rovno NULL, tento případ nastává pro titulní HOMEPAGE
			// Tudíž nelze přidat class="current" do HOME linku
			if (isset($menu['parents'][ $itemId ])) {
				$html .= '<li' . ($active == $menu["items"][ $itemId ]["pagename"] ? ($dropdown ? ' class="current ' . $dropdown . '"' : '') : ($dropdown ? ' class="' . $dropdown . '"' : '')) . '><a href="' . $menu["items"][ $itemId ]["varname"] . '">' . ($menu["items"][ $itemId ]["catimg"] ? '<i class="fa ' . $menu["items"][ $itemId ]["catimg"] . '"></i> ' : '') . $menu["items"][ $itemId ]["name"] . '</a>';
				$html .= jak_build_menu ($itemId, $menu, $active, $dropclass, $subclass, $dropclass, $subclass, $admin);
				$html .= '</li>';
			}
		}
		if ($admin) {
			$html .= '<li><a href="' . BASE_URL . 'admin/">Admin</a></li>';
		}
		$html .= '</ul>';
	}

	return $html;
}


?>