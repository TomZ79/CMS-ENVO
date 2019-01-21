<!-- START FAQ SECTION -->
<?php
if ($page == 'faq') {
	$classfaqsection = 'open active';
	$classfaqiconbg  = 'bg-success';
}
?>
<li class="<?= $classfaqsection ?>">

	<?php
	// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
	echo $Html -> addAnchor('javascript:;', '<span class="title">' . $tlf["faq_menu"]["faqm"] . '</span><span class="arrow ' . $classfaqsection . '"></span>');
	// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
	echo $Html -> addTag('span', '<i class="fa fa-question"></i>', 'icon-thumbnail ' . $classfaqiconbg);
	?>

	<ul class="sub-menu">
		<li class="<?= (($page == 'faq' && $page1 == '') || ($page == 'faq' && $page1 == 'new') || ($page == 'faq' && $page1 == 'edit')) ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=faq', $tlf["faq_menu"]["faqm1"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlf["faq_menu"]["faqm1"]), 'icon-thumbnail');
			?>

		</li>
		<li class="<?= ($page == 'faq' && $page1 == 'new') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=faq&amp;sp=new', $tlf["faq_menu"]["faqm2"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlf["faq_menu"]["faqm2"]), 'icon-thumbnail');
			?>

		</li>
		<?php if ($page == 'faq' && $page1 == 'edit') { ?>
			<li class="<?= ($page == 'blog' && $page1 == 'edit') ? 'submenu-active' : '' ?>">

				<?php
				// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
				echo $Html -> addAnchor('index.php?p=faq&amp;sp=edit&amp;id=' . $page2, $tlf["faq_menu"]["faqm3"]);
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', text_clipping_lower($tlf["faq_menu"]["faqm3"]), 'icon-thumbnail');
				?>

			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="<?= (($page == 'faq' && $page1 == 'categories') || ($page == 'faq' && $page1 == 'newcategory')) ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=faq&amp;sp=categories', $tlf["faq_menu"]["faqm4"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlf["faq_menu"]["faqm4"]), 'icon-thumbnail');
			?>

		</li>
		<li class="<?= ($page == 'faq' && $page1 == 'newcategory') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=faq&amp;sp=newcategory', $tlf["faq_menu"]["faqm5"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlf["faq_menu"]["faqm5"]), 'icon-thumbnail');
			?>

		</li>
		<?php if ($page == 'faq' && $page1 == 'categories' && $page2 == 'edit') { ?>
			<li class="<?= ($page == 'faq' && $page1 == 'categories' && $page2 == 'edit') ? 'submenu-active' : '' ?>">

				<?php
				// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
				echo $Html -> addAnchor('index.php?p=faq&amp;sp=categories&amp;ssp=edit&amp;id=' . $page3, $tlf["faq_menu"]["faqm6"]);
				// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
				echo $Html -> addTag('span', text_clipping_lower($tlf["faq_menu"]["faqm6"]), 'icon-thumbnail');
				?>

			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="<?= ($page == 'faq' && $page1 == 'setting') ? 'submenu-active' : '' ?>">

			<?php
			// Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
			echo $Html -> addAnchor('index.php?p=faq&amp;sp=setting', $tlf["faq_menu"]["faqm9"]);
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('span', text_clipping_lower($tlf["faq_menu"]["faqm9"]), 'icon-thumbnail');
			?>

		</li>
	</ul>
</li><!-- END FAQ SECTION -->
