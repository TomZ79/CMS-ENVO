<?php include "header.php"; ?>

  <!-- Small boxes (Stat box) -->
  <div class="row m-t-20">
    <div class="col-lg-3 col-12">
      <!-- Small box -->
      <div class="dashboard-box bg-success">
        <div class="inner">
          <h3><span class="counter" data-counterend="<?=$totalhits?>"><?=$totalhits?></span></h3>
          <p><?=$tl["dashb_box_stats"]["dbbs1"]?></p>
        </div>
        <div class="icon">
          <i class="fa fa-bar-chart"></i>
        </div>
        <a href="index.php?p=page" class="dashboard-box-footer">
          <?=$tl["dashb_box_stats"]["dbbs"]?>
          <i class="fa fa-arrow-circle-right"></i>
        </a>
      </div>
    </div>
    <div class="col-lg-3 col-12">
      <!-- Small box -->
      <div class="dashboard-box bg-complete-dark">
        <div class="inner">
          <h3>
            <span class="counter" data-counterend="<?=$ENVO_COUNTS["searchClog"]?>"><?=$ENVO_COUNTS["searchClog"]?></span>
          </h3>
          <p><?=$tl["dashb_box_stats"]["dbbs2"]?></p>
        </div>
        <div class="icon">
          <i class="fa fa-search"></i>
        </div>
        <a href="index.php?p=searchlog" class="dashboard-box-footer">
          <?=$tl["dashb_box_stats"]["dbbs"]?>
          <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-12">
      <!-- Small box -->
      <div class="dashboard-box bg-warning">
        <div class="inner">
          <h3>
            <span class="counter" data-counterend="<?=$ENVO_COUNTS["pluginCtotal"]?>"><?=$ENVO_COUNTS["pluginCtotal"]?></span>
          </h3>
          <p><?=$tl["dashb_box_stats"]["dbbs3"]?></p>
        </div>
        <div class="icon">
          <i class="fa fa-plug"></i>
        </div>
        <a href="index.php?p=plugins" class="dashboard-box-footer">
          <?=$tl["dashb_box_stats"]["dbbs"]?>
          <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-12">
      <!-- Small box -->
      <?php if (ENVO_TAGS) { ?>
        <div class="dashboard-box bg-danger">
          <div class="inner">
            <h3>
              <span class="counter" data-counterend="<?=$ENVO_COUNTS["tagsCtotal"]?>">
                <?=$ENVO_COUNTS["tagsCtotal"]?>
              </span>
            </h3>
            <p><?=$tl["dashb_box_stats"]["dbbs4"]?></p>
          </div>
          <div class="icon">
            <i class="fa fa-tags"></i>
          </div>
          <a href="index.php?p=tags" class="dashboard-box-footer">
            <?=$tl["dashb_box_stats"]["dbbs"]?>
            <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      <?php } else { ?>
        <div class="dashboard-box bg-info">
          <div class="inner">
            <h3>
              <span class="counter" data-counterend="<?=$ENVO_COUNTS["hookCtotal"]?>"><?=$ENVO_COUNTS["hookCtotal"]?></span>
            </h3>
            <p><?=$tl["dashb_box_stats"]["dbbs5"]?></p>
          </div>
          <div class="icon">
            <i class="fa fa-flash"></i>
          </div>
          <a href="index.php?p=plugins&amp;sp=hooks" class="dashboard-box-footer"><?=$tl["dashb_box_stats"]["dbbs"]?>
            <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      <?php } ?>
    </div>
  </div>

  <!-- Content -->
  <div class="row">
    <div class="col-sm-12">
      <ul class="nav nav-tabs nav-tabs-responsive" role="tablist">
        <li class="nav-item">
          <a href="#" class="active" data-toggle="tab" data-target="#cmsPage1" role="tab">
            <span class="text"><?=$tl["dashb_section_tab"]["dashbtab"]?></span>
          </a>
        </li>
        <li class="nav-item next">
          <a href="#" class="" data-toggle="tab" data-target="#cmsPage2" role="tab">
            <span class="text"><?=$tl["dashb_section_tab"]["dashbtab1"]?></span>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="" data-toggle="tab" data-target="#cmsPage3" role="tab">
            <span class="text"><?=$tl["dashb_section_tab"]["dashbtab2"]?></span>
          </a>
        </li>
        <?php if (isset($ENVO_HOOK_ADMIN_INDEX)) { ?>
          <li class="nav-item">
            <a href="#" class="" data-toggle="tab" data-target="#cmsPage4" role="tab">
              <span class="text"><?=$tl["dashb_section_tab"]["dashbtab3"]?></span>
            </a>
          </li>
        <?php } ?>
      </ul>

      <div class="tab-content">
        <div class="tab-pane fade active show" id="cmsPage1" role="tabpanel">
          <div class="row">
            <div class="col-sm-6">
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
            <div class="col-sm-6">
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
        <div class="tab-pane fade" id="cmsPage2" role="tabpanel">
          <div class="row">
            <div class="col-sm-12">
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
        <div class="tab-pane fade" id="cmsPage3" role="tabpanel">
          <div class="row">
            <div class="col-sm-12">
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
                  echo $Html->addAnchor('#', $tl["button"]["btn"], 'addTodo', 'btn btn-default addtodo float-right');
                  ?>

                </div>
              </div>
            </div>
          </div>
        </div>

        <?php if (isset($ENVO_HOOK_ADMIN_INDEX)) { ?>

          <div class="tab-pane fade" id="cmsPage4" role="tabpanel">
            <div class="row">
              <div class="col-sm-12">

                <?php
                if (isset($ENVO_HOOK_ADMIN_INDEX) && is_array($ENVO_HOOK_ADMIN_INDEX)) foreach ($ENVO_HOOK_ADMIN_INDEX as $hspi) {
                  include_once APP_PATH . $hspi['phpcode'];
                }
                ?>

              </div>
            </div>
          </div>

        <?php } ?>

      </div>
    </div>
  </div>

  <div class="row padding-15 m-t-30">
    <div class="col-sm-12">
      <div class="text-center">
        <p>

          <span><strong><?=$tl["dashb_box_content"]["dbbc"]?> : </strong><?=$WEBS?> | </span>
          <span><strong><?=$tl["dashb_box_content"]["dbbc1"]?> : </strong><?=$PHPV?> | </span>
          <span><strong><?=$tl["dashb_box_content"]["dbbc2"]?> : </strong><?=$POSTM?> | </span>
          <span><strong><?=$tl["dashb_box_content"]["dbbc3"]?> : </strong><?=$MEML?> | </span>
          <span><strong><?=$tl["dashb_box_content"]["dbbc4"]?> : </strong><?=$MYV?> | </span>
          <span><strong><?=$tl["dashb_box_content"]["dbbc5"]?> : </strong><?=$SRVIP?></span>

        </p>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>

<?php include "footer.php"; ?>