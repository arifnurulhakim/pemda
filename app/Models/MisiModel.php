<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class MisiModel extends Model
{

  protected $table = 'misi';
  protected $primaryKey = 'id_misi';
  protected $allowedFields = ['nama_misi', 'deskripsi_misi', 'slug_misi'];

  public function getMisi($slug = false)
  {
    if ($slug === false) {
      return $this->findAll();
    }
    return $this->where(['slug_misi' => $slug])->first();
  }

  // public function getIkudanikd1621Bymisi($slug = false)
  // {
  //   if ($slug === false) {
  //     // return $this->findAll();

  //     $id_misi = $this->join('misi', 'ikudanikd1621.id_misi = misi.id_satuan');
  //   }
  // }
}
