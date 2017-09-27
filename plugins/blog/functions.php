<?php

// Get blog(s) out the database
function envo_get_blog($limit, $order, $where, $table_row, $ext_seo, $timeago)
{
  global $envodb;
  global $jkv;

  if (is_numeric($where)) {
    $sqlin = 'FIND_IN_SET(' . $where . ', ' . $table_row . ') AND t1.active = 1 AND';
  } elseif (!is_numeric($where) && !empty($where)) {
    $sqlin = '' . $table_row . ' IN(' . $where . ') AND t1.active = 1 AND';
  } else {
    $sqlin = 't1.catid != 0 AND t1.active = 1 AND';
  }

  $result = $envodb->query('SELECT t1.id, t1.catid, t1.title, t1.content, t1.showtitle, t1.showcontact, t1.showdate, t1.time, t1.hits, t1.previmg FROM ' . DB_PREFIX . 'blog AS t1 LEFT JOIN ' . DB_PREFIX . 'blogcategories AS t2 ON (t2.id IN(t1.catid)) WHERE ((startdate = 0 OR startdate <= ' . time() . ') AND (enddate = 0 OR enddate >= ' . time() . ')) AND ' . $sqlin . ' (FIND_IN_SET(' . ENVO_USERGROUPID . ',t2.permission) OR t2.permission = 0) GROUP BY t1.id ORDER BY ' . $order . ' ' . $limit);

  while ($row = $result->fetch_assoc()) {

    // Write content in short format with full words
    $shortmsg = envo_cut_text($row['content'], $jkv["shortmsg"], '...');

    // There should be always a varname in categories and check if seo is valid
    $seo = '';
    if ($ext_seo) $seo = ENVO_base::envoCleanurl($row['title']);
    $parseurl = ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_BLOG, 'a', $row['id'], $seo);

    // finally get the time
    $getTime = ENVO_base::envoTimesince($row['time'], $jkv["blogdateformat"], $jkv["blogtimeformat"], $timeago);

    // EN: Insert each record into array
    // CZ: Vložení získaných dat do pole
    $envodata[] = array(
      'id' => $row['id'],
      'catid' => $row['catid'],
      'title' => $row['title'],
      'content' => envo_secure_site($row['content']),
      'contentshort' => $shortmsg,
      'showtitle' => $row['showtitle'],
      'showcontact' => $row['showcontact'],
      'showdate' => $row['showdate'],
      'created' => $getTime,
      'hits' => $row['hits'],
      'previmg' => $row['previmg'],
      'parseurl' => $parseurl,
      'date-time' => $row['time']
    );
  }


  return $envodata;
}

// Get total from a table limited to permission
function envo_get_total_permission_blog()
{

  global $envodb;
  $envototal = 0;
  $row       = $envodb->queryRow('SELECT COUNT(t1.id) AS total FROM ' . DB_PREFIX . 'blog as t1 LEFT JOIN ' . DB_PREFIX . 'blogcategories as t2 ON (t1.catid = t2.id) WHERE (t1.active = 1 AND t2.active = 1) AND (FIND_IN_SET(' . ENVO_USERGROUPID . ',t2.permission) OR t1.catid = t2.id AND t2.permission = 0)');

  if ($row['total']) $envototal = $row['total'];

  return $envototal;
}

?>