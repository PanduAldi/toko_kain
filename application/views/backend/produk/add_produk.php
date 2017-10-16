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
				<select name="kategori" id="kategori" class="form-control" onchange="kat(this.value)">
					<option value=""> == Pilih Kategori ===</option>
					<?php foreach ($kategori as $k): ?>
						<option value="<?php echo $k['id_kategori'] ?>"><?php echo strtoupper($k['nama']) ?></option>
					<?php endforeach ?>
				</select>
				<span class="text-info">Anda harus pilih kategori terlebih dahulu sebelum menginput produk.</span>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Kode Produk : </label>
				<input type="text" name="kode" class="form-control baca" id="kode" readonly>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Nama Produk :</label>
				<input type="text" class="form-control baca" name="nama">
			</div>
			<div class="form-group">
				<label for="" class="control-label">Harga :</label>
				<div class="input-group">
					<div class="input-group-addon">Rp.</div>
					<input type="text" class="form-control baca" name="harga">
				</div>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Stok :</label>
				<input type="number" name="stok" min="0" class="form-control baca">
			</div>
		</div>
		
		<div class="col-lg-6">
			<div class="form-group">
				<label for="" class="control-label">Deskripsi :</label>
				<textarea name="deskripsi" id="deskripsi" class="form-control baca"  rows="10"></textarea>
			</div>
			<div class="form-group">
				<label for="" class="control-label">Gambar :</label>
				<input type="file" accept="image/*" name="img" class="form-control baca">
			</div>
			<div class="form-group">
				<label for="" class="control-label"></label>
				<button type="submit" class="btn btn-success">Simpan</button>
				<a href="<?php echo site_url('setting-produk') ?>" class="btn btn-danger">Batal</a>
			</div>
		</div>
	</div>
</form>

<script>
	$(function(){

		$(".notif_form").delay(3000).fadeOut('500');

		if ($("#kategori").val() == "") 
		{
			$(".baca").attr("readonly", 'readonly');
		}
	})
</script>

<script>
	function kat(e)
	{
		if ($("#kategori").val() == "") 
		{
			$(".baca").attr("readonly", 'readonly');
			$(".baca").val("");

			$("#kode").val("");
		}
		else
		{
			$(".baca").attr("readonly", 'readonly');
			$(".persyaratan").html("");
			$.ajax({
				url : "<?php echo site_url('ambil-kode') ?>",
				type : "POST",
				dataType : "JSON",
				data : {
				 	id : e
				},
				success : function(msg)
				{
					$("#kode").val(msg.kode);
				
					$(".baca").removeAttr("readonly");
					$("input[name=nama]").focus();
					
				}
			})
		}
	}
</script>