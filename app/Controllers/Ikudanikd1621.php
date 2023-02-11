<?php


namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Controllers\BaseController;
// use App\Models\k;
// use App\Models\WisataModel;

class Ikudanikd1621 extends BaseController
{
  protected $db, $builder;

  public function __construct()
  {
    $this->db      = \Config\Database::connect();
    $this->builder = $this->db->table('ikudanikd1621');
  }

  public function index()
  {
    $ikudanikd1621 = $this->Ikudanikd1621Model->getIkudanikd1621();
    $satuan = $this->SatuanModel->getSatuan();
    $misi = $this->MisiModel->getMisi();
    $data = [
      'title' => 'Daftar ikudanikd1621',
      'subTitle' => 'ikudanikd1621',
      // 'event' => $event->paginate(5, 'event'),
      // 'pager' => $this->eventModel->pager,
      // 'currentPage' => $currentPage
      'ikudanikd1621' => $ikudanikd1621,
      'misi' => $misi,
      'satuan' => $satuan
    ];
    // dd($kategoriWisata);
    return view('admin/ikudanikd/ikudanikd1621/data-ikudanikd1621', $data);
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
        'title' => 'ikudanikd1621',
        'satuan' => $this->SatuanModel->orderby('nama_satuan')->findAll(),
        'validation' => \Config\Services::validation()
      ];
    // dd($data);
    // return view('admin/index',$data);
    return view('admin/ikudanikd/ikudanikd1621/create-ikudanikd1621', $data);
  }

  public function save()
  {

    // Validasi Data
    if (!$this->validate([
      'nama_indikator' => [
        'rules' => 'required|is_unique[ikudanikd1621.nama_indikator]',
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
      return redirect()->to('/admin/ikudanikd1621/create')->withInput();
    }

    // ambil gambar
    $user_id = user();
    $slug = url_title($this->request->getVar('nama_indikator'), '-', true);
    if ($this->Ikudanikd1621Model->save([
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
    return redirect()->to('/ikudanikd1621');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Edit Data ikudanikd1621',
      'subTitle' => 'ikudanikd1621',
      'result' => $this->Ikudanikd1621Model->getIkudanikd1621($slug),
      // 'ikudanikd1621' => $this->Ikudanikd1621Model->orderby('id_ikudanikd1621')->findAll(),
      'satuan' => $this->SatuanModel->orderby('nama_satuan')->findAll(),

      'validation' => \Config\Services::validation()
    ];

    return view('admin/ikudanikd/ikudanikd1621/edit-ikudanikd1621', $data);
  }

  public function update($id_ikudanikd1621)
  {

    // Cek Nama Wisata yang lama
    $dataIkudanikd1621Lama = $this->Ikudanikd1621Model->getIkudanikd1621($this->request->getVar('slug'));
    if ($dataIkudanikd1621Lama['nama_indikator'] == $this->request->getVar('nama_indikator')) {
      $rule_title = 'required';
    } else {
      $rule_title = 'required|is_unique[ikudanikd1621.nama_indikator]';
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
      return redirect()->to('/admin/ikudanikd/ikudanikd1621/edit-ikudanikd1621/')->withInput();
    }

    // ambil gambar
    $user_id = user();
    $slug = url_title($this->request->getVar('nama_indikator'), '-', true);
    if ($this->Ikudanikd1621Model->save([
      'id_ikudanikd1621' => $id_ikudanikd1621,
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
    return redirect()->to('/ikudanikd1621');
  }
  public function delete($id_ikudanikd1621)
  {
    // cari gambar berdasarkan id
    // $kategoriWisata = $this->kategoriWisataModel->find($id_ikudanikd1621);

    // // cek jika file gambarnya default.jpg
    // if($kategoriWisata['gambar_wisata'] != 'default.jpg'){
    // //hapus gambar
    // unlink('img/kategori-wisata/' . $kategoriWisata['gambar_wisata']);
    // }

    $this->Ikudanikd1621Model->delete($id_ikudanikd1621);
    session()->setFlashdata('success', 'Data berhasil dihapus!');
    return redirect()->to('/ikudanikd1621')->withInput();
  }




  // coba excel
  public function exportExcel()
  {

    $ikudanikd1621 = $this->Ikudanikd1621Model->getIkudanikd1621();

    $spreadsheet = new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)

      ->setCellValue('A1', 'Nama Indikator')
      ->setCellValue('B1', 'Jenis Indikator')
      ->setCellValue('C1', 'Satuan');

    $column = 2;

    foreach ($ikudanikd1621 as $ikudanikd_1) {
      $spreadsheet->setActiveSheetIndex(0)

        ->setCellValue('A' . $column, $ikudanikd_1['nama_indikator'])
        ->setCellValue('B' . $column, $ikudanikd_1['jenis_indikator'])
        ->setCellValue('C' . $column, $ikudanikd_1['nama_satuan']);

      $column++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename =  'Data-IKU/IKD1621-' . date('Y-m-d-His');

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }
}
