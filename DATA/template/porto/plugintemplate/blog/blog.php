<?php
/*
 * PLUGIN DOWNLOAD - ALL VALUE for FRONTEND - blog.php
 * ------------------------------------------------------------------
 *
 * Soubor slouží pro generovaní (zobrazení) celkového seznamu článků
 *
 * Použitelné hodnoty s daty pro FRONTEND - blog.php
 * ------------------------------------------------------------------
 *
 * $ENVO_BLOG_ALL = pole s daty
 * foreach ($ENVO_BLOG_ALL as $v) = získání jednotlivých dat z pole
 *
 * $v["id"] 							number		|	- ID souboru
 * $v["catid"] 		  			number		|	- ID categorie(í)
 * $v["title"]						string		|	- Titulek souboru
 * $v["content"]					string		|	- Celý popis souboru
 * $v["contentshort"]		  string		|	- Zkrácený popis souboru
 * $v["showtitle"]				number		| - Zobrazení nadpisu ( hodnota 1 = ANO / 0 = NE )
 * $v["showdate"]				  number		| - Zobrazení nadpisu ( hodnota 1 = ANO / 0 = NE )
 * $v["created"]					date			| - Datum vytvoření
 * $v["updated"]					date			| - Datum aktualizace
 * $v["hits"]						  number		|	- Počet zobrazení
 * $v["previmg"]          string		| - Náhledový obrázek
 * $v["previmgdesc"]      string		| - Popis náhledového obrázku
 * $v["parseurl"]         string		| - Parsovaná url adresa
 *
 */

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if (ENVO_ACCESS) $apedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=setting';

?>

	<section>
		<div class="container-fluid">
			<div class="row">

				<?php if (isset($ENVO_BLOG_ALL) && is_array($ENVO_BLOG_ALL)) foreach ($ENVO_BLOG_ALL as $v) {

					// Get the categories into a list
					unset($catids);
					$resultc = $envodb -> query('SELECT id, name, varname FROM ' . DB_PREFIX . 'blogcategories WHERE id IN(' . $v['catid'] . ') ORDER BY id ASC');
					while ($rowc = $resultc -> fetch_assoc()) {

						if ($setting["blogurl"]) {
							$seoc = ENVO_base ::envoCleanurl($rowc['varname']);
						}

						// EN: Create array with all categories
						// CZ: Vytvoření pole se všemi kategoriemi
						$catids[] = '<span class="cat-list"><a href="' . ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_BLOG, 'category', $rowc['id'], $seoc, '', '') . '" title="' . $tlblog["blog_frontend"]["blog1"] . '">' . $rowc['name'] . '</a></span>';
					}


					if (!empty($catids)) {
						// EN: Returns a string from the elements of an array
						// CZ: Získání elementů z pole
						$blog_catids = join(" ", $catids);
					}

					?>

					<!-- Start - Post -->
					<article class="blog-article-preview mb-3">
						<div class="row">
							<!-- Post Image, Title & Summary -->
							<?php
							// Image is available so set 'class' for 'div'
							$img = $v['previmg'];

							if ($img) {
								$imageClass   = 'col-sm-3';
								$contentClass = 'col-sm-9';
							} else {
								$imageClass   = '';
								$contentClass = 'col';
							}
							?>

							<?php
							// Image is available so display it or go standard
							if ($img) { ?>
								<div class="full-intro-head <?= $imageClass; ?> d-none d-sm-block">
									<div class="post-image">
										<a href="<?= $v["parseurl"] ?>">
                      <span class="thumb-info rounded-0">
                        <span class="thumb-info-wrapper rounded-0">

                          <?php
													echo '<img src="' . $v["previmg"] . '" alt="' . $v['previmgdesc'] . ' | ' . $setting["title"] . '" class=" img-fluid rounded-0">';
													?>

                        </span>
                      </span>
										</a>
									</div>
								</div>
							<?php } ?>
							<div class="full-intro-content <?= $contentClass; ?>">
								<div class="post-content">
									<!-- Post Content -->
									<?php
									if ($v["showtitle"]) {
										echo '<h4><a href="' . $v["parseurl"] . '">' . envo_cut_text($v["title"], 100, "") . '</a></h4>';
									}
									?>

									<p class="post-data text-muted mb-sm">

										<?php
										if ($v["showdate"]) {
											echo '<span class="date mr-3"><strong class="text-2">' . $tlblog["blog_frontend"]["blog3"] . '</strong>' . ' : <time datetime="' . $v["created"] . '">' . $v["created"] . '</time></span>';
										}
										echo '<span class="category mr-3"><strong class="text-2">' . $tlblog["blog_frontend"]["blog4"] . '</strong>' . ' : ' . $blog_catids . '</span>';
										?>

									</p>
									<p class="mb-0"><?= $v['contentshort'] ?></p>
									<p class="mb-0 float-right">

										<?php

										echo '<a href="' . $v["parseurl"] . '" class="read-more text-color-dark font-weight-bold text-2">' . $tlblog["blog_frontend"]["blog5"] . '<i class="fas fa-chevron-right text-1 ml-1"></i></a>';

										?>

									</p>
								</div>
							</div>
						</div>

						<?php

						// SYSTEM ICONS - Edit and Quick Edit
						if (ENVO_ACCESS) {
							echo '<div class="system-icons d-none d-sm-block mt-2">';
							echo '<div class="row">';
							echo '<div class="col-sm-2">';
							echo '<a class="btn btn-warning btn-xs rounded-0 mb-2 d-block" href="' . BASE_URL . 'admin/index.php?p=blog&amp;sp=edit&amp;id=' . $v["id"] . '" title="' . $tl["button"]["btn1"] . '">' . $tl["button"]["btn1"] . '</a>';
							echo '</div>';
							echo '<div class="col-sm-2">';
							echo '<a class="btn btn-warning btn-xs rounded-0 mb-2 d-block quickedit" href="' . BASE_URL . 'admin/index.php?p=blog&amp;sp=quickedit&amp;id=' . $v["id"] . '" title="' . $tl["button"]["btn2"] . '">' . $tl["button"]["btn2"] . '</a>';
							echo '</div>';
							echo '<div class="col-sm-8"></div>';
							echo '</div>';
							echo '</div>';
						}

						?>

						<div class="row">
							<div class="col col-sm-12">
								<hr class="dashed tall mt-2 mb-2">
							</div>
						</div>

					</article><!-- End Post -->

				<?php } ?>

			</div>
		</div>
	</section>

<?php if ($ENVO_PAGINATE) echo $ENVO_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>