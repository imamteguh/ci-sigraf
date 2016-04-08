<div class="pull-right">
    <table width="30%" class="table table-bordered">
        <thead>
            <tr>
                <th>Nama Kepercayaan</th>
                <th>Total</th>
            </tr>
        </thead>
        <?php
        foreach ($datax as $p) {
            # code...
            echo "<tr>";
            echo "<td>".$p['DESCRIP']."</td>";
            echo "<td>".$p['JUMLAH']." Jiwa</td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
<div id="pietrafik" style="height:auto;float:left;width:70%"></div>
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
            text: 'Penduduk Berdasarkan Agama'
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