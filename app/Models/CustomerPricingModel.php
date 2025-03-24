<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerPricingModel extends Model
{
    protected $table = 'customer_pricing';
    protected $primaryKey = 'id';
    protected $allowedFields = ['trip_id', 'customer_id', 'price', 'created_at', 'updated_at'];

    public function getPricingByTrip($tripId)
    {
        return $this->where('trip_id', $tripId)->first();
    }
}
