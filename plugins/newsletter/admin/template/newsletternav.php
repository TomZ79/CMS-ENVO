<!-- START NEWSLETTER SECTION -->
<li class="">
	<a href="javascript:;">
		<span class="title"><?php echo $tlnl["nletter"]["m"]; ?></span>
		<span class="arrow"></span>
	</a>
	<span class="icon-thumbnail <?php if ($page == 'newsletter') echo 'bg-success'; ?>"><i class="pg-mail"></i></span>

	<ul class="sub-menu">
		<li class="">
			<a href="index.php?p=faq">
				<?php echo $tlf["faq"]["m1"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlf["faq"]["m1"]); ?></span>
		</li>

		<li class="">
			<a href="index.php?p=newsletter">
				<?php echo $tlnl["nletter"]["m1"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlnl["nletter"]["m1"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=newsletter&amp;sp=new">
				<?php echo $tlnl["nletter"]["m2"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlnl["nletter"]["m2"]); ?></span>
		</li>
		<?php if ($page == 'newsletter' && $page1 == 'edit') { ?>
			<li class="">
				<a href="index.php?p=newsletter&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
					<?php echo $tlnl["nletter"]["m3"]; ?>
				</a>
				<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlnl["nletter"]["m3"]); ?></span>
			</li>
		<?php } ?>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=newsletter&amp;sp=user">
				<?php echo $tl["menu"]["m3"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["menu"]["m3"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=newsletter&amp;sp=user&amp;ssp=newuser">
				<?php echo $tl["cmenu"]["c2"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["cmenu"]["c2"]); ?></span>
		</li>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=newsletter&amp;sp=usergroup">
				<?php echo $tl["submenu"]["sm100"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm100"]); ?></span>
		</li>
		<li class="">
			<a href="index.php?p=newsletter&amp;sp=usergroup&amp;ssp=new">
				<?php echo $tl["submenu"]["sm101"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm101"]); ?></span>
		</li>
		<li class="list-divider"></li>

		<li class="">
			<a href="index.php?p=newsletter&amp;sp=settings">
				<?php echo $tl["submenu"]["sm10"]; ?>
			</a>
			<span class="icon-thumbnail"><?php echo text_clipping_lower ($tl["submenu"]["sm10"]); ?></span>
		</li>
	</ul>
</li>
<!-- END NEWSLETTER SECTION -->
