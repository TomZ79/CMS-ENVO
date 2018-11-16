<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if ($USR_IP_BLOCKED) { ?>

	<!-- IP USER BLOCKED -->
	<section class="pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="text-center">
						<h3><?=$USR_IP_BLOCKED?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php } else { ?>

	<!-- OFFLINE PAGE -->
	<section class="pt-5 pb-5">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="text-center">
						<h1><?=$tl["general_error"]["generror6"]?></h1>
						<p><?=$tl["general_error"]["generror7"]?></p>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php

}

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php';

?>