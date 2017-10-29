<style>
	.t_order {
	
		width: 30%;		
		margin-left: 35%;
	}

	.bank
	{
		width: 214;
		display: inline-block;
		margin : 10px;
		position: relative;
		left: 35%;
	}
</style>
<div class="panel panel-success">
	<div class="panel-heading">
		<h3 class="panel-title"><i class="fa fa-check"></i> Pemesanan Sukses</h3>
	</div>
	<div class="panel-body">
		<p align="center">Terima Kasih <strong><?php echo $this->session->userdata('m_nama') ?></strong>, Pesanan Anda telah kami terima</p><br>
		<div class=" t_order">
			<table class="table table-striped">
				<tr>
					<td colspan="3" align="center"><strong><?php echo $trans['no_invoice'] ?></strong></td>
				</tr>
				<tr>
					<td>Total Belanja</td>
					<td>:</td>
					<td>Rp. <?php echo number_format($trans['total_harga']) ?></td>
				</tr>
				<tr>
					<td>Biaya Kirim</td>
					<td>:</td>
					<td>Rp. <?php echo number_format($trans['ongkir']) ?></td>
				</tr>
				<tr>
					<td><strong>Total Bayar</strong></td>
					<td>:</td>
					<td>Rp. <?php echo number_format($trans['total_harga'] + $trans['ongkir']) ?></td>
				</tr>
			</table>
		</div>
		<div class="col-md-8"></div>
		
		<br>
		<p align="center">Pemesanan anda akan kami proses setelah anda transfer ke rekening kami di : </p>
		<br>
		
				<?php  
					$bank = $this->db->get('bank')->result_array();

					foreach ($bank as $b) 
					{
						?>
						<div class="bank">
							<img src="<?php echo base_url('media/img/bank/'.$b['img']) ?>" width="170" height="90" alt="">
							<br><br>
							<center><strong><?php echo "No. Rek : ".strtoupper($b['no_rek']) ?></strong><br>
							<?php echo strtoupper($b['an']) ?></center>
						</div>
						<?
					}
				?>
		<br>
		<div class="alert alert-info" align="center"><i class="fa fa-info-circle"></i> Transfer sesuai nilai total pemabayran untuk mempercepat proses konfirmasi pembayaran Anda.</div>
		<br>	
		<center>Setelah anda men-transfer seusai nominal, segera anda konfirmasi pembayaran anda pada link pemesanan <a href="<?php echo site_url('pemesanan-anda') ?>">disini</a>. Terdapat tombol untuk melakukan konfirmasi pembayaran.</center>
		<br>
		<br>
		<br>
		<p align="center">Terima Kasih telah berbelanja di Toko Kami.</p>
	</div>
</div>