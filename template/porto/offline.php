<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if ($USR_IP_BLOCKED) { ?>

	<!-- IP USER BLOCKED -->
	<section class="pt-small pb-small dark-color">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="text-center">
						<h3 class="no-margin"><?=$USR_IP_BLOCKED?></h3>
					</div>
				</div>
			</div>
		</div>
	</section>

<?php } else { ?>

	<!-- OFFLINE PAGE -->
	<section class="pt-large pb-large light-color">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
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