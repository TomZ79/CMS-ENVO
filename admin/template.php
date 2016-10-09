<?php

// Check if the file is accessed only via index.php if not stop the script from running
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die('You cannot access this file directly.');

// Check if the user has access to this file
if (!JAK_USERID || !JAK_SUPERADMINACCESS) jak_redirect(BASE_URL);

$templateurl = jak_get_setting('setting');
$jaktable = DB_PREFIX . 'setting';

$result = $jakdb->query('SELECT value FROM ' . $jaktable . ' WHERE groupname = "setting" && varname = "sitestyle" LIMIT 1');
$row = $result->fetch_assoc();

$JAK_FILE_SUCCESS = $JAK_FILE_ERROR = $JAK_FILEURL = $JAK_FILECONTENT = "";
$defaults = $_POST;

// Show file in dir - original solution from Jakweb( show file only in main dir)
function jak_get_template_files($directory, $exempt = array('.', '..', '.ds_store', '.svn', 'preview.jpg', 'index.html', 'js', 'css', 'img', '_cache'), &$files = array())
{
  $handle = opendir($directory);
  while (false !== ($resource = readdir($handle))) {
    if (!in_array(strtolower($resource), $exempt)) {
      if (is_dir($directory . $resource . '/')) {
        array_merge($files, getFiles($directory . $resource . '/', $exempt, $files));
      } else {
        if (is_writable($directory . '/' . $resource)) {
          $files[] = array('path' => $directory . '/' . $resource, 'name' => $resource);
        }
      }
    }
  }
  closedir($handle);
  return $files;
}

// Show file in dir - custom solution ( show file in dir and subdir)
$pathLen = 0;

function getTemplateFiles($dir, $level, $rootLen) {
  # Global variable
  global $pathLen;
  global $page1;
  global $ROOT_DIR;
  # Extension Filter
  $allowed_ext = '/\.(css|ini|php|txt)$/';
  $allowed_file = '/help.html$/';

  if ($handle = opendir($dir)) {

    $allFiles = array();

    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != "..") {
        if (is_dir($dir . "/" . $entry)) {
          $allFiles[] = "D: " . $dir . "/" . $entry;
        } else {
          if (preg_match($allowed_ext, $entry) || preg_match($allowed_file, $entry)) {
            $allFiles[] = "F: " . $dir . "/" . $entry;
          }
        }
      }
    }

    closedir($handle);

    natsort($allFiles);

    foreach($allFiles as $value) {
      $displayName = substr($value, $rootLen + 4);
      $fileName    = substr($value, 3);
      $linkName    = str_replace(" ", "%20", substr($value, $pathLen + 3));
      if ($page1 != 'edit-files') {
        if (is_dir($fileName)) {
          $linkName = ltrim($linkName, '/');
          echo "<optgroup label=\"" . $linkName . "\">\n";
          getTemplateFiles($fileName, $level + 1, strlen($fileName));
          echo "</optgroup>";
        } else {
          echo "<option value=\"" . $ROOT_DIR . $linkName . "\">" . $displayName . "</option>";
        }
      } else {
        if (!is_dir($fileName)) {
          echo "<option value=\"" . $ROOT_DIR . $linkName . "\">" . $displayName . "</option>";
        }
      }
    }
  }
}

