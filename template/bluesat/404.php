<?php include_once APP_PATH.'template/bluesat/header.php';?>

<section class="page-not-found">
  <div class="row">
    <div class="col-md-12 text-center">
      <div class="page-not-found-main">
        <h1 class="text-uppercase">Někde nastala chyba!</h1>
        <h2 id="error404"></h2>
        <p>Oops! Omlouváme se, ale požadovaná stránka nebyla nalezena.</p>
      </div>
    </div>
  </div>
</section>
  <script type="text/javascript">

    $('#error404').jQuerySimpleCounter({
      start:  0,
      end:    404,
      duration: 4000
    });
  </script>
<?php include_once APP_PATH.'template/bluesat/footer.php';?>