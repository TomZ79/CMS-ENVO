<!-- START WIKI SECTION -->
<?php
if ($page == 'wiki') {
	$classwikisection = 'open active';
	$classwikiiconbg  = 'bg-success';
}
?>
<li class="<?= $classwikisection ?>">

	<?php
	// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
	echo $Html -> addAnchor('javascript:;', '<span class="title">' . $tlw["wiki_menu"]["wikim"] . '</span><span class="arrow ' . $classwikisection . '"></span>');
	// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
	echo $Html -> addTag('span', '<i class="fa fa-question"></i>', 'icon-thumbnail ' . $classwikiiconbg);
	?>

	<ul class="sub-menu">
		<li class="<?= (($page == 'wiki' && $page1 == '') || ($page == 'wiki' && $page1 == 'new') || ($page == 'wiki' && $page1 == 'edit')) ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=wiki', $tlw["wiki_menu"]["wikim1"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlw["wiki_menu"]["wikim1"]), 'icon-thumbnail');
			?>

		</li>
		<li class="<?= ($page == 'wiki' && $page1 == 'new') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=wiki&amp;sp=new', $tlw["wiki_menu"]["wikim2"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlw["wiki_menu"]["wikim2"]), 'icon-thumbnail');
			?>

		</li>
		<?php if ($page == 'wiki' && $page1 == 'edit') { ?>
			<li class="<?= ($page == 'blog' && $page1 == 'edit') ? 'submenu-active' : '' ?>">

				<?php
				// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
				echo $Html -> addAnchor('index.php?p=wiki&amp;sp=edit&amp;id=' . $page2, $tlw["wiki_menu"]["wikim3"]);
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', text_clipping_lower($tlw["wiki_menu"]["wikim3"]), 'icon-thumbnail');
				?>

			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="<?= (($page == 'wiki' && $page1 == 'categories') || ($page == 'wiki' && $page1 == 'newcategory')) ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=wiki&amp;sp=categories', $tlw["wiki_menu"]["wikim4"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlw["wiki_menu"]["wikim4"]), 'icon-thumbnail');
			?>

		</li>
		<li class="<?= ($page == 'wiki' && $page1 == 'newcategory') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=wiki&amp;sp=newcategory', $tlw["wiki_menu"]["wikim5"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlw["wiki_menu"]["wikim5"]), 'icon-thumbnail');
			?>

		</li>
		<?php if ($page == 'wiki' && $page1 == 'categories' && $page2 == 'edit') { ?>
			<li class="<?= ($page == 'wiki' && $page1 == 'categories' && $page2 == 'edit') ? 'submenu-active' : '' ?>">

				<?php
				// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
				echo $Html -> addAnchor('index.php?p=wiki&amp;sp=categories&amp;ssp=edit&amp;id=' . $page3, $tlw["wiki_menu"]["wikim6"]);
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', text_clipping_lower($tlw["wiki_menu"]["wikim6"]), 'icon-thumbnail');
				?>

			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="<?= ($page == 'wiki' && $page1 == 'setting') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=wiki&amp;sp=setting', $tlw["wiki_menu"]["wikim9"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlw["wiki_menu"]["wikim9"]), 'icon-thumbnail');
			?>

		</li>
	</ul>
</li><!-- END WIKI SECTION -->
