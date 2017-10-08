	<style>
		.hr_cart {
			border-style: dashed;
			border-color: black;
		}
	</style>

	<?php
		// $data = array(
		// 				'id' => 1,
		// 				'qty' => 5,
		// 				'price' => 1000,
		// 				'name' => "Kain",
		// 				'options' => array('gambar' => 'milky.jpg')
		// 			);
		//
		// $this->cart->insert($data);
		//
		// $data = array(
		// 				'id' => 2,
		// 				'qty' => 3,
		// 				'price' => 1500,
		// 				'name' => "Kain 2",
		// 				'options' => array('gambar' => 'taslan-bening.jpg')
		// 			);
		//
		// $this->cart->insert($data);
	?>


		<div class="panel panel-primary">
			<div class="panel-heading"><i class="fa fa-shopping-cart"></i> keranjang Belanja</div>
			<div class="panel-body">
				<p><strong><?php echo count($this->cart->contents()) ?> Produk</strong></p>
				<ol>
				<?php foreach ($this->cart->contents() as $item): ?>
					<li> <?php echo $item['name'] ?></li>
				<?php endforeach ?>
				</ol>
				<hr class="hr_cart">
				<p>Total : Rp. <?php echo $this->cart->format_number($this->cart->total()) ?></p>
				<a href="<?php echo site_url('keranjang-belanja') ?>" class="btn btn-primary btn-block"><i class="fa fa-shopping-cart"></i> Lihat Keranjang Belanja</a>
			</div>

		</div>

		<div class="panel panel-success">
			<div class="panel-heading">
				<i class="fa fa-truck"></i> Dukungan Ekspedisi
			</div>
			<div class="panel-body">
				<center>
				<img src="<?php echo base_url('media/img/logo-jne.png') ?>" width="170" height="60" alt="">
			</center>
			</div>
		</div>
