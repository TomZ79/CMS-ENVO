/*
 * CMS ENVO
 * JS for Plugin DOWNLOAD
 * -----------------------------------------------------------------------
 * Author: Thomas Zukal
 * Email: tzukal@email.cz
 * Copyright (c) 2016 - 2022
 * =======================================================================
 *
 */

/** 00.
 ========================================================================*/
function fill (id, title, varname) {

  //Assigning value to "ajaxlivesearch" div in "ajaxsearch.php" file.
  $('#ajaxlivesearch').val(title).attr('data-articleid', id).attr('data-articlevarname', varname);

  //Hiding "searchresult" div in "ajaxsearch.php" file.
  $('#searchresult').hide();

}

function ajaxshow (value) {

  var id = $('#ajaxlivesearch').attr('data-articleid');
  var varname = $('#ajaxlivesearch').attr('data-articlevarname');

  // Validating
  if (id != '') {
    window.location.href = '/' + value + '/f/' + id + '/' + varname;
  }

}

$(function () {

  //On pressing a key on "Search box" in "ajaxsearch.php" file. This function will be called.
  $('#ajaxlivesearch').keyup(function () {

    //Assigning search box value to javascript variable named as "search".
    var search = $('#ajaxlivesearch').val();

    //Validating, if "search" is empty.
    if (search == '') {

      //Assigning empty value to "searchresult" div in "ajaxsearch.php" file.
      $('#searchresult').html('').hide();
      $(this).attr('data-articleid', '');

    }

    //If "search" is not empty.
    else {

      //AJAX is called.
      $.ajax({
        //AJAX type is "Post".
        type: 'POST',
        //Data will be sent to "ajaxsearch.php".
        url: '/template/porto/plugintemplate/download/livesearch/ajaxsearch.php',
        //Data type
        datatype: 'json',
        //Data, that will be sent to "ajaxsearch.php".
        data: {
          //Assigning value of "search" into "search" variable.
          search: search
        },

        //If result found, this funtion will be called.
        success: function (data) {

          if (data.status == 'success') {
            // IF DATA SUCCESS

            var str = JSON.stringify(data);
            var result = JSON.parse(str);

            var divdata = '';

            $.each(result, function (key, data) {
              // console.log('Key: ' + key + ' => ' + 'Value: ' + data);

              if (key === 'data') {
                $.each(data, function (index, data) {
                  // console.log('ID: ', data['id']);

                  divdata += '<li data-articleid="' + data['id'] + '" style="line-height: 32px;border-bottom: 2px solid rgba(0, 0, 0, 0.06);"><a href="#" onclick="fill(\'' + data['id'] + '\',\'' + data['title'] + '\',\'' + data['varname'] + '\'); event.preventDefault();" style="display: block;">' + data['title'] + '</a></li>';

                })
              }
            });

            // Put data to 'div'
            $('#searchresult').html('<ul style="margin: 0;list-style-type: none;padding: 15px 40px;">' + divdata + '</ul>').show();

            // Init click function
            $('#ajaxliveshow').click(function () {
              ajaxshow(data.plugin_cat_varname)
            });


          } else {
            // IF DATA ERROR

            var divdata = '';

            divdata += '<li><span style="color: #DC3545;">' + data.status_msg + '</span></li>';

            // Put data to 'div'
            $('#searchresult').html('<ul style="margin: 0;list-style-type: none;padding: 15px 40px;">' + divdata + '</ul>').show();

          }

        },
        error: function () {

        }
      });
    }
  });

});