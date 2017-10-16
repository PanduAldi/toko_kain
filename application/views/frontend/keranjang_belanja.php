<legend><?php echo ucwords($title) ?></legend>
<form method="post" action="<?php echo site_url('update-keranjang') ?>">

<table class="table table-bordered table-striped">
  <tr>
    <th>No</th>
    <th>Gambar</th>
    <th>Nama Kain</th>
    <th>Harga</th>
    <th>Jumlah Beli</th>
    <th>Subtotal</th>
    <th>#</th>
  </tr>
  <?php if (!$this->cart->contents()): ?>
    <tr>
      <td colspan="7" align="center"> Tidak ada apapun di Keranjang Belanja <br> <a href="<?php echo base_url() ?>" class="btn btn-warning">Lanjutkan Belanja</a></td>
    </tr>
  <?php else: ?>
    <?php  $no=1; foreach ($this->cart->contents() as $item): ?>
      <input type="hidden" name="id[]" value="<?php echo $item['rowid'] ?>">
      <tr>
        <td align="center" width="50"><strong><?php echo $no++."." ?></strong> </td>
        <td width="200"><img src="<?php echo base_url('media/img/produk/'.$item['options']['img']) ?>" width="100" height="100" alt=""></td>
        <td><label class="control-label"><?php echo $item['name'] ?></label></td>
        <td><?php echo "Rp. ".$this->cart->format_number($item['price']) ?></td>
        <td width="140">
          <div class="col-md-9">
            <select class="form-control" name="qty[]">
              <?php
                for ($i=5; $i < 100 ; $i++) {
                  $select = ($item['qty'] == $i)?"selected":"";

                  echo '<option value="'.$i.'" '.$select.'>'.$i.'</option>';
                }
              ?>
            </select>
          </div>
          <span> Roll</span>
        </td>
        <td><?php echo "Rp. ".$this->cart->format_number($item['subtotal']) ?></td>
        <td><a href="<?php echo site_url('hapus-keranjang/'.$item['rowid']) ?>" class="btn btn-danger btn-sm">Hapus</a></td>
      </tr>
    <?php endforeach ?>

    <tr>
      <td colspan="5" align="right"><strong>Total Belanja</strong></td>
      <td colspan="2"><strong><?php echo "Rp. ".$this->cart->format_number($this->cart->total()) ?></strong></td>
    </tr>

  <?php endif; ?>
</table>


<?php if ($this->session->userdata('m_login') == true && !empty ($this->cart->contents())): ?>
  <button type="submit" class="btn btn-primary" name="update_jumlah"><i class="fa fa-edit"></i>  Update Jumlah Belanja</button>
  <a href="<?php echo base_url() ?>" class="btn btn-warning"> <i class="fa fa-shopping-cart"></i> Lanjutkan Belanja</a>
  <a href="<?php echo site_url('lanjutkan-transaksi') ?>" class="btn btn-success"><i class="fa fa-money"></i> Lanjutkan Transaksi</a>
<br><br>
<?php else: ?>
  <br>
  <br>
  <br>
  <br>
<?php endif; ?>

</form>
