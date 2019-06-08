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

if ($page1 == 'maps') {
	$classint2subsection2 = 'open active';
	$styleint_2           = 'style="display: block;"';
}

if ($page1 == 'search_db') {
	$classint2subsection3 = 'open active';
	$styleint_3           = 'style="display: block;"';
}

if ($page1 == 'contract' && ($page2 == '!' || $page2 == 'newcontract' || $page2 == 'editcontract')) {
	$classint2subsection4 = 'open active';
	$styleint_4           = 'style="display: block;"';
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
		<li class="nav-item-header">
			<div class="text-uppercase text-master fs-14 bold" style="line-height: 40px;"><?= $tlint2["int2_menu"]["int2m2"] ?></div>
		</li>

		<li class="<?= $classint2subsection1 ?>">
			<a href="javascript:;"><?= $tlint2["int2_menu"]["int2m2"] ?>
				<span class="arrow <?= $classint2subsection1 ?>"></span></a>
			<span class="icon-thumbnail"><?= text_clipping_lower($tlint2["int2_menu"]["int2m2"]) ?></span>
			<ul class="sub-menu" <?= $styleint_1 ?>>

				<li class="<?= (($page == 'intranet2' && $page1 == 'house' && !$page2)) ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house', $tlint2["int2_menu"]["int2m10"]);
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower($tlint2["int2_menu"]["int2m10"]), 'icon-thumbnail');
					?>

				</li>
				<?php if ($page == 'intranet2' && $page1 == 'house' && $page2 == 'houselist') { ?>
					<li class="<?= ($page == 'intranet2' && $page1 == 'house' && $page2 == 'houselist') ? 'submenu-active' : '' ?>">

						<?php
						// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
						echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house', $tlint2["int2_menu"]["int2m3"]);
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('span', text_clipping_lower($tlint2["int2_menu"]["int2m3"]), 'icon-thumbnail');
						?>

					</li>
				<?php } ?>
				<li class="<?= ($page == 'intranet2' && $page1 == 'house' && $page2 == 'newhouse') ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house&amp;ssp=newhouse', $tlint2["int2_menu"]["int2m4"]);
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower($tlint2["int2_menu"]["int2m4"]), 'icon-thumbnail');
					?>

				</li>
				<?php if ($page == 'intranet2' && $page1 == 'house' && $page2 == 'edithouse') { ?>
					<li class="<?= ($page == 'intranet2' && $page1 == 'house' && $page2 == 'edithouse') ? 'submenu-active' : '' ?>">

						<?php
						// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
						echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=house&amp;ssp=edithouse&amp;id=' . $page2, $tlint2["int2_menu"]["int2m6"]);
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('span', text_clipping_lower($tlint2["int2_menu"]["int2m6"]), 'icon-thumbnail');
						?>

					</li>
				<?php } ?>

			</ul>
		</li>

		<li class="<?= $classint2subsection2 ?>">
			<a href="javascript:;">Mapové podklady
				<span class="arrow <?= $classint2subsection2 ?>"></span></a>
			<span class="icon-thumbnail"><?= text_clipping_lower('Mapové podklady') ?></span>
			<ul class="sub-menu" <?= $styleint_2 ?>>

				<li class="<?= ($page == 'intranet2' && $page1 == 'maps' && $page2 == 'maps1') ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=maps&amp;ssp=maps1', 'Mapa domů v DB');
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower('Mapa domů v DB'), 'icon-thumbnail');
					?>

				</li>
			</ul>
		</li>

		<li class="<?= ($page == 'intranet2' && $page1 == 'katastr') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=katastr', 'Katastr');
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower('Katastr'), 'icon-thumbnail');
			?>

		</li>

		<li class="<?= $classint2subsection3 ?>">
			<a href="javascript:;">Vyhledávání v DB
				<span class="arrow <?= $classint2subsection3 ?>"></span></a>
			<span class="icon-thumbnail"><?= text_clipping_lower('Vyhledávání v DB') ?></span>
			<ul class="sub-menu" <?= $styleint_3 ?>>

				<li class="<?= ($page == 'intranet2' && $page1 == 'search_db' && $page2 == 'ares') ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=search_db&amp;ssp=ares', 'Ares');
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower('Ares'), 'icon-thumbnail');
					?>

				</li>
				<li class="<?= ($page == 'intranet2' && $page1 == 'search_db' && $page2 == 'justice') ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=search_db&amp;ssp=justice', 'Justice');
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower('Justice'), 'icon-thumbnail');
					?>

				</li>

			</ul>
		</li>


		<li class="list-divider"></li>

		<li class="nav-item-header">
			<div class="text-uppercase text-master fs-14 bold" style="line-height: 40px;">Zakázky</div>
		</li>

		<li class="<?= $classint2subsection4 ?>">
			<a href="javascript:;">Zakázky
				<span class="arrow <?= $classint2subsection4 ?>"></span></a>
			<span class="icon-thumbnail"><?= text_clipping_lower('Zakázky') ?></span>
			<ul class="sub-menu" <?= $styleint_4 ?>>

				<li class="<?= (($page == 'intranet2' && $page1 == 'contract' && !$page2)) ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=contract', 'Vyhledání zakázky');
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower('Vyhledání zakázky'), 'icon-thumbnail');
					?>

				</li>
				<?php if ($page == 'intranet2' && $page1 == 'contract' && $page2 == 'contractlist') { ?>
					<li class="<?= ($page == 'intranet2' && $page1 == 'contract' && $page2 == 'contractlist') ? 'submenu-active' : '' ?>">

						<?php
						// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
						echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=contract', 'Seznam zakázek');
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('span', text_clipping_lower('Seznam zakázek'), 'icon-thumbnail');
						?>

					</li>
				<?php } ?>
				<li class="<?= ($page == 'intranet2' && $page1 == 'contract' && $page2 == 'newcontract') ? 'submenu-active' : '' ?>">

					<?php
					// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
					echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=contract&amp;ssp=newcontract', 'Nová zakázka');
					// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
					echo $Html -> addTag('span', text_clipping_lower('Nová zakázka'), 'icon-thumbnail');
					?>

				</li>
				<?php if ($page == 'intranet2' && $page1 == 'contract' && $page2 == 'editcontract') { ?>
					<li class="<?= ($page == 'intranet2' && $page1 == 'contract' && $page2 == 'editcontract') ? 'submenu-active' : '' ?>">

						<?php
						// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
						echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=contract&amp;ssp=editcontract&amp;id=' . $page2, 'Editace zakázky');
						// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
						echo $Html -> addTag('span', text_clipping_lower('Editace zakázky'), 'icon-thumbnail');
						?>

					</li>
				<?php } ?>

			</ul>
		</li>

		<li class="<?= ($page == 'intranet2' && $page1 == 'contract' && $page2 == 'reports') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=contract&amp;ssp=reports', 'Report');
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower('Report'), 'icon-thumbnail');
			?>

		</li>

		<li class="list-divider"></li>

		<li class="nav-item-header">
			<div class="text-uppercase text-master fs-14 bold" style="line-height: 40px;"><?= $tlint2["int2_menu"]["int2m7"] ?></div>
		</li>

		<li class="<?= (($page == 'intranet2' && $page1 == 'notification') || ($page == 'intranet2' && $page1 == 'newnotification')) ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=notification', $tlint2["int2_menu"]["int2m7"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlint2["int2_menu"]["int2m7"]), 'icon-thumbnail');
			?>

		</li>

		<li class="<?= ($page == 'intranet2' && $page1 == 'notification' && $page2 == 'newnotification') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=notification&amp;ssp=newnotification', $tlint2["int2_menu"]["int2m8"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlint2["int2_menu"]["int2m8"]), 'icon-thumbnail');
			?>

		</li>

		<?php if ($page == 'intranet2' && $page1 == 'notification' && $page2 == 'editnotification') { ?>
			<li class="<?= ($page == 'intranet2' && $page1 == 'notification' && $page2 == 'editnotification') ? 'submenu-active' : '' ?>">

				<?php
				// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
				echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=notification&amp;ssp=editnotification&amp;id=' . $page2, $tlint2["int2_menu"]["int2m9"]);
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', text_clipping_lower($tlint2["int2_menu"]["int2m9"]), 'icon-thumbnail');
				?>

			</li>
		<?php } ?>

		<li class="list-divider"></li>

		<li class="nav-item-header">
			<div class="text-uppercase text-master fs-14 bold" style="line-height: 40px;"><?= $tlint2["int2_menu"]["int2m1"] ?></div>
		</li>

		<li class="<?= ($page == 'intranet2' && $page1 == 'setting') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=setting', $tlint2["int2_menu"]["int2m1"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlint2["int2_menu"]["int2m1"]), 'icon-thumbnail');
			?>

		</li>

		<li class="list-divider"></li>

		<li class="nav-item-header">
			<div class="text-uppercase text-master fs-14 bold" style="line-height: 40px;">Nápověda</div>
		</li>

		<li class="<?= ($page == 'intranet2' && $page1 == 'help') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=intranet2&amp;sp=help', 'Nápověda');
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower('Nápověda'), 'icon-thumbnail');
			?>

		</li>
	</ul>
</li>
<!-- END BLOG SECTION -->