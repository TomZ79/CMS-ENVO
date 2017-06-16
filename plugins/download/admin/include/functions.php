<?php

// Get the data per array for downloads
function jak_get_downloads($limit, $jakvar1, $table)
{

  $sqlwhere = '';
  if (!empty($jakvar1)) $sqlwhere = 'WHERE catid = ' . smartsql($jakvar1) . ' ';

  global $jakdb;
  $jakdata = array();
  $result  = $jakdb->query('SELECT * FROM ' . $table . ' ' . $sqlwhere . 'ORDER BY id DESC ' . $limit);
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $jakdata[] = $row;
  }

  return $jakdata;
}

// Get the download comments
function jak_get_download_comments($limit, $jakvar1, $jakvar2)
{

  if ($jakvar1 == 'approve') {
    $sqlwhere = 'WHERE approve = 0 AND trash = 0 ';
  } elseif ($jakvar2 == 'fileid') {
    $sqlwhere = 'WHERE fileid = ' . smartsql($jakvar1) . ' AND trash = 0 ';
  } elseif ($jakvar2 == 'userid') {
    $sqlwhere = 'WHERE userid = ' . smartsql($jakvar1) . ' AND trash = 0 ';
  } else {
    $sqlwhere = 'WHERE trash = 0 ';
  }

  global $jakdb;
  $jakdata = array();
  $result  = $jakdb->query('SELECT * FROM ' . DB_PREFIX . 'downloadcomments ' . $sqlwhere . 'ORDER BY id, approve = 0 DESC ' . $limit);
  while ($row = $result->fetch_assoc()) {
    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $jakdata[] = $row;
  }

  return $jakdata;
}

// Get local download files
function jak_get_download_files($path)
{
  // Extension Filter - allowed extension of file
  global $jakdb;

  $sql    = 'SELECT value FROM ' . DB_PREFIX . 'setting WHERE varname = "downloadpathext" LIMIT 1';  // Select ONLY one, instead of all
  $result = $jakdb->query($sql);
  $ext    = $result->fetch_assoc();
  $ext    = str_replace(",", "|", $ext['value']);

  $allowed_ext = '/\.(' . $ext . ')$/';

  // Readdir and find files
  if ($handle = opendir(APP_PATH . $path)) {

    /* This is the correct way to loop over the directory. */
    while (FALSE !== ($file = readdir($handle))) {
      if ($file != "." && $file != "..") {
        if (preg_match($allowed_ext, $file)) {
          $allFiles[] = $file;
        }
      }
    }

    // Return value
    return $allFiles;

    // Clear and Close
    clearstatcache();
    closedir($handle);
  }
}

// Menu builder function, parentId 0 is the root
function jak_build_menu_download($parent, $menu, $lang, $title1, $title2, $title3, $title4, $title5, $class = "", $id = "")
{
  $html = "";
  if (isset($menu['parents'][$parent])) {
    $html .= "
    <ul" . $class . $id . ">\n";
    foreach ($menu['parents'][$parent] as $itemId) {
      // Build menu for Download categories
      if (!isset($menu['parents'][$itemId])) {
        $html .= '<li id="menuItem_' . $menu["items"][$itemId]["id"] . '" class="jakcat">
          		<div>
          		<span class="text"><span class="textid">#' . $menu["items"][$itemId]["id"] . '</span><a href="index.php?p=download&amp;sp=categories&amp;ssp=edit&amp;sssp=' . $menu["items"][$itemId]["id"] . '">' . $menu["items"][$itemId]["name"] . '</a></span>
          		<span class="actions">
          			<a href="index.php?p=download&amp;sp=categories&amp;ssp=lock&amp;sssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="' . ($menu["items"][$itemId]["active"] == 0 ? "$title1" : "$title2") . '"><i class="fa fa-' . ($menu["items"][$itemId]["active"] == 0 ? 'lock' : 'check') . '"></i></a>
          			<a href="index.php?p=download&amp;sp=new&amp;ssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="' . $title3 . '"><i class="fa fa-sticky-note-o"></i></a>
          			<a href="index.php?p=download&amp;sp=categories&amp;ssp=edit&amp;sssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="' . $title4 . '"><i class="fa fa-edit"></i></a>
          			<a href="index.php?p=download&amp;sp=categories&amp;ssp=delete&amp;sssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-danger btn-xs" data-confirm="' . $lang . '" data-toggle="tooltip" data-placement="bottom" title="' . $title5 . '"><i class="fa fa-trash-o"></i></a>
          		</span></div></li>';
      }
      // Build menu for ...
      if (isset($menu['parents'][$itemId])) {
        $html .= '<li id="menuItem_' . $menu["items"][$itemId]["id"] . '" class="jakcat">
          		<div>
          		<span class="text"><span class="textid">#' . $menu["items"][$itemId]["id"] . '</span><a href="index.php?p=download&amp;sp=categories&amp;ssp=edit&amp;sssp=' . $menu["items"][$itemId]["id"] . '">' . $menu["items"][$itemId]["name"] . '</a></span>
          		<span class="actions">
          			<a href="index.php?p=download&amp;sp=categories&amp;ssp=lock&amp;sssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs"><i class="fa fa-' . ($menu["items"][$itemId]["active"] == 0 ? 'lock' : 'check') . '"></i></a>
          				<a href="index.php?p=download&amp;sp=new&amp;ssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs"><i class="fa fa-sticky-note-o"></i></a>
          				<a href="index.php?p=download&amp;sp=categories&amp;ssp=edit&amp;sssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
          				<a href="index.php?p=download&amp;sp=categories&amp;ssp=delete&amp;sssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-danger btn-xs" onclick="if(!confirm(' . $lang . '))return false;"><i class="fa fa-trash-o"></i></a>
          		</span>
          		</div>';
        $html .= jak_build_menu_download($itemId, $menu, $lang, $title1, $title2, $title3, $title4, $title5);
        $html .= "</li> \n";
      }
    }
    $html .= "</ul> \n";
  }

  return $html;
}

?>