<legend><?php echo $title ?></legend>

<form action="" method="post" name="f_kategori" class="form-horizontal">
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="nama">Nama Kategori</label>
    <div class="col-md-5">
    <input id="nama" name="nama" type="text" placeholder="Masukan Nama Kategori" class="form-control input-md text-uppercase" required="">

    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="kode">Kode Kategori</label>  
    <div class="col-md-4">
    <input name="kode" id="kode" type="text" placeholder="Contoh : BTK, FLN" class="form-control input-md text-uppercase" maxlength="3" required="">

    </div>
  </div>

  <!-- Button (Double) -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="simpan"></label>
    <div class="col-md-8">
      <button type="submit" id="simpan" name="simpan" class="btn btn-success">Simpan</button>
      <a href="<?php echo site_url('setting-kategori') ?>" class="btn btn-danger">Batal</a>
    </div>
  </div>
</form>
