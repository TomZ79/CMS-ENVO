<?php

/**
 * EN: Getting the data about the city in region - House list
 * CZ: Získání dat o městech v regionu - Seznam domů
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    11/2018
 *
 * @param $limit
 * @param $colname
 * @param $table
 * @return array
 *
 */
function envo_get_anchor ($limit, $colname = NULL, $table, $where, $orderby)
{

	global $envodb;
	$envodata = array ();
	$colname  = (empty($colname) ? '*' : $colname);

	// EN: SQL Query
	// CZ: SQL Dotaz
	// select all values with duplicated values
	$result = $envodb -> query('SELECT ' . $colname . ' FROM ' . $table . ' WHERE ' . $where . ' ORDER BY ' . $orderby . $limit);
	while ($row = $result -> fetch_assoc()) {
		// EN: Insert each record into array
		// CZ: Vložení získaných dat do pole
		$envodata[] = $row;
	}

	if (isset($envodata)) return $envodata;
}

/**
 * EN: Get wiki(s) out the database
 * CZ:
 *
 * @author  BluesatKV
 * @version 1.0.0
 * @date    11/2018
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
function envo_get_wiki ($limit, $order, $where, $table_row, $ext_seo, $timeago)
{
	global $envodb;
	global $setting;

	if (is_numeric($where)) {
		$sqlin = 'FIND_IN_SET(' . $where . ', ' . $table_row . ') AND t1.active = 1 AND';
	} elseif (!is_numeric($where) && !empty($where)) {
		$sqlin = '' . $table_row . ' IN(' . $where . ') AND t1.active = 1 AND';
	} else {
		$sqlin = 't1.catid != 0 AND t1.active = 1 AND';
	}

	$result = $envodb -> query('SELECT t1.* FROM ' . DB_PREFIX . 'wiki AS t1 LEFT JOIN ' . DB_PREFIX . 'wikicategories AS t2 ON (t2.id IN(t1.catid)) WHERE ' . $sqlin . ' (FIND_IN_SET(' . ENVO_USERGROUPID . ',t2.permission) OR t2.permission = 0) GROUP BY t1.id ORDER BY ' . $order . ' ' . $limit);

	while ($row = $result -> fetch_assoc()) {

		// Write content in short format with full words
		$shortmsg = envo_cut_text($row['content'], $setting["wikishortmsg"], '...');

		// There should be always a varname in categories and check if seo is valid
		$seo = '';
		if ($ext_seo) $seo = ENVO_base ::envoCleanurl($row['title']);
		$parseurl = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_WIKI, 'wiki-article', $row['id'], $seo);

		// Finally get the time
		$getTimeCreate = ENVO_base ::envoTimesince($row['created'], $setting["wikidateformat"], $setting["wikitimeformat"], $timeago);
		$getTimeUpdate = ENVO_base ::envoTimesince($row['updated'], $setting["wikidateformat"], $setting["wikitimeformat"], $timeago);

		// EN: Insert each record into array
		// CZ: Vložení získaných dat do pole
		$envodata[] = array (
			'id'           => $row['id'],
			'catid'        => $row['catid'],
			'title'        => $row['title'],
			'content'      => envo_secure_site($row['content']),
			'contentshort' => $shortmsg,
			'showtitle'    => $row['showtitle'],
			'showdate'     => $row['showdate'],
			'created'      => $getTimeCreate,
			'updated'      => $getTimeUpdate,
			'hits'         => $row['hits'],
			'previmg'      => $row['previmg'],
			'previmgdesc'  => $row['previmgdesc'],
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
 * @date    11/2018
 *
 * @return mixed
 *
 */
function envo_get_total_permission_wiki ()
{
	global $envodb;
	$result = $envodb -> query('SELECT COUNT(t1.id) AS total FROM ' . DB_PREFIX . 'wiki as t1 LEFT JOIN ' . DB_PREFIX . 'wikicategories as t2 ON (t1.catid = t2.id) WHERE (t1.active = 1 AND t2.active = 1) AND (FIND_IN_SET(' . ENVO_USERGROUPID . ',t2.permission) OR t1.catid = t2.id AND t2.permission = 0)');
	$row    = $result -> fetch_assoc();

	if ($row['total']) {
		$envototal = $row['total'];
	}

	return $envototal;
}

?>