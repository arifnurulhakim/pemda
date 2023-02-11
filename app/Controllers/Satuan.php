<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\k;
// use App\Models\WisataModel;

class Satuan extends BaseController
{
  protected $db, $builder;

  public function __construct()
  {
    $this->db      = \Config\Database::connect();
    $this->builder = $this->db->table('satuan');
  }

  public function index()
  {
    $satuan = $this->SatuanModel->getSatuan();
    $data = [
      'title' => 'Daftar satuan',
      'subTitle' => 'satuan',
      // 'event' => $event->paginate(5, 'event'),
      // 'pager' => $this->eventModel->pager,
      // 'currentPage' => $currentPage
      'satuan' => $satuan,
      'menu' => 'Master Data',
    ];
    // dd($kategoriWisata);
    return view('admin/masterData/satuan/data-satuan', $data);
  }

  public function detail($slug)
  {
    $data =
      [
        'title' => 'Tambah Data',
        'kategori_wisata' => $this->kategoriWisataModel->getKategoriWisata($slug)
      ];
    if (empty($data['kategori_wisata'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Wisata ' . $slug . ' tidak ditemukan');
    }
    //   dd($data);
    return view('admin/kategori-wisata/detail-wisata', $data);
  }

  public function listWisata($slug)
  {
    $data =
      [
        'title' => 'List Wisata',
        'kategori_wisata' => $this->kategoriWisataModel->getKategoriWisata($slug)
      ];
  }

  public function create()
  {
    $data =
      [
        'title' => 'satuan',

        'validation' => \Config\Services::validation()
      ];

    // dd($data);
    // return view('admin/index',$data);
    return view('admin/masterData/satuan/create-satuan', $data);
  }

  public function save()
  {

    // Validasi Data
    if (!$this->validate([
      'nama_satuan' => [
        'rules' => 'required|is_unique[satuan.nama_satuan]',
        'label' => 'Nama Satuan',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'deskripsi_satuan' => [
        'rules' => 'required',
        'label' => 'Deskripsi',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ]
    ])) {
      //Berisi fungsi redirect jika validasi tidak memenuhi
      // dd(\Config\Services::validation()->getErrors());
      return redirect()->to('/admin/satuan/create')->withInput();
    }

    // ambil gambar
    $user_id = user();
    $slug = url_title($this->request->getVar('nama_satuan'), '-', true);
    if ($this->SatuanModel->save([
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'nama_satuan' => $this->request->getVar('nama_satuan'),
      'deskripsi_satuan' => $this->request->getVar('deskripsi_satuan'),
      'slug_satuan' => $slug
    ])) {
      // dd($_SESSION);
      session()->setFlashdata('success', 'Data berhasil ditambahkan!');
    } else {
      session()->setFlashdata('error', 'Data gagal ditambahkan!');
    }
    return redirect()->to('/satuan');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Edit Data satuan',
      'subTitle' => 'satuan',
      'result' => $this->SatuanModel->getSatuan($slug),
      'satuan' => $this->SatuanModel->orderby('nama_satuan')->findAll(),
      'validation' => \Config\Services::validation()
    ];

    return view('admin/masterData/satuan/edit-satuan', $data);
  }

  public function update($id_satuan)
  {

    // Cek Nama Wisata yang lama
    $dataSatuanLama = $this->SatuanModel->getSatuan($this->request->getVar('slug_satuan'));
    if ($dataSatuanLama['nama_satuan'] == $this->request->getVar('nama_satuan')) {
      $rule_title = 'required';
    } else {
      $rule_title = 'required|is_unique[satuan.nama_satuan]';
    }
    // Validasi Data
    if (!$this->validate([
      'nama_satuan' => [
        'rules' => $rule_title,
        'label' => 'Nama satuan',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'deskripsi_satuan' => [
        'rules' => $rule_title,
        'label' => 'Deskripsi ',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ]
    ])) {
      //Berisi fungsi redirect jika validasi tidak memenuhi
      // dd(\Config\Services::validation()->getErrors());
      return redirect()->to('/admin/masterData/satuan/edit-satuan/' . $this->request->getVar('slug_satuan'))->withInput();
    }

    $slug = url_title($this->request->getVar('nama_satuan'), '-', true);
    if ($this->SatuanModel->save([
      'id_satuan' => $id_satuan,
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'nama_satuan' => $this->request->getVar('nama_satuan'),
      'slug_satuan' => $slug,
      'deskripsi_satuan' => $this->request->getVar('deskripsi_satuan'),
      // 'id_satuan' => $this->request->getVar('id_satuan'),
    ])) {
      // dd($_SESSION);
      session()->setFlashdata('success', 'Data berhasil diperbarui!');
    } else {
      session()->setFlashdata('error', 'Data gagal diperbarui!');
    }
    return redirect()->to('/satuan')->withInput();
  }
  public function delete($id_satuan)
  {
    // cari gambar berdasarkan id
    // $kategoriWisata = $this->kategoriWisataModel->find($id_satuan);

    // // cek jika file gambarnya default.jpg
    // if($kategoriWisata['gambar_wisata'] != 'default.jpg'){
    // //hapus gambar
    // unlink('img/kategori-wisata/' . $kategoriWisata['gambar_wisata']);
    // }

    $this->SatuanModel->delete($id_satuan);
    session()->setFlashdata('success', 'Data berhasil dihapus!');
    return redirect()->to('/satuan')->withInput();
  }
}
