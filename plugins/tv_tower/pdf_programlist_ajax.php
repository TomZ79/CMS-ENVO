<?php

// EN: Include the config file ...
// CZ: Vložení konfiguračního souboru ...
if (!file_exists($_SERVER['DOCUMENT_ROOT'] . '/config.php')) die('[' . __DIR__ . '/pdf_programlist_ajax.php] => "config.php" not found');
require_once $_SERVER['DOCUMENT_ROOT'] . '/config.php';

if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])) die("Nothing to see here");

// EN: Functions we need for this plugin
include_once 'functions.php';

// EN: Set value
// CZ: Nastavení hodnot
$channelIDs = $_POST['channelIDs'];
$ids        = implode(',', $channelIDs);
$lasttower  = '';
$html       = '';
$timetoday  = date('d-m-Y', time());

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// EN: Create new PDF document
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

// EN: Specify the initial Display Mode when the PDF file is opened in Adobe Reader
$mpdf -> SetDisplayMode('fullpage');

// EN: Set document information
$mpdf -> SetCreator('Bluesat.cz');
$mpdf -> SetAuthor('Bluesat.cz');
$mpdf -> SetTitle('Programová nabídka');
$mpdf -> SetSubject('Programová nabídka');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// EN: Set the page footer
$footer = array (
	'L' => array (
		'content'    => '{DATE j-m-Y} | Bluesat.cz',
		'font-size'  => 10,
		'font-style' => '',
	),
	'R' => array (
		'content'    => '{PAGENO} / {nb}',
		'font-size'  => 10,
		'font-style' => '',
	),
);
$mpdf -> SetFooter($footer, 'O');

$html = '<style>

          h1 {
           font-size: 40px;
           margin-top: 50px;
          }

          .table {
            border-spacing: 2px;
            width: 100%;
            max-width: 100%;
            margin-bottom: 10px;
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

// EN: Add a new page
$mpdf -> AddPage();

$html .= '<div class="center-div">
            <div><img src="/_files/bluesat/logo-bluesat.png"></div>
            <h1>Anténní a satelitní systémy</h1>
           </div>';

// EN: Write html
$mpdf -> WriteHTML($html);

// - - - - - - - - - - - - - - - - NEW PAGE - - - - - - - - - - - - -

// EN: Add a new page
$mpdf -> AddPage();

// EN: Reset value
$html = '';

// EN: Get data from DB and write to output
// CZ: Získání dat z DB a výpis do výstupu
foreach ($channelIDs as $channelIDs) {
	$ids           = explode(',', $channelIDs);
	$towerid       = $ids[0];
	$channelid     = $ids[1];
	$channelnumber = $ids[2];

	if ($towerid != $lasttower) {
		$result = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'tvtowertvtower WHERE id =' . $towerid);
		$row    = $result -> fetch_assoc();

		$html .= '<div class="tramsmitter-' . $row['varname'] . '">';
		$html .= '<h3>' . $row['station'] . ' - ' . $row['name'] . '</h3>';
	}

	$html .= '<table class="table">';
	$html .= '<tr>
              <th style="width: 29%;font-weight:bold;background-color: #037acc;color: #FFF;">Název programu</th>
              <th style="width: 13%;font-weight:bold;background-color: #037acc;color: #FFF;">TV/R</th>
              <th style="width: 8%;font-weight:bold;background-color: #037acc;color: #FFF;">Kanál</th>
              <th style="width: 15%;font-weight:bold;background-color: #037acc;color: #FFF;">Kmitočet kanálu</th>
              <th style="width: 20%;font-weight:bold;background-color: #037acc;color: #FFF;">Název sítě</th>
              <th style="width: 15%;font-weight:bold;background-color: #037acc;color: #FFF;">Technologie vysílání</th>
            </tr>';

	$result1 = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'tvtowertvprogram WHERE towerid =' . $towerid . ' AND channelid =' . $channelid . ' ORDER BY tvr DESC');

	// EN: Determine the number of rows in the result from DB
	// CZ: Určení počtu řádků ve výsledku z DB
	$row_cnt = $result1 -> num_rows;

	if ($row_cnt > 0) {
		while ($row1 = $result1 -> fetch_assoc()) {

			// Liché TR - základní informace o programu
			$html .= '<tr class="' . (($row1['online'] == 1) ? 'online' : 'offline') . '">
                    <td>' . $row1['name'] . '</td>
                    <td>' . (($row1['tvr'] == '1') ? 'TV' : (($row1['tvr'] == '2') ? 'Stream TV' : 'Radio')) . '</td>';


			$result2 = $envodb -> query('SELECT * FROM ' . DB_PREFIX . 'tvtowertvchannel WHERE id =' . $channelid);

			while ($row2 = $result2 -> fetch_assoc()) {
				$html .= '<td>' . $row2['number'] . ' K</td>';  // Číslo kanálu
				$html .= '<td>' . $row2['frequency'] . ' MHz</td>';  // Kmitočet kanálu
				$html .= '<td>' . $row2['sitename'] . '</td>';  // Název sítě kanálu
				$html .= '<td>' . $row2['type'] . '</td>';      // Technologie vysílání
			}

			$html .= '</tr>';

		}
	} else {
		$html .= '<tr class="noresult">
                  <td colspan="7">Nenalezen žádný záznam</td>
                </tr>';
	}


	$html .= '</table>';

	$html      .= '</div>';
	$lasttower = $towerid;

}


// EN: Write html
$mpdf -> WriteHTML($html);

// - - - - - - - - - - - - - - - - STATISTIC - - - - - - - - - - - - -

// EN: Get email
$dluserid = 0;
$dlemail  = "guest";
if (ENVO_USERID) {
	$dluserid = ENVO_USERID;
	$dlemail  = $envouser -> getVar("email");
}

// EN: Get the users ip address
$ipa = get_ip_address();

// EN: Insert data to DB
$envodb -> query('INSERT INTO ' . DB_PREFIX . 'tvtowerexporthistory VALUES (NULL, "' . smartsql($dluserid) . '", "' . smartsql($dlemail) . '", "ajax-' . $timetoday . '.pdf", "' . smartsql($ipa) . '", NOW())');

// - - - - - - - - - - - - - - - - OUTPUT - - - - - - - - - - - - -

$filename = 'Bluesat-programova-nabidka-' . $timetoday . '.pdf';
$path     = '/' . ENVO_FILES_DIRECTORY . '/export/';

if (is_dir(APP_PATH . $path)) {

	// EN: Output a PDF file directly to the browser
	$mpdf -> Output(APP_PATH . $path . $filename, 'F');

	$response = array ('URL' => $path . $filename);

} else {

	$response = array ('ERROR' => '<div class="alert alert-danger"> Chyba exportu souboru <strong>' . $filename . '</strong></div>' . $path);

}

echo json_encode($response);

exit;

?>