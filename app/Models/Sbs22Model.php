<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class Sbs22Model extends Model
{

  protected $table = 'sbs22';
  protected $primaryKey = 'id_sbs22';
  protected $useTimestamps = true;
  protected $allowedFields = ['kode_rekening', 'id_pd', 'program_kolaboratif', 'indikator_program', 'id_satuan', 'target', 'pagu', 'id_kecamatan', 'id_desa', 'sumber_pendanaan', 'alamat', 'progres', 'created_at', 'updated_at'];

  // protected $db, $builder;

  // public function __construct()
  // {
  //     $this->db      = \Config\Database::connect();
  //     $this->builder = $this->db->table('wisata');
  // }

  function countAll()
  {
    return $this->db->table('sbs22')->countAll();
  }

  public function getSbs22($slug = false)
  {
    if ($slug === false) {
      // $this->where(['slug' => $slug])->first();
      $this->join('perangkat_daerah', 'sbs22.id_pd = perangkat_daerah.id_pd');
      $this->join('satuan', 'sbs22.id_satuan = satuan.id_satuan');
      $this->join('kode_rekening', 'sbs22.kode_rekening = kode_rekening.id_kode_rekening');
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
