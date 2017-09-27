<?php

/**
 * EN: Protected url names
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @return bool
 *
 */
function envo_varname_blocked($envovar)
{
  $blocked = 'user,usergroup,admin,cmsfiles,css,class,img,include,js,lang,pics_gallery,ftp,plugin,profilepicture,template,userfiles,videofiles,search,suche,' . ENVO_FILES_DIRECTORY;
  $blockarray = explode(',', $blocked);
  // check if userid is protected in the config.php
  if (in_array($envovar, $blockarray)) {
    return true;
  }
}

/**
 * EN: Get the not used Categories out the database
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @return array
 *
 */
function envo_get_cat_notused()
{
  global $envodb;
  $categories = array();
  $result = $envodb->query('SELECT id, name FROM ' . DB_PREFIX . 'categories' . ' WHERE pageid = 0 AND pluginid = 0 AND (exturl = "" OR exturl IS NULL)');
  while ($row = $result->fetch_assoc()) {
    $categories[] = array('id' => $row['id'], 'name' => $row['name']);
  }
  if (!empty($categories)) return $categories;
}

/**
 * EN: Get the categories per array with no limit
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @param $envovar1
 * @return array
 *
 */
function envo_get_cat_info($envovar, $envovar1)
{
  global $envodb;

  $sqlwhere = '';
  if (!empty($envovar1)) $sqlwhere = ' WHERE activeplugin = 1';

  $envodata = array();
  $result = $envodb->query('SELECT * FROM ' . $envovar . $sqlwhere . ' ORDER BY catorder ASC');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }
  if (isset($envodata)) return $envodata;
}

/**
 * EN: Get the usergroup per array with no limit
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @return array
 *
 */
function envo_get_usergroup_all($envovar)
{
  global $envodb;
  $envodata = array();
  $result = $envodb->query('SELECT id, name, description FROM ' . DB_PREFIX . $envovar . ' ORDER BY id ASC');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  return $envodata;
}

/**
 * EN: Get count of the user in each usergroup
 *      - each user have ID of usergroup (column 'usergroupid')
 *
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param    string      | $usertable      - Název tabulky s uloženými uživately
 * @param    string      | $usergroupID    - ID uživatelské skupiny
 *
 * @return    string
 *
 */
function envo_get_count_user_in_group($usertable, $usergroupID)
{
  global $envodb;
  $result=$envodb->query('SELECT COUNT(usergroupid) AS total FROM ' . DB_PREFIX . $usertable . ' WHERE usergroupid = ' . $usergroupID . ' ');
  $data=$result->fetch_assoc();

  $envodata = $data['total'];

  return $envodata;
}

/**
 * EN: Get the data per array for page,newsletter with limit
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @param $envovar1
 * @return array
 *
 */
function envo_get_page_info($envovar, $envovar1)
{
  global $envodb;
  $envodata = array();
  $result = $envodb->query('SELECT * FROM ' . $envovar . ' ORDER BY id DESC ' . $envovar1);
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  if (!empty($envodata)) return $envodata;
}

/**
 * EN: Get the data per array for news with limit
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @return array
 *
 */
function envo_get_news_info($envovar)
{
  global $envodb;
  $envodata = array();
  $result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'news' . ' ORDER BY id ASC ' . $envovar);
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  return $envodata;
}

/**
 * EN: Get the data per array for event comments with limit
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $limit
 * @param $id
 * @param $plugin
 * @param $order
 * @return array
 *
 */
function envo_get_tag($limit, $id, $plugin, $order)
{

  $sqlwhere = '';
  $pluginname = '<i class="fa fa-file-text-o"></i>';
  if (!empty($id)) $sqlwhere = ' WHERE pluginid = "' . smartsql($id) . '"';

  $ordersql = ' ORDER BY tag ASC ';
  if (!empty($order)) $ordersql = ' ORDER BY ' . $order . ' ';

  global $envodb;
  $envodata = array();
  $result = $envodb->query('SELECT id, tag, pluginid, active FROM ' . DB_PREFIX . 'tags' . $sqlwhere . $ordersql . $limit);
  while ($row = $result->fetch_assoc()) {

    foreach ($plugin as $p) {
      if ($p['id'] == $row['pluginid']) $pluginname = $p['name'];
    }

    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = array('id' => $row['id'], 'tag' => $row['tag'], 'active' => $row['active'], 'pluginid' => $row['pluginid'], 'plugin' => $pluginname);
  }

  return $envodata;
}

/**
 * EN: Search for style files in the site folder, only choose folders.
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $styledir
 * @return array
 *
 */
