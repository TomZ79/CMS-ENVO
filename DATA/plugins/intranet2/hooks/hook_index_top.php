<?php

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/intranet2/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/intranet2/template/';

// EN: Getting name of current page
// CZ: Získání názvu aktuální stránky
$page  = ($tempp ? envo_url_input_filter($tempp) : '');
$page1 = ($tempp1 ? envo_url_input_filter($tempp1) : '');
$page2 = ($tempp2 ? envo_url_input_filter($tempp2) : '');
$page3 = ($tempp3 ? envo_url_input_filter($tempp3) : '');

// EN: Getting name of referer page
// CZ:
$url_referer  = parse_url($_SERVER['HTTP_REFERER'])['path'];
$ref_array  = explode('/', $url_referer);

// EN: Getting the plugin 'id' from table 'plugins' for futher use
// CZ: Získání 'id' pluginu z tabulky 'plugins' pro další použití
$results = $envodb -> query('SELECT id FROM ' . DB_PREFIX . 'plugins WHERE name = "Intranet2"');
$rows    = $results -> fetch_assoc();

if ($rows['id']) {

	$results1 = $envodb -> query('SELECT id, name, varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = "' . $rows['id'] . '" LIMIT 1');

	while ($rows1 = $results1 -> fetch_assoc()) {
		// EN: Insert each record into array
		// CZ: Vložení získaných dat do pole
		$ENVO_DATA = $rows1;
	}

	define('BASE_URL_INTRANET2', ENVO_rewrite ::envoParseurl($ENVO_DATA['varname']));

}

if (!ENVO_USERID && $page == $ENVO_DATA['varname']) {
	// LOGIN PAGE FOR PLUGIN - if user is not login

	// Include post login functionality
	include_once APP_PATH . 'include/loginpass.php';

	// EN: Load the php template
	// CZ: Načtení php template (šablony)
	include_once APP_PATH . $SHORT_PLUGIN_URL_TEMPLATE . 'int2_login.php';

	// EN: Reset Session for next use
	// CZ: Reset Session pro další použití
	unset($_SESSION['infomsg']);
	unset($_SESSION['warningmsg']);

	exit;

} else {
	// LOGIN PAGE FOR PLUGIN - if user is login

	// EN: Logout from site
	// CZ: Odhlášení z webové sítě
	if ($page == 'logout') {
		if (!ENVO_USERID) {
			// EN: Add error message to session
			// CZ: Přidání chybové zprávy do session
			$_SESSION['errormsg'] = $tl['general_error']['generror1'];
			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL);

		}
		if (ENVO_USERID && $ref_array[1] == $ENVO_DATA['varname']) {
			$envouserlogin -> envoLogout(ENVO_USERID);
			$usergroupid = $envouser -> getVar('usergroupid');
			// EN: Add info message to session
			// CZ: Přidání info zprávy do session
			$_SESSION['infomsg'] = $tl['notification']['n4'];
			// EN: Redirect page
			// CZ: Přesměrování stránky
			envo_redirect(BASE_URL_INTRANET2);

		}
	}
}

?>