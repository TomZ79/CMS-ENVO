<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=gallery&amp;sp=setting'; ?>

<?php if ($PAGE_CONTENT) echo $PAGE_CONTENT; ?>

<?php if ($JAK_GALLERY_CAT) {
  if (isset($JAK_GALLERY_CAT) && is_array($JAK_GALLERY_CAT)) foreach ($JAK_GALLERY_CAT as $carray) {

    if ($carray["catparent"] != 0)
      $catexistid = array('catparent' => $carray["catparent"]);

  } ?>



<?php } ?>

  <!-- Portfolio Items
  ============================================= -->
  <div id="portfolio" class="portfolio grid-container portfolio-6 portfolio-nomargin clearfix">


    <?php if (isset($JAK_GALLERY_ALL) && is_array($JAK_GALLERY_ALL)) foreach ($JAK_GALLERY_ALL as $v) { ?>

      <?php if ($v["paththumb"]) { ?>
        <article class="portfolio-item pf-media pf-icons">
          <div class="portfolio-image">
            <a href="<?php echo BASE_URL . $JAK_UPLOAD_PATH_BASE . $v["pathbig"] ?>">
              <img src="<?php echo BASE_URL . $JAK_UPLOAD_PATH_BASE . $v["paththumb"] ?>" alt="Open Imagination">
            </a>
            <div class="portfolio-overlay">
              <a href="<?php echo BASE_URL . $JAK_UPLOAD_PATH_BASE . $v["pathbig"] ?>" class="left-icon" data-lightbox="image"><i class="icon-line-plus"></i></a>
              <a href="<?php echo $v["parseurl"]; ?>" class="right-icon"><i class="icon-line-ellipsis"></i></a>
            </div>
          </div>
        </article>

      <?php } ?>


      <?php if ($v["paththumb"]) { ?>
        <figure class="thumb" title="<?php echo sprintf($tlgal["gallery"]["d4"], $v["created"]);?>">
          <a <?php if ($jkv["galleryopenattached"]) { echo 'href="'.BASE_URL.$JAK_UPLOAD_PATH_BASE.$v["pathbig"].'" data-lightbox="g"'; } else { echo 'href="'.$v["parseurl"].'"';}?>><img src="<?php echo BASE_URL.$JAK_UPLOAD_PATH_BASE.$v["paththumb"];?>" class="img-thumbnail" alt="<?php echo $v["title"];?>" /></a>
          <?php if ($jkv["galleryopenattached"]) { ?>
            <a href="<?php echo $v["parseurl"];?>" class="btn btn-xs btn-default img-open"><i class="fa fa-eye"></i></a>
          <?php } ?>
        </figure>
      <?php } ?>

    <?php } ?>

    <?php

    ?>
  </div><!-- #portfolio end -->


<?php if (!empty($page2) && $usrpupload) { ?>

  <hr>
  <form class="dropzone" id="cUploadDrop">
    <div class="fallback">
      <input name="file" type="file" multiple/>
    </div>
    <input type="hidden" name="catid" value="<?php echo $page2; ?>"/>
  </form>

  <script type="text/javascript">
    $('head').append('<link rel="stylesheet" href="\/plugins\/gallery\/css\/dropzone.css">');
  </script>

  <script type="text/javascript" src="/plugins/gallery/js/dropzone.js"></script>

  <script type="text/javascript">
    //dropzone config
    Dropzone.options.cUploadDrop = {
      dictResponseError: "SERVER ERROR",
      paramName: "Filedata", // The name that will be used to transfer the file
      maxFilesize: <?php echo $jkv["galleryimgsize"];?>,
      maxFiles: 5,
      acceptedFiles: "image/*",
      url: "/plugins/gallery/uploaderc.php",
      init: function () {
        this.on("complete", function (file) {
          if (this.getUploadingFiles().length === 0 && this.getQueuedFiles().length === 0) {
            //location.reload();
          }
        });
      }

    };
  </script>

  <div class="clearfix"></div>

<?php }
if ($JAK_PAGINATE) echo $JAK_PAGINATE; ?>

  <script type="text/javascript">$(document).ready(function () {
      var instanceG = $('a[data-lightbox="g"]').imageLightbox();
    });</script>

<?php include_once APP_PATH . 'template/' . $jkv["sitestyle"] . '/footer.php'; ?>