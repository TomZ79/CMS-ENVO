<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists('../../config.php')) die('[test.php] config.php not exist');
require_once '../../config.php';

// Functions we need for this plugin
include_once 'functions.php';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'tvtowertvchannel';
$envotable1 = DB_PREFIX . 'tvtowertvtower';
$envotable2 = DB_PREFIX . 'tvtowertvprogram';
$envotable3 = DB_PREFIX . 'tvtowerexporthistory';

// EN: Getting date of last update of programs
// CZ: Získání data poslední aktualizace programů
$resulttime = $jakdb->query('SELECT MAX(time) AS maxTime FROM ' . $envotable2);
$rowtime    = $resulttime->fetch_assoc();

$timetoday = date('d-m-Y', time());
$maxtime      = date('d.m.Y', strtotime($rowtime['maxTime']));

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// Create new PDF document
$mpdf = new mPDF(
  '',           // mode - default ''
  'A4',         // format - A4, for example, default ''
  9,            // font size - default 0
  'dejavusans', // default font family
  '15',         // margin_left
  '15',         // margin right
  '15',         // margin top
  '20',         // margin bottom
  '0',          // margin header
  '10',          // margin footer
  'L');         // L - landscape, P - portrait

// Specify the initial Display Mode when the PDF file is opened in Adobe Reader
$mpdf->SetDisplayMode('fullpage');

// Set document information
$mpdf->SetCreator('Bluesat.cz');
$mpdf->SetAuthor('Bluesat.cz');
$mpdf->SetTitle('Programová nabídka');
$mpdf->SetSubject('Programová nabídka');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// Sets a page footer
$footer = array(
  'L' => array(
    'content'    => '{DATE j-m-Y} | Bluesat.cz',
    'font-size'  => 10,
    'font-style' => '',
  ),
  'R' => array(
    'content'    => '{PAGENO} / {nb}',
    'font-size'  => 10,
    'font-style' => '',
  ),
);
$mpdf->SetFooter($footer, 'O');

$html = '<style>

          h1 {
           font-size: 40px;
           margin-top: 50px;
          }

          .table {
            border-spacing: 2px;
            width: 100%;
            max-width: 100%;
          }
          .table th {
            padding: 5px;
          }
          .table td {
            padding: 5px;
            border-bottom: 1px solid #CCC;
          }
          .center-div {
            position: absolute;
            margin: auto;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            width: 90%;
            height: 50%;
            text-align: center;
          }
        
        </style>';

// - - - - - - - - - - - - - - - - NEW PAGE - - - - - - - - - - - - -

// Add a new page
$mpdf->AddPage();

$html .= '<div class="center-div">
            <div><img src="/_files/bluesat/logo-bluesat.png"></div>
            <h1>Anténní a satelitní systémy</h1>
           </div>';

// Write html
$mpdf->WriteHTML($html);

// - - - - - - - - - - - - - - - - NEW PAGE - - - - - - - - - - - - -

// Add a new page
$mpdf->AddPage();

$html = '<div><h2>Seznam vysílačů pro Karlovarský kraj</h2></div>';

$html .= '<table class="table">';
$html .= '<tr>
            <th style="width: 10%;font-weight:bold;background-color: #037acc;color: #FFF;">ID</th>
            <th style="width: 90%;font-weight:bold;background-color: #037acc;color: #FFF;">Název vysílače</th>
          </tr>';

// EN: Getting the data about the TV Tower
// CZ: Získání dat o televizním vysílači
$result = $jakdb->query('SELECT * FROM ' . $envotable1 . ' ORDER BY id ASC');

for ($i = 1; $row = $result->fetch_assoc(); ++$i) {
  $html .= '<tr>
              <td style="text-align: center;">' . $i . '</td>
              <td style="padding-left: 20px;">' . $row['station'] . ' - ' . $row['name'] . '</td>
            </tr>';
}

$html .= '</table>';

// Write html
$mpdf->WriteHTML($html);

// - - - - - - - - - - - - - - - - NEW PAGE - - - - - - - - - - - - -