function envo_get_site_style($styledir)
{

  // Check if folder exist
  if (is_readable($styledir)) {
    // Open folder
    if ($handle = opendir($styledir)) {
      // If folder isn't empty - loop directory
      if (count(glob("$styledir/*")) > 0) {
        /* This is the correct way to loop over the directory. */
        while (false !== ($template = readdir($handle))) {
          if ($template != '.' && $template != '..' && is_dir($styledir . '/' . $template)) {
            $getstyle[] = $template;

          }
        }

        sort($getstyle); // Sort style by alphabet
        return $getstyle;
      }

      clearstatcache();
      closedir($handle);
    }
  }
}

/**
 * EN: Get all user out the database limited with the paginator
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @param $envovar1
 * @param $envovar2
 * @return array
 *
 */
function envo_get_user_all($envovar, $envovar1, $envovar2)
{

  $sqlwhere = '';
  if (!empty($envovar2)) $sqlwhere = 'AND usergroupid = ' . smartsql($envovar2) . ' ';

  global $envodb;
  $user = array();
  $result = $envodb->query('SELECT id, usergroupid, username, email, time, access FROM ' . DB_PREFIX . $envovar . ' WHERE access <= 1 ' . $sqlwhere . $envovar1);
  while ($row = $result->fetch_assoc()) {
    $user[] = array('id' => $row['id'], 'usergroupid' => $row['usergroupid'], 'username' => $row['username'], 'email' => $row['email'], 'time' => $row['time'], 'access' => $row['access']);
  }

  return $user;
}

/**
 * EN: Get all user or pages out the database limited with the paginator
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @param $envovar1
 * @param $envovar2
 * @return array
 *
 */
function envo_admin_search($envovar, $envovar1, $envovar2)
{

  $sqlwhere = '';
  if ($envovar2 == 'user') {
    $sqlwhere = ' WHERE id like "%' . $envovar . '%" OR username like "%' . $envovar . '%" OR name like "%' . $envovar . '%" OR email like "%' . $envovar . '%"';
  } elseif ($envovar2 == 'newsletter') {
    $sqlwhere = ' WHERE id like "%' . $envovar . '%" or email like "%' . $envovar . '%"';
  } elseif ($envovar2 == 'pages') {
    $sqlwhere = ' WHERE title like "%' . $envovar . '%"';
  }
  global $envodb;
  $envodata = array();
  $result = $envodb->query('SELECT * FROM ' . $envovar1 . $sqlwhere . ' ORDER BY id ASC LIMIT 5');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  return $envodata;
}

/**
 * EN: Check if user exist and it is possible to delete ## (config.php)
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @return bool
 *
 */
function envo_user_exist_deletable($envovar)
{
  global $envodb;
  $useridarray = explode(',', ENVO_SUPERADMIN);
  // check if userid is protected in the config.php
  if (in_array($envovar, $useridarray)) {
    return false;
  } else {
    $result = $envodb->query('SELECT id FROM ' . DB_PREFIX . 'user WHERE id = "' . smartsql($envovar) . '" LIMIT 1');
    if ($envodb->affected_rows > 0) return true;
  }
}

/**
 * EN: Check if row exist with id
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @param $envovar1
 * @param $envovar2
 * @param $envovar3
 * @return bool
 *
 */
function envo_field_not_exist_id($envovar, $envovar1, $envovar2, $envovar3)
{
  global $envodb;
  $result = $envodb->query('SELECT id FROM ' . $envovar2 . ' WHERE id != "' . smartsql($envovar1) . '" AND ' . $envovar3 . ' = "' . smartsql($envovar) . '" LIMIT 1');
  if ($envodb->affected_rows > 0) {
    return true;
  }
}

/* TAG SYSTEM
============================================================*/

/**
 * EN: Get tags per id
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @param $envovar1
 * @return bool|string
 *
 */
function envo_get_tags($envovar, $envovar1)
{

  global $envodb;
  $tags = array();
  $result = $envodb->query('SELECT id, tag FROM ' . DB_PREFIX . 'tags' . ' WHERE itemid = ' . smartsql($envovar) . ' AND pluginid = ' . $envovar1 . ' ORDER BY `id` ASC');

  while ($row = $result->fetch_assoc()) {
    $tags[] = '<span class="label label-default fancy-checkbox" style="line-height:2.2;margin:0 10px 10px 0px;"><label class="checkbox-inline"><input type="checkbox" name="envo_tagdelete[]" value="' . $row['id'] . '" /><i class="fa fa-square-o fa-sm unchecked"></i><i class="fa fa-check-square-o fa-sm checked"></i> ' . $row['tag'] . '</label></span>';
  }

  if (!empty($tags)) {
    $taglist = join("", $tags);

    return $taglist;
  } else {
    return false;
  }
}

/**
 * EN: Tag cloud data
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @return array
 *
 */
