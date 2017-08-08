<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: Checking of some page was successful
// CZ: Kontrola některé stránky byla úspěšná
if ($page2 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["notification"]["n7"];?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

<?php
// EN: Remove records from DB was successful
// CZ: Odstranění záznamu z DB bylo úspěšné
if ($page3 == "s1") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo $tl["notification"]["n2"]; ?>'
      }, {
        // settings
        type: 'info',
        delay: 5000,
        timer: 3000
      });
    }, 2000);
  </script>
<?php } ?>

<?php
// EN: Checking of some page was unsuccessful
// CZ: Kontrola některé stránky byla neúspěšná
if ($page2 == "e" || $page2 == "ene") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo($page2 == "e" ? $tl["general_error"]["generror1"] : $tl["general_error"]["generror2"]);?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

<!-- Fixed Button for save form -->
<div class="savebutton-medium hidden-xs">

  <?php
  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
  echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=tvprogram&amp;ssp=newprogram', $tltt["tt_button"]["ttbtn2"], '', 'btn btn-info button');
  ?>

</div>

<?php if (!empty($JAK_TVPROGRAM_ALL) && is_array($JAK_TVPROGRAM_ALL)) { ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-success">
      <table id="tt_table" class="table table-striped table-hover">
        <thead>
        <tr>
          <th class="col-md-1 no-sort">#</th>
          <th class="col-md-1 no-sort">
            <div class="checkbox-singel check-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addCheckbox('', '', FALSE, 'jak_delete_all');
              echo $Html->addLabel('jak_delete_all', '');
              ?>

            </div>
          </th>
          <th class="col-md-4">Název Programu</th>
          <th class="col-md-1">TV/R</th>
          <th class="col-md-2">Vysílač</th>
          <th class="col-md-1">Kanál</th>
          <th class="col-md-2 no-sort"></th>
        </tr>
        </thead>
        <?php foreach ($JAK_TVPROGRAM_ALL as $tp) { ?>
          <tr>
            <td><?php echo $tp["id"]; ?></td>
            <td>
              <div class="checkbox-singel check-success">

                <?php
                // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                echo $Html->addCheckbox('jak_delete_tvprogram[]', $tp["id"], FALSE, 'jak_delete_tvprogram' . $tp["id"], 'highlight');
                echo $Html->addLabel('jak_delete_tvprogram' . $tp["id"], '');
                ?>

              </div>
            </td>
            <td>

              <?php
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=tvprogram&amp;ssp=editprogram&amp;id=' . $tp["id"], envo_cut_text($tp["name"], 70, '...'));
              ?>

            </td>
            <td><?php echo (($tp['tvr'] == '1') ? 'TV' : (($tp['tvr'] == '2') ? 'Stream TV' : 'Radio')); ?></td>
            <td>

              <?php
              if ($tp["channelid"] != '0') {
                if (isset($JAK_TVTOWER_ALL) && is_array($JAK_TVTOWER_ALL)) foreach ($JAK_TVTOWER_ALL as $tt) {
                  if (in_array($tt["id"], explode(',', $tp["towerid"]))) {
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=tvtower&amp;ssp=edittvtower&amp;id=' . $tp["towerid"], envo_cut_text($tt["name"], 70, '...'));
                  }
                }
              } else {
                echo 'Archiv';
              }
              ?>

            </td>
            <td>

              <?php
              if ($tp["channelid"] != '0') {
                if (isset($JAK_TVCHANNEL_ALL) && is_array($JAK_TVCHANNEL_ALL)) foreach ($JAK_TVCHANNEL_ALL as $tc) {
                  if (in_array($tc["id"], explode(',', $tp["channelid"]))) {
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=tvchannel&amp;ssp=editchannel&amp;id=' . $tp["channelid"], $tc["number"] . ' K');
                  }
                }
              } else {
                echo 'Archiv';
              }
              ?>

            </td>
            <td class="text-center">

              <?php
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=tvprogram&amp;ssp=editprogram&amp;id=' . $tp["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs m-r-20', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));

              echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=tvprogram&amp;ssp=delete&amp;id=' . $tp["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf($tltt["tt_notification"]["deltvtower"], $tp["name"]), 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
              ?>

            </td>
          </tr>
        <?php } ?>
      </table>
    </div>
  </form>

  <div class="col-md-12 m-b-30">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-edit', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
      ?>

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

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
