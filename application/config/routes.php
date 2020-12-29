<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'Auth';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

/**
 * MASTER DATA
 */

########################
######### Auth #########
########################

$route['login']         = 'Auth/login';
$route['logout']        = 'Auth/logout';

########################
######### Admin ########
########################

$route['dashboard']                         = 'Admin/dashboard';

/**
 * Supplier
 */
$route['admin/supplier']                    = 'Admin/Master/Supplier';
$route['admin/supplier/add']                = 'Admin/Master/Supplier/createSupplier';
$route['admin/supplier/edit']               = 'Admin/Master/Supplier/editSupplier';
$route['admin/supplier/delete/(:any)']      = 'Admin/Master/Supplier/deleteSupplier/$1';

/**
 * Pelanggan
 */
$route['admin/pelanggan']                   = 'Admin/Master/Pelanggan';
$route['admin/pelanggan/add']               = 'Admin/Master/Pelanggan/createPelanggan';
$route['admin/pelanggan/edit']              = 'Admin/Master/Pelanggan/editPelanggan/$1';
$route['admin/pelanggan/delete/(:any)']     = 'Admin/Master/Pelanggan/deletePelanggan/$1';

/**
 * Karyawan
 */
$route['admin/karyawan']                    = 'Admin/Master/Karyawan/index';
$route['admin/karyawan/add']                = 'Admin/Master/Karyawan/createKaryawan';
$route['admin/karyawan/edit']               = 'Admin/Master/Karyawan/editKaryawan';
$route['admin/karyawan/delete/(:any)']      = 'Admin/Master/Karyawan/deleteKaryawan/$1';

/**
 * Gudang
 */
$route['admin/gudang']                      = 'Admin/Master/Stok';
$route['admin/gudang/add']                  = 'Admin/Master/Stok/add';
$route['admin/gudang/edit']                 = 'Admin/Master/Stok/editGudang';
$route['admin/gudang/delete/(:any)']        = 'Admin/Master/Stok/delete/$1';

/**
 * Menu
 */
$route['admin/menu']                  = 'Admin/Master/Menu';
$route['admin/menu/add']              = 'Admin/Master/Menu/addMenu';
$route['admin/menu/edit']             = 'Admin/Master/Menu/editMenu';
$route['admin/menu/delete/(:any)']    = 'Admin/Master/Menu/deleteMenu/$1';

/**
 * Level Pedas
 */
$route['admin/level/pedas']                 = 'Admin/Master/LevelPedas';
$route['admin/level/pedas/add']             = 'Admin/Master/LevelPedas/addLevelPedas';
$route['admin/level/pedas/edit']            = 'Admin/Master/LevelPedas/editLevelPedas';
$route['admin/level/pedas/delete/(:any)']   = 'Admin/Master/LevelPedas/deleteLevelPedas/$1';

/**
 * Level Pedas
 */
$route['admin/kuah']                 = 'Admin/Master/Kuah';
$route['admin/kuah/add']             = 'Admin/Master/Kuah/addKuah';
$route['admin/kuah/edit']            = 'Admin/Master/Kuah/editKuah';
$route['admin/kuah/delete/(:any)']   = 'Admin/Master/Kuah/deleteKuah/$1';

/**
 * Meja
 */
$route['admin/tables']                      = 'Admin/Master/Meja';
$route['admin/tables/add']                  = 'Admin/Master/Meja/createMeja';
$route['admin/tables/edit']                 = 'Admin/Master/Meja/editMeja';
$route['admin/tables/delete/(:any)']        = 'Admin/Master/Meja/hapusMeja/$1';

#########################
####### Karyawan ########
#########################

$route['dashboard/karyawan']    = 'Karyawan/dashboard';

/**
 * TRANSAKSI
 */

#########################
###### Persediaan #######
#########################

$route['transaksi/persediaan']               = 'Transaksi/Persediaan';
$route['transaksi/persediaan/add']           = 'Transaksi/Persediaan/add';
$route['transaksi/persediaan/update']        = 'Transaksi/Persediaan/update';
$route['transaksi/persediaan/delete/(:any)'] = 'Transaksi/Persediaan/delete/$1';

########################
####### Penjualan ######
########################

$route['transaksi/penjualan']               = 'Transaksi/Penjualan';
$route['transaksi/penjualan/add']           = 'Transaksi/Penjualan/addPenjualan';
$route['transaksi/penjualan/update']        = 'Transaksi/Penjualan/updatePenjualan';
$route['transaksi/penjualan/delete/(:any)'] = 'Transaksi/Penjualan/deletePenjualan/$1';