<?php

namespace App\Models;

use CodeIgniter\Model;

class RuleModel extends Model
{
    protected $table = 'rules';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_penyakit', 'id_gejala'];

    public function getRulesWithRelations()
    {
        return $this->select('rules.*, penyakit.nama as penyakit_nama, gejala.nama_g as gejala_nama')
                    ->join('penyakit', 'rules.id_penyakit = penyakit.id')
                    ->join('gejala', 'rules.id_gejala = gejala.id')
                    ->findAll();
    }
}
