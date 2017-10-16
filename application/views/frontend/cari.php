<legend><?php echo ucwords($title) ?></legend>

<div class="row">
  <div class="col-md-9">
    <?php if (empty($produk)): ?>
        <div class="alert alert-danger">
            <h3 align="center"> Tidak ada produk dalam keyword <?php echo $this->input->get('key') ?></h3>
        </div>
    <?php else: ?>
      <div class="row">
            <!-- BEGIN PRODUCTS -->
            <?php foreach ($produk as $p): ?>
            <div class="col-md-3 col-sm-6">
              <span class="thumbnail text-center">
                  <img src="<?php echo base_url('media/img/produk/'.$p['img']) ?>" class="gambar" style="height: 150px" width="350" height="100" alt="...">
                  <p class="text-danger"><?php echo ucwords($p['nama']) ?></p>
              <p>Rp. <?php echo number_format($p['harga']).",- /Roll" ?></p>
                  <hr class="line">
                  <div class="row">
                      <a href="<?php echo site_url('produk/detail/'.$p['kode_produk'].'_'.url_title($p['nama'])) ?>" class="btn btn-success btn-sm">Lihat Detail</a>

                      <?php if ($this->session->userdata('m_login') == true): ?>
                        <form action="<?php echo site_url() ?>"></form>
                      <?php endif ?>
                  </div>
              </span>
            </div>
            <?php endforeach ?>
            <!-- END PRODUCTS -->
        </div>
    <?php endif; ?>
  </div>
  <div class="col-md-3">
    <?php $this->load->view('frontend/sidebar_kanan') ?>
  </div>
</div>
