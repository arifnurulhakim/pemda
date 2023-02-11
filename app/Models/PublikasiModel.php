<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;
use CodeIgniter\Model;

class PublikasiModel extends Model {
    
	protected $table = 'publikasi';
	protected $primaryKey = 'id_publikasi';
	protected $useTimestamps = true;  
	protected $allowedFields = ['nama_file','file_publikasi','slug','created_at', 'updated_at'];
	 
	// protected $db, $builder;

    // public function __construct()
    // {
    //     $this->db      = \Config\Database::connect();
    //     $this->builder = $this->db->table('publikasi');
    // }

	function countAll() {
		return $this->db->table('publikasi')->countAll();
	  }
	  
	public function getPublikasi($slug = false)
	{
		if ($slug === false) {
			return $this->findAll();
		}
        return $this->where(['slug' => $slug])->first();
	}

	public function editData($data)
	{
		$this->db->table('publikasi')
			->where('id_publikasi', $data['id_publikasi'])
			->update($data);
	}

}