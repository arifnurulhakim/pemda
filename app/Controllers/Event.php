<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\KategoriWisataModel;
// use App\Models\WisataModel;

class Event extends BaseController
{

	public function index()
	{
		$event = $this->eventModel->getEvent();
		$data = [
			'title' => 'Daftar Event',
			'subTitle' => 'Event',
			// 'event' => $event->paginate(5, 'event'),
			// 'pager' => $this->eventModel->pager,
			// 'currentPage' => $currentPage
			'event' => $event
		];
		// dd($event);
		return view('admin/event/data-event', $data);
	}

	public function detail($slug)
	{
		$data =
			[
				'title' => 'Tambah Data',
				'event' => $this->eventModel->getEvent($slug)
			];
		if (empty($data['event'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Event ' . $slug . ' tidak ditemukan');
		}
		//   dd($data);
		return view('admin/event/detail-event', $data);
	}


	public function create()
	{
		$data =
			[
				'title' => 'Event',
				'kategori_event' => $this->kategoriEventModel->orderby('nama_kategori_event')->findAll(),
				'validation' => \Config\Services::validation()
			];

		// dd($data);
		// return view('admin/index',$data);
		return view('admin/event/create-event', $data);
	}

	public function save()
	{

		// Validasi Data
		if (!$this->validate([
			'nama_event' => [
				'rules' => 'required|is_unique[event.nama_event]',
				'label' => 'Judul event',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
				]
			],
			'lokasi_event' => [
				'rules' => 'required',
				'label' => 'Lokasi event',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
				]
			],
			'id_kategori_event' => [
				'rules' => 'required',
				'label' => 'Kategori event',
				'errors' => [
					'required' => '{field} harus diisi'
				]
			],
			'gambar_event' => [
				'rules' =>	'max_size[gambar_event,1024]|is_image[gambar_event]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar. Max 1 mb',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan gambar',
				]
			]

		])) {
			//Berisi fungsi redirect jika validasi tidak memenuhi
			// dd(\Config\Services::validation()->getErrors());
			return redirect()->to('/admin/event/create')->withInput();
		}

		// ambil gambar

		$fileGambarEvent = $this->request->getFile('gambar_event');
		// dd($fileGambarEvent);

