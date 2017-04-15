<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=setting'; ?>

	<!-- Posts
		============================================= -->
	<div id="posts" class="small-thumbs">

		<?php if (isset($JAK_BLOG_ALL) && is_array ($JAK_BLOG_ALL)) foreach ($JAK_BLOG_ALL as $v) { ?>
			<div class="entry clearfix">
				<div class="entry-image">
					<a href="<?php echo $v["parseurl"]; ?>"><img class="image_fade" src="<?php echo $v["previmg"]; ?>" alt="Preview - <?php echo $v["title"]; ?>"></a>
				</div>
				<div class="entry-c">
					<div class="entry-title">
						<h2><a href="<?php echo $v["parseurl"]; ?>"><?php echo jak_cut_text ($v["title"], 30, ""); ?></a></h2>
					</div>
					<ul class="entry-meta clearfix">
						<li><i class="icon-calendar3"></i> <?php echo $v["created"]; ?></li>
						<li><i class="fa fa-eye"></i> <?php echo $tl["global_text"]["gtxt"] . $v["hits"]; ?></li>
					</ul>
					<div class="entry-content">
						<p><?php echo $v["contentshort"]; ?></p>
						<a href="<?php echo $v["parseurl"]; ?>" class="more-link"><?php echo $tl["general"]["g3"]; ?></a>
						<?php if (JAK_ASACCESS) { ?>
							<div class="pull-right">

								<a href="<?php echo BASE_URL; ?>admin/index.php?p=blog&amp;sp=edit&amp;id=<?php echo $v["id"]; ?>" class="button button-mini button-border button-rounded jaktip" title="<?php echo $tl["general"]["g"]; ?>" style="padding: 0 3px 0 7px;line-height: 21px;"><span><i class="fa fa-pencil"></i></span></a>

								<a href="<?php echo BASE_URL; ?>admin/index.php?p=blog&amp;sp=quickedit&amp;id=<?php echo $v["id"]; ?>" class="button button-mini button-border button-rounded jaktip quickedit" title="<?php echo $tl["general"]["g176"]; ?>" style="padding: 0 3px 0 7px;line-height: 21px;"><span><i class="fa fa-edit"></i></span></a>

							</div>
						<?php } ?>
					</div>
				</div>
			</div>

		<?php } ?>

		<!-- Pagination
		============================================= -->
		<?php if ($JAK_PAGINATE) echo $JAK_PAGINATE; ?>

	</div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>