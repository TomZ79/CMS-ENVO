<!-- START BELOWHEADER SECTION -->
<li class="list-divider"></li>
<li class="">
	<a href="index.php?p=belowheader">
		<?php echo $tlbh["bh_menu"]["bhm"]; ?>
	</a>
	<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlbh["bh_menu"]["bhm"]); ?></span>
</li>
<li class="">
	<a href="index.php?p=belowheader&amp;sp=newbh">
		<?php echo $tlbh["bh_menu"]["bhm1"]; ?>
	</a>
	<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlbh["bh_menu"]["bhm1"]); ?></span>
</li>
<?php if ($page == 'belowheader' && $page1 == 'edit') { ?>
	<li class="">
		<a href="index.php?p=belowheader&amp;sp=edit&amp;ssp=<?php echo $page2; ?>">
			<?php echo $tlbh["bh_menu"]["bhm2"]; ?>
		</a>
		<span class="icon-thumbnail"><?php echo text_clipping_lower ($tlbh["bh_menu"]["bhm2"]); ?></span>
	</li>
<?php } ?>
<!-- END BELOWHEADER SECTION -->
