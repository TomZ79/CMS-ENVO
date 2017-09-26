<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_header.php'; ?>

<?php if (!empty($ENVO_HOUSE_ALL) && is_array($ENVO_HOUSE_ALL)) { ?>

  <div class="row-fluid">
    <div class="span12">
      <div class="grid simple ">
        <div class="grid-title">
          <h4>Seznam Bytových Domů</h4>
          <div class="tools">
            <a href="javascript:;" class="collapse"></a>
            <a href="javascript:;" class="remove"></a>
          </div>
        </div>
        <div class="grid-body ">
          <table class="table table-striped table-hover m-b-10" id="datatable">
            <thead>
            <tr>
              <th class="no-sort">#</th>
              <th>Název</th>
              <th>Ulice</th>
              <th>Město</th>
              <th class="no-sort"></th>
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
                  echo $Html->addAnchor($h["parseurl"], '<i class="fa fa-eye"></i>', '', 'btn btn-info btn-mini');
                  ?>

                </td>
              </tr>
            <?php } ?>

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

<?php } else { ?>

  <div class="col-md-12">

    <?php
    // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
    echo $Html->addDiv('Nejsou dostupná žádná data.', '', array('class' => 'alert'));
    ?>

  </div>

<?php } ?>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_footer.php'; ?>