<?php include_once APP_PATH . 'admin/template/header.php'; ?>

<?php

if (!function_exists('array_group_by')) {
  /**
   * Groups an array by a given key.
   *
   * Groups an array into arrays by a given key, or set of keys, shared between all array members.
   *
   * Based on {@author Jake Zatecky}'s {@link https://github.com/jakezatecky/array_group_by array_group_by()} function.
   * This variant allows $key to be closures.
   *ENVOModalPlugin
   * www: https://gist.github.com/mcaskill/baaee44487653e1afc0d
   *
   * @param array $array The array to have grouping performed on.
   * @param mixed $key,... The key to group or split by. Can be a _string_,
   *                       an _integer_, a _float_, or a _callable_.
   *
   *                       If the key is a callback, it must return
   *                       a valid key from the array.
   *
   *                       If the key is _NULL_, the iterated element is skipped.
   *
   *                       ```
   *                       string|int callback ( mixed $item )
   *                       ```
   *
   * @return array|null Returns a multidimensional array or `null` if `$key` is invalid.
   */
  function array_group_by(array $array, $key)
  {
    if (!is_string($key) && !is_int($key) && !is_float($key) && !is_callable($key)) {
      trigger_error('array_group_by(): The key should be a string, an integer, or a callback', E_USER_ERROR);
      return NULL;
    }
    $func = (!is_string($key) && is_callable($key) ? $key : NULL);
    $_key = $key;
    // Load the new array, splitting by the target key
    $grouped = [];
    foreach ($array as $value) {
      $key = NULL;
      if (is_callable($func)) {
        $key = call_user_func($func, $value);
      } elseif (is_object($value) && isset($value->{$_key})) {
        $key = $value->{$_key};
      } elseif (isset($value[$_key])) {
        $key = $value[$_key];
      }
      if ($key === NULL) {
        continue;
      }
      $grouped[$key][] = $value;
    }
    // Recursively build a nested grouping if more parameters are supplied
    // Each grouped array value is grouped according to the next sequential key
    if (func_num_args() > 2) {
      $args = func_get_args();
      foreach ($grouped as $key => $value) {
        $params        = array_merge([$value], array_slice($args, 2, func_num_args()));
        $grouped[$key] = call_user_func_array('array_group_by', $params);
      }
    }
    return $grouped;
  }
}

// Group data by the key
$ENVO_KU = array_group_by($ENVO_KU, 'city_name');

// Group data by the key
$ENVO_CITY = array_group_by($ENVO_CITY, 'district_name');

?>

<?php
// EN: The data was successfully stored in DB
// CZ: Data byla úspěšně uložena do DB
if ($page4 == "s") { ?>
  <script>
      // Notification
      setTimeout(function () {
          $.notify({
              // options
              message: '<?=$tl["notification"]["n7"]?>'
          }, {
              // settings
              type: 'success',
              delay: 5000
          });
      }, 1000);
  </script>
<?php } ?>

<?php
// EN: An error occurred while saving to DB
// CZ: Při ukládání do DB došlo k chybě
if ($page3 == "e") { ?>
  <script>
      // Notification
      setTimeout(function () {
          $.notify({
              // options
              message: '<?=$tl["general_error"]["generror1"]?>'
          }, {
              // settings
              type: 'danger',
              delay: 10000
          });
      }, 1000);
  </script>envo_datedministration
<?php } ?>

<?php
// EN: Checking the saved elements in the page was not successful
// CZ: Kontrola ukládaných prvků ve stránce nebyla úšpěšná
if ($errors) { ?>
  <script>
      // Notification
      setTimeout(function () {
          $.notify({
              // options
              message: '<?php if (isset($errors["e"])) echo $errors["e"];
                if (isset($errors["e1"])) echo $errors["e1"];
                if (isset($errors["e2"])) echo $errors["e2"];?>'
          }, {
              // settings
              type: 'danger',
              delay: 10000
          });
      }, 1000);
  </script>
<?php } ?>

<?php

if ($ENVO_FORM_DATA["blacklist"] == '1') {
  echo '<div class="alert alert-danger" role="alert">
					<button class="close" data-dismiss="alert"></button>
					<strong>Varování: </strong>Bytový dům je umístěn na blacklistu. Důvod umístění je uveden na kartě "Správa".
				</div>';
}

?>

