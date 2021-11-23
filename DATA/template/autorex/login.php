<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (!ENVO_USERID) { ?>

	<section class="mt-5 mb-5">
		<div class="auto-container">
			<div class="row">
				<div class="col-sm-6 offset-sm-3">
					<div id="SignInF" class="mt-5">
						<div class="contact-form">
							<h3 class="text-uppercase mb-3"><?= $PAGE_TITLE ?></h3>
							<form action="<?= $_SERVER['REQUEST_URI'] ?>" id="frmSignIn" method="post" autocomplete="off">
								<input type="hidden" name="frmSignIn" value="0"/>
								<div class="form-row">
									<div class="form-group col-md-12 <?php if ($errorlo) echo "has-error"; ?>">
										<label class="text"><?= $tl["lform_text"]["lformt1"] ?></label>
										<input type="text" class="rounded-0" value="<?php if (isset($_REQUEST["loginusername"])) echo $_REQUEST["loginusername"]; ?>" name="signInUsername" id="signInUsername" placeholder="<?= $tl["placeholder"]["plc3"] ?>" data-msg-required="Zadejte uživatelské jméno" required>
									</div>
								</div>

								<div class="form-row">
									<div class="form-group col-md-12 <?php if ($errorlo) echo "has-error"; ?>">
										<a class="lostPwd float-right" href="#">(<?= $tl["lform_text"]["lformt5"] ?>?)</a>
										<label class="text"><?= $tl["lform_text"]["lformt2"] ?></label>
										<input type="password" class="rounded-0" name="signInPassword" id="signInPassword" placeholder="<?= $tl["placeholder"]["plc4"] ?>" data-msg-required="Zadejte heslo" required>
									</div>
								</div>

								<div class="form-row">
									<div class="form-group col-md-6">
										<div class="form-check form-check-inline">
											<label for="rememberme" class="form-check-label">
												<input class="form-check-input" type="checkbox" id="rememberme" name="rememberme">
												<?= $tl["lform_text"]["lformt3"] ?>
											</label>
										</div>
									</div>

									<div class="form-group col-md-6">
										<button type="submit" class="theme-btn btn-style-one float-right" id="loginBtn" name="loginBtn"  data-loading-text="Please wait...">
											<span><?= $tl["button"]["btn8"] ?></span>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>

					<div id="LostPwdF" class="mt-5" style="display: none;">
						<h3 class="text-uppercase mb-3"><?= $tl["lform_text"]["lformt6"] ?></h3>
						<div class="contact-form">
							<?php if ($errorfp) { ?>
								<div class="alert alert-danger"><?= $errorfp["e"] ?></div>
							<?php } ?>
							<form action="<?= $_SERVER['REQUEST_URI'] ?>" id="frmLostPwd" method="post">
								<input type="hidden" name="frmLostPwd" value="0"/>
								<div class="form-row">
									<div class="form-group col-md-12 <?php if ($errorfp) echo "has-error"; ?>">
										<label class="text"><?= $tl["lform_text"]["lformt7"] ?></label>
										<input type="text" class="rounded-0" value="" name="resetEmail" id="resetEmail" placeholder="<?= $tl["placeholder"]["plc5"] ?>" data-msg-required="Zadejte Vaši emailovou adresu" data-msg-email="Zadejte validní emailovou adresu" required>
									</div>
								</div>

								<div class="form-row">
									<div class="form-group col-lg-6">
										<div class="text-center">
											<a class="theme-btn btn-style-one float-left restoreSignIn" href="#"><?= $tl["lform_text"]["lformt8"] ?></a>
										</div>
									</div>
									<div class="form-group col-lg-6">
										<button type="submit" class="theme-btn btn-style-one float-right" name="resetBtn"  >
											<span><?= $tl["button"]["btn10"] ?></span>
										</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php } else { ?>

	<section class="mt-5 mb-5">
		<div class="auto-container">
			<div class="row">
				<div class="col-sm-8 offset-sm-2">

					<hr>
					<div class="text-center">
						<h1><?= str_replace("%s", $ENVO_USERNAME, $tl["lpage_text"]["lpaget"]) ?></h1>
						<p class="text"><?= $tl["lpage_text"]["lpaget1"] ?></p>
						<p class="mt-5">
							<a href="<?= $P_USR_LOGOUT ?>" class="theme-btn btn-style-one"><?= $tl["button"]["btn9"] ?></a>
						</p>
					</div>
					<hr>

				</div>
			</div>
		</div>
	</section>

<?php } ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>
