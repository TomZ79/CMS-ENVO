<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists('../../config.php')) die('[test.php] config.php not exist');
require_once '../../config.php';

// Functions we need for this plugin
include_once 'functions.php';

// EN: Settings all the tables we need for our work
// CZ: Nastavení všech tabulek, které potřebujeme pro práci
$envotable  = DB_PREFIX . 'tvtowertvtower';
$envotable1 = DB_PREFIX . 'tvtowersidtv';
$envotable2 = DB_PREFIX . 'tvtowersidr';
$envotable3 = DB_PREFIX . 'tvtowersids';
$envotable4 = DB_PREFIX . 'tvtoweronid';
$envotable5 = DB_PREFIX . 'tvtowernid';

// EN: Getting date of last update of programs
// CZ: Získání data poslední aktualizace programů
$resulttime = $jakdb->query('SELECT  MAX(time) AS maxTime FROM ' . $envotable2);
$rowtime    = $resulttime->fetch_assoc();

$timetoday = date('d-m-Y', time());

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

// - - - - TV TOWER

$html = '<div><h2>Seznam vysílačů pro Karlovarský kraj</h2></div>';

$html .= '<table class="table">';
$html .= '<tr>
            <th style="width: 10%;font-weight:bold;background-color: #037acc;color: #FFF;">ID</th>
            <th style="width: 90%;font-weight:bold;background-color: #037acc;color: #FFF;">Název vysílače</th>
          </tr>';

// EN: Getting the data about the TV Tower
// CZ: Získání dat o televizním vysílači
$result = $jakdb->query('SELECT * FROM ' . $envotable . ' ORDER BY id ASC');

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

// - - - - ONID

// If exist row in DB get Maxtime
$num_results  = $jakdb->query('SELECT id FROM ' . $envotable4);
if ($num_results->num_rows !== 0) {
  $resulttime  = $jakdb->query('SELECT MAX(time) AS maxTime FROM ' . $envotable4);
  $rowtime     = $resulttime->fetch_assoc();
  $maxtime = 'Stav ke dni ' . date('d.m.Y', strtotime($rowtime['maxTime']));
} else {
  $maxtime = '';
}

// Create html
$html = '<div><h2>Seznam ONID (Original Network ID)</h2></div>';
$html .= '<div><h4>' . $maxtime . '</h4></div>';
$html .= '<p>Unikátní identifikátor společný pro všechny sítě v rámci konkrétní země.</p>';
$html .= '<p>Hodnota identifikátoru <em>original_network_id</em> je pro všechny sítě zemského digitálního televizního vysílání v České republice stanovena <strong>0x20CB</strong>. Tuto hodnotu identifikátoru <em>original_network_id</em> zařazují všichni operátoři vysílacích sítí pro šíření zemského digitálního vysílání do datového toku služebních informací.</p>';

$html .= '<table class="table">';
$html .= '<tr>
            <th style="width: 10%;font-weight:bold;background-color: #037acc;color: #FFF;">ID</th>
            <th style="width: 40%;font-weight:bold;background-color: #037acc;color: #FFF;">ONID</th>
            <th style="width: 40%;font-weight:bold;background-color: #037acc;color: #FFF;">Země</th>
          </tr>';

// EN: Getting all the data about ON_ID
// CZ: Získání všech dat o ON_ID
$result1 = $jakdb->query('SELECT * FROM ' . $envotable4 . ' ORDER BY onid ASC');

for ($i = 1; $row1 = $result1->fetch_assoc(); ++$i) {
  // concatenate a string, instead of calling $pdf->writeHTML()
  $html .= '<tr>
              <td style="text-align: center;">' . $i . '</td>
              <td style="padding-left: 20px;">' . $row1['onid'] . '</td>
              <td style="padding-left: 20px;">' . $row1['country'] . '</td>
            </tr>';
}

$html .= '</table>';

// - - - - NID

