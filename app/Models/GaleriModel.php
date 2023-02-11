<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class GaleriModel extends Model {
    
	protected $table = 'galeri';
	protected $primaryKey = 'id_galeri';
	protected $useTimestamps = true;  
	protected $allowedFields = ['nama_gambar','gambar_galeri','slug','created_at', 'updated_at'];
	 
	// protected $db, $builder;

    // public function __construct()
    // {
    //     $this->db      = \Config\Database::connect();
    //     $this->builder = $this->db->table('galeri');
    // }

	function countAll() {
		return $this->db->table('galeri')->countAll();
	  }
	  
	public function getGaleri($slug = false)
	{
		if ($slug === false) {
			return $this->findAll();
		}
        return $this->where(['slug' => $slug])->first();
	}

	public function editData($data)
	{
		$this->db->table('galeri')
			->where('id_galeri', $data['id_galeri'])
			->update($data);
	}

}