/*
 * CMS ENVO
 * JS for Plugin Intranet - ADMIN
 * Copyright (c) 2016 - 2018 Bluesat.cz
 * -----------------------------------------------------------------------
 * Author: BluesatKV
 * Email: bluesatkv@gmail.com
 * =======================================================================
 * INDEX:
 *
 *
 */

/** 00. ACE Initialisation
 ========================================================================*/

/** ACE Editor
 * Initialisation of ACE Editor
 * @require: ACE Editor Plugin
 *
 * Set variable in php file as array
 * @param: 'aceEditor.acetheme' from generated_admin_js.php
 * @param: 'aceEditor.acewraplimit' from generated_admin_js.php
 * @param: 'aceEditor.acetabSize' from generated_admin_js.php
 * @param: 'aceEditor.aceactiveline' from generated_admin_js.php
 * @param: 'aceEditor.aceinvisible' from generated_admin_js.php
 * @param: 'aceEditor.acegutter' from generated_admin_js.php
 *
 * @example: Example add other variable setting to aceEditor object in script.download.php
 *
 * <script>
 *  // Add to aceEditor settings javascript object
 *  aceEditor['otherconfigvariable'] = <?=json_encode($othervalue)?>;
 * </script>
 ========================================= */
// Set WrapLimitRange from generated_admin_js.php
$wrapLimitRange = {
  min: aceEditor.acewraplimit,
  max: aceEditor.acewraplimit
};

function aceboolean(param) {
  if (param == '1') {
    return true;
  } else {
    return false;
  }
}

if ($('#htmleditor').length) {
  var htmlACE = ace.edit('htmleditor');
  htmlACE.setTheme('ace/theme/' + aceEditor.acetheme);
  htmlACE.session.setUseWrapMode(aceEditor.aceactivewrap);
  htmlACE.session.setWrapLimitRange($wrapLimitRange.min, $wrapLimitRange.max);
  htmlACE.setOptions({
    // session options
    mode: "ace/mode/html_ruby",
    tabSize: aceEditor.acetabSize,
    useSoftTabs: true,
    indentedSoftWrap: false,
    highlightActiveLine: aceboolean(aceEditor.aceactiveline),
    // renderer options
    showPrintMargin: false,
    fontSize: aceEditor.fontSize,
    showInvisibles: aceEditor.aceinvisible,
    showGutter: aceboolean(aceEditor.acegutter)
  });
  // This is to remove following warning message on console:
  // Automatically scrolling cursor into view after selection change this will be disabled in the next version
  // set editor.$blockScrolling = Infinity to disable this message
  htmlACE.$blockScrolling = Infinity;

  texthtml = $('#envo_editor').val();
  htmlACE.session.setValue(texthtml);
}

$(function () {
  /* Submit Form
   ========================================= */
  $('form').submit(function () {
    if ($('#envo_editor').length) {
      $('#envo_editor').val(htmlACE.getValue());
    }
  });

});

/* 00. JQUERY CODE SNIPPET TO GET THE DYNAMIC VARIABLE
 ======================================================================== */
/* jQuery code snippet to get the dynamic variables stored in the url as parameters and
 * store them as JavaScript variables ready for use with your scripts.
 *
 * EXAMPLE
 * --------
 * 1) url: example.com?param1=name&param2=&id=6
 *
 * $.urlParam('param1');  => name
 * $.urlParam('id');      => 6
 * $.urlParam('param2');  => null
 *
 * 2) url: http://www.jquery4u.com?city=Gold Coast
 *
 * $.urlParam('city');                     => Gold%20Coast
 * decodeURIComponent($.urlParam('city'))  => Gold Coast
 */

$.urlParam = function (name) {
  var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
  if (results == null) {
    return null;
  }
  else {
    return decodeURI(results[1]) || 0;
  }
};

/**
 * Setting variable from url for other uses
 */
var pageID = $.urlParam('id');
var page = $.urlParam('p');
var page1 = $.urlParam('sp');
var page2 = $.urlParam('ssp');

/**
 * Jquery Function - DialogFX Open - Image - House
 * @example
 * Attribute 'data-dialog' in button => ID of dialog 'div' block
 * -----------------
 * <button class="dialog-open-img" type="button" data-dialog="imgitemDetails"></button>
 *
 *  <div id="imgitemDetails" class="dialog item-details">
 *    <div class="dialog__overlay"></div>
 *    <div class="dialog__content">
 *      <div class="container-fluid">
 *        <div class="row dialog__overview">
 *          <!-- Data over AJAX  -->
 *        </div>
 *      </div>
 *      <button class="close action top-right" type="button" data-dialog-close>
 *        <i class="pg-close fs-14"></i>
 *      </button>
 *    </div>
 *  </div>
 */
function openDialogImg(event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Get Data-Dialog
  thisDataDialog = $(this).attr('data-dialog');
  // Get ID of image
  var imageID = $(this).parents(":eq(4)").attr('id');

  // Ajax
  $.ajax({
    url: "/plugins/intranet/admin/ajax/int_table_dialog_img.php",
    type: "POST",
    datatype: 'html',
    data: {
      imageID: imageID
    },
    beforeSend: function () {

      // Show progress circle
      $('#imgitemDetails .dialog__overview').html('<div style="display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20">Načítání ... Prosím počkejte</div></div>');

    },
    success: function (data) {

      setTimeout(function () {
        // Add html data to 'div'
        $('#imgitemDetails .dialog__overview').hide().html(data).fadeIn(900);

        // Init Select2 plugin
        $('#info1 .selectpicker').select2({
          minimumResultsForSearch: -1,
          dropdownParent: $('.page-content-wrapper'),
          dropdownCssClass: 'zindex1060'
        });

        // Call function for edit description - textarea
        $('#editimgdesc').click(editImgDesc);
        $('#closeimgdesc').click(closeImgDesc);
        $('#saveimgdesc').click(saveImgDesc);

        // Call function for edit description - textarea
        $('#editimgcat').click(editImgCat);
        $('#closeimgcat').click(closeImgCat);
        $('#saveimgcat').click(saveImgCat);

      }, 1000);

    },
    error: function () {

    }
  });

  // Open DialogFX
  dialogEl = document.getElementById(thisDataDialog);
  dlg = new DialogFx(dialogEl, {
    onOpenDialog: function (instance) {
      // Open DialogFX
      console.log('Open dialog - Image: OPEN');
    },
    onCloseDialog: function (instance) {
      // Close DialogFX
      console.log('Open dialog - Image: CLOSE');
    }
  });
  dlg.toggle(dlg);

  return false;
}

/**
 * Jquery Function - DialogFX Open - Image - House List
 * @example
 * Attribute 'data-dialog' in button => ID of dialog 'div' block
 * -----------------
 * <button class="dialog-open-listimg" type="button" data-dialog="imgitemDetails"></button>
 *
 *  <div id="imgitemDetails" class="dialog item-details">
 *    <div class="dialog__overlay"></div>
 *    <div class="dialog__content">
 *      <div class="container-fluid">
 *        <div class="row dialog__overview">
 *          <!-- Data over AJAX  -->
 *        </div>
 *      </div>
 *      <button class="close action top-right" type="button" data-dialog-close>
 *        <i class="pg-close fs-14"></i>
 *      </button>
 *    </div>
 *  </div>
 */
function openDialogListImg(event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Get Data-Dialog
  thisDataDialog = $(this).attr('data-dialog');
  // Get ID of image
  var imageID = $(this).parents(":eq(4)").attr('id');

  // Ajax
  $.ajax({
    url: "/plugins/intranet/admin/ajax/int_list_table_dialog_img.php",
    type: "POST",
    datatype: 'html',
    data: {
      imageID: imageID
    },
    beforeSend: function () {

      // Show progress circle
      $('#imgitemDetails .dialog__overview').html('<div style="display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20">Načítání ... Prosím počkejte</div></div>');

    },
    success: function (data) {

      setTimeout(function () {
        // Add html data to 'div'
        $('#imgitemDetails .dialog__overview').hide().html(data).fadeIn(900);

        // Call function for edit description - textarea
        $('#editlistimgdesc').click(editListImgDesc);
        $('#closelistimgdesc').click(closeListImgDesc);
        $('#savelistimgdesc').click(saveListImgDesc);

      }, 1000);

    },
    error: function () {

    }
  });

  // Open DialogFX
  dialogEl = document.getElementById(thisDataDialog);
  dlg = new DialogFx(dialogEl, {
    onOpenDialog: function (instance) {
      // Open DialogFX
      console.log('Open dialog - Image: OPEN');
    },
    onCloseDialog: function (instance) {
      // Close DialogFX
      console.log('Open dialog - Image: CLOSE');
    }
  });
  dlg.toggle(dlg);

  return false;
}

/**
 * Jquery Function - DialogFX Open - Video - House
 * @example
 * Attribute 'data-dialog' in button => ID of dialog 'div' block
 * -----------------
 * <button class="dialog-open-video" type="button" data-dialog="videoitemDetails"></button>
 *
 *  <div id="videoitemDetails" class="dialog item-details">
 *    <div class="dialog__overlay"></div>
 *    <div class="dialog__content">
 *      <div class="container-fluid">
 *        <div class="row dialog__overview">
 *          <!-- Data over AJAX  -->
 *        </div>
 *      </div>
 *      <button class="close action top-right" type="button" data-dialog-close>
 *        <i class="pg-close fs-14"></i>
 *      </button>
 *    </div>
 *  </div>
 */
function openDialogVideo(event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Get Data-Dialog
  thisDataDialog = $(this).attr('data-dialog');
  // Get ID of Video
  var videoID = $(this).parents(":eq(4)").attr('id');

  // Ajax
  $.ajax({
    url: "/plugins/intranet/admin/ajax/int_table_dialog_video.php",
    type: "POST",
    datatype: 'html',
    data: {
      videoID: videoID
    },
    beforeSend: function () {

      // Show progress circle
      $('#videoitemDetails .dialog__overview').html('<div style="display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20">Načítání ... Prosím počkejte</div></div>');

    },
    success: function (data) {

      setTimeout(function () {
        // Add html data to 'div'
        $('#videoitemDetails .dialog__overview').hide().html(data).fadeIn(900);

      }, 1000);

    },
    error: function () {

    }
  });

  // Open DialogFX
  dialogEl = document.getElementById(thisDataDialog);
  dlg = new DialogFx(dialogEl, {
    onOpenDialog: function (instance) {
      // Open DialogFX
      console.log('Open dialog - Image: OPEN');
    },
    onCloseDialog: function (instance) {
      // Close DialogFX
      console.log('Open dialog - Image: CLOSE');
    }
  });
  dlg.toggle(dlg);

  return false;
}

/**
 * Jquery Function - DialogFX Open - Task - House
 * @example
 * Attribute 'data-dialog' in button => ID of dialog 'div' block
 * -----------------
 * <button class="dialog-open" type="button" data-dialog="taskDialogEdit"></button>
 *
 *  <div id="taskDialogEdit" class="dialog item-details">
 *    <div class="dialog__overlay"></div>
 *    <div class="dialog__content">
 *      <div class="container-fluid">
 *        <div class="row dialog__overview">
 *          <!-- Data over AJAX  -->
 *        </div>
 *      </div>
 *      <button class="close action top-right" type="button" data-dialog-close>
 *        <i class="pg-close fs-14"></i>
 *      </button>
 *    </div>
 *  </div>
 */
function openDialogEditTask(event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Get Data-Dialog
  thisDataDialog = $(this).attr('data-dialog');
  // Get ID of Task
  var taskID = $(this).attr('data-id');

  // Ajax
  $.ajax({
    url: "/plugins/intranet/admin/ajax/int_table_dialog_task.php",
    type: "POST",
    datatype: 'html',
    data: {
      taskID: taskID
    },
    beforeSend: function () {

      // Show progress circle
      $('#taskDialogEdit .dialog__overview').html('<div style="display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20">Načítání ... Prosím počkejte</div></div>');

    },
    success: function (data) {

      setTimeout(function () {
        // Add html data to 'div'
        $('#taskDialogEdit .dialog__overview').hide().html(data).fadeIn(900);

        // Init TinyMCE
        tinymce.remove('#editTaskEditor');
        initializeTinyMce('#editTaskEditor', 300);

        // Init Select2 plugin
        $('#taskDialogEdit .selectpicker').select2({
          minimumResultsForSearch: -1,
          dropdownParent: $('.page-content-wrapper'),
          dropdownCssClass: 'zindex1060'
        });

        // Init DateTimePicker
        initializeDateTimePicker('input[name=envo_edittasktime]');
        initializeDateTimePicker('input[name=envo_edittaskreminder]');

      }, 1000);

    },
    error: function () {

    },
    complete: function () {


    }
  });

  // Open DialogFX
  dialogEl = document.getElementById(thisDataDialog);
  dlg = new DialogFx(dialogEl, {
    onOpenDialog: function (instance) {
      // Open DialogFX
      console.log('Open dialog - Edit Task: OPEN');
    },
    onCloseDialog: function (instance) {
      // Close DialogFX
      console.log('Open dialog - Edit Task: CLOSE');
    }
  });
  dlg.toggle(dlg);

  return false;
}

