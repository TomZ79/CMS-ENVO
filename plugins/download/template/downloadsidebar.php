<?php
/*
 * PLUGIN DOWNLOAD - POPIS SOUBORU downloadsidebar.php
 * ------------------------------------------------------
 *
 * Soubor slouží pro generovaní (zobrazení) postraního panelu se zadanými kategoriemi
 *
 * Použitelné hodnoty s daty pro FRONTEND - downloadsidebar.php
 * -------------------------------------------------------------
 *
 * $ENVO_DOWNLOAD_CAT = pole s daty
 * foreach ($ENVO_DOWNLOAD_CAT as $c) = získání jednotlivých dat z pole
 *
 * $c["id"]             číslo		|	- id souboru
 * $c["title"]					text			- Titulek souboru
 * $c["content"]				text			- Celý popis souboru
 * $c["contentshort"]		text			- Zkrácený popis souboru
 * $c["showtitle"]			ano/ne		- Zobrazení nadpisu
 * $c["showdate"]				ano/ne
 * $c["created"]				datum			- Datum vytvoření
 * $c["hits"]						číslo			- Počet zobrazení
 * $c["countdl"]				číslo			- Počet stažení
 * $c["previmg"]
 * $c["parseurl"]       text      - Adresa URL
 *
 */
?>

<?php if (ENVO_PLUGIN_ACCESS_DOWNLOAD) {
  // Get URL
  $url_array = explode('/', $_SERVER['REQUEST_URI']);
  $url       = end($url_array);
  // Get Download Categories
  $ENVO_DOWNLOAD_CAT = ENVO_base::envoGetcatmix(ENVO_PLUGIN_VAR_DOWNLOAD, '', DB_PREFIX . 'downloadcategories', ENVO_USERGROUPID, $setting["downloadurl"]);

  if ($ENVO_DOWNLOAD_CAT) { ?>
    <aside class="nav-side-menu">

      <h4 class="brand"><?=ENVO_PLUGIN_NAME_DOWNLOAD . ' - ' . $tld["downl_frontend"]["downl8"]?></h4>
      <span class="toggle-btn c-icons" data-toggle="collapse" data-target="#downloadsidebar"></span>

      <div class="menu-list">
        <ul class="menu-content collapse" id="downloadsidebar">
          <?php if (isset($ENVO_DOWNLOAD_CAT) && is_array($ENVO_DOWNLOAD_CAT)) foreach ($ENVO_DOWNLOAD_CAT as $c) { ?>
            <?php if ($c["catparent"] == 0) { ?>

              <li <?php
              // Class for all Download article in category
              if ($c["varname"] == $url) echo 'class="active"';
              // Class for Download article
              if ($c["varname"] == $DOWNLOAD_CAT) echo 'class="active"';

              ?> >
                <a href="<?=$c["parseurl"]?>" title="<?=strip_tags($c["content"])?>">
                  <?php if ($c["catimg"]) { ?>
                    <i class="fa <?=$c["catimg"]?> fa-fw"></i>
                  <?php }
                  echo $c["name"]; ?>
                  <span <?=($c["count"] <= 9) ? 'class="count count-small"' : 'class="count"'?>>
										<?=$c["count"]?>
									</span>
                </a>

                <ul>
                  <?php if (isset($ENVO_DOWNLOAD_CAT) && is_array($ENVO_DOWNLOAD_CAT)) foreach ($ENVO_DOWNLOAD_CAT as $c1) { ?>
                    <?php if ($c1["catparent"] != '0' && $c1["catparent"] == $c["id"]) { ?>
                      <li>
                        <a href="<?=$c1["parseurl"]?>" title="<?=strip_tags($c1["content"])?>">
                          <?php if ($c1["catimg"]) { ?>
                            <i class="fa <?=$c1["catimg"]?> fa-fw"></i>
                          <?php }
                          echo $c1["name"]; ?>
                          <span <?=($c["count"] <= 9) ? 'class="count count-small"' : 'class="count"'?>>
										      <?=$c1["count"]?>
									      </span>
                        </a>
                      </li>
                    <?php }
                  } ?>
                </ul>
              </li>
            <?php }
          } ?>
        </ul>
      </div>

      <hr>
    </aside>

  <?php }
} ?>