<?php include "header.php"; ?>

<?php if ($page1 == "s") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["general"]["g7"];?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php }
if ($page1 == "e") { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["errorpage"]["sql"]; ?>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php }
if ($errors) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php if (isset($errors["e"])) echo $errors["e"];
          if (isset($errors["e1"])) echo $errors["e1"];
          if (isset($errors["e2"])) echo $errors["e2"]; ?>',
      }, {
        // settings
        type: 'success',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php } ?>

  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
    <div class="row">
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["title"]["t2"]; ?></h3>
          </div><!-- /.box-header -->
          <div class="box-body">

            <div class="form-group">
              <label for="siteonline"><?php echo $tl["site"]["s"]; ?></label>
              <div class="radio">
                <label class="checkbox-inline">
                  <input type="radio" name="jak_online" id="siteonline" value="1"<?php if ($jkv["offline"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                </label>
                <label class="checkbox-inline">
                  <input type="radio" name="jak_online" value="0"<?php if ($jkv["offline"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                </label>
              </div>
            </div>
            <div class="form-group">
              <label for="jak_offpage"><?php echo $tl["site"]["s1"]; ?></label>
              <select name="jak_offpage" class="form-control selectpicker" data-live-search="true" data-size="5">
                <option value="0"<?php if ($jkv["offline_page"] == 0) { ?> selected="selected"<?php } ?>><?php echo $tl["title"]["t12"]; ?></option>
                <?php if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach ($JAK_CAT as $c) {
                  if ($c["pluginid"] == '0' && $c["pageid"] > '0') { ?>
                    <option value="<?php echo $c["id"]; ?>"<?php if ($jkv["offline_page"] == $c["id"]) { ?> selected="selected"<?php } ?>><?php echo $c["name"]; ?></option><?php }
                } ?>
              </select>
            </div>
            <div class="form-group">
              <label for="jak_pagenotfound"><?php echo $tl["site"]["s7"]; ?></label>
              <select name="jak_pagenotfound" class="form-control selectpicker" data-live-search="true" data-size="5">
                <option
                  value="0"<?php if ($jkv["notfound_page"] == 0) { ?> selected="selected"<?php } ?>><?php echo $tl["title"]["t12"]; ?></option>
                <?php if (isset($JAK_CAT) && is_array($JAK_CAT)) foreach ($JAK_CAT as $nf) {
                  if ($nf["pluginid"] == '0' && $nf["pageid"] > '0') { ?>
                    <option value="<?php echo $nf["id"]; ?>"<?php if ($jkv["notfound_page"] == $nf["id"]) { ?> selected="selected"<?php } ?>><?php echo $nf["name"]; ?></option><?php }
                } ?>
              </select>
            </div>


          </div>
          <div class="box-footer">
            <button type="submit" name="save"
                    class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo $tl["title"]["t3"]; ?></h3>
          </div><!-- /.box-header -->
          <div class="box-body">
            <div class="form-group<?php if (isset($errors["e2"])) echo " has-error"; ?>">
              <label for="sitetitle"><?php echo $tl["site"]["s2"]; ?></label>
              <input type="text" name="jak_title" id="sitetitle" class="form-control" value="<?php echo $jkv["title"]; ?>"/>
            </div>

            <div class="form-group">
              <label for="metadesc"><?php echo $tl["site"]["s3"]; ?></label>
              <input type="text" name="jak_description" id="metadesc" class="form-control" value="<?php echo $jkv["metadesc"]; ?>"/>
            </div>

            <div class="form-group">
              <label for="metakey"><?php echo $tl["site"]["s4"]; ?></label>
              <input type="text" name="jak_keywords" id="metakey" class="form-control" value="<?php echo $jkv["metakey"]; ?>"/>
            </div>

            <div class="form-group">
              <label for="metaauthor"><?php echo $tl["site"]["s5"]; ?></label>
              <input type="text" name="jak_author" id="metaauthor" class="form-control" value="<?php echo $jkv["metaauthor"]; ?>"/>
            </div>

            <div class="form-group">
              <label for="robots"><?php echo $tl["site"]["s6"]; ?></label>
              <div class="radio">
                <label class="checkbox-inline">
                  <input type="radio" name="jak_robots" id="robots" value="1"<?php if ($jkv["robots"] == '1') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g18"]; ?>
                </label>
                <label class="checkbox-inline">
                  <input type="radio" name="jak_robots" value="0"<?php if ($jkv["robots"] == '0') { ?> checked="checked"<?php } ?> /> <?php echo $tl["general"]["g19"]; ?>
                </label>
              </div>
            </div>

            <div class="form-group">
              <label for="copyright"><?php echo $tl["setting"]["s3"]; ?></label>
              <textarea name="jak_copy" id="copyright" class="form-control" rows="1"><?php echo $jkv["copyright"]; ?></textarea>
            </div>

          </div>
          <div class="box-footer">
            <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <div class="row-fluid" style="margin-top: 20px;">
      <div class="container-fluid">
        <h5><strong>Site Offline</strong></h5>
        <p>Přepnutí sítě do režimu Offline. Využíváme pro update webové sítě. Pro aktivaci, musíme vybrat stránku pro zobrazení v režimu offline. Pokud tak neučiníme, tak síť nepřejde do režimu offline. </p>

        <h5><strong>Offline Page</strong></h5>
        <p>Výběr offline stránky. Offline stránka se zobrazí při aktivaci sítě do režimu offline. Můžeme tak vytvořit stránku např. "Comming Soon".</p>

        <h5><strong>404 Page</strong></h5>
        <p>Výběr chybové stránky. Pokud uživatel zadá chybný název stránky, CMS zobrazí chybovou stránku. V seznamu můžeme vybrat námi definovanou stránku. Pokud není nic vybráno, tak základní chybová hláška je 404.php v daném template.</p>

        <h5><strong>Titulek Web Sítě</strong></h5>
        <p>Základní jméno webové sítě. Zobrazí se v tagu <span class="text-primary-400">'title'</span> v každé stránce sítě.</p>

        <h5><strong>Meta Description</strong></h5>
        <p><span class="text-danger-400">???</span></p>

        <h5><strong>Meta Keywords</strong></h5>
        <p>Nastavení globálních klíčových slov.</p>

        <h5><strong>Meta Author</strong></h5>
        <p>Meta tag se zobrazí v každé stránce webové sítě.</p>

        <h5><strong>Robots Follow</strong></h5>
        <p><span class="text-danger-400">???</span></p>

        <h5><strong>Copyright Text</strong></h5>
        <p>Text se zobrazí v zápatí stránek webové sítě</p>
      </div>
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

<?php include "footer.php"; ?>