/**
 * Jquery Function - Delete Image from DB - House
 * @example
 * Attribute 'data-id' in button => ID is id of image in DB
 * -----------------
 * <button class="delete-img" type="button" data-id="id_of_image_in_DB"></button>
 *
 */
function deleteImg(imageID) {

  // Ajax
  $.ajax({
    url: "/plugins/intranet/admin/ajax/int_table_delete_img.php",
    type: "POST",
    datatype: 'json',
    data: {
      imageID: imageID
    },
    success: function (data) {

      if (data.status == 'delete_success') {
        // IF DATA SUCCESS

        // Removes elements from the Isotope instance and DOM
        $('#gallery_envo1').isotope('remove', $('#' + data.data[0].id))
        // Layout remaining item elements
          .isotope('layout');

        // Notification
        setTimeout(function () {
          $.notify({
            // options
            message: data.status_msg
          }, {
            // settings
            type: 'success',
            delay: 2000
          });
        }, 1000);

      } else {
        // IF DATA ERROR

        // Notification
        setTimeout(function () {
          $.notify({
            // options
            message: data.status_msg
          }, {
            // settings
            type: 'danger',
            delay: 5000
          });
        }, 1000);

      }
    },
    complete: function () {

    },
    error: function () {

    }
  });

  return false;
}

function confirmdeleteImg(event) {
// Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Get ID of Task
  var imageID = $(this).attr('data-id');

  // Show Message
  bootbox.setLocale(envoWeb.envo_lang);
  bootbox.confirm({
    title: "Potvrzení o odstranění!",
    message: $(this).attr('data-confirm-delimg'),
    className: "bootbox-confirm-del",
    animate: true,
    buttons: {
      confirm: {
        className: 'btn-success'
      },
      cancel: {
        className: 'btn-danger'
      }
    },
    callback: function (result) {
      if (result == true) {
        console.log('Delete Image - ID: ' + imageID);
        deleteImg(imageID);
      }
      console.log('Bootbox confirm dialog - Image: ' + result);
    }
  });

  return false;
}

/**
 * Jquery Function - Delete Image from DB - House List
 * @example
 * Attribute 'data-id' in button => ID is id of image in DB
 * -----------------
 * <button class="delete-img" type="button" data-id="id_of_image_in_DB"></button>
 *
 */
function deleteListImg(imageID) {

  // Ajax
  $.ajax({
    url: "/plugins/intranet/admin/ajax/int_list_table_delete_img.php",
    type: "POST",
    datatype: 'json',
    data: {
      imageID: imageID
    },
    success: function (data) {

      if (data.status == 'delete_success') {
        // IF DATA SUCCESS

        // Removes elements quickly from the list
        // $('div[id=' + data.data[0].id + ']').remove();
        // Removes elements slowly from the list
        $('div[id=' + data.data[0].id + ']').fadeOut(300, function(){ $(this).remove();});

        // Notification
        setTimeout(function () {
          $.notify({
            // options
            message: data.status_msg
          }, {
            // settings
            type: 'success',
            delay: 2000
          });
        }, 1000);

      } else {
        // IF DATA ERROR

        // Notification
        setTimeout(function () {
          $.notify({
            // options
            message: data.status_msg
          }, {
            // settings
            type: 'danger',
            delay: 5000
          });
        }, 1000);

      }
    },
    complete: function () {

    },
    error: function () {

    }
  });

  return false;
}

function confirmdeleteListImg(event) {
// Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Get ID of Task
  var imageID = $(this).attr('data-id');

  // Show Message
  bootbox.setLocale(envoWeb.envo_lang);
  bootbox.confirm({
    title: "Potvrzení o odstranění!",
    message: $(this).attr('data-confirm-delimg'),
    className: "bootbox-confirm-del",
    animate: true,
    buttons: {
      confirm: {
        className: 'btn-success'
      },
      cancel: {
        className: 'btn-danger'
      }
    },
    callback: function (result) {
      if (result == true) {
        console.log('Delete Image - ID: ' + imageID);
        deleteListImg(imageID);
      }
      console.log('Bootbox confirm dialog - Image: ' + result);
    }
  });

  return false;
}

/**
 * Jquery Function - Delete Video from DB - House
 * @example
 * Attribute 'data-id' in button => ID is id of image in DB
 * -----------------
 * <button class="delete-video" type="button" data-id="id_of_video_in_DB"></button>
 *
 */
function deleteVideo(videoID) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Ajax
  $.ajax({
    url: "/plugins/intranet/admin/ajax/int_table_delete_video.php",
    type: "POST",
    datatype: 'json',
    data: {
      videoID: videoID
    },
    success: function (data) {

      if (data.status == 'delete_success') {
        // IF DATA SUCCESS

        // Removes elements from the Isotope instance and DOM
        $('#videogallery_envo').isotope('remove', $('#' + data.data[0].id))
        // Layout remaining item elements
          .isotope('layout');

        // Notification
        setTimeout(function () {
          $.notify({
            // options
            message: data.status_msg
          }, {
            // settings
            type: 'success',
            delay: 2000
          });
        }, 1000);

      } else {
        // IF DATA ERROR

        // Notification
        setTimeout(function () {
          $.notify({
            // options
            message: data.status_msg
          }, {
            // settings
            type: 'danger',
            delay: 5000
          });
        }, 1000);

      }
    },
    complete: function () {

    },
    error: function () {

    }
  });

  return false;
}

function confirmdeleteVideo(event) {
// Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Get ID of Video
  var videoID = $(this).attr('data-id');

  // Show Message
  bootbox.setLocale(envoWeb.envo_lang);
  bootbox.confirm({
    title: "Potvrzení o odstranění!",
    message: $(this).attr('data-confirm-delvideo'),
    className: "bootbox-confirm-del",
    animate: true,
    buttons: {
      confirm: {
        className: 'btn-success'
      },
      cancel: {
        className: 'btn-danger'
      }
    },
    callback: function (result) {
      if (result == true) {
        console.log('Delete Video - ID: ' + videoID);
        deleteVideo(videoID);
      }
      console.log('Bootbox confirm dialog - Video: ' + result);
    }
  });

  return false;
}

/**
 * Jquery Function - Delete Task from DB - House
 * @example
 * Attribute 'data-id' in button => ID is id of image in DB
 * -----------------
 * <button class="deleteTask" type="button" data-id="id_of_task_in_DB"></button>
 *
 */
function deleteTask(taskID) {

  // Ajax
  $.ajax({
    url: "/plugins/intranet/admin/ajax/int_table_delete_task.php",
    type: "POST",
    datatype: 'json',
    data: {
      taskID: taskID
    },
    success: function (data) {

      if (data.status == 'delete_success') {
        // IF DATA SUCCESS

        // Removes elements from the Isotope instance and DOM
        $('#task_' + data.data[0].id).remove();

        // Notification
        setTimeout(function () {
          $.notify({
            // options
            message: data.status_msg
          }, {
            // settings
            type: 'success',
            delay: 2000
          });
        }, 1000);

      } else {
        // IF DATA ERROR

        // Notification
        setTimeout(function () {
          $.notify({
            // options
            message: data.status_msg
          }, {
            // settings
            type: 'danger',
            delay: 5000
          });
        }, 1000);

      }
    },
    complete: function () {

    },
    error: function () {

    }
  });

  return false;
}

function confirmDeleteTask(event) {
// Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Get ID of Task
  var taskID = $(this).attr('data-id');

  // Show Message
  bootbox.setLocale(envoWeb.envo_lang);
  bootbox.confirm({
    title: "Potvrzení o odstranění!",
    message: $(this).attr('data-confirm-deltask'),
    className: "bootbox-confirm-del",
    animate: true,
    buttons: {
      confirm: {
        className: 'btn-success'
      },
      cancel: {
        className: 'btn-danger'
      }
    },
    callback: function (result) {
      if (result == true) {
        console.log('Delete Task - ID: ' + taskID);
        deleteTask(taskID);
      }
      console.log('Bootbox confirm dialog - Task: ' + result);
    }
  });

  return false;
}

/**
 * Jquery Function - Edit Image Description - House
 * Remove attribute 'disabled' from textarea and hide Edit button, show Save-Close button
 * @example
 * -----------------
 * <input type="text" id="shortdesc" class="form-control" readonly>
 * <textarea id="desc" readonly>' . $text . '</textarea>
 * <button id="editimgdesc" type="button">Edit Description</button>
 * <button id="saveimgdesc" style="display:none;" data-id="' . $id . '" type="button">Save</button>
 * <button id="closeimgdesc" style="display:none;" type="button">Close</button>
 */
function editImgDesc(event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Remove attribute from textarea
  $('#desc').attr('readonly', false);
  $('#shortdesc').attr('readonly', false);
  // Hide click (this) element
  $(this).hide();
  // Show Save and Close button
  $('#saveimgdesc').show();
  $('#closeimgdesc').show();

  return false;
}

/**
 * Jquery Function - Edit Image Description - House List
 * Remove attribute 'disabled' from textarea and hide Edit button, show Save-Close button
 * @example
 * -----------------
 * <input type="text" id="listshortdesc" class="form-control" readonly>
 * <textarea id="listdesc" readonly>' . $text . '</textarea>
 * <button id="editlistimgdesc" type="button">Edit Description</button>
 * <button id="savelistimgdesc" style="display:none;" data-id="' . $id . '" type="button">Save</button>
 * <button id="closelistimgdesc" style="display:none;" type="button">Close</button>
 */
function editListImgDesc(event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Remove attribute
  $('#listdesc').attr('readonly', false);
  $('#listshortdesc').attr('readonly', false);
  // Show 'select'
  $('select[name="envo_listshortdesc"]').parents().eq(2).show();
  $('select[name="envo_listshortdesc"]').change(function(){
    var value = $(this).val();
    $('#listshortdesc').val(value);
    console.log('Short Description - Selected item : ' + value)
  });
  // Hide click (this) element
  $(this).hide();
  // Show Save and Close button
  $('#savelistimgdesc').show();
  $('#closelistimgdesc').show();

  return false;
}

/**
 * Jquery Function - Save Description - House
 * Save description over Ajax
 * @example
 * -----------------
 * <textarea id="desc">' . $text . '</textarea>
 * <button id="saveimgdesc"  data-id="' . $id . '" type="button">Save</button>
 * <button id="closeimgdesc" type="button">Close</button>
 */
function saveImgDesc(event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Get ID of image
  var imageID = $(this).attr('data-id');
  // Get Description
  var descImage = $('#desc').val();
  var shortdescImage = $('#shortdesc').val();

  // Ajax
  $.ajax({
    url: "/plugins/intranet/admin/ajax/int_table_update_img.php",
    type: "POST",
    datatype: 'json',
    data: {
      imageID: imageID,
      descImage: descImage,
      shortdescImage: shortdescImage
    },
    success: function (data) {

      if (data.status == 'update_success') {
        // IF DATA SUCCESS

        // Edit Time
        $('#timeedit').html(data.data[0].timeedit);

        // Add attribute to textarea
        $('#desc').attr('readonly', true);
        $('#shortdesc').attr('readonly', true);
        // Hide Save and Close button
        $('#saveimgdesc').hide();
        $('#closeimgdesc').hide();
        // Show Edit button
        $('#editimgdesc').show();

        // Add data.shortdescription to Isotop item
        var elClass = $('#' + data.data[0].id + '.gallery-item-' + data.data[0].id);
        elClass.find('.shortdesc').text(data.data[0].shortdescription);

        // Apply the plugin to the container
        $('#notificationcontainer').pgNotification({
          style: 'bar',
          message: data.status_msg,
          position: 'top',
          timeout: 2000,
          type: 'success',
          showClose: false
        }).show();
      }
    },
    error: function () {

    }
  });

  return false;
}

/**
 * Jquery Function - Save Description - House List
 * Save description over Ajax
 * @example
 * -----------------
 * <textarea id="desc">' . $text . '</textarea>
 * <button id="saveimgdesc"  data-id="' . $id . '" type="button">Save</button>
 * <button id="closeimgdesc" type="button">Close</button>
 */
