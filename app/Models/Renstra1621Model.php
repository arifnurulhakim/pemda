<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class Renstra1621Model extends Model
{

  protected $table = 'renstra1621';
  protected $primaryKey = 'id_renstra1621';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_pd', 'id_satuan', 'nama_indikator',  'slug', 't17', 'r17', 't18', 'r18', 't19', 'r19', 't20', 'r20', 't21', 'r21', 'created_at', 'updated_at'];

  // protected $db, $builder;

  // public function __construct()
  // {
  //     $this->db      = \Config\Database::connect();
  //     $this->builder = $this->db->table('wisata');
  // }

  function countAll()
  {
    return $this->db->table('renstra1621')->countAll();
  }

  public function getRenstra1621($slug = false)
  {
    if ($slug === false) {
      // $this->where(['slug' => $slug])->first();
      // $this->join('misi'enstra1621.id_misi = misi.id_misi');
      $this->join('perangkat_daerah', 'renstra1621.id_pd = perangkat_daerah.id_pd');
      $this->join('satuan', 'renstra1621.id_satuan = satuan.id_satuan');
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
  public function deleteData($id_renstra1621){
    return $this->db->table($this->table)->delete(['id_renstra1621' => $id_renstra1621]);
  }
  public function getdataupdate($id_renstra1621){

    return $this->db->table($this->table)->where('id_renstra1621', $id_renstra1621)->get()->getResultArray();

    
  }

}
