<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/favicon.ico">

    <title><?php echo $title ?> | Toko Kain</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo assets_url; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo assets_url ?>font-awesome/css/font-awesome.min.css">


		<!-- Datatables -->
		<link rel="stylesheet" href="<?php echo assets_url ?>datatables/dataTables.bootstrap.css">

		<!-- Date Picker -->
		<link rel="stylesheet" href="<?php echo assets_url ?>datepicker/datepicker3.css">

	<style>

		.navbar{
			border-radius: 0px;
		}


		/* Footer */

		footer{

		    bottom: 0;
		    left: 0;
		    right: 0;
		    height: 35px;
		    text-align: center;
		}

		footer p {
		    padding: 10.5px;
		    margin: 0px;
		    line-height: 100%;
		}
	</style>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo assets_url; ?>jQuery-2.1.4.min.js"></script>
    <script src="<?php echo assets_url ?>bootstrap/js/bootstrap.min.js"></script>


  </head>

  <body>
  	<?php if ($this->session->userdata('u_login') == false): ?>
  		<div class="container">
  			<?php echo $_content ?>
  		</div>
  	<?php else: ?>
	<nav class="navbar navbar-default" role="navigation">
		<div class="container-fluid">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="#">Panel Administrator</a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse navbar-ex1-collapse">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="<?php echo site_url('dashboard') ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li><a href="<?php echo site_url('setting-kategori') ?>"><i class="fa fa-list"></i> Kategori</a></li>
					<li><a href="<?php echo site_url('setting-produk') ?>"><i class="fa fa-cubes"></i> Produk</a></li>
					<li><a href="<?php echo site_url('setting-pemesanan') ?>"><i class="fa fa-shopping-cart"></i> Pemesananan</a></li>
					<li><a href="<?php echo site_url('setting-user') ?>"><i class="fa fa-user"></i> User</a></li>
          <li><a href="<?php echo site_url('setting-member') ?>"></a></li>
          <li><a href="<?php echo site_url('setting-bank') ?>"><i class="fa fa-credit-card"></i> Setting Bank</a></li>
          <li><a href="<?php echo site_url('logout') ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
          <!-- <li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="#">Action</a></li>
							<li><a href="#">Another action</a></li>
							<li><a href="#">Something else here</a></li>
							<li><a href="#">Separated link</a></li>
						</ul>
					</li> -->
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</nav>

    <div class="container">
		<?php echo $_content; ?>
    </div><!-- /.container -->

	<div class="modal fade" id="hapus_modal">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">Hapus</div>
				<div class="modal-body">
					<input type="hidden" name="id_hapus">
					<input type="hidden" name="url">
					Apakah yakin menghapus data ini??
				</div>
		          <div class="modal-footer">
		            <button type="button" id="hapus_data" class="btn btn-success">Ya</button>
		            <button type="button" class="btn btn-danger" onclick="location.reload()">Tidak</button>
		          </div>

			</div>
		</div>
	</div>
  	<?php endif ?>

	<footer>
        <p>© <?php echo date('Y') ?> Toko Kain Online, All rights.</p>
    </footer>

		<!-- datatables -->
		<script src="<?php echo assets_url ?>datatables/jquery.dataTables.min.js"></script>
		<script src="<?php echo assets_url ?>datatables/dataTables.bootstrap.js"></script>

		<!-- datepicker -->
		<script src="<?php echo assets_url ?>datepicker/bootstrap-datepicker.js"></script>


	<script>
		function hapus(id, link)
		{
			$(function(){
				$("#hapus_modal").modal({
					'keyboard' : false,
					'backdrop' : false
				});

				$("input[name=id_hapus]").val(id);
				$("input[name=url]").val(link);
			});
		}

			$(function(){
	            $("#hapus_data").click(function(){
	                var id = $("input[name=id_hapus]").val();
	                var link = $("input[name=url]").val();

	                $.ajax({
	                  url : "<?php echo site_url() ?>/"+link,
	                  type : "POST",
	                  data : { id : id},
	                  success : function(){
	                  	$("#hapus_modal").modal("hide");
	                  	$(".baris_"+id).fadeOut(500);
	                  }
	                })
	            });
	        })

	</script>

	<script>
		$(function(){
			$("#datatable").dataTable();
		})
	</script>


	<script>
		$(".notif").delay(3000).fadeOut(500);
	</script>

  </body>
</html>
