<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: Checking of some page was successful
// CZ: Kontrola některé stránky byla úspěšná
if ($page1 == "s") { ?>
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
if ($page2 == "s1") { ?>
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
if ($page1 == "e" || $page1 == "ene") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo($page1 == "e" ? $tl["general_error"]["generror1"] : $tl["general_error"]["generror2"]);?>'
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
  echo $Html->addAnchor('index.php?p=blog&sp=new', $tl["button"]["btn39"], '', 'btn btn-info button');
  ?>

</div>

<?php if (isset($ENVO_BLOG_ALL) && is_array($ENVO_BLOG_ALL)) { ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-success">
      <div class="box-body no-padding">
        <table id="blog_table" class="table table-striped table-hover span12">
          <thead>
          <tr>
            <th class="no-sort" style="width:5%">#</th>
            <th class="no-sort" style="width:4%">
              <div class="checkbox-singel check-success" style="margin: 0 auto;">

                <?php
                // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                echo $Html->addCheckbox('', '', FALSE, 'envo_delete_all');
                echo $Html->addLabel('envo_delete_all', '');
                ?>

              </div>
            </th>
            <th style="width:35%"><?php echo $tlblog["blog_box_table"]["blogtb"]; ?></th>
            <th style="width:12%"><?php echo $tlblog["blog_box_table"]["blogtb1"]; ?></th>
            <th style="width:8%"><?php echo $tlblog["blog_box_table"]["blogtb2"]; ?></th>
            <th style="width:12%"><?php echo $tlblog["blog_box_table"]["blogtb3"]; ?></th>
            <th style="width:12%"><?php echo $tlblog["blog_box_table"]["blogtb4"]; ?></th>
            <th class="text-center no-sort" style="width:4%">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('lock', '<i class="fa fa-lock"></i>', 'button_lock', 'btn btn-default btn-xs');
              ?>

            </th>
            <th class="text-center no-sort" style="width:4%"></th>
            <th class="text-center no-sort" style="width:4%">

              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('delete', '<i class="fa fa-trash-o"></i>', 'button_delete', 'btn btn-danger btn-xs', array('disabled' => 'disabled', 'data-confirm-del' => $tlblog["blog_notification"]["delall"], 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i30"]));
              ?>

            </th>
          </tr>
          </thead>
          <?php foreach ($ENVO_BLOG_ALL as $v) { ?>
            <tr>
              <td><?php echo $v["id"]; ?></td>
              <td>
                <div class="checkbox-singel check-success" style="margin: 0 auto;">

                  <?php
                  // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addCheckbox('envo_delete_blog[]', $v["id"], FALSE, 'envo_delete_blog' . $v["id"], 'highlight');
                  echo $Html->addLabel('envo_delete_blog' . $v["id"], '');
                  ?>

                </div>
              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=blog&amp;sp=edit&amp;id=' . $v["id"], envo_cut_text($v["title"], 70, '...'));
                ?>

              </td>
              <td class="table-category-list">

                <?php
                if ($v["catid"] != '0') {
                  if (isset($ENVO_CAT) && is_array($ENVO_CAT)) foreach ($ENVO_CAT as $z) {
                    if (in_array($z["id"], explode(',', $v["catid"]))) {
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('index.php?p=blog&amp;sp=showcat&amp;id=' . $z["id"], $z["name"]);
                    }
                  }
                } else {
                  echo $tlblog["blog_box_content"]["blogbc13"];
                }
                ?>

              </td>
              <td><?php echo date("d.m.Y", strtotime($v["time"])); ?></td>
              <td><?php echo $v["hits"]; ?></td>
              <td>

                <?php
                // Time Control - variable
                $today       = date("Y-m-d H:i:s"); // Today time
                $expire      = date("Y-m-d H:i:s", $v["enddate"]); //End time of article or content from DB
                $today_time  = strtotime($today);
                $expire_time = strtotime($expire);

                // Control Active of article or content ...
                if ($v["active"] == 1 && $v["catid"] != 0) { // Odemčeno a není Archiv
                  if (empty($v["enddate"])) {
                    echo $tlblog["blog_box_content"]["blogbc14"]; // Aktivní
                  } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                    echo $tlblog["blog_box_content"]["blogbc14"]; // Aktivní
                  } else {
                    echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc17"] . '</span>'; //Neaktivní - Time
                  }
                } elseif ($v["active"] == 1 && $v["catid"] == 0) { // Odemčeno a je Archiv
                  if (empty($v["enddate"])) {
                    echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc16"] . '</span>'; // Neaktivní - Archiv
                  } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                    echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc16"] . '</span>'; // Neaktivní - Archiv
                  } else {
                    echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc17"] . ', ' . $tlblog["blog_box_content"]["blogbc16"] . '</span>'; // Neaktivní - Time, Archiv
                  }
                } elseif ($v["active"] == 0 && $v["catid"] != 0) { //Uzamčeno a není Archiv
                  if (empty($v["enddate"])) {
                    echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc18"] . '</span>'; // Neaktivní -  Uzamčeno
                  } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                    echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc18"] . '</span>'; // Neaktivní -  Uzamčeno
                  } else {
                    echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small"> - ' . $tlblog["blog_box_content"]["blogbc18"] . ', ' . $tlblog["blog_box_content"]["blogbc17"] . '</span>'; // Neaktivní - Time,Uzamčeno
                  }
                } else {
                  if (empty($v["enddate"])) { //Uzamčeno a je Archiv
                    echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc18"] . ', ' . $tlblog["blog_box_content"]["blogbc16"] . '</span>'; // Neaktivní -  Uzamčeno, Archiv
                  } elseif (!empty($v["enddate"]) && $expire_time >= $today_time) {
                    echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small">  - ' . $tlblog["blog_box_content"]["blogbc18"] . ', ' . $tlblog["blog_box_content"]["blogbc16"] . '</span>'; // Neaktivní -  Uzamčeno, Archiv
                  } else {
                    echo $tlblog["blog_box_content"]["blogbc15"] . '<span class="small"> - ' . $tlblog["blog_box_content"]["blogbc18"] . ', ' . $tlblog["blog_box_content"]["blogbc17"] . ', ' . $tlblog["blog_box_content"]["blogbc16"] . '</span>'; // Neaktivní - Time, Uzamčeno, Archiv
                  }
                }
                ?>

              </td>
              <td class="text-center">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=blog&amp;sp=lock&amp;id=' . $v["id"], '<i class="fa fa-' . (($v["active"] == 0) ? 'lock' : 'check') . '"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'title' => ($v["active"] == '0') ? $tl["icons"]["i5"] : $tl["icons"]["i6"]));
                ?>

              </td>
              <td class="text-center">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=blog&amp;sp=edit&amp;id=' . $v["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
                ?>

              </td>
              <td class="text-center">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=blog&amp;sp=delete&amp;id=' . $v["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf($tlblog["blog_notification"]["del"], $v["title"]), 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
                ?>

              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
  </form>

  <div class="col-sm-12 m-b-30">
    <div class="icon_legend">

      <?php
      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
      echo $Html->addTag('h3', $tl["icons"]["i"]);
      echo $Html->addTag('i', '', 'fa fa-check', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i6"]));
      echo $Html->addTag('i', '', 'fa fa-lock', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i5"]));
      echo $Html->addTag('i', '', 'fa fa-edit', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
      echo $Html->addTag('i', '', 'fa fa-trash-o', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));
      ?>

    </div>
  </div>

<?php } else { ?>

  <div class="col-sm-12">

    <?php
    // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
    echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
    ?>

  </div>

<?php } ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
