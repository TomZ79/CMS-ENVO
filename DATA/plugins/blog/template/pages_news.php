<?php include_once APP_PATH . 'plugins/blog/functions.php';

$showblogarray = explode(":", $row['showblog']);

if (is_array($showblogarray) && in_array("ASC", $showblogarray) || in_array("DESC", $showblogarray)) {

	$ENVO_BLOG = envo_get_blog('LIMIT ' . $showblogarray[1], 't1.id ' . $showblogarray[0], '', 't1.id', $setting["blogurl"], $tl['global_text']['gtxt4']);

} else {

	$ENVO_BLOG = envo_get_blog('', 't1.id ASC', $row['showblog'], 't1.id', $setting["blogurl"], $tl['global_text']['gtxt4']);
}

?>

<h3 class="text-color"><?= $tlblog["blog"]["d3"] ?></h3>
<div class="row">
	<?php if (isset($ENVO_BLOG) && is_array($ENVO_BLOG)) foreach ($ENVO_BLOG as $bl) { ?>

		<!-- Post -->
		<div class="col-md-3 col-sm-6">
			<div class="envo-post">
				<!-- Post Info -->
				<div class="post-info">
					<div class="info-details">
						<?php if ($bl["showdate"]) { ?><i class="fa fa-clock-o"></i> <?= $bl["created"] ?><br><?php } ?>
						<i class="fa fa-eye"></i> <?= $tl["general"]["g13"] . $bl["hits"] ?>
					</div>
				</div>
				<!-- End Post Info -->
				<!-- Post Image -->
				<a href="<?= $bl["parseurl"] ?>"><img src="<?= BASE_URL . $bl["previmg"] ?>" alt="blog-preview" class="post-image img-responsive"></a>
				<!-- End Post Image -->
				<!-- Post Title & Summary -->
				<div class="post-title">
					<h3><a href="<?= $bl["parseurl"] ?>"><?= envo_cut_text($bl["title"], 20, "") ?></a></h3>
				</div>
				<div class="post-summary">
					<p><?= $bl["contentshort"] ?></p>
				</div>
				<!-- End Post Title & Summary -->
				<div class="post-more">
					<a href="<?= $bl["parseurl"] ?>" class="btn btn-color btn-sm"><?= $tl["general"]["g3"] ?></a>
					<?php if (ENVO_ACCESS) { ?>

						<a href="<?= BASE_URL ?>admin/index.php?p=blog&amp;sp=edit&amp;id=<?= $bl["id"] ?>" title="<?= $tl["general"]["g"] ?>" class="btn btn-default btn-sm"><i class="fa fa-pencil"></i></a>

						<a class="btn btn-default btn-sm quickedit" href="<?= BASE_URL ?>admin/index.php?p=blog&amp;sp=quickedit&amp;id=<?= $bl["id"] ?>" title="<?= $tl["button"]["btn2"] ?>"><i class="fa fa-edit"></i></a>

					<?php } ?>
				</div>
			</div>
		</div>
		<!-- End Post -->

	<?php } ?>
</div>