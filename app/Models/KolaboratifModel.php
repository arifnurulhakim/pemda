<?php

namespace App\Models;

use CodeIgniter\Model;

class KolaboratifModel extends Model
{
    protected $table = 'kolaboratif'; //ganti "nama_tabel_kolaboratif" dengan nama tabel yang digunakan
    protected $primaryKey = 'id_kolaboratif';
    protected $allowedFields = ['id_jenis_program','nama_program','indikator', 'id_pd', 'kode_rekening', 'id_satuan', 'target', 'pagu', 'id_kecamatan', 'id_desa', 'alamat', 'sumber_pendanaan', 'progres', 'created_at', 'updated_at'];
    protected $useTimestamps = true;


    public function getKolaboratif()
{
    return $this->findAll();
}

public function getKolaboratifJoin() {
    $builder = $this->db->table('kolaboratif');
    $builder->select('*');
    $builder->join('jenis_program', 'jenis_program.id_jenis_program = kolaboratif.id_jenis_program', 'left');
    $builder->join('desa', 'desa.id_desa = kolaboratif.id_desa', 'left');
    $builder->join('kecamatan', 'kecamatan.id_kecamatan = kolaboratif.id_kecamatan', 'left');
    $builder->join('perangkat_daerah', 'perangkat_daerah.id_pd = kolaboratif.id_pd', 'left');
    $builder->join('satuan', 'satuan.id_satuan = kolaboratif.id_satuan', 'left');
    $builder->join('kode_rekening', 'kode_rekening.kode_rekening = kolaboratif.kode_rekening', 'left');
    $query = $builder->get();
    return $query->getResultArray();
  }

  public function getKolaboratifFilter($tahun_program, $jenis_program) {
    $builder = $this->db->table('kolaboratif');
    $builder->select('*');
    $builder->join('jenis_program', 'jenis_program.id_jenis_program = kolaboratif.id_jenis_program', 'left');
    $builder->join('desa', 'desa.id_desa = kolaboratif.id_desa', 'left');
    $builder->join('kecamatan', 'kecamatan.id_kecamatan = kolaboratif.id_kecamatan', 'left');
    $builder->join('perangkat_daerah', 'perangkat_daerah.id_pd = kolaboratif.id_pd', 'left');
    $builder->join('satuan', 'satuan.id_satuan = kolaboratif.id_satuan', 'left');
    $builder->join('kode_rekening', 'kode_rekening.kode_rekening = kolaboratif.kode_rekening', 'left');
    $builder->where('jenis_program.jenis_program', $jenis_program);
    $builder->where('jenis_program.tahun_program', $tahun_program);
    $query = $builder->get();
    return $query->getResultArray();
}
public function saveKolaboratif($data)
{
    return $this->insert($data);
}
public function deleteData($id_kolaboratif)
    {
        return $this->delete($id_kolaboratif);
    }
  
}
