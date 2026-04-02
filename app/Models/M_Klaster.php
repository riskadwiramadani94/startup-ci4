<?php

namespace App\Models;

use CodeIgniter\Model;

class M_Klaster extends Model
{
    protected $table      = 'tb_klaster';
    protected $primaryKey = 'id';
    protected $returnType = 'array';

    /** @var list<string> */
    protected $allowedFields = ['nama_klaster'];
}