switch ($page1) {
  case 'settings':

    $templatedir = '/template/' .$row['value'];
    $langdir = '..' . $templatedir . '/lang/';
    $langfile = $langdir . $site_language . '.ini';

    if (!is_writable($langdir)) {
      $JAK_FILE_ERROR = 1;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $defaults = $_POST;

      $result1 = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
      WHEN "homeLinks_canvas_tpl" THEN "' . smartsql($defaults['homeLinks']) . '"
      WHEN "contactLinks_canvas_tpl" THEN "' . smartsql($defaults['contactLinks']) . '"
      WHEN "loginLinks_canvas_tpl" THEN "' . smartsql($defaults['loginLinks']) . '"
      WHEN "registerLinks_canvas_tpl" THEN "' . smartsql($defaults['registerLinks']) . '"

      WHEN "facebookShow_canvas_tpl" THEN "' . smartsql($defaults['facebookShow']) . '"
      WHEN "facebookLinks_canvas_tpl" THEN "' . smartsql($defaults['facebookLinks']) . '"

      WHEN "twitterShow_canvas_tpl" THEN "' . smartsql($defaults['twitterShow']) . '"
      WHEN "twitterLinks_canvas_tpl" THEN "' . smartsql($defaults['twitterLinks']) . '"

      WHEN "googleShow_canvas_tpl" THEN "' . smartsql($defaults['googleShow']) . '"
      WHEN "googleLinks_canvas_tpl" THEN "' . smartsql($defaults['googleLinks']) . '"

      WHEN "phoneShow_canvas_tpl" THEN "' . smartsql($defaults['phoneShow']) . '"
      WHEN "phoneLinks_canvas_tpl" THEN "' . smartsql($defaults['phoneLinks']) . '"

      WHEN "emailShow_canvas_tpl" THEN "' . smartsql($defaults['emailShow']) . '"
      WHEN "emailLinks_canvas_tpl" THEN "' . smartsql($defaults['emailLinks']) . '"

      WHEN "logo1_canvas_tpl" THEN "' . smartsql($defaults['standardlogo']) . '"
      WHEN "logo2_canvas_tpl" THEN "' . smartsql($defaults['retinalogo']) . '"
      WHEN "phoneLinks1_canvas_tpl" THEN "' . smartsql($defaults['phoneLinks1']) . '"
      WHEN "emailLinks1_canvas_tpl" THEN "' . smartsql($defaults['emailLinks1']) . '"

      WHEN "section_canvas_tpl" THEN "' . smartsql($defaults['cb1']) . '"

      END
        WHERE varname IN ("homeLinks_canvas_tpl", "contactLinks_canvas_tpl", "loginLinks_canvas_tpl", "registerLinks_canvas_tpl", "facebookShow_canvas_tpl", "facebookLinks_canvas_tpl", "twitterShow_canvas_tpl", "twitterLinks_canvas_tpl", "googleShow_canvas_tpl", "googleLinks_canvas_tpl", "phoneShow_canvas_tpl", "phoneLinks_canvas_tpl", "emailShow_canvas_tpl", "emailLinks_canvas_tpl", "logo1_canvas_tpl", "logo2_canvas_tpl", "phoneLinks1_canvas_tpl", "emailLinks1_canvas_tpl", "section_canvas_tpl")');

      $openfedit = fopen($defaults['jak_file'], "w+");
      $datasave = $defaults['jak_filecontent'];
      $datasave = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
      $datasave = stripslashes($datasave);
      if (fwrite($openfedit, $datasave)) {
        $JAK_FILE_SUCCESS = 1;
      }

      fclose($openfedit);

    }

    if ($result1) {
      jak_redirect(BASE_URL . 'index.php?p=template&sp=settings&ssp=s');
    }

    // Get the sidebar templates
    $result = $jakdb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . DB_PREFIX . 'pluginhooks WHERE hook_name = "tpl_footer_widgets" AND active = 1 ORDER BY exorder ASC');
    while ($row = $result->fetch_assoc()) {
      $plhooks[] = $row;
    }
