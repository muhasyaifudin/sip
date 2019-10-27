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

$route['penduduk']['GET'] = 'PendudukController';
$route['penduduk/get_data']['GET'] = 'PendudukController/get_data';
$route['penduduk/insert']['POST'] = 'PendudukController/insert';
$route['penduduk/update']['POST'] = 'PendudukController/update';
$route['penduduk/delete/(:num)']['GET'] = 'PendudukController/delete/$1';


$route['kematian']['GET'] = 'KematianController';
$route['kematian/get_data']['GET'] = 'KematianController/get_data';
$route['kematian/insert']['POST'] = 'KematianController/insert';
$route['kematian/update']['POST'] = 'KematianController/update';
$route['kematian/delete/(:num)']['GET'] = 'KematianController/delete/$1';


$route['kelahiran']['GET'] = 'KelahiranController';
$route['kelahiran/get_data']['GET'] = 'KelahiranController/get_data';
$route['kelahiran/insert']['POST'] = 'KelahiranController/insert';
$route['kelahiran/update']['POST'] = 'KelahiranController/update';
$route['kelahiran/delete/(:num)']['GET'] = 'KelahiranController/delete/$1';

$route['perpindahan']['GET'] = 'PerpindahanController';
$route['perpindahan/get_data']['GET'] = 'PerpindahanController/get_data';
$route['perpindahan/insert']['POST'] = 'PerpindahanController/insert';
$route['perpindahan/update']['POST'] = 'PerpindahanController/update';
$route['perpindahan/delete/(:num)']['GET'] = 'PerpindahanController/delete/$1';

$route['kedatangan']['GET'] = 'KedatanganController';
$route['kedatangan/get_data']['GET'] = 'KedatanganController/get_data';
$route['kedatangan/insert']['POST'] = 'KedatanganController/insert';
$route['kedatangan/update']['POST'] = 'KedatanganController/update';
$route['kedatangan/delete/(:num)']['GET'] = 'KedatanganController/delete/$1';

$route['ganti_password'] = 'AuthController/ganti_password';
$route['ganti_password_submit'] = 'AuthController/ganti_password_submit';






