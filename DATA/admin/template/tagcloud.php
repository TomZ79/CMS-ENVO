<?php include "header.php"; ?>

<?php if ($page2 == "s") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["notification"]["n7"]?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php }
if ($page2 == "e" || $page2 == "ene") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=($page2 == "e" ? $tl["general_error"]["generror1"] : $tl["general_error"]["generror2"]);?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

<?php if ($page3 == "s") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?=$tl["notification"]["n2"]?>'
      }, {
        // settings
        type: 'info',
        delay: 5000,
        timer: 3000
      });
    }, 2000);
  </script>
<?php } ?>

  <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">

    <?php
    if ($ENVO_TAGCLOUD) {
      echo $ENVO_TAGCLOUD;
    } else {

      // Add Html Element -> startTag (Arguments: tag, optional assoc. array)
      echo $Html->startTag('div', array('class' => 'col-sm-12'));
      // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
      echo $Html->addDiv($tl["general_error"]["generror3"], '', array('class' => 'alert bg-info text-white'));
      // Add Html Element -> endTag (Arguments: tag)
      $Html->endTag('div');
    } ?>

  </form>

<?php include "footer.php"; ?>