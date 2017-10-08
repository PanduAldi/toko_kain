<legend><?php echo $title ?></legend>

<form action="" method="post" name="f_bank" enctype="multipart/form-data" class="form-horizontal">
  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="nama">Nama Bank :</label>
    <div class="col-md-3">
    <input  type="text" id="nama" name="nama" placeholder="Masukan Nama Bank" class="form-control input-md text-uppercase" value="<?php echo $bank['nama'] ?>" required="">
    </div>
  </div>

  <!-- Text input-->
  <div class="form-group">
    <label class="col-md-4 control-label" for="kode">Nomor Rekening :</label>
    <div class="col-md-4">
      <input name="no_rek" id="no_rek" type="text" class="form-control input-md text-uppercase" value="<?php echo $bank['no_rek'] ?>" required="">
    </div>
  </div>

  <div class="form-group">
    <label for="" class="col-md-4 control-label">Atas Nama :</label>
    <div class="col-md-4">
      <input type="text" name="an" class="form-control" id="" value="<?php echo $bank['an'] ?>" placeholder="">
    </div>
  </div>

  <div class="form-group">
    <label for="" class="col-md-4 control-label">Gambar :</label>
    <div class="col-md-4">
      <input type="file" name="img" accept="image/*" class="form-control" id="" placeholder="">
      <p><small></small></p>
    </div>
  </div>

  <!-- Button (Double) -->
  <div class="form-group">
    <label class="col-md-4 control-label" for="simpan"></label>
    <div class="col-md-8">
      <button type="submit" id="simpan" name="simpan" class="btn btn-success">Simpan</button>
      <a href="<?php echo site_url('setting-bank') ?>" class="btn btn-danger">Batal</a>
    </div>
  </div>
</form>
