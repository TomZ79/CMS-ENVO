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
          <span class="text">Úkoly</span>
        </a>
      </li>
      <li>
        <a href="#tabs3" data-toggle="tab">
          <span class="text">Stav Techniky</span>
        </a>
      </li>
      <li>
        <a href="#tabs4" data-toggle="tab">
          <span class="text">Hlavní Kontakty</span>
        </a>
      </li>
      <li>
        <a href="#tabs5" data-toggle="tab">
          <span class="text">Nájemníci</span>
        </a>
      </li>
      <li>
        <a href="#tabs6" data-toggle="tab">
          <span class="text">Servisy</span>
        </a>
      </li>
      <li>
        <a href="#tabs7" data-toggle="tab">
          <span class="text">Dokumenty</span>
        </a>
      </li>
      <li>
        <a href="#tabs8" data-toggle="tab">
          <span class="text">Fotogalerie</span>
        </a>
      </li>
      <li>
        <a href="#tabs9" data-toggle="tab">
          <span class="text">Videogalerie</span>
        </a>
      </li>

    </ul>

    <div class="tab-content" style="padding-top: 20px;">
      <div id="tabs1" class="tab-pane fade in active">
        <div class="row">

          <?php if (!empty($ENVO_HOUSE_DETAIL) && is_array($ENVO_HOUSE_DETAIL)) foreach ($ENVO_HOUSE_DETAIL as $hdetail) { ?>

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
                        <input class="form-control" type="text" value="<?= $hdetail["name"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Ulice</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $hdetail["street"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Město</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $hdetail["city"] ?>" readonly>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">PSČ</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?= $hdetail["psc"] ?>" readonly>
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
                            <div class="container-fluid">
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
                <h4 class="bold">Popis technického stavu domu</h4>
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
      <div id="tabs4" class="tab-pane fade">
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
      <div id="tabs5" class="tab-pane fade">
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
                                    <td colspan="6"><i class="fas fa-exclamation-triangle"></i> Žádné záznamy nebyly nalezeny</td>
                                  </tr>
                                  </thead>
                                  <tbody>

                                  <?php

                                  if (isset($ENVO_HOUSE_APT) && is_array($ENVO_HOUSE_APT)) {
                                    $foundApt = array();
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
      <div id="tabs6" class="tab-pane fade">
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
      <div id="tabs7" class="tab-pane fade">
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
      <div id="tabs8" class="tab-pane fade">
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
                    <div class="col-sm-12 text-center">
                      <h2>Nahrávání fotek pouze pro administrátory</h2>
                      <p><a href="https://innostudio.de/fileuploader/">https://innostudio.de/fileuploader/</a></p>
                    </div>
                  </div>
                <?php } ?>

                <div class="row">
                  <div class="col-sm-3">

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('h5', 'Kategorie', 'bold');
                    ?>

                    <ul class="filters">
                      <li><a href="javascript:;" class="filter" data-filter="*">Vše</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".service">Servisy</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".reconstruction">Rekonstrukce</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".installation">Instalace</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".complaint">Reklamace</a></li>
                    </ul>

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('h5', 'Vyhledat', 'bold');
                    ?>

                    <p>

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'quicksearch', '', 'quicksearch', 'form-control', array('placeholder' => 'Vyhledat ...'));
                      ?>

                    </p>

                  </div>
                  <div class="col-sm-9">

                    <?php if (!empty($ENVO_HOUSE_IMG) && is_array($ENVO_HOUSE_IMG)) { ?>

                      <div id="gallery" class="gallery">

                        <?php foreach ($ENVO_HOUSE_IMG as $himg) { ?>

                          <div class="gallery-item-<?= $himg["id"] . ' ' . $himg["category"] ?>" data-width="1" data-height="1">
                            <div class="img_container">
                              <a data-fancybox="fancybox-1" href="<?= '/' . ENVO_FILES_DIRECTORY . $himg["mainfolder"] . $himg["filenamethumb"] ?>">
                                <img src="<?= '/' . ENVO_FILES_DIRECTORY . $himg["mainfolder"] . $himg["filenamethumb"] ?>" class="img-responsive" alt="">
                              </a>
                            </div>
                            <div class="overlays">
                              <div class="col-sm-12 full-height">
                                <div class="col-xs-5 full-height">
                                  <div class="text font-montserrat"></div>
                                </div>
                                <div class="col-xs-7 full-height">
                                  <div class="text">
                                    <a data-fancybox="fancybox-2" href="<?= '/' . ENVO_FILES_DIRECTORY . $himg["mainfolder"] . $himg["filenamethumb"] ?>" data-caption="<?= $himg["shortdescription"] . ' | ' . $himg["description"] ?>" alt="">
                                      <button class="btn btn-success btn-xs btn-mini" type="button" data-toggle="tooltipEnvo" title="Zoom +">
                                        <i class="fas fa-image"></i>
                                      </button>
                                    </a>
                                    <button class="btn btn-success btn-xs btn-mini dialog-open-info" type="button" data-dialog="itemDetails" data-id="<?= $himg["id"] ?>" data-toggle="tooltipEnvo" title="Informace">
                                      <i class="fas fa-info"></i>
                                    </button>

                                    <?php if ($ENVO_MODULES_ACCESS) { ?>
                                      <button class="btn btn-success btn-xs btn-mini dialog-open-edit" type="button" data-dialog="itemDetails" data-id="<?= $himg["id"] ?>" data-toggle="tooltipEnvo" title="Editace informací">
                                        <i class="fas fa-pencil-alt"></i>
                                      </button>
                                    <?php } ?>

                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="full-width padding-10">
                              <p class="bold">Krátký Popis</p>
                              <p class="shortdesc"><?= $himg["shortdescription"] ?></p>
                            </div>
                          </div>

                        <?php } ?>

                      </div>

                    <?php } else { ?>

                      <div class="col-md-12">

                        <?php
                        // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                        echo $Html->addDiv('Nejsou dostupné žádné fotografie.', '', array('class' => 'alert'));
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
      <div id="tabs9" class="tab-pane fade">
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
                    echo $Html->addTag('h5', 'Kategorie', 'bold');
                    ?>

                    <ul class="filters">
                      <li><a href="javascript:;" class="filter" data-filter="*">Vše</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".service">Servisy</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".reconstruction">Rekonstrukce</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".installation">Instalace</a></li>
                      <li><a href="javascript:;" class="filter" data-filter=".complaint">Reklamace</a></li>
                    </ul>

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('h5', 'Vyhledat', 'bold');
                    ?>

                    <p>

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'quicksearch', '', 'quicksearch', 'form-control', array('placeholder' => 'Vyhledat ...'));
                      ?>

                    </p>

                  </div>
                  <div class="col-sm-9">

                    <?php if (!empty($ENVO_HOUSE_VIDEO) && is_array($ENVO_HOUSE_VIDEO)) { ?>

                      <div id="gallery" class="gallery">

                        <?php foreach ($ENVO_HOUSE_VIDEO as $hvideo) { ?>
                          <div class="gallery-item-<?= $hvideo["id"] . ' ' . $hvideo["category"] ?>" data-width="1" data-height="1">
                            <div class="img_container">
                              <a href="<?= '/' . ENVO_FILES_DIRECTORY . $hvideo["mainfolder"] . $hvideo["filename"] ?>" class="launch-modal" data-modal-id="modal-video">
                                <span class="video-link-icon"><i class="fa fa-play"></i></span>
                                <span class="video-link-text">Launch modal video</span>
                              </a>
                            </div>

                            <div class="overlays">
                              <div class="col-sm-12 full-height">
                                <div class="col-xs-5 full-height">
                                  <div class="text font-montserrat"></div>
                                </div>
                                <div class="col-xs-7 full-height">
                                  <div class="text">
                                    <a data-fancybox="fancybox-2" href="<?= '/' . ENVO_FILES_DIRECTORY . $hvideo["mainfolder"] . $hvideo["filename"] ?>" data-caption="<?= $hvideo["shortdescription"] . ' | ' . $hvideo["description"] ?>" alt="">
                                      <button class="btn btn-success btn-xs btn-mini" type="button" data-toggle="tooltipEnvo" title="Zoom +">
                                        <i class="fas fa-image"></i>
                                      </button>
                                    </a>
                                    <button class="btn btn-success btn-xs btn-mini dialog-open" type="button" data-dialog="itemDetails" data-id="<?= $hvideo["id"] ?>" data-toggle="tooltipEnvo" title="Informace">
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
                        echo $Html->addDiv('Nejsou dostupné žádné fotografie.', '', array('class' => 'alert'));
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

  <div id="itemDetails" class="dialog item-details">
    <div class="dialog__overlay"></div>
    <div class="dialog__content">
      <div class="container-fluid">
        <div class="row dialog__overview">
          <!-- Data over AJAX  -->
        </div>
      </div>
      <button class="close action top-right" type="button" data-dialog-close>
        <i class="fas fa-times fs-30"></i>
      </button>
    </div>
  </div>

  <!-- MODAL -->
  <div class="modal fade" id="modal-video" tabindex="-1" role="dialog" aria-labelledby="modal-video-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content" style="width: 615px;">
        <div class="modal-body">
          <div class="modal-video">
            <iframe width="585" height="400" src="<?= '/' . ENVO_FILES_DIRECTORY . $hvideo["mainfolder"] . $hvideo["filename"] ?>" frameborder="0" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_footer.php'; ?>