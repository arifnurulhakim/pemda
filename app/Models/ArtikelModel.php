<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class ArtikelModel extends Model {
    
	protected $table = 'artikel';
	protected $primaryKey = 'id_artikel';
	protected $useTimestamps = true;  
	protected $allowedFields = ['judul_artikel','slug','isi_artikel', 'tgl_artikel','gambar_artikel','created_at', 'updated_at'];
	 
	// protected $db, $builder;

    // public function __construct()
    // {
    //     $this->db      = \Config\Database::connect();
    //     $this->builder = $this->db->table('artikel');
    // }

	function countAll() {
		return $this->db->table('artikel')->countAll();
	  }
	  
	public function getArtikel($slug = false)
	{
		if ($slug === false) {
			return $this->findAll();
		}
        return $this->where(['slug' => $slug])->first();
	}
	public function getArtikelTerkini($slug = false)
	{
		if ($slug === false) {
			return $this->findAll();
		}
        return $this->where(['slug' => $slug])->first();
	}

	public function getProdukUser($slug)
	{
		// if ($slug === false) {
			// $this->where(['slug' => $slug])->first();
			// $this->join('kategori_wisata', 'artikel.id_kategori_wisata = kategori_wisata.id_kategori_wisata');
			$this->join('users', 'users.id = artikel.id_user');
			return $this->findAll();
		// }
        return $this->where(['slug' => $slug])->first();
	}


}