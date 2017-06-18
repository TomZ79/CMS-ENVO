<div class="box box-success">
  <div class="box-header with-border">

    <?php
    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
    echo $Html->addTag('h3', $tlblog["blog_connect"]["blogc3"], 'box-title');
    ?>

  </div>
  <div class="box-body">
    <div class="block">
      <div class="block-content">
        <div class="row-form">
          <div class="col-md-5">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlblog["blog_connect"]["blogc4"]);
            ?>

          </div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_blog', '1', ($JAK_FORM_DATA["blog"] == '1') ? TRUE : FALSE, 'jak_blog1');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_blog1', $tl["checkbox"]["chk"]);

              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_blog', '0', ($JAK_FORM_DATA["blog"] == '0') ? TRUE : FALSE, 'jak_blog2');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_blog2', $tl["checkbox"]["chk1"]);
              ?>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlblog["blog_connect"]["blogc5"]);
            ?>

          </div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_blogpost', '1', ($JAK_FORM_DATA["blogpost"] == '1') ? TRUE : FALSE, 'jak_blogpost1');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_blogpost1', $tl["checkbox"]["chk"]);

              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_blogpost', '0', ($JAK_FORM_DATA["blogpost"] == '0') ? TRUE : FALSE, 'jak_blogpost2');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_blogpost2', $tl["checkbox"]["chk1"]);
              ?>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlblog["blog_connect"]["blogc6"]);
            ?>

          </div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_blogpostapprove', '0', ($JAK_FORM_DATA["blogpostapprove"] == '0') ? TRUE : FALSE, 'jak_blogpostapprove1');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_blogpostapprove1', $tl["checkbox"]["chk"]);

              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_blogpostapprove', '1', ($JAK_FORM_DATA["blogpostapprove"] == '1') ? TRUE : FALSE, 'jak_blogpostapprove2');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_blogpostapprove2', $tl["checkbox"]["chk1"]);
              ?>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlblog["blog_connect"]["blogc7"]);
            ?>

          </div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_blogpostdelete', '1', ($JAK_FORM_DATA["blogpostdelete"] == '1') ? TRUE : FALSE, 'jak_blogpostdelete1');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_blogpostdelete1', $tl["checkbox"]["chk"]);

              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_blogpostdelete', '0', ($JAK_FORM_DATA["blogpostdelete"] == '0') ? TRUE : FALSE, 'jak_blogpostdelete2');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_blogpostdelete2', $tl["checkbox"]["chk1"]);
              ?>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlblog["blog_connect"]["blogc8"]);
            ?>

          </div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_blograte', '1', ($JAK_FORM_DATA["blograte"] == '1') ? TRUE : FALSE, 'jak_blograte1');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_blograte1', $tl["checkbox"]["chk"]);

              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_blograte', '0', ($JAK_FORM_DATA["blograte"] == '0') ? TRUE : FALSE, 'jak_blograte2');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_blograte2', $tl["checkbox"]["chk1"]);
              ?>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlblog["blog_connect"]["blogc9"]);
            ?>

          </div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_blogmoderate', '1', ($JAK_FORM_DATA["blogmoderate"] == '1') ? TRUE : FALSE, 'jak_blogmoderate1');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_blogmoderate1', $tl["checkbox"]["chk"]);

              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_blogmoderate', '0', ($JAK_FORM_DATA["blogmoderate"] == '0') ? TRUE : FALSE, 'jak_blogmoderate2');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_blogmoderate2', $tl["checkbox"]["chk1"]);
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="box-footer">

    <?php
    // Add Html Element -> addButtonSubmit (Arguments: name, value, id, class, optional assoc. array)
    echo $Html->addButtonSubmit('btnSave', '<i class="fa fa-save m-r-5"></i>' . $tl["button"]["btn1"], '', 'btn btn-success pull-right', array('data-loading-text' => $tl["button"]["btn41"]));
    ?>

  </div>
</div>