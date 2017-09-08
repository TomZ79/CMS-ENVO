<?php include_once $BASE_PLUGIN_URL . 'int_header.php'; ?>

  <div>
    <ul class="nav nav-tabs nav-tabs-responsive">
      <li class="active">
        <a href="#tabs1" data-toggle="tab">
          <span class="text">Obecné Info</span>
        </a>
      </li>
      <li class="next">
        <a href="#tabs2" data-toggle="tab">
          <span class="text">Hlavní Kontakty</span>
        </a>
      </li>
      <li>
        <a href="#tabs3" data-toggle="tab">
          <span class="text">Nájemníci</span>
        </a>
      </li>
      <li>
        <a href="#tabs4" data-toggle="tab">
          <span class="text">Servisy</span>
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

    <div class="tab-content" style="margin-top: 30px;">
      <div id="tabs1" class="tab-pane fade in active">
        <div class="row">

          <?php if (!empty($ENVO_HOUSE_DETAIL) && is_array($ENVO_HOUSE_DETAIL)) foreach ($ENVO_HOUSE_DETAIL as $hdetail) { ?>

            <div class="col-md-6">
              <div class="card bg-white m-b">
                <div class="card-header">
                  Obecné Informace
                </div>
                <div class="card-block">
                  <p>Název Domu</p>
                  <div class="m-b">
                    <input class="form-control" type="text" value="<?php echo $hdetail["name"] ?>" disabled>
                  </div>
                  <p>Ulice</p>
                  <div class="m-b">
                    <input class="form-control" type="text" value="<?php echo $hdetail["street"] ?>" disabled>
                  </div>
                  <p>Město</p>
                  <div class="m-b">
                    <input class="form-control" type="text" value="<?php echo $hdetail["city"] ?>" disabled>
                  </div>
                  <p>PSČ</p>
                  <div class="m-b">
                    <input class="form-control" type="text" value="<?php echo $hdetail["psc"] ?>" disabled>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="card bg-white m-b">
                <div class="card-header">
                  Mapa
                </div>
                <div class="card-block">
                  <div id="google-container"></div>
                </div>
              </div>
            </div>

          <?php } ?>

        </div>
      </div>
      <div id="tabs2" class="tab-pane fade">
        <div class="row">
          <div class="col-md-12">
            <div class="card bg-white m-b">
              <div class="card-header">
                Hlavní Kontakty
              </div>
              <div class="card-block">

                <?php if (!empty($ENVO_HOUSE_CONT) && is_array($ENVO_HOUSE_CONT)) { ?>
                  <div class="table-responsive">
                    <table class="table table-bordered table-striped m-b-0">
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
      <div id="tabs3" class="tab-pane fade">
        <div class="row">

        </div>
      </div>
      <div id="tabs4" class="tab-pane fade">
        <div class="row">
          <div class="row">
            <div class="col-md-12">
              <div class="card bg-white m-b">
                <div class="card-header">
                  Servisy
                </div>
                <div class="card-block">

                  <?php if (!empty($ENVO_HOUSE_SERV) && is_array($ENVO_HOUSE_SERV)) { ?>
                    <div class="table-responsive">
                      <table class="table table-bordered table-striped m-b-0">
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
      <div id="tabs5" class="tab-pane fade">
        <div class="row">

        </div>
      </div>
      <div id="tabs6" class="tab-pane fade">

        <?php if ($JAK_MODULES) { ?>

          <div class="row">
            <div class="col-xs-12 col-sm-8 col-lg-9 m-t-10">
              <div id="upload_img" class="input-group" style="width: 100%;">
                        <span class="input-group-btn" style="width: 1%;">
                          <!-- File-clear button -->
                          <button type="button" class="btn btn-default file-clear" style="display:none;">
                            <span class="fa fa-remove"></span> Smazat
                          </button>
                          <!-- File-input button-->
                          <div class="btn btn-default file-input">
                            <span class="fa fa-folder-open"></span>
                            <span class="file-input-title">Vybrat Soubor</span>
                            <input type="file" name="input-file" id="fileinput_img" accept="image/*"/>
                          </div>
                        </span>
                <input type="text" class="form-control file-filename" style="margin-left: -1px;" disabled>
              </div>
            </div>
            <div class="col-xs-12 col-sm-4 col-lg-3 m-t-10">
              <div class="form-group">

                <?php
                // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                echo $Html->addButton('button', '', '<i class="fa fa-cloud-upload m-r-5"></i> Upload', '', 'uploadBtnImg', 'btn btn-info', array('style' => 'width: 100%;'));
                ?>

              </div>
            </div>
          </div>

        <?php } ?>

        <div class="row">
          <?php if (!empty($ENVO_HOUSE_IMG) && is_array($ENVO_HOUSE_IMG)) { ?>

            <div class="gallery">

              <?php foreach ($ENVO_HOUSE_IMG as $himg) { ?>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-6">
                  <a data-fancybox="gallery" href="<?php echo '/' . JAK_FILES_DIRECTORY . $himg["mainfolder"] . $himg["filenamethumb"]; ?>">
                    <img alt="" src="<?php echo '/' . JAK_FILES_DIRECTORY . $himg["mainfolder"] . $himg["filenamethumb"]; ?>" class="img-responsive">
                  </a>
                </div>
              <?php } ?>

            </div>

          <?php } ?>
        </div>
      </div>
    </div>

  </div>


  <style>
    /*==================================================
=            Bootstrap 3 Media Queries             =
==================================================*/


    /*==========  Mobile First Method  ==========*/

    /* Custom, iPhone Retina */
    @media only screen and (min-width : 320px) {
      .gallery a img {
        object-fit: cover;
        width: 45vw;
        height: 45vw;
      }
    }

    /* Extra Small Devices, Phones */
    @media only screen and (min-width : 480px) {

    }

    /* Small Devices, Tablets */
    @media only screen and (min-width : 768px) {

    }

    /* Medium Devices, Desktops */
    @media only screen and (min-width : 992px) {
      .gallery a img {
        object-fit: cover;
        width: 20vw;
        height: 17vw;
      }
    }

    /* Large Devices, Wide Screens */
    @media only screen and (min-width : 1200px) {
      .gallery a img {
        object-fit: cover;
        width: 30vw;
        height: 20vw;
      }
    }


    /*==========  Non-Mobile First Method  ==========*/

    /* Large Devices, Wide Screens */
    @media only screen and (max-width : 1200px) {

    }

    /* Medium Devices, Desktops */
    @media only screen and (max-width : 992px) {

    }

    /* Small Devices, Tablets */
    @media only screen and (max-width : 768px) {

    }

    /* Extra Small Devices, Phones */
    @media only screen and (max-width : 480px) {

    }

    /* Custom, iPhone Retina */
    @media only screen and (max-width : 320px) {

    }
  </style>

<?php include_once $BASE_PLUGIN_URL . 'int_footer.php'; ?>