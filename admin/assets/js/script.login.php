<script type="text/javascript">
  $(function () {
    <?php if ($errorfp) { ?>
    $(".loginF").hide();
    $(".forgotP").removeClass("hide");
    $(".forgotP").addClass("shake");
    <?php } if ($ErrLogin) { ?>
    $(".loginF").addClass("shake");
    <?php } ?>
  })
</script>
