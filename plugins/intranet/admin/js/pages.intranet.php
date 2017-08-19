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

    $('#tableentrance').Tabledit({
      url: '/plugins/intranet/admin/ajax/int_table_update.php',
      inputClass: 'form-control',
      restoreButton: false,
      lang: 'cz',
      debug: false,
      editmethod: 'post',
      columns: {
        identifier: [0, 'id'],
        editable: [
          [1, 'numberentrance', 'input'],
          [2, 'countapartment', 'number'],
          [3, 'countetage', 'input'],
          [4, 'elevator', 'select', '{"2": "Není známo", "1": "Ano", "0": "Ne"}']
        ]
      }
    });

    $("#addRowEdit").on('click', function () {
      // Getting value
      var houseID = <?php echo $page3; ?>;

      $.ajax({
        type: "POST",
        url: "/plugins/intranet/admin/ajax/int_table_addnew.php",
        datatype: 'html',
        data: {
          houseID: houseID
        },
        success: function (data) {
          $('#tableentrance tbody').html(data);

          $('#tableentrance').Tabledit('update');

        },
        error: function () {

        }
      })

    });

  </script>

<? } ?>

<?php if ($page2 == 'newhouse') { ?>

  <script>
    function add_row(id_table) {
      // Definition
      var table_tr = $('#' + id_table.id + ' tbody tr');
      var table_tr_last = $('#' + id_table.id + ' tbody tr:last');
      var row_no_origin = table_tr.length;

      console.log(row_no_origin);

      // Value
      $row_no_new = row_no_origin + 1;

      // Insert new row to table
      table_tr_last.after(
        "<tr id='row" + $row_no_new + "'>" +
          "<td>" + $row_no_new + "</td>" +
          "<td><input name='envo_numberentrance[]' class='form-control' type='text'></td>" +
          "<td><input name='envo_countapartment[]' class='form-control' type='text'></td>" +
          "<td><input name='envo_countetage[]' class='form-control' type='text'></td>" +
          "<td>" +
            "<select name='envo_elevator[]' class='form-control selectpicker'>" +
            "<option value='2'>Není známo</option><option value='1'>Ano</option><option value='0'>Ne</option>" +
            "</select>" +
          "</td>" +
          "<td class='text-center'><button type='button' name='button' id='deleteRowNew' class='btn btn-danger' onclick=delete_row(row" + $row_no_new + ',' + id_table.id + ")><span class='glyphicon glyphicon-trash'></span></button></td>" +
        "</tr>");
    }

    function delete_row(row_no,table) {
      var row = row_no.id;

      $('#' + row).remove();

      // New ID in first 'td' of each row
      var id = 1;
      $('#' + table.id + ' tbody tr td:first-child').each(function() {
        $(this).text(id++);
      });


    }
  </script>

<? } ?>
