<?php

/**
 * EN: Redirect function
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $url
 * @param int $code
 *
 */
function envo_redirect($url, $code = 302)
{
  header('Location: ' . $url, TRUE, $code);
  exit();
}

/**
 * EN: Secure the site and display videos
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $input
 * @return mixed|string
 *
 */
function envo_secure_site($input)
{
  $input    = stripslashes($input);
  $youtube  = strpos($input, 'youtube.com');
  $youtube2 = strpos($input, 'youtu.be');
  $vimeo    = strpos($input, 'vimeo.com');

  // Check if there is a url in the text
  if (!empty($youtube) || !empty($youtube2) || !empty($vimeo)) {

    // The Regular Expression filter
    $reg_exUrl  = '/(http\:\/\/www\.youtube\.com\/watch\?v=\w{11})/';
    $reg_exUrl2 = '(http://youtu.be/[-|~_0-9A-Za-z]+)';
    $reg_exUrlv = '/(http\:\/\/(www\.vimeo|vimeo)\.com\/[0-9]{8})/';

    preg_match($reg_exUrl, $input, $url);

    if (isset($url[0])) {

      $flurl = ENVO_rewrite::envoVideourlparser($url[0], 'site');

      // make the urls hyper links
      $input = preg_replace($reg_exUrl, '<figure><iframe class="v_player" src="' . $flurl . '" frameborder="0"></iframe></figure><p class="clearfix"></p>', $input);

    }

    preg_match($reg_exUrl2, $input, $url2);

    if (isset($url2[0])) {

      $flurl2 = ENVO_rewrite::envoVideourlparser($url2[0], 'site');

      // make the urls hyper links
      $input = preg_replace($reg_exUrl2, '<figure><iframe class="v_player" src="' . $flurl2 . '" frameborder="0"></iframe></figure><p class="clearfix"></p>', $input);

    }

    preg_match($reg_exUrlv, $input, $vurl);

    if (isset($vurl[0])) {

      $flurlv = ENVO_rewrite::envoVideourlparser($vurl[0], 'site');

      // make the urls hyper links
      $input = preg_replace($reg_exUrlv, '<figure><iframe class="v_player" src="' . $flurlv . '" frameborder="0"></iframe></figure><p class="clearfix"></p>', $input);

    }

  }

  return $input;
}

/**
 * EN: Filter inputs
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $value
 * @return mixed
 *
 */
function envo_input_filter($value)
{
  $value = filter_var($value, FILTER_SANITIZE_STRING);

  return preg_replace("/[^0-9 _,.@\-\p{L}]/u", '', $value);
}

/**
 * EN: Filter url inputs
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $value
 * @return string
 *
 */
function envo_url_input_filter($value)
{
  $value = html_entity_decode($value);
  $value = preg_replace('/[^\w-.]/', '', $value);

  return trim(filter_var($value, FILTER_SANITIZE_STRING));
}

/**
 * EN: Get a secure mysql input
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $value
 * @return string
 *
 */
function smartsql($value)
{
  global $envodb;
  if (get_magic_quotes_gpc()) {
    $value = stripslashes($value);
  }
  if (!is_int($value)) {
    $value = $envodb->real_escape_string($value);
  }

  return $value;
}

/**
 * EN: Search for lang files in the admin folder, only choose .ini files.
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @return array
 *
 */
function envo_get_lang_files()
{

  $langdir = APP_PATH . 'lang/';

  if ($handle = opendir($langdir)) {

    /* This is the correct way to loop over the directory. */
    while (FALSE !== ($file = readdir($handle))) {
      $showini = substr($file, strrpos($file, '.'));
      if ($file != '.' && $file != '..' && $showini == '.ini') {

        $getlang[] = substr($file, 0, -4);

      }
    }

    return $getlang;
    closedir($handle);
  }
}

/**
 * EN: Check if folder is empty
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $dir
 * @return bool|null
 *
 */
function is_dir_empty($dir)
{
  if (!is_readable($dir)) return NULL;
  $handle = opendir($dir);
  while (FALSE !== ($entry = readdir($handle))) {
    if ($entry != "." && $entry != "..") {
      return FALSE;
    }
  }

  return TRUE;
}

