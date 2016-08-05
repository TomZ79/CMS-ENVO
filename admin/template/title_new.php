<div class="form-group no-margin<?php if (isset($errors["e1"])) echo " has-error"; ?>">
  <input type="text" name="jak_title" class="form-control"
         value="<?php if (isset($_REQUEST["jak_title"])) echo $_REQUEST["jak_title"]; ?>"/>
</div>