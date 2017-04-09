<?php
// Load 'ace.js' and init ace  - only for selected pages
if ($JAK_FILECONTENT) { ?>
  <script src="assets/plugins/ace/ace.js" type="text/javascript"></script>

  <script type="text/javascript">

    /* ACE Editor
     ========================================= */
    if ($('#htmleditor').length) {
      var htmlefACE = ace.edit("htmleditor");
      htmlefACE.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
      htmlefACE.session.setUseWrapMode(true);
      htmlefACE.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
      htmlefACE.setOptions({
        // session options
        mode: "ace/mode/<?php echo $acemode;?>",
        tabSize: <?php echo $jkv["acetabSize"]; ?>,
        useSoftTabs: true,
        highlightActiveLine: <?php echo $jkv["aceactiveline"]; ?>,
        // renderer options
        showInvisibles: <?php echo $jkv["aceinvisible"]; ?>,
        showGutter: <?php echo $jkv["acegutter"]; ?>,
      });
      // This is to remove following warning message on console:
      // Automatically scrolling cursor into view after selection change this will be disabled in the next version
      // set editor.$blockScrolling = Infinity to disable this message
      htmlefACE.$blockScrolling = Infinity;

      texthtmlef = $("#jak_filecontent").val();
      htmlefACE.session.setValue(texthtmlef);
    }

    /* Submit Form
     ========================================= */
    $('form').submit(function () {
      $("#jak_filecontent").val(htmlefACE.getValue());
    });
  </script>
<?php } ?>

<?php
// Load script  - only for selected pages
if ($page == 'template') { ?>
  <script type="text/javascript">
    $(document).ready(function () {
      // AutoGrow TextArea with ' class="txtautogrow" '
      $(".txtautogrow").autoGrow();

      // Close modal dialog from iFrame - call this by onclick="window.parent.closeModal(); from iFrame"
      window.closeModal = function () {
        $('#JAKModal').modal('hide');
      };

      $('.tempSett').on('click', function (e) {
        e.preventDefault();
        frameSrc = $(this).attr("href");
        $('#JAKModalLabel').html("<?php echo ucwords($page);?>");

        $('#JAKModal').one('shown.bs.modal', function (e) {
          $('#JAKModal .modal-dialog').addClass('modal-w-90p');
          $('.body-content').html('<iframe src="' + frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">');
        }).one('hidden.bs.modal', function (e) {
          $(".body-content").html('');
          window.location.reload();
        }).modal('show');

      });

      // Show iFrame in modal - install and uninstall
      $('.tempInst').on('click', function (e) {
        e.preventDefault();
        frameSrc = $(this).attr("href");
        $('#JAKModalLabel').html("<?php echo ucwords($page);?>");

        $('#JAKModal').one('shown.bs.modal', function (e) {
          $('#JAKModal .modal-dialog').addClass('modal-w-90p');
          $('.body-content').html('<iframe src="' + frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">');
        }).one('hidden.bs.modal', function (e) {
          $(".body-content").html('');
          window.location.reload();
        }).modal('show');

      });

      // Show iFrame in modal - help
      $('.tempHelp').on('click', function (e) {
        e.preventDefault();
        frameSrc = $(this).attr("href");
        $('#JAKModalLabel').html("<?php echo ucwords($page);?>");

        $('#JAKModal').one('shown.bs.modal', function (e) {
          $('#JAKModal .modal-dialog').addClass('modal-w-90p');
          $('.body-content').html('<iframe src="' + frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">');
        }).one('hidden.bs.modal', function (e) {
          $(".body-content").html('');
        }).modal('show');

      });

      $('.disabled').click(function (e) {
        e.preventDefault();
      })
    });
  </script>
<?php } ?>

