<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'frontend_home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**
* Frontend
*/

$route['beranda'] = "frontend_home";
$route['tentang-kami'] = "frontend_home/tentang_kami";
$route['cara-belanja'] = "frontend_home/cara_belanja";
$route['hubungi-kami'] = "frontend_home/hubungi_kami";
$route['member-area'] = "front_member";
$route['kategori/(:num)'] = "front_produk/by_kategori/$1";
$route['kategori/(:num)/(:num)'] = "front_produk/by_kategori/$1/$2";
$route['produk/detail/(:any)'] = "front_produk/detail/$1";
$route['search'] = 'front_produk/cari_produk';

#member area
$route['member-area'] = "front_member";
$route['register-member'] = "front_member/register";
$route['profil-anda'] = "front_member/profil";
$route['edit-profil'] = "front_member/edit_profil";
$route['member_get_city'] = "front_member/cari_kota";
$route['do_member_login'] = "front_member/do_login";
$route['member-logout'] = "front_member/logout";
$route['edit-alamat'] = "front_member/edit_alamat";
$route['pemesanan-anda'] = "front_member/pemesanan_anda";
$route['lihat-pemesanan/(:num)'] = "front_member/lihat_pemesanan/$1"; 
$route['form-pembayaran/(:num)'] = "front_member/form_pembayaran/$1";
$route['pembayaran-anda'] = "front_member/pembayaran_anda";

#cart
$route['keranjang-belanja'] = "front_cart";
$route['tambah-keranjang'] = "front_cart/add";
$route['update-keranjang'] = "Front_cart/edit";
$route['hapus-keranjang/(:any)'] = "front_cart/delete/$1";

//Transaksi_route
$route['konfirmasi-order'] = "front_transaksi/konfirmasi_order";
$route['order-success'] = "front_transaksi/order_sukses";


//API
$route['ambil-provinsi'] = "api_controller/get_all_province";
$route['detail-provinsi'] = "api_controller/get_detail_province";
$route['ambil-kota/(:num)'] = "api_controller/get_city_by_province/$1";
$route['detail-kota/(:num)'] = "api_controller/get_detail_city/$1";
$route['cek-ongkir/(:num)'] = "api_controller/cek_ongkir/$1";

/**
 * Backend
 */

$route['login-admin'] = "auth_controller";
$route['dashboard']  = "dashboard_controller";

$route['setting-kategori'] = "kategori_controller";
$route['tambah-kategori'] = "kategori_controller/add";
$route['ubah-kategori/(:num)'] = "kategori_controller/edit/$1";
$route['hapus-kategori'] = "kategori_controller/delete";

$route['setting-produk'] = "produk_controller";
$route['tambah-produk'] = "produk_controller/add";
$route['ubah-produk/(:num)'] = "produk_controller/edit/$1";
$route['hapus-produk'] = "produk_controller/delete";
$route['detail-produk/(:any)'] = "produk_controller/detail/$1";
$route['ambil-kode'] = "produk_controller/ambil_kode";

$route['setting-bank'] = "bank_controller";
$route['tambah-bank'] = "bank_controller/add";
$route['ubah-bank/(:num)'] = "bank_controller/edit/$1";
$route['hapus-bank'] = "bank_controller/delete";