// Add a new page
$mpdf->AddPage();

// If exist row in DB get Maxtime
$num_results  = $jakdb->query('SELECT id FROM ' . $envotable2);
if ($num_results->num_rows !== 0) {
  $resulttime  = $jakdb->query('SELECT MAX(time) AS maxTime FROM ' . $envotable2);
  $rowtime     = $resulttime->fetch_assoc();
  $maxtime = 'Stav ke dni ' . date('d.m.Y', strtotime($rowtime['maxTime']));
} else {
  $maxtime = '';
}

// Create html
$html = '<div><h2>Seznam programů pro Karlovarský kraj</h2></div>';
$html .= '<div><h4>' . $maxtime . '</h4></div>';

// EN: Getting the data about the TV Tower
// CZ: Získání dat o televizním vysílači
$result1 = $jakdb->query('SELECT * FROM ' . $envotable1 . ' ORDER BY id ASC');
while ($row1 = $result1->fetch_assoc()) {

  $html .= '<div>';
  $html .= '<div><h3>' . $row1['station'] . ' - ' . $row1['name'] . '</h3></div>';

  $html .= '<table  class="table">';
  $html .= '<tr>
              <th style="width: 29%;font-weight:bold;background-color: #037acc;color: #FFF;">Název programu</th>
              <th style="width: 13%;font-weight:bold;background-color: #037acc;color: #FFF;">TV/R</th>
              <th style="width: 8%;font-weight:bold;background-color: #037acc;color: #FFF;">Kanál</th>
              <th style="width: 15%;font-weight:bold;background-color: #037acc;color: #FFF;">Kmitočet kanálu</th>
              <th style="width: 20%;font-weight:bold;background-color: #037acc;color: #FFF;">Název sítě</th>
              <th style="width: 15%;font-weight:bold;background-color: #037acc;color: #FFF;">Technologie vysílání</th>
            </tr>';

  // EN: Getting the data about the channel of TV Tower
  // CZ: Získání dat o kanálu televizního vysílače
  $result2 = $jakdb->query('SELECT * FROM ' . $envotable . ' WHERE towerid = ' . $row1['id'] . ' ORDER BY number ASC');
  while ($row2 = $result2->fetch_assoc()) {

    // EN: Getting the data about the programs of channel
    // CZ: Získání dat o programech z kanálu
    $result3 = $jakdb->query('SELECT * FROM ' . $envotable2 . ' WHERE channelid = ' . $row2['id'] . ' ORDER BY id ASC');
    while ($row3 = $result3->fetch_assoc()) {

      $html .= '<tr>
                  <td>' . $row3['name'] . '</td>
                  <td>' . (($row3['tvr'] == '1') ? 'TV' : (($row3['tvr'] == '2') ? 'Stream TV' : 'Radio')) . '</td>
                  <td>' . $row2['number'] . ' K</td>
                  <td>' . $row2['frequency'] . ' MHz</td>
                  <td>' . $row2['sitename'] . '</td>
                  <td>' . $row2['type'] . '</td>
                </tr>';
    }

  }

  $html .= '</table>';
  $html .= '</div>';

}

// Create html
$mpdf->writeHTML($html);

// - - - - - - - - - - - - - - - - STATISTIC - - - - - - - - - - - - -

// Get the users email
$dluserid = 0;
$dlemail  = "guest";
if (JAK_USERID) {
  $dluserid = JAK_USERID;
  $dlemail  = $jakuser->getVar("email");
}

// Get the users ip address
$ipa = get_ip_address();

// Insert data to DB
$jakdb->query('INSERT INTO ' . $envotable3 . ' VALUES (NULL, "' . smartsql($dluserid) . '", "' . smartsql($dlemail) . '", "Bluesat-programova-nabidka-' . $timetoday . '.pdf", "' . smartsql($ipa) . '", NOW())');

// - - - - - - - - - - - - - - - - OUTPUT - - - - - - - - - - - - -

// Output a PDF file directly to the browser
$mpdf->Output('Bluesat-programova-nabidka-' . $timetoday . '.pdf', 'D');

exit;

?>