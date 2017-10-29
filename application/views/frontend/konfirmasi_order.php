<legend><?php echo ucwords($title) ?></legend>

<div class="row">
	<div class="col-lg-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Pengiriman</h3>
			</div>
			<div class="panel-body">
				<label for="" class="control-label">Nama Penerima</label>
				<br>
				<?php echo ucwords($u['nama']) ?>
				<hr>
				<label for="">Email</label>
				<br>
				<?php echo $u['email'] ?>
				<br><br>
				<label for="">Telp / HP</label>
				<br>
				<?php echo $u['telp'] ?>
				<br><br>
				<label for="">Alamat</label>
				<br>
				<?php echo $u['alamat'].", ".$u['kabupaten']." ".strtoupper($u['provinsi']) ?>
			</div>
		</div>
	</div>
	<div class="col-lg-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3 class="panel-title">Detail Pemesanan</h3>
			</div>
			<div class="panel-body">
				<div class="alert alert-info"><i class="fa fa-info-circle"></i> Berikut adalah detail pemesanan anda.</div>
				<table class="table table-bordered table-striped">
				  <tr>
				    <th>No</th>
				    <th>Gambar</th>
				    <th>Nama Kain</th>
				    <th>Harga</th>
				    <th>Jumlah Beli</th>
				    <th>Subtotal</th>
			
				  </tr>

				    <?php  $no=1; foreach ($this->cart->contents() as $item): ?>
				      <input type="hidden" name="id[]" value="<?php echo $item['rowid'] ?>">
				      <tr>
				        <td align="center" width="50"><strong><?php echo $no++."." ?></strong> </td>
				        <td width="200"><img src="<?php echo base_url('media/img/produk/'.$item['options']['img']) ?>" width="100" height="100" alt=""></td>
				        <td><label class="control-label"><?php echo $item['name'] ?></label></td>
				        <td><?php echo "Rp. ".$this->cart->format_number($item['price']) ?></td>
				        <td width="140">	
						  <?php echo $item['qty'] ?>
				          <span> Roll</span>
				        </td>
				        <td><?php echo "Rp. ".$this->cart->format_number($item['subtotal']) ?></td>

				      </tr>
				    <?php endforeach ?>

				    <tr>
				      <td colspan="5" align="right"><strong>Total Belanja</strong></td>
				      <td colspan="2"><strong><?php echo "Rp. ".$this->cart->format_number($this->cart->total()) ?></strong></td>
				    </tr>
				  	<tr>
				      <td colspan="5" align="right"><strong>Ongkos Kirim</strong></td>
				      <td colspan="2"><strong>
				      	<?php 
				      		$ongkir = file_get_contents(site_url('cek-ongkir/'.$u['id_kab']));

				      		$j = json_decode($ongkir, true);
				      		$cek = $j['rajaongkir']['results'][0]['costs'][1];

				      		echo "Rp. ".$this->cart->format_number($cek['cost'][0]['value'])." (JNE ".$cek['service'].")";
				      	?>
				      	</strong></td>
				    </tr>
					<tr>
				      <td colspan="5" align="right"><strong>Grand Total</strong></td>
				      <td colspan="2"><strong>
				      	<?php  

				      		$grand = $cek['cost'][0]['value'] + $this->cart->total();

				      		echo "Rp. ".$this->cart->format_number($grand);
				      	?>
				      		
				      	</strong>
				     </td>
				    </tr>
				</table>
				<div align="right">
					
					<form action="<?php echo site_url('order-success') ?>" method="post">
						<input type="hidden" name="inv" value="<?php echo $inv ?>">
						<a href="<?php echo site_url('keranjang-belanja') ?>" class="btn btn-danger"><i class="fa fa-back"></i> Kembali Ke Keranjang Belanja</a>
						<button type="submit" class="btn btn-primary"><i class="fa fa-money"></i> Bayar Sekarang</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa fa-info-circle"></i> Informasi</h3>
	</div>
	<div class="panel-body">
		<ul>
			<li> Untuk melanjutkan pembayaran silahkan pilih tombol Bayar Sekarang </li>
			<li> Ongkos Kirim Menyesuaikan alamat pada profil anda.</li>
			<li> Ongkos kirim dihitung dari Berat  pengiriman sebesar 5 Kg</li>
		</ul>
	</div>
</div>