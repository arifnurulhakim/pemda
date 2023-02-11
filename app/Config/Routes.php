<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// Route Frontend
$routes->get('/', 'Home::index');
$routes->get('/wisata/(:segment)', 'Home::index');

//View Artikel
$routes->get('/view/artikel', 'View::artikel');

//View Event
$routes->get('/view/event', 'View::event');

// View Visi Misi
$routes->get('/view/visimisi', 'View::visimisi');

// View Struktur organisasi
$routes->get('/view/strukturorganisasi', 'View::strukturorganisasi');



// $routes->get('/', 'Admin::index', ['filter' => 'role:admin']);

//Routes Admin
// Filtering akses agar hanya admin yang bisa masuk
$routes->get('/admin', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/user_list', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/create-user', 'Admin::create', ['filter' => 'role:admin']);
$routes->get('/admin/profil', 'Admin::profil', ['filter' => 'role:admin']);
$routes->get('/admin/edit-profil', 'Admin::editProfil', ['filter' => 'role:admin']);
$routes->get('/admin/(:num)', 'Admin::detail/$1', ['filter' => 'role:admin']);
$routes->post('/admin/activate', 'Admin::activate', ['filter' => 'role:admin']);
$routes->get('admin/set_password/(:num)', 'Admin::index/$1', ['filter' => 'role:admin']);

// Kelola Wisata
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/wisata', 'Wisata::index', ['filter' => 'role:admin']);
$routes->get('/admin/wisata/create', 'Wisata::create', ['filter' => 'role:admin']);
$routes->delete('/admin/wisata/(:num)', 'Wisata::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/wisata/detail-wisata/(:segment)', 'Wisata::detail/$1');
$routes->post('/admin/wisata/create-wisata', 'Wisata::save', ['filter' => 'role:admin']);
$routes->get('/admin/wisata/edit-wisata/(:segment)', 'Wisata::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/wisata/edit-wisata/(:num)', 'Wisata::update/$1', ['filter' => 'role:admin']);

// Kelola Kategori Wisata
$routes->get('/admin/kategoriwisata', 'KategoriWisata::index', ['filter' => 'role:admin']);
$routes->get('/admin/kategoriwisata/create', 'KategoriWisata::create', ['filter' => 'role:admin']);
$routes->delete('/admin/kategoriwisata/(:num)', 'KategoriWisata::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/kategoriwisata/detail-kategori-wisata/(:segment)', 'KategoriWisata::detail/$1');
$routes->post('/admin/kategoriwisata/create-kategori-wisata', 'KategoriWisata::save', ['filter' => 'role:admin']);
$routes->get('/admin/kategoriwisata/edit-kategori-wisata/(:segment)', 'KategoriWisata::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/kategoriwisata/edit-kategori-wisata/(:num)', 'KategoriWisata::update/$1', ['filter' => 'role:admin']);

// Kelola Artikel
$routes->get('/admin/artikel', 'Home::index', ['filter' => 'role:admin']);
$routes->get('/admin/artikel/create', 'Artikel::create', ['filter' => 'role:admin']);
$routes->delete('/admin/artikel/(:num)', 'Artikel::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/artikel/detail-artikel/(:segment)', 'Artikel::detail/$1');
$routes->post('/admin/artikel/create-artikel', 'Artikel::save', ['filter' => 'role:admin']);
$routes->get('/admin/artikel/edit-artikel/(:segment)', 'Artikel::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/artikel/edit-artikel/(:num)', 'Artikel::update/$1', ['filter' => 'role:admin']);

