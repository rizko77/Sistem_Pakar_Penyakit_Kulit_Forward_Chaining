<?php

namespace App\Models;

use CodeIgniter\Model;

class GejalaModel extends Model
{
    protected $table = 'gejala';
    protected $allowedFields = ['kode_g', 'nama_g'];
    protected $useAutoIncrement = true;

    public function getGejala()
    {
        return $this->findAll();
    }
}
