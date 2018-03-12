<?php

/* ### CONFIG FILE ### */

// NAVIGATION TYPE
// Set class for navigation
$navitype =  explode(",", $setting["navi_porto_tpl"]);
$PORTONAVTYPE = $navitype[0];
$PORTONAVTYPE1 = $navitype[1];
$PORTONAVTYPE2 = $navitype[2];
$PORTONAVTYPE3 = $navitype[3];

/* ### FUNCTION FILE ### */

// MENU BUILDER - PORTO, parentId 0 is the root
// Global variable - array
$arr1 = array();

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
function searchForId($id, $array)
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
function build_menu_porto($parent, $menu, $maincategory, $active, $mainclass, $dropdown, $dropdownclass, $dropclass, $subclass, $admin)
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
        
          <a href="' . $menu["items"][$itemId]["varname"] . '"' . (($active == $menu["items"][$itemId]["pagename"]) ? ' class="active"' : '') . '>' .

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
            
            <a href="' . $menu["items"][$itemId]["varname"] . '"' . (($active == $menu["items"][$itemId]["pagename"]) ? ' class="active ' . $dropdownclass . $classcat . '"' : ' class="' . $dropdownclass . $classcat . '"') . '>' .

            (($menu["items"][$itemId]["catimg"]) ? '<i class="' . $menu["items"][$itemId]["catimg"] . '"></i> ' : '') .

            $menu["items"][$itemId]["name"] .

            '</a>';

          $html .= build_menu_porto($itemId, $menu, $maincategory, $active, $dropclass, $subclass, $dropdownclass, $dropclass, $subclass, $admin);

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
          
            <a href="' . $menu["items"][$itemId]["varname"] . '"' . (($active == $menu["items"][$itemId]["pagename"]) ? ' class="active"' : '') . '>' .

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

?>