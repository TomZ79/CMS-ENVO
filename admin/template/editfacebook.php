<?php include "header.php"; ?>

  <form method="post" class="jak_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

    <!-- Form Content -->
    <div class="row tab-content-singel">
      <div class="col-md-12">
        <div class="box box-success">
          <div class="box-header with-border">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('h3', $tl["fb_box_title"]["fbbt"], 'box-title');
            ?>

          </div>
          <div class="box-body">
            <div class="col-md-5" style="padding-top: 15px;padding-bottom: 15px;">
              <img src="<?php echo $JAK_FORM_DATA["pathoriginal"] . $JAK_FORM_DATA["title"]; ?>" alt="" class="img-responsive" style="border: 8px solid #fff;outline: 8px solid #f9f9f9;max-height: 270px;margin: 0 auto;">
            </div>
            <div class="col-md-7">
              <div class="block">
                <div class="block-content">
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', $tl["fb_box_content"]["fbbc"]);
                      ?>

                    </div>
                    <div class="col-md-7"><?php echo $JAK_FORM_DATA["title"]; ?></div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', $tl["fb_box_content"]["fbbc1"]);
                      ?>

                    </div>
                    <div class="col-md-7"><?php echo $JAK_FORM_DATA["pathoriginal"]; ?></div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', $tl["fb_box_content"]["fbbc2"]);
                      ?>

                    </div>
                    <div class="col-md-7"><?php echo $JAK_FORM_DATA["paththumb"]; ?></div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', $tl["fb_box_content"]["fbbc3"]);
                      ?>

                    </div>
                    <div class="col-md-7"><?php echo formatSizeUnits($JAK_FORM_DATA["size"]); ?></div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', $tl["fb_box_content"]["fbbc4"]);
                      ?>

                    </div>
                    <div class="col-md-7"><?php echo $JAK_FORM_DATA["width"] . ' x ' . $JAK_FORM_DATA["height"]; ?></div>
                  </div>
                  <div class="row-form">
                    <div class="col-md-5">

                      <?php
                      // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
                      echo $Html->addTag('strong', $tl["fb_box_content"]["fbbc5"]);
                      ?>

                    </div>
                    <div class="col-md-7"><?php echo date("d.m.Y - H:i", strtotime($JAK_FORM_DATA["time"])); ?></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="box-footer">

            <?php
            // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
            echo $Html->addAnchor('index.php?p=facebookgallery&amp;sp=delete&amp;ssp=' . $JAK_FORM_DATA["id"], 'Delete', '', 'btn btn-danger pull-right', array('data-confirm' => sprintf($tl["fb_notification"]["del"], $JAK_FORM_DATA["title"])));
            ?>

          </div>
        </div>
      </div>
    </div>
  </form>

<?php include "footer.php"; ?>