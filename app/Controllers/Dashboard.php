<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TripModel;
use App\Models\CustomerModel;

class Dashboard extends BaseController
{
    public function __construct()
    {
        // Check if the user is logged in before allowing access to any method in this controller
        if (!session()->get('isLoggedIn')) {
            // If not logged in, redirect to the login page
            return redirect()->to('/auth/login');
        }
    }

    public function index(): string
    {
        $data = array();
        $tripModel = new TripModel();
        $customerModel = new CustomerModel();
            // Fetch trips along with customer details (name and number)
        $data['trips'] = $tripModel->select('trips.*, customers.name, customers.number')
            ->join('customers', 'customers.id = trips.customer_id')
            ->where('trips.requested', true)
            ->where('trips.accepted', false)
            ->findAll();

        return view('admin/dashboard', $data);
    }

}
