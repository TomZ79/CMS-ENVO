<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$ENVO_MODULES) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable = DB_PREFIX . 'user';
$envofield = 'username';

$ENVO_SEARCH = $ENVO_LIST_USER = $SEARCH_WORD = $updatepass = $insert = FALSE;

// EN: Get all the php Hook by name of Hook
// CZ: Načtení všech php dat z Hook podle jména Hook
$ENVO_HOOK_ADMIN_USER      = $envohooks->EnvoGethook("tpl_admin_user");
$ENVO_HOOK_ADMIN_USER_EDIT = $envohooks->EnvoGethook("tpl_admin_user_edit");

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'newuser':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if ($defaults['envo_email'] == '' || !filter_var($defaults['envo_email'], FILTER_VALIDATE_EMAIL)) {
        $errors['e2'] = $tl['general_error']['generror7'] . '<br>';
      }

      if (!preg_match('/^([a-zA-Z0-9\-_])+$/', $defaults['envo_username'])) {
        $errors['e1'] = $tl['general_error']['generror12'] . '<br>';
      }

      if (envo_field_not_exist(strtolower($defaults['envo_username']), $envotable, $envofield)) {
        $errors['e1'] = $tl['general_error']['generror13'] . '<br>';
      }

      if ($defaults['envo_password'] != $defaults['envo_confirm_password']) {
        $errors['e3'] = $tl['general_error']['generror14'] . '<br>';
      } elseif (strlen($defaults['envo_password']) <= '5') {
        $errors['e3'] = $tl['general_error']['generror15'] . '<br>';
      } else {
        $updatepass = 1;
      }

      // EN: Get all the php Hook by name of Hook for display in user - pass it with $insert .= to the query
      // CZ: Načtení všech php dat z Hook podle jména Hook
      $hookuser = $envohooks->EnvoGethook("php_admin_user");
      if ($hookuser) foreach ($hookuser as $husr) {
        eval($husr['phpcode']);
      }

      if (count($errors) == 0) {

        if ($updatepass) {
          $insert .= 'password = "' . hash_hmac('sha256', $defaults['envo_password'], DB_PASS_HASH) . '",';
        }

        $result = $envodb->query('INSERT INTO ' . $envotable . ' SET
			username = "' . smartsql($defaults['envo_username']) . '",
			name = "' . smartsql($defaults['envo_name']) . '",
			email = "' . smartsql($defaults['envo_email']) . '",
			usergroupid= "' . smartsql($defaults['envo_usergroup']) . '",
			access = "' . smartsql($defaults['envo_access']) . '",
			' . $insert . '
			time = NOW()');

        $rowid = $envodb->envo_last_id();

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&sp=newuser&status=e');
        } else {

          $newuserpath = '../' . ENVO_FILES_DIRECTORY . '/userfiles/' . $rowid;

          if (!is_dir($newuserpath)) {
            mkdir($newuserpath, 0777);
            copy("../" . ENVO_FILES_DIRECTORY . "/index.html", $newuserpath . "/index.html");
          }
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&sp=edituser&id=' . $rowid . '&status=s');
        }
      } else {

        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // Get the usergroups
    $ENVO_USERGROUP_ALL = envo_get_usergroup_all('usergroup');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["user_sec_title"]["usert1"];
    $SECTION_DESC  = $tl["user_sec_desc"]["userd1"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'newuser.php';

    break;
  case 'edituser':

    // Check if the user exists
    if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

      // Now get the fields not orignal in user

      //First an array with existing fields
      $existf = array('id', 'usergroupid', 'username', 'password', 'idhash', 'session', 'email', 'name', 'ulang', 'picture', 'time', 'lastactivity', 'backtogroup', 'backtime', 'logins', 'access', 'activatenr', 'forgot', 'phone', 'description');

      $queryfields = $envodb->query('DESCRIBE ' . $envotable);
      while ($rowf = $queryfields->fetch_assoc()) {
        $schema[] = $rowf['Field'];
      }

      // Do something if POST
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // EN: Default Variable
        // CZ: Hlavní proměnné
        $defaults = $_POST;

        if ($defaults['envo_email'] == '' || !filter_var($defaults['envo_email'], FILTER_VALIDATE_EMAIL)) {
          $errors['e2'] = $tl['general_error']['generror7'] . '<br>';
        }

        if (!preg_match('/^([a-zA-Z0-9\-_])+$/', $defaults['envo_username'])) {
          $errors['e1'] = $tl['general_error']['generror12'] . '<br>';
        }

        if (envo_field_not_exist_id($defaults['envo_username'], $page2, $envotable, $envofield)) {
          $errors['e1'] = $tl['general_error']['generror13'] . '<br>';
        }

        if (!empty($defaults['envo_password']) || !empty($defaults['envo_confirm_password'])) {
          if ($defaults['envo_password'] != $defaults['envo_confirm_password']) {
            $errors['e3'] = $tl['general_error']['generror14'] . '<br>';
          } elseif (strlen($defaults['envo_password']) <= '5') {
            $errors['e3'] = $tl['general_error']['generror15'] . '<br>';
          } else {
            $updatepass = 1;
          }
        }

        if (!empty($defaults['envo_phone'])) {
          if (!preg_match('/^([0-9\-_])+$/', $defaults['envo_phone'])) {
            $errors['e5'] = $tl['general_error']['generror17'] . '<br>';
          }
        }

        // EN: Get all the php Hook by name of Hook for display in user - pass it with $insert .= to the query
        // CZ: Načtení všech php dat z Hook podle jména Hook
        $hookuser = $envohooks->EnvoGethook("php_admin_user_edit");
        if ($hookuser) foreach ($hookusere as $husre) {
          eval($husre['phpcode']);
        }

        // Delete Avatar if yes
        if (!empty($defaults['envo_delete_avatar'])) {
          $avatarpi     = '../' . ENVO_FILES_DIRECTORY . '/index.html';
          $avatarpid    = str_replace("//", "/", $avatarpi);
          $targetPath   = '../' . ENVO_FILES_DIRECTORY . '/userfiles/' . $page2 . '/';
          $removedouble = str_replace("//", "/", $targetPath);
          foreach (glob($removedouble . '*.*') as $envo_unlink) {
            unlink($envo_unlink);
            copy($avatarpid, $targetPath . "/index.html");
          }

          $envodb->query('UPDATE ' . $envotable . ' SET picture = "/standard.png" WHERE id = ' . smartsql($page2) . '');

        }

        if (!empty($_FILES['uploadpp']['name'])) {

          if ($_FILES['uploadpp']['name'] != '') {

            $filename     = $_FILES['uploadpp']['name']; // original filename
            $tmpf         = explode(".", $filename);
            $envo_xtension = end($tmpf);

            if ($envo_xtension == "jpg" || $envo_xtension == "jpeg" || $envo_xtension == "png" || $envo_xtension == "gif") {

              if ($_FILES['uploadpp']['size'] <= 500000) {

                list($width, $height, $type, $attr) = getimagesize($_FILES['uploadpp']['tmp_name']);
                $mime = image_type_to_mime_type($type);

                if (($mime == "image/jpeg") || ($mime == "image/pjpeg") || ($mime == "image/png") || ($mime == "image/gif")) {

                  // first get the target path
                  $targetPathd = '../' . ENVO_FILES_DIRECTORY . '/userfiles/' . $page2 . '/';
                  $targetPath  = str_replace("//", "/", $targetPathd);
                  // Create the target path
                  if (!is_dir($targetPath)) {

                    mkdir($targetPath, 0777);
                    copy('../' . ENVO_FILES_DIRECTORY . "/index.html", $targetPath . "/index.html");

                  }
                  // if old avatars exist delete it
                  foreach (glob($targetPath . '*.*') as $envo_unlink) {
                    unlink($envo_unlink);
                    copy("../" . ENVO_FILES_DIRECTORY . "/index.html", $targetPath . "/index.html");
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

                  create_thumbnail($targetPath, $targetFile, $smallPhoto, $setting["useravatwidth"], $setting["useravatheight"], 80);

                  // SQL insert
                  $envodb->query('UPDATE ' . $envotable . ' SET picture = "' . smartsql($dbSmall) . '" WHERE id = "' . smartsql($page2) . '" LIMIT 1');

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

          if (!isset($defaults['envo_access'])) $defaults['envo_access'] = '1';

          if ($updatepass) $insert .= 'password = "' . hash_hmac('sha256', $defaults['envo_password'], DB_PASS_HASH) . '",';

          // We cant deny access for superadmin
          $useridarray = explode(',', ENVO_SUPERADMIN);

          if (!in_array($page2, $useridarray)) {

            $insert .= 'access = "' . smartsql($defaults['envo_access']) . '",';
          }

          // Insert the extra vield value
          foreach ($schema as $f) {

            if (!in_array($f, $existf)) {

              $insert .= $f . ' = "' . $defaults[$f] . '",';
            }

          }

          // Update the user-group move back time
          if (!in_array($page2, $useridarray) && !empty($defaults['envo_usergroupback']) && (time() <= strtotime($defaults['envo_backtime']))) {
            $insert .= 'backtogroup = "' . smartsql($defaults['envo_usergroupback']) . '", backtime = "' . smartsql($defaults['envo_backtime']) . '",';
          } else {
            $insert .= 'backtogroup = 0, backtime = "0000-00-00",';
          }

          /* EN: Convert value
           * smartsql - secure method to insert form data into a MySQL DB
           * ------------------
           * CZ: Převod hodnot
           * smartsql - secure method to insert form data into a MySQL DB
          */
          $result = $envodb->query('UPDATE ' . $envotable . ' SET
                        username = "' . smartsql($defaults['envo_username']) . '",
                        name = "' . smartsql($defaults['envo_name']) . '",
                        email = "' . filter_var($defaults['envo_email'], FILTER_SANITIZE_EMAIL) . '",
                        ' . $insert . '
                        usergroupid = "' . smartsql($defaults['envo_usergroup']) . '",
                        activatenr = 0,
                        phone = "' . smartsql($defaults['envo_phone']) . '",
                        description = "' . smartsql($defaults['envo_description']) . '"
                        WHERE id = ' . smartsql($page2));

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=users&sp=edituser&id=' . $page2 . '&status=e');
          } else {
            // Now do all the dirty work if we changed the username, also check if we have more then one language installed
            if ($defaults['envo_username'] != $defaults['envo_username_old']) {

              // EN: Get all the php Hook by name of Hook for search
              // CZ: Načtení všech php dat z Hook podle jména Hook pro vyhledávání
              $hookusrrename = $envohooks->EnvoGethook("php_admin_user_rename");
              if ($hookusrrename)
                foreach ($hookusrrename as $hur) {
                  eval($hur['phpcode']);
                }

            }

            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=users&sp=edituser&id=' . $page2 . '&status=s');
          }

          // Output the errors
        } else {

          $errors['e'] = $tl['general_error']['generror'] . '<br>';
          $errors      = $errors;
        }
      }

      $ENVO_FORM_DATA = envo_get_data($page2, $envotable);
      // Get the usergroups
      $ENVO_USERGROUP_ALL = envo_get_usergroup_all('usergroup');

      $extrafields = "";
      foreach ($schema as $f) {

        if (!in_array($f, $existf)) {

          $extrafields .= '<div class="row-form"><div class="col-md-5"><strong>' . ucfirst($f) . '</strong></div>
						<div class="col-md-7"><input type="text" class="form-control" name="' . $f . '" value="' . $ENVO_FORM_DATA[$f] . '" /></div></div>';

        }

      }

      // EN: Title and Description
      // CZ: Titulek a Popis
      $SECTION_TITLE = $tl["user_sec_title"]["usert4"];
      $SECTION_DESC  = $tl["user_sec_desc"]["userd4"];

      // EN: Load the php template
      // CZ: Načtení php template (šablony)
      $template = 'edituser.php';

    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=users&status=ene');
    }

    break;
  case 'lock':
    // LOCK USER

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $pageID = $page2;

    if (envo_user_exist_deletable($pageID)) {

      $result = $envodb->query('UPDATE ' . $envotable . ' SET access = IF (access = 1, 0, 1) WHERE id = ' . smartsql($pageID));

      if (!$result) {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=users&status=e');
      } else {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=users&status=s');
      }
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=users&status=edp');
    }

    break;
  case 'delete':

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $pageID = $page2;

    if (envo_user_exist_deletable($pageID)) {

      // Now check how many languages are installed and do the dirty work
      $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = ' . smartsql($pageID));

      // Delete Avatar
      $targetPath   = '../' . ENVO_FILES_DIRECTORY . '/' . $pageID . '/';
      $removedouble = str_replace("//", "/", $targetPath);
      foreach (glob($removedouble . '*.*') as $envo_unlink) {
        @unlink($envo_unlink);
      }

      @unlink($targetPath);

      // EN: Get all the php Hook by name of Hook for single delete
      // CZ: Načtení všech php dat z Hook podle jména Hook
      $hookusrdel = $envohooks->EnvoGethook("php_admin_user_delete");
      if ($hookusrdel) foreach ($hookusrdel as $hud) {
        eval($hud['phpcode']);
      }

      if (!$result) {
        // EN: Redirect page
        // CZ: Přesměrování stránky s notifikací - chybné
        envo_redirect(BASE_URL . 'index.php?p=users&status=e');
      } else {
        // EN: Redirect page
        // CZ: Přesměrování stránky s notifikací - úspěšné
        /*
        NOTIFIKACE:
        'status=s'    - Záznam úspěšně uložen
        'status1=s1'  - Záznam úspěšně odstraněn
        */
        envo_redirect(BASE_URL . 'index.php?p=users&status=s&status1=s1');
      }

    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=users&status=edp');
    }

    break;
  case 'sort':

    // getNumber
    $getTotal = envo_get_total($envotable, '', '', '');

    // Now if total run paginator
    if ($getTotal != 0) {
      // Paginator
      $pages                 = new ENVO_paginator;
      $pages->items_total    = $getTotal;
      $pages->mid_range      = $setting["adminpagemid"];
      $pages->items_per_page = $setting["adminpageitem"];
      $pages->envo_get_page   = $page4;
      $pages->envo_where      = 'index.php?p=users&sp=sort&ssp=' . $page2 . '&sssp=' . $page3;
      $pages->paginate();
      $ENVO_PAGINATE = $pages->display_pages();
    }

    $result = $envodb->query('SELECT id, usergroupid, username, email, name, access FROM ' . $envotable . ' ORDER BY ' . $page2 . ' ' . $page3 . ' ' . $pages->limit);
    while ($row = $result->fetch_assoc()) {
      $user[] = array('id' => $row['id'], 'usergroupid' => $row['usergroupid'], 'username' => $row['username'], 'email' => $row['email'], 'name' => $row['name'], 'access' => $row['access']);
    }

    $ENVO_USER_ALL      = $user;
    $ENVO_USERGROUP_ALL = envo_get_usergroup_all('usergroup');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["user_sec_title"]["usert3"];
    $SECTION_DESC  = $tl["user_sec_desc"]["userd3"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'users.php';

    break;
  case 'search':

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])) {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($defaults['search'])) {

        if ($defaults['envoSH'] == '') {
          $errors['e'] = $tl['search']['s1'] . '<br>';
        }

        if (strlen($defaults['envoSH']) < '1') {
          $errors['e1'] = $tl['search']['s2'] . '<br>';
        }

        if (count($errors) > 0) {

          $errors['e2'] = $tl['search']['s3'] . '<br>';
          $errors       = $errors;

        } else {
          $secureIn    = smartsql(strip_tags($defaults['envoSH']));
          $SEARCH_WORD = $secureIn;
          $ENVO_SEARCH  = envo_admin_search($secureIn, $envotable, 'user');
        }
      }

    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envo_delete_user'])) {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($defaults['move'])) {

        $envomove = $defaults['envo_delete_user'];
        $envogrid = $defaults['envo_group'];

        for ($i = 0; $i < count($envomove); $i++) {
          $move   = $envomove[$i];
          $result = $envodb->query('UPDATE ' . $envotable . ' SET usergroupid = ' . $envogrid . ' WHERE id = "' . smartsql($move) . '"');
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&status=s');
        }

      }

      if (isset($defaults['lock'])) {

        $lockuser    = $defaults['envo_delete_user'];
        $useridarray = explode(',', ENVO_SUPERADMIN);

        for ($i = 0; $i < count($lockuser); $i++) {
          $locked = $lockuser[$i];

          if (!in_array($locked, $useridarray)) {
            $result = $envodb->query('UPDATE ' . $envotable . ' SET access = IF (access = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');
          }
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&status=s');
        }

      }

      if (isset($defaults['password'])) {

        $lockuser    = $defaults['envo_delete_user'];
        $useridarray = explode(',', ENVO_SUPERADMIN);

        for ($i = 0; $i < count($lockuser); $i++) {
          $locked = $lockuser[$i];

          // Reset password and row each time
          $password = '';
          $row      = '';

          if (!in_array($locked, $useridarray)) {

            // Generate random password
            $password = envo_password_creator();

            $result = $envodb->query('SELECT id, username, email FROM ' . $envotable . ' WHERE id = ' . smartsql($locked));
            $row    = $result->fetch_assoc();

            // Send email to member with new password
            $mail = new PHPMailer(); // defaults to using php "mail()"
            $body = str_ireplace("[\]", "", $tl["email_text_message"]["emailm4"] . $password);
            $mail->SetFrom($setting["email"], $setting["title"]);
            $mail->AddAddress($row['email'], $row['username']);
            $mail->Subject = $setting["title"] . ' - ' . $tl['email_text_message']['emailm5'];
            $mail->MsgHTML($body);
            $mail->Send();

            // Update database
            $envodb->query('UPDATE ' . $envotable . ' SET password = "' . hash_hmac('sha256', $password, DB_PASS_HASH) . '" WHERE id = ' . $row["id"]);
          }
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&status=s');
        }

      }

      if (isset($defaults['delete'])) {

        $deleteuser    = $defaults['envo_delete_user'];
        $useridarray = explode(',', ENVO_SUPERADMIN);

        for ($i = 0; $i < count($deleteuser); $i++) {
          $deleted = $deleteuser[$i];

          if (!in_array($deleted, $useridarray)) {


            $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = ' . $deleted . '');

            // Delete Avatar if yes
            if (!empty($defaults['envo_delete_avatar'])) {
              $targetPath   = '../' . ENVO_FILES_DIRECTORY . '/' . $deleted . '/';
              $removedouble = str_replace("//", "/", $targetPath);
              foreach (glob($removedouble . '*.*') as $envo_unlink) {
                @unlink($envo_unlink);
              }

              @unlink($targetPath);

            }

            // EN: Get all the php Hook by name of Hook for search
            // CZ: Načtení všech php dat z Hook podle jména Hook pro vyhledávání
            $hookusrmassdel = $envohooks->EnvoGethook("php_admin_user_delete_mass");
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
          envo_redirect(BASE_URL . 'index.php?p=users&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&status=s');
        }

      }

    }

    // Get all usergroup's
    $ENVO_USERGROUP_ALL = envo_get_usergroup_all('usergroup');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["user_sec_title"]["usert2"];
    $SECTION_DESC  = $tl["user_sec_desc"]["userd2"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'searchuser.php';

    break;
  case 'verify':
    // VERIFY USER BY EMAIL

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $pageID = $page2;

    $result = $envodb->query('SELECT id, username, email, activatenr, access FROM ' . DB_PREFIX . 'user WHERE id = ' . smartsql($pageID));
    $row    = $result->fetch_assoc();

    if ($row['access'] == 3) {

      $confirmlink = '<a href="' . (ENVO_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . ENVO_rewrite::envoParseurl('rf_ual', $row['id'], $row['activatenr'], $row['username'], '') . '">' . (ENVO_USE_APACHE ? substr(BASE_URL, 0, -1) : BASE_URL) . ENVO_rewrite::envoParseurl('rf_ual', $row['id'], $row['activatenr'], $row['username'], '') . '</a>';

      // Send email to member with verification code
      $mail = new PHPMailer(); // defaults to using php "mail()"
      $body = str_ireplace("[\]", "", str_replace("%s", $confirmlink, $tl["email_text_message"]["emailm7"]));
      $mail->SetFrom($setting["email"]);
      $mail->AddAddress($row['email'], $row['username']);
      $mail->Subject = $setting["title"] . ' - ' . $tl["email_text_message"]["emailm6"];
      $mail->MsgHTML($body);

      if ($mail->Send()) {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=users&status=s');
      } else {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=users&status=e');
      }

    } else {

      $result1 = $envodb->query('UPDATE ' . DB_PREFIX . 'user SET access = 1 WHERE id = ' . smartsql($pageID));

      if (!$result1) {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=users&status=e');
      } else {

        // Send info that the account has been verified
        $mail = new PHPMailer(); // defaults to using php "mail()"
        $body = str_ireplace("[\]", "", str_replace("%s", $row['username'], $tl["email_text_message"]["emailm9"]));
        $mail->SetFrom($setting["email"]);
        $mail->AddAddress($row['email'], $row['username']);
        $mail->Subject = $setting["title"] . ' - ' . $tl["email_text_message"]["emailm8"];
        $mail->MsgHTML($body);
        $mail->Send();

        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=users&status=s');
      }

    }

    break;
  case 'password':
    // SEND PASSWORD TO USER

    // EN: Default Variable
    // CZ: Hlavní proměnné
    $pageID = $page2;

    if (envo_user_exist_deletable($pageID)) {

      // Generate random password
      $password = envo_password_creator();

      $result = $envodb->query('SELECT id, username, email FROM ' . $envotable . ' WHERE id = ' . smartsql($pageID));
      $row    = $result->fetch_assoc();

      // Send email to member with new password
      $mail = new PHPMailer(); // defaults to using php "mail()"
      $body = str_ireplace("[\]", "", $tl["email_text_message"]["emailm4"] . $password);
      $mail->SetFrom($setting["email"]);
      $mail->AddAddress($row['email'], $row['username']);
      $mail->Subject = $setting["title"] . ' - ' . $tl['email_text_message']['emailm5'];
      $mail->MsgHTML($body);

      if ($mail->Send()) {

        // Update database
        $result = $envodb->query('UPDATE ' . $envotable . ' SET password = "' . hash_hmac('sha256', $password, DB_PASS_HASH) . '" WHERE id = ' . $row["id"]);

        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=users&status=s');
      } else {
        // EN: Redirect page
        // CZ: Přesměrování stránky
        envo_redirect(BASE_URL . 'index.php?p=users&status=e');
      }
    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=users&status=edp');
    }

    break;
  default:

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envo_delete_user'])) {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($defaults['move'])) {
        // MOVE SELECTED USERS TO USERGROUP

        $envomove = $defaults['envo_delete_user'];
        $envogrid = $defaults['envo_group'];

        for ($i = 0; $i < count($envomove); $i++) {
          $move   = $envomove[$i];
          $result = $envodb->query('UPDATE ' . $envotable . ' SET usergroupid = ' . $envogrid . ' WHERE id = "' . smartsql($move) . '"');
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&status=s');
        }

      }

      if (isset($defaults['lock'])) {
        // LOCK SELECTED USERS

        $lockuser    = $defaults['envo_delete_user'];
        $useridarray = explode(',', ENVO_SUPERADMIN);

        for ($i = 0; $i < count($lockuser); $i++) {
          $locked = $lockuser[$i];

          if (!in_array($locked, $useridarray)) {
            $result = $envodb->query('UPDATE ' . $envotable . ' SET access = IF (access = 1, 0, 1) WHERE id = "' . smartsql($locked) . '"');
          }
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&status=s');
        }

      }

      if (isset($defaults['password'])) {
        // SEND PASSWORDS TO SELECTED USERS

        $lockuser    = $defaults['envo_delete_user'];
        $useridarray = explode(',', ENVO_SUPERADMIN);

        for ($i = 0; $i < count($lockuser); $i++) {
          $locked = $lockuser[$i];

          // Reset password and row each time
          $password = '';
          $row      = '';

          if (!in_array($locked, $useridarray)) {

            // Generate random password
            $password = envo_password_creator();

            $result = $envodb->query('SELECT id, username, email FROM ' . $envotable . ' WHERE id = ' . smartsql($locked));
            $row    = $result->fetch_assoc();

            // Send email to member with new password
            $mail = new PHPMailer(); // defaults to using php "mail()"
            $body = str_ireplace("[\]", "", $tl["email_text_message"]["emailm4"] . $password);
            $mail->SetFrom($setting["email"], $setting["title"]);
            $mail->AddAddress($row['email'], $row['username']);
            $mail->Subject = $setting["title"] . ' - ' . $tl['email_text_message']['emailm5'];
            $mail->MsgHTML($body);
            $mail->Send();

            // Update database
            $envodb->query('UPDATE ' . $envotable . ' SET password = "' . hash_hmac('sha256', $password, DB_PASS_HASH) . '" WHERE id = ' . $row["id"]);
          }
        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=users&status=s');
        }

      }

      if (isset($defaults['delete'])) {
        // DELETE SELECTED USERS

        $deleteuser    = $defaults['envo_delete_user'];
        $useridarray = explode(',', ENVO_SUPERADMIN);

        for ($i = 0; $i < count($deleteuser); $i++) {
          $deleted = $deleteuser[$i];

          if (!in_array($deleted, $useridarray)) {


            $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = ' . $deleted . '');

            // Delete Avatar
            $targetPath   = '../' . ENVO_FILES_DIRECTORY . '/' . $deleted . '/';
            $removedouble = str_replace("//", "/", $targetPath);
            foreach (glob($removedouble . '*.*') as $envo_unlink) {
              @unlink($envo_unlink);
            }

            @unlink($targetPath);

            // EN: Get all the php Hook by name of Hook for search
            // CZ: Načtení všech php dat z Hook podle jména Hook pro vyhledávání
            $hookusrmassdel = $envohooks->EnvoGethook("php_admin_user_delete_mass");
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
          envo_redirect(BASE_URL . 'index.php?p=users&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky s notifikací - úspěšné
          /*
          NOTIFIKACE:
          'status=s'    - Záznam úspěšně uložen
          'status1=s1'  - Záznam úspěšně odstraněn
          */
          envo_redirect(BASE_URL . 'index.php?p=users&status=s&status1=s1');
        }

      }

    }

    // Important template stuff
    $getTotal = envo_get_total($envotable, '', '', '');
    if ($getTotal != 0) {
      // Paginator
      $pages                 = new ENVO_paginator;
      $pages->items_total    = $getTotal;
      $pages->mid_range      = $setting["adminpagemid"];
      $pages->items_per_page = $setting["adminpageitem"];
      $pages->envo_get_page   = $page1;
      $pages->envo_where      = 'index.php?p=users';
      $pages->paginate();
      $ENVO_PAGINATE = $pages->display_pages();
    }
    $ENVO_USER_ALL      = envo_get_user_all('user', $pages->limit, '');
    $ENVO_USERGROUP_ALL = envo_get_usergroup_all('usergroup');

    $resulta = $envodb->query('SELECT id, usergroupid, username, email, access FROM ' . $envotable . ' WHERE access >= 2');
    while ($rowa = $resulta->fetch_assoc()) {
      $ENVO_USER_ALL_APPROVE[] = array('id' => $rowa['id'], 'usergroupid' => $rowa['usergroupid'], 'username' => $rowa['username'], 'email' => $rowa['email'], 'access' => $rowa['access']);
    }

    // Stats - Count of all users
    $result = $envodb -> query('SELECT COUNT(id) AS totalusers FROM ' . $envotable);
    $data   = $result -> fetch_assoc();
    $ENVO_STATS_COUNTALL = $data['totalusers'];

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["user_sec_title"]["usert"];
    $SECTION_DESC  = $tl["user_sec_desc"]["userd"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'users.php';
}
?>