<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class Renstra2126Model extends Model
{

  protected $table = 'renstra2126';
  protected $primaryKey = 'id_renstra2126';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_pd', 'id_satuan', 'nama_indikator',  'slug', 't22', 'r22', 't23', 'r23', 't24', 'r24', 't25', 'r25', 't26', 'r26', 'created_at', 'updated_at'];

  // protected $db, $builder;

  // public function __construct()
  // {
  //     $this->db      = \Config\Database::connect();
  //     $this->builder = $this->db->table('wisata');
  // }

  function countAll()
  {
    return $this->db->table('renstra2126')->countAll();
  }

  public function getRenstra2126($slug = false)
  {
    if ($slug === false) {
      // $this->where(['slug' => $slug])->first();
      // $this->join('misi'enstra2126.id_misi = misi.id_misi');
      $this->join('perangkat_daerah', 'renstra2126.id_pd = perangkat_daerah.id_pd');
      $this->join('satuan', 'renstra2126.id_satuan = satuan.id_satuan');
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