function saveListImgDesc(event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Get ID of image
  var imageID = $(this).attr('data-id');
  // Get Description
  var descImage = $('#listdesc').val();
  var shortdescImage = $('#listshortdesc').val();

  // Ajax
  $.ajax({
    url: "/plugins/intranet/admin/ajax/int_list_table_update_img.php",
    type: "POST",
    datatype: 'json',
    data: {
      imageID: imageID,
      descImage: descImage,
      shortdescImage: shortdescImage
    },
    success: function (data) {

      if (data.status == 'update_success') {
        // IF DATA SUCCESS

        // Edit Time
        $('#timeedit').html(data.data[0].timeedit);

        // Add attribute
        $('#listdesc').attr('readonly', true);
        $('#listshortdesc').attr('readonly', true);
        // Hide 'select'
        $('select[name="envo_listshortdesc"]').parents().eq(2).hide();
        // Hide Save and Close button
        $('#savelistimgdesc').hide();
        $('#closelistimgdesc').hide();
        // Show Edit button
        $('#editlistimgdesc').show();

        // Add data.shortdescription to item
        var elClass = $('#' + data.data[0].id + '.gallery-item-' + data.data[0].id);
        elClass.find('.shortdesc').text(data.data[0].shortdescription);
        if ((data.data[0].description).length > 0) {
          elClass.find('.text a').data('caption', data.data[0].shortdescription + ' - ' + data.data[0].description);
        } else {
          elClass.find('.text a').data('caption', data.data[0].shortdescription);
        }

        // Apply the plugin to the container
        $('#notificationcontainer').pgNotification({
          style: 'bar',
          message: data.status_msg,
          position: 'top',
          timeout: 2000,
          type: 'success',
          showClose: false
        }).show();
      }
    },
    error: function () {

    }
  });

  return false;
}

/**
 * Jquery Function - Close Description - House
 * Close editing description
 * @example
 * -----------------
 * <textarea id="desc">' . $text . '</textarea>
 * <button id="editimgdesc" type="button" style="display:none;">Edit Description</button>
 * <button id="saveimgdesc" type="button"  data-id="' . $id . '">Save</button>
 * <button id="closeimgdesc" type="button">Close</button>
 */
function closeImgDesc(event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Add attribute to textarea
  $('#desc').attr('readonly', true);
  $('#shortdesc').attr('readonly', true);
  // Hide click (this) element and hide Save button
  $(this).hide();
  // Show Edit button
  $('#saveimgdesc').hide();
  $('#editimgdesc').show();

  return false;
}

/**
 * Jquery Function - Close Description - House List
 * Close editing description
 * @example
 * -----------------
 * <input type="text" id="listshortdesc" class="form-control" readonly>
 * <textarea id="listdesc" readonly>' . $text . '</textarea>
 * <button id="editlistimgdesc" type="button">Edit Description</button>
 * <button id="savelistimgdesc" style="display:none;" data-id="' . $id . '" type="button">Save</button>
 * <button id="closelistimgdesc" style="display:none;" type="button">Close</button>
 */
function closeListImgDesc(event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Add attribute
  $('#listdesc').attr('readonly', true);
  $('#listshortdesc').attr('readonly', true);
  // Hide 'select'
  $('select[name="envo_listshortdesc"]').parents().eq(2).hide();
  // Hide click (this) element and hide Save button
  $(this).hide();
  // Show Edit button
  $('#savelistimgdesc').hide();
  $('#editlistimgdesc').show();

  return false;
}

/**
 * Jquery Function - Edit Category - House
 */
function editImgCat(event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Remove attribute from select
  $('#info1 .selectpicker').attr('disabled', false);
  // Hide click (this) element
  $(this).hide();
  // Show Save and Close button
  $('#saveimgcat').show();
  $('#closeimgcat').show();

  return false;
}

/**
 * Jquery Function - Save Category - House
 */
function saveImgCat(event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Get ID of image
  var imageID = $(this).attr('data-id');
  // Get Description
  var catImage = $('select[name="envo_imgcategory_dialog"]').val();

  // Ajax
  $.ajax({
    url: "/plugins/intranet/admin/ajax/int_table_update_img_cat.php",
    type: "POST",
    datatype: 'json',
    data: {
      imageID: imageID,
      catImage: catImage
    },
    success: function (data) {

      if (data.status == 'update_success') {
        // IF DATA SUCCESS

        // Edit Time
        $('#timeedit').html(data.data[0].timeedit);

        // Add attribute to select
        $('#info1 .selectpicker').attr('disabled', true);
        // Hide Save and Close button
        $('#saveimgcat').hide();
        $('#closeimgcat').hide();
        // Show Edit button
        $('#editimgcat').show();

        // Add data.category to Isotop item
        var elClass = $('#' + data.data[0].id).attr('class').split(" ")[0];
        $('#' + data.data[0].id + '.' + elClass).removeClass().addClass(elClass + ' ' + data.data[0].category);

        // Apply the plugin to the container
        $('#notificationcontainer').pgNotification({
          style: 'bar',
          message: data.status_msg,
          position: 'top',
          timeout: 2000,
          type: 'success',
          showClose: false
        }).show();
      }
    },
    error: function () {

    }
  });

  return false;
}

/**
 * Jquery Function - Close Category - House
 */
function closeImgCat(event) {
  // Stop, the default action of the event will not be triggered
  event.preventDefault();

  // Add attribute to select
  $('#info1 .selectpicker').attr('disabled', true);
  // Hide click (this) element and hide Save button
  $(this).hide();
  // Show Edit button
  $('#saveimgcat').hide();
  $('#editimgcat').show();

  return false;
}

/* Add new row for Main Contact - House */
function addRowCont() {
  // Get value
  var houseID = pageID;
  var contact = $('input[name="addRowCont"]');
  var contactval = contact.val();

  if (contactval.length > 0) {
    // Ajax
    $.ajax({
      type: "POST",
      url: "/plugins/intranet/admin/ajax/int_table_addnew_cont.php",
      datatype: 'json',
      data: {
        houseID: houseID,
        contact: contactval
      },
      success: function (data) {

        if (data.status == 'success') {
          // IF DATA SUCCESS

          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          var tabledata = '';

          $.each(result, function (key, data) {
            //console.log('Key: ' + key + ' => ' + 'Value: ' + data);

            if (key === 'data') {

              $.each(data, function (index, data) {
                // console.log('ID: ', data['id']);
                // console.log('Name: ', data['name']);
                // console.log('Address: ', data['address']);
                // console.log('Phone: ', data['phone']);
                // console.log('Email: ', data['email']);
                // console.log('Commission: ', data['commission']);

                tabledata += '<tr>' +
                  '<td>' + data["id"] + '</td>' +
                  '<td>' + data["name"] + '</td>' +
                  '<td>' + data["address"] + '</td>' +
                  '<td>' + data["phone"] + '</td>' +
                  '<td>' + data["email"] + '</td>' +
                  '<td>' + data["commission"] + '</td>' +
                  '</tr>';

              })

            }

          });

          // Put data to table
          $('#tablecontacts tbody').html(tabledata);

          // Update Jquery Tabledit Plugin
          $('#tablecontacts').Tabledit('update');

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);

        } else {
          // IF DATA ERROR

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 5000
            });
          }, 1000);

        }
        houseSelect
      },
      error: function () {

      }
    });

    // Set border for input - error
    contact.parent().removeClass('has-error');

  } else {
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: 'Před vložením nového kontaktu zadejte celé jméno'
      }, {
        // settings
        type: 'danger',
        delay: 5000
      });
    }, 1000);

    // Set border for input - error
    contact.parent().addClass('has-error');
  }
}

/* Add new row for Entrance - House */
function addRowEnt() {
  // Get value
  var houseID = pageID;
  var entrance = $('input[name="addRowEnt"]');
  var entranceval = entrance.val();

  if (entranceval.length && $.isNumeric(entranceval)) {
    // Ajax
    $.ajax({
      type: "POST",
      url: "/plugins/intranet/admin/ajax/int_table_addnew.php",
      datatype: 'json',
      data: {
        houseID: houseID,
        entrance: entranceval
      },
      success: function (data) {

        if (data.status == 'success') {
          // IF DATA SUCCESS

          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          var tabledata = '';

          $.each(result, function (key, data) {
            //console.log('Key: ' + key + ' => ' + 'Value: ' + data);

            if (key === 'data') {

              $.each(data, function (index, data) {
                // console.log('ID: ', data['id']);
                // console.log('Entrance: ', data['entrance']);
                // console.log('Appartement: ', data['countapartment']);
                // console.log('Etage: ', data['countetage']);
                // console.log('Elevator: ', data['elevator']);

                tabledata += '<tr>' +
                  '<td>' + data["id"] + '</td>' +
                  '<td>' + data["entrance"] + '</td>' +
                  '<td>' + data["countapartment"] + '</td>' +
                  '<td>' + data["countetage"] + '</td>' +
                  '<td>' + data["elevator"] + '</td>' +
                  '</tr>';

              })

            }

          });

          // Put data to table
          $('#tableentrance tbody').html(tabledata);

          // Update Jquery Tabledit Plugin
          $('#tableentrance').Tabledit('update');

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg + ', stránka bude obnovena'
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);

          // Location reload
          setInterval(function () {
            location.reload(true);
          }, 5000);

        } else {
          // IF DATA ERROR

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 5000
            });
          }, 1000);

        }

      },
      error: function () {

      }
    });

    // Set border for input - error
    entrance.parent().removeClass('has-error');
  } else {
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: 'Před vložením nového řádku zadejte číslo vchodu. <br>Zkontrolujte zda-li číslo vchodu je celé číslo (0-9).'
      }, {
        // settings
        type: 'danger',
        delay: 5000
      });
    }, 1000);

    // Set border for input - error
    entrance.parent().addClass('has-error');
  }
}

/* Add new row for Apartment - House */
function addRowApt() {
  // Get value
  var houseID = pageID;
  var entrance = $(this).attr("data-entrance");

  $.ajax({
    type: "POST",
    url: "/plugins/intranet/admin/ajax/int_table_addnew_apt.php",
    datatype: 'html',
    data: {
      houseID: houseID,
      entrance: entrance
    },
    success: function (data) {
      $('#tableapartment_' + entrance + ' tbody').html(data);

      $('#tableapartment_' + entrance).Tabledit('update');

    },
    error: function () {

    }
  })
}

/* Add new row for Services - House */
function addRowServ() {
  // Get value
  var houseID = pageID;

  // Ajax
  $.ajax({
    type: "POST",
    url: "/plugins/intranet/admin/ajax/int_table_addnew_serv.php",
    datatype: 'json',
    data: {
      houseID: houseID
    },
    success: function (data) {

      if (data.status == 'success') {
        // IF DATA SUCCESS

        var str = JSON.stringify(data);
        var result = JSON.parse(str);

        var tabledata = '';

        $.each(result, function (key, data) {
          //console.log('Key: ' + key + ' => ' + 'Value: ' + data);

          if (key === 'data') {

            $.each(data, function (index, data) {
              // console.log('ID: ', data['id']);
              // console.log('Name: ', data['name']);
              // console.log('Address: ', data['address']);
              // console.log('Phone: ', data['phone']);
              // console.log('Email: ', data['email']);
              // console.log('Commission: ', data['commission']);

              tabledata += '<tr class="success">' +
                '<td>' + data["id"] + '</td>' +
                '<td>' + data["description"] + '</td>' +
                '<td>' + data["timedefault"] + '</td>' +
                '<td>' + data["timestart"] + '</td>' +
                '<td>' + data["timeend"] + '</td>' +
                '</tr>';

            })

          }

        });

        // Put data to table
        $('#tableservice tbody tr').removeClass('success');
        $('#tableservice tbody').prepend(tabledata);

        // Update Jquery Tabledit Plugin
        $('#tableservice').Tabledit('update');

        // Notification
        setTimeout(function () {
          $.notify({
            // options
            message: data.status_msg
          }, {
            // settings
            type: 'success',
            delay: 2000
          });
        }, 1000);

      } else {
        // IF DATA ERROR

        // Notification
        setTimeout(function () {
          $.notify({
            // options
            message: data.status_msg
          }, {
            // settings
            type: 'danger',
            delay: 5000
          });
        }, 1000);

      }

    },
    error: function () {

    }
  });
}

/* Click Task Header - House */
function clickTaskHeader() {
  $header = $(this);
  //getting text element
  $text = $header.children('span.collapsetask');
  //getting the next element
  $content = $header.next().next();
  //open up the content needed - toggle the slide- if visible, slide up, if not slidedown.
  $content.slideToggle(500, function () {
    //execute this after slideToggle is done
    //change text of header based on visibility of content div
    $text.text(function () {
      //change text based on condition
      return $content.is(':visible') ? '-' : '+';
    });
  });
}

