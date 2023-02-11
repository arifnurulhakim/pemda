<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Controllers;

use App\Controllers\BaseController;
// use App\Models\KategoriWisataModel;
// use App\Models\WisataModel;

class Wisata extends BaseController
{
	// protected $wisataModel;
	// public function __construct()
	// {
	// 	$this->wisataModel = new WisataModel();
	// }

	public function index()
	{
		$kategoriWisata = $this->kategoriWisataModel->getKategoriWisata();
		$wisata = $this->wisataModel->getWisata();
		$data = [
			'title' => 'Daftar Wisata',
			'subTitle' => 'Wisata',
			// 'event' => $event->paginate(5, 'event'),
			// 'pager' => $this->eventModel->pager,
			// 'currentPage' => $currentPage
			'wisata' => $wisata,
			'kategoriWisata' => $kategoriWisata
		];
		// dd($data);
		return view('admin/wisata/data-wisata', $data);
	}
	public function detail($slug)
	{
		$data =
			[
				'title' => 'Tambah Data',
				'wisata' => $this->wisataModel->getWisata($slug)
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
				'title' => 'Kategori Wisata',
				'kategori_wisata' => $this->kategoriWisataModel->orderby('nama_kategori_wisata')->findAll(),
				'validation' => \Config\Services::validation()
			];

		// dd($data);
		// return view('admin/index',$data);
		return view('admin/wisata/create-wisata', $data);
	}

