<?php
namespace App\Models;
use CodeIgniter\Model;

class TripModel extends Model
{
    protected $table = 'trips';
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_id', 'from_city', 'to_city', 'material', 'weight', 'requested', 'accepted', 'driver_id', 'vehicle_id'];

    // Automatically manage timestamps
    protected $useTimestamps = true;

    // Specify the timestamp fields
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    // Update the accepted status to true
    public function updateAcceptedStatus($tripId)
    {
        return $this->update($tripId, ['accepted' => true]);
    }

    // Delete a trip by ID
    public function deleteTrip($tripId)
    {
        return $this->delete($tripId);
    }
}