/* Init TinyMCE */
function initializeTinyMce(selector, height) {
  if (selector == undefined) {
    selector = 'textarea';
  }
  tinymce.init({
    selector: selector,
    theme: "modern",
    width: "100%",
    height: height,
    language: envoWeb.envo_lang,
    //UTF-8 Setting
    entity_encoding: "raw",
    // Plugins
    plugins: [
      "advlist autolink link charmap hr insertdatetime textcolor responsivefilemanager",
      "searchreplace visualblocks paste",
      "table"
    ],
    // Default settings after init
    paste_as_text: true,
    // Header Menubar
    menubar: "edit insert view format table",
    // Header Toolbar
    toolbar: "undo redo | bold italic | alignleft aligncenter alignjustify | bullist numlist | forecolor backcolor",
    // Footer Statusbar
    statusbar: false,
    // Valid Elements
    valid_elements: "*[*]",
    // Custom date time formats
    insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%d.%m.%Y", "%I:%M:%S %p", "%D"],
    // Responsive Filemanager
    external_filemanager_path: "/assets/plugins/tinymce/plugins/filemanager/",
    filemanager_title: "Filemanager",
    external_plugins: {
      "filemanager": "plugins/filemanager/plugin.min.js"
    }
  });
}

/* Init DateTimePicker */
function initializeDateTimePicker(selector) {
  /** DateTimePicker
   * @require: DateTimePicker Plugin
   ========================================= */
  $(selector).datetimepicker({
    // Language
    locale: envoWeb.envo_lang,
    // Date-Time format
    format: 'DD.MM.YYYY',
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
}

/** 00. DialogFx Initialisation
 * @require: DialogFx Plugin
 ========================================================================*/

$(function () {

  // Dialog open for House
  $('.dialog-open-img').click(openDialogImg);
  $('.dialog-open-video').click(openDialogVideo);

  // Dialog open for House List
  $('.dialog-open-listimg').click(openDialogListImg);

  //
  $('.closedialog').click(function(event){
    event.stopPropagation();
  });

});

/** 00. TinyMCE Initialisation
 * @require: TinyMCE Plugin
 ========================================================================*/

$(function () {

  if (page2 != null) {
    tinymce.init({
      selector: "textarea.envoEditorLarge",
      theme: "modern",
      width: "100%",
      height: 500,
      language: envoWeb.envo_lang,
      //UTF-8 Setting
      entity_encoding: "raw",
      // Custom Menubar
      menubar: "edit insert view format table tools",
      //
      plugins: [
        "advlist autolink link image lists charmap preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality emoticons paste textcolor responsivefilemanager "
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist | link | preview | forecolor backcolor",
      statusbar: false,
      image_advtab: true,
      relative_urls: false,
      convert_urls: false,
      remove_script_host: true,
      document_base_url: "/",
      valid_elements: "*[*]",
      // Custom date time formats
      insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%d.%m.%Y", "%I:%M:%S %p", "%D"],
      //
      external_filemanager_path: "/assets/plugins/tinymce/plugins/filemanager/",
      filemanager_title: "Filemanager",
      external_plugins: {
        "filemanager": "plugins/filemanager/plugin.min.js"
      }
    });

    tinymce.init({
      selector: "textarea.envoEditorSmall",
      theme: "modern",
      width: "100%",
      height: 300,
      language: envoWeb.envo_lang,
      //UTF-8 Setting
      entity_encoding: "raw",
      // Custom Menubar
      menubar: "edit insert view format table tools",
      //
      plugins: [
        "advlist autolink link image lists charmap preview hr anchor pagebreak",
        "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
        "save table contextmenu directionality paste textcolor "
      ],
      toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignjustify | bullist numlist | forecolor backcolor",
      statusbar: false,
      image_advtab: true,
      relative_urls: false,
      convert_urls: false,
      remove_script_host: true,
      document_base_url: "/",
      valid_elements: "*[*]",
      // Custom date time formats
      insertdatetime_formats: ["%H:%M:%S", "%Y-%m-%d", "%d.%m.%Y", "%I:%M:%S %p", "%D"],
    });
  }

});

/* 00. ISOTOPE PHOTO GALLERY
 ========================================================================*/
$(function () {

  /* GRID
   -------------------------------------------------------------*/

  /* Apply Isotope plugin - isotope.metafizzy.co
   ========================================= */

  // quick search regex
  var qsRegex;
  var filters;

  // init Isotope
  var $gallery = $('#gallery_envo_1');
  $gallery.isotope({
    itemSelector: 'div[class^="gallery-item-"]',
    masonry: {
      columnWidth: 280,
      gutter: 10,         // The horizontal space between item elements
      isFitWidth: true
    },
    filter: function () {
      var $this = $(this);
      var searchResult = qsRegex ? $this.text().match(qsRegex) : true;
      var buttonResult = filters ? $this.is(filters) : true;
      return searchResult && buttonResult;
    }
  });

  $('#imagefilters').on('click', '.filter', function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    var $this = $(this);
    // set filter for group
    filters = $(this).attr('data-filter');
    $gallery.isotope();
  });

  // use value of search field to filter
  var $quicksearch = $('#quicksearch').keyup(debounce(function () {
    qsRegex = new RegExp($quicksearch.val(), 'gi');
    $gallery.isotope();
  }));

  // change is-checked class on buttons
  $('#imagefilters .filter').on('click', function () {
    $('#imagefilters').find('.active').removeClass('active');
    $(this).addClass('active');
  });

  // debounce so filtering doesn't happen every millisecond
  function debounce(fn, threshold) {
    var timeout;
    return function debounced() {
      if (timeout) {
        clearTimeout(timeout);
      }

      function delayed() {
        fn();
        timeout = null;
      }

      setTimeout(delayed, threshold || 100);
    };
  }

  $('a[href="#cmsPage10"]').on('shown.bs.tab', function (e) {
    $gallery.isotope('layout');
  });

  $('#showPhotoList').on('click', (function (e) {

    $(this).removeClass('btn-info').addClass('btn-complete');
    $('#showFiltrPhoto').removeClass('btn-complete').addClass('btn-info');
    $('#list_photo').fadeIn(500);
    $('#isotope_photo').fadeOut(500);

  }));

  $('#showFiltrPhoto').on('click', (function (e) {

    $(this).removeClass('btn-info').addClass('btn-complete');
    $('#showPhotoList').removeClass('btn-complete').addClass('btn-info');
    $('#isotope_photo').fadeIn(500);
    $('#list_photo').fadeOut(500);
    setTimeout(function () {
      $gallery.isotope('layout');
    }, 500);

  }));

});

/* 00. ISOTOPE VIDEO GALLERY
 ========================================================================*/
$(function () {

  /* GRID
   -------------------------------------------------------------*/

  /* Apply Isotope plugin - isotope.metafizzy.co
   ========================================= */

  // quick search regex
  var qsRegexVideo;
  var filtersVideo;

  // init Isotope
  var $videogallery = $('#videogallery_envo');
  $videogallery.isotope({
    itemSelector: 'div[class^="gallery-item-"]',
    masonry: {
      columnWidth: 280,
      gutter: 10,         // The horizontal space between item elements
      isFitWidth: true
    },
    filter: function () {
      var $this = $(this);
      var searchResultVideo = qsRegexVideo ? $this.text().match(qsRegexVideo) : true;
      var buttonResultVideo = filtersVideo ? $this.is(filtersVideo) : true;
      return searchResultVideo && buttonResultVideo;
    }
  });

  $('#videofilters').on('click', '.filter', function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    var $this = $(this);
    // set filter for group
    filtersVideo = $(this).attr('data-filter');
    $videogallery.isotope();
  });

  // use value of search field to filter
  var $quicksearch = $('#videoquicksearch').keyup(debounceVideo(function () {
    qsRegexVideo = new RegExp($quicksearch.val(), 'gi');
    $videogallery.isotope();
  }));

  // change is-checked class on buttons
  $('#videofilters .filter').on('click', function () {
    $('#videofilters').find('.active').removeClass('active');
    $(this).addClass('active');
  });

  // debounceVideo so filtering doesn't happen every millisecond
  function debounceVideo(fn, threshold) {
    var timeout;
    return function debounceVideo() {
      if (timeout) {
        clearTimeout(timeout);
      }

      function delayed() {
        fn();
        timeout = null;
      }

      setTimeout(delayed, threshold || 100);
    };
  }

  $('a[href="#cmsPage11"]').on('shown.bs.tab', function (e) {
    $videogallery.isotope('layout');
  });

});

/* 00. UPLOAD FILE TO SERVER AND DELETE FILES FROM SERVER
 ========================================================================*/
$(function () {

  /* Upload Files for House
   ========================================= */

  $("#uploadBtnDocu").on('click', (function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    // Hide output
    $('#docuoutput').hide();
    // Show progress info
    $('#docuprogress').show();
    // Reset
    $("#docupercent").html('0%');

    // Get Data - properties of file from file field
    var file_data = $('#fileinput_doc').prop('files')[0];
    // Get Data - value of folder from file field
    var folder_path = $('input[name="folderpath"]').val();
    // Creating object of FormData class
    var form_data = new FormData();
    // Appending parameter named file with properties of file_field to form_data
    form_data.append('file', file_data);
    // Adding extra parameters to form_data
    form_data.append('folderpath', folder_path);
    form_data.append('houseID', pageID);

    // Ajax
    $.ajax({
      url: "/plugins/intranet/admin/ajax/int_table_upload_docu.php",
      type: "POST",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {

      },
      xhr: function () {
        // Create a new XMLHttpRequest
        var xhr = new window.XMLHttpRequest();
        //Upload progress bar
        xhr.upload.addEventListener("progress", function (evt) {
          // Make sure we can compute the length
          if (evt.lengthComputable) {

            var loaded = evt.loaded;
            var total = evt.total;

            // Append progress percentage
            var percent = (loaded / total) * 100;
            var percentComplete = percent.toFixed(2) + '%';

            // Bytes received
            var byteRec = formatFileSize(loaded);

            // Total bytes
            var totalByte = formatFileSize(total);

            // Progress output
            $('#docuprogressbar').css('width', percentComplete);
            $('#docupercent').html(percentComplete);
            $('#docubyterec').html(byteRec);
            $('#docubytetotal').html(totalByte);

          }
        }, false);

        return xhr;
      },
      success: function (data) {

        if (data.status == 'upload_success') {
          // IF DATA SUCCESS

          $('#docuoutput').html('<div class="alert alert-success" role="alert">' +
            '<button class="close" data-dismiss="alert"></button>' +
            '<strong>Success: </strong>' + data.status_msg +
            '</div>');

          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          var tabledata = '';

          $.each(result, function (key, data) {
            //console.log('Key: ' + key + ' => ' + 'Value: ' + data);

            if (key === 'data') {

              $.each(data, function (index, data) {
                // console.log('ID: ', data['id']);
                // console.log('File Icon: ', data['fileicon']);
                // console.log('Description: ', data['description']);
                // console.log('Filepath: ', data['fullpath']);

                tabledata += '<tr>' +
                  '<td class="text-center">' + data["id"] + '</td>' +
                  '<td class="text-center">' + data["fileicon"] + '</td>' +
                  '<td>' + data["description"] + '</td>' +
                  '<td class="text-center"><a href="' + data["fullpath"] + '" target="_blank">Zobrazit</a> | <a href="' + data["fullpath"] + '" download>Stáhnout</a></td>' +
                  '</tr>';

              })

            }

          });

          // Put data to table
          $('#tabledocu tbody').html(tabledata);

          // Update Jquery Tabledit Plugin
          $('#tabledocu').Tabledit('update', ({})
          );

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);

        } else if (data.status.indexOf('upload_error') != -1) {
          // IF DATA ERROR

          $('#docuoutput').html('<div class="alert alert-danger" role="alert">' +
            '<button class="close" data-dismiss="alert"></button>' +
            '<strong>Error: </strong>' + data.status + ' => ' + data.status_msg +
            '</div>');

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 2000
            });
          }, 1000);

        }

      },
      error: function () {

      },
      complete: function () {
        $('#docuprogress').hide();
        $('#docuprogressbar').css('width', '');
        $('#docuoutput').show();
      }
    });
  }));

  $("#uploadBtnImg").on('click', (function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    // Hide output
    $('#imgoutput').hide();
    // Show progress info
    $('#imgprogress').show();
    // Reset
    $("#imgpercent").html('0%');

    // Get Data - properties of file from file field
    var file_data = $('#fileinput_img').prop('files')[0];
    // Get Data - value of folder from file field
    var folder_path = $('input[name="folderpath"]').val();
    // Get Image category
    var imgcat = $('select[name="envo_imgcategory"]').val();
    // Creating object of FormData class
    var form_data = new FormData();
    // Appending parameter named file with properties of file_field to form_data
    form_data.append('file', file_data);
    // Adding extra parameters to form_data
    form_data.append('folderpath', folder_path);
    form_data.append('houseID', pageID);
    form_data.append('imageCategory', imgcat);

    // Ajax
    $.ajax({
      url: "/plugins/intranet/admin/ajax/int_table_upload_img.php",
      type: "POST",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {

      },
      xhr: function () {
        var xhr = new window.XMLHttpRequest();
        //Upload progress bar
        xhr.upload.addEventListener("progress", function (evt) {
          // Make sure we can compute the length
          if (evt.lengthComputable) {

            var loaded = evt.loaded;
            var total = evt.total;

            // Append progress percentage
            var percent = (loaded / total) * 100;
            var percentComplete = percent.toFixed(2) + '%';

            // Bytes received
            var byteRec = formatFileSize(loaded);

            // Total bytes
            var totalByte = formatFileSize(total);

            // Progress output
            $('#imgprogressbar').css('width', percentComplete);
            $('#imgpercent').html(percentComplete);
            $('#imgbyterec').html(byteRec);
            $('#imgbytetotal').html(totalByte);

          }
        }, false);

        return xhr;
      },
      success: function (data) {

        console.log(data);

        if (data.status == 'upload_success') {
          // IF DATA SUCCESS

          $('#imgoutput').html('<div class="alert alert-success" role="alert">' +
            '<button class="close" data-dismiss="alert"></button>' +
            '<strong>Success: </strong>' + data.status_msg +
            '</div>');

          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          var divdata = '';

          $.each(result, function (key, data) {
            // console.log('Key: ' + key + ' => ' + 'Value: ' + data);

            if (key === 'data') {

              $.each(data, function (index, data) {
                // console.log('ID: ', data['id']);
                // console.log('Description: ', data['description']);
                // console.log('Filethumbpath: ', data['filethumbpath']);

                // Create new Isotope item elements
                var $isotopeContent = $('' +
                  '<div id="' + data["id"] + '" class="gallery-item-' + data["id"] + ' ' + data["category"] + '" data-width="1" data-height="1">' +
                  '<div class="img_container"><img src="' + data["filethumbpath"] + '" alt="" class="image-responsive-height"></div>' +
                  '<div class="overlays full-width">' +
                  '<div class="row full-height">' +
                  '<div class="col-5 full-height">' +
                  '<div class="text font-montserrat">' + data["filenamethumb"].substring(data["filenamethumb"].lastIndexOf('.') + 1).toUpperCase() + '</div>' +
                  '</div>' +
                  '<div class="col-7 full-height">' +
                  '<div class="text">' +
                  '<a data-fancybox="gallery" href="' + data["filethumbpath"] + '">' +
                  '<button class="btn btn-info btn-xs btn-mini mr-1 fs-14" type="button"><i class="pg-image"></i></button>' +
                  '</a>' +
                  '<button class="btn btn-info btn-xs btn-mini fs-14 dialog-open-img mr-1" type="button" data-dialog="imgitemDetails"><i class="fa fa-edit"></i></button>' +
                  '<button class="btn btn-info btn-xs btn-mini fs-14 delete-img" type="button" data-id="' + data["id"] + '"  data-confirm-delimg="Jste si jistý, že chcete odstranit obrázek?"><i class="fa fa-trash"></i></button>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '<div class="full-width padding-10">' +
                  '<p class="bold">Krátký Popis</p><p class="shortdesc">' + data["shortdescription"] + '</p>' +
                  '</div>' +
                  '</div>');

                // Isotope Plugin
                // Adds and lays out newly prepended item elements at the beginning of layout
                // Prepend items to gallery
                $('#gallery_envo_1').prepend($isotopeContent)
                // Add and lay out newly prepended items
                  .isotope('prepended', $isotopeContent);

                // Call dialogFX function for button
                var elClass = $('#' + data["id"] + '.gallery-item-' + data["id"]);
                elClass.find('.dialog-open-img').click(openDialogImg);
                elClass.find('.delete-img').click(confirmdeleteImg);


              });

            }

          });

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);

        } else if (data.status.indexOf('upload_error') != -1) {
          // IF DATA ERROR

          $('#imgoutput').html('<div class="alert alert-danger" role="alert">' +
            '<button class="close" data-dismiss="alert"></button>' +
            '<strong>Error: </strong>' + data.status + ' => ' + data.status_msg +
            '</div>');

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 2000
            });
          }, 1000);

        }

      },
      error: function () {

      },
      complete: function () {
        $('#imgprogress').hide();
        $('#imgprogressbar').css('width', '');
        $('#imgoutput').show();
      }
    });
  }));

  $("#uploadBtnVideo").on('click', (function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    // Hide output
    $('#videooutput').hide();
    // Show progress info
    $('#videoprogress').show();
    // Reset
    $("#videopercent").html('0%');

    // Get Data - properties of file from file field
    var file_data = $('#fileinput_video').prop('files')[0];
    var file_datathumb = $('#fileinput_videothumb').prop('files')[0];
    // Get Data - value of folder from file field
    var folder_path = $('input[name="folderpath"]').val();
    // Get Video category
    var videocat = $('select[name="envo_videocategory"]').val();
    // Creating object of FormData class
    var form_data = new FormData();
    // Appending parameter named file with properties of file_field to form_data
    form_data.append('file', file_data);
    form_data.append('filethumb', file_datathumb);
    // Adding extra parameters to form_data
    form_data.append('folderpath', folder_path);
    form_data.append('houseID', pageID);
    form_data.append('videoCategory', videocat);

    // Ajax
    $.ajax({
      url: "/plugins/intranet/admin/ajax/int_table_upload_video.php",
      type: "POST",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {

      },
      xhr: function () {
        var xhr = new window.XMLHttpRequest();
        // Upload progress bar
        xhr.upload.addEventListener("progress", function (evt) {
          // Make sure we can compute the length
          if (evt.lengthComputable) {

            var loaded = evt.loaded;
            var total = evt.total;

            // Append progress percentage
            var percent = (loaded / total) * 100;
            var percentComplete = percent.toFixed(2) + '%';

            // Bytes received
            var byteRec = formatFileSize(loaded);

            // Total bytes
            var totalByte = formatFileSize(total);

            // Progress output
            $('#videoprogressbar').css('width', percentComplete);
            $('#videopercent').html(percentComplete);
            $('#videobyterec').html(byteRec);
            $('#videobytetotal').html(totalByte);

          }
        }, false);

        return xhr;
      },
      success: function (data) {

        console.log(data);

        if (data.status == 'upload_success') {
          // IF DATA SUCCESS

          $('#videooutput').html('<div class="alert alert-success" role="alert">' +
            '<button class="close" data-dismiss="alert"></button>' +
            '<strong>Success: </strong>' + data.status_msg +
            '</div>');

          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          var divdata = '';

          $.each(result, function (key, data) {
            // console.log('Key: ' + key + ' => ' + 'Value: ' + data);

            if (key === 'data') {

              $.each(data, function (index, data) {
                // console.log('ID: ', data['id']);
                // console.log('Description: ', data['description']);
                // console.log('Filethumbpath: ', data['filethumbpath']);

                // Create new Isotope item elements
                var $isotopeContent = $('' +
                  '<div id="' + data["id"] + '" class="gallery-item-' + data["id"] + ' ' + data["category"] + '" data-width="1" data-height="1">' +
                  '<div class="img_container"><img src="' + data["filethumbpath"] + '" alt="" class="image-responsive-height"></div>' +
                  '<div class="overlays full-width">' +
                  '<div class="row full-height">' +
                  '<div class="col-5 full-height">' +
                  '<div class="text font-montserrat">' + data["filename"].substring(data["filename"].lastIndexOf('.') + 1).toUpperCase() + '</div>' +
                  '</div>' +
                  '<div class="col-7 full-height">' +
                  '<div class="text">' +
                  '<a class="video" data-fancybox-video data-type="iframe" data-src="' + data["filepath"] + '" href="javascript:;">' +
                  '<button class="btn btn-info btn-xs btn-mini mr-1 fs-14" type="button"><i class="pg-video"></i></button>' +
                  '</a>' +
                  '<button class="btn btn-info btn-xs btn-mini fs-14 dialog-open-video mr-1" type="button" data-dialog="videoitemDetails"><i class="fa fa-edit"></i></button>' +
                  '<button class="btn btn-info btn-xs btn-mini fs-14 delete-video" type="button" data-id="' + data["id"] + '"  data-confirm-delvideo="Jste si jistý, že chcete odstranit video?"><i class="fa fa-trash"></i></button>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '<div class="full-width padding-10">' +
                  '<p class="bold">Krátký Popis</p><p class="shortdesc">' + data["shortdescription"] + '</p>' +
                  '</div>' +
                  '</div>');

                // Isotope Plugin
                // Adds and lays out newly prepended item elements at the beginning of layout
                // Prepend items to gallery
                $('#videogallery_envo').prepend($isotopeContent)
                // Add and lay out newly prepended items
                  .isotope('prepended', $isotopeContent);

                // Call dialogFX function for button
                var elClass = $('#' + data["id"] + '.gallery-item-' + data["id"]);
                elClass.find('.dialog-open-video').click(openDialogVideo);
                elClass.find('.delete-video').click(confirmdeleteVideo);
                elClass.find('[data-fancybox-video]').fancybox({
                  afterShow: function () {
                    ($('.fancybox-iframe').contents().find('body').css('background-color', 'transparent'));
                  },
                  iframe: {
                    preload: false,
                    css: {
                      width: 'auto'
                    }
                  },
                  buttons: [
                    "zoom",
                    "close"
                  ]

                });

              });

            }

          });

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);

        } else if (data.status.indexOf('upload_error') != -1) {
          // IF DATA ERROR

          $('#videooutput').html('<div class="alert alert-danger" role="alert">' +
            '<button class="close" data-dismiss="alert"></button>' +
            '<strong>Error: </strong>' + data.status + ' => ' + data.status_msg +
            '</div>');

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 2000
            });
          }, 1000);

        }

      },
      error: function () {

      },
      complete: function () {
        $('#videoprogress').hide();
        $('#videoprogressbar').css('width', '');
        $('#videooutput').show();
      }
    });
  }));

  /* Upload Files for House list
   ========================================= */

  $("#uploadListBtnDocu").on('click', (function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    // Hide output
    $('#listdocuoutput').hide();
    // Show progress info
    $('#listdocuprogress').show();
    // Reset
    $("#listdocupercent").html('0%');

    // Get Data - properties of file from file field
    var file_data = $('#fileinput_doclist').prop('files')[0];
    // Get Data - value of folder from file field
    var folder_path = $('input[name="folderpathlist"]').val();
    // Creating object of FormData class
    var form_data = new FormData();
    // Appending parameter named file with properties of file_field to form_data
    form_data.append('file', file_data);
    // Adding extra parameters to form_data
    form_data.append('folderpath', folder_path);
    form_data.append('houseID', pageID);

    // Ajax
    $.ajax({
      url: "/plugins/intranet/admin/ajax/int_list_table_upload_docu.php",
      type: "POST",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {

      },
      xhr: function () {
        // Create a new XMLHttpRequest
        var xhr = new window.XMLHttpRequest();
        //Upload progress bar
        xhr.upload.addEventListener("progress", function (evt) {
          // Make sure we can compute the length
          if (evt.lengthComputable) {

            var loaded = evt.loaded;
            var total = evt.total;

            // Append progress percentage
            var percent = (loaded / total) * 100;
            var percentComplete = percent.toFixed(2) + '%';

            // Bytes received
            var byteRec = formatFileSize(loaded);

            // Total bytes
            var totalByte = formatFileSize(total);

            // Progress output
            $('#listdocuprogressbar').css('width', percentComplete);
            $('#listdocupercent').html(percentComplete);
            $('#listdocubyterec').html(byteRec);
            $('#listdocubytetotal').html(totalByte);

          }
        }, false);

        return xhr;
      },
      success: function (data) {

        if (data.status == 'upload_success') {
          // IF DATA SUCCESS

          $('#listdocuoutput').html('<div class="alert alert-success" role="alert">' +
            '<button class="close" data-dismiss="alert"></button>' +
            '<strong>Success: </strong>' + data.status_msg +
            '</div>');

          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          var tabledata = '';

          $.each(result, function (key, data) {
            //console.log('Key: ' + key + ' => ' + 'Value: ' + data);

            if (key === 'data') {

              $.each(data, function (index, data) {
                // console.log('ID: ', data['id']);
                // console.log('File Icon: ', data['fileicon']);
                // console.log('Description: ', data['description']);
                // console.log('Filepath: ', data['fullpath']);

                tabledata += '<tr>' +
                  '<td class="text-center">' + data["id"] + '</td>' +
                  '<td class="text-center">' + data["fileicon"] + '</td>' +
                  '<td>' + data["description"] + '</td>' +
                  '<td class="text-center"><a href="' + data["fullpath"] + '" target="_blank">Zobrazit</a> | <a href="' + data["fullpath"] + '" download>Stáhnout</a></td>' +
                  '</tr>';

              })

            }

          });

          // Put data to table
          $('#listtabledocu tbody').html(tabledata);

          // Update Jquery Tabledit Plugin
          $('#listtabledocu').Tabledit('update', ({})
          );

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);

        } else if (data.status.indexOf('upload_error') != -1) {
          // IF DATA ERROR

          $('#listdocuoutput').html('<div class="alert alert-danger" role="alert">' +
            '<button class="close" data-dismiss="alert"></button>' +
            '<strong>Error: </strong>' + data.status + ' => ' + data.status_msg +
            '</div>');

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 2000
            });
          }, 1000);

        }

      },
      error: function () {

      },
      complete: function () {
        $('#listdocuprogress').hide();
        $('#listdocuprogressbar').css('width', '');
        $('#listdocuoutput').show();
      }
    });
  }));

  $("#uploadListBtnImg").on('click', (function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    // Hide output
    $('#listimgoutput').hide();
    // Show progress info
    $('#listimgprogress').show();
    // Reset
    $("#listimgpercent").html('0%');

    // Get Data - properties of file from file field
    var file_data = $('#fileinput_imglist').prop('files')[0];
    // Get Data - value of folder from file field
    var folder_path = $('input[name="folderpathlist"]').val();
    // Creating object of FormData class
    var form_data = new FormData();
    // Appending parameter named file with properties of file_field to form_data
    form_data.append('file', file_data);
    // Adding extra parameters to form_data
    form_data.append('folderpath', folder_path);
    form_data.append('houseID', pageID);

    // Ajax
    $.ajax({
      url: "/plugins/intranet/admin/ajax/int_list_table_upload_img.php",
      type: "POST",
      data: form_data,
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {

      },
      xhr: function () {
        var xhr = new window.XMLHttpRequest();
        //Upload progress bar
        xhr.upload.addEventListener("progress", function (evt) {
          // Make sure we can compute the length
          if (evt.lengthComputable) {

            var loaded = evt.loaded;
            var total = evt.total;

            // Append progress percentage
            var percent = (loaded / total) * 100;
            var percentComplete = percent.toFixed(2) + '%';

            // Bytes received
            var byteRec = formatFileSize(loaded);

            // Total bytes
            var totalByte = formatFileSize(total);

            // Progress output
            $('#listimgprogressbar').css('width', percentComplete);
            $('#listimgpercent').html(percentComplete);
            $('#listimgbyterec').html(byteRec);
            $('#listimgbytetotal').html(totalByte);

          }
        }, false);

        return xhr;
      },
      success: function (data) {

        console.log(data);

        if (data.status == 'upload_success') {
          // IF DATA SUCCESS

          $('#listimgoutput').html('<div class="alert alert-success" role="alert">' +
            '<button class="close" data-dismiss="alert"></button>' +
            '<strong>Success: </strong>' + data.status_msg +
            '</div>');

          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          var divdata = '';

          $.each(result, function (key, data) {
            // console.log('Key: ' + key + ' => ' + 'Value: ' + data);

            if (key === 'data') {

              $.each(data, function (index, data) {
                // console.log('ID: ', data['id']);
                // console.log('Description: ', data['description']);
                // console.log('Filethumbpath: ', data['filethumbpath']);

                // Create new item elements
                var $imageContent = $('' +
                  '<div id="' + data["id"] + '" class="gallery-item-' + data["id"] + ' float-left" data-width="1" data-height="1" style="margin: 5px;">' +
                  '<div class="img_container"><img src="' + data["filethumbpath"] + '" alt="" class="image-responsive-height"></div>' +
                  '<div class="overlays">' +
                  '<div class="row full-height">' +
                  '<div class="col-5 full-height">' +
                  '<div class="text font-montserrat">' + data["filenamethumb"].substring(data["filenamethumb"].lastIndexOf('.') + 1).toUpperCase() + '</div>' +
                  '</div>' +
                  '<div class="col-7 full-height">' +
                  '<div class="text">' +
                  '<a data-fancybox="gallery-0" href="' + data["filethumbpath"] + '" data-caption="NO SHORT DESCRIPTION">' +
                  '<button class="btn btn-info btn-xs btn-mini fs-14 mr-1" type="button" data-toggle="tooltipEnvo" data-placement="bottom" title="Zoom +"><i class="pg-image"></i></button>' +
                  '</a>' +
                  '<button class="btn btn-info btn-xs btn-mini fs-14 mr-1 dialog-open-listimg" type="button" data-dialog="imgitemDetails" data-toggle="tooltipEnvo" data-placement="bottom" title="Editace Informací"><i class="fa fa-edit"></i></button>' +
                  '<button class="btn btn-info btn-xs btn-mini fs-14 delete-listimg" type="button" data-id="' + data["id"] + '"  data-confirm-delimg="Jste si jistý, že chcete odstranit obrázek?" data-toggle="tooltipEnvo" data-placement="bottom" title="Odstranit"><i class="fa fa-trash"></i></button>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '<div class="full-width padding-10">' +
                  '<p class="bold">Krátký Popis</p><p class="shortdesc">' + data["shortdescription"] + '</p>' +
                  '</div>' +
                  '</div>');

                // Show name of last upload block
                if ($('#last_upload_content').children('div').length > 0) {
                  // YES, the child element is inside the parent

                } else {
                  // NO, it is not inside
                  $('#last_upload div[class^="dateblock_"]').show();
                }

                // Prepend items to gallery
                $('#last_upload_content').prepend($imageContent);

                // Call dialogFX function for button
                var elClass = $('#' + data["id"] + '.gallery-item-' + data["id"]);
                elClass.find('.dialog-open-listimg').click(openDialogListImg);
                elClass.find('.delete-listimg').click(confirmdeleteListImg);
                // Reinit Funcybox
                $('[data-fancybox]').fancybox({
                  // Internationalization
                  lang: envoWeb.envo_lang,
                  i18n: {
                    'en': {
                      DOWNLOAD: 'Download Image'
                    },
                    'cs': {
                      CLOSE: 'Zavřít',
                      NEXT: 'Další',
                      PREV: 'Předchozí',
                      ERROR: 'Požadovaný obsah nemůže být načten. <br/> Zkuste to prosím později.',
                      PLAY_START: 'Start Slideshow',
                      PLAY_STOP: 'Pause Slideshow',
                      FULL_SCREEN: 'Celá Obrazovka',
                      THUMBS: 'Náhledy',
                      DOWNLOAD: 'Stáhnout Obrázek',
                      ZOOM: "Zoom"
                    }
                  }
                });

              });

            }

          });

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);

        } else if (data.status.indexOf('upload_error') != -1) {
          // IF DATA ERROR

          $('#imgoutput').html('<div class="alert alert-danger" role="alert">' +
            '<button class="close" data-dismiss="alert"></button>' +
            '<strong>Error: </strong>' + data.status + ' => ' + data.status_msg +
            '</div>');

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 2000
            });
          }, 1000);

        }

      },
      error: function () {

      },
      complete: function () {
        $('#listimgprogress').hide();
        $('#listimgprogressbar').css('width', '');
        $('#listimgoutput').show();
      }
    });
  }));

  // Helper function that formats the file sizes
  function formatFileSize(bytes) {
    if (typeof bytes !== 'number') {
      return '';
    }

    if (bytes >= 1000000000) {
      return (bytes / 1000000000).toFixed(2) + ' GB';
    }

    if (bytes >= 1000000) {
      return (bytes / 1000000).toFixed(2) + ' MB';
    }

    return (bytes / 1000).toFixed(2) + ' KB';
  }

  /* Delete Image and Video
   ========================================= */
  // For House
  $('.delete-img').click(confirmdeleteImg);
  $('.delete-video').click(confirmdeleteVideo);

  // For House List
  $('.delete-listimg').click(confirmdeleteListImg);

});

