<script type="text/javascript">

  /* Other config
   ========================================= */
  $(document).ready(function () {

    /* RestoreContent
     ========================================= */
    $("#restorcontent").change(function () {
      if ($(this).val() != 0) {
        if (!confirm('<?php echo $tl["page_notification"]["restore"];?>')) {
          $("#restorcontent").val(0);
          return false;
        } else {
          restoreContent('blogid', <?php echo $page2;?>, <?php echo $jkv["adv_editor"];?>, $(this).val());
        }
      }
    });
  });
</script>

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
  $(document).ready(function() {
    $('#blog_table').dataTable( {
      // Language
      "language": {
        "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
      },

      "order": [],
      "columnDefs": [ {
        "targets"  : 'no-sort',
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
            columns: [0,2,3,4,5,6]
          }
        },
        {
          extend: 'pdf',
          exportOptions: {
            columns: [0,2,3,4,5,6]
          },
          customize: function (doc) {
            doc.content[1].table.widths =
              Array(doc.content[1].table.body[0].length + 1).join('*').split('');
          }

        },
        {
          extend: 'print',
          exportOptions: {
            columns: [0,2,3,4,5,6]
          }
        }
      ],
      // Init bootstrap responsive table for mobile
      "initComplete": function(settings, json){
        $(this).wrap('<div class="table-responsive"></div>');
      }
    });
  } );
</script>
