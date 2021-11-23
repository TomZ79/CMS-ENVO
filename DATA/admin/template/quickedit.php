<?php include "quickheader.php"; ?>

<?php if ($page3 == "s") { ?>
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
if ($page3 == "e") { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?=$tl["general_error"]["generror1"]?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php }
if ($errors) { ?>
  <script>
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php
          if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"];
          ?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">

    <table class="table table-striped">
      <thead>
      <tr>
        <th colspan="2"><?= $tl["global_text"]["globaltxt15"] ?></th>
      </tr>
      </thead>
      <tbody>
      <tr>
        <td><?= $tl["global_text"]["globaltxt16"] ?></td>
        <td>
          <div class="form-group m-0<?php if (isset($errors["e1"])) echo " has-error"; ?>">

            <?php
            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
            echo $Html->addInput('text', 'envo_title', $ENVO_FORM_DATA["title"], '', 'form-control');
            ?>

          </div>
        </td>
      </tr>
      </tbody>
    </table>

    <?php include_once "editorlight_edit.php"; ?>

    <hr>

    <?php
    // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
    echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save mr-1"></i>' . $tl["button"]["btn1"], '', 'btn btn-success rounded-0 float-right');
    ?>

  </form>

<?php include "quickfooter.php"; ?>