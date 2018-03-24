<?php if (ENVO_PLUGIN_ACCESS_NEWSLETTER && $shownewsletter_form == FALSE) {

  // get the right url
  $NL_SUBMIT_LINK = ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_NEWSLETTER, 'signup', '', '', '');

  ?>

  <h3><?php echo $setting["nltitle"]; ?></h3>
  <div id="nl_msg" class="alert bg-success" style="display: none;"></div>
  <?php if ($_SESSION['envo_nl_errors']) { ?>
    <div
      class="alert bg-danger"><?php echo $_SESSION['envo_nl_errors']["nlUser"] . $_SESSION['envo_nl_errors']["nlEmail"]; ?></div>
  <?php }
  if ($_SESSION["envo_nl_sent"] == 1) { ?>
    <div class="alert bg-success"><?php echo $_SESSION['envo_thankyou_nl']; ?></div>
  <?php } else { ?>
    <form id="nlSubmit" action="<?php echo $NL_SUBMIT_LINK; ?>" method="post">
      <div class="form-group<?php if ($errornl) echo " has-error"; ?>">
        <label class="control-label" for="nlUser"><?php echo $tl["contact"]["c1"]; ?></label>
        <div class="controls">
          <input type="text" name="nlUser" id="nlUser" value="<?php echo $_REQUEST["nlUser"]; ?>"
            placeholder="<?php echo $tl["contact"]["c1"]; ?>"/>
        </div>
      </div>
      <div class="form-group<?php if ($errornl) echo " has-error"; ?>">
        <label class="control-label" for="nlEmail"><?php echo $tl["login"]["l5"]; ?></label>
        <div class="controls">
          <input type="text" name="nlEmail" id="nlEmail" value="<?php echo $_REQUEST["nlUser"]; ?>"
            placeholder="<?php echo $tl["login"]["l5"]; ?>"/>
        </div>
      </div>

      <button type="submit" name="newsletter" id="formsubmit"
        class="btn btn-default"><?php echo $tl["general"]["g10"]; ?></button>
    </form>
  <?php } ?>

  <script src="<?php echo BASE_URL; ?>plugins/newsletter/js/nlform.js?=<?php echo $setting["updatetime"]; ?>"
   ></script>

  <script>

    envoWeb.envo_submit = "<?php echo $tl["general"]["g10"];?>";
    envoWeb.envo_submitwait = "<?php echo $tl['general']['g99'];?>";
    nlCMS.nlcms_url = "<?php echo(ENVO_USE_APACHE ? substr($NL_SUBMIT_LINK, 1) : $NL_SUBMIT_LINK);?>";

  </script>

<?php } ?>