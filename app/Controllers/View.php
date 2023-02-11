<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\Config\BaseConfig;

class View extends BaseController
{
  public function __construct()
  {
    $this->db      = \Config\Database::connect();
    $this->builder = $this->db->table('users');
  }
  // Artikel
  public function wisata()
  {
    $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
    $cari = $this->request->getVar('cari');
    if ($cari) {
      $wisata = $this->wisataModel->get_cari_wisata($cari);
    } else {
      $wisata = $this->wisataModel;
    }
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    // $wisata = $this->wisataModel->findAll();
    $data = [
      'title' => 'Detail Wisata',
      'subTitle' => 'Wisata',
      'wisata' => $wisata->paginate(10, 'wisata'),
      'kategori_wisata' => $kategori_wisata,
      'pager'           => $this->wisataModel->pager,
      'currentPage'     => $currentPage
    ];
    return view('views/wisata/index', $data);
  }

  // Artikel
  public function artikel()
  {

    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $artikel = $this->artikelModel->orderby('tgl_artikel', 'DESC')->findAll();
    $artikelterkini = $this->artikelModel->orderby('tgl_artikel', 'DESC')->getArtikelTerkini();
    $data = [
      'title' => 'Detail Artikel',
      'subTitle' => 'Artikel',
      'artikel' => $artikel,
      'artikelterkini' => $artikelterkini,
      'kategori_wisata' => $kategori_wisata
    ];
    return view('views/artikel/index', $data);
  }

  // Detail Artikel
  public function detailartikel($slug)
  {
    // $viewer = $this->artikelModel-> updateViewer($slug);
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $artikelterkini = $this->artikelModel->getArtikelTerkini();
    $data = [
      'title' => 'Detail Artikel',
      'subTitle' => 'Artikel',
      'artikel' => $this->artikelModel->getArtikel($slug),
      'kategori_wisata' => $kategori_wisata,
      'artikelterkini' => $artikelterkini,
      // 'viewer' => $viewer
      // 'komentar'=> $this->artikelModel->get_komentar($slug)
    ];
    return view('views/artikel/detail', $data);
  }

  // Artikel
  public function event()
  {
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $event = $this->eventModel->findAll();
    $data = [
      'title' => 'Detail Event',
      'subTitle' => 'Event',
      'event' => $event,
      'kategori_wisata' => $kategori_wisata
    ];
    return view('views/event/index', $data);
  }

  // Detail Event
  public function detailevent($slug)
  {
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $data = [
      'title' => 'Detail Event',
      'subTitle' => 'Event',
      'event' => $this->eventModel->getEvent($slug),
      'kategori_wisata' => $kategori_wisata
    ];
    return view('views/event/detail', $data);
  }

