<script type="text/javascript">
	$(function () {
		$("#sollist-sharing").sollist({
			pixelsBetweenItems: <?php echo $jkv["md_mediaSize"] ?>,
			size: <?php echo $jkv["md_iconSize"] ?>,
			theme: '<?php echo $jkv["md_mediatheme"] ?>',
			hoverEffect: '<?php echo $jkv["md_mediahover"] ?>',
			profiles: {
				facebook: '',
				googleplus: '',
				instagram: '',
				twitter: '',
				youtube: '',
				vimeo: '',
				email: '',
			}
		});
	});
</script>