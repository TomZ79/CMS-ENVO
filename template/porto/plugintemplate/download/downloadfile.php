<?php
/**
 * PLUGIN DOWNLOAD - ALL VALUE for FRONTEND - downloadfile.php
 * ------------------------------------------------------------------
 *
 * Soubor slouží pro generovaní (zobrazení) celkového seznamu článků
 *
 * Použitelné hodnoty s daty pro FRONTEND - downloadfile.php
 * ------------------------------------------------------------------
 *
 * $PAGE_ID                 number    | - ID článku
 * $PAGE_TITLE              string    | - Titulek článku
 * $PAGE_CONTENT            string    | - Celý popis článku
 * $SHOWTITLE               number    | - Zobrazení nadpisu ( hodnota 1 = ANO / 0 = NE )
 * $THUMBIMG                string    | - Relativní url adresa náhledového obrázku
 * $SHOWDATE                number    | - Zobrazení datumu ( hodnota 1 = ANO / 0 = NE )
 * $SHOWCATS                number    | - Zobrazení kategorií ( hodnota 1 = ANO / 0 = NE )
 * $SHOWDL                  number    | - Zobrazení počtu stažení ( hodnota 1 = ANO / 0 = NE )
 * $SHOWSOCIALBUTTON        number    | - Zobrazení sociálních tlačítek ( hodnota 1 = ANO / 0 = NE )
 * $FT_SHARE                number    | - Sdílení souboru na sociální sítě ( hodnota 1 = ANO / 0 = NE )
 * $DL_HITS                 number    | - Počet Zobrazení
 * $DL_DOWNLOADS            number    | - Počet stažení
 * $DL_PASSWORD             string    | - Heslo stránky (hash)
 * $DL_LINK                 string    | - Relativní url adresa souboru
 * $DL_FILE_BUTTON          boolean   |
 * $PAGE_PASSWORD           string    | - Heslo stránky (hash) - tato proměná se používá pro template
 * $PAGE_TIME               date      | - Datum vytvoření článku
 * $PAGE_TIME_HTML5         date      | - Datum vytvoření článku HTML 5 formát
 * $ENVO_TAGLIST            array     | - Seznam tagů
 * $DOWNLOAD_CAT            array     | - Seznam kategorií (Varname)
 * $DOWNLOAD_CATLIST        array     | - Seznam kategorií (html)
 *
 */

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=download&amp;sp=edit&amp;id=' . $PAGE_ID;
if ($setting["printme"]) $printme = 1;
$qapedit = BASE_URL . 'admin/index.php?p=download&amp;sp=quickedit&amp;id=' . $PAGE_ID;

?>

<?php

