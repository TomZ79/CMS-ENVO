/*
 * CMS ENVO
 * JS for Plugin TV Tower - ADMIN
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 * 01. Basic config for plugin's administration
 * 02. DataTable Initialisation
 * 03. Show iFrame in modal - help
 * 04. DVB-T/T2 Channel Frequency UHF
 *
 */


/** 01. Basic config for plugin's administration
 ========================================================================*/

/** ACE Editor
 * Initialisation of ACE Editor
 * @require: ACE Editor Plugin
 *
 * Set variable in php file as array (script.tv-tower.php)
 * @param: 'aceEditor.acetheme' from generated_admin_js.php
 * @param: 'aceEditor.acewraplimit' from generated_admin_js.php
 * @param: 'aceEditor.acetabSize' from generated_admin_js.php
 * @param: 'aceEditor.aceactiveline' from generated_admin_js.php
 * @param: 'aceEditor.aceinvisible' from generated_admin_js.php
 * @param: 'aceEditor.acegutter' from generated_admin_js.php
 *
 * @example: Example add other variable setting to aceEditor object in script.download.php
 *
 * <script>
 *  // Add to aceEditor settings javascript object
 *  aceEditor['otherconfigvariable'] = <?=json_encode($othervalue)?>;
 * </script>
 ========================================= */
// Set WrapLimitRange from generated_admin_js.php
$wrapLimitRange = {
	min: aceEditor.acewraplimit,
	max: aceEditor.acewraplimit
};

function aceboolean(param) {
  if (param == '1') {
    return true;
  } else {
    return false;
  }
}

if ($('#htmleditor').length) {
	var htmlACE = ace.edit('htmleditor');
	htmlACE.setTheme('ace/theme/' + aceEditor.acetheme);
	htmlACE.session.setUseWrapMode(aceEditor.aceactivewrap);
	htmlACE.session.setWrapLimitRange($wrapLimitRange.min, $wrapLimitRange.max);
	htmlACE.setOptions({
		// session options
		mode: "ace/mode/ini",
    tabSize: aceEditor.acetabSize,
    useSoftTabs: true,
    indentedSoftWrap: false,
    highlightActiveLine: aceboolean(aceEditor.aceactiveline),
    // renderer options
    showPrintMargin: false,
    fontSize: aceEditor.fontSize,
    showInvisibles: aceEditor.aceinvisible,
    showGutter: aceboolean(aceEditor.acegutter)
	});
	// This is to remove following warning message on console:
	// Automatically scrolling cursor into view after selection change this will be disabled in the next version
	// set editor.$blockScrolling = Infinity to disable this message
	htmlACE.$blockScrolling = Infinity;

	texthtml = $('#envo_filecontent').val();
	htmlACE.session.setValue(texthtml);
}

$(function () {
	/* Submit Form
	 ========================================= */
	$('form').submit(function () {
		if ($('#envo_filecontent').length) {
			$("#envo_filecontent").val(txtACE.getValue());
		}
	});

});

/** 02. DataTable Initialisation
 * @require: DataTable Plugin
 ========================================================================*/

