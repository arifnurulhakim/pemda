<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class EventModel extends Model
{

	protected $table = 'event';
	protected $primaryKey = 'id_event';
	protected $useTimestamps = true;
	protected $allowedFields = ['nama_event', 'nama_penyelenggara', 'slug', 'id_kategori_event', 'lokasi_event', 'tgl_event_mulai', 'tgl_event_berakhir', 'deskripsi_event', 'status_event', 'keterangan', 'gambar_event', 'created_at', 'updated_at'];
	// protected $db, $builder;

	// public function __construct()
	// {
	//     $this->db      = \Config\Database::connect();
	//     $this->builder = $this->db->table('artikel');
	// }

	function countAll()
	{
		return $this->db->table('event')->countAll();
	}

	public function getEvent($slug = false)
	{
		if ($slug === false) {
			$this->join('kategori_event', 'event.id_kategori_event = kategori_event.id_kategori_event');
			return $this->findAll();
		}
		return $this->where(['slug' => $slug])->first();
	}

	public function editData($data)
	{
		$this->db->table('event')
			->where('id_event', $data['id_event'])
			->update($data);
	}
}
