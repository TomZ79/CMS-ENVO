<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?= $PAGE_CONTENT ?>

	<section class="mt-5 mb-5">
		<div class="auto-container">
			<div class="row">
				<div class="col-sm-6 offset-sm-3">

					<?php

					// TODO: Rozpracovat více sitemap. Má to chybu, že prohledá stránky pouze jen do první úrovně

					if (isset($ENVO_CAT_SITE) && is_array($ENVO_CAT_SITE)) {

						echo '<ul class="list ml-5">';

						foreach ($ENVO_CAT_SITE as $v) {
							if (($v["catparent"] == '0') && (($v["showmenu"] > '0') || ($v["showfooter "] > '0'))) {

								echo '<li><h4><a href="' . $v["varname"] . '"><strong>' . $v["name"] . '</strong></a></h4>';

								echo '<ul class="ml-4 mt-2 mb-2">';

								if (isset($ENVO_CAT_SITE) && is_array($ENVO_CAT_SITE)) {
									foreach ($ENVO_CAT_SITE as $z) {
										if ($z["catparent"] != '0' && $z["catparent"] == $v["id"]) {
											echo '<li>';
											echo '<a href="' . $z["varname"] . '">' . $z["name"] . '</a>';
											echo '</li>';
										}
									}
								}

								echo '</ul>';

							}

						}

						echo '</ul>';

					}

					?>

				</div>

				<?php

				if (isset($ENVO_HOOK_SITEMAP) && is_array($ENVO_HOOK_SITEMAP)) foreach ($ENVO_HOOK_SITEMAP as $hs) {
					// include_once APP_PATH . $hs['phpcode'];
					eval($hs["phpcode"]);
				}

				?>

			</div>
		</div>
	</section>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>