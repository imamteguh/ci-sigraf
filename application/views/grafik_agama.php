<script src="https://code.highcharts.com/highcharts.js"></script>
<div class="row">

    <div class="col-sm-12">
        <div class="widget-box">
            <div class="widget-header widget-header-flat widget-header-small">
                <h5 class="widget-title">
                    <i class="ace-icon fa fa-signal"></i>
                    Jumlah Penduduk Berdasarkan Agama
                </h5>
            </div>

            <div class="widget-body">
                <div class="widget-main" id="load_pie">
                    <div id="piegrafik" style="height:400px;min-width:100px;"></div>
                </div><!-- /.widget-main -->
            </div><!-- /.widget-body -->
        </div><!-- /.widget-box -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <div class="widget-box">
            <div class="widget-header widget-header-flat widget-header-small">
                <h5 class="widget-title">
                    <i class="ace-icon fa fa-signal"></i>
                    Grafik Jumlah Penduduk Berdasarkan Agama
                </h5>
            </div>

            <div class="widget-body">
                <center>
                <span>Kategori Agama</span>
                <select id="kat_pend" style="padding: 2px 5px; width: 250px; margin: 10px;" onchange="getRw(); getRt()">
                    <?php
                    foreach ($kategori->result() as $row) {
                        # code...
                        echo '<option value="'.$row->id.'">'.$row->nm_agama.'</option>';
                    }
                    ?>
                </select>
                </center>
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
    var id = document.getElementById('kat_pend').value;
    if (rw=='') {
        rw = 1;
    }
    $.ajax({
        url : "<?php echo site_url('api_sistem/get_agama_rt') ?>",
        data : "rw="+rw+"&id="+id,
        success: function(data) {
            $("#load_grafikrt").html(data);
        }
    });
}

function getRw()
{
    var id = document.getElementById('kat_pend').value;
    $.ajax({
        url : "<?php echo site_url('api_sistem/get_agama_rw') ?>",
        data : "id="+id,
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

function getPie()
{
    $.ajax({
        url : "<?php echo site_url('api_sistem/get_agama_pie') ?>",
        data : "",
        success: function(data) {
            $("#load_pie").html(data);
        }
    });
}

window.onload = function() {
    getPie();
    getRw();
    getDropdownRw();
    getRt();    
}
    

</script>