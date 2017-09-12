<?php include "header.php"; ?>

  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-12">
      <!-- small box -->
      <div class="dashboard-box bg-success">
        <div class="inner">
          <h3><span class="counter" data-counterend="<?php echo $totalhits; ?>"><?php echo $totalhits; ?></span></h3>
          <p><?php echo $tl["dashb_box_stats"]["dbbs1"]; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-bar-chart"></i>
        </div>
        <a href="index.php?p=page" class="dashboard-box-footer">
          <?php echo $tl["dashb_box_stats"]["dbbs"]; ?>
          <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-12">
      <!-- small box -->
      <div class="dashboard-box bg-complete-dark">
        <div class="inner">
          <h3>
            <span class="counter" data-counterend="<?php echo $JAK_COUNTS["searchClog"]; ?>"><?php echo $JAK_COUNTS["searchClog"]; ?></span>
          </h3>
          <p><?php echo $tl["dashb_box_stats"]["dbbs2"]; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-search"></i>
        </div>
        <a href="index.php?p=searchlog" class="dashboard-box-footer"><?php echo $tl["dashb_box_stats"]["dbbs"]; ?>
          <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-12">
      <!-- small box -->
      <div class="dashboard-box bg-warning">
        <div class="inner">
          <h3>
            <span class="counter" data-counterend="<?php echo $JAK_COUNTS["pluginCtotal"]; ?>"><?php echo $JAK_COUNTS["pluginCtotal"]; ?></span>
          </h3>
          <p><?php echo $tl["dashb_box_stats"]["dbbs3"]; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-plug"></i>
        </div>
        <a href="index.php?p=plugins" class="dashboard-box-footer"><?php echo $tl["dashb_box_stats"]["dbbs"]; ?>
          <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-12">
      <!-- small box -->
      <?php if (JAK_TAGS) { ?>
        <div class="dashboard-box bg-danger">
          <div class="inner">
            <h3>
              <span class="counter" data-counterend="<?php echo $JAK_COUNTS["tagsCtotal"]; ?>"><?php echo $JAK_COUNTS["tagsCtotal"]; ?></span>
            </h3>
            <p><?php echo $tl["dashb_box_stats"]["dbbs4"]; ?></p>
          </div>
          <div class="icon">
            <i class="fa fa-tags"></i>
          </div>
          <a href="index.php?p=tags" class="dashboard-box-footer"><?php echo $tl["dashb_box_stats"]["dbbs"]; ?>
            <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      <?php } else { ?>
        <div class="dashboard-box bg-info">
          <div class="inner">
            <h3>
              <span class="counter" data-counterend="<?php echo $JAK_COUNTS["hookCtotal"]; ?>"><?php echo $JAK_COUNTS["hookCtotal"]; ?></span>
            </h3>
            <p><?php echo $tl["dashb_box_stats"]["dbbs5"]; ?></p>
          </div>
          <div class="icon">
            <i class="fa fa-flash"></i>
          </div>
          <a href="index.php?p=plugins&sp=hooks" class="dashboard-box-footer"><?php echo $tl["dashb_box_stats"]["dbbs"]; ?>
            <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- Content -->
  <ul class="nav nav-tabs nav-tabs-responsive nav-tabs-fillup" role="tablist">
    <li role="presentation" class="active">
      <a href="#cmsPage1" id="cmsPage1-tab" role="tab" data-toggle="tab" aria-controls="cmsPage1" aria-expanded="true">
        <span class="text"><?php echo $tl["dashb_section_tab"]["dashbtab"]; ?></span>
      </a>
    </li>
    <li role="presentation" class="next">
      <a href="#cmsPage2" id="cmsPage2-tab" role="tab" data-toggle="tab" aria-controls="cmsPage2" aria-expanded="true">
        <span class="text"><?php echo $tl["dashb_section_tab"]["dashbtab1"]; ?></span>
      </a>
    </li>
    <li role="presentation">
      <a href="#cmsPage3" id="cmsPage3-tab" role="tab" data-toggle="tab" aria-controls="cmsPage3" aria-expanded="true">
        <span class="text"><?php echo $tl["dashb_section_tab"]["dashbtab2"]; ?></span>
      </a>
    </li>
    <?php if (isset($JAK_HOOK_ADMIN_INDEX)) { ?>
      <li role="presentation">
        <a href="#cmsPage4" role="tab" id="cmsPage4-tab" data-toggle="tab" aria-controls="cmsPage4">
          <span class="text"><?php echo $tl["dashb_section_tab"]["dashbtab3"]; ?></span>
        </a>
      </li>
    <?php } ?>
  </ul>

  <div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="cmsPage1" aria-labelledby="cmsPage1-tab">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('i', '', 'fa fa-pie-chart');
              echo $Html->addTag('h3', $tl["dashb_box_title"]["dbbt2"], 'box-title');
              ?>

            </div>
            <div class="box-body no-padding">

              <?php
              // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
              echo $Html->addDiv('', 'chart_total', array('class' => 'charts'));
              ?>

            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="box box-success">
            <div class="box-header">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('i', '', 'fa fa-pie-chart');
              echo $Html->addTag('h3', $tl["dashb_box_title"]["dbbt2"], 'box-title');
              ?>

            </div>
            <div class="box-body no-padding">

              <?php
              // Add Html Element -> addDiv (Arguments: $value, $id, optional assoc. array)
              echo $Html->addDiv('', 'page_total', array('class' => 'charts'));
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cmsPage2" aria-labelledby="cmsPage2-tab">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('i', '', 'fa fa-pie-chart');
              echo $Html->addTag('h3', $tl["dashb_box_title"]["dbbt5"], 'box-title');
              ?>

            </div>
            <div class="box-body no-padding table-responsive">

              <?php
              include "analytic.php";
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="cmsPage3" aria-labelledby="cmsPage3-tab">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-success">
            <div class="box-header">

              <?php
              // Add Html Element -> addTag (Arguments: tag, text, class, optional assoc. array)
              echo $Html->addTag('i', '', 'fa fa-paperclip');
              echo $Html->addTag('h3', $tl["dashb_box_title"]["dbbt1"], 'box-title');
              ?>

            </div>
            <div class="box-body">
              <ul class="todoList">
                <?php if (isset($todos) && is_array($todos)) foreach ($todos as $item) {
                  echo $item;
                } ?>
              </ul>
            </div>
            <div class="box-footer clearfix no-border">

              <?php
              // Add Html Element -> addAnchor (Arguments: href_link, text, id, class, optional assoc. array)
              echo $Html->addAnchor('#', $tl["button"]["btn"], 'addButton', 'btn btn-default btodo pull-right');
              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
    <?php if (isset($JAK_HOOK_ADMIN_INDEX)) { ?>
      <div role="tabpanel" class="tab-pane fade" id="cmsPage4" aria-labelledby="cmsPage4-tab">
        <div class="row">
          <div class="col-md-12">
            <?php
            if (isset($JAK_HOOK_ADMIN_INDEX) && is_array($JAK_HOOK_ADMIN_INDEX)) foreach ($JAK_HOOK_ADMIN_INDEX as $hspi) {
              include_once APP_PATH . $hspi['phpcode'];
            }
            ?>
          </div>
        </div>
      </div>
    <?php } ?>
  </div>

  <div class="row padding-15 m-t-30">
    <div class="container-fluid">
      <div class="text-center">
        <p>

          <span><strong><?php echo $tl["dashb_box_content"]["dbbc"]; ?> : </strong><?php echo $WEBS; ?> | </span>
          <span><strong><?php echo $tl["dashb_box_content"]["dbbc1"]; ?> : </strong><?php echo $PHPV; ?> | </span>
          <span><strong><?php echo $tl["dashb_box_content"]["dbbc2"]; ?> : </strong><?php echo $POSTM; ?> | </span>
          <span><strong><?php echo $tl["dashb_box_content"]["dbbc3"]; ?> : </strong><?php echo $MEML; ?> | </span>
          <span><strong><?php echo $tl["dashb_box_content"]["dbbc4"]; ?> : </strong><?php echo $MYV; ?> | </span>
          <span><strong><?php echo $tl["dashb_box_content"]["dbbc5"]; ?> : </strong><?php echo $SRVIP; ?></span>

        </p>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

<?php include "footer.php"; ?>