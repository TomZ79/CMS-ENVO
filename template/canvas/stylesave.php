<?php // Save the form

if (!file_exists('../../config.php')) die('ajax/[qtips.php] config.php not exist');
require_once '../../config.php';

if (!$jakuser->jakAdminaccess($jakuser->getVar("usergroupid"))) die('You cannot access this file directly.');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

// Let's check what we display on footer
  if (is_numeric($_POST["cb1"])) {
    $cb1 = $_POST["cb1"];
  } elseif ($_POST["cb1"] == "ct") {
    $cb1 = smartsql($_POST['content1']);
  } else {
    $cb1 = 0;
  }

  if (is_numeric($_POST["cb2"])) {
    $cb2 = $_POST["cb2"];
  } elseif ($_POST["cb2"] == "ct") {
    $cb2 = smartsql($_POST['content2']);
  } else {
    $cb2 = 0;
  }

  if (is_numeric($_POST["cb3"])) {
    $cb3 = $_POST["cb3"];
  } elseif ($_POST["cb3"] == "ct") {
    $cb3 = smartsql($_POST['content3']);
  } else {
    $cb3 = 0;
  }

  $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
	WHEN "navbarstyle_mosaic_tpl" THEN "' . smartsql($_POST['navbarstyle']) . '"
	WHEN "navbarbw_mosaic_tpl" THEN "' . smartsql($_POST['navbarbw']) . '"
	WHEN "navbarcolor_mosaic_tpl" THEN "' . smartsql($_POST['nav_color']) . '"
	WHEN "navbarlinkcolor_mosaic_tpl" THEN "' . smartsql($_POST['nav_link_color']) . '"
	WHEN "navbarcolorlinkbg_mosaic_tpl" THEN "' . smartsql($_POST['nav_linkbg_color']) . '"
	WHEN "navbarcolorsubmenu_mosaic_tpl" THEN "' . smartsql($_POST['nav_links_color']) . '"
	WHEN "logo_mosaic_tpl" THEN "' . smartsql($_POST['logo']) . '"
	
	WHEN "mininavbarshow_mosaic_tpl" THEN "' . smartsql($_POST['mininavbarshow']) . '"
	WHEN "mininavbarcolour_mosaic_tpl" THEN "' . smartsql($_POST['mininavbarcolour']) . '"
	WHEN "mininavbartxt_mosaic_tpl" THEN "' . smartsql($_POST['mininavtext']) . '"
	
	WHEN "style_mosaic_tpl" THEN "' . smartsql($_POST['tplstyle']) . '"
	WHEN "design_mosaic_tpl" THEN "' . smartsql($_POST['tpldesign']) . '"
	WHEN "boxpattern_mosaic_tpl" THEN "' . smartsql($_POST['patternboxed']) . '"
	WHEN "boxbg_mosaic_tpl" THEN "' . smartsql($_POST['tplboxbgcolor']) . '"
	WHEN "font_mosaic_tpl" THEN "' . smartsql($_POST['cFont']) . '"
	WHEN "fontg_mosaic_tpl" THEN "' . smartsql($_POST['gFont']) . '"
	WHEN "sidebar_location_tpl" THEN "' . smartsql($_POST['tplsidebar']) . '"
	WHEN "hcolour_mosaic_tpl" THEN "' . smartsql($_POST['h_color']) . '"
	WHEN "txtcolour_mosaic_tpl" THEN "' . smartsql($_POST['txt_color']) . '"
	
    WHEN "theme_mosaic_tpl" THEN "' . smartsql($_POST['theme']) . '"
    WHEN "pattern_mosaic_tpl" THEN "' . smartsql($_POST['pattern']) . '"
    WHEN "mainbg_mosaic_tpl" THEN "' . smartsql($_POST['maingbg_color']) . '"
    
    WHEN "bcontent1_mosaic_tpl" THEN "' . $cb1 . '"
    WHEN "bcontent2_mosaic_tpl" THEN "' . $cb2 . '"
    WHEN "bcontent3_mosaic_tpl" THEN "' . $cb3 . '"
    WHEN "sectionbg_mosaic_tpl" THEN "' . smartsql($_POST['section_color']) . '"
    WHEN "sectiontc_mosaic_tpl" THEN "' . smartsql($_POST['section_title_color']) . '"
    WHEN "sectionshow_mosaic_tpl" THEN "' . smartsql($_POST['hide_section']) . '"
    
    WHEN "footer_mosaic_tpl" THEN "' . smartsql($_POST['footer']) . '"
    WHEN "fcont_mosaic_tpl" THEN "' . smartsql($_POST['footercontent']) . '"
    WHEN "fcont2_mosaic_tpl" THEN "' . smartsql($_POST['footercontent2']) . '"
    WHEN "fcont3_mosaic_tpl" THEN "' . smartsql($_POST['footercontent3']) . '"
    WHEN "footerc_mosaic_tpl" THEN "' . smartsql($_POST['footer_color']) . '"
    WHEN "footerct_mosaic_tpl" THEN "' . smartsql($_POST['footer_title_color']) . '"
    WHEN "footercte_mosaic_tpl" THEN "' . smartsql($_POST['footer_text_color']) . '"
    
END
	WHERE varname IN ("navbarstyle_mosaic_tpl", "navbarbw_mosaic_tpl", "navbarcolor_mosaic_tpl", "navbarlinkcolor_mosaic_tpl", "navbarcolorlinkbg_mosaic_tpl", "navbarcolorsubmenu_mosaic_tpl", "logo_mosaic_tpl", "mininavbarshow_mosaic_tpl", "mininavbarcolour_mosaic_tpl", "mininavbartxt_mosaic_tpl", "style_mosaic_tpl", "design_mosaic_tpl", "boxpattern_mosaic_tpl", "boxbg_mosaic_tpl", "font_mosaic_tpl", "fontg_mosaic_tpl", "sidebar_location_tpl", "hcolour_mosaic_tpl", "txtcolour_mosaic_tpl", "theme_mosaic_tpl", "pattern_mosaic_tpl", "mainbg_mosaic_tpl", "bcontent1_mosaic_tpl", "bcontent2_mosaic_tpl", "bcontent3_mosaic_tpl", "sectionbg_mosaic_tpl", "sectiontc_mosaic_tpl", "sectionshow_mosaic_tpl", "footer_mosaic_tpl", "fcont_mosaic_tpl", "fcont2_mosaic_tpl", "fcont3_mosaic_tpl", "footerc_mosaic_tpl", "footerct_mosaic_tpl", "footercte_mosaic_tpl")');

  if ($result) {

    // Ajax Request
    if (isset($_POST['jakajax']) && $_POST['jakajax'] == "yes") {
      header('Cache-Control: no-cache');
      die(json_encode(array('status' => 1, 'html' => '<div class="alert bg-success">Successful</div>')));
    } else {
      jak_redirect($_SERVER['HTTP_REFERER']);
    }

  }

}

?>