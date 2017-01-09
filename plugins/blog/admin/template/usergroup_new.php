<div class="box box-success">
  <div class="box-header with-border">
    <h3 class="box-title"><?php echo $tlblog["blog_connect"]["blogc3"]; ?></h3>
  </div>
  <div class="box-body">
    <div class="block">
      <div class="block-content">
        <div class="row-form">
          <div class="col-md-5"><strong><?php echo $tlblog["blog_connect"]["blogc4"]; ?></strong></div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <input type="radio" id="jak_blog1" name="jak_blog" value="1"<?php if (!$JAK_FORM_DATA) { if ($_REQUEST["jak_blog"] == '1') { ?> checked="checked"<?php } } else { if ($JAK_FORM_DATA["blog"] == '1') { ?> checked="checked"<?php } } ?> />
              <label for="jak_blog1"><?php echo $tl["checkbox"]["chk"]; ?></label>

              <input type="radio" id="jak_blog2" name="jak_blog" value="0"<?php if (!$JAK_FORM_DATA) {if ($_REQUEST["jak_blog"] == '0') { ?> checked="checked"<?php }} else {if ($JAK_FORM_DATA["blog"] == '0') { ?> checked="checked"<?php }} ?> />
              <label for="jak_blog2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5"><strong><?php echo $tlblog["blog_connect"]["blogc5"]; ?></strong></div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <input type="radio" id="jak_blogpost1" name="jak_blogpost" value="1"<?php if (!$JAK_FORM_DATA) {if ($_REQUEST["jak_blogpost"] == '1') { ?> checked="checked"<?php }} else {if ($JAK_FORM_DATA["blogpost"] == '1') { ?> checked="checked"<?php }} ?> />
              <label for="jak_blogpost1"><?php echo $tl["checkbox"]["chk"]; ?></label>

              <input type="radio" id="jak_blogpost2" name="jak_blogpost" value="0"<?php if (!$JAK_FORM_DATA) {if ($_REQUEST["jak_blogpost"] == '0') { ?> checked="checked"<?php }} else {if ($JAK_FORM_DATA["blogpost"] == '0') { ?> checked="checked"<?php }} ?> />
              <label for="jak_blogpost2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5"><strong><?php echo $tlblog["blog_connect"]["blogc6"]; ?></strong></div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <input type="radio" id="jak_blogpostapprove1" name="jak_blogpostapprove" value="0"<?php if (!$JAK_FORM_DATA) {if ($_REQUEST["jak_blogpostapprove"] == '0') { ?> checked="checked"<?php }} else {if ($JAK_FORM_DATA["blogpostapprove"] == '0') { ?> checked="checked"<?php }} ?> />
              <label for="jak_blogpostapprove1"><?php echo $tl["checkbox"]["chk"]; ?></label>

              <input type="radio" id="jak_blogpostapprove2" name="jak_blogpostapprove" value="1"<?php if (!$JAK_FORM_DATA) {if ($_REQUEST["jak_blogpostapprove"] == '1') { ?> checked="checked"<?php }} else {if ($JAK_FORM_DATA["blogpostapprove"] == '1') { ?> checked="checked"<?php }} ?> />
              <label for="jak_blogpostapprove2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5"><strong><?php echo $tlblog["blog_connect"]["blogc7"]; ?></strong></div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <input type="radio" id="jak_blogpostdelete1" name="jak_blogpostdelete" value="1"<?php if (!$JAK_FORM_DATA) {if ($_REQUEST["jak_blogpostdelete"] == '1') { ?> checked="checked"<?php }} else {if ($JAK_FORM_DATA["blogpostdelete"] == '1') { ?> checked="checked"<?php }} ?> />
              <label for="jak_blogpostdelete1"><?php echo $tl["checkbox"]["chk"]; ?></label>

              <input type="radio" id="jak_blogpostdelete2" name="jak_blogpostdelete" value="0"<?php if (!$JAK_FORM_DATA) {if ($_REQUEST["jak_blogpostdelete"] == '0') { ?> checked="checked"<?php }} else {if ($JAK_FORM_DATA["blogpostdelete"] == '0') { ?> checked="checked"<?php }} ?> />
              <label for="jak_blogpostdelete2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5"><strong><?php echo $tlblog["blog_connect"]["blogc8"]; ?></strong></div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <input type="radio" id="jak_blograte1" name="jak_blograte" value="1"<?php if (!$JAK_FORM_DATA) {if ($_REQUEST["jak_blograte"] == '1') { ?> checked="checked"<?php }} else {if ($JAK_FORM_DATA["blograte"] == '1') { ?> checked="checked"<?php }} ?> />
              <label for="jak_blograte1"><?php echo $tl["checkbox"]["chk"]; ?></label>

              <input type="radio" id="jak_blograte2" name="jak_blograte" value="0"<?php if (!$JAK_FORM_DATA) {if ($_REQUEST["jak_blograte"] == '0') { ?> checked="checked"<?php }} else {if ($JAK_FORM_DATA["blograte"] == '0') { ?> checked="checked"<?php }} ?> />
              <label for="jak_blograte2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

            </div>
          </div>
        </div>
        <div class="row-form">
          <div class="col-md-5"><strong><?php echo $tlblog["blog_connect"]["blogc9"]; ?></strong></div>
          <div class="col-md-7">
            <div class="radio radio-success">

              <input type="radio" id="jak_blogmoderate1" name="jak_blogmoderate" value="1"<?php if (!$JAK_FORM_DATA) {if ($_REQUEST["jak_blogmoderate"] == '1') { ?> checked="checked"<?php }} else {if ($JAK_FORM_DATA["blogmoderate"] == '1') { ?> checked="checked"<?php }} ?> />
              <label for="jak_blogmoderate1"><?php echo $tl["checkbox"]["chk"]; ?></label>

              <input type="radio" id="jak_blogmoderate2" name="jak_blogmoderate" value="0"<?php if (!$JAK_FORM_DATA) {if ($_REQUEST["jak_blogmoderate"] == '0') { ?> checked="checked"<?php }} else {if ($JAK_FORM_DATA["blogmoderate"] == '0') { ?> checked="checked"<?php }} ?> />
              <label for="jak_blogmoderate2"><?php echo $tl["checkbox"]["chk1"]; ?></label>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="box-footer">
    <button type="submit" name="save" class="btn btn-success pull-right">
      <i class="fa fa-save margin-right-5"></i>
      <?php echo $tl["button"]["btn1"]; ?>
    </button>
  </div>
</div>