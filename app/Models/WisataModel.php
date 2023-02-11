<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class WisataModel extends Model
{

	protected $table = 'wisata';
	protected $primaryKey = 'id_wisata';
	protected $useTimestamps = true;
	protected $allowedFields = ['nama_wisata', 'slug', 'alamat_wisata', 'deskripsi_wisata', 'id_kategori_wisata', 'gambar_wisata', 'created_at', 'updated_at'];

	// protected $db, $builder;

	// public function __construct()
	// {
	//     $this->db      = \Config\Database::connect();
	//     $this->builder = $this->db->table('wisata');
	// }

	function countAll()
	{
		return $this->db->table('wisata')->countAll();
	}

	public function getWisata($slug = false)
	{
		if ($slug === false) {
			// $this->where(['slug' => $slug])->first();
			$this->join('kategori_wisata', 'wisata.id_kategori_wisata = kategori_wisata.id_kategori_wisata');
			// $this->join('users', 'users.id = wisata.id_user');
			// $this->where('id_user', $slug);
			// $this->or_where('slug_produk', $slug);
			return $this->findAll();
		}
		return $this->where(['slug' => $slug])->first();
	}

	function get_cari_wisata($cari)
	{
		return $this->table('wisata')
			->join('kategori_wisata', 'wisata.id_kategori_wisata = kategori_wisata.id_kategori_wisata')
			->like('nama_wisata', $cari)
			->orLike('nama_kategori_wisata', $cari);
	}

	function get_wisata_by_kategory($cari)
	{
		return $this->table('wisata')
			->join('kategori_wisata', 'wisata.id_kategori_wisata = kategori_wisata.id_kategori_wisata')
			->like('nama_kategori_wisata', $cari);
	}

	function get_cari_wisata_admin($cari)
	{
		return $this->table('wisata')
			->join('kategori_wisata', 'wisata.id_kategori_wisata = kategori_wisata.id_kategori_wisata')
			->like('nama_wisata', $cari)
			->orLike('nama_kategori_wisata', $cari);
	}

	function get_wisata_by_kategory_admin($cari)
	{
		return $this->table('wisata')
			->join('kategori_wisata', 'wisata.id_kategori_wisata = kategori_wisata.id_kategori_wisata')
			->like('nama_kategori_wisata', $cari);
	}
}
