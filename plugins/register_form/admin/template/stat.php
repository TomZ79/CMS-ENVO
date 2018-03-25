<?php

$resrf   = $envodb->query('SELECT COUNT(*) as totalM FROM ' . DB_PREFIX . 'user');
$rwresrf = $resrf->fetch_assoc();

$resrf1   = $envodb->query('SELECT COUNT(*) as totalMW FROM ' . DB_PREFIX . 'user WHERE time > DATE_SUB(CURDATE(), INTERVAL 1 WEEK)');
$rwresrf1 = $resrf1->fetch_assoc();

$resrf2   = $envodb->query('SELECT COUNT(*) as totalMM FROM ' . DB_PREFIX . 'user WHERE time > DATE_SUB(CURDATE(), INTERVAL 4 WEEK)');
$rwresrf2 = $resrf2->fetch_assoc();

?>

<div class="box box-success">
  <div class="box-header">

    <?php
    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
    echo $Html->addTag('i', '', 'fa fa-users');
    echo $Html->addTag('h3', $tlrf["reg_box_title"]["regbt1"], 'box-title');
    ?>

  </div>
  <div class="box-body no-padding">
    <table class="table table-striped table-hover">
      <tr>
        <td><?=$tlrf["reg_box_content"]["regbc1"]?></td>
        <td><?=$rwresrf['totalM']?></td>
      </tr>
      <tr>
        <td><?=$tlrf["reg_box_content"]["regbc2"]?></td>
        <td><?=$rwresrf1['totalMW']?></td>
      </tr>
      <tr>
        <td><?=$tlrf["reg_box_content"]["regbc3"]?></td>
        <td><?=$rwresrf2['totalMM']?></td>
      </tr>
    </table>
  </div>
</div>