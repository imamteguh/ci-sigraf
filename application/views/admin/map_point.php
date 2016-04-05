<div class="row">

<div class="col-md-12">
	

	<h3>Data Point</h3>
	
	<table id="examtable" class="table table-bordered table-hover">
		<thead>
		<tr>
			<th>No</th>
			<th>Nama Point</th>
			<th>Alamat</th>
			<th>Kategori</th>
			<th>Titik Kordinat</th>
			<th>Aksi</th>
		</tr>
		</thead>

		<?php
		$no = 1;
		foreach ($listdata->result() as $rows) {
		
		?>
		<tr>
			<td><?php echo $no ?></td>
			<td><?php echo $rows->nama ?></td>
			<td><?php echo $rows->alamat ?></td>
			<td><?php echo $rows->nm_kategori ?></td>
			<td><?php echo $rows->koordinat ?></td>
			<td>
				<a href="#" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Hapus Point</a>
			</td>
		</tr>
		<?php
		$no++;
		}
		?>
	</table>


</div>

</div>