if ($DL_PASSWORD && !ENVO_ASACCESS && $DL_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID]) {
	// PROTECTED PAGE

	?>

	<section class="protected-page-area">
		<div class="container">

			<div class="row mb-3">
				<div class="col text-center">
					<h1><?= $tl["global_text"]["gtxt1"] ?></h1>
					<p><?= $tl["global_text"]["gtxt2"] ?></p>
				</div>
			</div>

			<?php if ($errorpp) { ?>

				<div class="alert bg-danger fade in">
					<button type="button" class="close" data-dismiss="alert">×</button>
					<?= $errorpp["e"] ?>
				</div>

			<?php } ?>

			<div class="row">
				<div class="col d-flex justify-content-center">
					<form class="form-inline" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
						<input type="hidden" name="dlsec" value="<?= $PAGE_ID ?>"/>
						<div class="form-row">
							<div class="input-group">
								<input type="password" name="dlpass" class="form-control" value="" placeholder="<?= $tld["downl_frontend_ph"]["downlph1"] ?>"/>
								<span class="input-group-append">
                    <button class="btn btn-primary btn-lg" name="dlprotect" type="submit"><?= $tl["button"]["btn3"] ?></button>
                  </span>
							</div>
						</div>
					</form>
				</div>
			</div>

		</div>
	</section>

<?php } else { ?>

	<div id="printdiv">
		<div class="row">
			<!-- Image Column -->
			<div class="col-sm-4">

				<?php
				// Image is available so display it or go standard image
				if ($THUMBIMG) {
					echo '<img src="' . $THUMBIMG . '" alt="Download" class="img-thumbnail img-fluid">';
				} else { ?>

					<div class="thumb-download text-center">
						<img src="/plugins/download/assets/img/file-for-download.png" alt="<?= $PAGE_TITLE ?>" class="img-thumbnail img-fluid">
						<div class="caption text-center">
							<span class="color1"><?= $tld["downl_frontend"]["downl14"] ?></span>
							<span class="color2"><?= $tld["downl_frontend"]["downl15"] ?></span>
						</div>
					</div>

				<?php } ?>

			</div>
			<!-- Project Info Column -->
			<div class="col-sm-8">
				<div class="article-title">

					<?php

					if ($SHOWTITLE) echo '<h3 class="text-color-dark font-weight-normal text-6">' . $PAGE_TITLE . '</h3>';

					?>

				</div>
				<div class="article-head mb-2">
					<?php

					if ($SHOWDATE || $SHOWDL) {
						echo '<div>';

						// SHOW - Date
						if ($SHOWDATE) {
							echo '<span class="date mr-3"><strong class="text-2">' . $tld["downl_frontend"]["downl30"] . '</strong>' . ' : <time datetime="' . $PAGE_TIME . '">' . $PAGE_TIME . '</time></span>';
						}

						// SHOW - Count of download
						if ($SHOWDL) {
							echo '<span class="hits mr-3"><strong class="text-2">' . $tld["downl_frontend"]["downl31"] . '</strong>' . ' : ' . $DL_DOWNLOADS . '</span>';
						}

						echo '</div>';
					}

					if ($SHOWCATS || $ENVO_TAGLIST) {
						echo '<div>';

						// SHOW - Category
						if ($SHOWCATS) {
							echo '<span class="category mr-3"><strong class="text-2">' . $tld["downl_frontend"]["downl32"] . '</strong>' . ' : ' . $DOWNLOAD_CATLIST . '</span>';
						}

						// SHOW - Tag list
						if ($ENVO_TAGLIST) {
							echo '<ul class="tags-list">' . $ENVO_TAGLIST . '</ul>';
						}

						echo '</div>';
					}


					?>
				</div>
				<hr>
				<div class="article-content">

					<?php

					// SHOW - Page content
					echo $PAGE_CONTENT;

					?>

				</div>
			</div>
		</div>

	</div>

	<?php if ($DL_FILE_BUTTON) { ?>
		<div class="row mt-5">

			<?php if ($FT_SHARE && $ENVO_FACEBOOK_SDK_CONNECTION) { // With Share on Social Sites, with Facebook SDK Connection ?>

				<div class="col-sm-8">
					<p>
						<?= $tld["downl_frontend"]["downl3"] ?> <br>
						<?= $tld["downl_frontend"]["downl4"] ?>
					</p>
					<div>
						<button class="btn btn-primary" onclick="shareOnFB();">Facebook</button>
					</div>
				</div><div id="results" class="col-sm-4 text-center">
					<a href="#" class="dclick btn btn-warning btn-lg" disabled="disabled"><?= $tld["downl_frontend"]["downl6"] ?></a>
				</div>

			<?php } elseif ($FT_SHARE && !$ENVO_FACEBOOK_SDK_CONNECTION) { // With Share on Social Sites, without Facebook SDK Connection ?>

				<div class="col-sm-8">
					<p>
						<?= $tld["downl_frontend"]["downl3"] ?> <br>
						<?= $tld["downl_frontend"]["downl4"] ?>
					</p>
					<p>
						<a href="javascript:void(0)" id="tweetLink" class="btn btn-warning">
							Twitter
						</a>
						<a href="javascript:void(0)" id="faceLink" class="btn btn-primary">
							Facebook
						</a>
					</p>
				</div><div class="col-sm-4 text-center">
					<a href="#" class="dclick btn btn-info btn-lg" disabled="disabled"><?= $tld["downl_frontend"]["downl6"] ?></a>
				</div>

			<?php } else { // Without Share on Social Sites ?>

				<div class="col-sm-8">
					<p><strong><?= $tld["downl_frontend"]["downl2"] ?></strong></p>
					<p><?= $tld["downl_frontend"]["downl5"] ?></p>
				</div><div class="col-sm-4 text-center">
					<p>
						<a class="dclick btn btn-info btn-lg" href="<?= $DL_LINK ?>"><?= $tld["downl_frontend"]["downl7"] ?></a>
					</p>
				</div>

			<?php } ?>

		</div>
	<?php } ?>

	<!-- Show Social Buttons -->
	<?php if ($SHOWSOCIALBUTTON) { ?>
		<div class="col-sm-12">
			<div class=" float-right" style="display: table;">
				<div style="display: table-cell;vertical-align: middle;/*! margin-right: 20px; */padding-right: 20px;">
					<strong><?= $tl["share"]["share"] . ' ' ?></strong>
				</div>
				<div id="sollist-sharing"></div>
			</div>
		</div>
	<?php } ?>

	<div class="row align-items-center mt-5">

		<?php if ($ENVO_NAV_PREV) { ?>
			<div class="col">
				<a href="<?= $ENVO_NAV_PREV ?>" class="portfolio-prev text-decoration-none d-block">
					<div class="d-flex align-items-center line-height-1">
						<i class="fas fa-arrow-left text-dark text-4 mr-3"></i>
						<div class="d-none d-sm-block line-height-1">
							<span class="text-dark opacity-4 text-1"><?= $tld["downl_frontend"]["downl18"] ?></span>
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
							<span class="text-dark opacity-4 text-1"><?= $tld["downl_frontend"]["downl19"] ?></span>
							<h4 class="font-weight-bold text-3 mb-0"><?= envo_cut_text($ENVO_NAV_NEXT_TITLE, 30, '...') ?></h4>
						</div>
						<i class="fas fa-arrow-right text-dark text-4 ml-3"></i>
					</div>
				</a>
			</div>
		<?php } ?>

	</div>

<?php } ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>