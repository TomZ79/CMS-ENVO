<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header_blank.php';

if ($USR_IP_BLOCKED) { ?>

	<!-- IP USER BLOCKED -->
	<section class="pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col text-center">
					<hr class="tall">
					<h1 class="small text-uppercase"><?= $USR_IP_BLOCKED ?></h1>
					<hr class="tall">
				</div>
			</div>
		</div>
	</section>

<?php } else { ?>

	<!--Comming Soon-->
	<section class="comming-soon" style="background-image:url(http://html.tonatheme.com/2020/Autorex/assets/images/background/bg-6.jpg)">
		<div class="auto-container">
			<div class="content">
				<h1>Offline</h1>
				<h2><?= $tl["general_error"]["generror6"] ?></h2>
				<div class="text"><?= $tl["general_error"]["generror7"] ?></div>
			</div>
		</div>
	</section>

	<?php

}

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer_blank.php';

?>