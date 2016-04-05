<div id="pietrafik" style="height:300px;min-width:100px;"></div>
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
            text: 'Penduduk Berdasarkan Jenis Kelamin'
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
            data: [{
                name: 'Laki - Laki',
                y: <?php echo $jumlk ?>
            }, {
                name: 'Perempuan',
                y: <?php echo $jumpr ?>
            }]
        }]
});
</script>