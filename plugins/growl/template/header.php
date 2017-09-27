<?php
$ENVO_GROWL_SHOW = FALSE;
$ENVO_NEWS_GROWL = array();

// Get the general settings out the database
$resultgw = $envodb->query('SELECT * FROM ' . DB_PREFIX . 'growl WHERE active = 1');
while ($rowgw = $resultgw->fetch_assoc()) {
  $gwtitle   = base64_encode(trim($rowgw['title']));
  $gwcontent = base64_encode(trim($rowgw['content']));

  if ($rowgw['everywhere'] != 0) {

    $ENVO_ALL_GROWL[] = array('id' => $rowgw['id'], 'showall' => 1, 'title' => $gwtitle, 'previmg' => $rowgw['previmg'], 'content' => $gwcontent, 'duration' => $rowgw['duration'], 'position' => $rowgw['position'], 'color' => $rowgw['color'], 'sticky' => $rowgw['sticky'], 'remember' => $rowgw['remember'], 'remembertime' => $rowgw['remembertime'], 'permission' => $rowgw['permission'], 'startdate' => $rowgw['startdate'], 'enddate' => $rowgw['enddate']);

    $ENVO_GROWL_SHOW = TRUE;
  }

  // Get the pages in a array
  if ($rowgw['pageid'] != 0 && !is_numeric($rowgw['pageid'])) {

    $pagearray = explode(',', $rowgw['pageid']);

    for ($i = 0; $i < count($pagearray); $i++) {

      $ENVO_PAGE_GROWL[$pagearray[$i]] = array('id' => $rowgw['id'], 'pageid' => $pagearray[$i], 'title' => $gwtitle, 'previmg' => $rowgw['previmg'], 'content' => $gwcontent, 'duration' => $rowgw['duration'], 'position' => $rowgw['position'], 'color' => $rowgw['color'], 'sticky' => $rowgw['sticky'], 'remember' => $rowgw['remember'], 'remembertime' => $rowgw['remembertime'], 'permission' => $rowgw['permission'], 'startdate' => $rowgw['startdate'], 'enddate' => $rowgw['enddate']);

    }

    $ENVO_GROWL_SHOW = TRUE;

  }

  if ($rowgw['pageid'] != 0 && is_numeric($rowgw['pageid'])) {

    $ENVO_PAGE_GROWL[$rowgw['pageid']] = array('id' => $rowgw['id'], 'pageid' => $rowgw['pageid'], 'title' => $gwtitle, 'previmg' => $rowgw['previmg'], 'content' => $gwcontent, 'duration' => $rowgw['duration'], 'position' => $rowgw['position'], 'color' => $rowgw['color'], 'sticky' => $rowgw['sticky'], 'remember' => $rowgw['remember'], 'remembertime' => $rowgw['remembertime'], 'permission' => $rowgw['permission'], 'startdate' => $rowgw['startdate'], 'enddate' => $rowgw['enddate']);

    $ENVO_GROWL_SHOW = TRUE;
  }


  // Get the news in a array
  if ($rowgw['newsid'] != 0 && !is_numeric($rowgw['newsid'])) {

    $newsarray = explode(',', $rowgw['newsid']);

    for ($i = 0; $i < count($newsarray); $i++) {

      $ENVO_NEWS_GROWL[$newsarray[$i]] = array('id' => $rowgw['id'], 'newsid' => $newsarray[$i], 'title' => $gwtitle, 'previmg' => $rowgw['previmg'], 'content' => $gwcontent, 'duration' => $rowgw['duration'], 'position' => $rowgw['position'], 'color' => $rowgw['color'], 'sticky' => $rowgw['sticky'], 'remember' => $rowgw['remember'], 'remembertime' => $rowgw['remembertime'], 'permission' => $rowgw['permission'], 'startdate' => $rowgw['startdate'], 'enddate' => $rowgw['enddate']);

    }

    $ENVO_GROWL_SHOW = TRUE;

  }

  if (isset($ENVO_NEWS_GROWL['newsid']) && $ENVO_NEWS_GROWL['newsid'] != 0 && is_numeric($rowgw['newsid'])) {

    $newsgw[$rowgw['newsid']] = array('id' => $rowgw['id'], 'newsid' => $rowgw['newsid'], 'title' => $gwtitle, 'previmg' => $rowgw['previmg'], 'content' => $gwcontent, 'duration' => $rowgw['duration'], 'position' => $rowgw['position'], 'color' => $rowgw['color'], 'sticky' => $rowgw['sticky'], 'remember' => $rowgw['remember'], 'remembertime' => $rowgw['remembertime'], 'permission' => $rowgw['permission'], 'startdate' => $rowgw['startdate'], 'enddate' => $rowgw['enddate']);

    $ENVO_GROWL_SHOW = TRUE;
  }

  // Check if we display the content on the news main page
  if ($rowgw['newsmain'] != 0 && is_numeric($rowgw['newsmain'])) {

    $ENVO_NEWSMAIN_GROWL[] = array('id' => $rowgw['id'], 'newsmain' => 1, 'title' => $gwtitle, 'previmg' => $rowgw['previmg'], 'content' => $gwcontent, 'duration' => $rowgw['duration'], 'position' => $rowgw['position'], 'color' => $rowgw['color'], 'sticky' => $rowgw['sticky'], 'remember' => $rowgw['remember'], 'remembertime' => $rowgw['remembertime'], 'permission' => $rowgw['permission'], 'startdate' => $rowgw['startdate'], 'enddate' => $rowgw['enddate']);

    $ENVO_GROWL_SHOW = TRUE;
  }

  // Check if we display the content on the news main page
  if ($rowgw['tags'] != 0 && is_numeric($rowgw['tags'])) {

    $ENVO_TAGS_GROWL[] = array('id' => $rowgw['id'], 'tags' => 1, 'title' => $gwtitle, 'previmg' => $rowgw['previmg'], 'content' => $gwcontent, 'duration' => $rowgw['duration'], 'position' => $rowgw['position'], 'color' => $rowgw['color'], 'sticky' => $rowgw['sticky'], 'remember' => $rowgw['remember'], 'remembertime' => $rowgw['remembertime'], 'permission' => $rowgw['permission'], 'startdate' => $rowgw['startdate'], 'enddate' => $rowgw['enddate']);

    $ENVO_GROWL_SHOW = TRUE;
  }

  // Check if we display the content on the news main page
  if ($rowgw['search'] != 0 && is_numeric($rowgw['search'])) {

    $ENVO_SEARCH_GROWL[] = array('id' => $rowgw['id'], 'search' => 1, 'title' => $gwtitle, 'previmg' => $rowgw['previmg'], 'content' => $gwcontent, 'duration' => $rowgw['duration'], 'position' => $rowgw['position'], 'color' => $rowgw['color'], 'sticky' => $rowgw['sticky'], 'remember' => $rowgw['remember'], 'remembertime' => $rowgw['remembertime'], 'permission' => $rowgw['permission'], 'startdate' => $rowgw['startdate'], 'enddate' => $rowgw['enddate']);

    $ENVO_GROWL_SHOW = TRUE;
  }

  // Check if we display the content on the news main page
  if ($rowgw['sitemap'] != 0 && is_numeric($rowgw['sitemap'])) {

    $ENVO_SITEMAP_GROWL[] = array('id' => $rowgw['id'], 'sitemap' => 1, 'title' => $gwtitle, 'previmg' => $rowgw['previmg'], 'content' => $gwcontent, 'duration' => $rowgw['duration'], 'position' => $rowgw['position'], 'color' => $rowgw['color'], 'sticky' => $rowgw['sticky'], 'remember' => $rowgw['remember'], 'remembertime' => $rowgw['remembertime'], 'permission' => $rowgw['permission'], 'startdate' => $rowgw['startdate'], 'enddate' => $rowgw['enddate']);

    $ENVO_GROWL_SHOW = TRUE;
  }

}
?>