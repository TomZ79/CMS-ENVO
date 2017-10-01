<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (!$setting["searchform"]) { ?>
  <section class="main-color pt-large pb-large">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-center">
            <h1 class="large"><?php echo $tl["searching_error"]["ser1"]; ?></h1>
            <p class="lead"><?php echo $tl["searching_error"]["ser"]; ?></p>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php } else { ?>

  <form role="form" action="<?php echo $P_SEAERCH_LINK; ?>" method="post">
    <div class="input-group">
      <input type="text" name="envoSH" id="Jajaxs" class="form-control" placeholder="<?php echo $tl["placeholder"]["plc"]; if ($setting["fulltextsearch"]) echo $tl["placeholder"]["plc1"]; ?>">
      <span class="input-group-btn">
        <button type="submit" class="btn btn-default" name="search" id="JajaxSubmitSearch"><?php echo $tl["searching"]["stxt"]; ?></button>
      </span>
    </div>
    <?php if (isset($ENVO_HOOK_SEARCH_SIDEBAR) && is_array($ENVO_HOOK_SEARCH_SIDEBAR)) foreach ($ENVO_HOOK_SEARCH_SIDEBAR as $hss) {
      include_once APP_PATH . $hss['phpcode'];
    } ?>
  </form>

  <hr>
<?php if ($errors) { ?>
  <hr>
  <div class="alert alert-danger fade in">
    <button type="button" class="close" data-dismiss="alert">×</button>
    <?php if (isset($errors["e1"])) echo $errors["e1"];
    if (isset($errors["e2"])) echo $errors["e2"];
    if (isset($errors["e"])) echo $errors["e"]; ?>
  </div>
<?php }
if (isset($ENVO_SEARCH_USED)) { ?>

  <div class="col-md-12">
    <div class="col-md-6">
      <h3><?php echo $tl["searching"]["stxt1"]; ?> <strong><?php echo $ENVO_SEARCH_WORD_RESULT; ?></strong></h3>
    </div>
    <div class="col-md-6">
      <?php
      $count = 0;
      if (isset($ENVO_SEARCH_RESULT) && is_array($ENVO_SEARCH_RESULT)) foreach ($ENVO_SEARCH_RESULT as $v) $count++;
      if (isset($ENVO_SEARCH_RESULT_NEWS) && is_array($ENVO_SEARCH_RESULT_NEWS)) foreach ($ENVO_SEARCH_RESULT_NEWS as $n) $count++;
      if (isset($count)) { ?>
        <p class="pull-right"><?php echo str_replace("%s", $count, $tl["searching"]["stxt2"]); ?></p>
      <?php } else { ?>

        <div class="alert alert-danger">
          <?php echo $tl["searching_error"]["ser2"]; ?>
        </div>

      <?php } ?>
    </div>
  </div>

  <div class="col-md-12 mb-medium">
    <?php
    if (isset($ENVO_SEARCH_RESULT) && is_array($ENVO_SEARCH_RESULT)) foreach ($ENVO_SEARCH_RESULT as $v) {
      $count++; ?>

      <div class="col-md-12">
        <div class="service-wrapper">
          <i class="fa fa-file-text-o fa-4x"></i>

          <h3><a href="<?php echo $v["parseurl"]; ?>"><?php echo $v["title"]; ?></a></h3>

          <p><?php echo $v["content"]; ?></p>
        </div>
        <hr>
      </div>

    <?php }
    if (isset($ENVO_SEARCH_RESULT_NEWS) && is_array($ENVO_SEARCH_RESULT_NEWS)) foreach ($ENVO_SEARCH_RESULT_NEWS as $n) {
      $count++; ?>

      <div class="col-md-12">
        <div class="service-wrapper">
          <i class="fa fa-newspaper-o fa-4x"></i>

          <h3><a href="<?php echo $n["parseurl"]; ?>"><?php echo $n["title"]; ?></a></h3>

          <p><?php echo $n["content"]; ?></p>
        </div>
        <hr>
      </div>


    <?php }
    if (isset($ENVO_HOOK_SEARCH) && is_array($ENVO_HOOK_SEARCH)) foreach ($ENVO_HOOK_SEARCH as $hs) {
      // include_once APP_PATH . $hs["phpcode"];
      eval($hs["phpcode"]);
    } ?>
  </div>
<?php } ?>

  <script type="text/javascript">
    $(document).ready(function () {

      $('#searchi').alphanumeric({nocaps: false, allow: ' -+*'});

    });
  </script>

<?php } ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>