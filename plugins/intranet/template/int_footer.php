</div>
<!-- /main area -->
</div>
<!-- /content panel -->
<!-- bottom footer -->
<footer class="content-footer hidden-xs">
  <nav class="footer-right">
    <ul class="nav">
      <li>
        <a href="javascript:;" class="scroll-up">
          <i class="fa fa-angle-up"></i>
        </a>
      </li>
    </ul>
  </nav>
</footer>
<!-- /bottom footer -->
</div>

<!-- JS and PLUGIN
  ================================================== -->
<script src="<?php echo $SHORT_PLUGIN_URL; ?>scripts/helpers/modernizr.js"></script>
<script src="/assets/plugins/jquery/jquery-2.2.4.min.js?=v2.2.4"></script>
<script src="/assets/plugins/bootstrapv3/js/bootstrap.min.js"></script>
<script src="<?php echo $SHORT_PLUGIN_URL; ?>vendor/fastclick/lib/fastclick.js"></script>
<script src="<?php echo $SHORT_PLUGIN_URL; ?>vendor/perfect-scrollbar/js/perfect-scrollbar.jquery.js"></script>
<script src="<?php echo $SHORT_PLUGIN_URL; ?>scripts/helpers/smartresize.js"></script>
<script src="<?php echo $SHORT_PLUGIN_URL; ?>scripts/constants.js"></script>
<script src="<?php echo $SHORT_PLUGIN_URL; ?>scripts/main.js"></script>
<script src="/assets/plugins/fancybox/3.0/js/jquery.fancybox.min.js"></script>

<?php if ($page1 == 'house') { ?>

<script src="https://maps.google.com/maps/api/js?sensor=true."></script>
<script>

  (function() {
    var map, mapOptions, marker, position;

    position = new google.maps.LatLng(<?php echo $envo_house_latitude . ',' . $envo_house_longitude; ?>);

    mapOptions = {
      zoom: 17,
      center: position,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    };

    map = new google.maps.Map($('#google-container')[0], mapOptions);

    marker = new google.maps.Marker({
      position: position,
      map: map
    });

    marker.setMap(map);

  }).call(this);


</script>

<?php } ?>

</body>

</html>