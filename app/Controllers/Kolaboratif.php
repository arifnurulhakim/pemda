<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Controllers\BaseController;
class Kolaboratif extends BaseController
{

    public function index()
    {
        $kolaboratif = $this->KolaboratifModel->getKolaboratifJoin();
        $tahun_program ='';
        $jenis_program ='';
        if ($this->request->getMethod() == 'post') {
            $tahun_program = $this->request->getPost('tahun_program');
            $jenis_program = $this->request->getPost('jenis_program');
    
            if (!empty($tahun_program) && !empty($jenis_program)){
                        $kolaboratif = $this->KolaboratifModel->getKolaboratifFilter($tahun_program,$jenis_program);
                    }
        }
    
        $data = [
            'title' => 'Daftar Kolaboratif',
            'subTitle' => 'kolaboratif',
            'jenis_program' => $this->JenisProgramModel->findAll(),
            'kolaboratif' => $kolaboratif,
            'menu' => "kolaboratif",
        ];
    
        return view('/admin/allKolaboratif/data-kolaboratif', $data);
    }
    
    public function filter()
    {
        $tahun_program = $this->request->getPost('tahun_program');
        $jenis_program = $this->request->getPost('jenis_program');

        if (!empty($tahun_program) && !empty($jenis_program)) {
            $kolaboratif = $this->KolaboratifModel
                ->where('tahun_program', $tahun_program)
                ->where('jenis_program', $jenis_program)
                ->findAll();
                $data = [
                    'title' => 'Daftar Kolaboratif',
                    'subTitle' => 'kolaboratif',
                    'jenis_program' => $this->JenisProgramModel->findAll(),
                    'kolaboratif' => $kolaboratif,
                    'menu' => "kolaboratif",
                ];
            $response = [
                'status' => true,
                'data' => view('/admin/allKolaboratif/data-kolaboratif', ['kolaboratif' => $kolaboratif])
            ];
        } else {
            $response = [
                'status' => false,
                'message' => 'Tahun program dan jenis program harus diisi'
            ];
        }

        return $this->response->setJSON($response);
    }
    


//     public function filter()
// {
//     $tahun_program = $this->request->getVar('tahun_program');
//     $jenis_program = $this->request->getVar('jenis_program');

//     $kolaboratif = $this->KolaboratifModel->getKolaboratifFilter($tahun_program, $jenis_program);

//     $data = [
//         'title' => 'Daftar Kolaboratif',
//         'subTitle' => 'kolaboratif',
//         'jenis_program' => $this->JenisProgramModel->findAll(),
//         'kolaboratif' => $kolaboratif,
//         'menu' => "kolaboratif",
  
//       ];

//       return view('/admin/allKolaboratif/data-kolaboratif', $data);
// }
// public function filter()
// {
//     // Ambil data dari form filter
//     $tahun_program = $this->request->getPost('tahun_program');
//     $jenis_program = $this->request->getPost('jenis_program');

//     // Cek apakah tahun_program dan jenis_program telah diisi
//     if (!empty($tahun_program) && !empty($jenis_program)) {
//         // Filter data sesuai dengan tahun_program dan jenis_program
//         $kolaboratif = $this->KolaboratifModel
//             ->where('tahun_program', $tahun_program)
//             ->where('jenis_program', $jenis_program)
//             ->findAll();
//     }

//     // Kirim data kolaboratif ke view
//     $data = [
//         'kolaboratif' => $kolaboratif
//     ];
//     return view('/admin/allKolaboratif/data-kolaboratif', $data);
// }

    // public function index()
    // {
    //     $tahun_program = $this->request->getVar('tahun_program');
    //     $jenis_program = $this->request->getVar('jenis_program');
    //     $kolaboratif="";
    //     if (!empty($tahun_program) && !empty($jenis_program)){
    //         $kolaboratif = $this->KolaboratifModel->getKolaboratifFilter($tahun_program,$jenis_program);
    //     }else{
    //         $kolaboratif = $this->KolaboratifModel->getKolaboratifJoin();
    //     }
    //     $data = [
    //         'title' => 'Daftar Kolaboratif',
    //         'subTitle' => 'kolaboratif',
    //         'jenis_program' => $this->JenisProgramModel->findAll(),
    //         // 'event' => $event->paginate(5, 'event'),
    //         // 'pager' => $this->eventModel->pager,
    //         // 'currentPage' => $currentPage
    //         'kolaboratif' => $kolaboratif,
    //         'menu' => "kolaboratif",
      
    //       ];
    //       return redirect()->to('/admin/allKolaboratif/data-kolaboratif', $data);

