<aside class="nav-sidebar hidden-xs">

  <?php if (!ENVO_USERID) { ?>

    <div>
      <h4><?=$tl["lform_text"]["lformt"]?></h4>

      <form action="<?=$_SERVER['REQUEST_URI']?>" method="post">

        <div class="form-group<?php if ($errorlo) echo " has-error"; ?>">
          <label><?=$tl["lform_text"]["lformt1"]?></label>
          <input type="text" class="form-control no-radius" name="loginusername" id="loginusername" value="<?php if (isset($_REQUEST["loginusername"])) echo $_REQUEST["loginusername"]; ?>" placeholder="<?=$tl["placeholder"]["plc3"]?>" data-msg-required="Zadejte uživatelské jméno" required/>
        </div>

        <div class="form-group<?php if ($errorlo) echo " has-error"; ?>">
          <label class="control-label" for="password"><?= $tl["login"]["l2"] ?></label>
          <input type="password" class="form-control no-radius" name="loginpassword" id="loginpassword" placeholder="<?=$tl["placeholder"]["plc4"]?>" data-msg-required="Zadejte heslo" required>
        </div>

        <div class="checkbox mb-md">
          <input type="checkbox" id="rememberme" name="rememberme" class="css-checkbox">
          <label for="rememberme" class="css-label">
            <?=$tl["lform_text"]["lformt3"]?>
          </label>
        </div>

        <button type="submit" id="login" name="login" class="btn btn-primary btn-block"><?= $tl["button"]["btn8"] ?></button>

      </form>
    </div>

  <?php } else { ?>

    <h5><?=str_replace("%s", $ENVO_USERNAME, $tl["lpage_text"]["lpaget"])?></h5>

    <div>
      <a href="<?=$P_USR_LOGOUT?>" class="btn btn-danger btn-block" data-loading-text="Odesílání...">
        <?=$tl["button"]["btn9"]?>
      </a>
    </div>

    <hr>

  <?php } ?>

</aside>
