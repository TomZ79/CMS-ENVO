<?php include_once APP_PATH . 'template/canvas/header.php'; ?>

<?php if (isset($JAK_HOOK_NEWS) && is_array ($JAK_HOOK_NEWS)) foreach ($JAK_HOOK_NEWS as $n) {
	include_once APP_PATH . $n['phpcode'];
} ?>

	<!-- Posts
			============================================= -->
	<div id="posts" class="post-grid grid-container clearfix" data-layout="fitRows">

		<?php if (isset($JAK_NEWS_ALL) && is_array ($JAK_NEWS_ALL)) foreach ($JAK_NEWS_ALL as $v) { ?>

			<div class="entry clearfix">
				<div class="entry-image">
					<a href="<?php echo $v["parseurl"]; ?>">
						<img class="image_fade" src="<?php echo $v["previmg"]; ?>" alt="Preview - <?php echo $v["title"]; ?>">
					</a>
				</div>
				<div class="entry-title">
					<h2><a href="<?php echo $v["parseurl"]; ?>"><?php echo jak_cut_text ($v["title"], 30, ""); ?></a></h2>
				</div>
				<ul class="entry-meta clearfix">
					<li><i class="icon-calendar3"></i> <?php echo $v["created"]; ?></li>
					<li><i class="fa fa-eye"></i> <?php echo $v["hits"]; ?></li>
				</ul>
				<div class="entry-content">
					<p><?php echo $v["contentshort"]; ?></p>
					<a href="<?php echo $v["parseurl"]; ?>" class="more-link"><?php echo $tl["general"]["g3"]; ?></a>
					<?php if (JAK_ASACCESS) { ?>
						<div class="pull-right">

							<a href="<?php echo BASE_URL; ?>admin/index.php?p=news&amp;sp=edit&amp;id=<?php echo $v["id"]; ?>" class="button button-mini button-border button-rounded jaktip" title="<?php echo $tl["general"]["g"]; ?>" style="padding: 0 3px 0 7px;line-height: 21px;"><span><i class="fa fa-pencil"></i></span></a>

							<a href="<?php echo BASE_URL; ?>admin/index.php?p=news&amp;sp=quickedit&amp;id=<?php echo $v["id"]; ?>" class="button button-mini button-border button-rounded jaktip quickedit" title="<?php echo $tl["general"]["g176"]; ?>" style="padding: 0 3px 0 7px;line-height: 21px;"><span><i class="fa fa-edit"></i></span></a>

						</div>
					<?php } ?>
				</div>
			</div>

		<?php } ?>

	</div><!-- #posts end -->

<?php if ($JAK_PAGINATE) echo $JAK_PAGINATE; ?>

<?php include_once APP_PATH . 'template/canvas/footer.php'; ?>