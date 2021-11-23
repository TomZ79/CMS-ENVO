<?php include "header.php"; ?>

  <div class="col-sm-12 kv-main">

    <?php
    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
    echo $Html->addInput('file', 'images[]', '', 'images', '', array('multiple' => 'multiple'));
    ?>

  </div>

<?php include "footer.php"; ?>