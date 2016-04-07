<div id="grafikrt" style="height:400px;min-width:100px;"></div>
<script>
var chartrt = new Highcharts.Chart({
    chart: {
            type: 'column',
            renderTo: 'grafikrt'
        },
        title: {
            text: 'Jumlah Penduduk Berdasarkan Pendidikan Per RT'
        },
        subtitle: {
            text: 'Desa Tani Mulya'
        },
        xAxis: {
            categories: [
            <?php
            foreach ($datax as $vl) {
                # code...
                echo '"RT '.$vl['NO_RT'].'",';
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
            name: 'Laki - Laki',
            data: [
            <?php
            foreach ($datax as $lk) {
                # code...
                echo $lk['LAKI_LAKI'].",";
            }
            ?>
            ]

        }, {
            name: 'Perempuan',
            data: [
            <?php
            foreach ($datax as $pr) {
                # code...
                echo $pr['PEREMPUAN'].",";
            }
            ?>
            ]

        }]
});
</script>