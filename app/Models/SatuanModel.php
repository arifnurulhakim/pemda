<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{

  protected $table = 'satuan';
  protected $primaryKey = 'id_satuan';
  protected $allowedFields = ['nama_satuan', 'deskripsi_satuan', 'slug_satuan'];

  public function getSatuan($slug = false)
  {
    if ($slug === false) {
      return $this->findAll();
    }
    return $this->where(['slug_satuan' => $slug])->first();
  }

  public function getIkudanikd1621BySatuan($slug = false)
  {
    if ($slug === false) {
      // return $this->findAll();

      $id_satuan = $this->join('Satuan', 'ikudanikd1621.id_satuan = satuan.id_satuan');
    }
  }
}
