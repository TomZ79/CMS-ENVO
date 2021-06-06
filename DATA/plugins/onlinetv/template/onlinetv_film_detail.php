<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'onlinetv_header.php'; ?>

	<section class="block-wrapper section-layout-2">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<div class="ts-grid-item">
						<div class="ts-heading clearfix">
							<h2 class="ts-title float-left">

								<?php
								if (isset($ENVO_FILM_DETAIL["cs_name"])) {
									echo 'Detail filmu - ' . $ENVO_FILM_DETAIL["cs_name"] . ' (' . $ENVO_FILM_DETAIL["film_year"] . ')';
								} else if (isset($ENVO_FILM_DETAIL["en_name"])) {
									echo 'Detail filmu - ' . $ENVO_FILM_DETAIL["en_name"] . ' (' . $ENVO_FILM_DETAIL["film_year"] . ')';
								} else {
									echo 'Detail filmu - ' . $ENVO_FILM_DETAIL["original_name"] . ' (' . $ENVO_FILM_DETAIL["film_year"] . ')';
								}
								?>

							</h2>
						</div>
						<div class="row">
							<div class="col-md-4">
								<img class="img-fluid" src="<?= $ENVO_FILM_DETAIL["poster_1"] ?>" alt="">
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-12 post-title mt-4 mt-sm-0">
										NÁZEV (Originál): <strong><?= $ENVO_FILM_DETAIL["original_name"] ?></strong>
									</div>
									<div class="col-12 post-title">
										NÁZEV (EN): <strong><?= $ENVO_FILM_DETAIL["en_name"] ?></strong>
									</div>
									<div class="col-12 post-title">
										NÁZEV (CS): <strong><?= $ENVO_FILM_DETAIL["cs_name"] ?></strong>
									</div>
									<div class="col-12">
										<hr>

										<?php

										if (isset($ENVO_FILM_DETAIL["genre"])) {
											$string = array();
											if (isset($ENVO_GENRE) && is_array($ENVO_GENRE)) foreach ($ENVO_GENRE as $g) {
												if (in_array($g["id"], explode(',', $ENVO_FILM_DETAIL["genre"]))) {
													array_push($string, $g["genre_name_cz"]);
												}
											}

											echo '<p><em>' . implode(', ',$string) . '</em></p>';
										}

										?>

									</div>
									<div class="col-12">
										<p>ROK: <strong><?= $ENVO_FILM_DETAIL["film_year"] ?></strong></p>
									</div>
									<div class="col-12">
										<p>REŽISÉR: <?= $ENVO_FILM_DETAIL["direction"] ?></p>
										<p>HERCI: <?= $ENVO_FILM_DETAIL["actors"] ?></p>
									</div>
									<div class="col-12">

									</div>
								</div>
							</div>
						</div>
						<div class="row mt-0 mt-sm-4">
							<div class="col-12">
								<p>POPIS:</p>
								<div><?= $ENVO_FILM_DETAIL["filmdescription"] ?></div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-12">
								<div class="bg-3-20 p-3">
									<h3>Zajímavosti a informace k filmu</h3>
									<ul>

										<?php
										if (!empty($ENVO_FILM_DETAIL["filmcsfd"])) {
											echo '<li><a href="' . $ENVO_FILM_DETAIL["filmcsfd"] . '" target="_blank">ČSFD | Česko-Slovenská filmová databáze</a></li>';
										}
										if (!empty($ENVO_FILM_DETAIL["filmimdb"])) {
											echo '<li><a href="' . $ENVO_FILM_DETAIL["filmimdb"] . '" target="_blank">IMDb | Filmová databáze</a></li>';
										}
										?>

									</ul>
								</div>
							</div>
						</div>
						<div class="row mt-4">
							<div class="col-md-12">
								<div class="p-3">
									<h3>Trailer</h3>

									<?php
									if (!empty($ENVO_FILM_DETAIL["trailer_1_link"])) {
										echo '<div class="post-video">';
										echo '	<img class="img-fluid" src="/plugins/onlinetv/template/img/video-post/video-trailer.jpg" alt="">';
										echo '	<div class="post-video-content">';
										echo '		<a href="' . $ENVO_FILM_DETAIL["trailer_1_link"] . '" class="ts-play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>';
										echo '		<h3 style="color: #FFF;">' . $ENVO_FILM_DETAIL["trailer_1_text"] . '</h3>';
										echo '	</div>';
										echo '</div>';
									}
									?>

									<?php
									if (!empty($ENVO_FILM_DETAIL["trailer_2_link"])) {
										echo '<div class="post-video">';
										echo '	<img class="img-fluid" src="/plugins/onlinetv/template/img/video-post/video-trailer.jpg" alt="">';
										echo '	<div class="post-video-content">';
										echo '		<a href="' . $ENVO_FILM_DETAIL["trailer_2_link"] . '" class="ts-play-btn"><i class="fa fa-play" aria-hidden="true"></i></a>';
										echo '		<h3 style="color: #FFF;">' . $ENVO_FILM_DETAIL["trailer_2_text"] . '</h3>';
										echo '	</div>';
										echo '</div>';
									}
									?>

								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="p-3">
									<h3>Přehrání filmu online</h3>

									<div class="tab-list tab-list-layout-1">
										<!-- Nav tabs -->
										<ul class="nav nav-tabs mt-3" role="tablist">
											<li class="nav-item">
												<a class="nav-link" href="#video1" role="tab" data-toggle="tab">Originální znění</a>
											</li>
											<li class="nav-item">
												<a class="nav-link active" href="#video2" role="tab" data-toggle="tab">Dabing</a>
											</li>
										</ul>

										<!-- Tab panes -->
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane fade" id="video1">

												<?php
												// Video Poster
												if (!empty($ENVO_FILM_DETAIL["video_o_2160"]) || !empty($ENVO_FILM_DETAIL["video_o_1440"]) || !empty($ENVO_FILM_DETAIL["video_o_1080"]) || !empty($ENVO_FILM_DETAIL["video_o_720"]) || !empty($ENVO_FILM_DETAIL["video_o_576"]) || !empty($ENVO_FILM_DETAIL["video_o_360"])) {

													if (!empty($ENVO_FILM_DETAIL["video_poster"])) {
														$VIDEOPOSTER_O = $ENVO_FILM_DETAIL["video_poster"];
													} else {
														$VIDEOPOSTER_O = '/plugins/onlinetv/template/img/video-post/video-poster.jpg';
													}

												} else {
													$VIDEOPOSTER_O = '/plugins/onlinetv/template/img/video-post/video-poster-error.jpg';
												}

												if (!empty($ENVO_FILM_DETAIL["video_cs_2160"]) || !empty($ENVO_FILM_DETAIL["video_cs_1440"]) || !empty($ENVO_FILM_DETAIL["video_cs_1080"]) || !empty($ENVO_FILM_DETAIL["video_cs_720"]) || !empty($ENVO_FILM_DETAIL["video_cs_576"]) || !empty($ENVO_FILM_DETAIL["video_cs_360"])) {

													if (!empty($ENVO_FILM_DETAIL["video_poster"])) {
														$VIDEOPOSTER_D = $ENVO_FILM_DETAIL["video_poster"];
													} else {
														$VIDEOPOSTER_D = '/plugins/onlinetv/template/img/video-post/video-poster.jpg';
													}

												} else {
													$VIDEOPOSTER_D = '/plugins/onlinetv/template/img/video-post/video-poster-error.jpg';
												}

												?>

												<div class="video mt-3">
													<video poster="<?= $VIDEOPOSTER_O ?>" id="player1" playsinline controls>

														<?php
														// Video MP4
														if (!empty($ENVO_FILM_DETAIL["video_o_2160"])) {
															echo '<source src="' . $ENVO_FILM_DETAIL["video_o_2160"] . '" type="video/mp4" size="2160"/>';
														}
														if (!empty($ENVO_FILM_DETAIL["video_o_1440"])) {
															echo '<source src="' . $ENVO_FILM_DETAIL["video_o_1440"] . '" type="video/mp4" size="1440"/>';
														}
														if (!empty($ENVO_FILM_DETAIL["video_o_1080"])) {
															echo '<source src="' . $ENVO_FILM_DETAIL["video_o_1080"] . '" type="video/mp4" size="1080"/>';
														}
														if (!empty($ENVO_FILM_DETAIL["video_o_720"])) {
															echo '<source src="' . $ENVO_FILM_DETAIL["video_o_720"] . '" type="video/mp4" size="720"/>';
														}
														if (!empty($ENVO_FILM_DETAIL["video_o_576"])) {
															echo '<source src="' . $ENVO_FILM_DETAIL["video_o_576"] . '" type="video/mp4" size="576"/>';
														}
														if (!empty($ENVO_FILM_DETAIL["video_o_360"])) {
															echo '<source src="' . $ENVO_FILM_DETAIL["video_o_360"] . '" type="video/mp4" size="360"/>';
														}
														?>

														<?php
														// Captions
														if (!empty($ENVO_FILM_DETAIL["subtitle_en"])) {
															echo '<track kind="captions" label="English" src="' . $ENVO_FILM_DETAIL["subtitle_en"] . '" srclang="en" default />';
														}
														if (!empty($ENVO_FILM_DETAIL["subtitle_cs"])) {
															echo '<track kind="captions" label="Česky" src="' . $ENVO_FILM_DETAIL["subtitle_cs"] . '" srclang="cs" default />';
														}
														if (!empty($ENVO_FILM_DETAIL["subtitle_sk"])) {
															echo '<track kind="captions" label="Slovensky" src="' . $ENVO_FILM_DETAIL["subtitle_sk"] . '" srclang="sk" default />';
														}
														?>

													</video>
												</div>

											</div>
											<div role="tabpanel" class="tab-pane fade in active" id="video2">

												<div class="video mt-3">
													<video poster="<?= $VIDEOPOSTER_D ?>" id="player2" playsinline controls>

														<?php
														// Video MP4
														if (!empty($ENVO_FILM_DETAIL["video_cs_2160"])) {
															echo '<source src="' . $ENVO_FILM_DETAIL["video_cs_2160"] . '" type="video/mp4" size="2160"/>';
														}
														if (!empty($ENVO_FILM_DETAIL["video_cs_1440"])) {
															echo '<source src="' . $ENVO_FILM_DETAIL["video_cs_1440"] . '" type="video/mp4" size="1440"/>';
														}
														if (!empty($ENVO_FILM_DETAIL["video_cs_1080"])) {
															echo '<source src="' . $ENVO_FILM_DETAIL["video_cs_1080"] . '" type="video/mp4" size="1080"/>';
														}
														if (!empty($ENVO_FILM_DETAIL["video_cs_720"])) {
															echo '<source src="' . $ENVO_FILM_DETAIL["video_cs_720"] . '" type="video/mp4" size="720"/>';
														}
														if (!empty($ENVO_FILM_DETAIL["video_cs_576"])) {
															echo '<source src="' . $ENVO_FILM_DETAIL["video_cs_576"] . '" type="video/mp4" size="576"/>';
														}
														if (!empty($ENVO_FILM_DETAIL["video_cs_360"])) {
															echo '<source src="' . $ENVO_FILM_DETAIL["video_cs_360"] . '" type="video/mp4" size="360"/>';
														}
														?>

														<?php
														// Captions
														if (!empty($ENVO_FILM_DETAIL["subtitle_en"])) {
															echo '<track kind="captions" label="English" src="' . $ENVO_FILM_DETAIL["subtitle_en"] . '" srclang="en" default />';
														}
														if (!empty($ENVO_FILM_DETAIL["subtitle_cs"])) {
															echo '<track kind="captions" label="Česky" src="' . $ENVO_FILM_DETAIL["subtitle_cs"] . '" srclang="cs" default />';
														}
														if (!empty($ENVO_FILM_DETAIL["subtitle_sk"])) {
															echo '<track kind="captions" label="Slovensky" src="' . $ENVO_FILM_DETAIL["subtitle_sk"] . '" srclang="sk" default />';
														}
														?>

													</video>
												</div>

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-4">
					<div class="ts-grid-item">
						<div class="ts-heading clearfix">
							<h2 class="ts-title float-left">Doporučené filmy</h2>
						</div>

						<div class="row">

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'onlinetv_footer.php'; ?>