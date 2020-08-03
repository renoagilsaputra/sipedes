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
// Cetak
$route['petugas/pelayanan/cetak/(:any)'] = 'Petugas/pelayanan_cetak/$1';
$route['petugas/suket/cetak/(:any)'] = 'Petugas/suket_cetak/$1';
$route['petugas/belum_menikah/cetak/(:any)'] = 'Petugas/belum_menikah_cetak/$1';
$route['petugas/sudah_nikah/cetak/(:any)'] = 'Petugas/sudah_nikah_cetak/$1';
$route['petugas/tdk_mampu/cetak/(:any)'] = 'Petugas/tdk_mampu_cetak/$1';
$route['petugas/usaha/cetak/(:any)'] = 'Petugas/usaha_cetak/$1';
$route['petugas/cerai/cetak/(:any)'] = 'Petugas/cerai_cetak/$1';
$route['petugas/suket_nikah/cetak/(:any)'] = 'Petugas/suket_nikah_cetak/$1';
$route['petugas/suket_mati/cetak/(:any)'] = 'Petugas/suket_mati_cetak/$1';
$route['petugas/acara/cetak/(:any)'] = 'Petugas/acara_cetak/$1';
$route['petugas/akta/cetak/(:any)'] = 'Petugas/akta_cetak/$1';
$route['petugas/pindah/cetak/(:any)'] = 'Petugas/pindah_cetak/$1';
$route['petugas/skck/cetak/(:any)'] = 'Petugas/skck_cetak/$1';
$route['petugas/usaha/cetak/(:any)'] = 'Petugas/usaha_cetak/$1';
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
// Kependudukan
$route['petugas/kependudukan'] = 'Petugas/kependudukan';
$route['petugas/kependudukan/tambah'] = 'Petugas/kependudukan_add';
$route['petugas/kependudukan/edit/(:any)'] = 'Petugas/kependudukan_edit/$1';
$route['petugas/kependudukan/hapus/(:any)'] = 'Petugas/kependudukan_del/$1';
// Akta Kelahiran
$route['petugas/akta'] = 'Petugas/akta';
$route['petugas/akta/tambah'] = 'Petugas/akta_add';
$route['petugas/akta/edit/(:any)'] = 'Petugas/akta_edit/$1';
$route['petugas/akta/hapus/(:any)'] = 'Petugas/akta_del/$1';
// Surat Keterangan Menikah
$route['petugas/suket_nikah'] = 'Petugas/suket_nikah';
$route['petugas/suket_nikah/tambah'] = 'Petugas/suket_nikah_add';
$route['petugas/suket_nikah/edit/(:any)'] = 'Petugas/suket_nikah_edit/$1';
$route['petugas/suket_nikah/hapus/(:any)'] = 'Petugas/suket_nikah_del/$1';
// Surat Keterangan Mati
$route['petugas/suket_mati'] = 'Petugas/suket_mati';
$route['petugas/suket_mati/tambah'] = 'Petugas/suket_mati_add';
$route['petugas/suket_mati/edit/(:any)'] = 'Petugas/suket_mati_edit/$1';
$route['petugas/suket_mati/hapus/(:any)'] = 'Petugas/suket_mati_del/$1';
// Surat Keterangan Pindah
$route['petugas/suket_pindah'] = 'Petugas/suket_pindah';
$route['petugas/suket_pindah/tambah'] = 'Petugas/suket_pindah_add';
$route['petugas/suket_pindah/edit/(:any)'] = 'Petugas/suket_pindah_edit/$1';
$route['petugas/suket_pindah/hapus/(:any)'] = 'Petugas/suket_pindah_del/$1';

$route['petugas/keluarga_pindah/(:num)'] = 'Petugas/keluarga_pindah/$1';
$route['petugas/keluarga_pindah/tambah'] = 'Petugas/keluarga_pindah_add';
$route['petugas/keluarga_pindah/edit'] = 'Petugas/keluarga_pindah_edit';
$route['petugas/keluarga_pindah/hapus/(:any)'] = 'Petugas/keluarga_pindah_del/$1';
// Izin Acara
$route['petugas/izin_acara'] = 'Petugas/izin_acara';
$route['petugas/izin_acara/tambah'] = 'Petugas/izin_acara_add';
$route['petugas/izin_acara/edit/(:any)'] = 'Petugas/izin_acara_edit/$1';
$route['petugas/izin_acara/hapus/(:any)'] = 'Petugas/izin_acara_del/$1';
// Izin Usaha
$route['petugas/izin_usaha'] = 'Petugas/izin_usaha';
$route['petugas/izin_usaha/tambah'] = 'Petugas/izin_usaha_add';
$route['petugas/izin_usaha/edit/(:any)'] = 'Petugas/izin_usaha_edit/$1';
$route['petugas/izin_usaha/hapus/(:any)'] = 'Petugas/izin_usaha_del/$1';
// Kasi
$route['petugas/kasi'] = 'Petugas/kasi';
$route['petugas/kasi/tambah'] = 'Petugas/kasi_add';
$route['petugas/kasi/edit/(:any)'] = 'Petugas/kasi_edit/$1';
$route['petugas/kasi/hapus/(:any)'] = 'Petugas/kasi_del/$1';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
