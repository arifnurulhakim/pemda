<?php


namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Controllers\BaseController;
class Rkpd extends BaseController
{
    protected $format = 'json';

    public function index()
    {
  
      $rkpd = $this->RkpdModel->getRkpd();
      $data = [
        'title' => 'Daftar rkpd',
        'subTitle' => 'rkpd',
        // 'event' => $event->paginate(5, 'event'),
        // 'pager' => $this->eventModel->pager,
        // 'currentPage' => $currentPage
        'rkpd' => $rkpd,
        'topBar' => "Rencana Pembangunan Daerah",
        'menu' => "RKPD",
        'subMenu' => "RKPD",
  
      ];
      // dd($data);
      return view('admin/rencanaPembangunanDaerah/rkpd/data-rkpd', $data);
    }
    public function create()
  {
    $data =
      [
        'title' => 'rkpd',
        'rekening' => $this->KodeRekeningModel->orderby('kode_rekening')->findAll(),
        'pd' => $this->PerangkatDaerahModel->orderby('nama_pd')->findAll(),
        'satuan' => $this->SatuanModel->orderby('nama_satuan')->findAll(),
        'validation' => \Config\Services::validation(),
        'topBar' => "Rencana Pembangunan Daerah",
        'menu' => "RKPD",
        'subMenu' => "RKPD",
      ];

    // dd($data);
    // return view('admin/index',$data);
    return view('admin/rencanaPembangunanDaerah/rkpd/create-rkpd', $data);
  }
  public function save()
{
    // // Validasi Data
    // if (!$this->validate([
    //     'id_rkpd' => [
    //         'rules' => 'required|is_unique[rkpd.id_rkpd]',
    //         'label' => 'ID RKPD',
    //         'errors' => [
    //             'required' => 'ID RKPD harus diisi',
    //             'is_unique' => 'ID RKPD sudah digunakan'
    //         ]
    //     ],
    //     'id_kode_rekening' => [
    //         'rules' => 'required',
    //         'label' => 'ID Kode Rekening',
    //         'errors' => [
    //             'required' => 'ID Kode Rekening harus diisi'
    //         ]
    //     ],
    //     'id_pd' => [
    //         'rules' => 'required',
    //         'label' => 'ID PD',
    //         'errors' => [
    //             'required' => 'ID PD harus diisi'
    //         ]
    //     ],
    //     'program' => [
    //         'rules' => 'required',
    //         'label' => 'Program',
    //         'errors' => [
    //             'required' => 'Program harus diisi'
    //         ]
    //     ],
    //     'indikator' => [
    //         'rules' => 'required',
    //         'label' => 'Indikator',
    //         'errors' => [
    //             'required' => 'Indikator harus diisi'
    //         ]
    //     ],
    //     'target' => [
    //         'rules' => 'required',
    //         'label' => 'Target',
    //         'errors' => [
    //             'required' => 'Target harus diisi'
    //         ]
    //     ],
    //     'id_satuan' => [
    //         'rules' => 'required',
    //         'label' => 'ID Satuan',
    //         'errors' => [
    //             'required' => 'ID Satuan harus diisi'
    //         ]
    //     ],
    //     'pagu' => [
    //         'rules' => 'required',
    //         'label' => 'Pagu',
    //         'errors' => [
    //             'required' => 'Pagu harus diisi'
    //         ]
    //     ],
    //     'id_kab' => [
    //         'rules' => 'required',
    //         'label' => 'ID Kabupaten',
    //         'errors' => [
    //             'required' => 'ID Kabupaten harus diisi'
    //         ]
    //     ],
    //     'sumber_dana' => [
    //         'rules' => 'required',
    //         'label' => 'Sumber Dana',
    //         'errors' => [
    //             'required' => 'Sumber Dana harus diisi'
    //         ]
    //     ],
    //     'prioritas_nasional' => [
    //         'rules' => 'required',
    //         'label' => 'Prioritas Nasional',
    //         'errors' => [
    //             'required' => 'Prioritas Nasional harus diisi'
    //         ]
    //     ],
    //     'prioritas_daerah' => [
    //         'rules' => 'required',
    //         'label' => 'Prioritas Daerah',
    //         'errors' => [
    //             'required' => 'Prioritas Daerah harus diisi'
    //         ]
    //     ],
    //     'kelompok_sasaran' => [
    //         'rules' => 'required',
    //         'label' => 'Kelompok Sasaran',
    //         'errors' => [
    //             'required' => 'Kelompok Sasaran harus diisi'
    //         ]
    //     ],
    //     'tahun_rkpd' => [
    //         'rules' => 'required',
    //         'label' => 'Tahun RKPD',
    //         'errors' => [
    //             'required' => 'Tahun RKPD harus diisi'
    //         ]
    //     ]
    // ])) {
    //      //Berisi fungsi redirect jika validasi tidak memenuhi
    //   // dd(\Config\Services::validation()->getErrors());
    //   return redirect()->to('/admin/rkpd/create')->withInput();
    // }
    $user_id = user();
    // $slug = url_title($this->request->getVar('nama_indikator'), '-', true);
    if ($this->RkpdModel->save([
      'id_kode_rekening' => $this->request->getVar('id_kode_rekening'),
      'id_pd' => $this->request->getVar('id_pd'),
      'program' => $this->request->getVar('program'),
      'indikator' => $this->request->getVar('indikator'),
      'target' => $this->request->getVar('target'),
      'id_satuan' => $this->request->getVar('id_satuan'),
      'pagu' => $this->request->getVar('pagu'),
      'id_kab' => $this->request->getVar('id_kab'),
      'sumber_dana' => $this->request->getVar('sumber_dana'),
      'prioritas_nasional' => $this->request->getVar('prioritas_nasional'),
      'prioritas_daerah' => $this->request->getVar('prioritas_daerah'),
      'kelompok_sasaran' => $this->request->getVar('kelompok_sasaran'),
      'tahun_rkpd' => $this->request->getVar('tahun_rkpd'),
      'created_at' => date('Y-m-d H:i:s'),
      'updated_at' => date('Y-m-d H:i:s'),
  ])) {
      session()->setFlashdata('success', 'Data berhasil ditambahkan!');
  } else {
      session()->setFlashdata('error', 'Data gagal ditambahkan!');
  }
  return redirect()->to('admin/rkpd');
}
public function edit($id_rkpd)
{
  $user_id = user();
 if ($this->RkpdModel->update( $id_rkpd,[
    'id_kode_rekening' => $this->request->getVar('id_kode_rekening'),
    'id_pd' => $this->request->getVar('id_pd'),
    'program' => $this->request->getVar('program'),
    'indikator' => $this->request->getVar('indikator'),
    'target' => $this->request->getVar('target'),
    'id_satuan' => $this->request->getVar('id_satuan'),
    'pagu' => $this->request->getVar('pagu'),
    'id_kab' => $this->request->getVar('id_kab'),
    'sumber_dana' => $this->request->getVar('sumber_dana'),
    'prioritas_nasional' => $this->request->getVar('prioritas_nasional'),
    'prioritas_daerah' => $this->request->getVar('prioritas_daerah'),
    'kelompok_sasaran' => $this->request->getVar('kelompok_sasaran'),
    'tahun_rkpd' => $this->request->getVar('tahun_rkpd'),
    'created_at' => date('Y-m-d H:i:s'),
    'updated_at' => date('Y-m-d H:i:s'),
])) {
    session()->setFlashdata('success', 'Data berhasil ditambahkan!');
} else {
    session()->setFlashdata('error', 'Data gagal ditambahkan!');
}
return redirect()->to('admin/rkpd');
}
public function update($id_rkpd)
{
  $alldata = $this->RkpdModel->getdataupdate($id_rkpd);
  $id_kode_rekening = $alldata[0]['id_kode_rekening'];
  $id_pd = $alldata[0]['id_pd'];
  $program = $alldata[0]['program'];
  $indikator = $alldata[0]['indikator'];
  $target = $alldata[0]['target'];
  $id_satuan = $alldata[0]['id_satuan'];
  $pagu = $alldata[0]['pagu'];
  $id_kab = $alldata[0]['id_kab'];
  $sumber_dana = $alldata[0]['sumber_dana'];
  $prioritas_nasional = $alldata[0]['prioritas_nasional'];
  $prioritas_daerah = $alldata[0]['prioritas_daerah'];
  $kelompok_sasaran = $alldata[0]['kelompok_sasaran'];
  $tahun_rkpd = $alldata[0]['tahun_rkpd'];

  $data = [
    'title' => 'rkpd',
    'kode_rekening' => $this->KodeRekeningModel->findAll(),
    'pd' => $this->PerangkatDaerahModel->findAll(),
    'satuan' => $this->SatuanModel->findAll(),
    'validation' => \Config\Services::validation(),
    'id_rkpd' => $id_rkpd,
    'id_kode_rekening' => $id_kode_rekening,
    'id_pd' => $id_pd,
    'program' => $program,
    'indikator' => $indikator,
    'target' => $target,
    'id_satuan' => $id_satuan,
    'pagu' => $pagu,
    'id_kab' => $id_kab,
    'sumber_dana' => $sumber_dana,
    'prioritas_nasional' => $prioritas_nasional,
    'prioritas_daerah' => $prioritas_daerah,
    'kelompok_sasaran' => $kelompok_sasaran,
    'tahun_rkpd' => $tahun_rkpd,
    'topBar' => "Rencana Pembangunan Daerah",
    'menu' => "RKPD",
    'subMenu' => "RKPD",
  ];

  return view('admin/rencanaPembangunanDaerah/rkpd/edit-rkpd', $data);
}
public function exportExcel()
{
  $rkpd = $this->RkpdModel->getRkpd(); // Mengambil data dari database sesuai dengan kebutuhan

    $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    // Set judul kolom
    $sheet->setCellValue('A1', 'ID RKPD');
    $sheet->setCellValue('B1', 'ID Kode Rekening');
    $sheet->setCellValue('C1', 'ID PD');
    $sheet->setCellValue('D1', 'Program');
    $sheet->setCellValue('E1', 'Indikator');
    $sheet->setCellValue('F1', 'Target');
    $sheet->setCellValue('G1', 'ID Satuan');
    $sheet->setCellValue('H1', 'Pagu');
    $sheet->setCellValue('I1', 'ID Kab');
    $sheet->setCellValue('J1', 'Sumber Dana');
    $sheet->setCellValue('K1', 'Prioritas Nasional');
    $sheet->setCellValue('L1', 'Prioritas Daerah');
    $sheet->setCellValue('M1', 'Kelompok Sasaran');
    $sheet->setCellValue('N1', 'Tahun RKPD');
    $sheet->setCellValue('O1', 'Created At');
    $sheet->setCellValue('P1', 'Updated At');

    // Set data
    $row = 2;
    foreach ($rkpd as $item) {
        $sheet->setCellValue('A' . $row, $item['id_rkpd']);
        $sheet->setCellValue('B' . $row, $item['id_kode_rekening']);
        $sheet->setCellValue('C' . $row, $item['id_pd']);
        $sheet->setCellValue('D' . $row, $item['program']);
        $sheet->setCellValue('E' . $row, $item['indikator']);
        $sheet->setCellValue('F' . $row, $item['target']);
        $sheet->setCellValue('G' . $row, $item['id_satuan']);
        $sheet->setCellValue('H' . $row, $item['pagu']);
        $sheet->setCellValue('I' . $row, $item['id_kab']);
        $sheet->setCellValue('J' . $row, $item['sumber_dana']);
        $sheet->setCellValue('K' . $row, $item['prioritas_nasional']);
        $sheet->setCellValue('L' . $row, $item['prioritas_daerah']);
        $sheet->setCellValue('M' . $row, $item['kelompok_sasaran']);
        $sheet->setCellValue('N' . $row, $item['tahun_rkpd']);
        $sheet->setCellValue('O' . $row, $item['created_at']);
        $sheet->setCellValue('P' . $row, $item['updated_at']);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);
    $filename =  'Data-RKPD-' . date('Y-m-d-His');

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename=' . $filename . '.xlsx');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
  
}

function getDataUpdate($id_rkpd){
    
    $alldata = $this->RkpdModel->getdataupdate($id_rkpd);
    $id_kode_rekening = $alldata[0]['id_kode_rekening'];
    $id_pd = $alldata[0]['id_pd'];
    $program = $alldata[0]['program'];
    $indikator = $alldata[0]['indikator'];
    $target = $alldata[0]['target'];
    $id_satuan = $alldata[0]['id_satuan'];
    $pagu = $alldata[0]['pagu'];
    $id_kab = $alldata[0]['id_kab'];
    $sumber_dana = $alldata[0]['sumber_dana'];
    $prioritas_nasional = $alldata[0]['prioritas_nasional'];
    $prioritas_daerah = $alldata[0]['prioritas_daerah'];
    $kelompok_sasaran = $alldata[0]['kelompok_sasaran'];
    $tahun_rkpd = $alldata[0]['tahun_rkpd'];

    return view('admin\rkpd\edit-rkpd', [
      'title' => 'rkpd',
      'kode_rekening' => $this->KodeRekeningModel->findAll(),
      'program' => $this->ProgramModel->findAll(),
      'satuan' => $this->SatuanModel->findAll(),
      'validation' => \Config\Services::validation(),
      'id_rkpd' => $id_rkpd,
      'id_kode_rekening' => $id_kode_rekening,
      'id_pd' => $id_pd,
      'program' => $program,
      'indikator' => $indikator,
      'target' => $target,
      'id_satuan' => $id_satuan,
      'pagu' => $pagu,
      'id_kab' => $id_kab,
      'sumber_dana' => $sumber_dana,
      'prioritas_nasional' => $prioritas_nasional,
      'prioritas_daerah' => $prioritas_daerah,
      'kelompok_sasaran' => $kelompok_sasaran,
      'tahun_rkpd' => $tahun_rkpd
  ]);
}

public function delete($id_rkpd)
  {
    $this->RkpdModel->deleteData($id_rkpd);
    session()->setFlashdata('success', 'Data berhasil dihapus!');
    return redirect()->to('/rkpd')->withInput();
  }
}
