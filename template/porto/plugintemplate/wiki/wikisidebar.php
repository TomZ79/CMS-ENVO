<?php

if (ENVO_PLUGIN_ACCESS_WIKI) {

	// Get URL
	$url_array = explode('/', $_SERVER['REQUEST_URI']);
	$url       = end($url_array);
	// Get WIKI Categories
	$ENVO_WIKI_CAT = ENVO_base ::envoGetcatmix(ENVO_PLUGIN_VAR_WIKI, '', DB_PREFIX . 'wikicategories', ENVO_USERGROUPID, $setting["wikiurl"]);

	if ($ENVO_WIKI_CAT) { ?>

		<aside class="nav-side-menu">

			<h4 class="brand"><?= ENVO_PLUGIN_NAME_WIKI . ' - ' . $tlw["wiki_frontend"]["wiki3"] ?></h4>
			<span class="toggle-btn c-icons" data-toggle="collapse" data-target="#wikisidebar"></span>

			<div class="menu-list">
				<ul class="menu-content collapse" id="wikisidebar">

					<?php

					if (isset($ENVO_WIKI_CAT) && is_array($ENVO_WIKI_CAT)) {
						foreach ($ENVO_WIKI_CAT as $c) {

							if ($c["catparent"] == 0) {

								// EN: Main Category -> MainCategory
								// CZ:
								// ---------------------------------------------------------------------
								if ($c["varname"] == $url) {
									// Class for active category by parse URL
									echo '<li class="active">';
								} else if (isset($WIKI_CAT) && in_array($c["id"], array_column($WIKI_CAT, 'id'))) {
									// Class for Blog article - active class for categories by 'ID'
									echo '<li class="active">';
								} else {
									// Class for not active category
									echo '<li class="">';
								}

								if ($c["maincat"] > 0) {
									echo '<a href="#" title="' . strip_tags($c["content"]) . '">';
								} else {
									echo '<a href="' . $c["parseurl"] . '" title="' . strip_tags($c["content"]) . '">';
								}

								if ($c["catimg"]) {
									echo '<i class="fa' . $c["catimg"] . ' fa-fw"></i>';
								}
								echo $c["name"];
								if ($c["maincat"] == 0) {
									echo '<span ' . (($c["count"] <= 9) ? 'class="count count-small"' : 'class="count"') . '>' . $c["count"] . '</span>';
								}

								echo '</a>';

								// EN: Category in Submenu -> SubCategory
								// CZ:
								// ---------------------------------------------------------------------
								if ($c["maincat"] > 0) {

									echo '<ul class="sub-menu">';

									foreach ($ENVO_WIKI_CAT as $c1) {
										if ($c1["catparent"] != '0' && $c1["catparent"] == $c["id"]) {

											if ($c1["varname"] == $url) {
												// Class for active category by parse URL
												echo '<li class="active">';
											} else if (isset($WIKI_CAT) && in_array($c1["id"], array_column($WIKI_CAT, 'id'))) {
												// Class for Blog article - active class for all blog categories
												echo '<li class="active">';
											} else {
												// Class for Blog article - active class for categories by 'ID'
												echo '<li class="">';
											}

											echo '<a href="' . $c1['parseurl'] . '" title="' . strip_tags($c1['content']) . '">';
											if ($c1["catimg"]) {
												echo '<i class="fa ' . $c1['catimg'] . 'fa-fw"></i>';
											}
											echo $c1["name"];
											echo '<span ' . ($c["count"] <= 9 ? 'class="count count-small"' : 'class="count"') . '" title="' . strip_tags($c1['content']) . '">' . $c1['count'] . '</span>';
											echo "</a>";
											echo "</li>";
										}
									}
									echo '</ul>';

								}

								echo '</li>';

							}
						}
					}

					?>
				</ul>
			</div>

			<hr>
		</aside>

	<?php }
}

?>