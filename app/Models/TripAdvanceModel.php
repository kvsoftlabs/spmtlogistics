<?php 

namespace App\Models;

use CodeIgniter\Model;

class TripAdvanceModel extends Model
{
    protected $table = 'trip_advances'; // Ensure this matches your DB table name
    protected $primaryKey = 'id';
    protected $allowedFields = ['trip_id', 'driver_id', 'amount', 'created_at'];

    // Enable automatic timestamps if needed
    protected $useTimestamps = true;

    public function getAdvanceByTrip($tripId)
    {
        return $this->where('trip_id', $tripId)->first();
    }

}
