<script>

  function fill(Value) {

    //Assigning value to "search" div in "search.php" file.
    $('#ajaxlivesearch').val(Value);

    //Hiding "display" div in "search.php" file.
    $('#searchresult').hide();

  }

  $(document).ready(function () {

    //On pressing a key on "Search box" in "ajaxsearch.php" file. This function will be called.
    $('#ajaxlivesearch').keyup(function () {

      //Assigning search box value to javascript variable named as "title".
      var title = $('#ajaxlivesearch').val();

      //Validating, if "title" is empty.
      if (title == '') {

        //Assigning empty value to "searchresult" div in "ajaxsearch.php" file.
        $('#searchresult').html('').hide();

      }

      //If name is not empty.

      else {

        //AJAX is called.
        $.ajax({
          //AJAX type is "Post".
          type: 'POST',
          //Data will be sent to "ajaxsearch.php".
          url: '/template/porto/plugintemplate/faq/livesearch-test/ajaxsearch.php',
          //Data, that will be sent to "ajax.php".
          data: {
            //Assigning value of "title" into "search" variable.
            search: title
          },

          //If result found, this funtion will be called.
          success: function (html) {
            //Assigning result to "display" div in "search.php" file.
            $('#searchresult').html(html).show();
          }
        });
      }
    });
  });
</script>