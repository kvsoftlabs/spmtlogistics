<?php
namespace App\Models;
use CodeIgniter\Model;

class TripModel extends Model
{
    protected $table = 'trips';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id', 'from', 'to', 'material', 'weight', 'requested', 'accepted', 'driver_id'];

    // Automatically manage timestamps
    protected $useTimestamps = true;

    // Specify the timestamp fields
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
