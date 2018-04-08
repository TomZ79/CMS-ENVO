<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_header.php'; ?>

  <div>
    <ul class="nav nav-tabs nav-tabs-responsive" id="keepTabs">
      <li class="active">
        <a href="#tabs1" data-toggle="tab">
          <span class="text">Obecné Info</span>
        </a>
      </li>
      <li>
        <a href="#tabs2" data-toggle="tab">
          <span class="text">Popis</span>
        </a>
      </li>
      <li>
        <a href="#tabs3" data-toggle="tab">
          <span class="text">Kontakty</span>
        </a>
      </li>

    </ul>

    <div class="tab-content" style="padding-top: 20px;">
      <div id="tabs1" class="tab-pane fade in active">
        <div class="row">

          <?php if (!empty($ENVO_HOUSELIST_DETAIL) && is_array($ENVO_HOUSELIST_DETAIL)) foreach ($ENVO_HOUSELIST_DETAIL as $hlistdetail) { ?>

            <div class="col-md-6">
              <div class="grid simple transparent">
                <div class="grid-title no-border">
                  <h4>Obecné Informace</h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
                </div>
                <div class="grid-body no-border">
                  <div class="row">
                    <div class="form-group">
                      <label class="form-label">Název Domu</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $hlistdetail["name"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Ulice</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $hlistdetail["street"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Město</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $hlistdetail["city"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">PSČ</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $hlistdetail["psc"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">IČ</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $hlistdetail["ic"] ?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="grid simple transparent">
                <div class="grid-title no-border">
                  <h4>Mapa</h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
                </div>
                <div class="grid-body no-border">
                  <div class="row">
                    <div id="google-container-map" style="height: 350px;position: relative;background-color: #EEE;">

                      <?php
                      if (empty($envo_house_latitude) || empty($envo_house_longitude)) {
                        // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                        echo $Html->addDiv('Mapa není k dispozici', 'txteditor', array('style' => 'position: absolute;top: 50%;left: 50%;-webkit-transform: translate(-50%, -50%);transform: translate(-50%, -50%);font-size: 1.5em;'));
                      }
                      ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>

          <?php } ?>

        </div>
      </div>
      <div id="tabs2" class="tab-pane fade">
        <div class="row">
          <div class="col-md-12">
            <div class="grid simple transparent">
              <div class="grid-title no-border">
                <h4 class="bold">Popis domu</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">
                <div class="row">

                  <?php if (!empty($ENVO_HOUSELIST_DESC)) {

                    echo '<div>' . $ENVO_HOUSELIST_DESC . '</div>';

                  } else { ?>

                    <div class="col-md-12">

                      <?php
                      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                      echo $Html->addDiv('Nejsou dostupná žádná data.', '', array('class' => 'alert'));
                      ?>

                    </div>

                  <?php } ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tabs3" class="tab-pane fade">
        <div class="row">
          <div class="col-md-12">
            <div class="grid simple transparent">
              <div class="grid-title no-border">
                <h4>Hlavní Kontakty</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">
                <div class="row">

                  <?php if (!empty($ENVO_HOUSELIST_CONT) && is_array($ENVO_HOUSELIST_CONT)) { ?>

                    <div class="form-group">
                      <label class="form-label">Předseda</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT1 ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Člen výboru 1</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT2 ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Člen výboru 2</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT3 ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Člen výboru 3</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT4 ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Člen výboru 4</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT5 ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Ostatní</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT6 ?>" readonly>
                      </div>
                    </div>

                  <?php } else { ?>

                    <div class="col-md-12">

                      <?php
                      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                      echo $Html->addDiv('Nejsou dostupná žádná data.', '', array('class' => 'alert'));
                      ?>

                    </div>

                  <?php } ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_footer.php'; ?>