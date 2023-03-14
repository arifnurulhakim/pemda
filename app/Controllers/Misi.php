<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\k;
// use App\Models\WisataModel;

class Misi extends BaseController
{
  protected $db, $builder;

  public function __construct()
  {
    $this->db      = \Config\Database::connect();
    $this->builder = $this->db->table('misi');
  }

  public function index()
  {
    $misi = $this->MisiModel->getMisi();
    $data = [
      'title' => 'Daftar misi',
      'subTitle' => 'misi',
      // 'event' => $event->paginate(5, 'event'),
      // 'pager' => $this->eventModel->pager,
      // 'currentPage' => $currentPage
      'misi' => $misi
    ];
    // dd($kategoriWisata);
    return view('admin/masterData/misi/data-misi', $data);
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
        'title' => 'misi',

        'validation' => \Config\Services::validation()
      ];

    // dd($data);
    // return view('admin/index',$data);
    return view('admin/masterData/misi/create-misi', $data);
  }

  public function save()
  {

    // Validasi Data
    if (!$this->validate([
      'nama_misi' => [
        'rules' => 'required|is_unique[misi.nama_misi]',
        'label' => 'Nama misi',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'deskripsi_misi' => [
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
      return redirect()->to('/admin/misi/create')->withInput();
    }

    // ambil gambar
    $user_id = user();
    $slug = url_title($this->request->getVar('nama_misi'), '-', true);
    if ($this->MisiModel->save([
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'nama_misi' => $this->request->getVar('nama_misi'),
      'deskripsi_misi' => $this->request->getVar('deskripsi_misi'),
      'slug_misi' => $slug
    ])) {
      // dd($_SESSION);
      session()->setFlashdata('success', 'Data berhasil ditambahkan!');
    } else {
      session()->setFlashdata('error', 'Data gagal ditambahkan!');
    }
    return redirect()->to('/misi');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Edit Data misi',
      'subTitle' => 'misi',
      'result' => $this->MisiModel->getMisi($slug),
      'misi' => $this->MisiModel->orderby('nama_misi')->findAll(),
      'validation' => \Config\Services::validation()
    ];

    return view('admin/masterData/misi/edit-misi', $data);
  }

  public function update($id_misi)
  {

    // Cek Nama Wisata yang lama
    $dataMisiLama = $this->MisiModel->getMisi($this->request->getVar('slug_misi'));
    if ($dataMisiLama['nama_misi'] == $this->request->getVar('nama_misi')) {
      $rule_title = 'required';
    } else {
      $rule_title = 'required|is_unique[misi.nama_misi]';
    }
    // Validasi Data
    if (!$this->validate([
      'nama_misi' => [
        'rules' => $rule_title,
        'label' => 'Nama misi',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'deskripsi_misi' => [
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
      return redirect()->to('/admin/masterData/misi/edit-misi/' . $this->request->getVar('slug_misi'))->withInput();
    }

    $slug = url_title($this->request->getVar('nama_misi'), '-', true);
    if ($this->MisiModel->save([
      'id_misi' => $id_misi,
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'nama_misi' => $this->request->getVar('nama_misi'),
      'slug_misi' => $slug,
      'deskripsi_misi' => $this->request->getVar('deskripsi_misi'),
      // 'id_misi' => $this->request->getVar('id_misi'),
    ])) {
      // dd($_SESSION);
      session()->setFlashdata('success', 'Data berhasil diperbarui!');
    } else {
      session()->setFlashdata('error', 'Data gagal diperbarui!');
    }
    return redirect()->to('/misi')->withInput();
  }
  public function delete($id_misi)
  {

    $this->MisiModel->delete($id_misi);
    session()->setFlashdata('success', 'Data berhasil dihapus!');
    return redirect()->to('/misi')->withInput();
  }
}
