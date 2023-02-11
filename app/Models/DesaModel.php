<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class DesaModel extends Model
{

  protected $table = 'desa';
  protected $primaryKey = 'id_desa';
  protected $allowedFields = ['id_kecamatan', 'desa'];

  public function getDesa($desa = false)
  {
    if ($desa === false) {
      return $this->findAll();
    }
    return $this->where(['id_desa' => $desa])->first();
  }
}