// Get all plugins out the databse
    $JAK_HOOKS = $plhooks;

    // Reset the database settings so we have it unique
    $result = $jakdb->query('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE product = "tpl_canvas"');
    while ($row1 = $result->fetch_assoc()) {
      // collect each record into a define

      // Now check if sting contains html and do something about it!
      if (strlen($row1['value']) != strlen(filter_var($row1['value'], FILTER_SANITIZE_STRING))) {
        $defvar = htmlspecialchars_decode(htmlspecialchars($row1['value']));
      } else {
        $defvar = $row1["value"];
      }

      $jktpl[$row1['varname']] = $defvar;
    }

    // Open language file
    if (file_exists($langfile)) {
      $openfile = fopen($langfile, 'r');
      $filecontent = @fread($openfile, filesize($langfile));
      $displaycontent = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
      $JAK_FILECONTENT = $displaycontent;
      $JAK_FILEURL = $langfile;

      fclose($openfile);
    }

    // Title and Description
    $SECTION_TITLE = 'Template Settings';
    $SECTION_DESC = 'Settings for your template';

    // Breadcrumbs sections
    $SECTION_CATEGORY = 'Template Settings';
    $SECTION_SUBCATEGORY_F = 'Settings for your template';

    // Ace Mode
    $acemode = 'ini';

    // Call the template
    $template = 'templatesettings.php';

    break;
  case 'cssedit':

    $cssdir = '../template/' . $row['value'] . '/css';

    if (!is_writable($cssdir)) {
      $JAK_FILE_ERROR = 1;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['edit'])) {

      $openfile = fopen($defaults['jak_file_edit'], 'r');
      $filecontent = @fread($openfile, filesize($defaults['jak_file_edit']));
      $displaycontent = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
      $JAK_FILECONTENT = $displaycontent;
      $JAK_FILEURL = $defaults['jak_file_edit'];

      fclose($openfile);

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['reset'])) {

      jak_redirect(BASE_URL . 'index.php?p=template&sp=cssedit');

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['save'])) {

      if (is_writable($defaults['jak_file'])) {
        $openfedit = fopen($defaults['jak_file'], "w+");
        $datasave = $defaults['jak_filecontent'];
        $datasave = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
        $datasave = stripslashes($datasave);
        if (fwrite($openfedit, $datasave)) {
          $JAK_FILE_SUCCESS = 1;
        }
      } else {
        $JAK_FILE_ERROR = 1;
      }

      fclose($openfedit);

    }

    // Dir path
    $ROOT_DIR = $cssdir;
    // Get the important files into template
    $JAK_GET_TEMPLATE_FILES = jak_get_template_files($cssdir);

    // Title and Description
    $SECTION_TITLE = $tl["general"]["g53"];
    $SECTION_DESC = $tl["cmdesc"]["d44"];

    // Breadcrumbs sections
    $SECTION_CATEGORY = $tl["menu"]["m23"];
    $SECTION_SUBCATEGORY_F = $tl["general"]["g53"];

    // Ace Mode
    $acemode = 'css';

    // Call the template
    $template = 'editfiles.php';

    break;
  case 'langedit':

    $langdir = '../lang';

    if (!is_writable($langdir)) {
      $JAK_FILE_ERROR = 1;
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['edit'])) {

      $openfile = fopen($defaults['jak_file_edit'], 'r');
      $filecontent = @fread($openfile, filesize($defaults['jak_file_edit']));
      $displaycontent = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
      $JAK_FILECONTENT = $displaycontent;
      $JAK_FILEURL = $defaults['jak_file_edit'];

      fclose($openfile);

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['reset'])) {

      jak_redirect(BASE_URL . 'index.php?p=template&sp=langedit');

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['save'])) {

      if (is_writable($defaults['jak_file'])) {
        $openfedit = fopen($defaults['jak_file'], "w+");
        $datasave = $defaults['jak_filecontent'];
        $datasave = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
        $datasave = stripslashes($datasave);
        if (fwrite($openfedit, $datasave)) {
          $JAK_FILE_SUCCESS = 1;
        }
      } else {
        $JAK_FILE_ERROR = 1;
      }

      fclose($openfedit);

    }

    // Dir path
    $ROOT_DIR = $langdir;
    // Get the important files into template
    $JAK_GET_TEMPLATE_FILES = jak_get_template_files($langdir);

    // Title and Description
    $SECTION_TITLE = $tl["cmenu"]["c54"];
    $SECTION_DESC = $tl["cmdesc"]["d44"];

    // Breadcrumbs sections
    $SECTION_CATEGORY = $tl["menu"]["m23"];
    $SECTION_SUBCATEGORY_F = $tl["cmenu"]["c54"];

    // Ace Mode
    $acemode = 'ini';

    // Call the template
    $template = 'editfiles.php';

    break;
  case 'edit-files':

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['edit'])) {

      $openfile = fopen($defaults['jak_file_edit'], 'r');
      $filecontent = @fread($openfile, filesize($defaults['jak_file_edit']));
      $displaycontent = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
      $JAK_FILECONTENT = $displaycontent;
      $JAK_FILEURL = $defaults['jak_file_edit'];

      fclose($openfile);

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['reset'])) {

      jak_redirect(BASE_URL . 'index.php?p=template&sp=edit-files');

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['save'])) {

      if (is_writable($defaults['jak_file'])) {
        $openfedit = fopen($defaults['jak_file'], "w+");
        $datasave = $defaults['jak_filecontent'];
        $datasave = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
        $datasave = stripslashes($datasave);
        if (fwrite($openfedit, $datasave)) {
          $JAK_FILE_SUCCESS = 1;
        }
      } else {
        $JAK_FILE_ERROR = 1;
      }

      fclose($openfedit);

    }

    $filedir = '../template/' . $row['value'];

    if (!is_writable($filedir)) {
      $JAK_FILE_ERROR = 1;
    }

    // Dir path
    $ROOT_DIR = $filedir;
    // Get the important files into template
    $JAK_GET_TEMPLATE_FILES = jak_get_template_files($filedir);

    // Title and Description
    $SECTION_TITLE = $tl["general"]["g52"];
    $SECTION_DESC = $tl["cmdesc"]["d44"];

    // Breadcrumbs sections
    $SECTION_CATEGORY = $tl["menu"]["m23"];
    $SECTION_SUBCATEGORY_F = $tl["general"]["g52"];

    // Ace Mode
    $acemode = 'php';

    // Call the template
    $template = 'editfiles.php';

    break;
  case 'active':

    $result = $jakdb->query('UPDATE ' . $jaktable . ' SET value = IF (value = 1, 0, 1) WHERE varname = "styleswitcher_tpl" && groupname = "' . smartsql($page2) . '"');

    if (!$result) {
      jak_redirect(BASE_URL . 'index.php?p=template&sp=e');
    } else {
      jak_redirect(BASE_URL . 'index.php?p=template&sp=s1');
    }

    break;
  default:

    // Get the settings
    $JAK_SETTING = jak_get_setting('setting');

    // Let's go on with the script
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $defaults = $_POST;

      // Do the dirty work in mysql
      $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
		        WHEN "sitestyle" THEN "' . smartsql($defaults['save']) . '"
		    END
				WHERE varname IN ("sitestyle")');

      if (!$result) {
        jak_redirect(BASE_URL . 'index.php?p=template&sp=e');
      } else {
        jak_redirect(BASE_URL . 'index.php?p=template&sp=s');
      }
    }

    // Get all styles in the directory
    $site_style_files = jak_get_site_style('../template/');

    // Title and Description
    $SECTION_TITLE = $tl["menu"]["m23"];
    $SECTION_DESC = $tl["cmdesc"]["d44"];

    // Breadcrumbs sections
    $SECTION_CATEGORY = $tl["menu"]["m23"];

    // Call the template
    $template = 'template.php';
}
?>