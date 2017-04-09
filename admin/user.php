<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$JAK_MODULES) jak_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$jaktable = DB_PREFIX . 'user';
$jakfield = 'username';

$JAK_SEARCH = $JAK_LIST_USER = $SEARCH_WORD = $updatepass = $insert = FALSE;

// Get the hooks
$JAK_HOOK_ADMIN_USER      = $jakhooks->jakGethook("tpl_admin_user");
$JAK_HOOK_ADMIN_USER_EDIT = $jakhooks->jakGethook("tpl_admin_user_edit");

// Now start with the plugin use a switch to access all pages
switch ($page1) {

  // Create new user
  case 'newuser':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $defaults = $_POST;

      if ($defaults['jak_email'] == '' || !filter_var($defaults['jak_email'], FILTER_VALIDATE_EMAIL)) {
        $errors['e2'] = $tl['general_error']['generror7'] . '<br>';
      }

      if (!preg_match('/^([a-zA-Z0-9\-_])+$/', $defaults['jak_username'])) {
        $errors['e1'] = $tl['general_error']['generror12'] . '<br>';
      }

      if (jak_field_not_exist(strtolower($defaults['jak_username']), $jaktable, $jakfield)) {
        $errors['e1'] = $tl['general_error']['generror13'] . '<br>';
      }

      if ($defaults['jak_password'] != $defaults['jak_confirm_password']) {
        $errors['e3'] = $tl['general_error']['generror14'] . '<br>';
      } elseif (strlen($defaults['jak_password']) <= '5') {
        $errors['e3'] = $tl['general_error']['generror15'] . '<br>';
      } else {
        $updatepass = 1;
      }

      // Get the php hook for display stuff in user - pass it with $insert .= to the query
      $hookuser = $jakhooks->jakGethook("php_admin_user");
      if ($hookuser) foreach ($hookuser as $husr) {
        eval($husr['phpcode']);
      }

      if (count($errors) == 0) {

        if ($updatepass) {
          $insert .= 'password = "' . hash_hmac('sha256', $defaults['jak_password'], DB_PASS_HASH) . '",';
        }

        $result = $jakdb->query('INSERT INTO ' . $jaktable . ' SET
			username = "' . smartsql($defaults['jak_username']) . '",
			name = "' . smartsql($defaults['jak_name']) . '",
			email = "' . smartsql($defaults['jak_email']) . '",
			usergroupid= "' . smartsql($defaults['jak_usergroup']) . '",
			access = "' . smartsql($defaults['jak_access']) . '",
			' . $insert . '
			time = NOW()');

        $rowid = $jakdb->jak_last_id();

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=user&sp=newuser&ssp=e');
        } else {

          $newuserpath = '../' . JAK_FILES_DIRECTORY . '/userfiles/' . $rowid;

          if (!is_dir($newuserpath)) {
            mkdir($newuserpath, 0777);
            copy("../" . JAK_FILES_DIRECTORY . "/index.html", $newuserpath . "/index.html");
          }
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=user&sp=edit&ssp=' . $rowid . '&sssp=s');
        }
      } else {

        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // Get the usergroups
    $JAK_USERGROUP_ALL = jak_get_usergroup_all('usergroup');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["user_sec_title"]["usert1"];
    $SECTION_DESC  = $tl["user_sec_desc"]["userd1"];

    // EN: Load the template
    // CZ: Načti template (šablonu)
    $template = 'newuser.php';

    break;
  default:

    switch ($page1) {
      case 'search':

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
          $defaults = $_POST;

          if (isset($defaults['search'])) {

            if ($defaults['jakSH'] == '') {
              $errors['e'] = $tl['search']['s1'] . '<br>';
            }

            if (strlen($defaults['jakSH']) < '1') {
              $errors['e1'] = $tl['search']['s2'] . '<br>';
            }

            if (count($errors) > 0) {

              $errors['e2'] = $tl['search']['s3'] . '<br>';
              $errors       = $errors;

            } else {
              $secureIn    = smartsql(strip_tags($defaults['jakSH']));
              $SEARCH_WORD = $secureIn;
              $JAK_SEARCH  = jak_admin_search($secureIn, $jaktable, 'user');
            }
          }

        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jak_delete_user'])) {
          $defaults = $_POST;

          if (isset($defaults['move'])) {

            $jakmove = $defaults['jak_delete_user'];
            $jakgrid = $defaults['jak_group'];

            for ($i = 0; $i < count($jakmove); $i++) {
              $move   = $jakmove[$i];
              $result = $jakdb->query('UPDATE ' . $jaktable . ' SET usergroupid = ' . $jakgrid . ' WHERE id = "' . smartsql($move) . '"');
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=s');
            }

          }

          if (isset($defaults['lock'])) {

            $lockuser    = $defaults['jak_delete_user'];
            $useridarray = explode(',', JAK_SUPERADMIN);

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              if (!in_array($locked, $useridarray)) {
                $result = $jakdb->query('UPDATE ' . $jaktable . ' SET access = IF (access = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');
              }
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=s');
            }

          }

          if (isset($defaults['password'])) {

            $lockuser    = $defaults['jak_delete_user'];
            $useridarray = explode(',', JAK_SUPERADMIN);

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              // Reset password and row each time
              $password = '';
              $row      = '';

              if (!in_array($locked, $useridarray)) {

                // Generate random password
                $password = jak_password_creator();

                $result = $jakdb->query('SELECT id, username, email FROM ' . $jaktable . ' WHERE id = ' . smartsql($locked));
                $row    = $result->fetch_assoc();

                // Send email to member with new password
                $mail = new PHPMailer(); // defaults to using php "mail()"
                $body = str_ireplace("[\]", "", $tl["email_text_message"]["emailm4"] . $password);
                $mail->SetFrom($jkv["email"], $jkv["title"]);
                $mail->AddAddress($row['email'], $row['username']);
                $mail->Subject = $jkv["title"] . ' - ' . $tl['email_text_message']['emailm5'];
                $mail->MsgHTML($body);
                $mail->Send();

                // Update database
                $jakdb->query('UPDATE ' . $jaktable . ' SET password = "' . hash_hmac('sha256', $password, DB_PASS_HASH) . '" WHERE id = ' . $row["id"]);
              }
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=s');
            }

          }

          if (isset($defaults['delete'])) {

            $lockuser    = $defaults['jak_delete_user'];
            $useridarray = explode(',', JAK_SUPERADMIN);

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              if (!in_array($locked, $useridarray)) {


                $jakdb->query('DELETE FROM ' . $jaktable . ' WHERE id = ' . $locked . '');

                // Delete Avatar if yes
                if (!empty($defaults['jak_delete_avatar'])) {
                  $targetPath   = '../' . JAK_FILES_DIRECTORY . '/' . $locked . '/';
                  $removedouble = str_replace("//", "/", $targetPath);
                  foreach (glob($removedouble . '*.*') as $jak_unlink) {
                    @unlink($jak_unlink);
                  }

                  @unlink($targetPath);

                }

                // Load the hooks with the php code for search
                $hookusrmassdel = $jakhooks->jakGethook("php_admin_user_delete_mass");
                if ($hookusrmassdel)
                  foreach ($hookusrmassdel as $humd) {
                    eval($humd['phpcode']);
                  }

              }

              $result = 1;
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=s');
            }

          }

        }

        // Get all usergroup's
        $JAK_USERGROUP_ALL = jak_get_usergroup_all('usergroup');

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["user_sec_title"]["usert2"];
        $SECTION_DESC  = $tl["user_sec_desc"]["userd2"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $template = 'searchuser.php';

        break;
      case 'sort':

        // getNumber
        $getTotal = jak_get_total($jaktable, '', '', '');

        // Now if total run paginator
        if ($getTotal != 0) {
          // Paginator
          $pages                 = new JAK_Paginator;
          $pages->items_total    = $getTotal;
          $pages->mid_range      = $jkv["adminpagemid"];
          $pages->items_per_page = $jkv["adminpageitem"];
          $pages->jak_get_page   = $page4;
          $pages->jak_where      = 'index.php?p=user&sp=sort&ssp=' . $page2 . '&sssp=' . $page3;
          $pages->paginate();
          $JAK_PAGINATE = $pages->display_pages();
        }

        $result = $jakdb->query('SELECT id, usergroupid, username, email, name, access FROM ' . $jaktable . ' ORDER BY ' . $page2 . ' ' . $page3 . ' ' . $pages->limit);
        while ($row = $result->fetch_assoc()) {
          $user[] = array('id' => $row['id'], 'usergroupid' => $row['usergroupid'], 'username' => $row['username'], 'email' => $row['email'], 'name' => $row['name'], 'access' => $row['access']);
        }

        $JAK_USER_ALL      = $user;
        $JAK_USERGROUP_ALL = jak_get_usergroup_all('usergroup');

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["user_sec_title"]["usert3"];
        $SECTION_DESC  = $tl["user_sec_desc"]["userd3"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $template = 'user.php';

        break;
      case 'lock':

        if (jak_user_exist_deletable($page2)) {

          $result = $jakdb->query('UPDATE ' . $jaktable . ' SET access = IF (access = 1, 0, 1) WHERE id = ' . smartsql($page2));

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=user&sp=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=user&sp=s');
          }
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=user&sp=edp');
        }

        break;
      case 'verify':

        $result = $jakdb->query('SELECT id, username, email, activatenr, access FROM ' . DB_PREFIX . 'user WHERE id = ' . smartsql($page2));
        $row    = $result->fetch_assoc();

        if ($row['access'] == 3) {

          $confirmlink = '<a href="' . (JAK_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . JAK_rewrite::jakParseurl('rf_ual', $row['id'], $row['activatenr'], $row['username'], '') . '">' . (JAK_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . JAK_rewrite::jakParseurl('rf_ual', $row['id'], $row['activatenr'], $row['username'], '') . '</a>';

          // Send email to member with verification code
          $mail = new PHPMailer(); // defaults to using php "mail()"
          $body = str_ireplace("[\]", "", str_replace("%s", $confirmlink, $tl["email_text_message"]["emailm7"]));
          $mail->SetFrom($jkv["email"]);
          $mail->AddAddress($row['email'], $row['username']);
          $mail->Subject = $jkv["title"] . ' - ' . $tl["email_text_message"]["emailm6"];
          $mail->MsgHTML($body);

          if ($mail->Send()) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=user&sp=s');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=user&sp=e');
          }

        } else {

          $result1 = $jakdb->query('UPDATE ' . DB_PREFIX . 'user SET access = 1 WHERE id = ' . smartsql($page2));

          if (!$result1) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=user&sp=e');
          } else {

            // Send info that the account has been verified
            $mail = new PHPMailer(); // defaults to using php "mail()"
            $body = str_ireplace("[\]", "", str_replace("%s", $row['username'], $tl["email_text_message"]["emailm9"]));
            $mail->SetFrom($jkv["email"]);
            $mail->AddAddress($row['email'], $row['username']);
            $mail->Subject = $jkv["title"] . ' - ' . $tl["email_text_message"]["emailm8"];
            $mail->MsgHTML($body);
            $mail->Send();

            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=user&sp=s');
          }

        }

        break;
      case 'password':

        if (jak_user_exist_deletable($page2)) {

          // Generate random password
          $password = jak_password_creator();

          $result = $jakdb->query('SELECT id, username, email FROM ' . $jaktable . ' WHERE id = ' . smartsql($page2));
          $row    = $result->fetch_assoc();

          // Send email to member with new password
          $mail = new PHPMailer(); // defaults to using php "mail()"
          $body = str_ireplace("[\]", "", $tl["email_text_message"]["emailm4"] . $password);
          $mail->SetFrom($jkv["email"]);
          $mail->AddAddress($row['email'], $row['username']);
          $mail->Subject = $jkv["title"] . ' - ' . $tl['email_text_message']['emailm5'];
          $mail->MsgHTML($body);

          if ($mail->Send()) {

            // Update database
            $result = $jakdb->query('UPDATE ' . $jaktable . ' SET password = "' . hash_hmac('sha256', $password, DB_PASS_HASH) . '" WHERE id = ' . $row["id"]);

            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=user&sp=s');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            jak_redirect(BASE_URL . 'index.php?p=user&sp=e');
          }
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=user&sp=edp');
        }

        break;
      case 'delete':

        // Check if user exists and can be deleted
        if (jak_user_exist_deletable($page2)) {

          // Now check how many languages are installed and do the dirty work
          $result = $jakdb->query('DELETE FROM ' . $jaktable . ' WHERE id = ' . smartsql($page2));

          // Delete Avatar
          $targetPath   = '../' . JAK_FILES_DIRECTORY . '/' . $page2 . '/';
          $removedouble = str_replace("//", "/", $targetPath);
          foreach (glob($removedouble . '*.*') as $jak_unlink) {
            @unlink($jak_unlink);
          }

          @unlink($targetPath);

          // Load the hooks with the php code for single delete
          $hookusrdel = $jakhooks->jakGethook("php_admin_user_delete");
          if ($hookusrdel) foreach ($hookusrdel as $hud) {
            eval($hud['phpcode']);
          }

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            jak_redirect(BASE_URL . 'index.php?p=user&sp=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'sp=s'   - Záznam úspěšně uložen
            'ssp=s'  - Záznam úspěšně odstraněn
            */
            jak_redirect(BASE_URL . 'index.php?p=user&sp=s&ssp=s');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=user&sp=edp');
        }

        break;
      case 'edit':

        // Check if the user exists
        if (is_numeric($page2) && jak_row_exist($page2, $jaktable)) {

          // Now get the fields not orignal in user

          //First an array with existing fields
          $existf = array('id', 'usergroupid', 'username', 'password', 'idhash', 'session', 'email', 'name', 'ulang', 'picture', 'time', 'lastactivity', 'backtogroup', 'backtime', 'logins', 'access', 'activatenr', 'forgot', 'phone', 'description');

          $queryfields = $jakdb->query('DESCRIBE ' . $jaktable);
          while ($rowf = $queryfields->fetch_assoc()) {
            $schema[] = $rowf['Field'];
          }

          // Do something if POST
          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $defaults = $_POST;

            if ($defaults['jak_email'] == '' || !filter_var($defaults['jak_email'], FILTER_VALIDATE_EMAIL)) {
              $errors['e2'] = $tl['general_error']['generror7'] . '<br>';
            }

            if (!preg_match('/^([a-zA-Z0-9\-_])+$/', $defaults['jak_username'])) {
              $errors['e1'] = $tl['general_error']['generror12'] . '<br>';
            }

            if (jak_field_not_exist_id($defaults['jak_username'], $page2, $jaktable, $jakfield)) {
              $errors['e1'] = $tl['general_error']['generror13'] . '<br>';
            }

            if (!empty($defaults['jak_password']) || !empty($defaults['jak_confirm_password'])) {
              if ($defaults['jak_password'] != $defaults['jak_confirm_password']) {
                $errors['e3'] = $tl['general_error']['generror14'] . '<br>';
              } elseif (strlen($defaults['jak_password']) <= '5') {
                $errors['e3'] = $tl['general_error']['generror15'] . '<br>';
              } else {
                $updatepass = 1;
              }
            }

            if (!empty($defaults['jak_phone'])) {
              if (!preg_match('/^([0-9\-_])+$/', $defaults['jak_phone'])) {
                $errors['e5'] = $tl['general_error']['generror17'] . '<br>';
              }
            }

            // Get the php hook for display stuff in user - pass it with $insert .= to the query
            $hookuser = $jakhooks->jakGethook("php_admin_user_edit");
            if ($hookuser) foreach ($hookusere as $husre) {
              eval($husre['phpcode']);
            }

            // Delete Avatar if yes
            if (!empty($defaults['jak_delete_avatar'])) {
              $avatarpi     = '../' . JAK_FILES_DIRECTORY . '/index.html';
              $avatarpid    = str_replace("//", "/", $avatarpi);
              $targetPath   = '../' . JAK_FILES_DIRECTORY . '/userfiles/' . $page2 . '/';
              $removedouble = str_replace("//", "/", $targetPath);
              foreach (glob($removedouble . '*.*') as $jak_unlink) {
                unlink($jak_unlink);
                copy($avatarpid, $targetPath . "/index.html");
              }

              $jakdb->query('UPDATE ' . $jaktable . ' SET picture = "/standard.png" WHERE id = ' . smartsql($page2) . '');

            }

            if (!empty($_FILES['uploadpp']['name'])) {

              if ($_FILES['uploadpp']['name'] != '') {

                $filename     = $_FILES['uploadpp']['name']; // original filename
                $tmpf         = explode(".", $filename);
                $jak_xtension = end($tmpf);

                if ($jak_xtension == "jpg" || $jak_xtension == "jpeg" || $jak_xtension == "png" || $jak_xtension == "gif") {

                  if ($_FILES['uploadpp']['size'] <= 500000) {

                    list($width, $height, $type, $attr) = getimagesize($_FILES['uploadpp']['tmp_name']);
                    $mime = image_type_to_mime_type($type);

                    if (($mime == "image/jpeg") || ($mime == "image/pjpeg") || ($mime == "image/png") || ($mime == "image/gif")) {

                      // first get the target path
                      $targetPathd = '../' . JAK_FILES_DIRECTORY . '/userfiles/' . $page2 . '/';
                      $targetPath  = str_replace("//", "/", $targetPathd);
                      // Create the target path
                      if (!is_dir($targetPath)) {

                        mkdir($targetPath, 0777);
                        copy('../' . JAK_FILES_DIRECTORY . "/index.html", $targetPath . "/index.html");

                      }
                      // if old avatars exist delete it
                      foreach (glob($targetPath . '*.*') as $jak_unlink) {
                        unlink($jak_unlink);
                        copy("../" . JAK_FILES_DIRECTORY . "/index.html", $targetPath . "/index.html");
                      }

                      $tempFile    = $_FILES['uploadpp']['tmp_name'];
                      $origName    = substr($_FILES['uploadpp']['name'], 0, -4);
                      $name_space  = strtolower($_FILES['uploadpp']['name']);
                      $middle_name = str_replace(" ", "_", $name_space);
                      $middle_name = str_replace(".jpeg", ".jpg", $name_space);
                      $glnrrand    = rand(10, 99);
                      $bigPhoto    = str_replace(".", "_" . $glnrrand . ".", $middle_name);
                      $smallPhoto  = str_replace(".", "_t.", $bigPhoto);

                      $targetFile = str_replace('//', '/', $targetPath) . $bigPhoto;
                      $origPath   = '/' . $page2 . '/';
                      $dbSmall    = $origPath . $smallPhoto;
                      $dbBig      = $origPath . $bigPhoto;

                      require_once '../include/functions_thumb.php';
                      // Move file and create thumb
                      move_uploaded_file($tempFile, $targetFile);

                      create_thumbnail($targetPath, $targetFile, $smallPhoto, $jkv["useravatwidth"], $jkv["useravatheight"], 80);

                      // SQL insert
                      $jakdb->query('UPDATE ' . $jaktable . ' SET picture = "' . smartsql($dbSmall) . '" WHERE id = "' . smartsql($page2) . '" LIMIT 1');

                    } else {
                      $errors['e4'] = $tl['search']['s7'] . '<br />';
                      $errors       = $errors;
                    }

                  } else {
                    $errors['e4'] = $tl['search']['s7'] . '<br />';
                    $errors       = $errors;
                  }

                } else {
                  $errors['e4'] = $tl['search']['s7'] . '<br />';
                  $errors       = $errors;
                }

              } else {
                $errors['e4'] = $tl['search']['s7'] . '<br />';
                $errors       = $errors;
              }


            }

            if (count($errors) == 0) {

              if (!isset($defaults['jak_access'])) $defaults['jak_access'] = '1';

              if ($updatepass) $insert .= 'password = "' . hash_hmac('sha256', $defaults['jak_password'], DB_PASS_HASH) . '",';

              // We cant deny access for superadmin
              $useridarray = explode(',', JAK_SUPERADMIN);

              if (!in_array($page2, $useridarray)) {

                $insert .= 'access = "' . smartsql($defaults['jak_access']) . '",';
              }

              // Insert the extra vield value
              foreach ($schema as $f) {

                if (!in_array($f, $existf)) {

                  $insert .= $f . ' = "' . $defaults[$f] . '",';
                }

              }

              // Update the user-group move back time
              if (!in_array($page2, $useridarray) && !empty($defaults['jak_usergroupback']) && (time() <= strtotime($defaults['jak_backtime']))) {
                $insert .= 'backtogroup = "' . smartsql($defaults['jak_usergroupback']) . '", backtime = "' . smartsql($defaults['jak_backtime']) . '",';
              } else {
                $insert .= 'backtogroup = 0, backtime = "0000-00-00",';
              }

              $result = $jakdb->query('UPDATE ' . $jaktable . ' SET
			username = "' . smartsql($defaults['jak_username']) . '",
			name = "' . smartsql($defaults['jak_name']) . '",
			email = "' . filter_var($defaults['jak_email'], FILTER_SANITIZE_EMAIL) . '",
			' . $insert . '
			usergroupid = "' . smartsql($defaults['jak_usergroup']) . '",
			activatenr = 0,
			phone = "' . smartsql($defaults['jak_phone']) . '",
			description = "' . smartsql($defaults['jak_description']) . '"
			WHERE id = ' . smartsql($page2));

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                jak_redirect(BASE_URL . 'index.php?p=user&sp=edit&ssp=' . $page2 . '&sssp=e');
              } else {
                // Now do all the dirty work if we changed the username, also check if we have more then one language installed
                if ($defaults['jak_username'] != $defaults['jak_username_old']) {

                  // Load the hooks with the php code for search
                  $hookusrrename = $jakhooks->jakGethook("php_admin_user_rename");
                  if ($hookusrrename)
                    foreach ($hookusrrename as $hur) {
                      eval($hur['phpcode']);
                    }

                }

                // EN: Redirect page
                // CZ: Přesměrování stránky
                jak_redirect(BASE_URL . 'index.php?p=user&sp=edit&ssp=' . $page2 . '&sssp=s');
              }

              // Output the errors
            } else {

              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          $JAK_FORM_DATA = jak_get_data($page2, $jaktable);
          // Get the usergroups
          $JAK_USERGROUP_ALL = jak_get_usergroup_all('usergroup');

          $extrafields = "";
          foreach ($schema as $f) {

            if (!in_array($f, $existf)) {

              $extrafields .= '<div class="row-form"><div class="col-md-5"><strong>' . ucfirst($f) . '</strong></div>
						<div class="col-md-7"><input type="text" class="form-control" name="' . $f . '" value="' . $JAK_FORM_DATA[$f] . '" /></div></div>';

            }

          }

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tl["user_sec_title"]["usert4"];
          $SECTION_DESC  = $tl["user_sec_desc"]["userd4"];

          // EN: Load the template
          // CZ: Načti template (šablonu)
          $template = 'edituser.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          jak_redirect(BASE_URL . 'index.php?p=user&sp=ene');
        }

        break;
      default:

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jak_delete_user'])) {
          $defaults = $_POST;

          if (isset($defaults['move'])) {

            $jakmove = $defaults['jak_delete_user'];
            $jakgrid = $defaults['jak_group'];

            for ($i = 0; $i < count($jakmove); $i++) {
              $move   = $jakmove[$i];
              $result = $jakdb->query('UPDATE ' . $jaktable . ' SET usergroupid = ' . $jakgrid . ' WHERE id = "' . smartsql($move) . '"');
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=s');
            }

          }

          if (isset($defaults['lock'])) {

            $lockuser    = $defaults['jak_delete_user'];
            $useridarray = explode(',', JAK_SUPERADMIN);

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              if (!in_array($locked, $useridarray)) {
                $result = $jakdb->query('UPDATE ' . $jaktable . ' SET access = IF (access = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');
              }
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=s');
            }

          }

          if (isset($defaults['password'])) {

            $lockuser    = $defaults['jak_delete_user'];
            $useridarray = explode(',', JAK_SUPERADMIN);

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              // Reset password and row each time
              $password = '';
              $row      = '';

              if (!in_array($locked, $useridarray)) {

                // Generate random password
                $password = jak_password_creator();

                $result = $jakdb->query('SELECT id, username, email FROM ' . $jaktable . ' WHERE id = ' . smartsql($locked));
                $row    = $result->fetch_assoc();

                // Send email to member with new password
                $mail = new PHPMailer(); // defaults to using php "mail()"
                $body = str_ireplace("[\]", "", $tl["email_text_message"]["emailm4"] . $password);
                $mail->SetFrom($jkv["email"], $jkv["title"]);
                $mail->AddAddress($row['email'], $row['username']);
                $mail->Subject = $jkv["title"] . ' - ' . $tl['email_text_message']['emailm5'];
                $mail->MsgHTML($body);
                $mail->Send();

                // Update database
                $jakdb->query('UPDATE ' . $jaktable . ' SET password = "' . hash_hmac('sha256', $password, DB_PASS_HASH) . '" WHERE id = ' . $row["id"]);
              }
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              jak_redirect(BASE_URL . 'index.php?p=user&sp=s');
            }

          }

          if (isset($defaults['delete'])) {

            $lockuser    = $defaults['jak_delete_user'];
            $useridarray = explode(',', JAK_SUPERADMIN);

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              if (!in_array($locked, $useridarray)) {


                $jakdb->query('DELETE FROM ' . $jaktable . ' WHERE id = ' . $locked . '');

                // Delete Avatar
                $targetPath   = '../' . JAK_FILES_DIRECTORY . '/' . $locked . '/';
                $removedouble = str_replace("//", "/", $targetPath);
                foreach (glob($removedouble . '*.*') as $jak_unlink) {
                  @unlink($jak_unlink);
                }

                @unlink($targetPath);

                // Load the hooks with the php code for search
                $hookusrmassdel = $jakhooks->jakGethook("php_admin_user_delete_mass");
                if ($hookusrmassdel)
                  foreach ($hookusrmassdel as $humd) {
                    eval($humd['phpcode']);
                  }

              }

              $result = 1;
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - chybné
              jak_redirect(BASE_URL . 'index.php?p=user&sp=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky s notifikací - úspěšné
              /*
              NOTIFIKACE:
              'sp=s'   - Záznam úspěšně uložen
              'ssp=s'  - Záznam úspěšně odstraněn
              */
              jak_redirect(BASE_URL . 'index.php?p=user&sp=s&ssp=s');
            }

          }


        }

        // Important template stuff
        $getTotal = jak_get_total($jaktable, '', '', '');
        if ($getTotal != 0) {
          // Paginator
          $pages                 = new JAK_Paginator;
          $pages->items_total    = $getTotal;
          $pages->mid_range      = $jkv["adminpagemid"];
          $pages->items_per_page = $jkv["adminpageitem"];
          $pages->jak_get_page   = $page1;
          $pages->jak_where      = 'index.php?p=user';
          $pages->paginate();
          $JAK_PAGINATE = $pages->display_pages();
        }
        $JAK_USER_ALL      = jak_get_user_all('user', $pages->limit, '');
        $JAK_USERGROUP_ALL = jak_get_usergroup_all('usergroup');

        $resulta = $jakdb->query('SELECT id, usergroupid, username, email, access FROM ' . $jaktable . ' WHERE access >= 2');
        while ($rowa = $resulta->fetch_assoc()) {
          $JAK_USER_ALL_APPROVE[] = array('id' => $rowa['id'], 'usergroupid' => $rowa['usergroupid'], 'username' => $rowa['username'], 'email' => $rowa['email'], 'access' => $rowa['access']);
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["user_sec_title"]["usert"];
        $SECTION_DESC  = $tl["user_sec_desc"]["userd"];

        // EN: Load the template
        // CZ: Načti template (šablonu)
        $template = 'user.php';
    }
}
?>