// Kelola Event
$routes->get('/admin/event', 'Event::index', ['filter' => 'role:admin']);
$routes->get('/admin/event/create', 'Event::create', ['filter' => 'role:admin']);
$routes->delete('/admin/event/(:num)', 'Event::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/event/detail-event/(:segment)', 'Event::detail/$1');
$routes->post('/admin/event/create-event', 'Event::save', ['filter' => 'role:admin']);
$routes->get('/admin/event/edit-event/(:segment)', 'Event::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/event/edit-event/(:num)', 'Event::update/$1', ['filter' => 'role:admin']);
$routes->post('/admin/event/verifikasi/(:segment)', 'Event::verifikasi/$1', ['filter' => 'role:admin']);
$routes->post('/admin/event/penolakan/(:segment)', 'Event::penolakan/$1', ['filter' => 'role:admin']);

// Kelola Kategori Event
$routes->get('/admin/kategorievent', 'KategoriEvent::index', ['filter' => 'role:admin']);
$routes->get('/admin/kategorievent/create', 'KategoriEvent::create', ['filter' => 'role:admin']);
$routes->delete('/admin/kategorievent/(:num)', 'KategoriEvent::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/kategorievent/detail-kategori-event/(:segment)', 'KategoriEvent::detail/$1', ['filter' => 'role:admin']);
$routes->post('/admin/kategorievent/create-kategori-event', 'KategoriEvent::save', ['filter' => 'role:admin']);
$routes->get('/admin/kategorievent/edit-kategori-event/(:segment)', 'KategoriEvent::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/kategorievent/edit-kategori-event/(:num)', 'KategoriEvent::update/$1', ['filter' => 'role:admin']);


$routes->get('/admin', 'Home::index', ['filter' => 'role:admin']);
$routes->get('/produk', 'Home::index');
$routes->get('/wisata', 'Home::index');
// $routes->get('/event', 'Home::index');
$routes->get('/artikel', 'Home::index');
$routes->get('/kategori', 'Home::index');

// APLIKASI PEMDA

// Menu Rencana Pembangunan
// RPJMD 1621

$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/rpjmd1621', 'Rpjmd1621::index', ['filter' => 'role:admin']);
$routes->get('/admin/rpjmd1621/create', 'rpjmd1621::create', ['filter' => 'role:admin']);
$routes->get('/admin/rpjmd1621/edit', 'rpjmd1621::edit', ['filter' => 'role:admin']);
$routes->delete('/admin/rpjmd1621/(:num)', 'rpjmd1621::delete/$1', ['filter' => 'role:admin']);
$route['rpjmd1621/delete/(:num)'] = 'Rpjmd1621Controller/delete/$1';
$routes->get('/admin/rpjmd1621/detail-rpjmd1621/(:segment)', 'rpjmd1621::detail/$1');
$routes->post('/admin/rpjmd1621/create-rpjmd1621', 'rpjmd1621::save', ['filter' => 'role:admin']);
$routes->put('/admin/rpjmd1621/update-rpjmd1621', 'rpjmd1621::edit', ['filter' => 'role:admin']);
$routes->get('/admin/rpjmd1621/edit-rpjmd1621/(:segment)', 'rpjmd1621::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/rpjmd1621/edit-rpjmd1621/(:num)', 'rpjmd1621::update/$1', ['filter' => 'role:admin']);

$routes->get('/admin/rpjmd1621/exportExcel', 'rpjmd1621::exportExcel', ['filter' => 'role:admin']);
$routes->resource('/admin/rpjmd1621/',['filter' => 'role:admin']);
// RPJMD 2126
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/rpjmd2126', 'Rpjmd2126::index', ['filter' => 'role:admin']);
$routes->get('/admin/rpjmd2126/create', 'rpjmd2126::create', ['filter' => 'role:admin']);
$routes->delete('/admin/rpjmd2126/(:num)', 'rpjmd2126::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/rpjmd2126/detail-rpjmd2126/(:segment)', 'rpjmd2126::detail/$1');
$routes->post('/admin/rpjmd2126/create-rpjmd2126', 'rpjmd2126::save', ['filter' => 'role:admin']);
$routes->get('/admin/rpjmd2126/edit-rpjmd2126/(:segment)', 'rpjmd2126::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/rpjmd2126/edit-rpjmd2126/(:num)', 'rpjmd2126::update/$1', ['filter' => 'role:admin']);

