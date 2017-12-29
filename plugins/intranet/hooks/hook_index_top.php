<?php

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/intranet/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/intranet/template/';

// EN: Get name of current page
// CZ: Získání názvu aktuální stránky
$page  = ($tempp ? envo_url_input_filter($tempp) : '');
$page1 = ($tempp1 ? envo_url_input_filter($tempp1) : '');
$page2 = ($tempp2 ? envo_url_input_filter($tempp2) : '');
$page3 = ($tempp3 ? envo_url_input_filter($tempp3) : '');

define('BASE_URL_INTRANET', ENVO_rewrite::envoParseurl('intranet'));

if (!ENVO_USERID && $page == 'intranet') {
  // LOGIN PAGE FOR PLUGIN - if user is not login

  // Include post login functionality
  include_once APP_PATH . 'include/loginpass.php';

  // EN: Load the php template
  // CZ: Načtení php template (šablony)
  include_once APP_PATH . $SHORT_PLUGIN_URL_TEMPLATE . 'int_login.php';

  // EN: Reset Session for next use
  // CZ: Reset Session pro další použití
  unset($_SESSION["infomsg"]);

  exit;

} else {
  // LOGIN PAGE FOR PLUGIN - if user is login

  // EN: Logout from site
  // CZ: Odhlášení z webové sítě
  if ($page == 'logout') {
    if (!ENVO_USERID) {
      // EN: Add error message to session
      // CZ: Přidání chybové zprávy do session
      $_SESSION["errormsg"] = $tl["general_error"]["generror1"];
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL);

    }
    if (ENVO_USERID && $page == 'intranet') {
      $envouserlogin->envoLogout(ENVO_USERID);
      $usergroupid = $envouser->getVar("usergroupid");
      // EN: Add info message to session
      // CZ: Přidání info zprávy do session
      $_SESSION["infomsg"] = $tl["notification"]["n4"];
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL_INTRANET);

    }
  }
}

?>