function envo_tag_data_admin()
{

  global $envodb;
  $cloud = array();
  $result = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'tagcloud' . ' GROUP BY tag ORDER BY count DESC');
  while ($row = $result->fetch_assoc()) {
    $cloud[$row['tag']] = $row['count'];
  }
  if (!empty($cloud)) {
    ksort($cloud);

    return $cloud;
  }
}

/**
 * EN: Tag cloud name
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @return array
 *
 */
function envo_tag_name_admin()
{

  global $envodb;
  $cloud = array();
  $result = $envodb->query('SELECT tag FROM ' . DB_PREFIX . 'tagcloud' . ' ORDER BY tag ASC');
  while ($row = $result->fetch_assoc()) {
    $cloud[] = $row;
  }
  if (!empty($cloud)) {
    return $cloud;
  }
}

/**
 * EN: Create tag cloud
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @return string
 *
 */
function envo_admin_tag_cloud()
{

  // Default font sizes
  $min_font_size = 12;
  $max_font_size = 30;
  $cloud_html = '';

  // Pull in tag data
  $tags = envo_tag_data_admin();
  if ($tags) {
    $minimum_count = min(array_values($tags));
    $maximum_count = max(array_values($tags));
    $spread = $maximum_count - $minimum_count;

    if ($spread == 0) {
      $spread = 1;
    }

    $cloud_tags = array(); // create an array to hold tag code
    foreach ($tags as $tag => $count) {
      $size = $min_font_size + ($count - $minimum_count)
        * ($max_font_size - $min_font_size) / $spread;
      $cloud_tags[] = '<span class="label label-default" style="line-height:2;font-size: ' . floor($size) . 'px;'
        . '" class="tagcloud">'
        . htmlspecialchars(stripslashes($tag)) . ' <a href="index.php?p=tags&sp=cloud&ssp=delete&sssp=' . $tag . '" data-confirm="Delete this Tag?"><i class="fa fa-trash-o"></i></a></span>';
    }
    $cloud_html = join(" ", $cloud_tags);
  }

  return $cloud_html;
}

/**
 * EN: Get contact options
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @param $envovar1
 * @return array
 *
 */
function envo_get_contact_options($envovar, $envovar1)
{

  global $envodb;
  $envodata = array();
  $result = $envodb->query('SELECT * FROM ' . $envovar . ' WHERE formid = "' . smartsql($envovar1) . '" ORDER BY forder ASC');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  return $envodata;
}

/**
 * EN: Get contact options
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @param $envovar1
 * @return mixed
 *
 */
function envo_get_new_stuff($envovar, $envovar1)
{
  if ($envovar1 == 1) {
    $sqlwhere = ' WHERE session = "" AND access = 0';
  } else {
    $sqlwhere = ' WHERE approve = 0 AND session != ""';
  }

  global $envodb;
  $row = $envodb->queryRow('SELECT COUNT(id) as totalAll FROM ' . DB_PREFIX . $envovar . $sqlwhere . ' ORDER BY time DESC');

  return $row['totalAll'];
}

/**
 * EN: Load the version from CMS
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @return SimpleXMLElement
 *
 */
function envo_load_xml_from_url($envovar)
{
  return simplexml_load_string(envo_load_file_from_url($envovar));
}

/**
 * EN:
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @return mixed
 *
 */
function envo_load_file_from_url($envovar)
{
  $curl = curl_init();
  curl_setopt($curl, CURLOPT_URL, $envovar);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($curl, CURLOPT_REFERER, BASE_URL);
  $str = curl_exec($curl);
  curl_close($curl);

  return $str;
}

/**
 * EN: Parse the xml into an array
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $arrObjData
 * @param array $arrSkipIndices
 * @return array
 *
 */
function envo_objectsIntoArray($arrObjData, $arrSkipIndices = array())
{
  $arrData = array();

  // if input is object, convert into array
  if (is_object($arrObjData)) {
    $arrObjData = get_object_vars($arrObjData);
  }

  if (is_array($arrObjData)) {
    foreach ($arrObjData as $index => $value) {
      if (is_object($value) || is_array($value)) {
        $value = objectsIntoArray($value, $arrSkipIndices); // recursive call
      }
      if (in_array($index, $arrSkipIndices)) {
        continue;
      }
      $arrData[$index] = $value;
    }
  }

  return $arrData;
}

/**
 * EN: Menu builder function, parentId 0 is the root
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $parent
 * @param $menu
 * @param $lang
 * @param $title1
 * @param $title2
 * @param $title3
 * @param $title4
 * @param $title5
 * @param string $class
 * @param string $id
 * @return string
 *
 */
