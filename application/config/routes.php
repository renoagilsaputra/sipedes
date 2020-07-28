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
$route['default_controller'] = 'Home';

$route['pengaduan'] = 'Home/pengaduan';

$route['visimisi'] = 'Home/visimisi';
$route['sejarah'] = 'Home/sejarah';
$route['perangkatdesa'] = 'Home/perangkatdesa';
$route['demografi'] = 'Home/demografi';
$route['fasilitas'] = 'Home/fasilitas';
$route['pelayanan'] = 'Home/pelayanan';
$route['peta'] = 'Home/peta';
$route['galeri'] = 'Home/galeri';
$route['kontak'] = 'Home/kontak';

$route['petugas'] = 'Petugas';
// Pengaduan
$route['petugas/laporan-pengaduan'] = 'Petugas/laporanPengaduan';
$route['petugas/pengaduan/status/edit'] = 'Petugas/editStatusPengaduan';
$route['petugas/pengaduan/hapus/(:any)'] = 'Petugas/pengaduan_del/$1';
// Penduduk
$route['petugas/penduduk'] = 'Petugas/penduduk';
$route['petugas/penduduk/tambah'] = 'Petugas/addPenduduk';
$route['petugas/penduduk/edit/(:any)'] = 'Petugas/editPenduduk/$1';
$route['petugas/penduduk/hapus/(:any)'] = 'Petugas/delPenduduk/$1';
$route['petugas/penduduk/gantisandi/(:any)'] = 'Petugas/sandiPenduduk/$1';
// Pelayanan
$route['petugas/pelayanan'] = 'Petugas/pelayanan';
$route['petugas/pelayanan/tambah'] = 'Petugas/pelayanan_add';
$route['petugas/pelayanan/edit/(:any)'] = 'Petugas/pelayanan_edit/$1';
$route['petugas/pelayanan/hapus/(:any)'] = 'Petugas/pelayanan_del/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