/**
 * EN: Get random image from folder
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 * @link    http://www.dyn-web.com/code/random-image-php/
 *
 * @param $path
 * @return array
 *
 */
function envo_get_random_image($path)
{
  $images = array();
  if ($img_dir = @opendir($path)) {
    while (FALSE !== ($img_file = readdir($img_dir))) {
      // checks for gif, jpg, png
      if (preg_match("/(\.gif|\.jpg|\.png)$/", $img_file)) {
        $images[] = BASE_URL . $path . $img_file;
      }
    }
    closedir($img_dir);
  }

  return $images;
}

/**
 * EN:
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $ar
 * @return mixed
 *
 */
function envo_get_random_from_array($ar)
{
  $num = array_rand($ar);

  return $ar[$num];
}

/**
 * EN: Get random line from text file
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $fileName
 * @param int $maxLineLength
 * @return bool|mixed|null|string
 *
 */
function envo_get_random__line($fileName, $maxLineLength = 4096)
{
  $handle = @fopen($fileName, "r");
  if ($handle) {
    $random_line = NULL;
    $line        = NULL;
    $count       = 0;
    while (($line = fgets($handle, $maxLineLength)) !== FALSE) {
      $count++;
      // P(1/$count) probability of picking current line as random line
      if (rand() % $count == 0) {
        $random_line = $line;
      }
    }
    if (!feof($handle)) {
      echo "Error: unexpected fgets() fail\n";
      fclose($handle);

      return NULL;
    } else {
      fclose($handle);
    }
    $random_line = str_replace("\r\n", '', $random_line);

    return $random_line;
  }
}

/**
 * EN: Detect Mobile Browser in a simple way to display videos in html5 or video/template not available message
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $useragent
 * @param $wap
 * @return bool
 *
 */
function envo_find_browser($useragent, $wap)
{

  $ifmobile = preg_match('/android|avantgo|blackberry|blazer|compal|elaine|fennec|hiptop|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile|o2|opera m(ob|in)i|palm( os)?|p(ixi|re)\/|plucker|pocket|psp|smartphone|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce; (iemobile|ppc)|xiino/i', $useragent);

  $ifmobileM = preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4));

  if ($ifmobile || $ifmobileM || isset($wap)) {
    return TRUE;
  } else {
    return FALSE;
  }
}

/**
 * EN: Check if userid can have access to the forum, blog, gallery etc.
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @param $envovar1
 * @return bool
 *
 */
function envo_get_access($envovar, $envovar1)
{
  $usergrouparray = explode(',', $envovar1);
  if (in_array($envovar, $usergrouparray) || $envovar == 3) {
    return TRUE;
  } else {
    return FALSE;
  }
}

/**
 * EN: Get the setting variable as well the default variable as array
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $group
 * @return array
 *
 */
function envo_get_setting($group)
{
  global $envodb;
  $setting = array();
  $result  = $envodb->query('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE groupname = "' . smartsql($group) . '"');
  while ($row = $result->fetch_assoc()) {
    $setting[] = $row;
  }

  return $setting;
}

/**
 * EN: Get the setting variable as well the default variable as array
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $group
 * @return array
 *
 */
function envo_get_setting_val($group)
{
  global $envodb;
  $setting = array();
  $result  = $envodb->query('SELECT varname, value FROM ' . DB_PREFIX . 'setting WHERE groupname = "' . smartsql($group) . '"');
  while ($row = $result->fetch_assoc()) {
    // Now check if sting contains html and do something about it!
    if (strlen($row['value']) != strlen(filter_var($row['value'], FILTER_SANITIZE_STRING))) {
      $defvar = htmlspecialchars_decode(htmlspecialchars($row['value']));
    } else {
      $defvar = $row["value"];
    }

    $setting[$row['varname']] = $defvar;
  }

  return $setting;
}

/**
 * EN: Get total from a table
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
 * @return mixed
 *
 */
