<?php
if (!ENVO_USERID) { ?><?php if (isset($_SESSION['password_recover'])) {

	echo '<div class="alert bg-success"><h4>' . $tl['login']['l7'] . '</h4></div>';

} ?>
	<div class="loginF">
		<h3><?= $tl["general"]["g146"] ?></h3>
		<?php if ($errorlo) { ?>
			<div class="alert bg-info">
				<a class="lost-pwd" href="<?= $ENVO_FORGOT_PASS_LINK ?>"><i class="fa fa-share-alt"></i> <?= $tl["error"]["f"] ?>
				</a>
			</div>
		<?php }
		if ($errorlo) { ?>
			<div class="alert bg-danger">
				<?= $errorlo["e"] ?>
			</div>
		<?php } ?>
		<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
			<div class="form-group<?php if ($errorlo) echo " has-error"; ?>">
				<label class="control-label" for="username"><?= $tl["login"]["l1"] ?></label>
				<input type="text" name="envoU" id="username" class="form-control" value="<?= $_REQUEST["envoU"] ?>" placeholder="<?= $tl["login"]["l1"] ?>"/>
			</div>
			<div class="form-group<?php if ($errorlo) echo " has-error"; ?>">
				<label class="control-label" for="password"><?= $tl["login"]["l2"] ?></label>
				<input type="password" name="envoP" id="password" class="form-control" value="" placeholder="<?= $tl["login"]["l2"] ?>"/>
			</div>
			<div class="checkbox">
				<label><input type="checkbox" name="lcookies" value="1"> <?= $tl["notification"]["n7"] ?></label>
			</div>
			<button type="submit" name="login" class="btn btn-success btn-block"><?= $tl["general"]["g146"] ?></button>
		</form>
	</div><div class="forgotP">
		<h3><?= $tl["title"]["t14"] ?></h3>
		<div class="alert bg-warning">
			<a class="lost-pwd" href="#"><i class="fa fa-lightbulb-o"></i> <?= $tl["title"]["t16"] ?></a>
		</div>
		<?php if ($errorfp) { ?>
			<div class="alert bg-danger"><?= $errorfp["e"] ?></div><?php } ?>
		<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
			<div class="form-group<?php if ($errorfp) echo " has-error"; ?>">
				<label class="control-label" for="email"><?= $tl["login"]["l5"] ?></label>
				<input type="text" name="envoE" id="email" class="form-control" value="" placeholder="<?= $tl["login"]["l5"] ?>"/>
			</div>
			<button type="submit" name="forgotP" class="btn btn-info btn-block"><?= $tl["general"]["g178"] ?></button>
		</form>
	</div>

	<script>

    $(document).ready(function () {

      // Switch buttons from "Log In | Register" to "Close Panel" on click
      $(".lost-pwd").click(function (e) {
        e.preventDefault();
        $(".loginF").slideToggle();
        $(".forgotP").slideToggle();
      });

			<?php if ($errorfp) { ?>
      $(".loginF").hide();
      $(".forgotP").show();
			<?php } ?>

    });

	</script>

<?php } else { ?>
	<h3><?= str_replace("%s", $ENVO_USERNAME, $tl["general"]["g8"]) ?></h3><p>
		<a href="<?= $P_USR_LOGOUT ?>" class="btn btn-danger btn-block"><?= $tl["title"]["t6"] ?></a></p>
<?php } ?>