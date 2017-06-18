<div class="box box-success">
  <div class="box-header with-border">

    <?php
    // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
    echo $Html->addTag('h3', $tlf["faq_connect"]["faqc"], 'box-title');
    ?>

  </div>
  <div class="box-body">
    <div class="block">
      <div class="block-content">
        <div class="row-form">
          <div class="col-md-5">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlf["faq_connect"]["faqc1"]);
            ?>

          </div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_faq', '1', ((isset($_REQUEST["jak_faq"]) && $_REQUEST["jak_faq"] == '1')) ? TRUE : FALSE, 'jak_faq1');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_faq1', $tl["checkbox"]["chk"]);

              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_faq', '0', ((isset($_REQUEST["jak_faq"]) && $_REQUEST["jak_faq"] == '0') || !isset($_REQUEST["jak_faq"])) ? TRUE : FALSE, 'jak_faq2');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_faq2', $tl["checkbox"]["chk1"]);
              ?>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlf["faq_connect"]["faqc2"]);
            ?>

          </div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_faqpost', '1', ((isset($_REQUEST["jak_faqpost"]) && $_REQUEST["jak_faqpost"] == '1')) ? TRUE : FALSE, 'jak_faqpost1');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_faqpost1', $tl["checkbox"]["chk"]);

              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_faqpost', '0', ((isset($_REQUEST["jak_faqpost"]) && $_REQUEST["jak_faqpost"] == '0') || !isset($_REQUEST["jak_faqpost"])) ? TRUE : FALSE, 'jak_faqpost2');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_faqpost2', $tl["checkbox"]["chk1"]);
              ?>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlf["faq_connect"]["faqc3"]);
            ?>

          </div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_faqpostapprove', '0', ((isset($_REQUEST["jak_faqpostapprove"]) && $_REQUEST["jak_faqpostapprove"] == '0') || !isset($_REQUEST["jak_faqpostapprove"])) ? TRUE : FALSE, 'jak_faqpostapprove1');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_faqpostapprove1', $tl["checkbox"]["chk"]);

              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_faqpostapprove', '1', ((isset($_REQUEST["jak_faqpostapprove"]) && $_REQUEST["jak_faqpostapprove"] == '1')) ? TRUE : FALSE, 'jak_faqpostapprove2');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_faqpostapprove2', $tl["checkbox"]["chk1"]);
              ?>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlf["faq_connect"]["faqc4"]);
            ?>

          </div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_faqpostdelete', '1', ((isset($_REQUEST["jak_faqpostdelete"]) && $_REQUEST["jak_faqpostdelete"] == '1')) ? TRUE : FALSE, 'jak_faqpostdelete1');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_faqpostdelete1', $tl["checkbox"]["chk"]);

              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_faqpostdelete', '0', ((isset($_REQUEST["jak_faqpostdelete"]) && $_REQUEST["jak_faqpostdelete"] == '0') || !isset($_REQUEST["jak_faqpostdelete"])) ? TRUE : FALSE, 'jak_faqpostdelete2');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_faqpostdelete2', $tl["checkbox"]["chk1"]);
              ?>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlf["faq_connect"]["faqc5"]);
            ?>

          </div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_faqrate', '1', ((isset($_REQUEST["jak_faqrate"]) && $_REQUEST["jak_faqrate"] == '1')) ? TRUE : FALSE, 'jak_faqrate1');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_faqrate1', $tl["checkbox"]["chk"]);

              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_faqrate', '0', ((isset($_REQUEST["jak_faqrate"]) && $_REQUEST["jak_faqrate"] == '0') || !isset($_REQUEST["jak_faqrate"])) ? TRUE : FALSE, 'jak_faqrate2');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_faqrate2', $tl["checkbox"]["chk1"]);
              ?>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5">

            <?php
            // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
            echo $Html->addTag('strong', $tlf["faq_connect"]["faqc6"]);
            ?>

          </div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <?php
              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_faqmoderate', '1', ((isset($_REQUEST["jak_faqmoderate"]) && $_REQUEST["jak_faqmoderate"] == '1')) ? TRUE : FALSE, 'jak_faqmoderate1');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_faqmoderate1', $tl["checkbox"]["chk"]);

              // Add Html Element -> addCheckbox (Arguments: name, value, checked, id, class, optional assoc. array)
              echo $Html->addRadio('jak_faqmoderate', '0', ((isset($_REQUEST["jak_faqmoderate"]) && $_REQUEST["jak_faqmoderate"] == '0') || !isset($_REQUEST["jak_faqmoderate"])) ? TRUE : FALSE, 'jak_faqmoderate2');
              // Add Html Element -> addLabel (Arguments: for, label, optional assoc. array)
              echo $Html->addLabel('jak_faqmoderate2', $tl["checkbox"]["chk1"]);
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