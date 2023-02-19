<?php

namespace App\Models;

use CodeIgniter\Model;

class RkpdModel extends Model
{
    protected $table = 'rkpd';
    protected $primaryKey = 'id_rkpd';
    protected $allowedFields = [
        'id_kode_rekening',
        'id_pd',
        'program',
        'indikator',
        'target',
        'id_satuan',
        'pagu',
        'id_kab',
        'sumber_dana',
        'prioritas_nasional',
        'prioritas_daerah',
        'kelompok_sasaran',
        'tahun_rkpd',
        'created_at',
        'updated_at'
    ];

    public function getRkpd()
    {
        return $this->findAll();
    }
    public function getdataupdate($id_rkpd){

        return $this->db->table($this->table)->where('id_rkpd', $id_rkpd)->get()->getResultArray();
    
        
      }

    public function getRkpdById($id)
    {
        return $this->find($id);
    }

    public function saveRkpd($data)
    {
        return $this->insert($data);
    }

    public function updateRkpd($id, $data)
    {
        return $this->update($id, $data);
    }

    public function deleteData($id_rkpd)
    {
        return $this->delete($id_rkpd);
    }
}
