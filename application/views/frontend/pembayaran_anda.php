<legend><?php echo $title ?></legend>

<div class="notif">
	<?php echo $this->session->flashdata('notif_pembayaran'); ?>
</div>

<div class="alert alert-info">
	<i class="fa fa-info-circle"></i> Halaman ini berisi daftar pembayaran dari pemesanan anda. Status pembayaran akan kami update setelah pembayaran kami terima.
</div>

<table class="table table-striped table-bordered" id="datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>Nomor Invoice</th>
			<th>Tanggal Bayar</th>
			<th>Data Bank</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $no = 1; foreach ($pembayaran as $v): ?>
			<tr>
				<td width="15"><?php echo $no++ ?></td>
				<td><a href="<?php echo site_url('lihat-pemesanan/'.$v['id_transaksi']) ?>" target="_blank"><?php echo $v['no_invoice'] ?></a></td>
				<td><?php echo tgl_indo($v['tgl_pembayaran']) ?></td>
				<td>
					<?php  
						echo "Nama Bank : ".strtoupper($v['bank']);
						echo "<br> Nomor Rekening : ".$v['no_rek'];
						echo "<br> A.n : ".$v['an'];
					?>
				</td>
				<td>
					<?php echo $v['status'] ?>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<div class="alert alert-warning">
	<i class="fa fa-warning"></i> Jika dalam 1x24 Jam kami belum mengkonfirmasi pembayaran anda. Silahan hubungi kami di 08598992xxxx
</div>

<script>
	$(function(){
		$(".notif").delay(3000).fadeOut(500);
	})
</script>