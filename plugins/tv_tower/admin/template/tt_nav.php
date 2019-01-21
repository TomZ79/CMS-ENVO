<!-- START BLOG SECTION -->
<?php
if ($page == 'tv-tower') {
	$classttsection = 'open active';
	$classtticonbg  = 'bg-success';
}
if ($page == 'tv-tower' && $page1 == 'identifiers') {
	$classttsection1 = 'open active';
	$classttconbg1   = 'bg-success';
	$stylett1        = 'style="display: block;"';
}
?>
<li class="<?= $classttsection ?>">

	<?php
	// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
	echo $Html -> addAnchor('javascript:;', '<span class="title">' . $tltt["tt_menu"]["ttm"] . '</span><span class="arrow ' . $classttsection . '"></span>');
	// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
	echo $Html -> addTag('span', 'TT', 'icon-thumbnail ' . $classtticonbg);
	?>

	<ul class="sub-menu">

		<li class="<?= (($page == 'tv-tower' && $page1 == 'tvprogram') || ($page == 'tv-tower' && $page1 == 'newprogram')) ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvprogram', $tltt["tt_menu"]["ttm1"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tltt["tt_menu"]["ttm1"]), 'icon-thumbnail');
			?>

		</li>
		<li class="<?= ($page == 'tv-tower' && $page1 == 'tvprogram' && $page2 == 'newprogram') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvprogram&amp;ssp=newprogram', $tltt["tt_menu"]["ttm2"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tltt["tt_menu"]["ttm2"]), 'icon-thumbnail');
			?>

		</li>
		<?php if ($page == 'tv-tower' && $page1 == 'tvprogram' && $page2 == 'editprogram') { ?>
			<li class="<?= ($page == 'tv-tower' && $page1 == 'tvprogram' && $page2 == 'editprogram') ? 'submenu-active' : '' ?>">

				<?php
				// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
				echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvprogram&amp;ssp=editprogram&amp;id=' . $page3, $tltt["tt_menu"]["ttm3"]);
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', text_clipping_lower($tltt["tt_menu"]["ttm3"]), 'icon-thumbnail');
				?>

			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="<?= (($page == 'tv-tower' && $page1 == 'tvchannel') || ($page == 'tv-tower' && $page1 == 'newchannel')) ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvchannel', $tltt["tt_menu"]["ttm4"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tltt["tt_menu"]["ttm4"]), 'icon-thumbnail');
			?>

		</li>
		<li class="<?= ($page == 'tv-tower' && $page1 == 'tvchannel' && $page2 == 'newchannel') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvchannel&amp;ssp=newchannel', $tltt["tt_menu"]["ttm5"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tltt["tt_menu"]["ttm5"]), 'icon-thumbnail');
			?>

		</li>
		<?php if ($page == 'tv-tower' && $page1 == 'tvchannel' && $page2 == 'editchannel') { ?>
			<li class="<?= ($page == 'tv-tower' && $page1 == 'tvchannel' && $page2 == 'editchannel') ? 'submenu-active' : '' ?>">

				<?php
				// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
				echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvchannel&amp;ssp=editchannel&amp;id=' . $page3, $tltt["tt_menu"]["ttm6"]);
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', text_clipping_lower($tltt["tt_menu"]["ttm6"]), 'icon-thumbnail');
				?>

			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="<?= (($page == 'tv-tower' && $page1 == 'tvtower') || ($page == 'tv-tower' && $page1 == 'newtvtower')) ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvtower', $tltt["tt_menu"]["ttm7"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tltt["tt_menu"]["ttm7"]), 'icon-thumbnail');
			?>

		</li>
		<li class="<?= ($page == 'tv-tower' && $page1 == 'tvtower' && $page2 == 'newtvtower') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvtower&amp;ssp=newtvtower', $tltt["tt_menu"]["ttm8"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tltt["tt_menu"]["ttm8"]), 'icon-thumbnail');
			?>

		</li>
		<?php if ($page == 'tv-tower' && $page1 == 'tvtower' && $page2 == 'edittvtower') { ?>
			<li class="<?= ($page == 'tv-tower' && $page1 == 'tvtower' && $page2 == 'edittvtower') ? 'submenu-active' : '' ?>">

				<?php
				// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
				echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=tvtower&amp;ssp=edittvtower&amp;id=' . $page3, $tltt["tt_menu"]["ttm9"]);
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', text_clipping_lower($tltt["tt_menu"]["ttm9"]), 'icon-thumbnail');
				?>

			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="<?= $classttsection1 ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('javascript:;', '<span class="title">' . $tltt["tt_menu"]["ttm11"] . '</span><span class="arrow ' . $classttsection1 . '"></span>');
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', 'ID', 'icon-thumbnail ' . $classttconbg1);
			?>

			<ul class="sub-menu" <?= $stylett1 ?>>
				<li class="<?= (($page == 'tv-tower' && $page1 == 'identifiers' && $page2 == 'createident')) ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=createident', $tltt["tt_menu"]["ttm12"]);
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower($tltt["tt_menu"]["ttm12"]), 'icon-thumbnail');
					?>

				</li>
				<li class="<?= ($page == 'tv-tower' && $page1 == 'identifiers') ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=identifiers', $tltt["tt_menu"]["ttm13"]);
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower($tltt["tt_menu"]["ttm13"]), 'icon-thumbnail');
					?>

				</li>
			</ul>
		</li>
		<li class="list-divider"></li>

		<li class="<?= ($page == 'tv-tower' && $page1 == 'setting') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=tv-tower&amp;sp=setting', $tltt["tt_menu"]["ttm10"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tltt["tt_menu"]["ttm10"]), 'icon-thumbnail');
			?>

		</li>
	</ul>
</li><!-- END BLOG SECTION -->