$(function () {

	// If exist 'table' -> init Plugin DataTable
	if ($('#tt_table').length > 0) {
		$('#tt_table').dataTable({
			// Language
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
			},

			"order": [],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false
			}],
			// Page lenght
			"pageLength": dataTablesSettings.pageLenght,
			// Show entries
			//"lengthMenu": [ [10,20, -1], [10,20, "All"] ],
			// Design Table items
			"dom": "<'row'<'col-sm-6'<'pull-left m-b-20'f>><'col-sm-6'<'float-right m-r-20 hidden-xs'B>>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-7'i><'col-sm-5'p>>",
			// Init bootstrap responsive table for mobile
			"initComplete": function (settings, json) {
				$(this).wrap('<div class="table-responsive"></div>');
			}
		});
	}

	// If exist 'table' -> init Plugin DataTable
	if ($('#tt_table_sid').length > 0) {
		$('#tt_table_sid').dataTable({
			// Language
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
			},
			// Default sort by column
			"order": [[0, "asc"]],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false
			}],
			// Off auto width of column
			"autoWidth": false,
			// Off Pagination
			"paging": false,
			// Design Table items
			"dom": "<'row m-b-20'<'col-sm-12'<'pull-left'f>>>" + "<'row'<'col-sm-12'tr>>",
			// Init bootstrap responsive table for mobile
			"initComplete": function (settings, json) {
				$(this).wrap('<div class="table-responsive"></div>');
			}
		});
	}

	// If exist 'table' -> init Plugin DataTable
	if ($('#tt_table_sidtv').length > 0) {
		$('#tt_table_sidtv').dataTable({
			// Language
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
			},
			// Default sort by column
			"order": [[1, "asc"]],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false
			}],
			// Off Pagination
			"paging": false,
			// Buttons
			buttons: [
				{
					tag: 'button',
					className: 'btn btn-info btn-sm hidden-xs m-r-20 btnEnvo',
					text: 'Nové S_ID - TV',
					action: function (e, dt, button, config) {
						window.location = "index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=createident&amp;sssp=s_idtv";
					}
				}
			],
			// Design Table items
			"dom": "<'row m-b-20'<'col-sm-12'<'pull-left'f><'float-right'B>>>" + "<'row'<'col-sm-12'tr>>",
			// Init bootstrap responsive table for mobile
			"initComplete": function (settings, json) {
				$(this).wrap('<div class="table-responsive"></div>');
				$(".btnEnvo").removeClass("btn-default");
			}
		});
	}

	// If exist 'table' -> init Plugin DataTable
	if ($('#tt_table_sidr').length > 0) {
		$('#tt_table_sidr').dataTable({
			// Language
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
			},
			// Default sort by column
			"order": [[1, "asc"]],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false
			}],
			// Off Pagination
			"paging": false,
			// Buttons
			buttons: [
				{
					tag: 'button',
					className: 'btn btn-info btn-sm hidden-xs m-r-20 btnEnvo',
					text: 'Nové S_ID - R',
					action: function (e, dt, button, config) {
						window.location = "index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=createident&amp;sssp=s_idr";
					}
				}
			],
			// Design Table items
			"dom": "<'row m-b-20'<'col-sm-12'<'pull-left'f><'float-right'B>>>" + "<'row'<'col-sm-12'tr>>",
			// Init bootstrap responsive table for mobile
			"initComplete": function (settings, json) {
				$(this).wrap('<div class="table-responsive"></div>');
				$(".btnEnvo").removeClass("btn-default");
			}
		});
	}

	// If exist 'table' -> init Plugin DataTable
	if ($('#tt_table_sids').length > 0) {
		$('#tt_table_sids').dataTable({
			// Language
			"language": {
				"url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
			},
			// Default sort by column
			"order": [[1, "asc"]],
			"columnDefs": [{
				"targets": 'no-sort',
				"orderable": false
			}],
			// Off Pagination
			"paging": false,
			// Buttons
			buttons: [
				{
					tag: 'button',
					className: 'btn btn-info btn-sm hidden-xs m-r-20 btnEnvo',
					text: 'Nové S_ID - Služby',
					action: function (e, dt, button, config) {
						window.location = "index.php?p=tv-tower&amp;sp=identifiers&amp;ssp=createident&amp;sssp=s_ids";
					}
				}
			],
			// Design Table items
			"dom": "<'row m-b-20'<'col-sm-12'<'pull-left'f><'float-right'B>>>" + "<'row'<'col-sm-12'tr>>",
			// Init bootstrap responsive table for mobile
			"initComplete": function (settings, json) {
				$(this).wrap('<div class="table-responsive"></div>');
				$(".btnEnvo").removeClass("btn-default");
			}
		});
	}

});

/** 03. Show iFrame in modal - help
 ========================================================================*/

$(function () {

	$('#programSelect').on('click', function (e) {
		e.preventDefault();
		$('#ENVOModalPlugin').modal('show');
	});

	$('.xxxx').click(function (event) {
		event.preventDefault();

		var valType = $(this).attr("data-type");
		var valID = $(this).attr("data-value");

		$.ajax({
			url: "../plugins/tv_tower/admin/ajax/tt_selectprogram_process.php",
			type: "POST",
			datatype: 'json',
			data: {
				valID: valID,
				valType: valType
			},
			success: function (data) {

				var res = $.parseJSON(data);

				$('input[name="envo_programname"]').val(res.name);
				$('input[name="envo_serviceid"]').val(res.sid);

				$("#ENVOModalPlugin").modal('hide');
			},
			error: function () {
				alert("failure");
			}
		});

	});

});

/** 04. DVB-T/T2 Channel Frequency UHF
 ========================================================================*/

