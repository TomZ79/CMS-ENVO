<?php

class ENVO_tags
{
  protected $table = '', $varname = '', $seo = '', $plugin = '';
  private $envovar;
  private $envovar1;

  // This constructor can be used for all classes:

  public function __construct(array $options)
  {

    foreach ($options as $k => $v) {
      if (isset($this->$k)) {
        $this->$k = $v;
      }
    }
  }

  public static function envoGettagcloud($varname, $table, $limit, $maxsize, $minsize, $title)
  {

    // Pull in tag data
    global $envodb;
    $result = $envodb->query('SELECT * FROM ' . DB_PREFIX . $table . ' GROUP BY tag ORDER BY count DESC LIMIT ' . smartsql($limit));
    while ($row = $result->fetch_assoc()) {
      $cloud[$row['tag']] = $row['count'];
    }

    if (isset($cloud)) {
      ksort($cloud);
      $tags = $cloud;
    }

    if (isset($tags)) {

      $minimum_count = min(array_values($tags));
      $maximum_count = max(array_values($tags));
      $spread        = $maximum_count - $minimum_count;

      if ($spread == 0) {
        $spread = 1;
      }

      $my_colours = array("success", "primary", "warning", "info");
      $cloud_html = '';
      $cloud_tags = array(); // create an array to hold tag code
      foreach ($tags as $tag => $count) {
        shuffle($my_colours);
        $size         = $minsize + ($count - $minimum_count)
          * ($maxsize - $minsize) / $spread;
        $cloud_tags[] = '<li class="tag-cloud tag-cloud-' . $my_colours[0] . '"><a style="font-size:' . floor($size) . 'px" href="' . ENVO_rewrite::envoParseurl($varname, ENVO_base::envoCleanurl($tag), '', '', '') . '" title="' . $title . ' ' . htmlspecialchars(stripslashes($tag)) . '">' . htmlspecialchars(stripslashes($tag)) . '</a></li>';
      }
      $cloud_html = join("\n", $cloud_tags) . "\n";

      return $cloud_html;
    }
  }

  public static function envoGettagcloudlimited($url, $slug1, $items, $pluginid, $table, $limit, $maxsize, $minsize)
  {

    // Pull in tag data
    global $envodb;
    $result = $envodb->query('SELECT tag FROM ' . DB_PREFIX . $table . ' WHERE itemid IN(' . join(",", $items) . ') AND pluginid = "' . smartsql($pluginid) . '" AND active = 1 GROUP BY tag ORDER BY tag DESC LIMIT ' . smartsql($limit));
    while ($row = $result->fetch_assoc()) {
      $tags[] = '<a class="label label-default" href="' . ENVO_rewrite::envoParseurl($url, $slug1, ENVO_base::envoCleanurl($row['tag'])) . '">' . $row['tag'] . '</a>';
    }

    if (!empty($tags)) {
      $taglist = join(" ", $tags);

      return $taglist;
    } else {
      return FALSE;
    }
  }

  public static function envoGetTagList($envovar, $envovar1, $where)
  {

    global $envodb;
    $result = $envodb->query('SELECT tag FROM ' . DB_PREFIX . 'tags WHERE itemid = "' . smartsql($envovar) . '" AND pluginid = "' . smartsql($envovar1) . '" AND active = 1 ORDER BY id DESC');

    while ($row = $result->fetch_assoc()) {
      $tags[] = '<a class="label label-default" href="' . ENVO_rewrite::envoParseurl($where, ENVO_base::envoCleanurl($row['tag']), '', '', '') . '">' . $row['tag'] . '</a>';
    }

    if (!empty($tags)) {
      $taglist = join(" ", $tags);

      return $taglist;
    } else {
      return FALSE;
    }
  }

  /* envoGetTagList_class - Get all tags for article, ... with custom definition class for anchor <a class=" CUSTOM CLASS"> </a>
   * Call class
   * ----------------
   * ENVO_tags::envoGetTagList_class('', '', '', 'label', '');
   */
  public static function envoGetTagList_class($envovar, $envovar1, $where, $class, $title)
  {

    global $envodb;
    $result = $envodb->query('SELECT tag FROM ' . DB_PREFIX . 'tags WHERE itemid = "' . smartsql($envovar) . '" AND pluginid = "' . smartsql($envovar1) . '" AND active = 1 ORDER BY id DESC');

    while ($row = $result->fetch_assoc()) {
      $tags[] = '<li><a class="' . $class . '" href="' . ENVO_rewrite::envoParseurl($where, ENVO_base::envoCleanurl($row['tag']), '', '', '') . '" title="' . $title . ' ' . $row['tag'] . '">' . $row['tag'] . '</a></li>';
    }

    if (!empty($tags)) {
      $taglist = join(" ", $tags);

      return $taglist;
    } else {
      return FALSE;
    }
  }

