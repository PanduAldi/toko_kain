
<style media="screen">
.specialities {margin: 10px auto;}
.specialities img{width: 120px;}
.specialities h2{
font-family: 'opensans-bold';
font-size: 25px;
padding-left:10px;
padding-top: 0;
margin-top:0px;  }

.specialities{display:flex;align-items:center;}
</style>

<div class="container">
	<div class="row">
		<a href="<?php echo site_url('edit-profil') ?>">
       <div class="col-md-4">
        <div class="specialities">
            <?php
                $jk = ($this->session->userdata('m_jk') == 'l')?'<img src="'.base_url('media/img/icon/boy.png').'" alt="">':'<img src="'.base_url('media/img/icon/girl.png').'" alt="">';
                echo $jk;
            ?>
            <h2 style="">Edit Profil</h2>
        </div>
      </div>
     </a>
     <a href="<?php echo site_url('edit-alamat') ?>">
       <div class="col-md-4">
        <div class="specialities">
            <img src="<?php echo base_url('media/img/icon/house.png') ?>" alt="">
            <h2 style="">Edit Alamat</h2>
        </div>
      </div>
     </a>
     <a href="<?php echo site_url('pembayaran-anda') ?>">
       <div class="col-md-4">
        <div class="specialities">
            <img src="<?php echo base_url('media/img/icon/credit-card.png') ?>" alt="">
            <h2 style="">Pembayaran Anda</h2>
        </div>
      </div>
     </a>
     <a href="<?php echo site_url('pemesanan-anda') ?>">
       <div class="col-md-4">
        <div class="specialities">
            <img src="<?php echo base_url('media/img/icon/cart.png') ?>" alt="">
            <h2 style="">Pemesanan Anda</h2>
        </div>
      </div>
     </a>
	</div>
</div>
