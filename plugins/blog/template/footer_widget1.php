<?php

if (ENVO_PLUGIN_ACCESS_BLOG) {

	$ENVO_BLOG_CAT = ENVO_base ::envoGetcatmix(ENVO_PLUGIN_VAR_BLOG, '', DB_PREFIX . 'blogcategories', ENVO_USERGROUPID, $setting["blogurl"]);

	if ($ENVO_BLOG_CAT) { ?>

		<h3><?= ENVO_PLUGIN_NAME_BLOG . ' ' . $tlblog["blog"]["d8"] ?></h3>
		<ul class="nav nav-pills nav-stacked">
			<?php if (isset($ENVO_BLOG_CAT) && is_array($ENVO_BLOG_CAT)) foreach ($ENVO_BLOG_CAT as $c) { ?>
				<li><a href="<?= $c["parseurl"] ?>"><?php if ($c["catimg"]) { ?><img
							src="<?= BASE_URL . $c["catimg"] ?>" alt="sideimg" /><?php }
						echo $c["name"]; ?> (<?= $c["count"] ?>)</a>
				</li>
			<?php } ?>
		</ul>

	<?php }
} ?>