$routes->get('/admin/rpjmd2126/exportExcel', 'rpjmd2126::exportExcel', ['filter' => 'role:admin']);


// IKU Dan IKD 1621
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/ikudanikd1621', 'ikudanikd1621::index', ['filter' => 'role:admin']);
$routes->get('/admin/ikudanikd1621/create', 'ikudanikd1621::create', ['filter' => 'role:admin']);
$routes->delete('/admin/ikudanikd1621/(:num)', 'ikudanikd1621::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/ikudanikd1621/detail-ikudanikd1621/(:segment)', 'ikudanikd1621::detail/$1');
$routes->post('/admin/ikudanikd1621/create-ikudanikd1621', 'ikudanikd1621::save', ['filter' => 'role:admin']);
$routes->get('/admin/ikudanikd1621/edit-ikudanikd1621/(:segment)', 'ikudanikd1621::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/ikudanikd1621/edit-ikudanikd1621/(:num)', 'ikudanikd1621::update/$1', ['filter' => 'role:admin']);

$routes->get('/admin/ikudanikd1621/exportExcel', 'ikudanikd1621::exportExcel', ['filter' => 'role:admin']);


// IKU dan IKD 2126
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/ikudanikd2126', 'ikudanikd2126::index', ['filter' => 'role:admin']);
$routes->get('/admin/ikudanikd2126/create', 'ikudanikd2126::create', ['filter' => 'role:admin']);
$routes->delete('/admin/ikudanikd2126/(:num)', 'ikudanikd2126::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/ikudanikd2126/detail-ikudanikd2126/(:segment)', 'ikudanikd2126::detail/$1');
$routes->post('/admin/ikudanikd2126/create-ikudanikd2126', 'ikudanikd2126::save', ['filter' => 'role:admin']);
$routes->get('/admin/ikudanikd2126/edit-ikudanikd2126/(:segment)', 'ikudanikd2126::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/ikudanikd2126/edit-ikudanikd2126/(:num)', 'ikudanikd2126::update/$1', ['filter' => 'role:admin']);

$routes->get('/admin/ikudanikd2126/exportExcel', 'ikudanikd2126::exportExcel', ['filter' => 'role:admin']);

// Renstra PD 1621

$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/renstra1621', 'renstra1621::index', ['filter' => 'role:admin']);
$routes->get('/admin/renstra1621/create', 'renstra1621::create', ['filter' => 'role:admin']);
$routes->delete('/admin/renstra1621/(:num)', 'renstra1621::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/renstra1621/detail-renstra1621/(:segment)', 'renstra1621::detail/$1');
$routes->post('/admin/renstra1621/create-renstra1621', 'renstra1621::save', ['filter' => 'role:admin']);
$routes->get('/admin/renstra1621/edit-renstra1621/(:segment)', 'renstra1621::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/renstra1621/edit-renstra1621/(:num)', 'renstra1621::update/$1', ['filter' => 'role:admin']);

// resntra 2126

$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/renstra2126', 'renstra2126::index', ['filter' => 'role:admin']);
$routes->get('/admin/renstra2126/create', 'renstra2126::create', ['filter' => 'role:admin']);
$routes->delete('/admin/renstra2126/(:num)', 'renstra2126::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/renstra2126/detail-renstra2126/(:segment)', 'renstra2126::detail/$1');
$routes->post('/admin/renstra2126/create-renstra2126', 'renstra2126::save', ['filter' => 'role:admin']);
$routes->get('/admin/renstra2126/edit-renstra2126/(:segment)', 'renstra2126::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/renstra2126/edit-renstra2126/(:num)', 'renstra2126::update/$1', ['filter' => 'role:admin']);

// rkpd 21

