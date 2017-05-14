<!-- Step Form Wizard plugin -->
<link rel="stylesheet" href="/assets/plugins/step-form-wizard/2.3/step-form-wizard/css/step-form-wizard-all.css" type="text/css" media="screen, projection">
<script src="/assets/plugins/step-form-wizard/2.3/step-form-wizard/js/step-form-wizard.js"></script>
<script>
  $(document).ready(function () {
    $("#wizard_example").stepFormWizard({
      height: 'auto',
      nextBtn: $('<a class="next-btn sf-right sf-btn" href="#"><?php echo $tlxml["xml_button"]["xmlbtn"]; ?></a>'),
      prevBtn: $('<a class="prev-btn sf-left sf-btn" href="#"><?php echo $tlxml["xml_button"]["xmlbtn1"]; ?></a>'),
      finishBtn: $('<a class="finish-btn sf-right sf-btn" href="#"><?php echo $tlxml["xml_button"]["xmlbtn2"]; ?></a>'),
      onNext: function(i) {
        // Step 0 -> 1
        if(i == '0') {
          var baseurl = '<?php echo BASE_URL_ORIG ?>';

          if($("input[name='jak_xmlseopath']").val()) {
            var inputval = $("input[name='jak_xmlseopath']").val() + '/';
          } else {
            var inputval = '';
          }

          var sitemap = 'Sitemap: ' + baseurl.slice(0, -1) + '/' + inputval + 'sitemap.xml';
          $('#sitemapcode').text( sitemap );
        }

        return true; // move to next step
      }
    });

  });

</script>