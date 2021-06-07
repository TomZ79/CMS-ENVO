<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !ENVO_SUPERADMINACCESS) envo_redirect(BASE_URL);

// EN: Start a PHP Session
// CZ: Start PHP Session
session_start();

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable = DB_PREFIX . 'setting';

// EN: Import important settings for the template from the DB
// CZ: Importuj důležité nastavení pro šablonu z DB
$templateurl = envo_get_setting('setting');

$result = $envodb -> query('SELECT value FROM ' . $envotable . ' WHERE groupname = "setting" && varname = "sitestyle" LIMIT 1');
$row    = $result -> fetch_assoc();

$ENVO_FILE_SUCCESS = $ENVO_FILE_ERROR = $ENVO_FILEURL = $ENVO_FILECONTENT = "";
$defaults          = $_POST;

// EN: Show file in dir - ( show file only in main dir)
// CZ: Zobrazeni souborů ve složce
function envo_get_template_files ($directory, $exempt = array ('.', '..', '.ds_store', '.svn', 'preview.jpg', 'index.html', 'js', 'css', 'img', '_cache'), &$files = array ())
{
	$handle = opendir($directory);
	while (FALSE !== ($resource = readdir($handle))) {
		if (!in_array(strtolower($resource), $exempt)) {
			if (is_dir($directory . $resource . '/')) {
				array_merge($files, envo_get_template_files($directory . $resource . '/', $exempt, $files));
			} else {
				if (is_writable($directory . '/' . $resource)) {
					$files[] = array ('path' => $directory . '/' . $resource, 'name' => $resource);
				}
			}
		}
	}
	closedir($handle);

	return $files;
}

// Show file in dir - custom solution ( show file in dir and subdir)
$pathLen = 0;

