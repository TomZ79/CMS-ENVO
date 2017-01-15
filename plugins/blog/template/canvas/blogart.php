<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=edit&amp;id=' . $PAGE_ID;
$qapedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=quickedit&amp;id=' . $PAGE_ID;
if ($jkv["printme"]) $printme = 1; ?>

	<div id="printdiv">

		<!-- Post Content
		============================================= -->
		<div class="single-post nobottommargin">

			<!-- Single Post
			============================================= -->
			<div class="entry clearfix">

				<!-- Entry Title
				============================================= -->
				<div class="entry-title">
					<h2><?php echo $PAGE_TITLE; ?></h2>
				</div><!-- .entry-title end -->

				<!-- Entry Meta - Category, Date, Hits
				============================================= -->
				<?php if ($BLOG_CATLIST || $SHOWDATE || $SHOWHITS) { ?>
					<ul class="entry-meta clearfix">
						<!-- Show Category -->
						<?php if ($BLOG_CATLIST) { ?>
							<li><?php echo $BLOG_CATLIST; ?></li>
						<?php } ?>
						<!-- Show Date -->
						<?php if ($SHOWDATE) { ?>
							<li><i class="icon-calendar3"></i> <?php echo $PAGE_TIME; ?></li>
						<?php } ?>
						<!-- Show Hits -->
						<li><i class="fa fa-eye"></i> <?php echo $tl["general"]["g13"] . $BLOG_HITS; ?></li>
					</ul><!-- .entry-meta end -->
				<?php } ?>

				<!-- Entry Content
				============================================= -->
				<div class="entry-content notopmargin">

					<!-- Entry Image
					============================================= -->
					<div class="entry-image alignleft">
						<img src="<?php echo $SHOWIMG; ?>" alt="Preview - <?php echo $PAGE_TITLE; ?>">
					</div><!-- .entry-image end -->
					<?php echo $PAGE_CONTENT; ?>
					<!-- Post Single - Content End -->

					<!-- Tag Cloud
					============================================= -->
					<?php if ($JAK_TAGLIST) { ?>
						<!-- Show Tags -->
						<div class="tagcloud clearfix bottommargin">
							<?php echo $JAK_TAGLIST; ?>
						</div><!-- .tagcloud end -->
					<?php } ?>

					<div class="clear"></div>

					<!-- Post Single - Share
					============================================= -->
					<?php if ($SHOWSOCIALBUTTON) { ?>
						<div class="si-share noborder clearfix">
							<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/socialbutton.php'; ?>
						</div><!-- Post Single - Share End -->
					<?php } ?>

				</div>

			</div><!-- .entry end -->

		</div>

	</div>
	<!-- End Print Post -->

	<!-- Show other settings
	============================================= -->
	<!-- Contact Form -->
<?php if ($JAK_SHOW_C_FORM) {
	include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/contact.php';
} ?>

	<!-- Like Button -->
<?php if (JAK_BLOGRATE && $SHOWVOTE && $USR_CAN_RATE) { ?>
	<div class="style-msg errormsg">
		<div class="sb-msg">
			<i class="icon-remove"></i><strong>Oooh!</strong> Like button is not available in Canvas template for Blog Plugin.
		</div>
	</div>
<?php } ?>

	<!-- Comment -->
<?php if (JAK_BLOGPOST && $JAK_COMMENT_FORM) { ?>
	<!-- Comments -->
	<h4><?php echo $tlblog["blog"]["d10"]; ?> (<span id="cComT"><?php echo $JAK_COMMENTS_TOTAL; ?></span>)</h4>
	<div class="post-coments">
		<?php if (isset($JAK_COMMENTS)) {
			echo jak_build_comments (0, $JAK_COMMENTS, 'post-comments', JAK_BLOGMODERATE, $CHECK_USR_SESSION, $tl["general"]["g103"], $tlblog["blog"]["g9"], JAK_BLOGPOST, $jaktable2, false, true);
		} else { ?>
			<div class="alert bg-info" id="comments-blank"><?php echo $tlblog["blog"]["g10"]; ?></div>
		<?php } ?>

		<!-- Show Comment Editor if set so -->
		<?php if (JAK_BLOGPOST) { ?>
			<ul class="post-comments">
				<li id="insertPost"></li>
			</ul>
			<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/userform.php';
		} ?>

	</div>
	<!-- End Comments -->
<?php } ?>

	<!-- Post Navigation
	============================================= -->
	<div class="post-navigation clearfix">

		<div class="col_half nobottommargin">
			<?php if ($JAK_NAV_PREV) { ?>
				<a href="<?php echo $JAK_NAV_PREV; ?>">&lArr; <?php echo $JAK_NAV_PREV_TITLE; ?></a>
			<?php } else {
				echo '&nbsp';
			} ?>
		</div>

		<div class="col_half col_last tright nobottommargin">
			<?php if ($JAK_NAV_NEXT) { ?>
				<a href="<?php echo $JAK_NAV_NEXT; ?>"><?php echo $JAK_NAV_NEXT_TITLE; ?> &rArr;</a>
			<?php } else {
				echo '&nbsp';
			} ?>
		</div>

	</div><!-- .post-navigation end -->

	<script src="<?php echo BASE_URL; ?>assets/js/comments.js?=<?php echo $jkv["updatetime"]; ?>" type="text/javascript"></script>

<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/footer.php'; ?>