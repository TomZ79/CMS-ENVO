<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_header.php'; ?>

	<div class="flex-fill">
		<div class="text-center mb-3">

			<?php
			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('h1', '404', 'error-title');

			// Add Html Element -> startTag (Arguments: tag, optional assoc. array)
			echo $Html -> startTag('div', array ('class' => 'error-content'));

			// Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
			echo $Html -> addTag('h1', $Html -> addTag('i', '', 'icon-warning22 text-warning mr-2', array('style' => 'font-size: 30px;')) . 'Oops! Stránka nenalezena.', 'font-weight-bold');
			echo $Html -> addTag('p', str_replace("%s", BASE_URL . ENVO_PLUGIN_VAR_INTRANET2, 'Požadovaná stránka, kterou hledáte nebyla nalezena. Můžete se vrátit zpět na <a href="%s">úvodní stránku</a>'));

			// Add Html Element -> endTag (Arguments: tag)
			echo $Html -> endTag('div');
			?>

		</div>
	</div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int2_footer.php'; ?>