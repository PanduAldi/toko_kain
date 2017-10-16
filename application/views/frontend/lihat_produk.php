<div class="row">
  <div class="col-md-9">
    <div class="row">
      <div class="col-md-4">
        <img src="<?php echo base_url('media/img/produk/'.$d['img']) ?>" width="250" height="300" alt="">
      </div>
      <div class="col-md-8">
        <table class="table table-striped">
          <tr>
            <td colspan="3"><h4><?php echo $d['nama'] ?></h4></td>
          </tr>
          <tr>
            <td><label for="" class="control-label"> Kategori</label></td>
            <td>:</td>
            <td><?php echo $d['kategori'] ?></td>
          </tr>
          <tr>
            <td><label for="" class="control-label"> Harga</label></td>
            <td>:</td>
            <td><?php echo "Rp. ".number_format($d['harga'])." / Roll" ?></td>
          </tr>
          <tr>
            <td colspan="3"><label for="" class="control-label"> Deskripsi :</label></td>
          </tr>
          <tr>
            <td colspan="3">
              <?php echo $d['deskripsi'] ?>
            </td>
          </tr>
          <tr>
            <td><label for="" class="control-label"> Stok</label></td>
            <td>:</td>
            <td><?php echo $d['stok']." Roll" ?></td>
          </tr>
          <tr>
            <td colspan="3">
              <?php if ($this->session->userdata('m_login') == true): ?>
                  <button type="button" onclick="beli('<?php echo $d['kode_produk'] ?>')" class="btn btn-success btn-block"><i class="fa fa-shopping-cart"></i> Beli Kain Ini</button>
              <?php else: ?>
                <button type="button" class="btn btn-success" disabled><i class="fa fa-shopping-cart"></i> Beli Kain Ini</button> <span>Anda tidak dapat berbelanja di toko kami sebelum login member.</span>
            <?php endif; ?>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>
  <div class="col-md-3">
    <?php $this->load->view('frontend/sidebar_kanan') ?>
  </div>
</div>

<div class="alert alert-warning"><i class="fa fa-warning"></i> Minimal Pembelian 5 Roll</div>

<script>

  function beli(e)
  {
    $.ajax({
      url : "<?php echo site_url('tambah-keranjang') ?>",
      type : "POST",
      data : { kode : e },
      success : function(){
        location.href = "<?php echo site_url('keranjang-belanja') ?>";
      }
    })
  }

</script>
