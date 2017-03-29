<!-- START DOWNLOAD SECTION -->
<li class="">
	<a href="javascript:;">
		<span class="title"><?php echo $tld["downl_menu"]["downlm"]; ?></span>
		<span class="arrow"></span>
	</a>
	<span class="icon-thumbnail <?php if ($page == 'download') echo 'bg-success'; ?>"><i class="pg-download"></i></span>

	<ul class="sub-menu">
		<li class="">
			<a href="index.php?p=download">
				<?php echo $tld["downl_menu"]["downlm1"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["downl_menu"]["downlm1"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=download&amp;sp=new">
				<?php echo $tld["downl_menu"]["downlm2"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["downl_menu"]["downlm2"]); ?></span>
		</li>
		<?php if ($page == 'download' && $page1 == 'edit') { ?>
			<li class="">
				<a href="index.php?p=download&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
					<?php echo $tld["downl_menu"]["downlm3"]; ?>
				</a>
				<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["downl_menu"]["downlm3"]); ?></span>
			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=download&amp;sp=categories">
				<?php echo $tld["downl_menu"]["downlm4"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["downl_menu"]["downlm4"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=download&amp;sp=newcategory">
				<?php echo $tld["downl_menu"]["downlm5"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["downl_menu"]["downlm5"]); ?></span>
		</li>
		<?php if ($page == 'download' && $page1 == 'categories' && $page2 == 'edit') { ?>
			<li class="">
				<a href="index.php?p=download&amp;sp=categories&amp;ssp=edit&amp;sssp=<?php echo $page3; ?>">
					<?php echo $tld["downl_menu"]["downlm6"]; ?>
				</a>
				<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["downl_menu"]["downlm6"]); ?></span>
			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=download&amp;sp=comment">
				<?php echo $tld["downl_menu"]["downlm7"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["downl_menu"]["downlm7"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=download&amp;sp=trash">
				<?php echo $tld["downl_menu"]["downlm8"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["downl_menu"]["downlm8"]); ?></span>
		</li>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=download&amp;sp=setting">
				<?php echo $tld["downl_menu"]["downlm9"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["downl_menu"]["downlm9"]); ?></span>
		</li>
	</ul>
</li>
<!-- END DOWNLOAD SECTION -->
