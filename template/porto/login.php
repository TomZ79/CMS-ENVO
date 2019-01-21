<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (!ENVO_USERID) { ?>

	<div class="featured-boxes">
		<div class="row">

			<div class="col-sm-6 offset-sm-3">

				<div id="SignInF" class="featured-box featured-box-primary text-left mt-5 rounded-0 active" style="display: block;">
					<div class="box-content rounded-0">
						<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3"><?= $tl["lform_text"]["lformt"] ?></h4>
						<form action="<?= $_SERVER['REQUEST_URI'] ?>" id="frmSignIn" method="post">
							<input type="hidden" name="frmSignIn" value="0"/>
							<div class="form-row">
								<div class="form-group col <?php if ($errorlo) echo "has-error"; ?>">
									<label><?= $tl["lform_text"]["lformt1"] ?></label>
									<input type="text" class="form-control form-control-md rounded-0" value="<?php if (isset($_REQUEST["loginusername"])) echo $_REQUEST["loginusername"]; ?>" name="signInUsername" id="signInUsername" placeholder="<?= $tl["placeholder"]["plc3"] ?>" data-msg-required="Zadejte uživatelské jméno" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col <?php if ($errorlo) echo "has-error"; ?>">
									<a class="lostPwd float-right" href="#">(<?= $tl["lform_text"]["lformt5"] ?>?)</a>
									<label><?= $tl["lform_text"]["lformt2"] ?></label>
									<input type="password" class="form-control form-control-md rounded-0" name="signInPassword" id="signInPassword" placeholder="<?= $tl["placeholder"]["plc4"] ?>" data-msg-required="Zadejte heslo" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-lg-6">
									<div class="form-check form-check-inline">
										<label for="rememberme" class="form-check-label">
											<input class="form-check-input" type="checkbox" id="rememberme" name="rememberme">
											<?= $tl["lform_text"]["lformt3"] ?>
										</label>
									</div>
								</div>
								<div class="form-group col-lg-6">
									<input type="submit" value="<?= $tl["button"]["btn8"] ?>" class="btn btn-primary btn-modern float-right border-0 rounded-0" id="loginBtn" name="loginBtn">
								</div>
							</div>
						</form>
					</div>
				</div>

				<div id="LostPwdF" class="featured-box featured-box-primary text-left mt-5 rounded-0" style="display: none;">
					<div class="box-content rounded-0">
						<h4 class="color-primary font-weight-semibold text-4 text-uppercase mb-3"><?= $tl["lform_text"]["lformt6"] ?></h4>

						<div class="alert alert-warning text-center">
							<a class="restoreSignIn" href="#"><?= $tl["lform_text"]["lformt8"] ?></a>
						</div>

						<?php if ($errorfp) { ?>
							<div class="alert alert-danger"><?= $errorfp["e"] ?></div>
						<?php } ?>

						<form action="<?= $_SERVER['REQUEST_URI'] ?>" id="frmLostPwd" method="post">
							<input type="hidden" name="frmLostPwd" value="0"/>
							<div class="form-row">
								<div class="form-group col <?php if ($errorfp) echo "has-error"; ?>">
									<label><?= $tl["lform_text"]["lformt7"] ?></label>
									<input type="text" class="form-control form-control-md rounded-0" value="" name="resetEmail" id="resetEmail" placeholder="<?= $tl["placeholder"]["plc5"] ?>" data-msg-required="Zadejte Vaši emailovou adresu" data-msg-email="Zadejte validní emailovou adresu" required>
								</div>
							</div>
							<div class="form-row">
								<div class="form-group col-lg-6">

								</div>
								<div class="form-group col-lg-6">
									<input type="submit" value="<?= $tl["button"]["btn10"] ?>" class="btn btn-primary btn-modern float-right border-0 rounded-0" name="resetBtn">
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>

		</div>
	</div>

<?php } else { ?>

	<div class="col-sm-8 offset-sm-2">

		<hr class="tall">
		<div class="text-center">
			<h1 class="small"><?= str_replace("%s", $ENVO_USERNAME, $tl["lpage_text"]["lpaget"]) ?></h1>
			<p class="lead"><?= $tl["lpage_text"]["lpaget1"] ?></p>
			<p class="mt-5">
				<a href="<?= $P_USR_LOGOUT ?>" class="btn btn-danger btn-block">
					<?= $tl["button"]["btn9"] ?>
				</a>
			</p>
		</div>
		<hr class="tall">

	</div>

<?php } ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>
