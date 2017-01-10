<!-- START DOWNLOAD SECTION -->
<li class="">
	<a href="javascript:;">
		<span class="title"><?php echo $tld["dload"]["m"]; ?></span>
		<span class="arrow"></span>
	</a>
	<span class="icon-thumbnail <?php if ($page == 'download') echo 'bg-success'; ?>"><i class="pg-download"></i></span>

	<ul class="sub-menu">
		<li class="">
			<a href="index.php?p=download">
				<?php echo $tld["dload"]["m1"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["dload"]["m1"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=download&amp;sp=new">
				<?php echo $tld["dload"]["m2"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["dload"]["m2"]); ?></span>
		</li>
		<?php if ($page == 'download' && $page1 == 'edit') { ?>
			<li class="">
				<a href="index.php?p=download&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
					<?php echo $tld["dload"]["m3"]; ?>
				</a>
				<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["dload"]["m3"]); ?></span>
			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=download&amp;sp=categories">
				<?php echo $tl["submenu"]["sm110"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm110"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=download&amp;sp=newcategory">
				<?php echo $tl["submenu"]["sm111"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm111"]); ?></span>
		</li>
		<?php if ($page == 'download' && $page1 == 'categories' && $page2 == 'edit') { ?>
			<li class="">
				<a href="index.php?p=download&amp;sp=categories&amp;ssp=edit&amp;sssp=<?php echo $page3; ?>">
					<?php echo $tl["submenu"]["sm112"]; ?>
				</a>
				<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm112"]); ?></span>
			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=download&amp;sp=comment">
				<?php echo $tld["dload"]["d19"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["dload"]["d19"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=download&amp;sp=trash">
				<?php echo $tld["dload"]["d18"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tld["dload"]["d18"]); ?></span>
		</li>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=download&amp;sp=setting">
				<?php echo $tl["submenu"]["sm10"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm10"]); ?></span>
		</li>
	</ul>
</li>
<!-- END DOWNLOAD SECTION -->