function envo_get_total($envovar, $envovar1, $envovar2, $envovar3)
{
  if (empty($envovar1) && !empty($envovar3)) {
    $sqlwhere = ' WHERE ' . $envovar3 . ' = 1';
  } elseif (!empty($envovar1) && !empty($envovar3)) {
    $sqlwhere = ' WHERE ' . $envovar2 . ' = "' . smartsql($envovar1) . '" AND ' . $envovar3 . ' = 1';
  } elseif (!empty($envovar1) && empty($envovar3)) {
    $sqlwhere = ' WHERE ' . $envovar2 . ' = "' . smartsql($envovar1) . '"';
  } else {
    $sqlwhere = '';
  }

  global $envodb;
  $row = $envodb->queryRow('SELECT COUNT(*) as totalAll FROM ' . $envovar . $sqlwhere . '');

  return $row['totalAll'];
}

/**
 * EN: Get the data only per ID (e.g. edit single user, edit category)
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $id
 * @param $table
 * @return array
 *
 */
function envo_get_data($id, $table)
{

  global $envodb;
  $envodata = array();
  $result   = $envodb->query('SELECT * FROM ' . $table . ' WHERE id = "' . smartsql($id) . '"');
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata = $row;
  }

  return $envodata;
}

/**
 * EN: Get the data per array for galleries
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $limit
 * @param $table
 * @param $order
 * @return array
 *
 */
function envo_get_galleryfacebook($limit, $table, $order)
{

  global $envodb;
  $envodata = array();
  $result   = $envodb->query('SELECT * FROM ' . $table . ' ORDER BY id ' . $order . $limit);
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = $row;
  }

  return $envodata;
}

/**
 * EN: Check if row exist with custom field
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $check1
 * @param $table
 * @param $field1
 * @param string $check2
 * @param string $field2
 * @return bool
 *
 */
function envo_field_not_exist($check1, $table, $field1, $check2 = '', $field2 = '')
{
  global $envodb;

  if ($check2) {
    $result = $envodb->query('SELECT id FROM ' . $table . ' WHERE LOWER(' . $field1 . ') = "' . smartsql($check1) . '" AND LOWER(' . $field2 . ') = "' . smartsql($check2) . '" LIMIT 1');
  } else {
    $result = $envodb->query('SELECT id FROM ' . $table . ' WHERE LOWER(' . $field1 . ') = "' . smartsql($check1) . '" LIMIT 1');
  }
  if ($envodb->affected_rows === 1) {
    return TRUE;
  } else {
    return FALSE;
  }
}

/**
 * EN: Check if row exist
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $id
 * @param $table
 * @return bool
 *
 */
function envo_row_exist($id, $table)
{
  global $envodb;
  $result = $envodb->query('SELECT id FROM ' . $table . ' WHERE id = "' . smartsql($id) . '" LIMIT 1');
  if ($envodb->affected_rows === 1) {
    return TRUE;
  } else {
    return FALSE;
  }
}

/**
 * EN: Check if row exist and user has permission to see it!
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @param $envovar1
 * @param $envovar2
 * @return bool
 *
 */
function envo_row_permission($envovar, $envovar1, $envovar2)
{
  global $envodb;
  $result = $envodb->query('SELECT permission FROM ' . $envovar1 . ' WHERE id = "' . smartsql($envovar) . '" LIMIT 1');
  if ($envodb->affected_rows === 1) {
    $row = $result->fetch_assoc();
    if (envo_get_access($envovar2, $row['permission']) || $row['permission'] == 0) {
      return TRUE;
    }
  } else {
    return FALSE;
  }
}

/**
 * EN: Check if catid exist
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @param $envovar1
 * @param $envovar2
 * @return bool
 *
 */
function envo_get_id_name($envovar, $envovar1, $envovar2)
{
  $sqlwhere = '';
  global $envodb;
  $result = $envodb->query('SELECT id FROM ' . $envovar2 . ' WHERE ' . $envovar1 . ' = "' . smartsql($envovar) . '"' . $sqlwhere . ' LIMIT 1');
  if ($envodb->affected_rows > 0) {
    $row = $result->fetch_assoc();

    return $row['id'];
  } else {
    return FALSE;
  }
}

