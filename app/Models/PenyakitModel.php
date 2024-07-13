<?php

namespace App\Models;

use CodeIgniter\Model;

class PenyakitModel extends Model
{
    protected $table = 'penyakit';
    protected $allowedFields = ['kode_penyakit', 'nama', 'solusi'];

    public function getPenyakit()
    {
        return $this->findAll();
    }
}
