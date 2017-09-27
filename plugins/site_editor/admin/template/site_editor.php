<?php include_once APP_PATH . 'admin/template/header.php'; ?>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-success">
        <div class="box-header with-border">

          <?php
          // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
          echo $Html->addTag('h3', $tlsedi["siteedit_sec_title"]["set"], 'box-title');
          ?>

        </div>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
          <div class="box-body">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('p', $tlsedi["siteedit_sec_desc"]["sed"]);
            // Add Html Element -> addInput (Arguments: type, name, value, id, class, optional assoc. array)
            echo $Html->addInput('hidden', 'action', 'form1');
            ?>

            <?php
            // Content of file
            $file = APP_PATH . "robots.txt";
            if (file_exists($file)) {
              // File exist, get content
              $content = file_get_contents($file);
            } else {
              // File not exist, create new file
              file_put_contents($file, '');
            }
            ?>
            <div class="form-group">

              <?php
              // Add Html Element -> addTextarea (Arguments: name, value, rows, cols, optional assoc. array)
              echo $Html->addTextarea('envo_file1', htmlspecialchars($content), '8', '', array('id' => 'envo_file1', 'class' => 'form-control', 'placeholder' => $tlsedi["siteedit_placeholder"]["sep"], 'disabled' => 'disabled'));
              ?>

            </div>
          </div>
          <div class="box-footer">
            <div class="pull-right">

              <?php
              // Add Html Element -> addButton (Arguments: type, value, text, name, id, class, optional assoc. array)
              echo $Html->addButton('button', '', $tl["button"]["btn12"], '', 'editfile1', 'btn btn-primary', array('style' => 'margin-right: 10px'));
              // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
              echo $Html->addButtonSubmit('reset1', $tl["button"]["btn11"], '', 'btn btn-primary hidden', array('style' => 'margin-right: 10px'));
              echo $Html->addButtonSubmit('save1', $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('disabled' => 'disabled'));
              ?>

            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>