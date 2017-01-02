<div class="box">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $tlf["faq"]["d"]; ?></h3>
    <div class="box-tools pull-right">
      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
    </div>
  </div>
  <div class="box-body">
    <div class="block">
      <div class="block-content">
        <div class="row-form">
          <div class="col-md-5"><strong><?php echo $tlf["faq"]["d1"]; ?></strong></div>
          <div class="col-md-7">
            <div class="radio">
              <label class="checkbox-inline">
                <input type="radio" name="jak_faq" value="1"<?php if ($JAK_FORM_DATA["faq"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="jak_faq" value="0"<?php if ($JAK_FORM_DATA["faq"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
              </label>
            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5"><strong><?php echo $tlf["faq"]["d2"]; ?></strong></div>
          <div class="col-md-7">
            <div class="radio">
              <label class="checkbox-inline">
                <input type="radio" name="jak_faqpost" value="1"<?php if ($JAK_FORM_DATA["faqpost"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="jak_faqpost" value="0"<?php if ($JAK_FORM_DATA["faqpost"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
              </label>
            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5"><strong><?php echo $tlf["faq"]["d3"]; ?></strong></div>
          <div class="col-md-7">
            <div class="radio">
              <label class="checkbox-inline">
                <input type="radio" name="jak_faqpostapprove" value="0"<?php if ($JAK_FORM_DATA["faqpostapprove"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="jak_faqpostapprove" value="1"<?php if ($JAK_FORM_DATA["faqpostapprove"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
              </label>
            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5"><strong><?php echo $tlf["faq"]["d4"]; ?></strong></div>
          <div class="col-md-7">
            <div class="radio">
              <label class="checkbox-inline">
                <input type="radio" name="jak_faqpostdelete" value="1"<?php if ($JAK_FORM_DATA["faqpostdelete"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="jak_faqpostdelete" value="0"<?php if ($JAK_FORM_DATA["faqpostdelete"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
              </label>
            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5"><strong><?php echo $tlf["faq"]["d5"]; ?></strong></div>
          <div class="col-md-7">
            <div class="radio">
              <label class="checkbox-inline">
                <input type="radio" name="jak_faqrate" value="1"<?php if ($JAK_FORM_DATA["faqrate"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="jak_faqrate" value="0"<?php if ($JAK_FORM_DATA["faqrate"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
              </label>
            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5"><strong><?php echo $tlf["faq"]["d6"]; ?></strong></div>
          <div class="col-md-7">
            <div class="radio">
              <label class="checkbox-inline">
                <input type="radio" name="jak_faqmoderate" value="1"<?php if ($JAK_FORM_DATA["faqmoderate"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
              </label>
              <label class="checkbox-inline">
                <input type="radio" name="jak_faqmoderate" value="0"<?php if ($JAK_FORM_DATA["faqmoderate"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
              </label>
            </div>
          </div>
        </div>
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