<h4><?php echo $tl["comments"]["com1"]; ?></h4>

<?php if ($errors) { ?>

	<div class="alert bg-danger fade in">
		<button type="button" class="close" data-dismiss="alert">×</button>
		<?php if (isset($errors["co_name"])) echo $errors["co_name"];
		if (isset($errors["co_email"])) echo $errors["co_email"];
		if (isset($errors["co_url"])) echo $errors["co_url"];
		if (isset($errors["userpost"])) echo $errors["userpost"];
		if (isset($errors["co_human"])) echo $errors["co_human"]; ?>
	</div>

<?php } ?>

<form role="form" class="envo-ajaxform cFrom" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

	<div class="envo-thankyou"></div>

	<?php if (!ENVO_USERID) { ?>

		<div class="form-group">
			<label class="control-label" for="co_name"><?php echo $tl["contact"]["c1"]; ?> <i class="fa fa-star"></i></label>
			<input type="text" name="co_name" id="co_name" class="form-control" value="<?php if (isset($_REQUEST["name"])) echo $_REQUEST["name"]; ?>"/>
		</div>
		<div class="form-group">
			<label class="control-label" for="co_email"><?php echo $tl["contact"]["c2"]; ?> <i class="fa fa-star"></i></label>
			<input type="text" name="co_email" id="co_email" class="form-control" value="<?php if (isset($_REQUEST["email"])) echo $_REQUEST["email"]; ?>"/>
		</div>
		<div class="form-group">
			<label class="control-label" for="co_url"><?php echo $tl["contact"]["c17"]; ?></label>
			<input type="text" name="co_url" id="co_url" class="form-control" value="<?php if (isset($_REQUEST["url"])) echo $_REQUEST["url"]; ?>"/>
		</div>

	<?php } else { ?>

		<input type="hidden" name="co_name" value="<?php echo $ENVO_USERNAME; ?>"/>

	<?php } ?>

	<div class="form-group">
		<label class="control-label" for="userpost"><?php echo $tl["cmsg"]["c7"]; ?> <i class="fa fa-star"></i></label>
    <textarea name="userpost" class="form-control userpost" id="userpost" rows="8"><?php if (isset($_REQUEST["userpost"])) echo $_REQUEST["userpost"]; ?></textarea>
	</div>

	<input type="hidden" name="comanswerid" id="comanswerid" value=""/>
	<input type="hidden" name="uformextraid" id="uformextraid" value="<?php echo $ENVO_UFORM_EXTRA; ?>"/>
	<input type="hidden" name="userPost" value="1"/>
	<button type="submit" class="btn btn-color btn-block envo-submit"><?php echo $tl["button"]["btn3"]; ?></button>
	<div class="clearfix"></div>
</form>