/* 00. SELECT FILE FOR UPLOAD TO SERVER
 ========================================================================*/

$(function () {

  // Clear button
  $('.file-clear').click(function () {
    var parent = $(this).parents(":eq(1)").attr('id');

    $('#' + parent + ' .file-filename').val('');
    $('#' + parent + ' .file-clear').hide();
    $('#' + parent + ' .file-input input:file').val('');
    $('#' + parent + ' .file-input').css("border-radius", "3px 0 0 3px");
    $('#' + parent + ' .file-input-title').text('Vybrat Soubor');
  });

  // Change button
  $('.file-input input:file').change(function () {
    var parent = $(this).parents(":eq(2)").attr('id');
    var file = this.files[0];

    console.log($(this).val());

    if ($(this).val() != '') {
      $('#' + parent + ' .file-input').css("border-radius", "0");
      $('#' + parent + ' .file-input-title').text('Změnit');
      $('#' + parent + ' .file-clear').show();
      $('#' + parent + ' .file-filename').val(file.name);
    } else {
      $('#' + parent + ' .file-filename').val('');
      $('#' + parent + ' .file-clear').hide();
      $('#' + parent + ' .file-input-title').text('Vybrat Soubor');
    }
  });

});

/* 00. DATATABLE CONFIG
 ========================================================================*/

