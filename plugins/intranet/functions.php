<?php
// EN: Getting the data about the Houses without limit by usergroupid
// CZ: Získání dat o bytových domech bez limitu podle id uživatelské skupiny
function envo_get_house_info($table, $ext_seo, $usergroupid)
{
  global $jakdb;
  $envodata = array();
  $result   = $jakdb->query('SELECT * FROM ' . $table . ' ORDER BY id ASC');

  while ($row = $result->fetch_assoc()) {

    // Array of strings with permission of each house
    $usergrouparray = explode(',', $row['permission']);

    // Check if 'usergroupid' is in permission array or if is 'usergroupid' = 3 (administrator group) or permission is 0
    if (in_array($usergroupid, $usergrouparray) || $usergroupid == 3  || $row['permission'] == 0) {

      // There should be always a varname in categories and check if seo is valid
      $seo = "";
      if ($ext_seo) $seo = JAK_base::jakCleanurl($row['varname']);
      $parseurl = JAK_rewrite::jakParseurl(JAK_PLUGIN_VAR_INTRANET . '/house', 'h', $row['id'], $seo);

      // EN: Insert each record into array
      // CZ: Vložení získaných dat do pole
      $envodata[] = array(
        'id' => $row['id'],
        'name' => $row['name'],
        'street' => $row['street'],
        'city' => $row['city'],
        'parseurl' => $parseurl,
      );
    }

  }

  if (isset($envodata)) return $envodata;
}

?>