<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'onlinetv_header.php'; ?>

	<section class="block-wrapper">
		<div class="container">
			<div class="row">

				<div class="col-lg-12">
					<div class="error-page text-center col ts-grid-box">
						<div class="error-code">
							<h2>
								<strong>404</strong>
							</h2>
						</div>
						<div class="error-message">
							<h3>Sorry! The Page Not Found ;(</h3>
						</div>
						<div class="error-body">
							<h4>The Link You Followed Probably Broken or the page has been removed.</h4>
							<a href="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_ONLINE_TV) ?>" class="btn btn-primary">Back to Home</a>
						</div>
					</div>
				</div>

			</div>
		</div>
	</section>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'onlinetv_footer.php'; ?>