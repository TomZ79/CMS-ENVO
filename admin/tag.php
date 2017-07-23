<?php

// EN: Check if the file is accessed only via index.php if not stop the script from running
// CZ: Kontrola, zdali je soubor přístupný pouze přes index.php - pokud ne ukončí se script
if (!defined('JAK_ADMIN_PREVENT_ACCESS')) die($tl['general_error']['generror40']);

// EN: Check if the user has access to this file
// CZ: Kontrola, zdali má uživatel přístup k tomuto souboru
if (!JAK_USERID || !$jakuser->jakModuleaccess(JAK_USERID, JAK_ACCESSTAGS)) envo_redirect(BASE_URL);

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'tags';
$envotable1 = DB_PREFIX . 'tagcloud';
$envotable2 = DB_PREFIX . 'pagesgrid';
$envotable3 = DB_PREFIX . 'pluginhooks';

// EN: Switching access all pages by page name
// CZ: Přepínání přístupu všech stránek podle názvu stránky
switch ($page1) {
  case 'cloud':

    // Important template Stuff
    $JAK_TAGCLOUD = envo_admin_tag_cloud();

    switch ($page2) {
      case 'delete':

        if (envo_field_not_exist($page3, $envotable1, 'tag')) {

          $result  = $jakdb->query('DELETE FROM ' . $envotable1 . ' WHERE tag = "' . smartsql($page3) . '"');
          $result1 = $jakdb->query('DELETE FROM ' . $envotable . ' WHERE tag = "' . smartsql($page3) . '"');

          if (!$result || !$result1) {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - chybné
            envo_redirect(BASE_URL . 'index.php?p=tags&sp=cloud&status=e');
          } else {
            // EN: Redirect page
            // CZ: Přesměrování stránky s notifikací - úspěšné
            /*
            NOTIFIKACE:
            'status=s'    - Záznam úspěšně uložen
            'status1=s1'  - Záznam úspěšně odstraněn
            */
            envo_redirect(BASE_URL . 'index.php?p=tags&sp=cloud&status=s&status1=s1');
          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=tags&sp=cloud&status=ene');
        }

        break;
      default:
        define('TAG_DELETE_CLOUD', $tl['tag_notification']['delall']);

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["tag_sec_title"]["tagt1"];
        $SECTION_DESC  = $tl["tag_sec_desc"]["tagd1"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'tagcloud.php';
    }

    break;
  case 'setting':

    // EN: Import important settings for the template from the DB
    // CZ: Importuj důležité nastavení pro šablonu z DB
    $JAK_SETTING = envo_get_setting('tags');

    // EN: Import important settings for the template from the DB (only VALUE)
    // CZ: Importuj důležité nastavení pro šablonu z DB (HODNOTY)
    $JAK_SETTING_VAL = envo_get_setting_val('tags');

    // Let's go on with the script
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (!is_numeric($defaults['jak_limit'])) {
        $errors['e1'] = $tl['general_error']['generror27'] . '<br>';
      }

      if (!is_numeric($defaults['jak_min'])) {
        $errors['e2'] = $tl['general_error']['generror27'] . '<br>';
      }

      if (!is_numeric($defaults['jak_max'])) {
        $errors['e3'] = $tl['general_error']['generror27'] . '<br>';
      }

      if (count($errors) == 0) {

        /* EN: Convert value
         * smartsql - secure method to insert form data into a MySQL DB
         * ------------------
         * CZ: Převod hodnot
         * smartsql - secure method to insert form data into a MySQL DB
        */
        $result = $jakdb->query('UPDATE ' . DB_PREFIX . 'setting SET value = CASE varname
                    WHEN "tagtitle" THEN "' . smartsql($defaults['jak_title']) . '"
                    WHEN "tagdesc" THEN "' . smartsql($defaults['jak_lcontent']) . '"
                    WHEN "taglimit" THEN "' . smartsql($defaults['jak_limit']) . '"
                    WHEN "tagminfont" THEN "' . smartsql($defaults['jak_min']) . '"
                    WHEN "tagmaxfont" THEN "' . smartsql($defaults['jak_max']) . '"
                  END
                  WHERE varname IN ("tagtitle", "tagdesc", "taglimit", "tagminfont", "tagmaxfont")');

        // Save order for sidebar widget
        if (isset($defaults['jak_hookshow_new']) && is_array($defaults['jak_hookshow_new'])) {

          $exorder = $defaults['horder_new'];
          $hookid  = $defaults['real_hook_id_new'];
          $plugind = $defaults['sreal_plugin_id_new'];
          $doith   = array_combine($hookid, $exorder);
          $pdoith  = array_combine($hookid, $plugind);

          foreach ($doith as $key => $exorder) {

            if (in_array($key, $defaults['jak_hookshow_new'])) {

              // Get the real what id
              $whatid = 0;
              if (isset($defaults['whatid_' . $pdoith[$key]])) $whatid = $defaults['whatid_' . $pdoith[$key]];

              $jakdb->query('INSERT INTO ' . $envotable2 . ' SET plugin = 3, hookid = "' . smartsql($key) . '", pluginid = "' . smartsql($pdoith[$key]) . '", whatid = "' . smartsql($whatid) . '", orderid = "' . smartsql($exorder) . '"');

            }

          }

        }

        // Now check if all the sidebar a deselct and hooks exist, if so delete all associated to this page
        if (!isset($defaults['jak_hookshow_new']) && !isset($defaults['jak_hookshow'])) {

          // Now check if all the sidebar a deselected and hooks exist, if so delete all associated to this page
          $row = $jakdb->queryRow('SELECT id FROM ' . $envotable2 . ' WHERE plugin = 3 AND hookid != 0');

          // We have something to delete
          if ($row["id"]) {
            $jakdb->query('DELETE FROM ' . $envotable2 . ' WHERE plugin = 3 AND hookid != 0');
          }

        }

        // Save order or delete for extra sidebar widget
        if (isset($defaults['jak_hookshow']) && is_array($defaults['jak_hookshow'])) {

          $exorder    = $defaults['horder'];
          $hookid     = $defaults['real_hook_id'];
          $hookrealid = implode(',', $defaults['real_hook_id']);
          $doith      = array_combine($hookid, $exorder);

          // Reset update
          $updatesql = $updatesql1 = "";

          // Run the foreach for the hooks
          foreach ($doith as $key => $exorder) {

            // Get the real what id
            $result = $jakdb->query('SELECT pluginid FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '" AND hookid != 0');
            $row    = $result->fetch_assoc();

            // Get the whatid
            $whatid = 0;
            if (isset($defaults['whatid_' . $row["pluginid"]])) $whatid = $defaults['whatid_' . $row["pluginid"]];

            if (in_array($key, $defaults['jak_hookshow'])) {
              $updatesql .= sprintf("WHEN %d THEN %d ", $key, $exorder);
              $updatesql1 .= sprintf("WHEN %d THEN %d ", $key, $whatid);

            } else {
              $jakdb->query('DELETE FROM ' . $envotable2 . ' WHERE id = "' . smartsql($key) . '"');
            }
          }

          $jakdb->query('UPDATE ' . $envotable2 . ' SET orderid = CASE id
					' . $updatesql . '
					END
					WHERE id IN (' . $hookrealid . ')');

          $jakdb->query('UPDATE ' . $envotable2 . ' SET whatid = CASE id
					' . $updatesql1 . '
					END
					WHERE id IN (' . $hookrealid . ')');

        }

        if (!$result) {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=tags&sp=setting&status=e');
        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=tags&sp=setting&status=s');
        }
      } else {

        $errors['e'] = $tl['general_error']['generror'] . '<br>';
        $errors      = $errors;
      }
    }

    // Get the sort orders for the grid
    $grid = $jakdb->query('SELECT id, hookid, whatid, orderid FROM ' . $envotable2 . ' WHERE plugin = 3 ORDER BY orderid ASC');
    while ($grow = $grid->fetch_assoc()) {
      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $JAK_PAGE_GRID[] = $grow;
    }

    // Get the sidebar templates
    $result = $jakdb->query('SELECT id, name, widgetcode, exorder, pluginid FROM ' . $envotable3 . ' WHERE hook_name = "tpl_sidebar" AND active = 1 ORDER BY exorder ASC');
    while ($row = $result->fetch_assoc()) {
      $JAK_HOOKS[] = $row;
    }

    // EN: Get all the php Hook by name of Hook
    // CZ: Načtení všech php dat z Hook podle jména Hook
    $JAK_FORM_DATA = array();
    $hookpagei     = $jakhooks->jakGethook("php_admin_pages_news_info");
    if ($hookpagei) {
      foreach ($hookpagei as $hpagi) {
        eval($hpagi['phpcode']);
      }
    }

    // EN: Title and Description
    // CZ: Titulek a Popis
    $SECTION_TITLE = $tl["tag_sec_title"]["tagt2"];
    $SECTION_DESC  = $tl["tag_sec_desc"]["tagd2"];

    // EN: Load the php template
    // CZ: Načtení php template (šablony)
    $template = 'tagsetting.php';

    break;
  default:

    // Let's go on with the script
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['jak_delete_tag'])) {
      // EN: Default Variable
      // CZ: Hlavní proměnné
      $defaults = $_POST;

      if (isset($defaults['delete'])) {

        $tags = $defaults['jak_delete_tag'];

        for ($i = 0; $i < count($tags); $i++) {
          $tag = $tags[$i];
          JAK_tags::jakDeleteonetag($tag);
        }

        // EN: Redirect page
        // CZ: Přesměrování stránky s notifikací - úspěšné
        /*
        NOTIFIKACE:
        'status=s'   - Záznam úspěšně uložen
        'status1=s1'  - Záznam úspěšně odstraněn
        */
        envo_redirect(BASE_URL . 'index.php?p=tags&status=s&status1=s1');

      }
    }

    switch ($page1) {
      case 'sort':

        if ($page2 == 'pluginid') {
          $bu = 'pluginid';

          $getTotal = envo_get_total($envotable, $page3, $bu, '');

          // Paginator
          if ($getTotal != 0) {

            $tags                 = new JAK_Paginator;
            $tags->items_total    = $getTotal;
            $tags->mid_range      = $jkv["adminpagemid"];
            $tags->items_per_page = $jkv["adminpageitem"];
            $tags->jak_get_page   = $page4;
            $tags->jak_where      = 'index.php?p=tags&sp=sort&ssp=' . $page2 . '&sssp=' . $page3;
            $tags->paginate();
            $JAK_PAGINATE = $tags->display_pages();

            $JAK_TAG_ALL = envo_get_tag($tags->limit, $page3, $jakplugins->jakAdmintag(), FALSE);

          }

        } elseif ($page2 == 'tag') {

          $getTotal = envo_get_total($envotable, '', '', '');

          $sortoder = 'tag ASC';
          if ($page3 == 'DESC') $sortoder = 'tag DESC';

          // Paginator
          if ($getTotal != 0) {

            $tags                 = new JAK_Paginator;
            $tags->items_total    = $getTotal;
            $tags->mid_range      = $jkv["adminpagemid"];
            $tags->items_per_page = $jkv["adminpageitem"];
            $tags->jak_get_page   = $page4;
            $tags->jak_where      = 'index.php?p=tags&sp=sort&ssp=' . $page2 . '&sssp=' . $page3;
            $tags->paginate();
            $JAK_PAGINATE = $tags->display_pages();

            $JAK_TAG_ALL = envo_get_tag($tags->limit, FALSE, $jakplugins->jakAdmintag(), $sortoder);

          }

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=tags');
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["tag_sec_title"]["tagt3"];
        $SECTION_DESC  = $tl["tag_sec_desc"]["tagd3"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'tag.php';

        break;
      case 'lock':

        if (is_numeric($page2)) {

          JAK_tags::jakLocktag($page2);

          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=tags&status=s');

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=tags&status=ene');
        }

        break;
      case 'delete':
        if (envo_row_exist($page2, $envotable)) {

          JAK_tags::jakDeleteonetag($page2);

          // EN: Redirect page
          // CZ: Přesměrování stránky s notifikací - úspěšné
          /*
          NOTIFIKACE:
          'status=s'   - Záznam úspěšně uložen
          'status1=s'  - Záznam úspěšně odstraněn
          */
          envo_redirect(BASE_URL . 'index.php?p=tags&status=s&status=s');

        } else {
          // EN: Redirect page
          // CZ: Přesměrování stránky
          envo_redirect(BASE_URL . 'index.php?p=tags&status=ene');
        }
        break;
      default:

        // Important template Stuff
        $getTotal = envo_get_total($envotable, '', '', '');
        // Paginator
        if ($getTotal != 0) {
          $tags                 = new JAK_Paginator;
          $tags->items_total    = $getTotal;
          $tags->mid_range      = $jkv["adminpagemid"];
          $tags->items_per_page = $jkv["adminpageitem"];
          $tags->jak_get_page   = $page1;
          $tags->jak_where      = 'index.php?p=tags';
          $tags->paginate();
          $JAK_PAGINATE = $tags->display_pages();

          $JAK_TAG_ALL = envo_get_tag($tags->limit, FALSE, $jakplugins->jakAdmintag(), FALSE);
        }

        // EN: Title and Description
        // CZ: Titulek a Popis
        $SECTION_TITLE = $tl["tag_sec_title"]["tagt"];
        $SECTION_DESC  = $tl["tag_sec_desc"]["tagd"];

        // EN: Load the php template
        // CZ: Načtení php template (šablony)
        $template = 'tag.php';
    }
}
?>