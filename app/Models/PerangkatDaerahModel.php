<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class PerangkatDaerahModel extends Model
{

  protected $table = 'perangkat_daerah';
  protected $primaryKey = 'id_pd';
  protected $allowedFields = ['nama_pd', 'deskripsi_pd', 'slug'];

  public function getPerangkatDaerah($slug = false)
  {
    if ($slug === false) {
      return $this->findAll();
    }
    return $this->where(['slug' => $slug])->first();
  }

  // public function getIkudanikd1621Bymisi($slug = false)
  // {
  //   if ($slug === false) {
  //     // return $this->findAll();

  //     $id_misi = $this->join('misi', 'ikudanikd1621.id_misi = misi.id_satuan');
  //   }
  // }
}
