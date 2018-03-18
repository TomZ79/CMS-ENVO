<?php

// EN: Getting data from the database
// CZ: Získání dat z databáze
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

  // EN: Show Belowheader on the main page of news
  // CZ: Zobrazení Belowheader na hlavní stránce zpráv
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

?>