		// apakah tidak ada gambar yang diupload
		if ($fileGambarEvent->getError() == 4) {
			$namaFileGambarEvent = 'default.jpg';
		} else {
			// generate nama gambar random
			$namaFileGambarEvent = $fileGambarEvent->getRandomName();

			// pindahkan ke folder img
			$fileGambarEvent->move('img/event/', $namaFileGambarEvent);
		}
		$user_id = user();
		$slug = url_title($this->request->getVar('nama_event'), '-', true);
		if ($this->eventModel->save([
			// 'id_user'     => $this->request->$user_id,
			// 'id_user'     => $this->request->user_id,
			'nama_event' => $this->request->getVar('nama_event'),
			'nama_penyelenggara' => $this->request->getVar('nama_penyelenggara'),
			'slug' => $slug,
			'id_kategori_event' => $this->request->getVar('id_kategori_event'),
			'lokasi_event' => $this->request->getVar('lokasi_event'),
			'tgl_event_mulai' => $this->request->getVar('tgl_event_mulai'),
			'tgl_event_berakhir' => $this->request->getVar('tgl_event_berakhir'),
			'deskripsi_event' => $this->request->getVar('deskripsi_event'),
			'gambar_event' => $namaFileGambarEvent

		])) {
			// dd($_SESSION);
			session()->setFlashdata('success', 'Data berhasil ditambahkan!');
		} else {
			session()->setFlashdata('error', 'Data gagal ditambahkan!');
		}
		return redirect()->to('/event');
	}



	public function edit($slug)
	{
		$data = [
			'title' => 'Edit Data Event',
			'subTitle' => 'Event',
			'result' => $this->eventModel->getEvent($slug),
			'kategori_event' => $this->kategoriEventModel->orderby('nama_kategori_event')->findAll(),
			'validation' => \Config\Services::validation()
		];

		return view('admin/event/edit-event', $data);
	}

	public function update($id_event)
	{

		// Cek Judul Event yang lama
		$dataEventLama = $this->eventModel->getEvent($this->request->getVar('slug'));
		if ($dataEventLama['nama_event'] == $this->request->getVar('nama_event')) {
			$rule_title = 'required';
		} else {
			$rule_title = 'required|is_unique[event.nama_event]';
		}
		// Validasi Data
		if (!$this->validate([
			'nama_event' => [
				'rules' => $rule_title,
				'label' => 'Judul event',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
				]
			],
			'id_kategori_event' => [
				'rules' => 'required',
				'label' => 'Kategori Event',
				'errors' => [
					'required' => '{field} harus diisi'
				]
				// '|is_natural_no_zero'
			],
			'lokasi_event' => [
				'rules' => 'required',
				'label' => 'Lokasi event',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
				]
			],
			'gambar_event' => [
				'rules' =>	'max_size[gambar_event,1024]|is_image[gambar_event]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar. Max 1 mb',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan gambar',
				]
			]
		])) {
			//Berisi fungsi redirect jika validasi tidak memenuhi
			// dd(\Config\Services::validation()->getErrors());
			// dd($this->request->getVar());
			return redirect()->to('/admin/event/edit-event/' . $this->request->getVar('slug'))->withInput();
		}

		$fileGambarEvent = $this->request->getFile('gambar_event');

		// cek gambar apakah tetap gambar lama
		if ($fileGambarEvent->getError() == 4) {
			$namaFileGambarEvent = $this->request->getVar('gambarEventLama');
		} else {
			// generate nama gambar random
			$namaFileGambarEvent = $fileGambarEvent->getRandomName();
			// upload gambar
			$fileGambarEvent->move('img/event/', $namaFileGambarEvent);
			// hapus file yang lama
			unlink('img/event/' . $this->request->getVar('gambarEventLama'));
		}

		$slug = url_title($this->request->getVar('nama_event'), '-', true);
		if ($this->eventModel->save([
			'id_event' => $id_event,
			// 'id_user'     => $this->request->$user_id,
			// 'id_user'     => $this->request->user_id,
			'nama_event' => $this->request->getVar('nama_event'),
			'nama_penyelenggara' => $this->request->getVar('nama_penyelenggara'),
			'slug' => $slug,
			'id_kategori_event' => $this->request->getVar('id_kategori_event'),
			'lokasi_event' => $this->request->getVar('lokasi_event'),
			'tgl_event_mulai' => $this->request->getVar('tgl_event_mulai'),
			'tgl_event_berakhir' => $this->request->getVar('tgl_event_berakhir'),
			'lokasi_event' => $this->request->getVar('lokasi_event'),
			'deskripsi_event' => $this->request->getVar('deskripsi_event'),
			'tgl_artikel' => $this->request->getVar('tgl_artikel'),
			'gambar_event' => $namaFileGambarEvent

		])) {

			session()->setFlashdata('success', 'Data berhasil diperbarui!');
		} else {
			session()->setFlashdata('error', 'Data gagal diperbarui!');
		}
		return redirect()->to('admin/event')->withInput();
	}

	public function delete($id_event)
	{
		// cari gambar berdasarkan id
		$event = $this->eventModel->find($id_event);

		// cek jika file gambarnya default.jpg
		if ($event['gambar_event'] != 'default.jpg') {
			//hapus gambar
			unlink('img/event/' . $event['gambar_event']);
		}

		$this->eventModel->delete($id_event);
		session()->setFlashdata('success', 'Data berhasil dihapus!');
		return redirect()->to('admin/event')->withInput();
	}

	function uploadGambar()
	{
		if ($this->request->getFile('file')) {
			$dataFile = $this->request->getFile('file');
			$fileName = $dataFile->getRandomName();
			$dataFile->move("img/uploads/event/", $fileName);
			echo base_url("img/uploads/event/$fileName");
		}
	}

	function deleteGambar()
	{
		$src = $this->request->getVar('src');
		//--> uploads/berkas/1630368882_e4a62568c1b50887a8a5.png

		//http://localhost:8080/img/uploads/event/1658724420_2c8083e4a7b81f44c62a.jpg
		if ($src) {
			$file_name = str_replace(base_url() . "/", "", $src);
			if (unlink($file_name)) {
				echo "Delete file berhasil";
			}
		}
	}

	function listGambar()
	{
		$files = array_filter(glob('uploads/event/*'), 'is_file');
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

	public function verifikasi($id_event)
	{
		// $event = $this->eventModel->getEvent();
		$data = [
			'id_event' => $id_event,
			// 'result' => $this->eventModel->getEvent($id_event),
			'status_event' => '1'
			// 'event' => $event
		];
		$this->eventModel->editData($data);
		session()->setFlashdata('pesan', 'Event telah disetujui');
		//   return view('admin/event/detail-event', $data);
		return redirect()->to(base_url('Event'));
	}

	public function penolakan($id_event)
	{
		// $event = $this->eventModel->getEvent();
		$data = [
			'id_event' => $id_event,
			// 'result' => $this->eventModel->getEvent($id_event),
			'status_event' => '2'
			// 'event' => $event
		];
		$this->eventModel->editData($data);
		session()->setFlashdata('pesan', 'Event ditolak');
		//   return view('admin/event/detail-event', $data);
		return redirect()->to(base_url('Event'));
	}
}
