<?php include_once APP_PATH . 'admin/template/header.php'; ?>

  <!-- Fixed Button for save form -->
  <div class="savebutton-medium hidden-xs">

    <?php
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=intranet&amp;sp=house&amp;ssp=newhouse', 'Nový dům', '', 'btn btn-info button');
    ?>

  </div>

<?php if (!empty($JAK_HOUSE_ALL) && is_array($JAK_HOUSE_ALL)) { ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="box box-success">
      <div class="box-body no-padding">
        <table id="int_table" class="table table-striped table-hover">
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
            <th class="col-md-2">Název</th>
            <th class="col-md-2">Ulice</th>
            <th class="col-md-2">Město</th>
            <th class="col-md-2 no-sort">IČ</th>
            <th class="col-md-2 no-sort"></th>
          </tr>
          </thead>
          <tbody>
          <?php foreach ($JAK_HOUSE_ALL as $h) { ?>
            <tr>
              <td><?php echo $h["id"]; ?></td>
              <td>
                <div class="checkbox-singel check-success">

                  <?php
                  // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                  // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                  echo $Html->addCheckbox('jak_delete_tvtower[]', $h["id"], FALSE, 'jak_delete_tvtower' . $h["id"], 'highlight');
                  echo $Html->addLabel('jak_delete_tvtower' . $h["id"], '');
                  ?>

                </div>
              </td>
              <td>

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('index.php?p=intranet&amp;sp=house&amp;ssp=edithouse&amp;id=' . $h["id"], $h["name"]);
                ?>

              </td>
              <td>
                <?php echo $h["street"];?>
              </td>
              <td>
                <?php echo $h["city"];?>
              </td>
              <td>
                <?php echo $h["ic"];?>
              </td>
              <td class="text-center">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                // EDIT
                echo $Html->addAnchor('index.php?p=intranet&amp;sp=house&amp;ssp=edithouse&amp;id=' . $h["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs m-r-20', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
                ?>

              </td>
            </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
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