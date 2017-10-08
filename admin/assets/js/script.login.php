<?php
/*
 * AKP Login Page - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.login.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.login.js'
 *
 */

if (empty($page) && !ENVO_USERID) {

  echo PHP_EOL . '<!-- Start JS AKP Login Page -->';

  // Add Html Element -> addScript (Arguments: src, optional assoc. array)
  // Plugin Javascript
  echo $Html->addScript('assets/js/script.login.min.js');

  echo PHP_EOL . '<!-- End JS AKP Login Page -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>

<script type="text/javascript">
  $(function () {
    <?php if ($errorfp) { ?>
    $(".loginF").hide();
    $(".forgotP").removeClass("hide");
    $(".forgotP").addClass("shake");
    <?php } if ($ErrLogin) { ?>
    $(".loginF").addClass("shake");
    <?php } ?>
  })
</script>