// If exist row in DB get Maxtime
$num_results1  = $jakdb->query('SELECT id FROM ' . $envotable5);
if ($num_results1->num_rows !== 0) {
  $resulttime1  = $jakdb->query('SELECT MAX(time) AS maxTime FROM ' . $envotable5);
  $rowtime1     = $resulttime1->fetch_assoc();
  $maxtime1 = 'Stav ke dni ' . date('d.m.Y', strtotime($rowtime1['maxTime']));
} else {
  $maxtime1 = '';
}

// Create html
$html .= '<div><h2>Seznam NID (Network ID)</h2></div>';
$html .= '<div><h4>' . $maxtime1 . '</h4></div>';
$html .= '<p>Unikátní identifikátor konkrétní sítě.</p>';
$html .= '<p>Hodnota identifikátoru <em>network_id</em> se stanovuje z rozsahu hodnot <strong>0x3101</strong> až <strong>0x3200</strong>. Hodnotu identifikátoru ve tvaru <strong>0X31zz</strong> stanovuje Úřad jako součást individuálního oprávnění k využívání rádiových kmitočtů podle konfigurace sítě obsažené v žádosti a to tak, že každá konkrétní síť s jiným obsahem musí mít odlišnou hodnotu tohoto identifikátoru.</p>';

$html .= '<table class="table">';
$html .= '<tr>
            <th style="width: 10%;font-weight:bold;background-color: #037acc;color: #FFF;">ID</th>
            <th style="width: 30%;font-weight:bold;background-color: #037acc;color: #FFF;">NID</th>
            <th style="width: 30%;font-weight:bold;background-color: #037acc;color: #FFF;">Síť</th>
            <th style="width: 30%;font-weight:bold;background-color: #037acc;color: #FFF;">Operátor</th>
          </tr>';

// EN: Getting all the data about N_ID
// CZ: Získání všech dat o N_ID
$result2 = $jakdb->query('SELECT * FROM ' . $envotable5 . ' ORDER BY nid ASC');

for ($i = 1; $row2 = $result2->fetch_assoc(); ++$i) {
  // concatenate a string, instead of calling $pdf->writeHTML()
  $html .= '<tr>
              <td style="text-align: center;">' . $i . '</td>
              <td style="padding-left: 20px;">' . $row2['nid'] . '</td>
              <td style="padding-left: 20px;">' . $row2['site'] . '</td>
              <td style="padding-left: 20px;">' . $row2['operator'] . '</td>
            </tr>';
}

$html .= '</table>';

// Write html
$mpdf->WriteHTML($html);

// - - - - - - - - - - - - - - - - NEW PAGE - - - - - - - - - - - - -

// Add a new page
$mpdf->AddPage();

// - - - - SID TV

// If exist row in DB get Maxtime
$num_results2  = $jakdb->query('SELECT id FROM ' . $envotable1);
if ($num_results2->num_rows !== 0) {
  $resulttime2  = $jakdb->query('SELECT MAX(time) AS maxTime FROM ' . $envotable1);
  $rowtime2     = $resulttime2->fetch_assoc();
  $maxtime2 = 'Stav ke dni ' . date('d.m.Y', strtotime($rowtime2['maxTime']));
} else {
  $maxtime2 = '';
}

// Create html
$html = '<div><h2>Seznam SID (Service ID) - Televizní programy</h2></div>';
$html .= '<div><h4>' . $maxtime2 . '</h4></div>';
$html .= '<p>Unikátní identifikátor konkrétní služby přenášené transportním tokem (televizní program, rozhlasový program, ostatní služby).</p>';
$html .= '<p>Hodnota identifikátoru <em>service_id</em> se stanovuje v rozsahu hodnot:</p>';
$html .= '<ul>
            <li><strong>0x0001</strong> až <strong>0x3FFF</strong> pro televizní programy</li>
            <li><strong>0x4001</strong> až <strong>0x7FFF</strong> pro rozhlasové programy</li>
            <li><strong>0x8001</strong> až <strong>0xEFFF</strong> pro ostatní služby, včetně aplikací MHP (Multimedia Home Platform)</li>
          </ul>';

