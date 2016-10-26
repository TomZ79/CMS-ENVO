  <form method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">

    <ul class="nav nav-tabs" id="cmsTab">
      <li class="active"><a href="#cmsPage1">Header</a></li>
      <li><a href="#cmsPage2">Section</a></li>
      <li><a href="#cmsPage3">Footer</a></li>
      <li><a href="#cmsPage4">Language</a></li>
    </ul>

    <div class="tab-content">
      <div class="tab-pane active" id="cmsPage1">
        <div class="row">
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Mini Navbar Content</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped first-column v-text-center">
                  <tr>
                    <td>'Home' Links</td>
                    <td>
                      <input type="text" name="homeLinks" class="form-control" value="<?php echo $jktpl["homeLinks_canvas_tpl"]; ?>"/>
                    </td>
                  </tr>
                  <tr>
                    <td>'Contact' Links</td>
                    <td>
                      <input type="text" name="contactLinks" class="form-control" value="<?php echo $jktpl["contactLinks_canvas_tpl"]; ?>"/>
                    </td>
                  </tr>
                  <tr>
                    <td>'Login / Logout' Links</td>
                    <td>
                      <input type="text" name="loginLinks" class="form-control" value="<?php echo $jktpl["loginLinks_canvas_tpl"]; ?>"/>
                    </td>
                  </tr>
                  <tr>
                    <td>'Register' Links</td>
                    <td>
                      <input type="text" name="registerLinks" class="form-control" value="<?php echo $jktpl["registerLinks_canvas_tpl"]; ?>"/>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Navbar Style</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped first-column v-text-center">
                  <tr>
                    <td>Standard Logo</td>
                    <td>
                      <div class="input-group">
                        <input type="text" name="standardlogo" id="sclogo1" class="form-control" value="<?php echo $jktpl["logo1_canvas_tpl"]; ?>"/>
                    <span class="input-group-btn">
                      <a class="btn btn-info ifManager" type="button" href="../../js/editor/plugins/filemanager/dialog.php?type=1&subfolder=&editor=mce_0&lang=eng&fldr=&field_id=sclogo1"><i class="fa fa-photo"></i></a>
                    </span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Retina Logo</td>
                    <td>
                      <div class="input-group">
                        <input type="text" name="retinalogo" id="sclogo2" class="form-control" value="<?php echo $jktpl["logo2_canvas_tpl"]; ?>"/>
                    <span class="input-group-btn">
                      <a class="btn btn-info ifManager" type="button" href="../../js/editor/plugins/filemanager/dialog.php?type=1&subfolder=&editor=mce_0&lang=eng&fldr=&field_id=sclogo2"><i class="fa fa-photo"></i></a>
                    </span>
                      </div>
                    </td>
                  </tr>
                  <tr>
                    <td>Phone</td>
                    <td>
                      <input type="text" name="phoneLinks1" class="form-control" value="<?php echo $jktpl["phoneLinks1_canvas_tpl"]; ?>"/>
                    </td>
                  </tr>
                  <tr>
                    <td>Email</td>
                    <td>
                      <input type="text" name="emailLinks1" class="form-control" value="<?php echo $jktpl["emailLinks1_canvas_tpl"]; ?>"/>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Mini Navbar Content - Social Icons</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table table-striped v-text-center">
                  <tr>
                    <td><strong>Faceebook</strong></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="facebookShow" value="1" <?php if ($jktpl["facebookShow_canvas_tpl"] == 1) { ?> checked="checked"<?php } ?> /> Show
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="facebookShow" value="0" <?php if ($jktpl["facebookShow_canvas_tpl"] == 0) { ?> checked="checked"<?php } ?> /> Hide
                        </label>
                      </div>
                    </td>
                    <td>Links</td>
                    <td>
                      <input type="text" name="facebookLinks" class="form-control" value="<?php echo $jktpl["facebookLinks_canvas_tpl"]; ?>"/>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Twitter</strong></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="twitterShow" value="1" <?php if ($jktpl["twitterShow_canvas_tpl"] == 1) { ?> checked="checked"<?php } ?> /> Show
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="twitterShow" value="0" <?php if ($jktpl["twitterShow_canvas_tpl"] == 0) { ?> checked="checked"<?php } ?> /> Hide
                        </label>
                      </div>
                    </td>
                    <td>Links</td>
                    <td>
                      <input type="text" name="twitterLinks" class="form-control" value="<?php echo $jktpl["twitterLinks_canvas_tpl"]; ?>"/>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Google Plus</strong></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="googleShow" value="1" <?php if ($jktpl["googleShow_canvas_tpl"] == 1) { ?> checked="checked"<?php } ?> /> Show
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="googleShow" value="0" <?php if ($jktpl["googleShow_canvas_tpl"] == 0) { ?> checked="checked"<?php } ?> /> Hide
                        </label>
                      </div>
                    </td>
                    <td>Links</td>
                    <td>
                      <input type="text" name="googleLinks" class="form-control" value="<?php echo $jktpl["googleLinks_canvas_tpl"]; ?>"/>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Instagram</strong></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="instagramShow" value="1" <?php if ($jktpl["instagramShow_canvas_tpl"] == 1) { ?> checked="checked"<?php } ?> /> Show
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="instagramShow" value="0" <?php if ($jktpl["instagramShow_canvas_tpl"] == 0) { ?> checked="checked"<?php } ?> /> Hide
                        </label>
                      </div>
                    </td>
                    <td>Links</td>
                    <td>
                      <input type="text" name="instagramLinks" class="form-control" value="<?php echo $jktpl["instagramLinks_canvas_tpl"]; ?>"/>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Phone</strong></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="phoneShow" value="1" <?php if ($jktpl["phoneShow_canvas_tpl"] == 1) { ?> checked="checked"<?php } ?> /> Show
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="phoneShow" value="0" <?php if ($jktpl["phoneShow_canvas_tpl"] == 0) { ?> checked="checked"<?php } ?> /> Hide
                        </label>
                      </div>
                    </td>
                    <td>Phone Number</td>
                    <td>
                      <input type="text" name="phoneLinks" class="form-control" value="<?php echo $jktpl["phoneLinks_canvas_tpl"]; ?>"/>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>Email</strong></td>
                    <td>
                      <div class="radio">
                        <label class="checkbox-inline">
                          <input type="radio" name="emailShow" value="1" <?php if ($jktpl["emailShow_canvas_tpl"] == 1) { ?> checked="checked"<?php } ?> /> Show
                        </label>
                        <label class="checkbox-inline">
                          <input type="radio" name="emailShow" value="0" <?php if ($jktpl["emailShow_canvas_tpl"] == 0) { ?> checked="checked"<?php } ?> /> Hide
                        </label>
                      </div>
                    </td>
                    <td>Email</td>
                    <td>
                      <input type="text" name="emailLinks" class="form-control" value="<?php echo $jktpl["emailLinks_canvas_tpl"]; ?>"/>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="cmsPage2">
        <div class="row">
          <div class="col-md-12">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Section</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table v-text-center">
                  <tr>
                    <td>Select Plugin</td>
                    <td>
                      <select name="cb1" id="cb1" class="form-control selectpicker" data-live-search="true" data-size="5">
                        <?php if (isset($JAK_HOOKS) && is_array($JAK_HOOKS)) foreach ($JAK_HOOKS as $v) { ?>
                          <option value="<?php echo $v["id"]; ?>"<?php if (is_numeric($jktpl["section_canvas_tpl"]) && $jktpl["section_canvas_tpl"] == $v["id"]) echo ' selected="selected"'; ?>><?php echo $v["name"]; ?></option>
                        <?php } ?>
                      </select>
                    </td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="cmsPage3">
        <div class="row">
          <div class="col-md-4">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Footer Block 1</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table">
                  <tr>
                    <td></td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Footer Block 2</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table">
                  <tr>
                    <td></td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Footer Block 3</h3>
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div><!-- /.box-header -->
              <div class="box-body">
                <table class="table">
                  <tr>
                    <td></td>
                  </tr>
                </table>
              </div>
              <div class="box-footer">
                <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="cmsPage4">
        <div class="row">
          <div class="col-md-12">

              <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">Editace Souboru</h3>
                  <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table class="table">
                    <tr <?php if (!$JAK_FILECONTENT) { ?> class="hidden"<?php } ?>>
                      <td><h4>File <small><strong><?php echo $JAK_FILEURL; ?></strong></small></h4></td>
                    </tr>
                    <?php if ($JAK_FILECONTENT) { ?>
                      <tr>
                        <td>
                          <label for="jak_filecontent"><?php echo $tl["general"]["g54"]; ?></label>
                          <div id="htmleditor"></div>
                          <textarea name="jak_filecontent" id="jak_filecontent" class="form-control hidden"><?php echo $JAK_FILECONTENT; ?></textarea>
                        </td>
                      </tr>
                    <?php } ?>
                  </table>
                </div>
                <div class="box-footer">
                  <button type="submit" name="save" class="btn btn-primary pull-right"><?php echo $tl["general"]["g20"]; ?></button>
                </div>
              </div>

              <input type="hidden" name="jak_file" value="<?php echo $JAK_FILEURL; ?>"/>

          </div>
        </div>
      </div>

    </div>

  </form>

  <script src="js/ace/ace.js" type="text/javascript"></script>
  <script type="text/javascript">

    /* ACE Editor
     ========================================= */
    var htmlefACE = ace.edit("htmleditor");
    htmlefACE.setTheme("ace/theme/<?php echo $jkv["acetheme"]; ?>"); // Theme chrome, monokai
    htmlefACE.session.setUseWrapMode(true);
    htmlefACE.session.setWrapLimitRange(<?php echo $jkv["acewraplimit"] . ',' . $jkv["acewraplimit"]; ?>);
    htmlefACE.setOptions({
      // session options
      mode: "ace/mode/<?php echo $acemode;?>",
      tabSize: <?php echo $jkv["acetabSize"]; ?>,
      useSoftTabs: true,
      highlightActiveLine: <?php echo $jkv["aceactiveline"]; ?>,
      // renderer options
      showInvisibles: <?php echo $jkv["aceinvisible"]; ?>,
      showGutter: <?php echo $jkv["acegutter"]; ?>,
    });

    texthtmlef = $("#jak_filecontent").val();
    htmlefACE.session.setValue(texthtmlef);

    /* Submit Form
     ========================================= */
    $('form').submit(function () {
      $("#jak_filecontent").val(htmlefACE.getValue());
    });

  </script>

  <script type="text/javascript">
    /* Other config
     ========================================= */
    $(document).ready(function () {

      /* Bootstrap Tab Activation */
      $('#cmsTab a').click(function (e) {
        e.preventDefault();
        $(this).tab('show');
      });

    });
  </script>