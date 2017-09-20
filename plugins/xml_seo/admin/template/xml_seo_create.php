<?php include_once APP_PATH . 'admin/template/header.php'; ?>
<?php if (isset($xml_result)) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo $tlxml["xml_notification"]["xmlnot"]; ?>'
      }, {
        // settings
        type: 'success',
        delay: 5000
      });
    }, 1000);

    setTimeout(function () {
      $.notify({
        // options
        icon: 'fa fa-info-circle',
        message: '<?php echo $tlxml["xml_notification"]["xmlnot1"] . '<br>' . BASE_URL_ORIG . $XMLSEOPATH; ?>sitemap.xml'
      }, {
        // settings
        type: 'warning',
        delay: 5000,
        timer: 3000
      });
    }, 2000);
  </script>

  <div>
    <p><strong><?php echo $tlxml["xml_box_content"]["xmlbc23"]; ?></strong></p>
    <pre class="prettyprint linenums lang-xml" style="overflow: auto; max-height: 30em; white-space: pre;"><?php echo htmlentities($xml_result); ?></pre>
  </div>
<?php } else { ?>

<form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('h3', $tlxml["xml_box_title"]["xmlbt1"], 'box-title');
          ?>

        </div>
        <div class="box-body">
          <table class="table">
            <tr>
              <td><?php echo $tlxml["xml_box_content"]["xmlbc19"]; ?></td>
              <td><?php echo $XMLSEODATE; ?></td>
            </tr>
          </table>
        </div>
        <div class="box-footer">
          <button type="submit" name="save" class="btn btn-block btn-primary"><?php echo $tlxml["xml_box_content"]["xmlbc20"]; ?></button>
        </div>
      </div>
    </div>
  </div>
</form>

<?php } ?>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>
