<?php include "header.php"; ?>

	<div class="login-wrapper ">
		<!-- START Login Background Pic Wrapper-->
		<div class="bg-pic">
			<!-- START Background Pic-->
			<img src="assets/img/demo/broadband_in_space.jpg" data-src="assets/img/demo/broadband_in_space.jpg" data-src-retina="assets/img/demo/broadband_in_space.jpg" alt="" class="lazy">
			<!-- END Background Pic-->
			<!-- START Background Caption-->
			<div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
				<h2 class="semi-bold text-white">
					<?php echo $tl["log_in"]["login9"]; ?>
				</h2>
				<p class="small">
					<?php echo $tl["log_in"]["login10"]; ?>
				</p>
			</div>
			<!-- END Background Caption-->
		</div>
		<!-- END Login Background Pic Wrapper-->
		<!-- START Login Right Container-->
		<div class="login-container bg-white">
			<div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
				<img src="assets/img/logo.png" alt="logo" data-src="assets/img/logo.png" data-src-retina="assets/img/logo_2x.png" width="78" height="22">

				<div class="loginF p-t-35">
					<h4 class=""><?php echo $tl["log_in"]["login"]; ?></h4>
					<form id="form-login" class="p-t-15" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
						<div class="form-group form-group-default">
							<label><?php echo $tl["log_in"]["login1"]; ?></label>
							<div class="controls">

								<?php
								// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
								echo $htmlE->addInput ('text', 'username', 'username', 'form-control', '', '', array ('placeholder' => $tl["placeholder"]["p10"], 'required' => 'required'));
								?>

							</div>
						</div>
						<div class="form-group form-group-default">
							<label><?php echo $tl["log_in"]["login2"]; ?></label>
							<div class="controls">

								<?php
								// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
								echo $htmlE->addInput ('password', 'password', 'password', 'form-control', '', '', array ('placeholder' => $tl["placeholder"]["p11"], 'required' => 'required'));
								?>

							</div>
						</div>
						<div class="col-md-6 col-xs-6 no-padding">
							<div class="checkbox check-success">
								<input type="checkbox" name="lcookies" id="remember">
								<label for="remember"><?php echo $tl["log_in"]["login3"]; ?></label>
							</div>
						</div>
						<div class="col-md-6 col-xs-6 no-padding text-right">
							<a href="#" class="lost-pwd"><?php echo $tl["log_in"]["login4"]; ?></a>
						</div>
						<input type="hidden" name="action" value="login"/>
						<button type="submit" name="logID" class="btn btn-primary btn-cons m-t-10"><?php echo $tl["button"]["btn28"]; ?></button>
					</form>
				</div>

				<div class="forgotP p-t-35 hide">
					<h4><?php echo $tl["log_in"]["login6"]; ?></h4>
					<form id="form-email" class="p-t-15" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
						<div class="form-group form-group-default">
							<label><?php echo $tl["log_in"]["login7"]; ?></label>
							<div class="controls">

								<?php
								// Add Html Element -> Input (Arguments: type, name, id, class, value, checked-only for radio input)
								echo $htmlE->addInput ('email', 'email', 'email', 'form-control', '', '', array ('placeholder' => $tl["placeholder"]["p12"], 'required' => 'required'));
								?>

							</div>
						</div>
						<button type="submit" name="forgotP" class="btn btn-info btn-block m-t-20"><?php echo $tl["button"]["btn26"]; ?></button>
					</form>
					<hr>
					<button class="btn btn-block btn-warning lost-pwd" type="button">
						<span class="pull-left"><i class="fa fa-lightbulb-o"></i></span>
						<span class="bold"><?php echo $tl["button"]["btn27"]; ?></span>
					</button>
				</div>

				<!--END Login Form-->
				<div class="pull-bottom sm-pull-bottom">
					<div class="m-b-30 p-r-80 sm-m-t-20 sm-p-r-15 sm-p-b-20 clearfix">
						<div class="col-sm-12 no-padding m-t-10">
							<a href="<?php echo BASE_URL_ORIG; ?>" class="back-to-home">
								<i class="fa  fa-chevron-left m-r-10" aria-hidden="true"></i>
								<?php echo $tl["log_in"]["login8"]; ?>
							</a>
						</div>
					</div>
				</div>

			</div>
		</div>
		<!-- END Login Right Container-->
	</div>

<?php include "footer.php"; ?>