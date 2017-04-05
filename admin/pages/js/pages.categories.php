<script src="assets/js/catorder.js" type="text/javascript"></script>
<script src="assets/js/slug.js" type="text/javascript"></script>

<script type="text/javascript">
  $(document).ready(function () {

    $("#jak_name").keyup(function () {
      // Checked, copy values
      $("#jak_varname").val(jakSlug($("#jak_name").val()));
    });

    /* Bootstrap Icon Picker */
    <?php
    if (isset($JAK_FORM_DATA["catimg"])) {
      $str = $JAK_FORM_DATA["catimg"];

      if (strpos($str, 'glyphicons ') !== false) {
        $categoryimg = str_replace('glyphicons ', '', $JAK_FORM_DATA["catimg"]);
      } else {
        $categoryimg = str_replace('fa ', '', $JAK_FORM_DATA["catimg"]);
      }
    } else {
      $categoryimg = 'fa-font';
    }
    ?>

    $('.iconpicker').iconpicker({
      arrowClass: 'btn-info',
      icon: '<?php echo $categoryimg; ?>',
      iconset: 'fontawesome',
      searchText: '<?php echo $tl["placeholder"]["p4"]; ?>',
      labelFooter: '<?php echo $tl["global_text"]["globaltxt18"]; ?>',
      arrowPrevIconClass: 'fa fa-chevron-left',
      arrowNextIconClass: 'fa fa-chevron-right',
      selectedClass: 'btn-success',
      unselectedClass: '',
      rows: 5,
      cols: 8
    });

    $('.iconpicker').on('change', function (e) {
      $("#jak_img").val('fa ' + e.icon);
    });

    $('.iconpicker1').iconpicker({
      arrowClass: 'btn-info',
      icon: '<?php echo $categoryimg; ?>',
      iconset: 'glyphicons',
      searchText: '<?php echo $tl["placeholder"]["p4"]; ?>',
      labelFooter: '<?php echo $tl["global_text"]["globaltxt18"]; ?>',
      arrowPrevIconClass: 'fa fa-chevron-left',
      arrowNextIconClass: 'fa fa-chevron-right',
      selectedClass: 'btn-success',
      unselectedClass: '',
      rows: 5,
      cols: 8
    });

    $('.iconpicker1').on('change', function (e) {
      $("#jak_img").val('glyphicons ' + e.icon);
    });

    /* Copy Value */
    $("#copy1").click(function () {
      $("#jak_editor_light_meta_desc").val($("#content").val());
    });
  });
</script>
