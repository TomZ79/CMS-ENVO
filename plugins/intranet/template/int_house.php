<?php include_once $BASE_PLUGIN_URL . 'int_header.php'; ?>

<?php if (!empty($ENVO_HOUSE_ALL) && is_array($ENVO_HOUSE_ALL)) { ?>

  <div class="card bg-white m-b">
    <div class="card-header">
      Seznam Bytových Domů
    </div>
    <div class="card-block">
      <div class="table-responsive">
        <table class="table table-bordered table-striped m-b-0">
          <thead>
          <tr>
            <th>#</th>
            <th>Název</th>
            <th>Ulice</th>
            <th>Město</th>
            <th></th>
          </tr>
          </thead>
          <tbody>

          <?php foreach ($ENVO_HOUSE_ALL as $h) { ?>
            <tr>
              <td><?php echo $h["id"]; ?></td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor($h["parseurl"], $h["name"]);
                ?>

              </td>
              <td>
                <?php echo $h["street"];?>
              </td>
              <td>
                <?php echo $h["city"];?>
              </td>
              <td class="text-center">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                // EDIT
                echo $Html->addAnchor($h["parseurl"], '<i class="fa fa-eye"></i>', '', 'btn btn-info btn-sm');
                ?>

              </td>
            </tr>
          <?php } ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>

<?php } else { ?>

  <div class="col-md-12">

    <?php
    // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
    echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
    ?>

  </div>

<?php } ?>

<?php include_once $BASE_PLUGIN_URL . 'int_footer.php'; ?>