<?php

// Reset vars
$errorlo = $errorfp = $errorpp = array ();

// EN: User Sign In
// CZ: Přihlášení uživatele
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['frmSignIn'])) {

	$username = smartsql($_POST['signInUsername']);
	$userpass = smartsql($_POST['signInPassword']);
	$cookies  = FALSE;
	if (isset($_POST['rememberme'])) $cookies = TRUE;

	// Security fix
	$valid_agent = filter_var($_SERVER['HTTP_USER_AGENT'], FILTER_SANITIZE_STRING);
	$valid_ip    = filter_var($_SERVER['REMOTE_ADDR'], FILTER_VALIDATE_IP);

	// Write the log file each time someone tries to login before
	$envouserlogin -> envoWriteLoginLog(filter_var($username, FILTER_SANITIZE_STRING), $_SERVER['REQUEST_URI'], $valid_ip, $valid_agent, 0);

	$user_check = $envouserlogin -> envoCheckUserData($username, $userpass);
	if ($user_check == TRUE) {

		// Now login in the user
		$envouserlogin -> envoLogin($user_check, $userpass, $cookies);

		// Write the log file each time someone login after to show success
		$envouserlogin -> envoWriteLoginLog($user_check, '', $valid_ip, '', 1);

		// Success
		$_SESSION["infomsg"] = $tl["notification"]["n3"];
		if (isset($_SESSION["logintries"])) unset($_SESSION["logintries"]);

		if (isset($_POST['home']) && $_POST['home']) {
			envo_redirect(BASE_URL);
		} else {
			envo_redirect($_SERVER['HTTP_REFERER']);
		}

	} else {

		// Now calculate if more then 3 times don't even try.
		if (isset($_SESSION["logintries"])) {
			$_SESSION["logintries"] = $_SESSION["logintries"] + 1;
		} else {
			$_SESSION["logintries"] = 1;
		}
		if (isset($_SESSION["logintries"]) && $_SESSION["logintries"] > 3) {
			$_SESSION["infomsg"] = $tl["general_error"]["generror23"];
			envo_redirect(BASE_URL);
		}

		$_SESSION["warningmsg"] = $tl["general_error"]["generror24"];
		$errorlo                = $errors;

	}

}

// EN: Password Recovery
// CZ: Obnova hesla
if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['frmLostPwd'])) {
	// EN: Default Variable
	// CZ: Hlavní proměnné
	$defaults = $_POST;

	if (!filter_var($defaults['resetEmail'], FILTER_VALIDATE_EMAIL)) {
		$errors['e'] = $tl['general_error']['generror14'];
	}

	// Transform user email
	$femail = filter_var($defaults['resetEmail'], FILTER_SANITIZE_EMAIL);
	$fwhen  = time();

	// Check if this user exist
	$user_check = $envouserlogin -> envoForgotPassword($femail, $fwhen);

	if (!isset($errors['e']) && !$user_check) {
		$errors['e'] = $tl['general_error']['generror25'];
	}

	if (count($errors) == 0) {

		$body = sprintf($tl['login']['l18'], $user_check, '<a href="' . (ENVO_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . html_entity_decode(ENVO_rewrite ::envoParseurl('forgot-password', $fwhen, '', '', '')) . '">' . (ENVO_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . html_entity_decode(ENVO_rewrite ::envoParseurl('forgot-password', $fwhen, '', '', '')) . '</a>', $setting["title"]);

		$mail = new PHPMailer(); // defaults to using php "mail()"

		// SMTP settings
		if ($setting["smtp_or_mail"]) {

			$mail -> IsSMTP(); // telling the class to use SMTP
			$mail -> Host          = $setting["smtp_host"];
			$mail -> SMTPAuth      = ($setting["smtp_auth"] ? TRUE : FALSE); // enable SMTP authentication
			$mail -> SMTPSecure    = $setting["smtp_prefix"]; // sets the prefix to the server
			$mail -> SMTPKeepAlive = ($setting["smtp_alive"] ? TRUE : FALSE); // SMTP connection will not close after each email sent
			$mail -> Port          = $setting["smtp_port"]; // set the SMTP port for the GMAIL server
			$mail -> Username      = $setting["smtp_user"]; // SMTP account username
			$mail -> Password      = $setting["smtp_password"]; // SMTP account password

		}

		$mail -> SetFrom($setting["email"], $setting["title"]);
		$mail -> AddAddress($femail, $user_check);
		$mail -> Subject = $setting["title"] . ' - ' . $tl['login']['l17'];
		$mail -> MsgHTML($body);
		$mail -> AltBody = strip_tags($body);

		if ($mail -> Send()) {
			$_SESSION["infomsg"] = $tl["log_in"]["login11"];
			$_SESSION["infomsg"] = $tl["notification"]["n6"];
			envo_redirect($_SERVER['HTTP_REFERER']);
		}

	} else {
		$errorfp = $errors;
	}
}

// EN: Access to protected page
// CZ: Přístup do heslem chráněných stránek
if ($_SERVER["REQUEST_METHOD"] == 'POST' && isset($_POST['pageprotect'])) {
	// EN: Default Variable
	// CZ: Hlavní proměnné
	$defaults  = $_POST;
	$passcrypt = hash_hmac('sha256', $defaults['pagepass'], DB_PASS_HASH);

	if (!is_numeric($defaults['pagesec'])) {
		envo_redirect(BASE_URL);
	}

	// Get password crypted
	$passcrypt = hash_hmac('sha256', $defaults['pagepass'], DB_PASS_HASH);

	// Check if the password is correct
	$page_check = ENVO_base ::envoCheckProtectedArea($passcrypt, 'pages', $defaults['pagesec']);

	if (!$page_check) {
		$errors['e'] = $tl['general_error']['generror8'];
	}

	if (count($errors) == 0) {

		$_SESSION['pagesecurehash' . $defaults['pagesec']] = $passcrypt;
		envo_redirect($_SERVER['HTTP_REFERER']);

	} else {
		$errorpp = $errors;
	}
}

?>