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
        url: "index.php?p=download&amp;sp=categories",
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