function envo_build_menu_admin($parent, $menu, $lang, $title1, $title2, $title3, $title4, $title5, $class = "", $id = "")
{
  $html = "";
  if (isset($menu['parents'][$parent])) {
    $html .= "
      <ul" . $class . $id . ">\n";
    foreach ($menu['parents'][$parent] as $itemId) {
      // Build menu for categories header and header/footer
      if (!isset($menu['parents'][$itemId])) {
        $html .= '<li id="menuItem_' . $menu["items"][$itemId]["id"] . '" class="envocat">
          		<div>
          		<span class="text"><span class="textid">#' . $menu["items"][$itemId]["id"] . '</span><a href="index.php?p=categories&amp;sp=edit&amp;ssp=' . $menu["items"][$itemId]["id"] . '">' . $menu["items"][$itemId]["name"] . '</a></span>
          		<span class="actions">
          			' . ($menu["items"][$itemId]["pluginid"] == 0 && $menu["items"][$itemId]["pageid"] == 0 && $menu["items"][$itemId]["exturl"] == '' ? '<a class="btn btn-default btn-xs" href="index.php?p=page&amp;sp=newpage&amp;ssp=' . $menu["items"][$itemId]["id"] . '" data-toggle="tooltip" data-placement="bottom" title="' . $title1 . '"><i class="fa fa-sticky-note-o"></i></a>' : '') . '
          			' . ($menu["items"][$itemId]["pluginid"] == 0 && $menu["items"][$itemId]["pageid"] != 0 && $menu["items"][$itemId]["exturl"] == '' ? '<a class="btn btn-default btn-xs" href="index.php?p=page&amp;sp=edit&amp;ssp=' . $menu["items"][$itemId]["pageid"] . '" data-toggle="tooltip" data-placement="bottom" title="' . $title2 . '"><i class="fa fa-pencil"></i></a>' : '') . '
          			' . ($menu["items"][$itemId]["pluginid"] > 0 && $menu["items"][$itemId]["exturl"] == '' ? '<a class="btn btn-info btn-xs" href="javascript:void(0)" data-toggle="tooltip" data-placement="bottom" title="' . $title3 . '"><i class="fa fa-eyedropper"></i></a>' : '') . '
          			' . ($menu["items"][$itemId]["exturl"] != '' ? '<i class="fa fa-link"></i>' : '') . '
          			
          			<a class="btn btn-default btn-xs" href="index.php?p=categories&amp;sp=edit&amp;ssp=' . $menu["items"][$itemId]["id"] . '" data-toggle="tooltip" data-placement="bottom" title="' . $title4 . '"><i class="fa fa-edit"></i></a>
          			' . ($menu["items"][$itemId]["pluginid"] == 0 && $menu["items"][$itemId]["id"] != 1 ? '<a class="btn btn-danger btn-xs" href="index.php?p=categories&amp;sp=delete&amp;ssp=' . $menu["items"][$itemId]["id"] . '" data-confirm="' . $lang . '" data-toggle="tooltip" data-placement="bottom" title="' . $title5 . '"><i class="fa fa-trash-o" ></i></a>' : '') . '
          		</span></div></li>';
      }

      // Build menu for ...
      if (isset($menu['parents'][$itemId])) {
        $html .= '<li id="menuItem_' . $menu["items"][$itemId]["id"] . '" class="envocat">
          		<div>
          		<span class="text"><span class="textid">#' . $menu["items"][$itemId]["id"] . '</span><a href="index.php?p=categories&amp;sp=edit&amp;ssp=' . $menu["items"][$itemId]["id"] . '">' . $menu["items"][$itemId]["name"] . '</a></span>
          		<span class="actions">
          			' . ($menu["items"][$itemId]["pluginid"] == 0 && $menu["items"][$itemId]["pageid"] == 0 && $menu["items"][$itemId]["exturl"] == '' ? '<a class="btn btn-default btn-xs" href="index.php?p=page&amp;sp=newpage&amp;ssp=' . $menu["items"][$itemId]["id"] . '" data-toggle="tooltip" data-placement="bottom" title="' . $title1 . '"><i class="fa fa-sticky-note-o"></i></a>' : '') . '
          			' . ($menu["items"][$itemId]["pluginid"] == 0 && $menu["items"][$itemId]["pageid"] != 0 && $menu["items"][$itemId]["exturl"] == '' ? '<a class="btn btn-default btn-xs" href="index.php?p=page&amp;sp=edit&amp;ssp=' . $menu["items"][$itemId]["pageid"] . '" data-toggle="tooltip" data-placement="bottom" title="' . $title2 . '"><i class="fa fa-pencil"></i></a>' : '') . '
          			' . ($menu["items"][$itemId]["pluginid"] > 0 && $menu["items"][$itemId]["exturl"] == '' ? '<i class="fa fa-eyedropper"></i>' : '') . '
          			' . ($menu["items"][$itemId]["exturl"] != '' ? '<i class="fa fa-link"></i>' : '') . '
          			
          			<a class="btn btn-default btn-xs" href="index.php?p=categories&amp;sp=edit&amp;ssp=' . $menu["items"][$itemId]["id"] . '" data-toggle="tooltip" data-placement="bottom" title="' . $title4 . '"><i class="fa fa-edit"></i></a>
          			' . ($menu["items"][$itemId]["pluginid"] == 0 && $menu["items"][$itemId]["id"] != 1 ? '<a class="btn btn-danger btn-xs" href="#" data-toggle="tooltip" data-placement="bottom" title="' . $title5 . '" disabled><i class="fa fa-trash-o"></i></a>' : '') . '
          		</span>
          		</div>';
        $html .= envo_build_menu_admin($itemId, $menu, $lang, $title1, $title2, $title3, $title4, $title5);
        $html .= "</li> \n";
      }
    }
    $html .= "</ul> \n";
  }

  return $html;
}


