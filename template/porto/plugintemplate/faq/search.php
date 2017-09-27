<?php if (isset($ENVO_SEARCH_RESULT_FAQ) && is_array($ENVO_SEARCH_RESULT_FAQ)) foreach ($ENVO_SEARCH_RESULT_FAQ as $fq) {
  $count++; ?>

  <div class="col-md-3 col-sm-6">
    <div class="service-wrapper">
      <i class="fa fa-question-circle fa-4x"></i>
      <h3><a href="<?php echo $fq["parseurl"]; ?>"><?php echo $fq["title"]; ?></a></h3>
      <p><?php echo $fq["content"]; ?></p>
      <a href="<?php echo $fq["parseurl"]; ?>" class="btn btn-primary"><?php echo $tl["general"]["g3"]; ?></a>
    </div>
  </div>

<?php } ?>