<legend><?php echo ucwords($title) ?></legend>

<div class="alert alert-info"><i class="fa fa-info-circle"></i> Halaman ini untuk mengkonfirmasi pembayaran yang telah anda lakukan setelah memn-transfer ke rekening kami. Silahkan isi semua form dibawah ini dengan valid.</div>

<form action="" method="post" class="form-horizontal">
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Bank Tujuan :</label>
		<div class="col-md-4">
			<select name="id_bank" class="form-control">
				<option value="">== Pilih Bank Tujuan ==</option>
				<?php foreach ($bank as $v): ?>
					<option value="<?php echo $v['id_bank'] ?>"><strong><?php echo strtoupper($v['nama']) ?></strong><br> (<?php echo ucwords($v['an'])." : ".$v['no_rek'] ?>)</option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Bank Pengirim :</label>
		<div class="col-md-4">
			<input type="text" name="bank" class="form-control" placeholder="exp : BNI, BRI, BCA" />
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Nomor Rekening Anda :</label>
		<div class="col-md-4">
			<input type="text" name="no_rek" class="form-control"  />
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label">Atas Nama (A.n) :</label>
		<div class="col-md-4">
			<input type="text" name="an" class="form-control" />
		</div>
	</div>
	<div class="form-group">
		<label for="" class="col-md-3 control-label"></label>
		<div class="col-md-4">
			<button type="submit" name="simpan" class="btn btn-success">Konfirmasi Pembayaran</button>
			<a href="<?php echo site_url('pemesanan-anda') ?>" class='btn btn-danger'>Kembali</a>
		</div>
	</div>
</form>