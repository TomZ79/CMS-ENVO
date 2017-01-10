<!-- START TAGS SECTION -->
<li class="">
	<a href="javascript:;">
		<span class="title"><?php echo $tl["menu"]["mm5"]; ?></span>
		<span class="arrow"></span>
	</a>
	<span class="icon-thumbnail <?php if ($page == 'tags') echo 'bg-success'; ?>"><i class="fa fa-tags"></i></span>

	<ul class="sub-menu">
		<li class="">
			<a href="index.php?p=tags">
				<?php echo $tl["submenu"]["sm170"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm170"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=tags&amp;sp=cloud">
				<?php echo $tl["submenu"]["sm171"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm171"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=tags&amp;sp=setting">
				<?php echo $tl["submenu"]["sm172"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm172"]); ?></span>
		</li>
	</ul>
</li><!-- END TAGS SECTION -->