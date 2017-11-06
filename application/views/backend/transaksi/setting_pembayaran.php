<legend><?php echo $title ?></legend>

<div class="notif">
	<?php echo $this->session->flashdata('notif'); ?>
</div>

<table class="table table-striped table-bordered" id="datatable">
	<thead>
		<tr>
			<th>No</th>
			<th>Nomor Invoice</th>
			<th>Tanggal Bayar</th>
			<th>Data Bank</th>
			<th>Status</th>
			<th>#</th>
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
				<td>
					<?php  
						if ($v['status'] == "pending") 
						{
							?>
							<a href="javascript:void(0)" onclick="cek_pembayaran(<?php echo $v['id_transaksi'].",".$v['id_pelanggan'] ?>)" title="Cek Pemabayaran" class="btn btn-warning"><i class="fa fa-money"></i> Verifikasi Pembayaran</a>
							<?php
						}
						else
						{
							echo "No Action";
						}
					?>
				</td>
			</tr>
		<?php endforeach ?>
	</tbody>
</table>

<script>
	$(function(){
		$(".notif").delay(3000).fadeOut(500);
	})
</script>