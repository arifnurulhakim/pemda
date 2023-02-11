<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR
namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Controllers\BaseController;
// use App\Models\KategoriWisataModel;
// use App\Models\WisataModel;

class Sbs22 extends BaseController
{
  // protected $wisataModel;
  // public function __construct()
  // {
  // 	$this->wisataModel = new WisataModel();
  // }
  public function index()
  {
    $sbs22 = $this->Sbs22Model->getSbs22();
    $satuan = $this->SatuanModel->getSatuan();
    $perangkatdaerah = $this->PerangkatDaerahModel->getPerangkatDaerah();
    $kode_rekening = $this->KodeRekeningModel->getKodeRekening();
    $data = [
      'title' => 'Daftar sbs22',
      'subTitle' => 'sbs22',
      // 'event' => $event->paginate(5, 'event'),
      // 'pager' => $this->eventModel->pager,
      // 'currentPage' => $currentPage

      'perangkatdaerah' => $perangkatdaerah,
      'kode_rekening' => $kode_rekening,
      'satuan' => $satuan,
      'sbs22' => $sbs22
    ];
    // dd($kategoriWisata);
    return view('admin/kolaboratif22/sbs22/data-sbs22', $data);
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
        'title' => 'rpjmd2126',
        'misi2126' => $this->Misi2126Model->orderby('nama_misi2126')->findAll(),
        'ikudanikd2126' => $this->Ikudanikd2126Model->orderby('nama_indikator')->findAll(),
        'validation' => \Config\Services::validation()
      ];

    // dd($data);
    // return view('admin/index',$data);
    return view('admin/rencanaPembangunanDaerah/rpjmd2126/create-rpjmd2126', $data);
  }

  public function save()
  {

    // Validasi Data
    if (!$this->validate([
      'id_misi2126' => [
        'rules' => 'required',
        'label' => 'id_misi2126',
        'errors' => [
          'required' => 'Misi2126 harus dipilih',
          'is_unique' => 'Misi2126 sudah digunakan'
        ]
      ],
      'id_ikudanikd2126' => [
        'rules' => 'required',
        'label' => 'id_ikudanikd2126',
        'errors' => [
          'required' => 'IKU/IKD harus dipilih',
          'is_unique' => 'IKU/IKD sudah digunakan'
        ]
      ],

      't22' => [
        'rules' => 'required',
        'label' => 't22',
        'errors' => [
          'required' => 'Target 2022 harus diisi'
        ]
      ],
      't23' => [
        'rules' => 'required',
        'label' => 't23',
        'errors' => [
          'required' => 'Target 2023 harus diisi'
        ]
      ],
      't24' => [
        'rules' => 'required',
        'label' => 't24',
        'errors' => [
          'required' => 'Target 2024  harus diisi'
        ]
      ],
      't25' => [
        'rules' => 'required',
        'label' => 't25',
        'errors' => [
          'required' => 'Target 2025 harus diisi'
        ]
      ],
      't26' => [
        'rules' => 'required',
        'label' => 't26',
        'errors' => [
          'required' => 'Target 2026 harus diisi'
        ]
      ]
    ])) {
      //Berisi fungsi redirect jika validasi tidak memenuhi
      // dd(\Config\Services::validation()->getErrors());
      return redirect()->to('/admin/rpjmd2126/create')->withInput();
    }

    $user_id = user();
    // $slug = url_title($this->request->getVar('nama_indikator'), '-', true);
    if ($this->Rpjmd2126Model->save([
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'id_misi2126' => $this->request->getVar('id_misi2126'),
      'id_ikudanikd2126' => $this->request->getVar('id_ikudanikd2126'),
      // 'slug' => $slug,
      't22' => $this->request->getVar('t22'),
      't23' => $this->request->getVar('t23'),
      't24' => $this->request->getVar('t24'),
      't25' => $this->request->getVar('t25'),
      't26' => $this->request->getVar('t26'),
      'r22' => $this->request->getVar('r22'),
      'r23' => $this->request->getVar('r23'),
      'r24' => $this->request->getVar('r24'),
      'r25' => $this->request->getVar('r25'),
      'r26' => $this->request->getVar('r26'),
    ])) {
      // dd($_SESSION);
      // dd($this->request->getVar());
      session()->setFlashdata('success', 'Data berhasil ditambahkan!');
    } else {
      session()->setFlashdata('error', 'Data gagal ditambahkan!');
    }
    return redirect()->to('admin/rpjmd2126');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Edit Data Wisata',
      'subTitle' => 'Wisata',
      'result' => $this->wisataModel->getWisata($slug),
      'kategori_wisata' => $this->kategoriWisataModel->orderby('nama_kategori_wisata')->findAll(),
      'validation' => \Config\Services::validation()
    ];

    return view('admin/wisata/edit-wisata', $data);
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

  public function delete($id_rpjmd2126)
  {
    $this->Rpjmd2126Model->delete($id_rpjmd2126);
    session()->setFlashdata('success', 'Data berhasil dihapus!');
    return redirect()->to('/rpjmd2126')->withInput();
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

    $rpjmd2126 = $this->Rpjmd2126Model->getRpjmd2126();

    $spreadsheet = new Spreadsheet();

    $spreadsheet->setActiveSheetIndex(0)

      ->setCellValue('A1', 'Nama Misi2126 ')
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

    foreach ($rpjmd2126 as $rpjmd2126_1) {
      $spreadsheet->setActiveSheetIndex(0)

        ->setCellValue('A' . $column, $rpjmd2126_1['nama_misi2126'])
        ->setCellValue('B' . $column, $rpjmd2126_1['nama_indikator'])
        ->setCellValue('C' . $column, $rpjmd2126_1['jenis_indikator'])
        ->setCellValue('D' . $column, $rpjmd2126_1['nama_satuan'])
        ->setCellValue('E' . $column, $rpjmd2126_1['t22'])
        ->setCellValue('F' . $column, $rpjmd2126_1['r17'])
        ->setCellValue('G' . $column, $rpjmd2126_1['t18'])
        ->setCellValue('H' . $column, $rpjmd2126_1['r18'])
        ->setCellValue('I' . $column, $rpjmd2126_1['t19'])
        ->setCellValue('J' . $column, $rpjmd2126_1['r19'])
        ->setCellValue('K' . $column, $rpjmd2126_1['t20'])
        ->setCellValue('L' . $column, $rpjmd2126_1['r20'])
        ->setCellValue('M' . $column, $rpjmd2126_1['t20'])
        ->setCellValue('N' . $column, $rpjmd2126_1['r20']);
      $column++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename =  'Data-RPJMD2126-' . date('Y-m-d-His');

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }
}
