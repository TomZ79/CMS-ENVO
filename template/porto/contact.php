<?php if (ENVO_CONTACT_FORM) { ?>
	<?php if ($ENVO_SHOW_C_FORM_NAME['showtitle'] == 1) echo '<h3>' . $ENVO_SHOW_C_FORM_NAME['title'] . '</h3>'; ?>
	<?php if (isset($errorsA) && !empty($errorsA)) { ?>

		<div class="alert bg-danger fade in">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<?php foreach ($errorsA as $i) {
				echo $i;
			} ?>
		</div>

	<?php }
	if (!empty($_SESSION["envo_thankyou_msg"])) { ?>
		<div class="alert bg-success">
			<?php echo $_SESSION['envo_thankyou_msg']; ?>
		</div>
	<?php } ?>

	<form class="envo-ajaxform cFrom" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>"
		enctype="multipart/form-data">
		<div class="envo-thankyou"></div>
		<?php echo $ENVO_SHOW_C_FORM; ?>

		<input type="hidden" name="contactF" value="1"/>

		<div class="well well-sm">
			<?php echo $tl["contact"]["n"]; ?> <?php echo $tl["contact"]["n1"]; ?> <i
				class="fa fa-star"></i> <?php echo $tl["contact"]["n2"]; ?>
		</div>

		<button type="submit" class="btn btn-color btn-block envo-submit"><?php echo $tl["contact"]["s"]; ?></button>

	</form>
	<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/contact.js"></script>
	<script type="text/javascript">

		<?php if ($setting["hvm"]) { ?>
		jQuery(document).ready(function () {
			jQuery(".cFrom").append('<input type="hidden" name="<?php echo $random_name;?>" value="<?php echo $random_value;?>" />');
		});
		<?php } ?>

		if ($("input:file").length > 0) {
			$("form").removeClass("envo-ajaxform");
		}

		envoWeb.envo_submit = "<?php echo $tl['general']['g10'];?>";
		envoWeb.envo_submitwait = "<?php echo $tl['general']['g99'];?>";

	</script>

<?php } ?>