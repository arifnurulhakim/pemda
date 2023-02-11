<?php


namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\k;
// use App\Models\WisataModel;

class KodeRekening extends BaseController
{
  protected $db, $builder;

  public function __construct()
  {
    $this->db      = \Config\Database::connect();
    $this->builder = $this->db->table('kode_rekening');
  }

  public function index()
  {
    $kode_rekening = $this->KodeRekeningModel->getKodeRekening();
    $data = [
      'title' => 'Daftar Kode Rekening',
      'subTitle' => 'Kode Rekening',
      // 'event' => $event->paginate(5, 'event'),
      // 'pager' => $this->eventModel->pager,
      // 'currentPage' => $currentPage
      'kode_rekening' => $kode_rekening
    ];
    // dd($kategoriWisata);
    return view('admin/masterData/kodeRekening/data-kodeRekening', $data);
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
        'title' => 'kode_rekening',

        'validation' => \Config\Services::validation()
      ];

    // dd($data);
    // return view('admin/index',$data);
    return view('admin/masterData/kodeRekening/create-kodeRekening', $data);
  }

  public function save()
  {

    // Validasi Data
    if (!$this->validate([
      'kode_rekening' => [
        'rules' => 'required|is_unique[kode_rekening.kode_rekening]',
        'label' => 'kode rekening',
        'errors' => [
          'required' => 'Kode Rekening harus diisi',
          'is_unique' => 'Kode Rekening sudah digunakan'
        ]
      ],
      'program' => [
        'rules' => 'required',
        'label' => 'program',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ]
    ])) {
      //Berisi fungsi redirect jika validasi tidak memenuhi
      // dd(\Config\Services::validation()->getErrors());
      return redirect()->to('/admin/kodeRekening/create')->withInput();
    }

    // ambil gambar
    $user_id = user();
    $slug = url_title($this->request->getVar('kode_rekening'), '-', true);
    if ($this->KodeRekeningModel->save([
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'kode_rekening' => $this->request->getVar('kode_rekening'),
      'program' => $this->request->getVar('program'),
      'slug_program' => $slug
    ])) {
      // dd($_SESSION);
      session()->setFlashdata('success', 'Data berhasil ditambahkan!');
    } else {
      session()->setFlashdata('error', 'Data gagal ditambahkan!');
    }
    return redirect()->to('/kodeRekening');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Edit Data kode rekening',
      'subTitle' => 'kode rekening',
      'result' => $this->KodeRekeningModel->getKodeRekening($slug),
      'kode_rekening' => $this->KodeRekeningModel->orderby('kode_rekening')->findAll(),
      'validation' => \Config\Services::validation()
    ];

    return view('admin/masterData/kodeRekening/edit-kodeRekening', $data);
  }

  public function update($id_kode_rekening)
  {

    // Cek Nama Wisata yang lama
    $dataKodeRekeningLama = $this->KodeRekeningModel->getKodeRekening($this->request->getVar('slug_program'));
    if ($dataKodeRekeningLama['kode_rekening'] == $this->request->getVar('kode_rekening')) {
      $rule_title = 'required';
    } else {
      $rule_title = 'required|is_unique[kode_rekening.kode_rekening]';
    }
    // Validasi Data
    if (!$this->validate([
      'kode_rekening' => [
        'rules' => 'required|is_unique[kode_rekening.kode_rekening]',
        'label' => 'kode rekening',
        'errors' => [
          'required' => 'Kode Rekening harus diisi',
          'is_unique' => 'Kode Rekening sudah digunakan'
        ]
      ],
      'program' => [
        'rules' => 'required',
        'label' => 'program',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ]
    ])) {
      //Berisi fungsi redirect jika validasi tidak memenuhi
      // dd(\Config\Services::validation()->getErrors());
      return redirect()->to('/admin/masterData/kodeRekening/edit-kodeRekening/' . $this->request->getVar('slug_program'))->withInput();
    }

    $slug = url_title($this->request->getVar('kode_rekening'), '-', true);
    if ($this->KodeRekeningModel->save([
      'id_kode_rekening' => $id_kode_rekening,
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'kode_rekening' => $this->request->getVar('kode_rekening'),
      'slug_program' => $slug,
      'program' => $this->request->getVar('program'),
      // 'id_kode_rekening' => $this->request->getVar('id_kode_rekening'),
    ])) {
      // dd($_SESSION);
      session()->setFlashdata('success', 'Data berhasil diperbarui!');
    } else {
      session()->setFlashdata('error', 'Data gagal diperbarui!');
    }
    return redirect()->to('/kodeRekening')->withInput();
  }
  public function delete($id_kode_rekening)
  {
    // cari gambar berdasarkan id
    // $kategoriWisata = $this->kategoriWisataModel->find($id_kode_rekening);

    // // cek jika file gambarnya default.jpg
    // if($kategoriWisata['gambar_wisata'] != 'default.jpg'){
    // //hapus gambar
    // unlink('img/kategori-wisata/' . $kategoriWisata['gambar_wisata']);
    // }

    $this->KodeRekeningModel->delete($id_kode_rekening);
    session()->setFlashdata('success', 'Data berhasil dihapus!');
    return redirect()->to('/kodeRekening')->withInput();
  }
}
