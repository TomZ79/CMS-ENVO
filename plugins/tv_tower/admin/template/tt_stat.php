<?php

// EN: Count of all exports in DB
// CZ: Celkový počet exportů v DB
$resexh   = $envodb->query('SELECT COUNT(*) as totalM FROM ' . DB_PREFIX . 'tvtowerexporthistory');
$rwresexh = $resexh->fetch_assoc();

// EN: Count of exports for last 1 month
// CZ: Počet exportů za poslední měsíc
$resexh1   = $envodb->query('SELECT COUNT(*) as totalMM FROM ' . DB_PREFIX . 'tvtowerexporthistory WHERE time > DATE_SUB(CURDATE(), INTERVAL 4 WEEK)');
$rwresexh1 = $resexh1->fetch_assoc();

// EN: Get data from 'tvtowerexporthistory'
// CZ: Získání dat z 'tvtowerexporthistory'
$resexh2 = $envodb->query('SELECT email, exportname, time FROM ' . DB_PREFIX . 'tvtowerexporthistory WHERE time > DATE_SUB(CURDATE(), INTERVAL 4 WEEK)');
while ($rwresexh2 = $resexh2->fetch_assoc()) {
  // EN: Insert each record into array
  // CZ: Vložení získaných dat do pole
  $tt_envodata[] = array('email' => $rwresexh2['email'], 'exportname' => $rwresexh2['exportname'], 'time' => $rwresexh2['time']);
}

?>

<div class="box box-success">
  <div class="box-header">

    <?php
    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
    echo $Html->addTag('i', '', 'pg-download mr-1');
    echo $Html->addTag('h3', 'Statistika TV Tower', 'box-title');
    ?>

  </div>
  <div class="box-body no-padding">
    <table class="table table-striped table-hover">
      <tr>
        <td>Celkový počet exportů</td>
        <td><?=$rwresexh['totalM']?></td>
      </tr>
      <tr>
        <td>Počet exportů za posledních 30 dnů</td>
        <td><?=$rwresexh1['totalMM']?></td>
      </tr>
    </table>
    <div>
      <h5 class="m-l-30">Export souborů za přechozích 30 dnů</h5>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-statis-200">
        <thead>
        <tr>
          <th>Uživatel</th>
          <th>Název Exportovaného Souboru</th>
          <th>Datum stažení</th>
        </tr>
        </thead>
        <tbody>

        <?php if (isset($tt_envodata)) foreach ($tt_envodata as $tte) { ?>

          <tr>
            <td><?=$tte["email"]?></td>
            <td><?=$tte["exportname"]?></td>
            <td><?=$tte["time"]?></td>
          </tr>
        <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>