$(function () {

  // Init Datatable plugin
  $('#int_table').dataTable({
    // Language
    "language": {
      "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
    },
    "order": [],
    "columnDefs": [{
      "targets": 'no-sort',
      "orderable": false
    }],
    // Page lenght
    "pageLength": dataTablesSettings.pageLenght,
    // Show entries
    //"lengthMenu": [ [10,20, -1], [10,20, "All"] ],
    // Design Table items
    "dom": "<'row'<'col-sm-6'<'float-left m-b-20'f>><'col-sm-6'<'float-right m-r-20 hidden-xs'B>>>" + "<'row'<'col-sm-12'tr>>" + "<'row '<'col-sm-7'i><'float-right col-sm-5'p>>"
  });

});


/* 00. TABLEDIT CONFIG
 ========================================================================*/

$(function () {

  /* Tabledit init and config
   ========================================= */
  // If exist 'table' -> init Plugin Jquery-Tabledit
  if ($('#tableentrance').length > 0) {
    // Tabledit init config
    $('#tableentrance').Tabledit({
      url: '/plugins/intranet/admin/ajax/int_table_update_ent.php',
      inputClass: 'form-control',
      restoreButton: false,
      lang: 'cz',
      mutedClass: 'text-muted warning',
      columns: {
        identifier: [0, 'id'],
        editable: [
          [1, 'entrance', 'input'],
          [2, 'countapartment', 'input'],
          [3, 'countetage', 'input'],
          [4, 'elevator', 'select', '{"0": "Není známo", "1": "Ano", "2": "Ne"}']
        ]
      },
      onSuccess: function (data) {
        if (data.status == 'delete_success') {
          // Remove row in table
          $('#' + data.data[0].id).fadeOut(300, function () {
            $(this).remove();
          });

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);

          // Location reload
          setInterval(function () {
            location.reload(true);
          }, 5000);

        } else {
          // IF DATA ERROR

          // Fix for plugin
          $('#' + data.data[0].id).removeClass();
          $('#' + data.data[0].id + ' button').prop('disabled', false);

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 5000
            });
          }, 1000);

        }
      }
    });
  }

  // If exist 'table' -> init Plugin Jquery-Tabledit
  if ($('#tablecontacts').length > 0) {
    // Tabledit init config
    $('#tablecontacts').Tabledit({
      url: '/plugins/intranet/admin/ajax/int_table_update_cont.php',
      inputClass: 'form-control',
      restoreButton: false,
      lang: 'cz',
      mutedClass: 'text-muted warning',
      columns: {
        identifier: [0, 'id'],
        editable: [
          [1, 'name', 'input'],
          [2, 'address', 'input'],
          [3, 'phone', 'input'],
          [4, 'email', 'input'],
          [5, 'commission', 'select', '{"0": "Není ve Výboru", "1": "Předseda", "2": "Člen Výboru", "3": "Pověřený vlastník"}']
        ]
      },
      onSuccess: function (data) {
        if (data.status == 'update_success') {
          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);
        } else if (data.status == 'delete_success') {
          // Remove row in table
          $('#' + data.data[0].id).fadeOut(300, function () {
            $(this).remove();
          });

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);
        } else {
          // IF DATA ERROR

          // Fix for plugin
          $('#' + data.data[0].id).removeClass();
          $('#' + data.data[0].id + ' button').prop('disabled', false);

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 5000
            });
          }, 1000);

        }
      }
    });
  }

  // If exist 'table' -> init Plugin Jquery-Tabledit
  if ($('table[id^="tableapartment_"]').length > 0) {
    // Tabledit init config
    $('table[id^="tableapartment_"]').Tabledit({
      url: '/plugins/intranet/admin/ajax/int_table_update_apt.php',
      inputClass: 'form-control',
      restoreButton: false,
      lang: 'cz',
      mutedClass: 'text-muted warning',
      columns: {
        identifier: [0, 'id'],
        editable: [
          [1, 'number', 'input'],
          [2, 'etage', 'input'],
          [3, 'name', 'input'],
          [4, 'phone', 'input'],
          [5, 'commission', 'select', '{"0": "Není ve Výboru", "1": "Předseda", "2": "Člen Výboru", "3": "Pověřený vlastník"}']
        ]
      },
      onSuccess: function (data) {
        if (data.status == 'delete_success') {
          // Remove row in table
          $('#' + data.data[0].id).fadeOut(300, function () {
            $(this).remove();
          });

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);
        } else {
          // IF DATA ERROR

          // Fix for plugin
          $('#' + data.data[0].id).removeClass();
          $('#' + data.data[0].id + ' button').prop('disabled', false);

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 5000
            });
          }, 1000);

        }
      }
    });
  }

  // If exist 'table' -> init Plugin Jquery-Tabledit
  if ($('#tableservice').length > 0) {
    // Tabledit init config
    $('#tableservice').Tabledit({
      url: '/plugins/intranet/admin/ajax/int_table_update_serv.php',
      inputClass: 'form-control',
      lang: 'cz',
      mutedClass: 'text-muted warning',
      debug: false,
      columns: {
        identifier: [0, 'id'],
        editable: [
          [1, 'description', 'textarea', '{"rows": "4"}'],
          [3, 'timestart', 'input'],
          [4, 'timeend', 'input']
        ]
      },
      onDraw: function () {
        // Select all inputs of second column and apply datetimepicker each of them
        var picker = $('#tableservice input[name="timestart"], #tableservice input[name="timeend"]');

        picker.each(function () {
          $(this).datetimepicker({
            widgetParent: '#pickercontainer',
            // Language
            locale: envoWeb.envo_lang,
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
      },
      onSuccess: function (data) {
        if (data.status == 'update_success') {
          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);
        } else if (data.status == 'delete_success') {
          // Remove row in table
          $('#' + data.data[0].id).addClass('strikeout');

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);
        } else if (data.status == 'restore_success') {
          // Remove row in table
          $('#' + data.data[0].id).removeClass('strikeout');

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);
        } else {
          // IF DATA ERROR

          // Fix for plugin
          $('#' + data.data[0].id).removeClass();
          $('#' + data.data[0].id + ' button').prop('disabled', false);

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 5000
            });
          }, 1000);

        }
      }
    });
  }

  // If exist 'table' -> init Plugin Jquery-Tabledit
  if ($('#tabledocu').length > 0) {
    // Tabledit init config
    $('#tabledocu').Tabledit({
      url: '/plugins/intranet/admin/ajax/int_table_update_docu.php',
      inputClass: 'form-control',
      restoreButton: false,
      lang: 'cz',
      mutedClass: 'text-muted warning',
      columns: {
        identifier: [0, 'id'],
        editable: [
          [2, 'description', 'input']
        ]
      },
      onSuccess: function (data) {
        if (data.status == 'update_success') {
          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);
        } else if (data.status == 'delete_success') {
          // Remove row in table
          $('#' + data.data[0].id).fadeOut(300, function () {
            $(this).remove();
          });

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);
        } else {
          // IF DATA ERROR

          // Fix for plugin
          $('#' + data.data[0].id).removeClass();
          $('#' + data.data[0].id + ' button').prop('disabled', false);

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 5000
            });
          }, 1000);

        }
      }
    });
  }

  // If exist 'table' -> init Plugin Jquery-Tabledit
  if ($('#listtabledocu').length > 0) {
    // Tabledit init config
    $('#listtabledocu').Tabledit({
      url: '/plugins/intranet/admin/ajax/int_list_table_update_docu.php',
      inputClass: 'form-control',
      restoreButton: false,
      lang: 'cz',
      mutedClass: 'text-muted warning',
      columns: {
        identifier: [0, 'id'],
        editable: [
          [2, 'description', 'input']
        ]
      },
      onSuccess: function (data) {
        if (data.status == 'update_success') {
          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);
        } else if (data.status == 'delete_success') {
          // Remove row in table
          $('#' + data.data[0].id).fadeOut(300, function () {
            $(this).remove();
          });

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'success',
              delay: 2000
            });
          }, 1000);
        } else {
          // IF DATA ERROR

          // Fix for plugin
          $('#' + data.data[0].id).removeClass();
          $('#' + data.data[0].id + ' button').prop('disabled', false);

          // Notification
          setTimeout(function () {
            $.notify({
              // options
              message: data.status_msg
            }, {
              // settings
              type: 'danger',
              delay: 5000
            });
          }, 1000);

        }
      }
    });
  }


  /* Tabledit add new row to table
   ========================================= */
  /* Add new row for Main Contact */
  $('#addRowCont').click(addRowCont);

  $('input[name="addRowCont"]').on('keypress', function (event) {
    if (event.which == 13) {
      // Stop, the default action of the event will not be triggered
      event.preventDefault();

      addRowCont();
    }
  });

  /* Add new row for Entrance */
  $('#addRowEnt').click(addRowEnt);

  $('input[name="addRowEnt"]').on('keypress', function (event) {
    if (event.which == 13) {
      // Stop, the default action of the event will not be triggered
      event.preventDefault();

      addRowEnt();
    }
  });

  /* Add new row for Apartment */
  $('.addRowApt').click(addRowApt);

  /* Add new row for Services */
  $('#addRowServ').click(addRowServ);

});

