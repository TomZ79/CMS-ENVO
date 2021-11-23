<?php
/*
 * ALL VALUE for FRONTEND - newsart.php
 *
 * $PAGE_ID 							    number		|	- id článku News
 * $PAGE_TITLE					    	string			- Titulek stránky
 * $MAIN_SITE_DESCRIPTION			string			- Popis News (načteno z popisu v nastavení News)
 * $PAGE_IMAGE
 * $PAGE_CONTENT
 * $SHOWTITLE
 * $SHOWDATE
 * $SHOWHITS
 * $SHOWSOCIALBUTTON
 * $PAGE_ACTIVE
 * $PAGE_HITS
 * $PAGE_TIME
 * $DATE_TIME
 *
 *
 *
 */
?>

<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if (!$PAGE_ACTIVE) {
  echo '<div class="alert alert-danger">' . $tl["general_error"]["generror2"] . '</div>';
}

if (ENVO_ACCESS) {
  $apedit  = BASE_URL . 'admin/index.php?p=news&amp;sp=editnews&amp;id=' . $PAGE_ID;
  $qapedit = BASE_URL . 'admin/index.php?p=news&amp;sp=quickedit&amp;id=' . $PAGE_ID;
}

?>

  <section>
    <div class="container-fluid">
      <div class="row">
        <article class="news-article">


          <?php

          if (isset($ENVO_HOOK_PAGE) && is_array($ENVO_HOOK_PAGE)) foreach ($ENVO_HOOK_PAGE as $hpage) {
            include_once APP_PATH . $hpage["phpcode"];
          }

          if (isset($ENVO_PAGE_GRID) && is_array($ENVO_PAGE_GRID)) foreach ($ENVO_PAGE_GRID as $pg) {

            // Load News Grid
            if (isset($ENVO_HOOK_NEWS_GRID) && is_array($ENVO_HOOK_NEWS_GRID)) foreach ($ENVO_HOOK_NEWS_GRID as $hpagegrid) {
              eval($hpagegrid["phpcode"]);
            }
          }

          ?>

          <div class="article-title">

            <?php

            if ($SHOWTITLE) echo '<h3>' . $PAGE_TITLE . '</h3>';

            ?>

          </div>
          <div class="article-head">

            <?php

            if ($SHOWDATE || $SHOWHITS) {
              // SHOW - Date
              if ($SHOWDATE) {
                echo '<span class="art-date"><strong>' . $tl["news"]["news3"] . '</strong>' . ' : <time datetime="' . $PAGE_TIME . '">' . $PAGE_TIME . '</time></span>';
              }

              // SHOW - Hits
              if ($SHOWHITS) {
                echo '<span class="art-hits"><strong>' . $tl["news"]["news2"] . '</strong>' . ' : ' . $PAGE_HITS . '</span>';
              }
            }
            ?>

          </div>
          <div class="article-content">

            <?php

            // SHOW - Tag List
            if ($ENVO_TAGLIST) {
              echo '<ul class="entry-meta">';
              echo ENVO_tags::envoGetTagList_class($page2, ENVO_PLUGIN_ID_NEWS, ENVO_PLUGIN_VAR_TAGS, 'tips', $tl["title_element"]["tel"]);
              echo '</ul>';

            }

            // SHOW - Page content
            echo $PAGE_CONTENT;

            // SHOW - Social Button
            if ($SHOWSOCIALBUTTON) { ?>

              <div class="col-md-12">
                <hr>
                <div class="pull-right" style="display: table;">
                  <div style="display: table-cell;vertical-align: middle;/*! margin-right: 20px; */padding-right: 20px;">
                    <strong><?= $tl["share"]["share1"] . ' ' ?></strong>
                  </div>
                  <div id="sollist-sharing"></div>
                </div>
              </div>

            <?php } ?>

          </div>

        </article>
      </div>
    </div>
  </section>

  <section class="pt-small pb-small">
    <div class="container-fluid">
      <div class="row">
        <ul class="pager">
          <?php if ($ENVO_NAV_PREV) { ?>
            <li class="previous">
              <a href="<?= $ENVO_NAV_PREV ?>">
                <i class="fa fa-caret-left"></i>
                <span class="nav_text_left"><?= $ENVO_NAV_PREV_TITLE ?></span>
              </a>
            </li>
          <?php }
          if ($ENVO_NAV_NEXT) { ?>
            <li class="next">
              <a href="<?= $ENVO_NAV_NEXT ?>">
                <span class="nav_text_right"><?= $ENVO_NAV_NEXT_TITLE ?></span>
                <i class="fa fa-caret-right"></i>
              </a>
            </li>
          <?php } ?>
        </ul>
      </div>
    </div>
  </section>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>