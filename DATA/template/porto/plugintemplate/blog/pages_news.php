<?php include_once APP_PATH . 'plugins/blog/functions.php';

$showblogarray = explode(":", $row['showblog']);

if (is_array($showblogarray) && in_array("ASC", $showblogarray) || in_array("DESC", $showblogarray)) {

	$ENVO_BLOG = envo_get_blog('LIMIT ' . $showblogarray[1], 't1.id ' . $showblogarray[0], '', 't1.id', $setting["blogurl"], $tl['global_text']['gtxt4']);

} else {

	$ENVO_BLOG = envo_get_blog('', 't1.id ASC', $row['showblog'], 't1.id', $setting["blogurl"], $tl['global_text']['gtxt4']);
}

?>

<section class="mt-5">
	<div class="container">
		<h4><?= $setting["blogtitle"] ?></h4>
		<div class="owl-carousel owl-theme show-nav-title top-border">

			<?php

			// SHOW - Blog
			if (isset($ENVO_BLOG) && is_array($ENVO_BLOG)) foreach ($ENVO_BLOG as $bl) {
				?>

				<article class="post post-large item">
					<div class="post-date">
						<span class="day"><?= strftime("%d", strtotime($bl["created"])) ?></span>
						<span class="month"><?= strftime("%b", strtotime($bl["created"])) ?></span>
					</div>
					<div class="post-content">

						<?php

						echo '<h4><a href="' . $bl["parseurl"] . '" class="text-decoration-none" title="' . $bl["title"] . '">' . envo_cut_text($bl["title"], 50, "...") . '</a></h4>';

						?>

						<blockquote class="blockquote-primary">
							<p><?= $bl["contentshort"] ?></p>
						</blockquote>

						<?php

						echo '<a href="' . $bl["parseurl"] . '" class="read-more text-color-dark font-weight-bold text-2">' . $tlblog["blog_frontend"]["blog"] . '<i class="fas fa-chevron-right text-1 ml-1"></i></a>';

						?>

					</div>


					<?php
					// SYSTEM ICONS - Edit and Quick Edit
					if (ENVO_ACCESS) { ?>
						<div class="system-icons clearfix">
							<div class="pull-right hidden-xs">
								<a class="btn btn-filled btn-warning rounded-0 btn-xs" href="<?= BASE_URL ?>admin/index.php?p=blog&amp;sp=edit&amp;id=<?= $bl["id"] ?>" title="<?= $tl["button"]["btn1"] ?>">
									<?= $tl["button"]["btn1"] ?>
								</a>
								<a class="btn btn-filled btn-warning rounded-0 btn-xs quickedit" href="<?= BASE_URL ?>admin/index.php?p=blog&amp;sp=quickedit&amp;id=<?= $bl["id"] ?>" title="<?= $tl["button"]["btn2"] ?>">
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