<legend>
	<?php echo ucwords($title) ?>
</legend>

<div class="notif">
	<?php echo $this->session->flashdata('notif') ?>
</div>

<a href="<?php echo site_url('tambah-produk') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Produk </a>
<br><br>
<table class="table table-bordered table-striped" id="datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>img</th>
			<th>Kode Produk</th>
			<th>Nama Produk</th>
			<th>Kategori</th>
			<th>Harga</th>
			<th>Stok</th>
			<th>Terjual</th>
			<th>Aksi</th>			
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($view as $v): ?>
			<tr class="baris_<?php echo $v['id_produk'] ?>">
				<td><?php echo $no++ ?></td>
				<td><img src="<?php echo base_url('media/img/produk/'.$v['img']) ?>" width="100" height="100" alt=""></td>
				<td><?php echo $v['kode_produk'] ?></td>
				<td><?php echo $v['nama_produk'] ?></td>
				<td><?php echo $v['kategori'] ?></td>
				<td><?php echo "Rp. ".number_format($v['harga']) ?></td>
				<td><?php echo $v['stok'] ?></td>
				<td><?php echo $v['terjual'] ?></td>
				<td>
					<a href="<?php echo site_url('detail-produk/'.$v['id_produk']) ?>" class="label label-success">Detail</a>
					<a href="<?php echo site_url('ubah-produk/'.$v['id_produk']) ?>" class="label label-warning">Edit</a>
					<a href="javascript:void(0)" onclick="hapus(<?php echo $v['id_produk'] ?>, 'hapus-produk')" class="label label-danger">Hapus</a>
				</td>
			</tr>
		<?php endforeach ?>		
	</tbody>
</table>