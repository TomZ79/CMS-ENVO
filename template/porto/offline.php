<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if ($USR_IP_BLOCKED) { ?>e

  <!-- IP USER BLOCKED -->
  <section class="pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <hr class="tall">
          <h1 class="small text-uppercase"><?= $USR_IP_BLOCKED ?></h1>
          <hr class="tall">
        </div>
      </div>
    </div>
  </section>

<?php } else { ?>

  <!-- OFFLINE PAGE -->
  <section class="pt-5 pb-5">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <hr class="tall">
          <h1 class="small text-uppercase"><?= $tl["general_error"]["generror6"] ?></h1>
          <p><?= $tl["general_error"]["generror7"] ?></p>
          <hr class="tall">
        </div>
      </div>
    </div>
  </section>

  <?php

}

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php';

?>