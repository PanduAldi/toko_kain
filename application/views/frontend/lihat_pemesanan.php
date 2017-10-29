<legend><?php echo ucwords($title) ?></legend>

<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title">Detail : <?php echo $inv ?></h3>
	</div>
	<div class="panel-body">
		<a href="<?php echo site_url('pemesanan-anda') ?>" class="btn btn-danger pull-right"><i class="fa fa-angle-double-left"></i> Kembali </a>
		<br><br>
		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="10">No</th>
					<th>Gambar</th>
					<th>Produk Detail</th>

				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach ($lihat as $l): ?>
					<tr>
						<td><?php echo $no++ ?></td>
						<td><img src="<?php echo base_url('media/img/produk/'.$l['img']) ?>" width="100" height="100" alt=""></td>
						<td>
							<?php  
								echo '<strong>'.$l['nama'].'</strong><br>';
								echo 'Jumlah Beli : '.$l['jumlah'];
								echo '<br> Total Harga : Rp.'.$this->cart->format_number($l['subtotal']);
							?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>

	</div>
</div>
