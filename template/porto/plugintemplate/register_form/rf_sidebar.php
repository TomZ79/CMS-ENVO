<aside class="sidebar">
  <?php if (!ENVO_USERID) {
    if (isset($_SESSION['password_recover'])) {

      echo '<div class="alert bg-success"><h4>' . $tl['login']['l7'] . '</h4></div>';

    } ?>

    <h4><?= $tl["general"]["g146"] ?></h4>
    <?php if (isset($errorlo) && !empty($errorlo)) { ?>
      <div class="alert bg-danger">
        <?php if (isset($errorlo["e"])) echo $errorlo["e"]; ?>
      </div>
    <?php } ?>
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
      <div class="form-group<?php if (isset($errorlo["e"])) echo " has-error"; ?>">
        <label class="control-label" for="username"><?= $tl["login"]["l1"] ?></label>
        <input type="text" name="envoU" id="username" class="form-control"
          value="<?php if (isset($_REQUEST["envoU"])) echo $_REQUEST["envoU"]; ?>"
          placeholder="<?= $tl["login"]["l1"] ?>"/>
      </div>
      <div class="form-group<?php if (isset($errorlo["e"])) echo " has-error"; ?>">
        <label class="control-label" for="password"><?= $tl["login"]["l2"] ?></label>
        <input type="password" name="envoP" id="password" class="form-control" value=""
          placeholder="<?= $tl["login"]["l2"] ?>"/>
      </div>
      <div class="form-group">
        <div class="checkbox">
          <label>
            <input type="checkbox" name="lcookies" value="1"> <?= $tl["notification"]["n7"] ?>
          </label>
        </div>
        <button type="submit" name="login"
          class="btn btn-success pull-right"><?= $tl["general"]["g146"] ?></button>
        <div class="clearfix"></div>
      </div>
    </form>
    <h4><?= $tl["title"]["t14"] ?></h4>
    <?php if (isset($errorfp) && !empty($errorfp)) { ?>
      <div class="alert bg-danger"><?php if (isset($errorfp["e"])) echo $errorfp["e"]; ?></div><?php } ?>
    <form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
      <div class="form-group<?php if (isset($errorfp["e"])) echo " has-error"; ?>">
        <label class="control-label" for="email"><?= $tl["login"]["l5"] ?></label>
        <input type="email" name="envoE" id="email" class="form-control" value=""
          placeholder="<?= $tl["login"]["l5"] ?>"/>
      </div>
      <button type="submit" name="forgotP"
        class="btn btn-warning pull-right"><?= $tl["general"]["g178"] ?></button>
      <div class="clearfix"></div>
    </form>

  <?php } else { ?>
    <h4><?= str_replace("%s", $ENVO_USERNAME, $tl["general"]["g8"]) ?></h4>
    <div class="about">
      <!-- Author Photo -->
      <div class="author-photo">
        <img src="<?= BASE_URL . ENVO_FILES_DIRECTORY . '/userfiles' . $envouser -> getVar("picture") ?>"
          alt="avatar">
      </div>
      <div class="about-bubble">
        <blockquote>
          <!-- Author Info -->
          <cite class="author-info">
            - <?= $tl["contact"]["c1"]; ?>: <?= $envouser -> getVar("name") ?><br>
            - <?= $tl["contact"]["c2"]; ?>: <?= $envouser -> getVar("email") ?>
          </cite>
        </blockquote>
        <div class="sprite arrow-speech-bubble"></div>
      </div>
    </div>
    <p><a href="<?= $P_USR_LOGOUT ?>" class="btn btn-danger pull-right"><?= $tl["title"]["t6"] ?></a>
    </p>
    <div class="clearfix"></div>
  <?php } ?>
</aside>