<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class Rpjmd1621Model extends Model
{

  protected $table = 'rpjmd1621';
  protected $primaryKey = 'id_rpjmd1621';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_misi', 'id_ikudanikd1621', 't17', 'r17', 't18', 'r18', 't19', 'r19', 't20', 'r20', 't21', 'r21', 'created_at', 'updated_at'];

  // protected $db, $builder;

  // public function __construct()
  // {
  //     $this->db      = \Config\Database::connect();
  //     $this->builder = $this->db->table('wisata');
  // }

  function countAll()
  {
    return $this->db->table('rpjmd1621')->countAll();
  }

  public function getRpjmd1621($slug = false)
  {
    if ($slug === false) {
      // $this->where(['slug' => $slug])->first();
      $this->join('misi', 'rpjmd1621.id_misi = misi.id_misi');
      $this->join('ikudanikd1621', 'rpjmd1621.id_ikudanikd1621 = ikudanikd1621.id_ikudanikd1621');
      $this->join('satuan', 'ikudanikd1621.id_satuan = satuan.id_satuan');
      // $this->join('users', 'users.id = wisata.id_user');
      // $this->where('id_user', $slug);
      // $this->or_where('slug_produk', $slug);
      return $this->orderby('created_at')->findAll();
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
  public function deleteData($id_rpjmd1621){
    return $this->db->table($this->table)->delete(['id_rpjmd1621' => $id_rpjmd1621]);
  }
  public function getdataupdate($id_rpjmd1621){
    return $this->db->table($this->table)->get()->getResultArray();
    
  }
}
  