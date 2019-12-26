<?php

defined('BASEPATH') or exit('No direct script access allowed');

// default dari codeigniter
$route['default_controller'] = 'AwalController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = false;

// untuk route login & logout
$route['login'] = 'LoginController';
$route['ceklogin'] = 'LoginController';
$route['logout'] = 'LoginController';

// untuk route halaman awal
$route['awal'] = 'AwalController';

// untuk route user
$route['user'] = 'UserController';
$route['user/create'] = 'UserController/create';
$route['user/store'] = 'UserController/store';
$route['user/(:num)/edit'] = 'UserController/edit/$1';
$route['user/(:num)/update'] = 'UserController/update/$1';
$route['user/(:num)/destroy'] = 'UserController/destroy/$1';
$route['user/search'] = 'UserController/search';
$route['user/deleteall'] = 'UserController/deleteall';

// untuk route proyek
$route['proyek'] = 'ProyekController';
$route['proyek/create'] = 'ProyekController/create';
$route['proyek/store'] = 'ProyekController/store';
$route['proyek/(:num)/edit'] = 'ProyekController/edit/$1';
$route['proyek/(:num)/update'] = 'ProyekController/update/$1';
$route['proyek/(:num)/destroy'] = 'ProyekController/destroy/$1';
$route['proyek/search'] = 'ProyekController/search';
$route['proyek/deleteall'] = 'ProyekController/deleteall';

// untuk route uraian kerja
$route['uraian_kerja'] = 'UraianKerjaController';
$route['uraian_kerja/create'] = 'UraianKerjaController/create';
$route['uraian_kerja/create/(:num)'] = 'UraianKerjaController/create/$i';
$route['uraian_kerja/store'] = 'UraianKerjaController/store';
$route['uraian_kerja/(:num)/edit'] = 'UraianKerjaController/edit/$1';
$route['uraian_kerja/(:num)/update'] = 'UraianKerjaController/update/$1';
$route['uraian_kerja/(:num)/destroy'] = 'UraianKerjaController/destroy/$1';
$route['uraian_kerja/search'] = 'UraianKerjaController/search';
$route['uraian_kerja/deleteall'] = 'UraianKerjaController/deleteall';
$route['uraian_kerja/cari_proyek'] = 'UraianKerjaController/CariProyek';
$route['uraian_kerja/tampilkan_berdasarkan_proyek'] = 'UraianKerjaController/tampilkanBerdasarkanProyek/$1';

// untuk route uraian kerja detail
$route['uraian_kerja_detail/(:num)/destroy'] = 'UraianKerjaDetailController/destroy/$1';

// untuk route jadwal rencana
$route['jadwal_rencana'] = 'JadwalRencanaController';
$route['jadwal_rencana/store'] = 'JadwalRencanaController/store';
$route['jadwal_rencana/search'] = 'JadwalRencanaController/search';

// untuk route realisasi
$route['realisasi'] = 'RealisasiController';
$route['realisasi/store'] = 'RealisasiController/store';
$route['realisasi/search'] = 'RealisasiController/search';

// untuk route laporan
$route['laporan'] = 'LaporanController';
$route['laporan/tampilkanBerdasarkanProyek'] = 'LaporanController/tampilkanBerdasarkanProyek';

// untuk route tagihan
$route['tagihan'] = 'TagihanController';
$route['tagihan/create'] = 'TagihanController/create';
$route['tagihan/create/(:num)'] = 'TagihanController/create/$i';
$route['tagihan/store'] = 'TagihanController/store';
$route['tagihan/(:num)/edit'] = 'TagihanController/edit/$1';
$route['tagihan/(:num)/update'] = 'TagihanController/update/$1';
$route['tagihan/(:num)/destroy'] = 'TagihanController/destroy/$1';
$route['tagihan/search'] = 'TagihanController/search';
$route['tagihan/deleteall'] = 'TagihanController/deleteall';
$route['tagihan/tampilkan_berdasarkan_proyek/(:num)'] = 'TagihanController/tampilkanBerdasarkanProyek/$1';
$route['tagihan/(:num)/print_excel'] = 'TagihanController/printExcel/$1';
$route['tagihan/(:num)/print_pdf'] = 'TagihanController/printPdf/$1';

//untuk test
$route['test'] = 'TestController';
$route['testform'] = 'TestController/testform';
