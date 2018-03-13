<?php

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php';

if ($PAGE_ACTIVE) {
  echo '<div class="alert alert-danger">' . $tl["general_error"]["generror2"] . '</div>';
}

echo $PAGE_CONTENT;

include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php';

?>