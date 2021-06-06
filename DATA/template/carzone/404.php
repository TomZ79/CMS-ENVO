<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

  <!-- =========================
  START 404 SECTION
  ============================== -->
  <div class="section-full bg-white content-inner-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-notfound text-center">
            <strong><?= $tl["general_error"]["generror"] ?></strong>
            <h6 class="m-b20 text-uppercase"><?= $tl["general_error"]["generror5"] ?></h6>
            <a href="#" class="site-button-secondry button-lg"><span><?= $tlcarzone["error_text"]["et"] ?></span></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- =========================
  END 404 SECTION
  ============================== -->

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>