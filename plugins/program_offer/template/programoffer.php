<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=program-offer&amp;sp=setting'; ?>

  <style>
    /* CSS Style pro Frontend Pluginu - přesunout později do vlastního souboru plugin */

    .programlogo {
      height: 19px;
    }

    /* Program je offline - již nevysílá */
    tr.offline td {
      text-decoration: line-through;
      color: #CCC;
    }

    tr.offline .programlogo {
      -webkit-filter: grayscale(1);
      filter: grayscale(1);
      opacity: 0.3;
    }

    /* Program je online - stále vysílá */
    tr.online td {

    }

    /* Select site multiplex */
    .siteselect label {
      text-align: left;
      margin-right: 20px;
      display: inline-block;
      vertical-align: middle;
    }

    .siteselect select {
      display: inline-block;
      width: auto;
      vertical-align: middle;
    }

    /* Bootstrap - Expand table rows */
    table.table-expandable > tbody > tr:nth-child(odd) {
      cursor: pointer;
    }

    table.table-expandable > tbody > tr div.table-expandable-arrow {
      background: transparent url(/plugins/program_offer/img/table-arrows.png) no-repeat scroll 0 -16px;
      width: 16px;
      height: 16px;
      display: block;
    }

    table.table-expandable > tbody > tr div.table-expandable-arrow.up {
      background-position: 0 0;
    }

    /* Div as Table */
    .rTable {
      display: table;
    }

    .rTableRow {
      display: table-row;
    }

    .rTableHeading {
      display: table-header-group;
    }

    .rTableBody {
      display: table-row-group;
    }

    .rTableFoot {
      display: table-footer-group;
    }

    .rTableCell, .rTableHead {
      display: table-cell;
      text-align: center;
      height: 30px;
      line-height: 20px;
      padding: 5px;
    }

    .rTableHead, .rTableFoot{
      font-weight: bold;
    }

  </style>
  <div class="col-md-12" style="margin: 10px 0 50px 0;">

    <div class="row" style="margin-bottom: 20px">
      <div class="col-md-12">
        <div class="pull-right">
          <span>Celkový počet vysílaných programů ze všech vysílačů: <strong> <?php echo $COUNT_TVPROGRAM_ALL; ?></strong></span>
        </div>
      </div>
    </div>
    <hr>

    <?php

    // Procházení pole se seznamem vysílačů
    if (isset($JAK_TVTOWER) && is_array($JAK_TVTOWER)) foreach ($JAK_TVTOWER as $tt) {
      // Pokud je vysílač aktivní, není uzamčen -> vypis dat o vysílači, kanálech a programech
      if ($tt['active']) {
      ?>

      <div id="tramsmitter-<?php echo $tt['varname']; ?>">
        <h4><?php echo $tt['name'] . ' - ' . $tt['station']; ?></h4>

        <div style="margin-bottom: 20px">
          <div class="form-group siteselect">
            <label for="SelectTrans<?php echo $tt['id']; ?>">Výběr Multiplexu:</label>
            <select id="SelectTrans<?php echo $tt['id']; ?>" class="form-control" title="Výběr DVB-T multiplexu ...">

              <option value="">Zobrazit vše</option>
              <?php
              // Zobrazení názvů sítí pro danný vysílač
              if (isset($JAK_TVCHANNEL_ALL) && is_array($JAK_TVCHANNEL_ALL)) {

                foreach ($JAK_TVCHANNEL_ALL as $tc) {
                  if ($tc["towerid"] == $tt['id']) {
                    // Název sítě
                    echo '<option value="' . $tc['id'] . '">' . ($tc['sitename'] ? $tc['sitename'] : 'Název sítě nenalezen') . '</option>';
                  }
                }
              }
              ?>

            </select>
          </div>


        </div>

        <div id="Transmitter<?php echo $tt['id']; ?>" class="table-responsive">
          <table class="table table-hover table-expandable">
            <thead>
            <tr>
              <th>Logo</th>
              <th>Název programu</th>
              <th>Kanál</th>
              <th>Kmitočet kanálu</th>
              <th>Název sítě</th>
              <th>Technologie vysílání</th>
            </tr>
            </thead>
            <tbody>

            <?php

            // Procházení pole se seznamem programů
            if (isset($JAK_TVPROGRAM_ALL) && is_array($JAK_TVPROGRAM_ALL)) {
              // Definice pole pro uložení kanálů dle podmínky
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
                // Procházení pole s nalezenými programy a následný výpis programů
                foreach ($foundProgram as $foundProgram) {

                  // Liché TR - základní informace o programu
                  echo '<tr class="' . (($foundProgram['online'] == 1) ? 'online' : 'offline') . '" data-mux="' . $foundProgram['channelid'] . '">';
                  echo '<td><img class="programlogo" src="' . $foundProgram['icon'] . '"></td>';
                  echo '<td>' . $foundProgram['name'] . '</td>';

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
                  echo '<td colspan="7" style="background: #edf7ee">';
                  echo '<div class="rTable col-md-12">';
                  echo '<div class="rTableRow">';
                  echo '<div class="rTableHead col-md-2">Kódování Obrazu</div>';
                  echo '<div class="rTableHead col-md-2">Kódování Zvuku</div>';
                  echo '<div class="rTableHead col-md-2">Formát Obrazu</div>';
                  echo '<div class="rTableHead col-md-3">Rozlišení Obrazu</div>';
                  echo '<div class="rTableHead col-md-3">Datový Tok Programu (Mbit/s)</div>';
                  echo '</div>';
                  echo '<div class="rTableRow">';
                  echo '<div class="rTableCell col-md-2">' . $foundProgram['videoencoding'] . '</div>';
                  echo '<div class="rTableCell col-md-2">' . $foundProgram['audioencoding'] . '</div>';
                  echo '<div class="rTableCell col-md-2">' . $foundProgram['videoformat'] . '</div>';
                  echo '<div class="rTableCell col-md-3">' . $foundProgram['videosize'] . '</div>';
                  echo '<div class="rTableCell col-md-3">' . $foundProgram['bitrate'] . '</div>';
                  echo '</div>';
                  echo '</td>';
                  echo '</tr>';
                  echo PHP_EOL; // Nový řádek ve zdrojovém kódu
                }
              } else {
                // Nebyly nalezené žádné programy dle podmínky - zobrazení infa o nulovém výsledku
                echo '<tr class="noresult"><td colspan="5">Nenalezen žádný záznam</td></tr>';
              }
            }

            ?>

            </tbody>
          </table>
        </div>

      </div>

    <?php } } else {
      // Pokud neexistuje žádný záznam s vysílači - bude zobrazeno chybové hlášení

      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
      echo $Html->addDiv('Nebyl nalezen žádný vysílač', '', array('class' => 'alert alert-danger'));

    } ?>

  </div>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>