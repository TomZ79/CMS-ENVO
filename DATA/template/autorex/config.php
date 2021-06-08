<?php

/* ### CONFIG FILE ### */

/* ### FUNCTION FILE ### */

// MENU BUILDER - AUTOREX, parentId 0 is the root
// Global variable - array
$arr1 = array ();

/**
 * EN: Search in array
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $id
 * @param $array
 * @return null
 *
 * Example: print_r(search($arr, 'name', 'cat 1'));
 *
 */
function searchForId ($id, $array)
{
	foreach ($array as $key => $val) {
		if ($val['pagename'] === $id) {
			return $val['catparent'];
		}
	}

	return NULL;
}

/**
 * EN: Build menu
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $parent
 * @param $menu
 * @param $maincategory
 * @param $active
 * @param $mainclass
 * @param $dropdown
 * @param $dropdownclass
 * @param $dropclass
 * @param $subclass
 * @param $admin
 * @return string
 *
 */
function build_menu_autorex ($parent, $menu, $maincategory, $active, $mainclass, $dropdown, $dropdownclass, $dropclass, $subclass, $admin)
{
	// Set global variable
	global $arr1;
	// Search 'catparent' in array by active page name
	$category = searchForId($active, $menu["items"]);

	$html = '';

	if (isset($menu['parents'][$parent])) {
		$html .= '<ul class="' . $mainclass . '">';


		// Loop through the array to extract element values
		foreach ($menu['parents'][$parent] as $itemId) {

			// Set class for menu with submenu if active page is in submenu
			$classcat = (($category == $menu["items"][$itemId]["id"]) ? ' active' : ' notactive');

			//IF MENU DONT HAVE SUBMENU
			if (!isset($menu['parents'][$itemId])) {
				$html .= '
        <li' . (($active == $menu["items"][$itemId]["pagename"]) ? ' class="active"' : '') . '>
        
          <a href="' . $menu["items"][$itemId]["varname"] . '" ' . (($active == $menu["items"][$itemId]["pagename"]) ? ' class="dropdown-item active"' : 'class="dropdown-item"') . '>' .

					(($menu["items"][$itemId]["catimg"]) ? '<i class="' . $menu["items"][$itemId]["catimg"] . '"></i> ' : '') .

					$menu["items"][$itemId]["name"] .

					'</a>
        </li>';
			}

			//IF MENU HAS SUBMENU AND MAINCATEGORY IS ACTIVE ( $maincategory = TRUE )
			if ($maincategory) {
				if (isset($menu['parents'][$itemId])) {

					// Add 'id' of category, which have subcategory to array - only for controls
					$arr1[] = $menu["items"][$itemId]["id"];

					$html .= '
          <li class="' . $dropdown . (($active == $menu["items"][$itemId]["pagename"]) ? ' active' : $classcat) . '">
            
            <a href="' . $menu["items"][$itemId]["varname"] . '"' . (($active == $menu["items"][$itemId]["pagename"]) ? ' class="dropdown-item active ' . $dropdownclass . $classcat . '"' : ' class="dropdown-item ' . $dropdownclass . $classcat . '"') . '>' .

						(($menu["items"][$itemId]["catimg"]) ? '<i class="' . $menu["items"][$itemId]["catimg"] . '"></i> ' : '') .

						$menu["items"][$itemId]["name"] .

						'</a>';

					$html .= build_menu_autorex($itemId, $menu, $maincategory, $active, $dropclass, $subclass, '', $dropclass, $subclass, $admin);

					$html .= '</li>';
				}
			}

			//IF MENU HAS SUBMENU AND MAINCATEGORY IS NOT ACTIVE ( $maincategory = FALSE )
			if (!$maincategory) {
				if (isset($menu['parents'][$itemId])) {

					// Add 'id' of category, which have subcategory to array - only for controls
					$arr1[] = $menu["items"][$itemId]["id"];

					$html .= '
          <li class="' . $dropdown . (($active == $menu["items"][$itemId]["pagename"]) ? ' active' : $classcat) . '">
          
            <a href="' . $menu["items"][$itemId]["varname"] . '" ' . (($active == $menu["items"][$itemId]["pagename"]) ? ' class="dropdown-item active"' : 'class="dropdown-item"') . '>' .

						(($menu["items"][$itemId]["catimg"]) ? '<i class="' . $menu["items"][$itemId]["catimg"] . '"></i> ' : '') .

						$menu["items"][$itemId]["name"] .

						'</a>
          </li>';

				}
			}
		}

		if ($admin) {
			$html .= '<li><a href="' . BASE_URL . 'admin/"> Admin KP</a></li>';
		}

		$html .= '</ul>';

	}

	// Return value from function
	return $html;
}

/**
 * EN: Get FontAwesome icon by file extensions
 * CZ: Získání FontAwesome ikon podle typu souboru
 *
 * @author  BluesatKV
 * @version 1.0.1
 * @date    12/2017
 *
 * @param $filename       string    | name of file
 * @return bool|string
 */
function envo_extension_icon ($filename)
{
	$extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

	switch ($extension) {
		case ('doc'):
			return '<i class="fas fa-file-word mr-3" style="color:#2B5796;font-size: 1.3em;"></i>';
			break;
		case ('docx'):
			return '<i class="fas fa-file-word mr-3" style="color:#2B5796;font-size: 1.3em;"></i>';
			break;
		case ('docm'):
			return '<i class="fas fa-file-word mr-3" style="color:#2B5796;font-size: 1.3em;"></i>';
			break;
		case ('xls'):
			return '<i class="fas fa-file-excel mr-3" style="color:#1E7145;font-size: 1.3em;"></i>';
			break;
		case ('xlsx'):
			return '<i class="fas fa-file-excel mr-3" style="color:#1E7145;font-size: 1.3em;"></i>';
			break;
		case ('xlsm'):
			return '<i class="fas fa-file-excel mr-3" style="color:#1E7145;font-size: 1.3em;"></i>';
			break;
		case 'pdf':
			return '<i class="fas fa-file-pdf mr-3" style="color:#EE3226;font-size: 1.3em;"></i>';
			break;
		case ('jpg'):
			return '<i class="fas fa-file-image mr-3" style="color:#000;font-size: 1.3em;"></i>';
			break;
		case ('zip'):
			return '<i class="fas fa-file-archive mr-3" style="color:#FF3514;font-size: 1.3em;"></i>';
			break;
		case ('rar'):
			return '<i class="fas fa-file-archive mr-3" style="color:#FF3514;font-size: 1.3em;"></i>';
			break;
		default:
			return FALSE;
	}
}

?>