/**
 * EN: Get News out the database
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $envovar
 * @param $where
 * @param $plname
 * @param $order
 * @param $datef
 * @param $timef
 * @param $timeago
 * @return array
 *
 */
function envo_get_news($envovar, $where, $plname, $order, $datef, $timef, $timeago)
{

  if (!empty($envovar)) {
    $sqlin = 'active = 1 ORDER BY ' . $order . ' ';
  } else if (empty($envovar) && is_numeric($where)) {
    $sqlin = 'id = ' . $where . ' AND active = 1 ORDER BY ' . $order . ' ';
  } else if (empty($envovar) && !is_numeric($where)) {
    $sqlin = 'id IN(' . $where . ') AND active = 1 ORDER BY ' . $order . ' ';
  } else {
    $sqlin = 'active = 1 ORDER BY ' . $order . ' LIMIT 1';
  }

  global $envodb;
  global $setting;
  $envodata = array();
  $result   = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'news WHERE ((startdate = 0 OR startdate <= ' . time() . ') AND (enddate = 0 OR enddate >= ' . time() . ')) AND (FIND_IN_SET(' . ENVO_USERGROUPID . ',permission) OR permission = 0) AND ' . $sqlin . $envovar);
  while ($row = $result->fetch_assoc()) {

    $PAGE_TITLE   = $row['title'];
    $PAGE_CONTENT = $row['content'];

    // Write content in short format with full words
    $shortmsg = envo_cut_text($PAGE_CONTENT, $setting["shortmsg"], '...');

    // Parse url for user link
    $parseurl = ENVO_rewrite::envoParseurl($plname, 'news-article', $row['id'], ENVO_base::envoCleanurl($PAGE_TITLE), '');

    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = array('id' => $row['id'], 'title' => envo_secure_site($PAGE_TITLE), 'content' => envo_secure_site($PAGE_CONTENT), 'showtitle' => $row['showtitle'], 'showcontact' => $row['showcontact'], 'showdate' => $row['showdate'], 'showhits' => $row['showhits'], 'created' => ENVO_base::envoTimesince($row['time'], $datef, $timef, $timeago), 'titleurl' => ENVO_base::envoCleanurl($row['title']), 'hits' => $row['hits'], 'previmg' => $row['previmg'], 'contentshort' => $shortmsg, 'parseurl' => $parseurl, 'date-time' => $row['time']);

  }

  if (!empty($envodata)) return $envodata;
}

/**
 * EN:
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $page
 * @param $title
 * @param $table
 * @param $id
 * @param $where
 * @param $where2
 * @param $approve
 * @return array|bool
 *
 */
function envo_next_page($page, $title, $table, $id, $where, $where2, $approve)
{

  $second = $third = $fourth = $fifth = $envodata = FALSE;

  if (!empty($title)) {
    $second = ' ,' . $title;
  }
  if (!empty($where)) {
    $third = $where;
  }
  if (!empty($where2)) {
    $fourth = $where2;
  }
  if (!empty($approve)) {
    $fifth = ' AND ' . $approve . ' = 1';
  }
  global $envodb;
  $result = $envodb->query('SELECT id' . $second . ' FROM ' . $table . ' WHERE ' . $id . ' > ' . smartsql($page) . $third . $fourth . $fifth . ' ORDER BY id ASC LIMIT 1');
  if ($envodb->affected_rows > 0) {
    $envodata = $result->fetch_assoc();

    return $envodata;
  } else
    return FALSE;
}

/**
 * EN:
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $page
 * @param $title
 * @param $table
 * @param $id
 * @param $where
 * @param $where2
 * @param $approve
 * @return array|bool
 *
 */