/** 00. Intranet Settings - Add Row
 ========================================================================*/

$(function () {

  var nextTowerId;

  $('#addRowTower').on('click', function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    var contentT = $('#contentTower');
    var contentC = $('#contentChannel');

    // Hide div if exists
    contentT.find('div.alert').hide();

    // Get max number of ID from input
    var arr = [];
    $('input[name="envo_towername[]"]').each(function () {
      var $this = $(this);
      arr.push([$this.data('id')]);
    });
    var maxValue = Math.max.apply(Math, arr);
    var minValue = Math.min.apply(Math, arr);
    nextTowerId = maxValue + 1;

    // Add value to select
    $('#contentChannel select').append($('<option>', {value: nextTowerId, text: 'Vysílač ID ' + nextTowerId}));
    $('#contentChannel select').trigger('change');

    contentT.append($('<div class="row-form">' +
      '<div class="col-sm-5">' +
      '<strong>Vysílač ID ' + nextTowerId + '</strong>' +
      '</div>' +
      '<div class="col-sm-7">' +
      '<input type="text" name="envo_towername[]" class="form-control" data-id="' + nextTowerId + '" value="Vysílač ID ' + nextTowerId + '">' +
      '</div>' +
      '</div>'));

  });

  $('#addRowChannel').on('click', function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    var contentC = $('#contentChannel');
    var nextId = contentC.find('div.row-form').length + 1;

    contentC.find('div.alert').hide();

    contentC.append($('<div class="row-form">' +
      '<div class="col-sm-4">' +
      '<strong>Kanál ' + nextId + '</strong>' +
      '</div>' +
      '<div class="col-sm-4">' +
      '<select></select>' +
      '</div>' +
      '<div class="col-sm-4">' +
      '<input type="text" name="envo_channelname[]" class="form-control">' +
      '</div>' +
      '</div>'));

  });

});

/** 00. Bootstrap 3: Keep selected tab on page refresh
 ========================================================================*/

$(function () {

  if ($('.nav.nav-tabs.nav-tabs-fillup').length > 0) {
    // Responsive Tabs on clicking a tab
    $(document).on('show.bs.tab', '.nav.nav-tabs.nav-tabs-fillup', function (event) {
      // store the currently selected tab in the hash value
      var id = $(event.target).attr("href").substr(1);
      window.location.hash = id;
    });

    // On load of the page: switch to the currently selected tab
    var hash = window.location.hash;
    $('.nav.nav-tabs.nav-tabs-fillup a[href="' + hash + '"]').tab('show');
  }

});


/** 00. Tasks manager
 ========================================================================*/

$(function () {

  $('#addTask').on('click', function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    // Clear form
    $("#taskDialogAdd").find('input[type=text], textarea').val('');
    $("#taskDialogAdd").find('.selectpicker').select2("val", "");

    // Get Data-Dialog
    thisDataDialog = $(this).attr('data-dialog');

    // Open DialogFX
    dialogEl = document.getElementById(thisDataDialog);
    dlg = new DialogFx(dialogEl, {
      onOpenDialog: function (instance) {
        // Open DialogFX
        console.log('Open dialog - Task: OPEN');
      },
      onCloseDialog: function (instance) {
        // Close DialogFX
        console.log('Open dialog - Task: CLOSE');
        $('#saveTask').attr('disabled', false);
      }
    });
    dlg.toggle(dlg);

  });

  $('#saveTask').on('click', function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    // Get value
    var houseID = pageID;
    var priority = $('select[name=envo_addtaskpriority]').val();
    var status = $('select[name=envo_addtaskstatus]').val();
    var title = $('input[name=envo_addtasktitle]').val();
    var description = tinymce.get('envoEditorSmall').getContent();
    var reminder = $('input[name=envo_addtaskreminder]').val();
    var time = $('input[name=envo_addtasktime]').val();

    console.log(status);
    // Ajax
    $.ajax({
      type: "POST",
      url: "/plugins/intranet/admin/ajax/int_table_addnew_task.php",
      datatype: 'json',
      data: {
        houseID: houseID,
        priority: priority,
        status: status,
        title: title,
        description: description,
        reminder: reminder,
        time: time
      },
      success: function (data) {

        if (data.status == 'success') {
          // IF DATA SUCCESS

          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          var divdata = '';
          var dataID = '';

          $.each(result, function (key, data) {
            //console.log('Key: ' + key + ' => ' + 'Value: ' + data);

            if (key === 'data') {

              $.each(data, function (index, data) {
                // console.log('ID: ', data['id']);

                dataID = data["id"];

                divdata += '<div id="task_' + data["id"] + '" class="task_' + data["id"] + '">' +
                  '<div class="taskheader"><span>Task ID ' + data["id"] + '</span><span class="float-right collapsetask">+</span></div>' +
                  '<div class="taskinfo">' +
                  '<div class="container-fluid">' +
                  '<div class="table-responsive">' +
                  '<table class="table table-task">' +
                  '<thead>' +
                  '<tr>' +
                  '<th>Titulek</th>' +
                  '<th>Priorita</th>' +
                  '<th>Status</th>' +
                  '<th>Datum Úkolu</th>' +
                  '<th>Datum Připomenutí</th>' +
                  '<th></th>' +
                  '</tr>' +
                  '</thead>' +
                  '<tbody>' +
                  '<tr>' +
                  '<td>' + data["title"] + '</td>' +
                  '<td>' + data["priority"] + '</td>' +
                  '<td>' + data["status"] + '</td>' +
                  '<td>' + data["time"] + '</td>' +
                  '<td>' + data["reminder"] + '</td>' +
                  '<td ><button type="button" id="editTask" class="btn btn-default btn-xs m-r-20 editTask" data-toggle="tooltipEnvo" title="" data-dialog="taskDialogEdit" data-original-title="Editovat" data-id="' + data["id"] + '"><i class="fa fa-edit"></i></button>' +
                  '<button type="button" class="btn btn-danger btn-xs deleteTask" data-confirm-deltask="Jste si jistý, že chcete odstranit úkol <strong>' + data["title"] + '</strong>" data-toggle="tooltipEnvo" title="Odstranit" data-id="' + data["id"] + '"><i class="fa fa-trash-o"></i></button></td>' +
                  '</tr>' +
                  '</tbody>' +
                  '</table>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '<div class="taskcontent">' +
                  '<p><strong >Popis Úkolu:</strong></p>' +
                  '<div class="taskdescription">' + data["description"] + '</div>' +
                  '</div>' +
                  '</div>';

              })

            }

          });

          // // Put data to 'div'
          $('#tasklist').prepend(divdata);

          // Call function
          $('#task_' + dataID + ' .taskheader').click(clickTaskHeader);
          $('#task_' + dataID + ' .editTask').click(openDialogEditTask);
          $('#task_' + dataID + ' .deleteTask').click(confirmDeleteTask);

          // Disable 'button'
          $('#saveTask').attr('disabled', true);

          // Notification
          // Apply the plugin to the container
          $('#notificationcontainer_add').pgNotification({
            style: 'bar',
            message: data.status_msg,
            position: 'top',
            timeout: 2000,
            type: 'success',
            showClose: false
          }).show();

        } else {
          // IF DATA ERROR

          // Notification
          // Apply the plugin to the container
          $('#notificationcontainer_add').pgNotification({
            style: 'bar',
            message: data.status_msg,
            position: 'top',
            timeout: 2000,
            type: 'danger',
            showClose: false
          }).show();

        }

      },
      error: function () {

      }
    });

  });

  $('#udpateTask').on('click', function (event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    // Get value
    var taskID = $('input[name=envo_edittaskid]').val();
    var houseID = pageID;
    var priority = $('select[name=envo_edittaskpriority]').val();
    var status = $('select[name=envo_edittaskstatus]').val();
    var title = $('input[name=envo_edittasktitle]').val();
    var description = tinymce.get('editTaskEditor').getContent();
    var reminder = $('input[name=envo_edittaskreminder]').val();
    var time = $('input[name=envo_edittasktime]').val();

    console.log(priority);
    // Ajax
    $.ajax({
      type: 'POST',
      url: '/plugins/intranet/admin/ajax/int_table_update_task.php',
      datatype: 'json',
      data: {
        taskID: taskID,
        houseID: houseID,
        priority: priority,
        status: status,
        title: title,
        description: description,
        reminder: reminder,
        time: time
      },
      success: function (data) {

        if (data.status == 'update_success') {
          // IF DATA SUCCESS

          var str = JSON.stringify(data);
          var result = JSON.parse(str);

          var divdata = '';
          var dataID = '';

          $.each(result, function (key, data) {
            //console.log('Key: ' + key + ' => ' + 'Value: ' + data);

            if (key === 'data') {

              $.each(data, function (index, data) {
                // console.log('ID: ', data['id']);

                dataID = data["id"];

                divdata += '<div class="taskheader"><span>Task ID ' + data["id"] + '</span><span class="float-right collapsetask">+</span></div>' +
                  '<div class="taskinfo">' +
                  '<div class="container-fluid">' +
                  '<div class="table-responsive">' +
                  '<table class="table table-task">' +
                  '<thead>' +
                  '<tr>' +
                  '<th>Titulek</th>' +
                  '<th>Priorita</th>' +
                  '<th>Status</th>' +
                  '<th>Datum Úkolu</th>' +
                  '<th>Datum Připomenutí</th>' +
                  '<th></th>' +
                  '</tr>' +
                  '</thead>' +
                  '<tbody>' +
                  '<tr>' +
                  '<td>' + data["title"] + '</td>' +
                  '<td>' + data["priority"] + '</td>' +
                  '<td>' + data["status"] + '</td>' +
                  '<td>' + data["time"] + '</td>' +
                  '<td>' + data["reminder"] + '</td>' +
                  '<td><button type="button" id="editTask" class="btn btn-default btn-xs m-r-20 editTask" data-toggle="tooltipEnvo" title="" data-dialog="taskDialogEdit" data-id="' + data["id"] + '" data-original-title="Editovat"><i class="fa fa-edit"></i></button>' +
                  '<button type="button" class="btn btn-danger btn-xs deleteTask" data-confirm-deltask="Jste si jistý, že chcete odstranit úkol <strong>' + data["title"] + '</strong>" data-toggle="tooltipEnvo" title="Odstranit" data-id="' + data["id"] + '"><i class="fa fa-trash-o"></i></button></td>' +
                  '</tr>' +
                  '</tbody>' +
                  '</table>' +
                  '</div>' +
                  '</div>' +
                  '</div>' +
                  '<div class="taskcontent">' +
                  '<p><strong >Popis Úkolu:</strong></p>' +
                  '<div class="taskdescription">' + data["description"] + '</div>' +
                  '</div>';

              })

            }

          });

          // Put data to 'div'
          $('#task_' + dataID).html(divdata);

          // Call function
          $('#task_' + dataID + ' .taskheader').click(clickTaskHeader);
          $('#task_' + dataID + ' .editTask').click(openDialogEditTask);
          $('#task_' + dataID + ' .deleteTask').click(confirmDeleteTask);

          // Notification
          // Apply the plugin to the container
          $('#notificationcontainer_edit').pgNotification({
            style: 'bar',
            message: data.status_msg,
            position: 'top',
            timeout: 2000,
            type: 'success',
            showClose: false
          }).show();

        } else {
          // IF DATA ERROR

          // Notification
          // Apply the plugin to the container
          $('#notificationcontainer_edit').pgNotification({
            style: 'bar',
            message: data.status_msg,
            position: 'top',
            timeout: 2000,
            type: 'danger',
            showClose: false
          }).show();

        }

      },
      error: function () {

      }
    });

  });

  $('.editTask').click(openDialogEditTask);

  $('.deleteTask').click(confirmDeleteTask);

  $('.taskheader').click(clickTaskHeader);

  // Init DateTimePicker
  initializeDateTimePicker('input[name=envo_addtasktime]');
  initializeDateTimePicker('input[name=envo_addtaskreminder]');
});

