<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class Misi2126Model extends Model
{

  protected $table = 'misi2126';
  protected $primaryKey = 'id_misi2126';
  protected $allowedFields = ['nama_misi2126', 'deskripsi_misi2126', 'slug_misi2126'];

  public function getMisi2126($slug = false)
  {
    if ($slug === false) {
      return $this->findAll();
    }
    return $this->where(['slug_misi2126' => $slug])->first();
  }

  // public function getIkudanikd1621Bymisi2126($slug = false)
  // {
  //   if ($slug === false) {
  //     // return $this->findAll();

  //     $id_misi2126 = $this->join('misi2126', 'ikudanikd1621.id_misi2126 = misi2126.id_satuan');
  //   }
  // }
}
