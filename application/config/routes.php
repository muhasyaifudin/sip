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

$route['default_controller'] = 'HomeController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/*
| -------------------------------------------------------------------------
| Database Migration
| -------------------------------------------------------------------------
*/
$route['migrate/(:num)'] = 'Migrate/index/$1';

$route['login']['GET'] = 'AuthController';
$route['login']['POST'] = 'AuthController/login';
$route['logout'] = 'AuthController/logout';

$route['admin'] = 'AdminController';

$route['admin/penduduk'] = 'PendudukController';
$route['admin/penduduk/(:any)'] = 'PendudukController/$1';
$route['admin/penduduk/(:any)/(:any)'] = 'PendudukController/$1/$1';

$route['admin/kematian'] = 'KematianController';
$route['admin/kematian/(:any)'] = 'KematianController/$1';
$route['admin/kematian/(:any)/(:any)'] = 'KematianController/$1/$1';

$route['admin/kelahiran'] = 'KelahiranController';
$route['admin/kelahiran/(:any)'] = 'KelahiranController/$1';
$route['admin/kelahiran/(:any)/(:any)'] = 'KelahiranController/$1/$1';

$route['admin/perpindahan'] = 'PerpindahanController';
$route['admin/perpindahan/(:any)'] = 'PerpindahanController/$1';
$route['admin/perpindahan/(:any)/(:any)'] = 'PerpindahanController/$1/$1';

$route['admin/kedatangan'] = 'KedatanganController';
$route['admin/kedatangan/(:any)'] = 'KedatanganController/$1';
$route['admin/kedatangan/(:any)/(:any)'] = 'KedatanganController/$1/$1';

$route['admin/pengajuan_surat'] = 'PengajuanSuratController';
$route['admin/pengajuan_surat/(:any)'] = 'PengajuanSuratController/$1';
$route['admin/pengajuan_surat/(:any)/(:any)'] = 'PengajuanSuratController/$1/$1';

$route['admin/laporan'] = 'LaporanController';
$route['admin/laporan/(:any)'] = 'LaporanController/$1';
$route['admin/laporan/(:any)/(:any)'] = 'LaporanController/$1/$1';

$route['ganti_password'] = 'AuthController/ganti_password';
$route['ganti_password_submit'] = 'AuthController/ganti_password_submit';


$route['pengajuan_surat'] = 'PublicPengajuanSurat';
$route['pengajuan_surat/(:any)'] = 'PublicPengajuanSurat/$1';
$route['pengajuan_surat/(:any)/(:any)'] = 'PublicPengajuanSurat/$1/$1';
