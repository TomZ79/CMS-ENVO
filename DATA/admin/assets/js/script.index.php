<?php
/*
 * AKP Dashboard - ADMIN
 * EN: Description of file
 * CZ: Popis souboru
 * ----------------------------------------------
 *
 * EN: The file insert other files into the site footer:
 *      - javascript code
 *      - external javascript files
 *      - the file 'assets/js/script.index.js'
 * CZ: Soubor vkládá další soubory do zápatí webu:
 *      - javascript kód
 *      - externí javascript soubory
 *      - soubor 'assets/js/script.index.js'
 *
 */

if ($page == '') {

	echo PHP_EOL . '<!-- Start JS AKP Dashboard -->';

	// Add Html Element -> addScript (Arguments: src, optional assoc. array)
	//
	echo $Html -> addScript('assets/js/global_js/todo.min.js');
	//
	echo $Html -> addScript('assets/plugins/highcharts/v6.1.1/highcharts.js');
	// Plugin Javascript
	echo $Html -> addScript('assets/js/script.index.min.js');

	echo PHP_EOL;

	// Highcharts
	$str = <<<EOT
<script>

// Run script after Pace is done
  var envochart;
  var envochart1;
  
  // Radialize the colors
  Highcharts.getOptions().colors = Highcharts.map(Highcharts.getOptions().colors, function (color) {
      return {
          radialGradient: {
              cx: 0.5,
              cy: 0.3,
              r: 0.7
          },
          stops: [
              [0, color],
              [1, Highcharts.Color(color).brighten(-0.3).get('rgb')] // darken
          ]
      };
  });
  
  // Build the chart 'envochart'
  envochart = new Highcharts.Chart({
    // Credits link
    credits: {
      enabled: false
    },

    chart: {
      // Chart types
      type: 'column',
      renderTo: 'chart_total'
    },
    title: {
      text: 'CMS Všeobecná Statistika'
    },

    subtitle: {
      text: 'Počet stránek, tagů, uživatelů, pluginů a hooks'
    },

    xAxis: {
      categories: ['CMS'],
      title: {
        text: null
      }
    },

    yAxis: {
      min: 0,
      title: {
        text: 'Total',
        align: 'high'
      }
    },

    tooltip: {
      formatter: function () {
        var s;
        s = '' + this.series.name + ': ' + '<b>' + this.y + '</b>';
        return s;
      }
    },

    series: [{
      type: 'column',
      name: 'Stránky',
      data: [{$ENVO_COUNTS["pageCtotal"]}]
    }, {
      type: 'column',
      name: 'Tagy (Štítky)',
      data: [{$ENVO_COUNTS["tagsCtotal"]}]
    }, {
      type: 'column',
      name: 'Uživatelé',
      data: [{$ENVO_COUNTS["userCtotal"]}]
    }, {
      type: 'column',
      name: 'Pluginy',
      data: [{$ENVO_COUNTS["pluginCtotal"]}]
    }, {
      type: 'column',
      name: 'Hooky',
      data: [{$ENVO_COUNTS["hookCtotal"]}]
    }]
  });
  
  // Build the chart 'envochart1'
  envochart1 = new Highcharts.Chart({
    // Credits link
    credits: {
      enabled: false
    },

    chart: {
      // Chart types
      type: 'pie',
      renderTo: 'page_total',
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      // Edit chart spacing
      spacingLeft: 30,
      spacingRight: 30,
    },
    title: {
      text: 'Počet zobrazených stránek'
    },

    subtitle: {
      text: 'Zobrazení 15 nejoblíbenějších stránek od spuštění webové sítě'
    },

    tooltip: {
      headerFormat: '<span style="font-size:14px;">{point.key}</span><br>',
      pointFormat: '{series.name}: <b>{point.y} -  {point.percentage:.1f}%</b>'
    },
    
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: 'pointer',
        dataLabels: {
          enabled: true,
          format: '<b>{point.name}</b>: {point.percentage:.1f} %',
          style: {
              color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
          },
          connectorColor: 'silver'
        }
      }
    },

    series: [{
      name: 'Počet zobrazených stránek',
      data: [{$pageCdata}],
      size: 140
    }]
  });
  
</script>
EOT;

	echo $str;

	echo PHP_EOL . '<!-- End JS AKP Dashboard -->' . PHP_EOL;

}

// New line in source code
echo PHP_EOL;
?>