$(function () {

	var freqArrdvbt = Array(
		{"number": "21", "frequency": "474.00", "freqrange": "470 - 478"},
		{"number": "22", "frequency": "482.00", "freqrange": "478 - 486"},
		{"number": "23", "frequency": "490.00", "freqrange": "486 - 494"},
		{"number": "24", "frequency": "498.00", "freqrange": "494 - 502"},
		{"number": "25", "frequency": "506.00", "freqrange": "502 - 510"},
		{"number": "26", "frequency": "514.00", "freqrange": "510 - 518"},
		{"number": "27", "frequency": "522.00", "freqrange": "518 - 526"},
		{"number": "28", "frequency": "530.00", "freqrange": "526 - 534"},
		{"number": "29", "frequency": "538.00", "freqrange": "534 - 542"},
		{"number": "30", "frequency": "546.00", "freqrange": "542 - 550"},
		{"number": "31", "frequency": "554.00", "freqrange": "550 - 558"},
		{"number": "32", "frequency": "562.00", "freqrange": "558 - 566"},
		{"number": "33", "frequency": "570.00", "freqrange": "566 - 574"},
		{"number": "34", "frequency": "578.00", "freqrange": "574 - 582"},
		{"number": "35", "frequency": "586.00", "freqrange": "582 - 590"},
		{"number": "36", "frequency": "594.00", "freqrange": "590 - 598"},
		{"number": "37", "frequency": "602.00", "freqrange": "598 - 606"},
		{"number": "38", "frequency": "610.00", "freqrange": "606 - 614"},
		{"number": "39", "frequency": "618.00", "freqrange": "614 - 622"},
		{"number": "40", "frequency": "626.00", "freqrange": "622 - 630"},
		{"number": "41", "frequency": "634.00", "freqrange": "630 - 638"},
		{"number": "42", "frequency": "642.00", "freqrange": "638 - 646"},
		{"number": "43", "frequency": "650.00", "freqrange": "646 - 654"},
		{"number": "44", "frequency": "658.00", "freqrange": "654 - 662"},
		{"number": "45", "frequency": "666.00", "freqrange": "662 - 670"},
		{"number": "46", "frequency": "674.00", "freqrange": "670 - 678"},
		{"number": "47", "frequency": "682.00", "freqrange": "678 - 686"},
		{"number": "48", "frequency": "690.00", "freqrange": "686 - 694"},
		{"number": "49", "frequency": "698.00", "freqrange": "694 - 702"},
		{"number": "50", "frequency": "706.00", "freqrange": "702 - 710"},
		{"number": "51", "frequency": "714.00", "freqrange": "710 - 718"},
		{"number": "52", "frequency": "722.00", "freqrange": "718 - 726"},
		{"number": "53", "frequency": "730.00", "freqrange": "726 - 734"},
		{"number": "54", "frequency": "738.00", "freqrange": "734 - 742"},
		{"number": "55", "frequency": "746.00", "freqrange": "742 - 750"},
		{"number": "56", "frequency": "754.00", "freqrange": "750 - 758"},
		{"number": "57", "frequency": "762.00", "freqrange": "758 - 766"},
		{"number": "58", "frequency": "770.00", "freqrange": "766 - 774"},
		{"number": "59", "frequency": "778.00", "freqrange": "774 - 782"},
		{"number": "60", "frequency": "786.00", "freqrange": "782 - 790"},
		{"number": "61", "frequency": "794.00", "freqrange": "790 - 798"},
		{"number": "62", "frequency": "802.00", "freqrange": "798 - 806"},
		{"number": "63", "frequency": "810.00", "freqrange": "806 - 814"},
		{"number": "64", "frequency": "818.00", "freqrange": "814 - 822"},
		{"number": "65", "frequency": "826.00", "freqrange": "822 - 830"},
		{"number": "66", "frequency": "834.00", "freqrange": "830 - 838"},
		{"number": "67", "frequency": "842.00", "freqrange": "838 - 846"},
		{"number": "68", "frequency": "850.00", "freqrange": "846 - 854"},
		{"number": "69", "frequency": "858.00", "freqrange": "854 - 862"});

	$("#channelnumber").keyup(function () {
		var findNumber = this.value; //find frequency for channel number

		var frequency = $.map(freqArrdvbt, function (value, key) {
			if (value.number == findNumber) {
				return value.frequency;
			}
		});

		var freqrange = $.map(freqArrdvbt, function (value, key) {
			if (value.number == findNumber) {
				return value.freqrange;
			}
		});

		$('#channelfrequency').val(frequency);
		$('#channelfreqrange').val(freqrange);

	});

});