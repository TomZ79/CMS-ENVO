<?php

switch ($section) {
	case 'DEFAULT':

		break;
	case 'A':

		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</section>';

		break;
	case 'B':

		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</div>';
		echo '</section>';

		break;
	default:

}

?>

</div>
<!-- END MAIN CONTENT -->

</div><!-- END BODY -->

<!-- End Document  ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- Necessary main scripts  -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.js"></script>
<script src="/assets/plugins/bootstrap-notify/bootstrap-notify.min.js?=v3.1.5" async defer></script>
<!-- Theme script -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/popper.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/bootstrap.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/bootstrap-select.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.fancybox.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/isotope.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/owl.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/appear.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/wow.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/lazyload.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/scrollbar.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/TweenMax.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/swiper.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/jquery.ajaxchimp.min.js"></script>
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/parallax-scroll.js"></script>

<!-- Theme Base, Components and Settings -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/script.js"></script>

<!-- Theme Function -->
<script src="/template/<?= ENVO_TEMPLATE ?>/assets/js/theme.custom.js"></script>
<script src="/assets/js/generated_js.php"></script>
<script>
  envoWeb.envo_forgotlogin = '<?= $FORGOT_LOGIN?>';
</script>

<!-- EU Cookies -->
<?php if ($setting["eucookie_enabled"] == 1) {
	include APP_PATH . '/assets/js/eu-cookies.php';
} ?>

</body></html>