$html .= '<table class="table">';
$html .= '<tr>
            <th style="width: 10%;font-weight:bold;background-color: #037acc;color: #FFF;">ID</th>
            <th style="width: 40%;font-weight:bold;background-color: #037acc;color: #FFF;">SID</th>
            <th style="width: 40%;font-weight:bold;background-color: #037acc;color: #FFF;">Název programu</th>
          </tr>';

// EN: Getting all the data about S_ID TV
// CZ: Získání všech dat o S_ID TV
$result3 = $jakdb->query('SELECT * FROM ' . $envotable1 . ' ORDER BY sid ASC');

for ($i = 1; $row3 = $result3->fetch_assoc(); ++$i) {
  // concatenate a string, instead of calling $pdf->writeHTML()
  $html .= '<tr>
              <td style="text-align: center;">' . $i . '</td>
              <td style="padding-left: 20px;">' . $row3['sid'] . '</td>
              <td style="padding-left: 20px;">' . $row3['name'] . '</td>
            </tr>';
}

$html .= '</table>';

// Write html
$mpdf->WriteHTML($html);

// - - - - - - - - - - - - - - - - NEW PAGE - - - - - - - - - - - - -

// Add a new page
$mpdf->AddPage();

// - - - - SID R

// If exist row in DB get Maxtime
$num_results3  = $jakdb->query('SELECT id FROM ' . $envotable2);
if ($num_results3->num_rows !== 0) {
  $resulttime3  = $jakdb->query('SELECT MAX(time) AS maxTime FROM ' . $envotable2);
  $rowtime3     = $resulttime3->fetch_assoc();
  $maxtime3 = 'Stav ke dni ' . date('d.m.Y', strtotime($rowtime3['maxTime']));
} else {
  $maxtime3 = '';
}

// Create html
$html = '<div><h2>Seznam SID (Service ID) - Rozhlasové programy</h2></div>';
$html .= '<div><h4>' . $maxtime3 . '</h4></div>';
$html .= '<p>Unikátní identifikátor konkrétní služby přenášené transportním tokem (televizní program, rozhlasový program, ostatní služby).</p>';
$html .= '<p>Hodnota identifikátoru <em>service_id</em> se stanovuje v rozsahu hodnot:</p>';
$html .= '<ul>
            <li><strong>0x0001</strong> až <strong>0x3FFF</strong> pro televizní programy</li>
            <li><strong>0x4001</strong> až <strong>0x7FFF</strong> pro rozhlasové programy</li>
            <li><strong>0x8001</strong> až <strong>0xEFFF</strong> pro ostatní služby, včetně aplikací MHP (Multimedia Home Platform)</li>
          </ul>';

$html .= '<table class="table">';
$html .= '<tr>
            <th style="width: 10%;font-weight:bold;background-color: #037acc;color: #FFF;">ID</th>
            <th style="width: 40%;font-weight:bold;background-color: #037acc;color: #FFF;">SID</th>
            <th style="width: 40%;font-weight:bold;background-color: #037acc;color: #FFF;">Název programu</th>
          </tr>';

// EN: Getting all the data about S_ID R
// CZ: Získání všech dat o S_ID R
$result4 = $jakdb->query('SELECT * FROM ' . $envotable2 . ' ORDER BY sid ASC');

for ($i = 1; $row4 = $result4->fetch_assoc(); ++$i) {
  // concatenate a string, instead of calling $pdf->writeHTML()
  $html .= '<tr>
              <td style="text-align: center;">' . $i . '</td>
              <td style="padding-left: 20px;">' . $row4['sid'] . '</td>
              <td style="padding-left: 20px;">' . $row4['name'] . '</td>
            </tr>';
}

$html .= '</table>';

// Write html
$mpdf->WriteHTML($html);

// - - - - - - - - - - - - - - - - NEW PAGE - - - - - - - - - - - - -

// Add a new page
$mpdf->AddPage();

// - - - - SID S

// If exist row in DB get Maxtime
$num_results4  = $jakdb->query('SELECT id FROM ' . $envotable3);
if ($num_results4->num_rows !== 0) {
  $resulttime4  = $jakdb->query('SELECT MAX(time) AS maxTime FROM ' . $envotable3);
  $rowtime4     = $resulttime4->fetch_assoc();
  $maxtime4 = 'Stav ke dni ' . date('d.m.Y', strtotime($rowtime4['maxTime']));
} else {
  $maxtime4 = '';
}

