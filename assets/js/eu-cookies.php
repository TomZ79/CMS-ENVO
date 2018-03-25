<link rel="stylesheet" type="text/css" href="/assets/plugins/cookieconsent2/css/cookieconsent.min.css" />
<script src="/assets/plugins/cookieconsent2/js/cookieconsent.min.js"></script>
<script>
  window.addEventListener("load", function(){
    window.cookieconsent.initialise({
      cookie: {
        name: '<?=$setting["eucookie_name"]?>',
        expiryDays: <?=$setting["eucookie_expiryDays"]?>
      },
      "palette": {
        "popup": {
          "background": '<?=hex2rgba($setting["eucookie_pbck"], $setting["eucookie_alpha"])?>',
          "text": '<?=$setting["eucookie_ptxt"]?>'
        },
        "button": {
          "background": '<?=($setting["eucookie_style"] == 'wire') ? 'transparent' : $setting["eucookie_bbck"]?>',
          "text": '<?=($setting["eucookie_style"] == 'wire') ? $setting["eucookie_bbck"] : $setting["eucookie_btxt"]?>',
          <?php if ($setting["eucookie_style"] == 'wire') echo '"border": "' . $setting["eucookie_bbck"] . '"'; ?>
        }
      },
      "position": '<?=$setting["eucookie_position"]?>',
      "theme": '<?=$setting["eucookie_style"]?>',
      "content": {
        message: '<?=$setting["eucookie_message"]?>',
        dismiss: '<?=$setting["eucookie_dismiss"]?>',
        link: '<?=$setting["eucookie_link"]?>',
        href: '<?=$setting["eucookie_href"]?>'
      }
    })});
</script>
