<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\KategoriWisataModel;
// use App\Models\WisataModel;

class Galeri extends BaseController
{
	
	public function index(){
		$galeri = $this->galeriModel->getGaleri();
		$data = [
			'title' => 'Daftar Galeri',
			'subTitle' => 'Galeri',
			// 'galeri' => $galeri->paginate(5, 'galeri'),
			// 'pager' => $this->galeriModel->pager,
			// 'currentPage' => $currentPage
			'galeri' => $galeri
		  ];
// dd($galeri);
		return view('admin/galeri/data-galeri',$data);
		}

		public function detail($slug){

			$data = 
			['title' => 'Tambah Data',
			'galeri' => $this->galeriModel->getGaleri($slug)
		];
		if (empty($data['galeri'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Galeri '. $slug . ' tidak ditemukan');
		  }
		//   dd($data);
		  return view('admin/galeri/detail-galeri', $data);
		}

		
		public function create()
    	{
			$data = 
			[
            'title' => 'Tambah Data Kegiatan',
			// 'kategori_wisata' => $this->kategoriWisataModel->orderby('nama_kategori_wisata')->findAll(),
			'validation' => \Config\Services::validation()
		];
		
		// dd($data);
        // return view('admin/index',$data);
        return view('admin/galeri/create-galeri',$data);
    	}

		public function save(){
			// Validasi Data
			if (!$this->validate([
				'nama_gambar' => [
				'rules' => 'required[galeri.nama_gambar]',
				'label' => 'Nama kegiatan',
				'errors' => [
					'required' => '{field} harus diisi'
					]
				],
					'gambar_galeri' => [
					'rules' =>	'max_size[gambar_galeri,2024]|is_image[gambar_galeri]|mime_in[gambar_galeri,image/jpg,image/jpeg,image/png]',
					'errors' => [
						'max_size' => 'Ukuran gambar terlalu besar. Max 2 mb',
						'is_image' => 'Yang anda pilih bukan gambar',
						'mime_in' => 'Yang anda pilih bukan gambar',
						]
					]	
			])) {
				//Berisi fungsi redirect jika validasi tidak memenuhi
				// dd(\Config\Services::validation()->getErrors());
				return redirect()->to('/admin/galeri/create')->withInput();
			}

		// ambil gambar

		$fileGambarGaleri = $this->request->getFile('gambar_galeri');
		// dd($fileGambarGaleri);

		// apakah tidak ada gambar yang diupload
		if ($fileGambarGaleri->getError() == 4) {
			$namaFileGambarGaleri = 'default.jpg';
		} else {
			// generate nama gambar random
		$namaFileGambarGaleri = $fileGambarGaleri->getRandomName();

		// pindahkan ke folder img
		$fileGambarGaleri->move('img/galeri/', $namaFileGambarGaleri);
		
		}
			$user_id = user();
			$slug = url_title($this->request->getVar('nama_gambar'), '-', true);
			if($this->galeriModel->save([
				// 'id_user'     => $this->request->$user_id,
				// 'id_user'     => $this->request->user_id,
				'nama_gambar' => $this->request->getVar('nama_gambar'),
      			'gambar_galeri' => $namaFileGambarGaleri,
				'slug' => $slug,
      			
			])) {
			// dd($_SESSION);
			
			session()->setFlashdata('success', 'Data berhasil ditambahkan!');
			} else {
				session()->setFlashdata('error', 'Data gagal ditambahkan!');
			}
			return redirect()->to('admin/galeri/');

		}

		public function edit($slug){
			$data = [
				'title' => 'Edit Data Galeri',
				'subTitle' => 'Galeri',
				'result' => $this->galeriModel->getGaleri($slug),
				'validation' => \Config\Services::validation()
			  ];
		  
			  return view('admin/galeri/edit-galeri', $data);
		}
		
		public function update($id_galeri){

			// Cek Judul Galeri yang lama
			$dataGaleriLama = $this->galeriModel->getGaleri($this->request->getVar('slug'));
			if($dataGaleriLama['nama_gambar'] == $this->request->getVar('nama_gambar')) {
				$rule_title = 'required';
			} else {
				$rule_title = 'required|is_unique[galeri.nama_gambar]';
			}
			// Validasi Data
			if (! $this->validate([
				'nama_gambar' => [
				'rules' => $rule_title,
				'label' => 'Judul galeri',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
					]
				],
					'gambar_galeri' => [
						'rules' =>	'max_size[gambar_galeri,1024]|is_image[gambar_galeri]',
						'errors' => [
						'max_size' => 'Ukuran gambar terlalu besar. Max 2 mb',
						'is_image' => 'Yang anda pilih bukan gambar',
						'mime_in' => 'Yang anda pilih bukan gambar',
								]
							]
			])) {
				//Berisi fungsi redirect jika validasi tidak memenuhi
				dd(\Config\Services::validation()->getErrors());
				return redirect()->to('/admin/galeri/edit-galeri/' . $this->request->getVar('slug'))->withInput();
			}

			$fileGambarGaleri = $this->request->getFile('gambar_galeri');

			// cek gambar apakah tetap gambar lama
			if ($fileGambarGaleri->getError() == 4) {
				$namaFileGambarGaleri = $this->request->getVar('gambarGaleriLama');
			} else {
				// generate nama gambar random
			$namaFileGambarGaleri = $fileGambarGaleri->getRandomName();
			// upload gambar
			$fileGambarGaleri->move('img/galeri/',$namaFileGambarGaleri);
			// hapus file yang lama
			unlink('img/galeri/' . $this->request->getVar('gambarGaleriLama'));
			}

			$slug = url_title($this->request->getVar('nama_gambar'), '-', true);
			if($this->galeriModel->save([
				'id_galeri' => $id_galeri,
				// 'id_user'     => $this->request->$user_id,
				// 'id_user'     => $this->request->user_id,
				'nama_gambar' => $this->request->getVar('nama_gambar'),
      			'gambar_galeri' => $namaFileGambarGaleri,
				'slug' => $slug
      			
			])) {
			// dd($_SESSION);
			session()->setFlashdata('success', 'Data berhasil diperbarui!');
			} else {
				session()->setFlashdata('error', 'Data gagal diperbarui!');
			}
			return redirect()->to('admin/galeri/')->withInput();
		}

		
		public function delete($id_galeri)
		{
			// cari gambar berdasarkan id
			$galeri = $this->galeriModel->find($id_galeri);

			// cek jika file gambarnya default.jpg
			if($galeri['gambar_galeri'] != 'default.jpg'){
			//hapus gambar
			unlink('img/galeri/' . $galeri['gambar_galeri']);
			}
			
		$this->galeriModel->delete($id_galeri);
		session()->setFlashdata('success', 'Data berhasil dihapus!');
		return redirect()->to('admin/galeri');
		}

        function uploadGambar()
    {
        if ($this->request->getFile('file')) {
            $dataFile = $this->request->getFile('file');
            $fileName = $dataFile->getRandomName();
            $dataFile->move("img/uploads/galeri/", $fileName);
            echo base_url("img/uploads/galeri/$fileName");
        }
    }

	function deleteGambar()
    {
        $src = $this->request->getVar('src');
        //--> uploads/berkas/1630368882_e4a62568c1b50887a8a5.png

        //http://localhost:8080/img/uploads/galeri/1658724420_2c8083e4a7b81f44c62a.jpg
        if ($src) {
            $file_name = str_replace(base_url() . "/", "", $src);
            if (unlink($file_name)) {
                echo "Delete file berhasil";
            }
        }
    }

	function listGambar()
    {
        $files = array_filter(glob('uploads/galeri/*'), 'is_file');
        $response = [];
        foreach ($files as $file) {
            if (strpos($file, "index.html")) {
                continue;
            }
            $response[] = basename($file);
        }
        header("Content-Type:application/json");
        echo json_encode($response);
        die();
    }

}	