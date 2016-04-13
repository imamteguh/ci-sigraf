<div class="page-header">
	<h1>
		Data Pengumuman
	</h1>
</div>

<div class="row">

<div class="col-md-12">

	<?php echo $this->session->flashdata('msg') ?>

	<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('pengumuman/index/save/'.$list['id']) ?>" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Judul</label>

			<div class="col-sm-9">
				<input id="form-field-1" required placeholder="Judul Pengumuman" class="col-xs-10 col-sm-8" type="text" name="judul" value="<?php echo $list['judul'] ?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Deskripsi</label>

			<div class="col-sm-9">
				<textarea id="editor1" name="deskripsi" class="form-control" rows="10"><?php echo $list['deskripsi'] ?></textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>

			<div class="col-sm-9">
				<input type="checkbox" name="status" class="checklist ace ace-checkbox-1" id="status" value="1" checked="checked" />
				<label class="lbl" for="status"> Aktif </label>
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

<div class="col-md-12">
	
	<table id="examtable" class="table table-bordered table-hover">
		<thead>
		<tr>
			<th>No</th>
			<th>Judul</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
		</thead>

		<?php
		$no = 1;
		foreach ($listdata->result() as $rows) {
		
		?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $rows->judul ?></td>
			<td><?php echo $status[$rows->status] ?></td>
			<td>
				<a href="<?php echo site_url('pengumuman/index/edit/'.$rows->id) ?>" class="btn btn-xs btn-success"><i class="fa fa-pencil"></i> edit</a>
				<a href="<?php echo site_url('dashboard/hapus/pengumuman/'.$rows->id.'/yes') ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
			</td>
		</tr>
		<?php
		$no++;
		}
		?>
	</table>


</div>

</div>

<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url() ?>assets/js/jquery.dataTables.bootstrap.min.js"></script>

<script type="text/javascript">
	
jQuery(function($) {
	$('#examtable').dataTable();
})

</script>

<!-- CK Editor -->
<script src="<?php echo base_url()?>assets/plugin/ckeditor/ckeditor.js"></script>

<script language="javascript">
CKEDITOR.replace('editor1');</script>
