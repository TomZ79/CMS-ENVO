<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_header.php'; ?>

  <div class="row-fluid">
    <div class="col-sm-10 col-sm-offset-1">
      <form role="form" method="post" action="<?= ENVO_rewrite ::envoParseurl(ENVO_PLUGIN_VAR_INTRANET, 'house', 'searchdvbt2') ?>">
        <div class="col-sm-4 m-b-20">
          <button class="btn <?= ($ACTIVEBUTTON_CLASS1 ? $ACTIVEBUTTON_CLASS1 : 'btn-info') ?>" name="search_all" type="submit" style="width:100%;">Zobrazit všechny domy</button>
        </div>
        <div class="col-sm-4 m-b-20">
          <button class="btn <?= ($ACTIVEBUTTON_CLASS2 ? $ACTIVEBUTTON_CLASS2 : 'btn-info') ?>" name="searchdvbt2_yes" type="submit" style="width:100%;">Vyhledat domy s přípravou DVB-T2</button>
        </div>
        <div class="col-sm-4 m-b-20">
          <button class="btn <?= ($ACTIVEBUTTON_CLASS3 ? $ACTIVEBUTTON_CLASS3 : 'btn-info') ?>" name="searchdvbt2_no" type="submit" style="width:100%;">Vyhledat domy bez přípravy DVB-T2</button>
        </div>
      </form>
    </div>
  </div>

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
                <td><?= $h["id"] ?></td>
                <td>

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html -> addAnchor($h["parseurl"], $h["name"]);
                  ?>

                </td>
                <td>
                  <?= $h["street"] ?>
                </td>
                <td>
                  <?= $h["city"] ?>
                </td>
                <td class="text-center">

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  // EDIT
                  echo $Html -> addAnchor($h["parseurl"], '<i class="fas fa-eye"></i>', '', 'btn btn-info btn-mini', array ( 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tlint["int_frontend_icons"]["intficon"] ));
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
    echo $Html -> addDiv('Nejsou dostupná žádná data.', '', array ( 'class' => 'alert' ));
    ?>

  </div>

<?php } ?>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_footer.php'; ?>