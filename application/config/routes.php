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
|	https://codeigniter.com/userguide3/general/routing.html
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
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

// Halaman publik (URL bersih tanpa index.php)
$route['profil']              = 'profil';
$route['hak-anak']            = 'hak_anak';
$route['hak-anak/(:num)']     = 'hak_anak/detail/$1';
$route['program']             = 'program';
$route['program/(:num)']      = 'program/detail/$1';
$route['berita']              = 'berita';
$route['berita/(:num)']       = 'berita/detail/$1';
$route['galeri']              = 'galeri';
$route['galeri/(:num)']       = 'galeri/detail/$1';
$route['paparan']             = 'paparan';
$route['paparan/unduh/(:num)']= 'paparan/unduh/$1';
$route['paparan/baca/(:num)'] = 'paparan/baca/$1';
$route['kontak']              = 'kontak';
$route['kontak/kirim']        = 'kontak/kirim';

// Panel admin
$route['admin-login']         = 'admin_login';
$route['admin-login/auth']    = 'admin_login/auth';
$route['admin-logout']        = 'admin_login/logout';
$route['admin']               = 'admin';
$route['admin-klaster']       = 'admin_klaster';
$route['admin-program']       = 'admin_program';
$route['admin-program/(:any)']= 'admin_program/$1';
$route['admin-berita']        = 'admin_berita';
$route['admin-berita/(:any)'] = 'admin_berita/$1';
$route['admin-galeri']              = 'admin_album';
$route['admin-galeri/(:any)']       = 'admin_album/$1';
$route['admin-galeri/(:any)/(:num)']= 'admin_album/$1/$2';
$route['admin-album']               = 'admin_album';
$route['admin-album/(:any)']        = 'admin_album/$1';
$route['admin-album/(:any)/(:num)'] = 'admin_album/$1/$2';
$route['admin-paparan']       = 'admin_paparan';
$route['admin-paparan/(:any)']= 'admin_paparan/$1';
$route['admin-pesan']         = 'admin_pesan';
$route['admin-pesan/(:any)']  = 'admin_pesan/$1';
$route['admin-profil']        = 'admin_profil';
$route['admin-profil/(:any)'] = 'admin_profil/$1';
$route['admin-beranda']       = 'admin_beranda';
$route['admin-beranda/(:any)']= 'admin_beranda/$1';
