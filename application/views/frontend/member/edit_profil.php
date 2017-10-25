<legend><?php echo ucwords($title) ?></legend>

<div class="container-fluid">
	<div class="notif">
		<?php echo $this->session->flashdata('notif') ?>
	</div>
	<form action="" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Nama Anda :</label>
			<div class="col-md-5">
				<input type="text" name="nama" class="form-control" value="<?php echo $v['nama'] ?>" required>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Jenis Kelamin :</label>
			<div class="col-md-4">
				<select name="jk" class="form-control" id="" required>
					<option value=""> == PILIHAN ==</option>
					<?php  
						$jk = array('l' => 'Laki - Laki', 'p' => 'Perempuan');
						

						foreach ($jk as $key => $value) {
							$select = ($v['jk'] == $key)?"selected":"";
							echo '<option value="'.$key.'" '.$select.'>'.$value.'</option>';
						}
					?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Email :</label>
			<div class="col-md-4">
				<input type="text" class="form-control" name="email" value="<?php echo $v['email'] ?>" required>
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Password :</label>
			<div class="col-md-4">
				<input type="password" class="form-control" name="password" placeholder="Silahkan input jika ingin mengganti password">
			</div>
		</div>
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Telp / HP :</label>
			<div class="col-md-4">
				<input type="text" class="form-control" name="telp" value="<?php echo $v['telp'] ?>" required>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-10 col-sm-offset-2">
				<button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
				<a href="<?php echo site_url('profil-anda') ?>" class="btn btn-danger">Kembali</a>
			</div>
		</div>
	</form>
</div>

<script>
	$(function(){
		$(".notif").delay(3000).hide(500);
	})
</script>