/** 00. Tasks manager
 ========================================================================*/

$(function () {

  /* Check all checkbox */
  $('#envo_delete_all').click(function () {
    var checkedStatus = this.checked;
    if (checkedStatus) {
      $('#button_delete').prop('disabled', false);
    } else {
      $('#button_delete').attr('disabled', true);
    }
    $('.highlight').each(function () {
      $(this).prop('checked', checkedStatus);
    });
  });

  /* Disable submit button if checkbox is not checked */
  $('.highlight').change(function () {
    if (this.checked) {
      $('#button_delete').prop('disabled', false);
    } else {
      if ($('.highlight').filter(':checked').length < 1) {
        $('#envo_delete_all').prop('checked', false);
        $('#button_delete').attr('disabled', true);
      }
    }
  });

});

/** 00. Show iFrame in modal - help
 ========================================================================*/

$(function () {

  function selecthouse(event) {
    // Stop, the default action of the event will not be triggered
    event.preventDefault();

    var valID = $(this).attr("data-value");

    $.ajax({
      url: '/plugins/intranet/admin/ajax/int_houseselect_process.php',
      type: 'POST',
      datatype: 'json',
      data: {
        valID: valID
      },
      success: function (data) {

        var res = $.parseJSON(data);

        $('input[name="envo_housename"]').val(res.name);
        $('input[name="envo_househeadquarters"]').val(res.headquarters);
        $('input[name="envo_housestreet"]').val(res.street);
        $('select[name="envo_housecity"]').val(res.city);
        $('select[name="envo_housecityarea"]').val(res.cityarea);
        $('input[name="envo_housepsc"]').val(res.psc);
        $('input[name="envo_houseic"]').val(res.ic);
        $('input[name="envo_housestate"]').val(res.state);
        $('input[name="envo_housejustice"]').val(res.justice);
        $('textarea[name="envo_housejusticelaw"]').val(res.housejusticelaw);
        $('input[name="envo_housedescription"]').val(res.description);
        $('input[name="envo_housecontact1"]').val(res.contact1);
        $('input[name="envo_housecontactphone1"]').val(res.contactphone1);
        $('input[name="envo_housecontactmail1"]').val(res.contactmail1);
        $('input[name="envo_housecontactdate1"]').val(res.contactdate1);
        $('input[name="envo_housecontactaddress1"]').val(res.contactaddress1);
        $('input[name="envo_housecontact2"]').val(res.contact2);
        $('input[name="envo_housecontactphone2"]').val(res.contactphone2);
        $('input[name="envo_housecontactmail2"]').val(res.contactmail2);
        $('input[name="envo_housecontactdate2"]').val(res.contactdate2);
        $('input[name="envo_housecontactaddress2"]').val(res.contactaddress2);
        $('input[name="envo_housecontact3"]').val(res.contact3);
        $('input[name="envo_housecontactphone3"]').val(res.contactphone3);
        $('input[name="envo_housecontactmail3"]').val(res.contactmail3);
        $('input[name="envo_housecontactdate3"]').val(res.contactdate3);
        $('input[name="envo_housecontactaddress3"]').val(res.contactaddress3);
        $('input[name="envo_housecontact4"]').val(res.contact4);
        $('input[name="envo_housecontactphone4"]').val(res.contactphone4);
        $('input[name="envo_housecontactmail4"]').val(res.contactmail4);
        $('input[name="envo_housecontactdate4"]').val(res.contactdate4);
        $('input[name="envo_housecontactaddress4"]').val(res.contactaddress4);
        $('input[name="envo_housecontact5"]').val(res.contact5);
        $('input[name="envo_housecontactphone5"]').val(res.contactphone5);
        $('input[name="envo_housecontactmail5"]').val(res.contactmail5);
        $('input[name="envo_housecontactdate5"]').val(res.contactdate5);
        $('input[name="envo_housecontactaddress5"]').val(res.contactaddress5);
        $('input[name="envo_housecontact6"]').val(res.contact6);
        $('input[name="envo_housecontactphone6"]').val(res.contactphone6);
        $('input[name="envo_housecontactmail6"]').val(res.contactmail6);
        $('input[name="envo_housecontactdate6"]').val(res.contactdate6);
        $('input[name="envo_housecontactaddress6"]').val(res.contactaddress6);
        $('input[name="envo_housecontact7"]').val(res.contact7);
        $('input[name="envo_housecontact8"]').val(res.contact8);
        $('input[name="envo_housecontact9"]').val(res.contact9);
        $('input[name="envo_housecontact10"]').val(res.contact10);
        $('input[name="envo_housecontact11"]').val(res.contact11);
        $('input[name="envo_housecontact12"]').val(res.contact12);

        // ReInit Select2 plugin
        $('select[name=envo_housecity]').trigger('change');
        $('select[name=envo_housecityarea]').trigger('change');

        // Hide modal
        $("#ENVOModalPlugin").modal('hide');
      },
      error: function () {
        alert("failure");
      }
    });

    return false;
  }

  $('#houseSelect').on('click', function (e) {
    // Stop, the default action of the event will not be triggered
    e.preventDefault();

    var altura = $(window).height() - 155; //value corresponding to the modal heading + footer
    $('#ENVOModalPlugin .modal-body').css({"height": altura, "overflow-y": "auto"});

    // AJAX request
    $.ajax({
      url: '/plugins/intranet/admin/ajax/int_houseselect_modal.php',
      type: 'POST',
      dataType: 'html',
      beforeSend: function () {

        // Show progress circle
        $('#ENVOModalPlugin .modal-body').html('<div style="display:block;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);"><div class="progress-circle-indeterminate"></div><div class="m-t-20">Načítání ... Prosím počkejte</div></div>');

        // Display Modal
        $('#ENVOModalPlugin').modal('show');

      },
      success: function (data) {

        setTimeout(function () {

          // Add response in Modal body
          $('#ENVOModalPlugin .modal-body').hide().html(data).fadeIn(900);

          //
          $('.xxxx').click(selecthouse);

          // Init Datatable plugin
          $('#int_table').dataTable({
            // Language
            "language": {
              "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Czech.json"
            },
            "order": [],
            "columnDefs": [{
              "targets": 'no-sort',
              "orderable": false
            }],
            // Page lenght
            "pageLength": dataTablesSettings.pageLenght,
            // Show entries
            //"lengthMenu": [ [10,20, -1], [10,20, "All"] ],
            // Design Table items
            "dom": "<'row'<'col-sm-6'<'float-left m-b-20'f>><'col-sm-6'<'float-right m-r-20 hidden-xs'B>>>" + "<'row'<'col-sm-12'tr>>" + "<'row '<'col-sm-7'i><'float-right col-sm-5'p>>"
          });

        }, 1000);

      },
      error: function () {

      }
    });

  });

  // Select text in houseanalytics (Edit & New)
  $('#textSelect').on('click', function (e) {
    e.preventDefault();
    $('#ENVOModalPlugin1').modal('show');
  });

  $('.definetext').click(function (event) {
    event.preventDefault();

    $('#housejusticelaw').val('');
    $('#housejusticelaw').val($(this).text());

  });

});

/** 00. Fancybox initialisation
 * @require: Fancybox 3 Plugin
 ========================================================================*/

$(function () {

  // Choose what buttons to display by default
  $.fancybox.defaults.buttons = [
    'zoom',
    'fullScreen',
    'download',
    'thumbs',
    'close'
  ];

  // Update download link source
  $('[data-fancybox]').fancybox({
    // Internationalization
    lang: envoWeb.envo_lang,
    i18n: {
      'en': {
        DOWNLOAD: 'Download Image'
      },
      'cs': {
        CLOSE: 'Zavřít',
        NEXT: 'Další',
        PREV: 'Předchozí',
        ERROR: 'Požadovaný obsah nemůže být načten. <br/> Zkuste to prosím později.',
        PLAY_START: 'Start Slideshow',
        PLAY_STOP: 'Pause Slideshow',
        FULL_SCREEN: 'Celá Obrazovka',
        THUMBS: 'Náhledy',
        DOWNLOAD: 'Stáhnout Obrázek',
        ZOOM: "Zoom"
      }
    }
  });

});

/** 00. Play Video in popup
 * Initialisation of Fancybox 3
 * @require: Fancybox 3 Plugin
 ========================================================================*/

$(function () {

  $('[data-fancybox-video]').fancybox({
    afterShow: function () {
      ($('.fancybox-iframe').contents().find('body').css('background-color', 'transparent'));
    },
    iframe: {
      preload: false,
      css: {
        width: 'auto'
      }
    },
    buttons: [
      "zoom",
      "close"
    ]

  });
});

/** 00. DateTimePicker
 * @require: DateTimePicker Plugin
 ========================================================================*/

$(function () {

  // Init DateTimePicker
  $('input[name=envo_contactcontrol]').datetimepicker({
    // Language
    locale: envoWeb.envo_lang,
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
