<?php

// Reset some vars
$errorsA = $errorsC = array ();

// Check the register page and fire errors or emails
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['registerF'])) {
	// EN: Default Variable
	// CZ: Hlavní proměnné
	$defaults = $_POST;
	// Create Session, so contact form can only used once
	$_SESSION['rf_msg_sent'] = -1;

	// EN: Settings all the tables we need for our work
	// CZ: Nastavení všech tabulek, které potřebujeme pro práci
	$envotable = DB_PREFIX . 'user';

	// spam check
	$spamcheck = TRUE;

	if (!ENVO_USERID && $setting["hvm"] && isset($_SESSION['envo_captcha'])) {

		$human_captcha = explode(':#:', $_SESSION['envo_captcha']);

		if (isset($defaults[$human_captcha[0]]) && ($defaults[$human_captcha[0]] == '' || $defaults[$human_captcha[0]] != $human_captcha[1])) {
			$errorsA['human0'] = $tl['general_error']['generror26'] . '<br />';
		}

		if (isset($_POST["captcha"]) && $_POST["captcha"] == "" || $_SESSION['captchaCode'] != $_POST["captcha"]) {
			$errorsA['human1'] = $tl['general_error']['generror27'] . '<br />';
		}
	}

	// Decode the list for security reasons
	$declist     = base64_decode($defaults['optlist']);
	$declistname = $defaults['optlistname'];
	$declistmand = base64_decode($defaults['optlistmandatory']);
	$declisttype = base64_decode($defaults['optlisttype']);

	// Get the list of used optionsid
	$formarray = explode(',', $declist);
	// Get the names out the list
	$formnamearray = explode(',', $declistname);
	// Get the mandatory out the list
	$formmandarray = explode(',', $declistmand);
	// Get the types out the list
	$formtype = explode(',', $declisttype);

	// Now run thru the whole form options to get some errors or send the form after with phpmail
	for ($i = 0; $i < count($formarray); $i++) {

		// First we check username and email
		if ($formarray[$i] == 1) {

			if (isset($defaults[$formarray[$i]]) && empty($defaults[$formarray[$i]])) {
				$errors['e3'] = $tl['general_error']['generror28'] . '<br />';
			}

			if (isset($defaults[$formarray[$i]]) && !preg_match('/^([a-zA-Z0-9\-_])+$/', $defaults[$formarray[$i]])) {
				$errors['e3'] = $tl['general_error']['generror29'] . '<br />';
			}

			if (isset($defaults[$formarray[$i]]) && envo_field_not_exist(strtolower($defaults[$formarray[$i]]), $envotable, 'username')) {
				$errors['e3'] = $tl['general_error']['generror30'] . '<br />';
			}

			if (isset($defaults[$formarray[$i]]) && $setting["username_block"]) {
				$blockusrname = explode(',', $setting["username_block"]);
				if (in_array(strtolower($defaults[$formarray[$i]]), $blockusrname)) {
					$errors['e3'] = $tl['general_error']['generror31'] . '<br />';
				}

				// We do not have to type the exact word, it will pick the correct word in the string
				if (!isset($errors['e3']) && isset($blockusrname) && is_array($blockusrname)) foreach ($blockusrname as $q) {
					if (strpos(strtolower($defaults[$formarray[$i]]), $q) !== FALSE) {
						$errors['e3'] = $tl['general_error']['generror31'] . '<br />';
						break;
					}
				}
			}

			$username = $defaults[$formarray[$i]];

		}

		// Check email if it is double - error
		if ($formarray[$i] == 2) {

			// Check if email address is valid
			if (!filter_var($defaults[$formarray[$i]], FILTER_VALIDATE_EMAIL)) {
				$errors['e4'] = $tl['general_error']['generror32'] . '<br />';
			}

			// Check if email address has been blocked
			if ($setting["email_block"]) {
				$blockede = explode(',', $setting["email_block"]);
				if (in_array($defaults[$formarray[$i]], $blockede) || in_array(strrchr($defaults[$formarray[$i]], "@"), $blockede)) {
					$errors['e4'] = $tl['general_error']['generror33'] . '<br />';
				}
			}

			// Check if email address is double
			if (envo_field_not_exist(filter_var($defaults[$formarray[$i]], FILTER_SANITIZE_EMAIL), $envotable, 'email')) {
				$errors['e4'] = $tl['general_error']['generror34'] . '<br />';
			}

			$email = $defaults[$formarray[$i]];

		}

		// Check the password
		if ($formarray[$i] == 3) {

			if (strlen($defaults[$formarray[$i]]) <= '7') {
				$errors['e5'] = $tl['general_error']['generror35'] . '<br />';
			}

			$password = $defaults[$formarray[$i]];

		}

		// Now check the rest of the fields
		if ($formarray[$i] > 3) {
			if ($formmandarray[$i] == 1) {
				if ($formtype[$i] <= 3) {
					if ($defaults[$formarray[$i]] == '') {
						$errorsA[$i] = $tl['general_error']['generror36'] . ' (' . $formnamearray[$i] . ')<br />';
					}
				} elseif ($formtype[$i] == 4) {
					if ($defaults[$formnamearray[$i]] == '') {
						$errorsA[$i] = $tl['general_error']['generror36'] . ' (' . $formnamearray[$i] . ')<br />';
					}
				}
			} elseif ($formmandarray[$i] == 2) {
				if (!is_numeric($defaults[$formarray[$i]])) {
					$errorsA[$i] = $tl['general_error']['generror37'] . ' (' . $formnamearray[$i] . ')<br />';
				}
			} elseif ($formmandarray[$i] == 3) {
				if ($defaults[$formarray[$i]] == '' || !filter_var($defaults[$formarray[$i]], FILTER_VALIDATE_EMAIL)) {
					$errorsA[$i] = $tl['general_error']['generror32'] . ' (' . $formnamearray[$i] . ')<br />';
				}
			} elseif ($formmandarray[$i] == 5) {
				// Check if value does not exist
				if ($defaults[$formarray[$i]] == '' || envo_field_not_exist(filter_var($defaults[$formarray[$i]], FILTER_SANITIZE_EMAIL), $envotable, strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $formnamearray[$i])) . '_' . $formarray[$i])) {
					$errorsA[$i] = sprintf($tl['general_error']['generror38'], $formnamearray[$i]) . '<br />';
				}
			}
		}

		if (count($errorsA) == 0) {

			if ($formarray[$i] > 3) {

				if ($formmandarray[$i] == 3) {
					$listEmail = $defaults[$formarray[$i]];
				}

				$insert = '';
				if ($formtype[$i] <= 3) {
					$insert .= strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $formnamearray[$i])) . '_' . $formarray[$i] . ' = "' . $defaults[$formarray[$i]] . '",';
				} else {
					$insert .= strtolower(preg_replace("/[^a-zA-Z0-9]+/", "", $formnamearray[$i])) . '_' . $formarray[$i] . ' = "' . $defaults[$formnamearray[$i]] . '",';
				}

			}

		}
	}

	if ($setting["rf_simple"] && $spamcheck) {

		if (empty($defaults['username'])) {
			$errors['e3'] = $tl['general_error']['generror28'] . '<br />';
		}

		if (!preg_match('/^([a-zA-Z0-9\-_])+$/', $defaults['username'])) {
			$errors['e3'] = $tl['general_error']['generror29'] . '<br />';
		}

		if (envo_field_not_exist(strtolower($defaults['username']), $envotable, 'username')) {
			$errors['e3'] = $tl['general_error']['generror30'] . '<br />';
		}

		$username = $defaults['username'];

		if (!filter_var($defaults['email'], FILTER_VALIDATE_EMAIL)) {
			$errors['e4'] = $tl['general_error']['generror32'] . '<br />';
		}

		// Check if email address has been blocked
		if ($setting["email_block"]) {
			$blockede = explode(',', $setting["email_block"]);
			if (in_array($defaults['email'], $blockede) || in_array(strrchr($defaults['email'], "@"), $blockede)) {
				$errors['e4'] = $tl['general_error']['generror33'] . '<br />';
			}
		}

		if (envo_field_not_exist(filter_var($defaults['email'], FILTER_SANITIZE_EMAIL), $envotable, 'email')) {
			$errors['e4'] = $tl['general_error']['generror34'] . '<br />';
		}

		$email = $defaults['email'];

	}

	if (count($errorsA) > 0 || count($errors) > 0) {
		$errorsA = $errorsA;
		$errorsC = $errors;
	} else {

		if (!isset($_SESSION['rf_thankyou_msg'])) {

			if ($setting["rf_simple"]) $password = envo_password_creator();

			// The new password encrypt with hash_hmac
			$passcrypt     = hash_hmac('sha256', $password, DB_PASS_HASH);
			$sqlupdatepass = 'password = "' . $passcrypt . '",';

			$safeusername = filter_var($username, FILTER_SANITIZE_STRING);
			$safeemail    = filter_var($email, FILTER_SANITIZE_EMAIL);

			if ($setting["rf_confirm"] > 1) {
				$getuniquecode = time();
				$insert        .= 'activatenr = "' . $getuniquecode . '",';
			}

			/* EN: Convert value
			 * smartsql - secure method to insert form data into a MySQL DB
			 * ------------------
			 * CZ: Převod hodnot
			 * smartsql - secure method to insert form data into a MySQL DB
			*/
			$result = $envodb -> query('INSERT INTO ' . $envotable . ' SET
                username = "' . smartsql($safeusername) . '",
                name = "' . smartsql($safeusername) . '",
                email = "' . smartsql($safeemail) . '",
                usergroupid = "' . smartsql($setting["rf_usergroup"]) . '",
                ' . $sqlupdatepass . '
                ' . $insert . '
                access = "' . smartsql($setting["rf_confirm"]) . '",
                time = NOW()');

			$row['id'] = $envodb -> envo_last_id();

			if (!$result) {
				envo_redirect(ENVO_PARSE_ERROR);
			} else {

				$newuserpath = ENVO_FILES_DIRECTORY . '/userfiles' . '/' . $row['id'];

				if (!is_dir($newuserpath)) {
					@mkdir($newuserpath, 0777);
					@copy(ENVO_FILES_DIRECTORY . '/userfiles' . "/index.html", $newuserpath . "/index.html");
				}

				if ($setting["rf_confirm"] == 2 || $setting["rf_confirm"] == 3) {

					$confirmlink = '<br><strong>' . $tl['login']['l11'] . ':</strong> <a href="' . (ENVO_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . ENVO_rewrite ::envoParseurl('rf_ual', $row['id'], $getuniquecode, $safeusername, '') . '">' . (ENVO_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . ENVO_rewrite ::envoParseurl('rf_ual', $row['id'], $getuniquecode, $safeusername, '') . '</a>';

					if ($setting["rf_simple"]) $confirmlink .= '<br /><strong>' . $tl['login']['l2'] . ':</strong> ' . $password;

					$mail        = new PHPMailer(); // defaults to using php "mail()"
					$linkmessage = $setting["rf_welcome"] . '<br>' . $confirmlink;
					$body        = str_ireplace("[\]", '', $linkmessage);

					// We go for SMTP
					if ($setting["smtp_or_mail"]) {

						$mail -> IsSMTP(); // telling the class to use SMTP
						$mail -> Host          = $setting["smtp_host"];
						$mail -> SMTPAuth      = ($setting["smtp_auth"] ? TRUE : FALSE); // enable SMTP authentication
						$mail -> SMTPSecure    = $setting["smtp_prefix"]; // sets the prefix to the server
						$mail -> SMTPKeepAlive = ($setting["smtp_alive"] ? TRUE : FALSE); // SMTP connection will not close after each email sent
						$mail -> Port          = $setting["smtp_port"]; // set the SMTP port for the GMAIL server
						$mail -> Username      = $setting["smtp_user"]; // SMTP account username
						$mail -> Password      = $setting["smtp_password"]; // SMTP account password
						$mail -> SetFrom($setting["email"]);

					} else {
						$mail -> SetFrom($setting["email"], $setting["title"]);
					}
					$mail -> AddAddress($safeemail, $safeusername);
					$mail -> Subject = $setting["title"] . ' - ' . $tl['login']['l11'];
					$mail -> MsgHTML($body);
					$mail -> Send(); // Send email without any warnings


					if ($setting["rf_confirm"] == 3) {

						$admail        = new PHPMailer();
						$adlinkmessage = $tl['login']['l11'] . $safeusername;
						$adbody        = str_ireplace("[\]", '', $adlinkmessage);

						// We go for SMTP
						if ($setting["smtp_or_mail"]) {

							$admail -> IsSMTP(); // telling the class to use SMTP
							$admail -> Host          = $setting["smtp_host"];
							$admail -> SMTPAuth      = ($setting["smtp_auth"] ? TRUE : FALSE); // enable SMTP authentication
							$admail -> SMTPSecure    = $setting["smtp_prefix"]; // sets the prefix to the server
							$admail -> SMTPKeepAlive = ($setting["smtp_alive"] ? TRUE : FALSE); // SMTP connection will not close after each email sent
							$admail -> Port          = $setting["smtp_port"]; // set the SMTP port for the GMAIL server
							$admail -> Username      = $setting["smtp_user"]; // SMTP account username
							$admail -> Password      = $setting["smtp_password"]; // SMTP account password
							$admail -> SetFrom($setting["email"]);

						} else {
							$admail -> SetFrom($setting["email"], $setting["title"]);
						}

						$admail -> AddAddress($setting["email"], $setting["title"]);
						$admail -> Subject = $setting["title"] . ' - ' . $tl['login']['l11'];
						$admail -> MsgHTML($adbody);
						$admail -> Send(); // Send email without any warnings

					}

				} else {

					if ($setting["rf_simple"]) $confirmlink .= '<br /><strong>' . $tl['login']['l2'] . ':</strong> ' . $password;

					$mail = new PHPMailer(); // defaults to using php "mail()"
					$body = str_ireplace("[\]", '', $setting["rf_welcome_email"] . $confirmlink);

					// We go for SMTP
					if ($setting["smtp_or_mail"]) {

						$mail -> IsSMTP(); // telling the class to use SMTP
						$mail -> Host          = $setting["smtp_host"];
						$mail -> SMTPAuth      = ($setting["smtp_auth"] ? TRUE : FALSE); // enable SMTP authentication
						$mail -> SMTPSecure    = $setting["smtp_prefix"]; // sets the prefix to the server
						$mail -> SMTPKeepAlive = ($setting["smtp_alive"] ? TRUE : FALSE); // SMTP connection will not close after each email sent
						$mail -> Port          = $setting["smtp_port"]; // set the SMTP port for the GMAIL server
						$mail -> Username      = $setting["smtp_user"]; // SMTP account username
						$mail -> Password      = $setting["smtp_password"]; // SMTP account password
						$mail -> SetFrom($setting["email"]);

					} else {
						$mail -> SetFrom($setting["email"], $setting["title"]);
					}
					$mail -> AddAddress($safeemail, $safeusername);
					$mail -> Subject = $setting["title"] . ' - ' . $tl['login']['l11'];
					$mail -> MsgHTML($body);
					$mail -> Send(); // Send email without any warnings

				}

				$_SESSION['rf_msg_sent'] = 1;
				envo_redirect($_SERVER['HTTP_REFERER']);
			}

		}
	}
}

?>