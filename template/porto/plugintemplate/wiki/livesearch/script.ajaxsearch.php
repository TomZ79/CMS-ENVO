<script>

  function fill(value, id) {

    //Assigning value to "ajaxlivesearch" div in "ajaxsearch.php" file.
    $('#ajaxlivesearch').val(value).attr('data-articleid',id);

    //Hiding "searchresult" div in "ajaxsearch.php" file.
    $('#searchresult').hide();

  }

  function ajaxshow(value) {

    var id = $('#ajaxlivesearch').attr('data-articleid');
    var val = $('#ajaxlivesearch').val().replace(/\s/g, '-').toLowerCase();

    console.log(id);

    //Validating, if "val" is not empty.
    if (id != '') {
      window.location.href = '/' + value + '/wiki-article/' + id + '/' + val;
    }

  }

  $(document).ready(function () {
    //On pressing a key on "Search box" in "ajaxsearch.php" file. This function will be called.
    $('#ajaxlivesearch').keyup(function () {

      //Assigning search box value to javascript variable named as "search".
      var search = $('#ajaxlivesearch').val();

      //Validating, if "search" is empty.
      if (search == '') {

        //Assigning empty value to "searchresult" div in "ajaxsearch.php" file.
        $('#searchresult').html('').hide();
        $(this).attr('data-articleid','');

      }

      //If name is not empty.
      else {

        //AJAX is called.
        $.ajax({
          //AJAX type is "Post".
          type: 'POST',
          //Data will be sent to "ajaxsearch.php".
          url: '/template/porto/plugintemplate/wiki/livesearch/ajaxsearch.php',
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

                    divdata += '<li data-articleid="' + data['id'] + '"><a href="#" onclick="fill(\'' + data['title'] + '\',\'' + data['id'] + '\'); event.preventDefault();">' + data['title'] + '</a></li>';

                  })
                }
              });

              // Put data to 'div'
              $('#searchresult').html('<ul style="margin: 0;list-style-type: none;padding: 15px 40px;">' + divdata + '</ul>').show();

              // Init click function
              $('#ajaxliveshow').click(function() {
                ajaxshow(data.plugin_cat_varname)
              });

            } else {
              // IF DATA ERROR

              var divdata = '';

              divdata += '<li><span>' + data.status_msg + '</span></li>';

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
</script>