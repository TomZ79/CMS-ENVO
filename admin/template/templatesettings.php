<?php include "header.php"; ?>

<?php if ($page2 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["notification"]["n7"]; ?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);
  </script>
<?php }
if ($page3 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["general_error"]["generror1"]; ?>'
      }, {
        // settings
        type: 'danger',
        delay: 10000
      });
    }, 1000);
  </script>
<?php } ?>

<?php if (!isset($jkv["cms_tpl"])) { ?>
  <div class="row">
    <div class="col-md-6 text-center error-page">
      <h1 class="text-warning bold"><?php echo $tl["notetemplate"]["ntpl"]; ?></h1>
      <div class="error-content">
        <h3><i class="fa fa-warning text-warning"></i> <?php echo $tl["notetemplate"]["ntpl2"]; ?></h3>
        <p><?php echo $tl["notetemplate"]["ntpl3"]; ?></p>
      </div>
    </div>
  </div>
<?php } else {

  // Include template settings from each template if exists
  $filename = '../template/' . $jkv["sitestyle"] . '/templatesettings.php';

  if (file_exists($filename)) {
    include_once $filename;
  } else { ?>

    <section class="content">
      <div class="col-md-8 text-center error-page">
        <div class="error-content">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('h3', $Html->addTag('i', '', 'fa fa-warning text-warning-800') . sprintf($tl["notetemplate"]["ntpl1"], $jkv["sitestyle"]), 'box-title');

          echo sprintf($tl["notetemplate"]["ntpl4"], $filename);
          ?>

        </div>
      </div>
    </section>

  <?php }
} ?>

<?php include "footer.php"; ?>