<?php

// Now we have a cache file let's display the content if the user has permission.
if (isset($ENVO_ALLPAGE_BELOW_HEADER) && is_array($ENVO_ALLPAGE_BELOW_HEADER)) {
  foreach ($ENVO_ALLPAGE_BELOW_HEADER as $suball) {
    if ($suball['allpage'] == 1 && (envo_get_access(ENVO_USERGROUPID, $suball['permission']) || $suball['permission'] == 0)) {

      $bh_top = envo_secure_site($suball['content_before']);

      if (!$bh_top) $bh_top = $suball['content_before'];

      echo envo_secure_site(base64_decode($bh_top));

    }
  }
}

// Let's check if there is a valid Page array
if (!$page1 && isset($PAGE_ID) && isset($ENVO_PAGE_BELOW_HEADER) && is_array($ENVO_PAGE_BELOW_HEADER)) {
  foreach ($ENVO_PAGE_BELOW_HEADER as $subp) {
    if ($subp['pageid'] == $PAGE_ID && (envo_get_access(ENVO_USERGROUPID, $subp['permission']) || $subp['permission'] == 0)) {

      $bh_top = envo_secure_site($subp['content_before']);

      if (!$bh_top) $bh_top = $subp['content_before'];

      echo envo_secure_site(base64_decode($bh_top));

    }
  }
}

if (!isset($backtonews)) $backtonews = FALSE;

// Let's check if there is a valid News array
if ($backtonews && isset($PAGE_ID) && isset($ENVO_NEWS_BELOW_HEADER) && is_array($ENVO_NEWS_BELOW_HEADER) && array_key_exists($PAGE_ID, $ENVO_NEWS_BELOW_HEADER)) {
  foreach ($ENVO_NEWS_BELOW_HEADER as $subn) {
    if ($subn['newsid'] == $PAGE_ID && (envo_get_access(ENVO_USERGROUPID, $subn['permission']) || $subn['permission'] == 0)) {

      $bh_top = envo_secure_site($subn['content_before']);

      if (!$bh_top) $bh_top = $subn['content_before'];

      echo envo_secure_site(base64_decode($bh_top));

    }
  }
}

// Let's check if there is a valid News Main array
if ($page == ENVO_PLUGIN_VAR_NEWS && $backtonews && !$page1 && isset($ENVO_NEWSMAIN_BELOW_HEADER) && is_array($ENVO_NEWSMAIN_BELOW_HEADER)) {
  foreach ($ENVO_NEWSMAIN_BELOW_HEADER as $submn) {
    if ($submn['newsmain'] == 1 && (envo_get_access(ENVO_USERGROUPID, $submn['permission']) || $submn['permission'] == 0)) {

      $bh_top = envo_secure_site($submn['content_before']);

      if (!$bh_top) $bh_top = $submn['content_before'];

      echo envo_secure_site(base64_decode($bh_top));

    }
  }
}

// Let's check if there is a valid Tags array and if the user has access to tags
if ($page == ENVO_PLUGIN_VAR_TAGS && isset($ENVO_TAGS_BELOW_HEADER) && is_array($ENVO_TAGS_BELOW_HEADER) && ENVO_USER_TAGS) {
  foreach ($ENVO_TAGS_BELOW_HEADER as $subt) {
    if ($subt['tags'] == 1 && (envo_get_access(ENVO_USERGROUPID, $subt['permission']) || $subt['permission'] == 0)) {

      $bh_top = envo_secure_site($subt['content_before']);

      if (!$bh_top) $bh_top = $subt['content_before'];

      echo envo_secure_site(base64_decode($bh_top));

    }
  }
}

// Let's check if there is a valid Search array
if ($page == 'search' && isset($ENVO_SEARCH_BELOW_HEADER) && is_array($ENVO_SEARCH_BELOW_HEADER)) {
  foreach ($ENVO_SEARCH_BELOW_HEADER as $subs) {
    if ($subs['search'] == 1 && (envo_get_access(ENVO_USERGROUPID, $subs['permission']) || $subs['permission'] == 0)) {

      $bh_top = envo_secure_site($subs['content_before']);

      if (!$bh_top) $bh_top = $subs['content_before'];

      echo envo_secure_site(base64_decode($bh_top));

    }
  }
}

// Let's check if there is a valid Sitemap array
if ($page == ENVO_PLUGIN_VAR_SITEMAP && isset($ENVO_SITEMAP_BELOW_HEADER) && is_array($ENVO_SITEMAP_BELOW_HEADER)) {
  foreach ($ENVO_SITEMAP_BELOW_HEADER as $subsit) {
    if ($subsit['sitemap'] == 1 && (envo_get_access(ENVO_USERGROUPID, $subsit['permission']) || $subsit['permission'] == 0)) {

      $bh_top = envo_secure_site($subsit['content_before']);

      if (!$bh_top) $bh_top = $subsit['content_before'];

      echo envo_secure_site(base64_decode($bh_top));

    }
  }
}

?>