<?php

namespace App\Models;

use CodeIgniter\Model;

class VehicleModel extends Model
{
    protected $table      = 'vehicles';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'vehicle_name',
        'registration_number',
        'rc_expiry_date',
        'rc_attachment',
        'insurance_expiry_date',
        'insurance_attachment',
        'pollution_certificate_expiry_date',
        'pollution_attachment',
        'created_at',
        'updated_at',
    ];

    protected $useTimestamps = true;
}
