<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;

class KategoriEvent extends BaseController
{
	protected $db, $builder;

    public function __construct()
    {
        $this->db      = \Config\Database::connect();
        $this->builder = $this->db->table('event');
    }
	
	public function index(){
		$kategoriEvent = $this->kategoriEventModel->getKategoriEvent();
		$data = [
			'title' => 'Daftar Kategori Event',
			'subTitle' => 'Kategori Event',
			// 'event' => $event->paginate(5, 'event'),
			// 'pager' => $this->eventModel->pager,
			// 'currentPage' => $currentPage
			'kategoriEvent' => $kategoriEvent
		  ];
// dd($kategoriEvent);
		return view('admin/kategori-event/data-kategori-event',$data);
		}

		public function detail($slug){
			$data = 
			['title' => 'Tambah Data',
			'kategori_event' => $this->kategoriEventModel->getKategoriEvent($slug)
		];
		if (empty($data['kategori_event'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Event '. $slug . ' tidak ditemukan');
		  }
		//   dd($data);
		  return view('admin/kategori-event/detail-event', $data);
		}

		public function listEvent($slug)
		{
			$data = 
			['title' => 'List Event',
			'kategori_event' => $this->kategoriEventModel->getKategoriEvent($slug)
		];
		}

		public function create()
    	{
			$data = 
			['title' => 'Kategori Event',
			'kategori_event' => $this->kategoriEventModel->orderby('nama_kategori_event')->findAll(),
			'validation' => \Config\Services::validation()
		];
		
		// dd($data);
        // return view('admin/index',$data);
        return view('admin/kategori-event/create-kategori-event',$data);
    	}

		public function save(){

			// Validasi Data
			if (! $this->validate([
				'nama_kategori_event' => [
				'rules' => 'required|is_unique[kategori_event.nama_kategori_event]',
				'label' => 'Nama kategori event',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
					]
				],
				'deskripsi_kategori_event' => [
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
				return redirect()->to('/admin/kategorievent/create')->withInput();
			}

			// ambil gambar
			$user_id = user();
			$slug = url_title($this->request->getVar('nama_kategori_event'), '-', true);
			if($this->kategoriEventModel->save([
				// 'id_user'     => $this->request->$user_id,
				// 'id_user'     => $this->request->user_id,
				'nama_kategori_event' => $this->request->getVar('nama_kategori_event'),
				'deskripsi_kategori_event' => $this->request->getVar('deskripsi_kategori_event'),
				'slug_kategori_event' => $slug
			])) {
			// dd($_SESSION);
			session()->setFlashdata('success', 'Data berhasil ditambahkan!');
			} else {
				session()->setFlashdata('error', 'Data gagal ditambahkan!');
			}
			return redirect()->to('/kategorievent');

		}

		public function edit($slug){
			$data = [
				'title' => 'Edit Data Event',
				'subTitle' => 'Event',
				'result' => $this->kategoriEventModel->getKategoriEvent($slug),
				'kategori_event' => $this->kategoriEventModel->orderby('nama_kategori_event')->findAll(),
				'validation' => \Config\Services::validation()
			  ];
		  
			  return view('admin/kategori-event/edit-kategori-event', $data);
		}
		
		public function update($id_kategori_event){

			// Cek Nama Event yang lama
			$dataKategoriEventLama = $this->kategoriEventModel->getKategoriEvent($this->request->getVar('slug_kategori_event'));
			if($dataKategoriEventLama['nama_kategori_event'] == $this->request->getVar('nama_kategori_event')) {
				$rule_title = 'required';
			} else {
				$rule_title = 'required|is_unique[kategori_event.nama_kategori_event]';
			}
			// Validasi Data
			if (! $this->validate([
				'nama_kategori_event' => [
				'rules' => $rule_title,
				'label' => 'Nama kategori event',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
					]
				],
				'deskripsi_kategori_event' => [
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
				return redirect()->to('/admin/kategorievent/edit-kategori-event/' . $this->request->getVar('slug_kategori_event'))->withInput();
			}

			$slug = url_title($this->request->getVar('nama_kategori_event'), '-', true);
			if($this->kategoriEventModel->save([
				'id_kategori_event' => $id_kategori_event,
				// 'id_user'     => $this->request->$user_id,
				// 'id_user'     => $this->request->user_id,
				'nama_kategori_event' => $this->request->getVar('nama_kategori_event'),
				'slug_kategori_event' => $slug,
      			'deskripsi_kategori_event' => $this->request->getVar('deskripsi_kategori_event'),
      			// 'id_kategori_event' => $this->request->getVar('id_kategori_event'),
			])) {
			// dd($_SESSION);
			session()->setFlashdata('success', 'Data berhasil diperbarui!');
			} else {
				session()->setFlashdata('error', 'Data gagal diperbarui!');
			}
			return redirect()->to('/kategorievent')->withInput();
		}
		
		public function delete($id_kategori_event)
		{	
		$this->kategoriEventModel->delete($id_kategori_event);
		session()->setFlashdata('success', 'Data berhasil dihapus!');
		return redirect()->to('/kategorievent')->withInput();
		}

		
}	