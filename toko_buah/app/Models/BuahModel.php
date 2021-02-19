<?php

namespace App\Models;

use CodeIgniter\Model;

class BuahModel extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'price', 'image', 'description'];

    public function getBuah()
    {
        return $this->findAll();
    }
}