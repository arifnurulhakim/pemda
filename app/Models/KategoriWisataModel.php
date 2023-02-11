<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class KategoriWisataModel extends Model {
    
	protected $table = 'kategori_wisata';
	protected $primaryKey = 'id_kategori_wisata';
    protected $allowedFields = ['nama_kategori_wisata','deskripsi_kategori_wisata','slug_kategori_wisata'];

	public function getKategoriWisata($slug = false)
	{
		if ($slug === false) {
			return $this->findAll();
		}
        return $this->where(['slug_kategori_wisata' => $slug])->first();
	}

	public function getWisataByKategori($slug = false)
	{
		if ($slug === false) {
			// return $this->findAll();
			
			$id_kategori_wisata = $this->join('kategori_produk', 'produk.id_kategori_produk = kategori_produk.id_kategori_produk');
			
		}
	}
}