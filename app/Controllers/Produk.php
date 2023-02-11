<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\KategoriProdukModel;
// use App\Models\ProdukModel;

class Produk extends BaseController
{
	public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('produk');
    }
	
	public function index(){
		$produk = $this->produkModel
		->join('kategori_produk', 'produk.id_kategori_produk = kategori_produk.id_kategori_produk')
		->where('id_user', user_id())->findAll();
		$data = [
			'title' => 'Daftar Produk',
			'subTitle' => 'Produk',

			'produk' => $produk
		  ];
		//   dd($_SESSION);
// dd($produk);
		return view('user/produk/data-produk',$data);
		}

		public function cari()
		{
		$currentPage = $this->request->getVar('page') ? $this->request->getVar('page') : 1;
		$cari = $this->request->getVar('cari'); 
		if ($cari) {
		$produk = $this->produkModel->get_cari_produk($cari);
		} else {
		$produk = $this->produkModel;
		}
		
		$data = [
		'title' => 'Katalog Produk',
		'subTitle' => 'Katalog Produk',
		// 'kategori_wisata' => $kategori_wisata,
		'produk' => $produk->join('users', 'produk.id_user = users.id')->paginate(20, 'produk'),
		'pager' => $this->produkModel->pager,
		'currentPage' =>$currentPage
		];
		
      return view('views/marketplace/hasil_pencarian', $data);
		}

		public function detail($slug){
			$data = 
			['title' => 'Tambah Data',
			'produk' => $this->produkModel->join('kategori_produk', 'produk.id_kategori_produk = kategori_produk.id_kategori_produk')->getProduk($slug)
		];
		if (empty($data['produk'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Produk '. $slug . ' tidak ditemukan');
		  }
		//   dd($data);
		  return view('user/produk/detail-produk', $data);
		}

		
		public function create()
    	{ 
			$data = 
			['title' => 'Kategori Produk',
			'kategori_produk' => $this->kategoriProdukModel->orderby('nama_kategori_produk')->findAll(),
			'validation' => \Config\Services::validation()
		];
		
		// dd($data);
        // return view('user/index',$data);
        return view('user/produk/create-produk',$data);
    	}

		public function save(){
			$auth = service('authentication'); 
			
			// Validasi Data
			if (! $this->validate([
				'nama_produk' => [
				'rules' => 'required|is_unique[produk.nama_produk]',
				'label' => 'Nama produk',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
					]
				],
				'deskripsi_produk' => [
					'rules' => 'required',
					'label' => 'Deskripsi',
					'errors' => [
						'required' => '{field} harus diisi',
						'is_unique' => '{field} sudah digunakan'
						]
					],
				'harga' => [
					'rules' => 'required',
					'label' => 'Harga',
					'errors' => [
						'required' => '{field} harus diisi',
						'numeric' => '{field} harus berupa angka',
						]
						// '|is_natural_no_zero'
					],
				'berat' => [
					'rules' => 'required',
					'label' => 'Berat',
					'errors' => [
						'required' => '{field} harus diisi',
						'numeric' => '{field} harus berupa angka',
						]
						// '|is_natural_no_zero'
					],
				'stok' => [
					'rules' => 'required',
					'label' => 'Stok',
					'errors' => [
						'required' => '{field} harus diisi'
						]
						// '|is_natural_no_zero'
					],
					'id_kategori_produk' => [
						'rules' => 'required',
						'label' => 'Kategori produk',
						'errors' => [
							'required' => '{field} harus diisi'
							]
							// '|is_natural_no_zero'
					],
					'gambar_produk' => [
					'rules' =>	'max_size[gambar_produk,1024]|is_image[gambar_produk]',
					'errors' => [
						'max_size' => 'Ukuran gambar terlalu besar. Max 1 mb',
						'is_image' => 'Yang anda pilih bukan gambar',
						'mime_in' => 'Yang anda pilih bukan gambar',
						]
					]	
			])) {
				//Berisi fungsi redirect jika validasi tidak memenuhi
				// dd(\Config\Services::validation()->getErrors());
				return redirect()->to('/user/produk/create')->withInput();
			}

		// ambil gambar

		$fileGambarProduk = $this->request->getFile('gambar_produk');
		// dd($fileGambarProduk);

		// apakah tidak ada gambar yang diupload
		if ($fileGambarProduk->getError() == 4) {
			$namaFileGambarProduk = 'default.jpg';
		} else {
			// generate nama gambar random
		$namaFileGambarProduk = $fileGambarProduk->getRandomName();

		// pindahkan ke folder img
		$fileGambarProduk->move('img/produk/', $namaFileGambarProduk);
		
		}
			$user_id = user();
			$produk = $this->produkModel->getProduk($auth->id());
			$id_user = $this->produkModel->where('id_user', $auth->id());
			$slug = url_title($this->request->getVar('nama_produk'), '-', true);
			if($this->produkModel->save([
				'id_user'     => user_id(),
				// 'id_user'     => $this->request->user_id,
				'nama_produk' => $this->request->getVar('nama_produk'),
				'slug' => $slug,
      			'deskripsi_produk' => $this->request->getVar('deskripsi_produk'),
      			'harga' => $this->request->getVar('harga'),
      			'berat' => $this->request->getVar('berat'),
      			'stok' => $this->request->getVar('stok'),
      			'id_kategori_produk' => $this->request->getVar('id_kategori_produk'),
      			'gambar_produk' => $namaFileGambarProduk
			])) {
			// dd($_SESSION);
			// dd($this->request->getVar());
			session()->setFlashdata('success', 'Data berhasil ditambahkan!');
			} else {
				session()->setFlashdata('error', 'Data gagal ditambahkan!');
			}
			return redirect()->to('/produk');

		}

		public function edit($slug){
			$data = [
				'title' => 'Edit Data Produk',
				'subTitle' => 'Produk',
				'result' => $this->produkModel->getProduk($slug),
				'produk' => $this->produkModel->findAll(),
				'kategori_produk' => $this->kategoriProdukModel->orderby('nama_kategori_produk')->findAll(),
				'validation' => \Config\Services::validation()
			  ];
		  
			  return view('user/produk/edit-produk', $data);
		}
		
		
		public function update($id_produk){

			// Cek Nama Produk yang lama
			$dataProdukLama = $this->produkModel->getProduk($this->request->getVar('slug'));
			if($dataProdukLama['nama_produk'] == $this->request->getVar('nama_produk')) {
				$rule_title = 'required';
			} else {
				$rule_title = 'required|is_unique[produk.nama_produk]';
			}
			// Validasi Data
			if (! $this->validate([
				'nama_produk' => [
				'rules' => $rule_title,
				'label' => 'Nama produk',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
					]
				],
				'deskripsi_produk' => [
					'rules' => 'required',
					'label' => 'Deskripsi',
					'errors' => [
						'required' => '{field} harus diisi',
						'is_unique' => '{field} sudah digunakan'
						]
					],
				'harga' => [
					'rules' => 'required',
					'label' => 'Harga',
					'errors' => [
						'required' => '{field} harus diisi',
						'numeric' => '{field} harus berupa angka',
						]
						// '|is_natural_no_zero'
					],
				'berat' => [
					'rules' => 'required',
					'label' => 'Berat',
					'errors' => [
						'required' => '{field} harus diisi',
						'numeric' => '{field} harus berupa angka',
						]
						// '|is_natural_no_zero'
					],
				'stok' => [
					'rules' => 'required',
					'label' => 'Stok',
					'errors' => [
						'required' => '{field} harus diisi'
						]
						// '|is_natural_no_zero'
					],
					'id_kategori_produk' => [
						'rules' => 'required',
						'label' => 'Kategori produk',
						'errors' => [
							'required' => '{field} harus diisi'
							]
							// '|is_natural_no_zero'
						],
					'gambar_produk' => [
						'rules' =>	'max_size[gambar_produk,1024]|is_image[gambar_produk]',
						'errors' => [
						'max_size' => 'Ukuran gambar terlalu besar. Max 1 mb',
						'is_image' => 'Yang anda pilih bukan gambar',
						'mime_in' => 'Yang anda pilih bukan gambar',
								]
							]
			])) {
				//Berisi fungsi redirect jika validasi tidak memenuhi
				dd(\Config\Services::validation()->getErrors());
				return redirect()->to('/user/produk/edit-produk/' . $this->request->getVar('slug'))->withInput();
			}

			$fileGambarProduk = $this->request->getFile('gambar_produk');

			// cek gambar apakah tetap gambar lama
			if ($fileGambarProduk->getError() == 4) {
				$namaFileGambarProduk = $this->request->getVar('gambarProdukLama');
			} else {
				// generate nama gambar random
			$namaFileGambarProduk = $fileGambarProduk->getRandomName();
			// upload gambar
			$fileGambarProduk->move('img/produk/',$namaFileGambarProduk);
			// hapus file yang lama
			// unlink('img/produk/' . $this->request->getVar('gambarProdukLama'));
			}

			$slug = url_title($this->request->getVar('nama_produk'), '-', true);
			if($this->produkModel->save([
				'id_produk' => $id_produk,
				'id_user'     => user_id(),
				// 'id_user'     => $this->request->$user_id,
				// 'id_user'     => $this->request->user_id,
				'nama_produk' => $this->request->getVar('nama_produk'),
				'slug' => $slug,
      			'deskripsi_produk' => $this->request->getVar('deskripsi_produk'),
      			'harga' => $this->request->getVar('harga'),
      			'berat' => $this->request->getVar('berat'),
      			'stok' => $this->request->getVar('stok'),
      			'id_kategori_produk' => $this->request->getVar('id_kategori_produk'),
      			'gambar_produk' => $namaFileGambarProduk
      			
			])) {
			// dd($_SESSION);
			// dd($this->request->getVar());
			session()->setFlashdata('success', 'Data berhasil diperbarui!');
			} else {
				session()->setFlashdata('error', 'Data gagal diperbarui!');
			}
			return redirect()->to('/produk')->withInput();
		}

		
		public function delete($id_produk)
		{
			// cari gambar berdasarkan id
			$produk = $this->produkModel->find($id_produk);

			// cek jika file gambarnya default.jpg
			if($produk['gambar_produk'] != 'default.jpg'){
			//hapus gambar
			unlink('img/produk/' . $produk['gambar_produk']);
			}
			
		$this->produkModel->delete($id_produk);
		session()->setFlashdata('success', 'Data berhasil dihapus!');
		return redirect()->to('/produk')->withInput();
		}

		

	// 	function uploadGambar()
    // {
    //     if ($this->request->getFile('file')) {
    //         $dataFile = $this->request->getFile('file');
    //         $fileName = $dataFile->getRandomName();
    //         $dataFile->move("img/uploads/produk/", $fileName);
    //         echo base_url("img/uploads/produk/$fileName");
    //     }
    // }

}	