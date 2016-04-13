<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Profil Desa Tanimulya</title>
        <link rel="icon" href="<?php echo base_url('assets/img/index.png') ?>">
		
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style-portal.css" />
		<link rel="stylesheet" href="<?php echo base_url() ?>assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<link rel="stylesheet" href="<?php echo base_url() ?>assets/plugin/jsor/style_jsor.css" />
		
    </head>
    <body>

    <div class="section bg">
    	<div class="container">
    		<div class="row">
    			<div class="col-md-7">
			        <div class="top-header">
						<div class="pull-left logo">
							<img src="<?php echo base_url('assets/img/index.png') ?>" width="80">
						</div>
						<div class="pull-left text">
							<h1>Profil Desa Tanimulya</h1>
							<span>Kabupaten Bandung Barat - Kecamatan Ngamprah</span>
						</div>
						<div class="clearfix"></div>
			        </div>
		        </div>

		        <div class="col-md-5">
		        	<div class="top-badge">
		        	</div>
		        </div>
	        </div>
        </div>

        <div class="container">
        	<div class="row">
        		<div class="col-md-7">
        			<div class="wrap-slide">

        			<!-- start slideshow -->

        			<div id="jssor_1" style="position: relative; margin: 0 auto; top: 0px; left: 0px; height: 456px; overflow: hidden; visibility: hidden; background-color: rgba(100,100,100,0.1) ">
				        <!-- Loading Screen -->
				        <div data-u="loading" style="position: absolute; top: 0px; left: 0px;">
				            <div style="filter: alpha(opacity=70); opacity: 0.7; position: absolute; display: block; top: 0px; left: 0px; width: 100%; height: 100%;"></div>
				            <div style="position:absolute;display:block;background:url('<?php echo base_url() ?>assets/plugin/jsor/img/loading.gif') no-repeat center center;top:0px;left:0px;width:100%;height:100%;"></div>
				        </div>
				        <div data-u="slides" style="cursor: default; position: relative; top: 0px; left: 0px; width: 800px; height: 356px; overflow: hidden;">
				            
				        <?php
				        if($slide->num_rows()>0):
				        foreach ($slide->result() as $rows) {
				        ?>
				            <div data-p="144.50" style="display: none;">
				                <img data-u="image" src="<?php echo base_url('uploads/slide/'.$rows->foto) ?>" />
				                <img data-u="thumb" src="<?php echo base_url('uploads/slide/thumb/'.$rows->foto) ?>" />
				            </div>
				        <?php
				    	}
				        else:
				        ?>
				    		<div data-p="144.50" style="display: none;">
				                <img data-u="image" src="<?php echo base_url() ?>assets/plugin/jsor/img/01.jpg" />
				                <img data-u="thumb" src="<?php echo base_url() ?>assets/plugin/jsor/img/thumb-01.jpg" />
				            </div>
				        <?php
				        endif;
				        ?>
				        </div>
				        <!-- Thumbnail Navigator -->
				        <div data-u="thumbnavigator" class="jssort01" style="position:absolute;left:0px;bottom:0px;width:800px;height:100px;" data-autocenter="1">
				            <!-- Thumbnail Item Skin Begin -->
				            <div data-u="slides" style="cursor: default;">
				                <div data-u="prototype" class="p">
				                    <div class="w">
				                        <div data-u="thumbnailtemplate" class="t"></div>
				                    </div>
				                    <div class="c"></div>
				                </div>
				            </div>
				            <!-- Thumbnail Item Skin End -->
				        </div>
				    </div>

        			<!-- end slideshow -->


        			</div>
        		</div>

        		<div class="col-md-5">
        			<div class="bg-pm">
        				<div id="example_vticker">
	        				<ul>
	        				<?php
					        if($news->num_rows()>0):
					        foreach ($news->result() as $rowsn) {
					        ?>
	        					<li class="vtic-content">
	        						<h2 class="pm-title"><?php echo $rowsn->judul ?></h2>
	        						<div class="pm-body"><?php echo $rowsn->deskripsi ?></div>
	        					</li>
	        				<?php
					    	}
					        else:
					        ?>
	        					<li>
	        						Maaf tidak ada pengumuman..
	        					</li>
	        				<?php
					        endif;
					        ?>
	        				</ul>
        				</div>

        				<div class="tbl-masuk">
        				<a href="<?php echo site_url('welcome') ?>" class="btn btn-primary btn-lg">MASUK SISTEM</a>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
    </div>
		

		<script src="<?php echo base_url() ?>assets/js/jquery.2.1.1.min.js"></script>
		<script src="<?php echo base_url() ?>assets/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/plugin/jsor/js/jssor.slider.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url() ?>assets/plugin/jsor/js_jsor.js"></script>
		<script src="<?php echo base_url() ?>assets/js/jquery.vticker.min.js"></script>
		<script>
	        jssor_1_slider_init();

	        $(function() {
			  $('#example_vticker').vTicker();
			});
	    </script>
	</body>
</html>