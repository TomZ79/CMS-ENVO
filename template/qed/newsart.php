<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/header.php'; ?>

<?php if (!$PAGE_ACTIVE) { ?>
	<div class="alert bg-danger">
		<?php echo $tl["errorpage"]["ep"]; ?>
	</div>
<?php }
if (JAK_ASACCESS) {
	$apedit  = BASE_URL . 'admin/index.php?p=news&amp;sp=edit&amp;id=' . $PAGE_ID;
	$qapedit = BASE_URL . 'admin/index.php?p=news&amp;sp=quickedit&amp;id=' . $PAGE_ID;
} ?>

	<article class="post box mb">
		<div class="postPic">
			<a href="blog-post.html"><img src="images/blog/blog-pic1-full.jpg" alt="" class="responsive mb"></a>
		</div>
		<div class="feature-box media-left">
			<?php if ($SHOWDATE) { ?>
				<div class="post-date">
					<?php
					//set locale,
					setlocale(LC_ALL,$site_locale);
					//set the date to be converted
					$mydate = $DATE_TIME;
					//convert date to month name
					$month_name =  ucfirst(strftime("%B", strtotime($mydate)));
					?>
					<span class="date-day"><?php echo date("d",strtotime($mydate)); ?></span>
					<span class="date-month"><?php echo $month_name; ?></span>
				</div>
			<?php } ?>
			<div class="feature-box-content">
				<?php if ($SHOWTITLE) { ?>
					<h3><?php echo $PAGE_TITLE; ?></h3>
				<?php } ?>
				<?php if ($SHOWDATE || $SHOWHITS) { ?>
					<ul class="list-unstyled list-inline">
						<!-- Show Date -->
						<?php if ($SHOWDATE) { ?>
							<li style="font-size: 80%; font-weight: 700"><i class="icon-calendar"></i>
								<time datetime="<?php echo $PAGE_TIME_HTML5; ?>"><?php echo $PAGE_TIME; ?></time>
							</li>
						<?php } ?>
						<!-- Show Hits -->
						<?php if ($SHOWHITS) { ?>
							<li style="font-size: 80%; font-weight: 700"><i class="icon-eye"></i> <?php echo $tl["news"]["news2"] . ' ' . $PAGE_HITS; ?></li>
						<?php } ?>
					</ul><!-- .entry-meta end -->
				<?php } ?>
				<ul class="entry-meta">

					<li class="entry-category">
						<a class="tips" href="#" title="" data-original-title="View all posts in Featured">Featured</a>
					</li>
					<li class="entry-author">
						<a class="tips" href="#" title="" data-original-title="View all posts by admin">admin</a>
					</li>
					<li class="entry-comments">
						<i class="icon-comment"></i>No Comments
					</li>
				</ul>
				<?php echo $PAGE_CONTENT; ?>
			</div>
		</div>

	</article>





<?php if (isset($JAK_HOOK_PAGE) && is_array ($JAK_HOOK_PAGE)) foreach ($JAK_HOOK_PAGE as $hpage) {
	include_once APP_PATH . $hpage["phpcode"];
}

if (isset($JAK_PAGE_GRID) && is_array ($JAK_PAGE_GRID)) foreach ($JAK_PAGE_GRID as $pg) {

	// Load contact form
	if ($pg["pluginid"] == '9997' && $JAK_SHOW_C_FORM) {
		include_once APP_PATH . 'template/mosaic/contact.php';
	}

	// Load News Grid
	if (isset($JAK_HOOK_NEWS_GRID) && is_array ($JAK_HOOK_NEWS_GRID)) foreach ($JAK_HOOK_NEWS_GRID as $hpagegrid) {
		eval($hpagegrid["phpcode"]);
	}
} ?>

	<!-- Show date, socialbuttons and tag list -->
<?php if ($JAK_TAGLIST) { ?>
	<div class="well well-sm">
		<div class="row">

			<div class="col-md-6">
				<?php if ($JAK_TAGLIST) { ?>
					<i class="fa fa-tags"></i> <?php echo $JAK_TAGLIST; ?>
				<?php } ?>
			</div>
		</div>
	</div>
<?php } ?>

<?php if ($SHOWSOCIALBUTTON) { ?>
	<div class="well well-sm">
		<?php include_once APP_PATH . 'template/mosaic/socialbutton.php'; ?>
	</div>
<?php } ?>

	<ul class="pager">
		<?php if ($JAK_NAV_PREV) { ?>
			<li class="previous">
				<a href="<?php echo $JAK_NAV_PREV; ?>">
					<i class="fa fa-arrow-left"></i> <?php echo $JAK_NAV_PREV_TITLE; ?>
				</a>
			</li>
		<?php }
		if ($JAK_NAV_NEXT) { ?>
			<li class="next">
				<a href="<?php echo $JAK_NAV_NEXT; ?>">
					<?php echo $JAK_NAV_NEXT_TITLE; ?> <i class="fa fa-arrow-right"></i>
				</a>
			</li>
		<?php } ?>
	</ul>

<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/footer.php'; ?>