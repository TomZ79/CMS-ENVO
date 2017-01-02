<?php include "header.php"; ?>

  <div class="container-fluid kv-main">
    <input id="images" name="images[]" type="file" multiple>
  </div>

  <script>
    $(document).on("ready", function() {
      $("#images").fileinput({
        theme: 'fa',
        language: 'cz',
        maxFileSize: 1000,
        allowedFileExtensions : ['jpg','png','gif'],
        uploadAsync: false,
        uploadUrl: "js-plugins/bootstrap-fileinput/uploadfacebook.php", // your upload server url
        maxFileCount:3,
        layoutTemplates: {
          main1: '{preview}\n' +
          '<div class="input-group {class}">\n' +
          '   <div class="input-group-btn">\n' +
          '       {browse}\n' +
          '       {upload}\n' +
          '       {remove}\n' +
          '   </div>\n' +
          '   {caption}\n' +
          '</div>',
          actions: '<div class="file-actions">\n' +
          '    <div class="file-footer-buttons">\n' +
          '        {upload} {delete} {zoom} {other}' +
          '    </div>\n' +
          '    {drag}\n' +
          '    <div class="file-upload-indicator" title="{indicatorTitle}">{indicator}</div>\n' +
          '    <div class="clearfix"></div>\n' +
          '</div>'
        },
      });
    });
  </script>

<?php include "footer.php"; ?>