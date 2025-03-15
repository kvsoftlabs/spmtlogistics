<?php
namespace App\Models;
use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'number'];

    // Automatically manage timestamps
    protected $useTimestamps = true;

    // Specify the timestamp fields
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
