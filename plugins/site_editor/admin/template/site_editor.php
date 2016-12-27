<?php include_once APP_PATH . 'admin/template/header.php'; ?>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $tlsedi["siteedit"]["t1"]; ?></h3>
        </div>
        <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
          <div class="box-body">
            <input type="hidden" name="action" value="form1"/>
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
              <textarea id="jak_file1" name="jak_file1" rows="8" placeholder="<?php echo $tlxml["xmlseo"]["d4"]; ?>" class="form-control" disabled><?php echo htmlspecialchars($content); ?></textarea>
            </div>
          </div>
          <div class="box-footer">
            <div class="pull-right">
              <button id="editfile1" class="btn btn-primary" style="margin-right: 10px"><?php echo $tl["general"]["g77"]; ?></button>
              <button type="submit" name="reset1" class="btn btn-success hidden" style="margin-right: 10px"><?php echo $tl["general"]["g72"]; ?></button>
              <button type="submit" name="save1" class="btn btn-primary pull-right" disabled><?php echo $tl["general"]["g20"]; ?></button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script type="text/javascript">
    $(document).ready(function () {
      $("#editfile1").click(function(event){
        event.preventDefault();
        $('#jak_file1, button[name="save1"]').removeAttr("disabled");
        $('button[name="reset1"]').removeClass("hidden");
        $(this).addClass("hidden");

        var txt = $("#jak_file1");
        var time = new Date();

        if (txt.val().indexOf('CMS Robots File' && 'Last change') != -1) { // Value in txt = true
          var lines = $('#jak_file1').val().split(/\n/);
          lines[1] = "#Last change - " + time;
          $("#jak_file1").html(lines.join("\n"));

        } else {

          txt.val("#CMS Robots File\n#Last change - " + time +"\n\n" + txt.val());
        }
      });
    });
  </script>

<?php include_once APP_PATH . 'admin/template/footer.php'; ?>