function envo_previous_page($page, $title, $table, $id, $where, $where2, $approve)
{

  $second = $third = $fourth = $fifth = $envodata = FALSE;

  if (!empty($title)) {
    $second = ' ,' . $title;
  }
  if (!empty($where)) {
    $third = $where;
  }
  if (!empty($where2)) {
    $fourth = $where2;
  }
  if (!empty($approve)) {
    $fifth = ' AND ' . $approve . ' = 1';
  }
  global $envodb;
  $result = $envodb->query('SELECT id' . $second . ' FROM ' . $table . ' WHERE ' . $id . ' < ' . smartsql($page) . $third . $fourth . $fifth . ' ORDER BY id DESC LIMIT 1');
  if ($envodb->affected_rows > 0) {
    $envodata = $result->fetch_assoc();

    return $envodata;
  } else
    return FALSE;

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
 * @param $active
 * @param $mainclass
 * @param $dropdown
 * @param $dropclass
 * @param $subclass
 * @param $admin
 * @param string $firstli
 * @param string $firsta
 * @param int $from
 * @param int $to
 * @return string
 *
 */
function envo_build_menu($parent, $menu, $active, $mainclass, $dropdown, $dropclass, $subclass, $admin, $firstli = "", $firsta = "", $from = 0, $to = 0)
{
  $html = '';
  if (isset($menu['parents'][$parent])) {
    if (isset($from) && is_numeric($from) && isset($to) && is_numeric($to) && $to != 0) {
      $mpr = array_slice($menu['parents'][$parent], $from, $to);
    } else {
      $mpr = $menu['parents'][$parent];
    }
    $html .= '<ul class="' . $mainclass . '">';
    foreach ($mpr as $itemId) {
      if (!isset($menu['parents'][$itemId])) {
        $html .= '<li' . ($firstli ? ' class="' . $firstli . ($active == $menu["items"][$itemId]["pagename"] ? ' active"' : '"') : ($active == $menu["items"][$itemId]["pagename"] ? ' class="active"' : '')) . '><a' . ($firsta ? ' class="' . $firsta . '"' : '') . ' href="' . $menu["items"][$itemId]["varname"] . '">' . ($menu["items"][$itemId]["catimg"] ? '<i class="fa ' . $menu["items"][$itemId]["catimg"] . '"></i> ' : '') . $menu["items"][$itemId]["name"] . '</a></li>';
      }
      if (isset($menu['parents'][$itemId])) {
        $html .= '<li' . ($firstli ? ' class="' . $firstli . ($active == $menu["items"][$itemId]["pagename"] ? ($dropdown ? ' active ' . $dropdown . '"' : '"') : ($dropdown ? $dropdown . '"' : '"')) : ($active == $menu["items"][$itemId]["pagename"] ? ($dropdown ? ' class="active ' . $dropdown . '"' : '') : ($dropdown ? ' class="' . $dropdown . '"' : ''))) . '><a' . ($firsta ? ' class="' . $firsta . '"' : '') . ' href="' . $menu["items"][$itemId]["varname"] . '">' . ($menu["items"][$itemId]["catimg"] ? '<i class="fa ' . $menu["items"][$itemId]["catimg"] . '"></i> ' : '') . $menu["items"][$itemId]["name"] . '</a>';
        $html .= envo_build_menu($itemId, $menu, $active, $dropclass, $subclass, $dropclass, $subclass, $admin);
        $html .= '</li>';
      }
    }

    if ($admin) {
      $html .= '<li' . ($firstli ? ' class="' . $firstli . '"' : '') . '><a' . ($firsta ? ' class="' . $firsta . '"' : '') . ' href="' . BASE_URL . 'admin/">Admin</a></li>';
    }
    $html .= '</ul>';
  }

  return $html;
}

/**
 * EN:
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $text
 * @param $limit
 * @param $envovar2
 * @return mixed|string
 *
 */
function envo_cut_text($text, $limit, $envovar2)
{

  // empty limit
  if (empty($limit)) $limit = 160;
  $text = trim($text);
  $text = strip_tags($text);
  $text = str_replace(array("\r", "\n", '"'), "", $text);
  $txtl = strlen($text);
  if ($txtl > $limit) {
    for ($i = 1; $text[$limit - $i] != " "; $i++) {
      if ($i == $limit) {
        return substr($text, 0, $limit) . $envovar2;
      }
    }
    $envodata = substr($text, 0, $limit - $i + 1) . $envovar2;
  } else {
    $envodata = $text;
  }

  return $envodata;
}


/**
 * EN:
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $string
 * @param int $length
 * @param string $append
 * @return array|string
 */
function envo_cut_text_html_tag($string,$length=350,$append="&hellip;") {

  $string = trim($string);
  $string_length = strlen($string);

  $original_string = $string;

  if( $string_length > $length ) {

    $remaining_chars = $string_length - $length;

    if( strpos($string, '<') !== false && strpos($string, '>') !== false ) {

      $string = wordwrap($string, $length);
      $string = explode("\n", $string, 2);
      $string = $string[0] . $append;

      $fillimi = substr_count($string, '<');
      $fundi = substr_count($string, '>');

      if( $fillimi == $fundi ) {
        $string = $string;
      } else {
        $i = 1;
        while( $i <= $remaining_chars ) {

          $string = wordwrap($original_string, $length + $i);
          $string = explode("\n", $string, 2);
          $new_remaining_chars = $string_length - ($length + $i);
          if( $new_remaining_chars > 0 ) {
            $string = $string[0] . $append;
          } else {
            $string = $string[0];
          }

          $fillimi = substr_count($string, '<');
          $fundi = substr_count($string, '>');

          if( $fillimi == $fundi ) {
            $string = $string;
            break;
          }

          $i++;
        }
      }

    } else {
      $string = trim($string);

      $string = wordwrap($string, $length);
      $string = explode("\n", $string, 2);
      $string = $string[0] . $append;

    }

  }

  return $string;
}

/**
 * EN: Render strings from content
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $str
 * @param $parms
 * @return mixed
 *
 */
function envo_render_string($str, $parms)
{
  // if
  $str = preg_replace_callback('/{{if (?P<name>\w+)}}(?P<inner>.*?){{endif}}/is', function ($match) use ($parms) {
    if (isset($parms[$match['name']])) {
      // recursive
      return envo_render_string($match['inner'], $parms);
    }
  }, $str);

  return $str;
}

/**
 * EN:
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $table
 * @param $id
 * @param $cookie
 * @return bool
 *
 */
function envo_write_vote_hits_cookie($table, $id, $cookie)
{
  if (isset($_COOKIE[$cookie])) {

    $cookiearray = explode(',', $_COOKIE[$cookie]);

    if (in_array($table . '-' . $id, $cookiearray)) {
      $getCORE = $_COOKIE[$cookie];
    } else {
      $getCORE = $_COOKIE[$cookie] . ',' . $table . '-' . $id;
    }

  } else {
    $getCORE = $table . '-' . $id;
  }

  return setcookie($cookie, $getCORE, time() + 60 * 60 * 24, ENVO_COOKIE_PATH);
}

/**
 * EN:
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $table
 * @param $id
 * @param $cookie
 * @return bool
 *
 */
function envo_cookie_voted_hits($table, $id, $cookie)
{

  if (isset($_COOKIE[$cookie])) {

    $cookiearray = explode(',', $_COOKIE[$cookie]);

    if (in_array($table . '-' . $id, $cookiearray)) {
      return TRUE;
    } else {
      return FALSE;
    }
  } else {
    return FALSE;
  }

}

/**
 * EN: Get a clean and secure post from user
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $input
 * @return bool|mixed|string
 *
 */
function envo_clean_safe_userpost($input)
{

  // Trim text
  $input = trim($input);

  // keep going and remove dirty code
  include_once 'htmlawed.php';

  if (get_magic_quotes_gpc()) $input = stripslashes($input);

  // now we convert the code stuff into code blocks
  $input = preg_replace_callback('/<pre><code>(.*?)<\/code><\/pre>/imsu', 'envo_precode', $input);

  $allowedhtml = array('safe' => 1, 'elements' => 'em, p, br, img, ul, li, ol, a, strong, pre, code', 'deny_attribute' => 'class, title, id, style, on*', 'comment' => 1, 'cdata' => 1, 'valid_xhtml' => 1, 'make_tag_strict' => 1);
  $allowedatr  = '';
  $input       = htmLawed($input, $allowedhtml, $allowedatr);

  // Now return the input
  if ($input) {
    return $input;
  } else {
    return FALSE;
  }
}

/**
 * EN:
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $input
 * @return mixed|string
 *
 */
function envo_edit_safe_userpost($input)
{

  // now we convert the code stuff into code blocks
  $input = preg_replace_callback('/<pre><code>(.*?)<\/code><\/pre>/imsu', 'envo_editcode', $input);

  $input = stripslashes($input);

  return $input;

}

/**
 * EN: Get the real IP Address
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @return int
 *
 */
function get_ip_address()
{
  foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key) {
    if (array_key_exists($key, $_SERVER) === TRUE) {
      foreach (explode(',', $_SERVER[$key]) as $ip) {
        if (filter_var($ip, FILTER_VALIDATE_IP) !== FALSE) {
          return $ip;
        }
      }
    }
  }

  return 0;
}

