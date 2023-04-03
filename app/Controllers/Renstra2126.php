<?php


namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Controllers\BaseController;
// use App\Models\KategoriWisataModel;
// use App\Models\WisataModel;

class Renstra2126 extends BaseController
{
  // protected $wisataModel;
  // public function __construct()
  // {
  // 	$this->wisataModel = new WisataModel();
  // }

  public function index()
  {
    $request = \Config\Services::request();

    $segment = $request->uri->getSegment(2);

    $renstra2126 = $this->Renstra2126Model->getRenstra2126();
    $ikudanikd2126 = $this->Ikudanikd2126Model->getIkudanikd2126();
    $satuan = $this->SatuanModel->getSatuan();
    $misi = $this->MisiModel->getMisi();
    $data = [
      'title' => 'Daftar resntra2126',
      'subTitle' => 'renstra2126',
      // 'event' => $event->paginate(5, 'event'),
      // 'pager' => $this->eventModel->pager,
      // 'currentPage' => $currentPage
      'renstra2126' => $renstra2126,
      'ikudanikd2126' => $ikudanikd2126,
      'misi' => $misi,
      'satuan' => $satuan,
      'topBar' => "Rencana Pembangunan Daerah",
      'menu' => "RENSTRA",
      'subMenu' => "RENSTRA2126",
      'segment' => $segment,
    ];
    // dd($data);
    return view('admin/rencanaPembangunanDaerah/renstra2126/data-renstra2126', $data);
  }

  public function create()
  {
    $data =
      [
        'title' => 'renstra2126',
        'satuan' => $this->SatuanModel->orderby('nama_satuan')->findAll(),
        'perangkatdaerah' => $this->PerangkatDaerahModel->orderby('nama_pd')->findAll(),
        'validation' => \Config\Services::validation(),
        'topBar' => "Rencana Pembangunan Daerah",
        'menu' => "RENSTRA",
        'subMenu' => "RENSTRA2126",
      ];

    // dd($data);
    // return view('admin/index',$data);
    return view('admin/rencanaPembangunanDaerah/renstra2126/create-renstra2126', $data);
  }

  public function save()
  {

    // Validasi Data
    if (!$this->validate([
      'id_satuan' => [
        'rules' => 'required',
        'label' => 'Satuan',
        'errors' => [
          'required' => 'Satuan harus dipilih'
        ]
      ],

      'id_pd' => [
        'rules' => 'required',
        'label' => 'perangkatdaerah',
        'errors' => [
          'required' => 'Perangkat Daerah harus diisi'
        ]
      ],

      'nama_indikator' => [
        'rules' => 'required|is_unique[renstra2126.nama_indikator]',
        'label' => 'Nama Indikator',
        'errors' => [
          'required' => 'Indikator harus diisi',
          'is_unique' => 'Nama Indikator sudah digunakan'
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
          'required' => 'Target 2023  harus diisi'
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
      return redirect()->to('/admin/renstra2126/create')->withInput();
    }

    $user_id = user();
    // $slug = url_title($this->request->getVar('nama_indikator'), '-', true);
    if ($this->Renstra2126Model->save([
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'id_pd' => $this->request->getVar('id_pd'),
      'id_satuan' => $this->request->getVar('id_satuan'),
      // 'slug' => $slug,
      'nama_indikator' => $this->request->getVar('nama_indikator'),
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
    return redirect()->to('admin/renstra2126');
  }

  public function edit($slug)
  {
    $data = [
      'title' => 'Edit Data Renstra 2021-2026',
      'subTitle' => 'Wisata',
      // 'result' => $this->wisataModel->getWisata($slug),
      // 'kategori_wisata' => $this->kategoriWisataModel->orderby('nama_kategori_wisata')->findAll(),
      // 'validation' => \Config\Services::validation()
    ];

    return view('admin/rencanaPembangunanDaerah/renstra2126/edit-renstra2126', $data);
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

  public function delete($id_renstra2126)
  {
    $this->Renstra2126Model->delete($id_renstra2126);
    session()->setFlashdata('success', 'Data berhasil dihapus!');
    return redirect()->to('/renstra2126')->withInput();
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

    $renstra2126 = $this->Renstra2126Model->getRenstra2126();

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

    foreach ($renstra2126 as $renstra2126_1) {
      $spreadsheet->setActiveSheetIndex(0)

        ->setCellValue('A' . $column, $renstra2126_1['nama_misi'])
        ->setCellValue('B' . $column, $renstra2126_1['nama_indikator'])
        ->setCellValue('C' . $column, $renstra2126_1['jenis_indikator'])
        ->setCellValue('D' . $column, $renstra2126_1['nama_satuan'])
        ->setCellValue('E' . $column, $renstra2126_1['t17'])
        ->setCellValue('F' . $column, $renstra2126_1['r17'])
        ->setCellValue('G' . $column, $renstra2126_1['t18'])
        ->setCellValue('H' . $column, $renstra2126_1['r18'])
        ->setCellValue('I' . $column, $renstra2126_1['t19'])
        ->setCellValue('J' . $column, $renstra2126_1['r19'])
        ->setCellValue('K' . $column, $renstra2126_1['t20'])
        ->setCellValue('L' . $column, $renstra2126_1['r20'])
        ->setCellValue('M' . $column, $renstra2126_1['t20'])
        ->setCellValue('N' . $column, $renstra2126_1['r20']);
      $column++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename =  'Data-Renstra2126-' . date('Y-m-d-His');

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }
}
