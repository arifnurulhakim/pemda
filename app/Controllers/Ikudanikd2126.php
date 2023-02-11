<?php


namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Controllers\BaseController;
// use App\Models\k;
// use App\Models\WisataModel;

class Ikudanikd2126 extends BaseController
{
  protected $db, $builder;

  public function __construct()
  {
    $this->db      = \Config\Database::connect();
    $this->builder = $this->db->table('ikudanikd2126');
  }

  public function index()
  {
    $ikudanikd2126 = $this->Ikudanikd2126Model->getIkudanikd2126();
    $satuan = $this->SatuanModel->getSatuan();
    $misi = $this->MisiModel->getMisi();
    $data = [
      'title' => 'Daftar ikudanikd2126',
      'subTitle' => 'ikudanikd2126',
      // 'event' => $event->paginate(5, 'event'),
      // 'pager' => $this->eventModel->pager,
      // 'currentPage' => $currentPage
      'ikudanikd2126' => $ikudanikd2126,
      'misi' => $misi,
      'satuan' => $satuan
    ];
    // dd($kategoriWisata);
    return view('admin/ikudanikd/ikudanikd2126/data-ikudanikd2126', $data);
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
        'title' => 'ikudanikd2126',
        'satuan' => $this->SatuanModel->orderby('nama_satuan')->findAll(),
        'validation' => \Config\Services::validation()
      ];
    // dd($data);
    // return view('admin/index',$data);
    return view('admin/ikudanikd/ikudanikd2126/create-ikudanikd2126', $data);
  }

  public function save()
  {

    // Validasi Data
    if (!$this->validate([
      'nama_indikator' => [
        'rules' => 'required|is_unique[ikudanikd2126.nama_indikator]',
        'label' => 'Nama Indikator',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],

      'jenis_indikator' => [
        'rules' => 'required',
        'label' => 'Jenis Indikator',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ], 'id_satuan' => [
        'rules' => 'required',
        'label' => 'Satuan',
        'errors' => [
          'required' => '{field} harus dipilih',
          'is_unique' => '{field} sudah digunakan'
        ]
      ]
    ])) {
      //Berisi fungsi redirect jika validasi tidak memenuhi
      // dd(\Config\Services::validation()->getErrors());
      return redirect()->to('/admin/ikudanikd2126/create')->withInput();
    }

    // ambil gambar
    $user_id = user();
    $slug = url_title($this->request->getVar('nama_indikator'), '-', true);
    if ($this->Ikudanikd2126Model->save([
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'nama_indikator' => $this->request->getVar('nama_indikator'),
      'jenis_indikator' => $this->request->getVar('jenis_indikator'),
      'id_satuan' => $this->request->getVar('id_satuan'),
      'slug' => $slug
    ])) {
      // dd($_SESSION);
      session()->setFlashdata('success', 'Data berhasil ditambahkan!');
    } else {
      session()->setFlashdata('error', 'Data gagal ditambahkan!');
    }
    return redirect()->to('/ikudanikd2126');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Edit Data ikudanikd2126',
      'subTitle' => 'ikudanikd2126',
      'result' => $this->Ikudanikd2126Model->getIkudanikd2126($slug),
      // 'ikudanikd2126' => $this->Ikudanikd2126Model->orderby('id_ikudanikd2126')->findAll(),
      'satuan' => $this->SatuanModel->orderby('nama_satuan')->findAll(),

      'validation' => \Config\Services::validation()
    ];

    return view('admin/ikudanikd/ikudanikd2126/edit-ikudanikd2126', $data);
  }

  public function update($id_ikudanikd2126)
  {

    // Cek Nama Wisata yang lama
    $dataIkudanikd2126Lama = $this->Ikudanikd2126Model->getIkudanikd2126($this->request->getVar('slug'));
    if ($dataIkudanikd2126Lama['nama_indikator'] == $this->request->getVar('nama_indikator')) {
      $rule_title = 'required';
    } else {
      $rule_title = 'required|is_unique[ikudanikd2126.nama_indikator]';
    }
    // Validasi Data
    if (!$this->validate([
      'nama_indikator' => [
        'rules' => $rule_title,
        'label' => 'Nama Indikator',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'jenis_indikator' => [
        'rules' => 'required',
        'label' => 'Jenis Indikator',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'id_satuan' => [
        'rules' => 'required',
        'label' => 'satuan',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ]
    ])) {
      //Berisi fungsi redirect jika validasi tidak memenuhi
      // dd(\Config\Services::validation()->getErrors());
      return redirect()->to('/admin/ikudanikd/ikudanikd2126/edit-ikudanikd2126/')->withInput();
    }

    // ambil gambar
    $user_id = user();
    $slug = url_title($this->request->getVar('nama_indikator'), '-', true);
    if ($this->Ikudanikd2126Model->save([
      'id_ikudanikd2126' => $id_ikudanikd2126,
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'nama_indikator' => $this->request->getVar('nama_indikator'),
      'jenis_indikator' => $this->request->getVar('jenis_indikator'),
      'id_satuan' => $this->request->getVar('id_satuan'),
      'slug' => $slug
    ])) {
      // dd($_SESSION);
      session()->setFlashdata('success', 'Data berhasil diperbaharui!');
    } else {
      session()->setFlashdata('error', 'Data gagal diperbaharui!');
    }
    return redirect()->to('/ikudanikd2126');
  }
  public function delete($id_ikudanikd2126)
  {
    // cari gambar berdasarkan id
    // $kategoriWisata = $this->kategoriWisataModel->find($id_ikudanikd2126);

    // // cek jika file gambarnya default.jpg
    // if($kategoriWisata['gambar_wisata'] != 'default.jpg'){
    // //hapus gambar
    // unlink('img/kategori-wisata/' . $kategoriWisata['gambar_wisata']);
    // }

    $this->Ikudanikd2126Model->delete($id_ikudanikd2126);
    session()->setFlashdata('success', 'Data berhasil dihapus!');
    return redirect()->to('/ikudanikd2126')->withInput();
  }




  // coba excel
  public function exportExcel()
  {

    $ikudanikd2126 = $this->Ikudanikd2126Model->getIkudanikd2126();

    $spreadsheet = new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)

      ->setCellValue('A1', 'Nama Indikator')
      ->setCellValue('B1', 'Jenis Indikator')
      ->setCellValue('C1', 'Satuan');

    $column = 2;

    foreach ($ikudanikd2126 as $ikudanikd_1) {
      $spreadsheet->setActiveSheetIndex(0)

        ->setCellValue('A' . $column, $ikudanikd_1['nama_indikator'])
        ->setCellValue('B' . $column, $ikudanikd_1['jenis_indikator'])
        ->setCellValue('C' . $column, $ikudanikd_1['nama_satuan']);

      $column++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename =  'Data-IKU/IKD2126-' . date('Y-m-d-His');

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }
}
