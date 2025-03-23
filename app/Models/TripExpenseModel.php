<?php

namespace App\Models;

use CodeIgniter\Model;

class TripExpenseModel extends Model
{
    protected $table = 'trip_expenses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['trip_id', 'driver_id', 'bata', 'vehicle_maintenance', 'police_fine', 'other_expense', 'advance', 'total'];
    protected $useTimestamps = true;
}