/**
 * Create a web friendly URL slug from a string.
 *
 * Although supported, transliteration is discouraged because
 *     1) most web browsers support UTF-8 characters in URLs
 *     2) transliteration causes a loss of information
 *
 * @author Sean Murphy <sean@iamseanmurphy.com>
 * @license http://creativecommons.org/publicdomain/zero/1.0/
 *
 * @param string $str
 * @param array $options
 * @return string
 */
function url_slug($str, $options = array())
{
  // Make sure string is in UTF-8 and strip invalid UTF-8 characters
  $str = mb_convert_encoding((string)$str, 'UTF-8', mb_list_encodings());

  $defaults = array(
    'delimiter' => '-',
    'limit' => NULL,
    'lowercase' => true,
    'replacements' => array(),
    'transliterate' => false,
  );

  // Merge options
  $options = array_merge($defaults, $options);

  $char_map = array(
    // Latin
    'À' => 'A', 'Á' => 'A', 'Â' => 'A', 'Ã' => 'A', 'Ä' => 'A', 'Å' => 'A', 'Æ' => 'AE', 'Ç' => 'C',
    'È' => 'E', 'É' => 'E', 'Ê' => 'E', 'Ë' => 'E', 'Ì' => 'I', 'Í' => 'I', 'Î' => 'I', 'Ï' => 'I',
    'Ð' => 'D', 'Ñ' => 'N', 'Ò' => 'O', 'Ó' => 'O', 'Ô' => 'O', 'Õ' => 'O', 'Ö' => 'O', 'Ő' => 'O',
    'Ø' => 'O', 'Ù' => 'U', 'Ú' => 'U', 'Û' => 'U', 'Ü' => 'U', 'Ű' => 'U', 'Ý' => 'Y', 'Þ' => 'TH',
    'ß' => 'ss',
    'à' => 'a', 'á' => 'a', 'â' => 'a', 'ã' => 'a', 'ä' => 'a', 'å' => 'a', 'æ' => 'ae', 'ç' => 'c',
    'è' => 'e', 'é' => 'e', 'ê' => 'e', 'ë' => 'e', 'ì' => 'i', 'í' => 'i', 'î' => 'i', 'ï' => 'i',
    'ð' => 'd', 'ñ' => 'n', 'ò' => 'o', 'ó' => 'o', 'ô' => 'o', 'õ' => 'o', 'ö' => 'o', 'ő' => 'o',
    'ø' => 'o', 'ù' => 'u', 'ú' => 'u', 'û' => 'u', 'ü' => 'u', 'ű' => 'u', 'ý' => 'y', 'þ' => 'th',
    'ÿ' => 'y',
    // Latin symbols
    '©' => '(c)',
    // Greek
    'Α' => 'A', 'Β' => 'B', 'Γ' => 'G', 'Δ' => 'D', 'Ε' => 'E', 'Ζ' => 'Z', 'Η' => 'H', 'Θ' => '8',
    'Ι' => 'I', 'Κ' => 'K', 'Λ' => 'L', 'Μ' => 'M', 'Ν' => 'N', 'Ξ' => '3', 'Ο' => 'O', 'Π' => 'P',
    'Ρ' => 'R', 'Σ' => 'S', 'Τ' => 'T', 'Υ' => 'Y', 'Φ' => 'F', 'Χ' => 'X', 'Ψ' => 'PS', 'Ω' => 'W',
    'Ά' => 'A', 'Έ' => 'E', 'Ί' => 'I', 'Ό' => 'O', 'Ύ' => 'Y', 'Ή' => 'H', 'Ώ' => 'W', 'Ϊ' => 'I',
    'Ϋ' => 'Y',
    'α' => 'a', 'β' => 'b', 'γ' => 'g', 'δ' => 'd', 'ε' => 'e', 'ζ' => 'z', 'η' => 'h', 'θ' => '8',
    'ι' => 'i', 'κ' => 'k', 'λ' => 'l', 'μ' => 'm', 'ν' => 'n', 'ξ' => '3', 'ο' => 'o', 'π' => 'p',
    'ρ' => 'r', 'σ' => 's', 'τ' => 't', 'υ' => 'y', 'φ' => 'f', 'χ' => 'x', 'ψ' => 'ps', 'ω' => 'w',
    'ά' => 'a', 'έ' => 'e', 'ί' => 'i', 'ό' => 'o', 'ύ' => 'y', 'ή' => 'h', 'ώ' => 'w', 'ς' => 's',
    'ϊ' => 'i', 'ΰ' => 'y', 'ϋ' => 'y', 'ΐ' => 'i',
    // Turkish
    'Ş' => 'S', 'İ' => 'I', 'Ç' => 'C', 'Ü' => 'U', 'Ö' => 'O', 'Ğ' => 'G',
    'ş' => 's', 'ı' => 'i', 'ç' => 'c', 'ü' => 'u', 'ö' => 'o', 'ğ' => 'g',
    // Russian
    'А' => 'A', 'Б' => 'B', 'В' => 'V', 'Г' => 'G', 'Д' => 'D', 'Е' => 'E', 'Ё' => 'Yo', 'Ж' => 'Zh',
    'З' => 'Z', 'И' => 'I', 'Й' => 'J', 'К' => 'K', 'Л' => 'L', 'М' => 'M', 'Н' => 'N', 'О' => 'O',
    'П' => 'P', 'Р' => 'R', 'С' => 'S', 'Т' => 'T', 'У' => 'U', 'Ф' => 'F', 'Х' => 'H', 'Ц' => 'C',
    'Ч' => 'Ch', 'Ш' => 'Sh', 'Щ' => 'Sh', 'Ъ' => '', 'Ы' => 'Y', 'Ь' => '', 'Э' => 'E', 'Ю' => 'Yu',
    'Я' => 'Ya',
    'а' => 'a', 'б' => 'b', 'в' => 'v', 'г' => 'g', 'д' => 'd', 'е' => 'e', 'ё' => 'yo', 'ж' => 'zh',
    'з' => 'z', 'и' => 'i', 'й' => 'j', 'к' => 'k', 'л' => 'l', 'м' => 'm', 'н' => 'n', 'о' => 'o',
    'п' => 'p', 'р' => 'r', 'с' => 's', 'т' => 't', 'у' => 'u', 'ф' => 'f', 'х' => 'h', 'ц' => 'c',
    'ч' => 'ch', 'ш' => 'sh', 'щ' => 'sh', 'ъ' => '', 'ы' => 'y', 'ь' => '', 'э' => 'e', 'ю' => 'yu',
    'я' => 'ya',
    // Ukrainian
    'Є' => 'Ye', 'І' => 'I', 'Ї' => 'Yi', 'Ґ' => 'G',
    'є' => 'ye', 'і' => 'i', 'ї' => 'yi', 'ґ' => 'g',
    // Czech
    'Č' => 'C', 'Ď' => 'D', 'Ě' => 'E', 'Ň' => 'N', 'Ř' => 'R', 'Š' => 'S', 'Ť' => 'T', 'Ů' => 'U',
    'Ž' => 'Z',
    'č' => 'c', 'ď' => 'd', 'ě' => 'e', 'ň' => 'n', 'ř' => 'r', 'š' => 's', 'ť' => 't', 'ů' => 'u',
    'ž' => 'z',
    // Polish
    'Ą' => 'A', 'Ć' => 'C', 'Ę' => 'e', 'Ł' => 'L', 'Ń' => 'N', 'Ó' => 'o', 'Ś' => 'S', 'Ź' => 'Z',
    'Ż' => 'Z',
    'ą' => 'a', 'ć' => 'c', 'ę' => 'e', 'ł' => 'l', 'ń' => 'n', 'ó' => 'o', 'ś' => 's', 'ź' => 'z',
    'ż' => 'z',
    // Latvian
    'Ā' => 'A', 'Č' => 'C', 'Ē' => 'E', 'Ģ' => 'G', 'Ī' => 'i', 'Ķ' => 'k', 'Ļ' => 'L', 'Ņ' => 'N',
    'Š' => 'S', 'Ū' => 'u', 'Ž' => 'Z',
    'ā' => 'a', 'č' => 'c', 'ē' => 'e', 'ģ' => 'g', 'ī' => 'i', 'ķ' => 'k', 'ļ' => 'l', 'ņ' => 'n',
    'š' => 's', 'ū' => 'u', 'ž' => 'z'
  );

  // Make custom replacements
  $str = preg_replace(array_keys($options['replacements']), $options['replacements'], $str);

  // Transliterate characters to ASCII
  if ($options['transliterate']) {
    $str = str_replace(array_keys($char_map), $char_map, $str);
  }

  // Replace non-alphanumeric characters with our delimiter
  $str = preg_replace('/[^\p{L}\p{Nd}]+/u', $options['delimiter'], $str);

  // Remove duplicate delimiters
  $str = preg_replace('/(' . preg_quote($options['delimiter'], '/') . '){2,}/', '$1', $str);

  // Truncate slug to max. characters
  $str = mb_substr($str, 0, ($options['limit'] ? $options['limit'] : mb_strlen($str, 'UTF-8')), 'UTF-8');

  // Remove delimiter from ends
  $str = trim($str, $options['delimiter']);

  return $options['lowercase'] ? mb_strtolower($str, 'UTF-8') : $str;
}

