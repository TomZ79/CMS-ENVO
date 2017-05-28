<?php if ($FT_SHARE && $JAK_FACEBOOK_SDK_CONNECTION) { // With Share on Social Sites, with Facebook SDK Connection ?>

<script type="text/javascript">
  function shareOnFB() {
    FB.ui({
      method: "feed",
      display: 'popup',
      link: "<?php echo BASE_URL ?>",
      picture: "<?php if (isset($JAK_RANDOM_IMAGE)) {
        echo $JAK_RANDOM_IMAGE;
      } else {
        echo BASE_URL . ltrim ($SHOWIMG, '/');
      }?>",
      name: "<?php echo jak_get_random__line (APP_PATH . '/_files/facebook/facebook_name.txt'); ?>",
      caption: "<?php echo $_SERVER['SERVER_NAME'] ?>",
      description: "<?php echo jak_get_random__line (APP_PATH . '/_files/facebook/facebook_description.txt'); ?>"
    }, function (t) {
      var str = JSON.stringify(t);
      var obj = JSON.parse(str);
      if (obj.post_id != '') {
        //after successful sharing, you can show your download content here
        var secret_data = "<a href='<?php echo $DL_LINK;?>' class='dclick btn btn-info'><?php echo $tld["downl_frontend"]["downl7"]; ?></a>";
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