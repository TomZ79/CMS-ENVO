<?php

// Get the general settings out the database
$resultbh = $envodb->query('SELECT pageid, newsid, newsmain, tags, search, sitemap, content, content_below, permission FROM ' . DB_PREFIX . 'belowheader WHERE active = 1');
while ($rowbh = $resultbh->fetch_assoc()) {
  $content       = base64_encode($rowbh["content"]);
  $content_below = base64_encode($rowbh["content_below"]);

  // Get the pages in a array
  if ($rowbh['pageid'] != 0 && !is_numeric($rowbh['pageid'])) {

    $pagearray = explode(',', $rowbh['pageid']);

    for ($i = 0; $i < count($pagearray); $i++) {

      $ENVO_PAGE_BELOW_HEADER[$pagearray[$i]] = array('pageid' => $pagearray[$i], 'content' => $content, 'content_below' => $content_below, 'permission' => $rowbh['permission']);

    }

  }

  if (is_numeric($rowbh['pageid'])) {

    $ENVO_PAGE_BELOW_HEADER[$rowbh['pageid']] = array('pageid' => $rowbh['pageid'], 'content' => $content, 'content_below' => $content_below, 'permission' => $rowbh['permission']);
  }


  // Get the news in a array
  if ($rowbh['newsid'] != 0 && !is_numeric($rowbh['newsid'])) {

    $newsarray = explode(',', $rowbh['newsid']);

    for ($i = 0; $i < count($newsarray); $i++) {

      $ENVO_NEWS_BELOW_HEADER[$newsarray[$i]] = array('newsid' => $newsarray[$i], 'content' => $content, 'content_below' => $content_below, 'permission' => $rowbh['permission']);

    }

  }

  if ($rowbh['newsid'] != 0 && is_numeric($rowbh['newsid'])) {

    $ENVO_NEWS_BELOW_HEADER[$rowbh['newsid']] = array('newsid' => $rowbh['newsid'], 'content' => $content, 'content_below' => $content_below, 'permission' => $rowbh['permission']);
  }

  // Check if we display the content on the news main page
  if ($rowbh['newsmain'] != 0 && is_numeric($rowbh['newsmain'])) {

    $ENVO_NEWSMAIN_BELOW_HEADER[] = array('newsmain' => 1, 'content' => $content, 'content_below' => $content_below, 'permission' => $rowbh['permission']);
  }

  // Check if we display the content on the news main page
  if ($rowbh['tags'] != 0 && is_numeric($rowbh['tags'])) {

    $ENVO_TAGS_BELOW_HEADER[] = array('tags' => 1, 'content' => $content, 'content_below' => $content_below, 'permission' => $rowbh['permission']);
  }

  // Check if we display the content on the news main page
  if ($rowbh['search'] != 0 && is_numeric($rowbh['search'])) {

    $ENVO_SEARCH_BELOW_HEADER[] = array('search' => 1, 'content' => $content, 'content_below' => $content_below, 'permission' => $rowbh['permission']);
  }

  // Check if we display the content on the news main page
  if ($rowbh['sitemap'] != 0 && is_numeric($rowbh['sitemap'])) {

    $ENVO_SITEMAP_BELOW_HEADER[] = array('sitemap' => 1, 'content' => $content, 'content_below' => $content_below, 'permission' => $rowbh['permission']);
  }

}

// Now we have a cache file let's display the content if the user has permission.

// Let's check if there is a valid Page array
if (!$page1 && isset($PAGE_ID) && isset($ENVO_PAGE_BELOW_HEADER) && is_array($ENVO_PAGE_BELOW_HEADER) && array_key_exists($PAGE_ID, $ENVO_PAGE_BELOW_HEADER)) {

  foreach ($ENVO_PAGE_BELOW_HEADER as $subp) {
    if ($subp['pageid'] == $PAGE_ID && (envo_get_access(ENVO_USERGROUPID, $subp['permission']) || $subp['permission'] == 0)) {

      $bh_top = envo_secure_site($subp['content']);

      if (!$bh_top) $bh_top = $subp['content'];

      echo envo_secure_site(base64_decode($bh_top));

    }
  }

}

if (!isset($backtonews)) $backtonews = FALSE;

// Let's check if there is a valid News array
if ($backtonews && isset($PAGE_ID) && isset($ENVO_NEWS_BELOW_HEADER) && is_array($ENVO_NEWS_BELOW_HEADER) && array_key_exists($PAGE_ID, $ENVO_NEWS_BELOW_HEADER)) {

  foreach ($ENVO_NEWS_BELOW_HEADER as $subn) {
    if ($subn['newsid'] == $PAGE_ID && (envo_get_access(ENVO_USERGROUPID, $subn['permission']) || $subn['permission'] == 0)) {

      $bh_top = envo_secure_site($subn['content']);

      if (!$bh_top) $bh_top = $subn['content'];

      echo envo_secure_site(base64_decode($bh_top));

    }
  }

}

// Let's check if there is a valid News Main array
if ($backtonews && !$page1 && isset($ENVO_NEWSMAIN_BELOW_HEADER) && is_array($ENVO_NEWSMAIN_BELOW_HEADER)) {

  foreach ($ENVO_NEWSMAIN_BELOW_HEADER as $submn) {

    if ($submn['newsmain'] == 1 && (envo_get_access(ENVO_USERGROUPID, $submn['permission']) || $submn['permission'] == 0)) {

      $bh_top = envo_secure_site($submn['content']);

      if (!$bh_top) $bh_top = $submn['content'];

      echo envo_secure_site(base64_decode($bh_top));

    }
  }

}

// Let's check if there is a valid Tags array and if the user has access to tags
if ($page == ENVO_PLUGIN_VAR_TAGS && isset($ENVO_TAGS_BELOW_HEADER) && is_array($ENVO_TAGS_BELOW_HEADER) && ENVO_USER_TAGS) {

  foreach ($ENVO_TAGS_BELOW_HEADER as $subt) {

    if ($subt['tags'] == 1 && (envo_get_access(ENVO_USERGROUPID, $subt['permission']) || $subt['permission'] == 0)) {

      $bh_top = envo_secure_site($subt['content']);

      if (!$bh_top) $bh_top = $subt['content'];

      echo envo_secure_site(base64_decode($bh_top));

    }
  }

}

// Let's check if there is a valid Search array
if ($page == 'search' && isset($ENVO_SEARCH_BELOW_HEADER) && is_array($ENVO_SEARCH_BELOW_HEADER)) {

  foreach ($ENVO_SEARCH_BELOW_HEADER as $subs) {

    if ($subs['search'] == 1 && (envo_get_access(ENVO_USERGROUPID, $subs['permission']) || $subs['permission'] == 0)) {

      $bh_top = envo_secure_site($subs['content']);

      if (!$bh_top) $bh_top = $subs['content'];

      echo envo_secure_site(base64_decode($bh_top));

    }
  }

}

// Let's check if there is a valid Sitemap array
if ($page == ENVO_PLUGIN_VAR_SITEMAP && isset($ENVO_SITEMAP_BELOW_HEADER) && is_array($ENVO_SITEMAP_BELOW_HEADER)) {

  foreach ($ENVO_SITEMAP_BELOW_HEADER as $subsit) {

    if ($subsit['sitemap'] == 1 && (envo_get_access(ENVO_USERGROUPID, $subsit['permission']) || $subsit['permission'] == 0)) {

      $bh_top = envo_secure_site($subsit['content']);

      if (!$bh_top) $bh_top = $subsit['content'];

      echo envo_secure_site(base64_decode($bh_top));

    }
  }

}

?>