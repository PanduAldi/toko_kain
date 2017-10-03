<div class="jumbotron">
	<div class="container">
		<h1>SELAMAT DATANG</h1>
		<p>Toko Online BadjaTex .</p>
	</div>
</div>

<link rel="stylesheet" href="<?php echo base_url('media/style_produk.css'); ?>">

<div class="row">
	<div class="col-lg-3">
		<?php $this->load->view('frontend/sidebar_kiri') ?>
	</div>

	<div class="col-lg-6">
			<div class="well well-sm"><strong><i class="fa fa-home"></i> <?php echo ucwords($title) ?></strong></div>
	
			<div class="row">
			    	<!-- BEGIN PRODUCTS -->
			  		<?php foreach ($random_produk as $p): ?>
			  		<div class="col-md-4 col-sm-6">
			    		<span class="thumbnail text-center">
			      			<img src="<?php echo base_url('media/img/produk/'.$p['img']) ?>" class="gambar" style="height: 150px" width="350" height="100" alt="...">
			      			<p class="text-danger"><?php echo ucwords($p['nama']) ?></p>
							<p>Rp. <?php echo number_format($p['harga']).",- /Roll" ?></p>
			      			<hr class="line">
			      			<div class="row">
			      					<a href="<?php echo site_url('produk/detail/'.$p['kode_produk'].'_'.$p['nama']) ?>" class="btn btn-success btn-sm">Lihat Detail</a>
			      					
			      					<?php if ($this->session->userdata('p_login') == true): ?>
			      						<form action="<?php echo site_url() ?>"></form>
			      					<?php endif ?>
			      			</div>
			    		</span>
			  		</div>			  				
			  		<?php endforeach ?>
			  		<!-- END PRODUCTS -->
				</div>
	</div>
	
	<div class="col-lg-3">
		<?php $this->load->view('frontend/sidebar_kanan') ?>
	</div>
</div>