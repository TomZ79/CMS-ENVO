<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_header.php'; ?>

  <div class="col-md-12" style="margin: 10px 0 50px 0;">

    <div class="row 2col">
      <div class="col-md-3 col-sm-6 spacing-bottom-sm spacing-bottom">
        <div class="tiles blue added-margin">
          <div class="tiles-body">
            <div class="tiles-title"> BYTOVÉ DOMY V DATABÁZI </div>
            <div class="heading">
              <span class="animate-number" data-value="<?php echo $ENVO_COUNTS; ?>" data-animation-duration="1200">0</span>
            </div>
            <div class="progress transparent progress-small no-radius">
              <div class="progress-bar progress-bar-white animate-progress-bar" data-percentage="<?php echo $ENVO_PERCENT; ?>"></div>
            </div>
            <div class="description">
              <span class="text-white mini-description ">Počet domů <span class="blend">uložených v databázi</span></span>
            </div>
          </div>
        </div>
      </div>

    </div>

    <?php if ($ENVO_MODULES) { ?>


    <?php } ?>

  </div>

<?php include_once $BASE_PLUGIN_URL_TEMPLATE . 'int_footer.php'; ?>