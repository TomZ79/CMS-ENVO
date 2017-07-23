<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=tv-tower&amp;sp=setting'; ?>

  <div class="col-md-12" style="margin: 10px 0 50px 0;">

    <div class="row" style="margin-bottom: 20px">
      <div class="col-md-12">
        <div class="pull-left text-xs-center">
          <span><?php echo $tltt["tt_frontend_list"]["ttl"]; ?> <strong> <?php echo $COUNT_TVPROGRAM_ALL; ?></strong></span>
        </div>
        <div class="pull-right text-xs-center">
          <span><?php echo $tltt["tt_frontend_list"]["ttl1"]; ?> <strong> <?php echo $TIME_TVPROGRAM_ALL; ?></strong></span>
        </div>
      </div>
    </div>
    <hr>

    <?php

    // Procházení pole se seznamem vysílačů
    if (isset($JAK_TVTOWER) && is_array($JAK_TVTOWER)) {

      // EN: Sort array by 'name' keys
      // CZ: Setřídění pole podle 'name'
      $JAK_TVTOWER = sort_array_mutlidim($JAK_TVTOWER, 'name ASC');

      foreach ($JAK_TVTOWER as $tt) {
        // Pokud je vysílač aktivní, není uzamčen -> vypis dat o vysílači, kanálech a programech
        if ($tt['active']) {
          ?>

          <div class="row">
            <div class="col-md-12">
              <div id="tramsmitter-<?php echo $tt['varname']; ?>">
                <h4><?php echo $tt['name'] . ' - ' . $tt['station']; ?></h4>

                <div class="col-md-12" style="margin-bottom: 20px">
                  <div class="col-md-6">
                    <div class="">
                    <div class="form-group siteselect">
                      <label for="SelectTrans<?php echo $tt['id']; ?>" class="sitelabel"><?php echo $tltt["tt_frontend_list"]["ttl2"]; ?></label>
                      <div class="siteselection">
                        <select id="SelectTrans<?php echo $tt['id']; ?>" class="form-control sumoselect">

                          <option value=""><?php echo $tltt["tt_frontend_list"]["ttl3"]; ?></option>
                          <?php
                          // Zobrazení názvů sítí pro danný vysílač
                          if (isset($JAK_TVCHANNEL_ALL) && is_array($JAK_TVCHANNEL_ALL)) {
                            // Definice pole pro uložení kanálů dle podmínky
                            $foundChannel = array();

                            // Procházení pole s daty všech kanálů
                            foreach ($JAK_TVCHANNEL_ALL as $tc) {
                              if ($tc["towerid"] == $tt['id']) {
                                // Přídání kanálů vyhovujícím podmínce do pole
                                $foundChannel[] = $tc;
                              }
                            }

                            // Kontrola jestli pole s nalezenými kanály obsahuje kanály nebo je prázdné
                            if (count($foundChannel) != 0) {

                              // EN: Sort array by 'sitename' keys
                              // CZ: Setřídění pole podle 'sitename'
                              $foundChannel = sort_array_mutlidim($foundChannel, 'sitename ASC');

                              foreach ($foundChannel as $foundChannel) {
                                echo '<option value="' . $foundChannel['id'] . '">' . ($foundChannel['sitename'] ? $foundChannel['sitename'] : $tltt["tt_frontend_list"]["ttl4"]) . '</option>';
                              }
                            }
                          }
                          ?>

                        </select>
                      </div>
                    </div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="pull-right" style="margin-top: 7px;">

                      <?php

                      // Počet programů pro daný vysílač
                      if (isset($JAK_TVPROGRAM_ALL) && is_array($JAK_TVPROGRAM_ALL)) {
                        $counter = 0;
                        foreach ($JAK_TVPROGRAM_ALL as $tp) {
                          if ($tp["towerid"] == $tt['id']) {
                            $counter++;
                          }
                        }
                        echo str_replace("%s", $counter, $tltt["tt_frontend_list"]["ttl5"]);
                      }

                      ?>

                    </div>
                  </div>
                </div>

                <div class="col-md-12">
                  <div id="Transmitter<?php echo $tt['id']; ?>" class="table-responsive">
                    <table class="table table-hover table-expandable">
                      <thead>
                      <tr>
                        <th><?php echo $tltt["tt_frontend_list"]["ttl6"]; ?></th>
                        <th><?php echo $tltt["tt_frontend_list"]["ttl7"]; ?></th>
                        <th><?php echo $tltt["tt_frontend_list"]["ttl8"]; ?></th>
                        <th><?php echo $tltt["tt_frontend_list"]["ttl9"]; ?></th>
                        <th><?php echo $tltt["tt_frontend_list"]["ttl10"]; ?></th>
                        <th><?php echo $tltt["tt_frontend_list"]["ttl11"]; ?></th>
                        <th><?php echo $tltt["tt_frontend_list"]["ttl12"]; ?></th>
                      </tr>
                      </thead>
                      <tbody>

                      <?php

                      // Procházení pole se seznamem programů
                      if (isset($JAK_TVPROGRAM_ALL) && is_array($JAK_TVPROGRAM_ALL)) {
                        // Definice pole pro uložení programů dle podmínky
                        $foundProgram = array();

                        // Procházení pole s daty všech programů
                        foreach ($JAK_TVPROGRAM_ALL as $tp) {
                          // Pokud program má stejné 'towerid' jako je 'id' procházeného vysílače, potom přidej programy do pole (přidej programy do pole pro danný vysílač)
                          if ($tp["towerid"] == $tt['id']) {
                            // Přídání programů vyhovujícím podmínce do pole
                            $foundProgram[] = $tp;
                          }
                        }

                        // Kontrola jestli pole s nalezenými programy obsahuje programy nebo je prázdné
                        if (count($foundProgram) != 0) {

                          // EN: Sort array by 'channelnumber, tvr, name' keys
                          // CZ: Setřídění pole podle 'channelnumber, tvr, name'
                          $foundProgram = sort_array_mutlidim($foundProgram, 'channelnumber ASC,tvr DESC,name ASC');

                          foreach ($foundProgram as $foundProgram) {

                            // Liché TR - základní informace o programu
                            echo '<tr class="' . (($foundProgram['online'] == 1) ? 'online' : 'offline') . '" data-mux="' . $foundProgram['channelid'] . '">';
                            echo '<td><img class="programlogo" src="' . $foundProgram['icon'] . '"></td>';
                            echo '<td>' . $foundProgram['name'] . '</td>';
                            echo '<td>' . (($foundProgram['tvr'] == '1') ? $tltt["tt_frontend_list"]["ttl13"] : (($foundProgram['tvr'] == '2') ? $tltt["tt_frontend_list"]["ttl14"] : $tltt["tt_frontend_list"]["ttl15"])) . '</td>';

                            // Zobrazení čísla kanálu a informací o kanálu ve kterém je vysílán danný program
                            if (isset($JAK_TVCHANNEL_ALL) && is_array($JAK_TVCHANNEL_ALL)) {
                              foreach ($JAK_TVCHANNEL_ALL as $tc) {
                                if ($foundProgram["channelid"] == $tc['id']) {
                                  echo '<td>' . $tc['number'] . ' K</td>';  // Číslo kanálu
                                  echo '<td>' . $tc['frequency'] . ' MHz</td>';  // Kmitočet kanálu
                                  echo '<td>' . $tc['sitename'] . '</td>';  // Název sítě kanálu
                                  echo '<td>' . $tc['type'] . '</td>';      // Technologie vysílání
                                }
                              }
                            }

                            echo '</tr>';
                            echo PHP_EOL; // Nový řádek ve zdrojovém kódu

                            // Sudé TR rozšířené informace o programu
                            echo '<tr>';
                            echo '<td colspan="8" style="background: #edf7ee">';
                            echo '<div class="rTable col-md-12">';
                            echo '<div class="rTableRow">';
                            echo '<div class="rTableHead col-md-2 text-center">' . $tltt["tt_frontend_list"]["ttl16"] . '</div>';
                            echo '<div class="rTableHead col-md-2 text-center">' . $tltt["tt_frontend_list"]["ttl17"] . '</div>';
                            echo '<div class="rTableHead col-md-2 text-center">' . $tltt["tt_frontend_list"]["ttl18"] . '</div>';
                            echo '<div class="rTableHead col-md-3 text-center">' . $tltt["tt_frontend_list"]["ttl19"] . '</div>';
                            echo '<div class="rTableHead col-md-3 text-center">' . $tltt["tt_frontend_list"]["ttl20"] . '</div>';
                            echo '</div>';
                            echo '<div class="rTableRow">';
                            echo '<div class="rTableCell col-md-2 text-center">' . (isset($foundProgram['videoencoding']) ? $foundProgram['videoencoding'] : '-') . '</div>';
                            echo '<div class="rTableCell col-md-2 text-center">' . (isset($foundProgram['audioencoding']) ? $foundProgram['audioencoding'] : '-') . '</div>';
                            echo '<div class="rTableCell col-md-2 text-center">' . (isset($foundProgram['videoformat']) ? $foundProgram['videoformat'] : '-') . '</div>';
                            echo '<div class="rTableCell col-md-3 text-center">' . (isset($foundProgram['videosize']) ? $foundProgram['videosize'] : '-') . '</div>';
                            echo '<div class="rTableCell col-md-3 text-center">' . (isset($foundProgram['bitrate']) ? $foundProgram['bitrate'] : '-') . '</div>';
                            echo '</div>';
                            echo '<div class="rTableRow">';
                            echo '<div class="rTableHead col-md-12 text-left">' . $tltt["tt_frontend_list"]["ttl21"] . '</div>';
                            echo '</div>';
                            echo '<div class="rTableRow">';
                            echo '<div class="rTableCell col-md-12 text-left">' . (isset($foundProgram['services']) ? $foundProgram['services'] : '-') . '</div>';
                            echo '</div>';
                            echo '</td>';
                            echo '</tr>';
                            echo PHP_EOL; // Nový řádek ve zdrojovém kódu
                          }
                        } else {
                          // Nebyly nalezené žádné programy dle podmínky - zobrazení infa o nulovém výsledku
                          echo '<tr class="noresult"><td colspan="8">' . $tltt["tt_frontend_list"]["ttl30"] . '</td></tr>';
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
      }

    } else {
      // Pokud neexistuje žádný záznam s vysílači - bude zobrazeno chybové hlášení

      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
      echo $Html->addDiv($tltt["tt_frontend_list"]["ttl31"], '', array('class' => 'alert alert-danger'));

    } ?>

  </div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>