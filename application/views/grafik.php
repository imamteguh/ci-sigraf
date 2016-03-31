
<script src="https://code.highcharts.com/highcharts.js"></script>
<div class="row">

	<div class="col-sm-6">
		<div class="widget-box">
			<div class="widget-header widget-header-flat widget-header-small">
				<h5 class="widget-title">
					<i class="ace-icon fa fa-signal"></i>
					Trafik
				</h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div id="trafik" style="height:300px;min-width:100px;"></div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col -->

	<div class="col-sm-6">
		<div class="widget-box">
			<div class="widget-header widget-header-flat widget-header-small">
				<h5 class="widget-title">
					<i class="ace-icon fa fa-signal"></i>
					Jumlah Penduduk
				</h5>
			</div>

			<div class="widget-body">
				<div class="widget-main">
					<div id="pietrafik" style="height:300px;min-width:100px;"></div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col -->

    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header widget-header-flat widget-header-small">
                <h5 class="widget-title">
                    <i class="ace-icon fa fa-signal"></i>
                    Grafik Penduduk Per RW
                </h5>
            </div>

            <div class="widget-body">
                <div class="widget-main">
                    <div id="grafikrw" style="height:400px;min-width:100px;"></div>
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div><!-- /.widget-box -->
    </div><!-- /.col -->

    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header widget-header-flat widget-header-small">
                <h5 class="widget-title">
                    <i class="ace-icon fa fa-signal"></i>
                    Filter 
                    <select id="no_rw" style="padding: 3px 5px; width: 200px" onchange="getRt()">
                    <?php
                    $datax = get_jumduk_rw();
                    foreach ($datax as $vl) {
                        # code...
                        echo '<option value="'.$vl['NO_RW'].'">RW '.$vl['NO_RW'].'</option>';
                    }
                    ?>
                    </select>
                </h5>
            </div>

            <div class="widget-body">
                <div class="widget-main" id="load_grafikrt">
                    <div id="grafikrt" style="height:400px;min-width:100px;"></div>
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div><!-- /.widget-box -->
    </div><!-- /.col -->

</div>

<script>
var chart = new Highcharts.Chart({
        chart: {
            renderTo: 'trafik'
        },
        title: {
            text: 'Trifik Penduduk 5 tahun'
        },
        subtitle: {
            text: 'Desa Tani Mulya'
        },
        xAxis: {
            categories: [2010,2011,2012,2013,2014]
        },
        yAxis: {
            title: {
                text: 'Jumlah'
            }
        },
        plotOptions: {
            line: {
                dataLabels: {
                    enabled: true
                },
                enableMouseTracking: false
            }
        },
        series: [{
            name: 'Laki - Laki',
            data: [7.0, 6.9, 9.5, 14.5, 18.4]
        }, {
            name: 'Perempuan',
            data: [3.9, 4.2, 5.7, 8.5, 11.9]
        }]
});

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
                y: 600
            }, {
                name: 'Perempuan',
                y: 400
            }]
        }]
});

var chartrw = new Highcharts.Chart({
    chart: {
            type: 'column',
            renderTo: 'grafikrw'
        },
        title: {
            text: 'Jumlah Penduduk Per RW'
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


function getRt()
{
    var rw = document.getElementById('no_rw').value;
    $.ajax({
        url : "<?php echo site_url('api_sistem/get_jumduk_rt') ?>",
        data : "rw="+rw,
        success: function(data) {
            $("#load_grafikrt").html(data);
        }
    });
}

window.onload = function() {
    getRt();
}
    

</script>