/**
 * EN: Menu Clipping - get first letter from two words - lowercase
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $str
 * @return string
 *
 */
function text_clipping_lower($str)
{
  $str = url_slug($str, array('delimiter' => ' ', 'lowercase' => true, 'transliterate' => true));

  if (str_word_count($str) > 1) {
    //Get the first character for two words
    $pos = strpos($str, " ");
    $result = $str[0] . $str[$pos + 1];
  } else {
    //Get the first character for one word
    $result = $str[0];
  }

  return $result;
}

/**
 * EN: Menu Clipping - get first letter from two words - uppercase
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *          
 * @param $str
 * @return string
 *
 */
function text_clipping_upper($str)
{
  $str = url_slug($str, array('delimiter' => ' ', 'lowercase' => false, 'transliterate' => true));

  if (str_word_count($str) > 1) {
    //Get the first character for two words
    $pos = strpos($str, " ");
    $result = $str[0] . $str[$pos + 1];
  } else {
    //Get the first character for one word
    $result = $str[0];
  }

  return $result;
}


// ---------------------------------------------------------------------------------------------------------------------
//			FUNCTION FOR CREATE HTML TAGS
// ---------------------------------------------------------------------------------------------------------------------

/**
 * Create a XHTML tag
 *
 * @param	string			The tag name
 * @param	array|string	The tag attributes
 * @param	string|bool		The content to place in the tag, or false for no closing tag
 * @return	string
 */
