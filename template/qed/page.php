<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (!$PAGE_ACTIVE) { ?>
	<div class="alert alert-danger">
		<?php echo $tl["general_error"]["generror2"]; ?>
	</div>
<?php } else {

	if (JAK_ASACCESS) {
		if ($jkv["printme"]) $printme = 1;
		$apedit  = BASE_URL . 'admin/index.php?p=page&amp;sp=edit&amp;id=' . $PAGE_ID;
		$qapedit = BASE_URL . 'admin/index.php?p=page&amp;sp=quickedit&amp;id=' . $PAGE_ID;
	}
	if ($jkv["printme"]) { ?>

		<div id="printdiv">

	<?php }
	if ($PAGE_SHOWTITLE && $JAK_SHOW_NAVBAR) { ?>

		<!-- Heading / Title -->
		<h2 class="first-child text-color"><?php echo $PAGE_TITLE; ?></h2>

	<?php } ?>

	<?php if ($PAGE_PASSWORD && !JAK_ASACCESS && $PAGE_PASSWORD != $_SESSION[ 'pagesecurehash' . $PAGE_ID ]) { ?>

		<section class="light-color pt-medium pb-medium">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="text-center">
							<h1 class="large"><?php echo $tl["global_text"]["gtxt1"]; ?></h1>
							<p class="lead"><?php echo $tl["global_text"]["gtxt2"]; ?></p>
							<!-- Show password form -->
							<form class="form-inline" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

								<div class="input-group">
									<input type="password" name="pagepass" class="form-control" value="" placeholder="<?php echo $tl["placeholder"]["plc2"]; ?>"/>
									<span class="input-group-btn">
										<button class="btn btn-default" name="pageprotect" type="submit"><?php echo $tl["button"]["btn4"]; ?></button>
									</span>
								</div>
								<input type="hidden" name="pagesec" value="<?php echo $PAGE_ID; ?>"/>

							</form>
						</div>
					</div>
				</div>
			</div>
		</section>

	<?php } else {
		if (isset($JAK_HOOK_PAGE) && is_array ($JAK_HOOK_PAGE)) foreach ($JAK_HOOK_PAGE as $hpage) {
			include_once APP_PATH . $hpage["phpcode"];
		}

		// Load Grid
		if (isset($JAK_PAGE_GRID) && is_array ($JAK_PAGE_GRID)) foreach ($JAK_PAGE_GRID as $pg) {

			// Show Content
			if ($pg["pluginid"] == '9999') {
				echo $PAGE_CONTENT;
			}

			// Show Contact form
			if ($pg["pluginid"] == '9997' && $JAK_SHOW_C_FORM) {
				include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/contact.php';
			}

			// Load News
			if ($pg["pluginid"] == '9998' && $JAK_NEWS_IN_CONTENT) {
				if (isset($JAK_NEWS_IN_CONTENT) && is_array ($JAK_NEWS_IN_CONTENT)) { ?>
					<section class="pt-medium">
						<div class="container">
							<div class="row">
								<div class="col-sm-12">
									<h2><?php echo $jkv["newstitle"]; ?></h2>
									<hr>
									<div class="owl-carousel owl-theme show-nav-title">

										<!-- Show news -->
										<?php foreach ($JAK_NEWS_IN_CONTENT as $n) { ?>

											<div class="feature-box media-left mt item">
												<div class="post-date">
													<?php
													//set locale,
													setlocale(LC_ALL,$site_locale);
													//set the date to be converted
													$mydate = $n["date-time"];
													//convert date to month name
													$month_name =  ucfirst(strftime("%B", strtotime($mydate)));
													?>
													<span class="date-day"><?php echo date("d",strtotime($mydate)); ?></span>
													<span class="date-month"><?php echo $month_name; ?></span>
												</div>
												<div class="feature-box-content">
													<h3><a href="<?php echo $n["parseurl"]; ?>"><?php echo jak_cut_text ($n["title"], 30, "..."); ?></a></h3>
													<h6><i class="icon-eye"></i> <?php echo $n["news"]["news2"] . ' ' . $n["hits"]; ?></h6>
													<hr class="mt-small mb-small">
													<p>
														<?php echo $n["contentshort"]; ?>
													</p>
													<p class="pull-right">
														<a href="<?php echo $v["parseurl"]; ?>"><?php echo $tl["news"]["news1"]; ?> <i class="icon-angle-circled-right"></i></a>
													</p>
													<div class="clearfix"></div>
													<div class="system-icons">
														<hr class="mt-small mb-small">
														<?php if (JAK_ASACCESS) { ?>
															<div class="pull-right">
																<a href="<?php echo BASE_URL; ?>admin/index.php?p=news&amp;sp=edit&amp;id=<?php echo $n["id"]; ?>" title="<?php echo $tl["button"]["btn1"]; ?>" class="btn btn-info btn-xs jaktip">
																	<i class="icon-pencil"></i>
																</a>
																<a class="btn btn-info btn-xs jaktip quickedit" href="<?php echo BASE_URL; ?>admin/index.php?p=news&amp;sp=quickedit&amp;id=<?php echo $n["id"]; ?>" title="<?php echo $tl["button"]["btn2"]; ?>">
																	<i class="icon-edit"></i>
																</a>
															</div>
														<?php } ?>
													</div>
												</div>
											</div>
										<?php } ?>

									</div>
									<hr>
								</div>
							</div>
						</div>
					</section>
				<?php }
			}
			if (isset($JAK_HOOK_PAGE_GRID) && is_array ($JAK_HOOK_PAGE_GRID)) foreach ($JAK_HOOK_PAGE_GRID as $hpagegrid) {
				eval($hpagegrid["phpcode"]);
			}
		} ?>

		<!-- Show login form -->
		<?php if ($PAGE_LOGIN_FORM) {
			include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/loginpage.php';
		} ?>

		<!-- Show date, social buttons and tag list -->
		<?php if ($SHOWDATE || $SHOWSOCIALBUTTON || ($JAK_TAGLIST && $SHOWTAGS)) { ?>
			<section class="pt-small pb-small">
				<div class="container">
					<div class="row">
						<div class="col-md-12">

							<?php if ($SHOWDATE) { ?>
								<div class="col-md-3">
									<i class="icon-clock-1"></i>
									<time datetime="<?php echo $PAGE_TIME_HTML5; ?>"><?php echo $PAGE_TIME; ?></time>
								</div>
							<?php }
							if ($JAK_TAGLIST && $SHOWTAGS) { ?>
								<div class="col-md-5">
									<i class="icon-tags"></i> <?php echo $JAK_TAGLIST; ?>
								</div>
							<?php }
							if ($SHOWSOCIALBUTTON) { ?>
								<div class="col-md-4 pull-right">
									<div style="display: table;">
										<div style="display: table-cell;vertical-align: middle;/*! margin-right: 20px; */padding-right: 20px;">
											<strong><?php echo $tl["share"]["share"] . ' '; ?></strong>
										</div>
										<div id="sollist-sharing"></div>
									</div>
								</div>
							<?php } ?>

						</div>
					</div>
				</div>
			</section>

		<?php }
	}
	if ($jkv["printme"]) { ?>

		</div>

	<?php }
}

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>