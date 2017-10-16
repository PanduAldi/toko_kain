<legend><?php echo $title ?></legend>

<div class="row">
  <div class="col-lg-6">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Login Member</h3>
      </div>
      <div class="panel-body">
        <div class="notif">
          <?php echo $this->session->flashdata('notif_login') ?>
        </div>
        <form action="<?php echo site_url('do_member_login') ?>" method="post">
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" class="form-control" name="email" id="" placeholder="Masukan Email Anda">
              <p class="help-block"><?php echo form_error('username') ?></p>
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control" id="" placeholder="Masukan Password Anda">
              <p class="help-block"><?php echo form_error('password') ?></p>
            </div>

      </div>
      <div class="panel-footer">
        <button type="submit" name="login" class="btn btn-success">Login</button>
            </form>
      </div>
    </div>
  </div>
  <div class="col-lg-6">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Registrasi Member</h3>
        </div>
        <div class="panel-body">

          <div class="notif">
            <?php echo $this->session->flashdata('notif_register') ?>
          </div>
          <form action="<?php echo site_url('register-member') ?>" method="post">
            <div class="form-group">
              <label for="">Nama Lengkap :</label>
              <input type="text" name="nama" class="form-control" id="" placeholder="Masukan nama anda" required>
            </div>
            <div class="form-group">
              <label for="">Jenis Kelamin :</label>
              <select class="form-control" name="jk" required>
                <option value="">==> Pilih Jenis Kelamin <==</option>
                <option value="l">Laki - Laki</option>
                <option value="p">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Email :</label>
              <input type="email" name="email" class="form-control" id="" placeholder="" required>
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="password" class="form-control" id="" placeholder="">
              <p class="help-block">Password ini digunakan untuk masuk/login ke member page.</p>
            </div>
            <div class="form-group">
              <label for="">Alamat :</label>
              <textarea name="alamat" rows="5" class="form-control" placeholder="Masukan Alamat Lengkap Anda, agar mempermudah kami untuk pengiriman setiap anda belanja"></textarea>
            </div>

            <div class="form-group">
              <label for="">Provinsi :</label>
              <select onchange="pilih_provinsi(this.value)" class="form-control" id="provinsi" name="provinsi">
                  <option value=""> ==> Pilih Provinsi  <== </option>
                  <?php
                      $a = file_get_contents(site_url('ambil-provinsi'));

                      $json = json_decode($a, true);

                      foreach ($json['rajaongkir']['results'] as $v) {
                         echo '<option value="'.$v['province_id'].'|'.$v['province'].'">'.$v['province'].'</option>';
                      }
                  ?>
              </select>
            </div>

            <div class="form-group">
              <label for="">Kota / Kabupaten :</label>
              <select class="form-control kota" name="kota">
                <option  value="">==> Pilih Kota <==</option>
                <option value="">Anda Harus memilih provinsi terlebih dahulu.</option>
              </select>
            </div>

            <div class="form-group">
              <label for="">No Telp / HP :</label>
              <input type="text" name="telp" class="form-control" id="" placeholder="Masukan nomer Telp / HP anda">
            </div>

        </div>
        <div class="panel-footer">
            <button type="submit" name="register" class="btn btn-primary">Register Member</button>
        </form>
        </div>
      </div>
  </div>
</div>

<blockquote>
<small>
  <ul>
    <li>Silahkan login pada panel diatas</li>
    <li>Jika anda belum memiliki akun. Silahkan ke panel registrasi member. a</li>
  </ul>
</small>
</blockquote>


<script type="text/javascript">

  function pilih_provinsi(e)
  {
    $(function(){
        var id = e.split('|');

        if (!e) {
          var prov = '<option  value="">==> Pilih Kota <==</option>';
              prov += '<option value="">Anda Harus memilih provinsi terlebih dahulu.</option>';

          $('.kota').html(prov);
        }
        else {
          $.ajax({
            url : '<?php echo site_url('member_get_city') ?>',
            type : 'POST',
            data : { id : id[0] },
            beforeSend : function(){
              $('.kota').html("Mohon tunggu sebentar...");
            },
            success : function(e)
            {
              $(".kota").html(e);
            }
          })
        }

    })
  }

</script>

<script>
    $(function(){
      $(".notif").delay(3000).hide(500);
    })
</script>
