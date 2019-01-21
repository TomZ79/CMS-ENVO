<?php

/*
 * PLUGIN DOWNLOAD - POPIS SOUBORU script.download.php
 * ----------------------------------------------
 *
 * Soubor slouží pro vložení jquery, externích jquery souborů
 *
 */

if ($page == ENVO_PLUGIN_VAR_DOWNLOAD) {

	echo '<script src="/template/' . ENVO_TEMPLATE . '/plugintemplate/download/js/script.download.min.js"></script>';

}

if ($FT_SHARE && $ENVO_FACEBOOK_SDK_CONNECTION) { // With Share on Social Sites, with Facebook SDK Connection ?>

	<script>
    function shareOnFB () {
      FB.ui({
        method: 'feed',
        display: 'popup',
        link: '<?=(isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"?>'
      }, function (t) {
        var str = JSON.stringify(t);
        var obj = JSON.parse(str);
        if (obj.post_id != '') {
          //after successful sharing, you can show your download content here
          var secret_data = "<a href='<?=$DL_LINK?>' class='dclick btn btn-info btn-lg'><?=$tld["downl_frontend"]["downl7"]?></a>";
          jQuery("#results").html(secret_data);
        }
      });
    }
	</script>

<?php } elseif ($FT_SHARE && !$ENVO_FACEBOOK_SDK_CONNECTION) { ?>

	<script src="<?= BASE_URL ?>plugins/download/assets/js/jquery.tweetfaceAction.js"></script>
	<script>
    $(document).ready(function () {

      // TWITTER SHARING
      // Using our tweetAction plugin. For a complete list with supported
      // parameters, refer to http://dev.twitter.com/pages/intents#tweet-intent

      $('#tweetLink').tweetAction({
        text: "<?=$PAGE_TITLE . ' - ' . $setting["title"]?>",
        url: '<?=BASE_URL . ENVO_PARSE_REQUEST?>',
        via: '<?=$setting["downloadtwitter"]?>',
        related: '<?=$setting["downloadtwitter"]?>'
      }, function () {

        // Callback function. Triggered when the user closes the pop-up window
        $('a.dclick')
          .removeAttr('disabled')
          .attr('href', '<?=$DL_LINK?>')
          .html('<?=$tld["downl_frontend"]["downl7"]?>');


        $('.dclick').click(function () {
          var countSpan = $('#dcount').text();
          var newSpan = parseInt(countSpan) + 1;

          $('#dcount').html(newSpan);
          $('#dcount').slideDown(500);
        });

      });

      // FACEBOOK SHARING
      $('#faceLink').faceAction({
        url: '<?=BASE_URL . ENVO_PARSE_REQUEST?>'
      }, function () {

        // Callback function. Triggered when the user closes the pop-up window
        $('a.dclick')
          .removeAttr('disabled')
          .attr('href', '<?=$DL_LINK?>')
          .html('<?=$tld["downl_frontend"]["downl7"]?>');


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

	<script>
    $(document).ready(function () {
      /* This code is executed after the DOM has been completely loaded */
      $('.dclick').click(function () {
        var countSpan = $('#dcount').text();
        var newSpan = parseInt(countSpan) + 1;

        $('#dcount').html(newSpan);
        $('#dcount').slideDown(500);

      });
    });
	</script>

<?php } ?>
