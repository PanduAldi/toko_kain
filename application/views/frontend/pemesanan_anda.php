<legend><?php echo $title ?></legend>

<div class="alert alert-info">
	<i class="fa fa-info-circle"></i> Berikut adalah daftar belanja anda. Status dalam daftar dibawah ini akan otomatis ter-update sampai proses pengiriman barang. penjelasan mengenai status pemesanan dapat dilihat dibawah daftar list pada halaman ini.
</div>

<table class="table table-striped table-bordered" id="datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>Nomor Invoice</th>
			<th>Tanggal Pesan</th>
			<th>Status</th>
			<th>#</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; foreach ($pemesanan as $v): ?>
			<tr>
				<td width="15"><?php echo $no++ ?></td>
				<td><a href="<?php echo site_url('lihat-pemesanan/'.$v['id_transaksi']) ?>"><?php echo $v['no_invoice'] ?></a></td>
				<td><?php echo tgl_indo($v['tgl_transaksi']) ?></td>
				<td><?php echo ucwords($v['status']) ?></td>
				<td>
					<?php  

						if ($v['status'] == "pending") 
						{
							echo '<a href="'.site_url('form-pembayaran/'.$v['id_transaksi']).'" class="btn btn-warning"><i class="fa fa-money"></i> Konfirmasi Pembayaran</a>';
						}
					?>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<div class="panel panel-info">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa fa-info-circle"></i> Informasi</h3>
	</div>
	<div class="panel-body">
		<ul>
			<li>Untuk melihat detail pemesanan anda. klik pada bagian invoice </li>
			<li>
				Berikut status dalam daftar pemesanan anda  : 
				<ul>
					<li>Pending : Pemesanan anda telah diterima. Lakukan dan konfirmasi pembayaran anda agar pemesanan anda segera diproses.</li>
					<li>Pembayaran Diterima : Kami telah memverifikasi pembayaran anda. Pemesanan anda segera kami kirim</li>
					<li>Dalam Pengiriman : Pemesanan anda sedang dalam pengiriman. Resi akan kami munculkan dikolom status</li>
					<li>Selesai : Kami akan menyelesaikan pemesanan anda. Jika kami cek barang sudah diterima.</li>
				</ul>
			</li>
		</ul>
	</div>
</div>