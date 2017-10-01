	<blockquote align="center">
		LOGIN ADMINISTRATOR TOKO KAIN
		<small>Silahkan login aplikasi pada form dibawah</small>
	</blockquote>
	<div class="row">
		<div class="col-lg-4">
			<center>
				<img src="<?php echo base_url('media/login_icon.png') ?>" alt="">	
			</center>			
		</div>
		<div class="col-lg-6">
			<div class="panel panel-primary">
				<div class="panel-heading"><i class="fa fa-sign-in"></i> Panel Login</div>
				<div class="panel-body">
					<?php echo $this->session->flashdata('login_notif'); ?>
					<form action="<?php echo site_url('auth_controller/do_login') ?>" method="post" id="form-login">
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-user"></i></div>
								<input type="text" class="form-control" id="username" name="username" placeholder="Masukan Username">
								<?php echo form_error('username') ?>
							</div>
						</div>
						<div class="form-group">
							<div class="input-group">
								<div class="input-group-addon"><i class="fa fa-key"></i></div>
								<input type="password" class="form-control" id="password" name="password" placeholder="Masukan Password">
							</div>
							<?php echo form_error('password') ?>
						</div>
						<div class="form-group">
							<button type="submit" class="btn btn-success" name="login"><i class="fa fa-sign-in"></i> Login </button>
							<a href="<?php echo site_url('beranda') ?>" class="btn btn-warning"><i class="fa fa-home"></i> Kembali Ke Beranda</a>
						</div>
					</form> 
				</div>
			</div>			
		</div>
	</div>