  public static function envoInserTags($tags, $itemid, $module, $active)
  {

    $striptags = strip_tags($tags);
    $smalltags = strtolower($striptags);
    $tagarray  = explode(',', $smalltags);

    for ($i = 0; $i < count($tagarray); $i++) {
      $tag = $tagarray[$i];
      // $tag = trim($tag);
      // $urlTAG = ENVO_base::envoCleanurl($tag);
      $urlTAG = trim($tag);

      // check if tag exist
      global $envodb;
      $envodb->query('SELECT id FROM ' . DB_PREFIX . 'tags WHERE tag = "' . smartsql($urlTAG) . '" AND itemid = "' . smartsql($itemid) . '" AND pluginid = "' . smartsql($module) . '" LIMIT 1');

      if ($envodb->affected_rows != 1) {

        // insert data
        $envodb->query('INSERT INTO ' . DB_PREFIX . 'tags VALUES (NULL,"' . smartsql($urlTAG) . '","' . smartsql($itemid) . '","' . smartsql($module) . '", "' . $active . '")');
      }
    }
  }

  public static function envoBuildCloud($tags, $itemid, $module)
  {

    $striptags = strip_tags($tags);
    $smalltags = strtolower($striptags);
    $tagarray  = explode(',', $smalltags);

    for ($i = 0; $i < count($tagarray); $i++) {

      $tag = $tagarray[$i];
      // $tag = trim($tag);
      // $urlTAG = ENVO_base::envoCleanurl($tag);
      $urlTAG = trim($tag);

      // check if tag exist
      global $envodb;
      $envodb->query('SELECT id FROM ' . DB_PREFIX . 'tags WHERE tag = "' . smartsql($urlTAG) . '" AND itemid = "' . smartsql($itemid) . '" AND pluginid = "' . smartsql($module) . '" LIMIT 1');

      // If tag not exist
      if ($envodb->affected_rows != 1) {

        $result = $envodb->query('SELECT id FROM ' . DB_PREFIX . 'tagcloud WHERE tag = "' . smartsql($urlTAG) . '" LIMIT 1');
        $tagID  = $result->fetch_assoc();

        if ($envodb->affected_rows > 0) {
          // update counter
          $envodb->query('UPDATE ' . DB_PREFIX . 'tagcloud SET count = count + 1 WHERE id = "' . $tagID['id'] . '"');

        } else {

          // insert complete tag
          $envodb->query('INSERT INTO ' . DB_PREFIX . 'tagcloud SET tag = "' . smartsql($urlTAG) . '"');
        }
      }
    }
  }

  public static function envoTagSql($table, $itemid, $select, $cuttext, $plugin, $link, $seo)
  {

    $shorty = '';
    global $envodb;
    global $jkv;

    if ($table == "gallerycategories") {
      $result = $envodb->query('SELECT ' . $select . ' FROM ' . DB_PREFIX . $table . ' WHERE id = "' . smartsql($itemid) . '" LIMIT 1');
    } else {
      $result = $envodb->query('SELECT ' . $select . ' FROM ' . DB_PREFIX . $table . ' WHERE id = "' . smartsql($itemid) . '" LIMIT 1');
    }
    $row = $result->fetch_assoc();
    if ($envodb->affected_rows > 0) {

      if ($cuttext) {
        $shorty = envo_cut_text($row[$cuttext], $jkv["shortmsg"], '...');
      }

      if ($table == "gallerycategories") {
        $title = $row['name'];
      } else {
        $title = $row['title'];
      }

      // There should be always a varname in categories and check if seo is valid
      if ($seo && $row['title']) {
        $seo = ENVO_base::envoCleanurl($row['title']);
      }
      $parseurl = ENVO_rewrite::envoParseurl($plugin, $link, $row['id'], $seo, '');
      $envodata = array('parseurl' => $parseurl, 'title' => $title, 'content' => $shorty);
    }

    return $envodata;

  }

