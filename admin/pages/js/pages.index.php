<script src="assets/js/todo.js" type="text/javascript"></script>

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