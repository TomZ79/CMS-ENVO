<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if ($PAGE_ACTIVE) {
  echo '<div class="alert alert-danger">' . $tl["general_error"]["generror2"] . '</div>';
}

?>

  <!-- =========================
    START ERROR SECTION
    ============================== -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h2><?= $PAGE_CONTENT ?></h2>
        </div>
      </div>
    </div>
  </section>
  <!-- =========================
  END ERROR SECTION
  ============================== -->

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>