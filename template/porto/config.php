<?php

/* ### CONFIG FILE ### */
// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'portotplheader_img';
$envotable1 = DB_PREFIX . 'pages';

// NAVIGATION TYPE
// Set class for navigation
$navitype      = explode(",", $setting["navi_porto_tpl"]);
$PORTONAVTYPE  = $navitype[0];
$PORTONAVTYPE1 = $navitype[1];
$PORTONAVTYPE2 = $navitype[2];
$PORTONAVTYPE3 = $navitype[3];

// PAGE HEADER
// Set class for page header
$pageheader    = explode(",", $setting["pageheader_porto_tpl"]);
$PORTOPHEADER  = $pageheader[0];
$PORTOPHEADER1 = $pageheader[1];
$PORTOPHEADER2 = $pageheader[2];
$PORTOPHEADER3 = $pageheader[3];

// PAGE HEADER - IMAGES
// Set images for page header with 'catid' > 0 . Images for selected pages.
$result = $envodb -> query('SELECT * FROM ' . $envotable . ' WHERE catid > "0" ORDER BY id ASC');
while ($row = $result -> fetch_assoc()) {
	// EN: Insert each record into array
	// CZ: Vložení získaných dat do pole
	$ENVO_TPL_IMG[] = $row;
}

// Set images for page header with 'catid' = 0 . Images for all pages.
$result0 = $envodb -> query('SELECT * FROM ' . $envotable . ' WHERE catid = "0" ORDER BY id ASC');
while ($row0 = $result0 -> fetch_assoc()) {
	// EN: Insert each record into array
	// CZ: Vložení získaných dat do pole
	$ENVO_TPL_IMG0[] = $row0;
}
// Random Multidimensional array
shuffle($ENVO_TPL_IMG0);
// Get first array in Multidimensional array
reset($ENVO_TPL_IMG0);
// Set random image for all pages.
$tpl_img0;
foreach ($ENVO_TPL_IMG0 as $i0) {
	$tpl_img0 = $i0["img"];
}

// Set image for selected or all pages.
foreach ($ENVO_TPL_IMG as $i) {
	if (isset($i["catid"])) {
		if (isset($PAGE_ID)) {
			$array = explode(',', $i["catid"]);
			if (in_array($PAGE_ID, $array)) {
				$tpl_img = $i["img"];
				return true;
			} else {
				$tpl_img = $tpl_img0;
			}
		} else {
			$tpl_img = $tpl_img0;
		}
	}
}

/* ### FUNCTION FILE ### */

// MENU BUILDER - PORTO, parentId 0 is the root
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
function build_menu_porto ($parent, $menu, $maincategory, $active, $mainclass, $dropdown, $dropdownclass, $dropclass, $subclass, $admin)
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

					$html .= build_menu_porto($itemId, $menu, $maincategory, $active, $dropclass, $subclass, '', $dropclass, $subclass, $admin);

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