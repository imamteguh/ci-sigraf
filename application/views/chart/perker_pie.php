<div id="pietrafik" style="height:auto;float:left;width:100%"></div>
<div class="clearfix"></div>
<script>
var piechart = new Highcharts.Chart({
	chart: {
			renderTo: 'pietrafik',
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Penduduk Berdasarkan Pekerjaan'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
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
                    }
                }
            }
        },
        series: [{
            name: 'Total',
            colorByPoint: true,
            data: [
            <?php
            foreach ($datax as $p) {
            ?>
            {
                name: '<?php echo $p["DESCRIP"] ?>',
                y: <?php echo $p['JUMLAH'] ?>
            },
            <?php
            }
            ?>
            ]
        }]
});
</script>