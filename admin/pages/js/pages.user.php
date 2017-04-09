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

    /* Check all checkbox */
    $("#jak_delete_all_approve").click(function () {
      var checkedStatus = this.checked;
      $(".highlight_approve").each(function () {
        $(this).prop('checked', checkedStatus);
      });
      $('#button_delete_approve').prop('disabled', function (i, v) {
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

    /* Disable submit button if checkbox is not checked */
    $(".highlight_approve").change(function () {
      if (this.checked) {
        $("#button_delete_approve").removeAttr("disabled");
      } else {
        $("#button_delete_approve").attr("disabled", "disabled");
      }
    });

    /* DateTimePicker
     ========================================= */
    $('#datepicker').datetimepicker({
      // Language
      locale: '<?php echo $site_language;?>',
      // Date-Time format
      format: 'YYYY-MM-DD',
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
      keepInvalid: true,
      minDate: moment()
    });

  });
</script>

<style>
  .label-indicator-absolute {
    position: relative;
  }

  .label-indicator-absolute .password-indicator-label-absolute {
    position: absolute;
    top: 50%;
    margin-top: -9px;
    right: 7px;
    -webkit-transition: all 0.2s ease-in-out;
    -o-transition: all 0.2s ease-in-out;
    transition: all 0.2s ease-in-out;
  }
</style>