$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/rkpd21', 'rkpd21::index', ['filter' => 'role:admin']);
$routes->get('/admin/rkpd21/create', 'rkpd21::create', ['filter' => 'role:admin']);
$routes->delete('/admin/rkpd21/(:num)', 'rkpd21::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/rkpd21/detail-rkpd21/(:segment)', 'rkpd21::detail/$1');
$routes->post('/admin/rkpd21/create-rkpd21', 'rkpd21::save', ['filter' => 'role:admin']);
$routes->get('/admin/rkpd21/edit-rkpd21/(:segment)', 'rkpd21::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/rkpd21/edit-rkpd21/(:num)', 'rkpd21::update/$1', ['filter' => 'role:admin']);


// Master Data

// Satuan
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/satuan', 'satuan::index', ['filter' => 'role:admin']);
$routes->get('/admin/satuan/create', 'satuan::create', ['filter' => 'role:admin']);
$routes->delete('/admin/satuan/(:num)', 'satuan::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/satuan/detail-satuan/(:segment)', 'satuan::detail/$1');
$routes->post('/admin/satuan/create-satuan', 'satuan::save', ['filter' => 'role:admin']);
$routes->get('/admin/satuan/edit-satuan/(:segment)', 'satuan::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/satuan/edit-satuan/(:num)', 'satuan::update/$1', ['filter' => 'role:admin']);


// Misi 1621
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/misi', 'misi::index', ['filter' => 'role:admin']);
$routes->get('/admin/misi/create', 'misi::create', ['filter' => 'role:admin']);
$routes->delete('/admin/misi/(:num)', 'misi::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/misi/detail-misi/(:segment)', 'misi::detail/$1');
$routes->post('/admin/misi/create-misi', 'misi::save', ['filter' => 'role:admin']);
$routes->get('/admin/misi/edit-misi/(:segment)', 'misi::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/misi/edit-misi/(:num)', 'misi::update/$1', ['filter' => 'role:admin']);

// Misi 2126
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/misi2126', 'misi2126::index', ['filter' => 'role:admin']);
$routes->get('/admin/misi2126/create', 'misi2126::create', ['filter' => 'role:admin']);
$routes->delete('/admin/misi2126/(:num)', 'misi2126::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/misi2126/detail-misi2126/(:segment)', 'misi2126::detail/$1');
$routes->post('/admin/misi2126/create-misi2126', 'misi2126::save', ['filter' => 'role:admin']);
$routes->get('/admin/misi2126/edit-misi2126/(:segment)', 'misi2126::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/misi2126/edit-misi2126/(:num)', 'misi2126::update/$1', ['filter' => 'role:admin']);

// perangkat daerah

$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/perangkatdaerah', 'perangkatdaerah::index', ['filter' => 'role:admin']);
$routes->get('/admin/perangkatdaerah/create', 'perangkatdaerah::create', ['filter' => 'role:admin']);
$routes->delete('/admin/perangkatdaerah/(:num)', 'perangkatdaerah::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/perangkatdaerah/detail-perangkatdaerah/(:segment)', 'perangkatdaerah::detail/$1');
$routes->post('/admin/perangkatdaerah/create-perangkatdaerah', 'perangkatdaerah::save', ['filter' => 'role:admin']);
$routes->get('/admin/perangkatdaerah/edit-perangkatdaerah/(:segment)', 'perangkatdaerah::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/perangkatdaerah/edit-perangkatdaerah/(:num)', 'perangkatdaerah::update/$1', ['filter' => 'role:admin']);

// kode rekening
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/kodeRekening', 'kodeRekening::index', ['filter' => 'role:admin']);
$routes->get('/admin/kodeRekening/create', 'kodeRekening::create', ['filter' => 'role:admin']);
$routes->delete('/admin/kodeRekening/(:num)', 'kodeRekening::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/kodeRekening/detail-kodeRekening/(:segment)', 'kodeRekening::detail/$1');
$routes->post('/admin/kodeRekening/create-kodeRekening', 'kodeRekening::save', ['filter' => 'role:admin']);
$routes->get('/admin/kodeRekening/edit-kodeRekening/(:segment)', 'kodeRekening::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/kodeRekening/edit-kodeRekening/(:num)', 'kodeRekening::update/$1', ['filter' => 'role:admin']);




