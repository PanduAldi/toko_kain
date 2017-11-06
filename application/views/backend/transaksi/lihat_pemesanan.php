<legend><?php echo ucwords($title) ?></legend>

		<a href="<?php echo site_url('setting-pemesanan') ?>" class="btn btn-danger pull-right"><i class="fa fa-angle-double-left"></i> Kembali </a>
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
								echo '<br> Total Harga : Rp.'.number_format($l['subtotal']);
							?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