if ( ! function_exists('html_tag'))
{
  function html_tag($tag, $attr = array(), $content = false)
  {
    // list of void elements (tags that can not have content)
    static $void_elements = array(
      // html4
      "area","base","br","col","hr","img","input","link","meta","param",
      // html5
      "command","embed","keygen","source","track","wbr",
      // html5.1
      "menuitem",
    );

    // construct the HTML
    $html = '<'.$tag;
    $html .= ( ! empty($attr)) ? ' '.(is_array($attr) ? array_to_attr($attr) : $attr) : '';

    // a void element?
    if (in_array(strtolower($tag), $void_elements))
    {
      // these can not have content
      $html .= ' />';
    }
    else
    {
      // add the content and close the tag
      $html .= '>'.$content.'</'.$tag.'>';
    }

    return $html;
  }
}

/**
 * Takes an array of attributes and turns it into a string for an html tag
 *
 * @param	array	$attr
 * @return	string
 */
if ( ! function_exists('array_to_attr'))
{
  function array_to_attr($attr)
  {
    $attr_str = '';

    foreach ((array) $attr as $property => $value)
    {
      // Ignore null/false
      if ($value === null or $value === false)
      {
        continue;
      }

      // If the key is numeric then it must be something like selected="selected"
      if (is_numeric($property))
      {
        $property = $value;
      }

      $attr_str .= $property.'="'.str_replace('"', '&quot;', $value).'" ';
    }

    // We strip off the last space for return
    return trim($attr_str);
  }
}

/**
 * Takes an associative array in the layout of parse_url, and constructs a URL from it
 *
 * see http://www.php.net/manual/en/function.http-build-url.php#96335
 *
 * @param   mixed   (Part(s) of) an URL in form of a string or associative array like parse_url() returns
 * @param   mixed   Same as the first argument
 * @param   int     A bitmask of binary or'ed HTTP_URL constants (Optional)HTTP_URL_REPLACE is the default
 * @param   array   If set, it will be filled with the parts of the composed url like parse_url() would return
 *
 * @return  string  constructed URL
 */