  // Pengajuan Event
  public function pengajuanevent()
  {
    $data = [
      'title' => 'Form Pengajuan Event',
      'subTitle' => 'Event',
      'kategori_event' => $this->kategoriEventModel->orderby('nama_kategori_event')->findAll(),
      'validation' => \Config\Services::validation()
    ];
    // dd($data);
    return view('views/event/pengajuan-event', $data);
  }
  public function savepengajuan()
  {

    // Validasi Data
    if (!$this->validate([
      'nama_event' => [
        'rules' => 'required|is_unique[event.nama_event]',
        'label' => 'Judul event',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'id_kategori_event' => [
        'rules' => 'required',
        'label' => 'Kategori Event',
        'errors' => [
          'required' => '{field} harus diisi'
        ]
        // '|is_natural_no_zero'
      ],
      'lokasi_event' => [
        'rules' => 'required',
        'label' => 'Lokasi event',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'gambar_event' => [
        'rules' =>  'max_size[gambar_event,1024]|is_image[gambar_event]',
        'errors' => [
          'max_size' => 'Ukuran gambar terlalu besar. Max 1 mb',
          'is_image' => 'Yang anda pilih bukan gambar',
          'mime_in' => 'Yang anda pilih bukan gambar',
        ]
      ]

    ])) {
      //Berisi fungsi redirect jika validasi tidak memenuhi
      // dd(\Config\Services::validation()->getErrors());
      dd($this->request->getVar());
      return redirect()->to('/view/event/pengajuan-event')->withInput();
    }

    // ambil gambar

    $fileGambarEvent = $this->request->getFile('gambar_event');
    // dd($fileGambarEvent);

    // apakah tidak ada gambar yang diupload
    if ($fileGambarEvent->getError() == 4) {
      $namaFileGambarEvent = 'default.jpg';
    } else {
      // generate nama gambar random
      $namaFileGambarEvent = $fileGambarEvent->getRandomName();

      // pindahkan ke folder img
      $fileGambarEvent->move('img/event/', $namaFileGambarEvent);
    }
    $user_id = user();
    $slug = url_title($this->request->getVar('nama_event'), '-', true);
    if ($this->eventModel->save([
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'nama_event' => $this->request->getVar('nama_event'),
      'nama_penyelenggara' => $this->request->getVar('nama_penyelenggara'),
      'slug' => $slug,
      'id_kategori_event' => $this->request->getVar('id_kategori_event'),
      'lokasi_event' => $this->request->getVar('lokasi_event'),
      'tgl_event_mulai' => $this->request->getVar('tgl_event_mulai'),
      'tgl_event_berakhir' => $this->request->getVar('tgl_event_berakhir'),
      'deskripsi_event' => $this->request->getVar('deskripsi_event'),
      'gambar_event' => $namaFileGambarEvent

    ])) {
      session()->setFlashdata('success', 'Data berhasil ditambahkan!');
    } else {
      session()->setFlashdata('error', 'Data gagal ditambahkan!');
    }
    return redirect()->to('/view/event/pengajuan-event');
  }

  public function strukturorganisasi()
  {
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $data = [
      'title' => 'Struktur Organisasi',
      'subTitle' => 'Struktur Organisasi',
      'kategori_wisata' => $kategori_wisata
    ];
    return view('views/profil/organisasi', $data);
  }

  public function visimisi()
  {
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $data = [
      'title' => 'Visi Misi',
      'subTitle' => 'Visi Misi',
      'kategori_wisata' => $kategori_wisata
    ];
    return view('views/profil/organisasi', $data);
  }

  public function login()
  {
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $data = [
      'title' => 'Visi Misi',
      'subTitle' => 'Visi Misi',
      'kategori_wisata' => $kategori_wisata,
      'config' => $this->config
    ];
    return view('\App\Views\Auth\login', $data);
  }

  public function register()
  {
    $kategori_wisata = $this->kategoriWisataModel->findAll();
    $data = [
      'title' => 'Visi Misi',
      'subTitle' => 'Visi Misi',
      'kategori_wisata' => $kategori_wisata,
      'config' => $this->config
    ];
    return view('\App\Views\Auth\register', $data);
  }

  public function marketplace()
  {
    // $produk = $this->produkModel->findAll();
    $produk = $this->produkModel->join('users', 'produk.id_user = users.id')->findAll();
    $kategori_produk = $this->kategoriProdukModel->findAll();
    $data = [
      'title' => 'Marketplace',
      'subTitle' => 'Marketplace',
      'kategori_produk' => $kategori_produk,
      'produk' => $produk
    ];
    return view('views/marketplace/index', $data);
  }

  public function profil($id)
  {
    $data =
      [
        'title' => 'Profil',
        // 'produk' => $this->usersModel->join('produk', 'users.id = produk.id_user')->getUsersById($id_user),
        // 'users' => $this->usersModel->join('produk', 'users.id = produk.id_user')->getUsers($slug),
      ];
    // if (empty($data['produk'])) {
    //   throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk '. $id_user . ' tidak ditemukan');
    //   }
    $this->builder->select('users.id as userid, username, email, fullname, no_telepon, alamat, deskripsi, user_image, name, active');
    $this->builder->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
    $this->builder->join('auth_groups', 'auth_groups.id = auth_groups_users.group_id');
    $this->builder->where('users.id', $id);
    $query = $this->builder->get();

    $data['user'] = $query->getRow();

    if (empty($data['user'])) {
      redirect()->to('/marketplace');
    }

    // dd($data);
    return view('views/marketplace/profil', $data);
  }

  public function katalog()
  {
    $kategori_produk = $this->kategoriProdukModel->findAll();
    $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
    $cari = $this->request->getVar('cari');
    if ($cari) {
      $produk = $this->produkModel->get_cari_produk($cari);
    } else {
      $produk = $this->produkModel;
    }

    $data = [
      'title' => 'Katalog Produk',
      'subTitle' => 'Katalog Produk',
      'kategori_produk' => $kategori_produk,
      'produk' => $produk->join('users', 'produk.id_user = users.id')->paginate(20, 'produk'),
      'pager' => $this->produkModel->pager,
      'currentPage' => $currentPage
    ];
    return view('views/marketplace/katalog', $data);
  }

  public function detailproduk($slug)
  {
    $data =
      [
        'title' => 'Detail Produk',
        'produk' => $this->produkModel->join('users', 'produk.id_user = users.id')->getProduk($slug),
      ];
    if (empty($data['produk'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk ' . $slug . ' tidak ditemukan');
    }
    // dd($data);
    return view('views/marketplace/detail', $data);
  }

  public function detailwisata($slug)
  {
    $data =
      [
        'title' => 'Detail Wisata',
        'wisata' => $this->wisataModel->getWisata($slug),
      ];
    if (empty($data['wisata'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('wisata ' . $slug . ' tidak ditemukan');
    }
    // dd($data);
    return view('views/wisata/detail', $data);
  }

  // Galeri
  public function galeri()
  {
    $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
    // $galeri = $this->galeriModel->orderby('created_at','DESC')->findAll();
    $data = [
      'title' => 'Detail Publikasi',
      'subTitle' => 'Publikasi',
      'galeri' => $this->galeriModel->orderby('created_at', 'DESC')->paginate(9, 'galeri'),
      'pager'    => $this->galeriModel->pager,
      // 'galeri' => $galeri,
      'currentPage'     => $currentPage
    ];
    return view('views/galeri/index', $data);
  }

  // Publikasi
  public function publikasi()
  {
    $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
    // $publikasi = $this->publikasiModel->orderby('created_at','DESC')->findAll();
    $data = [
      'title' => 'Detail Publikasi',
      'subTitle' => 'Publikasi',
      'publikasi' => $this->publikasiModel->orderby('created_at', 'DESC')->paginate(20, 'publikasi'),
      'pager'    => $this->publikasiModel->pager,
      // 'publikasi' => $publikasi,
      'currentPage'     => $currentPage
    ];
    return view('views/publikasi/index', $data);
  }
}
