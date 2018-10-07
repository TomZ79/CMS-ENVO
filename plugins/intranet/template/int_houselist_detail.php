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
      <li>
        <a href="#tabs4" data-toggle="tab">
          <span class="text">Anténní systém</span>
        </a>
      </li>
      <li>
        <a href="#tabs5" data-toggle="tab">
          <span class="text">Dokumenty</span>
        </a>
      </li>
      <li>
        <a href="#tabs6" data-toggle="tab">
          <span class="text">Fotogalerie</span>
        </a>
      </li>
    </ul>

    <div class="tab-content" style="padding-top: 20px;">
      <div id="tabs1" class="tab-pane fade in active">
        <div class="row">

          <?php if (!empty($ENVO_HOUSELIST_DETAIL) && is_array($ENVO_HOUSELIST_DETAIL)) { ?>

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
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_DETAIL["name"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Ulice</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_DETAIL["street"] ?>"
                          readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Město</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_DETAIL["city"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">PSČ</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_DETAIL["psc"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">IČ</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_DETAIL["ic"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Databáze - justice.cz</label>
                      <div class="controls">

                        <?php if (!empty($ENVO_HOUSELIST_DETAIL["justice"])) { ?>

                          <a href="<?= $ENVO_HOUSELIST_DETAIL["justice"] ?>" target="_blank" style="background-color: #eee;padding: 8px 11px !important;font-size: 13px;border-radius: 2px;display: block;width: 100%;">Zobrazit
                            platný výpis</a>

                        <?php } else { ?>

                          <span style="background-color: #eee;padding: 8px 11px !important;font-size: 13px;border-radius: 2px;display: block;width: 100%;">Odkaz na výpis neexistuje</span>

                        <?php } ?>

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
                    <div id="maps-container" style="height: 350px;position: relative;background-color: #EEE;">

                      <?php
                      if (empty($envo_house_latitude) || empty($envo_house_longitude)) {
                        // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                        echo $Html -> addDiv('Mapa není k dispozici', 'maps', array ( 'style' => 'position: absolute;top: 50%;left: 50%;-webkit-transform: translate(-50%, -50%);transform: translate(-50%, -50%);font-size: 1.5em;' ));
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

                  <?php if (!empty($ENVO_HOUSELIST_DETAIL['housedescription'])) {

                    echo '<div>' . $ENVO_HOUSELIST_DETAIL['housedescription'] . '</div>';

                  } else { ?>

                    <div class="col-md-12">

                      <?php
                      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                      echo $Html -> addDiv('Nejsou dostupná žádná data.', '', array ( 'class' => 'alert' ));
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
                <h4>Kontakty - Statutární orgán</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">

                <?php if (!empty($ENVO_HOUSELIST_DETAIL['housejusticelaw'])) { ?>

                  <div class="row">
                    <div class="well well-small">
                      <p class="clearfix">
                        <span class="pull-left"><strong>Způsob jednání statutárního orgánu</strong></span>
                        <span class="pull-right"><strong>Datum poslední online kontroly:</strong> <?= $ENVO_HOUSELIST_DETAIL['contactcontrol'] ?></span>
                      </p>
                      <p><?= $ENVO_HOUSELIST_DETAIL['housejusticelaw'] ?></p>
                    </div>
                  </div>

                <?php } ?>

                <div class="row">

                  <?php if (!empty($ENVO_HOUSELIST_CONT) && is_array($ENVO_HOUSELIST_CONT) && (!empty($ENVO_HOUSELIST_CONT['contact1']) || !empty($ENVO_HOUSELIST_CONT['contact2']) || !empty($ENVO_HOUSELIST_CONT['contact3']) || !empty($ENVO_HOUSELIST_CONT['contact4']) || !empty($ENVO_HOUSELIST_CONT['contact5']) || !empty($ENVO_HOUSELIST_CONT['contact6']))) { ?>

                    <?php if (!empty($ENVO_HOUSELIST_CONT['contact1'])) { ?>

                      <div class="col-sm-12">
                        <div class="row">
                          <h4 class="semi-bold">Předseda / Pověřený vlastník</h4>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Celé jméno</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contact1'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-8 form-group pl-sm-0 pr-sm-0 p-xs-0">
                            <label class="form-label">Adresa</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactaddress1'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Telefon</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactphone1'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-4 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Email</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactmail1'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Datum narození</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactdate1'] ?>" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                    <?php }
                    if (!empty($ENVO_HOUSELIST_CONT['contact2'])) { ?>

                      <div class="col-sm-12">
                        <div class="row">
                          <h4 class="semi-bold">Místopředseda / Člen výboru 1</h4>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Celé jméno</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contact2'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-8 form-group pl-sm-0 pr-sm-0 p-xs-0">
                            <label class="form-label">Adresa</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactaddress2'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Telefon</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactphone2'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-4 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Email</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactmail2'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Datum narození</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactdate2'] ?>" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                    <?php }
                    if (!empty($ENVO_HOUSELIST_CONT['contact3'])) { ?>

                      <div class="col-sm-12">
                        <div class="row">
                          <h4 class="semi-bold">Člen výboru 2</h4>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Celé jméno</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contact3'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-8 form-group pl-sm-0 pr-sm-0 p-xs-0">
                            <label class="form-label">Adresa</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactaddress3'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Telefon</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactphone3'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-4 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Email</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactmail3'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Datum narození</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactdate3'] ?>" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                    <?php }
                    if (!empty($ENVO_HOUSELIST_CONT['contact4'])) { ?>

                      <div class="col-sm-12">
                        <div class="row">
                          <h4 class="semi-bold">Člen výboru 3</h4>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Celé jméno</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contact4'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-8 form-group pl-sm-0 pr-sm-0 p-xs-0">
                            <label class="form-label">Adresa</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactaddress4'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Telefon</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactphone4'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-4 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Email</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactmail4'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Datum narození</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactdate4'] ?>" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                    <?php }
                    if (!empty($ENVO_HOUSELIST_CONT['contact5'])) { ?>

                      <div class="col-sm-12">
                        <div class="row">
                          <h4 class="semi-bold">Člen výboru 4</h4>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Celé jméno</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contact5'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-8 form-group pl-sm-0 pr-sm-0 p-xs-0">
                            <label class="form-label">Adresa</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactaddress5'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Telefon</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactphone5'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-4 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Email</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactmail5'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Datum narození</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactdate5'] ?>" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                    <?php }
                    if (!empty($ENVO_HOUSELIST_CONT['contact6'])) { ?>

                      <div class="col-sm-12">
                        <div class="row">
                          <h4 class="semi-bold">Člen výboru 5</h4>
                        </div>
                        <div class="row">
                          <div class="col-sm-4 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Celé jméno</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contact6'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-8 form-group pl-sm-0 pr-sm-0 p-xs-0">
                            <label class="form-label">Adresa</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactaddress6'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Telefon</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactphone6'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-4 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Email</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactmail6'] ?>" readonly>
                            </div>
                          </div>
                          <div class="col-sm-2 form-group pl-sm-0 p-xs-0">
                            <label class="form-label">Datum narození</label>
                            <div class="controls">
                              <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contactdate6'] ?>" readonly>
                            </div>
                          </div>
                        </div>
                      </div>

                    <?php }
                  } else { ?>

                    <div class="col-md-12">

                      <?php
                      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                      echo $Html -> addDiv('Nejsou dostupná žádná data.', '', array ( 'class' => 'alert' ));
                      ?>

                    </div>

                  <?php } ?>

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="grid simple transparent">
              <div class="grid-title no-border">
                <h4>Kontakty - Ostatní</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">
                <div class="row">

                  <?php if (!empty($ENVO_HOUSELIST_CONT) && is_array($ENVO_HOUSELIST_CONT) && (!empty($ENVO_HOUSELIST_CONT['contact7']) || !empty($ENVO_HOUSELIST_CONT['contact8']) || !empty($ENVO_HOUSELIST_CONT['contact9']) || !empty($ENVO_HOUSELIST_CONT['contact10']) || !empty($ENVO_HOUSELIST_CONT['contact11']) || !empty($ENVO_HOUSELIST_CONT['contact12']))) { ?>

                    <?php if (!empty($ENVO_HOUSELIST_CONT['contact7'])) { ?>

                      <div class="col-sm-12">
                        <div class="row">
                          <h4 class="semi-bold">Kontakt 1</h4>
                        </div>
                        <div class="row">
                          <label class="form-label">Informace o kontaktu</label>
                          <div class="controls">
                            <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contact7'] ?>" readonly>
                          </div>
                        </div>
                      </div>

                    <?php }
                    if (!empty($ENVO_HOUSELIST_CONT['contact8'])) { ?>

                      <div class="col-sm-12">
                        <div class="row">
                          <h4 class="semi-bold">Kontakt 2</h4>
                        </div>
                        <div class="row">
                          <label class="form-label">Informace o kontaktu</label>
                          <div class="controls">
                            <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contact8'] ?>" readonly>
                          </div>
                        </div>
                      </div>

                    <?php }
                    if (!empty($ENVO_HOUSELIST_CONT['contact9'])) { ?>

                      <div class="col-sm-12">
                        <div class="row">
                          <h4 class="semi-bold">Kontakt 3</h4>
                        </div>
                        <div class="row">
                          <label class="form-label">Informace o kontaktu</label>
                          <div class="controls">
                            <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contact9'] ?>" readonly>
                          </div>
                        </div>
                      </div>

                    <?php }
                    if (!empty($ENVO_HOUSELIST_CONT['contact10'])) { ?>

                      <div class="col-sm-12">
                        <div class="row">
                          <h4 class="semi-bold">Kontakt 4</h4>
                        </div>
                        <div class="row">
                          <label class="form-label">Informace o kontaktu</label>
                          <div class="controls">
                            <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contact10'] ?>" readonly>
                          </div>
                        </div>
                      </div>

                    <?php }
                    if (!empty($ENVO_HOUSELIST_CONT['contact11'])) { ?>

                      <div class="col-sm-12">
                        <div class="row">
                          <h4 class="semi-bold">Kontakt 5</h4>
                        </div>
                        <div class="row">
                          <label class="form-label">Informace o kontaktu</label>
                          <div class="controls">
                            <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contact11'] ?>" readonly>
                          </div>
                        </div>
                      </div>

                    <?php }
                    if (!empty($ENVO_HOUSELIST_CONT['contact12'])) { ?>

                      <div class="col-sm-12">
                        <div class="row">
                          <h4 class="semi-bold">Kontakt 6</h4>
                        </div>
                        <div class="row">
                          <label class="form-label">Informace o kontaktu</label>
                          <div class="controls">
                            <input class="form-control" type="text" value="<?= $ENVO_HOUSELIST_CONT['contact12'] ?>" readonly>
                          </div>
                        </div>
                      </div>

                    <?php }
                  } else { ?>

                    <div class="col-md-12">

                      <?php
                      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                      echo $Html -> addDiv('Nejsou dostupná žádná data.', '', array ( 'class' => 'alert' ));
                      ?>

                    </div>

                  <?php } ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tabs4" class="tab-pane fade">
        <div class="row">
          <div class="col-md-12">
            <div class="grid simple transparent">
              <div class="grid-title no-border">
                <h4 class="bold">Informace o anténním systému</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">
                <div class="row">

                  <?php if (!empty($ENVO_HOUSELIST_DETAIL['antennadescription'])) {

                    echo '<div>' . $ENVO_HOUSELIST_DETAIL['antennadescription'] . '</div>';

                  } else { ?>

                    <div class="col-md-12">

                      <?php
                      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                      echo $Html -> addDiv('Nejsou dostupná žádná data.', '', array ( 'class' => 'alert' ));
                      ?>

                    </div>

                  <?php } ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tabs5" class="tab-pane fade">
        <div class="row">
          <div class="col-md-12">
            <div class="grid simple transparent">
              <div class="grid-title no-border">
                <h4>Dokumenty</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">
                <div class="row">

                  <?php if (!empty($ENVO_HOUSELIST_DOCU) && is_array($ENVO_HOUSELIST_DOCU)) { ?>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th class="w-15 text-center">Typ Souboru</th>
                          <th class="w-70">Popis</th>
                          <th class="w-15 text-center">Soubor</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($ENVO_HOUSELIST_DOCU as $hdocu) { ?>
                          <tr>
                            <td class="text-center"><?= envo_extension_icon($hdocu["filename"]) ?></td>
                            <td><?= $hdocu["description"] ?></td>
                            <td class="text-center">

                              <?php
                              echo '<a href="/' . ENVO_FILES_DIRECTORY . $hdocu["fullpath"] . '" target="_blank">Zobrazit</a>';
                              echo ' | ';
                              echo '<a href="/' . ENVO_FILES_DIRECTORY . $hdocu["fullpath"] . '" download>Stáhnout</a>';
                              ?>

                            </td>
                          </tr>
                        <?php } ?>

                        </tbody>
                      </table>
                    </div>
                  <?php } else { ?>

                    <div class="col-md-12">

                      <?php
                      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                      echo $Html -> addDiv('Nejsou dostupná žádná data.', '', array ( 'class' => 'alert' ));
                      ?>

                    </div>

                  <?php } ?>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="tabs6" class="tab-pane fade">
        <div class="row">
          <div class="col-md-12">
            <div class="grid simple transparent">
              <div class="grid-title no-border">
                <h4 class="bold">Fotogalerie</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">

                <?php if ($ENVO_MODULES_ACCESS) { ?>
                  <div class="row m-b-20">
                    <div class="col-sm-12">
                      <form action="/plugins/intranet/template/ajax/fileuploader_list_upload_img.php" id="form_list_upload_img" method="post" enctype="multipart/form-data">
                        <!-- File input -->
                        <input type="file" name="files" accept="image/*">
                        <div class="form-status m-b-20"></div>
                        <input type="submit" class="btn btn-info btn-upload pull-right" value="Upload" data-houseid="<?= $ENVO_HOUSELIST_DETAIL["id"] ?>">
                      </form>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12">
                      <hr>
                    </div>
                  </div>
                <?php } ?>

                <div class="row">
                  <div class="col-sm-12">

                    <?php

                    if (!empty($ENVO_HOUSELIST_IMG_LIST) && is_array($ENVO_HOUSELIST_IMG_LIST)) {

                      echo '<div id="imggallery0" class="gallery">';

                      foreach ($ENVO_HOUSELIST_IMG_LIST as $subarray) {

                        // Get first value 'timedefault'
                        echo '<div class="dateblock_' . uniqid() . ' m-b-20 clearfix">';
                        echo '<div class="padding-10 m-b-20" style="background:gray;color:white;font-weight:700;font-size:1.2em;">' . reset($subarray) . '</div>';

                        // Loop photos array
                        foreach ($subarray['photos'] as $himg_list) {

                          echo '<div class="gallery-item-' . $himg_list["id"] . ' float-left margin-gallery" data-width="1" data-height="1">';

                          echo '<div class="img_container"><a data-fancybox="fancybox-0" href="/' . ENVO_FILES_DIRECTORY . $himg_list["mainfolder"] . $himg_list["filenamethumb"] . '" data-caption="' . ($himg_list["shortdescription"] ? $himg_list["shortdescription"] : "NO SHORT DESCRIPTION") . ($himg_list["description"] ? " - " . $himg_list["description"] : "") . '"><img src="/' . ENVO_FILES_DIRECTORY . $himg_list["mainfolder"] . $himg_list["filenamethumb"] . '" alt=""></a></div>';

                          echo '<div class="overlays">
                                <div class="col-sm-12 full-height">
                                  <div class="col-xs-5 full-height">
                                    <div class="text font-montserrat">' . strtoupper(pathinfo($himg_list["filenamethumb"], PATHINFO_EXTENSION)) . '</div>
                                  </div>
                                  <div class="col-xs-7 full-height">
                                    <div class="text">
                                      <a data-fancybox="fancybox-0-1" href="/' . ENVO_FILES_DIRECTORY . $himg_list["mainfolder"] . $himg_list["filenamethumb"] . '" data-caption="' . ($himg_list["shortdescription"] ? $himg_list["shortdescription"] : "NO SHORT DESCRIPTION") . ($himg_list["description"] ? " - " . $himg_list["description"] : "") . '">
                                        <button class="btn btn-success btn-xs btn-mini" type="button" data-toggle="tooltipEnvo" data-placement="bottom" title="Zoom +">
                                         <i class="fas fa-image"></i>
                                        </button>
                                      </a>
                                      <button class="btn btn-success btn-xs btn-mini dialog-listopen-info" type="button" data-dialog="itemDetails" data-id="' . $himg_list["id"] . '" data-toggle="tooltipEnvo" title="Informace">
                                      <i class="fas fa-info"></i>
                                    </button>
                                    </div>
                                  </div>
                                </div>
                              </div>';

                          echo '<div class="full-width padding-10">';
                          echo '<p class="bold">Krátký Popis</p><p class="shortdesc">' . $himg_list["shortdescription"] . '</p>';
                          echo '</div>';
                          echo '</div>';
                        }

                        echo '</div>';
                      }

                      echo '</div>';

                    } else {
                      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                      echo $Html -> addDiv('Nejsou dostupné žádné fotografie.', '', array ( 'class' => 'alert' ));
                    }

                    ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- DIALOG FX -->
  <div id="itemDetails" class="dialog item-details">
    <div class="dialog__overlay"></div>
    <div class="dialog__content">
      <div class="container-fluid" style="height: 90vh;">
        <div class="row dialog__overview">
          <!-- Data over AJAX  -->
        </div>
      </div>
      <button class="close action top-right" type="button" data-dialog-close>
        <i class="fas fa-times fa-lg"></i>
      </button>
    </div>
  </div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_footer.php'; ?>