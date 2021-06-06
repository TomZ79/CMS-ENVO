<!-- START BLOG SECTION -->
<?php
if ($page == 'onlinetv') {
	$classotvsection = 'open active';
	$classotviconbg  = 'bg-success';
}

if ($page1 == 'film') {
	$classotvsubsection1 = 'open active';
	$styleotv_1           = 'style="display: block;"';
}
?>
<li class="<?= $classotvsection ?>">

	<?php
	// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
	echo $Html -> addAnchor('javascript:;', '<span class="title">' . $tlotv["otv_menu"]["otvm"] . '</span><span class="arrow ' . $classotvsection . '"></span>');
	// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
	echo $Html -> addTag('span', 'OTV', 'icon-thumbnail ' . $classotviconbg);
	?>

	<ul class="sub-menu">
		<li class="nav-item-header">
			<div class="text-uppercase text-master fs-14 bold" style="line-height: 40px;"><?= $tlotv["otv_menu"]["otvm2"] ?></div>
		</li>

		<li class="<?= $classotvsubsection1 ?>">
			<a href="javascript:;"><?= $tlotv["otv_menu"]["otvm2"] ?>
				<span class="arrow <?= $classotvsubsection1 ?>"></span></a>
			<span class="icon-thumbnail"><?= text_clipping_lower($tlotv["otv_menu"]["otvm2"]) ?></span>
			<ul class="sub-menu" <?= $styleotv_1 ?>>

				<li class="<?= (($page == 'onlinetv' && $page1 == 'film' && !$page2)) ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=onlinetv&amp;sp=film', $tlotv["otv_menu"]["otvm6"]);
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower($tlotv["otv_menu"]["otvm6"]), 'icon-thumbnail');
					?>

				</li>
				<?php if ($page == 'onlinetv' && $page1 == 'film' && $page2 == 'filmlist') { ?>
					<li class="<?= ($page == 'onlinetv' && $page1 == 'film' && $page2 == 'filmlist') ? 'submenu-active' : '' ?>">

						<?php
						// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
						echo $Html -> addAnchor('index.php?p=onlinetv&amp;sp=film', $tlotv["otv_menu"]["otvm3"]);
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('span', text_clipping_lower($tlotv["otv_menu"]["otvm3"]), 'icon-thumbnail');
						?>

					</li>
				<?php } ?>
				<li class="<?= ($page == 'onlinetv' && $page1 == 'film' && $page2 == 'newfilm') ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=onlinetv&amp;sp=film&amp;ssp=newfilm', $tlotv["otv_menu"]["otvm4"]);
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower($tlotv["otv_menu"]["otvm4"]), 'icon-thumbnail');
					?>

				</li>
				<?php if ($page == 'onlinetv' && $page1 == 'film' && $page2 == 'editfilm') { ?>
					<li class="<?= ($page == 'onlinetv' && $page1 == 'film' && $page2 == 'editfilm') ? 'submenu-active' : '' ?>">

						<?php
						// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
						echo $Html -> addAnchor('index.php?p=onlinetv&amp;sp=film&amp;ssp=editfilm&amp;id=' . $page2, $tlotv["otv_menu"]["otvm5"]);
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('span', text_clipping_lower($tlotv["otv_menu"]["otvm5"]), 'icon-thumbnail');
						?>

					</li>
				<?php } ?>

			</ul>
		</li>

		<li class="nav-item-header">
			<div class="text-uppercase text-master fs-14 bold" style="line-height: 40px;"><?= $tlotv["otv_menu"]["otvm1"] ?></div>
		</li>

		<li class="<?= ($page == 'onlinetv' && $page1 == 'setting') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=onlinetv&amp;sp=setting', $tlotv["otv_menu"]["otvm1"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlotv["otv_menu"]["otvm1"]), 'icon-thumbnail');
			?>

		</li>
	</ul>
</li>
<!-- END BLOG SECTION -->