function getTemplateFiles ($dir, $level, $rootLen)
{
	# Global variable
	global $pathLen;
	global $page1;
	global $ROOT_DIR;
	# Extension Filter
	$allowed_ext  = '/\.(css|ini|php|txt)$/';
	$allowed_file = '/help.html$/';

	if ($handle = opendir($dir)) {

		$allFiles = array ();

		while (FALSE !== ($entry = readdir($handle))) {
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

		foreach ($allFiles as $value) {
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

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
	case 'settings':
		// TEMPLATE SETTINGS

		$file = '../template/' . ENVO_TEMPLATE . '/templatesettings_case.php';
		if (file_exists($file)) {
			include_once $file;
		}

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = sprintf($tl["tpl_sec_title"]["tplt1"], ENVO_TEMPLATE);
		$SECTION_DESC  = $tl["tpl_sec_desc"]["tpld1"];

		// EN: Set ACE Editor mode
		// CZ: Nastavení módu ACE Editoru
		$acemode = 'ini';

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$template = 'templatesettings.php';

		break;
	case 'cssedit':
		// EDIT CSS FILE OF TEMPLATE

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['edit'])) {

			$openfile         = fopen($defaults['envo_file_edit'], 'r');
			$filecontent      = @fread($openfile, filesize($defaults['envo_file_edit']));
			$displaycontent   = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
			$ENVO_FILECONTENT = $displaycontent;
			$ENVO_FILEURL     = $defaults['envo_file_edit'];

			fclose($openfile);

		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['reset'])) {

			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=template&sp=cssedit');

		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnSave'])) {
			// EN: If button "Save Changes" clicked
			// CZ: Pokud bylo stisknuto tlačítko "Uložit"

			if (is_writable($defaults['envo_file'])) {
				$openfedit = fopen($defaults['envo_file'], "w+");
				$datasave  = $defaults['envo_filecontent'];
				$datasave  = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
				$datasave  = stripslashes($datasave);
				if (fwrite($openfedit, $datasave)) {
					$ENVO_FILE_SUCCESS = 1;
				}
			} else {
				$ENVO_FILE_ERROR = 1;
			}

			fclose($openfedit);

		}

		if (isset($setting["cms_tpl"])) {

		}

		// Dir path and check if folder is writable
		$cssdir   = '../template/' . $row['value'] . '/css';
		$ROOT_DIR = $cssdir;

		// Check if template is installed
		if (isset($setting["cms_tpl"])) {
			// Check if folder is writable
			if (!is_writable($cssdir)) {
				$ENVO_FILE_ERROR = 1;
			}

			// Get the important files into template
			$ENVO_GET_TEMPLATE_FILES = envo_get_template_files($cssdir);
		}

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tl["tpl_sec_title"]["tplt3"];
		$SECTION_DESC  = $tl["tpl_sec_desc"]["tpld3"];

		// EN: Set ACE Editor mode
		// CZ: Nastavení módu ACE Editoru
		$_SESSION['acemode'] = 'css';

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$template = 'editfiles.php';

		break;
	case 'langedit':
		// EDIT LANG FILE OF TEMPLATE

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['edit'])) {

			$openfile         = fopen($defaults['envo_file_edit'], 'r');
			$filecontent      = @fread($openfile, filesize($defaults['envo_file_edit']));
			$displaycontent   = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
			$ENVO_FILECONTENT = $displaycontent;
			$ENVO_FILEURL     = $defaults['envo_file_edit'];

			fclose($openfile);

		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['reset'])) {

			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=template&sp=langedit');

		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnSave'])) {
			// EN: If button "Save Changes" clicked
			// CZ: Pokud bylo stisknuto tlačítko "Uložit"

			if (is_writable($defaults['envo_file'])) {
				$openfedit = fopen($defaults['envo_file'], "w+");
				$datasave  = $defaults['envo_filecontent'];
				$datasave  = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
				$datasave  = stripslashes($datasave);
				if (fwrite($openfedit, $datasave)) {
					$ENVO_FILE_SUCCESS = 1;
				}
			} else {
				$ENVO_FILE_ERROR = 1;
			}

			fclose($openfedit);

		}

		// Dir path
		$langdir  = '../lang';
		$ROOT_DIR = $langdir;

		// Check if template is installed
		if (isset($setting["cms_tpl"])) {
			// Check if folder is writable
			if (!is_writable($langdir)) {
				$ENVO_FILE_ERROR = 1;
			}

			// Get the important files into template
			$ENVO_GET_TEMPLATE_FILES = envo_get_template_files($langdir);
		}

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tl["tpl_sec_title"]["tplt4"];
		$SECTION_DESC  = $tl["tpl_sec_desc"]["tpld4"];

		// EN: Set ACE Editor mode
		// CZ: Nastavení módu ACE Editoru
		$_SESSION['acemode'] = 'ini';

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$template = 'editfiles.php';

		break;
	case 'edit-files':
		// EDIT FILES OF TEMPLATE

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['edit'])) {

			$openfile         = fopen($defaults['envo_file_edit'], 'r');
			$filecontent      = @fread($openfile, filesize($defaults['envo_file_edit']));
			$displaycontent   = preg_replace('</textarea>', 'JAK-DO-NOT-EDIT-TEXTAREA', $filecontent);
			$ENVO_FILECONTENT = $displaycontent;
			$ENVO_FILEURL     = $defaults['envo_file_edit'];

			fclose($openfile);

		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($defaults['reset'])) {

			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=template&sp=edit-files');

		}

		if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btnSave'])) {
			// EN: If button "Save Changes" clicked
			// CZ: Pokud bylo stisknuto tlačítko "Uložit"

			if (is_writable($defaults['envo_file'])) {
				$openfedit = fopen($defaults['envo_file'], "w+");
				$datasave  = $defaults['envo_filecontent'];
				$datasave  = preg_replace('<JAK-DO-NOT-EDIT-TEXTAREA>', '/textarea', $datasave);
				$datasave  = stripslashes($datasave);
				if (fwrite($openfedit, $datasave)) {
					$ENVO_FILE_SUCCESS = 1;
				}
			} else {
				$ENVO_FILE_ERROR = 1;
			}

			fclose($openfedit);

		}

		// Dir path
		$filedir  = '../template/' . $row['value'];
		$ROOT_DIR = $filedir;

		// Check if template is installed
		if (isset($setting["cms_tpl"])) {
			// Check if folder is writable
			if (!is_writable($filedir)) {
				$ENVO_FILE_ERROR = 1;
			}

			// Get the important files into template
			$ENVO_GET_TEMPLATE_FILES = envo_get_template_files($filedir);
		}

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tl["tpl_sec_title"]["tplt2"];
		$SECTION_DESC  = $tl["tpl_sec_desc"]["tpld2"];

		// EN: Set ACE Editor mode
		// CZ: Nastavení módu ACE Editoru
		$_SESSION['acemode'] = 'php';

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$template = 'editfiles.php';

		break;
	case 'active':
		// ACTIVE TEMPLATE

		$result = $envodb -> query('UPDATE ' . $envotable . ' SET value = IF (value = 1, 0, 1) WHERE varname = "styleswitcher_tpl" && groupname = "' . smartsql($page2) . '"');

		if (!$result) {
			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=template&status=e');
		} else {
			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL . 'index.php?p=template&status=s1');
		}

		break;
	default:
		// LIST OF TEMPLATE

		// EN: Import important settings for the template from the DB
		// CZ: Importuj důležité nastavení pro šablonu z DB
		$ENVO_SETTING = envo_get_setting('setting');

		// Let's go on with the script
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			// EN: Default Variable
			// CZ: Hlavní proměnné
			$defaults = $_POST;

			/* EN: Convert value
			 * smartsql - secure method to insert form data into a MySQL DB
			 * ------------------
			 * CZ: Převod hodnot
			 * smartsql - secure method to insert form data into a MySQL DB
			*/
			$result = $envodb -> query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                  WHEN "sitestyle" THEN "' . smartsql($defaults['btnSave']) . '"
                END
                WHERE varname IN ("sitestyle")');

			if (!$result) {
				// EN: Redirect page
				// CZ: Přesměrování stránky
				envo_redirect(BASE_URL . 'index.php?p=template&status=e');
			} else {
				// EN: Redirect page
				// CZ: Přesměrování stránky
				envo_redirect(BASE_URL . 'index.php?p=template&status=s');
			}
		}

		// Get all styles in the directory
		$site_style_files = envo_get_site_style('../template/');

		// EN: Title and Description
		// CZ: Titulek a Popis
		$SECTION_TITLE = $tl["tpl_sec_title"]["tplt"];
		$SECTION_DESC  = $tl["tpl_sec_desc"]["tpld"];

		// EN: Load the php template
		// CZ: Načtení php template (šablony)
		$template = 'template.php';
}

?>