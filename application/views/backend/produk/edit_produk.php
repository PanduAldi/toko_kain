<legend><?php echo $title ?></legend>
<div class="notif_form">
	<?php echo validation_errors('<div class="alert alert-danger">', '</div>') ?>
	<?php echo $this->session->flashdata('notif_img'); ?>
</div>
<form action="" method="post" enctype="multipart/form-data" id="f_produk">
	<div class="row">
		<div class="col-lg-6">
			<div class="form-group">
				<label for="" class="control-label">Kategori :</label>
				<input type="hidden" name="kategori" value="<?php echo $v['id_kategori'] ?>">
				<input type="text" class="form-control" value="<?php echo $v['kategori'] ?>" readonly>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Kode Produk : </label>
				<input type="text" name="kode" class="form-control baca" id="kode" value="<?php echo $v['kode_produk'] ?>" readonly>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Nama Produk :</label>
				<input type="text" class="form-control baca" name="nama" value="<?php echo $v['nama'] ?>">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Harga :</label>
				<div class="input-group">
					<div class="input-group-addon">Rp.</div>
					<input type="text" class="form-control baca" name="harga" value="<?php echo $v['harga'] ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Stok :</label>
				<input type="number" name="stok" min="0" value="<?php echo $v['stok'] ?>" class="form-control baca">
			</div>
		</div>
		
		<div class="col-lg-6">
			<div class="form-group">
				<label for="" class="control-label">Deskripsi :</label>
				<textarea name="deskripsi" id="deskripsi" class="form-control baca" rows="10"><?php echo $v['deskripsi'] ?></textarea>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Gambar :</label>
				<input type="file" accept="image/*" name="img" class="form-control baca">
				<span class="text-info">Pilih gambar jika ingin diganti.</span>
			</div>
			<div class="form-group">
				<label for="" class="control-label"></label>
				<button type="submit" class="btn btn-success">Simpan</button>
				<a href="<?php echo site_url('setting-produk') ?>" class="btn btn-danger">Batal</a>
			</div>
		</div>
	</div>
</form>

