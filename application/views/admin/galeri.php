<div class="page-header">
	<h1>
		Data Galeri
		<small>
			<i class="ace-icon fa fa-angle-double-right"></i>
			kegiatan Desa Tanimulya
		</small>
	</h1>
</div>

<div class="row">

<div class="col-md-12">
	<?php echo $this->session->flashdata('msg') ?>

	<form class="form-horizontal" role="form" method="post" action="<?php echo site_url('dashboard/galeri/save/'.$list['id']) ?>" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Nama Kegiatan</label>

			<div class="col-sm-9">
				<input id="form-field-1" required placeholder="Nama Kegiatan" class="col-xs-10 col-sm-8" type="text" name="nm_kegiatan" value="<?php echo $list['nm_kegiatan'] ?>">
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Foto Kegiatan</label>

			<div class="col-sm-9">
				<input type="file" id="id-input-file-2" class="col-xs-10 col-sm-5" name="foto" />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1"></label>

			<div class="col-sm-9">
				<?php echo $list['foto'] ?>
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
			<th>Foto Kegiatan</th>
			<th>Nama Kegiatan</th>
			<th>Aksi</th>
		</tr>
		</thead>

		<?php
		$no = 1;
		foreach ($listdata->result() as $rows) {
		
		?>
		<tr>
			<td><?php echo $no ?></td>
			<td><img src="<?php echo base_url('uploads/galeri/thumb/'.$rows->foto) ?>"></td>
			<td><?php echo $rows->nm_kegiatan ?></td>
			<td>
				<a href="<?php echo site_url('dashboard/hapus/galeri/'.$rows->id.'/yes') ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus</a>
			</td>
		</tr>
		<?php
		$no++;
		}
		?>
	</table>


</div>

</div>
