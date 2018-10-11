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
          <span class="text">Úkoly</span>
        </a>
      </li>
      <li>
        <a href="#tabs4" data-toggle="tab">
          <span class="text">Anténní systém</span>
        </a>
      </li>
      <li>
        <a href="#tabs5" data-toggle="tab">
          <span class="text">Hlavní Kontakty</span>
        </a>
      </li>
      <li>
        <a href="#tabs6" data-toggle="tab">
          <span class="text">Nájemníci</span>
        </a>
      </li>
      <li>
        <a href="#tabs7" data-toggle="tab">
          <span class="text">Servisy</span>
        </a>
      </li>
      <li>
        <a href="#tabs8" data-toggle="tab">
          <span class="text">Dokumenty</span>
        </a>
      </li>
      <li>
        <a href="#tabs9" data-toggle="tab">
          <span class="text">Fotogalerie</span>
        </a>
      </li>
      <li>
        <a href="#tabs10" data-toggle="tab">
          <span class="text">Videogalerie</span>
        </a>
      </li>

    </ul>

    <div class="tab-content" style="padding-top: 20px;">
      <div id="tabs1" class="tab-pane fade in active">
        <div class="row">

          <?php if (!empty($ENVO_HOUSE_DETAIL) && is_array($ENVO_HOUSE_DETAIL)) { ?>

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
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSE_DETAIL["name"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Ulice</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSE_DETAIL["street"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Město</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSE_DETAIL["city"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">PSČ</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSE_DETAIL["psc"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">IČ</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $ENVO_HOUSE_DETAIL["housefic"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Databáze - justice.cz</label>
                      <div class="controls">

                        <?php if (!empty($ENVO_HOUSE_DETAIL["justice"])) { ?>

                          <a href="<?= $ENVO_HOUSE_DETAIL["justice"] ?>" target="_blank" style="background-color: #eee;padding: 8px 11px !important;font-size: 13px;border-radius: 2px;display: block;width: 100%;">Zobrazit
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

                  <?php if (!empty($ENVO_HOUSE_DETAIL['description'])) {

                    echo '<div>' . $ENVO_HOUSE_DETAIL['description'] . '</div>';

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
                <h4>Úkoly</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">
                <div class="row">

                  <?php if (!empty($ENVO_HOUSE_TASK) && is_array($ENVO_HOUSE_TASK)) { ?>
                    <div id="tasklist">

                      <?php foreach ($ENVO_HOUSE_TASK as $htask) { ?>
                        <div class="task_<?= $htask["id"] ?>">
                          <div class="taskheader">
                            <span>Task ID <?= $htask["id"] ?></span>
                            <span class="pull-right collapsetask">+</span>
                          </div>
                          <div class="taskinfo">
                            <div class="container-fluid p-xs-0">
                              <div class="table-responsive">
                                <table class="table table-task">
                                  <tr>
                                    <td><strong>Titulek: </strong></td>
                                    <td><strong>Priorita: </strong></td>
                                    <td><strong>Status: </strong></td>
                                    <td><strong>Datum Úkolu: </strong></td>
                                    <td><strong>Datum Připomenutí: </strong></td>
                                  </tr>
                                  <tr>
                                    <td><?= $htask["title"] ?></td>
                                    <td><?= $htask["priority"] ?></td>
                                    <td><?= $htask["status"] ?></td>
                                    <td><?= $htask["time"] ?></td>
                                    <td><?= $htask["reminder"] ?></td>
                                  </tr>
                                </table>
                              </div>
                            </div>
                          </div>
                          <div class="taskcontent">
                            <p><strong>Popis Úkolu:</strong></p>
                            <div class="taskdescription">
                              <?= $htask["description"] ?>
                            </div>
                          </div>
                        </div>
                      <?php } ?>

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
      <div id="tabs4" class="tab-pane fade">
        <div class="row">
          <div class="col-md-12">
            <div class="grid simple transparent">
              <div class="grid-title no-border">
                <h4 class="bold">Popis anténního systému</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">
                <div class="row">

                  <?php if (!empty($ENVO_HOUSE_TECH)) {

                    echo '<div>' . $ENVO_HOUSE_TECH . '</div>';

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
                <h4>Hlavní Kontakty</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">
                <div class="row">

                  <?php if (!empty($ENVO_HOUSE_CONT) && is_array($ENVO_HOUSE_CONT)) { ?>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th style="width:30%;">Jméno</th>
                          <th style="width:20%;">Adresa</th>
                          <th style="width:20%;">Telefon</th>
                          <th style="width:20%;">Email</th>
                          <th style="width:10%;">Výbor</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($ENVO_HOUSE_CONT as $hcont) { ?>
                          <tr>
                            <td><?= $hcont["name"] ?></td>
                            <td><?= $hcont["address"] ?></td>
                            <td><?= $hcont["phone"] ?></td>
                            <td><?= $hcont["email"] ?></td>
                            <td>

                              <?php
                              switch ($hcont["commission"]) {
                                case '0':
                                  echo 'Není ve Výboru';
                                  break;
                                case '1':
                                  echo 'Předseda';
                                  break;
                                case '2':
                                  echo 'Člen Výboru';
                                  break;
                                case '3':
                                  echo 'Pověřený vlastník';
                                  break;
                              }
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
                <h4>Nájemníci</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">
                <div class="row">

                  <?php if (!empty($ENVO_HOUSE_ENT) && is_array($ENVO_HOUSE_ENT)) {
                    foreach ($ENVO_HOUSE_ENT as $e) { ?>

                      <div class="row">
                        <div class="col-md-12 m-b-20">
                          <h4 style="margin: 2px;">Číslo vchodu:
                            <strong><?php echo($e["entrance"] ? $e["entrance"] : '0'); ?></strong>
                          </h4>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <div class="box box-success">
                            <div class="box-body no-padding">

                              <div class="clearfix">
                                <div class="form-group pull-left">
                                  <input type="text" class="searchTable-<?= $e["entrance"] ?> form-control" placeholder="Vyhledat ..." data-table="tableapartment_<?= $e["entrance"] ?>">
                                </div>
                                <span class="counter pull-left"></span>
                              </div>

                              <div class="table-responsive">
                                <table id="tableapartment_<?php echo($e["entrance"] ? $e["entrance"] : '0'); ?>" class="table table-bordered table-striped">
                                  <thead>
                                  <tr>
                                    <th style="width:5%;">#</th>
                                    <th style="width:15%;">Číslo bytu</th>
                                    <th style="width:10%;">Patro</th>
                                    <th style="width:25%;">Jméno</th>
                                    <th style="width:25%;">Telefon</th>
                                    <th style="width:20%;">Výbor</th>
                                  </tr>
                                  <tr class="warning no-result">
                                    <td colspan="6">
                                      <i class="fas fa-exclamation-triangle"></i> Žádné záznamy nebyly nalezeny
                                    </td>
                                  </tr>
                                  </thead>
                                  <tbody>

                                  <?php

                                  if (isset($ENVO_HOUSE_APT) && is_array($ENVO_HOUSE_APT)) {
                                    $foundApt = array ();
                                    foreach ($ENVO_HOUSE_APT as $a) {
                                      if ($a["entrance"] == $e["entrance"]) {
                                        $foundApt[] = $a;
                                      }
                                    }

                                    if (count($foundApt) != 0) {

                                      foreach ($foundApt as $foundApt) {

                                        echo '<tr>';

                                        echo '<td style="color: #A7B1BE;">' . $foundApt['id'] . '</td>';
                                        echo '<td style="font-weight:bold;text-align:center;">' . $foundApt['number'] . '</td>';
                                        echo '<td>' . $foundApt['etage'] . '</td>';
                                        echo '<td>' . $foundApt['name'] . '</td>';
                                        echo '<td>' . $foundApt['phone'] . '</td>';
                                        echo '<td>';

                                        switch ($foundApt["commission"]) {
                                          case '0':
                                            echo '<span style="color: #A7B1BE;">Není ve Výboru</span>';
                                            break;
                                          case '1':
                                            echo 'Předseda';
                                            break;
                                          case '2':
                                            echo 'Člen Výboru';
                                            break;
                                          case '3':
                                            echo 'Pověřený vlastník';
                                            break;
                                        }

                                        echo '</td>';

                                        echo '</tr>';

                                      }

                                    } else {
                                      echo '<tr class="noedit" style="height: 49px"><td colspan="6">Nenalezen žádný záznam</td></tr>';
                                    }

                                  }

                                  ?>

                                  </tbody>
                                </table>
                              </div>
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
      </div>
      <div id="tabs7" class="tab-pane fade">
        <div class="row">
          <div class="col-md-12">
            <div class="grid simple transparent">
              <div class="grid-title no-border">
                <h4>Servisy</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">
                <div class="row">

                  <?php if (!empty($ENVO_HOUSE_SERV) && is_array($ENVO_HOUSE_SERV)) { ?>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th class="col-sm-6">Popis</th>
                          <th class="col-sm-2">Datum Zadání</th>
                          <th class="col-sm-2">Datum Nahlášení</th>
                          <th class="col-sm-2">Datum Ukončení</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($ENVO_HOUSE_SERV as $hserv) { ?>
                          <tr>
                            <td><?= $hserv["description"] ?></td>
                            <td><?= $hserv["timedefault"] ?></td>
                            <td><?= $hserv["timestart"] ?></td>
                            <td><?= $hserv["timeend"] ?></td>
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
      <div id="tabs8" class="tab-pane fade">
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

                  <?php if (!empty($ENVO_HOUSE_DOCU) && is_array($ENVO_HOUSE_DOCU)) { ?>
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

                        <?php foreach ($ENVO_HOUSE_DOCU as $hdocu) { ?>
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
      <div id="tabs9" class="tab-pane fade">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid simple transparent">
              <div class="grid-title no-border">
                <h4>Fotogalerie</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">

                <?php if ($ENVO_MODULES_ACCESS) { ?>
                  <div class="row m-b-20">
                    <div class="col-sm-12">
                      <form action="php/form_upload.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="files">
                        <input type="submit" class="btn btn-info pull-right" value="Upload">
                      </form>
                    </div>
                  </div>
                <?php } ?>

                <div class="row">
                  <div class="col-sm-12 text-center">
                    <hr>
                    <button type="button" id="showPhotoList" class="btn btn-success btn-cons">
                      <span>Seznam</span>
                    </button>

                    <button type="button" id="showFiltrPhoto" class="btn btn-info btn-cons">
                      <span>Filtr</span>
                    </button>
                    <hr>
                  </div>
                </div>

                <div id="list_photo" class="row">
                  <div class="col-sm-12">

                    <?php

                    if (!empty($ENVO_HOUSE_IMG_LIST) && is_array($ENVO_HOUSE_IMG_LIST)) {

                      echo '<div id="imggallery0" class="gallery">';

                      foreach ($ENVO_HOUSE_IMG_LIST as $subarray) {

                        // Get first value 'timedefault'
                        echo '<div class="dateblock_' . uniqid() . ' m-b-20 clearfix">';
                        echo '<div class="padding-10 m-b-20" style="background:gray;color:white;font-weight:700;font-size:1.2em;">' . reset($subarray) . '</div>';

                        // Loop photos array
                        foreach ($subarray['photos'] as $himg_list) {

                          echo '<div class="gallery-item-' . $himg_list["id"] . ' ' . $himg_list["category"] . ' float-left margin-gallery" data-width="1" data-height="1">';

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
                                      <button class="btn btn-success btn-xs btn-mini dialog-open-info" type="button" data-dialog="itemDetails" data-id="' . $himg_list["id"] . '" data-toggle="tooltipEnvo" title="Informace">
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
                <div id="isotope_photo" class="row" style="display: none;">
                  <div class="col-sm-3">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html -> addTag('h5', 'Kategorie', 'bold');
                    ?>

                    <ul id="imgfilters" class="filters">
                      <li><a href="javascript:;" class="filter" data-filter="*">Vše</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".service">Servisy</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".reconstruction">Rekonstrukce</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".installation">Instalace</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".complaint">Reklamace</a></li>
                    </ul>

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html -> addTag('h5', 'Vyhledat', 'bold');
                    ?>

                    <p>

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html -> addInput('text', 'quicksearch', '', 'quicksearch', 'form-control', array ( 'placeholder' => 'Vyhledat ...' ));
                      ?>

                    </p>

                  </div>
                  <div class="col-sm-9">

                    <?php

                    if (!empty($ENVO_HOUSE_IMG_ISO) && is_array($ENVO_HOUSE_IMG_ISO)) {

                      echo '<div id="imggallery1" class="gallery">';

                      foreach ($ENVO_HOUSE_IMG_ISO as $himg_iso) {

                        echo '<div class="gallery-item-' . $himg_iso["id"] . ' ' . $himg_iso["category"] . '" data-width="1" data-height="1">';

                        echo '<div class="img_container"><a data-fancybox="fancybox-1" href="' . ENVO_FILES_DIRECTORY . $himg_iso["mainfolder"] . $himg_iso["filenamethumb"] . '" data-caption="' . ($himg_iso["shortdescription"] ? $himg_iso["shortdescription"] : "NO SHORT DESCRIPTION") . ($himg_iso["description"] ? " - " . $himg_iso["description"] : "") . '"><img src="/' . ENVO_FILES_DIRECTORY . $himg_iso["mainfolder"] . $himg_iso["filenamethumb"] . '" class="img-responsive" alt=""></a></div>';

                        echo '<div class="overlays">
                                <div class="col-sm-12 full-height">
                                  <div class="col-xs-5 full-height">
                                    <div class="text font-montserrat">' . strtoupper(pathinfo($himg_list["filenamethumb"], PATHINFO_EXTENSION)) . '</div>
                                  </div>
                                  <div class="col-xs-7 full-height">
                                    <div class="text">
                                      <a data-fancybox="fancybox-1-1" href="/' . ENVO_FILES_DIRECTORY . $himg_iso["mainfolder"] . $himg_iso["filenamethumb"] . '" data-caption="' . ($himg_iso["shortdescription"] ? $himg_iso["shortdescription"] : "NO SHORT DESCRIPTION") . ($himg_iso["description"] ? " - " . $himg_iso["description"] : "") . '">
                                        <button class="btn btn-success btn-xs btn-mini" type="button" data-toggle="tooltipEnvo" data-placement="bottom" title="Zoom +">
                                         <i class="fas fa-image"></i>
                                        </button>
                                      </a>
                                      <button class="btn btn-success btn-xs btn-mini dialog-open-info" type="button" data-dialog="itemDetails" data-id="' . $himg_iso["id"] . '" data-toggle="tooltipEnvo" title="Informace">
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
      <div id="tabs10" class="tab-pane fade">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid simple transparent">
              <div class="grid-title no-border">
                <h4>Videogalerie</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">
                <div class="row">
                  <div class="col-sm-3">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html -> addTag('h5', 'Kategorie', 'bold');
                    ?>

                    <ul id="videofilters" class="filters">
                      <li><a href="javascript:;" class="filter" data-filter="*">Vše</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".service">Servisy</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".reconstruction">Rekonstrukce</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".installation">Instalace</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".complaint">Reklamace</a></li>
                    </ul>

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html -> addTag('h5', 'Vyhledat', 'bold');
                    ?>

                    <p>

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html -> addInput('text', 'quicksearch', '', 'quicksearch', 'form-control', array ( 'placeholder' => 'Vyhledat ...' ));
                      ?>

                    </p>

                  </div>
                  <div class="col-sm-9">

                    <?php if (!empty($ENVO_HOUSE_VIDEO) && is_array($ENVO_HOUSE_VIDEO)) { ?>

                      <div id="videogallery" class="gallery">

                        <?php foreach ($ENVO_HOUSE_VIDEO as $hvideo) { ?>
                          <div class="gallery-item-<?= $hvideo["id"] . ' ' . $hvideo["category"] ?>" data-width="1" data-height="1">
                            <div class="img_container">
                              <a href="<?= '/' . ENVO_FILES_DIRECTORY . $hvideo["mainfolder"] . $hvideo["filename"] ?>" download>
                                <img src="<?= '/' . ENVO_FILES_DIRECTORY . $hvideo["mainfolder"] . $hvideo["filenamethumb"] ?>" class="img-responsive" alt="">
                              </a>
                            </div>
                            <div class="overlays">
                              <div class="col-sm-12 full-height">
                                <div class="col-xs-5 full-height">
                                  <div class="text font-montserrat"></div>
                                </div>
                                <div class="col-xs-7 full-height">
                                  <div class="text">
                                    <a href="<?= '/' . ENVO_FILES_DIRECTORY . $hvideo["mainfolder"] . $hvideo["filename"] ?>" data-caption="<?= $hvideo["shortdescription"] . ' | ' . $hvideo["description"] ?>" download>
                                      <button class="btn btn-success btn-xs btn-mini" type="button" data-toggle="tooltipEnvo" title="Zoom +">
                                        <i class="fas fa-image"></i>
                                      </button>
                                    </a>
                                    <button class="btn btn-success btn-xs btn-mini dialog-open" type="button" data-dialog="itemDetails1" data-id="<?= $hvideo["id"] ?>" data-toggle="tooltipEnvo" title="Informace">
                                      <i class="fas fa-info"></i>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="full-width padding-10">
                              <p class="bold">Krátký Popis</p>
                              <p class="shortdesc"><?= $hvideo["shortdescription"] ?></p>
                            </div>
                          </div>
                        <?php } ?>

                      </div>

                    <?php } else { ?>

                      <div class="col-md-12">

                        <?php
                        // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                        echo $Html -> addDiv('Nejsou dostupná žádná videa.', '', array ( 'class' => 'alert' ));
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

  <!-- MODAL -->
  <div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="modal-video-label" aria-hidden="true">
    <div class="modal-dialog modal-center" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="modal-video">
            <iframe width="450" height="300" src="" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_footer.php'; ?>