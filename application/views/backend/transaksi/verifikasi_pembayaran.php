<legend><?php echo ucwords($title) ?></legend>
<div class="alert alert-warning"><i class="fa fa-warning"></i> Silahkan cek pembayaran pelanggan terlebih dahulu sebelum mem-verifikasi pembayaran ini. </div>
<table class="table table-striped">
	<tr>
		<td width="200"><label for="">Nomor Invoice</label></td>
		<td width="10">:</td>
		<td><?php echo $trans['no_invoice'] ?></td>
	</tr>

	<tr>
		<td width="200"><label for="">Bank Pengirim</label></td>
		<td width="10">:</td>
		<td><?php echo $pemb['bank'] ?></td>
	</tr>
	<tr>
		<td width="200"><label for="">Nomor Rekening</label></td>
		<td width="10">:</td>
		<td><?php echo $pemb['no_rek'] ?></td>
	</tr>
	<tr>
		<td width="200"><label for="">Atas Nama</label></td>
		<td width="10">:</td>
		<td><?php echo $pemb['an'] ?></td>
	</tr>
	<tr>
		<td width="200"><label for="">Waktu Bayar</label></td>
		<td width="10">:</td>
		<td><?php echo $pemb['tgl_pembayaran'] ?></td>
	</tr>
	<tr>
		<td colspan="3">
			<form action="" method="post">
				<input type="hidden" name="id_pembayaran" value="<?php echo $pemb['id_pembayaran'] ?>">
				<button type="submit" name="verif" class="btn btn-success">Verifikasi Pembayaran</button>
				<a href="javascript:void(0)" onclick="window.history.go(-1)" class="btn btn-danger">Kembali</a>
			</form>
		</td>
	</tr>
</table>