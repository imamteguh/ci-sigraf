<div class="page-header">
	<h1>
		Edit Konten
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			<?php echo $list['menu_text'] ?>
		</small>
	</h1>
</div>

<div class="row">

<div class="col-md-12">

	<?php echo $this->session->flashdata('msg') ?>

	<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('konten/index/'.$list['id']) ?>" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Judul</label>

			<div class="col-sm-9">
				<input id="form-field-1" required placeholder="Judul" class="col-xs-10 col-sm-8" type="text" name="judul" value="<?php echo $list['judul'] ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Deskripsi</label>

			<div class="col-sm-9">
				<textarea id="editor1" name="deskripsi" class="form-control" rows="10"><?php echo $list['deskripsi'] ?></textarea>
			</div>
		</div>

		<div class="clearfix form-actions">
			<div class="col-md-offset-3 col-md-9">
				<button class="btn btn-info" type="submit">
					<i class="ace-icon fa fa-check bigger-110"></i>
					Simpan
				</button>

				&nbsp; &nbsp; &nbsp;
				<button class="btn" type="reset">
					<i class="ace-icon fa fa-undo bigger-110"></i>
					Reset
				</button>
			</div>
		</div>
	</form>

</div>

</div>

<!-- CK Editor -->
<script src="<?php echo base_url()?>assets/plugin/ckeditor/ckeditor.js"></script>

<script language="javascript">
CKEDITOR.replace('editor1');</script>
