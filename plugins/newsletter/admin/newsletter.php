<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('ENVO_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!ENVO_USERID || !$envouser->envoModuleAccess(ENVO_USERID, ENVO_ACCESSNEWSLETTER)) envo_redirect(BASE_URL);

// -------- DATA FOR ALL ADMIN PAGES --------
// -------- DATA PRO VŠECHNY ADMIN STRÁNKY --------

// EN: Set base plugin folder - template
// CZ: Nastavení základní složky pluginu - šablony
$BASE_PLUGIN_URL_TEMPLATE  = APP_PATH . 'plugins/newsletter/admin/template/';
$SHORT_PLUGIN_URL_TEMPLATE = '/plugins/newsletter/admin/template/';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'newsletter';
$envotable1 = DB_PREFIX . 'newslettergroup';
$envotable2 = DB_PREFIX . 'newsletteruser';
$envotable3 = DB_PREFIX . 'newsletterstat';

// EN: Reset Array (output the error in a array)
// CZ: Reset Pole (výstupní chyby se ukládají do pole)
$success = array();

// EN: Include the functions
// CZ: Vložené funkce
include_once("../plugins/newsletter/admin/include/functions.php");

// -------- DATA FOR SELECTED ADMIN PAGES --------
// -------- DATA PRO VYBRANÉ ADMIN STRÁNKY --------

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'new':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($defaults['btnSave'])) {

        if (empty($defaults['envo_title'])) {
          $errors['e1'] = $tl['general_error']['generror18'] . '<br>';
        }

        if (isset($defaults['envo_showdate'])) {
          $showdate = $defaults['envo_showdate'];
        } else {
          $showdate = '0';
        }

        if (count($errors) == 0) {

          $random = substr(number_format(time() * rand(), 0, '', ''), 0, 10);

          /* EN: Convert value
           * smartsql - secure method to insert form data into a MySQL DB
           * ------------------
           * CZ: Převod hodnot
           * smartsql - secure method to insert form data into a MySQL DB
          */
          $result = $envodb->query('INSERT INTO ' . $envotable . ' SET
                    title = "' . smartsql($defaults['envo_title']) . '",
                    content = "' . smartsql($defaults['envo_content']) . '",
                    showdate = "' . smartsql($showdate) . '",
                    time = NOW(),
                    fullview = "' . smartsql($random) . '"');

          $rowid = $envodb->envo_last_id();

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=new&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=edit&ssp=' . $rowid . '&status=s');
          }

        } else {
          $errors['e'] = $tl['general_error']['generror'] . '<br>';
          $errors      = $errors;
        }
      }
    }

    // Get all styles in the directory
    $theme_files = envo_get_themes('../plugins/newsletter/skins/');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlnl["newsletter_sec_title"]["nlt1"];
    $SECTION_DESC  = $tlnl["newsletter_sec_desc"]["nld1"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'new.php';

    break;
  case 'preview':

    if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

      // Get the newsletter
      $ENVO_FORM_DATA = envo_get_data($page2, $envotable);

      // EN: Load the php template
      // CZ: Načtení php template (šablony)
      $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'preview.php';

    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=new&status=ene');
    }

    break;
  case 'stat':

    if (is_numeric($page2) && envo_row_exist($page2, $envotable3)) {

      $result = $envodb->query('SELECT senttotal, notsent, notsentcms, notsenttotal, nlgroup, cmsgroup, time FROM ' . $envotable3 . ' WHERE nlid = "' . smartsql($page2) . '" ORDER BY time DESC LIMIT 5');
      while ($row = $result->fetch_assoc()) {

        // Reset all
        $nlgroup  = '';
        $nluser   = '';
        $cmsgroup = '';
        $cmsuser  = '';

        // Get the newsletter groups
        if ($row["nlgroup"]) {
          $result1 = $envodb->query('SELECT id, name FROM ' . $envotable1 . ' WHERE id IN(' . $row["nlgroup"] . ')');
          while ($row1 = $result1->fetch_assoc()) {

            $nlgroup[] = '<a href="index.php?p=newsletter&amp;sp=usergroup&amp;ssp=edit&amp;sssp=' . $row1["id"] . '">' . $row1['name'] . '</a>';

          }

          if (!empty($nlgroup)) $nlgroup = join(", ", $nlgroup);
        }

        // Get the newsletter user not sent
        if ($row["notsent"]) {
          $result2 = $envodb->query('SELECT id, email, name FROM ' . $envotable2 . ' WHERE id IN(' . $row["notsent"] . ')');
          while ($row2 = $result2->fetch_assoc()) {

            $nluser[] = '<a href="index.php?p=newsletter&amp;sp=user&amp;ssp=edit&amp;sssp=' . $row2["id"] . '">' . $row2["name"] . ' (' . $row2["email"] . ')</a> <a href="index.php?p=newsletter&amp;sp=user&amp;ssp=delete&amp;sssp=' . $row2["id"] . '" onclick="if(!confirm(\'' . $tlnl;["newsletter_notification"]["delallu"] . '\'))return false;" class="btn btn-default btn-xs"><i class="fa fa-trash-o"></i></a>';

          }

          if (!empty($nluser)) $nluser = join(", ", $nluser);
        }

        // Get the cms groups
        if ($row["cmsgroup"]) {
          $result3 = $envodb->query('SELECT id, name FROM ' . DB_PREFIX . 'usergroup WHERE id IN(' . $row["cmsgroup"] . ')');
          while ($row3 = $result3->fetch_assoc()) {

            $cmsgroup[] = '<a href="index.php?p=usergroup&amp;sp=edit&amp;ssp="' . $row3["id"] . '>' . $row3['name'] . '</a>';

          }

          if (!empty($cmsgroup)) $cmsgroup = join(", ", $cmsgroup);
        }

        // Get the cms user not sent
        if ($row["notsentcms"]) {
          $result4 = $envodb->query('SELECT id, username, email FROM ' . DB_PREFIX . 'user WHERE id IN(' . $row["notsentcms"] . ')');
          while ($row4 = $result4->fetch_assoc()) {

            $cmsuser[] = '<a href="index.php?p=users&amp;sp=edit&amp;ssp="' . $row4["id"] . '>' . $row4["name"] . '(' . $row4["email"] . ')</a>';

          }

          if (!empty($cmsuser)) $cmsuser = join(", ", $cmsuser);
        }

        $envodata[] = array('total' => $row['senttotal'], 'notsent' => $row['notsenttotal'], 'time' => $row['time'], 'nlgroup' => $nlgroup, 'nluser' => $nluser, 'cmsgroup' => $cmsgroup, 'cmsuser' => $cmsuser);
      }

      // Get the newsletter
      $ENVO_STAT_DATA = $envodata;

      // Get the newsletter
      $ENVO_FORM_DATA = envo_get_data($page2, $envotable);

      // EN: Title and Description
      // CZ: Titulek a Popis
      $SECTION_TITLE = $tlnl["newsletter_sec_title"]["nlt11"];
      $SECTION_DESC  = $tlnl["newsletter_sec_desc"]["nld11"];

      // EN: Load the php template
      // CZ: Načtení php template (šablony)
      $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'stat.php';

    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=new&status=ene');
    }

    break;
  case 'send':

    if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // EN: Default Variable
        // CZ: Hlavní proměnné
        $defaults = $_POST;

        if (empty($defaults['envo_nlgroup']) && empty($defaults['envo_cmsgroup'])) {
          $errors['e1'] = $tlnl['newsletter_error']['nlerror3'];
        }

        if (empty($defaults['envo_send'])) {
          $errors['e2'] = $tlnl['newsletter_error']['nlerror4'];
        }

        if (count($errors) == 0) {

          // Get the newsletter
          $result = $envodb->query('SELECT id, title, content, fullview FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');
          if ($envodb->affected_rows > 0) {
            $row = $result->fetch_assoc();

            // Get the title/subject
            $subject = $row['title'];

            // Get the cat var name
            $resultc = $envodb->query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = ' . ENVO_PLUGIN_NEWSLETTER);
            $rowc    = $resultc->fetch_assoc();

            // Get the browserversion
            $fullversion = (ENVO_USE_APACHE ? substr(BASE_URL_ORIG, 0, -1) : BASE_URL_ORIG) . html_entity_decode(ENVO_rewrite::envoParseurl($rowc['varname'], 'fv', $row['id'], $row['fullview'], ''));

            // Set vars to zero
            $countNL   = 0;
            $notsNL    = 0;
            $countnsNL = 0;

            // start the mail client
            $mail = new PHPMailer();

            // Send email the smpt way or else the mail way
            if ($setting["nlsmtp_mail"]) {

              $mail->IsSMTP(); // telling the class to use SMTP
              $mail->Host          = $setting["nlsmtphost"];
              $mail->SMTPAuth      = ($setting["nlsmtp_auth"] ? TRUE : FALSE); // enable SMTP authentication
              $mail->SMTPSecure    = $setting["nlsmtp_prefix"]; // sets the prefix to the server
              $mail->SMTPKeepAlive = ($setting["nlsmtp_alive"] ? TRUE : FALSE); // SMTP connection will not close after each email sent
              $mail->Port          = $setting["nlsmtpport"]; // set the SMTP port for the GMAIL server
              $mail->Username      = base64_decode($setting["nlsmtpusername"]); // SMTP account username
              $mail->Password      = base64_decode($setting["nlsmtppassword"]);        // SMTP account password
              $mail->SetFrom($setting["nlemail"], $setting["title"]);
              $mail->AddReplyTo($setting["nlemail"], $setting["title"]);
              $mail->AltBody = $tlnl["newsletter_message"]["nlm1"]; // optional, comment out and test
              $mail->Subject = $subject;

            } else {

              $mail->SetFrom($setting["nlemail"], $setting["title"]);
              $mail->AddReplyTo($setting["nlemail"], $setting["title"]);
              $mail->AltBody = $tlnl["newsletter_message"]["nlm1"]; // optional, comment out and test
              $mail->Subject = $subject;

            }

            if (!empty($defaults['envo_nlgroup'])) {
              $nlgroup = $defaults['envo_nlgroup'];

              for ($i = 0; $i < count($nlgroup); $i++) {
                $lettergroup = $nlgroup[$i];

                // Get the group into an array
                $lgroup[] = $lettergroup;

                $result1 = $envodb->query('SELECT id, name, email, delcode FROM ' . $envotable2 . ' WHERE usergroupid = "' . $lettergroup . '"');

                while ($row1 = $result1->fetch_assoc()) {

                  // Get the delete code for each user
                  $unsubscribe = (ENVO_USE_APACHE ? substr(BASE_URL_ORIG, 0, -1) : BASE_URL_ORIG) . html_entity_decode(ENVO_rewrite::envoParseurl($rowc['varname'], 'nlo', $row1['delcode'], '', ''));

                  // Change fake vars into real ones.
                  $cssAtt    = array('{myweburl}', '{mywebname}', '{browserversion}', '{unsubscribe}', '{username}', '{fullname}', '{useremail}');
                  $cssUrl    = array(BASE_URL_ORIG, $setting["title"], $fullversion, $unsubscribe, $row1['name'], $row1['name'], $row1['email']);
                  $nlcontent = str_replace($cssAtt, $cssUrl, $row['content']);

                  // Get the body into the right format
                  $body = str_ireplace("[\]", '', $nlcontent);

                  $mail->MsgHTML($body);
                  $mail->AddAddress($row1["email"], $row1["name"]);

                  if (!$mail->Send()) {
                    $countnsNL++;
                    $notsNL[] = $row1['id'];
                  } else {
                    $countNL++;
                    $newslettersent = 1;
                  }

                  // Clear all addresses and attachments for next loop
                  $mail->ClearAddresses();
                }
              }
            }

            if (!empty($defaults['envo_cmsgroup'])) {
              $usergroup = $defaults['envo_cmsgroup'];

              for ($i = 0; $i < count($usergroup); $i++) {
                $ugroup = $usergroup[$i];

                // Get the groups into an array
                $cmsgroup[] = $ugroup;

                $result2 = $envodb->query('SELECT id, username, name, email FROM ' . DB_PREFIX . 'user WHERE usergroupid = "' . smartsql($ugroup) . '" AND newsletter != 0');

                while ($row2 = $result2->fetch_assoc()) {

                  // Get the delete code for each user
                  $unsubscribe = (ENVO_USE_APACHE ? substr(BASE_URL_ORIG, 0, -1) : BASE_URL_ORIG) . html_entity_decode(ENVO_rewrite::envoParseurl($rowc['varname'], 'nlom', $row2['id'], '', ''));

                  // Change fake vars into real ones.
                  $cssAtt    = array('{myweburl}', '{mywebname}', '{browserversion}', '{unsubscribe}', '{username}', '{fullname}', '{useremail}');
                  $cssUrl    = array(BASE_URL_ORIG, $setting["title"], $fullversion, $unsubscribe, $row2['username'], $row2['name'], $row2['email']);
                  $nlcontent = str_replace($cssAtt, $cssUrl, $row['content']);

                  // Get the body into the right format
                  $body = str_ireplace("[\]", '', $nlcontent);

                  $mail->MsgHTML($body);
                  $mail->AddAddress($row2["email"], $row2["username"]);

                  if (!$mail->Send()) {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                    $countnsNL++;
                    $notsNLu[] = $row2['id'];
                  } else {
                    $countNL++;
                    $sUMail = 1;
                  }

                  // Clear all addresses and attachments for next loop
                  $mail->ClearAddresses();
                }
              }
            }

            if ($sUMail || $newslettersent) {
              $_SESSION['newsletter_sent_admin'] = 1;

              // Update newsletter to sent
              $envodb->query('UPDATE ' . $envotable . ' SET sent = 1, senttime = NOW() WHERE id = "' . smartsql($page2) . '"');

              // Write statistic file
              if (!empty($notsNL)) $notsNL = join(",", $notsNL);
              if (!empty($notsNLu)) $notsNLu = join(",", $notsNLu);
              if (!empty($lgroup)) $lgroup = join(",", $lgroup);
              if (!empty($cmsgroup)) $cmsgroup = join(",", $cmsgroup);

              // write into stat db
              $envodb->query('INSERT INTO ' . $envotable3 . ' SET
					nlid = "' . smartsql($row["id"]) . '",
					senttotal = "' . smartsql($countNL) . '",
					notsent = "' . smartsql($notsNL) . '",
					notsentcms = "' . smartsql($notsNLu) . '",
					notsenttotal = "' . smartsql($countnsNL) . '",
					nlgroup = "' . smartsql($lgroup) . '",
					cmsgroup = "' . smartsql($cmsgroup) . '",
					time = NOW()');

              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=send&ssp=' . $page2 . '&status=s');
            }

          }

        } else {
          $errors['e'] = $tl['newsletter_error']['nlerror1'];
          $errors      = $errors;
        }

      }

      // Get usergroups newsletter
      $ENVO_USERGROUP_ALL = envo_get_usergroup_all('newslettergroup');

      // Get usergroups cms
      $ENVO_USERGROUP_CMS = envo_get_usergroup_all('usergroup');

      // EN: Title and Description
      // CZ: Titulek a Popis
      $SECTION_TITLE = $tlnl["newsletter_sec_title"]["nlt12"];
      $SECTION_DESC  = $tlnl["newsletter_sec_desc"]["nld12"];

      // EN: Load the php template
      // CZ: Načtení php template (šablony)
      $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'send.php';

    } else {
      // EN: Redirect page
      // CZ: Přesměrování stránky
      envo_redirect(BASE_URL . 'index.php?p=newsletter&status=ene');
    }

    break;
  case 'user':

    switch ($page2) {

      case 'newuser':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if ($defaults['envo_name']) {

            if (empty($defaults['envo_name'])) {
              $errors['e1'] = $tl['general_error']['generror4'] . '<br>';
            }

            if ($defaults['envo_email'] == '' || !filter_var($defaults['envo_email'], FILTER_VALIDATE_EMAIL)) {
              $errors['e2'] = $tl['general_error']['generror7'] . '<br>';
            }

            if (envo_field_not_exist(strtolower($defaults['envo_email']), $envotable2, 'email')) {
              $errors['e2'] = $tlnl['newsletter_error']['nlerror5'] . '<br>';
            }

            if (count($errors) == 0) {

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $envodb->query('INSERT INTO ' . $envotable2 . ' SET
                        name = "' . smartsql($defaults['envo_name']) . '",
                        email = "' . smartsql($defaults['envo_email']) . '",
                        usergroupid = "' . smartsql($defaults['envo_usergroup']) . '",
                        delcode = ' . time() . ',
                        time = NOW()');

              $rowid = $envodb->envo_last_id();

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&ssp=newuser&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&ssp=edit&sssp=' . $rowid . '&status=s');
              }

            }

          }

          if (!empty($_FILES['envo_file']['name'])) {

            $filename     = $_FILES['envo_file']['name']; // original filename
            $tempFile     = $_FILES['envo_file']['tmp_name'];
            $tmpf         = explode(".", $filename);
            $envo_xtension = end($tmpf);

            if ($envo_xtension != "csv") {
              $errors['e3'] = $tlnl['newsletter_error']['nlerror1'];
            }

            if (empty($defaults['envo_delimiter'])) {
              $errors['e4'] = $tlnl['newsletter_error']['nlerror2'];
            }

            if (count($errors) == 0) {

              // We start with one
              $row = 1;
              // Now we open the uploaded file and start with the process
              if (($handle = fopen($targetFile, "r")) !== FALSE) {
                while (($data = fgetcsv($handle, 1000, $defaults['envo_delimiter'])) !== FALSE) {

                  if ($defaults['envo_start'] < $row) {

                    $random = substr(number_format(time() * rand(), 0, '', ''), 0, 10);
                    $csvI[] = '(NULL, ' . $defaults['envo_usergroupcsv'] . ', "' . $data[1] . '", "' . $data[0] . '", NOW(), ' . $random . ')';

                  }
                  $row++;
                }
                fclose($handle);
              }

              if (!empty($csvI)) $csvI = join(",", $csvI);

              $result = $envodb->query('INSERT INTO ' . $envotable2 . ' VALUES ' . $csvI);

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&ssp=newuser&status=e');
              } else {

                // Now we delete the temp csv file from the cache directory
                if (is_file($targetFile)) unlink($targetFile);

                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&status=s');
              }

            }

          }

          if (count($errors) != 0) {
            $errors['e'] = $tl['generror']['generror'];
            $errors      = $errors;
          }
        }

        // Get the usergroups
        $ENVO_USERGROUP_ALL = envo_get_usergroup_all('newslettergroup');

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlnl["newsletter_sec_title"]["nlt4"];
        $SECTION_DESC  = $tlnl["newsletter_sec_desc"]["nld4"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'newuser.php';

        break;
      case 'edit':

        if (envo_row_exist($page3, $envotable2)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (empty($defaults['envo_name'])) {
              $errors['e1'] = $tl['general_error']['generror4'] . '<br>';
            }

            if ($defaults['envo_email'] == '' || !filter_var($defaults['envo_email'], FILTER_VALIDATE_EMAIL)) {
              $errors['e2'] = $tl['general_error']['generror7'] . '<br>';
            }

            if (count($errors) == 0) {

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $envodb->query('UPDATE ' . $envotable2 . ' SET
                        name = "' . smartsql($defaults['envo_name']) . '",
                        email = "' . smartsql($defaults['envo_email']) . '",
                        usergroupid = "' . smartsql($defaults['envo_usergroup']) . '",
                        delcode = ' . time() . ',
                        time = NOW()
                        WHERE id = ' . $page3);

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&ssp=edit&sssp=' . $page3 . '&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&ssp=edit&sssp=' . $page3 . '&status=s');
              }

            } else {

              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          $ENVO_FORM_DATA = envo_get_data($page3, $envotable2);

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&status=ene');
        }

        // Get the usergroups
        $ENVO_USERGROUP_ALL = envo_get_usergroup_all('newslettergroup');

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlnl["newsletter_sec_title"]["nlt5"] . ' - ' . '';
        $SECTION_DESC  = $tlnl["newsletter_sec_desc"]["nld5"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'edituser.php';

        break;
      case 'delete':

        // Check if user exists and can be deleted
        if (envo_row_exist($page3, $envotable2)) {

          // Now check how many languages are installed and do the dirty work
          $result = $envodb->query('DELETE FROM ' . $envotable2 . ' WHERE id = "' . smartsql($page3) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&status=s');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&status=ene');
        }

        break;
      case 'group':

        // Important template stuff
        $getTotal = envo_get_total($envotable2, $page3, 'usergroupid', '');
        if ($getTotal != 0) {

          // Paginator
          $pages                 = new ENVO_paginator;
          $pages->items_total    = $getTotal;
          $pages->mid_range      = $setting["adminpagemid"];
          $pages->items_per_page = $setting["adminpageitem"];
          $pages->envo_get_page   = $page1;
          $pages->envo_where      = 'index.php?p=newsletter&amp;sp=user&amp;ssp=group';
          $pages->paginate();
          $ENVO_PAGINATE = $pages->display_pages();
        }

        $result = $envodb->query('SELECT * FROM ' . $envotable2 . ' WHERE usergroupid = "' . smartsql($page3) . '" ' . $pages->limit);
        while ($row = $result->fetch_assoc()) {
          $user[] = array('id' => $row['id'], 'usergroupid' => $row['usergroupid'], 'username' => $row['username'], 'email' => $row['email'], 'name' => $row['name']);
        }

        $ENVO_USER_ALL      = $user;
        $ENVO_USERGROUP_ALL = envo_get_usergroup_all('newslettergroup');

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlnl["newsletter_sec_title"]["nlt6"];
        $SECTION_DESC  = $tlnl["newsletter_sec_desc"]["nld6"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'users.php';

        break;
      default:

        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envo_delete_user'])) {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($defaults['move'])) {

            $envomove = $defaults['envo_delete_user'];
            $envogrid = $defaults['envo_group'];

            for ($i = 0; $i < count($envomove); $i++) {
              $move   = $envomove[$i];
              $result = $envodb->query('UPDATE ' . $envotable2 . ' SET usergroupid = ' . $envogrid . ' WHERE id = "' . smartsql($move) . '"');
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&status=s');
            }

          }

          if (isset($defaults['delete'])) {

            $lockuser = $defaults['envo_delete_user'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];
              $envodb->query('DELETE FROM ' . $envotable2 . ' WHERE id = "' . smartsql($locked) . '"');
              $result = 1;
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=user&status=s');
            }

          }


        }

        // Important template stuff
        $getTotal = envo_get_total($envotable2, '', '', '');
        if ($getTotal != 0) {

          // Paginator
          $pages                 = new ENVO_paginator;
          $pages->items_total    = $getTotal;
          $pages->mid_range      = $setting["adminpagemid"];
          $pages->items_per_page = $setting["adminpageitem"];
          $pages->envo_get_page   = $page2;
          $pages->envo_where      = 'index.php?p=newsletter&amp;sp=user';
          $pages->paginate();
          $ENVO_PAGINATE = $pages->display_pages();

          $result = $envodb->query('SELECT * FROM ' . $envotable2 . ' ' . $pages->limit);
          while ($row = $result->fetch_assoc()) {
            $ENVO_USER_ALL[] = array('id' => $row['id'], 'usergroupid' => $row['usergroupid'], 'email' => $row['email'], 'name' => $row['name']);
          }

        }

        $ENVO_USERGROUP_ALL = envo_get_usergroup_all('newslettergroup');

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlnl["newsletter_sec_title"]["nlt3"];
        $SECTION_DESC  = $tlnl["newsletter_sec_desc"]["nld3"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'users.php';

    }

    break;
  case 'usergroup':

    switch ($page2) {

      case 'new':

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (empty($defaults['envo_name'])) {
            $errors['e1'] = $tl['general_error']['generror4'] . '<br>';
          }

          if (count($errors) == 0) {

            /* EN: Convert value
             * smartsql - secure method to insert form data into a MySQL DB
             * ------------------
             * CZ: Převod hodnot
             * smartsql - secure method to insert form data into a MySQL DB
            */
            $result = $envodb->query('INSERT INTO ' . $envotable1 . ' SET
                      name = "' . smartsql($defaults['envo_name']) . '",
                      description = "' . smartsql($defaults['envo_desc']) . '",
                      time = NOW()');

            $rowid = $envodb->envo_last_id();

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=usergroup&ssp=new&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=usergroup&ssp=edit&sssp=' . $rowid . '&status=s');
            }

          } else {
            $errors['e'] = $tl['general_error']['generror'] . '<br>';
            $errors      = $errors;
          }
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlnl["newsletter_sec_title"]["nlt8"];
        $SECTION_DESC  = $tlnl["newsletter_sec_desc"]["nld8"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'newgroup.php';

        break;
      case 'edit':

        if (envo_row_exist($page3, $envotable1)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (empty($defaults['envo_name'])) {
              $errors['e1'] = $tl['general_error']['generror4'] . '<br>';
            }

            if (count($errors) == 0) {

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $envodb->query('UPDATE ' . $envotable1 . ' SET
                        name = "' . smartsql($defaults['envo_name']) . '",
                        description = "' . smartsql($defaults['envo_desc']) . '",
                        time = NOW()
                        WHERE id = "' . smartsql($page3) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=usergroup&ssp=edit&sssp=' . $page3 . '&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=usergroup&ssp=edit&sssp=' . $page3 . '&status=s');
              }

            } else {

              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          $ENVO_FORM_DATA = envo_get_data($page3, $envotable1);

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=usergroup&status=ene');
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlnl["newsletter_sec_title"]["nlt9"];
        $SECTION_DESC  = $tlnl["newsletter_sec_desc"]["nld9"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'editgroup.php';

        break;
      case 'delete':

        // Check if user exists and can be deleted
        if (envo_row_exist($page3, $envotable1)) {

          if ($page3 != 1) {
            // Now check how many languages are installed and do the dirty work
            $result = $envodb->query('DELETE FROM ' . $envotable1 . ' WHERE id = "' . smartsql($page3) . '"');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=usergroup&status=edn');
          }

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=usergroup&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=usergroup&status=s');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=usergroup&status=ene');
        }

        break;
      default:

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($defaults['delete'])) {

            if (empty($defaults['envo_name'])) {
              $errors['e1'] = $tl['general_error']['generror4'] . '<br>';
            }

            if (count($errors) == 0) {

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $envodb->query('UPDATE ' . $envotable1 . ' SET
                        name = "' . smartsql($defaults['envo_name']) . '",
                        description = "' . smartsql($defaults['envo_desc']) . '",
                        time = NOW()
                        WHERE id = ' . $page3);

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=usergroup&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=usergroup&status=s');
              }
            } else {
              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }

          }

          if (isset($defaults['delete'])) {

            $lockuser = $defaults['envo_delete_usergroup'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];

              if ($locked != 1) {
                $result = $envodb->query('DELETE FROM ' . $envotable1 . ' WHERE id = "' . smartsql($locked) . '"');
              }
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=usergroup&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=usergroup&status=s');
            }

          }


        }

        $ENVO_USERGROUP_ALL = envo_get_usergroup_all('newslettergroup');

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlnl["newsletter_sec_title"]["nlt7"];
        $SECTION_DESC  = $tlnl["newsletter_sec_desc"]["nld7"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'usergroup.php';
    }

    break;
  case 'settings':

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($_POST['btnSave'])) {
        // EN: If button "Save Changes" clicked
        // CZ: Pokud bylo stisknuto tlačítko "Uložit"

        if (empty($defaults['envo_title'])) {
          $errors['e1'] = $tl['general_error']['generror18'] . '<br>';
        }

        if (empty($defaults['envo_thankyou'])) {
          $errors['e2'] = $tl['general_error']['generror19'] . '<br>';
        }

        if (!empty($defaults['envo_port']) && !is_numeric($defaults['envo_port'])) {
          $errors['e3'] = $tl['general_error']['generror20'] . '<br>';
        }

        if (!filter_var($defaults['envo_email'], FILTER_VALIDATE_EMAIL)) {
          $errors['e4'] = $tl['general_error']['generror7'] . '<br>';
        }

        if (count($errors) == 0) {

          /* EN: Convert value
           * smartsql - secure method to insert form data into a MySQL DB
           * ------------------
           * CZ: Převod hodnot
           * smartsql - secure method to insert form data into a MySQL DB
          */
          $result = $envodb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                      WHEN "nltitle" THEN "' . smartsql($defaults['envo_title']) . '"
                      WHEN "nlsignoff" THEN "' . smartsql($defaults['envo_description']) . '"
                      WHEN "nlthankyou" THEN "' . smartsql($defaults['envo_thankyou']) . '"
                      WHEN "nlemail" THEN "' . smartsql($defaults['envo_email']) . '"
                      WHEN "nlsmtp_mail" THEN "' . smartsql($defaults['envo_smpt']) . '"
                      WHEN "nlsmtphost" THEN "' . smartsql($defaults['envo_host']) . '"
                      WHEN "nlsmtpport" THEN "' . smartsql($defaults['envo_port']) . '"
                      WHEN "nlsmtp_alive" THEN "' . smartsql($defaults['envo_alive']) . '"
                      WHEN "nlsmtp_auth" THEN "' . smartsql($defaults['envo_auth']) . '"
                      WHEN "nlsmtp_prefix" THEN "' . smartsql($defaults['envo_prefix']) . '"
                      WHEN "nlsmtpusername" THEN "' . base64_encode($defaults['envo_username']) . '"
                      WHEN "nlsmtppassword" THEN "' . base64_encode($defaults['envo_password']) . '"
                    END
                    WHERE varname IN ("nltitle","nlsignoff","nlthankyou","nlemail","nlsmtp_mail","nlsmtphost","nlsmtpport","nlsmtp_alive","nlsmtp_auth","nlsmtp_prefix","nlsmtpusername","nlsmtppassword")');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=settings&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=settings&status=s');
          }
        } else {
          $errors['e'] = $tl['general_error']['generror'] . '<br>';
          $errors      = $errors;
        }

      } else if (isset($_POST["btnTestMail"])) {
        // EN: If button "Test Mail" clicked
        // CZ: Pokud bylo stisknuto tlačítko "Test Mail"

        $mail = new PHPMailer(TRUE); // the true param means it will throw exceptions on errors, which we need to catch

        // Send email the smpt way or else the mail way
        if (!empty($defaults['envo_smpt'])) {

          try {
            $mail->IsSMTP(); // telling the class to use SMTP
            $mail->Host          = $setting["nlsmtphost"];
            $mail->SMTPAuth      = ($setting["nlsmtp_auth"] ? TRUE : FALSE); // enable SMTP authentication
            $mail->SMTPSecure    = $setting["nlsmtp_prefix"]; // sets the prefix to the server
            $mail->SMTPKeepAlive = ($setting["nlsmtp_alive"] ? TRUE : FALSE); // SMTP connection will not close after each email sent
            $mail->Port          = $setting["nlsmtpport"]; // set the SMTP port for the GMAIL server
            $mail->Username      = base64_decode($setting["nlsmtpusername"]); // SMTP account username
            $mail->Password      = base64_decode($setting["nlsmtppassword"]);        // SMTP account password
            $mail->SetFrom($setting["nlemail"], $setting["title"]);
            $mail->AddReplyTo($setting["nlemail"], $setting["title"]);
            $mail->AddAddress($setting["nlemail"], $setting["title"]);
            $mail->AltBody = $tlnl["newsletter_message"]["nlm1"]; // optional, comment out and test
            $mail->Subject = $tlnl["newsletter_message"]["nlm2"];
            $mail->MsgHTML($tlnl["newsletter_message"]["nlm3"] . 'SMTP.');
            $mail->Send();
            $success['e'] = sprintf($tlnl["newsletter_message"]["nlm"], 'SMTP');
          } catch (phpmailerException $e) {
            $errors['e'] = $e->errorMessage(); //Pretty error messages from PHPMailer
          } catch (Exception $e) {
            $errors['e'] = $e->getMessage(); //Boring error messages from anything else!
          }

        } else {

          try {
            $mail->SetFrom($setting["nlemail"], $setting["title"]);
            $mail->AddReplyTo($setting["nlemail"], $setting["title"]);
            $mail->AddAddress($setting["nlemail"], $setting["title"]);
            $mail->AltBody = $tlnl["newsletter_message"]["nlm1"]; // optional, comment out and test
            $mail->Subject = $tlnl["newsletter_message"]["nlm2"];
            $mail->MsgHTML($tlnl["newsletter_message"]["nlm3"] . 'Mail().');
            // Send the email
            $mail->Send();
            $success['e'] = sprintf($tlnl["newsletter_message"]["nlm"], 'PHP Mail()');
          } catch (phpmailerException $e) {
            $errors['e'] = $e->errorMessage(); //Pretty error messages from PHPMailer
          } catch (Exception $e) {
            $errors['e'] = $e->getMessage(); //Boring error messages from anything else!
          }

        }

      } else {
        // EN: If no button pressed
        // CZ: Pokud nebylo stisknuto žádné tlačítko

      }
    }

    // EN: Import important settings for the template from the DB
    // CZ: Importuj důležité nastavení pro šablonu z DB
    $ENVO_SETTING = envo_get_setting('newsletter');

    // EN: Import important settings for the template from the DB (only VALUE)
    // CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
    $ENVO_SETTING_VAL = envo_get_setting_val('newsletter');

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tlnl["newsletter_sec_title"]["nlt10"];
    $SECTION_DESC  = $tlnl["newsletter_sec_desc"]["nld10"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'settings.php';

    break;
  default:

    switch ($page1) {
      case 'delete':

        if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

          $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($page2) . '"');

          if (!$result) {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=newsletter&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky
            envo_redirect(BASE_URL . 'index.php?p=newsletter&status=s');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=newsletter&status=ene');
        }
        break;
      case 'edit':

        if (is_numeric($page2) && envo_row_exist($page2, $envotable)) {

          if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // EN: Default Variable
            // CZ: Hlavní proměnné
            $defaults = $_POST;

            if (empty($defaults['envo_title'])) {
              $errors['e1'] = $tl['general_error']['generror18'] . '<br>';
            }

            if (count($errors) == 0) {

              /* EN: Convert value
               * smartsql - secure method to insert form data into a MySQL DB
               * ------------------
               * CZ: Převod hodnot
               * smartsql - secure method to insert form data into a MySQL DB
              */
              $result = $envodb->query('UPDATE ' . $envotable . ' SET
                        title = "' . smartsql($defaults['envo_title']) . '",
                        content = "' . smartsql($defaults['envo_content']) . '",
                        showdate = "' . smartsql($defaults['envo_showdate']) . '",
                        time = NOW()
                        WHERE id = "' . smartsql($page2) . '"');

              if (!$result) {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=edit&ssp=' . $page2 . '&status=e');
              } else {
                // EN: Redirect page
                // CZ: Přesměrování stránky
                envo_redirect(BASE_URL . 'index.php?p=newsletter&sp=edit&ssp=' . $page2 . '&status=s');
              }

            } else {
              $errors['e'] = $tl['general_error']['generror'] . '<br>';
              $errors      = $errors;
            }
          }

          // Get the newsletter
          $ENVO_FORM_DATA = envo_get_data($page2, $envotable);

          // Get the cat var name
          $resultc = $envodb->query('SELECT varname FROM ' . DB_PREFIX . 'categories WHERE pluginid = "' . smartsql(ENVO_PLUGIN_NEWSLETTER) . '"');
          $rowc    = $resultc->fetch_assoc();

          // EN: Title and Description
          // CZ: Titulek a Popis
          $SECTION_TITLE = $tlnl["newsletter_sec_title"]["nlt2"];
          $SECTION_DESC  = $tlnl["newsletter_sec_desc"]["nld2"];

          // EN: Load the php template
          // CZ: Načtení php template (šablony)
          $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'edit.php';

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=newsletter&status=ene');
        }
        break;
      default:

        // Hello we have a post request
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['envo_delete_newsletter'])) {
          // EN: Default Variable
          // CZ: Hlavní proměnné
          $defaults = $_POST;

          if (isset($defaults['delete'])) {

            $lockuser = $defaults['envo_delete_newsletter'];

            for ($i = 0; $i < count($lockuser); $i++) {
              $locked = $lockuser[$i];
              $result = $envodb->query('DELETE FROM ' . $envotable . ' WHERE id = "' . smartsql($locked) . '"');
            }

            if (!$result) {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=newsletter&status=e');
            } else {
              // EN: Redirect page
              // CZ: Přesměrování stránky
              envo_redirect(BASE_URL . 'index.php?p=newsletter&status=s');
            }

          }

        }

        // get all newsletters out
        $getTotal = envo_get_total($envotable, '', '', '');

        if ($getTotal != 0) {
          // Paginator
          $nletter                 = new ENVO_paginator;
          $nletter->items_total    = $getTotal;
          $nletter->mid_range      = $setting["adminpagemid"];
          $nletter->items_per_page = $setting["adminpageitem"];
          $nletter->envo_get_page   = $page1;
          $nletter->envo_where      = 'index.php?p=newsletter';
          $nletter->paginate();
          $ENVO_PAGINATE = $nletter->display_pages();
        }

        // Newsletter
        $ENVO_NEWSLETTER_ALL = envo_get_page_info($envotable, $nletter->limit);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tlnl["newsletter_sec_title"]["nlt"];
        $SECTION_DESC  = $tlnl["newsletter_sec_desc"]["nld"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $plugin_template = $SHORT_PLUGIN_URL_TEMPLATE . 'newsletter.php';
    }
}

?>