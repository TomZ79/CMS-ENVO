<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=program-offer&amp;sp=setting'; ?>

  <div class="col-md-12" style="margin: 10px 0 50px 0;">

    <div class="row" style="margin-bottom: 20px">
      <div class="col-md-12">
        <div class="pull-left">
          <span>Celkový počet vysílaných programů: <strong> <?php echo $COUNT_TVPROGRAM_ALL; ?></strong></span>
        </div>
        <div class="pull-right">
          <span>Poslední aktualizace: <strong> <?php echo $TIME_TVPROGRAM_ALL; ?></strong></span>
        </div>
      </div>
    </div>
    <hr>

    <?php


    ?>

  </div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>