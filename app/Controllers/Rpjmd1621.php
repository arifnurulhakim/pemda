<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Controllers\BaseController;
// use App\Models\KategoriWisataModel;
// use App\Models\WisataModel;

class Rpjmd1621 extends BaseController
{

  // protected $wisataModel;
  // public function __construct()
  // {
  // 	$this->wisataModel = new WisataModel();
  // }

  public function index()
  {

    $rpjmd1621 = $this->Rpjmd1621Model->getRpjmd1621();
    $ikudanikd1621 = $this->Ikudanikd1621Model->getIkudanikd1621();
    $satuan = $this->SatuanModel->getSatuan();
    $misi = $this->MisiModel->getMisi();
    $data = [
      'title' => 'Daftar rpjmd1621',
      'subTitle' => 'rpjmd1621',
      // 'event' => $event->paginate(5, 'event'),
      // 'pager' => $this->eventModel->pager,
      // 'currentPage' => $currentPage
      'rpjmd1621' => $rpjmd1621,
      'ikudanikd1621' => $ikudanikd1621,
      'misi' => $misi,
      'satuan' => $satuan,
      'topBar' => "Rencana Pembangunan Daerah",
      'menu' => "RPJMD",
      'subMenu' => "RPJMD1621",

    ];
    // dd($data);
    return view('admin/rencanaPembangunanDaerah/rpjmd1621/data-rpjmd1621', $data);
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
      'rpjmd1621' => $rpjmd1621,
      'topBar' => "Rencana Pembangunan Daerah",
      'menu' => "RPJMD",
      'subMenu' => "RPJMD1621",

    ];
    // dd($data);
    return view('admin/rencanaPembangunanDaerah/rpjmd1621/contohikuikd', $data);
  }
  public function detail($slug)
  {
    $data =
      [
        'title' => 'Tambah Data',
        'wisata' => $this->wisataModel->getWisata($slug),
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
        'title' => 'rpjmd1621',
        'misi' => $this->MisiModel->orderby('nama_misi')->findAll(),
        'ikudanikd1621' => $this->Ikudanikd1621Model->orderby('nama_indikator')->findAll(),
        'validation' => \Config\Services::validation(),
        'topBar' => "Rencana Pembangunan Daerah",
        'menu' => "RPJMD",
        'subMenu' => "RPJMD1621",
      ];

    // dd($data);
    // return view('admin/index',$data);
    return view('admin/rencanaPembangunanDaerah/rpjmd1621/create-rpjmd1621', $data);
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

  public function edit($id_rpjmd1621)
  {
    // if (!$this->validate([
    //   'id_misi' => [
    //     'rules' => 'required',
    //     'label' => 'id_misi',
    //     'errors' => [
    //       'required' => 'Misi harus dipilih',
    //       'is_unique' => 'Misi sudah digunakan'
    //     ]
    //   ],
    //   'id_ikudanikd1621' => [
    //     'rules' => 'required',
    //     'label' => 'id_ikudanikd1621',
    //     'errors' => [
    //       'required' => 'IKU/IKD harus dipilih',
    //       'is_unique' => 'IKU/IKD sudah digunakan'
    //     ]
    //   ],

    //   't17' => [
    //     'rules' => 'required',
    //     'label' => 't17',
    //     'errors' => [
    //       'required' => 'Target 2017 harus diisi'
    //     ]
    //   ],
    //   't18' => [
    //     'rules' => 'required',
    //     'label' => 't18',
    //     'errors' => [
    //       'required' => 'Target 2018  harus diisi'
    //     ]
    //   ],
    //   't19' => [
    //     'rules' => 'required',
    //     'label' => 't19',
    //     'errors' => [
    //       'required' => 'Target 2019  harus diisi'
    //     ]
    //   ],
    //   't20' => [
    //     'rules' => 'required',
    //     'label' => 't20',
    //     'errors' => [
    //       'required' => 'Target 2020 harus diisi'
    //     ]
    //   ],
    //   't21' => [
    //     'rules' => 'required',
    //     'label' => 't21',
    //     'errors' => [
    //       'required' => 'Target 2021 harus diisi'
    //     ]
    //   ]
    // ])) {
    //   //Berisi fungsi redirect jika validasi tidak memenuhi
    //   // dd(\Config\Services::validation()->getErrors());
    //   return redirect()->to('Rpjmd1621/');
    // }
  
    $user_id = user();
    // $slug = url_title($this->request->getVar('nama_indikator'), '-', true);
    if ($this->Rpjmd1621Model->update($id_rpjmd1621, [
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
      session()->setFlashdata('success', 'Data berhasil diperbarui!');
    } else {
      session()->setFlashdata('error', 'Data gagal diperbarui!');
    }
    return redirect()->to('admin/rpjmd1621');
  }

  public function update($id_rpjmd1621)
  {
    $alldata = $this->Rpjmd1621Model->getdataupdate($id_rpjmd1621);
    $id_ikudanikd1621 = $alldata[0]['id_ikudanikd1621'];
    $misi	= $alldata[0]['id_misi'];
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
        'title' => 'rpjmd1621',
        'misi' => $this->MisiModel->orderby('nama_misi')->findAll(),
        'ikudanikd1621' => $this->Ikudanikd1621Model->orderby('nama_indikator')->findAll(),
        'validation' => \Config\Services::validation(),
        'id_rpjmd1621' => $id_rpjmd1621,
        'id_misi' => $misi,
        'id_ikudanikd1621' => $id_ikudanikd1621,
        'menu' => "RPJMD",
        'subMenu' => "RPJMD1621",
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
   
      return view('admin/rencanaPembangunanDaerah/rpjmd1621/edit-rpjmd1621', $data);
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

  function getDataUpdate($id_rpjmd1621){
    

    $alldata = $this->Rpjmd1621Model->getdataupdate($id_rpjmd1621);
    $misi = $alldata[0]['id_misi'];
    $id_rpjmd1621_data = $alldata[0]['id_rpjmd1621'];
    $id_ikudanikd1621	= $alldata[0]['id_misi'];
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

    return view('admin\rencanaPembangunanDaerah\rpjmd1621\edit-rpjmd1621', [
      'title' => 'rpjmd1621',
      'ikudanikd1621' => $this->Ikudanikd1621Model->orderby('nama_indikator')->findAll(),
      'misi' => $this->MisiModel->orderby('nama_misi')->findAll(),
      'validation' => \Config\Services::validation(),
      'id_rpjmd1621' => $id_rpjmd1621,
      'id_misi' => $misi,
      'id_ikudanikd1621_data' => $id_ikudanikd1621,
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
  ]);
  }
  public function delete($id_rpjmd1621)
  {
    $this->Rpjmd1621Model->deleteData($id_rpjmd1621);
    session()->setFlashdata('success', 'Data berhasil dihapus!');
    return redirect()->to('/rpjmd1621')->withInput();
  }
}
