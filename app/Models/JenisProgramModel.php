<?php

namespace App\Models;

use CodeIgniter\Model;

class JenisProgramModel extends Model
{
    protected $table = 'jenis_program';
    protected $primaryKey = 'id_jenis_program';
    protected $allowedFields = ['jenis_program', 'nama_program', 'indikator', 'tahun_program', 'created_at', 'updated_at'];
    protected $useTimestamps = true;
}
