<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=blog&amp;sp=setting'; ?>

<?php if (isset($JAK_BLOG_ALL) && is_array($JAK_BLOG_ALL)) foreach ($JAK_BLOG_ALL as $v) { ?>
  <article class="post box mb">
    <div class="postPic">
      <?php
      // Image is available so display it or go standard
      if ($v['previmg']) {
        echo '<a href="' . $v["parseurl"] . '"><img src="' . $v["previmg"] . '" alt="' . $v['title'] . '" class="responsive mb"></a>';
      }
      ?>
    </div>
    <div class="feature-box media-left">
      <div class="post-date">
        <?php
        //set locale,
        setlocale(LC_ALL, $site_locale);
        //set the date to be converted
        $mydate = $v["date-time"];
        //convert date to month name
        $month_name = ucfirst(strftime("%B", strtotime($mydate)));
        ?>
        <span class="date-day"><?php echo date("d", strtotime($mydate)); ?></span>
        <span class="date-month"><?php echo $month_name; ?></span>
      </div>
      <div class="feature-box-content">
        <h3><a href="<?php echo $v["parseurl"]; ?>"><?php echo jak_cut_text($v["title"], 100, ""); ?></a></h3>
        <ul class="entry-meta">
          <li>
            <i class="icon-clock-1"></i> <?php echo $v["created"]; ?>
          </li>
          <li>
            <i class="icon-eye"></i> <?php echo $tl["global_text"]["gtxt"] . ' ' .  $v["hits"]; ?>
          </li>
        </ul>
        <p><?php echo jak_cut_text($v['content'], 200, '....') ?></p>

        <p class="pull-right">
          <a href="<?php echo $v["parseurl"]; ?>">
            <?php echo $tlblog["blog_frontend"]["blog"]; ?>
            <i class="icon-right-open"></i>
          </a>
        </p>
      </div>
      <!-- Post Info - Admin -->
      <?php if (JAK_ASACCESS) { ?>
        <div class="col-md-12">
          <div class="system-icons">
            <hr class="mt-small mb-small">
            <div class="pull-right">
              <a href="<?php echo BASE_URL; ?>admin/index.php?p=blog&amp;sp=edit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn1"]; ?>" class="btn btn-info btn-xs jaktip"><i class="icon-pencil"></i></a>

              <a href="<?php echo BASE_URL; ?>admin/index.php?p=blog&amp;sp=quickedit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["button"]["btn2"]; ?>" class="btn btn-info btn-xs jaktip quickedit"><i class="icon-edit"></i></a>
            </div>
          </div>
        </div>
      <?php } ?>
      <!-- Post Info -->
    </div>

  </article>
<?php } ?>

<?php if ($JAK_PAGINATE) echo $JAK_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>