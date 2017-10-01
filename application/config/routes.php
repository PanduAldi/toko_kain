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
$route['kategori/(:num)_(:any)'] = "front_produk/by_kategori/$1_$2";

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
$route['ambil-kode'] = "produk_controller/ambil_kode";

