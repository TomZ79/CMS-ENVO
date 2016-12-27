<?php include "header.php"; ?>


  <form method="post" class="jak_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <!-- Fixed Button for save form -->
    <div class="savebutton">
      <button type="submit" name="save" class="btn btn-primary button">
        <i class="fa fa-save margin-right-5"></i>
        <?php echo $tl["general"]["g20"]; ?> !!
      </button>
    </div>

    <!-- Form Content -->
    <div class="row">
      <div class="col-md-12">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Picture</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-md-12">
                <table class="table table-striped v-text-center">
                  <tr>
                    <td>Picture Name</td>
                    <td><?php echo $JAK_FORM_DATA["title"]; ?></td>
                  </tr>
                  <tr>
                    <td>Picture Path</td>
                    <td><?php echo $JAK_FORM_DATA["pathoriginal"]; ?></td>
                  </tr>
                  <tr>
                    <td>Picture Thumb Path</td>
                    <td><?php echo $JAK_FORM_DATA["paththumb"]; ?></td>
                  </tr>
                  <tr>
                    <td>Size</td>
                    <td><?php echo formatSizeUnits($JAK_FORM_DATA["size"]); ?></td>
                  </tr>
                  <tr>
                    <td>Time</td>
                    <td><?php echo date("d.m.Y - H:i", strtotime($JAK_FORM_DATA["time"])); ?></td>
                  </tr>
                </table>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right">
              <i class="fa fa-save margin-right-5"></i>
              <?php echo $tl["general"]["g20"]; ?>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>

<?php include "footer.php"; ?>