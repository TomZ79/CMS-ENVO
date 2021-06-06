<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if ($USR_IP_BLOCKED) { ?>

	<!-- IP USER BLOCKED -->
  <div class="section-full bg-white content-inner-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-notfound text-center">
            <h6 class="m-b20 text-uppercase"><?=$USR_IP_BLOCKED?></h6>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php } else { ?>

	<!-- OFFLINE PAGE -->
  <div class="section-full bg-white content-inner-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="page-offline text-center">
            <h5 class="m-b20 text-uppercase"><?=$tl["general_error"]["generror6"]?></h5>
            <p><?=$tl["general_error"]["generror7"]?></p>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php

}

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php';

?>