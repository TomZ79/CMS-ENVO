<?php

/**
 * EN: Get faq(s) out the database
 * CZ:
 *
 * @author  Thomas Zukal
 * @version 1.0.2
 * @date    01/2019
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
function envo_get_faq ($limit, $order, $where, $table_row, $ext_seo, $timeago)
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

	$result = $envodb -> query('SELECT t1.* FROM ' . DB_PREFIX . 'faq AS t1 LEFT JOIN ' . DB_PREFIX . 'faqcategories AS t2 ON (t2.id IN(t1.catid)) WHERE ' . $sqlin . ' (FIND_IN_SET(' . ENVO_USERGROUPID . ',t2.permission) OR t2.permission = 0) GROUP BY t1.id ORDER BY ' . $order . ' ' . $limit);
	while ($row = $result -> fetch_assoc()) {

		// Write content in short format with full words
		$shortmsg = envo_cut_text_html_tag($row['content']);

		// There should be always a varname in categories and check if seo is valid
		$seo = '';
		if ($ext_seo) {
			$seo = ENVO_base ::envoCleanurl($row['title']);
		}

		// Parse url for user link
		$parseurl = ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_FAQ, 'faq-article', $row['id'], $seo, '');


		$getTime = ENVO_base ::envoTimesince($row['time'], $setting["faqdateformat"], $setting["faqtimeformat"], $timeago);

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
 * @author  Thomas Zukal
 * @version 1.0.0
 * @date    09/2017
 *
 * @return mixed
 *
 */
function envo_get_total_permission_faq ()
{
	global $envodb;
	$result = $envodb -> query('SELECT COUNT(t1.id) AS total FROM ' . DB_PREFIX . 'faq as t1 LEFT JOIN ' . DB_PREFIX . 'faqcategories as t2 ON (t1.catid = t2.id) WHERE (t1.active = 1 AND t2.active = 1) AND (FIND_IN_SET(' . ENVO_USERGROUPID . ',t2.permission) OR t1.catid = t2.id AND t2.permission = 0)');
	$row    = $result -> fetch_assoc();

	if ($row['total']) {
		$envototal = $row['total'];
	}

	return $envototal;
}

?>