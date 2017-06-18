<script type="text/javascript">
  $(document).ready(function () {
    $(".txtautogrow").autoGrow();

    // Show/Hide block form SMTP settings
    $("input[name=jak_smpt]:radio").change(function () {
      if ($('input[name=jak_smpt]:checked').val() == "1") {
        $('#smtpsettings').show();

      } else if ($('input[name=jak_smpt]:checked').val() == "0") {
        $('#smtpsettings').hide();

      }
    });

  });
</script>

<style>
  .cookie-consent-configurator {
    margin-top: 15px;
  }

  .cookie-consent-configurator .input-hidden {
    position: absolute;
    left: -9999px;
  }

  .cookie-consent-configurator input[type="radio"] + label {
    padding: 3px;
    border: 1px solid transparent;
  }

  .cookie-consent-configurator input[type="radio"]:checked + label {
    border-color: #1f323c;
  }

  .cookie-consent-configurator input[type=radio]:hover + label {
    border-color: rgba(31, 50, 60, .5);
    cursor: pointer
  }

  .theme-preview-container {
    background: black;
    height: 30px;
    width: 45px;
    padding: 5px;
  }

  .theme-preview-button {
    background: white;
    height: 10px;
    width: 15px;
    margin-top: 10px;
    margin-left: 20px;
  }
</style>