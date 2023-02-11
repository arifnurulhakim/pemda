<?php
// ADEL CODEIGNITER 4 CRUD GENERATOR

namespace App\Models;

use CodeIgniter\Model;

class KodeRekeningModel extends Model
{

  protected $table = 'kode_rekening';
  protected $primaryKey = 'id_kode_rekening';
  protected $allowedFields = ['kode_rekening', 'program', 'slug_program'];

  public function getKodeRekening($slug = false)
  {
    if ($slug === false) {
      return $this->findAll();
    }
    return $this->where(['slug_program' => $slug])->first();
  }

  // public function getIkudanikd1621ByKodeRekening($slug = false)
  // {
  //   if ($slug === false) {
  //     // return $this->findAll();

  //     $id_KodeRekening = $this->join('KodeRekening', 'ikudanikd1621.id_KodeRekening = KodeRekening.id_satuan');
  //   }
  // }
}
