<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/header.php'; ?>

<?php if (JAK_ASACCESS) $apedit = BASE_URL . 'admin/index.php?p=faq&amp;sp=setting'; ?>

  <div class="row">
    <div class="col-sm-12">
      <div class="accordion">
        <div class="panel-group" id="accordion1">

        <?php if (isset($JAK_FAQ_ALL) && is_array($JAK_FAQ_ALL)) foreach ($JAK_FAQ_ALL as $v) { ?>



          <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">
                <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion1" href="#collapse<?php echo $v["id"]; ?>">
                  <?php echo $v["title"]; ?>
                </a>
              </h3>
            </div>
            <div id="collapse<?php echo $v["id"]; ?>" class="panel-collapse collapse">
              <div class="panel-body">
                <h4><?php echo $tlf["faq_frontend"]["faq"]; ?></h4>
                <p>
                  <?php echo $v["contentshort"]; ?>
                  <a href="<?php echo $v["parseurl"]; ?>" class="pull-right"><?php echo $tlf["faq_frontend"]["faq1"]; ?></a>
                </p>

                <div class="clearfix"></div>
                <div class="pull-right">

                  <?php if (JAK_ASACCESS) { ?>

                    <a href="<?php echo BASE_URL; ?>admin/index.php?p=faq&amp;sp=edit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["general"]["g"]; ?>" class="btn btn-default btn-xs jaktip">
                      <i class="fa fa-pencil"></i>
                    </a>
                    <a class="btn btn-default btn-xs jaktip quickedit" href="<?php echo BASE_URL; ?>admin/index.php?p=faq&amp;sp=quickedit&amp;id=<?php echo $v["id"]; ?>" title="<?php echo $tl["general"]["g176"]; ?>">
                      <i class="fa fa-edit"></i>
                    </a>

                  <?php } ?>

                  <a href="<?php echo $v["parseurl"]; ?>" class="btn btn-color btn-xs"><?php echo $tl["general"]["g3"]; ?></a>

                </div>

              </div>
            </div>
          </div>

        <?php } ?>

      </div>
      </div>
    </div>
  </div>

<?php if ($JAK_PAGINATE) echo $JAK_PAGINATE; ?>

<?php include_once APP_PATH . 'template/' . ENVO_TEMPLATE . '/footer.php'; ?>