<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if ($PAGE_ACTIVE) {
  echo '<div class="alert alert-danger">' . $tl["general_error"]["generror2"] . '</div>';
}

?>

  <!-- =========================
    START ERROR SECTION
    ============================== -->
  <div class="section-full bg-white content-inner-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-error text-center">
            <h6 class="m-b20 text-uppercase"><?= $PAGE_CONTENT ?></h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- =========================
  END ERROR SECTION
  ============================== -->

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>