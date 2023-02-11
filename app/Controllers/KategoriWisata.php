<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\k;
// use App\Models\WisataModel;

class KategoriWisata extends BaseController
{
	protected $db, $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('wisata');
    }
	
	public function index(){
		$kategoriWisata = $this->kategoriWisataModel->getKategoriWisata();
		$data = [
			'title' => 'Daftar Kategori Wisata',
			'subTitle' => 'Kategori Wisata',
			// 'event' => $event->paginate(5, 'event'),
			// 'pager' => $this->eventModel->pager,
			// 'currentPage' => $currentPage
			'kategoriWisata' => $kategoriWisata
		  ];
// dd($kategoriWisata);
		return view('admin/kategori-wisata/data-kategori-wisata',$data);
		}

		public function detail($slug){
			$data = 
			['title' => 'Tambah Data',
			'kategori_wisata' => $this->kategoriWisataModel->getKategoriWisata($slug)
		];
		if (empty($data['kategori_wisata'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Wisata '. $slug . ' tidak ditemukan');
		  }
		//   dd($data);
		  return view('admin/kategori-wisata/detail-wisata', $data);
		}

		public function listWisata($slug)
		{
			$data = 
			['title' => 'List Wisata',
			'kategori_wisata' => $this->kategoriWisataModel->getKategoriWisata($slug)
		];
		}

		public function create()
    	{
			$data = 
			['title' => 'Kategori Wisata',
			'kategori_wisata' => $this->kategoriWisataModel->orderby('nama_kategori_wisata')->findAll(),
			'validation' => \Config\Services::validation()
		];
		
		// dd($data);
        // return view('admin/index',$data);
        return view('admin/kategori-wisata/create-kategori-wisata',$data);
    	}

		public function save(){

			// Validasi Data
			if (! $this->validate([
				'nama_kategori_wisata' => [
				'rules' => 'required|is_unique[kategori_wisata.nama_kategori_wisata]',
				'label' => 'Nama kategori wisata',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
					]
				],
				'deskripsi_kategori_wisata' => [
						'rules' => 'required',
						'label' => 'Deskripsi',
						'errors' => [
							'required' => '{field} harus diisi',
							'is_unique' => '{field} sudah digunakan'
							]
						]	
			])) {
				//Berisi fungsi redirect jika validasi tidak memenuhi
				// dd(\Config\Services::validation()->getErrors());
				return redirect()->to('/admin/kategoriwisata/create')->withInput();
			}

			// ambil gambar
			$user_id = user();
			$slug = url_title($this->request->getVar('nama_kategori_wisata'), '-', true);
			if($this->kategoriWisataModel->save([
				// 'id_user'     => $this->request->$user_id,
				// 'id_user'     => $this->request->user_id,
				'nama_kategori_wisata' => $this->request->getVar('nama_kategori_wisata'),
				'deskripsi_kategori_wisata' => $this->request->getVar('deskripsi_kategori_wisata'),
				'slug_kategori_wisata' => $slug
			])) {
			// dd($_SESSION);
			session()->setFlashdata('success', 'Data berhasil ditambahkan!');
			} else {
				session()->setFlashdata('error', 'Data gagal ditambahkan!');
			}
			return redirect()->to('/kategoriwisata');

		}

		public function edit($slug){
			$data = [
				'title' => 'Edit Data Wisata',
				'subTitle' => 'Wisata',
				'result' => $this->kategoriWisataModel->getKategoriWisata($slug),
				'kategori_wisata' => $this->kategoriWisataModel->orderby('nama_kategori_wisata')->findAll(),
				'validation' => \Config\Services::validation()
			  ];
		  
			  return view('admin/kategori-wisata/edit-kategori-wisata', $data);
		}
		
		public function update($id_kategori_wisata){

			// Cek Nama Wisata yang lama
			$dataKategoriWisataLama = $this->kategoriWisataModel->getKategoriWisata($this->request->getVar('slug_kategori_wisata'));
			if($dataKategoriWisataLama['nama_kategori_wisata'] == $this->request->getVar('nama_kategori_wisata')) {
				$rule_title = 'required';
			} else {
				$rule_title = 'required|is_unique[kategori_wisata.nama_kategori_wisata]';
			}
			// Validasi Data
			if (! $this->validate([
				'nama_kategori_wisata' => [
				'rules' => $rule_title,
				'label' => 'Nama kategori wisata',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
					]
				],
				'deskripsi_kategori_wisata' => [
					'rules' => $rule_title,
					'label' => 'Deskripsi',
					'errors' => [
						'required' => '{field} harus diisi',
						'is_unique' => '{field} sudah digunakan'
						]
					]
			])) {
				//Berisi fungsi redirect jika validasi tidak memenuhi
				// dd(\Config\Services::validation()->getErrors());
				return redirect()->to('/admin/kategoriwisata/edit-kategori-wisata/' . $this->request->getVar('slug_kategori_wisata'))->withInput();
			}

			$slug = url_title($this->request->getVar('nama_kategori_wisata'), '-', true);
			if($this->kategoriWisataModel->save([
				'id_kategori_wisata' => $id_kategori_wisata,
				// 'id_user'     => $this->request->$user_id,
				// 'id_user'     => $this->request->user_id,
				'nama_kategori_wisata' => $this->request->getVar('nama_kategori_wisata'),
				'slug_kategori_wisata' => $slug,
      			'deskripsi_kategori_wisata' => $this->request->getVar('deskripsi_kategori_wisata'),
      			// 'id_kategori_wisata' => $this->request->getVar('id_kategori_wisata'),
			])) {
			// dd($_SESSION);
			session()->setFlashdata('success', 'Data berhasil diperbarui!');
			} else {
				session()->setFlashdata('error', 'Data gagal diperbarui!');
			}
			return redirect()->to('/kategoriwisata')->withInput();
		}
		public function delete($id_kategori_wisata)
		{
			// cari gambar berdasarkan id
			// $kategoriWisata = $this->kategoriWisataModel->find($id_kategori_wisata);

			// // cek jika file gambarnya default.jpg
			// if($kategoriWisata['gambar_wisata'] != 'default.jpg'){
			// //hapus gambar
			// unlink('img/kategori-wisata/' . $kategoriWisata['gambar_wisata']);
			// }
			
		$this->kategoriWisataModel->delete($id_kategori_wisata);
		session()->setFlashdata('success', 'Data berhasil dihapus!');
		return redirect()->to('/kategoriwisata')->withInput();
		}

		
}	