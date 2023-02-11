<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\k;
// use App\Models\WisataModel;

class Misi2126 extends BaseController
{
  protected $db, $builder;

  public function __construct()
  {
    $this->db      = \Config\Database::connect();
    $this->builder = $this->db->table('misi2126');
  }

  public function index()
  {
    $misi2126 = $this->Misi2126Model->getMisi2126();
    $data = [
      'title' => 'Daftar misi2126',
      'subTitle' => 'misi2126',
      // 'event' => $event->paginate(5, 'event'),
      // 'pager' => $this->eventModel->pager,
      // 'currentPage' => $currentPage
      'misi2126' => $misi2126
    ];
    // dd($kategoriWisata);
    return view('admin/masterData/misi2126/data-misi2126', $data);
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
        'title' => 'misi2126',

        'validation' => \Config\Services::validation()
      ];

    // dd($data);
    // return view('admin/index',$data);
    return view('admin/masterData/misi2126/create-misi2126', $data);
  }

  public function save()
  {

    // Validasi Data
    if (!$this->validate([
      'nama_misi2126' => [
        'rules' => 'required|is_unique[misi2126.nama_misi2126]',
        'label' => 'Nama Misi',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'deskripsi_misi2126' => [
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
      return redirect()->to('/admin/misi2126/create')->withInput();
    }

    // ambil gambar
    $user_id = user();
    $slug = url_title($this->request->getVar('nama_misi2126'), '-', true);
    if ($this->Misi2126Model->save([
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'nama_misi2126' => $this->request->getVar('nama_misi2126'),
      'deskripsi_misi2126' => $this->request->getVar('deskripsi_misi2126'),
      'slug_misi21262126' => $slug
    ])) {
      // dd($_SESSION);
      session()->setFlashdata('success', 'Data berhasil ditambahkan!');
    } else {
      session()->setFlashdata('error', 'Data gagal ditambahkan!');
    }
    return redirect()->to('/misi2126');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Edit Data misi2126',
      'subTitle' => 'misi2126',
      'result' => $this->Misi2126Model->getMisi2126($slug),
      'misi2126' => $this->Misi2126Model->orderby('nama_misi2126')->findAll(),
      'validation' => \Config\Services::validation()
    ];

    return view('admin/masterData/misi2126/edit-misi2126', $data);
  }

  public function update($id_misi2126)
  {

    // Cek Nama Wisata yang lama
    $dataMisi2126Lama = $this->Misi2126Model->getMisi2126($this->request->getVar('slug_misi2126'));
    if ($dataMisi2126Lama['nama_misi2126'] == $this->request->getVar('nama_misi2126')) {
      $rule_title = 'required';
    } else {
      $rule_title = 'required|is_unique[misi2126.nama_misi2126]';
    }
    // Validasi Data
    if (!$this->validate([
      'nama_misi2126' => [
        'rules' => $rule_title,
        'label' => 'Nama misi2126',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'deskripsi_misi2126' => [
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
      return redirect()->to('/admin/masterData/misi2126/edit-misi2126/' . $this->request->getVar('slug_misi2126'))->withInput();
    }

    $slug = url_title($this->request->getVar('nama_misi2126'), '-', true);
    if ($this->Misi2126Model->save([
      'id_misi2126' => $id_misi2126,
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'nama_misi2126' => $this->request->getVar('nama_misi2126'),
      'slug_misi2126' => $slug,
      'deskripsi_misi2126' => $this->request->getVar('deskripsi_misi2126'),
      // 'id_misi' => $this->request->getVar('id_misi'),
    ])) {
      // dd($_SESSION);
      session()->setFlashdata('success', 'Data berhasil diperbarui!');
    } else {
      session()->setFlashdata('error', 'Data gagal diperbarui!');
    }
    return redirect()->to('/misi2126')->withInput();
  }
  public function delete($id_misi2126)
  {
    // cari gambar berdasarkan id
    // $kategoriWisata = $this->kategoriWisataModel->find($id_misi2126);

    // // cek jika file gambarnya default.jpg
    // if($kategoriWisata['gambar_wisata'] != 'default.jpg'){
    // //hapus gambar
    // unlink('img/kategori-wisata/' . $kategoriWisata['gambar_wisata']);
    // }

    $this->Misi2126Model->delete($id_misi2126);
    session()->setFlashdata('success', 'Data berhasil dihapus!');
    return redirect()->to('/misi2126')->withInput();
  }
}
