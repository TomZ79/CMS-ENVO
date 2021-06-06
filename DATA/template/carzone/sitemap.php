<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?=$PAGE_CONTENT?>

	<div class="section-full content-inner bg-white">
		<div class="container">
			<div class="row">
				<div class="col-sm-12">

					<?php if (isset($ENVO_CAT_SITE) && is_array ($ENVO_CAT_SITE)) { ?>
						<ul class="list-unstyled list-icon arrow border">
							<?php foreach ($ENVO_CAT_SITE as $v) {
					if ($v["catparent"] == '0') { ?>

						<li><a href="<?=$v["varname"]?>"><?=$v["name"]?></a>

						<?php if (isset($v["catexist"])) { ?>

							<ul>

								<?php if (isset($ENVO_CAT_SITE) && is_array ($ENVO_CAT_SITE)) foreach ($ENVO_CAT_SITE as $z) {

									if ($z["catparent"] != '0' && $z["catparent2"] == '0' && $z["catparent"] == $v["id"]) { ?>

										<li><a href="<?=$z["varname"]?>"><?=$z["name"]?></a>

											<?php if (isset($z["catexist2"])) { ?>

												<ul>

													<?php if (isset($ENVO_CAT_SITE) && is_array ($ENVO_CAT_SITE)) foreach ($ENVO_CAT_SITE as $o) {

														if ($o["catparent"] != '0' && $o["catparent2"] != '0' && $o["catparent"] == $v["id"] && $o["catparent2"] == $z["id"]) { ?>

															<li><a href="<?=$o["varname"]?>"><?=$o["name"]?></a></li>

														<?php }
													} ?>
												</ul>
											<?php } ?>
										</li>
									<?php }
								} ?>
							</ul>
							</li>
						<?php } else { ?>
							</li>
						<?php }
					}
				} ?>
						</ul>
					<?php } ?>

					<?php if (isset($ENVO_HOOK_SITEMAP) && is_array ($ENVO_HOOK_SITEMAP)) foreach ($ENVO_HOOK_SITEMAP as $hs) {
						// include_once APP_PATH . $hs['phpcode'];
						eval($hs["phpcode"]);
					} ?>

				</div>
			</div>
		</div>
	</div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>