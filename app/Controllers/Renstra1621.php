<?php


namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Controllers\BaseController;
// use App\Models\KategoriWisataModel;
// use App\Models\WisataModel;

class Renstra1621 extends BaseController
{
  // protected $wisataModel;
  // public function __construct()
  // {
  // 	$this->wisataModel = new WisataModel();
  // }

  public function index()
  {

    $renstra1621 = $this->Renstra1621Model->getRenstra1621();
    $ikudanikd1621 = $this->Ikudanikd1621Model->getIkudanikd1621();
    $satuan = $this->SatuanModel->getSatuan();
    $misi = $this->MisiModel->getMisi();
    $data = [
      'title' => 'Daftar resntra1621',
      'subTitle' => 'renstra1621',
      // 'event' => $event->paginate(5, 'event'),
      // 'pager' => $this->eventModel->pager,
      // 'currentPage' => $currentPage
      'renstra1621' => $renstra1621,
      'ikudanikd1621' => $ikudanikd1621,
      'misi' => $misi,
      'satuan' => $satuan,
      'topBar' => "Rencana Pembangunan Daerah",
      'menu' => "RENSTRA",
      'subMenu' => "RENSTRA1621",

    ];
    // dd($data);
    return view('admin/rencanaPembangunanDaerah/renstra1621/data-renstra1621', $data);
  }

  public function create()
  {
    $data =
      [
        'title' => 'renstra1621',
        'satuan' => $this->SatuanModel->orderby('nama_satuan')->findAll(),
        'perangkatdaerah' => $this->PerangkatDaerahModel->orderby('nama_pd')->findAll(),
        'validation' => \Config\Services::validation(),
        'topBar' => "Rencana Pembangunan Daerah",
        'menu' => "RENSTRA",
        'subMenu' => "RENSTRA1621",
      ];

    // dd($data);
    // return view('admin/index',$data);
    return view('admin/rencanaPembangunanDaerah/renstra1621/create-renstra1621', $data);
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
        'rules' => 'required',
        'label' => 'Nama Indikator',
        'errors' => [
          'required' => 'Indikator harus diisi',
          'is_unique' => 'Nama Indikator sudah digunakan'
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
      return redirect()->to('/admin/renstra1621/create')->withInput();
    }

    $user_id = user();
    // $slug = url_title($this->request->getVar('nama_indikator'), '-', true);
    if ($this->Renstra1621Model->save([
      // 'id_user'     => $this->request->$user_id,
      // 'id_user'     => $this->request->user_id,
      'id_pd' => $this->request->getVar('id_pd'),
      'id_satuan' => $this->request->getVar('id_satuan'),
      // 'slug' => $slug,
      'nama_indikator' => $this->request->getVar('nama_indikator'),
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
    return redirect()->to('admin/renstra1621');
  }

  public function edit($id_renstra1621)
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
    'rules' => 'required',
    'label' => 'Nama Indikator',
    'errors' => [
      'required' => 'Indikator harus diisi',
      'is_unique' => 'Nama Indikator sudah digunakan'
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
  return redirect()->to("/renstra1621/update/{$id_renstra1621}")->withInput();
}

$user_id = user();
// $slug = url_title($this->request->getVar('nama_indikator'), '-', true);
if ($this->Renstra1621Model->update($id_renstra1621,[
  // 'id_user'     => $this->request->$user_id,
  // 'id_user'     => $this->request->user_id,
  'id_pd' => $this->request->getVar('id_pd'),
  'id_satuan' => $this->request->getVar('id_satuan'),
  // 'slug' => $slug,
  'nama_indikator' => $this->request->getVar('nama_indikator'),
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
return redirect()->to('admin/renstra1621');
  }


  public function update($id_renstra1621)
  {
    $renstra1621 = $this->Renstra1621Model->getRenstra1621();
    $ikudanikd1621 = $this->Ikudanikd1621Model->getIkudanikd1621();
    $satuan = $this->SatuanModel->getSatuan();
    $misi = $this->MisiModel->getMisi();
    $alldata = $this->Renstra1621Model->getdataupdate($id_renstra1621);
    $id_pd = $alldata[0]['id_pd'];
    $id_satuan = $alldata[0]['id_satuan'];
    $nama_indikator = $alldata[0]['nama_indikator'];
    $t17	= $alldata[0]['t17'];
    $r17	= $alldata[0]['r17'];
    $t18	= $alldata[0]['t18'];
    $r18	= $alldata[0]['r18'];
    $t19	= $alldata[0]['t19'];
    $r19	= $alldata[0]['r19'];
    $t20	= $alldata[0]['t20'];
    $r20	= $alldata[0]['r20'];
    $t21	= $alldata[0]['t21'];
    $r21	= $alldata[0]['r21'];
    $data =
      [
          'title' => 'renstra1621',
          'satuan' => $this->SatuanModel->orderby('nama_satuan')->findAll(),
          'perangkatdaerah' => $this->PerangkatDaerahModel->orderby('nama_pd')->findAll(),
          'id_renstra1621' => $id_renstra1621,
          'validation' => \Config\Services::validation(),
          'satuan' => $this->SatuanModel->orderby('nama_satuan')->findAll(),
          'perangkatdaerah' => $this->PerangkatDaerahModel->orderby('nama_pd')->findAll(),
          'id_perangkatdaerah' => $id_pd,
          'id_satuan' =>$id_satuan,
          'nama_indikator' =>$nama_indikator,
          'topBar' => "Rencana Pembangunan Daerah",
          'menu' => "RENSTRA",
          'subMenu' => "RENSTRA1621",
        't17' => $t17,
        'r17' => $r17,
        't18' => $t18,
        'r18' => $r18,
        't19' => $t19,
        'r19' => $r19,
        't20' => $t20,
        'r20' => $r20,
        't21' => $t21,
        'r21' => $r21
      ];

      // dd($data);
      // return view('admin/index',$data);
   
      return view('admin/rencanaPembangunanDaerah/renstra1621/edit-renstra1621', $data);
  }


  public function delete($id_renstra1621)
  {
    $this->Renstra1621Model->deleteData($id_renstra1621);
    session()->setFlashdata('success', 'Data berhasil dihapus!');
    return redirect()->to('/renstra1621')->withInput();
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

    $renstra1621 = $this->Renstra1621Model->getRenstra1621();

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

    foreach ($renstra1621 as $renstra1621_1) {
      $spreadsheet->setActiveSheetIndex(0)

        ->setCellValue('A' . $column, $renstra1621_1['nama_misi'])
        ->setCellValue('B' . $column, $renstra1621_1['nama_indikator'])
        ->setCellValue('C' . $column, $renstra1621_1['jenis_indikator'])
        ->setCellValue('D' . $column, $renstra1621_1['nama_satuan'])
        ->setCellValue('E' . $column, $renstra1621_1['t17'])
        ->setCellValue('F' . $column, $renstra1621_1['r17'])
        ->setCellValue('G' . $column, $renstra1621_1['t18'])
        ->setCellValue('H' . $column, $renstra1621_1['r18'])
        ->setCellValue('I' . $column, $renstra1621_1['t19'])
        ->setCellValue('J' . $column, $renstra1621_1['r19'])
        ->setCellValue('K' . $column, $renstra1621_1['t20'])
        ->setCellValue('L' . $column, $renstra1621_1['r20'])
        ->setCellValue('M' . $column, $renstra1621_1['t20'])
        ->setCellValue('N' . $column, $renstra1621_1['r20']);
      $column++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename =  'Data-Renstra1621-' . date('Y-m-d-His');

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  }
}
