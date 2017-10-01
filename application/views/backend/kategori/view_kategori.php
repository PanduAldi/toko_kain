<legend>
	<?php echo ucwords($title) ?>
</legend>

<div class="notif">
	<?php echo $this->session->flashdata('notif') ?>
</div>

<a href="<?php echo site_url('tambah-kategori') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Kategori</a>
<br><br>
<table class="table table-bordered table-striped" id="datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Kategori</th>
			<th>Kode</th>
			<th>Aksi</th>			
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($view as $v): ?>
			<tr class="baris_<?php echo $v['id_kategori'] ?>">
				<td><?php echo $no++ ?></td>
				<td><?php echo strtoupper($v['nama']) ?></td>
				<td><?php echo strtoupper($v['kode']) ?></td>
				<td>
					<a href="<?php echo site_url('ubah-kategori/'.$v['id_kategori']) ?>" class="label label-warning">Edit</a>
					<a href="javascript:void(0)" onclick="hapus(<?php echo $v['id_kategori'] ?>, 'hapus-kategori')" class="label label-danger">Hapus</a>
				</td>
			</tr>
		<?php endforeach ?>		
	</tbody>
</table>