if (!function_exists('http_build_url'))
{
  define('HTTP_URL_REPLACE', 1);				// Replace every part of the first URL when there's one of the second URL
  define('HTTP_URL_JOIN_PATH', 2);			// Join relative paths
  define('HTTP_URL_JOIN_QUERY', 4);			// Join query strings
  define('HTTP_URL_STRIP_USER', 8);			// Strip any user authentication information
  define('HTTP_URL_STRIP_PASS', 16);			// Strip any password authentication information
  define('HTTP_URL_STRIP_AUTH', 32);			// Strip any authentication information
  define('HTTP_URL_STRIP_PORT', 64);			// Strip explicit port numbers
  define('HTTP_URL_STRIP_PATH', 128);			// Strip complete path
  define('HTTP_URL_STRIP_QUERY', 256);		// Strip query string
  define('HTTP_URL_STRIP_FRAGMENT', 512);		// Strip any fragments (#identifier)
  define('HTTP_URL_STRIP_ALL', 1024);			// Strip anything but scheme and host

  function http_build_url($url, $parts = array(), $flags = HTTP_URL_REPLACE, &$new_url = false)
  {
    $keys = array('user','pass','port','path','query','fragment');

    // HTTP_URL_STRIP_ALL becomes all the HTTP_URL_STRIP_Xs
    if ($flags & HTTP_URL_STRIP_ALL)
    {
      $flags |= HTTP_URL_STRIP_USER;
      $flags |= HTTP_URL_STRIP_PASS;
      $flags |= HTTP_URL_STRIP_PORT;
      $flags |= HTTP_URL_STRIP_PATH;
      $flags |= HTTP_URL_STRIP_QUERY;
      $flags |= HTTP_URL_STRIP_FRAGMENT;
    }
    // HTTP_URL_STRIP_AUTH becomes HTTP_URL_STRIP_USER and HTTP_URL_STRIP_PASS
    elseif ($flags & HTTP_URL_STRIP_AUTH)
    {
      $flags |= HTTP_URL_STRIP_USER;
      $flags |= HTTP_URL_STRIP_PASS;
    }

    // parse the original URL
    $parse_url = is_array($url) ? $url : parse_url($url);

    // make sure we always have a scheme, host and path
    empty($parse_url['scheme']) and $parse_url['scheme'] = 'http';
    empty($parse_url['host']) and $parse_url['host'] = \Input::server('http_host');
    isset($parse_url['path']) or $parse_url['path'] = '';

    // make the path absolute if needed
    if ( ! empty($parse_url['path']) and substr($parse_url['path'], 0, 1) != '/')
    {
      $parse_url['path'] = '/'.$parse_url['path'];
    }

    // scheme and host are always replaced
    isset($parts['scheme']) and $parse_url['scheme'] = $parts['scheme'];
    isset($parts['host']) and $parse_url['host'] = $parts['host'];

    // replace the original URL with it's new parts (if applicable)
    if ($flags & HTTP_URL_REPLACE)
    {
      foreach ($keys as $key)
      {
        if (isset($parts[$key]))
          $parse_url[$key] = $parts[$key];
      }
    }
    else
    {
      // join the original URL path with the new path
      if (isset($parts['path']) && ($flags & HTTP_URL_JOIN_PATH))
      {
        if (isset($parse_url['path']))
          $parse_url['path'] = rtrim(str_replace(basename($parse_url['path']), '', $parse_url['path']), '/') . '/' . ltrim($parts['path'], '/');
        else
          $parse_url['path'] = $parts['path'];
      }

      // join the original query string with the new query string
      if (isset($parts['query']) && ($flags & HTTP_URL_JOIN_QUERY))
      {
        if (isset($parse_url['query']))
          $parse_url['query'] .= '&' . $parts['query'];
        else
          $parse_url['query'] = $parts['query'];
      }
    }

    // strips all the applicable sections of the URL
    // note: scheme and host are never stripped
    foreach ($keys as $key)
    {
      if ($flags & (int) constant('HTTP_URL_STRIP_' . strtoupper($key)))
        unset($parse_url[$key]);
    }

    $new_url = $parse_url;

    return
      ((isset($parse_url['scheme'])) ? $parse_url['scheme'] . '://' : '')
      .((isset($parse_url['user'])) ? $parse_url['user'] . ((isset($parse_url['pass'])) ? ':' . $parse_url['pass'] : '') .'@' : '')
      .((isset($parse_url['host'])) ? $parse_url['host'] : '')
      .((isset($parse_url['port'])) ? ':' . $parse_url['port'] : '')
      .((isset($parse_url['path'])) ? $parse_url['path'] : '')
      .((isset($parse_url['query'])) ? '?' . $parse_url['query'] : '')
      .((isset($parse_url['fragment'])) ? '#' . $parse_url['fragment'] : '')
      ;
  }
}

?>