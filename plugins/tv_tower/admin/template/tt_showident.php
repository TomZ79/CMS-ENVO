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

<?php if (array_filter($JAK_IDENT_ALL) && is_array($JAK_IDENT_ALL)) { ?>

  <ul class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
    <li role="presentation" class="active">
      <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
        <span class="text">Service ID</span>
      </a>
    </li>
    <li role="presentation" class="next">
      <a href="#cmsPage2" id="cmsPage2-tab" role="tab" data-toggle="tab" aria-controls="cmsPage2" aria-expanded="true">
        <span class="text">Original Network ID / Network ID</span>
      </a>
    </li>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Service ID - TV', 'box-title');
              ?>

            </div>
            <div class="box-body no-padding">
              <table id="tt_table_sidtv" class="table table-striped table-hover">
                <thead>
                <tr>
                  <th class="no-sort">#</th>
                  <th>S_ID</th>
                  <th>Název</th>
                  <th class="no-sort">Datum Zadání</th>
                  <th class="no-sort"></th>
                </tr>
                </thead>

                <?php if (!empty($JAK_SIDTV_ALL) && is_array($JAK_SIDTV_ALL)) {
                  foreach ($JAK_SIDTV_ALL as $sidtv) { ?>

                    <tr>
                      <td><?php echo $sidtv["id"]; ?></td>
                      <td>
                        <?php echo $sidtv["sid"]; ?>
                      </td>
                      <td>

                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=editident&amp;sssp=s_idtv&amp;id=' . $sidtv["id"], $sidtv["name"]);
                        ?>

                      </td>
                      <td>
                        <?php echo date('d.m.Y - H:i:s', strtotime($sidtv["time"])); ?>
                      </td>
                      <td class="text-center">

                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        // EDIT
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=editident&amp;sssp=s_idtv&amp;id=' . $sidtv["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs m-r-20', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
                        // DELETE
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=deletesidtv&amp;id=' . $sidtv["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf($tltt["tt_notification"]["deltvtower"], $sidtv["name"]), 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));

                        ?>

                      </td>
                    </tr>

                  <?php }
                } ?>

              </table>
            </div>
          </div>
        </div>

        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Service ID - R', 'box-title');
              ?>

            </div>
            <div class="box-body no-padding">
              <table id="tt_table_sidr" class="table table-striped table-hover">
                <thead>
                <tr>
                  <th class="no-sort">#</th>
                  <th>S_ID</th>
                  <th>Název</th>
                  <th class="no-sort">Datum Zadání</th>
                  <th class="no-sort"></th>
                </tr>
                </thead>

                <?php if (!empty($JAK_SIDR_ALL) && is_array($JAK_SIDR_ALL)) {
                  foreach ($JAK_SIDR_ALL as $sidr) { ?>

                    <tr>
                      <td><?php echo $sidr["id"]; ?></td>
                      <td>
                        <?php echo $sidr["sid"]; ?>
                      </td>
                      <td>

                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=editident&amp;sssp=s_idr&amp;id=' . $sidr["id"], $sidr["name"]);
                        ?>

                      </td>
                      <td>
                        <?php echo date('d.m.Y - H:i:s', strtotime($sidr["time"])); ?>
                      </td>
                      <td class="text-center">

                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        // EDIT
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=editident&amp;sssp=s_idr&amp;id=' . $sidr["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs m-r-20', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
                        // DELETE
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=deletesidr&amp;id=' . $sidr["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf($tltt["tt_notification"]["deltvtower"], $sidr["name"]), 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));

                        ?>

                      </td>
                    </tr>

                  <?php }
                } ?>

              </table>
            </div>
          </div>
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Service ID - Služby', 'box-title');
              ?>

            </div>
            <div class="box-body no-padding">
              <table id="tt_table_sids" class="table table-striped table-hover">
                <thead>
                <tr>
                  <th class="no-sort">#</th>
                  <th>S_ID</th>
                  <th>Název</th>
                  <th class="no-sort">Datum Zadání</th>
                  <th class="no-sort"></th>
                </tr>
                </thead>

                <?php if (!empty($JAK_SIDS_ALL) && is_array($JAK_SIDS_ALL)) {
                  foreach ($JAK_SIDS_ALL as $sids) { ?>

                    <tr>
                      <td><?php echo $sids["id"]; ?></td>
                      <td>
                        <?php echo $sids["sid"]; ?>
                      </td>
                      <td>

                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=editident&amp;sssp=s_ids&amp;id=' . $sids["id"], $sids["name"]);
                        ?>

                      </td>
                      <td>
                        <?php echo date('d.m.Y - H:i:s', strtotime($sids["time"])); ?>
                      </td>
                      <td class="text-center">

                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        // EDIT
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=editident&amp;sssp=s_ids&amp;id=' . $sids["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs m-r-20', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
                        // DELETE
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=deletesids&amp;id=' . $sidr["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf($tltt["tt_notification"]["deltvtower"], $sids["name"]), 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));

                        ?>

                      </td>
                    </tr>

                  <?php }
                } ?>

              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Original Network ID', 'box-title');
              ?>

            </div>
            <div class="box-body no-padding">
              <table class="table table-striped table-hover tt_table_ident">
                <thead>
                <tr>
                  <th class="no-sort">#</th>
                  <th>ON_ID</th>
                  <th>Název</th>
                  <th class="no-sort"></th>
                </tr>
                </thead>

                <?php if (!empty($JAK_ONID_ALL) && is_array($JAK_ONID_ALL)) {
                  foreach ($JAK_ONID_ALL as $onid) { ?>

                    <tr>
                      <td><?php echo $onid["id"]; ?></td>
                      <td>
                        <?php echo $onid["onid"]; ?>
                      </td>
                      <td>

                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=editident&amp;sssp=s_idtv&amp;id=' . $onid["id"], $onid["country"]);
                        ?>

                      </td>
                      <td class="text-center">

                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        // EDIT
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=editident&amp;sssp=s_idtv&amp;id=' . $onid["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs m-r-20', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
                        // DELETE
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=deletesidtv&amp;id=' . $onid["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf($tltt["tt_notification"]["deltvtower"], $onid["country"]), 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));

                        ?>

                      </td>
                    </tr>

                  <?php }
                } ?>

              </table>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="box box-success">
            <div class="box-header with-border">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Network ID', 'box-title');
              ?>

            </div>
            <div class="box-body no-padding">
              <table class="table table-striped table-hover tt_table_ident">
                <thead>
                <tr>
                  <th class="no-sort">#</th>
                  <th>N_ID</th>
                  <th>Název</th>
                  <th class="no-sort"></th>
                </tr>
                </thead>

                <?php if (!empty($JAK_NID_ALL) && is_array($JAK_NID_ALL)) {
                  foreach ($JAK_NID_ALL as $nid) { ?>

                    <tr>
                      <td><?php echo $nid["id"]; ?></td>
                      <td>
                        <?php echo $nid["site"]; ?>
                      </td>
                      <td>

                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=editident&amp;sssp=s_idtv&amp;id=' . $nid["id"], $nid["site"]);
                        ?>

                      </td>
                      <td class="text-center">

                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        // EDIT
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=editident&amp;sssp=s_idtv&amp;id=' . $sids["id"], '<i class="fa fa-edit"></i>', '', 'btn btn-default btn-xs m-r-20', array('data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i2"]));
                        // DELETE
                        echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=deletesidtv&amp;id=' . $sidr["id"], '<i class="fa fa-trash-o"></i>', '', 'btn btn-danger btn-xs', array('data-confirm' => sprintf($tltt["tt_notification"]["deltvtower"], $sids["name"]), 'data-toggle' => 'tooltipEnvo', 'title' => $tl["icons"]["i1"]));

                        ?>

                      </td>
                    </tr>

                  <?php }
                } ?>

              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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