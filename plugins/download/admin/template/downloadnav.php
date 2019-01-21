<!-- START DOWNLOAD SECTION -->
<?php
if ($page == 'download') {
	$classdlsection = 'open active';
	$classdliconbg  = 'bg-success';
}
?>
<li class="<?= $classdlsection ?>">

	<?php
	// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
	echo $Html -> addAnchor('javascript:;', '<span class="title">' . $tld["downl_menu"]["downlm"] . '</span><span class="arrow ' . $classdlsection . '"></span>');
	// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
	echo $Html -> addTag('span', '<i class="pg-download"></i>', 'icon-thumbnail ' . $classdliconbg);
	?>

	<ul class="sub-menu">
		<li class="<?= (($page == 'download' && $page1 == '') || ($page == 'download' && $page1 == 'new') || ($page == 'download' && $page1 == 'edit')) ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=download', $tld["downl_menu"]["downlm1"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tld["downl_menu"]["downlm1"]), 'icon-thumbnail');
			?>

		</li>
		<li class="<?= ($page == 'download' && $page1 == 'new') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=download&amp;sp=new', $tld["downl_menu"]["downlm2"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tld["downl_menu"]["downlm2"]), 'icon-thumbnail');
			?>

		</li>
		<?php if ($page == 'download' && $page1 == 'edit') { ?>
			<li class="<?= ($page == 'download' && $page1 == 'edit') ? 'submenu-active' : '' ?>">

				<?php
				// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
				echo $Html -> addAnchor('index.php?p=download&amp;sp=edit&amp;id=' . $page2, $tld["downl_menu"]["downlm3"]);
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', text_clipping_lower($tld["downl_menu"]["downlm3"]), 'icon-thumbnail');
				?>

			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="<?= (($page == 'download' && $page1 == 'categories') || ($page == 'download' && $page1 == 'newcategory')) ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=download&amp;sp=categories', $tld["downl_menu"]["downlm4"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tld["downl_menu"]["downlm4"]), 'icon-thumbnail');
			?>

		</li>
		<li class="<?= ($page == 'download' && $page1 == 'newcategory') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=download&amp;sp=newcategory', $tld["downl_menu"]["downlm5"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tld["downl_menu"]["downlm5"]), 'icon-thumbnail');
			?>

		</li>
		<?php if ($page == 'download' && $page1 == 'categories' && $page2 == 'edit') { ?>
			<li class="<?= ($page == 'download' && $page1 == 'categories' && $page2 == 'edit') ? 'submenu-active' : '' ?>">

				<?php
				// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
				echo $Html -> addAnchor('index.php?p=download&amp;sp=categories&amp;ssp=edit&amp;id=' . $page3, $tld["downl_menu"]["downlm6"]);
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', text_clipping_lower($tld["downl_menu"]["downlm6"]), 'icon-thumbnail');
				?>

			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="<?= ($page == 'download' && $page1 == 'setting') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=download&amp;sp=setting', $tld["downl_menu"]["downlm9"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tld["downl_menu"]["downlm9"]), 'icon-thumbnail');
			?>

		</li>
	</ul>
</li>
<!-- END DOWNLOAD SECTION -->
