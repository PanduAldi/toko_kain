<legend>
	<?php echo ucwords($title) ?>
</legend>

<div class="notif">
	<?php echo $this->session->flashdata('notif') ?>
</div>

<a href="<?php echo site_url('tambah-bank') ?>" class="btn btn-success"><i class="fa fa-plus"></i> Tambah Bank </a>
<br><br>
<table class="table table-bordered table-striped" id="datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>img</th>
			<th>Nama Bank</th>
			<th>No Rekening</th>
			<th>Atas Nama</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $no=1; foreach ($view as $v): ?>
			<tr class="baris_<?php echo $v['id_bank'] ?>">
				<td><?php echo $no++ ?></td>
				<td align="center"><img src="<?php echo base_url('media/img/bank/'.$v['img']) ?>" width="200" height="70" alt=""></td>
				<td><?php echo strtoupper($v['nama']) ?></td>
				<td><?php echo $v['no_rek'] ?></td>
				<td><?php echo strtoupper($v['an']) ?></td>
				<td>
					<a href="<?php echo site_url('ubah-bank/'.$v['id_bank']) ?>" class="label label-warning">Edit</a>
					<a href="javascript:void(0)" onclick="hapus(<?php echo $v['id_bank'] ?>, 'hapus-bank')" class="label label-danger">Hapus</a>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>
