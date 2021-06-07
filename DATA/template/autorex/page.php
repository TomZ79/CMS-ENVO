<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

// Set local language
setlocale(LC_TIME, $setting["locale"] . '.utf8');

if (!$PAGE_ACTIVE) {
	echo '<div class="alert alert-danger">' . $tl["general_error"]["generror2"] . '</div>';
} else {

	// Set link value for page editing
	if (ENVO_ASACCESS) {
		if ($setting["printme"]) $printme = 1;
		$apedit  = BASE_URL . 'admin/index.php?p=page&amp;sp=edit&amp;id=' . $PAGE_ID;
		$qapedit = BASE_URL . 'admin/index.php?p=page&amp;sp=quickedit&amp;id=' . $PAGE_ID;
	}

	if ($setting["printme"]) {
		echo '<div id="printdiv">';
	}

	if ($PAGE_PASSWORD && !ENVO_ASACCESS && $PAGE_PASSWORD != $_SESSION['pagesecurehash' . $PAGE_ID]) {

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
				<div class="row">
					<div class="col d-flex justify-content-center">
						<form class="form-inline" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
							<input type="hidden" name="pagesec" value="<?= $PAGE_ID ?>"/>
							<div class="form-row">
								<div class="input-group">
									<input type="password" name="pagepass" class="form-control" value="" placeholder="<?= $tl["placeholder"]["plc2"] ?>"/>
									<span class="input-group-append">
                    <button class="btn btn-primary btn-lg" name="pageprotect" type="submit"><?= $tl["button"]["btn4"] ?></button>
                  </span>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</section>

	<?php } else {

		// NOT PROTECTED PAGE

		if ($PAGE_SHOWTITLE) {
			echo '<div>';
			echo '<h3 class="text-color-dark font-weight-normal text-6">' . $PAGE_TITLE . '</h3>';
			echo '</div>';
		}

		// SHOW - Date, hits and tag list
		if ($SHOWDATE || $SHOWHITS || ($ENVO_TAGLIST && $SHOWTAGS)) {
			echo '<div class="d-flex mb-2">';

			// SHOW - Date
			if ($SHOWDATE) {
				echo '<span class="date mr-3"><strong class="text-2">' . $tl["news"]["news3"] . '</strong>' . ' : <time datetime="' . $PAGE_TIME . '">' . $PAGE_TIME . '</time></span>';
			}

			// SHOW - Hits
			if ($SHOWHITS) {
				echo '<span class="hits"><strong class="text-2">' . $tl["news"]["news2"] . '</strong>' . ' : ' . $PAGE_HITS . '</span>';
			}

			// SHOW - Tag List
			if ($SHOWTAGS && $ENVO_TAGLIST) {
				echo '<ul class="ml-auto tags-list mb-0">';
				echo $ENVO_TAGLIST;
				echo '</ul>';
			}

			echo '</div>';
		}

		if ($PAGE_SHOWTITLE || $SHOWDATE || $SHOWHITS || ($SHOWTAGS && $ENVO_TAGLIST)) {
			echo '<hr>';
		}

		if (isset($ENVO_HOOK_PAGE) && is_array($ENVO_HOOK_PAGE)) foreach ($ENVO_HOOK_PAGE as $hpage) {
			include_once APP_PATH . $hpage["phpcode"];
		}

		// LOAD - Grid Page
		if (isset($ENVO_PAGE_GRID) && is_array($ENVO_PAGE_GRID)) foreach ($ENVO_PAGE_GRID as $pg) {

			// SHOW - Page Content
			if ($pg["pluginid"] == '9999') {
				echo $PAGE_CONTENT;
			}

			// SHOW - News Grid for page
			if (($pg["pluginid"] == '9998') && isset($ENVO_NEWS_IN_CONTENT) && is_array($ENVO_NEWS_IN_CONTENT)) {

				?>

				<section>
					<div class="container">
						<h4><?= $setting["newstitle"] ?></h4>
						<div class="owl-carousel owl-theme show-nav-title top-border">

							<?php

							// SHOW - News
							foreach ($ENVO_NEWS_IN_CONTENT as $n) {
								?>

								<article class="post post-large item">
									<div class="post-date">
										<span class="day"><?= strftime("%d", strtotime($n["created"])) ?></span>
										<span class="month"><?= strftime("%b", strtotime($n["created"])) ?></span>
									</div>
									<div class="post-content">

										<?php

										echo '<h4><a href="' . $n["parseurl"] . '" class="text-decoration-none" title="' . $n["title"] . '">' . envo_cut_text($n["title"], 50, "...") . '</a></h4>';

										?>

										<blockquote class="blockquote-primary">
											<p><?= $n["contentshort"] ?></p>
										</blockquote>

										<?php

										echo '<a href="' . $n["parseurl"] . '" class="read-more text-color-dark font-weight-bold text-2">' . $tl["global_text"]["gtxt10"] . '<i class="fas fa-chevron-right text-1 ml-1"></i></a>';

										?>

									</div>


									<?php
									// SYSTEM ICONS - Edit and Quick Edit
									if (ENVO_ASACCESS) { ?>
										<div class="system-icons clearfix">
											<div class="pull-right hidden-xs">
												<a class="btn btn-filled btn-warning rounded-0 btn-xs" href="<?= BASE_URL ?>admin/index.php?p=news&amp;sp=edit&amp;id=<?= $n["id"] ?>" title="<?= $tl["button"]["btn1"] ?>">
													<?= $tl["button"]["btn1"] ?>
												</a>
												<a class="btn btn-filled btn-warning rounded-0 btn-xs quickedit" href="<?= BASE_URL ?>admin/index.php?p=news&amp;sp=quickedit&amp;id=<?= $n["id"] ?>" title="<?= $tl["button"]["btn2"] ?>">
													<?= $tl["button"]["btn2"] ?>
												</a>
											</div>
										</div>
									<?php } ?>

								</article>

								<?php
							}
							?>

						</div>
					</div>
				</section>

				<?php
			}

			// LOAD - Hook PHP Code for page
			if (isset($ENVO_HOOK_PAGE_GRID) && is_array($ENVO_HOOK_PAGE_GRID)) foreach ($ENVO_HOOK_PAGE_GRID as $hpagegrid) {
				eval($hpagegrid["phpcode"]);
			}

		}

		// SHOW - Date, social buttons and tag list
		if ($SHOWSOCIALBUTTON) { ?>
			<section class="pt-1 pb-1">
				<div class="container">
					<div class="row">
						<div class="col">

							<?php if ($SHOWSOCIALBUTTON) { ?>
								<div class="float-right">
									<div style="display: table;">
										<div style="display: table-cell;vertical-align: middle;padding-right: 20px;">
											<strong><?= $tl["share"]["share"] . ' ' ?></strong>
										</div>
										<div id="sollist-sharing"></div>
									</div>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</section>
		<?php }

	}

	if ($setting["printme"]) {
		echo '</div>';
	}

}

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php';

?>