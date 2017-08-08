<?php include_once $BASE_PLUGIN_URL . 'int_header.php'; ?>

  <div class="col-md-6 text-center error-page">

    <?php
    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
    echo $Html->addTag('h2', '404', 'headline text-warning');

    // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
    echo $Html->startTag('div', array('class' => 'error-content'));

    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
    echo $Html->addTag('h3', $Html->addTag('i', '', 'fa fa-warning text-warning m-r') . 'Oops! Stránka nenalezena.');
    echo $Html->addTag('p', str_replace("%s", BASE_URL . JAK_PLUGIN_VAR_INTRANET, 'Požadovaná stránka, kterou hledáte nebyla nalezena. Můžete se vrátit zpět na <a href="%s">úvodní stránku</a>'));

    // Add Html Element -> endTag (Arguments: tag)
    echo $Html->endTag('div');
    ?>

  </div>

<?php include_once $BASE_PLUGIN_URL . 'int_footer.php'; ?>