<script src="assets/js/catorder.js" type="text/javascript"></script>
<script src="assets/js/slug.js" type="text/javascript"></script>
<script src="assets/plugins/ace/ace.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function () {

    /* Check all checkbox */
    $("#jak_delete_all").click(function () {
      var checkedStatus = this.checked;
      $(".highlight").each(function () {
        $(this).prop('checked', checkedStatus);
      });
      $('#button_delete').prop('disabled', function (i, v) {
        return !v;
      });
    });

    /* Disable submit button if checkbox is not checked */
    $(".highlight").change(function () {
      if (this.checked) {
        $("#button_delete").removeAttr("disabled");
      } else {
        $("#button_delete").attr("disabled", "disabled");
      }
    });

  });
</script>
<script type="text/javascript">

  /* ACE Editor
   ========================================= */
  <?php if ($jkv["adv_editor"]) { ?>
  if ($('#htmleditor').length) {
    var htmlACE = ace.edit("htmleditor");
    htmlACE.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    htmlACE.session.setUseWrapMode(true);
    htmlACE.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    htmlACE.setOptions({
      // session options
      mode: "ace/mode/html",
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

    texthtml = $("#jak_editor").val();
    htmlACE.session.setValue(texthtml);
  }
  <?php } ?>

  if ($('#csseditor').length) {
    var cssACE = ace.edit("csseditor");
    cssACE.setTheme("ace/theme/chrome");
    cssACE.session.setMode("ace/mode/html");
    textcss = $("#jak_css").val();
    cssACE.session.setValue(textcss);
  }

  if ($('#javaeditor').length) {
    var jsACE = ace.edit("javaeditor");
    jsACE.setTheme("ace/theme/chrome");
    jsACE.session.setMode("ace/mode/html");
    textjs = $("#jak_javascript").val();
    jsACE.session.setValue(textjs);
  }

  /* Other config
   ========================================= */
  $(document).ready(function () {

    $("#addCssBlock").click(function () {
      cssACE.insert(insert_cssblock());
    });
    $("#addJavascriptBlock").click(function () {
      jsACE.insert(insert_javascript());
    });
  });

  /* Responsive Filemanager
   ========================================= */
  function responsive_filemanager_callback(field_id) {

    if (field_id == "csseditor" || field_id == "javaeditor" || field_id == "htmleditor") {

      // get the path for the ace file
      var acefile = jQuery('#' + field_id).val();

      if (field_id == "csseditor") {
        cssACE.insert('<link rel="stylesheet" href="' + acefile + '" type="text/css" />');
      } else if (field_id == "javaeditor") {
        jsACE.insert('<script src="' + acefile + '"><\/script>');
      } else {
        htmlACE.insert(acefile);
      }
    }
  }

  /* Submit Form
   ========================================= */
  $('form').submit(function () {

    <?php if ($jkv["adv_editor"]) { ?>
    if ($('#jak_editor').length) {
      $("#jak_editor").val(htmlACE.getValue());
    }
    <?php } ?>

    if ($('#csseditor').length) {
      $("#jak_css").val(cssACE.getValue());
    }

    if ($('#javaeditor').length) {
      $("#jak_javascript").val(jsACE.getValue());
    }

  });
</script>

<script type="text/javascript">
  $(document).ready(function () {
    $(".sortable").nestedSortable({maxLevels: 2});

    $(".save-menu-plugin").on("click", function () {
      mlist = $(this).data("menu");
      serialized = $("#" + mlist).nestedSortable("serialize");

      /* Sending the form fileds to any post request: */
      var request = $.ajax({
        url: "index.php?p=blog&amp;sp=categories",
        type: "POST",
        data: serialized,
        dataType: "json",
        cache: false
      });
      request.done(function (data) {
        if (data.status == 1) {
          $("#" + mlist + " li").animate({backgroundColor: '#c9ffc9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
          $.notify({icon: 'fa fa-check-square-o', message: data.html}, {type: 'success'});
        } else {
          $("#" + mlist + " li").animate({backgroundColor: '#ffc9c9'}, 100).animate({backgroundColor: '#F9F9F9'}, 1000);
          $.notify({icon: 'fa fa-exclamation-triangle', message: data.html}, {type: 'danger'});
        }
      });
    });

  });
</script>
<script type="text/javascript">
  $(function () {

    /* DateTimePicker
     ========================================= */
    $('#datepickerTime').datetimepicker({
      // Language
      locale: '<?php echo $site_language;?>',
      // Date-Time format
      format: 'YYYY-MM-DD HH:mm:ss',
      // Icons
      icons: $.AdminEnvo.DateTimepicker.icons(),
      // Tooltips
      tooltips: $.AdminEnvo.DateTimepicker.tooltips(),
      // Show Button
      showTodayButton: true,
      showClear: true,
      // Other
      calendarWeeks: true,
      ignoreReadonly: true
    });

    $('#datepickerFrom').datetimepicker({
      // Language
      locale: '<?php echo $site_language;?>',
      // Date-Time format
      format: 'YYYY-MM-DD HH:mm',
      // Icons
      icons: $.AdminEnvo.DateTimepicker.icons(),
      // Tooltips
      tooltips: $.AdminEnvo.DateTimepicker.tooltips(),
      // Show Button
      showTodayButton: true,
      showClear: true,
      // Other
      calendarWeeks: true,
      ignoreReadonly: true,
      keepInvalid: true
    });

    $('#datepickerTo').datetimepicker({
      // Language
      locale: '<?php echo $site_language;?>',
      // Date-Time format
      format: 'YYYY-MM-DD HH:mm',
      // Icons
      icons: $.AdminEnvo.DateTimepicker.icons(),
      // Tooltips
      tooltips: $.AdminEnvo.DateTimepicker.tooltips(),
      // Show Button
      showTodayButton: true,
      showClear: true,
      // Other
      calendarWeeks: true,
      ignoreReadonly: true,
      useCurrent: false //Important! See issue #1075
    });

    $("#datepickerFrom").on("dp.change", function (e) {
      $('#datepickerTo').data("DateTimePicker").minDate(e.date);
    });
    $("#datepickerTo").on("dp.change", function (e) {
      $('#datepickerFrom').data("DateTimePicker").maxDate(e.date);
    });

  });
</script>
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

<script type="text/javascript">
  $(document).ready(function () {
    $("#jak_name").keyup(function () {
      // Checked, copy values
      $("#jak_varname").val(jakSlug($("#jak_name").val()));
    });

    /* Bootstrap Icon Picker */
    <?php
    if (isset($ENVO_FORM_DATA["catimg"])) {
      $str = $ENVO_FORM_DATA["catimg"];

      if (strpos($str, 'glyphicons ') !== FALSE) {
        $categoryimg = str_replace('glyphicons ', '', $ENVO_FORM_DATA["catimg"]);
      } else {
        $categoryimg = str_replace('fa ', '', $ENVO_FORM_DATA["catimg"]);
      }
    } else {
      $categoryimg = 'fa-font';
    }
    ?>

    $('.iconpicker').iconpicker({
      arrowClass: 'btn-info',
      icon: '<?php echo $categoryimg; ?>',
      iconset: 'fontawesome',
      searchText: '<?php echo $tl["placeholder"]["p4"]; ?>',
      labelFooter: '<?php echo $tl["global_text"]["globaltxt18"]; ?>',
      arrowPrevIconClass: 'fa fa-chevron-left',
      arrowNextIconClass: 'fa fa-chevron-right',
      selectedClass: 'btn-success',
      unselectedClass: '',
      rows: 5,
      cols: 8
    });

    $('.iconpicker').on('change', function (e) {
      $("#jak_img").val('fa ' + e.icon);
    });

    $('.iconpicker1').iconpicker({
      arrowClass: 'btn-info',
      icon: '<?php echo $categoryimg; ?>',
      iconset: 'glyphicons',
      searchText: '<?php echo $tl["placeholder"]["p4"]; ?>',
      labelFooter: '<?php echo $tl["global_text"]["globaltxt18"]; ?>',
      arrowPrevIconClass: 'fa fa-chevron-left',
      arrowNextIconClass: 'fa fa-chevron-right',
      selectedClass: 'btn-success',
      unselectedClass: '',
      rows: 5,
      cols: 8
    });

    $('.iconpicker1').on('change', function (e) {
      $("#jak_img").val('glyphicons ' + e.icon);
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
        $('#blog_table').wrap('<div class="table-responsive"></div>');
      },
    });
  } );
</script>