// kolaboratif
// sanitasi21
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/sanitasi21', 'sanitasi21::index', ['filter' => 'role:admin']);
$routes->get('/admin/sanitasi21/create', 'sanitasi21::create', ['filter' => 'role:admin']);
$routes->delete('/admin/sanitasi21/(:num)', 'sanitasi21::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/sanitasi21/detail-sanitasi21/(:segment)', 'sanitasi21::detail/$1');
$routes->post('/admin/sanitasi21/create-sanitasi21', 'sanitasi21::save', ['filter' => 'role:admin']);
$routes->get('/admin/sanitasi21/edit-sanitasi21/(:segment)', 'sanitasi21::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/sanitasi21/edit-sanitasi21/(:num)', 'sanitasi21::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/sanitasi21/exportExcel', 'sanitasi21::exportExcel', ['filter' => 'role:admin']);

// sbs21
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/sbs21', 'sbs21::index', ['filter' => 'role:admin']);
$routes->get('/admin/sbs21/create', 'sbs21::create', ['filter' => 'role:admin']);
$routes->delete('/admin/sbs21/(:num)', 'sbs21::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/sbs21/detail-sbs21/(:segment)', 'sbs21::detail/$1');
$routes->post('/admin/sbs21/create-sbs21', 'sbs21::save', ['filter' => 'role:admin']);
$routes->get('/admin/sbs21/edit-sbs21/(:segment)', 'sbs21::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/sbs21/edit-sbs21/(:num)', 'sbs21::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/sbs21/exportExcel', 'sbs21::exportExcel', ['filter' => 'role:admin']);

// persampahan21
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/persampahan21', 'persampahan21::index', ['filter' => 'role:admin']);
$routes->get('/admin/persampahan21/create', 'persampahan21::create', ['filter' => 'role:admin']);
$routes->delete('/admin/persampahan21/(:num)', 'persampahan21::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/persampahan21/detail-persampahan21/(:segment)', 'persampahan21::detail/$1');
$routes->post('/admin/persampahan21/create-persampahan21', 'persampahan21::save', ['filter' => 'role:admin']);
$routes->get('/admin/persampahan21/edit-persampahan21/(:segment)', 'persampahan21::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/persampahan21/edit-persampahan21/(:num)', 'persampahan21::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/persampahan21/exportExcel', 'persampahan21::exportExcel', ['filter' => 'role:admin']);

//kumuh21
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/kumuh21', 'kumuh21::index', ['filter' => 'role:admin']);
$routes->get('/admin/kumuh21/create', 'kumuh21::create', ['filter' => 'role:admin']);
$routes->delete('/admin/kumuh21/(:num)', 'kumuh21::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/kumuh21/detail-kumuh21/(:segment)', 'kumuh21::detail/$1');
$routes->post('/admin/kumuh21/create-kumuh21', 'kumuh21::save', ['filter' => 'role:admin']);
$routes->get('/admin/kumuh21/edit-kumuh21/(:segment)', 'kumuh21::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/kumuh21/edit-kumuh21/(:num)', 'kumuh21::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/kumuh21/exportExcel', 'kumuh21::exportExcel', ['filter' => 'role:admin']);
//tnimd21

