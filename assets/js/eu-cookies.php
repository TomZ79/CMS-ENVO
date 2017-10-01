<link rel="stylesheet" type="text/css" href="/assets/plugins/cookieconsent2/css/cookieconsent.min.css" />
<script src="/assets/plugins/cookieconsent2/js/cookieconsent.min.js"></script>
<script>
  window.addEventListener("load", function(){
    window.cookieconsent.initialise({
      cookie: {
        name: '<?php echo $setting["eucookie_name"]; ?>',
        expiryDays: <?php echo $setting["eucookie_expiryDays"]; ?>
      },
      "palette": {
        "popup": {
          "background": '<?php echo hex2rgba($setting["eucookie_pbck"], $setting["eucookie_alpha"]); ?>',
          "text": '<?php echo $setting["eucookie_ptxt"]; ?>'
        },
        "button": {
          "background": '<?php echo ($setting["eucookie_style"] == 'wire') ? 'transparent' : $setting["eucookie_bbck"]; ?>',
          "text": '<?php echo ($setting["eucookie_style"] == 'wire') ? $setting["eucookie_bbck"] : $setting["eucookie_btxt"]; ?>',
          <?php if ($setting["eucookie_style"] == 'wire') echo '"border": "' . $setting["eucookie_bbck"] . '"'; ?>
        }
      },
      "position": '<?php echo $setting["eucookie_position"]; ?>',
      "theme": '<?php echo $setting["eucookie_style"]; ?>',
      "content": {
        message: '<?php echo $setting["eucookie_message"]; ?>',
        dismiss: '<?php echo $setting["eucookie_dismiss"]; ?>',
        link: '<?php echo $setting["eucookie_link"]; ?>',
        href: '<?php echo $setting["eucookie_href"]; ?>'
      }
    })});
</script>
