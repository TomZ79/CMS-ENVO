<?php

/**
 * EN: Get the data per array for faqs
 * CZ:
 *
 * @author  Thomas Zukal
 * @version 1.0.1
 * @date    01/2018
 *
 * @param $limit
 * @param $envovar1
 * @param $table
 * @return array
 *
 */
function envo_get_faqs ($limit, $envovar1, $table)
{

	$sqlwhere = '';
	if (!empty($envovar1)) $sqlwhere = 'WHERE catid LIKE "%' . smartsql($envovar1) . '%" ';

	global $envodb;
	$envodata = array ();
	$result   = $envodb -> query('SELECT * FROM ' . $table . ' ' . $sqlwhere . 'ORDER BY id DESC ' . $limit);
	while ($row = $result -> fetch_assoc()) {
		// EN: Insert each record into array
		// CZ: Vložení získaných dat do pole
		$envodata[] = $row;
	}

	if (!empty($envodata)) return $envodata;
}

/**
 * EN: Menu builder function, parentId 0 is the root
 * CZ:
 *
 * @author  Thomas Zukal
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

function envo_build_menu_faq ($parent, $menu, $lang, $title1, $title2, $title3, $title4, $title5, $class = "", $id = "")
{
	$html = "";
	if (isset($menu['parents'][$parent])) {
		$html .= "
      <ul" . $class . $id . ">\n";
		foreach ($menu['parents'][$parent] as $itemId) {

			// Build menu for FAQ categories
			if (!isset($menu['parents'][$itemId])) {

				$dataconfirm = str_replace("%s", $menu["items"][$itemId]["name"], $lang);

				$html .= '<li id="menuItem_' . $menu["items"][$itemId]["id"] . '" class="envocat">
          		<div>
          		<span class="text"><span class="textid">#' . $menu["items"][$itemId]["id"] . '</span><a href="index.php?p=faq&amp;sp=categories&amp;ssp=edit&amp;id=' . $menu["items"][$itemId]["id"] . '">' . $menu["items"][$itemId]["name"] . '</a></span>
          		<span class="actions">
          			<a href="index.php?p=faq&amp;sp=categories&amp;ssp=lock&amp;id=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="' . ($menu["items"][$itemId]["active"] == 0 ? "$title1" : "$title2") . '"><i class="fa fa-' . ($menu["items"][$itemId]["active"] == 0 ? 'lock' : 'check') . '"></i></a>
          			<a href="index.php?p=faq&amp;sp=new&amp;ssp=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="' . $title3 . '"><i class="fa fa-sticky-note-o"></i></a>
          			<a href="index.php?p=faq&amp;sp=categories&amp;ssp=edit&amp;id=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs" data-toggle="tooltip" data-placement="bottom" title="' . $title4 . '"><i class="fa fa-edit"></i></a>
          			<a href="index.php?p=faq&amp;sp=categories&amp;ssp=delete&amp;id=' . $menu["items"][$itemId]["id"] . '" class="btn btn-danger btn-xs" data-confirm="' . $dataconfirm . '" data-toggle="tooltip" data-placement="bottom" title="' . $title5 . '"><i class="fa fa-trash-o"></i></a>
          		</span></div></li>';

			}

			// Build menu for FAQ categories with submenu
			if (isset($menu['parents'][$itemId])) {

				$dataconfirm = str_replace("%s", $menu["items"][$itemId]["name"], $lang);

				$html .= '<li id="menuItem_' . $menu["items"][$itemId]["id"] . '" class="envocat">
          		<div>
          		<span class="text"><span class="textid">#' . $menu["items"][$itemId]["id"] . '</span><a href="index.php?p=faq&amp;sp=categories&amp;ssp=edit&amp;id=' . $menu["items"][$itemId]["id"] . '">' . $menu["items"][$itemId]["name"] . '</a></span>
          		<span class="actions">
          			<a href="index.php?p=faq&amp;sp=categories&amp;ssp=lock&amp;id=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs"><i class="fa fa-' . ($menu["items"][$itemId]["active"] == 0 ? 'lock' : 'check') . '"></i></a>
          				<a href="index.php?p=faq&amp;sp=new&amp;id=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs"><i class="fa fa-sticky-note-o"></i></a>
          				<a href="index.php?p=faq&amp;sp=categories&amp;ssp=edit&amp;id=' . $menu["items"][$itemId]["id"] . '" class="btn btn-default btn-xs"><i class="fa fa-edit"></i></a>
          				<a href="index.php?p=faq&amp;sp=categories&amp;ssp=delete&amp;id=' . $menu["items"][$itemId]["id"] . '" class="btn btn-danger btn-xs"  data-confirm="' . $dataconfirm . '" data-toggle="tooltip" data-placement="bottom" title="' . $title5 . '"><i class="fa fa-trash-o"></i></a>
          		</span>
          		</div>';
				$html .= envo_build_menu_faq($itemId, $menu, $lang, $title1, $title2, $title3, $title4, $title5);
				$html .= "</li> \n";

			}
		}
		$html .= "</ul> \n";
	}

	return $html;
}

?>