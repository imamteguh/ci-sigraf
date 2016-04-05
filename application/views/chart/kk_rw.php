<div id="grafikrw" style="height:400px;min-width:100px;"></div>
<script>
var chartrw = new Highcharts.Chart({
    chart: {
            type: 'column',
            renderTo: 'grafikrw'
        },
        title: {
            text: 'Kepemilikan KK Per RW'
        },
        subtitle: {
            text: 'Desa Tani Mulya'
        },
        xAxis: {
            categories: [
            <?php
            foreach ($datax as $vl) {
                # code...
                echo '"RW '.$vl['NO_RW'].'",';
            }
            ?>
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah (Orang)'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:f}</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Total',
            data: [
            <?php
            $jml = array();
            $no = 0;
            foreach ($datax as $lk) {
                # code...
                $jml[$no] = $lk['JML_L'] + $lk['JML_P'];
                echo $jml[$no].',';
            $no++;
            }
            ?>
            ]

        }]
});
</script>