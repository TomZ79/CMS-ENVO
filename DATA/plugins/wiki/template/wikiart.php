<?php
/**
 * ALL VALUE for FRONTEND - wikiart.php
 *
 * $PAGE_ID                 number    | - ID článku
 * $PAGE_TITLE              string    | - Titulek článku
 * $PAGE_CONTENT            string    | - Celý popis článku
 * $SHOWTITLE               number    | - Zobrazení nadpisu ( hodnota 1 = ANO / 0 = NE )
 * $SHOWDATE                number    | - Zobrazení datumu ( hodnota 1 = ANO / 0 = NE )
 * $SHOWUPDATE              number    | - Zobrazení datumu - poslední změna ( hodnota 1 = ANO / 0 = NE )
 * $SHOWSOCIALBUTTON        number    | - Zobrazení sociálních tlačítek ( hodnota 1 = ANO / 0 = NE )
 * $WIKI_HITS               number    | - Počet Zobrazení
 * $PAGE_TIME_CREATE        date      | - Datum vytvoření článku
 * $PAGE_TIME_CREATE_HTML5  date      | - Datum vytvoření článku HTML 5 formát
 * $PAGE_TIME_UPDATE        date      | - Datum aktualizace článku
 * $PAGE_TIME_UPDATE_HTML5  date      | - Datum aktualizace článku HTML 5 formát
 * $ENVO_TAGLIST            string    | - Seznam tagů
 * $WIKI_CATLIST            string    | - Seznam kategorií
 *
 */

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=wiki&amp;sp=edit&amp;id=' . $PAGE_ID;
$qapedit = BASE_URL . 'admin/index.php?p=wiki&amp;sp=quickedit&amp;id=' . $PAGE_ID;
if ($setting["printme"]) $printme = 1;

?>

	<div id="printdiv">
		<div class="row">
			<div class="col-md-12">
				<h3><?= $PAGE_TITLE ?></h3>
				<div>
					<p style="font-size: 0.9em">

						<?php
						if ($SHOWDATE || $SHOWUPDATE || $SHOWHITS || $SHOWCATS) {
							// SHOW - Date
							if ($SHOWDATE) {
								echo '<span style="margin-right: 20px;"><strong>' . $tlw["wiki_frontend"]["wiki4"] . '</strong> : ' . $PAGE_TIME_CREATE . '</span>';
							}

							// SHOW - Update
							if ($SHOWUPDATE) {
								echo '<span style="margin-right: 20px;"><strong>' . $tlw["wiki_frontend"]["wiki7"] . '</strong>' . ' : ' . $PAGE_TIME_UPDATE . '</span>';
							}

							// SHOW - Hits
							if ($SHOWHITS) {
								echo '<span style="margin-right: 20px;"><strong>' . $tlw["wiki_frontend"]["wiki5"] . '</strong> : ' . $WIKI_HITS . '</span>';
							}

							// SHOW - Category
							if ($SHOWCATS) {
								echo '<span style="margin-right: 20px;"><strong>' . $tlw["wiki_frontend"]["wiki6"] . '</strong> : ' . $WIKI_CATLIST . '</span>';
							}

						}

						if ($ENVO_TAGLIST) {
							echo '<span style="margin-right: 20px;">' . $ENVO_TAGLIST . '</span>';
						}

						?>

					</p>
				</div>
			</div>
		</div>
		<hr>
		<?= $PAGE_CONTENT ?>
	</div>

	<!-- Show Social Buttons -->
<?php if ($SHOWSOCIALBUTTON) { ?>
	<div class="col-md-12">
		<div class=" pull-right" style="display: table;">
			<div style="display: table-cell;vertical-align: middle;/*! margin-right: 20px; */padding-right: 20px;">
				<strong><?= $tl["share"]["share"] . ' ' ?></strong>
			</div>
			<div id="sollist-sharing"></div>
		</div>
	</div>
<?php } ?>

	<div class="col-md-12">
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

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>