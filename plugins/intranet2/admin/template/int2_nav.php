<!-- START BLOG SECTION -->
<?php
if ($page == 'intranet2') {
	$classint2section = 'open active';
	$classint2iconbg  = 'bg-success';
}
if ($page1 == 'house') {
	$classint2subsection1 = 'open active';
	$styleint_1           = 'style="display: block;"';
}
?>
<li class="<?= $classint2section ?>">

	<?php
	// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
	echo $Html -> addAnchor('javascript:;', '<span class="title">' . $tlint2["int2_menu"]["int2m"] . '</span><span class="arrow ' . $classint2section . '"></span>');
	// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
	echo $Html -> addTag('span', 'INT2', 'icon-thumbnail ' . $classint2iconbg);
	?>

	<ul class="sub-menu">
		<li class="<?= $classint2subsection1 ?>">
			<a href="javascript:;"><?= $tlint2["int2_menu"]["int2m2"] ?>
				<span class="arrow <?= $classint2subsection1 ?>"></span></a>
			<span class="icon-thumbnail"><?= text_clipping_lower($tlint2["int2_menu"]["int2m2"]) ?></span>
			<ul class="sub-menu" <?= $styleint_1 ?>>

				<li class="<?= (($page == 'intranet2' && $page1 == 'house') || ($page == 'intranet2' && $page1 == 'newhouse')) ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house', $tlint2["int2_menu"]["int2m3"]);
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower($tlint2["int2_menu"]["int2m3"]), 'icon-thumbnail');
					?>

				</li>
				<li class="<?= ($page == 'intranet2' && $page1 == 'house' && $page2 == 'newhouse') ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house&amp;ssp=newhouse', $tlint2["int2_menu"]["int2m4"]);
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower($tlint2["int2_menu"]["int2m4"]), 'icon-thumbnail');
					?>

				</li>
				<?php if ($page == 'intranet2' && $page1 == 'house' && $page2 == 'edithouse') { ?>
					<li class="<?= ($page == 'intranet' && $page1 == 'house' && $page2 == 'edithouse') ? 'submenu-active' : '' ?>">

						<?php
						// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
						echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house&amp;ssp=edithouse&amp;id=' . $page2, $tlint2["int2_menu"]["int2m6"]);
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('span', text_clipping_lower($tlint2["int2_menu"]["int2m6"]), 'icon-thumbnail');
						?>

					</li>
				<?php } ?>

				<li class="<?= ($page == 'intranet' && $page1 == 'house' && $page2 == 'wizard') ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house&amp;ssp=edithouse&amp;id=' . $page2, $tlint2["int2_menu"]["int2m6"]);
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower($tlint2["int2_menu"]["int2m6"]), 'icon-thumbnail');
					?>

				</li>

			</ul>
		</li>

		<li class="list-divider"></li>

		<li class="<?= ($page == 'intranet2' && $page1 == 'maps') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=maps', 'Mapové podklady');
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower('Mapové podklady'), 'icon-thumbnail');
			?>

		</li>

		<li class="list-divider"></li>

		<li class="<?= ($page == 'intranet2' && $page1 == 'setting') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=setting', $tlint2["int2_menu"]["int2m1"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlint2["int2_menu"]["int2m1"]), 'icon-thumbnail');
			?>

		</li>
	</ul>
</li>
<!-- END BLOG SECTION -->
