<legend><?php echo ucwords($title) ?></legend>

<div class="container-fluid">
	<div class="notif">
		<?php echo $this->session->flashdata('notif') ?>
	</div>

	<div class="alert alert-warning">
		<i class="fa fa-info-circle"></i> Ongkos kirim dan pengiriman barang akan menyesuaikan dengan alamat yang anda edit pada halaman ini.
	</div>
	<form action="" method="POST" class="form-horizontal" role="form">
		<div class="form-group">
			<label for="" class="col-md-3 control-label">Provinsi :</label>
			<div class="col-md-4">
              <select onchange="pilih_provinsi(this.value)" class="form-control" id="provinsi" name="provinsi" required>
                  <option value=""> ==> Pilih Provinsi  <== </option>
                  <?php
                      $a = file_get_contents(site_url('ambil-provinsi'));

                      $json = json_decode($a, true);

                      foreach ($json['rajaongkir']['results'] as $v) {
                      	$select = ($d['id_prov'] == $v['province_id'])?"selected":"";
                         echo '<option value="'.$v['province_id'].'|'.$v['province'].'" '.$select.'>'.$v['province'].'</option>';
                      }
                  ?>
              </select>
			</div>
		</div>
        <div class="form-group">
          <label for="" class="control-label col-md-3">Kota / Kabupaten :</label>
          <div class="col-md-4">
	          <select class="form-control kota" name="kota" required="">
	            <option  value="">==> Pilih Kota <==</option>
	            <?php  
	            	$kota = file_get_contents(site_url('ambil-kota/'.$d['id_prov']));

	            	$json_kota = json_decode($kota, true);

					foreach ($json_kota['rajaongkir']['results'] as $k) {
						$select = ($d['id_kab'] == $k['city_id'])?"selected":"";
						echo '<option value="'.$k['city_id'].'|'.$k['city_name'].'" '.$select.'>'.$k['city_name'].'</option>';
					}
	            ?>
	          </select>	
          </div>
        </div>

        <div class="form-group">
        	<label for="" class="col-md-3 control-label">Alamat :</label>
        	<div class="col-md-4">
        		<textarea name="alamat" class="form-control" rows="5"><?php echo $d['alamat'] ?></textarea>
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
