<?php

/* ### CONFIG FILE ### */

// Add Custom Stylesheet to tinyMCE Editor
if (isset($jkv["color_mosaic_tpl"]) && $jkv["color_mosaic_tpl"] == "dark") {
  $tpl_customcss = "template/canvas/css/dark.css";
} else {
  $tpl_customcss = "template/canvas/css/screen.css";
}


/* ### FUNCTION FILE ### */

// MENU BUILDER - QED, parentId 0 is the root
// Global variable - array
$arr1 = array();

/*
 * Search in array
 * Example: print_r(search($arr, 'name', 'cat 1'));
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

/*
 * Build menu
 */
function jak_build_menu_qed($parent, $menu, $active, $mainclass, $dropdown, $dropdownclass, $dropclass, $subclass, $admin)
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
      $classcat = (($category == $menu["items"][$itemId]["id"]) ? ' cat-active' : ' cat-notactive');

      //IF MENU DONT HAVE SUBMENU
      if (!isset($menu['parents'][$itemId])) {
        $html .= '
        <li' . (($active == $menu["items"][$itemId]["pagename"]) ? ' class="curent"' : '') . '>
        
          <a href="' . $menu["items"][$itemId]["varname"] . '"' . (($active == $menu["items"][$itemId]["pagename"]) ? ' class="active"' : '') . '>' .

            (($menu["items"][$itemId]["catimg"]) ? '<i class="' . $menu["items"][$itemId]["catimg"] . '"></i> ' : '') .

             $menu["items"][$itemId]["name"] .

          '</a>
        </li>';
      }

      //IF MENU HAS SUBMENU
      if (isset($menu['parents'][$itemId])) {

        // Add 'id' of category, which have subcategory to array - only for controls
        $arr1[] = $menu["items"][$itemId]["id"];

        $html .= '
        <li class="' . $dropdown . (($active == $menu["items"][$itemId]["pagename"]) ? ' active' : '') . '">
          
          <a href="' . $menu["items"][$itemId]["varname"] . '"' . (($active == $menu["items"][$itemId]["pagename"]) ? ' class="active ' . $dropdownclass . $classcat . '"' : ' class="' . $dropdownclass . $classcat . '"') . '>' .

            (($menu["items"][$itemId]["catimg"]) ? '<i class="' . $menu["items"][$itemId]["catimg"] . '"></i> ' : '') .

             $menu["items"][$itemId]["name"] .

          '</a>';

        $html .= jak_build_menu_qed($itemId, $menu, $active, $dropclass, $subclass, $dropdownclass, $dropclass, $subclass, $admin);

        $html .= '</li>';
      }
    }

    if ($admin) {
      $html .= '<li><a href="' . BASE_URL . 'admin/"> Admin ACP</a></li>';
    }

    $html .= '</ul>';

  }

  // Return value from function
  return $html;
}

?>