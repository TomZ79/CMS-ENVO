<?php include "header.php"; ?>

<?php if (!isset($jkv["email"])) { ?>
  <script type="text/javascript">
    // Notification
    setTimeout(function () {
      $.notify({
        // options
        message: '<?php echo $tl["error"]["e3"];?>- <a href="index.php?p=setting"><?php echo $tl["submenu"]["sm10"];?></a>',
      }, {
        // settings
        type: 'danger',
        delay: 5000,
      });
    }, 1000);
  </script>
<?php }
if (!isset($jkv["cms_tpl"])) { ?>
  <script type="text/javascript">
    // Notification
    $.notify({
      // options
      icon: 'fa fa-exclamation-triangle fa-lg',
      message: '<a href="index.php?p=template"><?php echo $tl["error"]["e17"];?></a>',
    }, {
      // settings
      type: 'danger',
      delay: 0,
      template:
      '<div data-notify="container" class="col-xs-11 col-sm-5 alert bg-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="message">{2}</span>' +
      '</div>'
    });
  </script>
<?php } ?>

  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-lg-3 col-xs-12">
      <!-- small box -->
      <div class="small-box bg-pink">
        <div class="inner">
          <h3><?php echo $totalhits; ?></h3>
          <p><?php echo $tl["dashb_box_stats"]["dbbs1"]; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-bar-chart"></i>
        </div>
        <a href="index.php?p=page" class="small-box-footer"><?php echo $tl["dashb_box_stats"]["dbbs"]; ?> <i
            class="fa fa-arrow-circle-right"></i></a>
      </div>
      </div>
    <div class="col-lg-3 col-xs-12">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h3><?php echo $JAK_COUNTS["searchClog"]; ?></h3>
          <p><?php echo $tl["dashb_box_stats"]["dbbs2"]; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-search"></i>
        </div>
        <a href="index.php?p=searchlog" class="small-box-footer"><?php echo $tl["dashb_box_stats"]["dbbs"]; ?> <i
            class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-12">
      <!-- small box -->
      <div class="small-box bg-orange">
        <div class="inner">
          <h3><?php echo $JAK_COUNTS["pluginCtotal"]; ?></h3>
          <p><?php echo $tl["dashb_box_stats"]["dbbs3"]; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-plug"></i>
        </div>
        <a href="index.php?p=plugins" class="small-box-footer"><?php echo $tl["dashb_box_stats"]["dbbs"]; ?> <i
            class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-12">
      <!-- small box -->
      <?php if (JAK_TAGS) { ?>
        <div class="small-box bg-brown">
          <div class="inner">
            <h3><?php echo $JAK_COUNTS["tagsCtotal"]; ?></h3>
            <p><?php echo $tl["dashb_box_stats"]["dbbs4"]; ?></p>
          </div>
          <div class="icon">
            <i class="fa fa-tags"></i>
          </div>
          <a href="index.php?p=tags" class="small-box-footer"><?php echo $tl["dashb_box_stats"]["dbbs"]; ?> <i
              class="fa fa-arrow-circle-right"></i></a>
        </div>
      <?php } else { ?>
        <div class="small-box bg-slate">
          <div class="inner">
            <h3><?php echo $JAK_COUNTS["hookCtotal"]; ?></h3>
            <p><?php echo $tl["dashb_box_stats"]["s7"]; ?></p>
          </div>
          <div class="icon">
            <i class="fa fa-flash"></i>
          </div>
          <a href="index.php?p=plugins&sp=hooks" class="small-box-footer"><?php echo $tl["dashb_box_stats"]["dbbs"]; ?> <i
              class="fa fa-arrow-circle-right"></i></a>
        </div>
      <?php } ?>
    </div>
  </div>

  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <i class="fa fa-paperclip"></i>
          <h3 class="box-title"><?php echo $tl["dashb_box_title"]["dbbt1"]; ?></h3>
        </div>
        <div class="box-body">
          <ul class="todoList">
            <?php if (isset($todos) && is_array($todos)) foreach ($todos as $item) {
              echo $item;
            } ?>
          </ul>
        </div>
        <div class="box-footer clearfix no-border">
          <a id="addButton" class="btn btn-default btodo pull-right" href="#"><?php echo $tl["button"]["btn"]; ?></a>
        </div>
      </div>
      <div class="box">
        <div class="box-header">
          <i class="fa fa-pie-chart"></i>
          <h3 class="box-title"><?php echo $tl["dashb_box_title"]["dbbt2"]; ?></h3>
        </div>
        <div class="box-body no-padding table-responsive">
          <div id="chart_total" class="charts"></div>
        </div>
      </div>
      <?php if (isset($JAK_HOOK_ADMIN_INDEX) && is_array($JAK_HOOK_ADMIN_INDEX)) foreach ($JAK_HOOK_ADMIN_INDEX as $hspi) {
        include_once APP_PATH . $hspi['phpcode'];
      } ?>
    </div>
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <i class="fa fa-server"></i>
          <h3 class="box-title"><?php echo $tl["dashb_box_title"]["dbbt3"]; ?></h3>
        </div>
        <div class="box-body no-padding">
          <div class="table-responsive">
            <table class="table table-striped first-column">
              <tr>
                <td><?php echo $tl["dashb_box_content"]["dbbc"]; ?></td>
                <td><?php echo $WEBS; ?></td>
              </tr>
              <tr>
                <td><?php echo $tl["dashb_box_content"]["dbbc1"]; ?></td>
                <td><?php echo $PHPV; ?></td>
              </tr>
              <tr>
                <td><?php echo $tl["dashb_box_content"]["dbbc2"]; ?></td>
                <td><?php echo $POSTM; ?></td>
              </tr>
              <tr>
                <td><?php echo $tl["dashb_box_content"]["dbbc3"]; ?></td>
                <td><?php echo $MEML; ?></td>
              </tr>
              <tr>
                <td><?php echo $tl["dashb_box_content"]["dbbc4"]; ?></td>
                <td><?php echo $MYV; ?></td>
              </tr>
              <tr>
                <td><?php echo $tl["dashb_box_content"]["dbbc5"]; ?></td>
                <td><?php echo $SRVIP; ?></td>
              </tr>
            </table>
          </div>
        </div>
      </div>
      <div class="box">
        <div class="box-header">
          <i class="fa fa-info-circle"></i>
          <h3 class="box-title"><?php echo $tl["dashb_box_title"]["dbbt4"]; ?></h3>
        </div>
        <div class="box-body no-padding">
          <div class="table-responsive">
            <table class="table table-striped first-column">
              <tr>
                <td><?php echo $tl["dashb_box_content"]["dbbc6"]; ?></td>
                <td><?php echo $jkv["version"]; ?></td>
              </tr>
              <tr>
                <td><?php echo $tl["dashb_box_content"]["dbbc7"]; ?></td>
                <td><a href="http://www.bluesat.cz" target="_blank">BLUESAT</a></td>
              </tr>
              <tr>
                <td><?php echo $tl["dashb_box_content"]["dbbc8"]; ?></td>
                <td>Tomas Zukal</td>
              </tr>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php if ($pageCdata) { ?>
  <!-- First Stat -->
  <script type="text/javascript">
    var jakchart;
    $(document).ready(function () {

      jakchart = new Highcharts.Chart({
        chart: {
          renderTo: 'chart_total'
        },
        title: {
          text: '<?php echo $tl["dashb_charts_content"]["dbchc"];?>'
        },
        xAxis: {
          categories: ['<?php echo $tl["dashb_charts_content"]["dbchc1"];?>'],
          title: {
            text: null
          }
        },
        yAxis: {
          min: 0,
          title: {
            text: '<?php echo $tl["dashb_charts_content"]["dbchc2"];?>',
            align: 'high'
          }
        },
        tooltip: {
          formatter: function () {
            var s;
            if (this.point.name) { // the pie chart
              s = '' +
                this.point.name + ': ' + this.y + ' <?php echo $tl["dashb_charts_content"]["dbchc3"];?>';
            } else {
              s = '' +
                this.series.name + ': ' + this.y;
            }
            return s;
          }
        },
        labels: {
          items: [{
            html: '<?php echo $tl["dashb_charts_content"]["dbchc4"];?>',
            style: {
              left: '5px',
              top: '5px',
              color: 'black'
            }
          }]
        },
        series: [{
          type: 'column',
          name: '<?php echo $tl["dashb_charts_content"]["dbchc5"];?>',
          data: [<?php echo $JAK_COUNTS["pageCtotal"];?>]
        }, {
          type: 'column',
          name: '<?php echo $tl["dashb_charts_content"]["dbchc6"];?>',
          data: [<?php echo $JAK_COUNTS["tagsCtotal"];?>]
        }, {
          type: 'column',
          name: '<?php echo $tl["dashb_charts_content"]["dbchc7"];?>',
          data: [<?php echo $JAK_COUNTS["userCtotal"];?>]
        }, {
          type: 'column',
          name: '<?php echo $tl["dashb_charts_content"]["dbchc8"];?>',
          data: [<?php echo $JAK_COUNTS["pluginCtotal"];?>]
        }, {
          type: 'column',
          name: '<?php echo $tl["dashb_charts_content"]["dbchc9"];?>',
          data: [<?php echo $JAK_COUNTS["hookCtotal"];?>]
        }, {
          type: 'pie',
          name: '<?php echo $tl["dashb_charts_content"]["dbchc4"];?>',
          data: [<?php echo $pageCdata;?>],
          center: [60, 80],
          size: 100,
          showInLegend: false,
          dataLabels: {
            enabled: false
          }
        }]
      });
    });
  </script>

  <script type="text/javascript" src="chart/highcharts.js"></script>
  <script type="text/javascript" src="chart/exporting.js"></script>

<?php } ?>

  <script src="js/todo.js" type="text/javascript"></script>

<?php include "footer.php"; ?>