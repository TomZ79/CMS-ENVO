<!-- START BLOG SECTION -->
<li class="">
	<a href="javascript:;">
		<span class="title"><?php echo $tlblog["blog_menu"]["blogm"]; ?></span>
		<span class="arrow"></span>
	</a>
	<span class="icon-thumbnail <?php if ($page == 'blog') echo 'bg-success'; ?>">BL</span>

	<ul class="sub-menu">
		<li class="">
			<a href="index.php?p=blog">
				<?php echo $tlblog["blog_menu"]["blogm1"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlblog["blog_menu"]["blogm1"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=blog&amp;sp=new">
				<?php echo $tlblog["blog_menu"]["blogm2"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlblog["blog_menu"]["blogm2"]); ?></span>
		</li>
		<?php if ($page == 'blog' && $page1 == 'edit') { ?>
			<li class="">
				<a href="index.php?p=blog&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
					<?php echo $tlblog["blog_menu"]["blogm3"]; ?>
				</a>
				<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlblog["blog_menu"]["blogm3"]); ?></span>
			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=blog&amp;sp=categories">
				<?php echo $tlblog["blog_menu"]["blogm4"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlblog["blog_menu"]["blogm4"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=blog&amp;sp=newcategory">
				<?php echo $tlblog["blog_menu"]["blogm5"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlblog["blog_menu"]["blogm5"]); ?></span>
		</li>
		<?php if ($page == 'blog' && $page1 == 'categories' && $page2 == 'edit') { ?>
			<li class="">
				<a href="index.php?p=blog&amp;sp=categories&amp;ssp=edit&amp;sssp=<?php echo $page3; ?>">
					<?php echo $tlblog["blog_menu"]["blogm6"]; ?>
				</a>
				<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlblog["blog_menu"]["blogm6"]); ?></span>
			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=blog&amp;sp=comment">
				<?php echo $tlblog["blog_menu"]["blogm7"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlblog["blog_menu"]["blogm7"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=blog&amp;sp=trash">
				<?php echo $tlblog["blog_menu"]["blogm8"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlblog["blog_menu"]["blogm8"]); ?></span>
		</li>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=blog&amp;sp=setting">
				<?php echo $tlblog["blog_menu"]["blogm9"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlblog["blog_menu"]["blogm9"]); ?></span>
		</li>
	</ul>
</li>
<!-- END BLOG SECTION -->
