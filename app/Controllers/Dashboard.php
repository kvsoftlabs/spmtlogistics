<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TripModel;
use App\Models\CustomerModel;

class Dashboard extends BaseController
{
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
