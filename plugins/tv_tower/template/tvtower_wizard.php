<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=tv-tower&amp;sp=setting'; ?>

  <div class="col-md-12" style="margin: 10px 0 50px 0;">

  <div class="row" style="margin-bottom: 20px">
    <div class="col-md-12">
      <div class="pull-left text-xs-center">
        <span><?php echo $tltt["tt_frontend_wizard"]["ttw"]; ?> <strong> <?php echo $COUNT_TVPROGRAM_ALL; ?></strong></span>
      </div>
      <div class="pull-right text-xs-center">
        <span><?php echo $tltt["tt_frontend_wizard"]["ttw1"]; ?> <strong> <?php echo $TIME_TVPROGRAM_ALL; ?></strong></span>
      </div>
    </div>
  </div>
  <hr>

<?php if (isset($JAK_TVTOWER) && is_array($JAK_TVTOWER)) { ?>

  <div class="row" style="margin-bottom: 20px">
    <div class="col-md-12">
      <div class="col-md-4">
        <div class="form-group">
          <label for="selectTrans" style="width: 200px;"><?php echo $tltt["tt_frontend_wizard"]["ttw2"]; ?></label>
          <select id="selectTrans" class="form-control" multiple="multiple">

            <?php
            // EN: Sort array by 'name' keys
            // CZ: Setřídění pole podle 'name'
            $JAK_TVTOWER = sort_array_mutlidim($JAK_TVTOWER, 'station ASC');

            foreach ($JAK_TVTOWER as $tt) {
              if ($tt['active']) {
                echo '<option value="' . $tt['id'] . '">' . $tt['station'] . ' - ' . $tt['name'] . '</option>';
              }
            }
            ?>

          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="selectChannel" style="width: 200px;"><?php echo $tltt["tt_frontend_wizard"]["ttw3"]; ?></label>
          <select id="selectChannel" class="" multiple="multiple"></select>
        </div>
      </div>
      <div class="col-md-4">
        <?php
        // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
        echo $Html->addButtonSubmit('search', $tltt["tt_frontend_button"]["ttbtn"], 'searchprogram', 'btn btn-info', array('style' => 'margin-top: 28px;'));
        ?>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <hr>
      <div id="bounceLoader">
        <div class="bounce-loader">
          <div class="bounce1"></div>
          <div class="bounce2"></div>
          <div class="bounce3"></div>
        </div>
      </div>
      <div id="resultData"></div>
    </div>
  </div>


<?php } else {
  // Pokud neexistuje žádný záznam s vysílači - bude zobrazeno chybové hlášení

  // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
  echo $Html->addDiv($tltt["tt_frontend_button"]["ttw4"], '', array('class' => 'alert alert-danger'));

} ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>