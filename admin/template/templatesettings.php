<?php include "header.php"; ?>

<?php if ($page2 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["general"]["g7"]; ?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
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
        message: '<?php echo $tl["errorpage"]["sql"]; ?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <?php  // Include template settings from each template if exists
  $filename = '../template/' . $jkv["sitestyle"] . '/templatesettings.php';

  if (file_exists($filename)) {
    include $filename;
  } else { ?>

    <section class="content">
      <div class="error-page">
        <div class="error-content">
          <h3><i class="fa fa-warning text-warning-800"></i> Your template settings not exists</h3>
          <p>
            Your template settings not exists, because settings file <?php echo $filename; ?> not exists.
            Please use styleswitcher for settings your template.
          </p>
        </div><!-- /.error-content -->
      </div><!-- /.error-page -->
    </section><!-- /.content -->

  <?php } ?>

  <script type="text/javascript">

  </script>

<?php include "footer.php"; ?>