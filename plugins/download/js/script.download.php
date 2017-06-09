<?php if ($FT_SHARE && $JAK_FACEBOOK_SDK_CONNECTION) { // With Share on Social Sites, with Facebook SDK Connection ?>

<script type="text/javascript">
  function shareOnFB() {
    FB.ui({
      method: 'feed',
      display: 'popup',
      link: '<?php echo (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; ?>'
    }, function (t) {
      var str = JSON.stringify(t);
      var obj = JSON.parse(str);
      if (obj.post_id != '') {
        //after successful sharing, you can show your download content here
        var secret_data = "<a href='<?php echo $DL_LINK;?>' class='dclick btn btn-info btn-lg'><?php echo $tld["downl_frontend"]["downl7"]; ?></a>";
        jQuery("#results").html(secret_data);
      }
    });
  }
</script>

<?php } elseif ($FT_SHARE && !$JAK_FACEBOOK_SDK_CONNECTION) { ?>

<script type="text/javascript" src="<?php echo BASE_URL; ?>plugins/download/js/jquery.tweetfaceAction.js"></script>
<script type="text/javascript">
  $(document).ready(function () {

    // TWITTER SHARING
    // Using our tweetAction plugin. For a complete list with supported
    // parameters, refer to http://dev.twitter.com/pages/intents#tweet-intent

    $('#tweetLink').tweetAction({
      text: "<?php echo $PAGE_TITLE . ' - ' . $jkv["title"];?>",
      url: '<?php echo BASE_URL . JAK_PARSE_REQUEST;?>',
      via: '<?php echo $jkv["downloadtwitter"];?>',
      related: '<?php echo $jkv["downloadtwitter"];?>'
    }, function () {

      // Callback function. Triggered when the user closes the pop-up window
      $('a.dclick')
        .removeAttr('disabled')
        .attr('href', '<?php echo $DL_LINK;?>')
        .html('<?php echo $tld["downl_frontend"]["downl7"]; ?>') ;


      $('.dclick').click(function () {
        var countSpan = $('#dcount').text();
        var newSpan = parseInt(countSpan) + 1;

        $('#dcount').html(newSpan);
        $('#dcount').slideDown(500);
      });

    });

    // FACEBOOK SHARING
    $('#faceLink').faceAction({
      url: '<?php echo BASE_URL . JAK_PARSE_REQUEST;?>'
    }, function () {

      // Callback function. Triggered when the user closes the pop-up window
      $('a.dclick')
        .removeAttr('disabled')
        .attr('href', '<?php echo $DL_LINK;?>')
        .html('<?php echo $tld["downl_frontend"]["downl7"]; ?>') ;


      $('.dclick').click(function () {
        var countSpan = $('#dcount').text();
        var newSpan = parseInt(countSpan) + 1;

        $('#dcount').html(newSpan);
        $('#dcount').slideDown(500);
      });

    });

  });
</script>

<?php } else { ?>

<script type="text/javascript">
  $(document).ready(function () {
    /* This code is executed after the DOM has been completely loaded */
    $('.dclick').click( function(e) {
      var countSpan = $('#dcount').text();
      var newSpan = parseInt(countSpan) + 1;

      $('#dcount').html(newSpan);
      $('#dcount').slideDown(500);
    });
  });
</script>

<?php } ?>

<script type="text/javascript">
  /*! bootstrap3-showmanyslideonecarousel - v1.0.0 - 2015-03-27
   * Copyright (c) 2015 Matthew Harris, rtpHarry <matthew@rtpdesign.co.uk>; Licensed MIT
   * https://github.com/rtpHarry/Bootstrap3-ShowManySlideOneCarousel */
  (function(){
    $('.carousel-showmanymoveone .item').each(function(){
      var itemToClone = $(this);

      for (var i=1;i<4;i++) {
        itemToClone = itemToClone.next();

        // wrap around if at end of item collection
        if (!itemToClone.length) {
          itemToClone = $(this).siblings(':first');
        }

        // grab item, clone, add marker class, add to collection
        itemToClone.children(':first-child').clone()
          .addClass("cloneditem-"+(i))
          .appendTo($(this));
      }
    });
  }());
</script>