$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/tnimd21', 'tnimd21::index', ['filter' => 'role:admin']);
$routes->get('/admin/tnimd21/create', 'tnimd21::create', ['filter' => 'role:admin']);
$routes->delete('/admin/tnimd21/(:num)', 'tnimd21::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/tnimd21/detail-tnimd21/(:segment)', 'tnimd21::detail/$1');
$routes->post('/admin/tnimd21/create-tnimd21', 'tnimd21::save', ['filter' => 'role:admin']);
$routes->get('/admin/tnimd21/edit-tnimd21/(:segment)', 'tnimd21::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/tnimd21/edit-tnimd21/(:num)', 'tnimd21::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/tnimd21/exportExcel', 'tnimd21::exportExcel', ['filter' => 'role:admin']);

//rumah21

$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/rumah21', 'rumah21::index', ['filter' => 'role:admin']);
$routes->get('/admin/rumah21/create', 'rumah21::create', ['filter' => 'role:admin']);
$routes->delete('/admin/rumah21/(:num)', 'rumah21::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/rumah21/detail-rumah21/(:segment)', 'rumah21::detail/$1');
$routes->post('/admin/rumah21/create-rumah21', 'rumah21::save', ['filter' => 'role:admin']);
$routes->get('/admin/rumah21/edit-rumah21/(:segment)', 'rumah21::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/rumah21/edit-rumah21/(:num)', 'rumah21::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/rumah21/exportExcel', 'rumah21::exportExcel', ['filter' => 'role:admin']);

// sanitasi 22
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/sanitasi22', 'sanitasi22::index', ['filter' => 'role:admin']);
$routes->get('/admin/sanitasi22/create', 'sanitasi22::create', ['filter' => 'role:admin']);
$routes->delete('/admin/sanitasi22/(:num)', 'sanitasi22::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/sanitasi22/detail-sanitasi22/(:segment)', 'sanitasi22::detail/$1');
$routes->post('/admin/sanitasi22/create-sanitasi22', 'sanitasi22::save', ['filter' => 'role:admin']);
$routes->get('/admin/sanitasi22/edit-sanitasi22/(:segment)', 'sanitasi22::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/sanitasi22/edit-sanitasi22/(:num)', 'sanitasi22::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/sanitasi22/exportExcel', 'sanitasi22::exportExcel', ['filter' => 'role:admin']);

// sbs22
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/sbs22', 'sbs22::index', ['filter' => 'role:admin']);
$routes->get('/admin/sbs22/create', 'sbs22::create', ['filter' => 'role:admin']);
$routes->delete('/admin/sbs22/(:num)', 'sbs22::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/sbs22/detail-sbs22/(:segment)', 'sbs22::detail/$1');
$routes->post('/admin/sbs22/create-sbs22', 'sbs22::save', ['filter' => 'role:admin']);
$routes->get('/admin/sbs22/edit-sbs22/(:segment)', 'sbs22::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/sbs22/edit-sbs22/(:num)', 'sbs22::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/sbs22/exportExcel', 'sbs22::exportExcel', ['filter' => 'role:admin']);

// persampahan22
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/persampahan22', 'persampahan22::index', ['filter' => 'role:admin']);
$routes->get('/admin/persampahan22/create', 'persampahan22::create', ['filter' => 'role:admin']);
$routes->delete('/admin/persampahan22/(:num)', 'persampahan22::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/persampahan22/detail-persampahan22/(:segment)', 'persampahan22::detail/$1');
$routes->post('/admin/persampahan22/create-persampahan22', 'persampahan22::save', ['filter' => 'role:admin']);
$routes->get('/admin/persampahan22/edit-persampahan22/(:segment)', 'persampahan22::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/persampahan22/edit-persampahan22/(:num)', 'persampahan22::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/persampahan22/exportExcel', 'persampahan22::exportExcel', ['filter' => 'role:admin']);

