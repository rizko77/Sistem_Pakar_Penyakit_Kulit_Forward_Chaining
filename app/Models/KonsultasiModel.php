<?php

namespace App\Models;

use CodeIgniter\Model;

class KonsultasiModel extends Model
{
    protected $table = 'rules';

    public function diagnose($gejala)
    {
        $this->select('penyakit.nama, penyakit.solusi');
        $this->join('penyakit', 'rules.id_penyakit = penyakit.id');
        $this->whereIn('rules.id_gejala', $gejala);
        $query = $this->get();

        return $query->getResultArray();
    }
}