	public function save()
	{

		// Validasi Data
		if (!$this->validate([
			'nama_wisata' => [
				'rules' => 'required|is_unique[wisata.nama_wisata]',
				'label' => 'Nama wisata',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
				]
			],
			'alamat_wisata' => [
				'rules' => 'required',
				'label' => 'Deskripsi',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
				]
			],
			'deskripsi_wisata' => [
				'rules' => 'required',
				'label' => 'Deskripsi',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
				]
			],
			'id_kategori_wisata' => [
				'rules' => 'required',
				'label' => 'Kategori wisata',
				'errors' => [
					'required' => '{field} harus diisi'
				]
			],
			'gambar_wisata' => [
				'rules' =>	'max_size[gambar_wisata,1024]|is_image[gambar_wisata]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar. Max 1 mb',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan gambar',
				]
			]
		])) {
			//Berisi fungsi redirect jika validasi tidak memenuhi
			// dd(\Config\Services::validation()->getErrors());
			return redirect()->to('/admin/wisata/create')->withInput();
		}

		// ambil gambar
		$fileGambarWisata = $this->request->getFile('gambar_wisata');
		// dd($fileGambarWisata);

		// apakah tidak ada gambar yang diupload
		if ($fileGambarWisata->getError() == 4) {
			$namaFileGambarWisata = 'default.jpg';
		} else {
			// generate nama gambar random
			$namaFileGambarWisata = $fileGambarWisata->getRandomName();

			// pindahkan ke folder img
			$fileGambarWisata->move('img/wisata/', $namaFileGambarWisata);
		}
		$user_id = user();
		$slug = url_title($this->request->getVar('nama_wisata'), '-', true);
		if ($this->wisataModel->save([
			// 'id_user'     => $this->request->$user_id,
			// 'id_user'     => $this->request->user_id,
			'nama_wisata' => $this->request->getVar('nama_wisata'),
			'slug' => $slug,
			'alamat_wisata' => $this->request->getVar('alamat_wisata'),
			'deskripsi_wisata' => $this->request->getVar('deskripsi_wisata'),
			'id_kategori_wisata' => $this->request->getVar('id_kategori_wisata'),
			'gambar_wisata' => $namaFileGambarWisata

		])) {
			// dd($_SESSION);
			// dd($this->request->getVar());
			session()->setFlashdata('success', 'Data berhasil ditambahkan!');
		} else {
			session()->setFlashdata('error', 'Data gagal ditambahkan!');
		}
		return redirect()->to('admin/wisata');
	}

	public function edit($slug)
	{
		$data = [
			'title' => 'Edit Data Wisata',
			'subTitle' => 'Wisata',
			'result' => $this->wisataModel->getWisata($slug),
			'kategori_wisata' => $this->kategoriWisataModel->orderby('nama_kategori_wisata')->findAll(),
			'validation' => \Config\Services::validation()
		];

		return view('admin/wisata/edit-wisata', $data);
	}

	public function update($id_wisata)
	{
		// Cek Nama Wisata yang lama
		$dataWisataLama = $this->wisataModel->getWisata($this->request->getVar('slug'));
		if ($dataWisataLama['nama_wisata'] == $this->request->getVar('nama_wisata')) {
			$rule_title = 'required';
		} else {
			$rule_title = 'required|is_unique[wisata.nama_wisata]';
		}
		// Validasi Data
		if (!$this->validate([
			'nama_wisata' => [
				'rules' => $rule_title,
				'label' => 'Nama wisata',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
				]
			],
			'deskripsi_wisata' => [
				'rules' => 'required',
				'label' => 'Deskripsi',
				'errors' => [
					'required' => '{field} harus diisi',
					'is_unique' => '{field} sudah digunakan'
				]
			],
			'id_kategori_wisata' => [
				'rules' => 'required',
				'label' => 'Kategori wisata',
				'errors' => [
					'required' => '{field} harus diisi'
				]
				// '|is_natural_no_zero'
			],
			'gambar_wisata' => [
				'rules' =>	'max_size[gambar_wisata,1024]|is_image[gambar_wisata]',
				'errors' => [
					'max_size' => 'Ukuran gambar terlalu besar. Max 1 mb',
					'is_image' => 'Yang anda pilih bukan gambar',
					'mime_in' => 'Yang anda pilih bukan gambar',
				]
			]
		])) {
			//Berisi fungsi redirect jika validasi tidak memenuhi
			dd(\Config\Services::validation()->getErrors());
			return redirect()->to('/admin/wisata/edit-wisata/' . $this->request->getVar('slug'))->withInput();
		}

		$fileGambarWisata = $this->request->getFile('gambar_wisata');

		// cek gambar apakah tetap gambar lama
		if ($fileGambarWisata->getError() == 4) {
			$namaFileGambarWisata = $this->request->getVar('gambarWisataLama');
		} else {
			// generate nama gambar random
			$namaFileGambarWisata = $fileGambarWisata->getRandomName();
			// upload gambar
			$fileGambarWisata->move('img/wisata/', $namaFileGambarWisata);
			// hapus file yang lama
			unlink('img/wisata/' . $this->request->getVar('gambarWisataLama'));
		}

		$slug = url_title($this->request->getVar('nama_wisata'), '-', true);
		if ($this->wisataModel->save([
			'id_wisata' => $id_wisata,
			// 'id_user'     => $this->request->$user_id,
			// 'id_user'     => $this->request->user_id,
			'nama_wisata' => $this->request->getVar('nama_wisata'),
			'slug' => $slug,
			'deskripsi_wisata' => $this->request->getVar('deskripsi_wisata'),
			'harga' => $this->request->getVar('harga'),
			'berat' => $this->request->getVar('berat'),
			'stok' => $this->request->getVar('stok'),
			'id_kategori_wisata' => $this->request->getVar('id_kategori_wisata'),
			'gambar_wisata' => $namaFileGambarWisata

		])) {
			session()->setFlashdata('success', 'Data berhasil diperbarui!');
		} else {
			session()->setFlashdata('error', 'Data gagal diperbarui!');
		}
		return redirect()->to('/admin/wisata')->withInput();
	}

	public function delete($id_wisata)
	{
		// cari gambar berdasarkan id
		$wisata = $this->wisataModel->find($id_wisata);

		// cek jika file gambarnya default.jpg
		if ($wisata['gambar_wisata'] != 'default.jpg') {
			//hapus gambar
			unlink('img/wisata/' . $wisata['gambar_wisata']);
		}

		$this->wisataModel->delete($id_wisata);
		session()->setFlashdata('success', 'Data berhasil dihapus!');
		return redirect()->to('/admin/wisata')->withInput();
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
}
