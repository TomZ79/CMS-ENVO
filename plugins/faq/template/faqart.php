<?php
/**
 * ALL VALUE for FRONTEND - faqart.php
 *
 * $PAGE_ID              číslo    |  - id článku
 * $PAGE_TITLE           text        - Titulek článku
 * $PAGE_CONTENT         text        - Celý popis článku
 * $SHOWTITLE            ano/ne      - Zobrazení nadpisu
 * $SHOWDATE             ano/ne      - Zobrazení datumu
 * $SHOWSOCIALBUTTON     ano/ne      - Zobrazení sociálních tlačítek
 * $FAQ_HITS             číslo       - Počet Zobrazení
 * $PAGE_TIME            date        - Datum vytvoření článku
 * $PAGE_TIME_HTML5
 * $ENVO_TAGLIST          text        - Seznam tagů
 * $FAQ_CATLIST          text        - Seznam kategorií
 *
 */
?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=faq&amp;sp=edit&amp;id=' . $PAGE_ID;
$qapedit = BASE_URL . 'admin/index.php?p=faq&amp;sp=quickedit&amp;id=' . $PAGE_ID;
if ($setting["printme"]) $printme = 1; ?>

  <div id="printdiv">
    <div class="row">
      <div class="col-md-12">
        <h3><?php echo $PAGE_TITLE; ?></h3>
        <div>
          <p style="font-size: 0.9em">

            <?php
            if ($SHOWDATE) {
              echo '<span style="margin-right: 20px;"><strong>' . $tlf["faq_frontend"]["faq4"] . '</strong> : ' . $PAGE_TIME . '</span>';
            }
            echo '<span style="margin-right: 20px;"><strong>' . $tlf["faq_frontend"]["faq5"] . '</strong> : ' . $FAQ_HITS . '</span>';
            echo '<span style="margin-right: 20px;"><strong>' . $tlf["faq_frontend"]["faq6"] . '</strong> : ' . $FAQ_CATLIST . '</span>';

            if ($ENVO_TAGLIST) {

              echo '<span style="margin-right: 20px;">' . $ENVO_TAGLIST . '</span>';

            } ?>

          </p>
        </div>
      </div>
    </div>
    <hr>
    <?php echo $PAGE_CONTENT; ?>
  </div>

<?php if ($ENVO_SHOW_C_FORM) {
  include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/contact.php';
} ?>

  <!-- Show Social Buttons -->
<?php if ($SHOWSOCIALBUTTON) { ?>
  <div class="col-md-12">
    <div class=" pull-right" style="display: table;">
      <div style="display: table-cell;vertical-align: middle;/*! margin-right: 20px; */padding-right: 20px;">
        <strong><?php echo $tl["share"]["share"] . ' '; ?></strong>
      </div>
      <div id="sollist-sharing"></div>
    </div>
  </div>
<?php } ?>

  <div class="col-md-12">
    <ul class="pager">
      <?php if ($ENVO_NAV_PREV) { ?>
        <li class="previous">
          <a href="<?php echo $ENVO_NAV_PREV; ?>">
            <i class="fa fa-caret-left"></i>
            <span class="nav_text_left"><?php echo $ENVO_NAV_PREV_TITLE; ?></span>
          </a>
        </li>
      <?php }
      if ($ENVO_NAV_NEXT) { ?>
        <li class="next">
          <a href="<?php echo $ENVO_NAV_NEXT; ?>">
            <span class="nav_text_right"><?php echo $ENVO_NAV_NEXT_TITLE; ?></span>
            <i class="fa fa-caret-right"></i>
          </a>
        </li>
      <?php } ?>
    </ul>
  </div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>