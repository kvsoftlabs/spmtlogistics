<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'admins';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'password'];
    // Enable timestamps (created_at, updated_at)
    protected $useTimestamps = true;
    
    // Set custom date format for created_at, updated_at
    protected $dateFormat = 'datetime';
    
    public function getUserByUserName($username)
    {
        return $this->where('name', $username)->first();
    }
}