<form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
  <!-- Action button block -->
  <div class="actionbtn-block d-none d-sm-block">
    
    <?php
    // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
    echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"] . ' !! ', '',
                                'btn btn-success button');
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=intranet2&amp;sp=house', $tl["button"]["btn19"], '', 'btn btn-info button');
    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
    echo $Html->addAnchor('index.php?p=intranet2&amp;sp=house&amp;ssp=newhouse', 'Nový Dům', '', 'btn btn-info button');
    ?>

  </div>

  <div id="loadingdata" style="min-height: 100%;position: absolute;z-index: 10;top: 0;left: 0;min-width: 100%;padding-left: 7px;background-color: rgba(255, 255, 255, 0.9);display: none;align-items: center;justify-content: center;"></div>

  <!-- Form Content -->
  <ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
    <li class="nav-item">
      <a href="#cmsPage1" class="active" data-toggle="tab">
        <span class="text">Nastavení</span>
      </a>
    </li>
    <li class="nav-item next">
      <a href="#cmsPage2" class="" data-toggle="tab">
        <span class="text">Detail</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage3" class="" data-toggle="tab">
        <span class="text">Popis/Složky</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage4" class="" data-toggle="tab">
        <span class="text">Správa</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage5" class="" data-toggle="tab">
        <span class="text">Vchody</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage6" class="" data-toggle="tab">
        <span class="text">Kontakty</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage7" class="" data-toggle="tab">
        <span class="text">Anténní systém</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage8" data-toggle="tab">
        <span class="text">Úkoly</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage9" data-toggle="tab">
        <span class="text">Servisy</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage10" data-toggle="tab">
        <span class="text">Dokumenty</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage11" data-toggle="tab">
        <span class="text">Fotogalerie</span>
      </a>
    </li>
    <li class="nav-item">
      <a href="#cmsPage12" data-toggle="tab">
        <span class="text">Videogalerie</span>
      </a>
    </li>
    <li class='nav-item dropdown collapsed-menu hidden'>
      <a class="dropdown-toggle" data-toggle='dropdown' href='#' role='button' aria-haspopup="true" aria-expanded="false">
        ... <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right collapsed-tabs" aria-labelledby="dropdownMenuButton"></div>
    </li>
  </ul>

  <div class="tab-content" style="overflow: visible;">
    <div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
      <div class="row">
        <div class="col-sm-6">
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Základní informace o bytovém domě', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Datum Zápisu');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_created', $ENVO_FORM_DATA["created"], '', 'form-control',
                                             array('readonly' => 'readonly'));
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Datum Poslední Změny');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_updated', $ENVO_FORM_DATA["updated"], '', 'form-control',
                                             array('readonly' => 'readonly'));
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Název Domu');
                      echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housename', $ENVO_FORM_DATA["name"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Sídlo');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_househeadquarters', $ENVO_FORM_DATA["headquarters"], '',
                                             'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Ulice');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0">
                        <div class="input-group">
                          
                          <?php
                          // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                          echo $Html->addInput('text', 'envo_housestreet', $ENVO_FORM_DATA["street"], '',
                                               'form-control');
                          ?>

                          <span class="input-group-append">

														<?php
                            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                            echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-clipboard"></i>', '',
                                                  'input-group-addon',
                                                  array('onclick' => 'copyToClipboard(\'input[name=envo_housestreet]\', this)', 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'right', 'data-original-title' => 'Zkopírovat'));
                            ?>

													</span>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Město');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0">
                        <select name="envo_housecity" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr města">
                          
                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ($ENVO_FORM_DATA["city"] == '0') ? TRUE : FALSE;
                          
                          // First blank option
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('', '', $selected);
                          
                          if (isset($ENVO_CITY) && is_array($ENVO_CITY)) {
                            foreach ($ENVO_CITY as $keydistrict => $districtitem) {
                              
                              foreach ($districtitem as $item) {
                                // Get District ID from first item - is same for all items
                                $districtid = $item["district_id"];
                                // Break loop after first iteration
                                break;
                              }
                              
                              // to know what's in $item
                              echo '<optgroup label="Okres ' . $keydistrict . '" data-district_name="' . $keydistrict . '" data-district_id="' . $districtid . '">';
                              
                              foreach ($districtitem as $c) {
                                
                                // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                echo $Html->addOption($c["id"], $c["city_name"],
                                                      ($c["id"] == $ENVO_FORM_DATA["city"]) ? TRUE : FALSE, '', '',
                                                      array('data-city_id' => $c["id"], 'data-city_name' => $c["city_name"], 'data-city_cuzk_code' => $c["city_cuzk_code"]));
                                
                              }
                              
                              echo '</optgroup>';
                              
                            }
                          }
                          
                          ?>

                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'PSČ');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housepsc', $ENVO_FORM_DATA["psc"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'IČ');
                      echo $Html->addTag('span', '*', 'star-item text-danger-800 m-l-10');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0<?php if (isset($errors["e2"])) echo " has-error"; ?>">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_houseic', $ENVO_FORM_DATA["ic"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Stát');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housestate', $ENVO_FORM_DATA["state"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              
              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '',
                                          'btn btn-success float-right');
              ?>

            </div>
          </div>
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Nastavení Fakturace', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Název');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housefname', $ENVO_FORM_DATA["housefname"], '',
                                             'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Ulice');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housefstreet', $ENVO_FORM_DATA["housefstreet"], '',
                                             'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Město');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housefcity', $ENVO_FORM_DATA["housefcity"], '',
                                             'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'PSČ');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housefpsc', $ENVO_FORM_DATA["housefpsc"], '',
                                             'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'IČ');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0<?php if (isset($errors["e7"])) echo " has-error"; ?>">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housefic', $ENVO_FORM_DATA["housefic"], '', 'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'DIČ');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-8">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_housefdic', $ENVO_FORM_DATA["housefdic"], '',
                                             'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              
              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '',
                                          'btn btn-success float-right');
              ?>

            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
              echo $Html->startTag('h3', array('class' => 'box-title'));
              echo $tl["cat_box_title"]["catbt3"];
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '', 'cms-help',
                                    array('data-content' => $tl["cat_help"]["cath3"], 'data-original-title' => $tl["cat_help"]["cath"]));
              // Add Html Element -> endTag (Arguments: tag)
              echo $Html->endTag('h3');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-sm-12">
                      <select name="envo_permission[]" multiple="multiple" class="form-control">
                        
                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        $selected = ($ENVO_FORM_DATA["permission"] == '0') ? TRUE : FALSE;
                        
                        echo $Html->addOption('0', 'Všechny skupiny', $selected);
                        if (isset($ENVO_USERGROUP) && is_array($ENVO_USERGROUP)) foreach ($ENVO_USERGROUP as $v) {
                          
                          $selected = (in_array($v["id"], explode(',', $ENVO_FORM_DATA["permission"]))) ? TRUE : FALSE;
                          echo $Html->addOption($v["id"], $v["name"], $selected);
                          
                        }
                        ?>

                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              
              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '',
                                          'btn btn-success float-right');
              ?>

            </div>
          </div>
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'ARES podle IČ', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'ARES - Upload data');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-4">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_dataares', '', '', 'form-control',
                                             array('placeholder' => 'Zadejte IČ'));
                        ?>

                      </div>
                    </div>
                    <div class="col col-sm-12 col-md-4 text-center">
                      
                      <?php
                      // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                      echo $Html->addButton('button', '', 'Upload Data', '', 'loadAres', 'btn btn-default');
                      ?>

                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Web - ARES');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-4">
                      <div class="radio radio-success">
                        
                        <?php
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_houseares', '1', ($ENVO_FORM_DATA["ares"] == '1') ? TRUE : FALSE,
                                             'envo_houseares1');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_houseares1', $tl["checkbox"]["chk"]);
                        
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_houseares', '0', ($ENVO_FORM_DATA["ares"] == '0') ? TRUE : FALSE,
                                             'envo_houseares2');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_houseares2', $tl["checkbox"]["chk1"]);
                        ?>

                      </div>
                    </div>
                    <div class="col col-sm-12 col-md-4">
                      <div id="ares_res" <?= ($ENVO_FORM_DATA["ares"] == '1') ? '' : 'style="display: none;"' ?>>
                        
                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_res.cgi?ico=' . $ENVO_FORM_DATA["ic"] . '&jazyk=cz&xml=1',
                                              'Výpis - RES', '', '', array('target' => 'WindowARES'));
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('span', '|', 'm-l-10 m-r-10');
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('https://wwwinfo.mfcr.cz/cgi-bin/ares/darv_vreo.cgi?ico=' . $ENVO_FORM_DATA["ic"] . '&jazyk=cz&xml=1',
                                              'Výpis - VREO', '', '', array('target' => 'WindowARES'));
                        ?>

                      </div>
                    </div>
                  </div>
                  <div id="outputaresdate" class="row p-3" style="background-color: #FFF5CC;display: none;"></div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              
              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '',
                                          'btn btn-success float-right');
              ?>

            </div>
          </div>
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Justice.cz', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col col-sm-12 col-md-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Web - Justice.cz');
                      ?>

                    </div>
                    <div class="col col-sm-12 col-md-4">
                      <div class="radio radio-success">
                        
                        <?php
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_housejustice', '1',
                                             ($ENVO_FORM_DATA["justice"] == '1') ? TRUE : FALSE, 'envo_housejustice1');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_housejustice1', $tl["checkbox"]["chk"]);
                        
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_housejustice', '0',
                                             ($ENVO_FORM_DATA["justice"] == '0') ? TRUE : FALSE, 'envo_housejustice2');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_housejustice2', $tl["checkbox"]["chk1"]);
                        ?>

                      </div>
                    </div>
                    <div class="col col-sm-12 col-md-4">
                      <div id="justice_vor" <?= ($ENVO_FORM_DATA["justice"] == '1') ? '' : 'style="display: none;"' ?>>
                        
                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('https://or.justice.cz/ias/ui/rejstrik-$firma?ico=' . $ENVO_FORM_DATA["ic"] . '&jenPlatne=VSECHNY',
                                              'Výpis - Justice.cz', '', '', array('target' => 'WindowJUSTICE'));
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              
              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '',
                                          'btn btn-success float-right');
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage2" role="tabpanel">
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', '<strong>1.</strong>	Načtení Hlavních GPS souřadnic', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content" id="gpscoordinate">
                  <div class="row-form" style="padding: 12px 5px;">
                    <div class="col-sm-4">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Základní adresa pro vyhledání GPS souřadnic');
                      ?>

                    </div>
                    <div class="col-sm-1 text-center">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Ulice');
                      ?>

                    </div>
                    <div class="col-sm-3">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_house_maingpsstreet', $ENVO_FORM_DATA["maingpsstreet"], '',
                                             'form-control');
                        ?>

                      </div>
                    </div>
                    <div class="col-sm-1 text-center">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Město');
                      ?>

                    </div>
                    <div class="col-sm-3">
                      <div class="form-group m-0">
                        <select name="envo_house_maingpscity" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr města">
                          
                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ($ENVO_FORM_DATA["city"] == '0') ? TRUE : FALSE;
                          
                          // First blank option
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('', '', $selected);
                          
                          if (isset($ENVO_CITY) && is_array($ENVO_CITY)) {
                            foreach ($ENVO_CITY as $keydistrict => $districtitem) {
                              
                              foreach ($districtitem as $item) {
                                // Get District ID from first item - is same for all items
                                $districtid = $item["district_id"];
                                // Break loop after first iteration
                                break;
                              }
                              
                              // to know what's in $item
                              echo '<optgroup label="Okres ' . $keydistrict . '" data-district_name="' . $keydistrict . '" data-district_id="' . $districtid . '">';
                              
                              foreach ($districtitem as $c) {
                                
                                // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                echo $Html->addOption($c["id"], $c["city_name"],
                                                      ($c["id"] == $ENVO_FORM_DATA["maingpscity"]) ? TRUE : FALSE, '',
                                                      '',
                                                      array('data-city_id' => $c["id"], 'data-city_name' => $c["city_name"], 'data-city_cuzk_code' => $c["city_cuzk_code"]));
                                
                              }
                              
                              echo '</optgroup>';
                              
                            }
                          }
                          
                          ?>

                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row-form" style="padding: 12px 5px;">
                    <div class="col-sm-3 text-center">
                      
                      <?php
                      // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                      echo $Html->addButton('button', '', 'GPS OSM', '', 'gps_osm', 'btn btn-danger m-r-10',
                                            array('disabled' => 'disabled'));
                      echo $Html->addButton('button', '', 'GPS MAPY.cz', '', 'gps_mapy', 'btn btn-danger');
                      
                      ?>

                    </div>
                    <div class="col-sm-1 text-center">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Latitude');
                      ?>

                    </div>
                    <div class="col-sm-2">
                      <div class="loadingdata_gps" style="visibility: hidden; min-height: 100%; position: absolute; z-index: 10; top: 0; left: 3px; min-width: 100%; padding-left: 7px; background-color: rgba(255, 255, 255, 0.9);display: flex;align-items: center;justify-content: center;"></div>
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_house_maingpslat', $ENVO_FORM_DATA["maingpslat"], '',
                                             'form-control');
                        ?>

                      </div>
                    </div>
                    <div class="col-sm-1 text-center">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Longitude');
                      ?>

                    </div>
                    <div class="col-sm-2">
                      <div class="loadingdata_gps" style="visibility: hidden; min-height: 100%; position: absolute; z-index: 10; top: 0; left: 3px; min-width: 100%; padding-left: 7px; background-color: rgba(255, 255, 255, 0.9);display: flex;align-items: center;justify-content: center;"></div>
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_house_maingpslng', $ENVO_FORM_DATA["maingpslng"], '',
                                             'form-control');
                        ?>

                      </div>
                    </div>
                    <div class="col-sm-3 text-center mainmaps">
                      
                      <?php
                      if (isset($ENVO_FORM_DATA["maingpslat"]) && isset($ENVO_FORM_DATA["maingpslng"])) {
                        
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('https://mapy.cz/zakladni?x=' . $ENVO_FORM_DATA["maingpslng"] . '&y=' . $ENVO_FORM_DATA["maingpslat"] . '&z=18&l=0&source=coor&id=' . $ENVO_FORM_DATA["maingpslng"] . '%2C' . $ENVO_FORM_DATA["maingpslat"],
                                              'Mapy.cz', '', 'mapycz', array('target' => 'MapGPS'));
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('span', '|', 'm-l-10 m-r-10');
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('https://www.openstreetmap.org/?mlat=' . $ENVO_FORM_DATA["maingpslat"] . '&amp;mlon=' . $ENVO_FORM_DATA["maingpslng"] . '&amp;zoom=18#map=18/' . $ENVO_FORM_DATA["maingpslat"] . '/' . $ENVO_FORM_DATA["maingpslng"],
                                              'OpenStreetMaps', '', 'openstreet', array('target' => 'MapGPS'));
                        
                      } else {
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('span',
                                           '<span class="bold text-warning-dark">Nelze zobrazit mapu (žádné GPS souřadnice)</span>',
                                           'bold text-warning-dark');
                      }
                      ?>

                    </div>
                  </div>
                  <div id="outputajaxdata_gps" class="row p-3" style="background-color: #FFF5CC;display: none;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', '<strong>2.</strong>	Katastr', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-info" role="alert">
                        <strong>Info: </strong>Automatické načtení dat přepíše po uložení zadané hodnoty
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 text-center">
                      
                      <?php
                      // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                      echo $Html->addButton('button', '', '<strong>1.</strong> ČÚZK', '', 'loadCuzk',
                                            'btn btn-danger m-b-10 m-r-10');
                      echo $Html->addButton('button', '', '<strong>2.</strong> Kód objektu I', '', 'loadObjCode1',
                                            'btn btn-danger m-b-10 m-r-10', array('disabled' => 'disabled'));
                      echo $Html->addButton('button', '', '<strong>3.</strong> Kód objektu II', '', 'loadObjCode2',
                                            'btn btn-danger m-b-10 m-r-10');
                      echo $Html->addButton('button', '', 'iKatastr', '', 'loadIkatastr',
                                            'btn btn-danger m-b-10 m-r-10');
                      ?>

                    </div>
                    <div class="col-sm-12">
                      <hr>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-6">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Obec');
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '',
                                            'cms-help',
                                            array('data-content' => '<strong>Český úřad zeměměřický a katastrální</strong><br>', 'data-original-title' => $tlint2["int2_help"]["int2h"]));
                      ?>

                    </div>
                    <div class="col-sm-6">
                      <div class="form-group m-0">
                        <select name="envo_house_cuzk_city" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr obce">
                          
                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          $selected = ($ENVO_FORM_DATA["cuzk_city"] == '0') ? TRUE : FALSE;
                          
                          // First blank option
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('', '', $selected);
                          
                          if (isset($ENVO_CITY) && is_array($ENVO_CITY)) {
                            foreach ($ENVO_CITY as $keydistrict => $districtitem) {
                              
                              foreach ($districtitem as $item) {
                                // Get District ID from first item - is same for all items
                                $districtid = $item["district_id"];
                                // Break loop after first iteration
                                break;
                              }
                              
                              // to know what's in $item
                              echo '<optgroup label="Okres ' . $keydistrict . '" data-district_name="' . $keydistrict . '" data-district_id="' . $districtid . '">';
                              
                              foreach ($districtitem as $c) {
                                
                                // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                                echo $Html->addOption($c["id"], $c["city_name"],
                                                      ($c["id"] == $ENVO_FORM_DATA["cuzk_city"]) ? TRUE : FALSE, '', '',
                                                      array('data-city_cuzk_code' => $c["city_cuzk_code"]));
                                
                              }
                              
                              echo '</optgroup>';
                              
                            }
                          }
                          
                          ?>

                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-6">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Katastrální území');
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '',
                                            'cms-help',
                                            array('data-content' => '<strong>Český úřad zeměměřický a katastrální</strong><br>', 'data-original-title' => $tlint2["int2_help"]["int2h"]));
                      ?>

                    </div>
                    <div class="col-sm-6">
                      <div class="form-group m-0">
                        <select name="envo_house_cuzk_ku" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr katastrálního území">
                          
                          <?php
                          //
                          $selected = ($ENVO_FORM_DATA["cuzk_ku_id"] == '0') ? TRUE : FALSE;
                          
                          // First blank option
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('', '', $selected);
                          
                          foreach ($ENVO_KU as $keyku => $itemku) {
                            
                            foreach ($itemku as $item) {
                              // Get City ID from first item - is same for all items
                              $cityid = $item["city_id"];
                              // Break loop after first iteration
                              break;
                            }
                            
                            // to know what's in $item
                            echo '<optgroup label="' . $keyku . '" data-city_name="' . $keyku . '" data-city_id="' . $cityid . '">';
                            
                            foreach ($itemku as $item) {
                              
                              // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                              echo $Html->addOption($item["id"], $item["ku_name"],
                                                    ($item["id"] == $ENVO_FORM_DATA["cuzk_ku_id"]) ? TRUE : FALSE, '',
                                                    '',
                                                    array('data-ku_name' => $item["ku_name"], 'data-ku_id' => $item["id"], 'data-ku_cuzk_code' => $item["ku_cuzk_code"]));
                              
                            }
                            
                            echo '</optgroup>';
                            
                          }
                          
                          ?>

                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-6">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Kód objektu');
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '',
                                            'cms-help',
                                            array('data-content' => '<strong>Český úřad zeměměřický a katastrální</strong><br>Pokud existuje více kódů pro SVJ, oddělíme tyto kódy <code>,mezera</code>', 'data-original-title' => $tlint2["int2_help"]["int2h"]));
                      ?>

                    </div>
                    <div class="col-sm-6">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_house_cuzk_objcode', $ENVO_FORM_DATA["cuzk_objcode"], '',
                                             'form-control');
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form p-t-10 p-b-10">
                    <div class="col-sm-6">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Detail stavebního objektu');
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '',
                                            'cms-help',
                                            array('data-content' => '<strong>Český úřad zeměměřický a katastrální</strong><br>Odkaz na detail stavebního objektu bude vygenerován až po zadání kódu objektu', 'data-original-title' => $tlint2["int2_help"]["int2h"]));
                      ?>

                    </div>
                    <div class="col-sm-6" id="cuzk_objdetail_link">
                      
                      <?php
                      
                      if (isset($ENVO_FORM_DATA["cuzk_objcode"])) {
                        $ocodearray = explode(', ', $ENVO_FORM_DATA["cuzk_objcode"]);
                        
                        foreach ($ocodearray as $oc) {
                          // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                          echo $Html->addAnchor('http://vdp.cuzk.cz/vdp/ruian/stavebniobjekty/' . $oc,
                                                'Zobrazit detail objektu', '', '', array('target' => 'WindowCUZK'));
                          echo '<br>';
                        }
                      } else {
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('span',
                                           '<span class="bold text-warning-dark">Nenalezeno číslo objektu</span>',
                                           'bold text-warning-dark');
                      }
                      
                      ?>

                    </div>
                  </div>
                  <div id="outputajaxdata_katastr" class="row p-3" style="background-color: #FFF5CC;display: none;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', '<strong>3.</strong>	Statistika', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-info" role="alert">
                        <strong>Info: </strong>Automatické načtení dat přepíše po uložení zadané hodnoty
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 text-center">
                      
                      <?php
                      // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                      echo $Html->addButton('button', '', '<strong>1.</strong> Statistika I', '', 'loadStatistic1',
                                            'btn btn-danger m-b-10 m-r-10');
                      echo $Html->addButton('button', '', '<strong>2.</strong> Statistika II', '', 'loadStatistic2',
                                            'btn btn-danger m-b-10', array('disabled' => 'disabled'));
                      ?>

                    </div>
                    <div class="col-sm-12">
                      <hr>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-6">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Typ využití budovy');
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '',
                                            'cms-help',
                                            array('data-content' => '<strong>Informační systém územní identifikace</strong><br>Strukturu využití budovy', 'data-original-title' => $tlint2["int2_help"]["int2h"]));
                      ?>

                    </div>
                    <div class="col-sm-6">
                      <div class="form-group m-0">
                        <select name="envo_housetypeuse" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr typu využití">
                          
                          <?php
                          //
                          $selected = ($ENVO_STATISTICAL["p_typeuse"] == '0') ? TRUE : FALSE;
                          
                          // First blank option
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('', '', $selected);
                          
                          if (isset($ENVO_TYPE_USE) && is_array($ENVO_TYPE_USE)) foreach ($ENVO_TYPE_USE as $tu) {
                            
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption($tu["id"], $tu["name"],
                                                  ($tu["id"] == $ENVO_STATISTICAL["p_typeuse"]) ? TRUE : FALSE, '', '');
                            
                          }
                          
                          ?>

                        </select>
                      </div>
                      
                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('hidden', 'envo_housetypeuse_upl', '', '', 'form-control');
                      ?>

                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-6">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Období výstavby nebo rekonstrukce');
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '',
                                            'cms-help',
                                            array('data-content' => '<strong>Sčítání lidu, domů a bytů</strong><br>Za období výstavby se považuje období, kdy byl dům předán do užívání (tzn. kolaudace).<br>Za rekonstrukci je považována stavební činnost, při níž byla část nosných nebo obvodových zdí nahrazena novými nebo <br>došlo-li k přístavbě domu, která je větší než dům původní a <br>přitom byly modernizovány i byty.', 'data-original-title' => $tlint2["int2_help"]["int2h"]));
                      ?>

                    </div>
                    <div class="col-sm-6">
                      <div class="form-group m-0">
                        <select name="envo_houseperiodconstruction" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr období">
                          
                          <?php
                          //
                          $selected = ($ENVO_STATISTICAL["p_construction"] == '0') ? TRUE : FALSE;
                          
                          // First blank option
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('', '', $selected);
                          
                          if (isset($ENVO_PERIOD_CONSTRUCTION) && is_array($ENVO_PERIOD_CONSTRUCTION)) foreach ($ENVO_PERIOD_CONSTRUCTION as $pc) {
                            
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption($pc["id"], $pc["name"],
                                                  ($pc["id"] == $ENVO_STATISTICAL["p_construction"]) ? TRUE : FALSE, '',
                                                  '');
                            
                          }
                          
                          ?>

                        </select>
                      </div>
                      
                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('hidden', 'envo_houseperiodconstruction_upl', '', '', 'form-control');
                      ?>

                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-6">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Materiál nosných zdí budovy');
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '',
                                            'cms-help',
                                            array('data-content' => '<strong>Informační systém územní identifikace</strong><br>Atribut stavebního objektu', 'data-original-title' => $tlint2["int2_help"]["int2h"]));
                      ?>

                    </div>
                    <div class="col-sm-6">
                      <div class="form-group m-0">
                        <select name="envo_housebuildingstructure" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr materiálu">
                          
                          <?php
                          //
                          $selected = ($ENVO_STATISTICAL["b_structure"] == '0') ? TRUE : FALSE;
                          
                          // First blank option
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('', '', $selected);
                          
                          if (isset($ENVO_BUILDING_STRUCTURE) && is_array($ENVO_BUILDING_STRUCTURE)) foreach ($ENVO_BUILDING_STRUCTURE as $bs) {
                            
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption($bs["id"], $bs["name"],
                                                  ($bs["id"] == $ENVO_STATISTICAL["b_structure"]) ? TRUE : FALSE, '',
                                                  '');
                            
                          }
                          
                          ?>

                        </select>
                      </div>
                      
                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('hidden', 'envo_housebuildingstructure_upl', '', '', 'form-control');
                      ?>

                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-6">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Druh domu');
                      // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                      echo $Html->addAnchor('javascript:void(0)', '<i class="fa fa-question-circle"></i>', '',
                                            'cms-help',
                                            array('data-content' => '<strong>Sčítání lidu, domů a bytů</strong><br>Druh domu dle SLDB představuje převažující využití domu <br>pro bytové a ubytovací účely dle sčítání lidu, domů a bytů.', 'data-original-title' => $tlint2["int2_help"]["int2h"]));
                      ?>

                    </div>
                    <div class="col-sm-6">
                      <div class="form-group m-0">
                        <select name="envo_housetype" class="form-control selectpicker" data-search-select2="true" data-placeholder="Výběr druhu domu">
                          
                          <?php
                          //
                          $selected = ($ENVO_STATISTICAL["p_typehouse"] == '0') ? TRUE : FALSE;
                          
                          // First blank option
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption('', '', $selected);
                          
                          if (isset($ENVO_TYPE_HOUSE) && is_array($ENVO_TYPE_HOUSE)) foreach ($ENVO_TYPE_HOUSE as $th) {
                            
                            // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                            echo $Html->addOption($th["id"], $th["name"],
                                                  ($th["id"] == $ENVO_STATISTICAL["p_typehouse"]) ? TRUE : FALSE, '',
                                                  '');
                            
                          }
                          
                          ?>

                        </select>
                      </div>
                      
                      <?php
                      // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                      echo $Html->addInput('hidden', 'envo_housetype_upl', '', '', 'form-control');
                      ?>

                    </div>
                  </div>
                  <div id="outputajaxdata_statistics" class="row p-3" style="background-color: #FFF5CC;display: none;"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage3" role="tabpanel">
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <div class="row">
                <div class="d-flex align-items-center">
                  
                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('h3', 'Popis a složky domu', 'box-title');
                  ?>

                </div>
              </div>
            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-sm-3">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Složka domu');
                      ?>

                    </div>
                    <div class="col-sm-9">
                      <div class="input-group">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', '', '/' . ENVO_FILES_DIRECTORY . $ENVO_FORM_DATA["folder"], '',
                                             'form-control', array('readonly' => 'readonly'));
                        ?>

                        <span class="input-group-append">

                              <?php
                              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                              echo $Html->addAnchor('../assets/plugins/tinymce/5.3.1/plugins/filemanager/dialog.php?type=2&lang=' . $managerlangTiny . '&fldr=' . $ENVO_FORM_DATA["folder"],
                                                    '<i class="pg-folder_alt"></i>', '', 'btn btn-info ifManager',
                                                    array('type' => 'button'));
                              ?>

                            </span>
                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-12">
                      
                      <?php
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('', '<strong>Popis bytového domu</strong>', array('class' => 'm-b-10'));
                      // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                      echo $Html->addTextarea('envo_housedescription', $ENVO_FORM_DATA["housedescription"], '10', '',
                                              array('class' => 'form-control envoEditorLarge'));
                      ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              
              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '',
                                          'btn btn-success float-right');
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage4" role="tabpanel">
      <div class="row">
        <div class="col-sm-6">
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Správa nemovitosti', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-sm-12">
                      <select name="envo_estatemanagement" class="form-control selectpicker" data-search-select2="true">
                        
                        <?php
                        // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                        $selected = ($ENVO_FORM_DATA["estatemanagement"] == '0') ? TRUE : FALSE;
                        
                        echo $Html->addOption('0', '----------------', $selected);
                        if (isset($ENVO_RESTMANA) && is_array($ENVO_RESTMANA)) foreach ($ENVO_RESTMANA as $em) {
                          
                          echo $Html->addOption($em["id"], $em["name"],
                                                ($em["id"] == $ENVO_FORM_DATA["estatemanagement"]) ? TRUE : FALSE);
                          
                        }
                        ?>

                      </select>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-12">
                      
                      <?php
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('', '<strong>Doplňující text</strong>', array('class' => 'm-b-10'));
                      // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                      echo $Html->addTextarea('envo_estatemanagementdesc', $ENVO_FORM_DATA["estatemanagementdesc"], '4',
                                              '', array('class' => 'form-control'));
                      ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              
              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '',
                                          'btn btn-success float-right');
              ?>

            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Digitální správa domu', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-sm-5">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Správa domu');
                      ?>

                    </div>
                    <div class="col-sm-7">
                      <div class="radio radio-success">
                        
                        <?php
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_houseadministration', '1',
                                             ($ENVO_FORM_DATA["administration"] == '1') ? TRUE : FALSE,
                                             'envo_houseadministration1');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_houseadministration1', $tl["checkbox"]["chk"]);
                        
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_houseadministration', '0',
                                             ($ENVO_FORM_DATA["administration"] == '0') ? TRUE : FALSE,
                                             'envo_houseadministration2');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_houseadministration2', $tl["checkbox"]["chk1"]);
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-5">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Datum převzetí do správy');
                      ?>

                    </div>
                    <div class="col-sm-7">
                      <div class="form-group m-0">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_datedministration',
                          ($ENVO_FORM_DATA["administrationdate"] ? date("d-m-Y",
                                                                        strtotime($ENVO_FORM_DATA["administrationdate"])) : ''),
                                             'datepickerTime', 'form-control', array('readonly' => 'readonly'));
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              
              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '',
                                          'btn btn-success float-right');
              ?>

            </div>
          </div>
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Blacklist', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-sm-5">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Umístění v blacklistu');
                      ?>

                    </div>
                    <div class="col-sm-7">
                      <div class="radio radio-success">
                        
                        <?php
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_houseblacklist', '1',
                                             ($ENVO_FORM_DATA["blacklist"] == '1') ? TRUE : FALSE,
                                             'envo_houseblacklist1');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_houseblacklist1', $tl["checkbox"]["chk"]);
                        
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_houseblacklist', '0',
                                             ($ENVO_FORM_DATA["blacklist"] == '0') ? TRUE : FALSE,
                                             'envo_houseblacklist2');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_houseblacklist2', $tl["checkbox"]["chk1"]);
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row-form">
                    <div class="col-sm-12">
                      
                      <?php
                      // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                      echo $Html->addLabel('', '<strong>Důvod umístění na blacklistu</strong>',
                                           array('class' => 'm-b-10'));
                      // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
                      echo $Html->addTextarea('envo_houseblacklistdesc', $ENVO_FORM_DATA["blacklistdesc"], '4', '',
                                              array('class' => 'form-control'));
                      ?>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              
              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '',
                                          'btn btn-success float-right');
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage5" role="tabpanel">
      <div class="row m-b-20">
        <div class="col-sm-12 p-l-15 p-r-15 ">
          <div class="form-inline float-lg-right float-md-right float-sm-right">
            <div class="form-group">
              <label for="name">Ulice č.p/č.e: </label>
              
              <?php
              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
              echo $Html->addInput('text', 'addEnt', '', '', 'form-control ml-2',
                                   array('style' => 'height: 35px;width: 300px;', 'placeholder' => 'Ulice č.p/č.e'));
              ?>

            </div>
            <div class="form-group">
              
              <?php
              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
              echo $Html->addButton('button', '', 'Přidat nový vchod', '', 'addEnt', 'btn btn-info ml-2',
                                    array('data-dialog' => 'entDialogAdd', 'style' => 'width: 100%;'));
              ?>

            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div id="entlist">
            
            <?php
            
            if (!empty($ENVO_FORM_DATA_ENT) && is_array($ENVO_FORM_DATA_ENT)) {
              foreach ($ENVO_FORM_DATA_ENT as $e) { ?>

                <div class="box box-success" id="ent_<?= $e["id"] ?>">
                  <div class="box-header with-border">
                    
                    <?php
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('h3', 'Vchod <span class="bold">' . $e["street"] . '</span>', 'box-title');
                    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                    echo $Html->addTag('span', 'Ent ID ' . $e["id"], 'float-right bold');
                    ?>

                  </div>
                  <div class="box-body no-padding">
                    <div class="block">
                      <div class="block-content">
                        <div class="row">
                          <div class="col-sm-5 p-3">

                            <table class="table table-hover table-condensed">
                              <caption style="caption-side: top;">
                                
                                <?php
                                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                echo $Html->addTag('span', '<strong>GPS - Koordináty</strong>', 'm-r-50');
                                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                                echo $Html->addAnchor('https://mapy.cz/zakladni?x=' . $e["gpslng"] . '&y=' . $e["gpslat"] . '&z=18&l=0&source=coor&id=' . $e["gpslng"] . '%2C' . $e["gpslat"],
                                                      'Zobrazit na Mapy.cz', '', 'mapycz', array('target' => 'MapGPS'));
                                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                echo $Html->addTag('span', '|', 'm-l-10 m-r-10');
                                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                                echo $Html->addAnchor('https://www.openstreetmap.org/?mlat=' . $e["gpslat"] . '&mlon=' . $e["gpslng"] . '&zoom=16#map=18/' . $e["gpslat"] . '/' . $e["gpslng"],
                                                      'Zobrazit na OSM', '', 'openstreet', array('target' => 'MapGPS'));
                                ?>

                              </caption>
                              <tbody>
                              <tr>
                                <th style="border-top: 1px solid rgba(230,230,230,0.7);border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('strong', 'GPS - Latitude');
                                  ?>

                                </th>
                                <td style="border-top: 1px solid rgba(230,230,230,0.7);border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('span', $e["gpslat"]);
                                  ?>

                                </td>
                              </tr>
                              <tr>
                                <th style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('strong', 'GPS - Longitude');
                                  ?>

                                </th>
                                <td style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('span', $e["gpslng"]);
                                  ?>

                                </td>
                              </tr>
                              </tbody>
                            </table>

                          </div>
                          <div class="col-sm-3 p-3">

                            <table class="table table-hover table-condensed">
                              <caption style="caption-side: top;">
                                
                                <?php
                                // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                echo $Html->addTag('span', '<strong>Technické informace</strong>');
                                ?>

                              </caption>
                              <tbody>
                              <tr>
                                <th style="border-top: 1px solid rgba(230,230,230,0.7);border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('strong', 'Výtah');
                                  ?>

                                </th>
                                <td style="border-top: 1px solid rgba(230,230,230,0.7);border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('span', ($e["elevator"] == 1 ? 'ANO' : 'NE'));
                                  ?>

                                </td>
                              </tr>
                              <tr>
                                <th style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('strong', 'Počet bytů');
                                  ?>

                                </th>
                                <td style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('span', $e["apartment"]);
                                  ?>

                                </td>
                              </tr>
                              </tbody>
                            </table>

                          </div>

                          <div class="col-sm-4 p-3">

                            <iframe src="https://api.mapy.cz/frame?params=%7B%22x%22:<?= $e["gpslng"] ?>,%22y%22:<?= $e["gpslat"] ?>,%22base%22:%221%22,%22layers%22:[],%22zoom%22:17,%22url%22:%22https:%2F%2Fmapy.cz%2Fs%2F3qQPF%22,%22mark%22:%7B%22x%22:%22<?= $e["gpslng"] ?>%22,%22y%22:%22<?= $e["gpslat"] ?>%22,%22title%22:%22<?= $e["gpslat"] ?>N,%20<?= $e["gpslng"] ?>E%22%7D,%22overview%22:false%7D&amp;width=400&amp;height=280&amp;lang=cs" width="100%" height="200" style="border:none" frameBorder="0"></iframe>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                    
                    <?php
                    // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                    // DELETE
                    echo $Html->addButton('button', '', '<i class="fa fa-trash-o"></i> Odstranění vchodu', '', '',
                                          'btn btn-danger  float-right deleteEnt',
                                          array('data-confirm-delent' => sprintf('Jste si jistý, že chcete odstranit vchod <strong>%s</strong>',
                                                                                 $e["street"]), 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"], 'data-id' => $e["id"]));
                    // EDIT
                    echo $Html->addButton('button', '', '<i class="fa fa-edit"></i> Editace vchodu', '', '',
                                          'btn btn-default float-right m-r-20 editEnt',
                                          array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"], 'data-dialog' => 'entDialogEdit', 'data-id' => $e["id"]));
                    ?>

                  </div>
                </div>
              
              <?php }
            } else { ?>

              <div class="col-sm-12">
                
                <?php
                // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
                ?>

              </div>
            
            <?php } ?>

          </div>
        </div>
      </div>

      <div id="entDialogAdd" class="dialog dialog-details">
        <div class="dialog__overlay"></div>
        <div class="dialog__content">
          <div class="container-fluid">
            <div class="row dialog__overview">
              <!-- Data over JQUERY  -->
            </div>
          </div>
          <div class="dialog__footer">
            <div class="col-sm-12 p-l-20 p-r-20">
              
              <?php
              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
              echo $Html->addButton('button', '', 'Kopírovat adresu', '', '',
                                    'btn btn-info m-t-20 m-l-20 float-left copyadress');
              echo $Html->addButton('button', '', 'Uložit', '', 'saveEnt', 'btn btn-success m-t-20 m-l-20 float-right');
              echo $Html->addButton('button', '', 'Zavřít', '', '', 'btn btn-info m-t-20 float-right action',
                                    array('data-dialog-close' => ''));
              ?>

            </div>
          </div>
        </div>
      </div>
      <div id="entDialogEdit" class="dialog dialog-details">
        <div class="dialog__overlay"></div>
        <div class="dialog__content">
          <div class="container-fluid">
            <div class="row dialog__overview">
              <!-- Data over AJAX  -->
            </div>
          </div>
          <div class="dialog__footer">
            <div class="col-sm-12 p-l-20 p-r-20">
              
              <?php
              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
              echo $Html->addButton('button', '', 'Kopírovat adresu', '', '',
                                    'btn btn-info m-t-20 m-l-20 float-left copyadress');
              echo $Html->addButton('button', '', 'Uložit', '', 'udpateEnt',
                                    'btn btn-success m-t-20 m-l-20 float-right');
              echo $Html->addButton('button', '', 'Zavřít', '', '', 'btn btn-info m-t-20 float-right action',
                                    array('data-dialog-close' => ''));
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage6" role="tabpanel">
      <div class="row m-b-20">
        <div class="col-sm-12 p-l-15 p-r-15 ">
          <div class="form-inline float-lg-right float-md-right float-sm-right">
            <div class="form-group">
              <label for="name">Jméno a příjmení:</label>
              
              <?php
              // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
              echo $Html->addInput('text', 'addContact', '', '', 'form-control ml-2',
                                   array('style' => 'height: 35px;width: 300px;', 'placeholder' => 'Jméno a příjmení'));
              ?>

            </div>
            <div class="form-group">
              
              <?php
              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
              echo $Html->addButton('button', '', 'Přidat nový kontakt', '', 'addContact', 'btn btn-info ml-2',
                                    array('data-dialog' => 'contDialogAdd', 'style' => 'width: 100%;'));
              ?>

            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Hlavní kontakty domu', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="row-form">
                        <div class="col-sm-2">
                          
                          <?php
                          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                          echo $Html->addTag('strong', 'Email');
                          ?>

                        </div>
                        <div class="col-sm-10">
                          <div class="form-group m-0">
                            
                            <?php
                            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                            echo $Html->addInput('text', 'envo_houseemail', $ENVO_FORM_DATA["mainemail"], '',
                                                 'form-control');
                            ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              
              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '',
                                          'btn btn-success float-right');
              ?>

            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div id="contactlist">
            
            <?php
            
            if (!empty($ENVO_FORM_DATA_CONT) && is_array($ENVO_FORM_DATA_CONT)) {
              foreach ($ENVO_FORM_DATA_CONT as $c) { ?>

                <div class="box box-success" id="cont_<?= $c["id"] ?>">
                  <div class="box-header with-border">
                    <div class="row">
                      <div class="col-12 col-sm-8">
                        <div class="thumbnail-wrapper d32 circular b-white m-r-5 b-a b-white">
                          <img width="35" height="35" src="<?= $c["genderimg"] ?>">
                        </div>
                        
                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('h3',
                                           'Jméno a příjmení: <span class="bold">' . $c["degree"] . ' ' . $c["name"] . ' ' . $c["surname"] . '</span>',
                                           'box-title');
                        ?>

                      </div>
                      <div class="col-12 col-sm-4">
                        
                        <?php
                        // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                        echo $Html->addTag('span', 'Cont ID ' . $c["id"], 'float-right bold',
                                           array('style' => 'line-height: 33px;'));
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="box-body no-padding">
                    <div class="block">
                      <div class="block-content">
                        <div class="row">
                          <div class="col-sm-7 p-3">

                            <table class="table table-hover table-condensed">
                              <tbody>
                              <tr>
                                <th style="border-top: 1px solid rgba(230,230,230,0.7);border-bottom: 1px solid rgba(230,230,230,0.7);width: 30%;">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('strong', 'Adresa bydliště');
                                  ?>

                                </th>
                                <td style="border-top: 1px solid rgba(230,230,230,0.7);border-bottom: 1px solid rgba(230,230,230,0.7);width: 70%;">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('span', $c["address"]);
                                  ?>

                                </td>
                              </tr>
                              <tr>
                                <th style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('strong', 'Telefon');
                                  ?>

                                </th>
                                <td style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('span', $c["phone"]);
                                  ?>

                                </td>
                              </tr>
                              <tr>
                                <th style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('strong', 'Email');
                                  ?>

                                </th>
                                <td style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('span', $c["email"]);
                                  ?>

                                </td>
                              </tr>
                              <tr>
                                <th style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('strong', 'Facebook');
                                  ?>

                                </th>
                                <td style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('span', $c["facebook"]);
                                  ?>

                                </td>
                              </tr>
                              <tr>
                                <th style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('strong', 'Funkce');
                                  ?>

                                </th>
                                <td style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('span', $c["status"]);
                                  ?>

                                </td>
                              </tr>
                              <tr>
                                <th style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('strong', 'Datum narození');
                                  ?>

                                </th>
                                <td style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('span', $c["birthdate"]);
                                  ?>

                                </td>
                              </tr>
                              <tr>
                                <th style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('strong', 'Pohlaví');
                                  ?>

                                </th>
                                <td style="border-top: none;border-bottom: 1px solid rgba(230,230,230,0.7);">
                                  
                                  <?php
                                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                                  echo $Html->addTag('span', $c["gender"]);
                                  ?>

                                </td>
                              </tr>
                              </tbody>
                            </table>

                          </div>
                          <div class="col-sm-5 p-3">
                            
                            <?php
                            // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                            echo $Html->addLabel('', '<strong>Popis</strong>', array('class' => 'm-b-10'));
                            // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                            echo $Html->addDiv($c["description"]);
                            ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="box-footer">
                    
                    <?php
                    // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                    // DELETE
                    echo $Html->addButton('button', '', '<i class="fa fa-trash-o"></i> Odstranění kontaktu', '', '',
                                          'btn btn-danger  float-right deleteContact',
                                          array('data-confirm-delcont' => sprintf('Jste si jistý, že chcete odstranit kontakt <strong>%s</strong>',
                                                                                  $c["degree"] . ' ' . $c["name"] . ' ' . $c["surname"]), 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"], 'data-id' => $c["id"]));
                    // EDIT
                    echo $Html->addButton('button', '', '<i class="fa fa-edit"></i> Editace kontaktu', '', '',
                                          'btn btn-default float-right m-r-20 editContact',
                                          array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"], 'data-dialog' => 'contDialogEdit', 'data-id' => $c["id"]));
                    ?>

                  </div>
                </div>
              
              <?php }
            } else { ?>

              <div class="col-sm-12">
                
                <?php
                // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
                ?>

              </div>
            
            <?php } ?>

          </div>
        </div>
      </div>

      <div id="contDialogAdd" class="dialog dialog-details">
        <div class="dialog__overlay"></div>
        <div class="dialog__content">
          <div class="container-fluid">
            <div class="row dialog__overview">
              <!-- Data over JQUERY  -->
            </div>
          </div>
          <div class="dialog__footer">
            <div class="col-sm-12 p-l-20 p-r-20">
              
              <?php
              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
              echo $Html->addButton('button', '', 'Uložit', '', 'saveContact',
                                    'btn btn-success m-t-20 m-l-20 float-right');
              echo $Html->addButton('button', '', 'Zavřít', '', '', 'btn btn-info m-t-20 float-right action',
                                    array('data-dialog-close' => ''));
              ?>

            </div>
          </div>
        </div>
      </div>
      <div id="contDialogEdit" class="dialog dialog-details">
        <div class="dialog__overlay"></div>
        <div class="dialog__content">
          <div class="container-fluid">
            <div class="row dialog__overview">
              <!-- Data over AJAX  -->
            </div>
          </div>
          <div class="dialog__footer">
            <div class="col-sm-12 p-l-20 p-r-20">
              
              <?php
              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
              echo $Html->addButton('button', '', 'Uložit', '', 'udpateContact',
                                    'btn btn-success m-t-20 m-l-20 float-right');
              echo $Html->addButton('button', '', 'Zavřít', '', '', 'btn btn-info m-t-20 float-right action',
                                    array('data-dialog-close' => ''));
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage7" role="tabpanel">
      <div class="row">
        <div class="col-sm-6">
          <div class="box box-success">
            <div class="box-header with-border">
              <div class="row">
                <div class="d-flex align-items-center">
                  
                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('h3', 'Základní informace', 'box-title');
                  ?>

                </div>
              </div>
            </div>
            <div class="box-body">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-sm-5">
                      
                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', 'Připravenost na DVB-T2');
                      ?>

                    </div>
                    <div class="col-sm-7">
                      <div class="radio radio-success">
                        
                        <?php
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_houseapreparednessdvbt2', '1',
                                             ($ENVO_ANTENNASYSTEM["preparedness_dvbt2"] == '1') ? TRUE : FALSE,
                                             'envo_houseapreparednessdvbt21');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_houseapreparednessdvbt21', $tl["checkbox"]["chk"]);
                        
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_houseapreparednessdvbt2', '2',
                                             ($ENVO_ANTENNASYSTEM["preparedness_dvbt2"] == '2') ? TRUE : FALSE,
                                             'envo_houseapreparednessdvbt22');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_houseapreparednessdvbt22', $tl["checkbox"]["chk1"]);
                        
                        // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
                        echo $Html->addRadio('envo_houseapreparednessdvbt2', '0',
                                             ($ENVO_ANTENNASYSTEM["preparedness_dvbt2"] == '0' || empty($ENVO_ANTENNASYSTEM["preparedness_dvbt2"])) ? TRUE : FALSE,
                                             'envo_houseapreparednessdvbt23');
                        // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
                        echo $Html->addLabel('envo_houseapreparednessdvbt23', 'Není známo');
                        
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">
              
              <?php
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '',
                                          'btn btn-success float-right');
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage8" role="tabpanel">
      <div class="row m-b-20">
        <div class="col-sm-12 p-l-15 p-r-15">
          <div class="float-lg-right float-md-right float-sm-right">
            
            <?php
            // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
            echo $Html->addButton('button', '', 'Přidat nový úkol', '', 'addTask', 'btn btn-info',
                                  array('data-dialog' => 'taskDialogAdd', 'style' => 'width: 100%;'));
            ?>

          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-12">
          <div id="tasklist">
            
            <?php if (!empty($ENVO_FORM_DATA_TASK) && is_array($ENVO_FORM_DATA_TASK)) foreach ($ENVO_FORM_DATA_TASK as $t) { ?>
              <div id="task_<?= $t["id"] ?>" class="task_<?= $t["id"] ?>">
                <div class="taskheader bg-teal-600">
                  <span>Task ID <?= $t["id"] ?></span>
                  <span class="float-right collapsetask">+</span>
                </div>
                <div class="taskinfo">
                  <div class="table-responsive">
                    <table class="table table-task">
                      <thead>
                      <tr>
                        <th>Titulek</th>
                        <th>Priorita</th>
                        <th>Status</th>
                        <th>Datum Úkolu</th>
                        <th>Datum Připomenutí</th>
                        <th></th>
                      </tr>
                      </thead>
                      <tbody>
                      <tr>
                        <td><?= $t["title"] ?></td>
                        <td><?= $t["priority"] ?></td>
                        <td><?= $t["status"] ?></td>
                        <td><?= $t["time"] ?></td>
                        <td><?= $t["reminder"] ?></td>
                        <td class="text-center">
                          
                          <?php
                          // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                          // EDIT
                          echo $Html->addButton('button', '', '<i class="fa fa-edit"></i>', '', 'editTask_' . $t["id"],
                                                'btn btn-default btn-xs m-r-20 editTask',
                                                array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i2"], 'data-dialog' => 'taskDialogEdit', 'data-id' => $t["id"]));
                          // DELETE
                          echo $Html->addButton('button', '', '<i class="fa fa-trash-o"></i>', '', '',
                                                'btn btn-danger btn-xs deleteTask',
                                                array('data-confirm-deltask' => sprintf('Jste si jistý, že chcete odstranit úkol <strong>%s</strong>',
                                                                                        $t["title"]), 'data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => $tl["icons"]["i1"], 'data-id' => $t["id"]));
                          ?>

                        </td>
                      </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                <div class="taskcontent">
                  <p><strong>Popis Úkolu:</strong></p>
                  <div class="taskdescription">
                    
                    <?php
                    if ($t["description"]) {
                      echo $t["description"];
                    } else {
                      echo '<span class="bold text-warning-dark">Úkol nemá popis</span>';
                    }
                    ?>

                  </div>
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

          </div>
        </div>
      </div>

      <div id="taskDialogAdd" class="dialog dialog-details">
        <div class="dialog__overlay"></div>
        <div class="dialog__content">
          <div class="container-fluid">
            <div class="row dialog__overview">
              <!-- Data over JQUERY  -->
            </div>
          </div>
          <div class="dialog__footer">
            <div class="col-sm-12 p-l-20 p-r-20">
              
              <?php
              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
              echo $Html->addButton('button', '', 'Uložit', '', 'saveTask',
                                    'btn btn-success m-t-20 m-l-20 float-right');
              echo $Html->addButton('button', '', 'Zavřít', '', '', 'btn btn-info m-t-20 float-right action',
                                    array('data-dialog-close' => ''));
              ?>

            </div>
          </div>
        </div>
      </div>
      <div id="taskDialogEdit" class="dialog dialog-details">
        <div class="dialog__overlay"></div>
        <div class="dialog__content">
          <div class="container-fluid">
            <div class="row dialog__overview">
              <!-- Data over AJAX  -->
            </div>
          </div>
          <div class="dialog__footer">
            <div class="col-sm-12 p-l-20 p-r-20">
              
              <?php
              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
              echo $Html->addButton('button', '', 'Uložit', '', 'udpateTask',
                                    'btn btn-success m-t-20 m-l-20 float-right');
              echo $Html->addButton('button', '', 'Zavřít', '', '', 'btn btn-info m-t-20 float-right action',
                                    array('data-dialog-close' => ''));
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage9" role="tabpanel">
      <div class="row">

      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage10" role="tabpanel">
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Seznam dokumentů', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="row" style="padding: 12px 12px 0 12px; background-color: #FEF6DD;">
                <div class="col-sm-4">
                  <div class="bold">
                    Výběr souboru
                    <span class="star-item text-danger-800 m-l-10">*</span>
                  </div>
                  <div class="form-group">
                    <div class="m-t-10">
                      <div id="upload" class="input-group">
                        <span class="input-group-addon" style="padding: 0;border: 0;display: block;">

                          <!-- File-clear button -->
                          <button type="button" class="btn btn-default file-clear" style="display:none; float: left;border-radius: 3px 0 0 3px;border-color: #ccc;margin-right: -1px;">
                            <i class="fa fa-remove"></i> Smazat
                          </button>

                          <!-- File-input button-->
                          <div class="btn btn-default file-input" style="border-radius: 3px 0 0 3px;">
                            <i class="fa fa-folder-open"></i>
                            <span class="file-input-title">Vybrat Soubor</span>
                            <input type="file" name="input-file" id="fileinput_doc" accept=".doc, .docx, .docm, .xls, .xlsx, .xlsm, .pdf, .ai, jpg, jpeg, png, rar, zip"/>
                          </div>

                        </span>
                        <input type="text" class="form-control file-filename" style="background-color: #f2f2f2;border: 1px solid #ccc;margin-left: -1px;margin-right: -1px;" disabled>
                        <span class="input-group-addon file-icon" data-toggle="tooltipEnvo" title="doc, docx, docm, xls, xlsx, xlsm, pdf, ai, jpg, jpeg, png, rar, zip" style="border: 1px solid #ccc !important;"><i class="glyphicons glyphicons-file"></i></span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div>
                    <span class="bold">Popis <span class="star-item text-danger-800 m-l-10">*</span></span>
                    
                    <?php
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('', 'Defaultní texty', 'textSelect_docu_0', 'float-right',
                                          array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => 'Výběr předdefinovaného textu'));
                    ?>
                  </div>
                  <div class="form-group  m-t-10">
                    
                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_descdocu', '', '', 'form-control',
                                         array('placeholder' => 'Popis souboru'));
                    ?>

                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="row">
                    <div class="w-100 m-t-30">
                      <div class="form-group">
                        
                        <?php
                        // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                        echo $Html->addButton('button', '', '<i class="fa fa-cloud-upload mr-1"></i> Upload', '',
                                              'uploadBtnDocu', 'btn btn-info btn-block');
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row" style="padding: 0 12px 12px 12px; background-color: #FEF6DD;">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                  <div class="m-t-10">
                    <!-- Upload Files Output -->
                    <div id="docuprogress" class="small hint-text" style="display: none;">
                      <div class="progress">
                        <div id="docuprogressbar" class="progress-bar progress-bar-warning" style="width:0"></div>
                      </div>
                      <div>
                        <span>Determinate progress </span><span id="docupercent" class="bold"></span>
                        <span> | Bytes received </span><span id="docubyterec" class="bold"></span>
                        <span> | Total bytes </span><span id="docubytetotal" class="bold"></span>
                      </div>
                    </div>
                    <p id="docuoutput" style="display: none;"></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <hr>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="table-responsive">
                    <table id="tabledocu" class="table">
                      <thead>
                      <tr>
                        <th class="text-center" style="width: 5%;">#</th>
                        <th class="text-center" style="width: 8%;">Soubor</th>
                        <th style="width: 40%;">Popis</th>
                        <th style="width: 10%;">Upload</th>
                        <th class="text-center" style="width: 10%;"></th>
                        <!-- Last 'th' is generated by Jquery plugin Tabledit -->
                      </tr>
                      </thead>
                      <tbody>
                      
                      <?php if (!empty($ENVO_FORM_DATA_DOCU) && is_array($ENVO_FORM_DATA_DOCU)) foreach ($ENVO_FORM_DATA_DOCU as $d) { ?>

                        <tr>
                          <td class="text-center"><?= $d["id"] ?></td>
                          <td class="text-center"><?= envo_extension_icon($d["fname"]) ?></td>
                          <td><?= $d["description"] ?></td>
                          <td><?= date('d.m.Y', $d['ftime']) ?></td>
                          <td class="text-center">
                            
                            <?php
                            echo '<a href="/' . ENVO_FILES_DIRECTORY . $d["fullpath"] . '" target="_blank">Zobrazit</a>';
                            echo ' | ';
                            echo '<a href="/' . ENVO_FILES_DIRECTORY . $d["fullpath"] . '" download>Stáhnout</a>';
                            ?>

                          </td>
                          <!-- Last 'td' is generated by Jquery plugin Tabledit -->
                        </tr>
                      
                      <?php } else {
                        echo '<tr class="noedit" style="height: 49px"><td colspan="6" style="vertical-align: middle;"><span class="bold text-warning-dark">Nenalezen žádný záznam</span></td></tr>';
                      } ?>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

            </div>
            <div class="box-footer">

            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage11" role="tabpanel">
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Fotogalerie', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="row" style="padding: 12px 12px 0 12px; background-color: #FEF6DD;">
                <div class="col-sm-5">
                  <div class="bold">
                    Výběr souboru
                    <span class="star-item text-danger-800 m-l-10">*</span>
                  </div>
                  <div class="m-t-10">
                    <div id="upload_img" class="input-group">
                        <span class="input-group-addon" style="padding: 0;border: 0;display: block;">

                          <!-- File-clear button -->
                          <button type="button" class="btn btn-default file-clear" style="display:none; float: left;border-radius: 3px 0 0 3px;border-color: #ccc;margin-right: -1px;">
                            <i class="fa fa-remove"></i> Smazat
                          </button>

                          <!-- File-input button-->
                          <div class="btn btn-default file-input" style="border-radius: 3px 0 0 3px;">
                            <i class="fa fa-folder-open"></i>
                            <span class="file-input-title">Vybrat Soubor</span>
                            <input type="file" name="input-file" id="fileinput_img" accept="image/*"/>
                          </div>

                        </span>
                      <input type="text" class="form-control file-filename" style="background-color: #f2f2f2;border: 1px solid #ccc;margin-left: -1px;margin-right: -1px;" disabled>
                      <span class="input-group-addon file-icon" data-toggle="tooltipEnvo" title=".jpg, .jpeg, .png, .gif" style="border: 1px solid #ccc !important;"><i class="glyphicons glyphicons-file"></i></span>
                    </div>

                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="bold">
                    Výběr kategorie
                    <span class="star-item text-danger-800 m-l-10">*</span>
                  </div>
                  <div class="form-group  m-t-10">
                    <select name="envo_imgcategory" class="form-control selectpicker" data-placeholder="Výběr kategorie">
                      
                      <?php
                      // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                      echo $Html->addOption();
                      echo $Html->addOption('*', 'Bez kategorie');
                      echo $Html->addOption('exploration', 'Obhlídka');
                      echo $Html->addOption('installation', 'Instalace');
                      echo $Html->addOption('reconstruction', 'Rekonstrukce');
                      echo $Html->addOption('service', 'Servisy');
                      echo $Html->addOption('complaint', 'Reklamace');
                      ?>

                    </select>
                  </div>
                </div>
                <div class="col-sm-5">
                  <div>
                    <span class="bold">Krátký popis <span class="star-item text-danger-800 m-l-10">*</span></span>
                    
                    <?php
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('', 'Defaultní texty', 'textSelect_docu_1', 'float-right',
                                          array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => 'Výběr předdefinovaného textu'));
                    ?>
                  </div>
                  <div class="form-group m-t-10">
                    
                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_sdescimg', '', '', 'form-control',
                                         array('placeholder' => 'Krátký popis souboru'));
                    ?>

                  </div>
                </div>
              </div>
              <div class="row" style="padding: 12px 12px 0 12px; background-color: #FEF6DD;">
                <div class="col-sm-10">
                  <div>
                    <span class="bold">Popis</span>
                  </div>
                  <div class="form-group m-t-10">
    
                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'envo_descimg', '', '', 'form-control',
                                         array('placeholder' => 'Popis souboru'));
                    ?>

                  </div>
                </div>
                <div class="col-sm-2">
                  <div class="row">
                    <div class="w-100 m-t-30">
                      <div class="form-group">
          
                        <?php
                        // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                        echo $Html->addButton('button', '', '<i class="fa fa-cloud-upload mr-1"></i> Upload', '',
                                              'uploadBtnImg', 'btn btn-info btn-block');
                        ?>

                      </div>
                    </div>
                  </div>
                </div>
                <hr>
              </div>
              <div class="row" style="padding: 0 12px 12px 12px; background-color: #FEF6DD;">
                <div class="col-sm-6">

                </div>
                <div class="col-sm-6">
                  <div class="m-t-10">
                    <!-- Upload Files Output -->
                    <div id="imgprogress" class="small hint-text" style="display: none;">
                      <div class="progress">
                        <div id="imgprogressbar" class="progress-bar progress-bar-warning" style="width:0"></div>
                      </div>
                      <div>
                        <span>Determinate progress </span><span id="imgpercent" class="bold"></span>
                        <span> | Bytes received </span><span id="imgbyterec" class="bold"></span>
                        <span> | Total bytes </span><span id="imgbytetotal" class="bold"></span>
                      </div>
                    </div>
                    <p id="imgoutput" style="display: none;"></p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <hr>
                  <button type="button" id="showPhotoList" class="btn btn-complete btn-cons">
                    <span>Seznam</span>
                  </button>

                  <button type="button" id="showFiltrPhoto" class="btn btn-info btn-cons">
                    <span>Filtr / Editace</span>
                  </button>
                  <hr>
                </div>
              </div>
              <div class="row">
                <div id="imgcount" class="col-sm-12 padding-10">
                  
                  <?php
                  if (!empty($ENVO_FORM_DATA_IMG_COUNT) && is_array($ENVO_FORM_DATA_IMG_COUNT)) {
                    foreach ($ENVO_FORM_DATA_IMG_COUNT as $img_c) {
                      echo '<span class="bold">' . $img_c["year"] . '</span> -> <span>Počet: ' . $img_c["countimg"] . '</span> / ';
                    }
                  }
                  ?>
                </div>
                <div class="col-sm-12">
                  <hr>
                </div>
              </div>
              <div id="list_photo" class="row">
                <div class="col-sm-12">
                  <div id="gallery_envo_0" class="gallery_envo">

                    <div id="dateblock_0" class="dateblock_0 m-b-20 clearfix" style="display: none">
                      <div id="dateblock_0_header" class="padding-10 m-b-20" style="background-color: #FFE858;color:#000;font-weight:700;">
                        New Uploaded
                      </div>
                    </div>
                    
                    <?php
                    
                    if (!empty($test0_array) && is_array($test0_array)) {
                      
                      foreach ($test0_array as $subarray) {
                        
                        // Get first value 'timedefault'
                        echo '<div class="dateblock_' . uniqid() . ' m-b-20 clearfix">';
                        echo '<div class="padding-10 m-b-20" style="background:gray;color:white;font-weight:700;">' . reset($subarray) . '</div>';
                        
                        // Loop photos array
                        foreach ($subarray['photos'] as $imgarray) {
                          
                          echo '<div id="gallery_0_' . $imgarray["id"] . '" class="gallery-item-' . $imgarray["id"] . ' ' . $imgarray["category"] . ' float-left" data-width="1" data-height="1" style="margin: 5px;">';
                          
                          echo '<div class="img_container"><img src="/' . ENVO_FILES_DIRECTORY . $imgarray["mainfolder"] . $imgarray["filenamethumb"] . '" alt=""></div>';
                          
                          echo '<div class="overlays">
                                <div class="row full-height">
                                  <div class="col-5 full-height">
                                    <div class="text font-montserrat">' . strtoupper(pathinfo($imgarray["filenamethumb"],
                                                                                              PATHINFO_EXTENSION)) . '</div>
                                  </div>
                                  <div class="col-7 full-height">
                                    <div class="text">
                                      <a data-fancybox="gallery-0" href="/' . ENVO_FILES_DIRECTORY . $imgarray["mainfolder"] . $imgarray["filenamethumb"] . '" data-caption="' . ($imgarray["shortdescription"] ? $imgarray["shortdescription"] : "NO SHORT DESCRIPTION") . ($imgarray["description"] ? " - " . $imgarray["description"] : "") . '" class="btn btn-info btn-xs btn-mini fs-14" data-toggle="tooltipEnvo" data-placement="bottom" title="Zoom +">
                                         <i class="pg-image" style="position: relative;top: 2px;"></i>
                                      </a>
                                    </div>
                                  </div>
                                </div>
                              </div>';
                          
                          echo '<div class="full-width padding-10">';
                          
                          echo '<p><strong>Krátký Popis:</strong><span class="shortdesc m-l-10">' . $imgarray["shortdescription"] . '</span></p>';
                          echo '<p class="mb-0"><strong>Datum pořízení:</strong><span class="m-l-10">' . date($ENVO_SETTING_VAL['int2dateformat'],
                                                                                                              strtotime($imgarray["exifcreatedate"])) . '</span></p>';
                          echo '<p class="mb-0"><strong>Datum uploadu:</strong><span class="m-l-10">' . date("d/m/Y",
                                                                                                             $imgarray["ftime"]) . '</span></p>';
                          
                          echo '</div>';
                          
                          echo '</div>';
                        }
                        
                        echo '</div>';
                      }
                      
                    } else {
                      
                      echo '<div class="col-sm-12">';
                      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                      echo $Html->addDiv($tl["general_error"]["generror3"], '',
                                         array('class' => 'alert bg-info text-white'));
                      echo '</div>';
                      
                    } ?>

                  </div>
                </div>
              </div>
              <div id="isotope_photo" class="row" style="display: none;">
                <div class="col-sm-3 padding-20">
                  
                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('h5', 'Kategorie', 'bold');
                  ?>

                  <ul id="imagefilters">
                    <li><a href="javascript:;" class="filter" data-filter="*">Bez kategorie</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".exploration">Obhlídka</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".installation">Instalace</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".reconstruction">Rekonstrukce</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".service">Servisy</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".complaint">Reklamace</a></li>
                  </ul>
                  
                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('h5', 'Vyhledat', 'bold');
                  ?>

                  <p>
                    
                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'quicksearch', '', 'quicksearch', 'form-control',
                                         array('placeholder' => 'Vyhledat ...'));
                    ?>

                  </p>
                </div>
                <div class="col-sm-9">
                  <div id="gallery_envo_1" class="gallery_envo">
                    
                    <?php
                    if (!empty($ENVO_FORM_DATA_IMG) && is_array($ENVO_FORM_DATA_IMG)) {
                      
                      foreach ($ENVO_FORM_DATA_IMG as $img) {
                        
                        echo '<div id="gallery_1_' . $img["id"] . '" class="gallery-item-' . $img["id"] . ' ' . $img["category"] . '" data-width="1" data-height="1">';
                        
                        echo '<div class="img_container"><img src="/' . ENVO_FILES_DIRECTORY . $img["mainfolder"] . $img["filenamethumb"] . '" alt=""></div>';
                        
                        
                        echo '<div class="overlays">
                                <div class="row full-height">
                                  <div class="col-5 full-height">
                                    <div class="text font-montserrat">' . strtoupper(pathinfo($img["filenamethumb"],
                                                                                              PATHINFO_EXTENSION)) . '</div>
                                  </div>
                                  <div class="col-7 full-height">
                                    <div class="text">
                                      <a data-fancybox="gallery-1" href="/' . ENVO_FILES_DIRECTORY . $img["mainfolder"] . $img["filenamethumb"] . '" data-caption="' . ($img["shortdescription"] ? $img["shortdescription"] : "NO SHORT DESCRIPTION") . ($img["description"] ? " - " . $img["description"] : "") . '" class="btn btn-info btn-xs btn-mini fs-14" data-toggle="tooltipEnvo" data-placement="bottom" title="Zoom +">
                                         <i class="pg-image" style="position: relative;top: 2px;"></i>
                                      </a>
                                      <button class="btn btn-info btn-xs btn-mini fs-14 dialog-open-img" type="button" data-dialog="imgDialogEdit" data-toggle="tooltipEnvo" data-placement="bottom" title="Editace Informací">
                                        <i class="fa fa-edit"></i>
                                      </button>
                                      <button class="btn btn-info btn-xs btn-mini fs-14 delete-img" type="button" data-id="' . $img["id"] . '" data-confirm-delimg="Jste si jistý, že chcete odstranit obrázek?" data-toggle="tooltipEnvo" data-placement="bottom" title="Odstranit">
                                        <i class="fa fa-trash"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>';
                        
                        echo '<div class="full-width padding-10">';
                        
                        echo '<p><strong>Krátký Popis:</strong><span class="shortdesc m-l-10">' . $img["shortdescription"] . '</span></p>';
                        echo '<p class="mb-0"><strong>Datum pořízení:</strong><span class="m-l-10">' . date($ENVO_SETTING_VAL['int2dateformat'],
                                                                                                            strtotime($img["exifcreatedate"])) . '</span></p>';
                        echo '<p class="mb-0"><strong>Datum uploadu:</strong><span class="m-l-10">' . date("d/m/Y",
                                                                                                           $img["ftime"]) . '</span></p>';
                        
                        echo '</div>';
                        
                        echo '</div>';
                        
                      }
                      
                    } ?>

                  </div>
                  
                  <?php if (!$ENVO_FORM_DATA_IMG) { ?>

                    <div class="col-sm-12 m-t-20">
                      
                      <?php
                      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                      echo $Html->addDiv($tl["general_error"]["generror3"], '',
                                         array('class' => 'alert bg-info text-white'));
                      ?>

                    </div>
                  
                  <?php } ?>


                </div>
              </div>
            </div>
            <div class="box-footer">

            </div>
          </div>
          <div id="imgDialogEdit" class="dialog dialog-details">
            <div class="dialog__overlay"></div>
            <div class="dialog__content">
              <div class="container-fluid">
                <div class="row dialog__overview" style="margin-right: -30px;margin-left: -30px;">
                  <!-- Data over AJAX  -->
                </div>
              </div>
              <div class="dialog__footer">
                <div class="row">
                  <div class="col-sm-6 p-l-20 p-r-20">
                    
                    <?php
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('#', 'Stáhnout Originál', 'imgfolderoriginal',
                                          'btn btn-success m-t-20 m-l-20 float-right', array('download' => ''));
                    ?>

                  </div>
                  <div class="col-sm-6 p-l-20 p-r-20">
                    
                    <?php
                    // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                    echo $Html->addButton('button', '', 'Uložit', '', 'udpateImg',
                                          'btn btn-success m-t-20 m-l-20 float-right');
                    echo $Html->addButton('button', '', 'Zavřít', '', '', 'btn btn-info m-t-20 float-right action',
                                          array('data-dialog-close' => ''));
                    ?>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="cmsPage12" role="tabpanel">
      <div class="row">
        <div class="col-sm-12">
          <div class="box box-success">
            <div class="box-header with-border">
              
              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('h3', 'Videogalerie', 'box-title');
              ?>

            </div>
            <div class="box-body">
              <div class="row" style="padding: 12px 12px 0 12px; background-color: #FEF6DD;">
                <div class="col">
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="bold">
                        Výběr video souboru a náhledového obrázku
                        <span class="star-item text-danger-800 m-l-10">*</span>
                      </div>
                      <!-- Upload Files -->
                      <div class="form-group">
                        <div class="row">
                          <div class="col-sm-4 col-lg-6 m-t-10">
                            <div id="upload_video" class="input-group">
													<span class="input-group-addon" style="padding: 0;border: 0;display: block;">

														<!-- File-clear button -->
														<button type="button" class="btn btn-default file-clear" style="display:none; float: left;border-radius: 3px 0 0 3px;border-color: #ccc;margin-right: -1px;">
															<i class="fa fa-remove"></i> Smazat
														</button>

                            <!-- File-input button-->
														<div class="btn btn-default file-input" style="border-radius: 3px 0 0 3px;">
															<i class="fa fa-folder-open"></i>
															<span class="file-input-title">Vybrat Soubor</span>
															<input type="file" name="input-file" id="fileinput_video" accept="video/mp4,video/x-m4v,video/*"/>
														</div>

													</span>
                              <input type="text" class="form-control file-filename" style="background-color: #f2f2f2;border: 1px solid #ccc;margin-left: -1px;margin-right: -1px;" disabled>
                              <span class="input-group-addon file-icon" data-toggle="tooltipEnvo" title=".wmv, .mp4, .mpg, .avi" style="border: 1px solid #ccc !important;"><i class="glyphicons glyphicons-facetime-video"></i></span>
                            </div>
                          </div>
                          <div class="col-sm-4 col-lg-6 m-t-10">
                            <div id="upload_videothumb" class="input-group">
                          <span class="input-group-addon" style="padding: 0;border: 0;display: block;">

                            <!-- File-clear button -->
                            <button type="button" class="btn btn-default file-clear" style="display:none; float: left;border-radius: 3px 0 0 3px;border-color: #ccc;margin-right: -1px;">
                              <i class="fa fa-remove"></i> Smazat
                            </button>

                            <!-- File-input button-->
                            <div class="btn btn-default file-input" style="border-radius: 3px 0 0 3px;">
                              <i class="fa fa-folder-open"></i>
                              <span class="file-input-title">Vybrat Soubor</span>
                              <input type="file" name="input-file" id="fileinput_videothumb" accept="image/*"/>
                            </div>

                          </span>
                              <input type="text" class="form-control file-filename" style="background-color: #f2f2f2;border: 1px solid #ccc;margin-left: -1px;margin-right: -1px;" disabled>
                              <span class="input-group-addon file-icon" data-toggle="tooltipEnvo" title=".jpg, .jpeg, .png, .gif" style="border: 1px solid #ccc !important;"><i class="glyphicons glyphicons-file"></i></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-2">
                      <div class="bold">
                        Výběr kategorie
                        <span class="star-item text-danger-800 m-l-10">*</span>
                      </div>
                      <div class="form-group m-t-10">
                        <select name="envo_videocategory" class="form-control selectpicker" data-placeholder="Výběr kategorie">
                          
                          <?php
                          // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                          echo $Html->addOption();
                          echo $Html->addOption('*', 'Bez kategorie');
                          echo $Html->addOption('exploration', 'Obhlídka');
                          echo $Html->addOption('installation', 'Instalace');
                          echo $Html->addOption('reconstruction', 'Rekonstrukce');
                          echo $Html->addOption('service', 'Servisy');
                          echo $Html->addOption('complaint', 'Reklamace');
                          ?>

                        </select>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div>
                        <span class="bold">Krátký popis <span class="star-item text-danger-800 m-l-10">*</span></span>
                        
                        <?php
                        // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                        echo $Html->addAnchor('', 'Defaultní texty', 'textSelect_docu_2', 'float-right',
                                              array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'bottom', 'title' => 'Výběr předdefinovaného textu'));
                        ?>
                      </div>
                      <div class="form-group m-t-10">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_sdescvideo', '', '', 'form-control',
                                             array('placeholder' => 'Krátký popis souboru'));
                        ?>

                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="bold">
                        Rozměry videa - šířka <span class="star-item text-danger-800 m-l-10">*</span>
                      </div>
                      <div class="form-group m-t-10">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_videowidth', '', '', 'form-control',
                                             array('placeholder' => 'Šířka videa'));
                        ?>

                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="bold">
                        Rozměry videa - výška <span class="star-item text-danger-800 m-l-10">*</span>
                      </div>
                      <div class="form-group m-t-10">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_videoheight', '', '', 'form-control',
                                             array('placeholder' => 'Výška videa'));
                        ?>

                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="bold">
                        Datum <span class="star-item text-danger-800 m-l-10">*</span>
                      </div>
                      <div class="form-group m-t-10">
                        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_videodate', '', '', 'form-control',
                                             array('placeholder' => 'Datum videa'));
                        ?>

                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-10">
                      <div>
                        <span class="bold">Popis</span>
                      </div>
                      <div class="form-group m-t-10">
        
                        <?php
                        // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                        echo $Html->addInput('text', 'envo_descvideo', '', '', 'form-control',
                                             array('placeholder' => 'Popis souboru'));
                        ?>

                      </div>
                    </div>
                    <div class="col-sm-2">
                      <div class="row">
                        <div class="w-100 m-t-30">
                          <div class="form-group">
        
                            <?php
                            // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                            echo $Html->addButton('button', '', '<i class="fa fa-cloud-upload mr-1"></i> Upload', '',
                                                  'uploadBtnVideo', 'btn btn-info', array('style' => 'width: 100%;'));
                            ?>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row m-b-30">
                    <div class="col-sm-12 m-t-10">
                      <!-- Upload Files Output -->
                      <div id="videoprogress" class="small hint-text" style="display: none;">
                        <div class="progress">
                          <div id="videoprogressbar" class="progress-bar progress-bar-warning" style="width:0"></div>
                        </div>
                        <div>
                          <span>Determinate progress </span><span id="videopercent" class="bold"></span>
                          <span> | Bytes received </span><span id="videobyterec" class="bold"></span>
                          <span> | Total bytes </span><span id="videobytetotal" class="bold"></span>
                        </div>
                      </div>
                      <p id="videooutput" style="display: none;"></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <hr>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-3 padding-20">
                  
                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('h5', 'Kategorie', 'bold');
                  ?>

                  <ul id="videofilters">
                    <li><a href="javascript:;" class="filter" data-filter="*">Bez kategorie</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".exploration">Obhlídka</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".installation">Instalace</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".reconstruction">Rekonstrukce</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".service">Servisy</a></li>
                    <li><a href="javascript:;" class="filter" data-filter=".complaint">Reklamace</a></li>
                  </ul>
                  
                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('h5', 'Vyhledat', 'bold');
                  ?>

                  <p>
                    
                    <?php
                    // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
                    echo $Html->addInput('text', 'videoquicksearch', '', 'videoquicksearch', 'form-control',
                                         array('placeholder' => 'Vyhledat ...'));
                    ?>

                  </p>
                </div>
                <div class="col-sm-9">
                  <div id="videogallery_envo" class="gallery_envo">
                    
                    <?php
                    if (!empty($ENVO_FORM_DATA_VIDEO) && is_array($ENVO_FORM_DATA_VIDEO)) {
                      
                      foreach ($ENVO_FORM_DATA_VIDEO as $video) {
                        
                        echo '<div id="' . $video["id"] . '" class="gallery-item-' . $video["id"] . ' ' . $video["category"] . '" data-width="1" data-height="1">';
                        
                        echo '<div class="img_container"><img src="/' . ENVO_FILES_DIRECTORY . $video["mainfolder"] . $video["filenamethumb"] . '" alt=""></div>';
                        
                        
                        echo '<div class="overlays">
                                <div class="row full-height">
                                  <div class="col-5 full-height">
                                    <div class="text font-montserrat">' . strtoupper(pathinfo($video["filename"],
                                                                                              PATHINFO_EXTENSION)) . '</div>
                                  </div>
                                  <div class="col-7 full-height">
                                    <div class="text">
                                      <a class="btn btn-info btn-xs btn-mini fs-14" data-fancybox data-width="' . $video["width"] . '" data-height="' . $video["height"] . '" href="https://www.bluesat.cz/' . ENVO_FILES_DIRECTORY . $video["mainfolder"] . $video["filename"] . '">
                                         <i class="pg-video" style="position: relative;top: 2px;"></i>
                                      </a>
                                      <button class="btn btn-info btn-xs btn-mini fs-14 dialog-open-video" type="button" data-dialog="videoDialogEdit">
                                        <i class="fa fa-edit"></i>
                                      </button>
                                      <button class="btn btn-info btn-xs btn-mini fs-14 delete-video" type="button" data-id="' . $video["id"] . '" data-confirm-delvideo="Jste si jistý, že chcete odstranit video?">
                                        <i class="fa fa-trash"></i>
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </div>';
                        
                        echo '<div class="full-width padding-10">';
                        
                        echo '<p><strong>Krátký Popis:</strong><span class="shortdesc m-l-10">' . $video["shortdescription"] . '</span></p>';
                        echo '<p class="mb-0"><strong>Datum videa:</strong><span class="videodate m-l-10">' . date($ENVO_SETTING_VAL['int2dateformat'],
                                                                                                                   strtotime($video["videotime"])) . '</span></p>';
                        echo '<p class="mb-0"><strong>Datum uploadu:</strong><span class="uploaddate m-l-10">' . date($ENVO_SETTING_VAL['int2dateformat'],
                                                                                                                      strtotime($video["created"])) . '</span></p>';
                        echo '</div>';
                        
                        echo '</div>';
                        
                      }
                    } ?>

                  </div>
                </div>
              </div>
            </div>
            <div class="box-footer">

            </div>
          </div>
          <div id="videoDialogEdit" class="dialog dialog-details">
            <div class="dialog__overlay"></div>
            <div class="dialog__content">
              <div class="container-fluid">
                <div class="row dialog__overview" style="margin-right: -30px;margin-left: -30px;">
                  <!-- Data over AJAX  -->
                </div>
              </div>
              <div class="dialog__footer">
                <div class="row">
                  <div class="col-sm-6 p-l-20 p-r-20">
                    
                    <?php
                    // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                    echo $Html->addAnchor('#', 'Stáhnout Video', 'videofolderoriginal',
                                          'btn btn-success m-t-20 m-l-20 float-right', array('download' => ''));
                    ?>

                  </div>
                  <div class="col-sm-6 p-l-20 p-r-20">
                    
                    <?php
                    // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
                    echo $Html->addButton('button', '', 'Uložit', '', 'udpateVideo',
                                          'btn btn-success m-t-20 m-l-20 float-right');
                    echo $Html->addButton('button', '', 'Zavřít', '', '', 'btn btn-info m-t-20 float-right action',
                                          array('data-dialog-close' => ''));
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

  <!-- Hidden element with folder path -->
  <input type="hidden" name="folderpath" value="<?= $ENVO_FORM_DATA["folder"] ?>">
  <!-- Hidden element with default house ID -->
  <input type="hidden" name="defaulthouseid" value="<?= $ENVO_FORM_DATA["id"] ?>">
</form>


<?php
include_once APP_PATH . 'plugins/intranet2/admin/modal/int2_selecttext_modal_0.php';
include_once APP_PATH . 'plugins/intranet2/admin/modal/int2_selecttext_modal_1.php';
include_once APP_PATH . 'plugins/intranet2/admin/modal/int2_selecttext_modal_2.php';
include_once APP_PATH . 'admin/template/footer.php';
?>
