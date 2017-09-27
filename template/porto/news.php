<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (ENVO_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=news&sp=setting'; ?>

<?php if (isset($ENVO_HOOK_NEWS) && is_array ($ENVO_HOOK_NEWS)) foreach ($ENVO_HOOK_NEWS as $n) {
	include_once APP_PATH . $n['phpcode'];
} ?>

	<section class="news-content-area">
		<div class="container-fluid">
			<div class="row">

				<?php if (isset($ENVO_NEWS_ALL) && is_array ($ENVO_NEWS_ALL)) foreach ($ENVO_NEWS_ALL as $v) { ?>
				<div class="<?php echo ($ENVO_HOOK_SIDE_GRID ? "col-md-6" : "col-md-4"); ?> col-sm-12">
					<article class="news-article-preview mb-xs">
						<div class="full-intro-img">
							<a href="<?php echo $v["parseurl"]; ?>">

								<?php
								// Image is available so display it or go standard image
								if ($v["previmg"]) {
									echo '<img src="' . $v["previmg"] . '" alt="' . $v["title"] . '" class="img-responsive">';
								} else { ?>

									<div class="thumb-news text-center">
										<img src="<?php echo '/template/' . ENVO_TEMPLATE . '/img/news/news-feature.jpg'; ?>" alt="<?php echo $v["title"]; ?>" class="img-responsive">
										<div class="caption text-center">
											<span class="color1"><?php echo $tlmetrics["news_text"]["newst"]; ?></span>
											<span class="color2"><?php echo $tlmetrics["news_text"]["newst1"]; ?></span>
										</div>
									</div>

								<?php } ?>

							</a>
						</div>
						<div class="full-intro-head">
							<p>
								<?php echo $tl["news"]["news3"] . ' : <span>' . $v["created"] . '</span>'; ?>
								<?php echo $tl["news"]["news2"] . ' : <span>' . $v["hits"] . '</span>'; ?>
							</p>
							<h3><a href="<?php echo $v["parseurl"]; ?>"><?php echo envo_cut_text ($v["title"], 30, "..."); ?></a></h3>
						</div>
						<div class="full-intro-content">
							<div class="feature-box-content">
								<hr class="mt-small mb-small">
								<p>
									<?php echo $v["contentshort"]; ?>
								</p>
								<p>
									<a href="<?php echo $v["parseurl"]; ?>" class="pull-right"><?php echo $tl["news"]["news1"]; ?>
										<i class="fa fa-arrow-right"></i>
									</a>
								</p>
								<div class="clearfix"></div>
								<div class="system-icons">
									<hr class="mt-small mb-small">
									<?php if (ENVO_ASACCESS) { ?>

										<!-- Post Edit - Admin -->
										<div class="pull-right hidden-xs">
											<a class="btn btn-filled btn-primary btn-xs" href="<?php echo BASE_URL; ?>admin/index.php?p=news&amp;sp=edit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn1"]; ?>">
												<?php echo $tl["button"]["btn1"]; ?>
											</a>
											<a class="btn btn-filled btn-primary btn-xs quickedit" href="<?php echo BASE_URL; ?>admin/index.php?p=news&amp;sp=quickedit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn2"]; ?>">
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

					<?php if ($ENVO_PAGINATE) echo $ENVO_PAGINATE; ?>

				</div>
			</div>
		</div>
	</section>


<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>