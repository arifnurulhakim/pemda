<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class ProdukModel extends Model {
    
	protected $table = 'produk';
	protected $primaryKey = 'id_produk';
	protected $useTimestamps = true;  
	protected $allowedFields = ['id_user','nama_produk','slug','deskripsi_produk', 'harga', 'berat','ukuran', 'stok', 'id_kategori_produk','gambar_produk', 'created_at', 'updated_at'];
	 
	// protected $db, $builder;

    // public function __construct()
    // {
    //     $this->db      = \Config\Database::connect();
    //     $this->builder = $this->db->table('produk');
    // }

	function countAll() {
		return $this->db->table('produk')->countAll();
	  }
	  
	public function getProduk($slug = false)
	{
		if ($slug === false) {
			// $this->where(['slug' => $slug])->first();
			$this->join('kategori_produk', 'produk.id_kategori_produk = kategori_produk.id_kategori_produk');
			$this->join('users', 'users.id = produk.id_user');
			$this->where('id_user', $slug);
			// $this->or_where('slug_produk', $slug);
			return $this->findAll();
		}
        return $this->where(['slug' => $slug])->first();
	}

	// get all
	function get_cari_produk($cari)
	{
	  return $this->table('produk')
	  ->like('nama_produk', $cari)
	  ->orLike('fullname', $cari);
	}

	// public function updateViewer($slug){
    //     $result = $this->db->get_where('products', ['slug' => $slug])->row_array();
    //     $newV = (int)$result['viewer'] + 1;
    //     $this->db->set('viewer', $newV);
    //     $this->db->where('id', $result['id']);
    //     $this->db->update('products');
    // }
}