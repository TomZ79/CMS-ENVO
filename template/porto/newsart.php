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

if (ENVO_ASACCESS) {
	$apedit  = BASE_URL . 'admin/index.php?p=news&amp;sp=editnews&amp;id=' . $PAGE_ID;
	$qapedit = BASE_URL . 'admin/index.php?p=news&amp;sp=quickedit&amp;id=' . $PAGE_ID;
}

?>

	<section>
		<div class="container">
			<div class="row">
				<div class="news-article">


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

						if ($SHOWTITLE) echo '<h3 class="text-color-dark font-weight-normal text-6">' . $PAGE_TITLE . '</h3>';

						?>

					</div>
					<div class="article-head d-flex mb-2">

						<?php

						if ($SHOWDATE || $SHOWHITS) {
							// SHOW - Date
							if ($SHOWDATE) {
								echo '<span class="date mr-3"><strong class="text-2">' . $tl["news"]["news3"] . '</strong>' . ' : <time datetime="' . $PAGE_TIME . '">' . $PAGE_TIME . '</time></span>';
							}

							// SHOW - Hits
							if ($SHOWHITS) {
								echo '<span class="hits"><strong class="text-2">' . $tl["news"]["news2"] . '</strong>' . ' : ' . $PAGE_HITS . '</span>';
							}
						}

						// SHOW - Tag List
						if ($SHOWTAGS && $ENVO_TAGLIST) {
							echo '<ul class="ml-auto tags-list mb-0">';
							echo $ENVO_TAGLIST;
							echo '</ul>';
						}

						?>

					</div>

					<?php
					if ($SHOWTITLE || $SHOWDATE || $SHOWHITS || ($SHOWTAGS && $ENVO_TAGLIST)) {
						echo '<hr>';
					}
					?>

					<div class="article-content">

						<?php

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

				</div>
			</div>
		</div>
	</section>

	<div class="row align-items-center mt-5">

		<?php if ($ENVO_NAV_PREV) { ?>
			<div class="col">
				<a href="<?= $ENVO_NAV_PREV ?>" class="portfolio-prev text-decoration-none d-block">
					<div class="d-flex align-items-center line-height-1">
						<i class="fas fa-arrow-left text-dark text-4 mr-3"></i>
						<div class="d-none d-sm-block line-height-1">
							<span class="text-dark opacity-4 text-1">PŘEDCHOZÍ</span>
							<h4 class="font-weight-bold text-3 mb-0"><?= envo_cut_text($ENVO_NAV_PREV_TITLE, 30, '...') ?></h4>
						</div>
					</div>
				</a>
			</div>
		<?php } ?>
		<?php if ($ENVO_NAV_NEXT) { ?>
			<div class="col">
				<a href="<?= $ENVO_NAV_NEXT ?>" class="portfolio-next text-decoration-none d-block float-right ">
					<div class="d-flex align-items-center text-right line-height-1">
						<div class="d-none d-sm-block line-height-1">
							<span class="text-dark opacity-4 text-1">DALŠÍ</span>
							<h4 class="font-weight-bold text-3 mb-0"><?= envo_cut_text($ENVO_NAV_NEXT_TITLE, 30, '...') ?></h4>
						</div>
						<i class="fas fa-arrow-right text-dark text-4 ml-3"></i>
					</div>
				</a>
			</div>
		<?php } ?>

	</div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>