// Create html
$html = '<div><h2>Seznam SID (Service ID) - Ostatní služby</h2></div>';
$html .= '<div><h4>' . $maxtime4 . '</h4></div>';
$html .= '<p>Unikátní identifikátor konkrétní služby přenášené transportním tokem (televizní program, rozhlasový program, ostatní služby).</p>';
$html .= '<p>Hodnota identifikátoru <em>service_id</em> se stanovuje v rozsahu hodnot:</p>';
$html .= '<ul>
            <li><strong>0x0001</strong> až <strong>0x3FFF</strong> pro televizní programy</li>
            <li><strong>0x4001</strong> až <strong>0x7FFF</strong> pro rozhlasové programy</li>
            <li><strong>0x8001</strong> až <strong>0xEFFF</strong> pro ostatní služby, včetně aplikací MHP (Multimedia Home Platform)</li>
          </ul>';

$html .= '<table class="table">';
$html .= '<tr>
            <th style="width: 10%;font-weight:bold;background-color: #037acc;color: #FFF;">ID</th>
            <th style="width: 40%;font-weight:bold;background-color: #037acc;color: #FFF;">SID</th>
            <th style="width: 40%;font-weight:bold;background-color: #037acc;color: #FFF;">Název programu</th>
          </tr>';

// EN: Getting all the data about S_ID S
// CZ: Získání všech dat o S_ID S
$result5 = $jakdb->query('SELECT * FROM ' . $envotable3 . ' ORDER BY sid ASC');

for ($i = 1; $row5 = $result5->fetch_assoc(); ++$i) {
  // concatenate a string, instead of calling $pdf->writeHTML()
  $html .= '<tr>
              <td style="text-align: center;">' . $i . '</td>
              <td style="padding-left: 20px;">' . $row5['sid'] . '</td>
              <td style="padding-left: 20px;">' . $row5['name'] . '</td>
            </tr>';
}

$html .= '</table>';

// Write html
$mpdf->WriteHTML($html);

// - - - - - - - - - - - - - - - - NEW PAGE - - - - - - - - - - - - -

// Add a new page
$mpdf->AddPage();

// - - - - WIKI

$html = '<div><h2>Wiki</h2></div>';
$html .= '<p><strong>PMT (Program Map Table)</strong> obsahuje informaci o programu, každý program v multiplexu má svou PMT.</p>';
$html .= '<p><strong>PID (Packet ID)</strong> označuje datové pakety, náležející k určitému programu. Existují tedy kromě PMT_PID také video_PID, audio_PID a teletext_PID.</p>';
$html .= '<p><strong>SID (service_id)</strong> je identifikace služby (programu). Některé přijímače podle toho přiřazují data EPG (problém v minulosti, kdy byly stejné parametry v různých multiplexech).</p>';
$html .= '<p><strong>TSID (transport_stream_id)</strong> je identifikace transportního toku (multiplexu). Některé přijímače podle tohoto parametru automaticky přeladí na jiný vysílač s lepším příjmem (v minulosti problém při absenci Novy na BH).</p>';
$html .= '<p><strong>NID (network_id)</strong> je identifikace sítě (operátora, případně vysílací oblasti).
Parametry SID, TSID a NID přiděluje ČTÚ (viz příslušný dokument na webu ČTÚ).</p>';
$html .= '<p><strong>ONID (original_network_id)</strong> je identifikace přidělená mezinárodně pro každý stát - pro ČR je 0x20CB. V minulosti způsobovaly stejné parametry NID a ONID nemožnost naladit současně naše a polské programy.</p>';
$html .= '<p></p>';

// Write html
$mpdf->WriteHTML($html);

// - - - - - - - - - - - - - - - - OUTPUT - - - - - - - - - - - - -

// Output a PDF file directly to the browser
$mpdf->Output('Bluesat-identifikatory-' . $timetoday . '.pdf', 'D');

exit;

?>