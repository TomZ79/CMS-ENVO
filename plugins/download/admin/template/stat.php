<?php

// EN: Count of all download file in DB
// CZ: Celkový počet souborů v DB
$resdlh   = $envodb -> query('SELECT COUNT(*) as totalM FROM ' . DB_PREFIX . 'download');
$rwresdlh = $resdlh -> fetch_assoc();

// EN: Count of download file for last 1 week
// CZ: Počet souborů za poslední týden
$resdlh1   = $envodb -> query('SELECT COUNT(*) as totalMW FROM ' . DB_PREFIX . 'download WHERE time > DATE_SUB(CURDATE(), INTERVAL 1 WEEK)');
$rwresdlh1 = $resdlh1 -> fetch_assoc();

// EN: Count of download file for last 1 month
// CZ: Počet souborů za poslední měsíc
$resdlh2   = $envodb -> query('SELECT COUNT(*) as totalMM FROM ' . DB_PREFIX . 'download WHERE time > DATE_SUB(CURDATE(), INTERVAL 4 WEEK)');
$rwresdlh2 = $resdlh2 -> fetch_assoc();

// EN: Get data from 'downloadhistory'
// CZ: Získání dat z 'downloadhistory'
$resdlh3 = $envodb -> query('SELECT fileid, email, filename, time FROM ' . DB_PREFIX . 'downloadhistory WHERE time > DATE_SUB(CURDATE(), INTERVAL 4 WEEK)');
while ($rwresdlh3 = $resdlh3 -> fetch_assoc()) {
  // EN: Insert each record into array
  // CZ: Vložení získaných dat do pole
  $dl_envodata[] = array ( 'fileid' => $rwresdlh3['fileid'], 'email' => $rwresdlh3['email'], 'filename' => $rwresdlh3['filename'], 'time' => $rwresdlh3['time'] );
}

?>

<div class="box box-success">
  <div class="box-header">

    <?php
    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
    echo $Html -> addTag('i', '', 'pg-download mr-1');
    echo $Html -> addTag('h3', $tld["downl_box_title"]["downlbt14"], 'box-title');
    ?>

  </div>
  <div class="box-body no-padding">
    <table class="table table-striped table-hover">
      <tr>
        <td><?= $tld["downl_box_content"]["downlbc53"] ?></td>
        <td><?= $rwresdlh['totalM'] ?></td>
      </tr>
      <tr>
        <td><?= $tld["downl_box_content"]["downlbc54"] ?></td>
        <td><?= $rwresdlh1['totalMW'] ?></td>
      </tr>
      <tr>
        <td><?= $tld["downl_box_content"]["downlbc55"] ?></td>
        <td><?= $rwresdlh2['totalMM'] ?></td>
      </tr>
    </table>
    <div>
      <h5 class="m-l-30"><?= $tld["downl_box_content"]["downlbc56"] ?></h5>
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover table-statis-200">
        <thead>
        <tr>
          <th><?= $tld["downl_box_table"]["downltb10"] ?></th>
          <th><?= $tld["downl_box_table"]["downltb11"] ?></th>
          <th><?= $tld["downl_box_table"]["downltb12"] ?></th>
          <th><?= $tld["downl_box_table"]["downltb13"] ?></th>
          <th><?= $tld["downl_box_table"]["downltb14"] ?></th>
        </tr>
        </thead>
        <tbody>

        <?php
        if (isset($dl_envodata)) foreach ($dl_envodata as $dle) {
          $resdl   = $envodb -> query('SELECT title FROM ' . DB_PREFIX . 'download WHERE id=' . $dle["fileid"]);
          $rwresdl = $resdl -> fetch_assoc();
          ?>

          <tr>
            <td><?= $dle["fileid"] ?></td>
            <td><?= $rwresdl["title"] ?></td>
            <td><?= $dle["email"] ?></td>
            <td><?= $dle["filename"] ?></td>
            <td><?= $dle["time"] ?></td>
          </tr>
        <?php } ?>

        </tbody>
      </table>
    </div>
  </div>
</div>