/**
 * EN: Password generator
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param int $length
 * @return bool|string
 *
 */
function envo_password_creator($length = 8)
{
  return substr(md5(rand() . rand()), 0, $length);
}

/**
 * Encrypt email address (prevent spam)
 *
 * The function takes a string input (the email address), loops through each character replacing the letter with the
 * character's ASCII value, and returns the encoded email address.
 *
 * Example:
 * Input  - echo 'mailto' . envo_encode_email(info@info.com)
 * Return - mailto:&#105;&#110;&#102;&#111;&#64;&#105;&#110;&#102;&#111;&#46;&#99;&#111;&#109;
 *
 */
function envo_encode_email($email)
{
  $output = '';
  for ($i = 0; $i < strlen($email); $i++) {
    $output .= '&#' . ord($email[$i]) . ';';
  }

  return $output;
}

/**
 * EN: Get the referrer
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @return mixed
 *
 */
function selfURL()
{

  $referrer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $_SERVER['PHP_SELF'];

  $referrer = filter_var($referrer, FILTER_VALIDATE_URL);

  return $referrer;
}

/**
 * EN:
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $matches
 * @return mixed
 *
 */
function envo_precode($matches)
{
  return str_replace($matches[1], htmlentities($matches[1]), $matches[0]);
}

/**
 * EN:
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $matches
 * @return mixed
 *
 */
