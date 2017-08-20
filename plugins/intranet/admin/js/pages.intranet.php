<script type="text/javascript" src="https://cdn.datatables.net/v/bs/jszip-3.1.3/pdfmake-0.1.27/dt-1.10.15/b-1.3.1/b-html5-1.3.1/b-print-1.3.1/datatables.min.js"></script>
<script>
  $(document).ready(function () {
    $('#int_table').dataTable({
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
            columns: [0, 2, 3, 4, 5]
          }
        },
        {
          extend: 'pdf',
          exportOptions: {
            columns: [0, 2, 3, 4, 5]
          },
          customize: function (doc) {
            doc.content[1].table.widths =
              Array(doc.content[1].table.body[0].length + 1).join('*').split('');
          }

        },
        {
          extend: 'print',
          exportOptions: {
            columns: [0, 2, 3, 4, 5]
          }
        }
      ],
    });

  });
</script>

<script src="<?php echo BASE_URL_ORIG; ?>plugins/intranet/admin/js/jquery.tabledit.js"></script>
<script src="<?php echo BASE_URL_ORIG; ?>plugins/intranet/admin/js/test.js"></script>

<?php if ($page2 == 'edithouse') { ?>

  <script>

    /* Tabledit init and config
     ========================================= */
    // If exist 'table' -> init Plugin Jquery-Tabledit
    if ($('#tableentrance').length > 0) {
      // Tabledit init config
      $('#tableentrance').Tabledit({
        url: '/plugins/intranet/admin/ajax/int_table_update.php',
        inputClass: 'form-control',
        restoreButton: false,
        lang: 'cz',
        debug: false,
        mutedClass: 'text-muted warning',
        columns: {
          identifier: [0, 'id'],
          editable: [
            [1, 'numberentrance', 'input'],
            [2, 'countapartment', 'input'],
            [3, 'countetage', 'input'],
            [4, 'elevator', 'select', '{"0": "Není známo", "1": "Ano", "2": "Ne"}']
          ]
        }
      });
    }

    // If exist 'table' -> init Plugin Jquery-Tabledit
    if ($('table[id^="tableapartment_"]').length > 0) {
      // Tabledit init config
      $('table[id^="tableapartment_"]').Tabledit({
        url: '/plugins/intranet/admin/ajax/int_table_update_apt.php',
        inputClass: 'form-control',
        restoreButton: false,
        lang: 'cz',
        debug: false,
        mutedClass: 'text-muted warning',
        columns: {
          identifier: [0, 'id'],
          editable: [
            [1, 'number', 'input'],
            [2, 'etage', 'input'],
            [3, 'name', 'input'],
            [4, 'phone', 'input'],
            [5, 'commission', 'select', '{"0": "Není ve Výboru", "1": "Předseda", "2": "Člen Výboru", "3": "Pověřený vlastník"}']
          ]
        }
      });
    }

    /* Tabledit add new row to table
     ========================================= */
    $("#addRowEdit").on('click', function () {
      // Get value
      var houseID = <?php echo $page3; ?>;
      var entrance = $('input[name="addRowEnt"]').val();

      $.ajax({
        type: "POST",
        url: "/plugins/intranet/admin/ajax/int_table_addnew.php",
        datatype: 'json',
        data: {
          houseID: houseID,
          entrance: entrance
        },
        success: function (data) {
          $('#tableentrance tbody').html(data);

          $('#tableentrance').Tabledit('update');

          /*setInterval(function () {
            location.reload(true);
          }, 1500);*/

        },
        error: function () {

        }
      })
    });

    $(".addRowEditApt").on('click', function () {
      // Get value
      var houseID = <?php echo $page3; ?>;
      var entrance = $(this).attr("data-entrance");

      $.ajax({
        type: "POST",
        url: "/plugins/intranet/admin/ajax/int_table_addnew_apt.php",
        datatype: 'html',
        data: {
          houseID: houseID,
          entrance: entrance
        },
        success: function (data) {
          $('#tableapartment_' + entrance + ' tbody').html(data);

          $('#tableapartment_' + entrance).Tabledit('update');

        },
        error: function () {

        }
      })
    });

  </script>

<? } ?>
