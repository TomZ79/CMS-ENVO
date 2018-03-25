<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php
// EN: Checking of some page was unsuccessful
// CZ: Kontrola některé stránky byla neúspěšná
if ($page3 == "ene") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["general_error"]["generror2"]?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php } ?>

  <div class="row">
    <div class="col-lg-5 col-sm-12 ">
      <!-- START CARD -->
      <div class="card card-default">
        <div class="card-header">
          <div class="card-title">Service ID (S_ID)
          </div>
        </div>
        <div class="card-block">
          <p style="height: 60px">Unikátní identifikátor konkrétní služby přenášené transportním tokem (televizní program, rozhlasový program, ostatní služby).</p>
          <div class="m-t-15">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=createident&amp;sssp=s_idtv', 'Nové S_ID - TV', '', 'btn btn-info button mr-1');
            echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=createident&amp;sssp=s_idr', 'Nové S_ID - R', '', 'btn btn-info button mr-1');
            echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=createident&amp;sssp=s_ids', 'Nové S_ID - Služby', '', 'btn btn-info button');
            ?>

          </div>
        </div>
      </div>
      <!-- END CARD -->
    </div>
    <div class="col-lg-4 col-sm-12 ">
      <!-- START CARD -->
      <div class="card card-default">
        <div class="card-header">
          <div class="card-title">Original Network ID (ON_ID)
          </div>
        </div>
        <div class="card-block">
          <p style="height: 60px">Unikátní identifikátor společný pro všechny sítě v rámci konkrétní země.</p>
          <div class="m-t-15 pull-right">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=createident&amp;sssp=on_id', 'Nové Original Network ID', '', 'btn btn-info button');
            ?>

          </div>
        </div>
      </div>
      <!-- END CARD -->
    </div>
    <div class="col-lg-3 col-sm-12 ">
      <!-- START CARD -->
      <div class="card card-default">
        <div class="card-header">
          <div class="card-title">Network ID (N_ID)
          </div>
        </div>
        <div class="card-block">
          <p style="height: 60px">Unikátní identifikátor konkrétní sítě.</p>
          <div class="m-t-15 pull-right">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=createident&amp;sssp=n_id', 'Nové Network ID', '', 'btn btn-info button');
            ?>

          </div>
        </div>
      </div>
      <!-- END CARD -->
    </div>
  </div>


<?php include_once APP_PATH . 'admin/template/footer.php'; ?>