function envo_editcode($matches)
{
  return str_replace($matches[1], htmlspecialchars($matches[1]), $matches[0]);
}

/**
 * EN: Convert size units
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $bytes
 * @return string
 *
 */
function formatSizeUnits($bytes)
{
  if ($bytes >= 1073741824) {
    $bytes = number_format($bytes / 1073741824, 2) . ' GB';
  } elseif ($bytes >= 1048576) {
    $bytes = number_format($bytes / 1048576, 2) . ' MB';
  } elseif ($bytes >= 1024) {
    $bytes = number_format($bytes / 1024, 2) . ' kB';
  } elseif ($bytes > 1) {
    $bytes = $bytes . ' bytes';
  } elseif ($bytes == 1) {
    $bytes = $bytes . ' byte';
  } else {
    $bytes = '0 bytes';
  }

  return $bytes;
}


/* Convert hexdec color string to rgb(a) string
 *
 * Usage example how to use this function for dynamicaly created CSS
 * -------------------------
 * $color = '#ffa226';
 * $rgb = hex2rgba($color);
 * $rgba = hex2rgba($color, 0.7);
 *
 * CSS output
 * -------------------------
 * echo '	div.example { background: '.$rgb.'; color: '.$rgba.'; }';
 *
*/
function hex2rgba($color, $opacity = FALSE)
{

  $default = 'rgb(0,0,0)';

  //Return default if no color provided
  if (empty($color))
    return $default;

  //Sanitize $color if "#" is provided
  if ($color[0] == '#') {
    $color = substr($color, 1);
  }

  //Check if color has 6 or 3 characters and get values
  if (strlen($color) == 6) {
    $hex = array($color[0] . $color[1], $color[2] . $color[3], $color[4] . $color[5]);
  } elseif (strlen($color) == 3) {
    $hex = array($color[0] . $color[0], $color[1] . $color[1], $color[2] . $color[2]);
  } else {
    return $default;
  }

  //Convert hexadec to rgb
  $rgb = array_map('hexdec', $hex);

  //Check if opacity is set(rgba or rgb)
  if ($opacity) {
    if (abs($opacity) > 1)
      $opacity = 1.0;
    $output = 'rgba(' . implode(",", $rgb) . ',' . $opacity . ')';
  } else {
    $output = 'rgb(' . implode(",", $rgb) . ')';
  }

  //Return rgb(a) color string
  return $output;
}


