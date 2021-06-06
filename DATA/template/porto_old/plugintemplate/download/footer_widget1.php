<?php

if (ENVO_PLUGIN_ACCESS_DOWNLOAD) {

  $ENVO_DOWNLOAD_CAT = ENVO_base::envoGetcatmix(ENVO_PLUGIN_VAR_DOWNLOAD, '', DB_PREFIX . 'downloadcategories', ENVO_USERGROUPID, $setting["downloadurl"]);

  if ($ENVO_DOWNLOAD_CAT) {
  } ?>
  <?php if (isset($ENVO_DOWNLOAD_CAT) && is_array($ENVO_DOWNLOAD_CAT)) foreach ($ENVO_DOWNLOAD_CAT as $carray) {

    $catexistid = array($carray["catparent"]);

  } ?>

  <h3><?=ENVO_PLUGIN_NAME_DOWNLOAD . ' ' . $tld["downl_frontend"]["downl8"]?></h3>
  <ul class="nav nav-pills nav-stacked">
  <?php if (isset($ENVO_DOWNLOAD_CAT) && is_array($ENVO_DOWNLOAD_CAT)) foreach ($ENVO_DOWNLOAD_CAT as $c) { ?>
    <?php if ($c["catparent"] == 0) { ?>
      <li><a href="<?=$c["parseurl"]?>"><?php if ($c["catimg"]) { ?><img
          src="<?=BASE_URL . $c["catimg"]?>" alt="sideimg" /><?php }
        echo $c["name"]; ?> (<?=$c["count"]?>)</a>
      <?php if ($catexistid) { ?>
        <ul class="nav nav-pills nav-stacked">
          <?php if (isset($ENVO_DOWNLOAD_CAT) && is_array($ENVO_DOWNLOAD_CAT)) foreach ($ENVO_DOWNLOAD_CAT as $c1) { ?>
            <?php if ($c1["catparent"] != '0' && $c1["catparent"] == $c["id"]) { ?>
              <li><a href="<?=$c1["parseurl"]?>"><?php if ($c1["catimg"]) { ?><img
                    src="<?=BASE_URL . $c1["catimg"]?>" alt="sideimg" /> <?php }
                  echo $c1["name"]; ?> (<?=$c1["count"]?>)</a></li>
            <?php }
          } ?>
        </ul>
        </li>
      <?php }
    } ?>
    </ul>

  <?php }
} ?>