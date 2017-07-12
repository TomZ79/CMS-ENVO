<script>
  $(document).ready(function () {
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

<script>
  /* Short Code Insert to TinyMCE */
  $(".short-sc").click(function () {
    var myField = tinyMCE.get($(this).data('short-scf'));
    if (document.selection) {
      myField.focus();
      sel = document.selection.createRange();
      sel.text = $(this).find('span').html();
    }
    else if (document.getSelection) {
      tinyMCE.activeEditor.selection.setContent($(this).find('span').html());
      myField.focus();
    }
  });
</script>

<script src="/assets/plugins/tinymce/tinymce.min.js?=v4.5.2"></script>
<script>
  tinymce.init({
    selector: "textarea.jakEditorF, textarea.jakEditorF2, textarea.jakEditorF3",
    theme: "modern",
    width: "100%",
    height: 500,
    language: envoWeb.envo_lang,
    plugins: [
      "advlist autolink link image lists charmap preview hr anchor pagebreak fullpage",
      "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
      "save table contextmenu directionality emoticons paste textcolor responsivefilemanager clientcode bootstrap3"
    ],
    toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link image | preview media fullpage | forecolor backcolor emoticons | clientcode fullpage bootstrap3",
    statusbar: false,
    image_advtab: true,
    relative_urls: false,
    convert_urls: false,
    remove_script_host: true,
    document_base_url: "/",
    valid_elements: "*[*]",
    external_filemanager_path: "../assets/plugins/tinymce/plugins/filemanager/",
    filemanager_title: "Filemanager",
    external_plugins: {"filemanager": "plugins/filemanager/plugin.min.js"}
  });
</script>

<script>
  $(document).ready(function () {

    // Show iFrame in modal -  Newsletter preview
    $('.nlprev').on('click', function (e) {
      e.preventDefault();
      frameSrc = $(this).attr("href");
      $('#JAKModalLabel').html("FileManager");

      $('#JAKModal').one('shown.bs.modal', function (e) {
        $('#JAKModal .modal-dialog').addClass('modal-w-70p');
        $('.body-content').html('<iframe src="' + frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">');
      }).one('hidden.bs.modal', function (e) {
        $(".body-content").html('');
      }).modal('show');

    });

    $(".nlTheme").click(function () {

      if (!confirm('<?php echo $tlnl["newsletter_notification"]["skin"];?>')) return false;

      $.ajax({
        type: "POST",
        url: '../plugins/newsletter/admin/ajax/loadskin.php',
        data: "skinUrl=" + $(this).attr("id"),
        dataType: 'json',
        beforeSend: function (x) {
          $('#spinner').css('visibility', 'visible');
        },
        success: function (msg) {

          setTimeout(function () {
            $('#spinner').css('visibility', 'hidden');
          }, 2000);

          if (parseInt(msg.status) != 1) {
            return false;

          } else {

            tinymce.activeEditor.insertContent(msg.rcontent);
          }

        }
      });

    });

    // Show iFrame in modal -  Newsletter statistic
    $('.nlbox').on('click', function (e) {
      e.preventDefault();
      frameSrc = $(this).attr("href");
      $('#JAKModalLabel').html("FileManager");

      $('#JAKModal').one('shown.bs.modal', function (e) {
        $('#JAKModal .modal-dialog').addClass('modal-w-70p');
        $('.body-content').html('<iframe src="' + frameSrc + '" width="100%" frameborder="0" style="flex-grow: 1;">');
      }).one('hidden.bs.modal', function (e) {
        $(".body-content").html('');
      }).modal('show');

    });

  });
</script>

<script>
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

<!-- JavaScript to disable send button and show loading.gif image -->
<script>
  $(document).ready(function () {
    // Button 'Send Mail'
    $('button[name = "btnSendMail"]').on('click', function () {
      var $this = $(this);
      $this.button('loading');
      setTimeout(function () {
        $this.button('reset');
      }, 1000);
    });
  });
</script>

<style type="text/css">
  .cover-header {
    background: #ddd;
    padding: 10px;
    margin-bottom: 10px;
  }
</style>
