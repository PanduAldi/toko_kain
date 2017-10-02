

		<div class="list-group">
			<a href="#" class="list-group-item active"><i class="fa fa-list"></i> Kategori</a>
			<?php foreach ($kategori as $k): ?>
				<a href="<?php echo site_url('kategori/'.$k['id_kategori']) ?>" class="list-group-item"><?php echo strtoupper($k['nama']) ?></a>
			<?php endforeach ?>
		</div>

		<div class="panel panel-success">
			<div class="panel-heading">
				Kain Terlaris
			</div>
			<div class="panel body">
					
			</div>
		</div>