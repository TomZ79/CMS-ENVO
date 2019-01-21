<?php if (ENVO_PLUGIN_ACCESS_WIKI) {
	// Get URL
	$url_array = explode('/', $_SERVER['REQUEST_URI']);
	$url       = end($url_array);
	// Get WIKI Categories
	$ENVO_WIKI_CAT = ENVO_base ::envoGetcatmix(ENVO_PLUGIN_VAR_WIKI, '', DB_PREFIX . 'wikicategories', ENVO_USERGROUPID, $setting["wikiurl"]);

	if ($ENVO_WIKI_CAT) { ?>
		<aside class="nav-side-menu">

			<h4 class="brand"><?= ENVO_PLUGIN_NAME_WIKI . ' ' . $tlw["wiki_frontend"]["wiki3"] ?></h4>
			<span class="toggle-btn c-icons" data-toggle="collapse" data-target="#wikisidebar"></span>

			<div class="menu-list">
				<ul class="menu-content collapse" id="wikisidebar">
					<?php if (isset($ENVO_WIKI_CAT) && is_array($ENVO_WIKI_CAT)) foreach ($ENVO_WIKI_CAT as $c) { ?><?php if ($c["catparent"] == 0) { ?>

						<li <?php
						// Class for all Wiki article in category
						if ($c["varname"] == $url) echo 'class="active"';
						// Class for Wiki article
						if ($c["varname"] == $WIKI_CAT) echo 'class="active"';

						?> >
							<a href="<?= $c["parseurl"] ?>" title="<?= strip_tags($c["content"]) ?>">
								<?php if ($c["catimg"]) { ?>
									<i class="fa <?= $c["catimg"] ?> fa-fw"></i>
								<?php }
								echo $c["name"]; ?>
								<span <?= ($c["count"] <= 9) ? 'class="count count-small"' : 'class="count"' ?>>
										<?= $c["count"] ?>
									</span>
							</a>

							<ul>
								<?php if (isset($ENVO_WIKI_CAT) && is_array($ENVO_WIKI_CAT)) foreach ($ENVO_WIKI_CAT as $c1) { ?><?php if ($c1["catparent"] != '0' && $c1["catparent"] == $c["id"]) { ?>
									<li>
										<a href="<?= $c1["parseurl"] ?>" title="<?= strip_tags($c1["content"]) ?>">
											<?php if ($c1["catimg"]) { ?>
												<i class="fa <?= $c1["catimg"] ?> fa-fw"></i>
											<?php }
											echo $c1["name"]; ?>
											<span <?= ($c["count"] <= 9) ? 'class="count count-small"' : 'class="count"' ?>>
                            <?= $c1["count"] ?>
                          </span>
										</a>
									</li>
								<?php }
								} ?>
							</ul>
						</li>
					<?php }
					} ?>
				</ul>
			</div>

			<hr>
		</aside>

	<?php }
} ?>