<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\KategoriWisataModel;
// use App\Models\WisataModel;

class Artikel extends BaseController
{
	
	public function index(){
		$artikel = $this->artikelModel->getArtikel();
		$data = [
			'title' => 'Daftar Artikel',
			'subTitle' => 'Artikel',
			// 'event' => $event->paginate(5, 'event'),
			// 'pager' => $this->eventModel->pager,
			// 'currentPage' => $currentPage
			'artikel' => $artikel
		  ];
// dd($artikel);
		return view('admin/artikel/data-artikel',$data);
		}

		public function detail($slug){

			$data = 
			['title' => 'Tambah Data',
			'artikel' => $this->artikelModel->getArtikel($slug)
		];
		if (empty($data['artikel'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Artikel '. $slug . ' tidak ditemukan');
		  }
		//   dd($data);
		  return view('admin/artikel/detail-artikel', $data);
		}

		
		public function create()
    	{
			$data = 
			[
            'title' => 'Kategori Artikel',
			// 'kategori_wisata' => $this->kategoriWisataModel->orderby('nama_kategori_wisata')->findAll(),
			'validation' => \Config\Services::validation()
		];
		
		// dd($data);
        // return view('admin/index',$data);
        return view('admin/artikel/create-artikel',$data);
    	}

		public function save(){

			// Validasi Data
			if (! $this->validate([
				'judul_artikel' => [
				'rules' => 'required|is_unique[artikel.judul_artikel]',
				'label' => 'Judul artikel',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
					]
				],
				'isi_artikel' => [
						'rules' => 'required',
						'label' => 'Deskripsi',
						'errors' => [
							'required' => '{field} harus diisi',
							'is_unique' => '{field} sudah digunakan'
							]
						],
					'gambar_artikel' => [
					'rules' =>	'max_size[gambar_artikel,1024]|is_image[gambar_artikel]',
					'errors' => [
						'max_size' => 'Ukuran gambar terlalu besar. Max 2 mb',
						'is_image' => 'Yang anda pilih bukan gambar',
						'mime_in' => 'Yang anda pilih bukan gambar',
						]
					]	
			])) {
				//Berisi fungsi redirect jika validasi tidak memenuhi
				// dd(\Config\Services::validation()->getErrors());
				return redirect()->to('/admin/artikel/create')->withInput();
			}

		// ambil gambar

		$fileGambarArtikel = $this->request->getFile('gambar_artikel');
		// dd($fileGambarArtikel);

		// apakah tidak ada gambar yang diupload
		if ($fileGambarArtikel->getError() == 4) {
			$namaFileGambarArtikel = 'default.jpg';
		} else {
			// generate nama gambar random
		$namaFileGambarArtikel = $fileGambarArtikel->getRandomName();

		// pindahkan ke folder img
		$fileGambarArtikel->move('img/artikel/', $namaFileGambarArtikel);
		
		}
			$user_id = user();
			$slug = url_title($this->request->getVar('judul_artikel'), '-', true);
			if($this->artikelModel->save([
				// 'id_user'     => $this->request->$user_id,
				// 'id_user'     => $this->request->user_id,
				'judul_artikel' => $this->request->getVar('judul_artikel'),
				'slug' => $slug,
      			'isi_artikel' => $this->request->getVar('isi_artikel'),
      			'tgl_artikel' => $this->request->getVar('tgl_artikel'),
      			'gambar_artikel' => $namaFileGambarArtikel
      			
			])) {
			// dd($_SESSION);
			session()->setFlashdata('success', 'Data berhasil ditambahkan!');
			} else {
				session()->setFlashdata('error', 'Data gagal ditambahkan!');
			}
			return redirect()->to('admin/artikel/');

		}

		public function edit($slug){
			$data = [
				'title' => 'Edit Data Artikel',
				'subTitle' => 'Artikel',
				'result' => $this->artikelModel->getArtikel($slug),
				// 'kategori_wisata' => $this->kategoriWisataModel->orderby('nama_kategori_wisata')->findAll(),
				'validation' => \Config\Services::validation()
			  ];
		  
			  return view('admin/artikel/edit-artikel', $data);
		}
		
		public function update($id_artikel){

			// Cek Judul Artikel yang lama
			$dataArtikelLama = $this->artikelModel->getArtikel($this->request->getVar('slug'));
			if($dataArtikelLama['judul_artikel'] == $this->request->getVar('judul_artikel')) {
				$rule_title = 'required';
			} else {
				$rule_title = 'required|is_unique[artikel.judul_artikel]';
			}
			// Validasi Data
			if (! $this->validate([
				'judul_artikel' => [
				'rules' => $rule_title,
				'label' => 'Judul artikel',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
					]
				],
				'isi_artikel' => [
					'rules' => 'required',
					'label' => 'Deskripsi',
					'errors' => [
						'required' => '{field} harus diisi',
						'is_unique' => '{field} sudah digunakan'
						]
					],
					// 'tgl_artikel' => [
					// 	'rules' => 'required',
					// 	'label' => 'Kategori artikel',
					// 	'errors' => [
					// 		'required' => '{field} harus diisi'
					// 		]
					// 		// '|is_natural_no_zero'
					// 	],
					'gambar_artikel' => [
						'rules' =>	'max_size[gambar_artikel,1024]|is_image[gambar_artikel]',
						'errors' => [
						'max_size' => 'Ukuran gambar terlalu besar. Max 2 mb',
						'is_image' => 'Yang anda pilih bukan gambar',
						'mime_in' => 'Yang anda pilih bukan gambar',
								]
							]
			])) {
				//Berisi fungsi redirect jika validasi tidak memenuhi
				// dd(\Config\Services::validation()->getErrors());
				return redirect()->to('/admin/artikel/edit-artikel/' . $this->request->getVar('slug'))->withInput();
			}

			$fileGambarArtikel = $this->request->getFile('gambar_artikel');

			// cek gambar apakah tetap gambar lama
			if ($fileGambarArtikel->getError() == 4) {
				$namaFileGambarArtikel = $this->request->getVar('gambarArtikelLama');
			} else {
				// generate nama gambar random
			$namaFileGambarArtikel = $fileGambarArtikel->getRandomName();
			// upload gambar
			$fileGambarArtikel->move('img/artikel/',$namaFileGambarArtikel);
			// hapus file yang lama
			unlink('img/artikel/' . $this->request->getVar('gambarArtikelLama'));
			}

			$slug = url_title($this->request->getVar('judul_artikel'), '-', true);
			if($this->artikelModel->save([
				'id_artikel' => $id_artikel,
				// 'id_user'     => $this->request->$user_id,
				// 'id_user'     => $this->request->user_id,
				'judul_artikel' => $this->request->getVar('judul_artikel'),
				'slug' => $slug,
      			'isi_artikel' => $this->request->getVar('isi_artikel'),
      			'tgl_artikel' => $this->request->getVar('tgl_artikel'),
      			'gambar_artikel' => $namaFileGambarArtikel
      			
			])) {
			// dd($_SESSION);
			session()->setFlashdata('success', 'Data berhasil diperbarui!');
			} else {
				session()->setFlashdata('error', 'Data gagal diperbarui!');
			}
			return redirect()->to('admin/artikel/')->withInput();
		}

		
		public function delete($id_artikel)
		{
			// cari gambar berdasarkan id
			$artikel = $this->artikelModel->find($id_artikel);

			// cek jika file gambarnya default.jpg
			if($artikel['gambar_artikel'] != 'default.jpg'){
			//hapus gambar
			unlink('img/artikel/' . $artikel['gambar_artikel']);
			}
			
		$this->artikelModel->delete($id_artikel);
		session()->setFlashdata('success', 'Data berhasil dihapus!');
		return redirect()->to('admin/artikel');
		}

        function uploadGambar()
    {
        if ($this->request->getFile('file')) {
            $dataFile = $this->request->getFile('file');
            $fileName = $dataFile->getRandomName();
            $dataFile->move("img/uploads/artikel/", $fileName);
            echo base_url("img/uploads/artikel/$fileName");
        }
    }

	function deleteGambar()
    {
        $src = $this->request->getVar('src');
        //--> uploads/berkas/1630368882_e4a62568c1b50887a8a5.png

        //http://localhost:8080/img/uploads/artikel/1658724420_2c8083e4a7b81f44c62a.jpg
        if ($src) {
            $file_name = str_replace(base_url() . "/", "", $src);
            if (unlink($file_name)) {
                echo "Delete file berhasil";
            }
        }
    }

	function listGambar()
    {
        $files = array_filter(glob('uploads/artikel/*'), 'is_file');
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