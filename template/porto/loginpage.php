<?php

if (!ENVO_USERID) {

  if (isset($_SESSION['password_recover'])) {

    echo '<div class="alert bg-success"><h4>' . $tl['login']['l7'] . '</h4></div>';

  }

  ?>

  <div class="loginF">
    <h3><?=$tl["general"]["g146"]?></h3>

    <?php if (isset($errorlo)) { ?>
      <div class="alert bg-danger"><?=$errorlo["e"]?></div>
    <?php } ?>

    <form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
      <div class="form-group<?php if ($errorlo) echo " has-error"; ?>">
        <label class="control-label" for="username"><?=$tl["login"]["l1"]?></label>
        <input type="text" class="form-control" name="envoU" id="username"
          value="<?php if (isset($_REQUEST["envoU"])) echo $_REQUEST["envoU"]; ?>"
          placeholder="<?=$tl["login"]["l1"]?>"/>
      </div>
      <div class="form-group<?php if ($errorlo) echo " has-error"; ?>">
        <label class="control-label" for="password"><?=$tl["login"]["l2"]?></label>
        <input type="password" class="form-control" name="envoP" id="password"
          placeholder="<?=$tl["login"]["l2"]?>"/>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" name="lcookies" value="1"> <?=$tl["notification"]["n7"]?>
        </label>
      </div>
      <button type="submit" name="login"
        class="btn btn-success btn-block"><?=$tl["general"]["g146"]?></button>
      <input type="hidden" name="home" value="0"/>
    </form>

  </div>

  <div class="forgotP">
    <h3><?=$tl["title"]["t14"]?></h3>

    <?php if (isset($errorfp)) { ?>
      <div class="alert bg-danger"><?=$errorfp["e"]?></div>
    <?php } ?>

    <form action="<?=$_SERVER['REQUEST_URI']?>" method="post">
      <div class="form-group<?php if (isset($errorfp)) echo " has-error"; ?>">
        <label class="control-label" for="email"><?=$tl["login"]["l5"]?></label>
        <input type="text" class="form-control" name="envoE" id="email" class="form-control"
          placeholder="<?=$tl["login"]["l5"]?>"/>
      </div>
      <button type="submit" name="forgotP" class="btn btn-info btn-block"><?=$tl["general"]["g178"]?></button>
    </form>
  </div>

<?php } else { ?>

  <h3><?=str_replace("%s", $ENVO_USERNAME, $tl["general"]["g8"])?></h3>
  <p><a href="<?=$P_USR_LOGOUT?>" class="btn btn-danger btn-block"><?=$tl["title"]["t6"]?></a></p>

<?php } ?>