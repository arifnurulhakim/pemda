<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\KategoriWisataModel;
// use App\Models\WisataModel;

class Publikasi extends BaseController
{
	public function index()
	{
		$publikasi = $this->publikasiModel->getPublikasi();
		$data = [
			'title' => 'Daftar Publikasi',
			'subTitle' => 'Publikasi',
			// 'publikasi' => $publikasi->paginate(5, 'publikasi'),
			// 'pager' => $this->publikasiModel->pager,
			// 'currentPage' => $currentPage
			'publikasi' => $publikasi
		];
		// dd($publikasi);
		return view('admin/publikasi/data-publikasi', $data);
	}

	public function detail($slug)
	{

		$data =
			[
				'title' => 'Tambah Data',
				'publikasi' => $this->publikasiModel->getPublikasi($slug)
			];
		if (empty($data['publikasi'])) {
			throw new \CodeIgniter\Exceptions\PageNotFoundException('Publikasi ' . $slug . ' tidak ditemukan');
		}
		//   dd($data);
		return view('admin/publikasi/detail-publikasi', $data);
	}


	public function create()
	{
		$data =
			[
				'title' => 'Tambah Publikasi',
				// 'kategori_wisata' => $this->kategoriWisataModel->orderby('nama_kategori_wisata')->findAll(),
				'validation' => \Config\Services::validation()
			];

		// dd($data);
		// return view('admin/index',$data);
		return view('admin/publikasi/create-publikasi', $data);
	}

	public function save()
	{
		// Validasi Data
		if (!$this->validate([
			'nama_file' => [
				'rules' => 'required[publikasi.nama_file]',
				'label' => 'Nama file',
				'errors' => [
					'required' => '{field} harus diisi'
				]
			],
			'file_publikasi' => [
				'rules' =>	'max_size[file_publikasi,3024]|mime_in[file_publikasi,application/pdf]',
				'errors' => [
					'max_size' => 'Ukuran file terlalu besar. Max 3 mb',
					'mime_in' => 'File yang anda pilih bukan pdf',
				]
			]
		])) {
			//Berisi fungsi redirect jika validasi tidak memenuhi
			// dd(\Config\Services::validation()->getErrors());
			return redirect()->to('/admin/publikasi/create')->withInput();
		}

		$filePublikasi = $this->request->getFile('file_publikasi');
		// apakah tidak ada file yang diupload
		if ($filePublikasi->getError() == 4) {
			$namaFilePublikasi = $filePublikasi;
		} else {

			// dd($filePublikasi);
			$namaFilePublikasi = $filePublikasi->getName();
			$filePublikasi->move('file/publikasi');
		}
		$user_id = user();
		$slug = url_title($this->request->getVar('nama_file'), '-', true);
		if ($this->publikasiModel->save([
			// 'id_user'     => $this->request->$user_id,
			// 'id_user'     => $this->request->user_id,
			'nama_file' => $this->request->getVar('nama_file'),
			'slug' => $slug,
			'file_publikasi' => $namaFilePublikasi

		])) {
			// dd($_SESSION);
			session()->setFlashdata('success', 'Data berhasil ditambahkan!');
		} else {
			session()->setFlashdata('error', 'Data gagal ditambahkan!');
		}
		return redirect()->to('admin/publikasi/');
	}

	public function edit($slug)
	{
		$data = [
			'title' => 'Edit Data Publikasi',
			'subTitle' => 'Publikasi',
			'result' => $this->publikasiModel->getPublikasi($slug),
			'validation' => \Config\Services::validation()
		];

		return view('admin/publikasi/edit-publikasi', $data);
	}

	public function update($id_publikasi)
	{

		// Cek Judul Publikasi yang lama
		$dataPublikasiLama = $this->publikasiModel->getPublikasi($this->request->getVar('slug'));
		if ($dataPublikasiLama['nama_file'] == $this->request->getVar('nama_file')) {
			$rule_title = 'required';
		} else {
			$rule_title = 'required|is_unique[publikasi.nama_file]';
		}
		// Validasi Data
		if (!$this->validate([
			'nama_file' => [
				'rules' => $rule_title,
				'label' => 'Judul publikasi',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
				]
			],
			'file_publikasi' => [
				'rules' =>	'max_size[file_publikasi,3024]|mime_in[file_publikasi,application/pdf]',
				'errors' => [
					'max_size' => 'Ukuran file terlalu besar. Max 3 mb',
					'mime_in' => 'File yang anda pilih bukan pdf',
				]
			]
		])) {
			//Berisi fungsi redirect jika validasi tidak memenuhi
			// dd(\Config\Services::validation()->getErrors());

			return redirect()->to('/admin/publikasi/edit-publikasi/' . $this->request->getVar('slug'))->withInput();
		}

		$filePublikasi = $this->request->getFile('file_publikasi');

		// cek file apakah tetap file lama
		if ($filePublikasi->getError() == 4) {
			$namaFilePublikasi = $this->request->getVar('filePublikasiLama');
		} else {
			// generate nama file random
			$namaFilePublikasi = $filePublikasi->getName();
			// upload file
			$filePublikasi->move('file/publikasi/', $namaFilePublikasi);
			// hapus file yang lama
			unlink('file/publikasi/' . $this->request->getVar('filePublikasiLama'));
		}

		$slug = url_title($this->request->getVar('nama_file'), '-', true);
		if ($this->publikasiModel->save([
			'id_publikasi' => $id_publikasi,
			// 'id_user'     => $this->request->$user_id,
			// 'id_user'     => $this->request->user_id,
			'nama_file' => $this->request->getVar('nama_file'),
			'file_publikasi' => $namaFilePublikasi,
			'slug' => $slug
		])) {
			// dd($_SESSION);
			session()->setFlashdata('success', 'Data berhasil diperbarui!');
		} else {
			session()->setFlashdata('error', 'Data gagal diperbarui!');
		}
		return redirect()->to('admin/publikasi/')->withInput();
	}


	public function delete($id_publikasi)
	{
		// cari file berdasarkan id
		$publikasi = $this->publikasiModel->find($id_publikasi);

		// cek file
		if ($publikasi['file_publikasi'] == $publikasi['file_publikasi']) {
			//hapus file
			unlink('file/publikasi/' . $publikasi['file_publikasi']);
		}

		$this->publikasiModel->delete($id_publikasi);
		session()->setFlashdata('success', 'Data berhasil dihapus!');
		return redirect()->to('admin/publikasi');
	}

	function uploadGambar()
	{
		if ($this->request->getFile('file')) {
			$dataFile = $this->request->getFile('file');
			$fileName = $dataFile->getRandomName();
			$dataFile->move("img/uploads/publikasi/", $fileName);
			echo base_url("img/uploads/publikasi/$fileName");
		}
	}

	function deleteGambar()
	{
		$src = $this->request->getVar('src');
		//--> uploads/berkas/1630368882_e4a62568c1b50887a8a5.png

		//http://localhost:8080/img/uploads/publikasi/1658724420_2c8083e4a7b81f44c62a.jpg
		if ($src) {
			$file_name = str_replace(base_url() . "/", "", $src);
			if (unlink($file_name)) {
				echo "Delete file berhasil";
			}
		}
	}

	function listGambar()
	{
		$files = array_filter(glob('uploads/publikasi/*'), 'is_file');
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
