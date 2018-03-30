<div class="box box-success">
  <div class="box-header with-border">

    <?php
    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
    echo $Html->addTag('h3', $tl["global_text"]["globaltxt1"], 'box-title');
    ?>

  </div>
  <div class="box-body">
    <table class="table">
      <thead>
      <?php if (isset($ENVO_PAGE_BACKUP) && is_array($ENVO_PAGE_BACKUP)) { ?>
        <tr>
          <th>
            <div class="form-group selectpickerwidth">

              <?php
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('', $tl["global_text"]["globaltxt2"]);
              ?>

              <div id="spinner">
                <div class="bounce1"></div>
                <div class="bounce2"></div>
                <div class="bounce3"></div>
                <div class="bounce4"></div>
                <div class="bounce5"></div>
              </div>

              <select name="restorcontent" id="restorcontent" class="form-control selectpicker" style="width: 100%;">

                <?php
                // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                echo $Html->addOption('0', $tl["global_text"]["globaltxt3"]);

                foreach ($ENVO_PAGE_BACKUP as $pb) {

                  // Add Html Element -> addOption (Arguments: value, text, selected, id, class, optional assoc. array)
                  echo $Html->addOption($pb["id"], $pb["time"]);

                }
                ?>

              </select>

            </div>
          </th>
        </tr>
      <?php } ?>
      </thead>
      <tr>
        <td>
          <?php if ($setting["adv_editor"]) { ?>
            <div id="cover">
              <div class="cover-header">

                <?php
                // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                echo $Html->addAnchor('../assets/plugins/tinymce/plugins/filemanager/dialog.php?type=0&lang='.$managerlang.'&fldr=&field_id=htmleditor', '<i class="fa fa-files-o"></i>', '', 'btn btn-primary btn-xs m-r-10 ifManager', array('title' => 'Show Filemanager'));
                echo $Html->addAnchor('#', $tl["global_text"]["globaltxt4"], 'resizeContainer', 'btn btn-primary btn-xs m-r-10', array('title' => $tl["global_text"]["globaltxt4"]));
                echo $Html->addAnchor('#', $tl["global_text"]["globaltxt5"], 'resizeContainerAndEditor', 'btn btn-primary btn-xs m-r-10', array('title' => $tl["global_text"]["globaltxt5"]));

                if ($page == 'page') {
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('/admin/template/editor_help.php', 'Nápověda', '', 'btn btn-primary btn-xs float-right contentHelp');
                }
                ?>

              </div>

              <?php if ($page == 'page') { ?>
                <div class="m-t-10 m-b-10">

                  <?php
                  // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                  echo $Html->addTag('strong', $tl["global_text"]["globaltxt17"]);
                  ?>

                </div>
                <div class="cover-header">

                  <?php
                  // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
                  echo $Html->addAnchor('javascript:;', '<span class="label label-warning">Content for Members/Guests</span>', '', 'short-sc mr-1', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'top', 'title' => $tl["global_eltitle"]["gelt"]));
                  echo $Html->addAnchor('javascript:;', '<span class="label label-danger">Members only</span>', '', 'short-sc1 mr-1', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'top', 'title' => $tl["global_eltitle"]["gelt1"]));
                  echo $Html->addAnchor('javascript:;', '<span class="label label-info">Guests only</span>', '', 'short-sc2 mr-1', array('data-toggle' => 'tooltipEnvo', 'data-placement' => 'top', 'title' => $tl["global_eltitle"]["gelt2"]));
                  ?>

                </div>
              <?php } ?>

              <div id="editorContainer">

                <?php
                // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
                echo $Html->addDiv('', 'htmleditor');
                ?>

              </div>
            </div>

            <?php

            // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
            echo $Html->addTextarea('envo_content', envo_edit_safe_userpost(htmlspecialchars($ENVO_FORM_DATA["content"])), '', '', array('id' => 'envo_editor', 'class' => 'form-control d-none'));

            ?>

          <?php

          } else {

            // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
            echo $Html->addTextarea('envo_content', envo_edit_safe_userpost($ENVO_FORM_DATA["content"]), '40', '', array('id' => 'envoEditor', 'class' => 'form-control envoEditor'));

          } ?>

        </td>
      </tr>
    </table>
  </div>
  <div class="box-footer">

    <?php
    // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
    echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success float-right', array('data-loading-text' => $tl["button"]["btn41"]));
    ?>

  </div>
</div>
<script>
  var clicked = false;
  var resizeFirstEditor = function (resizeEditor) {
    var MeContainer = document.getElementById('cover');
    var feContainer = document.getElementById('editorContainer');

    $("#htmleditor").css("height", "450");

    MeContainer.classList.toggle("active");
    clicked = !clicked;
    if (resizeEditor) {
      editor.resize();
    }
  };

  var btn = document.getElementById('resizeContainer');
  if(btn){
    btn.addEventListener('click', function () {
      resizeFirstEditor();
    });
  }

  var btn1 = document.getElementById('resizeContainerAndEditor');
  if(btn1){
    btn1.addEventListener('click', function () {
      resizeFirstEditor(true);
    });
  }

</script>