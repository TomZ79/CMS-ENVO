<?php
$stack      = array ();
$facebook   = "facebook: 'http://www.facebook.com/share.php?u=" . $_SERVER[ HTTP_HOST ] . "'";
$googleplus = "googleplus: 'https://plusone.google.com/_/+1/confirm?hl=en&url=" . $_SERVER[ HTTP_HOST ] . "'";
$instagram  = "instagram: 'http://xxx.xx'";
$twitter    = "twitter: 'https://twitter.com/share?url=" . $_SERVER[ HTTP_HOST ] . "'";
$youtube    = "youtube: 'http://xxx.xx'";
$vimeo      = "vimeo: 'http://xxx.xx'";
$email      = "email: 'mailto:?subject=|t|&body=" . $_SERVER[ HTTP_HOST ] . "'";

if ($jkv["md_facebook"] == 1) array_push ($stack, $facebook);
if ($jkv["md_googleplus"] == 1) array_push ($stack, $googleplus);
if ($jkv["md_instagram"] == 1) array_push ($stack, $instagram);
if ($jkv["md_twitter"] == 1) array_push ($stack, $twitter);
if ($jkv["md_youtube"] == 1) array_push ($stack, $youtube);
if ($jkv["md_vimeo"] == 1) array_push ($stack, $vimeo);
if ($jkv["md_email"] == 1) array_push ($stack, $email);
?>

<script src="/assets/plugins/jquery-sollist/jquery.sollist.min.js"></script>
<script type="text/javascript">
	$(function () {
		$("#sollist-sharing").sollist({
			pixelsBetweenItems: <?php echo $jkv["md_mediaSize"] ?>,
			size: <?php echo $jkv["md_iconSize"] ?>,
			theme: '<?php echo $jkv["md_mediatheme"] ?>',
			hoverEffect: '<?php echo $jkv["md_mediahover"] ?>',
			profiles: { <?php echo implode (",", $stack); ?> },
			itemClass: 'pop'
		});
	});
</script>