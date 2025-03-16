<?php

namespace App\Models;

use CodeIgniter\Model;

class DriverModel extends Model
{
    protected $table = 'drivers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'number', 'address'];
    protected $useTimestamps = true;

    // Optionally, you can add validation rules for the driver form
    protected $validationRules = [
        'name' => 'required|min_length[3]|max_length[255]',
        'number' => 'required|numeric|min_length[10]|max_length[15]',
        'address' => 'permit_empty|string|max_length[255]'
    ];
}
