<link rel="stylesheet" type="text/css" href="/assets/plugins/cookieconsent2/css/cookieconsent.min.css" />
<script src="/assets/plugins/cookieconsent2/js/cookieconsent.min.js"></script>
<script>
  window.addEventListener("load", function(){
    window.cookieconsent.initialise({
      cookie: {
        name: '<?php echo $jkv["eucookie_name"]; ?>',
        expiryDays: <?php echo $jkv["eucookie_expiryDays"]; ?>
      },
      "palette": {
        "popup": {
          "background": '<?php echo hex2rgba($jkv["eucookie_pbck"], $jkv["eucookie_alpha"]); ?>',
          "text": '<?php echo $jkv["eucookie_ptxt"]; ?>'
        },
        "button": {
          "background": '<?php echo ($jkv["eucookie_style"] == 'wire') ? 'transparent' : $jkv["eucookie_bbck"]; ?>',
          "text": '<?php echo ($jkv["eucookie_style"] == 'wire') ? $jkv["eucookie_bbck"] : $jkv["eucookie_btxt"]; ?>',
          <?php if ($jkv["eucookie_style"] == 'wire') echo '"border": "' . $jkv["eucookie_bbck"] . '"'; ?>
        }
      },
      "position": '<?php echo $jkv["eucookie_position"]; ?>',
      "theme": '<?php echo $jkv["eucookie_style"]; ?>',
      "content": {
        message: '<?php echo $jkv["eucookie_message"]; ?>',
        dismiss: '<?php echo $jkv["eucookie_dismiss"]; ?>',
        link: '<?php echo $jkv["eucookie_link"]; ?>',
        href: '<?php echo $jkv["eucookie_href"]; ?>'
      }
    })});
</script>
