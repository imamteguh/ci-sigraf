<script src="https://code.highcharts.com/highcharts.js"></script>
<div class="row">

	<div class="col-sm-12">
		<div class="widget-box">
			<div class="widget-header widget-header-flat widget-header-small">
				<h5 class="widget-title">
					<i class="ace-icon fa fa-signal"></i>
					Jumlah Penduduk
				</h5>
			</div>

			<div class="widget-body">
				<div class="widget-main" id="load_jumduk">
					<div id="pietrafik" style="height:300px;min-width:100px;"></div>
				</div><!-- /.widget-main -->
			</div><!-- /.widget-body -->
		</div><!-- /.widget-box -->
	</div><!-- /.col -->

    <div class="col-sm-6">
        <div class="widget-box">
            <div class="widget-header widget-header-flat widget-header-small">
                <h5 class="widget-title">
                    <i class="ace-icon fa fa-signal"></i>
                    Grafik Penduduk Per RW
                </h5>
            </div>

            <div class="widget-body">
                <div class="widget-main" id="load_grafikrw">
                    <div id="grafikrw" style="height:400px;min-width:100px;"></div>
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div><!-- /.widget-box -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <div class="widget-box">
            <div class="widget-header widget-header-flat widget-header-small">
                <h5 class="widget-title">
                    <i class="ace-icon fa fa-signal"></i>
                </h5>
            </div>

            <div class="widget-body">
                <center>
                    <span>Filter RW</span>
                    <select id="no_rw" style="padding: 2px 5px; width: 250px; margin: 10px;" onchange="getRt()">
                    </select>
                </center>
                <div class="widget-main" id="load_grafikrt">
                    <div id="grafikrt" style="height:400px;min-width:100px;"></div>
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div><!-- /.widget-box -->
    </div><!-- /.col -->

</div>

<script>

function getRt()
{
    var rw = document.getElementById('no_rw').value;
    if (rw=='') {
        rw = 1;
    }
    $.ajax({
        url : "<?php echo site_url('api_sistem/get_jumduk_rt') ?>",
        data : "rw="+rw,
        success: function(data) {
            $("#load_grafikrt").html(data);
        }
    });
}

function getRw()
{
    $.ajax({
        url : "<?php echo site_url('api_sistem/get_jumduk_rw') ?>",
        data : "",
        success: function(data) {
            $("#load_grafikrw").html(data);
        }
    });
}

function getDropdownRw()
{
    $.ajax({
        url : "<?php echo site_url('api_sistem/get_dropdown_rw') ?>",
        data : "",
        success: function(data) {
            $("#no_rw").html(data);
        }
    });
}

function jumduk()
{
    $.ajax({
        url : "<?php echo site_url('api_sistem/get_jumduk') ?>",
        data : "",
        success: function(data) {
            $("#load_jumduk").html(data);
        }
    });
}

window.onload = function() {
    jumduk();
    getRw();
    getDropdownRw();
    getRt();    
}
    

</script>