<div class="box box-success">
  <div class="box-header with-border">

    <?php
    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
    echo $Html->addTag('h3', $tlint["int_connect"]["intc"], 'box-title');
    ?>

  </div>
  <div class="box-body">
    <div class="block">
      <div class="block-content">
        <div class="row-form">
          <div class="col-md-5">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlint["int_connect"]["intc1"]);
            ?>

          </div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('envo_intranet', '1', ($ENVO_FORM_DATA["intranet"] == '1') ? TRUE : FALSE, 'envo_intranet1');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('envo_intranet1', $tl["checkbox"]["chk"]);

              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('envo_intranet', '0', ($ENVO_FORM_DATA["intranet"] == '0') ? TRUE : FALSE, 'envo_intranet2');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('envo_intranet2', $tl["checkbox"]["chk1"]);
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