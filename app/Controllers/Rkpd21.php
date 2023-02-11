<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Controllers\BaseController;
// use App\Models\KategoriWisataModel;
// use App\Models\WisataModel;

class Rkpd21 extends BaseController
{
  // protected $wisataModel;
  // public function __construct()
  // {
  // 	$this->wisataModel = new WisataModel();
  // }

  public function index()
  {

    $rkpd21 = $this->Rkpd21Model->getRkpd21();
    $ikudanikd1621 = $this->Ikudanikd1621Model->getIkudanikd1621();
    $satuan = $this->SatuanModel->getSatuan();
    $misi = $this->MisiModel->getMisi();
    $data = [
      'title' => 'Daftar rkpd21',
      'subTitle' => 'rkpd21',
      // 'event' => $event->paginate(5, 'event'),
      // 'pager' => $this->eventModel->pager,
      // 'currentPage' => $currentPage
      'rkpd21' => $rkpd21,
      'ikudanikd1621' => $ikudanikd1621,
      'misi' => $misi,
      'satuan' => $satuan,
      'menu' => "RPJMD",

    ];
    // dd($data);
    return view('admin/rencanaPembangunanDaerah/rkpd21/data-rkpd21', $data);
  }

  public function ikudanikd()
  {

    $rpjmd1621 = $this->Rpjmd1621Model->getRpjmd1621();
    $data = [
      'title' => 'Daftar rpjmd1621',
      'subTitle' => 'rpjmd1621',
      // 'event' => $event->paginate(5, 'event'),
      // 'pager' => $this->eventModel->pager,
      // 'currentPage' => $currentPage
      'rpjmd1621' => $rpjmd1621

    ];
    // dd($data);
    return view('admin/rencanaPembangunanDaerah/rpjmd1621/contohikuikd', $data);
  }
  public function detail($slug)
  {
    $data =
      [
        'title' => 'Tambah Data',
        'wisata' => $this->wisataModel->getWisata($slug)
      ];
    if (empty($data['wisata'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Wisata ' . $slug . ' tidak ditemukan');
    }
    //   dd($data);
    return view('admin/wisata/detail-wisata', $data);
  }


  public function create()
  {
    $data =
      [
        'title' => 'RKPD 21',
        // 'misi' => $this->MisiModel->orderby('nama_misi')->findAll(),
        // 'ikudanikd1621' => $this->Ikudanikd1621Model->orderby('nama_indikator')->findAll(),
        // 'validation' => \Config\Services::validation()
      ];

    // dd($data);
    // return view('admin/index',$data);
    return view('admin/rencanaPembangunanDaerah/rkpd21/create-rkpd21', $data);
  }

  public function save()
  {

    // Validasi Data
    if (!$this->validate([
      'id_misi' => [
        'rules' => 'required',
        'label' => 'id_misi',
        'errors' => [
          'required' => 'Misi harus dipilih',
          'is_unique' => 'Misi sudah digunakan'
        ]
      ],
      'id_ikudanikd1621' => [
        'rules' => 'required',
        'label' => 'id_ikudanikd1621',
        'errors' => [
          'required' => 'IKU/IKD harus dipilih',
          'is_unique' => 'IKU/IKD sudah digunakan'
        ]
      ],

      't17' => [
        'rules' => 'required',
        'label' => 't17',
        'errors' => [
          'required' => 'Target 2017 harus diisi'
        ]
      ],
      't18' => [
        'rules' => 'required',
        'label' => 't18',
        'errors' => [
          'required' => 'Target 2018  harus diisi'
        ]
      ],
      't19' => [
        'rules' => 'required',
        'label' => 't19',
        'errors' => [
          'required' => 'Target 2019  harus diisi'
        ]
      ],
      't20' => [
        'rules' => 'required',
        'label' => 't20',
        'errors' => [
          'required' => 'Target 2020 harus diisi'
        ]
      ],
      't21' => [
        'rules' => 'required',
        'label' => 't21',
        'errors' => [
          'required' => 'Target 2021 harus diisi'
        ]
      ]
    ])) {
      //Berisi fungsi redirect jika validasi tidak memenuhi
      // dd(\Config\Services::validation()->getErrors());
      return redirect()->to('/admin/rpjmd1621/create')->withInput();
    }

    $user_id = user();
    // $slug = url_title($this->request->getVar('nama_indikator'), '-', true);
    if ($this->Rpjmd1621Model->save([
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'id_misi' => $this->request->getVar('id_misi'),
      'id_ikudanikd1621' => $this->request->getVar('id_ikudanikd1621'),
      // 'slug' => $slug,
      't17' => $this->request->getVar('t17'),
      't18' => $this->request->getVar('t18'),
      't19' => $this->request->getVar('t19'),
      't20' => $this->request->getVar('t20'),
      't21' => $this->request->getVar('t21'),
      'r17' => $this->request->getVar('r17'),
      'r18' => $this->request->getVar('r18'),
      'r19' => $this->request->getVar('r19'),
      'r20' => $this->request->getVar('r20'),
      'r21' => $this->request->getVar('r21'),
    ])) {
      // dd($_SESSION);
      // dd($this->request->getVar());
      session()->setFlashdata('success', 'Data berhasil ditambahkan!');
    } else {
      session()->setFlashdata('error', 'Data gagal ditambahkan!');
    }
    return redirect()->to('admin/rpjmd1621');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Edit Data RPKD',
      'subTitle' => 'RKPD',
      // 'result' => $this->wisataModel->getWisata($slug),
      // 'kategori_wisata' => $this->kategoriWisataModel->orderby('nama_kategori_wisata')->findAll(),
      // 'validation' => \Config\Services::validation()
    ];

    return view('admin/rencanaPembangunanDaerah/rkpd21/edit-rkpd21', $data);
  }

  public function update($id_wisata)
  {
    // Cek Nama Wisata yang lama
    $dataWisataLama = $this->wisataModel->getWisata($this->request->getVar('slug'));
    if ($dataWisataLama['nama_wisata'] == $this->request->getVar('nama_wisata')) {
      $rule_title = 'required';
    } else {
      $rule_title = 'required|is_unique[wisata.nama_wisata]';
    }
    // Validasi Data
    if (!$this->validate([
      'nama_wisata' => [
        'rules' => $rule_title,
        'label' => 'Nama wisata',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'deskripsi_wisata' => [
        'rules' => 'required',
        'label' => 'Deskripsi',
        'errors' => [
          'required' => '{field} harus diisi',
          'is_unique' => '{field} sudah digunakan'
        ]
      ],
      'id_kategori_wisata' => [
        'rules' => 'required',
        'label' => 'Kategori wisata',
        'errors' => [
          'required' => '{field} harus diisi'
        ]
        // '|is_natural_no_zero'
      ],
      'gambar_wisata' => [
        'rules' =>  'max_size[gambar_wisata,1024]|is_image[gambar_wisata]',
        'errors' => [
          'max_size' => 'Ukuran gambar terlalu besar. Max 1 mb',
          'is_image' => 'Yang anda pilih bukan gambar',
          'mime_in' => 'Yang anda pilih bukan gambar',
        ]
      ]
    ])) {
      //Berisi fungsi redirect jika validasi tidak memenuhi
      dd(\Config\Services::validation()->getErrors());
      return redirect()->to('/admin/wisata/edit-wisata/' . $this->request->getVar('slug'))->withInput();
    }

    $fileGambarWisata = $this->request->getFile('gambar_wisata');

    // cek gambar apakah tetap gambar lama
    if ($fileGambarWisata->getError() == 4) {
      $namaFileGambarWisata = $this->request->getVar('gambarWisataLama');
    } else {
      // generate nama gambar random
      $namaFileGambarWisata = $fileGambarWisata->getRandomName();
      // upload gambar
      $fileGambarWisata->move('img/wisata/', $namaFileGambarWisata);
      // hapus file yang lama
      unlink('img/wisata/' . $this->request->getVar('gambarWisataLama'));
    }

    $slug = url_title($this->request->getVar('nama_wisata'), '-', true);
    if ($this->wisataModel->save([
      'id_wisata' => $id_wisata,
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'nama_wisata' => $this->request->getVar('nama_wisata'),
      'slug' => $slug,
      'deskripsi_wisata' => $this->request->getVar('deskripsi_wisata'),
      'harga' => $this->request->getVar('harga'),
      'berat' => $this->request->getVar('berat'),
      'stok' => $this->request->getVar('stok'),
      'id_kategori_wisata' => $this->request->getVar('id_kategori_wisata'),
      'gambar_wisata' => $namaFileGambarWisata

    ])) {
      session()->setFlashdata('success', 'Data berhasil diperbarui!');
    } else {
      session()->setFlashdata('error', 'Data gagal diperbarui!');
    }
    return redirect()->to('/admin/wisata')->withInput();
  }

  public function delete($id_rpjmd1621)
  {
    $this->Rpjmd1621Model->delete($id_rpjmd1621);
    session()->setFlashdata('success', 'Data berhasil dihapus!');
    return redirect()->to('/rpjmd1621')->withInput();
  }

  // wisata
  public function cari()
  {
    $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
    $cari = $this->request->getVar('cari');
    if ($cari) {
      $wisata = $this->wisataModel->get_cari_wisata($cari);
    } else {
      $wisata = $this->wisataModel;
    }
    //   $wisata = $this->wisataModel->findAll();
    $data = [
      'title'           => 'Wisata',
      'subTitle'        => 'Wisata',
      'wisata'          => $wisata->paginate(10, 'wisata'),
      'kategori_wisata' => $this->kategoriWisataModel->findAll(),
      'pager'           => $this->wisataModel->pager,
      'currentPage'     => $currentPage
    ];
    return view('views/wisata/hasil_pencarian', $data);
  }

  public function kategori($kw)
  {
    // $cat = $this->wisataModel->get_wisata_by_kategory($kw);
    $wisata = $this->wisataModel->get_wisata_by_kategory($kw);

    $data = [
      'title'           => 'Wisata',
      'subTitle'        => 'Wisata',
      'wisata'          => $wisata->paginate(10, 'wisata'),
      'kategori_wisata' => $this->kategoriWisataModel->findAll(),
      'pager'           => $this->wisataModel->pager,
      // 'currentPage'     =>$currentPage
    ];
    // d($kw);
    return view('views/wisata/index', $data);
  }

  // kategori wisata admin
  public function kategoriWisataAdmin($kw)
  {
    // $cat = $this->wisataModel->get_wisata_by_kategory($kw);
    $wisata = $this->wisataModel->get_wisata_by_kategory_admin($kw);

    $data = [
      'title'           => 'Wisata',
      'subTitle'        => 'Wisata',
      'wisata'          => $wisata->paginate(10, 'wisata'),
      'kategori_wisata' => $this->kategoriWisataModel->findAll(),
      'pager'           => $this->wisataModel->pager,
      // 'currentPage'     =>$currentPage
    ];
    // d($kw);
    return view('admin/wisata/data-wisata', $data);
  }
  public function cariWisataAdmin()
  {
    $currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
    $cari = $this->request->getVar('cariWisataAdmin');
    if ($cari) {
      $wisata = $this->wisataModel->get_cari_wisata_admin($cari);
    } else {
      $wisata = $this->wisataModel;
    }
    //   $wisata = $this->wisataModel->findAll();
    $data = [
      'title'           => 'Wisata',
      'subTitle'        => 'Wisata',
      'wisata'          => $wisata->paginate(10, 'wisata'),
      'kategori_wisata' => $this->kategoriWisataModel->findAll(),
      'pager'           => $this->wisataModel->pager,
      'currentPage'     => $currentPage
    ];
    return view('views/wisata/hasil_pencarian', $data);
  }

  // coba excel
  public function exportExcel()
  {

    $rpjmd1621 = $this->Rpjmd1621Model->getRpjmd1621();

    $spreadsheet = new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)

      ->setCellValue('A1', 'Nama Misi ')
      ->setCellValue('B1', 'Nama Indikator')
      ->setCellValue('C1', 'Jenis Indikator')
      ->setCellValue('D1', 'Satuan')
      ->setCellValue('E1', 'Target 2017')
      ->setCellValue('F1', 'Realisasi 2017')
      ->setCellValue('G1', 'Target 2018')
      ->setCellValue('H1', 'Realisasi 2018')
      ->setCellValue('I1', 'Target 2019')
      ->setCellValue('J1', 'Realisasi 2019')
      ->setCellValue('K1', 'Target 2020')
      ->setCellValue('L1', 'Realisasi 2020')
      ->setCellValue('M1', 'Target 2021')
      ->setCellValue('N1', 'Realisasi 2021');

    $column = 2;

    foreach ($rpjmd1621 as $rpjmd1621_1) {
      $spreadsheet->setActiveSheetIndex(0)

        ->setCellValue('A' . $column, $rpjmd1621_1['nama_misi'])
        ->setCellValue('B' . $column, $rpjmd1621_1['nama_indikator'])
        ->setCellValue('C' . $column, $rpjmd1621_1['jenis_indikator'])
        ->setCellValue('D' . $column, $rpjmd1621_1['nama_satuan'])
        ->setCellValue('E' . $column, $rpjmd1621_1['t17'])
        ->setCellValue('F' . $column, $rpjmd1621_1['r17'])
        ->setCellValue('G' . $column, $rpjmd1621_1['t18'])
        ->setCellValue('H' . $column, $rpjmd1621_1['r18'])
        ->setCellValue('I' . $column, $rpjmd1621_1['t19'])
        ->setCellValue('J' . $column, $rpjmd1621_1['r19'])
        ->setCellValue('K' . $column, $rpjmd1621_1['t20'])
        ->setCellValue('L' . $column, $rpjmd1621_1['r20'])
        ->setCellValue('M' . $column, $rpjmd1621_1['t20'])
        ->setCellValue('N' . $column, $rpjmd1621_1['r20']);
      $column++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename =  'Data-RPJMD1621-' . date('Y-m-d-His');

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }
}
