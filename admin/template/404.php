<?php include_once "header.php"; ?>

<!-- Main content -->
<section class="content">
  <div class="error-page">
    <h2 class="headline text-warning-800"> 404</h2>
    <div class="error-content">
      <h3><i class="fa fa-warning text-warning-800"></i> <?php echo $tl["error"]["404"]; ?></h3>
      <p>
        We could not find the page you were looking for.
        Meanwhile, you may <a href="<?php echo BASE_URL; ?>">return to home</a>.
      </p>
    </div>
  </div>
</section>

<?php include_once "footer.php"; ?>