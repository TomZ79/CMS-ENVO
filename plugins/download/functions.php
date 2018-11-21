<?php

/**
 * EN: Get blog(s) out the database
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.1
 * @date    03/2018
 *
 * @param $limit
 * @param $order
 * @param $where
 * @param $table_row
 * @param $ext_seo
 * @param $timeago
 * @return array
 *
 */
function envo_get_download($limit, $order, $where, $table_row, $ext_seo, $timeago)
{
  global $envodb;
  global $setting;

  if (is_numeric($where)) {
    $sqlin = '' . $table_row . ' = "' . $where . '" AND t1.active = 1 AND';
  } elseif (!is_numeric($where) && !empty($where)) {
    $sqlin = '' . $table_row . ' IN(' . $where . ') AND t1.active = 1 AND';
  } else {
    $sqlin = 't1.catid != 0 AND t1.active = 1 AND';
  }

  $result = $envodb -> query('SELECT t1.* FROM ' . DB_PREFIX . 'download AS t1 LEFT JOIN ' . DB_PREFIX . 'downloadcategories AS t2 ON (t1.catid = t2.id) WHERE ' . $sqlin . ' (FIND_IN_SET(' . ENVO_USERGROUPID . ',t2.permission) OR t2.permission = 0) GROUP BY t1.id ORDER BY ' . $order . ' ' . $limit);
  while ($row = $result -> fetch_assoc()) {

    $getTime = ENVO_base ::envoTimesince($row['time'], $setting["downloaddateformat"], $setting["downloadtimeformat"], $timeago);

    // Write content in short format with full words
    $shortmsg = envo_cut_text($row['content'], $setting["shortmsg"], '...');

    // There should be always a varname in categories and check if seo is valid
    $seo = '';
    if ($ext_seo) {
      $seo = ENVO_base ::envoCleanurl($row['title']);
    }

    $parseurl = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_DOWNLOAD, 'f', $row['id'], $seo, '');

    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = array (
      'id'           => $row['id'],
      'catid'        => $row['catid'],
      'title'        => $row['title'],
      'content'      => envo_secure_site($row['content']),
      'contentshort' => $shortmsg,
      'file'         => $row['file'],
      'extfile'      => $row['extfile'],
      'countdl'      => $row['countdl'],
      'showtitle'    => $row['showtitle'],
      'showdate'     => $row['showdate'],
      'created'      => $getTime,
      'hits'         => $row['hits'],
      'previmg'      => $row['previmg'],
      'parseurl'     => $parseurl
    );
  }


  return $envodata;
}

/**
 * EN: Get total from a table limited to permission
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    09/2017
 *
 * @return int
 *
 */
function envo_get_total_permission_dl()
{
  global $envodb;
  $envototal = 0;
  $result    = $envodb -> query('SELECT COUNT(t1.id) AS total FROM ' . DB_PREFIX . 'download as t1 LEFT JOIN ' . DB_PREFIX . 'downloadcategories as t2 ON (t1.catid = t2.id) WHERE (t1.active = 1 AND t2.active = 1) AND (FIND_IN_SET(' . ENVO_USERGROUPID . ',t2.permission) OR t1.catid = t2.id AND t2.permission = 0)');
  $row       = $result -> fetch_assoc();

  if ($row['total']) {
    $envototal = $row['total'];
  }

  return $envototal;
}

?>