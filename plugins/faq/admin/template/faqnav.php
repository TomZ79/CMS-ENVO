<!-- START FAQ SECTION -->
<li class="">
	<a href="javascript:;">
		<span class="title"><?php echo $tlf["faq_menu"]["faqm"]; ?></span>
		<span class="arrow"></span>
	</a>
	<span class="icon-thumbnail <?php if ($page == 'faq') echo 'bg-success'; ?>"><i class="fa fa-question"></i></span>

	<ul class="sub-menu">
		<li class="">
			<a href="index.php?p=faq">
				<?php echo $tlf["faq_menu"]["faqm1"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlf["faq_menu"]["faqm1"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=faq&amp;sp=new">
				<?php echo $tlf["faq_menu"]["faqm2"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlf["faq_menu"]["faqm2"]); ?></span>
		</li>
		<?php if ($page == 'faq' && $page1 == 'edit') { ?>
			<li class="">
				<a href="index.php?p=faq&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
					<?php echo $tlf["faq_menu"]["faqm3"]; ?>
				</a>
				<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlf["faq_menu"]["faqm3"]); ?></span>
			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=faq&amp;sp=categories">
				<?php echo $tlf["submenu"]["faqm4"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlf["faq_menu"]["faqm4"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=faq&amp;sp=newcategory">
				<?php echo $tlf["faq_menu"]["faqm5"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlf["faq_menu"]["faqm5"]); ?></span>
		</li>
		<?php if ($page == 'faq' && $page1 == 'categories' && $page2 == 'edit') { ?>
			<li class="">
				<a href="index.php?p=faq&amp;sp=categories&amp;ssp=edit&amp;sssp=<?php echo $page3; ?>">
					<?php echo $tlf["faq_menu"]["faqm6"]; ?>
				</a>
				<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlf["faq_menu"]["faqm6"]); ?></span>
			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=faq&amp;sp=comment">
				<?php echo $tlf["faq_menu"]["faqm7"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlf["faq_menu"]["faqm7"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=faq&amp;sp=trash">
				<?php echo $tlf["faq_menu"]["faqm8"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlf["faq_menu"]["faqm8"]); ?></span>
		</li>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=faq&amp;sp=setting">
				<?php echo $tlf["faq_menu"]["faqm9"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlf["faq_menu"]["faqm9"]); ?></span>
		</li>
	</ul>
</li>
<!-- END FAQ SECTION -->
