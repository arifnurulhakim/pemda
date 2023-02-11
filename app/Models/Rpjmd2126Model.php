<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class Rpjmd2126Model extends Model
{

  protected $table = 'rpjmd2126';
  protected $primaryKey = 'id_rpjmd2126';
  protected $useTimestamps = true;
  protected $allowedFields = ['id_misi2126', 'id_ikudanikd2126', 't22', 'r22', 't23', 'r23', 't24', 'r24', 't25', 'r25', 't26', 'r26', 'created_at', 'updated_at'];

  // protected $db, $builder;

  // public function __construct()
  // {
  //     $this->db      = \Config\Database::connect();
  //     $this->builder = $this->db->table('wisata');
  // }

  function countAll()
  {
    return $this->db->table('rpjmd2126')->countAll();
  }

  public function getRpjmd2126($slug = false)
  {
    if ($slug === false) {
      // $this->where(['slug' => $slug])->first();
      $this->join('misi2126', 'rpjmd2126.id_misi2126 = misi2126.id_misi2126');
      $this->join('ikudanikd2126', 'rpjmd2126.id_ikudanikd2126 = ikudanikd2126.id_ikudanikd2126');
      $this->join('satuan', 'ikudanikd2126.id_satuan = satuan.id_satuan');
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
}
