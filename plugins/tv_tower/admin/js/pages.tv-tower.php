<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.min.css"/>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.min.js"></script>
<style>
  /* Datable Tables */
  .dataTables_wrapper {
    margin-top: 20px;
  }

  .dataTables_wrapper .dataTables_filter {
    margin-left: 20px !important;
  }

  .dataTables_wrapper .dataTables_info,
  .dataTables_wrapper .dataTables_length,
  .dataTables_wrapper .dataTables_paginate {
    margin-top: 10px !important;
  }

  .dataTables_wrapper .dataTables_info {
    font-size: 13px !important;
    padding-top: 3px !important;
  }

  .dataTables_wrapper .table thead tr th {
    border-bottom: 2px solid rgba(230, 230, 230, 0.7) !important;
  }

  table.dataTable thead .sorting::after,
  table.dataTable thead .sorting_asc::after,
  table.dataTable thead .sorting_desc::after {
    opacity: 1;
    content: "";
  }

  .dataTables_wrapper .dataTables_paginate ul > li {
    font-size: 13px;
  }

  .dataTables_wrapper .dataTables_paginate ul > li.next > a,
  .dataTables_wrapper .dataTables_paginate ul > li.previous > a {
    opacity: 1;
  }

</style>
<script>
  $(document).ready(function () {
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
      "pageLength": 15,
      // Show entries
      //"lengthMenu": [ [10,20, -1], [10,20, "All"] ],
      // Design Table items
      "dom": "<'row'<'col-sm-6'<'pull-left m-b-20'f>><'col-sm-6'<'pull-right m-r-20 hidden-xs'B>>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-7'i><'col-sm-5'p>>",
      // Export table
      buttons: [
        {
          extend: 'excel',
          exportOptions: {
            columns: [0, 2, 3, 4]
          }
        },
        {
          extend: 'pdf',
          exportOptions: {
            columns: [0, 2, 3, 4]
          },
          customize: function (doc) {
            doc.content[1].table.widths =
              Array(doc.content[1].table.body[0].length + 1).join('*').split('');
          }

        },
        {
          extend: 'print',
          exportOptions: {
            columns: [0, 2, 3, 4]
          }
        }
      ],
      // Init bootstrap responsive table for mobile
      "initComplete": function (settings, json) {
        $('#tt_table').wrap('<div class="table-responsive"></div>');
      }
    });


    $('table.tt_table_ident').dataTable({
      // Language
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
      },
      // Default sort by column
      "order": [[ 1, "asc" ]],
      "columnDefs": [{
        "targets": 'no-sort',
        "orderable": false
      }],
      // Design Table items
      "dom": "<'row'<'col-sm-12'<'pull-left m-b-20'f>>>" + "<'row'<'col-sm-12'tr>>",
      "drawCallback": function( settings ) {

        $('[data-toggle="tooltip"]').tooltip({
          container: '.box-body'
        });

      }
    });

  });
</script>

<script>
  $(document).ready(function () {
    // DVB-T/T2 Channel Frequency UHF
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
</script>
<script src="assets/plugins/ace/ace.js" type="text/javascript"></script>
<script>
  /* ACE Editor
   ========================================= */
  if ($('#htmleditor').length) {
    var htmlACE = ace.edit("htmleditor");
    htmlACE.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    htmlACE.session.setUseWrapMode(true);
    htmlACE.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    htmlACE.setOptions({
      // session options
      mode: "ace/mode/ini",
      tabSize: <?php echo $jkv["acetabSize"]; ?>,
      useSoftTabs: true,
      highlightActiveLine: <?php echo $jkv["aceactiveline"]; ?>,
      // renderer options
      showInvisibles: <?php echo $jkv["aceinvisible"]; ?>,
      showGutter: <?php echo $jkv["acegutter"]; ?>
    });
    // This is to remove following warning message on console:
    // Automatically scrolling cursor into view after selection change this will be disabled in the next version
    // set editor.$blockScrolling = Infinity to disable this message
    htmlACE.$blockScrolling = Infinity;

    texthtml = $("#jak_filecontent").val();
    htmlACE.session.setValue(texthtml);
  }

  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    $("#jak_filecontent").val(txtACE.getValue());
  });
</script>