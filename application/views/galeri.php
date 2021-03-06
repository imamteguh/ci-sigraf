
<div class="page-header">
	<h1>
		Galeri
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			kegiatan Desa Tanimulya
		</small>
	</h1>
</div><!-- /.page-header -->

<div class="row">
	<div class="col-xs-12">
		<!-- PAGE CONTENT BEGINS -->
		<div>
			<ul class="ace-thumbnails clearfix">
			<?php
			foreach ($listdata->result() as $rows) {
			?>
				<li>
					<a href="<?php echo base_url('uploads/galeri/'.$rows->foto) ?>" data-rel="colorbox" title="<?php echo $rows->nm_kegiatan; ?>">
						<img width="150" height="150" alt="150x150" src="<?php echo base_url('uploads/galeri/thumb/'.$rows->foto) ?>" />
						<div class="text">
							<div class="inner"><?php echo $rows->nm_kegiatan; ?></div>
						</div>
					</a>
				</li>
				<?php
			}
			?>
			</ul>
		</div><!-- PAGE CONTENT ENDS -->
	</div><!-- /.col -->
</div><!-- /.row -->


<!-- page specific plugin scripts -->
<script src="<?php echo base_url() ?>assets/js/jquery.colorbox.min.js"></script>

<!-- inline scripts related to this page -->
<script type="text/javascript">
jQuery(function($) {
	var $overflow = '';
	var colorbox_params = {
	rel: 'colorbox',
	reposition:true,
	scalePhotos:true,
	scrolling:false,
	previous:'<i class="ace-icon fa fa-arrow-left"></i>',
	next:'<i class="ace-icon fa fa-arrow-right"></i>',
	close:'&times;',
	current:'{current} of {total}',
	maxWidth:'100%',
	maxHeight:'100%',
	onOpen:function(){
		$overflow = document.body.style.overflow;
			document.body.style.overflow = 'hidden';
		},
		onClosed:function(){
			document.body.style.overflow = $overflow;
		},
		onComplete:function(){
			$.colorbox.resize();
		}
	};

	$('.ace-thumbnails [data-rel="colorbox"]').colorbox(colorbox_params);
	$("#cboxLoadingGraphic").html("<i class='ace-icon fa fa-spinner orange fa-spin'></i>");//let's add a custom loading icon


	$(document).one('ajaxloadstart.page', function(e) {
		$('#colorbox, #cboxOverlay').remove();
	});
})
</script>