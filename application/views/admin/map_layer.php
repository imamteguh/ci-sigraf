<div class="row">

<div class="col-md-12">

	<?php echo $this->session->flashdata('msg') ?>
	

	<h3>Data Layer <small><a href="<?php echo site_url('dashboard/editor_peta') ?>" class="btn btn-xs btn-primary">+ Tambah</a></small></h3>
	
	<table id="examtable" class="table table-bordered table-hover">
		<thead>
		<tr>
			<th>No</th>
			<th>Nama Layer</th>
			<th>Link</th>
			<th>Warna Layer</th>
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
			<td><?php echo $rows->link ?></td>
			<td><span class="badge" style="background:<?php echo $rows->warna ?>"><?php echo $rows->warna ?></span></td>
			<td><?php echo $status[$rows->status] ?></td>
			<td>
				<a href="<?php echo site_url('dashboard/hapus/map_layer/'.$rows->id) ?>" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus Layer</a>
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

<script>
	jQuery(function($) {
		$('#examtable').dataTable();
	})
</script>