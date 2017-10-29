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

    <title><?php echo $title  ?> | Toko Online BadjaTex</title>


    <!-- Bootstrap core CSS -->
    <link href="<?php echo assets_url; ?>bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo assets_url ?>font-awesome/css/font-awesome.min.css">
		<!-- Datatables -->
		<link rel="stylesheet" href="<?php echo assets_url ?>datatables/dataTables.bootstrap.css">
		

        <!-- Date Picker -->
		<link rel="stylesheet" href="<?php echo assets_url ?>datepicker/datepicker3.css">

		<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<style>
		.navbar{
			border-radius: 0;
		}
	</style>

	<link rel="stylesheet" href="<?php echo base_url('media/custom.css') ?>">


    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?php echo assets_url ?>jQuery-2.1.4.min.js"></script>
    <script src="<?php echo assets_url ?>bootstrap/js/bootstrap.min.js"></script>

  <body>
<div id="flipkart-navbar">
	<script>
			function openNav() {
			    document.getElementById("mySidenav").style.width = "70%";
			    // document.getElementById("flipkart-navbar").style.width = "50%";
			    document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
			}

			function closeNav() {
			    document.getElementById("mySidenav").style.width = "0";
			    document.body.style.backgroundColor = "rgba(0,0,0,0)";
			}
	</script>
    <div class="container">
        <div class="row row1">
            <ul class="largenav pull-right">
                <li class="upper-links"><a class="links" href="<?php echo base_url() ?>">Beranda</a></li>
                <li class="upper-links"><a class="links" href="<?php echo site_url('tentang-kami') ?>">Tentang Kami</a></li>
                <li class="upper-links"><a class="links" href="<?php echo site_url('cara-belanja') ?>">Cara Belanja</a></li>
                <li class="upper-links"><a class="links" href="<?php echo site_url('hubungi-kami') ?>">Hubungi Kami</a></li>
                <?php if ($this->session->userdata('m_login') == true): ?>
                <li class="upper-links dropdown"><a class="links" href="#">Menu Member <i class="fa fa-cog"></i></a>
                    <ul class="dropdown-menu">
                        <li class="profile-li"><a class="profile-links" href="<?php echo site_url('profil-anda') ?>">Profil</a></li>
                        <li class="profile-li"><a class="profile-links" href="<?php echo site_url('member-logout') ?>">Logout</a></li>
                    </ul>
                </li>
                <?php else: ?>
	                <li class="upper-links"><a class="links" href="<?php echo site_url('member-area') ?>">Member Area</a></li>
                <?php endif ?>
            </ul>
        </div>
        <div class="row row2">
            <div class="col-sm-2">
                <h2 style="margin:0px;"><span class="smallnav menu" onclick="openNav()"s>Badjatex</span></h2>
                <h1 style="margin:0px;"><span class="largenav">Badjatex</span></h1>
            </div>
            <div class="flipkart-navbar-search smallsearch col-sm-8 col-xs-11">
                <div class="row">
                  <form action="<?php echo site_url('search') ?>" method="get">
                    <input class="flipkart-navbar-input col-xs-11" type="text" placeholder="Cari Produk Kami Disini" name="key">
                    <button type="submit" class="flipkart-navbar-button col-xs-1">
                     	<i class="fa fa-search"></i>
                    </button>
                  </form>
                </div>
            </div>
        </div>
        <center>
            <ul class="largenav">
                <?php
                    $kat = $this->db->query('SELECT * FROM kategori ORDER BY id_kategori DESC LIMIT 5')->result_array();

                    foreach ($kat as $k)
                    {
                        echo '<li class="upper-links"><a class="links" href="'.site_url('kategori/'.$k['id_kategori']).'">'.ucwords($k['nama']).'</a></li>';
                    }
                ?>
            </ul>
        </center>
    </div>
