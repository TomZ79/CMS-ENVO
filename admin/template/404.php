<?php include "header.php"; ?>

<section class="content">
  <div class="error-page">
    <h2 class="headline text-warning-800"> 404</h2>
    <div class="error-content">
      <h3><i class="fa fa-warning text-warning-800"></i> <?php echo $tl["error"]["404"]; ?></h3>
      <p><?php echo str_replace("%s", BASE_URL, $tl["error"]["404_text"]); ?></p>
    </div>
  </div>
</section>

<?php include "footer.php"; ?>