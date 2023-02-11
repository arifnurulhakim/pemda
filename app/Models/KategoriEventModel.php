<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class KategoriEventModel extends Model {
    
	protected $table = 'kategori_event';
	protected $primaryKey = 'id_kategori_event';
    protected $allowedFields = ['nama_kategori_event','deskripsi_kategori_event','slug_kategori_event'];

	public function getKategoriEvent($slug = false)
	{
		if ($slug === false) {
			return $this->findAll();
		}
        return $this->where(['slug_kategori_event' => $slug])->first();
	}

	public function getWisataByKategori($slug = false)
	{
		if ($slug === false) {
			// return $this->findAll();
			
			$id_kategori_wisata = $this->join('kategori_produk', 'produk.id_kategori_produk = kategori_produk.id_kategori_produk');
			
		}
	}
}