</div>
<div id="mySidenav" class="sidenav">
    <div class="container" style="background-color: #2874f0; padding-top: 10px;">
        <span class="sidenav-heading">Home</span>
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
    </div>
    <a href="http://clashhacks.in/">Link</a>
    <a href="http://clashhacks.in/">Link</a>
    <a href="http://clashhacks.in/">Link</a>
    <a href="http://clashhacks.in/">Link</a>
</div>

    <div class="container" style="margin-top: 10px;">
		<?php echo $_content ?>
    </div><!-- /.container -->



<footer>
    <div class="footerHeader" ></div>
    <div class="container">
		<div class="col-md-4" >
		    <h3>Tentang Kami</h3>
		    <p>
		        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
		    </p>
		</div>

		<div class="col-md-4">
		    <h3>Lokasi Badjatex </h3>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7920.5788985992!2d107.60580623221216!3d-6.9751364702454195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e904ae394787%3A0x66f52729f4abaea8!2sBadjatex!5e0!3m2!1sid!2sid!4v1508638048876" width="400" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
    </div>
		<div class="col-md-4" >
		    <h3>Kontak Kami</h3>
		    <ul>
		        <li>Phone : 123 - 456 - 789</li>
		        <li>E-mail : info@comapyn.com</li>
		        <li>Fax : 123 - 456 - 789</li>
		    </ul>
		    <p>
		        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
		    </p>
		    <ul class="sm">
		        <li><a href="#" ><img src="https://www.facebook.com/images/fb_icon_325x325.png" class="img-responsive"></a></li>
		        <li><a href="#" ><img src="https://lh3.googleusercontent.com/00APBMVQh3yraN704gKCeM63KzeQ-zHUi5wK6E9TjRQ26McyqYBt-zy__4i8GXDAfeys=w300" class="img-responsive" ></a></li>
		        <li><a href="#" ><img src="http://playbookathlete.com/wp-content/uploads/2016/10/twitter-logo-4.png" class="img-responsive"  ></a></li>
		    </ul>
		</div>
    </div>
</footer>

<style>
.scroll-top-wrapper{position:fixed;opacity:0;visibility:hidden;overflow:hidden;text-align:center;z-index:99999999;background-color:#777;color:#eee;width:50px;height:48px;line-height:48px;right:30px;bottom:30px;padding-top:2px;-webkit-transition:all .5s ease-in-out;-moz-transition:all .5s ease-in-out;-ms-transition:all .5s ease-in-out;-o-transition:all .5s ease-in-out;transition:all .5s ease-in-out;border-radius:10px}.scroll-top-wrapper:hover{background-color:#888}.scroll-top-wrapper.show{visibility:visible;cursor:pointer;opacity:1}.scroll-top-wrapper i.fa{line-height:inherit}
</style>

<div class="scroll-top-wrapper ">
  <span class="scroll-top-inner">
    <i class="fa fa-2x fa-arrow-circle-up"></i>
  </span>
</div>

        <!-- datatables -->
        <script src="<?php echo assets_url ?>datatables/jquery.dataTables.min.js"></script>
        <script src="<?php echo assets_url ?>datatables/dataTables.bootstrap.js"></script>


<script>
//Thanks to: http://www.webtipblog.com/adding-scroll-top-button-website/

$(document).ready(function(){

$(function(){

    $(document).on( 'scroll', function(){

    	if ($(window).scrollTop() > 100) {
			$('.scroll-top-wrapper').addClass('show');
		} else {
			$('.scroll-top-wrapper').removeClass('show');
		}
	});

	$('.scroll-top-wrapper').on('click', scrollToTop);
});

function scrollToTop() {
	verticalOffset = typeof(verticalOffset) != 'undefined' ? verticalOffset : 0;
	element = $('body');
	offset = element.offset();
	offsetTop = offset.top;
	$('html, body').animate({scrollTop: offsetTop}, 500, 'linear');
}

});
</script>

    <script>
        $(function(){
            $("#datatable").dataTable();
        })
    </script>

  </body>
</html>
