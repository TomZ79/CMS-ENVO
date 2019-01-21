<?php
$stack      = array ();
$facebook   = "facebook: 'http://www.facebook.com/share.php?u=" . $_SERVER[HTTP_HOST] . "'";
$googleplus = "googleplus: 'https://plusone.google.com/_/+1/confirm?hl=en&url=" . $_SERVER[HTTP_HOST] . "'";
$instagram  = "instagram: 'http://xxx.xx'";
$twitter    = "twitter: 'https://twitter.com/share?url=" . $_SERVER[HTTP_HOST] . "'";
$youtube    = "youtube: 'http://xxx.xx'";
$vimeo      = "vimeo: 'http://xxx.xx'";
$email      = "email: 'mailto:?subject=|t|&body=" . $_SERVER[HTTP_HOST] . "'";

if ($setting["md_facebook"] == 1) array_push($stack, $facebook);
if ($setting["md_googleplus"] == 1) array_push($stack, $googleplus);
if ($setting["md_instagram"] == 1) array_push($stack, $instagram);
if ($setting["md_twitter"] == 1) array_push($stack, $twitter);
if ($setting["md_youtube"] == 1) array_push($stack, $youtube);
if ($setting["md_vimeo"] == 1) array_push($stack, $vimeo);
if ($setting["md_email"] == 1) array_push($stack, $email);
?>

<script src="/assets/plugins/jquery-sollist/jquery.sollist.min.js"></script>
<script>
	$(function () {
		$("#sollist-sharing").sollist({
			pixelsBetweenItems: <?=$setting["md_mediaSize"]?>,
			size: <?=$setting["md_iconSize"]?>,
			theme: '<?=$setting["md_mediatheme"]?>',
			hoverEffect: '<?=$setting["md_mediahover"]?>',
			profiles: { <?=implode(",", $stack)?> },
			itemClass: 'pop'
		});
	});
</script>