    // }
    public function create()
    {
      $data =
        [
          'title' => 'kolaboratif',
          'rekening' => $this->KodeRekeningModel->orderby('kode_rekening')->findAll(),
          'pd' => $this->PerangkatDaerahModel->orderby('nama_pd')->findAll(),
          'satuan' => $this->SatuanModel->orderby('nama_satuan')->findAll(),
          'kecamatan' => $this->KecamatanModel->orderby('kecamatan')->findAll(),
          'desa' => $this->DesaModel->orderby('desa')->findAll(),
          'jenis_program' => $this->JenisProgramModel->orderby('jenis_program')->findAll(),
          'tahun_program' => $this->JenisProgramModel->orderby('tahun_program')->findAll(),
          'validation' => \Config\Services::validation()
        ];
  
      // dd($data);
      // return view('admin/index',$data);
      return view('/admin/allKolaboratif/create-kolaboratif', $data);
    }

    public function store()
    {
        if ($this->KolaboratifModel->save([
            'id_jenis_program' => $this->request->getVar('id_jenis_program'),
            'nama_program' => $this->request->getVar('nama_program'),
            'indikator' => $this->request->getVar('indikator'),
            'id_pd' => $this->request->getVar('id_pd'),
            'id_kode_rekening' => $this->request->getVar('id_kode_rekening'),
            'id_satuan' => $this->request->getVar('id_satuan'),
            'target' => $this->request->getVar('target'),
            'pagu' => $this->request->getVar('pagu'),
            'id_kecamatan' => $this->request->getVar('id_kecamatan'),
            'id_desa' => $this->request->getVar('id_desa'),
            'alamat' => $this->request->getVar('alamat'),
            'sumber_pendanaan' => $this->request->getVar('sumber_pendanaan'),
            'progres' => $this->request->getVar('progres'),
        ])) {
            session()->setFlashdata('success', 'Data berhasil ditambahkan!');
        } else {
            session()->setFlashdata('error', 'Data gagal ditambahkan!');
        }
        return redirect()->to('admin/kolaboratif/');
    }

    public function edit($id_kolaboratif)
    {
        $allData = $this->KolaboratifModel->find($id_kolaboratif);
    
        $data = [
            'title' => 'kolaboratif',
            'rekening' => $this->KodeRekeningModel->orderBy('kode_rekening')->findAll(),
            'pd' => $this->PerangkatDaerahModel->orderBy('nama_pd')->findAll(),
            'satuan' => $this->SatuanModel->orderBy('nama_satuan')->findAll(),
            'kecamatan' => $this->KecamatanModel->orderBy('kecamatan')->findAll(),
            'desa' => $this->DesaModel->orderBy('desa')->findAll(),
            'jenis_program' => $this->JenisProgramModel->orderBy('jenis_program')->findAll(),
            'id_kolaboratif' => $id_kolaboratif,
            'id_jenis_program' => $allData['id_jenis_program'],
            'nama_program' => $allData['nama_program'],
            'indikator' => $allData['indikator'],
            'id_pd' => $allData['id_pd'],
            'kode_rekening' => $allData['kode_rekening'],
            'id_satuan' => $allData['id_satuan'],
            'target' => $allData['target'],
            'pagu' => $allData['pagu'],
            'id_kecamatan' => $allData['id_kecamatan'],
            'id_desa' => $allData['id_desa'],
            'alamat' => $allData['alamat'],
            'sumber_pendanaan' => $allData['sumber_pendanaan'],
            'progres' => $allData['progres'],
            'validation' => \Config\Services::validation(),
        ];
    
        return view('/admin/allKolaboratif/edit-kolaboratif', $data);
    }
    
    
    public function update($id_kolaboratif)
    {
        if ($this->KolaboratifModel->update( $id_kolaboratif,[
            'id_jenis_program' => $this->request->getVar('id_jenis_program'),
            'nama_program' => $this->request->getVar('nama_program'),
            'indikator' => $this->request->getVar('indikator'),
            'id_pd' => $this->request->getVar('id_pd'),
            'id_kode_rekening' => $this->request->getVar('id_kode_rekening'),
            'id_satuan' => $this->request->getVar('id_satuan'),
            'target' => $this->request->getVar('target'),
            'pagu' => $this->request->getVar('pagu'),
            'id_kecamatan' => $this->request->getVar('id_kecamatan'),
            'id_desa' => $this->request->getVar('id_desa'),
            'alamat' => $this->request->getVar('alamat'),
            'sumber_pendanaan' => $this->request->getVar('sumber_pendanaan'),
            'progres' => $this->request->getVar('progres'),
        ])) {
            session()->setFlashdata('success', 'Data berhasil di update!');
        } else {
            session()->setFlashdata('error', 'Data gagal di update!');
        }
        return redirect()->to('admin/kolaboratif/');
    }


    public function delete($id_kolaboratif)
  {
    $this->KolaboratifModel->deleteData($id_kolaboratif);
    session()->setFlashdata('success', 'Data berhasil dihapus!');
    return redirect()->to('/kolaboratif')->withInput();
  }
}