  public static function envoLockTag($id)
  {

    global $envodb;
    $row = $envodb->queryRow('SELECT tag, active FROM ' . DB_PREFIX . 'tags WHERE id = "' . smartsql($id) . '"');

    // Get the count number
    $count = $envodb->queryRow('SELECT count FROM ' . DB_PREFIX . 'tagcloud WHERE tag = "' . smartsql($row['tag']) . '" LIMIT 1');

    if ($row['active'] == 1) {

      if ($count['count'] <= '1') {
        $envodb->query('DELETE FROM ' . DB_PREFIX . 'tagcloud WHERE tag = "' . smartsql($row['tag']) . '"');
      } else {
        $envodb->query('UPDATE ' . DB_PREFIX . 'tagcloud SET count = count - 1 WHERE tag = "' . smartsql($row['tag']) . '"');
      }
    } else {

      if ($envodb->affected_rows == 0) {
        $envodb->query('INSERT INTO ' . DB_PREFIX . 'tagcloud SET tag = "' . smartsql($row['tag']) . '"');
      } else {
        $envodb->query('UPDATE ' . DB_PREFIX . 'tagcloud SET count = count + 1 WHERE tag = "' . smartsql($row['tag']) . '"');
      }
    }

    $envodb->query('UPDATE ' . DB_PREFIX . 'tags SET active = IF (active = 1, 0, 1) WHERE id = "' . smartsql($id) . '"');

  }

  public static function envoLockTags($envovar, $envovar1)
  {

    global $envodb;
    $result = $envodb->query('SELECT tag, active FROM ' . DB_PREFIX . 'tags WHERE itemid = "' . smartsql($envovar) . '" AND pluginid = "' . smartsql($envovar1) . '"');
    while ($row = $result->fetch_assoc()) {

      // Get the count number
      $count = $envodb->queryRow('SELECT count FROM ' . DB_PREFIX . 'tagcloud WHERE tag = "' . smartsql($row['tag']) . '" LIMIT 1');

      if ($row['active'] == 1) {

        if ($count['count'] <= '1') {
          $envodb->query('DELETE FROM ' . DB_PREFIX . 'tagcloud WHERE tag = "' . smartsql($row['tag']) . '"');
        } else {
          $envodb->query('UPDATE ' . DB_PREFIX . 'tagcloud SET count = count - 1 WHERE tag = "' . smartsql($row['tag']) . '"');
        }
      } else {

        if ($envodb->affected_rows == 0) {
          $envodb->query('INSERT INTO ' . DB_PREFIX . 'tagcloud SET tag = "' . smartsql($row['tag']) . '"');
        } else {
          $envodb->query('UPDATE ' . DB_PREFIX . 'tagcloud SET count = count + 1 WHERE tag = "' . smartsql($row['tag']) . '"');
        }
      }
    }

    $envodb->query('UPDATE ' . DB_PREFIX . 'tags SET active = IF (active = 1, 0, 1) WHERE itemid = "' . smartsql($envovar) . '" AND pluginid = "' . smartsql($envovar1) . '"');

  }

  public static function envoDeleteTags($envovar, $envovar1)
  {

    global $envodb;
    $result = $envodb->query('SELECT tag FROM ' . DB_PREFIX . 'tags WHERE itemid = "' . smartsql($envovar) . '" AND pluginid = "' . smartsql($envovar1) . '"');
    while ($row = $result->fetch_assoc()) {

      // Get the count number
      $count = $envodb->queryRow('SELECT count FROM ' . DB_PREFIX . 'tagcloud WHERE tag = "' . smartsql($row['tag']) . '" LIMIT 1');

      if ($count['count'] <= '1') {
        $envodb->query('DELETE FROM ' . DB_PREFIX . 'tagcloud WHERE tag = "' . smartsql($row['tag']) . '"');
      } else {
        $envodb->query('UPDATE ' . DB_PREFIX . 'tagcloud SET count = count - 1 WHERE tag = "' . smartsql($row['tag']) . '"');
      }
    }

    $envodb->query('DELETE FROM ' . DB_PREFIX . 'tags WHERE itemid = "' . smartsql($envovar) . '" AND pluginid = "' . smartsql($envovar1) . '"');
  }

  public static function envoDeleteOneTag($tag)
  {

    global $envodb;
    $result  = $envodb->query('SELECT tag FROM ' . DB_PREFIX . 'tags WHERE id = ' . smartsql($tag) . ' LIMIT 1');
    $tagname = $result->fetch_assoc();

    $result1 = $envodb->query('SELECT count FROM ' . DB_PREFIX . 'tagcloud WHERE tag = "' . $tagname['tag'] . '" LIMIT 1');
    $count   = $result1->fetch_assoc();

    if ($count['count'] <= '1') {

      $envodb->query('DELETE FROM ' . DB_PREFIX . 'tagcloud WHERE tag = "' . $tagname['tag'] . '"');

    } else {

      $envodb->query('UPDATE ' . DB_PREFIX . 'tagcloud SET count = count - 1 WHERE tag = "' . $tagname['tag'] . '"');

    }

    $envodb->query('DELETE FROM ' . DB_PREFIX . 'tags WHERE id = ' . smartsql($tag) . '');
  }

  public function envoPluginTag($allcat)
  {

    foreach ($allcat as $c) {
      if ($c['pluginid'] == 3)
        $case = $c['pagename'];

    }

    return $case;

  }

}

?>