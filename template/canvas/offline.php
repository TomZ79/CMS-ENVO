<?php include_once APP_PATH . 'template/canvas/header.php'; ?>

	<div class="container clearfix">

		<div class="heading-block center nobottomborder">
			<h1>Web je momentálně nedostupný</h1>
			<span>Vraťtě se prosím za okamžik.</span>
		</div>

		<div class="col_one_third topmargin">
			<div class="feature-box fbox-center fbox-light fbox-plain">
				<div class="fbox-icon">
					<a href="#"><i class="icon-warning-sign"></i></a>
				</div>
				<h3>Proč je web nedostupný?</h3>
				<p>Z důvodu vylepšování našich poskytovaných služeb, dochází k pravidelné údržbě.</p>
			</div>
		</div>

		<div class="col_one_third topmargin">
			<div class="feature-box fbox-center fbox-light fbox-plain">
				<div class="fbox-icon">
					<a href="#"><i class="icon-time"></i></a>
				</div>
				<h3>Kdy bude web dostupný?</h3>
				<p>Údržba a instalace nových rozhraní trvá zpravidla v rozmezí 10 - 20 minut.</p>
			</div>
		</div>

		<div class="col_one_third topmargin col_last">
			<div class="feature-box fbox-center fbox-light fbox-plain">
				<div class="fbox-icon">
					<a href="#"><i class="icon-email3"></i></a>
				</div>
				<h3>Potřebujete naší podporu?</h3>
				<p>Kontaktujte nás prosím na telefonním čísle <strong>777 192 315</strong></p>
			</div>
		</div>

	</div>

<?php if ($USR_IP_BLOCKED) { ?>
	<div class="alert bg-info">
		<p><?php echo $USR_IP_BLOCKED; ?></p>
	</div>
<?php } ?>

<?php include_once APP_PATH . 'template/canvas/footer.php'; ?>