/**
 * EN: Function to check if the request is an AJAX request
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @return bool
 *
 */
function is_ajax()
{
  return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
}

/**
 * @name Mutlidimensional Array Sorter.
 * @author Tufan Barış YILDIRIM
 * @link   http://www.tufanbarisyildirim.com
 * @github http://github.com/tufanbarisyildirim
 *
 * This function can be used for resort a multidimensional array by like order by clause
 *
 * @param array $array
 * @param $order_by
 * @return array
 * @throws Exception
 *
 * -------------------------------------------
 *
 * #Example using.
 * $array = array(
 * array('name' => 'Tufan Barış','surname' => 'YILDIRIM'),
 * array('name' => 'Tufan Barış','surname' => 'xYILDIRIM'),
 * array('name' => 'Tufan Barış','surname' => 'aYILDIRIM'),
 * array('name' => 'Tufan Barış','surname' => 'bYILDIRIM'),
 * array('name' => 'Ahmet','surname' => 'Altay'),
 * array('name' => 'Zero','surname' => 'One'),);
 * $order_by_name = sort_array_mutlidim($array,'name DESC,surname ASC');
 * #output.
 * var_dump($order_by_name);
 *
 */
function sort_array_mutlidim(array $array, $order_by)
{
  //TODO -c flexibility -o tufanbarisyildirim : this error can be deleted if you want to sort as sql like  "NULL LAST/FIRST" behavior.
  if (!is_array($array[0]))
    throw new Exception('$array must be a multidimensional array!', E_USER_ERROR);
  $columns = explode(',', $order_by);
  foreach ($columns as $col_dir) {
    preg_match('/(.*)([\s]+)(ASC|DESC)/is', $col_dir, $matches);
    if (!array_key_exists(trim($matches[1]), $array[0]))
      throw new Exception('Unknown Column ' . trim($matches[1]), E_USER_NOTICE);
    else
      $sorts[trim($matches[1])] = 'SORT_' . strtoupper(trim($matches[3]));
  }
  //TODO -c optimization -o tufanbarisyildirim : use array_* functions.
  $colarr = array();
  foreach ($sorts as $col => $order) {
    $colarr[$col] = array();
    foreach ($array as $k => $row) {
      $colarr[$col]['_' . $k] = strtolower($row[$col]);
    }
  }
  //TODO -c suggestion -o tufanbarisyildirim : call_user_func_array can be used here .
  $runIt = 'array_multisort(';
  foreach ($sorts as $col => $order) {
    $runIt .= '$colarr[\'' . $col . '\'],' . $order . ',';
  }
  $runIt = substr($runIt, 0, -1) . ');';
  //TODO -c nothing -o tufanbarisyildirim :  eval is evil.
  eval($runIt);
  $sorted_array = array();
  foreach ($colarr as $col => $arr) {
    foreach ($arr as $k => $v) {
      $k = substr($k, 1);
      if (!isset($sorted_array[$k])) $sorted_array[$k] = $array[$k];
      $sorted_array[$k][$col] = $array[$k][$col];
    }
  }

  return array_values($sorted_array);
}

/**
 * EN: Getting the version of plugin without limit
 * CZ: Získání verze pluginu bez limitu
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @param $pluginname   string    | name of plugin e.g. ('Intranet')
 * @return string
 *
 * @exmaple
 * echo get_pluginversion('Intranet');
 */
function get_pluginversion($pluginname)
{

  global $envodb;
  $envodata = '';

  $result = $envodb->query('SELECT pluginversion FROM ' . DB_PREFIX . 'plugins WHERE name = "' . $pluginname . '"');
  $row    = $result->fetch_assoc();

  $envodata = $row['pluginversion'];

  if (!empty($envodata)) return $envodata;

}

?>