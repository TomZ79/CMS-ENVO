<?php if (ENVO_PLUGIN_ACCESS_NEWSLETTER) {

  // get the right url
  $NL_SUBMIT_LINK = ENVO_rewrite::envoParseurl(ENVO_PLUGIN_VAR_NEWSLETTER, 'signup', '', '', '');

  // Show newsletter login form only once
  $shownewsletter_form = TRUE;

  ?>
  <aside class="sidebar well well-sm">

    <h3><?php echo ENVO_NLTITLE; ?></h3>
    <div class="envo-thankyou"></div>
    <?php if ($_SESSION['envo_nl_errors']) { ?>
      <div
        class="alert bg-danger"><?php echo $_SESSION['envo_nl_errors']["nlUser"] . $_SESSION['envo_nl_errors']["nlEmail"]; ?></div>
    <?php }
    if ($_SESSION["envo_nl_sent"] == 1) { ?>
      <div class="alert bg-success"><?php echo $_SESSION['envo_thankyou_nl']; ?></div>
    <?php } else { ?>
      <form class="envo-ajaxform cFrom" role="form" action="<?php echo $NL_SUBMIT_LINK; ?>" method="post">
        <div class="form-group<?php if ($errornl) echo " has-error"; ?>">
          <label class="control-label" for="nlUser"><?php echo $tl["contact"]["c1"]; ?></label>
          <input type="text" name="nlUser" id="nlUser" class="form-control input-sm"
            value="<?php echo $_REQUEST["nlUser"]; ?>" placeholder="<?php echo $tl["contact"]["c1"]; ?>"/>
        </div>
        <div class="form-group<?php if ($errornl) echo " has-error"; ?>">
          <label class="control-label" for="nlEmail"><?php echo $tl["login"]["l5"]; ?></label>
          <input type="text" name="nlEmail" id="nlEmail" class="form-control input-sm"
            value="<?php echo $_REQUEST["nlUser"]; ?>" placeholder="<?php echo $tl["login"]["l5"]; ?>"/>
        </div>

        <button type="submit" name="newsletter"
          class="btn btn-success btn-block btn-xs envo-submit"><?php echo $tl["general"]["g10"]; ?></button>
      </form>
    <?php } ?>

  </aside>

  <script src="<?php echo BASE_URL; ?>plugins/newsletter/js/nlform.js?=<?php echo $jkv["updatetime"]; ?>"
    type="text/javascript"></script>

  <script type="text/javascript">

    envoWeb.envo_submit = "<?php echo $tl["general"]["g10"];?>";
    envoWeb.envo_submitwait = "<?php echo $tl['general']['g99'];?>";
    nlCMS.nlcms_url = "<?php echo(ENVO_USE_APACHE ? substr($NL_SUBMIT_LINK, 1) : $NL_SUBMIT_LINK);?>";

  </script>

<?php } ?>