<span><?php echo $tlcanvas["socialbutton"]["s1"]; ?></span>
<div id="sollist-sharing"></div>

<?php
$stack      = array ();
$facebook   = "facebook: 'http://www.facebook.com/share.php?u=" . $_SERVER[ HTTP_HOST ] . $_SERVER[ REQUEST_URI ] . "'";
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

<script type="text/javascript">
	$(function () {
		$("#sollist-sharing").sollist({
			pixelsBetweenItems: <?php echo $jkv["md_mediaSize"] ?>,
			size: <?php echo $jkv["md_iconSize"] ?>,
			theme: '<?php echo $jkv["md_mediatheme"] ?>',
			hoverEffect: '<?php echo $jkv["md_mediahover"] ?>',
			profiles: { <?php echo implode (",", $stack); ?> }
		});
	});
</script>

<script type="text/javascript">
	(function ($) {
		/**
		 * jQuery function to prevent default anchor event and take the href * and the title to make a share pupup
		 *
		 * @param  {[object]} e           [Mouse event]
		 * @param  {[integer]} intWidth   [Popup width defalut 500]
		 * @param  {[integer]} intHeight  [Popup height defalut 400]
		 * @param  {[boolean]} blnResize  [Is popup resizeabel default true]
		 */
		$.fn.sollistPopup = function (e, intWidth, intHeight, blnResize) {

			// Prevent default anchor event
			e.preventDefault();

			// Set values for window
			intWidth = intWidth || '600';
			intHeight = intHeight || '700';
			strResize = (blnResize ? 'yes' : 'no');

			// Set title and open popup with focus on it
			var strTitle = ((typeof this.attr('title') !== 'undefined') ? this.attr('title') : 'Social Share'),
				strParam = 'width=' + intWidth + ',height=' + intHeight + ',resizable=' + strResize,
				objWindow = window.open(this.attr('href'), strTitle, strParam).focus();
		}

		/* ================================================== */

		$(document).ready(function ($) {
			$('.facebook').on("click", function (e) {
				$(this).sollistPopup(e);
			});
		});
	}(jQuery));
</script>