//kumuh22
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/kumuh22', 'kumuh22::index', ['filter' => 'role:admin']);
$routes->get('/admin/kumuh22/create', 'kumuh22::create', ['filter' => 'role:admin']);
$routes->delete('/admin/kumuh22/(:num)', 'kumuh22::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/kumuh22/detail-kumuh22/(:segment)', 'kumuh22::detail/$1');
$routes->post('/admin/kumuh22/create-kumuh22', 'kumuh22::save', ['filter' => 'role:admin']);
$routes->get('/admin/kumuh22/edit-kumuh22/(:segment)', 'kumuh22::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/kumuh22/edit-kumuh22/(:num)', 'kumuh22::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/kumuh22/exportExcel', 'kumuh22::exportExcel', ['filter' => 'role:admin']);

//tnimd22
$routes->get('/admin/dashboard', 'Admin::dashboard', ['filter' => 'role:admin']);
$routes->get('/admin/tnimd22', 'tnimd22::index', ['filter' => 'role:admin']);
$routes->get('/admin/tnimd22/create', 'tnimd22::create', ['filter' => 'role:admin']);
$routes->delete('/admin/tnimd22/(:num)', 'tnimd22::delete/$1', ['filter' => 'role:admin']);
$routes->get('/admin/tnimd22/detail-tnimd22/(:segment)', 'tnimd22::detail/$1');
$routes->post('/admin/tnimd22/create-tnimd22', 'tnimd22::save', ['filter' => 'role:admin']);
$routes->get('/admin/tnimd22/edit-tnimd22/(:segment)', 'tnimd22::edit/$1', ['filter' => 'role:admin']);
$routes->post('/admin/tnimd22/edit-tnimd22/(:num)', 'tnimd22::update/$1', ['filter' => 'role:admin']);
$routes->get('/admin/tnimd22/exportExcel', 'tnimd22::exportExcel', ['filter' => 'role:admin']);

// galeri
$routes->get('/admin/galeri', 'galeri::index', ['filter' => 'role:admin']);
$routes->get('/admin/galeri/create', 'galeri::create', ['filter' => 'role:admin']);
$routes->get('/admin/galeri/edit-galeri/(:segment)', 'Galeri::edit', ['filter' => 'role:admin']);

// publikasi
$routes->get('/admin/publikasi', 'publikasi::index', ['filter' => 'role:admin']);
$routes->get('/admin/publikasi/create', 'publikasi::create', ['filter' => 'role:admin']);
$routes->get('/admin/publikasi/edit-publikasi/(:segment)', 'publikasi::edit', ['filter' => 'role:admin']);
// Kelola Wisata
// $routes->get('/admin/data-pariwisata', 'Admin::index', ['filter' => 'role:admin']);

// Kelola Artikel

// Kelola Event

// Routes User
$routes->get('/user', 'User::index', ['filter' => 'role:penjual']);
// $routes->get('/user/produk', 'User::viewProduk');
// $routes->get('/user/produk/create', 'User::create');
$routes->get('/user/profil', 'User::index', ['filter' => 'role:penjual']);
$routes->get('/user/edit-profil', 'User::editProfil', ['filter' => 'role:penjual']);
$routes->get('/user/produk/edit', 'User::edit', ['filter' => 'role:penjual']);
$routes->get('/user/dashboard', 'User::dashboard', ['filter' => 'role:penjual']);

$routes->get('/user/produk', 'Produk::index', ['filter' => 'role:penjual']);
$routes->get('/user/produk/create', 'Produk::create', ['filter' => 'role:penjual']);
$routes->delete('/user/produk/(:num)', 'Produk::delete/$1', ['filter' => 'role:penjual']);
$routes->get('/user/produk/detail-produk/(:segment)', 'Produk::detail/$1', ['filter' => 'role:penjual']);
$routes->post('/user/produk/create-produk', 'Produk::save', ['filter' => 'role:penjual']);
$routes->get('/user/produk/edit-produk/(:segment)', 'Produk::edit/$1', ['filter' => 'role:penjual']);
$routes->post('/user/produk/edit-produk/(:num)', 'Produk::update/$1', ['filter' => 'role:penjual']);


// $routes->post('/Home/(:any)', 'Home::user');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
