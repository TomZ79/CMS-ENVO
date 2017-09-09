<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_header.php'; ?>

  <div>
    <ul class="nav nav-tabs nav-tabs-responsive">
      <li class="active">
        <a href="#tabs1" data-toggle="tab">
          <span class="text">Obecné Info</span>
        </a>
      </li>
      <li class="next">
        <a href="#tabs2" data-toggle="tab">
          <span class="text">Stav Techniky</span>
        </a>
      </li>
      <li>
        <a href="#tabs3" data-toggle="tab">
          <span class="text">Hlavní Kontakty</span>
        </a>
      </li>
      <li>
        <a href="#tabs4" data-toggle="tab">
          <span class="text">Nájemníci</span>
        </a>
      </li>
      <li>
        <a href="#tabs5" data-toggle="tab">
          <span class="text">Servisy</span>
        </a>
      </li>
      <li>
        <a href="#tabs6" data-toggle="tab">
          <span class="text">Dokumenty</span>
        </a>
      </li>
      <li>
        <a href="#tabs7" data-toggle="tab">
          <span class="text">Fotogalerie</span>
        </a>
      </li>
    </ul>

    <div class="tab-content" style="padding-top: 20px;">
      <div id="tabs1" class="tab-pane fade in active">
        <div class="row">

          <?php if (!empty($ENVO_HOUSE_DETAIL) && is_array($ENVO_HOUSE_DETAIL)) foreach ($ENVO_HOUSE_DETAIL as $hdetail) { ?>

            <div class="col-md-6">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Obecné Informace</h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
                </div>
                <div class="grid-body no-border">
                  <div class="row-fluid">
                    <div class="form-group">
                      <label class="form-label">Název Domu</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?php echo $hdetail["name"] ?>" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Ulice</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?php echo $hdetail["street"] ?>" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Město</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?php echo $hdetail["city"] ?>" disabled>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label">PSČ</label>
                      <div class="controls">
                        <input class="form-control" type="text" value="<?php echo $hdetail["psc"] ?>" disabled>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="grid simple">
                <div class="grid-title no-border">
                  <h4>Mapa</h4>
                  <div class="tools">
                    <a href="javascript:;" class="collapse"></a>
                    <a href="javascript:;" class="remove"></a>
                  </div>
                </div>
                <div class="grid-body no-border">
                  <div class="row-fluid">
                    <div id="google-container" style="height: 350px;"></div>
                  </div>
                </div>
              </div>
            </div>

          <?php } ?>

        </div>
      </div>
      <div id="tabs2" class="tab-pane fade">
        <div class="row">

        </div>
      </div>
      <div id="tabs3" class="tab-pane fade">
        <div class="row">
          <div class="col-md-12">
            <div class="grid simple">
              <div class="grid-title no-border">
                <h4>Hlavní Kontakty</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">
                <div class="row-fluid">

                  <?php if (!empty($ENVO_HOUSE_CONT) && is_array($ENVO_HOUSE_CONT)) { ?>
                    <div class="table-responsive">
                      <table class="table table-bordered">
                        <thead>
                        <tr>
                          <th>Jméno</th>
                          <th>Adresa</th>
                          <th>Telefon</th>
                          <th>Email</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($ENVO_HOUSE_CONT as $hcont) { ?>
                          <tr>
                            <td><?php echo $hcont["name"]; ?></td>
                            <td><?php echo $hcont["address"]; ?></td>
                            <td><?php echo $hcont["phone"]; ?></td>
                            <td><?php echo $hcont["email"]; ?></td>
                          </tr>
                        <?php } ?>

                        </tbody>
                      </table>
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

        </div>
      </div>
      <div id="tabs5" class="tab-pane fade">
        <div class="row">
          <div class="col-md-12">
            <div class="grid simple">
              <div class="grid-title no-border">
                <h4>Servisy</h4>
                <div class="tools">
                  <a href="javascript:;" class="collapse"></a>
                  <a href="javascript:;" class="remove"></a>
                </div>
              </div>
              <div class="grid-body no-border">
                <div class="row-fluid">

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
                            <td><?php echo $hserv["description"]; ?></td>
                            <td><?php echo $hserv["timedefault"]; ?></td>
                            <td><?php echo $hserv["timestart"]; ?></td>
                            <td><?php echo $hserv["timeend"]; ?></td>
                          </tr>
                        <?php } ?>

                        </tbody>
                      </table>
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

        </div>
      </div>
      <div id="tabs7" class="tab-pane fade">
        <div class="row">
          <div class="col-sm-12">
            <div class="grid simple">
              <div class="grid-title no-border">
                <h4>Fotogalerie</h4>
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
                    </ul>

                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('h5', 'Vyhledat', 'bold');
                    ?>

                    <p>

                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('text', 'quicksearch', '', 'quicksearch', 'form-control', array('placeholder' => 'Search Image'));
                      ?>

                    </p>

                  </div>
                  <div class="col-sm-9">

                    <?php if (!empty($ENVO_HOUSE_IMG) && is_array($ENVO_HOUSE_IMG)) { ?>

                      <div id="gallery">

                        <?php foreach ($ENVO_HOUSE_IMG as $himg) { ?>
                          <div class="gallery-item-<?php echo $himg["id"] . ' ' . $himg["category"]; ?>" data-width="1" data-height="1">
                            <div class="img_container">
                              <a data-fancybox="gallery" href="<?php echo '/' . JAK_FILES_DIRECTORY . $himg["mainfolder"] . $himg["filenamethumb"]; ?>">
                                <img src="<?php echo '/' . JAK_FILES_DIRECTORY . $himg["mainfolder"] . $himg["filenamethumb"]; ?>" class="img-responsive" alt="" >
                              </a>
                            </div>
                            <div class="overlays">
                              <div class="col-sm-12 full-height">
                                <div class="col-xs-5 full-height">
                                  <div class="text font-montserrat"></div>
                                </div>
                                <div class="col-xs-7 full-height">
                                  <div class="text">
                                    <a data-fancybox="gallery" href="<?php echo '/' . JAK_FILES_DIRECTORY . $himg["mainfolder"] . $himg["filenamethumb"]; ?>" alt="">
                                      <button class="btn btn-success btn-xs btn-mini" type="button">
                                        <i class="fa fa-image"></i>
                                      </button>
                                    </a>
                                    <button class="btn btn-success btn-xs btn-mini dialog-open" type="button" data-dialog="itemDetails">
                                      <i class="fa fa-info"></i>
                                    </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="full-width padding-10">
                              <p class="bold">Short description</p>
                              <p class="shortdesc"><?php echo $himg["shortdescription"]; ?></p>
                            </div>
                          </div>
                        <?php } ?>

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

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_footer.php'; ?>