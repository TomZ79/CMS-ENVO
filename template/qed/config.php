<?php

/* ### CONFIG FILE ### */

// Add Custom Stylesheet to tinyMCE Editor
if (isset($jkv["color_mosaic_tpl"]) && $jkv["color_mosaic_tpl"] == "dark") {
  $tpl_customcss = "template/canvas/css/dark.css";
} else {
  $tpl_customcss = "template/canvas/css/screen.css";
}


/* ### FUNCTION FILE ### */

// Menu builder function, parentId 0 is the root
function jak_build_menu_qed($parent, $menu, $active, $mainclass, $dropdown, $dropdownclass, $dropclass, $subclass, $admin)
{
  $html = '';
  if (isset($menu['parents'][$parent])) {
    $html .= '<ul class="' . $mainclass . '">';
    foreach ($menu['parents'][$parent] as $itemId) {
      //IF MENU DONT HAVE SUBMENU
      if (!isset($menu['parents'][$itemId])) {
        $html .= '<li' . ($active == $menu["items"][$itemId]["pagename"] ? ' class="curent"' : '') . '><a href="' . $menu["items"][$itemId]["varname"] . '"' . ($active == $menu["items"][$itemId]["pagename"] ? ' class="active"' : '') . '>' . ($menu["items"][$itemId]["catimg"] ? '<i class="fa ' . $menu["items"][$itemId]["catimg"] . '"></i> ' : '') . $menu["items"][$itemId]["name"] . '</a></li>';
      }

      //IF MENU HAS SUBMENU
      if (isset($menu['parents'][$itemId])) {
        $html .= '<li' . ($active == $menu["items"][$itemId]["pagename"] ? ($dropdown ? ' class="active ' . $dropdown . '"' : '') : ($dropdown ? ' class="' . $dropdown . '"' : '')) . '><a href="' . $menu["items"][$itemId]["varname"] . '" class="' . $dropdownclass . '">' . ($menu["items"][$itemId]["catimg"] ? '<i class="fa ' . $menu["items"][$itemId]["catimg"] . '"></i> ' : '') . $menu["items"][$itemId]["name"] . '</a>';
        $html .= jak_build_menu_qed($itemId, $menu, $active, $dropclass, $subclass, $dropdownclass, $dropclass, $subclass, $admin);
        $html .= '</li>';
      }
    }
    if ($admin) {
      $html .= '<li><a href="' . BASE_URL . 'admin/"><i class="fa fa-sliders"></i> Admin ACP</a></li>';
    }
    $html .= '</ul>';
  }
  return $html;
}

?>