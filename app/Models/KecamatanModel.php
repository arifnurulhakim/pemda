<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class KecamatanModel extends Model
{

  protected $table = 'Kecamatan';
  protected $primaryKey = 'id_kecamatan';
  protected $allowedFields = ['kecamatan'];

  public function getKecamatan($kecamatan = false)
  {
    if ($kecamatan === false) {
      return $this->findAll();
    }
    return $this->where(['id_kecamatan' => $kecamatan])->first();
  }
}
