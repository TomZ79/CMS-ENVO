<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=news&sp=setting'; ?>

<?php if (isset($JAK_HOOK_NEWS) && is_array ($JAK_HOOK_NEWS)) foreach ($JAK_HOOK_NEWS as $n) {
	include_once APP_PATH . $n['phpcode'];
} ?>

	<section>
		<div class="container-fluid">
			<div class="row">

				<?php if (isset($JAK_NEWS_ALL) && is_array ($JAK_NEWS_ALL)) foreach ($JAK_NEWS_ALL as $v) { ?>
				<div class="<?php echo ($JAK_HOOK_SIDE_GRID ? "col-md-6" : "col-md-4"); ?> col-sm-12">
					<article class="mb-xs">
						<a href="<?php echo $v["parseurl"]; ?>">

							<?php
							// Image is available so display it or go standard image
							if ($v["previmg"]) {
								echo '<img src="' . $v["previmg"] . '" alt="' . $v["title"] . '" class="img-responsive">';
							} else { ?>

								<div class="thumb-news text-center">
									<img src="<?php echo '/template/' . ENVO_TEMPLATE . '/img/news/' . $site_language . '-news-feature-1.jpg'; ?>" alt="<?php echo $v["title"]; ?>" class="img-responsive">
									<div class="caption text-center">
										<span class="color1"><?php echo $tlqed["news_text"]["newst"]; ?></span>
										<span class="color2"><?php echo $tlqed["news_text"]["newst1"]; ?></span>
									</div>
								</div>

							<?php } ?>

						</a>
						<div class="feature-box mt">
							<div class="post-date">
								<?php
								//set locale,
								setlocale(LC_ALL,$site_locale);
								//set the date to be converted
								$mydate = $v["date-time"];
								//convert date to month name
								$month_name =  ucfirst(strftime("%B", strtotime($mydate)));
								?>
								<span class="date-day"><?php echo date("d",strtotime($mydate)); ?></span>
								<span class="date-month"><?php echo $month_name; ?></span>
							</div>
							<div class="feature-box-content">
								<h3><a href="<?php echo $v["parseurl"]; ?>"><?php echo jak_cut_text ($v["title"], 30, "..."); ?></a></h3>
								<h6><i class="icon-eye"></i> <?php echo $tl["news"]["news2"] . ' ' . $v["hits"]; ?></h6>
								<hr class="mt-small mb-small">
								<p>
									<?php echo $v["contentshort"]; ?>
								</p>
								<p class="pull-right">
									<a href="<?php echo $v["parseurl"]; ?>"><?php echo $tl["news"]["news1"]; ?> <i class="icon-angle-circled-right"></i></a>
								</p>
								<div class="clearfix"></div>
								<div class="system-icons">
									<hr class="mt-small mb-small">
									<?php if (JAK_ASACCESS) { ?>
											<div class="pull-right">
												<a href="<?php echo BASE_URL; ?>admin/index.php?p=news&amp;sp=edit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn1"]; ?>" class="btn btn-info btn-xs jaktip">
													<?php echo $tl["button"]["btn1"]; ?>
												</a>
												<a class="btn btn-info btn-xs jaktip quickedit" href="<?php echo BASE_URL; ?>admin/index.php?p=news&amp;sp=quickedit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn2"]; ?>">
													<?php echo $tl["button"]["btn2"]; ?>
												</a>
											</div>
									<?php } ?>
								</div>
							</div>
						</div>
					</article>
				</div>
				<?php } ?>

			</div>
		</div>
	</section>

	<section class="pb-small">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">

					<?php if ($JAK_PAGINATE) echo $JAK_PAGINATE; ?>

				</div>
			</div>
		</div>
	</section>


<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>